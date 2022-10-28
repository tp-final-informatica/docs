<?php
$title = "Selección de soluciones sobrevivientes";
$id = "survivors";
?>

<?php print_section_heading($title, $id); ?>

<p>Las siguientes son las funciones de probabilidad que utilizamos para seleccionar las soluciones que sobreviven y forman parte
de la siguiente generación. La elección de qué función usar se hace de manera aleatoria para cada generación.</p>
<h3>Distribución exponencial negativa</h3>

<?php print_figure(
        "./images/p_exponential.png",
        "Distribución de probabilidad según una exponencial negativa.",
        '
        <p>Se selecciona obligatoriamente un porcentaje de las mejores soluciones.
        En el gráfico esto se ve representado por un plateau con probabilidad igual a uno al inicio de la curva.
        Luego de ese porcentaje, la probabilidad desciende en forma de exponencial negativa hasta llegar
        a un valor pequeño pero distinto de cero.</p>
        <p>Elegimos una distribución exponencial y no lineal porque nos permitió variar la velocidad de la caída de la curva,
        de forma de asegurar una diferencia en la posibilidad de elegir una mejor solución respecto de una solución menos buena.</p>
        <p>Dado que la curva tiende a aplanarse en una probabilidad muy baja, pero distinta de cero, nos aseguramos de que todas las soluciones
        tengan posibilidad de ser elegidas.</p>
        ');?>

<h3>Distribución escalonada</h3>

<?php print_figure(
        "./images/p_square.png",
        "Distribución de probabilidad escalonada.",
        '
        <p>Al igual que en el caso anterior, las mejores soluciones tienen garantizada su supervivencia hacia la siguiente
        generación. Esto se refleja nuevamente en el gráfico con una probabilidad igual a uno para las primeras soluciones.</p>
        <p>La probabilidad de seleccionar cualquier otra solución es escalonada. Aquellas soluciones buenas, intermedias 
        o malas tienen la misma probabilidad de ser elegidas. El resto de las soluciones, es decir, todas las que no se destacan por ser 
        muy buenas, muy malas, o intermedias tienen probabilidad cero de ser elegidas.</p>
        ');?>

<h3>Comparación de resultados entre ambas distribuciones</h3>

<p todo>aca pensé en ejecutar el core variando la probabilidad de elegir una u otra. Tendría que hacerlo muchas veces y sacar promedio.</p>


<?php print_section_footer(); ?>