<?php

class Mutation extends Solution
{

    public function dmBefore() {
        print('  <div class="mutation">');

        $this->printRoute(
            [0, 1, 2, 3, 4],
            [1, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');
    }
    public function dmAfter() {
        print('  <div class="mutation">');

        $this->printRoute(
            [0, 3, 2, 1, 4],
            [1, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');

    }

    public function rsmBefore() {
        print('  <div class="mutation">');
        $this->printRoute(
            [0, 1, 2, 3, 4, 5],
            [1, 2, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');
    }
    public function rsmAfter() {
        print('  <div class="mutation">');
        $this->printRoute(
            [0, 3, 2, 1, 4, 5],
            [1,2, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');
    }

    public function psmBefore() {
        print('  <div class="mutation">');
        $this->printRoute(
            [0, 1, 2, 3, 4, 5],
            [1, 2, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');

    }
    public function psmAfter() {
        print('  <div class="mutation">');
        $this->printRoute(
            [0, 2, 3, 1, 4, 5],
            [1,2, 3],
            "",
            "",
            YELLOW
        );
        print('</div>');
    }

    public function jmBefore() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,1,2,3], [1], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([4,5,6,7], [1], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');
    }

    public function jmAfter() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,2,3], [1], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([4,5,6,1,7], [1], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');
    }

    public function jdmBefore() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,1,2,3], [1,6], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([4,5,6,7], [1,6], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');

    }
    public function jdmAfter() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,6, 2,3], [1,6], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([4,5,1,7], [1,6], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');
    }


    public function jrsmBefore() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,1,2,3], [2,1], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([4,5,6,7], [1,2], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');

    }
    public function jrsmAfter() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,3], [1,2], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([4,5,6, 2,1,7], [1,2], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');
    }

    public function jpsmBefore() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,1,2,3,4, 5], [2,3,4], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([6,7], [2,3,4], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');

    }
    public function jpsmAfter() {
        print('  <div class="mutation">');
        print('<div class="flex wrap gap3 mb2">');
        print('  <div>');
        $this->printRoute([0,1,5], [2,3,4], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante A</div>');
        print('  </div>');
        print('  <div>');
        $this->printRoute([6,3,2,4,7], [2,3,4], WHITE, WHITE, YELLOW);
        print('  <div class="underline-light">viajante B</div>');
        print('  </div>');
        print('</div>');
        print('</div>');
    }
}