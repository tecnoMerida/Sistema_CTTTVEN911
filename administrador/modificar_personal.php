<?php
require('../cookie/cookie.php');

session_start();
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

      // Identificador unico de registro a modificar
      $cedula1 = $_REQUEST['id'];
      $cedula1 = $_GET['id'];

      // Conexion a la base de datos
      include_once '../config/conexion1.php';

      $personal_usuario = $_SESSION['personal_cedula'];
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
      $regid = pg_fetch_array($consulta_pers);

      $cedula = $regid['cedula'];

?>

      <!-- ********** MEMBRETE SUPERIOR ********* -->
      <?php require_once '../plantillas/superior2.php'; ?>
      <!-- ********** MEMBRETE SUPERIOR ********* -->

      <div class="container body">
        <div class="main_container">
          <!-- ********** Menu Navegacion Panel Derecho ********* -->
          <?php require '../menu/menu_adm.php' ?>

          <!-- top navigation -->
          <div class="top_nav" id="encabezado-top">
            <?php require '../menu/menu_top.php' ?>
          </div>
          <!-- /top navigation -->
          <!-- *********************************************************************************************** -->

          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h4>REGISTRO PERSONAL</h4>
                </div>

              </div>
              <?php
              /////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////

              // CONSULTA TABLA PERSONAL
              $result_get = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $cedula1");
              if (!$result_get) {
                echo "Ocurrió un error.\n";
                exit;
              }

              ?>

              <div class="clearfix"></div>

              <div class="row">

                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Actualizar Datos Personales</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div align="center">
                      <?php
                      if ($_GET['msg'] == "1") {
                        echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Deberas de completar todos los campo!!!</strong></div>';
                      }
                      if ($_GET['msg'] == "2") {
                        echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos personales actualizado con EXISTO!</strong></div>';
                      }
                      if ($_GET['msg'] == "3") {
                        echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos del pariente actualizado con EXISTO!</strong></div>';
                      }
                      if ($_GET['msg'] == "4") {
                        echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos de usuario actualizado con EXISTO!</strong></div>';
                      } if ($_GET['msg'] == "5") {
                        echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>NO se pudo actualizar los datos!</strong></div>';
                      } if ($_GET['msg'] == "6") {
                        echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Número de cédula de familiar ya EXISTE!!!</strong></div>';
                      } elseif ($_GET['msg'] == "7") {
                        echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Nombre de usuario ya EXISTE!!!</strong></div>';
                      }
                      ?>

                    </div>
                    <br /><br />
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>
                    <div class="x_content">
                      <!-- *************************************************************************************************** -->
                      <!-- ******************************FORMULARIO REGISTRO DE DATOS PERSONALES****************************** -->
                      <!-- start accordion -->
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <form class="form-horizontal form-label-left" action="../insertar_personal.php?ac=2" method="post" id="demo-form" data-parsley-validate>
                          <?php
                          while ($reg = pg_fetch_array($result_get)) {

                            require '../formularios/form_editar_personal.php';

                            require '../formularios/form_editar_personal_estatus.php';

                            require '../formularios/form_editar_personal_direccion.php';

                            require '../formularios/form_editar_personal_laboral.php';
                          }
                          ?>
                        </form>

                        <!-- ***************************************************************************************************** -->
                        <!-- **********************************FORMULARIO PARIENTES DEL PERSONAL************************************ -->
                        <?php
                        // CONSULTA TABLA PERSONAL
                        $result_get01 = pg_query($dbconn, "SELECT * FROM public.parantesco_personal WHERE personal_cedula = $cedula1");
                        if (!$result_get01) {
                          echo "Ocurrió un error.\n";
                          exit;
                        }
                        ?>

                        <form class="" action="../insertar_personal.php?ac=4" method="post" data-parsley-validate>
                          <?php
                          while ($pariente = pg_fetch_array($result_get01)) {

                            require '../formularios/form_editar_personal_pariente.php';
                          }
                          ?>
                        </form>
                        <!-- ***************************************************************************************************** -->
                        <!-- **********************************FORMULARIO EDITAR USUARIO************************************ -->
                        <?php
                        // CONSULTA TABLA PERSONAL
                        $result_get02 = pg_query($dbconn, "SELECT * FROM public.usuario WHERE personal_cedula = $cedula1");
                        if (!$result_get02) {
                          echo "Ocurrió un error.\n";
                          exit;
                        }
                        ?>
                        <form class="" action="../insertar_usuario.php?ac=2" method="post" data-parsley-validate>
                          <?php
                          while ($usuario = pg_fetch_array($result_get02)) {

                            require '../formularios/form_editar_personal_usuario.php';
                          
                          ?>
                        </form>
                        <!-- ***************************************************************************************************** -->
                        <!-- **********************************FORMULARIO EDITAR DE PREGUNTAS SEGURIDAD************************************ -->
                        <?php
                        $id_pregunta = $usuario['preguntas_usuario_id'];
                        $result_ps = pg_query($dbconn, "SELECT * FROM public.preguntas_usuario WHERE id= $id_pregunta ");
                        if (!$result_ps) {
                          echo "Ocurrió un error.\n";
                          exit;
                        }
                        ?>
                        <form class="" action="../insertar_usuario.php?ac=4" method="post" data-parsley-validate>
                          <?php
                          while ($ps_id = pg_fetch_array($result_ps)) {

                            require '../formularios/form_editar_personal_preguntas.php';
                          }
                        } // fin while USUARIO
                          ?>
                        </form>
                        <!-- ***************************************************************************************************** -->
                      </div>
                      <!-- find accordion -->

                    </div>
                  </div>
                </div>
              </div>
              <!-- ***************************************************************************************************** -->
              <!-- ***************************************************************************************************** -->
            </div>
          </div>
          <!-- /page content -->

          <!-- ********************************************************************************************** -->



    <?php
    }
  }
}
pg_close($dbconn);
    ?>

<a data-scroll class="ir-arriba" href="#encabezado-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"> </i> </a>

    <?php require_once '../plantillas/inferior2.php'; ?>