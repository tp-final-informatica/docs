<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Información complementaria"); ?>

<?php printHeader("Información complementaria"); ?>

    <main id="main-content">
        <div class="content">

           <?php breadcrumb([['path' => "/docs/sitemap.html", 'title'=>"Índice"]]); ?>

            <h2>Ups! todavía no hay contenido acá</h2>
<!--            <p>párrafo</p>-->
            <div class="flex center">
                <img src="/docs/images/mate.gif" alt="mientras esperas hacete un matecito" style="max-width: 360px;">
            </div>
        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>