<?php
$title = "Selección de padres";
$id = "parents";
?>

<?php print_section_heading($title, $id); ?>
    <h3>Aleatoria</h3>
    <p>Se seleccionan dos padres de la generación anterior de forma aleatoria. No se pone ningún criterio extra para elegir un padre bueno o malo. De esta manera, se permite que todas las soluciones que sobrevivieron la generación anterior tengan probabilidad de procrear.</p>
    <p>La idea detrás de esto, es que no podemos saber de antemano qué combinaciones van a dar los mejores hijos, entonces se permiten todas.</p>
    <h3>Por fitness para uno de los padres</h3>
    <p>Con una probabilidad baja permitimos una selección de padres en la que nos aseguramos que al menos uno de los padres tenga buen fitness. Tomamos uno de los padres del mejor 10% de las soluciones, y el otro de forma aleatoria. Esto lo hicimos a modo de prueba para evaluar la incidencia en el resultado final.</p>

    <h3 id="parents-comparison">Combinación de ambas selecciones <span todo>Nuevo!</span></h3>

    <p>
        El método selección de los padres de una nueva solución tiene que ser único para una solución dada.
        Por esta razón probamos distintas combinaciones de los métodos anteriores para decidir de forma
        empírica cuál es la mejor.
        Las combinaciones evaluadas son las siguientes:
    </p>
    <ul>
        <li>Sólo aleatoria</li>
        <li>Por porcentajes, 75% aleatorias, 25% por fitness de un padre: 75/25</li>
        <li>Por porcentajes, 50% aleatorias, 50% por fitness de un padre: 50/50</li>
        <li>Por porcentajes, 25% aleatorias, 75% por fitness de un padre: 25/75</li>
        <li>Sólo por fitness de uno de los padres</li>
    </ul>

    <p>
        Ejecutamos un caso conocido y comparamos los resultados obtenidos utilizando estos
        parámetros contra los mejores
        valores obtenidos en todas las ejecuciones de ese caso.
        A continuación presentamos una tabla con los valores obtenidos para cada caso.
    </p>


    <table class="table table-bordered table-hover table-condensed">
        <thead><tr><th title="Field #1">Relación aleatoria/fitness de un padre</th>
            <th title="Field #2">Distancia a la mejor solución conocida</th>
            <th title="Field #3">Tiempo de ejecución</th>
        </tr></thead>
        <tbody><tr>
            <td>100% aleatoria</td>
            <td align="right">3.69% mayor que la mejor solución</td>
            <td align="right">21 segundos</td>
        </tr>
        <tr>
            <td>75/25</td>
            <td>1.79% mayor que la mejor solución</td>
            <td align="right">18.5 segundos</td>
        </tr>
        <tr>
            <td>50/50</td>
            <td >2.28% mayor que la mejor solución</td>
            <td align="right">19 segundos</td>
        </tr>
        <tr>
            <td style="background-color: #70ABAF61;">25/75</td>
            <td style="background-color: #70ABAF61;">1.14% mayor que la mejor solución</td>
            <td style="background-color: #70ABAF61;">19.7 segundos</td>
        </tr>
        <tr>
            <td style="background-color: #70ABAF61;">100% fitness (1 padre bueno, el otro aleatorio)</td>
            <td style="background-color: #70ABAF61;">1.69% mayor que la mejor solución</td>
            <td style="background-color: #70ABAF61;">15.7 segundos</td>
        </tr>
        </tbody></table>

<p>
    Luego de realizar estas pruebas concluimos que la mejor combinación es la de
    25% completamente aleatorios y 75% por fitness de un padre, por ser la que nos
    devolvió mejores resultados.
</p>
<p>
    Si bien las ejecuciones de 100% fitness fueron las mejores en tiempo de ejecución,
    no creemos que sea prudente elegirlas porque sería restringir demasiado
    el crecimiento del algoritmo: no podría darse nunca el cruce entre dos padres con
    malas características.
</p>
<p>
    Por esta razón, para encontrar una solución de compromiso, en la que se obtenga un mejor valor
    en un menor tiempo, decidimos elegir un punto medio entre ambas: 15% aleatorio, 85% fitness.
    El resultado obtenido es el siguiente:
</p>


    <table class="table table-bordered table-hover table-condensed">
        <thead><tr><th title="Field #1">Relación aleatoria/fitness de un padre</th>
            <th title="Field #2">Distancia a la mejor solución conocida</th>
            <th title="Field #3">Tiempo de ejecución</th>
        </tr></thead>
        <tbody>
        <tr>
            <td style="background-color: #70ABAF61;">15/85</td>
            <td style="background-color: #70ABAF61;">1.4% mayor que la mejor solución</td>
            <td style="background-color: #70ABAF61;" >18 segundos</td>
        </tr>
        </tbody></table>

<?php print_section_footer(); ?>