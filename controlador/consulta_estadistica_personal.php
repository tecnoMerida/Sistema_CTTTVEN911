<!-- ******************************** Tabla de Consulta en Acordeon ********************************* -->


<div class="col-md-12 col-sm-12  ">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Personal VEN 9-1-1 </h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                  $organismo_id = $organismo_id ?? '';
                  $personal_ven = $personal_ven ?? '';
                  $fecha_entrada = $fecha_entrada ?? '';
                  $fecha_salida = $fecha_salida ?? '';
                  $datos = '';
                  $datos1 = '';
                  $datos3 = '';

                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if ($organismo_id == '' && $personal_ven == '' && $fecha_entrada == '' && $fecha_salida == '') {
                  } else {
                    if ($personal_ven != '' && $fecha_entrada != '' && $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $cedula = $personal_ven;

                      $filtro1 = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN estatus_solicitud ON solicitudes.estatus_solicitud_id = estatus_solicitud.id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE (solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 00:00:01' AND '$fecha_s 23:59:59') 
                      AND (solicitud_atencion.despachador_solicitud = '$cedula' OR solicitud_atencion.operador_solicitud = '$cedula')";
                      $consulta_solic = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.guardias_id, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, estatus_solicitud.tipo_estatus, personal.p_nombre, personal.p_apellido FROM solicitudes $filtro1");

                      if ($consulta_solic && pg_num_rows($consulta_solic) > 0) {
                        while ($reg_solic = pg_fetch_array($consulta_solic)) {
                          $dato = $reg_solic[2] ?? '';
                          $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                          $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                          echo "<tr align='center' ><td>" . htmlspecialchars($reg_solic[0] ?? '') . "</td>\n";
                          echo "<td>" . strtoupper(htmlspecialchars($reg_solic[3] ?? '')) . "</td>\n";
                          echo "<td>" . strtoupper(htmlspecialchars($reg_solic[4] ?? '')) . "</td>\n";
                          echo "<td>" . $fecha . "</td>\n";
                          echo "<td>" . $hora . "</td>\n";
                          echo "<td>" . strtoupper(htmlspecialchars(($reg_solic[5] ?? '') . " " . ($reg_solic[6] ?? ''))) . "</td>\n";
                          echo "<td><a href='ver_solicitudes.php?id=" . urlencode($reg_solic[0] ?? '') . "' target='_blank'><button class='btn btn-success' type='button'>VER</button></a></td></tr>\n";
                        }
                        pg_free_result($consulta_solic);
                      } else {
                        echo "<tr align='center' ><td colspan='7'>No hay datos a mostrar.</td></tr>";
                      }
                    } else {
                      echo "<tr align='center' ><td colspan='7'>No hay datos a mostrar.</td></tr>";
                    }
                  }
                  
                  /********************************     FIN FILTRO BUSQUEDA     ************************************/
                  /********************************     CONSULTA GRAFICAS     ***************************/

                  if ($organismo_id != '' || $personal_ven != '' || $fecha_entrada != '' || $fecha_salida != '') {
                    if ($personal_ven != '' && $fecha_entrada != '' && $fecha_salida != '') {
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

                      $chart_labels = [];
                      $chart_data = [];
                      $chart_colors = [];
                      if ($consulta_solic_graf) {
                        while ($graf_solic = pg_fetch_array($consulta_solic_graf)) {
                          $chart_labels[] = "'" . addslashes($graf_solic["nombre_motivo"] ?? '') . "'";
                          $chart_data[] = intval($graf_solic["total"] ?? 0);
                          $chart_colors[] = "'#" . substr(str_shuffle('ABCDEF0123456789'), 0, 6) . "'";
                        }
                        pg_free_result($consulta_solic_graf);
                      }
                      $datos1 = implode(',', $chart_labels);
                      $datos = implode(',', $chart_data);
                      $datos3 = implode(',', $chart_colors);
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
                      $tab_solic = $consulta_solic_tab ? pg_fetch_all($consulta_solic_tab) : false;

                      $filtro4 = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN estatus_solicitud ON solicitudes.estatus_solicitud_id = estatus_solicitud.id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE (solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 00:00:01' AND '$fecha_s 23:59:59') 
                      AND (solicitud_atencion.despachador_solicitud = '$cedula' OR solicitud_atencion.operador_solicitud = '$cedula')";

                      $total_solic_tab = pg_query($dbconn, "SELECT COUNT(*) AS total_estatus FROM solicitudes $filtro4");
                      $total_solic = $total_solic_tab ? pg_fetch_array($total_solic_tab) : null;                      

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

if (!empty($tab_solic) && is_array($tab_solic)) {
  foreach ($tab_solic as $item) {
    $i++;
    echo '<tr>';
    echo '<td colspan="3">&nbsp;</td>';
    echo '<td>' . htmlspecialchars($item['tipo_estatus'] ?? '') . '</td>';
    echo '<td>' . htmlspecialchars($item['total_estatus'] ?? '0') . '</td>';
    echo '<td>&nbsp;</td>';
    echo '</tr>';
  }
} else {
  echo '<tr><td colspan="6" align="center">No hay datos a mostrar.</td></tr>';
}
$tot_est = htmlspecialchars($total_solic['total_estatus'] ?? '0');
echo '<tr>';
echo '<td colspan="3">&nbsp;</td>';
echo '<td style="background-color: rgb(102, 255, 153);">Total</td>';
echo '<td style="background-color: rgb(102, 255, 153);">' . $tot_est . '</td>';
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