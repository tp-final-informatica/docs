<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Especificaciones técnicas"); ?>

<?php printHeader("Especificaciones técnicas - Prácticas implementadas/Facetas técnicas destacables del desarrollo del core"); ?>

    <main id="main-content">
        <div class="content">

           <?php breadcrumb([['path' => "/docs/core.html", 'title'=>"El core"]]); ?>


            <p>Consideramos que los siguientes merecen una mención dentro de las funcionalidades implementadas
                en el core, por integrar conocimientos de áreas distintas de la carrera</p>
            <ul>
<!--                <li><a href="#api-rest">Uso de API REST</a></li>-->
                <li><a href="#concurrency">Ejecución de rutinas concurrentes</a></li>
                <li><a href="#profiling">Profiling del código</a></li>
                <li><a href="#database">Persistencia de datos</a></li>
                <li><a href="#design-patterns">Patrones de diseño</a></li>
                <li><a href="#robustness">Robustez</a></li>
                <li><a href="#tests">Tests</a></li>
                <li><a href="#graphs">Gráficos</a></li>
            </ul>

<!--            <h2 id="api-rest">API REST</h2>-->
<!--            <p>-->
<!--                El algoritmo genético debe ejecutarse únicamente a pedido del backend, por lo que definimos una API REST para comunicar-->
<!--                ambas partes.-->
<!--            </p>-->
<!--            <p>-->
<!--                La misma consiste de dos requests distintos, uno que inicia la ejecución, y otro que consulta el estado-->
<!--                de la misma y su progreso:-->
<!--            </p>-->
<!--            <ul>-->
<!--                <li><b>Generar solución</b>: Request de tipo <span mono>POST</span> que envía los datos de las distancias entre todos los puntos-->
<!--                del mapa. Mediante estos datos es posible calcular las rutas utilizando nuestro algoritmo genético.</li>-->
<!--                <li><b>Obtener progreso/resultados</b>: Request de tipo <span mono>GET</span> que devuelve el progreso del cálculo (un número entre-->
<!--                0 y 1) y al llegar al final del cálculo, las secuencias de los puntos sugeridas para cada ruta-->
<!--                    (balanceada, priorizada y desbalanceada).</li>-->
<!--            </ul>-->
<!--            <p>-->
<!--                En el desarrollo de estas APIs hicimos uso de las siguientes buenas prácticas:-->
<!--            </p>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <b>Autenticación mediante token de los requests</b>: utilizamos un sistema de PSK (pre-shared-key) sin expiración por-->
<!--                    no ser necesaria más complejidad (sólo el backend puede acceder al core).-->
<!--                    Ambas partes poseen una clave secreta que se encripta mediante un algoritmo conocido entre ambas-->
<!--                    y se envía en cada request.-->
<!--                    Dado que ambas partes saben la clave secreta y cómo encriptarla, cuando el core recibe el token del backend-->
<!--                    lo coteja contra su encriptación de la pre-shared-key.-->
<!--                    Esto es una versión muy sencilla de encriptación simétrica.-->
<!--                </li>-->
<!--                <li>-->
<!--                    <b>Uso de códigos de respuesta HTML</b>: utilizamos los siguientes códigos de HTML en las respuestas de los-->
<!--                    distintos endpoints: 200, 400, 401 y 404 según corresponde-->
<!--                    <a href="https://www.rfc-editor.org/rfc/rfc9110.html#name-overview-of-status-codes" target="_blank"-->
<!--                       title="ver documentación en otra ventana">-->
<!--                        (ver RFC 9110)-->
<!--                    </a>.-->
<!--                </li>-->
<!--            </ul>-->
<!---->
<!--            <p>A continuación presentamos un diagrama simplificado de secuencia que representa la interacción entre el-->
<!--            backend y el core.</p>-->



            <h2 id="concurrency">Ejecución de rutinas concurrentes</h2>
            <p>
                El algoritmo genético tiene pasos que pueden ser paralelizables por ser independientes del resto de la ejecución.
                Por esta razón hacemos uso de rutinas concurrentes en la implementación del core, aprovechando esa cualidad y
                obteniendo así tiempos más cortos de ejecución.
            </p>
