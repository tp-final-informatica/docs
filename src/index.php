<?php

include_once "./src/utils/libraries.php";

?>

<?php HTML_head("Diseño e implementación de un sistema de cálculo y control de trayectorias"); ?>

<?php printHeader("Diseño e implementación de un sistema de cálculo y control de trayectorias"); ?>
    <div class="content" style="text-align: center;">
        <img src="/docs/images/logofiuba.png" alt="Facultad de Ingeniería de la Universidad de Buenos Aires"/>
        <h2>Trabajo profesional de ingeniería en Informática</h2>
        <h3>Autores</h3>
        <div style="display: flex;flex-direction: column;align-items: center;">
            <?php $alumnos = [
                    "Mauro Capolupo" => "90283",
                    "Ana Sofía Colautti" => "89451",
                    "Nerea Piccone" => "92559"
                    ];
            ?>
            <?php foreach ( $alumnos as $name => $id) : ?>
            <div class="flex gap3">
                <div><p><?php print($name)?></p></div>
                <div><p><?php print($id)?></p></div>
            </div>
            <? endforeach; ?>

        </div>


        <h3>Directora del Trabajo Profesional</h3>
        <p>Lic. Silvia Adriana Ramos</p>

    <p>Buenos Aires, Diciembre 2022</p>

    </div>
<?php footer(); ?>

<?php HTML_foot(); ?>