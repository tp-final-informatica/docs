<?php
include_once "./src/utils/libraries.php";
include_once "./src/utils/Figure.php";
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
                incrementar el tamaño de la población o la cantidad mínima de iteraciones, pero esto lleva una
                penalización en términos de tiempo de ejecución.
            </p>
            <p>
                A continuación presentamos un ejemplo de esta situación obtenido de uno de nuestros sets de pruebas.
                Se trata de una ejecución con tres viajantes y cuatro grupos bien distinguidos de soluciones que deben
                dividirse equitativamente entre estos.
<!--                Es un ejemplo en el que la solución balanceada será más cara que la desbalanceada, por la naturaleza-->
<!--                de los datos.-->
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
            <?
            $good_result = new Figure(
                "/docs/images/map_gen799_7afea173fe52eb5c8a21bd058bf227aaTFB.png",
                "600px",
                "/docs/images/map_gen799_7afea173fe52eb5c8a21bd058bf227aaTFB.png",
                "Esta solución balanceada se obtuvo en 800 iteraciones y representa un recorrido total de 140km,"
                . " resultado muy bueno por estar muy cerca del mejor valor obtenido de 132km.",
                "Solución balanceada muy buena (1)"
            );

            $bad_result = new Figure(
                "/docs/images/map_gen1299_e13fba4058cae213bc3f924b719589f7TFB.png",
                "600px",
                "/docs/images/map_gen1299_e13fba4058cae213bc3f924b719589f7TFB.png",
                "Esta solución balanceada se obtuvo en 1300 iteraciones y representa un recorrido total de 189km,"
                . " resultado menos deseado, por tener una diferencia de cerca del 42% con la mejor solución"
                . " obtenida en otras simulaciones.",
                "Solución balanceada inesperada (2)"
            );

            $good_result->print_lightbox_figure("comparison");
            $bad_result->print_lightbox_figure("comparison");
            ?>


            <p>
                Para ayudar al usuario a elegir una buena solución presentamos siempre tres opciones distintas de
                resultados (balanceada, desbalanceada y priorizada), de las cuales las primeras dos están pensadas para
                ayudar al algoritmo a cubrir dos grupos de soluciones: aquellas que pueden agruparse equitativamente, y
                aquellas que no.
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
            $unbalanced->print_lightbox_figure("comparison2");

            ?>

            <p>
                Ofreciendo ambas soluciones al mismo tiempo, el usuario tiene la posibilidad de quedarse con aquella que
                mejor se ajuste a su problema, y mejores resultados le provea.
            </p>


            <? sectionLightbulb("Aprendizajes y próximos pasos",
                '
                    <p>
                    La configuración de los parámetros del algoritmo (tamaño de la población y cantidad de iteraciones) 
                    se realizó para distintas combinaciones de viajantes
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
                que retornan valores entre 0 y 1, siempre siendo cero el mejor escenario posible (porque entonces el
                resultado de la ecuación crece).
            </p>
            <p>
                La elección de los parámetros que multiplican esos valores en la función de fitness es definitiva en
                relación con el resultado deseado. Por ejemplo, si todos los parámetros son 1, todas las penalizaciones
                tendrán equivalente peso.
                Si un único parámetro equivale a 1, y todos los demás equivalen a 0, sólo el primero tendrá peso en
                el resultado final. Si dos parámetros equivalen a 10 y los otros dos a 5, entonces el peso se
                distribuirá 33%, 33%, 16%, 16%, etc.
            </p>
            <p>
                Teniendo en cuenta que la función de fitness elegida penaliza soluciones indeseadas, pero no las prohíbe,
                la cuidadosa selección de estos parámetros puede lograr que el algoritmo llegue o no al resultado deseado.
            </p>
            <p todo >Caso de médico lejos!</p>



        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>