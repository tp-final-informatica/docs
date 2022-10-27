<?php
$title = "Definición de función de fitness";
$id = "fitness";
?>

<?php print_section_heading($title, $id); ?>

    <p>La función de fitness es la guía mediante la cual el algoritmo itera, aprende, y llega a una solución con características deseadas.</p>
    <p>Nuestro enfoque inicial fue condicionar dicha función para premiar o penalizar las distintas soluciones, en tanto fueran mejores o ps. Posteriormente, complejizamos nuestro enfoque, permitiendo soluciones teóricamente incorrectas, bajo una penalización mayor. Esto significa que permitimos soluciones en las que algunas visitas se repitieron, y otras no existieron. Esto permitió que estas soluciones propagaran su material genético, y contribuyeran también al resultado final.</p>
    <p>La solución final elegida siempre es una solución completa, que cumple con la teoría del problema del viajante (visita todos los puntos una única vez).
    <p>Dado que nuestro problema incluye no solo la búsqueda de la secuencia de rutas de menor distancia total, sino también la posibilidad proponer solucione las que algunas viajantes tienen prioridad, desarrollamos distintas funciones de fitness, para cubrir cada caso.</p>

    <h4>Caso 1: todos los viajantes participan obligatoriamente, las rutas son balanceadas, no tenemos viajantes con prioridad, nuestra función de fitness incluye ambas en su cálculo.</h4>
    <p>Por el momento es un número, dado por la siguiente fórmula:</p>
    <p class="center">fitness = 100 / ((costo de la ruta) * (1 + (costo de los viajantes)/2) )</p>
    <p>Al estar los costos dividiendo, el fitness crece cuanto mejor es la solución. Multiplicamos por 100 para que el número no sea tan chico. Esto no es necesario.</p>
    <p>Posible mejora: agregar balanceo de la ruta, con cota de cantidad de visitas (una solución balanceada puede ser mejor que una que asigna todas las visitas a un solo viajante, por ejemplo).</p>

<?php print_section_footer(); ?>