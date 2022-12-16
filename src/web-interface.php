<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Manual de uso"); ?>

<?php printHeader("Manual de uso del Administrador"); ?>

    <main id="main-content">
        <div class="content">

            <?php breadcrumb([['path' => "/docs/sitemap.html", 'title' => "Índice"]]); ?>

            <?php
            $admin_index = new Index(
                ['id'=> "main", 'value' => ""], // vuelve al inicio
                [
                    [ 'id' => "login", 'value' => "Inicio de sesión"],
                    [ 'id' => "patients", 'value' => "Pacientes"],
                    [ 'id' => "doctors", 'value' => "Médicos"],
                    [ 'id' => "visits", 'value' => "Creación de visitas"],
                    [ 'id' => "reports", 'value' => "Reportes"],
                    [ 'id' => "notes", 'value' => "Detalle del diagnóstico"],
                    [ 'id' => "extras", 'value' => "Otras funcionalidades"]
                ],
                "1" // entonces subtitles son h2

            )
            ?>
            <?php $admin_index->print_index(true); ?>

<!--            <h2 >Inicio de sesión</h2>-->
            <?php $admin_index->section_subheading_by_id("login"); ?>
            <p>Se accede a la página del administrador, ingresando las credenciales con mail y contraseña. </p>
            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/login.png",
                    "600px",
                    "/docs/images/admin/login.png",
                    "Inicio de sesión",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("login"); ?>
            </div>
            <p>Al iniciar el día, se deben cargar los pacientes y en caso que se necesite, los médicos. Una vez
                cargados, se deberá crear la jornada que incluye la selección de médicos a asignar en el viaje. </p>

            <p>En caso de fallo en las credenciales, se visualizará un error.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/wronglogin.png",
                    "600px",
                    "/docs/images/admin/wronglogin.png",
                    "Inicio de sesión fallido",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("login"); ?>
            </div>

<!--            <h2>Pacientes</h2>-->
            <?php $admin_index->section_subheading_by_id("patients"); ?>

            <p>En el panel Pacientes se podrán visualizar todos los pacientes que estén pendientes de visitar.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patient1.png",
                    "600px",
                    "/docs/images/admin/patient1.png",
                    "Listado de pacientes",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients1"); ?>
            </div>

            <p>Los pacientes se podrán dar de alta de dos formas: manual y masiva.</p>

            <h3>Carga manual</h3>

            <p>Para realizar la carga manual se deberá presionar sobre el botón CREAR</p>

            <p>Se dirigirá a un formulario donde se pedirán los datos requeridos por <?php printCompany(); ?>. </p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientcreate.png",
                    "600px",
                    "/docs/images/admin/patientcreate.png",
                    "Crear paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients2"); ?>
            </div>

            <p> Para cargar la dirección, se deberá usar la ayuda sobre el mapa. Esto permite que las direcciones sean
                validadas por el administrador.</p>
            <p> Se deberá indicar la ubicación exacta del paciente y se podrá incluir los detalles del lugar.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientcreatedirection.png",
                    "600px",
                    "/docs/images/admin/patientcreatedirection.png",
                    "Crear paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients2"); ?>
            </div>

            <p>Se debe presionar GUARDAR para que los datos quedén grabados.</p>

            <h3>Carga masiva</h3>

            <p>La otra forma de crear pacientes es de forma masiva, esto permitirá acelerar la carga de pacientes
                y <?php printCompany(); ?> podrá solicitar a quienes presta servicio, completar el documento como parte
                del procedimiento. Este documento deberá seguir el formato requerido.</p>

            <p>El formato requerido es el siguiente: </p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/csv.png",
                    "600px",
                    "/docs/images/admin/csv.png",
                    "Formato Excel",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients3"); ?>
            </div>

            <p>La carga se realizará presionando el botón CARGA MASIVA. Se deberá seleccionar el
                archivo y con abrirlo ya se verán cargados los pacientes.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientupload.png",
                    "600px",
                    "/docs/images/admin/patientupload.png",
                    "Captura de pantalla del pop up para cargar el archivo CSV",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients4"); ?>
            </div>


            <h3> Edición de paciente</h3>

            <p>En la columna Acciones se desplegarán dos botones. Uno de ellos es el botón Editar.</p>

            <p> Se podrá editar cualquier dato del paciente.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientedit.png",
                    "600px",
                    "/docs/images/admin/patientedit.png",
                    "Selección de un paciente en el listado para edición",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients5"); ?>
            </div>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientedit1.png",
                    "600px",
                    "/docs/images/admin/patientedit1.png",
                    "Edición de datos básicos del paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients5"); ?>
            </div>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientedit3.png",
                    "600px",
                    "/docs/images/admin/patientedit3.png",
                    "Edición de datos de la dirección del paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients5"); ?>
            </div>

            <h3>Borrado de paciente</h3>

            <p>En caso de error, se podrá eliminar un paciente. Para ello se deberá
                seleccionar la fila deseada y en la columna Acciones, se podrá presionar Borrar</p>

            <p> Aparecerá un mensaje para deshacer la operación en caso de querer revertir el borrado.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientdelete1.png",
                    "600px",
                    "/docs/images/admin/patientdelete1.png",
                    "Borrado de un paciente desde el listado",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients6"); ?>
            </div>

            <h3>Visualización de paciente</h3>

            <p> Al presionar sobre algún paciente, se podrán visualizar los datos cargados del mismo.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientshow1.png",
                    "600px",
                    "/docs/images/admin/patientshow1.png",
                    "Visualización del paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("patients7"); ?>
            </div>

