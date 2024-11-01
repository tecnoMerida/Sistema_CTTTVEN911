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

// Identificador unico de registro a modificar
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

// Conexion a la BASE DE DATOS
include_once '../config/conexion1.php';


$cedula1 = $_SESSION['personal_cedula'];
$ultimo1 = pg_query($dbconn,"SELECT * FROM public.guardias WHERE usuario_entrada_id = $cedula1 AND fecha_inicio_g=(SELECT MAX(fecha_inicio_g) FROM guardias)");

$reg_id= pg_fetch_array($ultimo1);

$grupos01 = $reg_id['id'];
$cedula_personal1 = $reg_id['usuario_entrada_id'];
$grupo = $reg_id['grupos_guardia_id'];

// Consulta registro del personal
$consulta_personal = pg_query($dbconn,"SELECT * FROM  personal WHERE  cedula = $cedula_personal1");
$reg_personal= pg_fetch_array($consulta_personal);

$cedula_personal = $reg_personal['cedula'];
$organismo = $reg_personal['organismos_id'];

?>

<!-- ****** ESTILOS PROPIOS ****** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ****** ESTILOS PROPIOS ****** -->

    <div class="container body">
      <div class="main_container">
      <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php require '../menu/menu_sup.php'; ?>
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
                <h4>OBSERVACIONES</h4>
              </div>

            </div>

            <div class="clearfix"></div>

  <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-1 col-sm-1  "></div>
                  <div class="col-md-10 col-sm-10  ">                  
                  <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="notas-tab" data-toggle="tab" href="#notas" role="tab" aria-controls="notas" aria-selected="true">Notas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="apoyo-tab" data-toggle="tab" href="#apoyo" role="tab" aria-controls="apoyo" aria-selected="false">Apoyo Administrativo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pendiente-tab" data-toggle="tab" href="#pendiente" role="tab" aria-controls="pendiente" aria-selected="false">Acciones Pendientes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="anexos-tab" data-toggle="tab" href="#anexos" role="tab" aria-controls="anexos" aria-selected="false">Anexos</a>
                      </li>
                    </ul>
                     <form class="" action="../insertar_guardia.php?ac=3" method="POST" id="demo-form" data-parsley-validate>

<!-- ********************************************* -->

<?php require '../formularios/form_ver_observaciones_guardia.php'; ?>

<!-- ********************************************* -->
                  </form>
                  </div>
                </div>
                <div class="col-md-1 col-sm-1  "></div>
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
 pg_close($dbconn); 
 ?>
 
 <?php require_once '../plantillas/inferior1.php'; ?>