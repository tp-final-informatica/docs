<?php

include_once "./src/algorithm/solutions/Mutation.php";

$title = "Mutación";
$id = "mutation";
?>

<?php print_section_heading($title, $id); ?>

    <p>
        Dentro del algoritmo genético, la mutación evita que las soluciones obtenidas se concentren todas en un mismo óptimo
        local. Las mutaciones insertan diversidad, incorporando estructuras genéticas nuevas a la población.
    </p>

    <p>Las siguientes mutaciones se aplican de forma equiprobable, sólo una a cada solución, si el rate de mutación se cumple.</p>
    <p todo>En realidad estoy pensando en dirigir las mutaciones según los mejores resultados. graficar</p>

    <h3>TWORS/Displacement mutation (DM)</h3>
    <?php $mutation = new Mutation(); ?>
    <p>Se trata de intercambiar la posición de dos visitas en una misma ruta elegidas de forma aleatoria.</p>

    <?php $mutation->dm(); ?>

    <h3>RSM - Reverse sequence mutation</h3>
    <p>En este caso, se trata de seleccionar una sub secuencia dentro de una ruta en un cromosoma, e invertir el orden de la misma.</p>
    <?php $mutation->rsm(); ?>
    <h3>PSM - Partially shuffled mutation</h3>
    <p>Similar al caso anterior, se selecciona una sub secuencia dentro de una ruta en un cromosoma, y se ordenan los elementos
        de forma aleatoria.</p>
    <?php $mutation->psm(); ?>

    <h3>Desplazamiento de visita a ruta alternativa: Jump mutation (JM)</h3>
    <p>Elegimos aleatoriamente dos rutas, una será donante y la otra receptora.</p>
    <p>Luego, elegimos aleatoriamente una visita dentro de la ruta donante y la llevamos a una posición aleatoria en la ruta receptora.</p>
    <?php $mutation->jm(); ?>

    <h3>DM entre rutas (JDM)</h3>
    <p todo>Completar</p>

    <h3>RSM entre rutas (JRSM)</h3>
    <p todo>Completar</p>

    <h3>PSM entre rutas (JPSM)</h3>
<p todo>Completar</p>

<?php print_section_footer(); ?>