<!--            <p todo>poner tabla comparativa de tiempos</p>-->
            <p>
                También paralelizamos las distintas ejecuciones del algoritmo, es decir, la búsqueda de las mejores soluciones
                posibles balanceada, desbalanceada y priorizada para cada set de datos.
            </p>

            <p>
                En Go esto es posible mediante <a href="https://gobyexample.com/goroutines" target="_blank"
                                                  title="ver documentación en otra ventana">goroutines</a>
                y mecanismos básicos de concurrencia como <a href="https://gobyexample.com/waitgroups" target="_blank"
                                                             title="ver documentación en otra ventana">bloqueos</a>
                por espera y <a href="https://gobyexample.com/mutexes" target="_blank"
                                title="ver documentación en otra ventana">mutexes</a>.
            </p>

            <h2 id="profiling">Profiling del código</h2>
            <p>
                El desarrollo del core tuvo una complicación adicional: la novedad del lenguaje y nuestra falta de conocimiento del mismo.
                Un ejemplo es que mientras otros lenguajes proveen herramientas para el manejo de grandes listas de elementos, en Go es necesario
                hacer iteraciones. Otro ejemplo es que el concepto de OOP se implementa de forma no tradicional, en el sentido
                que no existe el concepto de herencia.
            </p>
            <p>
                Nuestro desconocimiento y este tipo de limitaciones llevaron a que nuestro código tuviera lugar a mejoras y
                las ejecuciones fueran largas. Esto nos obligó
                a utilizar herramientas de profiling para optimizar el uso de recursos.
                Golang tiene un <a href="https://go.dev/blog/pprof" target="_blank">profiler nativo</a> para analizar el uso de memoria, entre otras, que aprendimos a utilizar para
                este análisis. Mediante esta herramienta modificamos el orden de las instrucciones, la definición de loops (los arrays con
                tamaño predefinido son menos pesados que los que definen su tamaño dinámicamente, por ejemplo), etc.
            </p>

            <h2 id="database">Persistencia de datos</h2>
            <p>
                La aplicación utiliza una base de datos de tipo <b>clave-valor</b> para almacenar los resultados de las ejecuciones.
                De esta forma el core puede apagarse hasta que el backend solicite los resultados de una ejecución.
            </p>
            <p>
                La base de datos elegida para esta persistencia fue <a href="https://redis.io/" target="_blank">Redis</a>
                por su simplicidad (clave-valor) y por ser novedosa para nosotros.
                Definimos un tiempo de vida de un día (<abbr title="Time to live">TTL</abbr>) para los resultados de las
                corridas ejecutadas, puesto que no es necesario más que eso según las reglas del negocio.
            </p>
            <p>
                <b>Por cuestiones de costos</b>, la instancia del core que está instalada en la nube utiliza una <b>base de
                datos relacional</b> <a href="https://www.mysql.com/" target="_blank">MySql</a>.
                El uso de una u otra base se define mediante un parámetro de configuración. El core está preparado para ejecutarse
                de la misma forma en cualquiera de los dos casos.
            </p>


            <h2 id="design-patterns">Patrones de diseño utilizados</h2>
            <p>Hicimos uso de los siguientes patrones de diseño en el desarrollo de la aplicación del Core:</p>
            <ul>
                <li>
                    <b>Singleton</b>: mantuvimos una lista de ejecuciones en memoria para acceder de las distintas las rutinas,
                    y también un objeto para acceder a las bases de datos, ambos implementadas mediante este patrón.
                </li>
                <li>
                    <b>Hook</b>: Utilizamos este patrón para asegurarnos de que ciertas rutinas se ejecutaran luego de otras, como por ejemplo
                    finalizar una ejecución y posteriormente guardar sus datos en la base de datos.
                </li>
                <li>
                    <b>Factory</b>: este patrón fue muy útil para la creación de las distintas ejecuciones, funciones de fitness, mutaciones y crossovers.
                </li>
            </ul>



            <h2 id="robustness">Robustez</h2>
            <p>
                El core está preparado para poder retomar ejecuciones previas en caso de algún imprevisto, haciendo uso
                de la base de datos asociada y del listado de ejecuciones en memoria (implementado mediante un Singleton,
                ítem anterior). Para esto hace uso de una cola en memoria y la base de datos mencionada.
            </p>
            <p>
                Cuando el core recibe la orden de calcular rutas guarda una copia de los datos y lanza ejecuciones
                concurrentes para obtener las rutas de cada tipo, como puede verse en el siguiente diagrama:
            </p>
            <? $diagram_sequence = new Figure(
                "/docs/images/core/specs/sequence_backend_core.svg",
                "100%",
                "/docs/images/core/specs/sequence_backend_core.svg",
                "Diagrama de secuencia del cálculo de las rutas",
                "Diagrama de secuencia del cálculo de las rutas"
            );
            $diagram_sequence->print_lightbox_figure("post");
            ?>
            <p>
                A medida que las ejecuciones van terminando, van almacenando sus resultados en la base de datos.
            </p>
            <p>
                Esto es útil dentro de la secuencia de ejecución, y además, porque permite asegurar que las ejecuciones
                realizadas no se vuelvan a ejecutar por error (y asi evitar uso de procesamiento innecesario).
                Esto es para reducir el tiempo de ejecución en la nube y con esto, el costo del mismo.
            </p>
            <p>
                Cuando el backend solicite la información calculada, se puede dar uno de los siguientes casos:
            </p>
            <?
            $diagram_get2 = new Figure(
                "/docs/images/core/specs/getSolutions_queue.svg",
                "100%",
                "/docs/images/core/specs/getSolutions_queue.svg",
                "Diagrama de secuencia de la devolución de las rutas, en el caso en que todavía están siendo calculadas",
                "Diagrama de secuencia de la devolución de las rutas, en el caso en que todavía están siendo calculadas"
            );
            $diagram_get1 = new Figure(
                "/docs/images/core/specs/getSolutions_db.svg",
                "100%",
                "/docs/images/core/specs/getSolutions_db.svg",
                "Diagrama de secuencia de la devolución de las rutas, en el caso en que ya fueron calculadas",
                "Diagrama de secuencia de la devolución de las rutas, en el caso en que ya fueron calculadas"
            );

            $diagram_get3 = new Figure(
                "/docs/images/core/specs/getSolutions_404.svg",
                "100%",
                "/docs/images/core/specs/getSolutions_404.svg",
                "Diagrama de secuencia de la devolución de las rutas, en el caso en que se solicitó una ejecución inexistente",
                "Diagrama de secuencia de la devolución de las rutas, en el caso en que se solicitó una ejecución inexistente"
            );
            $diagram_get2->print_lightbox_figure("get");
            $diagram_get1->print_lightbox_figure("get");
            //            $diagram_get3->print_lightbox_figure("get");
            ?>
            <p>
                El core devuelve un porcentaje de completitud mientras la ejecución no esté terminada, y en ese caso,
                las rutas calculadas.
            </p>
            <p>
                Este esquema permite también que en caso de una situación excepcional, si el core fuera a apagarse
                durante una corrida en la que por ejemplo una de las tres ejecuciones ya estuviera completa,
                al reiniciar y volver a solicitar
                los resultados de la ejecución, el core únicamente reiniciará las dos ejecuciones restantes (ahorrando
                recursos).
            </p>


            <h2 id="tests">Tests</h2>
            <p>
                La complejidad del algoritmo nos llevó a ejecutar pruebas distintas sobre el código para asegurar
            el funcionamiento esperado:
            </p>
            <ul>
                <li>
                    <b>Pruebas unitarias</b>: las utilizamos para probar las funcionalidad más básicas, por ejemplo el ordenamiento
                    de un listado, la remoción de una clave de un mapa, etc.
                </li>
                <li>
                    <b>Pruebas de integración</b>: las utilizamos para probar el funcionamiento de las mutaciones y los
                    crossovers, por ejemplo.
                </li>
                <li>
                    <b>Pruebas funcionales</b>: las utilizamos en su mayoría para validar la creación de las instancias de ejecución.
                </li>
            </ul>

