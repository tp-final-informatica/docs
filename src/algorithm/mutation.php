<?php

include_once "./src/algorithm/solutions/Mutation.php";

$title = "Mutación";
$id = "mutation";

function DM() {
    print('<a href="#dm"><abbr title="Displacement Mutation">DM</abbr></a>');
}
function RSM() {
    print('<a href="#rsm"><abbr title="Reverse Sequence Mutation">RSM</abbr></a>');
}
function PSM() {
    print('<a href="#psm"><abbr title="Partially Shuffled Mutation">PSM</abbr></a>');
}
function JM() {
    print('<a href="#jm"><abbr title="Jump Mutation">JM</abbr></a>');
}
function JDM() {
    print('<a href="#jdm"><abbr title="Jump Displacement Mutation">JDM</abbr></a>');
}
function JRSM() {
    print('<a href="#jrsm"><abbr title="Jump Reverse Sequence Mutation">JRSM</abbr></a>');
}
function JPSM() {
    print('<a href="#jpsm"><abbr title="Jump Partially Shuffled Mutation">JPSM</abbr></a>');
}
function ERM() {
    print('<a href="#erm"><abbr title="Empty Route Mutation">ERM</abbr></a>');
}
function REM() {
    print('<a href="#rem"><abbr title="Reduce Entropy Mutation">REM</abbr></a>');
}


?>

<?php
    $mutation_index = new Index(['id'=>$id, 'value'=>$title], [
        ['id'=> "dm", 'value' => 'TWORS/Displacement mutation (<abbr title="Displacement Mutation">DM</abbr>)'],
        ['id'=> "rsm", 'value' => 'Reverse sequence mutation (<abbr title="Reverse Sequence Mutation">RSM</abbr>)'],
        ['id'=> "psm", 'value' => 'Partially shuffled mutation (<abbr title="Partially Shuffled Mutation">PSM</abbr>)'],
        ['id'=> "jm", 'value' => 'Jump mutation (<abbr title="Jump Mutation">JM</abbr>)'],
        ['id'=> "jdm", 'value' => 'Jump displacement mutation (<abbr title="Jump Displacement Mutation">JDM</abbr>)'],
        ['id'=> "jrsm", 'value' => 'Jump reverse sequence mutation (<abbr title="Jump Reverse Sequence Mutation">JRSM</abbr>)'],
        ['id'=> "jpsm", 'value' => 'Jump partially shuffled mutation (<abbr title="Jump Partially Shuffled Mutation">JPSM</abbr>)'],
        ['id'=> "erm", 'value' => 'Empty route mutation <span todo>Nuevo!</span> (<abbr title="Empty Route Mutation">ERM</abbr>)'],
        ['id'=> "rem", 'value' => 'Reduce Entropy Mutation <span todo>Nuevo!</span> (<abbr title="Reduce Entropy Mutation">REM</abbr>)']
    ])
?>

<?php //print_section_heading($title, $id); ?>
<?php $mutation_index->section_heading(); ?>

    <p>
        Dentro del algoritmo genético, el proceso de mutación evita que las soluciones obtenidas se concentren todas en
        un mismo óptimo local. Las mutaciones insertan diversidad, incorporando estructuras genéticas nuevas a la población.
    </p>

    <p>Las siguientes son las distintas mutaciones que aplicamos en la ejecución de nuestro algoritmo genético.</p>

    <?php $mutation_index->print_index(true); ?>

    <p>Las primeras tres mutaciones mencionadas fueron obtenidas de la bibliografía <span data-toggletip>En especial,
        de estos papers: "Analyzing the Performance of Mutation Operators to Solve the Traveling Salesman Problem",
        y "Genetic Algorithms for the Traveling Salesman Problem: A Review of Representations and Operations".</span>
        y son muy conocidas dentro del tema, por lo que su explicación no será detallada en profundidad este informe.
    </p>
    <p>Las siguientes cuatro mutaciones son adaptaciones que realizamos de las mutaciones anteriores, considerando nuestro
        problema de múltiples viajeros con distintas rutas.
    </p>
    <p todo>Las últimas mutaciones (<?php ERM(); ?> y <?php REM(); ?>) fueron agregadas para ayudar al algoritmo en
        casos especiales.</p>


    <p todo>Las mutaciones se aplican a cada solución, si el rate de mutación se cumple. Esto implica que por cada solución a mutar
        podemos obtener hasta 8 variantes, que luego serán seleccionadas o descartadas según el <a href="#survivors">criterio de supervivencia</a>.</p>
