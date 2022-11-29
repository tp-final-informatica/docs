<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Changelog"); ?>

<?php printHeader("Changelog"); ?>

<main id="main-content">
<div class="content">



    <?php breadcrumb([
        ['path' => "/docs", 'title'=>"Inicio"],
    ]); ?>
    <?php $item_classes="mb2"; ?>

    <ul>
        <li class="<? print $item_classes?>">
            <div><span mono>29 Nov 2022:</span></div>
            <div>
                <ul>
                    <li>Mutación nueva en El core: <a href="/docs/core/algorithm.html#mutation">Reduce Entropy Mutation</a> </li>
                </ul>
            </div>
        </li>
        <li class="<? print $item_classes?>">
            <div><span mono>27 Nov 2022:</span></div>
            <div>
                <ul>
                    <li>Página nueva: <a href="/docs/macro.html">El sistema</a>. </li>
                    <li>Nueva sección en El core: <a href="/docs/core/algorithm.html#population">Tamaño de la población
                            y cantidad de generaciones</a> (en desarrollo).</li>
                    <li>Cambios en El core: <a href=/docs/core/algorithm.html#crossover>crossover MBS</a> (criterio de
                        ordenamiento de las visitas).</li>
                    <li>Mutación nueva en El core: <a href="/docs/core/algorithm.html#mutation">Empty Route Mutation</a> </li>
                    <li>Modificación en El core: <a href="/docs/core/algorithm.html#fitness">Definición de función de
                            fitness</a> (cambios en la función y en la descripción de la misma). </li>
                    <li>Modificación en El core: <a href="/docs/core/algorithm.html#survivors">Selección de soluciones sobrevivientes
                        </a> (agregamos gráficos y explicamos el razonamiento empleado).</li>
                    <li>Ítem nuevo en <a href="/docs/literature.html">Bibliografía</a>: <em>Influence of the Population Size...</em></li>
                </ul>
            </div>
        </li>
    </ul>


</div>
</main>

<?php footer(); ?>

<?php HTML_foot(); ?>