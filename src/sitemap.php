<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Índice"); ?>

<?php printHeader(); ?>
<div class="content">

    <h2>Índice</h2>

    <ol>
        <li><a href="/docs/index.html">Carátula</a></li>
        <li>El core
        <ol>
            <li><a href="/docs/core-languages.html">Comparación de lenguajes para el desarrollo del algoritmo</a></li>
            <li><a href="/docs/algorithm.html">El algoritmo empleado</a></li>
        </ol>
        </li>
        <li>La interfaz administrativa</li>
        <li>Las aplicaciones mobile</li>
        <li>El backend integrador</li>
        <li>Información complementaria</li>

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