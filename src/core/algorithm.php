<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("El algoritmo empleado"); ?>
<?php printHeader("El algoritmo genético empleado"); ?>

<main id="main-content">


    <div class="content">
        <?php breadcrumb([['path' => "/docs/core.html", 'title'=>"El core"]]); ?>

        <p>El algoritmo genético consta de las siguientes partes</p>
        <ol>
            <li><a href="#chromosome">Definición de cromosoma</a></li>
            <li><a href="#population">Tamaño de la población y cantidad de generaciones</a></li>
            <li><a href="#first-gen">Armado de población inicial</a></li>
            <li><a href="#fitness">Definición de función de fitness</a></li>
            <li><a href="#parents">Selección de padres</a></li>
            <li><a href="#crossover">Crossover</a></li>
            <li><a href="#mutation">Mutación</a></li>
            <li><a href="#survivors">Selección de soluciones sobrevivientes</a></li>
            <li><a href="#end-criteria">Criterio de finalización</a></li>
            <li><a href="#more">Modificaciones al algoritmo</a></li>
        </ol>

        <p>La definición de cada uno de estos pasos afecta el resultado final del algoritmo. A continuación detallamos nuestras decisiones en cada paso.</p>

        <?php
        include_once "./src/algorithm/chromosome.php";
        include_once "./src/algorithm/population.php";
        include_once "./src/algorithm/first_gen.php";
        include_once "./src/algorithm/fitness.php";
        include_once "./src/algorithm/parents.php";
        include_once "./src/algorithm/crossover.php";
        include_once "./src/algorithm/mutation.php";
        include_once "./src/algorithm/survivors.php";
        include_once "./src/algorithm/end_criteria.php";
        include_once "./src/algorithm/more.php";
        ?>

<!--        --><?php //nextRead("/docs/core/specs.html", "Especificaciones técnicas"); ?>
        <?php prevAndNext(
            ['path' => "/docs/core/languages.html", 'title'=>"Selección del lenguaje"],
            ['path' => "/docs/core/data.html", 'title'=>"Análisis de datos"]
        ); ?>


    </div>

</main>

<?php footer(); ?>

<?php HTML_foot(); ?>