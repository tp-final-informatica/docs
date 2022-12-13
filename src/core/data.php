<?php
include_once "./src/utils/libraries.php";
include_once "./src/utils/Figure.php";
?>

<?php HTML_head("Análisis de datos obtenidos"); ?>

<?php printHeader("Análisis de datos obtenidos"); ?>

    <main id="main-content">
        <div class="content">
            <?php breadcrumb([['path' => "/docs/core.html", 'title'=>"El core"]]); ?>

            <h2>Consecuencias de la naturaleza no determinística del algoritmo</h2>
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
                    "Función contínua con dos picos visibles, uno mayor que el otro. Se indica que el pico menor es 
                un máximo local, mientras que el pico mayor es un máximo global.",
                "Función contínua con varios picos"
            );

            $maxima->print_figure();
            ?>
            <p>
                Si bien hay múltiples estrategias para que esto no suceda, en el ejemplo de la figura, el algoritmo
                podría quedar atrapado en el máximo local y no llegar nunca (o llegar luego de muchas, muchas
                iteraciones) al máximo global.
            </p>
            <p>
                En este tipo de situaciones es posible ajustar los parámetros de ejecución del algoritmo, como el tamaño
                de la población o la cantidad mínima de iteraciones, pero esto lleva una penalización en términos de tiempo
                de ejecución.
            </p>
            <? sectionLightbulb("Aprendizajes y propuestas",
                    '
                    <p>
                    La configuración de los parámetros del algoritmo se realizó para distintas combinaciones de viajantes
                    y visitas, buscando siempre la cantidad mínima de iteraciones y soluciones por generación que dieran 
                    buenos resultados en cada caso.
                    </p>
                    <p>
                    Ocasionalmente, el mismo algoritmo, con los mismos parámetros, generó resultados menos deseados.
                    </p>
                    <p>
                    Luego de investigar, extender nuestro algoritmo y modificar sus parámetros, entendimos que, como en 
                    todos los aspectos de la informática, asegurar una mejor solución puede significar penalizar la
                    ejecución en términos de tiempos de espera y uso de recursos.
                    </p>
                    <p>
                    Creemos que siempre hay mejoras que pueden hacerse al algoritmo, como por ejemplo definir los parámetros de forma 
                    adaptativa, que escapan el alcance de este trabajo.
                    </p>
                    <p>
                    Es por esto que proponemos agregar la opción de volver a calcular una ejecución si el resultado 
                    obtenido no satisface al usuario final como posible mejora para una siguiente etapa de desarrollo 
                    a discreción del cliente.
                    </p>'
            );?>
            <p>
                A continuación presentamos un ejemplo de este caso. Se trata de una ejecución con tres viajantes y cuatro
            grupos bien definidos de soluciones.
            </p>
            <p>
                La primera imagen muestra una representación en dos dimensiones de la secuencia de visitas que se
                estima en 140km obtenida en 800 iteraciones. La mejor solución obtenida para este caso
                es de 132km, por lo que esta solución puede ser considerada muy buena (un 5% de diferencia).
            </p>
            <p>
                La segunda imagen muestra la representación de otra solución obtenida con los mismos parámetros de
                ejecución, pero de 189km en 1300 iteraciones (un 42% de diferencia).
            </p>
            <div class="flex wrap">

                    <? lightboxGallery(
                            "/docs/images/map_gen799_7afea173fe52eb5c8a21bd058bf227aaTFB.png",
                            "/docs/images/map_gen799_7afea173fe52eb5c8a21bd058bf227aaTFB.png",
                            "Solución muy buena",
                            [
                                "max_width" => "600px",
                                "group" => "1"
                            ]
                    ); ?>
                    <p class="center">Imagen 1</p>

                    <? lightboxGallery(
                            "/docs/images/map_gen1299_e13fba4058cae213bc3f924b719589f7TFB.png",
                            "/docs/images/map_gen1299_e13fba4058cae213bc3f924b719589f7TFB.png",
                            "Solución mala",
                            [
                                "max_width" => "600px",
                                "group" => "1"
                            ]
                    ); ?>
                    <p class="center" >Imagen 2</p>

                </div>
            </div>


            <p>Este tipo de resultados es posible independientemente de los parámetros del algoritmo. Si bien el campo
            de investigación de este algoritmo en particular todavía puede ser más explorado, y mejores propuestas para
            calcularlo pueden surgir, siempre es posible obtener soluciones "malas". Por esta razón, una propuesta de
            mejora para la usabilidad de este trabajo es, en una etapa siguiente y a discreción del cliente, permitir el
            recálculo de aquellas soluciones no satisfactorias a pedido.</p>

            <h2>Definición de parámetros de fitness</h2>
            <p>
                La elección de los parámetros que multiplican los costos en la función de fitness es definitiva en
                relación al resultado deseado. No hay que olvidar que la función de fitness elegida penaliza soluciones
                indeseadas, pero no las prohibe. A continuación
            </p>
            Caso de médico lejos



        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>