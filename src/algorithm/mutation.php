<?php

include_once "./src/algorithm/solutions/Mutation.php";

$title = "Mutación";
$id = "mutation";

function DM() {
    print('<abbr title="Displacement Mutation">DM</abbr>');
}
function RSM() {
    print('<abbr title="Reverse Sequence Mutation">RSM</abbr>');
}
function PSM() {
    print('<abbr title="Partially Shuffled Mutation">PSM</abbr>');
}
function JM() {
    print('<abbr title="Jump Mutation">JM</abbr>');
}
function JDM() {
    print('<abbr title="Jump Displacement Mutation">JDM</abbr>');
}
function JRSM() {
    print('<abbr title="Jump Reverse Sequence Mutation">JSM</abbr>');
}
function JPSM() {
    print('<abbr title="Jump Partially Shuffled Mutation">JPSM</abbr>');
}
function ERM() {
    print('<abbr title="Empty Route Mutation">ERM</abbr>');
}

?>

<?php print_section_heading($title, $id); ?>

    <p>
        Dentro del algoritmo genético, el proceso de mutación evita que las soluciones obtenidas se concentren todas en
        un mismo óptimo local. Las mutaciones insertan diversidad, incorporando estructuras genéticas nuevas a la población.
    </p>

    <p>Las siguientes son las distintas mutaciones que aplicamos en la ejecución de nuestro algoritmo genético.</p>
    <ol>
        <li>TWORS/Displacement mutation (<?php DM(); ?>)</li>
        <li>Reverse sequence mutation (<?php RSM(); ?>)</li>
        <li>Partially shuffled mutation (<?php PSM(); ?>)</li>
        <li>Jump mutation (<?php JM(); ?>)</li>
        <li>Jump displacement mutation (<?php JDM(); ?>)</li>
        <li>Jump reverse sequence mutation (<?php JRSM(); ?>)</li>
        <li>Jump partially shuffled mutation (<?php JPSM(); ?>)</li>
        <li>Empty route mutation (<?php ERM(); ?>) <span todo>Nuevo!</span></li>
    </ol>

    <p>Las primeras tres mutaciones mencionadas fueron obtenidas de la bibliografía <span data-toggletip>En especial,
        de estos papers: "Analyzing the Performance of Mutation Operators to Solve the Traveling Salesman Problem",
        y "Genetic Algorithms for the Traveling Salesman Problem: A Review of Representations and Operations".</span>
        y son muy conocidas dentro del tema, por lo que su explicación no será detallada en profundidad este informe.
    </p>
    <p>Las siguientes cuatro mutaciones son adaptaciones que realizamos de las mutaciones anteriores, considerando nuestro
        problema de múltiples viajeros con distintas rutas.
    </p>
    <p todo>La última mutación (<?php ERM(); ?>) fue agregada para ayudar al algoritmo en las ejecuciones no balanceadas.</p>


    <p todo>Las mutaciones se aplican a cada solución, si el rate de mutación se cumple. Esto implica que por cada solución a mutar
        podemos obtener hasta 8 variantes, que luego serán seleccionadas o descartadas según el <a href="#survivors">criterio de supervivencia</a>.</p>