<!--    <p todo>En realidad estoy pensando en dirigir las mutaciones según los mejores resultados. graficar</p>-->

    <?php $mutation_index->section_subheading_by_id("dm"); ?>
<!--    <h3 id="dm">TWORS/Displacement mutation (DM)</h3>-->
    <?php $mutation = new Mutation(); ?>
    <p>Se intercambia la posición de dos visitas en una misma ruta dentro de un cromosoma, elegidas de forma aleatoria.
        Se presenta un ejemplo para clarificar la aplicación de esta mutación:</p>
    <p>Secuencia de visitas antes de la mutación:</p>
    <?php $mutation->dmBefore(); ?>
    <p>Secuencia de visitas después de la mutación <?php DM(); ?>:</p>
    <?php $mutation->dmAfter(); ?>

    <?php linkBibliografía(); ?>

    <?php $mutation_index->link_back_to_index(); ?>
    <?php $mutation_index->section_subheading_by_id("rsm"); ?>

<!--    <h3 id="rsm">RSM - Reverse sequence mutation</h3>-->
    <p>En este caso, se trata de seleccionar una sub secuencia dentro de una ruta en un cromosoma, e invertir el orden de
        la misma. Por ejemplo, dada la secuencia:</p>
    <?php $mutation->rsmBefore(); ?>
    <p>Una posible mutación es invertir los ítems <span class="mono">1,2,3</span> de manera que la secuencia final sea la siguiente:</p>
    <?php $mutation->rsmAfter(); ?>
    <?php linkBibliografía(); ?>

<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("psm"); ?>
<!--    <h3 id="psm">PSM - Partially shuffled mutation</h3>-->
    <p>Similar al caso anterior, se selecciona una sub secuencia dentro de una ruta en un cromosoma, pero esta vez
        se ordenan los elementos de forma aleatoria. Por ejemplo:</p>
    <?php $mutation->psmBefore(); ?>
    <p>La sub secuencia <span class="mono">1,2,3</span> es elegida para ser desordenada, y el resultado es el siguiente:</p>
    <?php $mutation->psmAfter(); ?>
    <?php linkBibliografía(); ?>

<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("jm"); ?>
<!--    <h3 id="jm">Desplazamiento de visita a ruta alternativa: Jump mutation (JM)</h3>-->

    <p>Esta mutación se aplica a cromosomas con más de dos rutas. Primero elegimos aleatoriamente dos de ellas, una será
        donante y la otra receptora. Luego, elegimos (también) aleatoriamente una visita dentro de la ruta donante y la
        llevamos a una posición aleatoria en la ruta receptora. Visto que la visita "salta" entre rutas, nos pareció
        adecuado nombrar Jump Mutation a esta mutación.</p>
    <p>En el ejemplo a continuación mostramos una solución compuesta de dos rutas, <span mono>A</span> y <span mono>B</span>.</p>
    <?php $mutation->jmBefore(); ?>
    <p>Seleccionamos la visita <span mono>1</span> para saltar entre las rutas, y la ubicamos entre las visitas
        <span mono>6</span> y <span mono>7</span> de la ruta contraria:</p>
    <?php $mutation->jmAfter(); ?>

