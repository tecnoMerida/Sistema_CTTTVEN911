<?php
// Conexion con la base de datos
require_once '../config/conexion1.php';

$organismo_id = $_REQUEST['organismo_id'];
$personal_ven = $_REQUEST['personal_ven'];

$fecha_entrada1 = $_REQUEST['fecha_entrada'];
   $now = new DateTime($fecha_entrada1);
   $fecha_entrada=$now->format('Ymd');

$fecha_salida1 = $_REQUEST['fecha_salida'];
   $now = new DateTime($fecha_salida1);
   $fecha_salida=$now->format('Ymd');
?>

<!-- ***** Membrete ***** -->
<?php require_once '../plantillas/superior3.php'; ?>





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
                /********************************* */
                /*
                /*
                /********ORGANISMOS************** */
                /*
                /*
                /* ******************************* */

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
                    <label for="organismo_id" class="control-label"></label>
                        <select class="form-control" name="organismo_id" id="organismo_id" title="Seleccione el organismo a consultar" required>
                          <option value="<?php if($reg_consulta==''){ echo '';} else{ echo $reg_consulta[0]; } ?>"><?php if($reg_consulta==''){ echo '-Seleccione Organismo-';} else{ echo strtoupper($reg_consulta[3]).' '.strtoupper($reg_consulta[1]); }?></option>
                            <?php
                              while($reg_org=pg_fetch_array($organismos))
                              { 
                            ?>
                            <option name="id" value="<?php echo $reg_org[0] ?> "><?php echo strtoupper($reg_org[3]).' '.strtoupper($reg_org[1]) ?></option>
                            <?php 
                              }
                            ?>
                        </select>
                  </div>

                  <div class="form-group col-md-3" id="select2parroquia"></div>







                  <div class="form-group col-md-2">
                    <label for="fecha_entrada" class="col-control-label "></label>
                    <input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control" placeholder="Fecha Entrada" title="Seleccione fecha inicio a consultar" value="<?php echo $fecha_entrada1; ?>" required>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="fecha_salida" class="col-control-label"></label>
                    <input type="date" id="fecha_salida" name="fecha_salida" class="form-control" placeholder="Fecha Salida" title="Seleccione fecha final a consultar" value="<?php echo $fecha_salida1; ?>" required>
                  </div>

                  <div class="col-md-2">
                  <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </form>
              </div>
<!-- ****************************** Fin de Formulario **************************************-->
            </div>





            <?php require_once '../plantillas/inferior3.php' ?>