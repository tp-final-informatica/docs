<?php

function footer() {
    if (PRINTPAGE == true) {
        print('<hr class="mt8" />');
        print('<hr/>');
        return;
    }
    print ('<footer class="footer"><div>');
    print('<button onclick="topFunction()" id="btn-scroll-top" title="Volver al inicio de la página">Subir</button>');

    //    print ('<p class="center">Gracias!</p>');
//    print ('<p class="center">Ana, Nere y Mau</p>');
    print ('<p class="center"><a href="/docs/sitemap.html">Índice</a></p>');
    print ('<p class="center"><a href="/docs/changelog.html">Changelog</a></p>');
    print ('<p class="center"><a href="/docs/print.html" target="_blank">Versión para imprimir</a></p>');
    print ('</div></footer>');
}
