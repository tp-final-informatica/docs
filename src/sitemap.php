<?php
include_once "./src/utils/libraries.php";

?>

<?php HTML_head("Índice"); ?>

<?php printHeader(); ?>

<main id="main-content">
<div class="content">

    <?php breadcrumb([['path' => "/docs", 'title'=>"Inicio"]]); ?>

    <h2>Índice</h2>

    <?php printSitemap(); ?>


    <?php if(localdevonly()): ?>
        <h2>Índice DEV (local)</h2>
        <ol>
            <li><a href="/docs/page.html">Herramientas para la página de docs.</a></li>
        </ol>
    <?php endif; ?>
</div>
</main>
<?php footer(); ?>

<?php HTML_foot(); ?>