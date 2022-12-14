<?php
include_once "./src/algorithm/solutions/Solution.php";

$title = "Definición de cromosoma";
$id = "chromosome";
?>

<?php print_section_heading($title, $id); ?>

<p>La definición del cromosoma a utilizar en el algoritmo genético no es trivial. Ella condiciona los pasos siguientes del algoritmo genético, en tanto los crossovers y mutaciones deben operar sobre este cromosoma.</p>
    <p>Nuestra elección fue plantear de forma natural cada camino como una secuencia de visitas numeradas, desde inicio al fin. Entonces, para un viajante que sale del punto 0 y vuelve al punto 0, visitando los puntos <span class="mono">[1,2,3]</span> el cromosoma planteado es:</p>

<div class="solution flex">
    <?php
    $solution = new Solution();
    $solution->printRoute(
        [0, 1, 2, 3, 0],
        [],
        WHITE
    );

    ?>
</div>


<p>Extendiendo el ejemplo anterior, para dos viajantes, que parten del punto 0, pero regresan uno al punto 0 y el otro al punto 1, y recorren los puntos <span class="mono">[2,3]</span> y <span class="mono">[4,5]</span> respectivamente, el cromosoma planteado es:</p>

    <div class="solution flex wrap gap3">
        <?php
//        $solution->printRoute(
//            [0, 2, 3, 0],
//            [],
//            WHITE
//        );
//
//        $solution->printRoute(
//            [0, 4, 5, 1],
//            [],
//            WHITE
//        );

        $solution->printSolution("", [0, 2, 3, 0],[0, 4, 5, 1], [] , [], [], WHITE);
        ?>

    </div>

<p>
    Esta representación de las rutas tiene la menor redundancia de soluciones en comparación a otros métodos de armado de cromosomas, es decir, un cromosoma no puede interpretarse como más que una única secuencia de rutas.
    <span data-toggletip>Basado en el paper "Genetic Algorithm for solving multiple traveling salesmen problem using a new crossover and population generation" (ver sección Bibliografía).</span>
</p>



<?php print_section_footer(); ?>