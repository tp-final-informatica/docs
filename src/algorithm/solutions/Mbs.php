<?php

class Mbs extends Solution {
    private $pa1 = ["A0", 1, 2, 3, 4, "A1"];
    private $pb1 = ["B0", 5, 6, 7, 8, "B1"];
    private $pa2 = ["A0", 1, 3, 4, "A1"];
    private $pb2 = ["B0", 5, 6, 2, 7, 8, "B1"];
    private $switched = [2];
    private $route11 = [1, 2, 3, 4];
    private $route12 = [2, 5, 6, 7, 8];
    private $ha0 = ["A0", 2, 1, 4, 3, "A1"];
    private $hb0 = ["B0", 5, 7, 6, 8, "B1"];
    private $ha1 = ["A0", 1,3,4, "A1"];
    private $hb1 = ["B0", 8, 5,2,6,7, "B1"];
    private $ha2 = ["A0", 1,4, 3, "A1"];
    private $hb2 = ["B0", 2,5,8,6,7, "B1"];
    private $ha3 = ["A0",4, 1,3,2, "A1"];
    private $hb3 = ["B0", 7,5,6,8, "B1"];

    private function _printMBSChildStopList(array $definitive, $possible, $color) {
        print('<div class="flex">');
        for ($i = 0; $i < count($definitive); $i++) {
            if (in_array($definitive[$i], $possible)){
                $circle_color = "dark";
            } else {
                $circle_color = $color;
            }
            print('<div class="circle '. $circle_color . '">'.$definitive[$i] . '</div>');
        }
        print('</div>');
    }

    public function mbs_parents() {
        $this->printSolution("P0", $this->pa1, $this->pb1, $this->switched);
        $this->printSolution("P1", $this->pa2, $this->pb2, $this->switched);
    }

    public function mbs_grouped() {
        print("<div class=\"flex mt3 mb3 gap3\">");
        print("<div>");
        $this->_printMBSChildStopList($this->route11, $this->switched, YELLOW);
        print("<div class=\"underline-light\">viajante A</div>");
        print("</div>");
        print("<div>");
        $this->_printMBSChildStopList($this->route12, $this->switched, CORAL);
        print("<div class=\"underline-light\">viajante B</div>");
        print("</div>");
        print("</div>");
    }

    public function mbs_children() {
        $this->printSolution("H0", $this->ha0, $this->hb0, $this->switched);
        $this->printSolution("H1", $this->ha1, $this->hb1, $this->switched);
        $this->printSolution("H2", $this->ha2, $this->hb2, $this->switched);
        $this->printSolution("H3", $this->ha3, $this->hb3, $this->switched);
    }
}