<!--            <h2>Médicos</h2>-->
            <?php $admin_index->section_subheading_by_id("doctors"); ?>


            <h3> Creación de médico</h3>

            <p>A diferencia de los pacientes, el médico sólo podrá cargarse de forma manual.</p>

            <p>La carga solo deberá realizarse una vez.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/medicocreate0.png",
                    "600px",
                    "/docs/images/admin/medicocreate0.png",
                    "Creación médico, carga de los datos básicos",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors1"); ?>
            </div>

            <p> Todos los datos de los médicos son obligatorios. </p>

            <p>Por requisito de la empresa, se deberá cargar la foto del médico junto a los demás datos requeridos.</p>

            <p> Si el médico no pertenece a la planta de <?php printCompany(); ?>, deberá marcarse como external.</p>

            <p> Al crearse, el médico se designa como Disponible, luego se podrá cambiar. </p>

            <p> Se deberán indicar dos direcciones. La dirección inicial es la dirección en donde parte el médico. La dirección final es el destino final.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/medicocreate1.png",
                    "600px",
                    "/docs/images/admin/medicocreate1.png",
                    "Carga de la dirección del médico",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors2"); ?>
            </div>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/doctorcreate2.png",
                    "600px",
                    "/docs/images/admin/doctorcreate2.png",
                    "Carga de la dirección del médico",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors2"); ?>
            </div>

            <p>Se debe presionar GUARDAR para que los datos quedén grabados.</p>

            <h3> Edición de médico</h3>

            <p>Se podrán editar los datos de los médicos.</p>

            <p> En caso que se requiera ante cualquier eventualidad, se podrá pasar a no disponible. Esto evitará que lo tenga en cuenta en el armado de las visitas. </p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/doctoredit3.png",
                    "600px",
                    "/docs/images/admin/doctoredit3.png",
                    "Edición médico: cambio de tipo de médico, de interno a externo a la empresa",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors3"); ?>
            </div>

            <!-- Nere aca me parece que le pifeaste a la imagen: -->
            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/medicoedit2.png",
                    "600px",
                    "/docs/images/admin/medicoedit2.png",
                    "Edición médico",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors3"); ?>
            </div>

            <!-- Nere aca me parece que acá también le pifeaste a la imagen: -->
            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/medicoedit3.png",
                    "600px",
                    "/docs/images/admin/medicoedit3.png",
                    "Edición médico",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors3"); ?>
            </div>

            <h3> Borrado de médico</h3>

            <p>Al igual que los pacientes, los médicos también pueden borrarse del sistema.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/medicodelete1.png",
                    "600px",
                    "/docs/images/admin/medicodelete1.png",
                    "Borrado de un médico desde el listado",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors4"); ?>
            </div>

            <h3> Visualización de médico</h3>

            <p>Se podrá visualizar todos los médicos cargados en el sistema. Al seleccionar un médico se visualizarán los datos cargados.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/doctorshow.png",
                    "600px",
                    "/docs/images/admin/doctorshow.png",
                    "Visualización del médico",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("doctors5"); ?>
            </div>

