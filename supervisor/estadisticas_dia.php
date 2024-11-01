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

      // Conexion con la base de datos
//      require_once '../config/config_bd.php';
      require_once '../config/conexion1.php';

      // Consulta al personal de guardia
      $personal_usuario = $_SESSION['personal_cedula'];
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ") or die("Error L:20");
      $regid = pg_fetch_array($consulta_pers);

      $cedula_personal = $regid['cedula'];
      $organismo = $regid['organismos_id'];

      $ultimo1 = pg_query($dbconn, "SELECT id, fecha_inicio_g::timestamp::date, grupos_guardia_id, usuario_entrada_id  
      FROM public.guardias
      WHERE usuario_entrada_id = $cedula_personal
      AND fecha_inicio_g::timestamp::date = (SELECT MAX(fecha_inicio_g::timestamp::date) FROM guardias) order by id DESC")  or die("Error L:28");
      $reg_id = pg_fetch_array($ultimo1);

      $grupos01 = $reg_id['id'];
      $cedula_personal1 = $reg_id['usuario_entrada_id'];
      $grupo = $reg_id['grupos_guardia_id'];
      $fecha_inicio = $reg_id['fecha_inicio_g'];
        $fecha = date('Y-m-d', strtotime($fecha_inicio));
        $hora = date('H:i:s', strtotime($fecha_inicio));
?>

      <!-- ***** Membrete ***** -->
      <?php require_once '../plantillas/superior3.php'; ?>
      <!-- ***** Membrete ***** -->
      <?php require_once '../plantillas/inferior_graficos.php'; ?>


    

      <div class="container body">
        <div class="main_container">
          <!-- ***** Menu Navegacion Panel Derecho ***** -->
          <?php
          if ($_SESSION['tipo_rol_id'] != 1) {
            require '../menu/menu_sup.php';
          } else {
            require '../menu/menu_adm.php';
          }

          ?>
          <!-- / menu navegacion panel derecho -->

          <!-- top navigation -->
          <div class="top_nav">
            <?php require '../menu/menu_top.php' ?>
          </div>
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h4>ESTADISTICAS</h4>
                </div>

              </div>

              <div class="clearfix"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Control Diario</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
<?php 
echo $fecha_inicio.", ";
echo $fecha.", ";
echo $hora.", ";
?>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <form class="" action="" method="post" id="demo-form" data-parsley-validate>

                        <!-- *********************************************** -->

                        <?php require '../formularios/form_ver_estadisticas_dia.php'; ?>

                        <!-- *********************************************** -->
                      </form>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /page content -->



    <?php
    }
  }
}

    ?>
<!-- footer content -->
<footer>
          <?php require '../menu/footer.php' ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    </div>    
    </body>
    </html>
