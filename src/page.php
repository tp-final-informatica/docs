<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Page"); ?>

<?php printHeader(); ?>

<main id="main-content">
<div class="content">



    <?php breadcrumb([
        ['path' => "/docs", 'title'=>"Breadcrumb1"],
        ['path' => "/docs", 'title'=>"Breadcrumb"]]); ?>

    Colores:
    <!-- Coolors Palette Widget -->
    <script src="https://coolors.co/palette-widget/widget.js"></script>
<!--    <script data-id="07113298128526133">new CoolorsPaletteWidget("07113298128526133", ["cc1f00","32292f","99e1d9","f0f7f4","70abaf"]); </script>-->
    <script data-id="08487608647128557">new CoolorsPaletteWidget("08487608647128557", ["cc1f00","32292f","d88c9a","f0f7f4","70abaf"]); </script>


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

    <p>Lorem impsum dolor sit amet: <span class="mono">texto en monospace</span>.
        Ver tooltip en boton redondo con la letra i: <span data-toggletip>Esto es un tooltip</span></p>
    <p>Para escribir el nombre de la empresa (intentemos evitarlo) usar esto: <span class="company">la empresa</span></p>

    <section class="lessons"  aria-label="Lecciones aprendidas">
        <p><span class="lightbulb"></span>Nuestro enfoque inicial fue condicionar nuestras soluciones
            para permitir únicamente aquellas que cumplieran con las restricciones del problema del viajante: todos los
            puntos deben ser visitados una única vez. Luego entendimos que permitir esta falla en nuestras rutas podía
            brindarle variedad a nuestro algoritmo, por lo que posteriormente reescribimos el código e incluimos esta
            validación dentro de nuestra función de fitness bajo una gran penalidad.</p>
    </section>

    <p>Imagen que se expande:
        <? lightboxImage("/docs/images/mate.gif", "/docs/images/survivors_square.png", "test"); ?>
    </p>

    <?php print_figure(
        "/docs/images/survivors_square.png",
        "Soluciones sobrevivientes que entraron en la nueva generación dada una probabilidad escalonada",
        '
    <p>Esta herramienta es para imagenes que necesitan descripcion extensa como gráficos.</p>
    '
    ); ?>
    <div><a>link</a></div>
    <div><button>Botón default</button></div>

</div>
</main>

<?php footer(); ?>

<?php HTML_foot(); ?>