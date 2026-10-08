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

                          // Consulta a Estatus de Solicitud
                          $sql = "SELECT * FROM estatus_solicitud WHERE id IN (1,2,3,4,6,7,8)";
            
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


                          $result = pg_query($dbconn, "SELECT * FROM public.estadisticas_solicitud WHERE id = $id");
                if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }








                              while($reg=pg_fetch_array($result))
                              { 

                                $efectivo = $reg['efectivo'];
                                $no_efectivo = $reg['no_efectivo'];
                                $sin_despacho = $reg['sin_despacho'];
                                $repetida = $reg['repetida'];
                                $sabotaje = $reg['sabotaje'];
                                $informacion = $reg['informacion'];
                                $abandonada = $reg['abandonada'];
                                $total_solici = $reg['total_solici'];

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
                      <td><i class="fa fa-square blue"> <?php echo $result1['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="efectivo" value="<?php echo $efectivo; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus efectivas" readonly /></td>

                      <tr align='center' ><th scope='row'><?php echo $result2['id']; ?></th>
                      <td><i class="fa fa-square green"> <?php echo $result2['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="no_efectivo" value="<?php echo $no_efectivo; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus no efectivas" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result3['id']; ?></th>
                      <td><i class="fa fa-square purple"> <?php echo $result3['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="sin_despacho" value="<?php echo $sin_despacho; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sin despacho" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result4['id']; ?></th>
                      <td><i class="fa fa-square aero"> <?php echo $result4['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="repetida" value="<?php echo $repetida; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus repetidas" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result6['id']; ?></th>
                      <td><i class="fa fa-square red"> <?php echo $result6['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="sabotaje" value="<?php echo $sabotaje; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus sabotaje" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result7['id']; ?></th>
                      <td><i class="fa fa-square blue"> <?php echo $result7['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="informacion" value="<?php echo $informacion; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus información" readonly /></td></tr>

                      <tr align='center' ><th scope='row'><?php echo $result8['id']; ?></th>
                      <td><i class="fa fa-square black"> <?php echo $result8['tipo_estatus']; ?></i></td>
                      <td><input type="varchar" class="form-control" name="abandonada" value="<?php echo $abandonada; ?>" title="Este campo contiene el total de llamadas de solicitudes en estatus abandonada" readonly /></td></tr>

                         <tr align="center">
                          <th scope='row' ></th>
                          <th scope='row' >Total</th>
                          <td><input type="varchar" class="form-control" name="total_solici" value="<?php echo $total_solici; ?>" title="Este campo contiene el total de llamadas de solicitud recibidas" readonly /></td>
                        </tr>
                    <?php


//AND (fecha = '2019-05-11' AND hora_sol <= '07:00:00')

//                            $reg_efectivo= mysqli_fetch_array($consulta2);

                    ?>    
                        

                      </tbody>
                    </table>

                  </div>
<!-- ///////////////////////////// CIERRE DE LA TABLA /////////////////////////////////////////-->


              <!-- /bar charts -->
              <div class="col-md-6 col-sm-6 ">

                  <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:50%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                          <p class="">Device</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Progress</p>
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
                                    <?php echo $etiquetas; ?>
                                  ],
                                  datasets: [{
                                    data: [<?php echo ''.$efectivo.', '.$no_efectivo.', '.$sin_despacho.', '.$repetida.', '.$sabotaje.', '.$informacion.', '.$abandonada.'' ?>],
                                    backgroundColor: [
                                      "#3498DB",
                                      "#26B99A",
                                      "#9B59B6",
                                      "#BDC3C7",
                                      "#E74C3C",
                                      "blue",
                                      "black"
                                    ],
                                    hoverBackgroundColor: [
                                      "#49A9EA",
                                      "#36CAAB",
                                      "#B370CF",
                                      "#CFD4D8",
                                      "#E95E4F",
                                      "blue",
                                      "black"
                                    ]
                                  }]
                                },
                                options: {
                                  legend: false,
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
                            <td><?php $porcentaje = $efectivo * 100 / $total_solici;
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>No Efectivas </p>
                            </td>
                            <td><?php $porcentaje = $no_efectivo * 100 / $total_solici;
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Sin Despacho </p>
                            </td>
                            <td><?php $porcentaje = $sin_despacho * 100 / $total_solici;
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Repetida </p>
                            </td>
                            <td><?php $porcentaje = $repetida * 100 / $total_solici;
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Sabotaje </p>
                            </td>
                            <td><?php $porcentaje = $sabotaje * 100 / $total_solici;
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Información </p>
                            </td>
                            <td><?php $porcentaje = $informacion * 100 / $total_solici;
                                $porcentaje = round($porcentaje, 0);
                                echo $porcentaje . "%"; ?></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square black"></i>Abandonada </p>
                            </td>
                            <td><?php $porcentaje = $abandonada * 100 / $total_solici;
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
                

                      <div><br/><br/><br/><br/></div>
                    <div class="field item form-group">
                         <label class="label-align col-md-7 col-sm-7">Solicitud Relevante</label>
                      <div class="col-md-4 col-sm-4">
                          <input type="text" class="form-control" name="mayor_rele" title="Solicitud de mayor relevancia" value="<?php echo $reg['mayor_rele']; ?>" readonly >
                      </div>
                    </div>

              </div>

                      <div class="col-md-12 col-sm-12 "><br/><br/></div>
                    <div class="ln_solid"></div>
                <?php
                   }
                ?>