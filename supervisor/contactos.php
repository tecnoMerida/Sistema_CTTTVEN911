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
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ***** Membrete ***** -->

  <style type="text/css">

#logoizq11 {
    float: left;
    margin-top: 0;
    margin-left: 25%;
    margin-right: 2%;
   padding-top: 1%;
   padding-left: 1%;
    width: 200px;
    height: 250px;

    position: relative; 
    top: 0;
}
/*  LOGO INSTITUCIONAL UPTM*/
#uptmder1 {
    float: right;
    margin-top: 0;
    margin-left: 1%;
    margin-right: 35%;
    width: 200px;
    height: 250px;

    position: relative; 
    top: 0;
}

    </style>
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
                <h4>CONTACTOS</h4>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!--    /////////////////////////////////////   CONTENIDO DEL DOCUMENTO     ///////////////////////////////////-->
        <div class="content_ini">

        <nav>
              <div align="center">
              <h2><big><font color="#00009C">"LIBRO DIGITAL NOVEDADES</font><font color="#800000"> 911</font><font color="#00009C">"</font></big></h2>
              </div>
        </nav>
<div>
        <div class="col-md-5 col-sm-5">
          <img src="../images/mark_cuadrantes.png" id="logoizq11" alt="" title="Logos Institucions 911">
        </div>
        <div class="col-md-7 col-sm-7">
          <h2><b>Proyecto a benefício de la comunidad  <br/><i>"VEN 911" - Mérida</i></b></h2>
        </div>
</div>
          <br/><br/>
          <br/><br/>
          <br/><br/>
          <br/><br/>
          <br/><br/>
          <br/><br/>
          <br/><br/>

<div>
        <div class="col-md-7 col-sm-7">
          <h2><b>Universidad Politecnica Territorial del Estado Mérida <br/><i>"Kleber Ramirez"</i></b></h2>
          <br/><br/>
            <p>Proyecto comunitario para aspirar al titulo <em>"Desarrollador de Aplicaciones y Sistemas Web"</em><br></p>
          <br/>
            <p>Bajo el equipo de desarrollado conformado por:<br/></p>
        </div>
        <div class="col-md-5 col-sm-5">
          <img src="../images/uptm.png" id="uptmder1" alt="" title="Logo Institucional UPTM">
        </div>
</div>

<div class="">
  

<dir> 

  <p>González Gilbert<br></p>  
    <ul>
      <li class="contacto" ><tt><em>gilbertgonzalez5@outlook.com</em></tt></li>
      <li class="contacto" ><tt><em>gilbertgonzalez55@gmail.com</em></tt></li>
      <li class="contacto" ><tt><em>0424-753.79.79</em></tt></li>
    </ul>

  <p>Salas Lismar<br/></p>
    <ul>
      <li class="contacto" ><tt><em>lismarsalas@gmail.com</em></tt></li>
      <li class="contacto" ><tt><em>0412-264.66.06</em></tt></li>
    </ul>

  <p>Castro Evelyn<br/></p>
    <ul>
      <li class="contacto" ><tt><em>evelyncastro419@gmail.com</em></tt></li>
      <li class="contacto" ><tt><em>0424-760.79.94</em></tt></li>
    </ul>
</dir>
</div>            
        </div>

  <div class="content_contacto">
    <center><small ><em>copyright and copyleft, derechos reservados @ bajo</em></small></center>
    <footer><img id="gobcentral1" src="../images/Gobierno_bolivariano_venezuela.jpeg" alt="" title="Ministerio del Poder Popular para las Relaciones Interiores, Justicia y Paz"><img id="uptmder2"  src="../images/uptm.png" id="uptmder2" alt="" title="Logo Institucional UPTM"></footer>
  </div>
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
