<?php

class Eer extends Solution
{
    private $pa1 = ["A0", 1, 2, 3, 4, "A1"];
    private $pb1 = ["B0", 5, 6, 7, 8, "B1"];
    private $pa2 = ["A0", 4, 3, 1, "A1"];
    private $pb2 = ["B0", 7, 6, 2, 8, 5, "B1"];
    private $switched = [2];

    private $_p1 = [1, 2, 3, 4, 5, 6, 7, 8];
    private $_p2 = [4, 3, 1, 7, 6, 2, 8, 5];

    private $_c1 = [YELLOW, YELLOW, YELLOW, YELLOW, CORAL, CORAL, CORAL, CORAL];
    private $_c2 = [YELLOW, YELLOW, YELLOW, CORAL, CORAL, CORAL, CORAL, CORAL];



    public function eer_parents() {
        print('<div class="crossover">');

        $this->printSolution("P0", $this->pa1, $this->pb1, $this->switched);
        $this->printSolution("P1", $this->pa2, $this->pb2, $this->switched);
        print('</div>');

    }

    public function eer_joined() {
        print('<div class="crossover">');

        $this->printSpecificRoute($this->_p1, $this->_c1, $this->switched);
        $this->printSpecificRoute($this->_p2, $this->_c2, $this->switched);
        print('</div>');


    }

    public function eer_map() {
        $map = [
            1 => [2, 3, 7],
            2 => [1, 3, 6, 8],
            3 => [2, -4, 1],
            4 => [-3, 5],
            5 => [4,6,8],
            6 => [2,5,-7],
            7 => [1,-6,8],
            8 => [2,5,7],
        ];
        print('<div class="crossover">');

        print('<div class="flex gap3" style="flex-wrap: wrap; column-gap: 2em;justify-content: space-between;align-items: baseline;">');
        foreach ($map as $key => $data) {
            print('<div class="flex mb2" style="align-items: baseline;">');
            print('<div class="circle"><p>'.$key.'</p></div>');
            print('<i class="icono-arrow1-left"></i>');
            print('<div>');
            foreach ($data as $value) {
                print('<div class="circle"><p>'.$value.'</p></div>');
            }
            print('</div>');
            print('</div>');
        }

        print('</div>');
        print('</div>');

    }

    public function eer_children() {
        $ha0 = ["A0", 1, 3, 4, 5, "A1"];
        $hb0 = ["B0", 6, 7, 8, 2, "B1"];
        $ha1 = ["A0", 1, 3, 4, 5, "A1"];
        $hb1 = ["B0", 8, 7, 6, 2, "B1"];
        $ha2 = ["A0", 1, 7, 6, 5, "A1"];
        $hb2 = ["B0", 4, 3, 2, 8, "B1"];
        print('<div class="crossover">');

        $this->printSolution("H0", $ha0, $hb0, $this->switched);
        $this->printSolution("H1", $ha1, $hb1, $this->switched);
        $this->printSolution("H2", $ha2, $hb2, $this->switched);
        print('</div>');

    }

}