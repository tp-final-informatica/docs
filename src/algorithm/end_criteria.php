<?php
$title = "Criterio de finalización";
$id = "end-criteria";
?>

<?php print_section_heading($title, $id); ?>
<p>Es esperado en este tipo de algoritmos definir un límite de tiempo o un límite de iteraciones para considerar
finalizada la ejecución. En nuestro caso, decidimos considerar un límite de iteraciones por ejecución, con la salvedad de
que el algoritmo esté en una buena <em>racha</em> y todavía encuentre buenas soluciones aún acercándose al límite de los loops:</p>
<p>Nuestro algoritmo evalúa una cantidad de iteraciones antes de terminar cuál es la mejor solución encontrada, y si supera
esa solución antes de llegar al límite, se extiende la ejecución unas iteraciones más.</p>


<?php print_section_footer(); ?>