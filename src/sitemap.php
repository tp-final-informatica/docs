<?php
include_once "./src/sections/libraries.php";
?>

<?php HTML_head("Page"); ?>

<?php printHeader(); ?>
<div class="content">

    <h2>Índice</h2>

    <ol>
        <li><a href="/docs/index.html">Inicio</a></li>
        <li><a href="/docs/algorithm.html">El algoritmo empleado</a></li>
        <li><a href="/docs/literature.html">Bibliografía consultada</a></li>

    </ol>

    <?php if(localdevonly()): ?>
        <h2>Índice DEV (local)</h2>
        <ol>
            <li><a href="/docs/page.html">Herramientas para la página de docs.</a></li>
        </ol>
    <?php endif; ?>
</div>
<?php footer(); ?>

<?php HTML_foot(); ?>