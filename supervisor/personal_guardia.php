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

////////////////////////            CONSULTA GRUPO GUARDIA REGISTRADO           ////////////////////////
// Conexion a la BASE DE DATOS
include_once '../config/conexion1.php';

$personal_usuario = $_SESSION['personal_cedula'];
$consulta_pers = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
$regid= pg_fetch_array($consulta_pers);

?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior2.php'; ?>
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
<!-- ***************************************************************************************************** -->
        <!-- page content -->
<!-- Formulario Wizar Start -->
<?php require '../formularios/form_registro_personal_guardia.php'; ?>
<!-- /Formulario Wizar Start -->
<!-- ***************************************************************************************************** -->
<!-- Formulario de Observaciones al personal -->
<?php require '../formularios/form_observaciones_personal_entrada.php'; ?>
<!-- /Formulario de Observaciones al personal -->
<!-- *********************************************************************************************** -->
                  </div>
                </div>
              </div>

<!-- ***************************************************************************************************** -->
          </div>
        </div>
        <!-- /page content -->


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
 pg_close($dbconn); 
 ?>

<script language="javascript" src="../js/jquery-1.2.6.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
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
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>  
  </body>
</html>
