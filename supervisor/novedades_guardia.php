<?php
date_default_timezone_set("America/Caracas");

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
require_once '../config/conexion1.php';

$organismo_id = $_REQUEST['organismo_id'];
$fecha_entrada1 = $_REQUEST['fecha_entrada'];
   $now = new DateTime($fecha_entrada1);
   $fecha_entrada=$now->format('Ymd');

$fecha_salida1 = $_REQUEST['fecha_salida'];
   $now = new DateTime($fecha_salida1);
   $fecha_salida=$now->format('Ymd');
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior3.php'; ?>
<!-- ***** Membrete ***** -->

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
     <!-- ***** /Menu Navegacion Panel Derecho ***** -->
     <!-- ***** Superior menú navegacion ***** -->
        <div class="top_nav" id="encabezado-top">
          <?php require '../menu/menu_top.php' ?>
        </div>
     <!-- ***** /Superior menú navegacion ***** -->
     <style>
    .cero0{
  background-color: #DCEDC8;
}

.uno1{
  background-color: #FFFFD8;
}

.dos2{
  background-color: #FFCDD2;
}
</style>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>NOVEDADES DE GUARDIA</h4>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="x_panel">
              <div class="x_title">
                <h2>Consulta </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
<!--**********************  Inicio Formulario de Busqueda y Consulta de Guardia ***********-->              
              <div class="col-md-12 center-margin">
                <form class="form-inline" id="consul_guardia" name="form_consul" method="POST" action="">
              <?php
              // Consulta valor enviado por el submit para mostrar en nombre del organismo
                $organismos_consulta = pg_query($dbconn,"SELECT * FROM public.organismos WHERE id = $organismo_id ");
                $reg_consulta=pg_fetch_array($organismos_consulta);

                // Genera una consulta y muestra una lista desplegable de los organismos
                $organismos = pg_query($dbconn,"SELECT * FROM public.organismos ORDER BY id ASC");
                    if (!$organismos) {
                          echo "Ocurrió un error.\n";
                          exit;
                      }
              ?>
                  <div class="form-group col-md-3">
                    <label for="ex3" class="control-label "></label>
                        <select class="form-control" name="organismo_id" id="organismo_id" title="Seleccione el organismo a consultar" required>
                          <option value="<?php if($reg_consulta==''){ echo '';} else{ echo $reg_consulta[0]; } ?>"><?php if($reg_consulta==''){ echo '-Seleccione Organismo-';} else{ echo strtoupper($reg_consulta[1]); }?></option>
                            <?php
                              while($reg_org=pg_fetch_array($organismos))
                              { 
                            ?>
                            <option name="id" value="<?php echo $reg_org[0] ?> "><?php echo strtoupper($reg_org[1]) ?></option>
                            <?php 
                              }
                            ?>
                        </select>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="form-group col-md-2">
                    <label for="fecha_entrada" class="col-control-label "></label>
                    <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control" placeholder="Fecha Entrada" title="Seleccione fecha inicio a consultar" value="<?php echo $fecha_entrada1; ?>" required>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="form-group col-md-2">
                    <label for="fecha_salida" class="col-control-label"></label>
                    <input type="date" id="fecha_salida" name="fecha_salida" class="form-control" placeholder="Fecha Salida" title="Seleccione fecha final a consultar" value="<?php echo $fecha_salida1; ?>" required>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-2">
                  <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </form>
              </div>
<!-- ****************************** Fin de Formulario **************************************-->
            </div>

<!-- ************************************************************************************************ -->
              <?php
                  if ($organismo_id != 5 && $organismo_id != 4){
                      require '../controlador/consulta_novedades_desp.php';
                  } elseif ($organismo_id != 1 && $organismo_id != 2 && $organismo_id != 3 && $organismo_id != 5){
                      require '../controlador/consulta_novedades_op.php';
                  } else {
                      require '../controlador/consulta_novedades_sup.php';
                  }
              ?>
<!-- ************************************************************************************************ -->

                  </div>
                </div>
              </div>

        <!-- page content -->

<!-- ****************************************** Fin Decima Tabla ********************************************* -->

<!-- ****************************       FIN DE TABLA EN ACORDEON      ******************************** -->               
          </div>
        </div>
        <!-- /page content -->

    <?php 
                  }
          }
}

 ?>

<a data-scroll class="ir-arriba" href="#encabezado-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"> </i> </a>

<?php require_once '../plantillas/inferior3.php' ?>