<!-- ******************************** Tabla de Consulta en Acordeon ********************************* -->

<div class="col-md-12 col-sm-12  ">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Despachador </h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <!-- start accordion -->
      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

      <!-- Sección Cuatro -->
        <div class="panel">
          <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h4 class="panel-title">Control Bienes Entrada</h4>
          </a>
          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra la verificación de bienes al momento de la apertura y recepción de guardia
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Control Entrada</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  $organismo_id = $organismo_id ?? '';
                  $fecha_entrada = $fecha_entrada ?? '';
                  $fecha_salida = $fecha_salida ?? '';

                  if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                    $fecha_e = $fecha_entrada;
                    $fecha_s = $fecha_salida;
                    $organismo = $organismo_id;
                    $consulta = pg_query($dbconn, "SELECT * FROM public.guardias WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s' ");

                    if ($consulta) {
                      while ($reg01 = pg_fetch_array($consulta)) {
                        $id_guardia = $reg01['id'] ?? 0;
                        if (!empty($id_guardia)) {
                          $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id_guardia AND personal.organismos_id = $organismo";
                          $consulta_apt = pg_query($dbconn, "SELECT guardias.id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");

                          if ($consulta_apt) {
                            while ($reg_apt = pg_fetch_array($consulta_apt)) {
                              $cb_id = $reg_apt[1] ?? 0;
                              if (!empty($cb_id)) {
                                $consulta_bienes = pg_query($dbconn, "SELECT * FROM public.control_bienes WHERE id = '$cb_id' ");
                                if ($consulta_bienes) {
                                  while ($reg_pag = pg_fetch_array($consulta_bienes)) {
                                    $dato = $reg_pag['fecha_creacion'] ?? '';
                                    $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                                    $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                                    echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                                    echo "<td>" . $hora . "</td>\n";
                                    echo "<td>";

                                    $cadena = $reg_pag['materiales_recibe'] ?? '';
                                    $array = array_filter(explode(",", $cadena));
                                    $bienes_txt = [];
                                    foreach ($array as $bid) {
                                      $bid = trim($bid);
                                      if (is_numeric($bid)) {
                                        $c_b = pg_query($dbconn, "SELECT nombre_b FROM bienes WHERE id = $bid");
                                        if ($c_b && ($r_b = pg_fetch_assoc($c_b))) {
                                          $bienes_txt[] = strtoupper($r_b['nombre_b']);
                                        }
                                      }
                                    }
                                    echo implode(", ", $bienes_txt);

                                    echo "</td>\n";
                                    echo "<td><a href='ver_controlBienes_entrada.php?id=" . urlencode($reg_pag['id'] ?? '') . "' target='_blank'><button class='btn btn-success' type='button'>VER</button></a></td></tr>\n";
                                  }
                                  pg_free_result($consulta_bienes);
                                }
                              }
                            }
                            pg_free_result($consulta_apt);
                          }
                        }
                      }
                      pg_free_result($consulta);
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
        <!-- Seccion Cinco -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            <h4 class="panel-title">Apertura</h4>
          </a>
          <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra la descripción realizada al momento de recibir y aperturar la guardia
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Apertura</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                    $fecha_e = $fecha_entrada;
                    $fecha_s = $fecha_salida;
                    $organismo = $organismo_id;
                    $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
                    $consulta_apertura = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1 ");

                    if ($consulta_apertura) {
                      while ($reg_01 = pg_fetch_array($consulta_apertura)) {
                        $id_guardia = $reg_01['id'] ?? 0;
                        if (!empty($id_guardia)) {
                          $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id_guardia AND personal.organismos_id = $organismo";
                          $consulta_apt = pg_query($dbconn, "SELECT guardias.id, guardias.fecha_inicio_g, guardias.apertura_g, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");

                          if ($consulta_apt) {
                            while ($reg_apt = pg_fetch_array($consulta_apt)) {
                              $dato = $reg_apt[1] ?? '';
                              $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                              $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                              echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              echo "<td>" . strtoupper($reg_apt[2] ?? '') . "</td>\n";
                              echo "<td><a href='ver_apertura_guardia.php?id=" . urlencode($reg_apt[0] ?? '') . "' target='_blank'><button class='btn btn-success' type='button'>VER</button></a></td></tr>\n";
                            }
                            pg_free_result($consulta_apt);
                          }
                        }
                      }
                      pg_free_result($consulta_apertura);
                    }
                  }
                  /********************************     FIN FILTRO BUSQUEDA     ************************************/
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Seccion Seis -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            <h4 class="panel-title">Solicitudes</h4>
          </a>
          <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra las solicitudes registradas y las optenidas del "Sistema 911"
              </p>
              <table class="table table-bordered">
                <thead>
                  <tr align="center">
                    <th>#</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Despachador</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                    $fecha_e = $fecha_entrada;
                    $fecha_s = $fecha_salida;
                    $organismo = $organismo_id;
                    $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
                    $consulta_solic = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");

                    if ($consulta_solic) {
                      while ($reg_01 = pg_fetch_array($consulta_solic)) {
                        $id_guardia = $reg_01['id'] ?? 0;
                        if (!empty($id_guardia)) {
                          $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id_guardia AND personal.organismos_id = $organismo ORDER BY guardias.id ASC";
                          $consulta_obs1 = pg_query($dbconn, "SELECT guardias.id, guardias.fecha_inicio_g, guardias.usuario_salida_id, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");

                          if ($consulta_obs1) {
                            while ($reg_obs = pg_fetch_array($consulta_obs1)) {
                              $guardia_id = $reg_obs[0] ?? 0;
                              if (!empty($guardia_id)) {
                                $filtro_solic = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                                INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                                INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                                INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                                WHERE solicitudes.guardias_id = $guardia_id";
                                $consulta_solicitudes = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.tiempo_apertura_sol, solicitudes.hora_sol, solicitudes.guardias_id, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, personal.p_nombre, personal.p_apellido FROM public.solicitudes $filtro_solic");

                                if ($consulta_solicitudes) {
                                  while ($reg_solic = pg_fetch_array($consulta_solicitudes)) {
                                    $clase = 'cero0';
                                    $h_inicio = $reg_solic[1] ?? '';
                                    $h_termino = $reg_solic[2] ?? '';
                                    if (!empty($h_inicio) && !empty($h_termino)) {
                                      try {
                                        $datex7_sol = new DateTime($h_termino);
                                        $datex77_sol = new DateTime($h_inicio);
                                        $horax7_sol = date_diff($datex7_sol, $datex77_sol);
                                        $hx7x7_sol = $horax7_sol->format('%H:%I:%S');
                                        if ($hx7x7_sol <= "00:01:00") {
                                          $clase = 'cero0';
                                        } elseif ($hx7x7_sol <= "00:02:00") {
                                          $clase = 'uno1';
                                        } else {
                                          $clase = 'dos2';
                                        }
                                      } catch (Exception $e) {
                                        $clase = 'cero0';
                                      }
                                    }

                                    $dato = $reg_solic[4] ?? '';
                                    $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                                    $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                                    echo "<tr class='" . $clase . "' align='center' ><td>" . htmlspecialchars($reg_solic[0] ?? '') . "</td>\n";
                                    echo "<td>" . strtoupper(htmlspecialchars($reg_solic[5] ?? '')) . "</td>\n";
                                    echo "<td>" . $fecha . "</td>\n";
                                    echo "<td>" . $hora . "</td>\n";
                                    echo "<td>" . strtoupper(htmlspecialchars(($reg_solic[6] ?? '') . " " . ($reg_solic[7] ?? ''))) . "</td>\n";
                                    echo "<td><a href='ver_solicitudes.php?id=" . urlencode($reg_solic[0] ?? '') . "' target='_blank'><button class='btn btn-success' type='button'>VER</button></a></td></tr>\n";
                                  }
                                  pg_free_result($consulta_solicitudes);
                                }
                              }
                            }
                            pg_free_result($consulta_obs1);
                          }

                          // Consulta a Tablas de Solicitudes Traidas del "Sistema de Emergencias 911"
                          $filtro_solic1 = "WHERE guardias_id = $id_guardia";
                          $consulta_solicitudes1 = pg_query($dbconn, "SELECT numero_solicitud, fecha_solicitud, hora_solicitud, motivo_solicitud, despachador, guardias_id FROM public.reporte_solicitudes $filtro_solic1");
                          if ($consulta_solicitudes1) {
                            while ($reg_solic1 = pg_fetch_array($consulta_solicitudes1)) {
                              $dato = $reg_solic1[1] ?? '';
                              $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                              $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                              echo "<tr align='center' ><td>" . htmlspecialchars($reg_solic1[0] ?? '') . "</td>\n";
                              
                              $motivo_sol = intval($reg_solic1[3] ?? 0);
                              $nom_motivo = '';
                              if ($motivo_sol > 0) {
                                $result44 = pg_query($dbconn, "SELECT nombre_motivo_grupo, nombre_motivo FROM motivo_solicitud_grupo INNER JOIN motivo_solicitud ON motivo_solicitud.motivo_grupo_id = motivo_solicitud_grupo.id WHERE motivo_solicitud.id = $motivo_sol");
                                if ($result44 && ($registro44 = pg_fetch_assoc($result44))) {
                                  $nom_motivo = strtoupper($registro44['nombre_motivo_grupo'] ?? '') . ' - ' . strtoupper($registro44['nombre_motivo'] ?? '');
                                }
                              }
                              echo "<td>" . htmlspecialchars($nom_motivo) . "</td>\n";
                              echo "<td>" . $fecha . "</td>\n";
                              echo "<td>" . htmlspecialchars($reg_solic1[2] ?? '') . "</td>\n";

                              $cedula_desp = intval($reg_solic1[4] ?? 0);
                              $nom_desp = '';
                              if ($cedula_desp > 0) {
                                $consulta_personal1 = pg_query($dbconn, "SELECT cedula, p_nombre, p_apellido FROM public.personal WHERE cedula = $cedula_desp");
                                if ($consulta_personal1 && ($reg_perso = pg_fetch_assoc($consulta_personal1))) {
                                  $nom_desp = strtoupper($reg_perso['p_nombre'] ?? '') . ' ' . strtoupper($reg_perso['p_apellido'] ?? '');
                                }
                              }
                              echo "<td>" . htmlspecialchars($nom_desp) . "</td>\n";
                              echo "<td><a href='ver_solicitudes.php?sol=" . urlencode($reg_solic1[0] ?? '') . "' target='_blank'><button class='btn btn-success' type='button'>VER</button></a></td></tr>\n";
                            }
                            pg_free_result($consulta_solicitudes1);
                          }
                        }
                      }
                      pg_free_result($consulta_solic);
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
          <a class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            <h4 class="panel-title">Observaciones</h4>
          </a>
          <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
              Esta sección muestra las notas, acciones pendientes, apoyo administrativo y anexos
              </p>
              <table class="table table-bordered">
                <thead>
                  <tr align="center">
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Observaciones</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s' ";
                      $consulta_obs = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1 ");

                      while ($reg_01 = pg_fetch_array($consulta_obs)) {
                        if ($reg_01) {
                          $id = $reg_01['id'];
                          /*                        $filtro_obs2 = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula INNER JOIN public.observaciones ON observaciones.guardias_id = guardias.id WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                        $consulta_obs2 = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_inicio_g, personal.cedula, personal.organismos_id, observaciones.id, observaciones.notas, observaciones.acciones_pen, observaciones.apoyo_adm, observaciones.anexo, observaciones.fecha_creacion_obs, observaciones.guardias_id, observaciones.organismos_id FROM public.guardias $filtro_obs2");
                        $reg_obs = pg_fetch_array($consulta_obs2);
*/

                          $filtro_obs2 = "WHERE guardias_id = $id AND organismos_id = $organismo ";
                          $consulta_obs2 = pg_query($dbconn, "SELECT * FROM public.observaciones $filtro_obs2 ");
                          $reg_obs = pg_fetch_array($consulta_obs2);

                          $total_rows_pag = pg_fetch_all($consulta_obs2);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_obs[5];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              if ($reg_obs[1] != '') {
                                echo "<td>" . strtoupper($reg_obs[1]) . "</td>\n";
                              } elseif ($reg_obs[2] != '') {
                                echo "<td>" . strtoupper($reg_obs[2]) . "</td>\n";
                              } elseif ($reg_obs[3] != '') {
                                echo "<td>" . strtoupper($reg_obs[3]) . "</td>\n";
                              } else {
                                echo "<td>" . strtoupper($reg_obs[4]) . "</td>\n";
                              }
                              echo "<td><a href=ver_observaciones_guardia.php?id=" . $reg_obs[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td></tr>\n";
                            } while ($reg_obs = pg_fetch_array($consulta_obs2));
                            pg_free_result($consulta_obs2);
                          } else {
                            // si no existen datos muestra mensaje
                            //echo "<tr><br/><td colspan='1'></td>";
                            //echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                            //echo "<td colspan='1'></td></tr>";
                          }
                          //                      }
                          //                  }
                        } else {
                          echo "Ocurrió un error en consulta.\n";
                          exit;
                        }
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
        <!-- Seccion Nueve -->
        <div class="panel">
          <a class="panel-heading collapsed" role="tab" id="headingNine" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
            <h4 class="panel-title">Control Bienes Salida</h4>
          </a>
          <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra la verificación de bienes al momento del cierre de guardia
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Control Salida</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                    $fecha_e = $fecha_entrada;
                    $fecha_s = $fecha_salida;
                    $organismo = $organismo_id;
                    $filtro1 = "WHERE fecha_fin_g BETWEEN '$fecha_e' AND '$fecha_s' ";
                    $consulta = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");

                    if ($consulta) {
                      while ($reg01 = pg_fetch_array($consulta)) {
                        $id_guardia = $reg01['id'] ?? 0;
                        if (!empty($id_guardia)) {
                          $filtro_bienes1 = "INNER JOIN personal ON guardias.usuario_salida_id=personal.cedula WHERE guardias.id = $id_guardia AND personal.organismos_id = $organismo ";
                          $consulta_bienes1 = pg_query($dbconn, "SELECT guardias.id, guardias.fecha_fin_g, guardias.usuario_salida_id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_bienes1 ");

                          if ($consulta_bienes1) {
                            while ($reg_guardia = pg_fetch_array($consulta_bienes1)) {
                              $cb_id = $reg_guardia[3] ?? 0;
                              if (!empty($cb_id)) {
                                $consulta_bienes = pg_query($dbconn, "SELECT * FROM public.control_bienes WHERE id = '$cb_id' ");
                                if ($consulta_bienes) {
                                  while ($reg_pag = pg_fetch_array($consulta_bienes)) {
                                    $dato = $reg_pag['fecha_creacion'] ?? '';
                                    $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                                    $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                                    echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                                    echo "<td>" . $hora . "</td>\n";
                                    echo "<td>";

                                    $cadena = $reg_pag['materiales_entrega'] ?? '';
                                    $array = array_filter(explode(",", $cadena));
                                    $bienes_txt = [];
                                    foreach ($array as $bid) {
                                      $bid = trim($bid);
                                      if (is_numeric($bid)) {
                                        $c_b = pg_query($dbconn, "SELECT nombre_b FROM bienes WHERE id = $bid");
                                        if ($c_b && ($r_b = pg_fetch_assoc($c_b))) {
                                          $bienes_txt[] = strtoupper($r_b['nombre_b']);
                                        }
                                      }
                                    }
                                    echo implode(", ", $bienes_txt);

                                    echo "</td>\n";
                                    echo "<td><a href='ver_controlBienes_salida.php?id=" . urlencode($reg_pag['id'] ?? '') . "' target='_blank'><button class='btn btn-success' type='button'>VER</button></a></td></tr>\n";
                                  }
                                  pg_free_result($consulta_bienes);
                                }
                              }
                            }
                            pg_free_result($consulta_bienes1);
                          }
                        }
                      }
                      pg_free_result($consulta);
                    }
                  }
                  /********************************     FIN FILTRO BUSQUEDA     ************************************/
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Seccion Diez -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingTen" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
            <h4 class="panel-title">Cierre</h4>
          </a>
          <div id="collapseTen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra la descripción realizada al momento de cerrar y entregar la guardia
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Cierre Guardia</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  /**********************************     FILTRO DE BUSQUEDA      ********************************/
                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = "WHERE fecha_fin_g BETWEEN '$fecha_e' AND '$fecha_s' ";
                      $consulta_cierre = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");
                      while ($reg01 = pg_fetch_array($consulta_cierre)) {
                        if ($reg01) {
                          $id = $reg01['id'];
                          $filtro_cierre = "INNER JOIN personal ON guardias.usuario_salida_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo ";
                          $consulta_cierre1 = pg_query($dbconn, "SELECT guardias.id, guardias.fecha_fin_g, guardias.cierre_g, guardias.usuario_salida_id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_cierre ");

                          $reg_cierre = pg_fetch_array($consulta_cierre1);

                          $total_rows_cierre = pg_fetch_all($consulta_cierre1);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_cierre != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_cierre[1];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              echo "<td>" . strtoupper($reg_cierre[2]) . "</td>\n";
                              echo "<td><a href=ver_cierre_guardia.php?id=" . $reg_cierre['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td></tr>\n";
                            } while ($reg_cierre = pg_fetch_array($consulta_cierre1));
                            pg_free_result($consulta_cierre1);
                          } else {
                            // si no existen datos muestra mensaje
                            //echo "<tr><br/><td colspan='1'></td>";
                            //echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                            //echo "<td colspan='1'></td></tr>";
                          }
                        }
                      }
                    }
                  }
                  /********************************     FIN FILTRO BUSQUEDA     ************************************/
                  /********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
                  ?>

                  <!--
  *********************************** FIN TABLA Y CONSULTA EN FORMULARIO **************************
-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end of accordion -->