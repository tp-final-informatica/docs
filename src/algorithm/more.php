<?php
$title = "Otras modificaciones al algoritmo";
$id = "more";
?>

<?php print_section_heading($title, $id); ?>
    <p>
        Las siguientes son modificaciones que planteamos durante el desarrollo
        del algoritmo.
    </p>

    <h3>Shake mutation</h3>
    <p>
        Notamos que el algoritmo en general converge hacia una solución, y luego
        tarda muchas iteraciones en encontrar soluciones mejores. Por esta razón planteamos
        esta mejora que implica aumentar el porcentaje de mutaciones luego de una cantidad
        preseleccionada de iteraciones estancadas.
    </p>
    <p>
        La intención era sacudir al algoritmo (shake) cambiando por una cantidad definida de
        iteraciones el porcentaje de mutación inicial, normalmente un valor entre 0.01 y 0.05
        y llevarlo al doble, o al triple, durante una o más iteraciones.
    </p>
    <p>
        El resultado esperado era ver saltos en la curva de mejor solución por generación, pero
        el resultado obtenido fue que en general, este cambio no aportó mejoras.
    </p>
    <p>
        Finalmente decidimos retirar esta modificación del algoritmo.
    </p>
    <h3>Sort + immigration</h3>
    <p>
        Nuevamente, intentando atacar el estancamiento del algoritmo agregamos otra modificación en
        la que esta vez, a intervalos regulares duplicamos el pool genético justo antes del proceso
        de selección y ordenamos todas esas soluciones duplicadas por menor distancia entre los puntos
        de las rutas, de la misma forma que lo hacemos en el <a href="/docs/core/algorithm.html#mbs">
        crossover MBS</a>.
    </p>
<p></p>



<?php print_section_footer(); ?>