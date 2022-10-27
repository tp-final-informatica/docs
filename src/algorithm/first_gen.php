<?php
$title = "Armado de población inicial";
$id = "first-gen";
?>

<?php print_section_heading($title, $id); ?>
    <p>Se distribuyen las visitas en N rutas (por N viajantes) de forma <b>aleatoria</b> y se asignan a cada solución. Esto garantiza un pool genético grande, pero no soluciones buenas. Las soluciones suelen amarse intentando mantener balanceada la cantidad de visitas por ruta.</p>
<?php print_section_footer(); ?>