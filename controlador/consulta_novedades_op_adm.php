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
                                                $id = $reg01['id'] ?? 0;
                                                $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
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
                                                                    echo "<td><a href=ver_controlBienes_entrada.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                                                                    echo "<a href=PDF/imprime_controlBienes_entrada.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
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
                                Esta sección muestra las solicitudes registradas y las obtenidas del "Sistema 911"
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
                                    if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                                        $fecha_e = $fecha_entrada;
                                        $fecha_s = $fecha_salida;
                                        $filtro = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                                                    INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                                                    INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                                                    INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                                                    WHERE solicitudes.fecha_creacion_sol BETWEEN '$fecha_e 07:00:00' AND '$fecha_s 06:59:59'";
                                        $consulta_obs1 = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.guardias_id, solicitudes.fecha_sol, solicitudes.hora_sol, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, personal.p_nombre, personal.p_apellido FROM solicitudes $filtro ");

                                        if ($consulta_obs1) {
                                            while ($reg_solic = pg_fetch_array($consulta_obs1)) {
                                                $dato = $reg_solic[4] ?? '';
                                                $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                                                $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                                                echo "<tr align='center' ><td>" . $reg_solic[0] . "</td>\n";
                                                echo "<td>" . strtoupper($reg_solic[5] ?? '') . "</td>\n";
                                                echo "<td>" . $fecha . "</td>\n";
                                                echo "<td>" . $hora . "</td>\n";
                                                echo "<td>" . strtoupper($reg_solic[6] ?? '') . " " . strtoupper($reg_solic[7] ?? '') . "</td>\n";
                                                echo "<td><a href=ver_solicitudes.php?id=" . $reg_solic[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                                                echo "<a href=PDF/imprime_solicitudes.php?id=" . $reg_solic[0] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Seccion Siete -->
                <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <h4 class="panel-title">Observaciones Entrada</h4>
                    </a>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                                Esta sección muestra las novedades y observaciones registradas al momento de recibir la guardia
                            </p>
                            <table class="table table-bordered">
                                <thead align="center">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Observación</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                                        $fecha_e = $fecha_entrada;
                                        $fecha_s = $fecha_salida;
                                        $organismo = $organismo_id;
                                        $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s' ";
                                        $consulta_obs = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1 ");

                                        if ($consulta_obs) {
                                            while ($reg_01 = pg_fetch_array($consulta_obs)) {
                                                $id = $reg_01['id'] ?? 0;
                                                $filtro_obs2 = "WHERE guardias_id = $id AND organismos_id = $organismo ";
                                                $consulta_obs2 = pg_query($dbconn, "SELECT * FROM public.observaciones $filtro_obs2 ");

                                                if ($consulta_obs2) {
                                                    while ($reg_obs = pg_fetch_array($consulta_obs2)) {
                                                        $dato = $reg_obs[5] ?? '';
                                                        $fecha = !empty($dato) ? date('Y-m-d', strtotime($dato)) : '';
                                                        $hora = !empty($dato) ? date('H:i:s', strtotime($dato)) : '';
                                                        echo "<tr align='center' ><td>" . $fecha . "</td>\n";
                                                        echo "<td>" . $hora . "</td>\n";
                                                        if (!empty($reg_obs[1])) {
                                                            echo "<td>" . strtoupper($reg_obs[1]) . "</td>\n";
                                                        } elseif (!empty($reg_obs[2])) {
                                                            echo "<td>" . strtoupper($reg_obs[2]) . "</td>\n";
                                                        } elseif (!empty($reg_obs[3])) {
                                                            echo "<td>" . strtoupper($reg_obs[3]) . "</td>\n";
                                                        } else {
                                                            echo "<td>" . strtoupper($reg_obs[4] ?? '') . "</td>\n";
                                                        }
                                                        echo "<td><a href=ver_observaciones_guardia.php?id=" . $reg_obs[0] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                                                        echo "<a href=PDF/imprime_observaciones_guardia.php?id=" . $reg_obs[0] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Seccion Ocho -->
                <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="headingEight" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <h4 class="panel-title">Control Bienes Salida</h4>
                    </a>
                    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                        <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                                Esta sección muestra la verificación de bienes al momento de la entrega de la guardia
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
                                    if (!empty($organismo_id) && !empty($fecha_entrada) && !empty($fecha_salida)) {
                                        $fecha_e = $fecha_entrada;
                                        $fecha_s = $fecha_salida;
                                        $organismo = $organismo_id;
                                        $filtro1 = "WHERE fecha_fin_g BETWEEN '$fecha_e' AND '$fecha_s' ";
                                        $consulta = pg_query($dbconn, "SELECT * FROM public.guardias $filtro1");

                                        if ($consulta) {
                                            while ($reg01 = pg_fetch_array($consulta)) {
                                                $id = $reg01['id'] ?? 0;
                                                $filtro_bienes1 = "INNER JOIN personal ON guardias.usuario_salida_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo ";
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
                                                                    echo "<td><a href=ver_controlBienes_salida.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
                                                                    echo "<a href=PDF/imprime_controlBienes_salida.php?id=" . $reg_pag['id'] . " target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end of accordion -->
        </div>
    </div>
</div>