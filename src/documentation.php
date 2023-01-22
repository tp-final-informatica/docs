<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Documento de Arquitectura"); ?>

<?php printHeader("Documento de Arquitectura"); ?>

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

            <p>
                La Vista de Escenarios o Casos de Uso presenta un subconjunto del Modelo de Casos de Uso.
                Representan las funcionalidades centrales del sistema, que requieran una gran cobertura
                arquitectónica o aquellos que impliquen algún punto especialmente delicado de la arquitectura.
                Estos casos de uso, en conjunto con los requerimientos no funcionales, permiten descubrir y
                diseñar la arquitectura del sistema.
            </p>

            <h3>Admin</h3>
            <?php
            $thumbnail_width = "500px";
            $use_case_admin = new Figure("/docs/images/documentation/use_case_admin.png", $thumbnail_width,
            "", "Casos de uso del admin: crear jornada y cancelar jornada", "");
            $use_case_admin->print_img();
            ?>


            <table class="table table-bordered table-hover table-condensed">
                <thead><tr>
                    <th title="Field #1">Caso de uso:</th>
                    <th title="Field #2">
                        Crear jornada
                    </th>
                </tr></thead>
                <tbody>
                <tr>
                    <td style="">Actores</td>
                    <td style="">Admin</td>
                </tr>
                <tr>
                    <td style="">Precondiciones</td>
                    <td style="">Sesión del admin iniciada; Médicos y Pacientes cargados.</td>
                </tr>
                <tr>
                    <td style="">Postcondiciones</td>
                    <td style="">
                        Jornada creada y rutas asignadas a los médicos.
                    </td>
                </tr>
                <tr>
                    <td style="">Propósito</td>
                    <td style="">
                        Generar las rutas de los médicos a partir de los pacientes a visitar en el día.
                    </td>
                </tr>
                </tbody>
            </table>


            <table class="table table-bordered table-hover table-condensed">
                <thead><tr>
                    <th title="Field #1">Caso de uso:</th>
                    <th title="Field #2">
                        Cancelar jornada
                    </th>
                </tr></thead>
                <tbody>
                <tr>
                    <td style="">Actores</td>
                    <td style="">Admin</td>
                </tr>
                <tr>
                    <td style="">Precondiciones</td>
                    <td style="">Viaje iniciado</td>
                </tr>
                <tr>
                    <td style="">Postcondiciones</td>
                    <td style="">
                        Viaje cancelado. Los pacientes que no fueron visitados podrán ser asignados en
                        una nueva jornada.
                    </td>
                </tr>
                <tr>
                    <td style="">Propósito</td>
                    <td style="">
                        <ul>
                            <li>
                                Algún médico sufre un imprevisto y debe darse de baja de la jornada. y el admin necesita recalcular la jornada.
                            </li>
                            <li>
                                Por error del administrador.
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>




            <h3>Médico/viajante</h3>
            <?php
            $use_case_md = new Figure("/docs/images/documentation/use_case_md.png", $thumbnail_width ,
                "", "Caso de uso del médico: visita de pacientes", "");
            $use_case_md->print_img();
            ?>

            <table class="table table-bordered table-hover table-condensed">
                <thead><tr>
                    <th title="Field #1">Caso de uso:</th>
                    <th title="Field #2">
                        Visita de Pacientes
                    </th>
                </tr></thead>
                <tbody>
                <tr>
                    <td style="">Actores</td>
                    <td style="">Viajante / Médico</td>
                </tr>
                <tr>
                    <td style="">Precondiciones</td>
                    <td style="">Médico con sesión iniciada; Viaje creado</td>
                </tr>
                <tr>
                    <td style="">Postcondiciones</td>
                    <td style="">Registro de la visita, con una nota asociada.</td>
                </tr>
                <tr>
                    <td style="">Propósito</td>
                    <td style="">
                        El médico, siguiendo el orden sugerido de las rutas, debe ir visitando a
                        los pacientes que se le asignó. Una vez visitado, debe registrar la visita por
                        medio de la app, indicando algún comentario. Si por algún motivo de fuerza mayor
                        no pudo visitarlo, debe indicarlo en la nota.
                    </td>
                </tr>
                </tbody></table>


            <h3>Core/Algoritmo <abbr title="Multiple Traveling Salesmen Problem">mTSP</abbr></h3>
            <?php
            $use_case_core = new Figure("/docs/images/documentation/use_case_core.png", $thumbnail_width ,
                "", "Caso de uso del Core: calcular viaje", "");
            $use_case_core->print_img();
            ?>


            <table class="table table-bordered table-hover table-condensed">
                <thead><tr>
                    <th title="Field #1">Caso de uso:</th>
                    <th title="Field #2">
                        Calcular Viaje
                    </th>
                </tr></thead>
                <tbody>
                <tr>
                    <td style="">Actores</td>
                    <td style="">App cliente</td>
                </tr>
                <tr>
                    <td style="">Precondiciones</td>
                    <td style="">Las distancias entre todos los puntos a visitar, los viajantes y sus
                        posiciones de salida y fin.
                    </td>
                </tr>
                <tr>
                    <td style="">Postcondiciones</td>
                    <td style="">
                        Tres distintas soluciones que optimizan distintos parámetros.
                    </td>
                </tr>
                <tr>
                    <td style="">Propósito</td>
                    <td style="">
                        Es el core del sistema. Calcula soluciones al problema del múltiple viajante. A partir de las soluciones arrojadas por el core, los médicos podrán recibir las rutas para visitar a los pacientes.
                    </td>
                </tr>
                </tbody></table>

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
            <? $diagram1 = new Figure("/docs/images/documentation/uml.png", "600px",
                "/docs/images/documentation/uml.png", "Modelo de entidades", "Modelo de entidades"); ?>
            <? $diagram1->print_lightbox_figure("1"); ?>
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
            <? $diagram2 = new Figure("/docs/images/documentation/context.png", "600px",
                "/docs/images/documentation/context.png", "Diagrama de contextos", "Diagrama de contextos"); ?>
            <? $diagram2->print_lightbox_figure("2"); ?>

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
            <? $diagram3 = new Figure("/docs/images/documentation/event_bus.png", "600px",
                "/docs/images/documentation/event_bus.png", "Diagrama de Event Bus", "Diagrama de Event Bus"); ?>
            <? $diagram3->print_lightbox_figure("3"); ?>

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
                Una vez que conoce las distancias, <s>calcula</s><span todo>inicia el cálculo de</span> las soluciones
                realizando una petición POST contra la API
                Core, quién retorna un <em>id</em> de la ejecución para poder consultar posteriormente por el resultado.
                Esto se debe a que el core puede estar varios minutos calculando una solución.
                Así de manera asíncrona (dentro de una goroutine) el backend realiza un pooling cada X segundos para
                ir consultando el estado de la corrida.
            </p>
            <p todo>
                La comunicación entre el core y el backend se seguriza mediante el uso de una
                <abbr title="Pre-shared key">PSK</abbr> que se encripta de forma simétrica, es decir, el core
                y el backend conocen la llave y la forma de encriptarla, y comparan el resultado para autenticarse.
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
            <? $diagram3_1 = new Figure("/docs/images/documentation/sequence.png", "600px",
                "/docs/images/documentation/sequence.png", "Diagrama de secuencia de las interacciones del backend",
                "Diagrama de secuencia de las interacciones del backend"); ?>
            <? $diagram3_1->print_lightbox_figure("3"); ?>


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
            <? $image1 = new Figure("/docs/images/documentation/firebase.png", "600px",
                "/docs/images/documentation/firebase.png",
                "Diagrama de generación de token de autenticación",
                "Diagrama de generación de token de autenticación"); ?>
            <? $image1->print_lightbox_figure("i1"); ?>

            <p>
                Una vez realizado el vínculo, el trigger de la push es cuando se crea una jornada de viaje y se
                acepta una de las rutas propuestas, tal como se ve en este diagrama de actividad:

            </p>
            <? $diagram4 = new Figure("/docs/images/documentation/activity.png", "600px",
                "/docs/images/documentation/activity.png", "Diagrama de actividad", "Diagrama de actividad"); ?>
            <? $diagram4->print_lightbox_figure("4"); ?>

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
            <? $diagram5 = new Figure("/docs/images/documentation/cloud.png", "600px",
                "/docs/images/documentation/cloud.png", "Diagrama de despliegue en Cloud",
                "Diagrama de despliegue en Cloud"); ?>
            <? $diagram5->print_lightbox_figure("5"); ?>


            <? $index_doc->link_back_to_index(); ?>
            <? $index_doc->section_subheading_by_id("development"); ?>
            <p>
                En este apartado se desea ilustrar el sistema centrado en la organización real de los módulos de
                software. Por ello recurrimos al diagrama de paquetes.
            </p>
            <? $diagram6 = new Figure("/docs/images/documentation/packages.png", "600px",
                "/docs/images/documentation/packages.png", "Diagrama de paquetes", "Diagrama de paquetes"); ?>
            <? $diagram6->print_lightbox_figure("6"); ?>

            <p>
                A la hora de organizar los módulos en packages, suele haber dos estrategias:
            </p>
            <ul>
                <li>
                    Agrupado por tipo de artefacto: models / controllers
                    <? $diagram7 = new Figure("/docs/images/documentation/models.png", "400px",
                        "", "Ejemplo de agrupación por models/controllers",
                        "Ejemplo de agrupación por models/controllers"); ?>
                    <? $diagram7->print_figure(); ?>

                </li>
                <li>
                    Agrupando por feature
                    <? $diagram8 = new Figure("/docs/images/documentation/domain.png", "200px",
                        "", "Ejemplo de agrupación por features", "Ejemplo de agrupación por features"); ?>
                    <? $diagram8->print_figure(); ?>

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
                <li>
                    Cada módulo está altamente encapsulado. Así es compliance con principios
                    <abbr title="Single responsibility principle, Open-closed principle, Liskov substitution principle,
                    Interface segregation principle, y Dependency inversion principle">SOLID</abbr>.
                </li>
                <li>Los módulos se comunican entre sí asincrónicamente utilizando el Event Bus.</li>
                <li>
                    Se utilizan <abbr title="Data Transfer Object">DTOs</abbr> para desacoplar la representación del
                    modelo de dominio.
                </li>
                <li>Se alienta el uso de rich model y no de modelos anémicos.</li>

            </ul>
            <? $index_doc->link_back_to_index(); ?>

            <?php prevAndNext(
                ['path' => "/docs/core.html", 'title'=>"El core"],
                ['path' => "/docs/literature.html", 'title'=>"Bibliografía"]

            ); ?>



        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>