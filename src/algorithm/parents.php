<?php
$title = "Selección de padres";
$id = "parents";
?>

<?php print_section_heading($title, $id); ?>
    <h3>Aleatoria</h3>
    <p>Se seleccionan dos padres de la generación anterior de forma aleatoria. No se pone ningún criterio extra para elegir un padre bueno o malo. De esta manera, se permite que todas las soluciones que sobrevivieron la generación anterior tengan probabilidad de procrear.</p>
    <p>La idea detrás de esto, es que no podemos saber de antemano qué combinaciones van a dar los mejores hijos, entonces se permiten todas.</p>
    <h3>Por fitness para uno de los padres</h3>
    <p>Con una probabilidad baja permitimos una selección de padres en la que nos aseguramos que al menos uno de los padres tenga buen fitness. Tomamos uno de los padres del mejor 10% de las soluciones, y el otro de forma aleatoria. Esto lo hicimos a modo de prueba para evaluar la incidencia en el resultado final.</p>

<p todo> armar graficos comparativos</p>

<?php print_section_footer(); ?>