<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("El core"); ?>

<?php printHeader("El core"); ?>

<main id="main-content">
<div class="content">

    <?php breadcrumb([
//        ['path' => "/docs", 'title'=>"Inicio"],
        ['path' => "/docs/sitemap.html", 'title'=>"Índice"]]); ?>

    <p>Llamamos <em>core</em> al servicio que desarrollamos para calcular las rutas de los médicos. Recibe el listado de
        puntos (pacientes y médicos) y las distancias entre estos via una API Rest; y devuelve el orden en que cada viajante
        debe recorrerlos. </p>
    <p>El core propone tres soluciones distintas en base a distintos criterios que se explicarán más adelante, para ser
        presentados al administrador web y que este pueda seleccionar la que mejor le parezca según el caso.</p>

    <h2>A continuación</h2>

    <ul>
        <li><a href="/docs/core/languages.html">Selección del lenguaje para el desarrollo del core</a></li>
        <li><a href="/docs/core/algorithm.html">El algoritmo genético</a></li>
        <li><a href="/docs/core/specs.html">Especificaciones técnicas</a></li>
<!--        <li><a href="/docs/core/data.html">Análisis de datos obtenidos</a></li>-->
    </ul>




</div>


</main>

<?php footer(); ?>

<?php HTML_foot(); ?>