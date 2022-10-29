<?php

class Mutation extends Solution
{

    public function dm() {
        print('  <div class="mutation">');

        $this->printRoute(
            [0, 1, 2, 3, 4],
            [1, 3],
            WHITE,
            WHITE,
            YELLOW
        );

        $this->printRoute(
            [0, 3, 2, 1, 4],
            [1, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');

    }

    public function rsm() {
        print('  <div class="mutation">');

        $this->printRoute(
            [0, 1, 2, 3, 4, 5],
            [1, 2, 3],
            WHITE,
            WHITE,
            YELLOW
        );

        $this->printRoute(
            [0, 3, 2, 1, 4, 5],
            [1,2, 3],
            WHITE,
            WHITE,
            YELLOW
        );
        print('</div>');

    }

    public function psm() {
        print('  <div class="mutation">');

        $this->printRoute(
            [0, 1, 2, 3, 4, 5],
            [1, 2, 3],
            WHITE,
            WHITE,
            YELLOW
        );

        $this->printRoute(
            [0, 2,3, 1, 4, 5],
            [1,2, 3],
            "",
            "",
            YELLOW
        );
        print('</div>');

    }

    public function jm() {
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

}