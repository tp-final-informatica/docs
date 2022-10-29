<?php

class Pmx extends Solution
{
    private $pa1 = ["A0", 1, 2, 3, 4, "A1"];
    private $pb1 = ["B0", 5, 6, 7, 8, "B1"];
    private $pa2 = ["A0", 4, 3, 1, "A1"];
    private $pb2 = ["B0", 7, 6, 2, 8, 5, "B1"];
    private $switched = [2];

    private $_pa1 =  ["A0", "", 3,1, "", "A1"];
    private $__pa1 = ["A0", 1, "", "", 4, "A1"];
    private $_pb1 =  ["B0", 7, 6, 2, "", "B1"];
    private $__pb1 = ["B0", "", "","", 8, "B1"];
    private $_pa2 =  ["A0", "",2, 3, "A1"];
    private $__pa2 = ["A0", 4, "", "", "A1"];
    private $_pb2 =  ["B0", 5, 6, 7, "", "", "B1"];
    private $__pb2 = ["B0", "", "","", 8, 5, "B1"];

    private $cycleA1 = [1, 4];
    private $cycleA2 = [3];
    private $cycleB1 = [5,7,8];
    private $cycleB2 = [6];

    private function printPMXSolution ($pa1, $pb1, $pa2, $pb2, $cycle, $color1, $color2) {
        print('<div class="flex gap3 mb2">');
        print('  <div>');

        printRoute($pa1, $cycle, WHITE, WHITE, $color1);
        printRoute($pa2, $cycle, WHITE, WHITE, $color1);
        print('  <div class="underline-light">viajante A</div>');

        print('  </div>');
        print('  <div>');
        printRoute($pb1, $cycle, WHITE, WHITE, $color2);
        printRoute($pb2, $cycle, WHITE, WHITE, $color2);
        print('  <div class="underline-light">viajante B</div>');

        print('  </div>');
        print('</div>');

    }

    private $ha0 = ["A0", 2, 3, 1, 4, "A1"];
    private $hb0 = ["B0", 7, 6, 2, 8, "B1"];
    private $ha1 = ["A0", 4, 2, 3, "A1"];
    private $hb1 = ["B0", 5, 6, 7, 8, 2, "B1"];

    public function pmx_parents() {
        print('<div class="crossover">');

        $this->printSolution("P0", $this->pa1, $this->pb1, $this->switched, [2,4], [1, 4]);
        $this->printSolution("P1", $this->pa2, $this->pb2, $this->switched, [2,4], [1, 4]);
        print('</div>');

    }

    public function pmx_map() {
        print('<div class="crossover">');

        print('<div class="flex gap3 mb3"><div>');
        $this->printStopList([2, 1], YELLOW);
        print('<div class="underline-light">viajante A</div></div><div>');
        $this->printStopList([5, 2], CORAL);
        print('<div class="underline-light">viajante B</div></div></div>');
        print('</div>');

    }

    public function pmx_subroutes() {
        print('<div class="crossover">');

        $this->printSolution("P0", $this->_pa1, $this->_pb1, $this->switched, [2,4], [1, 4]);
        $this->printSolution("P1", $this->_pa2, $this->_pb2, $this->switched, [2,4], [1, 4]);
        print('</div>');

    }

    public function pmx_join_subrouteA() {
        print('<div class="crossover">');

        $this->printSolution("Subruta de P0", $this->_pa1, $this->_pb1, $this->switched, [2,4], [1, 4]);
        $this->printSolution("Resto de P1", $this->__pa1, $this->__pb1, $this->switched, [2,4], [1, 4]);
        print('<hr/>');
        $this->printSolution("Resultado H0", $this->ha0, $this->hb0, $this->switched,[2,4], [1,4]);
        print('</div>');

    }

    public function pmx_join_subrouteB() {
        print('<div class="crossover">');

        $this->printSolution("Subruta de P1", $this->_pa2, $this->_pb2, $this->switched, [2,4], [1, 4]);
        $this->printSolution("Resto de P0", $this->__pa2, $this->__pb2, $this->switched, [2,4], [1, 4]);
        print('<hr/>');
        $this->printSolution("Resultado H1", $this->ha1, $this->hb1, $this->switched,[2,4], [1,4]);
        print('</div>');

    }

    public function pmx_children() {
        print('<div class="crossover">');

        $this->printSolution("H0", $this->ha0, $this->hb0, $this->switched,[2,4], [1,4]);
        $this->printSolution("H1", $this->ha1, $this->hb1, $this->switched,[2,4], [1,4]);
        print('</div>');

    }
}