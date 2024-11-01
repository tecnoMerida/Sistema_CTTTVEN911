<?php
require('../cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 4 && $_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ***** Membrete ***** -->

    <div class="container body">
      <div class="main_container">
     <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php 
      if ($_SESSION['tipo_rol_id'] != 1) {
        require '../menu/menu_op.php';
      }else{
        require '../menu/menu_adm.php';
      }
      ?>
     <!-- ***** /Menu Navegacion Panel Derecho ***** -->
     <!-- ***** Superior menú navegacion ***** -->
        <div class="top_nav">
          <?php require '../menu/menu_top.php' ?>
        </div>
     <!-- ***** /Superior menú navegacion ***** -->

        <!-- contenido pagina -->
        <div class="right_col" role="main" style="background: #CDCDCD;">
          <!-- Superior tiles -->
          <div class="row" style="display: inline-block; background-color: #CDCDCD;" >

          </div>
          <div class="col-md-12 col-sm-12" style="display: inline-block; background-color: #CDCDCD;" >
            <nav>
              <div align="center">
                <MARQUEE><h1><font color="#00009C">LÍBRO DIGITAL DE NOVEDADES</font><font color="#800000"> 911</font></h1></MARQUEE>
              </div>
          </nav>
          </div>
          <!-- /Superior tiles -->
          <br/>
          <div class="row">
          </div>
          <div class="row">
           </div>
           <div class="col-md-4 col-sm-4">
           </div>
            <div class="col-md-4 col-sm-4" style="display: inline-block; background-color: #CDCDCD;">
              <div>
                <img src="../images/Escudo_Gobernacion.png" id="logoder1" alt="">
              </div>
            </div>
           <div class="col-md-4 col-sm-4">
           </div>
          <div class="row">
            <div class="col-md-8 col-sm-8">
            </div>
          </div>
          <div align="center">
          <div class="col-md-12 col-sm-12" style="display: inline-block; background-color: #CDCDCD;">
                                      <?php
                  if ($_GET['msg'] == "1") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Nueva solicitud registrada con EXITO!!!</strong></div>';
              } 
              if ($_GET['msg'] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud del "Sistema Emergencias 911" registrada con EXITO!!!</strong></div>';

              }
              if ($_GET['msg'] == "3") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones de guardia registrada con EXITO!!!</strong></div>';

              }
              if ($_GET['msg'] == "4") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones al personal realizada con EXITO!!!</strong></div>';
              }
              elseif ($_GET['msg'] == "5") {
                echo '<div class="alert alert-success alert-dismissible msn1">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Cierre solicitud registrada con EXITO!!!</strong></div>';
                } 
             
              ?>
          </div>
          </div>
        </div>
        <!-- /contenido pagina -->

        <!-- footer contenido -->
        <footer>
          <?php require '../menu/footer.php' ?>
        </footer>
        <!-- /footer contenido -->
      </div>
    </div>

<?php 
                  }
          }
}
 pg_close($dbconn); 
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
