<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Análisis de datos obtenidos"); ?>
<?php printHeader("Análisis de datos obtenidos"); ?>

    <main id="main-content">
        <div class="content">

            <?php breadcrumb([['path' => "/docs/core.html", 'title'=>"El core"]]); ?>


            <ul>
                <li>
                    <a href="#execution-parameters">
                        Situaciones inesperadas: consecuencias de la naturaleza no determinística del
                        algoritmo
                    </a>
                </li>
                <li>
                    <a href="#fitness-parameters">
                        Definición de parámetros de fitness
                    </a>
                </li>
            </ul>

            <h2 id="execution-parameters">Situaciones inesperadas: consecuencias de la naturaleza no determinística del algoritmo</h2>
            <p>
                Como explicamos previamente, el algoritmo genético por definición obtiene la mejor solución posible
                dentro del camino en que fue descubriendo las mejorías. Esto puede interpretarse como que el algoritmo
                recorre el espacio de soluciones de la función de fitness, un espacio que tiene valles y
                picos que no pueden calcularse de manera exacta por la naturaleza compleja del problema.
            </p>
            <p>Si pudieramos simplificar el problema, el siguiente gráfico podría representar nuestro dilema:</p>
            <?php
            $maxima = new Figure(
                    "/docs/images/maximos.svg",
                    "600px",
                    "",
                    "Función continua con dos picos visibles, uno mayor que el otro. Se indica que el pico menor es 
                un máximo local, mientras que el pico mayor es un máximo global.",
                "Gráfico en dos dimensiones de una función continua con varios picos"
            );

            $maxima->print_figure();
            ?>
            <p>
                Si bien hay múltiples estrategias para que esto no suceda, en el ejemplo de la figura, el algoritmo
                podría quedar atrapado en el máximo local y necesitar de muchas, muchas
                iteraciones para poder llegar al máximo global.
            </p>
            <p>
                En este tipo de situaciones es posible ajustar los parámetros de ejecución del algoritmo, como
                <b>incrementar el tamaño de la población o la cantidad mínima de iteraciones</b>, pero esto lleva una
                <b>penalización en términos de tiempo de ejecución</b>.
            </p>
            <p>
                A continuación presentamos un ejemplo de esta situación obtenido de uno de nuestros sets de pruebas.
                Se trata de dos ejecuciones realizadas con los mismos parámetros, con tres viajantes y cuatro grupos
                bien distinguidos de soluciones que deben dividirse equitativamente entre estos.
<!--                Es un ejemplo en el que la solución balanceada será más cara que la desbalanceada, por la naturaleza-->
<!--                de los datos.-->
            </p>
            <p>
                La primera imagen muestra una representación en dos dimensiones de la secuencia de visitas obtenida en la
                primera instancia, que se estima en 140 km, obtenida en 800 iteraciones.
                La mejor solución obtenida para este caso es de 132 km, por lo que esta solución puede ser
                considerada muy buena (un 5% de diferencia).
            </p>
            <p>
                La segunda imagen muestra la representación de otra solución obtenida con los mismos parámetros de
                ejecución en la segunda instancia, pero de 189 km en 1300 iteraciones (un 42% de diferencia).
            </p>
            <?
            $good_result = new Figure(
                "/docs/images/map_gen799_7afea173fe52eb5c8a21bd058bf227aaTFB.png",
                "600px",
                "/docs/images/map_gen799_7afea173fe52eb5c8a21bd058bf227aaTFB.png",
                "Esta solución balanceada es el resultado de una ejecución que se obtuvo en 800 iteraciones "
                . "y representa un recorrido total de 140km,"
                . " resultado muy bueno por estar muy cerca del mejor valor obtenido de 132km.",
                "Solución balanceada muy buena (1)"
            );

            $bad_result = new Figure(
                "/docs/images/map_gen1299_e13fba4058cae213bc3f924b719589f7TFB.png",
                "600px",
                "/docs/images/map_gen1299_e13fba4058cae213bc3f924b719589f7TFB.png",
                "Esta solución balanceada es el resultado de otra ejecución con los mismos parámetros, que se"
                . " obtuvo en 1300 iteraciones y representa un recorrido total de 189km,"
                . " resultado menos deseado, por tener una diferencia de cerca del 42% con la mejor solución"
                . " obtenida en otras simulaciones.",
                "Solución balanceada inesperada (2)"
            );

            $good_result->print_lightbox_figure("comparison");
            $bad_result->print_lightbox_figure("comparison");
            ?>

            <p>
                En el primer caso el algoritmo devolvió una muy buena solución, y en el segundo, una no tan deseada.
            </p>

<!--
<p>


                Esto no representa un problema grave, puesto que para ayudar al usuario a elegir una buena solución
                presentamos siempre tres opciones distintas de resultados (balanceada, desbalanceada y priorizada),
                de las cuales las primeras dos están pensadas para
                ayudar al algoritmo a cubrir dos grupos de soluciones: aquellas que pueden agruparse equitativamente, y
                aquellas que no.
                De esta forma, si en alguna de las ejecuciones el algoritmo no llega a buen puerto, el usuario tiene otras
                opciones para elegir.
            </p>
            <p>
                La siguiente imagen muestra una solución desbalanceada al mismo problema, obtenida en la misma ejecución
                de la solución anterior (2):
            </p>

            <?
