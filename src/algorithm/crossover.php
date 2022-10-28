<?php
include_once "./src/algorithm/crossover/Crossover.php";
include_once "./src/algorithm/crossover/Mbs.php";
include_once "./src/algorithm/crossover/Cx.php";
include_once "./src/algorithm/crossover/Pmx.php";
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

    <h3>MixByShared (MBS)</h3>
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

    <h3>Cycle Crossover (CX)</h3>
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

    <p>Estos ciclos representan visitas que pueden ser intercambiables manteniendo la integridad de las rutas. Las
        soluciones finales se forman a partir de un padre, y al menos un intercambio en las rutas según los ciclos encontrados, por ejemplo:</p>
    <div class="crossover">
        <?php $cx->cx_children(); ?>
    </div>

    <p>Cycle crossover es un algoritmo que <b>mantiene las posiciones originales de las visitas de los padres en las
            soluciones hijas</b> (sea de uno, u otro padre).</p>
    <p>Al modificarlo para aplicarlo a nuestro problema, mantenemos el orden relativo, pero no las posiciones originales
        necesariamente, puesto que las visitas no compartidas mantienen su posición original dentro de la ruta.</p>


    <h3>Partially mapped crossover (PMX)</h3>
<?php $pmx = new Pmx(); ?>

    <p>Este algoritmo fue propuesto por D. Goldberg y R. Lingle en el paper <em>Alleles, loci, and the Traveling Salesman Problem.</em></p>
    <p>Este algoritmo mantiene una subsección de la ruta original de uno de los padres, y acomoda el resto de las visitas
        según el orden relativo dentro del otro padre.</p>
    <p>Nuevamente, <b>este algoritmo no se puede aplicar exactamente en nuestro caso</b>, puesto que las dos rutas a cruzar
        no tienen necesariamente los mismos elementos. Una opción es tomar subrutas con los puntos compartidos, como aplicamos
        en Cycle Crossover. Otra opción es aplicar el algoritmo con las rutas como están, lo que resultará en soluciones incompletas.
        Decidimos ir por este camino para darle variedad a las soluciones obtenidas.</p>
    <p>Los pasos son los siguientes:</p>

    <ol>
        <li>Seleccionamos dos soluciones como padres, y seleccionamos una parte de cada ruta para intercambiar.</li>
        <li>Esas partes que seleccionamos se heredan directamente a las soluciones hijas.</li>
        <li>Mapeamos los reemplazos de las visitas dentro de las partes seleccionadas.</li>
        <li>Se completa cada solución hija con el resto de las visitas del padre alterno. Si la visita a heredar está en
            el mapa, se reemplaza por el valor indicado, sino se hereda directamente.</li>
    </ol>

    <p>A continuación presentamos un ejemplo. Partimos de las siguientes soluciones, y elegimos las partes a heredar enteras.
        Para la ruta del viajante A elegimos los índices 2 a 3, y para el viajante B los índices 1 al 3.</p>

    <div class="crossover">
        <?php $pmx->pmx_parents(); ?>
    </div>

    <p>Generamos el mapa de reemplazo. En este caso es el siguiente:</p>

    <div class="crossover">
        <?php $pmx->pmx_map(); ?>
    </div>

    <p>Procedemos a heredar las sub rutas marcadas en negro de forma cruzada: vamos a combinar las sub rutas de un padre con el resto de visitas del otro padre.</p>

    <div class="crossover">
        <?php $pmx->pmx_join_subrouteA(); ?>
    </div>
    <p>El proceso es el siguiente para la ruta A0:</p>
    <ol>
        <li>Intentamos completar la primer visita de A0. Según el resto de P1, debemos utilizar la visita 1, pero esta se encuentra en el mapa, y debe ser reemplazada por la visita 2. </li>
        <li>Completamos las posiciones 2 y 3 de la ruta A0 según la selección en de P0.</li>
        <li>Intentamos completar la posición 4 según el resto de P1. La visita a utilizar es la 4, que no está en el mapa, por lo que puede ser utilizada.</li>
    </ol>
    <p>Luego, el proceso es el siguiente para la ruta B0:</p>
    <ol>
        <li>Heredamos las visitas 7, 6 y 2 de la ruta B0 de P0.</li>
        <li>Intentamos completar la posición 4 según el resto de P1. La visita a utilizar es la 8, que no está en el mapa, por lo que puede ser utilizada.</li>
    </ol>

    <p>De la misma forma, generamos otra solución hija intercambiando las visitas de forma contraria.</p>
    <div class="crossover">
        <?php $pmx->pmx_join_subrouteB(); ?>
    </div>

    <p>Como puede verse en las soluciones hijas, ambas repiten la visita "2". La primera solución no tiene la visita "1",
        y la segunda no tiene la visita "5".</p>
    <p>Esto es algo que originalmente intentamos evitar, pero luego al investigar un poco más, concluímos que era una buena
        idea que sucediera: de esta forma el algoritmo puede explorar las rutas de forma menos restrictiva. La función de
        fitness penaliza este tipo de soluciones incompletas, por lo que nunca puede ser elegida como la mejor solución,
        pero sí puede contribuir a generar mejores soluciones mezclándose con otras soluciones de la generación.</p>

    <h3>Enhanced edge recombination (EER)</h3>
    <p todo>Completar</p>
<?php print_section_footer(); ?>