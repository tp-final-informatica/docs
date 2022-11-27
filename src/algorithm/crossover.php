<?php
include_once "./src/algorithm/solutions/Solution.php";
include_once "./src/algorithm/solutions/Mbs.php";
include_once "./src/algorithm/solutions/Cx.php";
include_once "./src/algorithm/solutions/Pmx.php";
include_once "./src/algorithm/solutions/Eer.php";
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
    <p>Desarrollamos este algoritmo para la prueba de comparación de lenguajes. Nos pareció interesante dejarlo para el
        proyecto final, por tener un enfoque distinto a los demás algoritmos que encontramos en los papers.</p>
    <p>Dadas dos soluciones padres, P0 y P1, analizamos las visitas de cada ruta y marcamos aquellas que corresponden
        siempre a la misma ruta, y aquellas que en ambos padres pertenecen a rutas distintas, por ejemplo:</p>

    <?php $mbs->mbs_parents(); ?>

    <p>Agrupamos dichas visitas para poder armar las soluciones hijas:</p>

    <?php $mbs->mbs_grouped(); ?>

    <p>Para el viajante 1, los puntos en amarillo están repetidos en ambas soluciones padres,</p>
    <p>Para el viajante 2, los puntos en rojo están repetidos en ambas soluciones padres,</p>
    <p>Los puntos en negro no pertenecen a alguno de los viajantes en particular, sino que, dadas las soluciones padres,
        pueden pertenecer a cualquiera de las rutas de los viajantes.</p>
    <p>Nuestro algoritmo hereda los puntos compartidos por los padres a las soluciones hijas, y distribuye los puntos
        no compartidos entre las soluciones hijas de manera aleatoria.</p>
    <p>Finalmente se modifica el orden de las rutas <s>aleatoriamente también</s><span todo>mediante el siguiente algoritmo:</span></p>
    <ul todo>
        <li>
            se elige una visita de la ruta de forma aleatoria,
        </li>
        <li>
            de las visitas restantes dentro de la misma ruta, se selecciona para continuar la secuencia aquella que se encuentre a menor distancia de
            la visita elegida anteriormente
        </li>
        <li>se repite hasta elegir todas las visitas.</li>
    </ul>

    <p>Los siguientes son posibles resultados del algoritmo MBS, dadas las soluciones iniciales presentadas.</p>

    <?php $mbs->mbs_children(); ?>

    <p>El resultado del algoritmo son soluciones en las que siempre, todas las visitas de todas las rutas de las soluciones hijas pertenecen a la misma ruta de alguno de los dos padres.</p>
    <p><b>MBS mantiene entonces la asignación de las visitas a las rutas originales, pero no el orden de los mismos, o su posición inicial.</b></p>

    <h3>Cycle Crossover (CX)</h3>
    <?php $cx = new Cx(); ?>
    <p>Este algoritmo fue propuesto por IM Oliver en el paper <em>A Study of permutation crossover Operators on the Traveling Salesman Problem</em>. El algoritmo original está planteado para el problema del viajante (con una única ruta), y su finalidad es encontrar ciclos (partes intercambiables) entre secuencias de visitas. De no encontrar ciclos, no es posible generar soluciones nuevas. Esto sucederá en general para secuencias de visitas cortas.</p>
    <p>Para aplicar este algoritmo a nuestro problema fue necesario implementar adaptaciones, puesto que no se cumplen las mismas condiciones:</p>
    <p>En el algoritmo de Cycle Crossover original se cruzan dos rutas de igual tamaño, con iguales puntos de visita en diferente orden. En nuestro caso, las rutas <b>no necesariamente cumplen esas condiciones</b>: una visita puede estar en la ruta de uno de los padres, y no estarlo en la ruta equivalente del otro padre.</p>
    <p>A continuación presentamos los pasos del algoritmo CX adaptado a nuestro problema. Sean las siguientes nuestras soluciones iniciales:</p>

    <?php $cx->cx_parents(); ?>

    <p>Obtendremos de las mismas unas soluciones temporales, en las que sólo  tengamos los puntos que se repiten entre ambas rutas:</p>
    <?php $cx->cx_parents_processed(); ?>
    <p>Luego se aplica CX a cada una de las rutas. Los ciclos obtenidos para este ejemplo son los siguientes:</p>

    <?php $cx->cx_cycles(); ?>

    <p>Estos ciclos representan visitas que pueden ser intercambiables manteniendo la integridad de las rutas. Las
        soluciones finales se forman a partir de un padre, y al menos un intercambio en las rutas según los ciclos encontrados, por ejemplo:</p>
    <?php $cx->cx_children(); ?>

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

    <?php $pmx->pmx_parents(); ?>

    <p>Generamos el mapa de reemplazo. En este caso es el siguiente:</p>

    <?php $pmx->pmx_map(); ?>

    <p>Procedemos a heredar las sub rutas marcadas en negro de forma cruzada: vamos a combinar las sub rutas de un padre con el resto de visitas del otro padre.</p>

    <?php $pmx->pmx_join_subrouteA(); ?>
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
    <?php $pmx->pmx_join_subrouteB(); ?>

    <p>Como puede verse en las soluciones hijas, ambas repiten la visita "2". La primera solución no tiene la visita "1",
        y la segunda no tiene la visita "5".</p>
    <p>Esto es algo que originalmente intentamos evitar, pero luego al investigar un poco más, concluímos que era una buena
        idea que sucediera: de esta forma el algoritmo puede explorar las rutas de forma menos restrictiva. La función de
        fitness penaliza este tipo de soluciones incompletas, por lo que nunca puede ser elegida como la mejor solución,
        pero sí puede contribuir a generar mejores soluciones mezclándose con otras soluciones de la generación.</p>

    <h3>Enhanced edge recombination (EER)</h3>
    <?php $eer = new Eer(); ?>

    <p>En distintos papers encontramos el algoritmo Edge recombination, que mantiene la información de adyacencia entre
        las visitas, pero descarta el orden de los elementos.
        Enhanced edge recombination es una variante de Edge recombination, en la que se retiene también el orden de los elementos al
        preservar sub secuencias comunes a ambos padres. <span data-toggletip>Del paper "A comparison of Genetic Sequencing Operators" (ver sección Bibliografía).</span>
    </p>
    <p>El algoritmo no puede aplicarse directamente en nuestro caso dado que el mismo considera una única ruta por solución en
        la que todos los elementos de ambos padres están representados. En nuestro caso, y nuevamente por tener las visitas
        distribuidas en distintas rutas, no podemos asegurar que las sub rutas compartan siempre todos sus elementos.</p>
    <p>Para poder ejecutar este algoritmo, procedimos a adaptar nuestro problema concatenando las visitas de las distintas
        rutas en una única secuencia de visitas. Luego aplicamos el algoritmo según la bibliografía, y volvimos a separar
        las rutas respetando la cantidad de visitas de alguno de los padres elegido al azar.</p>
    <p>A continuación presentamos un ejemplo:</p>

    <?php $eer->eer_parents(); ?>
    <p>Generamos rutas temporales, en las que quitamos los bordes y concatenamos las visitas de la siguiente forma:</p>
    <?php $eer->eer_joined(); ?>

    <p>Una vez obtenida la ruta concatenada procedemos a generar el mapa de adyacencias, marcando con un signo menos aquellas adyacencias que estén en ambas rutas:</p>
    <?php $eer->eer_map(); ?>

    <p>Se elije un punto de inicio, en general el inicio de alguna de las dos rutas, y luego se van seleccionando las adyacencias según el mapa: las negativas tienen primera prioridad, y luego, aquellas cuyas adyacencias tengan menos enlaces disponibles.</p>
    <p>Por ejemplo, de partir del "3", la primera prioridad sería el "4" porque tiene un signo menos (está en ambas rutas), luego el "1" porque tiene 3 adyacencias, y por último el "2" porque tiene 4 adyacencias.</p>
    <p>Cada vez que se selecciona una visita se actualiza el mapa quitándola de todas sus adyacencias.</p>
    <p>Si no hay adyacencia para continuar, pero quedan elementos en el mapa, se elige uno al azar y se vuelve a comenzar.</p>

    <p>Empezando desde el "1" y manteniendo la distribución del padre 1, las siguientes son posibles soluciones finales:</p>

    <?php $eer->eer_children(); ?>

<?php print_section_footer(); ?>