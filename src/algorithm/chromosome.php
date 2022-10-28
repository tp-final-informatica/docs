<?php
$title = "Definición de cromosoma";
$id = "chromosome";
?>

<?php print_section_heading($title, $id); ?>

<p>La definición del cromosoma a utilizar en el algoritmo genético no es trivial. Ella condiciona los pasos siguientes del algoritmo genético, en tanto los crossovers y mutaciones deben operar sobre este cromosoma.</p>
<p>Nuestra elección fue plantear de forma natural cada camino como una secuencia de visitas numeradas, desde inicio al fin. Entonces, para un viajante que sale del punto 0 y vuelve al punto 0, visitando los puntos 1,2,3 el cromosoma planteado es:</p>

<p class="center">{ [0, 1, 2, 3, 0] }</p>

<p>Extendiendo el ejemplo anterior, para dos viajantes, que parten del punto 0, pero regresan uno al punto 0 y el otro al punto 1, y recorren los puntos 2, 3, 4 y 5, 6, 7 respectivamente, el cromosoma planteado es</p>
<p class="center">{ [0, 1, 2, 3, 0], [0, 4, 5, 6, 1] }</p>

<p>
    Esta representación de las rutas tiene la menor redundancia de soluciones en comparación a otros métodos de armado de cromosomas, es decir, un cromosoma no puede interpretarse como más de una secuencia de rutas.
    <span data-toggletip>Basado en el paper "Genetic Algorithm for solving multiple traveling salesmen problem using a new crossover and population generation" (ver sección Bibliografía).</span>
</p>



<?php print_section_footer(); ?>