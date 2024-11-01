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

// Conexion con la base de datos
//require_once '../config/config_bd.php';
require_once '../config/conexion1.php';

// Consulta al personal de guardia
$personal_usuario = $_SESSION['personal_cedula'];
$consulta_pers = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
$regid= pg_fetch_array($consulta_pers);

$cedula_personal = $regid['cedula'];
$organismo = $regid['organismos_id'];

$ultimo1 = pg_query($dbconn,"SELECT id, fecha_inicio_g::timestamp::date, grupos_guardia_id, usuario_entrada_id  
FROM public.guardias
WHERE usuario_entrada_id = $cedula_personal
AND fecha_inicio_g::timestamp::date = (SELECT MAX(fecha_inicio_g::timestamp::date) FROM guardias) order by id DESC");
$reg_id= pg_fetch_array($ultimo1);

$grupos01 = $reg_id['id'];
$cedula_personal1 = $reg_id['usuario_entrada_id'];
$grupo = $reg_id['grupos_guardia_id'];
$fecha_inicio = $reg_id['fecha_inicio_g'];
$fecha = date('Y-m-d', strtotime($fecha_inicio));
$hora = date('H:i:s', strtotime($fecha_inicio));
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior3.php'; ?>
<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/inferior_graficos.php'; ?>


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
                <h3>Estadisticas</h3>
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

<?php require '../formularios/form_registro_estadisticas.php'; ?>

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





  </body>
</html>
