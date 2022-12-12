<?php
$title = "Definición de función de fitness";
$id = "fitness";
?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<?php print_section_heading($title, $id); ?>

    <p>La función de fitness es la guía mediante la cual el algoritmo itera, aprende, y llega a una solución con las
        características deseadas.</p>
    <p>Dado que nuestro programa debía devolver tres propuestas de rutas con criterios distintos, fue necesario proponer
        tres variantes de funciones de fitness distintas para cumplir con este requerimiento.</p>
    <p>Nuestra función de fitness base es la siguiente:</p>
    <div class="math" aria-label="La función de fitness equivale a una fracción en la que el numerador es una constante C
    y el denominador
    es el costo relacionado a la distancia calculada, más un parámetro relacionado a la
    prioridad de los viajantes, más un parámetro relacionado a la validez de la solución y más un parámetro relacionado
    al balanceo de las visitas entre las rutas.">
        <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
            <mi>fitness</mi> <mo>=</mo>
            <mrow>
                <mfrac>
                    <mrow>
                        <mi>C</mi>
                    </mrow>
                    <mrow>
                        <mi>p1</mi><mo>*</mo><mi>costo(distancia)</mi>
                        <mo>+</mo><mi>p2</mi><mo>*</mo><mi>costo(viajantes)</mi>
                        <mo>+</mo><mi>p3</mi><mo>*</mo><mi>costo(validez)</mi>
                        <mo>+</mo><mi>p4</mi><mo>*</mo><mi>costo(desbalanceo)</mi>
                    </mrow>
                </mfrac>
            </mrow>
        </math>
    </div>
    <p>Donde los costos por distancia, viajantes, validez y balanceo se calculan según el tipo de ejecución, y
    los parámetros <span mono>p1</span>, <span mono>p2</span>, <span mono>p3</span> y <span mono>p4</span> son parámetros
    predefinidos también por cada tipo de ejecución.</p>
    <p>Al estar el costo por distancia en el denominador, <em>el fitness crece cuanto mejor es la solución, es decir,
            cuanto menos distancia se recorre</em>.
        El costo por distancia es en realidad una relación entre el valor real de la distancia de la solución, y el
        costo de la peor solución en la misma generación. Esto lo hacemos para garantizar un
        valor menor o igual a 1, independientemente de la cantidad de visitas que tengamos que procesar.
        Multiplicamos por una constante <span mono>C</span> que se define como la suma de los parámetros
        <span mono>p1</span>, <span mono>p2</span>, <span mono>p3</span> y <span mono>p4</span>, de forma de
        normalizar los posibles resultados.
    </p>
    <p>Se ajustan los parámetros de la función según cualquiera de los siguientes tres casos:</p>
    <ol>
        <li>Todos los viajantes participan obligatoriamente, las rutas son balanceadas, no tenemos viajantes con prioridad</li>
        <li>El algoritmo decide qué viajantes participan de la solución final elegida, y cuántas visitas realizan. No
            tenemos viajantes con prioridad.</li>
        <li>Existe un costo por usar un grupo u otro de viajantes (parte del plantel estable de la empresa, o externos).
            El algoritmo decide si incluirlos, y cuántas visitas asignarles.</li>
    </ol>
    <br/>
    <section class="lessons"  aria-label="Lecciones aprendidas">
        <p><span class="lightbulb"></span>
            Nuestro enfoque inicial fue condicionar nuestras soluciones
            para permitir únicamente aquellas que cumplieran con las restricciones del problema del viajante entre ellas:
            <em>todos los puntos deben ser visitados una única vez</em>. Luego entendimos que permitir esta falla en
            nuestras rutas podía brindarle <b>variedad</b> a nuestro algoritmo, por lo que posteriormente reescribimos el código
            e incluimos esta validación <b>dentro de nuestras funciones de fitness bajo una gran penalidad</b> (costo por validez).
        </p>
        <p>
            Permitir soluciones teóricamente incorrectas significa que, durante la ejecución del programa, soluciones en
            las que algunas visitas se repitieron u otras no existieron, formaron parte del pool genético de alguna generación.
        </p>
        <p>
            Si bien este tipo de soluciones no fueron nunca elegidas como la solución ganadora, esto <b>permitió que estas
                soluciones propagaran su material genético, y contribuyeran también a un resultado final más rico genéticamente</b>.
        </p>
    </section>

    <h3>Caso 1: todos los viajantes participan obligatoriamente, las rutas son balanceadas, no tenemos viajantes con prioridad</h3>
    <p>Para este caso, el fitness de una solución viene dado por los siguientes parámetros:</p>
    <ul>
        <li><span class="math-font">costo por distancia</span>: el costo de la solución, en el que se miden todas las distancias recorridas entre los puntos de las rutas</li>
        <li><span class="math-font">costo por viajantes</span>: en este caso es cero, porque no consideramos viajantes con prioridad todavía</li>
        <li><span class="math-font">costo por validez</span>: este valor es cero si la solución tiene todas las visitas una única vez, y crece en tanto
            las visitas se repitan, o falten, en una solución</li>
        <li><span class="math-font">costo por desbalanceo</span>: para este caso, este parámetro crece si las rutas tienen más o menos visitas que el promedio.
            Es decir, si tengo dos rutas que comparten 10 visitas, la solución será más balanceada en tanto la cantidad de visitas
        por ruta se asemeje a 5, y menos balanceada en tanto suceda lo contrario.</li>
    </ul>

    <h3>Caso 2: los viajantes no participan obligatoriamente, las rutas no necesariamente son balanceadas, no tenemos viajantes con prioridad</h3>
    <p>Para este caso, el fitness de una solución viene dado por los siguientes parámetros:</p>
    <ul>
        <li><span class="math-font">costo por distancia</span>: el costo de la solución, en el que se miden todas las distancias recorridas entre los puntos de las rutas</li>
        <li><span class="math-font">costo por viajantes</span>: en este caso es cero, porque no consideramos viajantes con prioridad todavía</li>
        <li><span class="math-font">costo por validez</span>: este valor es cero si la solución tiene todas las visitas una única vez, y crece en tanto
            las visitas se repitan, o falten, en una solución</li>
        <li><span class="math-font">costo por desbalanceo</span>: se penalizan aquellas soluciones que propongan rutas muy largas
        y por ello difíciles de realizar por los médicos. El límite de visitas elegido por ruta es 18.</li>
    </ul>

    <h3>Caso 3: los viajantes no participan obligatoriamente, las rutas no necesariamente son balanceadas, tenemos viajantes con prioridad</h3>
    <p>Para este caso, el fitness de una solución viene dado por los siguientes parámetros:</p>
    <ul>
        <li><span class="math-font">costo por distancia</span>: el costo de la solución, en el que se miden todas las distancias recorridas entre los puntos de las rutas</li>
        <li><span class="math-font">costo por viajantes</span>: un valor que crece conforme se utilizan viajeros externos en
        las rutas para penalizarlo</li>
        <li><span class="math-font">costo por validez</span>: este valor es cero si la solución tiene todas las visitas una única vez, y crece en tanto
            las visitas se repitan, o falten, en una solución</li>
        <li><span class="math-font">costo por desbalanceo</span>: se penalizan aquellas soluciones que propongan rutas muy largas
        y por ello difíciles de realizar por los médicos. El límite de visitas elegido por ruta es 18.</li>
    </ul>

<?php print_section_footer(); ?>