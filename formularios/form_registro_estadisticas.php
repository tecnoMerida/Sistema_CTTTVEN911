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

                /************************************************* */
                /*  modificado 07-03-2024
                /*  Consulta a los estatus de las solicitudes
                /************************************************* */

                $consulta1 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total1 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 1 ") or die("Error al consultar Linea 17");
                $regid1 = pg_fetch_array($consulta1); // Efectivo

                $consulta2 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total2 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 2 ") or die("Error al consultar Linea 20");
                $regid2 = pg_fetch_array($consulta2); // No efectivo

                $consulta3 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total3 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 3 ") or die("Error al consultar Linea 23");
                $regid3 = pg_fetch_array($consulta3); // Sin Despacho

                $consulta4 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total4 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 4 ") or die("Error al consultar Linea 26");
                $regid4 = pg_fetch_array($consulta4); // Repetida

                $consulta5 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total5 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 6 ") or die("Error al consultar Linea 29");
                $regid5 = pg_fetch_array($consulta5); // Sabotaje

                $consulta6 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total6 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 7 ") or die("Error al consultar Linea 32");
                $regid6 = pg_fetch_array($consulta6); // Informacion

                $consulta7 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total7 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 8 ") or die("Error al consultar Linea 35");
                $regid7 = pg_fetch_array($consulta7); // Abandonada

                $consulta8 = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total8 FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora' AND estatus_solicitud_id = 5 ") or die("Error al consultar Linea 26");
                $regid8 = pg_fetch_array($consulta8); // Pendientes

                $consulta_total = pg_query($dbconn, "SELECT COUNT(estatus_solicitud_id) total FROM solicitudes WHERE fecha_sol >= '$fecha' AND hora_sol >= '$hora'") or die("Error al consultar Linea 38");
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

                    <tr align='center'>
                      <th scope='row'><?php echo $result1['id']; ?></th>
                      <td><i class="fa fa-square blue"> <?php echo $result1['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="efectivo" required min="0" Max="999" maxlength="40" value="<?php echo $regid1['total1']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus efectivas" readonly /></td>

                    <tr align='center'>
                      <th scope='row'><?php echo $result2['id']; ?></th>
                      <td><i class="fa fa-square green"> <?php echo $result2['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="no_efectivo" required min="0" Max="999" maxlength="40" value="<?php echo $regid2['total2']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus no efectivas" readonly /></td>
                    </tr>

                    <tr align='center'>
                      <th scope='row'><?php echo $result3['id']; ?></th>
                      <td><i class="fa fa-square purple"> <?php echo $result3['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="sin_despacho" required min="0" Max="999" maxlength="40" value="<?php echo $regid3['total3']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sin despacho" readonly /></td>
                    </tr>

                    <tr align='center'>
                      <th scope='row'><?php echo $result4['id']; ?></th>
                      <td><i class="fa fa-square aero"> <?php echo $result4['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="repetida" required min="0" Max="999" maxlength="40" value="<?php echo $regid4['total4']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus repetidas" readonly /></td>
                    </tr>

                    <tr align='center'>
                      <th scope='row'><?php echo $result5['id']; ?></th>
                      <td><i class="fa fa-square red"> <?php echo $result5['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="sabotaje" required min="0" Max="999" maxlength="40" value="<?php echo $regid8['total8']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sabotaje" readonly /></td>
                    </tr>

                    <tr align='center'>
                      <th scope='row'><?php echo $result6['id']; ?></th>
                      <td><i class="fa fa-square dark gray"> <?php echo $result6['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="sabotaje" required min="0" Max="999" maxlength="40" value="<?php echo $regid5['total5']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sabotaje" readonly /></td>
                    </tr>

                    <tr align='center'>
                      <th scope='row'><?php echo $result7['id']; ?></th>
                      <td><i class="fa fa-square blue"> <?php echo $result7['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="informacion" required min="0" Max="999" maxlength="40" value="<?php echo $regid6['total6']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus información" readonly /></td>
                    </tr>

                    <tr align='center'>
                      <th scope='row'><?php echo $result8['id']; ?></th>
                      <td><i class="fa fa-square black"> <?php echo $result8['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="abandonada" required min="0" Max="999" maxlength="40" value="<?php echo $regid7['total7']; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus abandonada" readonly /></td>
                    </tr>

                    <tr align="center">
                      <th scope='row'></th>
                      <th scope='row'>Total</th>
                      <td><input type="varchar" class="form-control" name="total_solici" required min="0" Max="999" maxlength="40" value="<?php echo $regid_total['total']; ?>" title="Este campo contiene el total de llamadas de solicitud recibidas" readonly /></td>
                    </tr>

                  </tbody>
                </table>

              </div>
              <!-- ///////////////////////////// CIERRE DE LA TABLA /////////////////////////////////////////-->
              <?php
              /************************************************/
              /**** Modificado 14-03-2024 3:00 pm          ****/
              /**** Consulta SQL a BD para mostrar grafica ****/
              /************************************************/

              $sql = "SELECT estatus_solicitud.id, estatus_solicitud.tipo_estatus, solicitudes.estatus_solicitud_id, COUNT(*) AS total
	FROM public.solicitudes
	INNER JOIN estatus_solicitud ON estatus_solicitud.id = solicitudes.estatus_solicitud_id
	WHERE solicitudes.fecha_sol >= '$fecha' AND solicitudes.hora_sol >= '$hora'
	GROUP BY estatus_solicitud.id, solicitudes.estatus_solicitud_id
  ORDER BY estatus_solicitud.id ";

              $resp = pg_query($dbconn, $sql) or die("Error de consulta " . __FILE__);
              while ($rm = pg_fetch_array($resp)) {

                $a = $rm["total"] + $a;
                $e = $rm["id"];
                $c = $rm["tipo_estatus"] + $c;


                $texto = $estatuspg[$e];
                $total .= $texto;

                $total .= ",";
                $datos .= "'" . $rm["total"] . "'";
                $datos .= ",";


                $texto1 = $tipopg[$c];
                $total1 .= $texto1;

                $total1 .= ",";
                $datos1 .= "'" . $rm["tipo_estatus"] . "'";
                $datos1 .= ",";



                if ($rm["id"] == 1) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"blue"';
                  $color .= ',';
                } else if ($rm["id"] == 2) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"green"';
                  $color .= ',';
                } else if ($rm["id"] == 3) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"purple"';
                  $color .= ',';
                } else if ($rm["id"] == 4) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"aero"';
                  $color .= ',';
                } else if ($rm["id"] == 5) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"red"';
                  $color .= ',';
                } else if ($rm["id"] == 6) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"#34495E"';
                  $color .= ',';
                } else if ($rm["id"] == 7) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"#3498DB"';
                  $color .= ',';
                } else if ($rm["id"] == 8) {
                  $texto2 = $estatuspg[$e];
                  $total2 .= $texto2;

                  $total2 .= ',';
                  $color .= '"black"';
                }
              }

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

                            if (typeof(Chart) === 'undefined') {
                              return;
                            }

                            console.log('init_chart_doughnut');

                            if ($('.grafica1').length) {

                              var chart_doughnut_settings = {
                                type: 'doughnut',
                                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                data: {
                                  labels: [
                                    <?php echo $datos1;  ?>
                                  ],
                                  datasets: [{
                                    data: [<?php echo $datos; ?>],
                                    backgroundColor: [
                                      <?php echo $color . '""'; ?>
                                    ],
                                    hoverBackgroundColor: [
                                      <?php echo $color . '""'; ?>
                                    ]
                                  }]
                                },
                                options: {
                                  legend: false,
                                  parseTime: false,
                                  responsive: false
                                }
                              }

                              $('.grafica1').each(function() {

                                var chart_element = $(this);
                                var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

                              });

                            }

                          }
                        </script>

                        <canvas class="grafica1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>

                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Efectivas </p>
                            </td>
                            <td><?php $porcentaje = $regid1['total1'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>No Efectivas </p>
                            </td>
                            <td><?php $porcentaje = $regid2['total2'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Sin Despacho </p>
                            </td>
                            <td><?php $porcentaje = $regid3['total3'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Repetida </p>
                            </td>
                            <td><?php $porcentaje = $regid4['total4'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Pendiente </p>
                            </td>
                            <td><?php $porcentaje = $regid8['total8'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square black"></i>Sabotaje </p>
                            </td>
                            <td><?php $porcentaje = $regid5['total5'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Información </p>
                            </td>
                            <td><?php $porcentaje = $regid6['total6'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square dark gray"></i>Abandonada </p>
                            </td>
                            <td><?php $porcentaje = $regid7['total7'] * 100 / $regid_total['total'];
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
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
                $consulta1 = pg_query($dbconn, "SELECT * FROM solicitudes WHERE (fecha_sol >= '$fecha' AND hora_sol >= '$hora') AND estatus_solicitud_id = 1 ");
                if (!$consulta1) {
                  echo "Ocurrió un error.\n";
                  exit;
                }
                ?>
                <div><br /><br /><br /><br /></div>
                <div class="field item form-group">
                  <label class="label-align col-md-6 col-sm-6">Solicitud Relevante<span class="required">
                      <font COLOR="#FF0000">*</font>
                    </span></label>
                  <div class="col-md-5 col-sm-5">
                    <select class="form-control" name="mayor_rele" title="Seleccione la solicitud de mayor relevancia" required>
                      <option value="">--Seleccione--</option>
                      <?php
                      while ($solicitud1 = pg_fetch_array($consulta1)) {
                      ?>
                        <option name="id" value="<?php echo $solicitud1[0] ?> "><?php echo $solicitud1[0] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <input type="hidden" name="mes" id="mes" value="<?php echo $mes = date("n"); ?>" required />
                <input type="hidden" name="ano" id="ano" value="<?php echo $ano = date("Y"); ?>" required />
                <input type="hidden" name="guardia_id" id="guardia_id" value="<?php echo $grupos01; ?>" required />
                <input type="hidden" name="personal_usuario" id="personal_usuario" value="<?php echo $cedula_personal; ?>" required />
              </div>

              <div class="col-md-12 col-sm-12 "><br /><br /></div>
              <div class="ln_solid">
                <div class="form-group">
                  <div class="col-md-6 offset-md-5">
                    <button type='submit' class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>