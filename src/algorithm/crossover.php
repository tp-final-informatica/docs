<?php
include_once "./src/algorithm/crossover/Crossover.php";
include_once "./src/algorithm/crossover/Mbs.php";
include_once "./src/algorithm/crossover/Cx.php";
$title = "Crossover";
$id = "crossover";
?>

<?php print_section_heading($title, $id); ?>

    <p>El crossover es un punto fundamental del algoritmo genético. La elección del mismo afecta el desarrollo y los resultados de la ejecución.</p>
    <p>Para nuestro problema, un problema de optimización de rutas, implementamos cuatro crossovers distintos. Los crossovers elegidos cumplen con distintas condiciones:</p>
    <ul>
        <li>MixByShared propaga la <b>pertenencia</b> de una visita a una ruta dada</li>
        <li>Cycle Crossover propaga la <b>ubicación relativa</b> de las visitas en cada ruta</li>
        <li>Partially mapped Crossover propaga un <b>segmento</b> de la ruta original, y completa el resto con ubicaciones relativas</li>
        <li>Enhanced Edge Recombination propaga las <b>conexiones</b> entre visitas</li>
    </ul>

    <h4>MixByShared (MBS)</h4>
    <?php $mbs = new Mbs(); ?>
    <p>Desarrollamos este algoritmo para la prueba de comparación de lenguajes. Nos pareció interesante dejarlo para el proyecto final, por tener un enfoque distinto a los demás algoritmos que encontramos en los papers.</p>
    <p>Dadas dos soluciones padres, P0 y P1, analizamos las visitas de cada ruta y marcamos aquellas que corresponden siempre a la misma ruta, y aquellas que en ambos padres pertenecen a rutas distintas, por ejemplo:</p>

    <div class="crossover">
        <?php $mbs->mbs_parents(); ?>
    </div>

    <p>Agrupamos dichas visitas para poder armar las soluciones hijas:</p>

    <div class="crossover">
        <?php $mbs->mbs_grouped(); ?>
    </div>

    <p>Para el viajante 1, los puntos en amarillo están repetidos en ambas soluciones padres,</p>
    <p>Para el viajante 2, los puntos en rojo están repetidos en ambas soluciones padres,</p>
    <p>Los puntos en negro no pertenecen a alguno de los viajantes en particular, sino que, dadas las soluciones padres, pueden pertenecer a cualquiera de las rutas de los viajantes.</p>
    <p>Nuestro algoritmo hereda los puntos compartidos por los padres a las soluciones hijas, y distribuye los puntos no compartidos entre las soluciones hijas de manera aleatoria.</p>
    <p>Finalmente se modifica el orden de las rutas aleatoriamente también.</p>
    <p>Los siguientes son posibles resultados del algoritmo MBS, dadas las soluciones iniciales presentadas.</p>

    <div class="crossover">
        <?php $mbs->mbs_children(); ?>
    </div>

    <p>El resultado del algoritmo son soluciones en las que siempre, todas las visitas de todas las rutas de las soluciones hijas pertenecen a la misma ruta de alguno de los dos padres.</p>
    <p><b>MBS mantiene entonces la asignación de las visitas a las rutas originales, pero no el orden de los mismos, o su posición inicial.</b></p>

    <h4>Cycle Crossover (CX)</h4>
    <?php $cx = new Cx(); ?>
    <p>Este algoritmo fue propuesto por IM Oliver en el paper <em>A Study of permutation crossover Operators on the Traveling Salesman Problem</em>. El algoritmo original está planteado para el problema del viajante (con una única ruta), y su finalidad es encontrar ciclos (partes intercambiables) entre secuencias de visitas. De no encontrar ciclos, no es posible generar soluciones nuevas. Esto sucederá en general para secuencias de visitas cortas.</p>
    <p>Para aplicar este algoritmo a nuestro problema fue necesario implementar adaptaciones, puesto que no se cumplen las mismas condiciones:</p>
    <p>En el algoritmo de Cycle Crossover original se cruzan dos rutas de igual tamaño, con iguales puntos de visita en diferente orden. En nuestro caso, las rutas <b>no necesariamente cumplen esas condiciones</b>: una visita puede estar en la ruta de uno de los padres, y no estarlo en la ruta equivalente del otro padre.</p>
    <p>A continuación presentamos los pasos del algoritmo CX adaptado a nuestro problema. Sean las siguientes nuestras soluciones iniciales:</p>

    <div class="crossover">
        <?php $cx->cx_parents(); ?>
    </div>

    <p>Obtendremos de las mismas unas soluciones temporales, en las que sólo  tengamos los puntos que se repiten entre ambas rutas:</p>
    <div class="crossover">
        <?php $cx->cx_parents_processed(); ?>
    </div>
    <p>Luego se aplica CX a cada una de las rutas. Los ciclos obtenidos para este ejemplo son los siguientes:</p>

    <div class="crossover">
        <?php $cx->cx_cycles(); ?>
    </div>

    <p>Estos ciclos son intercambiables manteniendo la integridad de las rutas. Las soluciones finales se forman a partir de un padre, y al menos un intercambio en las rutas según los ciclos encontrados, por ejemplo:</p>
    <div class="crossover">
        <?php $cx->cx_children(); ?>
    </div>

    <p>Cycle crossover es un algoritmo que <b>mantiene las posiciones originales de las visitas de los padres en las soluciones hijas</b> (sea de uno, u otro padre).</p>
    <p>Al modificarlo para aplicarlo a nuestro problema, mantenemos el orden relativo, pero no las posiciones originales necesariamente, puesto que las visitas no compartidas mantienen su posición original dentro de la ruta.</p>


<?php print_section_footer(); ?>