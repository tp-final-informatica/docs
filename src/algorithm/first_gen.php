<?php
$title = "Armado de población inicial";
$id = "first-gen";
?>

<?php print_section_heading($title, $id); ?>
    <p>Dada <span class="mono">N</span> la cantidad de viajantes, se distribuyen las visitas en <span class="mono">N</span> rutas de forma <b>aleatoria</b> y se asignan a cada solución. Esto garantiza un pool genético grande, pero no soluciones buenas.</p>
    <p>El único criterio para la formación de las soluciones es mantener balanceada la cantidad de visitas por ruta.</p>
<?php print_section_footer(); ?>