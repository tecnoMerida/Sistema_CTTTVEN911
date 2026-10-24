<?php
require('../cookie/cookie.php');

<<<<<<< HEAD
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
=======
session_start();
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 4 && $_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

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
      WHERE fecha_inicio_g::timestamp::date = (SELECT MAX(fecha_inicio_g::timestamp::date) FROM guardias) order by id DESC");
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
            require '../menu/menu_op.php';
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
                      <h2>Registrnotification-master/dist/ar</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

<<<<<<< HEAD
=======
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <!-- ***********************************  INICIO SECCION DE MENSAJES ************************************** -->
                      <div class="col-md-3 col-sm-3"></div>
                      <div class="col-md-6 col-sm-6" align="center">
                        <?php
<<<<<<< HEAD
                        $msg = $_GET['msg'] ?? '';
                        if ($msg == "1") {
                          echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>La Solicitud ya Existe!!!</strong></div>';
                        } elseif ($msg == "2") {
                          echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud registrada con EXITO!!!</strong></div>';
                        } elseif ($msg == "3") {
=======
                        if (($_GET['msg'] ?? '') == "1") {
                          echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>La Solicitud ya Existe!!!</strong></div>';
                        }
                        if (($_GET['msg'] ?? '') == "2") {
                          echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud registrada con EXITO!!!</strong></div>';
                        } elseif (($_GET['msg'] ?? '') == "3") {
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
                          echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud NO registrado</strong></div>';
                        }

                        ?>
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                      <!-- ********* Imagen Avatar Operador del VEN 9-1-1 ********* -->
                      <div class="col-md-3 col-sm-3" style="position:relative;">
                      <div style="position: absolute;">
                            <img src="../images/Avatar_VEN-9-1-1_operador .png" id="operador_avatar" alt="" style="position: fixed;">
                        </div>
                      </div>
                      <!-- ********* FIN Imagen Avatar Operador del VEN 9-1-1 ********* -->
                      <br />
                      <!-- **************************************************  -->

                      <!-- ****************************** Fin seccion de mensajes ********************************************* -->

                      <div class="col-md-8 col-sm-8">
                        <!-- start accordion -->

                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                          <form class="" action="../insertar_guardia_op.php?ac=1" method="post" id="demo-form" data-parsley-validate>

                            <?php require '../formularios/form_registro_nueva_solicitud01.php'; ?>

                          </form>
                        </div>
                        <!-- end of accordion -->
                      </div>
                      <div class="col-md-4 col-sm-4" style="float: left; z-index: 100; height: 88%">
                      <!-- **************************************************  -->  
                      <!-- ******* Mensaje de Protocolo de Emergencia *******  -->
                      <!-- **************************************************  -->
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
                                  <strong class="me-auto">
                                    <div id="respuesta3"></div>
                                  </strong>
                                  <small></small>
                                  <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'><span aria-hidden='true'>×</span>
                                </div>
                                <div class="toast-body">
                                  <textarea id="respuesta2" class="protocolo01" readonly></textarea>
                                </div>
                              </div>
<<<<<<< HEAD

                              <!-- ************************************************** -->
                              <!-- ***** Panel Lateral de Cuadrante de Paz Activo ***** -->
                              <!-- ************************************************** -->
                              <div class="card shadow-sm border-0 mt-3" id="panel-cuadrante-lateral" style="border-radius: 8px; border-top: 4px solid #1abb9c; display: none; background: #ffffff;">
                                <div class="card-header bg-white d-flex align-items-center justify-content-between py-2 border-bottom">
                                  <h6 class="mb-0 font-weight-bold text-dark" style="font-size: 13px;">
                                    <i class="fa fa-shield text-success"></i> Cuadrante de Paz
                                  </h6>
                                  <span class="badge badge-dark px-2 py-1" id="lat-cuadrante-cod" style="font-size: 12px;">22C-XXX</span>
                                </div>
                                <div class="card-body p-3" style="font-size: 13px;">
                                  <div class="mb-2">
                                    <small class="text-muted d-block">Organismo Responsable:</small>
                                    <span id="lat-cuadrante-org" class="font-weight-bold text-primary" style="font-size: 13.5px;"></span>
                                  </div>
                                  <div class="mb-2">
                                    <small class="text-muted d-block">Línea Directa de Contacto:</small>
                                    <div class="d-flex align-items-center mt-1">
                                      <a href="#" id="lat-cuadrante-tel-link" class="btn btn-sm btn-success py-1 px-2 font-weight-bold mr-1" style="font-size: 13px;" title="Llamar directamente">
                                        <i class="fa fa-phone"></i> <span id="lat-cuadrante-tel">04XX-XXXXXXX</span>
                                      </a>
                                      <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2" id="latBtnCopiarTel" title="Copiar teléfono al portapapeles">
                                        <i class="fa fa-copy"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="mb-2">
                                    <small class="text-muted d-block">Ubicación Administrativa:</small>
                                    <span id="lat-cuadrante-parr-mun" class="font-weight-bold text-dark" style="font-size: 12px;"></span>
                                  </div>
                                  <div class="mb-2">
                                    <small class="text-muted d-block">Comuna:</small>
                                    <span id="lat-cuadrante-comuna" class="text-secondary" style="font-size: 12px;"></span>
                                  </div>
                                  <div class="mt-2 p-2 bg-light rounded" style="font-size: 11px; max-height: 140px; overflow-y: auto; border: 1px solid #e9ecef;">
                                    <strong class="text-dark"><i class="fa fa-map-signs text-muted"></i> Sectores y Límites:</strong><br>
                                    <span id="lat-cuadrante-sectores" class="text-muted"></span>
                                  </div>
                                </div>
                              </div>
                              <!-- ************************************************** -->
=======
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
                            </div>
                          </div>
                        </div>
                        <!-- *************************************** -->
                        <!-- Fin Mensaje de Prtotocolo de emergencia -->
                        <!-- *************************************** -->
                      </div>
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

    <?php require '../plantillas/inferior2.php' ?>