$unbalanced = new Figure(
    "/docs/images/map_gen599_e13fba4058cae213bc3f924b719589f7TUB.png",
    "600px",
    "/docs/images/map_gen599_e13fba4058cae213bc3f924b719589f7TUB.png",
    "Esta solución desbalanceada se obtuvo en 600 iteraciones y representa un recorrido total de 140km,"
    ." (casi un 1% de diferencia con la mejor solución obtenida de este tipo, en 139km).",
    "Solución desbalanceada (3)"

);
//$unbalanced->print_lightbox_figure("comparison2");

?>

            <p>
                Ofreciendo ambas soluciones al mismo tiempo, el usuario tiene la posibilidad de quedarse con aquella que
                mejor se ajuste a su problema, y mejores resultados le provea.
            </p>
-->

            <? sectionLightbulb("Aprendizajes y próximos pasos",
                '
                    <p>
                    La configuración de los parámetros del algoritmo (<b>tamaño de la población</b> y <b>cantidad de 
                    iteraciones</b>) se realizó manualmente <span data-toggletip>Nuestro problema está muy poco estudiado
                    al día de la fecha y no hay bibliografía que facilite esta información.</span>
                    para distintas combinaciones de viajantes y paradas, buscando siempre la cantidad mínima de 
                    iteraciones y soluciones por generación que dieran buenos resultados en cada caso.
                    </p>
                    <p>
                    Ocasionalmente, el mismo algoritmo, con iguales parámetros, generó resultados menos deseados.
                    </p>
                    <p>
                    Luego de investigar, extender nuestro algoritmo y modificar sus parámetros, entendimos que, como en 
                    todos los aspectos de la informática, <b>asegurar una mejor solución puede significar penalizar la
                    ejecución en términos de tiempos de espera y uso de recursos</b>.
                    </p>
                    <p>
                    Creemos que siempre hay mejoras que pueden hacerse al algoritmo, como por ejemplo definir estos
                    parámetros de forma adaptativa, que escapan el alcance de este trabajo.
                    </p>
                    <p>
                    Es por esto que proponemos agregar la opción de volver a calcular una ejecución si el resultado 
                    obtenido no satisface al usuario final como posible mejora para una siguiente etapa de desarrollo 
                    a discreción del cliente.
                    </p>'
            );?>

            <h2 id="fitness-parameters">Definición de parámetros de fitness</h2>
            <p>
                La función que utilizamos para calcular el fitness tiene una misma base para todos los tipos
                de ejecuciones (ver sección <a href="/docs/core/algorithm.html#fitness">Fitness</a>): las
                variables en cuestión se suman en el denominador de la fracción.
                La diferencia para cada tipo de ejecución se hace con los valores de esas variables, y los
                parámetros que las multiplican.
            </p>
            <p>
                Los valores de esas variables vienen definidos por funciones específicas dependiendo del tipo de problema,
                que retornan valores entre 0 y 1, siempre siendo cero el mejor escenario posible. Esto es porque el
                algoritmo
                intenta maximizar el resultado de la función de fitness, y estos parámetros modifican el denominador
                de la función: cuanto más <em>grande</em> el denominador, <em>menor el resultado de la ecuación</em>, y por el contrario,
                cuanto más <em>chico</em> el denominador, <em>mayor el resultado de la ecuación</em>.
            </p>
            <p>
                La elección de los parámetros que multiplican esos valores en la función de fitness es definitiva en
                relación con el resultado deseado. Por ejemplo, si todos los parámetros son 1, todas las penalizaciones
                tendrán equivalente peso.
                Si un único parámetro equivale a 1, y todos los demás equivalen a 0, sólo el primero tendrá peso en
                el resultado final. Si tenemos un caso más complejo, donde dos parámetros equivalen a 10 y los otros
                dos a 5, entonces el peso se distribuirá 33%, 33%, 16%, 16%, etc.
            </p>
            <p>
                Teniendo en cuenta que la función de fitness elegida penaliza soluciones indeseadas, pero no las prohíbe,
                la cuidadosa selección de estos parámetros puede lograr que el algoritmo llegue o no al resultado deseado.
            </p>
            <h3>Caso de estudio: un médico muy lejos</h3>
            <p>
                Uno de los casos de prueba que generamos posiciona a todos los pacientes en la zona del AMBA, y utiliza
                cuatro médicos, tres de ellos en la misma zona, y uno a cerca de 70km del paciente más cercano, en Zárate.
            </p>
            <p>
                La función de fitness influye directamente en el resultado final. Para esto preparamos distintas
                ejecuciones del mismo caso con leves variantes en la función de fitness del caso balanceado.
            </p>
            <p>
                En la siguiente tabla mostramos la combinación de parámetros utilizados en el cálculo de la solución
                balanceada. Los parámetros son <span mono>p1</span> asociado al costo, <span mono>p2</span>  asociado al
                costo por viajante que para una solución balanceada siempre es cero, <span mono>p3</span>
                asociado a la incompletitud de la solución,
                y <span mono>p4</span> asociado al costo por balanceo de rutas.
                En esta comparación nos interesa evaluar la relación entre los parámetros <span mono>p1</span> y
                <span mono>p4</span>.
            </p>
            <table class="table table-bordered table-hover table-condensed">
                <thead><tr><th title="Field #1">Caso</th>
                    <th title="Field #2">p1</th>
                    <th title="Field #3">p2</th>
                    <th title="Field #4">p3</th>
                    <th title="Field #5">p4</th>
                    <th title="Field #6">p1:p4</th>
                </tr></thead>
                <tbody><tr>
                    <td>Caso 1</td>
                    <td align="right">200</td>
                    <td>0</td>
                    <td align="right"> 500</td>
                    <td align="right">25</td>
                    <td align="right">8:1</td>
                </tr>
                <tr>
                    <td>Caso 2</td>
                    <td align="right">200</td>
                    <td>0</td>
                    <td align="right"> 500</td>
                    <td align="right">50</td>
                    <td align="right">4:1</td>
                </tr>
                <tr>
                    <td>Caso 3</td>
                    <td align="right">200</td>
                    <td>0</td>
                    <td align="right"> 500</td>
                    <td align="right">100</td>
                    <td align="right">2:1</td>
                </tr>
                <tr>
                    <td>Caso 4</td>
                    <td align="right">200</td>
                    <td>0</td>
                    <td align="right"> 500</td>
                    <td align="right">200</td>
                    <td align="right">1:1</td>
                </tr>
                <tr>
                    <td>Caso 5</td>
                    <td align="right">200</td>
                    <td> 0</td>
                    <td align="right">500</td>
                    <td align="right">300</td>
                    <td align="right">2:3</td>
                </tr>
                </tbody></table>

            <p>
                Con esos parámetros de prueba ejecutamos el algoritmo y obtuvimos las siguientes soluciones:
            </p>

            <?
            $balanced25 = new Figure(
                "/docs/images/core_data_study/balanced25.png",
                "600px",
                               "/docs/images/core_data_study/balanced25.png",
                "Representación en plano de las rutas generadas por el algoritmo con una relación p1/p4 de 8:1. "
                . "El algoritmo descarta al médico que está lejos",
                "Caso 1"
            );
            $balanced50 = new Figure(
                "/docs/images/core_data_study/balanced50.png",
                "600px",
                "/docs/images/core_data_study/balanced50.png",
                "Representación en plano de las rutas generadas por el algoritmo con una relación p1/p4 de 4:1. "
                . "El algoritmo descarta al médico que está lejos",
                "Caso 2"
            );
            $balanced100 = new Figure(
                "/docs/images/core_data_study/balanced100.png",
                "600px",
                "/docs/images/core_data_study/balanced100.png",
                "Representación en plano de las rutas generadas por el algoritmo con una relación p1/p4 de 2:1. "
                . "El algoritmo incluye al médico que está lejos",
                "Caso 3"
            );
            $balanced200 = new Figure(
                "/docs/images/core_data_study/balanced200.png",
                "600px",
                "/docs/images/core_data_study/balanced200.png",
                "Representación en plano de las rutas generadas por el algoritmo con una relación p1/p4 de 1:1. "
                . "El algoritmo incluye al médico que está lejos",
                "Caso 4"
            );
            $balanced300 = new Figure(
                "/docs/images/core_data_study/balanced300.png",
                "600px",
                "/docs/images/core_data_study/balanced300.png",
                "Representación en plano de las rutas generadas por el algoritmo con una relación p1/p4 de 2:3. "
                . "El algoritmo incluye al médico que está lejos",
                "Caso 5"
            );

            ?>

            <div class="flex wrap">
                <? foreach ([$balanced25, $balanced50, $balanced100, $balanced200, $balanced300] as $solution): ?>
                <div class="max-width50-100">
                    <? $solution->print_lightbox_figure("study"); ?>
                </div>
                <? endforeach; ?>
            </div>

            <p>
                Como puede verse, en las primeras dos, en las que la relación entre el parámetro <span mono>p1</span> y
                el parámetro <span mono>p4</span> era de 8:1 o 4:1 el algoritmo optó por dejar afuera al médico que
                estaba lejos. Esto es porque el costo del kilometraje pesaba al menos 4 veces más que el costo del balanceo.
                Estas soluciones dieron resultados cercanos a los 140 km.
            </p>
            <p>
                En los tres últimos casos, en los que la relación entre ambos parámetros se acercó más, o invirtió la
                relación, el algoritmo se vio obligado a incluir al médico que está lejos, obteniendo rutas de cerca de
                300 km.
            </p>
            <p>
                Nos pareció un caso interesante para mencionar, porque deja expuesta la importancia de la elección de
                estos parámetros en la función de fitness y en la ejecución del algoritmo.
            </p>

            <?php prevAndNext(
                ['path' => "/docs/core/specs.html", 'title'=>"Especificaciones técnicas"],
                []
//                ['path' => "/docs/core/specs.html", 'title'=>"El core"]
            ); ?>

        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>