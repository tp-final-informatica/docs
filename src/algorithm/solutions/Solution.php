<?php

const YELLOW = "yellow-crayola";
const TURQUOISE = "medium-turquoise";
const CORAL = "light-coral";
const BLACK = "dark";
const WHITE = "light";

class Solution {
    public function printRoute(array $array, $skipped, $color, $edges = TURQUOISE, $special = BLACK) {
        print('<div class="flex">');
        for ($i = 0; $i < count($array); $i++) {
            $circle_color = $edges;

            if ($i != 0 && $i != count($array)-1) {
                $circle_color = $color;
                if (in_array($array[$i], $skipped)){
                    $circle_color = $special;
                }
            }
            print('<div class="circle '. $circle_color . '"><p>'.$array[$i] . '</p></div>');
            if ($i != count($array)-1) {
                print('<i class="icono-arrow1-left"></i>');
            }
        }
        print('</div>');
    }

    public function printSpecificRoute(array $array, array $colors, $skipped =[], $skippedColor = BLACK) {
        print('<div class="flex">');
        if (count($array) != count($colors)) {
            return;
        }
        for ($i = 0; $i < count($array); $i++) {
            $circle_color =  $colors[$i];
            if (in_array($array[$i], $skipped)){
                $circle_color = $skippedColor;
            }
            print('<div class="circle '. $circle_color . '"><p>'.$array[$i] . '</p></div>');
            if ($i != count($array)-1) {
                print('<i class="icono-arrow1-left"></i>');
            }
        }
        print('</div>');
    }


    // Index es el nombre que le ponemos a la solucion.
    // $routeA y $routeB son los arrays que representan las rutas
    // $switched es un array con los stops que se intercambian entre rutas
    // $subrouteA y $subrouteB son las subrutas que deberían marcarse en negro (para PMX)
    // $baseColor es el color que usamos para overridear los stops si no queremos que sean Yellow y Coral
    public function printSolution($index, $routeA, $routeB, $switched, $subrouteA = [], $subrouteB = [], $baseColor = NULL) {
        print('<div class="flex wrap mt3 mb3 space">');
        print('  <p>'.$index.'</p>');
        print('  <div class="flex wrap gap3">');

        $routes = [$routeA, $routeB];
        $names = ["viajante A", "viajante B"];
        $subroutes = [$subrouteA, $subrouteB];
        if ($baseColor == NULL ){
            $baseColor = [YELLOW, CORAL];
        } else {
            $baseColor = [$baseColor, $baseColor];
        }

        for ($r=0; $r<count($routes); $r++) {
            print(' <div>');
            if (count($subroutes[$r])==2) {
                print('    <div class="flex">');
                $subroute1 = array_slice($routes[$r], 0, $subroutes[$r][0]);
                $colors1 = [];
                for ($i=0; $i < count($subroute1); $i++) {
                    if ($i == 0) {
                        $colors1[] = TURQUOISE;
                    } else {
                        $colors1[] = $baseColor[$r];
                    }
                }
                $this->printSpecificRoute($subroute1, $colors1, $switched);
                print('<i class="icono-arrow1-left"></i>');

                $subroute2 = array_slice($routes[$r], $subroutes[$r][0], $subroutes[$r][1]-$subroutes[$r][0]);
                $colors2 = [];
                for ($i=0; $i < count($subroute2); $i++) {
                    $colors2[] = $baseColor[$r];
                }
                print('<div class="subroute-dark">');
                $this->printSpecificRoute($subroute2, $colors2, $switched, WHITE);

                print('</div>');
                print('<i class="icono-arrow1-left"></i>');
                $subroute3 = array_slice($routes[$r], $subroutes[$r][1]);
                $colors3 = [];
                for ($i=0; $i < count($subroute3); $i++) {
                    if ($i == count($subroute3)-1) {
                        $colors3[] = TURQUOISE;
                    } else {
                        $colors3[] = $baseColor[$r];
                    }
                }
                $this->printSpecificRoute($subroute3, $colors3, $switched);

                print('  </div>');

            } else {
                $this->printRoute($routes[$r], $switched, $baseColor[0]);
            }
            print('    <div class="underline-light">');
            print($names[$r]);
            print('    </div>');
            print(' </div>');
        }
        print('  </div>');
        print('</div> ');
    }


    public function printStopList($array, $color) {
        print('<div class="flex">');
        $circle_color = $color;
        for ($i = 0; $i < count($array); $i++) {
            print('<div class="circle '. $circle_color . '"><p>'.$array[$i] . '</p></div>');
        }
        print('</div>');
    }

}
