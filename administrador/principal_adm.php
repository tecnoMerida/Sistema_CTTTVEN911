<?php
require('../cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {
?>
<!--	//////////////////////////////////			MEMBRETE			/////////////////////////////////////////	-->
<!DOCTYPE html PUBLIC ?-//W3C//DTD XHTML 1.0 Transitional//EN? ?http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd?&gt;>
<html lang="es-español" xmlns=?http://www.w3.org/1999/xhtml?&gt;>
<link rel="shortcut icon" href="../images/logo 171.ico">
   <head>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html"/>
      <meta http-equiv="X-AU-Compatible" content="IE=edge,chrome=1">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width" media="screen"/>
<!-- ****** ESTILOS PROPIOS ****** -->
	  <link href="../css/Estilos.css" rel="stylesheet" media="screen"/>
	  <link href="../css/estilo_imagenes.css" rel="stylesheet" media="screen" />
     <link href="../css/estilo_menu.css" rel="stylesheet" media="screen" />
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <title>Libro Digital de Novedades 9-1-1</title>
   </head>
  <body class="nav-md">
  <style type="text/css">
    /****** Menù Panel Derecha ******/

a.cerrar{
width: 100%;  
}

  </style>
    <div class="container body">
      <div class="main_container">
                <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php require '../menu/menu_adm.php'; ?>

        <!-- top navigation -->
        <div class="top_nav">
          <?php require '../menu/menu_top.php' ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="background: #CDCDCD;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block; background-color: #CDCDCD;" >

          </div>
          <div class="col-md-12 col-sm-12" style="display: inline-block; background-color: #CDCDCD;" >
            <nav>
              <div align="center">
                <MARQUEE><h1><font color="#00009C">LÍBRO DIGITAL DE NOVEDADES</font><font color="#FFFFFF"> 171/911</font></h1></MARQUEE>
              </div>
          </nav>
          </div>
          <!-- /top tiles -->
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
                  if ($_GET[error] == "no") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No puedes realizar este registro</strong></div>';
              } 
              if ($_GET[msg] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud del "Sistema Emergencias 171" registrada con EXITO!!!</strong></div>';

              }
              if ($_GET[msg] == "3") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones de guardia registrada con EXITO!!!</strong></div>';

              }
              elseif ($_GET[msg] == "4") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones al personal realizada con EXITO!!!</strong></div>';
              }
             
              ?>
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
