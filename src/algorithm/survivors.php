<?php
$title = "Selección de soluciones sobrevivientes";
$id = "survivors";
?>

<?php print_section_heading($title, $id); ?>

<p>Las siguientes son las funciones de probabilidad que utilizamos para seleccionar las soluciones que sobreviven y forman parte
de la siguiente generación. La elección de qué función usar se hace de manera aleatoria para cada generación.</p>
<h3>Distribución exponencial negativa</h3>

<?php print_figure(
        "/docs/images/p_exponential.png",
        "Distribución de probabilidad según una exponencial negativa.",
        '
        <p>Se selecciona obligatoriamente un porcentaje de las mejores soluciones.
        En el gráfico esto se ve representado por un plateau con probabilidad igual a uno al inicio de la curva.
        Luego de ese porcentaje, la probabilidad desciende en forma de exponencial negativa hasta llegar
        a un valor pequeño pero distinto de cero.</p>
        <p>Elegimos una distribución exponencial y no lineal porque nos permitió variar la velocidad de la caída de la curva,
        de forma de asegurar una diferencia en la posibilidad de elegir una mejor solución respecto de una solución menos buena.</p>
        <p>Dado que la curva tiende a aplanarse en una probabilidad muy baja, pero distinta de cero, nos aseguramos de que 
        todas las soluciones
        tengan posibilidad de ser elegidas.</p>
        ');?>

<?php print_figure(
        "/docs/images/survivors_exponential.png",
    "Soluciones sobrevivientes que entraron en la nueva generación dada una probabilidad exponencial",
    '
        <p>El gráfico anterior muestra el resultado de una ejecución en la que se aplicó la distribución de probabilidad
        exponencial para la selección de 200 soluciones sobrevivientes de un pool inicial de 1234
    soluciones disponibles.</p>
    <p>
    Podemos apreciar que los puntos de la curva están más juntos para valores más pequeños de <span mono>Y</span>, y 
    se espacían de a poco conforme <span mono>Y</span> va creciendo. Esto es el resultado de aplicar una distribución 
    de probabilidad con una pendiente negativa variable.
     Sabiendo que las soluciones están ordenadas por fitness, esto indica también que las mejores soluciones fueron 
    elegidas con mayor probabilidad, pero que las peores soluciones tuvieron su oportunidad de sobrevivir.</p>
    <p>Por último puede verse que hasta <span mono>X=30</span> la curva tiene una pendiente más baja, casi recta. Esto es porque esas primeras
    30 soluciones fueron elegidas independientemente de su probabilidad, es decir, tenían su lugar asegurado.</p>'
); ?>

<h3>Distribución escalonada</h3>

<?php print_figure(
        "/docs/images/p_square.png",
        "Distribución de probabilidad escalonada.",
        '
        <p>Al igual que en el caso anterior, las mejores soluciones tienen garantizada su supervivencia hacia la siguiente
        generación. Esto se refleja nuevamente en el gráfico con una probabilidad igual a uno para las primeras soluciones.</p>
        <p>La probabilidad de seleccionar cualquier otra solución es escalonada. Aquellas soluciones buenas, intermedias 
        o malas tienen la misma probabilidad de ser elegidas. El resto de las soluciones, es decir, todas las que no se destacan por ser 
        muy buenas, muy malas, o intermedias tienen probabilidad cero de ser elegidas.</p>
        ');?>

<?php print_figure(
    "/docs/images/survivors_square.png",
    "Soluciones sobrevivientes que entraron en la nueva generación dada una probabilidad escalonada",
    '
    <p>El gráfico anterior muestra qué soluciones pasaron a la siguiente generación del pool generado en una iteración 
    de una ejecución, pero ahora para la distribución de probabilidad escalonada. En este caso, de cerca de 1300
    soluciones disponibles, nuevamente sólo 200 pasaron a ser parte de la siguiente generación.
    </p><p>
    La curva tiende a parecer más una recta, en la que la densidad de puntos es más o menos constante sobre la curva 
    (exceptuando las primeras 30 soluciones), lo que indica que todas las soluciones 
    tuvieron la misma probabilidad de ser elegidas. Al igual que en el caso anterior, las primeras 30 soluciones 
    fueron rescatadas independientemente de su probabilidad (y por esto la pendiente es menos pronunciada en esa parte de la curva).
    </p><p>
    Se puede apreciar dos saltos importantes en esta curva, que indican grandes cantidades de soluciones que no fueron 
    elegidas: aquellas cuya probabilidad fue cero en la distribución escalonada presentada anteriormente.
    Sabiendo que las soluciones están ordenadas por fitness, todo esto indica que el grupo de mejores, intermedias, y peores soluciones
    fueron elegidas con igual probabilidad.</p>
    '
); ?>

<h3>Comparación de resultados entre ambas distribuciones</h3>

<p todo>aca pensé en ejecutar el core variando la probabilidad de elegir una u otra. Tendría que hacerlo muchas veces y sacar promedio.</p>


<?php print_section_footer(); ?>