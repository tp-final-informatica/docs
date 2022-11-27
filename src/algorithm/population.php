<?php
$title = "Tamaño de la población y cantidad de generaciones";
$id = "population";
?>

<?php print_section_heading($title, $id); ?>
    <p>Para el desarrollo del algoritmo se utilizó un set de datos y se ajustaron los parámetros de ejecución acorde a
        estos. Para una cantidad cercana a 20 visitas y dos viajantes, el desarrollo se hizo con una población de 200
        soluciones y cerca de 600 loops (parámetros que fueron variando a lo largo del desarrollo). Cuando el algoritmo
        estuvo completo y cambiamos el set de datos, notamos que estos números ya no eran útiles para resolver el
        problema.
        </p><p>El ejemplo más claro es el de un viajante con 5 visitas:
        la cantidad total de soluciones posibles (el espacio de soluciones disponible) en este caso es
        <span class="mono" aria-label="5 factorial igual a 120" title="5 factorial igual a 120">5!=120</span>,
        que nunca llega a completar nuestro valor esperado de 200 soluciones por generación.</p>
    <p>Al reducir el tamaño de la población notamos también que la cantidad fija de 600 de
        generaciones era desproporcionadamente grande. En efecto, pruebas empíricas demostraron que un total
        de 30 generaciones es suficiente para un viajante y hasta 10 visitas.</p>
    <p>Este descubrimiento nos llevó a pensar que lo mismo podía suceder en el caso contrario, con más viajantes y visitas
        que en nuestro caso de desarrollo. Decidimos encontrar de forma empírica los valores más adecuados para estos
        parámetros (teniendo en cuenta limitaciones de performance), puesto que no hay una regla definida respecto a
        estos en nuestro problema
        <span data-toggletip>Inspirado en el paper "Influence of the Population Size on the Genetic Algorithm
            Performance in Case of Cultivation Process Modelling" (ver sección Bibliografía).</span>.
    </p>
    <section class="lessons"  aria-label="Lecciones aprendidas">
        <p>
            <span class="lightbulb"></span>
            Los parámetros de ejecución dependen de la cantidad de elementos en las soluciones. No existe un <em>número
            mágico</em> para nuestro problema. El hecho de que nuestro problema esté poco estudiado y en consecuencia
            haya poca bibliografía específica implica que el descubrimiento de los mejores valores debe hacerse de forma
            <b>empírica</b> a través de distintas simulaciones.
        </p>
    </section>
    <p todo > en desarrollo - no terminamos de encontrar los parámetros aun </p>
<?php print_section_footer(); ?>