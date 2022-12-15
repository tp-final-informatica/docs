<?php

class Figure
{
    private $thumbnail;
    private $thumbnail_width;
    private $src;
    private $alt;
    private $caption;

    public function __construct($thumbnail, $thumbnail_width, $src, $alt, $caption) {
        $this->thumbnail = $thumbnail;
        $this->thumbnail_width = $thumbnail_width;
        $this->src = $src;
        $this->alt = $alt;
        $this->caption = $caption;
    }


    public function print_figure() {
//        return;
        print('
        <div class="flex center">
        <figure class="mw-inherit mt2 mb3" style="text-align: center;max-width: '. $this->thumbnail_width.'" role="group">
            <img class="mw-inherit" src="' . $this->thumbnail . '"
                 alt="'. $this->alt .'" width="100%">
                 <hr/>
            <figcaption><p><b>Figura:</b> ' . $this->caption .'</p></figcaption>
        </figure>
        </div>
        ');
    }

    public function print_img() {
        print('<div class="flex center mb2">');
        if ( $this->thumbnail_width != "") {
            print(' <img src="'.$this->thumbnail.'" alt="'.$this->alt.'" style="max-width: ' .$this->thumbnail_width.';">');
        } else {
            print(' <img src="'.$this->thumbnail.'" alt="'.$this->alt.'">');
        }
        print('</div>');

    }

    public function print_lightbox($group ="") {
        if ($group!="") {
            print('<div class="flex center"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen"  data-group='.$group.'>');
        } else {
            print('<div class="flex center"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen">');
        }
        $this->print_img();
        print('</a></div>');
    }


    public function print_lightbox_figure($group ="") {
        if ($group!="") {
            print('<div class="flex center flex-1"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen"  data-group='.$group.'>');
        } else {
            print('<div class="flex center flex-1"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen">');
        }
        $this->print_figure();
        print('</a></div>');
    }
}

