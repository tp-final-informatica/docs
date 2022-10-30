<?php

function printHeader($title = "Trabajo Profesional de Ingeniería en Informática"){

    print('<div class="header">');
    if(localdevonly()) {

        print('<div class="">
            <div class="ribbon ribbon-top-left"><span>DEV!</span></div>
        </div>');
    }
    print('<h1 class="mw-content">' . $title. '</h1>');
    print('</div>');
}


