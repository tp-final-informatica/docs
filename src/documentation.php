<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Especificaciones del sistema"); ?>

<?php printHeader("Documentación técnica general"); ?>

    <main id="main-content">
        <div class="content">

            <?php breadcrumb([['path' => "/docs/sitemap.html", 'title'=>"Índice"]]); ?>

            <? $index_doc = new Index(
                ['id'=>"", 'value'=>"Inicio"],
                [
                    ['id'=>"scenario", 'value'=>"Vista Escenarios"],
                    ['id'=>"logic", 'value'=>"Vista Lógica"],
                    ['id'=>"processes", 'value'=>"Vista Procesos"],
                    ['id'=>"physic", 'value'=>"Vista Física"],
                    ['id'=>"development", 'value'=>"Vista Desarrollo"]

                ],
                1
            ); ?>
            <? $index_doc->print_index(); ?>

            <? $index_doc->section_subheading_by_id("scenario"); ?>

            <? $index_doc->link_back_to_index(); ?>
            <? $index_doc->section_subheading_by_id("logic"); ?>

            <p>
                En esta sección abordaremos las abstracciones fundamentales del sistema a partir del dominio del
                problema. Se utilizaron aspectos de <em>Domain-Driven Design</em> que iremos mencionando más adelante
                y paradigma de objetos.
            </p>
            <p>
                A continuación, detallamos las entidades de software que conforman el modelado dentro del backend.
            </p>
            <? $diagram1 = new Figure("", "600px", "", "Modelo de entidades", ""); ?>

            <h3>Bounded Context</h3>
            <p>
                Es el patrón central en Domain-Driven Design. La idea principal de este concepto es delimitar a
                nuestro modelo, en principio grande, en subdominios y contextos estableciendo la relación entre estos.
            </p>
            <p>
                <em>Por ejemplo, no es lo mismo entender los atributos y la relaciones de una entidad como puede ser
                    un Pedido o un Cliente, vista desde un enfoque de marketing o vista desde un enfoque financiero.</em>
            </p>
            <p>
                En concreto, la entidad <span mono>Solutions</span> conceptualmente se refiere al mismo concepto que
                <span mono>Journeys</span>, pero al pertenecer a distintos contextos, poseen distintos atributos y
                comportamiento.
            </p>
            <? $diagram2 = new Figure("", "600px", "", "Diagrama de contextos", ""); ?>

            <p>
                Básicamente, cuando planteamos este mapa de contexto partiendo todo el sistema en subdominios,
                comenzamos a identificar subsistemas que forman un sistema complejo. Dividiendo el sistema utilizando
                una estrategia de divide y vencerás, estaremos separando nuestro problema principal en pequeños
                subproblemas a los que dar solución, problemas que pueden ser resueltos con pequeñas piezas de
                software (microservicios).
            </p>
            <p>
                Siguiendo este enfoque, el sistema <b>tendrá una gran cohesión</b> entre los elementos que lo componen
                y lo ideal es que tengan un <b>acoplamiento débil entre el resto de subdominios</b>.
            </p>
            <p>
                Así, el sistema puede escalar de manera fácil, migrando los <em>bounded context</em> a otros microservicios.
            </p>

            <h3>Event Bus</h3>
            <p>
                Siguiendo con lo anterior, para desacoplar los <em>bounded context</em> utilizamos un <b>Event Bus</b>
                desarrollado en memoria. Así, cada módulo no conoce al otro <span data-toggletip>El módulo Daytrip tiene
                    dependencias con el resto, porque debe crear un viaje de manera transaccional y por ello accede al
                    Repository de Doctors y Patients.</span>, es decir no hay interdependencias de artefactos, sino que
                a través de eventos de dominio, los módulos se enteran de los eventos que les interesa y actúan a partir
                de este, de manera asíncrona.
            </p>
            <? $diagram3 = new Figure("", "600px", "", "Diagrama de Event Bus", ""); ?>

            <p>
                Si bien el Event Bus, está desarrollado en memoria, a futuro puede ser un PubSub de Google, en caso de
                que cada Bounded Context fuera un microservicio. Así nos aseguramos de que el sistema pueda escalar
                de manera trivial a un entorno distríbuido.
            </p>

            <? $index_doc->link_back_to_index(); ?>

            <? $index_doc->section_subheading_by_id("processes"); ?>

            <p>
                Trataremos los aspectos dinámicos del sistema, cómo se comportan los procesos y cómo se comunican entre
                ellos. Aquí tomaremos como eje algunos requisitos no funcionales troncales del sistema, como la
                disponibilidad y la tolerancia a fallas.
            </p>

            <h3>Nueva jornada</h3>
            <p>
                La creación de la jornada es el proceso más importante y crítico.
            </p>
            <p>
                El backend recibe la petición de creación por parte del frontend y luego de validar que los parámetros
                recibidos sean correctos, consulta la
                <a href="https://developers.google.com/maps/documentation/distance-matrix/overview" target="_blank">
                    API Distance Matrix de Google
                </a> para calcular las distancias entre todas las locaciones.
            </p>
            <p>
                Una vez que conoce las distancias, calcula las soluciones realizando una petición POST contra la API
                Core, quién retorna un id de la ejecución para poder consultar posteriormente por el resultado.
                Esto se debe a que el core puede estar varios minutos calculando una solución.
                Así de manera asíncrona (dentro de una goroutine) el backend realiza un pooling cada X segundos para
                ir consultando el estado de la corrida.
            </p>
            <p>
                Mientras tanto, el frontend también realiza un pooling para ir mostrando el progreso de la corrida en
                la pantalla. Una vez que el backend encuentra la corrida como “ready” guarda en la base de datos las
                soluciones retornadas por el core.
                A esta altura, el frontend despliega las opciones para que el admin elija alguna de las propuestas de
                soluciones.
            </p>
            <p>
                A continuación, el diagrama de secuencia que describe el proceso:
            </p>
            <? $diagram3 = new Figure("", "600px", "", "Diagrama de secuencia de las acciones del backend", ""); ?>

            <h3>Push notification</h3>
            <p>
                El sistema utiliza push notifications para notificar dos eventos, la creación de la jornada y cuando
                esta última es cancelada. Los destinatarios, en ambas situaciones, son los médicos que están
                participando en la jornada.
            </p>

            <p>
                Utilizamos <a href="https://firebase.google.com/docs/cloud-messaging" target="_blank">
                    Firebase Cloud Messaging</a> para el envío de las push.
            </p>
            <p>
                Lo primero que debe ocurrir, es asociar el device token del dispositivo móvil a un médico / viajante.
                Para ello, cuando el médico realiza login en la aplicación, se envía un request al server con el device
                token, como se muestra en la siguiente imágen:
            </p>
            <? $image1 = new Figure("", "600px", "", "Diagrama de generación de token de autenticación", ""); ?>

            <p>
                Una vez realizado el vínculo, el trigger de la push es cuando se crea una jornada de viaje y se
                acepta una de las rutas propuestas, tal como se ve en este diagrama de actividad:

            </p>
            <? $diagram4 = new Figure("", "600px", "", "Diagrama de actividad", ""); ?>

            <? $index_doc->link_back_to_index(); ?>
            <? $index_doc->section_subheading_by_id("physic"); ?>
            <p>
                En esta vista abordaremos principalmente a la distribución y organización del software en el hardware.
            </p>
            <p>
                En entornos de desarrollo, cada aplicación está dockerizada y utilizamos docker compose para levantar
                todo el entorno local, tanto los motores de base datos como los servicios necesarios para desarrollar.
            </p>
            <p>
                En producción, decidimos implementar en Google Cloud Platform. Por temas de costos, en producción no
                usamos Redis, sino reutilizamos la instancia de MySQL.
            </p>
            <p>
                A continuación, el diagrama de despliegue en producción:
            </p>
            <? $diagram5 = new Figure("", "600px", "", "Diagrama de despliegue en Cloud", ""); ?>

            <? $index_doc->link_back_to_index(); ?>
            <? $index_doc->section_subheading_by_id("development"); ?>
            <p>
                En este apartado se desea ilustrar el sistema centrado en la organización real de los módulos de
                software. Por ello recurrimos al diagrama de paquetes.
            </p>
            <? $diagram6 = new Figure("", "600px", "", "Diagrama de paquetes", ""); ?>

            <p>
                A la hora de organizar los módulos en packages, suele haber dos estrategias:
            </p>
            <ul>
                <li>
                    Agrupado por tipo de artefacto: models / controllers
                    <? $diagram7 = new Figure("", "600px", "", "Ejemplo de agrupación por models/controllers", ""); ?>
                </li>
                <li>
                    Agrupando por feature
                    <? $diagram8 = new Figure("", "600px", "", "Ejemplo de agrupación por features", ""); ?>
                </li>
            </ul>
            <p>
                Siguiendo la filosofía de domain-driven-design, escogimos esta última.
                De esta forma, si necesitamos extender o modificar algo dentro de los casos de uso de Médicos,
                tendremos todo dentro del package doctors. Otra ventaja, como venimos mencionando, si estos módulos
                necesitan escalar a un nuevo microservicio, podrá extraerse fácilmente.
            </p>
            <h3>Principios</h3>
            <ul>
                <li>Cada módulo tiene su propio Composition Root, lo que implica que cada módulo tiene su propio
                    container de Inversion-of-Control.</li>
                <li>Cada módulo está altamente encapsulado. Así es compliance con principios SOLID.</li>
                <li>Los módulos se comunican entre sí asincrónicamente utilizando el Event Bus.</li>
                <li>Se utilizan DTOs para desacoplar la representación del modelo de dominio.</li>
                <li>Se alienta el uso de rich model y no de modelos anémicos.</li>

            </ul>
            <? $index_doc->link_back_to_index(); ?>





        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>