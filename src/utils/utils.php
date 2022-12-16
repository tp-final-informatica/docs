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

// recibe una array de elementos tipo ['title'=>$title, 'path'=>$path]
function breadcrumb(array $links = []) {
    if (PRINTPAGE == true) {
        return;
    }
    if (empty($links)) {
        $links = [['path' => "/docs/sitemap.html", 'title' => "Índice"]];
    }
    print("<div class=\"mb3\">");
    foreach ($links as $link) {
        print("<a href=\"".$link['path']."\"><i class=\"fa-solid fa-caret-left\"></i> ".$link['title']."</a> ");
    }
    print("</div>");
}

function prevAndNext(array $prev_link, array $next_link) {
    if (PRINTPAGE == true) {
        return;
    }

    print("<div class=\"mt8 flex space\">");
    if ($prev_link != []) {
        print("<a href=\"".$prev_link['path']."\"><i class=\"fa-solid fa-arrow-left\"></i> Volver a ".$prev_link['title']."</a> ");
    }
    if ($next_link != []) {
        print("<a href=\"".$next_link['path']."\">Seguir leyendo: ".$next_link['title']." <i class=\"fa-solid fa-arrow-right\"></i></a> ");
    }

    print("</div>");
}

function nextRead($path, $title) {
    if (PRINTPAGE == true) {
        return;
    }

    print("<div class=\"mt8\"><a href=\"$path\">Seguir leyendo: $title <i class=\"fa-solid fa-arrow-right\"></i></a></div>");
}



function printSitemap() {
    global $sitemap;

    print('<ol>');
    foreach ($sitemap as $title => $item) {
        if (array_key_exists('subitems', $item)) {
            if (array_key_exists('url', $item) && $item['url'] != '') {
                printf("<li><a href=\"%s\">%s</a><ol>", $item['url'], $title);
            } else {
                printf("<li>%s<ol>", $title);
            }
//            printf("<li>%s<ol>", $title);
            foreach ($item['subitems'] as $subtitle => $subitem) {
                printf("<li><a href=\"%s\">%s</a></li>", $subitem, $subtitle);
            }
            print('</ol></li>');
        } else {
            if (array_key_exists('url', $item) && $item['url'] != '') {
                printf("<li><a href=\"%s\">%s</a></li>", $item['url'], $title);
            } else {
                printf("<li>%s</li>", $title);
            }
        }
    }
    print('</ol>');
}

function printCompany($company = "la empresa"){
    print('<span class="company">'.$company.'</span>');
}

function printCompanyLogo() {
    print('<span class="company-logo">la empresa</span>');
}

function linkBibliografía() {
    print('<p>Para más información ver la <a href="/docs/literature.html">Bibliografía</a>.</p>');
}

// asumimos que $message empieza con un <p>
//function sectionLessons($message) {
//    print('<section class="lessons" aria-label="Lecciones aprendidas">');
//    $newstr = substr_replace($message, '<span class="lightbulb"></span>', 3, 0);
//    print($newstr);
//    print('</section>');
//}

function sectionLightbulb($title, $message) {
    print('
    <fieldset class="lessons">
        <legend>'.$title.'</legend>
    <div>');
    $newstr = substr_replace($message, '<span class="lightbulb"></span>', 3, 0);
    print($newstr);
    print('</div>
    </fieldset>');

}

//function print_figure($path, $alt, $caption) {
//    print('<figure class="mw-inherit" style="margin: 0;text-align: center;max-width: 100%" role="group">
//        <img class="mw-inherit" src="' . $path . '"
//             alt="'. $alt .'">
//        <figcaption>' . $caption .'</figcaption>
//    </figure>');
//}


//function lightboxImage($thumbnail_src, $image_src, $alt, $max_width = 360) {
//    print('<div class="flex center"><a href="'.$image_src.'"  class="lightbox" title="Expandir imagen">');
//    if ($max_width != 0) {
//        print(' <img src="'.$thumbnail_src.'" alt="'.$alt.'" style="max-width: '.$max_width.'px;">');
//    } else {
//        print(' <img src="'.$thumbnail_src.'" alt="'.$alt.'">');
//    }
//    print('</a></div>');
//}


//
//function lightboxGallery($thumbnail_src, $image_src, $alt,
//                         $options = [
//                             "max_width" => "360px",
//                             "group" => "none"
//                         ]) {
//
//
//    print('<div class="flex center"><a href="'.$image_src.'"  class="lightbox" title="Expandir imagen"  data-group="'.$options["group"].'">');
//    if ($options["max_width"] != 0) {
//        print_figure($thumbnail_src, $alt, $alt);
////        print(' <img src="'.$thumbnail_src.'" alt="'.$alt.'" style="max-width: '.$options["max_width"].';">');
//    } else {
//        print(' <img src="'.$thumbnail_src.'" alt="'.$alt.'">');
//    }
//    print('</a></div>');
//}

/*
  <? lightboxImage("/docs/images/mate.gif", "/docs/images/survivors_square.png", "test"); ?>
*/


// de algorithm

function print_section_heading($section_title, $section_id){
    print('<h2 id="'. $section_id . '">'.$section_title.'</h2>');
}

function print_subsection_heading($section_title, $section_id){
    print('<h3 id="'. $section_id . '">'.$section_title.'</h3>');
}

function back_to_anchor($anchor_id, $back_to_text) {
    if (PRINTPAGE == true) {
        return;
    }

    print('<div class="align-left mt3"><a href="#'.$anchor_id.'">Volver '.$back_to_text
        .' <i class="fa-solid fa-arrow-up"></i></a></div>');
}

function print_section_footer() {
    //back_to_top();
    print ('<hr class="section-end"/>');
}

