<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Comparación de lenguajes"); ?>

<?php printHeader("Comparación de lenguajes"); ?>
<main id="main-content">
<div class="content">


    <?php breadcrumb([
        ['path' => "/docs/core.html", 'title'=>"El core"]]); ?>

    <p>Para la implementación de la metaheurística del viajante consideramos los siguientes lenguajes de programación:</p>
    <ul>
        <li>R</li>
        <li>Golang</li>
        <li>C++</li>
        <li>Python.</li>
    </ul>

    <p>La elección de estos lenguajes la hicimos pensando las distintas características de los mismos:</p>
    <ul>

        <li><b>R</b> es un lenguaje pensado para manejo de datos a gran escala, y estudio estadístico de los mismos. Tiene buena performance y es muy utilizado en machine learning.</li>
        <li><b>Go</b> es un lenguaje muy moderno, creado por Google adoptando las ventajas de C++, Java y Python. Por default es concurrente y provee “threads livianos” (Goroutines). Tiene una vasta documentación, y una sintaxis muy sencilla.</li>
        <li><b>C++</b> es un lenguaje multipropósito de alto nivel, muy eficiente y rápido. Nosotros desarrollamos nuestro programa utilizando las librerías de std, que permitieron un manejo a muy alto nivel, lo que implica que fue comparable en complejidad a Go o Python.</li>
        <li><b>Python</b> es otro lenguaje multipropósito, más sencillo que C++ en su sintaxis. Python es muy utilizado en machine learning y en una variedad de áreas del software. Las pruebas previas a este trabajo (para evaluar la viabilidad del proyecto) se hicieron en Python.</li>
    </ul>

    <h2>Comparación a nivel características del lenguaje</h2>
    <table>
        <thead>
        <tr>
            <th>Característica</th>
            <th>R</th>
            <th>Go</th>
            <th>C++</th>
            <th>Python</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Tipo de lenguaje</th>
            <td>Funcional, procedural y Orientado a objetos (OOP)</td>
            <td>Procedural</td>
            <td>Orientado a objetos (OOP)</td>
            <td>Orientado a objetos (OOP)</td>
        </tr>
        <tr>
            <th>Manejo de memoria</th>
            <td>Tiene automatic garbage collection</td>
            <td>automatic garbage collection</td>
            <td>manejo manual de memoria</td>
            <td>automatic garbage collector</td>
        </tr>
        <tr>
            <th>Tipado</th>
            <td>Fuertemente y dinámicamente tipado</td>
            <td>Fuertemente tipado<br>Tipado estático</td>
            <td>Fuertemente y dinámicamente tipado.<br>Fuertemente TipadoTipado estático</td>
            <td>Tipado.<br>Tipado dinámico</td>
        </tr>
        <tr>
            <th>Forma de ejecución</th>
            <td>Interpretado</td>
            <td>Compilado</td>
            <td>Compilado</td>
            <td>Interpretado</td>
        </tr>
        <tr>
            <th>Concurrencia</th>
            <td>No de manera nativa.</td>
            <td>Incorporado a nivel del lenguaje: "Goroutines"</td>
            <td>Sí.</td>
            <td>Sí.</td>
        </tr>
        </tbody>
    </table>

    <h2>Pruebas ejecutadas</h2>

    <p>Implementamos el mismo pseudocódigo en los cuatro lenguajes. Planteamos cuatro escenarios de pruebas. La idea era poner a prueba cada lenguaje con la misma solución, para poder comparar los tiempos de ejecución. Los escenarios planteados fueron los siguientes, sobre el mismo set de datos:</p>
    <ol>
        <li>Generación de 100000 soluciones aleatorias para 3 viajantes.</li>
        <li>Puesta a prueba del motor de aleatoriedad generando 100000 soluciones aleatorias para 1, 2, 3, 4 y 5 viajantes, y recuento de soluciones repetidas en cada caso.</li>
        <li>Ordenamiento de 100000 soluciones por distancia total de las soluciones para 3 viajantes.</li>
        <li>Repetición de las pruebas anteriores y cálculo de una generación posterior mediante un algoritmo propio. Los pasos realizados son los siguientes:
        <ol>
            <li>Generación de 100000 soluciones aleatorias,</li>
            <li>Ordenamiento de las mismas,</li>
            <li>Generación de soluciones derivadas (hijas), para cada solución anterior + una solución aleatoria a elección (padre y madre),</li>
            <li>Ordenamiento de las soluciones hijas,</li>
            <li>Recuento de soluciones repetidas y</li>
            <li>Selección de la mejor solución.</li>
        </ol>
        Las soluciones hijas se conformaron siempre de la misma forma: para cada viajante se seleccionaron los puntos en común de las soluciones padres, y luego con una probabilidad escalonada se seleccionaron el resto de los puntos que pertenecían a alguno de los padres.
        </li>
    </ol>

    <h2>Resultados obtenidos</h2>
    <p>El <b>escenario 1</b> no presentó grandes diferencias entre los distintos lenguajes. Todas las ejecuciones llevaron menos de un segundo. Fue el primer acercamiento a algunos de los lenguajes elegidos. Agregamos que la implementación en R fue realizada dos veces: mediante loops y mediante la familia de funciones apply. La segunda fue mucho más rápida (y la que utilizamos de aquí en adelante).</p>
    <p>El <b>escenario 2</b> tampoco presentó diferencias entre los lenguajes. Los motores de aleatoriedad de los cuatro lenguajes fueron lo suficientemente capaces de generar 100000 soluciones únicas en todos los casos. Este escenario dejó en evidencia que el uso de funciones aleatorias en C++ necesita más desarrollo que en el resto de los lenguajes, puesto que para obtener un buen tiempo de ejecución es necesario utilizar motores de aleatoriedad fuera de las librerías básicas que trae el lenguaje.</p>
    <p>El <b>escenario 3</b> sirvió para comparar la complejidad de desarrollo de los distintos lenguajes, pero nuevamente, no presentó grandes diferencias entre los 4 lenguajes evaluados.</p>
    <p>El <b>escenario 4</b> fue el más complejo por ser una combinación de los anteriores, y es donde se notaron las diferencias en tiempos de ejecución. Este se midió siempre en la misma máquina, corriendo todos los programas sobre imágenes estándar de Docker, mediante el comando time de linux. Los resultados se muestran en la tabla a continuación.</p>

    <table>
        <thead>
        <tr>
            <th>Lenguaje</th>
            <th>R</th>
            <th>GO</th>
            <th>C++</th>
            <th>Python</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Runtime del test</br>más complejo<br>(escenario 4)</th>
            <td>real 4m38,603s<br>user 0m3,378s<br>sys 0m8,669s</td>
            <td>real 0m12,765s<br>user 0m0,125s<br>sys 0m0,179s</td>
            <td>real 0m32,518s<br>user 0m18,730s<br>sys 0m9,845s</td>
            <td>real 0m34,567s<br>user 0m1,068s<br>sys 0m2,156s</td>
        </tr>
        <tr>
            <th>Valor redondeado</th>
            <td>~ 4 minutos</td>
            <td>~ 10 segundos</td>
            <td>~ 30 segundos</td>
            <td>~ 30 segundos</td>
        </tr>
        </tbody>
    </table>

    <p>El lenguaje que produjo la ejecución más rápida fue <b>Go</b>, seguido de <b>Python</b> y <b>C++</b>, por casi tres veces el mismo tiempo.</p>
    <p>El tiempo de ejecución del programa claramente es muy importante en la decisión del lenguaje a elegir, pero también lo es la complejidad de desarrollo en cada caso. La implementación de las pruebas para cada lenguaje llevó entre 2 y 4 días:</p>
    <ul>
        <li>Python llevó 2 días de desarrollo.</li>
        <li>Go llevó 3 días de desarrollo.</li>
        <li>C++ llevó un total de 4 días de desarrollo.</li>
        <li>Por último, R llevó 4 días por iteraciones, y 4 más refactorizando el código para utilizar la familia de funciones apply.</li>
    </ul>

    <p>El código de las pruebas realizadas está disponible para consulta en el repositorio de GitHub.</p>
    <p>En base a las pruebas realizadas, a las características del lenguaje, y a la complejidad de implementación en cada caso, tomamos la decisión de utilizar <b>Golang</b> para implementar nuestro algoritmo.</p>

<!--    --><?php //nextRead("/docs/core/algorithm.html", "El algoritmo genético"); ?>
    <?php prevAndNext(
        ['path' => "/docs/core.html", 'title'=>"El core"],
        ['path' => "/docs/core/algorithm.html", 'title'=>"El algoritmo genético"]
    ); ?>
</div>
</main>
<?php footer(); ?>

<?php HTML_foot(); ?>