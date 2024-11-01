<?php
require('../cookie/cookie.php');

session_start();
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 2 && $_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

      // ZONA HORARIA
      date_default_timezone_set('America/Caracas');

      // Conexion a la base de datos
      include_once '../config/conexion1.php';

      // Consulta al grupo del personal de guardia
      $consulta1 = pg_query($dbconn, "SELECT * FROM public.personal_grupos_guardia WHERE id=(SELECT MAX(id) FROM  personal_grupos_guardia)");
      $reg_01 = pg_fetch_array($consulta1);

      $personal_guardia = $reg_01['id'];
      $grupos_guardia = $reg_01['grupos_guardia_id'];

      // Consulta al personal de guardia
      $personal_usuario = $_SESSION['personal_cedula'];
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
      $regid = pg_fetch_array($consulta_pers);

      $cedula_personal = $regid['cedula'];

      // Consulta datos del personal de guardia
      $ultimo1 = pg_query($dbconn, "SELECT id, fecha_inicio_g::timestamp::date, grupos_guardia_id, usuario_entrada_id  
      FROM public.guardias
      WHERE usuario_entrada_id = $cedula_personal
      AND fecha_inicio_g::timestamp::date = (SELECT MAX(fecha_inicio_g::timestamp::date) FROM guardias) order by id DESC");
      $reg_id = pg_fetch_array($ultimo1);

      $grupos01 = $reg_id['id'];

?>

      <!-- ***** Membrete ***** -->
      <?php require_once '../plantillas/superior2.php'; ?>
      <!-- ***** Membrete ***** -->

      <div class="container body">
        <div class="main_container">
          <!-- ********** Menu Navegacion Panel Derecho ********* -->
          <?php
          if ($_SESSION['tipo_rol_id'] != 1) {
            require '../menu/menu_sup.php';
          } else {
            require '../menu/menu_adm.php';
          }
          ?>

          <!-- top navigation -->
          <div class="top_nav" id="encabezado-top">
            <?php require '../menu/menu_top.php' ?>
          </div>
        <!-- /top navigation -->
<!-- *************************************************************************************************** -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>NUEVA SOLICITUD</h4>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registrar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<!-- ***********************************  INICIO SECCION DE MENSAJES ************************************** -->
                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-md-6 col-sm-6" align="center">
              <?php
                  if ($_GET['msg'] == "1") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El Registro ya Existe!!!</strong></div>';
              } 
              if ($_GET['msg'] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Bienes registrado con EXITO!!!</strong></div>';

              }
              elseif ($_GET['msg'] == "3") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Bienes NO registrado</strong></div>';
              }
             
              ?>                
                </div>
                    <div class="col-md-3 col-sm-3"></div>

                <br/><br/><br/><br/>
<!-- ****************************** Fin seccion de mensajes ********************************************* -->                


<div class="col-md-8 col-sm-8">
<!-- ********* STEP 1 ********* -->
                      <!-- start accordion -->
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
                        <form class="" action="../insertar_guardia.php?ac=1" method="post" id="demo-form" data-parsley-validate>

                        <!-- ***************************************** -->

                        <?php require '../formularios/form_registro_nueva_solicitud01.php'; ?>

                        <!-- ***************************************** -->

                        </form>
                      </div>
                      <!-- end of accordion -->
                      </div>
<div class="col-md-4 col-sm-4" style="float: left; z-index: 100; height: 88%">
                                              <!-- ******* Mensaje de Protocolo de Emergencia *******  -->
                                              <div class="sticky-top">

<div aria-live="polite" aria-atomic="true" class="position-relative">
<!-- Position it: -->
<!-- - `.toast-container` for spacing between toasts -->
<!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
<!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
<div class="toast-container top-0 end-0 p-3">

    <button id="btntoast" type="button" class="btn btn-primary">Protocolo</button>

    <div id="toast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
    <div class="toast-header" width="100%">
            <img src="../images/mark_cuadrantes.png" class="rounded me-2" width="20" height="20" alt="...">
            <strong class="me-auto"><div id="respuesta3"></div></strong>
            <small></small>
            <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'><span aria-hidden='true'>×</span>
    </div>
    <div class="toast-body">
            <textarea id="respuesta2" class="protocolo01" readonly></textarea>
    </div>
    </div>
</div></div>
</div>
<!-- Fin Mensaje de Prtotocolo de emergencia -->
</div>                  
                    <!-- End SmartWizard Content -->

  
                  </div>
                </div>
              </div>
            </div>


<!-- ***************************************************************************************************** -->
          </div>
        </div>
        <!-- /page content -->


<!-- ********************************************************************************************** -->

<?php
    }
  }
}

    ?>

<a data-scroll class="ir-arriba" href="#encabezado-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"> </i> </a>

    <?php require_once '../plantillas/inferior2.php' ?>