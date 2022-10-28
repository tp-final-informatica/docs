<?php

function printHeader(){

    print('<div class="header">');
    if(localdevonly()) {

        print('<div class="">
            <div class="ribbon ribbon-top-left"><span>DEV!</span></div>
        </div>');
    }
    print('<h1>Trabajo Profesional de Ingeniería en Informática</h1>');
    print('</div>');
}


