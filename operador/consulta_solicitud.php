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
                  
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////                                               /////////////////////////////////////
///////////////////////     conexion a la base de datos "EXTERNA"    //////////////////////////////////////
//////////////////////                                               //////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
include_once '../config/config_bd.php';
include_once '../config/conexion2_bd.php';

///////////////////      Realizar Busqueda Y CONSULTA del "BOTON CONSULTAR"       //////////////////////////////////

if (isset($_POST['consultar'])) {
  $sol = $_POST['numero_solicitud'];
  $consulta1 = "SELECT * FROM solicitud WHERE id = $sol ";  
  $resultado1=mysqli_query($conexion2, $consulta1);

   }

$sol = ($_REQUEST['numero_solicitud']);
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
                <h4>"Sistema Emergencias 911"</h4>
              </div>

            </div>
            <div class="clearfix"></div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="row">
                <div class="col-md-3 col-sm-3 "></div>
              <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buscar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<!-- ************************     FORMULARIO DE CONSULTA DE SOLICITUD     ******************************* -->
                    <form class="form-horizontal form-label-left">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nº Solicitud</label>

                        <div class="col-sm-9">
                          <div class="input-group">
                            <input type="text" name="numero_solicitud" class="form-control" placeholder="Ingrese Número Solicitud" value="<?php echo $sol; ?>" title="Llene este campo con el número de solicitud del sistema 'Emergencias 911' " autofocus required>
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary" name="consultar" title="Realizar busqueda de la solicitud">Buscar</button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
<!-- /////////////////////////////////      FIN FORMULARIO CONSULTA      ////////////////////////////////////-->
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 "></div>
              </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->


            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Solicitud</h2>
                    <div>
                    </div>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<!-- //////////////////////////////// TABLA CONSULTA DE SOLICITUD ///////////////////////////////// -->

                    <table class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th><b>Número solicitud</b></th>
                          <th><b>Motivo</b></th>
                          <th><b>Fecha </b></th>
                          <th><b>Tiempo </b></th>
                          <th><b>Despachador</b></th>
                          <th colspan="5" ><b>Acción</b></th>
                        </tr>
                      </thead>

                      <tbody>
            <?php
               // Realiza la conexion y busqueda del boton Buscar
                $registros = mysqli_query($conexion2,"SELECT * FROM solicitud WHERE id = $sol ");

                $reg = mysqli_fetch_assoc($registros);
                $total_rows = mysqli_num_rows($registros);
                
                if( $total_rows != 0){
 
                  //impresion de los datos.
                  do
                         { 
                  echo "<tr align='center'><td>".$reg['id']."</td>\n";
            
                $motivo=$reg['motivo'];// consulta el motivo de la llamada
                $registrosm = mysqli_query($conexion2,"SELECT * FROM motivos_hijos WHERE id_motivo = $motivo ");
                $reg1 = mysqli_fetch_array($registrosm);

                  echo "<td>".$reg1['nom_mot_hijo']."</td>\n";
                  echo "<td>".$reg['fecha']."</td>\n";
                  echo "<td>".$reg['hora_sol']."</td>\n";

                $desp=$reg['despachador'];// consulta despachador de solicitud
                $registrosp = mysqli_query($conexion2,"SELECT * FROM 171_usuarioz WHERE id = $desp ");
                $reg2 = mysqli_fetch_array($registrosp);

                  echo "<td>".$reg2['apellidos']."</td>\n";
                  echo "<td><a href=solicitud_consulta.php?id=".$reg['id']."><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td>\n";

                } while ( $reg = mysqli_fetch_array ($registros) );
                            mysqli_free_result($registros);
                  } else { ?>
                   <script type="text/javascript">alert(" Número de solicitud NO válido ");</script>
              <?php
                  $mensage1 = 'Número de solicitud NO válido';

                  // si no existen datos muestra mensaje
                  echo "<td colspan='5' align='center' >no se obtuvieron resultados</td></tr>"; 
                }  
            ?>
                      </tbody>
                    </table>
            <?php
                mysqli_close($conexion2);
            ?>  
<!-- /////////////////////////////////      FIN TABLA CONSULTA      ////////////////////////////////////-->
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
