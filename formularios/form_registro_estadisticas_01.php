<?php require_once __DIR__ . '/../config/graficas_helper.php'; ?>
              <div class="col-md-6 col-sm-6  ">

                      <?php /********* Seleccion el estatus de la Solicitud ***********/
                      // Consulta a la Base de Datos
                          $consulta = pg_query($dbconn, "SELECT * FROM estatus_solicitud ORDER BY id");
                          $result1 = pg_fetch_assoc($consulta); // Efectivo 
                          $result2 = pg_fetch_assoc($consulta); // No Efectivo
                          $result3 = pg_fetch_assoc($consulta); // Sin Despacho 
                          $result4 = pg_fetch_assoc($consulta); // Repetida
                          $result5 = pg_fetch_assoc($consulta); // Pendiente
                          $result6 = pg_fetch_assoc($consulta); // Sabotaje
                          $result7 = pg_fetch_assoc($consulta); // Informacion
                          $result8 = pg_fetch_assoc($consulta); // Abandonada


                      require_once '../config/conexion2_bd.php';

                      $consulta1 = pg_query($conexion2, "SELECT COUNT(estatus) total1 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 1 ") or die("Error al consultar Linea 17");
                      $regid1 = pg_fetch_array($consulta1); // Efectivo
      
                      $consulta2 = pg_query($conexion2, "SELECT COUNT(estatus) total2 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 2 ") or die("Error al consultar Linea 20");
                      $regid2 = pg_fetch_array($consulta2); // No efectivo
      
                      $consulta3 = pg_query($conexion2, "SELECT COUNT(estatus) total3 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 3 ") or die("Error al consultar Linea 23");
                      $regid3 = pg_fetch_array($consulta3); // Sin Despacho
      
                      $consulta4 = pg_query($conexion2, "SELECT COUNT(estatus) total4 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 4 ") or die("Error al consultar Linea 26");
                      $regid4 = pg_fetch_array($consulta4); // Repetida
      
                      $consulta5 = pg_query($conexion2, "SELECT COUNT(estatus) total5 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 6 ") or die("Error al consultar Linea 29");
                      $regid5 = pg_fetch_array($consulta5); // Sabotaje
      
                      $consulta6 = pg_query($conexion2, "SELECT COUNT(estatus) total6 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 7 ") or die("Error al consultar Linea 32");
                      $regid6 = pg_fetch_array($consulta6); // Informacion
      
                      $consulta7 = pg_query($conexion2, "SELECT COUNT(estatus) total7 FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 8 ") or die("Error al consultar Linea 35");
                      $regid7 = pg_fetch_array($consulta7); // Abandonada
      
                      $consulta_total = pg_query($conexion2, "SELECT COUNT(estatus) total FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' ") or die("Error al consultar Linea 38");
                      $regid_total = pg_fetch_array($consulta_total); // Total Suma
                      ?>
                    <table class="table table-bordered">
                      <thead>
                        <tr align='center'>
                          <th>#</th>
                          <th>Estatus</th>
                          <th>Cantidad</th>
                        </tr>
                      </thead>
                      <tbody>

                      <tr align='center' ><th scope='row'><?php echo $result1['id']; ?></th>
                      <td><?php echo icono_estatus(1); ?> <?php echo $result1['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="efectivo" required min="0" Max="999" maxlength="40" value="<?php echo $regid1['total1']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus efectivas" readonly /></td>

                      <tr align='center' ><th scope='row'><?php echo $result2['id']; ?></th>
                      <td><?php echo icono_estatus(2); ?> <?php echo $result2['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="no_efectivo" required min="0" Max="999" maxlength="40" value="<?php echo $regid2['total2']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus no efectivas" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result3['id']; ?></th>
                      <td><?php echo icono_estatus(3); ?> <?php echo $result3['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="sin_despacho" required min="0" Max="999" maxlength="40" value="<?php echo $regid3['total3']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sin despacho" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result4['id']; ?></th>
                      <td><?php echo icono_estatus(4); ?> <?php echo $result4['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="repetida" required min="0" Max="999" maxlength="40" value="<?php echo $regid4['total4']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus repetidas" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result6['id']; ?></th>
                      <td><?php echo icono_estatus(6); ?> <?php echo $result6['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="sabotaje" required min="0" Max="999" maxlength="40" value="<?php echo $regid5['total5']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sabotaje" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result7['id']; ?></th>
                      <td><?php echo icono_estatus(7); ?> <?php echo $result7['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="informacion" required min="0" Max="999" maxlength="40" value="<?php echo $regid6['total6']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus información" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result8['id']; ?></th>
                      <td><?php echo icono_estatus(8); ?> <?php echo $result8['tipo_estatus']; ?></td>
                      <td><input type="varchar" class="form-control" name="abandonada" required min="0" Max="999" maxlength="40" value="<?php echo $regid7['total7']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus abandonada" readonly /></td></tr>

                         <tr align="center">
                          <th scope='row' ></th>
                          <th scope='row' >Total</th>
                          <td><input type="varchar" class="form-control" name="total_solici" required min="0" Max="999" maxlength="40" value="<?php echo $regid_total['total']; ?>" title="Este campo contiene el total de llamadas de solicitud recibidas" readonly /></td>
                        </tr>

                      </tbody>
                    </table>

                  </div>
<!-- ///////////////////////////// CIERRE DE LA TABLA /////////////////////////////////////////-->
<?php

$sql = "select * from estatus_solicitud WHERE id IN (1,2,3,4,6,7,8)";

$resp = pg_query($dbconn, $sql) or die("Error de consulta " . __FILE__);

$rondas = pg_num_rows($resp);

$etiquetas = "";
$ids_estatus = "";
$contador = 0;
$estatuspg = array();

while ($filas = pg_fetch_array($resp)) {
  $contador++;
  $ids_estatus .= $filas["id"];
  if ($contador != $rondas)
    $ids_estatus .= ",";
  $etiquetas .= "\"" . $filas["tipo_estatus"] . "\"";
  $etiquetas .= ",";
  $i = $filas["id"];
  $estatuspg[$i] = $filas["tipo_estatus"];

}

$where =  " fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus IN (1,2,3,4,6,7,8) ";
$sql = "select estatus, COUNT(estatus) AS total  from solicitud where $where 
GROUP BY solicitud.estatus";

$consulta1 = pg_query($conexion2, "$sql");
//echo "filas; " . pg_num_rows($consulta1) . " <br />";
//var_dump($estatus);
$datos = "";
$a=0;

while ($rm = pg_fetch_array($consulta1)) {

    $a = $rm["total"] + $a;
    $e = $rm["estatus"];
//    $total .= $rm["id"];
    $texto = $estatuspg[$e];
    $total .= $texto;
//    if ($contador2 != $g->num_filas())
    $total .= ",";
    $datos .= "'". $rm["total"] ."'";
    $datos .= ",";
/*    if(isset($i)){
        echo " | id:" . $rm["id"] . " | Estatus:" . $rm["estatus"]  ." |nombre: ".$texto . " | Total:" . $rm["total"] . "<br />";
    } else {
        echo " | id:" . $rm["id"] . " | Estatus:" . $rm["estatus"]  ." |nombre: ".$texto . " | Total:" . $rm["total"] . "<br />";
    }
 */

    }
//    echo "Total de llamadas dia : ".$a;
//    echo $datos;
$decimal = 2;
?>

              <div class="col-md-6 col-sm-6 ">

                  <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:50%;">
                        <p>Gráfico</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                          <p class="">Estatus</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Promedio</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                        <td>

                        <script>
  function init_chart_doughnut() {

if (typeof (Chart) === 'undefined') { return; }

console.log('init_chart_doughnut');

if ($('.grafica1').length) {

    var chart_doughnut_settings = {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
            labels: [
              <?php echo $etiquetas; ?>
            ],
            datasets: [{
                data: [<?php echo $datos; ?>],
                backgroundColor: [<?php foreach ([1, 2, 3, 4, 6, 7, 8] as $id_est) { echo '"' . color_estatus($id_est) . '",'; } ?>]
            }]
        },
        options: {
            legend: false,
            responsive: false
        }
    }

    $('.grafica1').each(function () {

        var chart_element = $(this);
        var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

    });

}

}

</script>

                        <canvas class="grafica1" height="180" width="180" style="margin: 15px 10px 10px 0"></canvas>

                          </td>
                      <td>
                      <table class="tile_info">
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(1); ?> Efectivas </p>
                            </td>
                            <td><?php $porcentaje = $regid1['total1']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(2); ?> No Efectivas </p>
                            </td>
                            <td><?php $porcentaje = $regid2['total2']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(3); ?> Sin Despacho </p>
                            </td>
                            <td><?php $porcentaje = $regid3['total3']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(4); ?> Repetida </p>
                            </td>
                            <td><?php $porcentaje = $regid4['total4']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(6); ?> Sabotaje </p>
                            </td>
                            <td><?php $porcentaje = $regid5['total5']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(7); ?> Información </p>
                            </td>
                            <td><?php $porcentaje = $regid6['total6']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><?php echo icono_estatus(8); ?> Abandonada </p>
                            </td>
                            <td><?php $porcentaje = $regid7['total7']*100/$regid_total['total']; $porcentaje = round($porcentaje, 0);  echo $porcentaje."%"; ?></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  </div>
              </div>
              <div class="col-md-6 col-sm-6 ">
                

                      <?php
                      // Consulta a la Base de Datos para Solicitud con mayor relevancia
                          $consulta1 = pg_query($conexion2,"SELECT id FROM solicitud WHERE fecha >= '$fecha' AND hora_sol >= '$hora' AND estatus = 1 ");
                          if (!$consulta1) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                      <div><br/><br/><br/><br/></div>
                    <div class="field item form-group">
                         <label class="label-align col-md-6 col-sm-6">Solicitud Relevante<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-5 col-sm-5">
                          <select class="form-control" name="mayor_rele" title="Seleccione la solicitud de mayor relevancia" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($solicitud1=pg_fetch_array($consulta1))
                              { 
                            ?>
                            <option name="id" value="<?php echo $solicitud1[0] ?> "><?php echo $solicitud1[0] ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <input type="hidden" name="mes" id="mes" value="<?php echo $mes= date ("n");?>" required />
                    <input type="hidden" name="ano" id="ano" value="<?php echo $ano= date ("Y");?>" required />
                    <input type="hidden" name="guardia_id" id="guardia_id" value="<?php echo $grupos01;?>" required />
                    <input type="hidden" name="personal_usuario" id="personal_usuario" value="<?php echo $cedula_personal;?>" required />
              </div>

                      <div class="col-md-12 col-sm-12 "><br/><br/></div>
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-5">
                    <button type='submit' class="btn btn-primary">Guardar</button>
                        </div>
                      </div>
                    </div>