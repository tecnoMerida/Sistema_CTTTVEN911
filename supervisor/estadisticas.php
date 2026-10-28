<?php
require('../cookie/cookie.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 2 && $_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

// Conexion con la base de datos
//require_once '../config/config_bd.php';
require_once '../config/conexion1.php';

// Consulta al personal de guardia
$personal_usuario = $_SESSION['personal_cedula'] ?? 0;
$cedula_personal = 0;
$organismo = 1;
if ($personal_usuario) {
    $consulta_pers = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = " . intval($personal_usuario));
    if ($consulta_pers && pg_num_rows($consulta_pers) > 0) {
        $regid = pg_fetch_assoc($consulta_pers);
        $cedula_personal = $regid['cedula'];
        $organismo = $regid['organismos_id'];
    }
}

// 1. Intentar buscar la guardia abierta para este usuario
$reg_id = null;
if ($cedula_personal) {
    $ultimo1 = pg_query($dbconn, "SELECT id, fecha_inicio_g, grupos_guardia_id, usuario_entrada_id  
                                  FROM public.guardias
                                  WHERE usuario_entrada_id = " . intval($cedula_personal) . "
                                  AND fecha_fin_g IS NULL
                                  ORDER BY id DESC LIMIT 1");
    if ($ultimo1 && pg_num_rows($ultimo1) > 0) {
        $reg_id = pg_fetch_assoc($ultimo1);
    }
}

// 2. Si no se encontró, buscar cualquier guardia que esté abierta actualmente
if (!$reg_id) {
    $q_abierta = pg_query($dbconn, "SELECT id, fecha_inicio_g, grupos_guardia_id, usuario_entrada_id 
                                    FROM public.guardias 
                                    WHERE fecha_fin_g IS NULL 
                                    ORDER BY id DESC LIMIT 1");
    if ($q_abierta && pg_num_rows($q_abierta) > 0) {
        $reg_id = pg_fetch_assoc($q_abierta);
    }
}

// 3. Fallback: tomar la última guardia registrada en el sistema
if (!$reg_id) {
    $q_ultima = pg_query($dbconn, "SELECT id, fecha_inicio_g, grupos_guardia_id, usuario_entrada_id 
                                   FROM public.guardias 
                                   ORDER BY id DESC LIMIT 1");
    if ($q_ultima && pg_num_rows($q_ultima) > 0) {
        $reg_id = pg_fetch_assoc($q_ultima);
    }
}

$grupos01 = $reg_id['id'] ?? 0;
$cedula_personal1 = $reg_id['usuario_entrada_id'] ?? $cedula_personal;
$grupo = $reg_id['grupos_guardia_id'] ?? 1;
$fecha_inicio = $reg_id['fecha_inicio_g'] ?? date('Y-m-d 08:00:00');
$fecha = date('Y-m-d', strtotime($fecha_inicio));
$hora = date('H:i:s', strtotime($fecha_inicio));
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior3.php'; ?>
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





  <?php require_once '../plantillas/inferior_graficos.php'; ?>
  </body>
</html>
