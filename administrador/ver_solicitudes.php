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
      $num = $_REQUEST['id'];
      $num = $_GET['id'];
      $num_sol = $_REQUEST['sol'];

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
          <!-- *************************************************************************************************** -->
          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h4>SOLICITUD</h4>
                </div>

              </div>
              <div class="clearfix"></div>

              <div class="row">

                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Ver</h2>
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

                      <div>
                        <!-- start accordion -->
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                          <form class="" action="" method="post" id="demo-form" data-parsley-validate>

                            <!-- ***************************************** -->

                            <?php require '../formularios/form_ver_solicitudes.php'; ?>

                            <!-- ***************************************** -->

                          </form>
                        </div>
                        <!-- end of accordion -->

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
pg_close($dbconn);
?>

<a data-scroll class="ir-arriba" href="#encabezado-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"> </i> </a>

<?php require_once '../plantillas/inferior2.php' ?>