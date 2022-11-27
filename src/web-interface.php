<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("La interfaz administrativa"); ?>

<?php printHeader("La interfaz administrativa"); ?>

    <main id="main-content">
        <div class="content">

           <?php breadcrumb([['path' => "/docs/sitemap.html", 'title'=>"Índice"]]); ?>

            <h2>Ups! todavía no hay contenido acá</h2>
<!--            <p>párrafo</p>-->
            <div class="flex center">
                <img src="/docs/images/cafe.gif" alt="mientras esperas hacete un cafecito" style="max-width: 360px;">
            </div>
        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>