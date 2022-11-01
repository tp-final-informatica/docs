<?php

function printHeader($title = "Trabajo Profesional de Ingeniería en Informática"){
    global $sitemap;
    print('<header class="header">');
    if(localdevonly()) {
        print('<div class="">
            <div class="ribbon ribbon-top-left"><span>DEV!</span></div>
        </div>');
    }
    print('<h1 class="mw-content">' . $title. '</h1>');
    print('</header>');
    printMenu($sitemap);

}

function printMenu($menu) {
    print('<nav>');
    print('<a  id="skip-nav" href="#main-content" class="skip-link">Saltear navegacion</a>');
    print('<div data-menu-component>');
    print('  <input type="checkbox" role="button" aria-haspopup="true" id="toggle" class="vh">');
    print('  <label for="toggle" data-opens-menu>');
    print('    &#x2630; Índice');
    print('    <span class="vh expanded-text">expandido</span>');
    print('    <span class="vh collapsed-text">colapsado</span>');
    print('  </label>');
    print('  <div role="menu" data-menu-origin="left">');
    print('    <ul>');
    foreach ($menu as $title => $item) {
        if (array_key_exists('url', $item) && $item['url'] != '') {
            printf("<li><a role=\"menuitem\" href=\"%s\">%s</a></li>", $item['url'], $title);
        } else {
            printf("<li>%s</li>", $title);
        }
    }
    print('    </ul>');
    print('  </div>');
    print('</div>');

    print('</nav>');
}

