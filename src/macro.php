<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("El sistema"); ?>

<?php printHeader("El sistema presentado"); ?>

<main id="main-content">
<div class="content">

    <?php breadcrumb([['path' => "/docs/sitemap.html", 'title'=>"Índice"]]); ?>
    <p todo>Nuevo!</p>
    <p>Este trabajo pretende facilitar los procesos laborales dentro de <?php printCompany(); ?>, una empresa de visitadores
        médicos a domicilio.
        Para esto desarrollamos un sistema informático que agiliza el cálculo de las rutas de los médicos y las distribución
        de esta información a los teléfonos de los mismos, permitiendo control por parte de un administrador y agilidad
        en la generación de los reportes para facturación.</p>
    <p>El software desarrollado consta de los siguientes:</p>
    <ul>
        <li>Una interfaz web administrativa para carga de pacientes y médicos, control de jornadas y expedición de reportes</li>
        <li>Una aplicación mobile para facilitar el recorrido de las rutas y control administrativo de los viajantes</li>
        <li>Un programa de cálculo y optimización de rutas al que llamaremos <em>core</em></li>
        <li>Un servidor backend que sirve la información necesaria a la interfaz web y mobile, y comunica todas las partes
        del sistema.</li>
    </ul>
<!--    <p>Lorem impsum dolor sit amet: <span class="mono">texto en monospace</span>. Ver tooltip en boton redondo con la letra i: <span data-toggletip>Esto es un tooltip</span></p>
    <p>Para escribir el nombre de la empresa (intentemos evitarlo) usar esto: <span class="company">la empresa</span></p>

    <section class="lessons"  aria-label="Lecciones aprendidas">
        <p><span class="lightbulb"></span>Nuestro enfoque inicial fue condicionar nuestras soluciones
            para permitir únicamente aquellas que cumplieran con las restricciones del problema del viajante: todos los
            puntos deben ser visitados una única vez. Luego entendimos que permitir esta falla en nuestras rutas podía
            brindarle variedad a nuestro algoritmo, por lo que posteriormente reescribimos el código e incluimos esta
            validación dentro de nuestra función de fitness bajo una gran penalidad.</p>
    </section>-->

<?php nextRead("/docs/core.html", "El core"); ?>
</div>
</main>

<?php footer(); ?>

<?php HTML_foot(); ?>