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

    <p>Llamamos <em>core</em> al servicio que desarrollamos para calcular las rutas de los médicos. Se trata de un ejecutable
    que interactúa con los demás servicios a través de una API Rest: el Backend envía las posiciones de los viajantes y las de todos
    los puntos a visitar, y las distancias entre todos los puntos al servicio del core, y este utiliza esos datos para
    devolver luego el orden en que deben recorrerse los puntos. </p>
    <p>Al recibir los datos para calcular las mejores rutas del backend, el core dispara varias ejecuciones con características
        distintas en paralelo para encontrar posibles rutas para los médicos laborales. Esas soluciones serán devueltas al
    Backend para continuar con el ciclo del programa.</p>

    <h2>A continuación</h2>

    <ul>
        <li><a href="/docs/core/languages.html">Selección del lenguaje para el desarrollo del core</a></li>
        <li><a href="/docs/core/algorithm.html">El algoritmo genético</a></li>
        <li><a href="/docs/core/specs.html">Especificaciones técnicas</a></li>
    </ul>


</div>
</main>

<?php footer(); ?>

<?php HTML_foot(); ?>