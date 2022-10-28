<?php
include_once "./src/sections/libraries.php";
?>

<?php HTML_head("Page"); ?>

<?php printHeader(); ?>
<div class="content">



    <?php breadcrumb("/docs", "Breadcrumb"); ?>

    Colores:
    <!-- Coolors Palette Widget -->
    <script src="https://coolors.co/palette-widget/widget.js"></script>
    <script data-id="07113298128526133">new CoolorsPaletteWidget("07113298128526133", ["cc1f00","32292f","99e1d9","f0f7f4","70abaf"]); </script>

    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>

    <p>párrafo</p>

    <ol>
        <li>listado numerado</li>
        <li>listado numerado</li>
        <li>listado numerado</li>
    </ol>
    <ul>
        <li>listado no numerado</li>
        <li>listado no numerado</li>
        <li>listado no numerado</li>
    </ul>

    <p>Lorem impsum dolor sit amet. Ver tooltip en boton redondo con la letra i: <span data-toggletip>Esto es un tooltip</span></p>
    <div><a>link</a></div>
    <div><button>Botón default</button></div>

</div>
<?php footer(); ?>

<?php HTML_foot(); ?>