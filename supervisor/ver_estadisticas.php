<?php
require('../cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 2 && $_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

// Identificador unico de registro a modificar
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

// Conexion con la base de datos
require_once '../config/conexion1.php';

?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ***** Membrete ***** -->

<?php require_once '../plantillas/inferior_graficos.php';?>

    <div class="container body">
      <div class="main_container">
      <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php 
      if ($_SESSION['tipo_rol_id'] != 1) {
          require '../menu/menu_sup.php';        
      }else{
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

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="" action="../insert_cierre_guardia.php?ac=1" method="post" id="demo-form" data-parsley-validate>

<!-- *********************************************** -->

<?php require '../formularios/form_ver_estadisticas.php'; ?>

<!-- *********************************************** -->
                    </form>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php require '../menu/footer.php' ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php 
                  }
          }
}
 pg_close($dbconn); 
 ?>

  
  </body>
</html>