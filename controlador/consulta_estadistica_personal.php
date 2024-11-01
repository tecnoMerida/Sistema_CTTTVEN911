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
        
        <!-- Seccion Seis -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            <h4 class="panel-title">Solicitudes</h4>
          </a>
          <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
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
                      echo $cedula;

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
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Seccion Siete -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            <h4 class="panel-title">Gráficas</h4>
          </a>
          <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra las Gráficas del la Consulta
              </p>
            </div>
          </div>
        </div>
        <!-- Seccion Nueve -->

        <!-- Seccion Diez -->

      </div>
      <!-- end of accordion -->