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

    public function ermBefore($t) {
        print('  <div class="mutation">');

        if ($t == 2) {
            print('<div class="flex wrap gap3 mb2">');
            print('  <div>');
            $this->printRoute([0,1,2,3, 5], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light">viajante A</div>');
            print('  </div>');
            print('  <div>');
            $this->printRoute([4,6,7], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light">viajante B</div>');
            print('  </div>');
            print('</div>');
        }

        if ($t == 4) {
            print('<div class=" mb2">');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('    <div>');
            $this->printRoute([0,1,2,3,4], [], WHITE, WHITE, YELLOW);
            print('      <div class="underline-light" style="width: 100%">viajante A</div>');
            print('    </div>');
            print('  </div>');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('  <div>');
            $this->printRoute([5,6,7,8], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light" style="width: 100%">viajante B</div>');
            print('  </div>');
            print('  </div>');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('  <div>');
            $this->printRoute([9,10,11,12,13], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light" style="width: 100%">viajante C</div>');
            print('  </div>');
            print('  </div>');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('  <div>');
            $this->printRoute([14,15,16,17], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light" style="width: 100%">viajante D</div>');
            print('  </div>');
            print('</div>');


            print('</div>');
        }

        print('</div>');
    }
    public function ermAfter($t) {
        print('  <div class="mutation">');

        if ($t == 2) {
            print('<div class="flex wrap gap3 mb2">');

            print('  <div>');
            $this->printRoute([0, 5], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light">viajante A</div>');
            print('  </div>');
            print('  <div>');
            $this->printRoute([4,6,1,2,3,7], [1,2,3], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light">viajante B</div>');
            print('  </div>');

            print('  </div>');
        }
        if ($t == 4) {
            print('<div class=" mb2">');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('    <div>');
            $this->printRoute([0,1,2,10,3,4], [10,11,12], WHITE, WHITE, YELLOW);
            print('      <div class="underline-light" style="width: 100%">viajante A</div>');
            print('    </div>');
            print('  </div>');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('  <div>');
            $this->printRoute([5,11,6,7,8], [10,11,12], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light" style="width: 100%">viajante B</div>');
            print('  </div>');
            print('  </div>');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('  <div>');
            $this->printRoute([9,13], [], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light" style="width: 100%">viajante C</div>');
            print('  </div>');
            print('  </div>');

            print('  <div class="flex column mb2" style="align-items: flex-start">');
            print('  <div>');
            $this->printRoute([14,15,16,12,17], [10,11,12], WHITE, WHITE, YELLOW);
            print('  <div class="underline-light" style="width: 100%">viajante D</div>');
            print('  </div>');
            print('</div>');


            print('</div>');
        }
        print('</div>');
    }
}