<!--            <h2>Creación de visitas</h2>-->
            <?php $admin_index->section_subheading_by_id("visits"); ?>

            <p>Para el inicio de la jornada y, una vez cargados los pacientes y médicos, se habilitará el
                botón INICIO JORNADA.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/inicio.png",
                    "600px",
                    "/docs/images/admin/inicio.png",
                    "Pantalla de inicio",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits1"); ?>
            </div>

            <p> Se podrán seleccionar todos los pacientes que tengan un estado pendiente o reprogramado (en caso
                que no se haya podido atender el día anterior por fuerza mayor).</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/initiate2.png",
                    "600px",
                    "/docs/images/admin/initiate2.png",
                    "Selección de pacientes para una jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits2"); ?>
            </div>

            <p>Lo mismo se podrá realizar con los médicos.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/initiate1.png",
                    "600px",
                    "/docs/images/admin/initiate1.png",
                    "Selección de médicos para una jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits3"); ?>
            </div>

            <p> Una vez seleccionado los pacientes y los médicos, se podrá continuar para la creación
                de las visitas.</p>

            <p>Dado que en esta sección se estará realizando el cálculo de los mejores viajes
                posibles, tardará unos minutos.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/loading.png",
                    "600px",
                    "/docs/images/admin/loading.png",
                    "Captura de pantalla de la pantalla de espera",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits4"); ?>
            </div>

            <p>Se habilitarán tres propuestas: <b>balanceada</b>, <b>priorizada</b> y <b>desbalanceada</b>.</p>


            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/prop3.png",
                    "600px",
                    "/docs/images/admin/prop3.png",
                    "Captura de pantalla de la propuesta balanceada para una jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits5"); ?>
            </div>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/prop2.png",
                    "600px",
                    "/docs/images/admin/prop2.png",
                    "Captura de pantalla de la propuesta priorizada (prioriza médicos de la empresa) para una jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits5"); ?>
            </div>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/prop1.png",
                    "600px",
                    "/docs/images/admin/prop1.png",
                    "Captura de pantalla de la propuesta desbalanceada para una jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits5"); ?>
            </div>

            <p> Una vez aceptada la propuesta, se pasará a la pantalla de monitoreo. Allí se podrán
                ver los próximos viajes de los médicos y el paciente asignado a cada uno de ellos.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/running4.png",
                    "600px",
                    "/docs/images/admin/running4.png",
                    "Pantalla de monitoreo, jornada en curso",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits6"); ?>
            </div>

            <p>En últimas novedades se verán las próximas visitas a realizarse.</p>

            <p>En viajes restantes se visualizará la cantidad de viajes pendientes del día.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/running3.png",
                    "600px",
                    "/docs/images/admin/running3.png",
                    "Pantalla de monitoreo, jornada en curso. En el mapa se marcan como visitados los pacientes"
                    . " y en la barra lateral se informa el estado de cada médico y la cantidad de viajes faltantes"
                    . " para concluir la jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits7"); ?>
            </div>

            <p>En caso de que algún médico no pueda continuar su ruta, podrá cancelar el viaje
                indicándole al administrador. El administrador podrá cambiar el estado del médico a no
                disponible y deberá recalcular la jornada.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/runningpopup.png",
                    "600px",
                    "/docs/images/admin/runningpopup.png",
                    "Pop Up de cancelación de jornada",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("visits8"); ?>
            </div>

<!--            <h2>Reportes</h2>-->
            <?php $admin_index->section_subheading_by_id("reports"); ?>

            <p>El administrador, finalizado el mes, debe enviar a cada empresa que solicitó servicios médicos
                un reporte con los datos de los pacientes y sus correspondientes notas. Para ello, se facilita un
                reporte con la información requerida por las empresas.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/report1.png",
                    "600px",
                    "/docs/images/admin/report1.png",
                    "Reporte",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("reports1"); ?>
            </div>

            <p> Entre las funcionalidades básicas se encuentra el uso de filtro rápido que puede
                realizarse por empresas, estados, o cualquier dato que se pueda visualizar desde el reporte y también
                el filtro específico.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/report2.png",
                    "600px",
                    "/docs/images/admin/report2.png",
                    "Opciones de filtrado en pantalla de Reporte",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("reports2"); ?>
            </div>



            <p> Una vez disponible la información, el usuario podrá descargar el reporte en formato Excel
                / CSV.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/report3.png",
                    "600px",
                    "/docs/images/admin/report3.png",
                    "Descarga de Reporte",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("reports3"); ?>
            </div>

<!--            <h2> Detalle del diagnóstico</h2>-->
            <?php $admin_index->section_subheading_by_id("notes"); ?>


            <p>Se ofrece la opción de detalle del diagnóstico al presionar un paciente sobre el reporte.</p>
            <p>En esta sección se pueden visualizar las notas que dejó el médico para el paciente,
                incluso si la visita fue reprogramada.</p>


            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientsnote2.png",
                    "600px",
                    "/docs/images/admin/patientsnote2.png",
                    "Notas de la visita al paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("notes1"); ?>
            </div>

            <!-- Nere soy yo o esta imagen es igual a la de arriba? -->
            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/patientnotes.png",
                    "600px",
                    "/docs/images/admin/patientnotes.png",
                    "Notas de la visita al paciente",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("notes1"); ?>
            </div>

            <?php $admin_index->section_subheading_by_id("extras"); ?>

            <p>Dependiendo de los gustos del usuario, se permite la opción modo noche y el cambio de
                vista de reporte a compacta, estándar o cómoda.</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/admin/night.png",
                    "600px",
                    "/docs/images/admin/night.png",
                    "Modo noche y vista compacta en pantalla de Reporte",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("nightmode"); ?>
            </div>

        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>