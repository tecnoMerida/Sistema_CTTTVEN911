<!-- ******************************** Tabla de Consulta en Acordeon ********************************* -->


<div class="col-md-12 col-sm-12  ">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Despachador </h2>
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
                  /***************
                   * 
                   * PENDIENTE REALIZAR CAMBIOS PARA CONTROL DE BIENES DE OPERADORES
                   * 
                   * SELECT personal_datos.id, personal_datos.personal_cedula_op1, personal_datos.personal_cedula_op2, personal_datos.personal_cedula_op3, personal_datos.personal_cedula_op4, personal_datos.personal_cedula_op5, personal_datos.personal_cedula_op6, personal_grupos_guardia.grupos_guardia_id, personal_grupos_guardia.fecha_asig FROM public.personal_datos 
INNER JOIN personal_grupos_guardia ON personal_datos.id=personal_grupos_guardia.id
INNER JOIN bitacora ON personal_grupos_guardia.fecha_asig=bitacora.fecha_operacion
WHERE personal_datos.id=(SELECT MAX(id) FROM  public.personal_datos);

                   **********************/

                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = " ";
                      $consulta = pg_query($dbconn, "SELECT * FROM public.guardias WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s' ");

                      while ($reg01 = pg_fetch_array($consulta)) {
                        if ($reg01) {
                          $id = $reg01['id'];
                          $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                          $consulta_apt = pg_query($dbconn, "SELECT guardias.id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");

                          while ($reg_apt = pg_fetch_array($consulta_apt)) {
                            if ($reg_apt) {
                              $id = $reg_apt[1];
                              $filtro = "WHERE id = '$id' ";
                              $consulta_bienes = pg_query($dbconn, "SELECT * FROM public.control_bienes $filtro ");
                              $reg_pag = pg_fetch_array($consulta_bienes);

                              $total_rows_pag = pg_fetch_all($consulta_bienes);
                              /*
                            <!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
                            */
                              if ($total_rows_pag != 0) {

                                //impresion de los datos.
                                do {
                                  // MUESTRA LOS VALORES DE LA CONSULTAS
                                  $dato = $reg_pag['fecha_creacion'];
                                  $fecha = date('Y-m-d', strtotime($dato));
                                  $hora = date('H:i:s', strtotime($dato));
                                  echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                                  echo "<td>" . $hora . "</td>\n";
                                  echo "<td>";


                                  $cadena = $reg_pag['materiales_recibe'];
                                  $array = explode(",", $cadena);

                                  foreach ($array as $id) {
                                    $formato1 = $formato1 . ' ' . $id;

                                    // Cunsulta el ID de los Bienes registrados
                                    $consulta1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                                    $reg1 = pg_fetch_assoc($consulta1);

                                    $total_rows1 = pg_num_rows($consulta1);

                                    if ($total_rows1 != 0) {

                                      //impresion de los datos.
                                      do {

                                        echo "" . strtoupper($reg1['nombre_b']) . ", ";
                                      } while ($reg1 = pg_fetch_array($consulta1));
                                      pg_free_result($consulta1);
                                    }
                                  }

                                  echo "</td>\n";
                                  echo "<td><a href=ver_controlBienes_entrada.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td></tr>\n";
                                } while ($reg_pag = pg_fetch_array($consulta_bienes));
                                pg_free_result($consulta_bienes);
                              } else {
                                // si no existen datos muestra mensaje
                                //echo "<tr><br/><td colspan='1'></td>";
                                //echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                                //echo "<td colspan='1'></td></tr>";
                              }
                            }
                          }
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
        <!-- Seccion Cinco -->

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
                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
                      $consulta_solic = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");


                      $total_rows_pag = pg_fetch_all($consulta_solic);
                      if ($total_rows_pag != 0) {


$filtro = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
WHERE solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 07:00:00' AND '$fecha_s 06:59:59'";
$consulta_obs1 = pg_query($dbconn,"SELECT solicitudes.id, solicitudes.guardias_id, solicitudes.fecha_sol, solicitudes.hora_sol, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, personal.p_nombre, personal.p_apellido FROM solicitudes $filtro ");

while ($reg_solic = pg_fetch_array($consulta_obs1)) {

                      $total_rows_pag = pg_fetch_all($consulta_obs1);


/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag != 0) {

                            //impresion de los datos.
                            do {



                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_solic[4];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr class='". $clase ."' align='center' ><td>" . $reg_solic[0] . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[5]) . "</td>\n";
                              
                              echo "<td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[6]) . " " . strtoupper($reg_solic[7]) . "</td>\n";
                              echo "<td><a href=ver_solicitudes.php?id=" . $reg_solic[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td></tr>\n";
                            } while ($reg_solic = pg_fetch_array($consulta_solicitudes));
                            pg_free_result($consulta_solicitudes);

                          }

                          
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
                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = "WHERE fecha_fin_g BETWEEN '$fecha_e' AND '$fecha_s' ";
                      $consulta = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");

                      while ($reg01 = pg_fetch_array($consulta)) {
                        if ($reg01) {
                          $id = $reg01['id'];
                          $filtro_bienes1 = "INNER JOIN personal ON guardias.usuario_salida_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo ";
                          $consulta_bienes1 = pg_query($dbconn, "SELECT guardias.id, guardias.fecha_fin_g, guardias.usuario_salida_id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_bienes1 ");

                          while ($reg_guardia = pg_fetch_array($consulta_bienes1)) {
                            if ($reg_guardia) {
                              $id = $reg_guardia[3];
                              $filtro2 = "WHERE id = '$id' ";
                              $consulta_bienes = pg_query($dbconn, "SELECT * FROM public.control_bienes $filtro2 ");
                              $reg_pag = pg_fetch_array($consulta_bienes);

                              $total_rows_pag = pg_fetch_all($consulta_bienes);
                              /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                              if ($total_rows_pag != 0) {

                                //impresion de los datos.
                                do {
                                  // MUESTRA LOS VALORES DE LA CONSULTAS
                                  $dato = $reg_pag['fecha_creacion'];
                                  $fecha = date('Y-m-d', strtotime($dato));
                                  $hora = date('H:i:s', strtotime($dato));
                                  echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                                  echo "<td>" . $hora . "</td>\n";
                                  echo "<td>";


                                  $cadena = $reg_pag['materiales_entrega'];
                                  $array = explode(",", $cadena);

                                  foreach ($array as $id) {
                                    $formato1 = $formato1 . ' ' . $id;

                                    // Cunsulta el ID de los Bienes registrados
                                    $consulta1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                                    $reg1 = pg_fetch_assoc($consulta1);

                                    $total_rows1 = pg_num_rows($consulta1);

                                    if ($total_rows1 != 0) {

                                      //impresion de los datos.
                                      do {

                                        echo "" . strtoupper($reg1['nombre_b']) . ", ";
                                      } while ($reg1 = pg_fetch_array($consulta1));
                                      pg_free_result($consulta1);
                                    }
                                  }

                                  echo "</td>\n";
                                  echo "<td><a href=ver_controlBienes_salida.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a></td></tr>\n";
                                } while ($reg_pag = pg_fetch_array($consulta_bienes));
                                pg_free_result($consulta_bienes);
                              } else {
                                // si no existen datos muestra mensaje
                                //echo "<tr><br/><td colspan='1'></td>";
                                //echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                                //echo "<td colspan='1'></td></tr>";
                              }
                            }
                          }
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


      </div>
      <!-- end of accordion -->