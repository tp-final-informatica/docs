<?php

function localdevonly() {
    global $argv;

    if ($argv[1]??false) {
        if ($argv[1] == "DEV") {
            return true;
        }
    }
    return false;
}

function breadcrumb($path = "/docs", $title = "Inicio") {
    print("<div class=\"mb3\"><a href=\"$path\">< $title</a></div>");
}

function nextRead($path, $title) {
    print("<div class=\"mt3 mb3\"><a href=\"$path\">Seguir leyendo: $title ></a></div>");
}

function print_figure($path, $alt, $caption) {
    print('<figure class="mw-inherit" style="margin: 0;" role="group">
        <img class="mw-inherit" src="' . $path . '"
             alt="'. $alt .'">
        <figcaption>' . $caption .'</figcaption>
    </figure>');
}