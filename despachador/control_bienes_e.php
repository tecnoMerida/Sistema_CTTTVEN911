<?php
require('../cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 3 && $_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

// Conexion a la BASE DE DATOS
include_once '../config/conexion1.php';

$ultimo1 = pg_query($dbconn,"SELECT id, grupos_guardia_id FROM personal_grupos_guardia WHERE id=(SELECT MAX(id) FROM personal_grupos_guardia) ");
$reg_id= pg_fetch_array($ultimo1);

$registro1 = $reg_id['id'];
$grupo = $reg_id['grupos_guardia_id'];

$personal_usuario = $_SESSION['personal_cedula'];
$consulta_pers = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
$regid= pg_fetch_array($consulta_pers);

$cedula = $regid['cedula']; 

//$consulta1 = pg_query($dbconn,"SELECT personal_cedula_sup FROM personal_datos WHERE personal_grupos_guardia_id = $registro1");
//$reg_grupo = pg_fetch_array($consulta1);

//$cedula = $reg_grupo['personal_cedula_sup']; 
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ***** Membrete ***** -->

  <style type="text/css">

.apertura{
  background-color: #FFFFFF;
  margin-left: -5px;
  padding-left: 50px;
  padding-right: 50px;
}

.fapertura{
  margin-left: -5px;
}
    </style>
    <div class="container body">
    <div class="col-md-1 col-sm-1"></div>

      <div class="col-md-10 col-sm-10">
        <!-- top navigation -->
        <div class="top_nav">
          <?php require '../menu/menu_top_apertura.php' ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->

        <div class="apertura" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>CONTROL DE BIENES</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Entrada</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                    <div class="" align="center">
              <?php
                  if ($_GET['msg'] == "1") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Usuario sin permiso de acceso</strong></div>';
              } 
              ?>                
                </div>              
                  <div class="x_content">
                <div class="col-md-2 col-sm-2"></div>
                <div class="col-md-8 col-sm-8">
                  <form class="form-horizontal form-label-left" action="../insert_apertura_guardia_desp.php?ac=1" method="post" id="demo-form" data-parsley-validate>

                    <!-- ***************************************************** -->

                     <?php require '../formularios/form_control_bienes.php'; ?>

                     <!-- **************************************************** -->

                    </form>
                  </div>
                  <div class="col-md-2 col-sm-2"></div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="fapertura">
          <?php require '../menu/footer.php' ?>
        </footer>
        <!-- /footer content -->
      </div>

    <div class="col-md-1 col-sm-1"></div>
  </div>

    <?php 
                  }
          }
}

 ?>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>
