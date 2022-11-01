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
    que interactúa con los demás servicios a través de una API Rest.</p>
    <p>Al recibir los datos para calcular las mejores rutas del backend, el core dispara varias ejecuciones en paralelo para
    encontrar posibles rutas para los médicos laborales.</p>

    <h2>A continuación</h2>
<!--    <h3>Heading 3</h3>-->
<!--    <h4>Heading 4</h4>-->
<!--    <h5>Heading 5</h5>-->
<!--    <h6>Heading 6</h6>-->
<!---->
<!--    <p>párrafo</p>-->


    <ul>
        <li><a href="/docs/core-languages.html">Selección del lenguaje para el desarrollo del core</a></li>
        <li><a href="/docs/algorithm.php">El algoritmo genético</a></li>
        <li>Especificaciones técnicas</li>
    </ul>

<!--    <p>Lorem impsum dolor sit amet: <span class="mono">texto en monospace</span>. Ver tooltip en boton redondo con la letra i: <span data-toggletip>Esto es un tooltip</span></p>-->
<!--    <div><a>link</a></div>-->
<!--    <div><button>Botón default</button></div>-->

<!--    --><?php //nextRead("/docs/core-languages.html", "Comparación de lenguajes para el desarrollo del algoritmo") ?>

</div>
</main>

<?php footer(); ?>

<?php HTML_foot(); ?>