<?
sectionLightbulb("Lecciones aprendidas",
    '<p>
Si bien esta mutación es muy sencilla, resultó ser de vital importancia en el desarrollo de nuestro algoritmo
            genético, puesto que es la primera mutación que presentamos en la que los cambios no están limitados a una única ruta.
            Esto es porque las mutaciones anteriores fueron desarrolladas pensando en el problema del viajante simple, en el
            que sólo se trata de optimizar una única ruta. En nuestro caso, esta mutación surgió a modo de prueba y
            nos proporcionó muy buenos resultados, por lo que decidimos luego extender las mutaciones 
            <a href="#dm"><abbr title="Displacement Mutation">DM</abbr></a>,
            <a href="#rsm"><abbr title="Reverse Sequence Mutation">RSM</abbr></a> y 
            <a href="#psm"><abbr title="Partial Shuffled Mutation">DM</abbr></a> para variar los cromosomas entre rutas también.
            </p>');
?>

    <p todo>poner graficos comparativos</p>


<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("jdm"); ?>
<!--    <h3 id="jdm">Jump Displacement Mutation (JDM)</h3>-->
    <p>Esta mutación es una variante de <?php DM(); ?>, en la que efectuamos el intercambio de visitas entre rutas distintas (si
        tenemos más de una ruta). Por Ejemplo, dada una solución:</p>
        <?php $mutation->jdmBefore(); ?>
        <p>Una posible mutación es invertir las posiciones de las visitas <span mono>1</span> y <span mono>6</span> que se
        encuentran en rutas ditintas:</p>
        <?php $mutation->jdmAfter(); ?>


<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("jrsm"); ?>
<!--    <h3 id="jrsm">Jump RSM (JRSM)</h3>-->
    <p>Para adaptar <?php RSM(); ?> a nuestro problema de múltiples rutas, decidimos aplicar el algoritmo nuevamente en
    dos partes: primero seleccionar una sub secuencia dentro de una ruta, quitarla de la ruta original e invertir el orden
    de sus elementos, para luego incorporar dicha secuencia en un punto aleatorio de otra ruta de la misma solución.
    Ver el ejemplo a continuación:</p>
    <?php $mutation->jrsmBefore(); ?>
    <p>El siguiente es un resultado final posible:</p>
    <?php $mutation->jrsmAfter(); ?>


<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("jpsm"); ?>
<!--    <h3 id="jpsm">PSM entre rutas (JPSM)</h3>-->
    <p>Al igual que en el caso anterior, para poder adaptar <?php JPSM(); ?> mejor a nuestro problema, aplicamos parte
    del algoritmo a una ruta, y el resto a otra ruta dentro de la misma solución. Por ejemplo, seleccionamos las
    visitas <span mono>2,3,4</span> de la ruta <span mono>A</span>:</p>
    <?php $mutation->jpsmBefore(); ?>
    <p>Cambiamos el orden de los elementos de forma aleatoria, por ejemplo: <span mono>3,2,4</span>, e insertamos
    esta secuencia en un punto aleatorio dentro de otra ruta de la misma solución:</p>
    <?php $mutation->jpsmAfter(); ?>

<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("erm"); ?>
<!--    <h3 id="erm">Empty route mutation (ERM) <span todo>Nuevo!</span></h3>-->
    <p>Esta mutación fue agregada para ayudar al algoritmo en las ejecuciones no balanceadas. Esto es porque las mutaciones
        y crossovers disponibles hasta el momento de desarrollarla no favorecían este tipo de ejecuciones, es decir, era poco probable que
        devolvieran rutas vacías.</p>
    <p>Se elige una ruta al azar dentro de la solución, y se vacía completamente. Los elementos que se quitaron de esa ruta se reparten
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
        máximo de visitas razonables por médico en una jornada laboral. Si eso sucede, la solución será penalizada.</p>

<?php $mutation_index->link_back_to_index(); ?>
<?php $mutation_index->section_subheading_by_id("rem"); ?>
<!--    <h3 id="rem">Reduce Entropy Mutation (REM) <span todo>Nuevo!</span></h3>-->
    <p>Inspirados en los procesos naturales que llevan grupos de elementos al equilibrio reduciendo la entropía (en términos de
        <em>grado de desorden</em>) del grupo,
    como por ejemplo un cuerpo celeste que tiende a ser atraído a otro con masa gravitacional mayor, o la forma en que la arena
        ocupa los espacios entre piedras más grandes en un frasco, diseñamos esta mutación
    con la intención de ayudar al algoritmo a encontrar mejores soluciones reduciendo un poco el caos de la asignación aleatoria.</p>
    <p>El caso en particular en que pensamos, es el que una ruta posee una visita que claramente sería más razonable que esté en otra ruta.
    Hay ocasiones en las que ese cambio lleva muchas iteraciones o mismo nunca llega a producirse mediante los crossovers
    y mutaciones disponibles.<p>
    <p>En resumidas palabras, esta mutación es muy similar a <? JDM(); ?>, pero con un poco menos de aleatoriedad.</p>
    <p>
        La nueva mutación propuesta se compone de los siguientes pasos:</p>
    <ul>
        <li>se elige aleatoriamente una ruta a quien quitarle una visita, que tenga al menos una visita</li>
        <li>dentro de la ruta elegida, <em>se selecciona la visita que esté más lejos del inicio o fin de la ruta</em></li>
        <li>se quita esa visita de la ruta donante</li>
        <li>se elige dentro de las rutas restantes, <em>aquella que esté más cerca de la visita eliminada</em></li>
        <li>se inserta la visita en la nueva ruta elegida, en un lugar aleatorio.</li>
    </ul>

    <p></p>

<?php $mutation_index->link_back_to_index(); ?>




<?php print_section_footer(); ?>