<!--    <p todo>En realidad estoy pensando en dirigir las mutaciones según los mejores resultados. graficar</p>-->

    <h3>TWORS/Displacement mutation (DM)</h3>
    <?php $mutation = new Mutation(); ?>
    <p>Se intercambia la posición de dos visitas en una misma ruta dentro de un cromosoma, elegidas de forma aleatoria.
        Se presenta un ejemplo para clarificar la aplicación de esta mutación:</p>
    <p>Secuencia de visitas antes de la mutación:</p>
    <?php $mutation->dmBefore(); ?>
    <p>Secuencia de visitas después de la mutación <?php DM(); ?>:</p>
    <?php $mutation->dmAfter(); ?>

    <?php linkBibliografía(); ?>

    <h3>RSM - Reverse sequence mutation</h3>
    <p>En este caso, se trata de seleccionar una sub secuencia dentro de una ruta en un cromosoma, e invertir el orden de
        la misma. Por ejemplo, dada la secuencia:</p>
    <?php $mutation->rsmBefore(); ?>
    <p>Una posible mutación es invertir los ítems <span class="mono">1,2,3</span> de manera que la secuencia final sea la siguiente:</p>
    <?php $mutation->rsmAfter(); ?>
    <?php linkBibliografía(); ?>

    <h3>PSM - Partially shuffled mutation</h3>
    <p>Similar al caso anterior, se selecciona una sub secuencia dentro de una ruta en un cromosoma, pero esta vez
        se ordenan los elementos de forma aleatoria. Por ejemplo:</p>
    <?php $mutation->psmBefore(); ?>
    <p>La sub secuencia <span class="mono">1,2,3</span> es elegida para ser desordenada, y el resultado es el siguiente:</p>
    <?php $mutation->psmAfter(); ?>
    <?php linkBibliografía(); ?>

    <h3>Desplazamiento de visita a ruta alternativa: Jump mutation (JM)</h3>

    <p>Esta mutación se aplica a cromosomas con más de dos rutas. Primero elegimos aleatoriamente dos de ellas, una será
        donante y la otra receptora. Luego, elegimos (también) aleatoriamente una visita dentro de la ruta donante y la
        llevamos a una posición aleatoria en la ruta receptora. Visto que la visita "salta" entre rutas, nos pareció
        adecuado nombrar Jump Mutation a esta mutación.</p>
    <p>En el ejemplo a continuación mostramos una solución compuesta de dos rutas, <span mono>A</span> y <span mono>B</span>.</p>
    <?php $mutation->jmBefore(); ?>
    <p>Seleccionamos la visita <span mono>1</span> para saltar entre las rutas, y la ubicamos entre las visitas
        <span mono>6</span> y <span mono>7</span> de la ruta contraria:</p>
    <?php $mutation->jmAfter(); ?>
    <section class="lessons"  aria-label="Lecciones aprendidas">
        <p><span class="lightbulb"></span>Si bien esta mutación es muy sencilla, resultó ser de vital importancia en el desarrollo de nuestro algoritmo
            genético, puesto que es la primera mutación que presentamos en la que los cambios no están limitados a una única ruta.
            Esto es porque las mutaciones anteriores fueron desarrolladas pensando en el problema del viajante simple, en el
            que sólo se trata de optimizar una única ruta. En nuestro caso, esta mutación surgió a modo de prueba y
            nos proporcionó muy buenos resultados, por lo que decidimos luego extender las mutaciones <?php DM(); ?>,
            <?php RSM(); ?> y <?php PSM(); ?> para variar los cromosomas entre rutas también.</p>
    </section>


    <p todo>poner graficos comparativos</p>

    <h3>Jump Displacement Mutation (JDM)</h3>
    <p>Esta mutación es una variante de <?php DM(); ?>, en la que efectuamos el intercambio de visitas entre rutas distintas (si
        tenemos más de una ruta). Por Ejemplo, dada una solución:</p>
        <?php $mutation->jdmBefore(); ?>
        <p>Una posible mutación es invertir las posiciones de las visitas <span mono>1</span> y <span mono>6</span> que se
        encuentran en rutas ditintas:</p>
        <?php $mutation->jdmAfter(); ?>

    <h3>Jump RSM (JRSM)</h3>
    <p>Para adaptar <?php RSM(); ?> a nuestro problema de múltiples rutas, decidimos aplicar el algoritmo nuevamente en
    dos partes: primero seleccionar una sub secuencia dentro de una ruta, quitarla de la ruta original e invertir el orden
    de sus elementos, para luego incorporar dicha secuencia en un punto aleatorio de otra ruta de la misma solución.
    Ver el ejemplo a continuación:</p>
    <?php $mutation->jrsmBefore(); ?>
    <p>El siguiente es un resultado final posible:</p>
    <?php $mutation->jrsmAfter(); ?>

    <h3>PSM entre rutas (JPSM)</h3>
    <p>Al igual que en el caso anterior, para poder adaptar <?php JPSM(); ?> mejor a nuestro problema, aplicamos parte
    del algoritmo a una ruta, y el resto a otra ruta dentro de la misma solución. Por ejemplo, seleccionamos las
    visitas <span mono>2,3,4</span> de la ruta <span mono>A</span>:</p>
    <?php $mutation->jpsmBefore(); ?>
    <p>Cambiamos el orden de los elementos de forma aleatoria, por ejemplo: <span mono>3,2,4</span>, e insertamos
    esta secuencia en un punto aleatorio dentro de otra ruta de la misma solución:</p>
    <?php $mutation->jpsmAfter(); ?>

    <h3>Empty route mutation (ERM) <span todo>Nuevo!</span></h3>
    <p>Esta mutación fue agregada para ayudar al algoritmo en las ejecuciones no balanceadas. Esto es porque las mutaciones
        y crossovers disponibles hasta el momento de desarrollarla no favorecían este tipo de ejecuciones, es decir, era poco probable que
        devolvieran rutas vacías.</p>
    <p>Se elige una ruta dentro de la solución, y se vacía completamente. Los elementos que se quitaron de esa ruta se reparten
    equitativamente entre las rutas restantes. Por ejemplo, para una solución de 4 rutas:</p>
    <?php $mutation->ermBefore(4); ?>
    <p>Si vaciamos por ejemplo la tercera ruta, la nueva solución podría verse de esta forma:</p>
    <?php $mutation->ermAfter(4); ?>
    <p>Este tipo de mutación aporta valor para aquellas soluciones de múltiples rutas. En casos donde las soluciones tengan pocas
    rutas, es posible que las soluciones nuevas propuestas sean de menor valor por generar rutas muy largas. Por ejemplo, ver las rutas presentadas a continuación:</p>

    <?php $mutation->ermBefore(2); ?>
    <p>Luego de la mutación, las rutas podrían ser de esta manera:</p>
    <?php $mutation->ermAfter(2); ?>
    <p>En este caso, por ser dos rutas, una ruta queda con todas las visitas. Esto puede ser contraproducente si supera el
        maximo de visitas razonables por médico en una jornada laboral. Si eso sucede, la solución será penalizada.</p>

<?php print_section_footer(); ?>