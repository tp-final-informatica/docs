
<?php
define('PRINTPAGE', true);

include_once "./src/utils/libraries.php";


?>

<?php HTML_head("Versión para imprimir", true); ?>
<main id="main-content" class="print">
<div class="content">




    <?php

    include_once "./src/index.php";
    include_once "./src/sitemap.php";
    include_once "./src/macro.php"; ?>
    <span class="print-break"></span>
    <?php
    include_once "./src/web-interface.php";
    include_once "./src/mobile.php";
    include_once "./src/core.php";
    include_once "./src/core/languages.php";
    include_once "./src/core/algorithm.php";
    include_once "./src/core/specs.php";
    include_once "./src/core/data.php";
    include_once "./src/documentation.php";
    include_once "./src/literature.php";
    ?>












</div>
</main>
<?php footer(true); ?>
<?php HTML_foot(); ?>