<?php

include_once "./src/utils/libraries.php";


function back_to_top() {
    print("<div class=\"align-left\"><a href=\"#top\">Volver al índice</a></div>");
}

function print_section_heading($section_title, $section_id){
    printf('<h2 id="%s">%s</h2>', $section_id, $section_title);
}

function print_section_footer() {
    //back_to_top();
    print ("<hr/>");
}
?>

<?php HTML_head("El algoritmo empleado"); ?>
<?php printHeader("El algoritmo genético empleado"); ?>


<main id="main-content">
    <div class="content">
        <?php breadcrumb([['path' => "/docs", 'title'=>"Inicio"],['path' => "/docs/sitemap.html", 'title'=>"Índice"], ['path' => "/docs/core.html", 'title'=>"El core"]]); ?>

        <p>El algoritmo genético consta de las siguientes partes</p>
        <ol>
            <li><a href="#chromosome">Definición de cromosoma</a></li>
            <li><a href="#first-gen">Armado de población inicial</a></li>
            <li><a href="#fitness">Definición de función de fitness</a></li>
            <li><a href="#parents">Selección de padres</a></li>
            <li><a href="#crossover">Crossover</a></li>
            <li><a href="#mutation">Mutación</a></li>
            <li><a href="#survivors">Selección de soluciones sobrevivientes</a></li>
            <li><a href="#end-criteria">Criterio de finalización</a></li>
        </ol>

        <p>La definición de cada uno de estos pasos afecta el resultado final del algoritmo. A continuación detallamos nuestras decisiones en cada paso.</p>

        <hr/>
        <?php
        include_once "./src/algorithm/chromosome.php";
        include_once "./src/algorithm/first_gen.php";
        include_once "./src/algorithm/fitness.php";
        include_once "./src/algorithm/parents.php";
        include_once "./src/algorithm/crossover.php";
        include_once "./src/algorithm/mutation.php";
        include_once "./src/algorithm/survivors.php";
        include_once "./src/algorithm/end_criteria.php";
        ?>

    </div>
</main>
<?php footer(); ?>
<?php HTML_foot(); ?>