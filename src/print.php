<?php
define('PRINTPAGE', true);

include_once "./src/utils/libraries.php";


?>

<?php HTML_head("Versión para imprimir"); ?>
<main id="main-content print">
<div class="content">




    <?php

    include_once "./src/index.php";
    include_once "./src/macro.php";
    include_once "./src/web-interface.php";
    include_once "./src/core.php";
    include_once "./src/core/languages.php";
    include_once "./src/core/algorithm.php";
    include_once "./src/core/specs.php";
    include_once "./src/core/data.php";
    include_once "./src/literature.php";
    ?>












</div>
</main>
<?php footer(); ?>
<?php HTML_foot(); ?>