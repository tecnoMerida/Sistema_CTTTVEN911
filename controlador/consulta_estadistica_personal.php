<!-- ******************************** Tabla de Consulta en Acordeon ********************************* -->


<div class="col-md-12 col-sm-12  ">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Personal VEN 9-1-1 </h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <!-- start accordion -->
      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

        
        <!-- Seccion Cinco -->
        
        <!-- Seccion Uno -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
            <h4 class="panel-title">Solicitudes</h4>
          </a>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra las solicitudes registradas, despachadas y supervisadas por el personal del "VEN 9-1-1"
              </p>
              <table class="table table-bordered">
                <thead>
                  <tr align="center">
                    <th>#</th>
                    <th>Motivo</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Despachador</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if ($organismo_id == '' and $personal_ven == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($personal_ven != '' and $fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $cedula = $personal_ven;
                      //echo $cedula;

                      $filtro1 = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN estatus_solicitud ON solicitudes.estatus_solicitud_id = estatus_solicitud.id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE (solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 00:00:01' AND '$fecha_s 23:59:59') 
                      AND (solicitud_atencion.despachador_solicitud = '$cedula' OR solicitud_atencion.operador_solicitud = '$cedula')";
                      $consulta_solic = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.guardias_id, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, estatus_solicitud.tipo_estatus, personal.p_nombre, personal.p_apellido FROM solicitudes $filtro1");

                      while($reg_solic = pg_fetch_array($consulta_solic)){
                      $total_rows_pag = pg_fetch_all($consulta_solic);

                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag != 0) {

                            //impresion de los datos.
                            do {

                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_solic[2];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr align='center' ><td>" . $reg_solic[0] . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[3]) . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[4]) . "</td>\n";
                              echo "<td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[5]) . " " . strtoupper($reg_solic[6]) . "</td>\n";
                              echo "<td><a href=ver_solicitudes.php?id=" . $reg_solic[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td></tr>\n";
                            } while ($reg_solic = pg_fetch_array($consulta_solicitudes));
                            pg_free_result($consulta_solicitudes);
                          }
                        }

                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/


                      } else {
                        echo "<tr align='center' ><td colspan='7'>No hay datos a mostrar.\n</td></tr>";
                        echo $personal_ven.", ".$ver['cedula'];
                        
                       // exit;
                      }

                    }
                  
                  /********************************     FIN FILTRO BUSQUEDA     ************************************/
                  /********************************     CONSULTA DESPUES DEL FILTRO     ***************************/

 
                   /**********************************     FILTRO DE BUSQUEDA      ********************************/
                   if ($organismo_id == '' and $personal_ven == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($personal_ven != '' and $fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $cedula = $personal_ven;

                      $filtro2 = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN estatus_solicitud ON solicitudes.estatus_solicitud_id = estatus_solicitud.id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE (solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 00:00:01' AND '$fecha_s 23:59:59') 
                      AND (solicitud_atencion.despachador_solicitud = '$cedula' OR solicitud_atencion.operador_solicitud = '$cedula')
					            GROUP BY motivo_solicitud.nombre_motivo";
                      $consulta_solic_graf = pg_query($dbconn, "SELECT motivo_solicitud.nombre_motivo, COUNT(*) AS total FROM solicitudes $filtro2");

                      while($graf_solic = pg_fetch_array($consulta_solic_graf)){


                      
                        $a = $graf_solic["total"] + $a;
                        $e = $rm["id"];
                        $c = $graf_solic["nombre_motivo"] + $c;

                        $texto = $estatuspg[$a];
                        $total .= $texto;
                        $total .= ",";
                        $datos .= " " . $graf_solic["total"] . "";
                        $datos .= ",";

                        $texto1 = $tipopg[$c];
                        $total1 .= $texto1;
                        $total1 .= ",";
                        $datos1 .= "'" . $graf_solic["nombre_motivo"] . "'";
                        $datos1 .= ",";


                        // funcion de colores aleatorios
                        foreach ($graf_solic as $color) {
                              $color = substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                          }
  
                        $texto3 = $colorrgb[$a];
                        $total3 .= $texto3;
                        $total3 .= ",";
                        $datos3 .= "'#" . $color . "'";
                        $datos3 .= ",";
                      }

                    }
                  }

                  /********************************     FIN FILTRO BUSQUEDA     ************************************/
                  /********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Seccion Siete -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <h4 class="panel-title">Gráficas</h4>
          </a>
          <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra las Gráficas del la Consulta
              </p>
              <div class="container">
 
    <canvas id="myChart"></canvas>
                 
</div>
            </div>
          </div>
        </div>
<?php
        /**********************************     FILTRO DE BUSQUEDA      ********************************/
                   if ($organismo_id == '' and $personal_ven == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($personal_ven != '' and $fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $cedula = $personal_ven;

                      $filtro3 = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN estatus_solicitud ON solicitudes.estatus_solicitud_id = estatus_solicitud.id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE (solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 00:00:01' AND '$fecha_s 23:59:59') 
                      AND (solicitud_atencion.despachador_solicitud = '$cedula' OR solicitud_atencion.operador_solicitud = '$cedula')
					            GROUP BY estatus_solicitud.tipo_estatus";
                      
                      $consulta_solic_tab = pg_query($dbconn, "SELECT estatus_solicitud.tipo_estatus, COUNT(estatus_solicitud.tipo_estatus) AS total_conteo, COUNT(*) AS total_estatus FROM solicitudes $filtro3");
                      $tab_solic = pg_fetch_all($consulta_solic_tab);

                      $filtro4 = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN estatus_solicitud ON solicitudes.estatus_solicitud_id = estatus_solicitud.id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE (solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 00:00:01' AND '$fecha_s 23:59:59') 
                      AND (solicitud_atencion.despachador_solicitud = '$cedula' OR solicitud_atencion.operador_solicitud = '$cedula')";

                      $total_solic_tab = pg_query($dbconn, "SELECT COUNT(*) AS total_estatus FROM solicitudes $filtro4");
                      $total_solic = pg_fetch_array($total_solic_tab);                      

                        ?>
        <!-- Seccion Tres -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <h4 class="panel-title">Tabla</h4>
          </a>
          <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra las Tabla del resultado de la Consulta
              </p>
              <div class="container">
 
<p>

<?php

$i = 0;
echo '<table class="table table-bordered">';

foreach ($tab_solic as $item) {$i++;
echo '<tr>';
echo '<td colspan="3">&nbsp;</td>';
echo '<td>'.$item['tipo_estatus'].'</td>';
echo '<td>'.$item['total_estatus'].'</td>';
echo '<td>&nbsp;</td>';
if($i%3 == 0) {
echo '</tr><tr>';
}

echo '</tr>';
}
echo '<tr>';
echo '<td colspan="3">&nbsp;</td>';
echo '<td style="background-color: rgb(102, 255, 153);">Total</td>';
echo '<td style="background-color: rgb(102, 255, 153);">'.$total_solic['total_estatus'].'</td>';
echo '<td>&nbsp;</td>';
echo '</tr>';
echo '</table>';
?>

</p>
                 
</div>
            </div>
          </div>
        </div>
<?php
                       // exit;
                      }

                    }
?>


<script>
// Script para grafica en barras
// Horizontal BAR

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php echo $datos1;  ?>
        ],
        datasets: [{
            label: '# de Solicitudes',
            data: [
              <?php echo $datos; ?>
            ],
            backgroundColor: [
              <?php echo $datos3; ?>
            ],
            borderColor: [
              <?php echo $datos3; ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
      indexAxis: 'y',
        scales: {
          yAxes:[{ 
            ticks: { 
              beginAtZero:true 
            } 
        }] 

        }
    }
});

</script>
        <!-- Seccion Diez -->

      </div>
      <!-- end of accordion -->