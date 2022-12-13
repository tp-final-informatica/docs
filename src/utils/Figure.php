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
        print('
        <figure class="mw-inherit mb3" style="text-align: center;max-width: '. $this->thumbnail_width.'" role="group">
            <img class="mw-inherit" src="' . $this->thumbnail . '"
                 alt="'. $this->alt .'" width="100%">
                 <hr/>
            <figcaption><p>' . $this->caption .'</p></figcaption>
        </figure>
        ');
    }

    public function print_lightbox($group ="") {
        if ($group!="") {
            print('<div class="flex center"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen"  data-group='.$group.'>');
        } else {
            print('<div class="flex center"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen">');
        }
        if ( $this->thumbnail_width != 0) {
            print(' <img src="'.$this->thumbnail.'" alt="'.$this->alt.'" style="max-width: ' .$this->thumbnail_width.'px;">');
        } else {
            print(' <img src="'.$this->thumbnail.'" alt="'.$this->alt.'">');
        }
        print('</a></div>');
    }


    public function print_lightbox_figure($max_width = 0, $group ="") {
        if ($group!="") {
            print('<div class="flex center"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen"  data-group='.$group.'>');
        } else {
            print('<div class="flex center"><a href="'.$this->src.'"  class="lightbox" title="Expandir imagen">');
        }
        $this->print_figure();
        print('</a></div>');
    }
}