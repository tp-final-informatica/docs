<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("El backend integrador"); ?>

<?php printHeader("El backend integrador"); ?>

    <main id="main-content">
        <div class="content">

           <?php breadcrumb([['path' => "/docs/sitemap.html", 'title'=>"Índice"]]); ?>

            <h2>Ups! todavía no hay contenido acá</h2>
<!--            <p>párrafo</p>-->
            <div class="flex center">
                <img src="/docs/images/agua.gif" alt="no olvides tomar dos litros de agua por día!">
            </div>
        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>