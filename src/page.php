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

    <h2>Estilos básicos</h2>
    <p>
        Lorem impsum dolor sit amet: <span class="mono">texto en monospace</span>.
    </p>
    <p>
        Ver tooltip en boton redondo con la letra i: <span data-toggletip>Esto es un tooltip</span>
    </p>
    <p>
        Para escribir el nombre de la empresa (intentemos evitarlo) usar esto: <? printCompany(); ?>
    </p>
    <p todo>Para marcar algo en rojo como recordatorio</p>

    <div><a>link</a></div>
    <div><button>Botón default</button></div>

    <? sectionLightbulb("Título", "<p>
            Nuestro enfoque inicial fue condicionar nuestras soluciones
            para permitir únicamente aquellas que cumplieran con las restricciones del problema del viajante: todos los
            puntos deben ser visitados una única vez. Luego entendimos que permitir esta falla en nuestras rutas podía
            brindarle variedad a nuestro algoritmo, por lo que posteriormente reescribimos el código e incluimos esta
            validación dentro de nuestra función de fitness bajo una gran penalidad.
    </p>"); ?>

    <h2 id="indice">Índice con links</h2>

    <ul>
        <li><a href="#id-item1">Ítem 1</a></li>
        <li><a href="#id-item2">Ítem 2</a></li>
    </ul>

    <h3 id="id-item1">Ítem 1</h3>
    <p>
        <b>Para que los anchors funcionen olvidar poner los ids. En este caso, ids en el H2 y los H3.</b>
    </p>
    <p>
        Nuestro enfoque inicial fue condicionar nuestras soluciones
        para permitir únicamente aquellas que cumplieran con las restricciones del problema del viajante: todos los
        puntos deben ser visitados una única vez. Luego entendimos que permitir esta falla en nuestras rutas podía
        brindarle variedad a nuestro algoritmo, por lo que posteriormente reescribimos el código e incluimos esta
        validación dentro de nuestra función de fitness bajo una gran penalidad.
    </p>
    <? back_to_anchor("indice", " al índice"); ?>

    <h3 id="id-item2">Ítem 2</h3>
    <p>
        Nuestro enfoque inicial fue condicionar nuestras soluciones
        para permitir únicamente aquellas que cumplieran con las restricciones del problema del viajante: todos los
        puntos deben ser visitados una única vez. Luego entendimos que permitir esta falla en nuestras rutas podía
        brindarle variedad a nuestro algoritmo, por lo que posteriormente reescribimos el código e incluimos esta
        validación dentro de nuestra función de fitness bajo una gran penalidad.
    </p>
    <? back_to_anchor("indice", " al índice"); ?>


    <h2>Imágenes</h2>

    <h3>Imagen (sin caption)</h3>

    <p>Solo la imagen:</p>
    <? $image1 = new Figure(
        "/docs/images/dummy/thumbnail7.jpg",
        "600px",
    "",// aca no hace falta poner nada si no se va a expandir
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        ""// aca no hace falta poner nada si no va con caption
    ); ?>
    <? $image1->print_img() ?>


    <p>Imagen con lightbox</p>
    <? $image2 = new Figure(
        "/docs/images/dummy/thumbnail8.jpg",
        "600px",
        "/docs/images/dummy/image8.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        ""// aca no hace falta poner nada si no va con caption
    ); ?>
    <? $image2->print_lightbox(); ?>

    <h3>Figure (imagen con caption)</h3>

    <p>Figura que no se expande:</p>
    <?
    $figure0 = new Figure(
        "/docs/images/dummy/thumbnail0.jpg",
        "600px",
    "",// aca no hace falta poner nada si no se va a expandir
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    );
    ?>
    <? $figure0->print_figure(); ?>


    <p>Figura para abrir en lightbox:</p>
    <? $figure1 = new Figure(
        "/docs/images/dummy/thumbnail1.jpg",
        "600px",
        "/docs/images/dummy/image1.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    ); ?>

    <? $figure1->print_lightbox_figure("no-group"); ?>

    <p>Figuras para abrir en el mismo lightbox:</p>

    <?
    $figure2 = new Figure(
        "/docs/images/dummy/thumbnail2.jpg",
        "600px",
        "/docs/images/dummy/image2.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    );

    $figure3 = new Figure(
        "/docs/images/dummy/thumbnail3.jpg",
        "600px",
        "/docs/images/dummy/image3.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    );

    $figure2->print_lightbox_figure("group1");
    $figure3->print_lightbox_figure("group1");

    ?>

    <p>Si queremos imprimirlas juntas:</p>

    <?
    $figure4 = new Figure(
        "/docs/images/dummy/thumbnail4.jpg",
        "600px",
        "/docs/images/dummy/image4.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    );
    $figure5 = new Figure(
        "/docs/images/dummy/thumbnail5.jpg",
        "600px",
        "/docs/images/dummy/image5.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    );
    $figure6 = new Figure(
        "/docs/images/dummy/thumbnail6.jpg",
        "600px",
        "/docs/images/dummy/image6.jpg",
        "Esta informacion se asocia a la imagen, y se muestra bajo la misma en el lightbox.",
        "Arte abstracto de Google"

    );
    ?>

    <div class="flex wrap">
        <div class="max-width50-100">
            <? $figure4->print_lightbox_figure("group2"); ?>
        </div>
        <div class="max-width50-100">
            <? $figure5->print_lightbox_figure("group2"); ?>
        </div>
        <div class="max-width50-100">
            <? $figure6->print_lightbox_figure("group2"); ?>
        </div>
    </div>



</div>
</main>

<?php footer(); ?>

<?php HTML_foot(); ?>