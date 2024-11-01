<!-- ******************************** Tabla de Consulta en Acordeon ********************************* -->


<div class="col-md-12 col-sm-12  ">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-align-left"></i> Supervisores </h2>
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
          <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h4 class="panel-title">Entrada</h4>
          </a>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
            <p class="text-muted font-13 m-b-30">
            Esta sección muestra la fecha, hora de recepción de guardia y entrada al sistema
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Grupo</th>
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
                      $filtro1 = " ";
                      $consulta_entrada = pg_query($dbconn, "SELECT id, grupos_guardia_id, fecha_asig FROM public.personal_grupos_guardia WHERE fecha_asig BETWEEN '$fecha_e' AND '$fecha_s' ");

                      $reg_01 = pg_fetch_assoc($consulta_entrada);
                      $total_rows_pag = pg_fetch_all($consulta_entrada);

                      if ($total_rows_pag != 0) {

                        do {
                          //                while($reg_01=pg_fetch_array($consulta_entrada))
                          //                          { 
                          //                  if ($reg_01){

                          // MUESTRA LOS VALORES DE LA CONSULTAS
                          $dato = $reg_01['fecha_asig'];
                          $fecha = date('Y-m-d', strtotime($dato));
                          $hora = date('H:i:s', strtotime($dato));

                          echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                          echo "<td>" . $hora . "</td>\n";
                          echo "<td>" . $reg_01['grupos_guardia_id'] . "</td>\n";
                          echo "<td><a href=ver_entrada_guardia.php?id=" . $reg_01['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                          echo "<a href=PDF/imprime_guardia_entrada.php?id=" . $reg_01['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                        } while ($reg_01 = pg_fetch_array($consulta_entrada));
                        pg_free_result($consulta_entrada);
                      } else {
                        // si no existen datos muestra mensaje
                      //  echo "<tr><br/><td colspan='1'></td>";
                      //  echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                      //  echo "<td colspan='1'></td></tr>";
                      }
                    }
                    //             }
                    //       }
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Seccion Dos -->
        <div class="panel">
          <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <h4 class="panel-title">Personal</h4>
          </a>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra el personal de guardia
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Grupo</th>
                    <th>Supervisor</th>
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
                      $filtro1 = " ";
                      $consulta = pg_query($dbconn, "SELECT id, grupos_guardia_id, fecha_asig FROM public.personal_grupos_guardia WHERE fecha_asig BETWEEN '$fecha_e' AND '$fecha_s' ");

                      while ($reg01 = pg_fetch_array($consulta)) {
                        if ($reg01) {

                          $id = $reg01['id'];
                          $filtro = "WHERE personal_grupos_guardia_id = '$id' ";
                          $consulta_personal = pg_query($dbconn, "SELECT * FROM public.personal_datos $filtro ");
                          $reg_pag = pg_fetch_array($consulta_personal);

                          $total_rows_pag = pg_fetch_all($consulta_personal);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $id = $reg_pag['personal_grupos_guardia_id'];
                              // consulta Tabla de Organimos
                              $consulta_org = pg_query($dbconn, "SELECT grupos_guardia_id, CAST(fecha_asig AS DATE)  FROM public.personal_grupos_guardia WHERE id = '$id' ORDER BY id ASC");

                              $reg_f = pg_fetch_array($consulta_org);
                              echo "<tr align='center' ><td>" . $reg_f['fecha_asig'] . "</td>\n";
                              echo "<td>" . $reg_f['grupos_guardia_id'] . "</td>\n";
                              $p_cedula_sup = $reg_pag['personal_cedula_sup'];
                              $p_cedula_aux = $reg_pag['personal_cedula_aux'];
                              // consulta Tabla de Personal
                              $consulta_personal2 = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $p_cedula_sup OR cedula = $p_cedula_aux ");
                              $reg_pers = pg_fetch_array($consulta_personal2);

                              echo "<td>" . strtoupper($reg_pers['p_nombre']) . " " . strtoupper($reg_pers['p_apellido']) . "</td>\n";
                              echo "<td><a href=ver_personal_guardia.php?id=" . $reg01['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_personal_guardia.php?id=" . $reg01['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                            } while ($reg_pag = pg_fetch_array($consulta_personal));
                            pg_free_result($consulta_personal);
                          } else {
                            // si no existen datos muestra mensaje
                         //   echo "<tr><br/><td colspan='1'></td>";
                         //   echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                         //   echo "<td colspan='1'></td></tr>";
                          }
                          //                    }
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
        <!-- Seccion Tres -->
        <div class="panel">
          <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h4 class="panel-title">Observaciones Personal</h4>
          </a>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra observaciones al personal de guardia
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>A quien</th>
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
                      $consulta = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1 ");

                      while ($reg01 = pg_fetch_assoc($consulta)) {
                        if ($reg01) {
                          $id = $reg01['id'];

                          $consulta_personal = pg_query($dbconn, "SELECT personal_guardias.id, personal_guardias.fecha_ingreso_g, personal_guardias.fecha_salida_g, personal_guardias.descripcion, personal_guardias.observaciones_entrada_id, personal_guardias.observaciones_salida_id, personal_guardias.personal_cedula, personal_guardias.guardias_id, personal.cedula, personal.p_nombre, personal.p_apellido, personal.organismos_id FROM public.personal_guardias 
                                                                INNER JOIN personal ON personal_guardias.personal_cedula = personal.cedula 
                                                                WHERE fecha_ingreso_g BETWEEN '$fecha_e' AND '$fecha_s' OR (guardias_id = $id OR fecha_salida_g BETWEEN '$fecha_e' AND '$fecha_s')
                                                                ORDER BY personal_guardias.id ASC ");

                          $reg_pag = pg_fetch_array($consulta_personal);

                          $total_rows_pag = pg_fetch_all($consulta_personal);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_pag[1];
                              if ($dato != 0) {
                                $fecha = date('Y-m-d', strtotime($dato));
                                $hora = date('H:i:s', strtotime($dato));
                              } else {
                                $dato = $reg_pag[2];
                                $fecha = date('Y-m-d', strtotime($dato));
                                $hora = date('H:i:s', strtotime($dato));
                              }
                              echo "<tr align='center' ><td>" . $reg_pag[0] . "</td>\n";
                              echo "<td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              //              $cedula=$reg_pag['personal_cedula'];

                              echo "<td>" . strtoupper($reg_pag[9]) . " " . strtoupper($reg_pag[10]) . "</td>\n";
                              echo "<td><a href=ver_observaciones_personal.php?id=" . $reg_pag[0] . "&fecha=" . $reg_pag[1] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_observaciones_personal.php?id=" . $reg_pag[0] . "&fecha=" . $reg_pag[1] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                            } while ($reg_pag = pg_fetch_array($consulta_personal));
                            pg_free_result($consulta_personal);
                          } else {
                            // si no existen datos muestra mensaje
                          //  echo "<tr><br/><td colspan='1'></td>";
                          //  echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                          //  echo "<td colspan='1'></td></tr>";
                          }


                        } else {
                          echo "Ocurrió un error en consulta.\n";
                          exit;
                        }
                        pg_free_result($consulta);
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
        <!-- Seccion Cuatro -->
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
                                  echo "<td><a href=ver_controlBienes_entrada.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                                  echo "<a href=PDF/imprime_controlBienes_entrada.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                                } while ($reg_pag = pg_fetch_array($consulta_bienes));
                                pg_free_result($consulta_bienes);
                              } else {
                                // si no existen datos muestra mensaje
                              //  echo "<tr><br/><td colspan='1'></td>";
                              //  echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                              //  echo "<td colspan='1'></td></tr>";
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
                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
                      $consulta_apertura = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1 ");

                      while ($reg_01 = pg_fetch_array($consulta_apertura)) {
                        if ($reg_01) {
                          $id = $reg_01['id'];
                          $usuario1 = $reg_01['usuario_entrada_id'];
                          $usuario2 = $reg_01['usuario_salida_id'];
                          $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                          $consulta_apt = pg_query($dbconn, "SELECT guardias.id, guardias.fecha_inicio_g, guardias.apertura_g, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");
                          $reg_apt = pg_fetch_array($consulta_apt);


                          $total_rows_apertura = pg_fetch_all($consulta_apt);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_apertura != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_apt[1];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              echo "<td>" . strtoupper($reg_apt[2]) . "</td>\n";
                              echo "<td><a href=ver_apertura_guardia.php?id=" . $reg_apt[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_apertura_guardia.php?id=" . $reg_apt[0] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                            } while ($reg_apt = pg_fetch_array($consulta_apt));
                            pg_free_result($consulta_apt);
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
                  if ($organismo_id == '' and $fecha_entrada == '' and $fecha_salida == '') {
                  } else {
                    if ($fecha_entrada != '' and $fecha_salida != '') {
                      $fecha_e = $fecha_entrada;
                      $fecha_s = $fecha_salida;
                      $organismo = $organismo_id;
                      $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
                      $consulta_solic = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");

                      $reg_01 = pg_fetch_array($consulta_solic);
                      $total_rows_pag = pg_fetch_all($consulta_solic);
                      if ($total_rows_pag != 0) {
                        do {

                        $id = $reg_01['id'];
                        $usuario1 = $reg_01['usuario_entrada_id'];
                        $usuario2 = $reg_01['usuario_salida_id'];
                        $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo ORDER BY guardias.id ASC";
                        $consulta_obs1 = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_inicio_g, guardias.usuario_salida_id, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");
                       $reg_obs = pg_fetch_array($consulta_obs1);

                      $total_rows_pag = pg_fetch_all($consulta_obs1);
                      if( $total_rows_pag != 0){

                        //impresion de los datos.
                           do
                            {
                          $guardia_id = $reg_obs[0];
                          $filtro_solic = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                                INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                                INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                                INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                                WHERE solicitudes.guardias_id = $guardia_id";
                          $consulta_solicitudes = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.guardias_id, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, personal.p_nombre, personal.p_apellido FROM solicitudes $filtro_solic");
                          $reg_solic = pg_fetch_array($consulta_solicitudes);

                          $total_rows_pag = pg_fetch_all($consulta_solicitudes);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag != 0) {

                            //impresion de los datos.
                            do {

                                                                  // COMPARACION DE VALORES PARA INDICAR COLORES
                                    // MODIFICADO 18-06/2024 7:00:00 am

                                    $fecha_y_hora_sol = date($reg_solic[1]);
                                    $fecha_hora_sol = date($reg_solic[2]);

                                    // OPERACION DE RESTA DE HORAS
                                    $horaInicio_sol = $fecha_y_hora_sol;
                                    $horaTermino_sol = $fecha_hora_sol;
                                    $datex7_sol = new DateTime($horaTermino_sol);
                                    $datex77_sol = new DateTime($horaInicio_sol);
                                    $horax7_sol = date_diff($datex7_sol, $datex77_sol);

                                    $hx7x7_sol = $horax7_sol->format('%H:%I:%s');
                                    //echo $hx7x7_sol;

                                    // VALORES A COMPARAR
                                    $marca_tiempo1 = mktime(0, 1, 0, 5, 24,2024);
                                    $time1 = date("H:i:s", $marca_tiempo1);


                                    $marca_tiempo2 = mktime(0, 2, 0, 5, 24,2024);
                                    $time2 = date("H:i:s", $marca_tiempo2);


                                    $marca_tiempo3 = mktime(0, 4, 0, 5, 24,2024);
                                    $time3 = date("H:i:s", $marca_tiempo3);


                                    if ($hx7x7_sol <= $time1){
                                        $clase = 'cero0';
                                    }elseif ($hx7x7_sol <= $time2){
                                        $clase = 'uno1';
                                    }else{
                                        $clase = 'dos2';
                                    }

                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_solic[4];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr class='". $clase ."' align='center' ><td>" . $reg_solic[0] . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[5]) . "</td>\n";
                              echo "<td>" . $fecha . "</td>\n";
                              echo "<td>" . $hora . "</td>\n";
                              echo "<td>" . strtoupper($reg_solic[6]) . " " . strtoupper($reg_solic[7]) . "</td>\n";
                              echo "<td><a href=ver_solicitudes.php?id=" . $reg_solic[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_solicitudes.php?id=" . $reg_solic[0] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                            } while ($reg_solic = pg_fetch_array($consulta_solicitudes));
                            pg_free_result($consulta_solicitudes);
                            
/*                      }else { 
                      // si no existen datos muestra mensaje
                      echo "<tr><br/><td colspan='1'></td>";
                      echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                      echo "<td colspan='1'></td></tr>"; 
                      }

                          }while ($reg_obs = pg_fetch_array($consulta_obs1));
                          pg_free_result($consulta_obs1);*/
                        }

                          /*
                    * Consulta a Tablas de Solicitudes Traidas del "Sistema de Emergencias 911"
                    */
                          $guardia_id = $reg_01[0];
                          $filtro_solic1 = "WHERE guardias_id = $guardia_id";
                          $consulta_solicitudes1 = pg_query("SELECT numero_solicitud, fecha_solicitud, hora_solicitud, motivo_solicitud, despachador, guardias_id FROM public.reporte_solicitudes  $filtro_solic1");
                          $reg_solic1 = pg_fetch_array($consulta_solicitudes1);

                          $total_rows_pag1 = pg_fetch_all($consulta_solicitudes1);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_pag1 != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg_solic1[1];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr align='center' ><td>" . $reg_solic1[0] . "</td>\n";
                               // Consulta a la Base de Datos Tabla Motivos por Grupo
                               $motivo_sol = $reg_solic1[3];
                               $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud_grupo INNER JOIN motivo_solicitud ON motivo_solicitud.motivo_grupo_id = motivo_solicitud_grupo.id WHERE motivo_solicitud.id = $motivo_sol ") or die("Error L:05 ved");
                               $registro44 = pg_fetch_array($result44);
                               echo "<td>" . strtoupper($registro44['nombre_motivo_grupo']) . ' - ' . strtoupper($registro44['nombre_motivo']) . "</td>\n";
                              echo "<td>" . $fecha . "</td>\n";
                              echo "<td>" . $reg_solic1[2] . "</td>\n";
                              $cedula_desp = $reg_solic1[4];
                              $consulta_personal1 = pg_query("SELECT cedula, p_nombre, p_apellido FROM public.personal WHERE cedula = $cedula_desp");
                              $reg_perso = pg_fetch_array($consulta_personal1);

                              echo "<td>" . strtoupper($reg_perso[1]) . " " . strtoupper($reg_perso[2]) . "</td>\n";
                              echo "<td><a href=ver_solicitudes.php?sol=" . $reg_solic1[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_solicitudes.php?sol=" . $reg_solic1[0] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                            } while ($reg_solic1 = pg_fetch_array($consulta_solicitudes1));
                            pg_free_result($consulta_solicitudes1);
                          } else {
                            // si no existen datos muestra mensaje
                            //echo "<tr><br/><td colspan='1'></td>";
                            //echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                            //echo "<td colspan='1'></td></tr>";
                          }

                        }while ($reg_obs = pg_fetch_array($consulta_obs1));
                        pg_free_result($consulta_obs1);
                      }

                        } while ($reg_01 = pg_fetch_array($consulta_solic));
                        pg_free_result($consulta_solic);
                      } else {
                        echo "Ocurrió un error en consulta.\n";
                        exit;
                      }

                      //                        pg_free_result($consulta_obs);
                      //                      }

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
                              echo "<td><a href=ver_observaciones_guardia.php?id=" . $reg_obs[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_observaciones_guardia.php?id=" . $reg_obs[0] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
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
        <!-- Seccion Ocho -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingEight" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
            <h4 class="panel-title">Estadísticas</h4>
          </a>
          <div id="collapseEight" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra las estadísticas diarias
              </p>
              <table class="table table-bordered">
                <thead>
                  <tr align="center">
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Relevante</th>
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
                      $consulta_est = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1 ");

                      while ($reg01_est = pg_fetch_array($consulta_est)) {
                        if ($reg01_est) {
                          $id = $reg01_est['id'];
                          /*                        $filtro_estadist1 = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                        $consulta_estad1 = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_inicio_g, guardias.fecha_fin_g, guardias.apertura_g, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_estadist1 ");

                while($reg_estad=pg_fetch_array($consulta_estad1))
                          { 
                  if ($reg_estad){

                        $id = $reg_estad[0];
                        $fecha1 = $reg_estad[1];*/
                          $filtro_estadisticas = "WHERE guardia_id = '$id' ";
                          $consulta_estadisticas = pg_query($dbconn, "SELECT * FROM public.estadisticas_solicitud $filtro_estadisticas ");
                          $reg_estd = pg_fetch_array($consulta_estadisticas);

                          $total_rows_est = pg_fetch_all($consulta_estadisticas);
                          /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                          if ($total_rows_est != 0) {

                            //impresion de los datos.
                            do {
                              // MUESTRA LOS VALORES DE LA CONSULTAS
                              $dato = $reg01_est['fecha_inicio_g'];
                              $fecha = date('Y-m-d', strtotime($dato));
                              $hora = date('H:i:s', strtotime($dato));
                              echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                              echo "<td>" . $reg_estd['total_solici'] . "</td>\n";
                              echo "<td>" . $reg_estd['mayor_rele'] . "</td>\n";
                              echo "<td><a href=ver_estadisticas.php?id=" . $reg_estd['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_estadisticas.php?id=" . $reg_estd['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                            } while ($reg_estd = pg_fetch_array($consulta_estadisticas));
                            pg_free_result($consulta_estadisticas);
                          } else {
                            // si no existen datos muestra mensaje
                            //echo "<tr><br/><td colspan='1'></td>";
                            //echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                            //echo "<td colspan='1'></td></tr>";
                          }
                          //                      }
                          //                    }
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
                                  echo "<td><a href=ver_controlBienes_salida.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                                  echo "<a href=PDF/imprime_controlBienes_salida.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
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
                              echo "<td><a href=ver_cierre_guardia.php?id=" . $reg_cierre['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                              echo "<a href=PDF/imprime_cierre_guardia.php?id=" . $reg_cierre['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
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

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Seccion Once -->
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingEleven" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
            <h4 class="panel-title">Salida</h4>
          </a>
          <div id="collapseEleven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEleven">
            <div class="panel-body">
              <p class="text-muted font-13 m-b-30">
                Esta sección muestra la fecha, hora de entrega de guardia y salida del sistema
              </p>
              <table class="table table-bordered">
                <thead align="center">
                  <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Grupo</th>
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
                      $filtro1 = "WHERE fecha_fin BETWEEN '$fecha_e' AND '$fecha_s'";
                      $consulta_salida = pg_query($dbconn, "SELECT * FROM public.personal_grupos_guardia $filtro1");
                      $reg_salida = pg_fetch_array($consulta_salida);

                      $total_row_salida = pg_fetch_all($consulta_salida);
                      /*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                      if ($total_row_salida != 0) {

                        //impresion de los datos.
                        do {
                          // MUESTRA LOS VALORES DE LA CONSULTAS
                          $dato = $reg_salida['fecha_fin'];
                          $fecha = date('Y-m-d', strtotime($dato));
                          $hora = date('H:i:s', strtotime($dato));
                          echo "<tr align='center'><td>" . $fecha . "</td>\n";
                          echo "<td>" . $hora . "</td>\n";
                          echo "<td>" . $reg_salida['grupos_guardia_id'] . "</td>\n";
                          echo "<td><a href=ver_salida_guardia.php?id=" . $reg_salida['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                          echo "<a href=PDF/imprime_guardia_salida.php?id=" . $reg_salida['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                        } while ($reg_salida = pg_fetch_array($consulta_salida));
                        pg_free_result($consulta_salida);
                      } else {
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>";
                      }
                    }
                  }
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