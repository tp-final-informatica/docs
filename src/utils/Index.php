<?php

class Index
{

    private $title;
    private $subtitles;

    public function __construct($title, $subtitles)
    {
        $this->title = $title;
        $this->subtitles = $subtitles;
    }

    public function section_heading() {
        print('<h2 id="'
            . $this->title['id']
            . '">'
            .$this->title['value']
            .'</h2>');

    }

    public function section_subheading($index) {
        print('<h2 id="'. $this->subtitles[$index]['id']
            . '">'
            .$this->subtitles[$index]['value']
            .'</h2>');
    }

    public function print_index() {
        print('<ul>');

        foreach ($this->subtitles as $subitem) {
            print('<li><a href="#'
                . $subitem['id']
                .'">'
                . $subitem['value']
                .'</a></li>');
        }

        print('</ul>');


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