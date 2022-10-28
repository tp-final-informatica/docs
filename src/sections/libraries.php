<?php

include_once "./src/sections/html.php";
include_once "./src/sections/header.php";
include_once "./src/sections/footer.php";

function localdevonly() {
    global $argv;

    if ($argv[1]??false) {
       if ($argv[1] == "DEV") {
           return true;
       }
    }
    return false;
}
