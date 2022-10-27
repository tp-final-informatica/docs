<?php

include_once "./src/html.php";
include_once "./src/header.php";
include_once "./src/footer.php";
?>

<?php HTML_head("Page"); ?>

<?php printHeader(); ?>
<div class="content">
    ...
    <!-- Coolors Palette Widget -->
    <script src="https://coolors.co/palette-widget/widget.js"></script>
    <script data-id="07113298128526133">new CoolorsPaletteWidget("07113298128526133", ["cc1f00","32292f","99e1d9","f0f7f4","70abaf"]); </script>

    <h2>Algoritmo empleado</h2>
    <p>El algoritmo genético consta de las siguientes partes</p>
    <ol>
        <li>Definición de cromosoma</li>
        <li>Armado de población inicial</li>
        <li>Definición de función de fitness</li>
        <li>Selección de padres</li>
        <li>Crossover</li>
        <li>Mutación</li>
        <li>Selección de soluciones sobrevivientes</li>
        <li>Criterio de finalización</li>
    </ol>

    <p>La definición de cada uno de estos pasos nos provee distintos resultados finales para resolver el problema.</p>
    </div>
</div>
<?php footer(); ?>

<?php HTML_foot(); ?>