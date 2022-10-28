<?php

class Cx extends Crossover {
    private $pa1 = ["A0", 1, 2, 3, 4, "A1"];
    private $pb1 = ["B0", 5, 6, 7, 8, "B1"];
    private $pa2 = ["A0", 4, 3, 1, "A1"];
    private $pb2 = ["B0", 7, 6, 2, 8, 5, "B1"];
    private $switched = [2];

    private $_pa1 = ["A0", 1, 3, 4, "A1"];
    private $_pb1 = ["B0", 5, 6, 7, 8, "B1"];
    private $_pa2 = ["A0", 4, 3, 1, "A1"];
    private $_pb2 = ["B0", 7, 6, 8, 5, "B1"];

    private $cycleA1 = [1, 4];
    private $cycleA2 = [3];
    private $cycleB1 = [5,7,8];
    private $cycleB2 = [6];

    private function _printCycle ($pa1, $pb1, $pa2, $pb2, $cycle1, $cycle2, $color1, $color2) {
        // @todo esto sería mejor aplicar todos los ciclos en un mismo grafico
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');

        $this->printRoute($pa1, $cycle1, WHITE, WHITE, $color1);
        $this->printRoute($pa2, $cycle1, WHITE, WHITE, $color1);
        print('  <div class="underline-light">viajante A</div>');

        print('  </div>');
        print('  <div>');
        $this->printRoute($pb1, $cycle2, WHITE, WHITE, $color2);
        $this->printRoute($pb2, $cycle2, WHITE, WHITE, $color2);
        print('  <div class="underline-light">viajante B</div>');

        print('  </div>');
        print('</div>');

    }

    private $ha0 = ["A0", 4, 2, 3, 1, "A1"];
    private $hb0 = ["B0", 7, 6, 8, 5, "B1"];
    private $ha1 = ["A0", 1, 3, 4, "A1"];
    private $hb1 = ["B0", 5, 6, 2, 7, 8, "B1"];
    private $ha2 = ["A0", 4, 2, 3, 1, "A1"];
    private $hb2 = ["B0", 5, 6, 7, 8, "B1"];
    private $ha3 = ["A0", 4, 3, 1, "A1"];
    private $hb3 = ["B0", 5, 6, 2, 7, 8, "B1"];

    public function cx_parents() {
        $this->printSolution("P0", $this->pa1, $this->pb1, $this->switched);
        $this->printSolution("P1", $this->pa2, $this->pb2, $this->switched);
    }

    public function cx_parents_processed() {
        $this->printSolution("P0", $this->_pa1, $this->_pb1, $this->switched);
        $this->printSolution("P1", $this->_pa2, $this->_pb2, $this->switched);
    }

    public function cx_cycles() {
        print("<div class=\"mt3 mb3\">");
        $this->_printCycle($this->pa1, $this->pb1, $this->pa2, $this->pb2, $this->cycleA1, $this->cycleB1, YELLOW, CORAL);
        print("</div>");
    }

    public function cx_children() {
        print("<div>");
        $this->printSolution("H0", $this->ha0, $this->hb0, $this->switched);
        $this->printSolution("H1", $this->ha1, $this->hb1, $this->switched);
        $this->printSolution("H2", $this->ha2, $this->hb2, $this->switched);
        $this->printSolution("H3", $this->ha3, $this->hb3, $this->switched);
        print("</div>");
    }

}