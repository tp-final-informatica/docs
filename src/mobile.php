<?php
include_once "./src/utils/libraries.php";
?>

<?php HTML_head("Manual de uso mobile"); ?>

<?php printHeader("Manual de uso de la aplicación"); ?>

    <main id="main-content">
        <div class="content">

            <?php breadcrumb([['path' => "/docs/sitemap.html", 'title' => "Índice"]]); ?>

            <?php
            $admin_index = new Index(
                ['id' => "main-content", 'value' => "Inicio"], // vuelve al inicio
                [
                    ['id' => "login", 'value' => "Inicio de sesión"],
                    ['id' => "perfil", 'value' => "Perfil"],
                    ['id' => "trip", 'value' => "Viajes"]
                ],
                "1" // es un menu principal de la página

            )
            ?>
            <?php $admin_index->print_index(true); ?>

            <!--            <h2 >Inicio de sesión</h2>-->
            <?php $admin_index->section_subheading_by_id("login"); ?>
            <p>Se accede a la aplicación, ingresando las credenciales con mail y contraseña. </p>
            <div class="flex center">
                <?php $image1 = new Figure(
                    "/docs/images/app/login.jpg",
                    "200px",
                    "/docs/images/app/login.jpg",
                    "Inicio de sesión",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image1->print_lightbox("login"); ?>
            </div>


            <?php $admin_index->link_back_to_index(); ?>
            <!--            <h2>Perfil</h2>-->
            <?php $admin_index->section_subheading_by_id("perfil"); ?>

            <p>En el panel Perfil se podrán visualizar todos los datos cargados del médico. </p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/app/perfil.jpg",
                    "200px",
                    "/docs/images/app/perfil.jpg",
                    "Visualizar perfil",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image2->print_lightbox("perfil"); ?>
            </div>

            <p>En caso que se requiera, se podrá modificar la contraseña</p>

            <div class="flex center">
                <?php $image2 = new Figure(
                    "/docs/images/app/changepass.jpg",
                    "200px",
                    "/docs/images/app/changepass.jpg",
                    "Cambiar contraseña",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>

                <?php $image2->print_lightbox("perfil"); ?>
            </div>

            <?php $admin_index->link_back_to_index(); ?>
            <!--            <h2>Viajes</h2>-->
            <?php $admin_index->section_subheading_by_id("trip"); ?>

            <p>Una vez abierta la aplicación, si no hay viajes asignados al médico o en caso que haya finalizado todos
                sus viajes, se mostrará la siguiente pantalla</p>

            <div class="flex center">
                <?php $image3 = new Figure(
                    "/docs/images/app/viajeiniciado.jpg",
                    "200px",
                    "/docs/images/app/viajeiniciado.jpg",
                    "Pantalla de inicio",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image3->print_lightbox("doctors1"); ?>
            </div>

            <p> Cuando se reciben nuevos viajes, deberá recibir una notificación como la siguiente </p>

            <div class="flex center">
                <?php $image3 = new Figure(
                    "/docs/images/app/noti2.jpg",
                    "200px",
                    "/docs/images/app/noti2.jpg",
                    "Notificación de inicio de viajes",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image3->print_lightbox("doctors2"); ?>
            </div>

            <p>A medida que se vayan completando los viajes, el médico tendrá el listado en orden y su correspondiente
                estado.</p>

            <?php $image3 = new Figure(
                "/docs/images/app/viajependiente.jpg",
                "200px",
                "/docs/images/app/viajependiente.jpg",
                "Listado de pacientes a visitar. Se indica con un a tilde verde los pacientes visitados, con un ícono"
                ." en amarillo aquellos que debieron reprogramarse, y se visualiza intermitente la próxima parada",
                ""// aca no hace falta poner nada si no va con caption
            ); ?>
            <?php $image3->print_lightbox("doctors2"); ?>


            <p>Para registrar la visita a un paciente, se le indicará si fue visitado o no y se le deberá dejar la
                nota.</p>

            <p>Esto significa que cada paciente podrá tener alguno de los estados:</p>
            <ul>
                <li>
                    reprogramado: si no se visitó por causa de fuerza mayor, por ejemplo, calles anegadas o un piquete
                </li>
                <li>
                    visitado: si el médico llegó al domicilio, sea que el paciente abriera la puerta o no
                </li>
                <li>
                    pendiente: si no es ninguna de las anteriores
                </li>
            </ul>

            <p todo>la version nueva de la app esta más clara, habria que sacar screenshot de eso.</p>
            <div class="flex center">

                <?php $image3 = new Figure(
                    "/docs/images/app/visitadosiono.jpg",
                    "200px",
                    "/docs/images/app/visitadosiono.jpg",
                    "Edición de nota",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>

                <?php $image3->print_lightbox("doctors4"); ?>
            </div>

            <div class="flex center">
                <?php $image3 = new Figure(
                    "/docs/images/app/loadingNote.jpg",
                    "200px",
                    "/docs/images/app/loadingNote.jpg",
                    "Edición de nota",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image3->print_lightbox("doctors5"); ?>
            </div>

            <p>Para grabar los registros se deberá presionar en GUARDAR CAMBIOS</p>

            <div class="flex center">
                <?php $image3 = new Figure(
                    "/docs/images/app/editnote.jpg",
                    "200px",
                    "/docs/images/app/editnote.jpg",
                    "Edición de nota",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image3->print_lightbox("visits1"); ?>
            </div>

            <p>Una vez finalizado el viaje, se deberá presionar el botón FINALIZAR VIAJE</p>

            <div class="flex center">
                <?php $image3 = new Figure(
                    "/docs/images/app/finalizarviajepopup.jpg",
                    "200px",
                    "/docs/images/app/finalizarviajepopup.jpg",
                    "Finalizar viaje",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image3->print_lightbox("visits2"); ?>
            </div>

            <p>En cualquier momento del día, puede suceder que se cancele el viaje por algún motivo de causa mayor y
                deba volverse a gestionar las visitas pendientes.</p>
            <p>Llegará una notificación como se muestra a continuación</p>
            <div class="flex center">
                <?php $image3 = new Figure(
                    "/docs/images/app/noti1.jpg",
                    "200px",
                    "/docs/images/app/noti1.jpg",
                    "Viaje cancelado",
                    ""// aca no hace falta poner nada si no va con caption
                ); ?>
                <?php $image3->print_lightbox("visits3"); ?>
            </div>
            <?php $admin_index->link_back_to_index(); ?>


            <?php prevAndNext(
                ['path' => "/docs/web-interface.html", 'title'=>"Manual de uso del administrador"],
                ['path' => "/docs/core.html", 'title'=>"El core"]
            ); ?>
        </div>
    </main>

<?php footer(); ?>

<?php HTML_foot(); ?>