<!--            https://programacionymas.com/blog/tipos-de-testing-en-desarrollo-de-software-->

            <h2 id="graphs">Gráficos</h2>
            <p>
                Los gráficos presentados en esta sección (El core) fueron generados a partir de la aplicación. Para esto
                utilizamos una librería open source de gráficos.
            </p>
            <p>
                Inicialmente mantuvimos la información necesaria en memoria para poder graficar, pero esto era muy
                poco performante. Entonces introdujimos otra base de datos no relacional, <a href="https://www.mongodb.com/"
                target="_blank">MongoDB</a>, para guardar la información de las ejecuciones y graficarla a demanda.
                La elección de esta base fue también por la novedad de la misma para nosotros y por la suficiencia del
                esquema para la representación de nuestros datos.
            </p>
            <p>
                La funcionalidad de los gráficos (persistencia de datos y dibujo de los mismos) puede ser habilitada en una configuración
                de la aplicación, lo que permite que esté desconectada en la nube, y no consuma recursos o necesite de la base en cuestión.
            </p>




<!--            --><?php //nextRead("/docs/core/data.html", "Análisis de datos obtenidos"); ?>
            <?php prevAndNext(
                ['path' => "/docs/core/data.html", 'title'=>"Análisis de datos"],
                ['path' => "/docs/documentation.html", 'title'=>"Documento de Arquitectura"]

            ); ?>
        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>