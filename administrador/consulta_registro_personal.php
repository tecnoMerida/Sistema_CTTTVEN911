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

  include_once '../config/conexion1.php';
///////////////////      Realizar Busqueda Y CONSULTA del "BOTON CONSULTAR"       //////////////////////////////////

if (isset($_REQUEST['consultar'])) {
  $cedula = $_REQUEST['cedula_consultada'];

  $consulta1 = "SELECT * FROM personal WHERE cedula = $cedula ";  
  $resultado1 = pg_query($dbconn, $consulta1);

  $result = pg_num_rows($resultado1);

      if($result != 0 ){
        header("Location: consulta_registro_personal.php?msg=1");
      }else{
        header("Location: registro_personal.php?cedula_consultada=$cedula");
      }
}

$cedula11 = $_REQUEST['cedula_consultada'];
?>

<!-- ****** ESTILOS PROPIOS ****** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ****** ESTILOS PROPIOS ****** -->

    <div class="container body">
      <div class="main_container">
      <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php require '../menu/menu_adm.php'; ?>
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
                <h4>REGISTRO PERSONAL</h4>
              </div>

            </div>
            <div class="clearfix"></div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="row">
                <div class="col-md-3 col-sm-3 "></div>
              <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Consultar</h2>
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
                    <form class="form-horizontal form-label-left" action="consulta_registro_personal.php" method="GET">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nº Cédula</label>

                        <div class="col-sm-9">
                          <div class="input-group">
                            <input type="text" name="cedula_consultada" class="form-control" placeholder="Ingrese Número Cédula" value="<?php echo $cedula11; ?>" title="Llene este campo con el número de cedula" minlength="7" maxlength="8" pattern="[0-9]{7,8}" autofocus required>
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary" name="consultar" title="Realizar busqueda del registro del personal">Consultar</button>
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
                  <div><br/><br/></div>
                  <div class="col-md-2 col-sm-2 "></div>
                  <div align="center" class="col-md-8 col-sm-8 ">
              <?php
                  if ($_GET['msg'] == "1") {

              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El Número de Cédula ya Existe!!!</strong></div>';
                  } 
           
              ?>
              </div>
              <div class="col-md-2 col-sm-2 "></div>
          
          </div>
        </div>
        <!-- /page content -->


    <?php 
                  }
          }
}
    ?>

<?php require_once '../plantillas/inferior1.php' ?>