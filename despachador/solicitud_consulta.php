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

// Conexion a la base de datos
include_once '../config/conexion1.php';

$personal_usuario = $_SESSION['personal_cedula'];
$consulta_pers = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
$regid= pg_fetch_array($consulta_pers);

$cedula1 = $regid['cedula'];
$cedula_personal = $regid['cedula'];
$organismo = $regid['organismos_id'];

$ultimo1 = pg_query($dbconn,"SELECT id, fecha_inicio_g::timestamp::date, grupos_guardia_id, usuario_entrada_id  
FROM public.guardias
WHERE usuario_entrada_id = $cedula1
AND fecha_inicio_g::timestamp::date = (SELECT MAX(fecha_inicio_g::timestamp::date) FROM guardias) order by id DESC");
$reg_id= pg_fetch_array($ultimo1);

$apertura_guardia = $reg_id['id'];
$cedula = $reg_id['usuario_entrada_id'];
$grupo = $reg_id['grupos_guardia_id'];

// Consulta registro de Organismo
$consulta_organismo = pg_query($dbconn,"SELECT * FROM  organismos WHERE  id = $organismo");
$reg_organismo= pg_fetch_array($consulta_organismo);

$organismos1 = $reg_organismo['id'];

?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior2.php'; ?>
<!-- ***** Membrete ***** -->

<style type="text/css">

.msn1{
  font-size: 18px;
  height: 50px;

}
#fond{
/*  background-color: #000000;*/
  background: #000000;
}
    </style>
    <div class="container body">
      <div class="main_container">
      <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php 
      if ($_SESSION['tipo_rol_id'] != 1) {
        require '../menu/menu_desp.php';
      }else{
        require '../menu/menu_adm.php';
      }
      ?>
      <!-- / menu navegacion panel derecho -->

        <!-- top navigation -->
        <div class="top_nav" id="encabezado-top">
          <?php require '../menu/menu_top.php' ?>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>RESULTADO CONSULTA</h4>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Solicitud</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<!-- Seccion de Mensages en pantalla -->

                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-md-6 col-sm-6" align="center">
              <?php
                  if ($_GET['msg'] == "1") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>La solicitud ya existe!!!</strong></div>';
              }
              elseif ($_GET['msg'] == "2") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud NO registrada, verifique los datos</strong></div>';
              }
             
              ?>                
                </div>
                    <div class="col-md-3 col-sm-3"></div>

                <br/><br/><br/><br/>
<!--      CONEXION CON BASE DE DATOS         -->
<?php
// traer datos del resultado de BUSQUEDA y VER_USUARIO
  $sol = $_REQUEST['id'];
  $sol =$_GET['id'];

// Conexion con la base de dato
include_once '../config/config_bd.php';
  include_once '../config/conexion2_bd.php';

// CONSULTA TABLA PERSONAL_171 UNIDO CON TABLAS GRUPOS_GUARDIA Y GRUPOS_ORGANISMOS
$consulta = mysqli_query($mysql,"SELECT * FROM solicitud WHERE id = $sol ");

$fila= mysqli_fetch_array($consulta);
?>
<!--      FIN CONEXION CON BASE DE DATOS          -->
<!-- Inicio Formulario RESULTADO DE CONSULTA DE SOLICITUD -->
                  <form class="" action="../insertar_guardia_desp.php?ac=3" method="post" id="demo-form" data-parsley-validate>

                        <!-- **************************************** -->

                        <?php require '../formularios/form_registro_consulta_solicitud.php'; ?>

                        <!-- **************************************** -->

                  </form>

  <!-- ***********    Fin Formulario Registro de Bienes    ************************ -->

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
 
 <a data-scroll class="ir-arriba" href="#encabezado-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"> </i> </a>

 <script src="../js/form.js"></script>
    <?php require_once '../plantillas/inferior2.php' ?>