<?php

class Index
{

    private $title;
    private $tag;
    private $subtitles;

    public function __construct($title, $subtitles, $title_tag = 2)
    {
        $this->title = $title;
        $this->tag = $title_tag;
        $this->subtitles = $subtitles;
    }

    public function section_heading() {
        print('<h'
            . $this->tag
            . ' id="'
            . $this->title['id']
            . '">'
            .$this->title['value']
            .'</h'
            . $this->tag
            . '>');

    }

    public function section_subheading($index) {
        print('<h'
            . ($this->tag + 1)
            . '  id="'. $this->subtitles[$index]['id']
            . '">'
            .$this->subtitles[$index]['value']
            .'</h'
            . ($this->tag + 1)
            . '>');
    }

    public function section_subheading_by_id(string $id) {
        foreach ($this->subtitles as $subtitle) {
            if ($subtitle['id'] == $id) {
                print('<h'
                    . ($this->tag + 1)
                    . ' id="'. $subtitle['id']
                    . '">'
                    .$subtitle['value']
                    .'</h'
                    . ($this->tag + 1)
                    . '>');
            }
        }

    }

    public function print_index($ordered = false) {
        if ($ordered) {
            print('<ol>');
        } else {
            print('<ul>');
        }


        foreach ($this->subtitles as $subitem) {
            print('<li><a href="#'
                . $subitem['id']
                .'">'
                . $subitem['value']
                .'</a></li>');
        }

        if ($ordered) {
            print('</ol>');

        } else {
            print('</ul>');
        }


    }

    public function link_back_to_index() {
        print('<div class="align-left mt3"><a href="#'
            . $this->title['id']
            . '">Volver a '
            . $this->title['value']
            .' <i class="fa-solid fa-arrow-up"></i></a></div>');
    }

    public function end_line() {
        print ('<hr class="section-end"/>');
    }

}