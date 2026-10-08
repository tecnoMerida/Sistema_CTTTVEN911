<?php
$result = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.numero_sol, solicitudes.tiempo_apertura_sol, solicitudes.fecha_sol, solicitudes.hora_sol, solicitudes.hora_cierre_sol, solicitudes.tiempo_respuesta_sol, solicitudes.sector_sol, solicitudes.punto_referencia_sol, solicitudes.parroquias_id, solicitudes.solicitante_id, solicitudes.guardias_id, solicitudes.estatus_solicitud_id, solicitudes.fecha_creacion_sol, solicitudes.tiempo_respuesta, 
                                                          solicitante.id, solicitante.p_nombre_sol, solicitante.p_apellido_sol, solicitante.telefono_celular_sol, solicitante.motivo_solicitud_id, solicitante.organismos_solicitud_id,
                                                          solicitud_atencion.id, solicitud_atencion.detalles_solicitud, solicitud_atencion.procedimiento_solicitud, solicitud_atencion.num_fallecidos, solicitud_atencion.num_lesionados, solicitud_atencion.num_heridos, solicitud_atencion.funcionario, solicitud_atencion.amigo171, solicitud_atencion.motos, solicitud_atencion.vehiculos,solicitud_atencion.solicitudes_id, solicitud_atencion.direccion_solicitud, solicitud_atencion.despachador_solicitud, solicitud_atencion.operador_solicitud, solicitud_atencion.num_motos, solicitud_atencion.num_vehiculos 
                                                          FROM public.solicitudes INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id INNER JOIN public.solicitud_atencion ON solicitud_atencion.solicitudes_id = solicitudes.id WHERE solicitudes.id = $solicitud");
if (!$result) {
    echo "Ocurrió un error.\n";
    exit;
}


while ($reg = pg_fetch_array($result)) {
?>
    <!--//  
                              //
                              //Seccion Primera "Solicitud"
                              //
                              //-->
    <div class="panel">
        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h4 class="panel-title">Solicitud</h4>
        </a>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <div class="field item form-group">
                    <!-- // Hora de apertura de la Solicitud // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="tiempo_apertura_sol">Tiempo de Apertura:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="tiempo_apertura_sol" id="tiempo_apertura_sol" placeholder="Tiempo de apertura" required value="<?php echo $reg['tiempo_apertura_sol']; ?>" title="Llene este campo con la hora de apertura de la solicitud" readonly />
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Fecha de la solicitud // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_sol">Fecha Solicitud:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="date" class="form-control" name="fecha_sol" id="fecha_sol" placeholder="Fecha solicitud" value="<?php echo $reg['fecha_sol']; ?>" title="Llene este campo con la fecha de solicitud" readonly />
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Hora de la Llamada de la Solicitud // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_sol">Hora de Solicitud:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_sol" id="hora_sol" placeholder="Ingrese hora solicitud" value="<?php echo $reg['hora_sol']; ?>" title="Llene este campo con la hora de llamada de solicitud" readonly />
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Hora de cierre de la Solicitud // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_cierre_sol">Hora de Cierre:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_cierre_sol" id="hora_cierre_sol" placeholder="Ingrese hora cierre" value="<?php echo $hora_sol = date('H:m:s'); ?>" title="Llene este campo con la hora de cierre de la solicitud" readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//
                                //
                                //Seccion Segunda "Solicitante"
                                //
                                //-->
    <div class="panel">
        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <h4 class="panel-title">Solicitante</h4>
        </a>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">

                <div class="field item form-group">
                    <!-- // número de telefono de quien realiza la llamada // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular_sol">Número de Teléfono:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" name="telefono_celular_sol" id="telefono_celular_sol" class="form-control" title="Llene este campo con el número de teléfono de quien realiza la llamada (agregando código de area o compañía de servicio)" placeholder="Número teléfono" value="<?php echo $reg['telefono_celular_sol']; ?>" readonly>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // nombre y apellido de la persona que llama // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre_sol">Nombre Solicitante:</label>
                    <div class="col-md-3 col-sm-3">
                        <input type="text" name="p_nombre_sol" id="p_nombre_sol" class="form-control" placeholder="Nombre solicitante" value="<?php echo $reg['p_nombre_sol']; ?>" title="Llene este campo con nombre y apellido de quien realiza la llamada" readonly />
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="text" id="p_apellido_sol" name="p_apellido_sol" class="form-control" placeholder="Apellido solicitante" value="<?php echo $reg['p_apellido_sol']; ?>" title="Llene este campo con nombre y apellido de quien realiza la llamada" readonly />
                    </div>
                </div>

                <?php /********* Seleccion del Organismo que Realiza la llamada de Solicitud ***********/
                // Consulta a la Base de Datos
                $org_solicitud = $reg[20];
                $result = pg_query($dbconn, "SELECT * FROM organismos_solicitud WHERE id = $org_solicitud");
                $registro = pg_fetch_array($result);
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismo_solicitante_id">Organismo:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="organismo_solicitante_id" id="organismo_solicitante_id" title="Seleccione si la llamada recibida es por uno de los organos de servicio o seguridad del estado" value="<?php echo $registro['id']; ?>" readonly>
                        <input class="form-control" name="" id="organismo_solicitante_id" title="Seleccione si la llamada recibida es por uno de los organos de servicio o seguridad del estado" value="<?php echo strtoupper($registro['nombre_org']); ?>" readonly>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Llamada recibida es de algun trabajor o amigo de la institucion 171/911 // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="amigo171">Funcionario</label>
                    <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">
                            <?php
                            $funcionario = $reg['funcionario'];
                            if ($funcionario != 'f') {
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si, llamada recibida por funcionario">
                  <input type="radio" name="funcionario" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No, llamada recibida de funcionario">
                  <input type="radio" name="funcionario" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
                            } else {
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si, llamada recibida por funcionario">
                  <input type="radio" name="funcionario" value="TRUE" class="flat" readonly > &nbsp; SI&nbsp;
                  </label>';
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No, llamada recibida de funcionario">
                  <input type="radio" name="funcionario" value="FALSE" class="flat" checked="checked" readonly > &nbsp; NO&nbsp;
                  </label>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Llamada recibida es de algun trabajor o amigo de la institucion 171/911 // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="amigo171">Amigo 911</label>
                    <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">

                            <?php
                            $amigo171 = $reg['amigo171'];
                            if ($amigo171 != 'f') {
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Llamada recibida o solicitud, Sí es amigo de la Institución 911">
                  <input type="radio" name="amigo171" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Llamada recibida o solicitud, No es amigo de la Institución 911">
                  <input type="radio" name="amigo171" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
                            } else {
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Llamada recibida o solicitud, Sí es amigo de la Institución 911">
                  <input type="radio" name="amigo171" value="TRUE" class="flat" readonly > &nbsp; SI&nbsp;
                  </label>';
                                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Llamada recibida o solicitud, No es amigo de la Institución 911">
                  <input type="radio" name="amigo171" value="FALSE" class="flat" checked readonly > &nbsp; NO&nbsp;
                  </label>';
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <?php

                /********* Seleccion del Motivo de la llamada de Solicitud ***********/
                // Consulta a la Base de Datos Tabla Motivos por Grupo
                $motivo_sol = $reg['motivo_solicitud_id'];
                $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud_grupo INNER JOIN motivo_solicitud ON motivo_solicitud.motivo_grupo_id = motivo_solicitud_grupo.id WHERE motivo_solicitud.id = $motivo_sol ") or die("Error L:05 ved");

                if (!$result44) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                $registro44 = pg_fetch_array($result44);
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="motivo_solicitud_id">Motivo:</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="motivo_solicitud_id" id="motivo_solicitud_id" title="Seleccione este campo con el motivo de la solicitud" value="<?php echo $registro44['id']; ?>" readonly>
                        <input class="form-control" name="" id="" title="Seleccione este campo con el motivo de la solicitud" value="<?php echo strtoupper($registro44['nombre_motivo_grupo'])." - ".strtoupper($registro44['nombre_motivo']); ?>" readonly>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--//
                                //
                                 //Sección Tercera "Detalles"
                                //
                            //-->
    <div class="panel">
        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h4 class="panel-title">Detalles</h4>
        </a>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">

                <div class="field item form-group">
                    <!-- //      direccion donde ocurre el evento   //    -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="direccion_solicitud">Dirección</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea type="text" name="direccion_solicitud" id="direccion_solicitud" class="resizable_textarea form-control" placeholder="Dirección del hecho de la solicitud" value="<?php echo $reg['direccion_solicitud']; ?>" title="Llene este campo con dirección exacta del lugar del evento" readonly><?php echo $reg['direccion_solicitud']; ?></textarea>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- //       detalles de la novedad           //  -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="detalles_solicitud">Detalles</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea type="text" name="detalles_solicitud" id="detalles_solicitud" class="resizable_textarea form-control" placeholder="Detalles de la solicitud" value="<?php echo $reg['detalles_solicitud']; ?>" title="Llene este campo con detalles del evento" readonly><?php echo $reg['detalles_solicitud']; ?></textarea>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- //     procedimiento realizado de la novedad   //  -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="procedimiento_solicitud">Procedimiento<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <textarea type="text" name="procedimiento_solicitud" id="procedimiento_solicitud" class="resizable_textarea form-control" placeholder="Procedimiento en el sitio de la solicitud" title="Llene este campo con el procedimiento realizado por los funcionarios en el lugar del evento" required></textarea>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- //    numeros de fallecidos en caso de haber    //   -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_fallecidos">Fallecidos<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="number" name="num_fallecidos" id="num_fallecidos" class="form-control" min="0" max="999" placeholder="Nº fallecidos" title="Llene este campo con el número de fallecidos en caso de existir" required />
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <STRONG><u>Nota:</u> Llenar el campo con ceros en caso de no existir</STRONG>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- //    numeros de lesionados en caso de haber    //   -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_lesionados">Lesionados<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="number" name="num_lesionados" id="num_lesionados" class="form-control" min="0" max="999" placeholder="Nº lesionados" title="Llene este campo con el numero de lesionados en caso de existir" required />
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <STRONG>fallecidos, lesionados o heridos</STRONG>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- //   numeros de heridos en caso de haber  //    -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_heridos">Heridos<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="number" name="num_heridos" id="num_heridos" class="form-control" min="0" max="999" placeholder="Nº heridos" title="Llene este campo con el numero de heridos en caso de existir" required />
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--//
                  //
                  //Sección Cuarta "Ubicación"
                  //
                  //-->

    <div class="panel">
        <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h4 class="panel-title">Ubicación</h4>
        </a>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">

                <?php
                // ******************************
                // MODIFICADO 05/10/2023
                // ******************************
                $sectores = $reg['sector_sol'];
//                $parroquia = $reg['parroquias_id'];
                // Creación y/o formación de la consulta.

               $result3 = pg_query($dbconn, "SELECT sectores.id, sectores.nombre_sector, parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.sectores INNER JOIN public.parroquias ON sectores.parroquias_id = parroquias.id INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id INNER JOIN public.estados ON municipios.estados_id = estados.id WHERE sectores.id = $sectores ");
//                $result3 = pg_query($dbconn, "SELECT parroquias.id, parroquias.nombre_parroquia, municipios.nombre_municipio, estados.nombre_estado FROM public.sectores INNER JOIN public.parroquias ON parroquias.id = sectores.parroquias_id INNER JOIN public.municipios ON municipios.id = parroquias.municipios_id INNER JOIN public.estados ON  estados.id = municipios.estados_id WHERE parroquias.id = $parroquia ");
                if (!$result3) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                $reg_ciudad = pg_fetch_array($result3);
                ?>
                <div class="field item form-group">
                    <!-- // Seleccion del Estado donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboEstado">Estado</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="estados" id="cboEstado" title="Selecciones Estado en que sucede el evento de solicitud" value="<?php echo $reg_ciudad[7] ?>" readonly>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboMunicipio">Municipio</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="municipios" id="cboMunicipio" title="Selecciones municipio en que sucede el evento de solicitud" value="<?php echo $reg_ciudad[5] ?>" readonly>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="parroquias_id" id="cboParroquia" title="Seleccione parroquia en que sucede el evento de solicitud" value="<?php echo $reg_ciudad[2] ?>" readonly>
                        <input class="form-control" name="" id="cboParroquia" title="Seleccione parroquia en que sucede el evento de solicitud" value="<?php echo $reg_ciudad[3] ?>" readonly>
                    </div>

                </div>

                <div class="field item form-group">

                    <!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="sector_sol" id="cboSectores" title="Seleccione sector en que sucede el evento de solicitud">
                        <option value="<?php echo $reg_ciudad[0] ?>" ><?php echo $reg_ciudad[1] ?></option>         
<!--                        <option value="<?php echo $reg['sector_sol'] ?>" ><?php echo $reg['sector_sol'] ?></option>-->
                                    </select>
                    </div>

                </div>

                <div class="field item form-group">

                <!-- // Seleccion del Sector donde ocurrio el evento //-->
                <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Cuadrante</label>
                <div class="col-md-3 col-sm-3">
                        <select class="form-control" name="" id="cboOrganismo" title="Este campo deberá de reflejar el nombre del organísmo" disabled>
                            <option value="0">-Nombre Organismo-</option>
                        </select>
                    </div>

                <div class="col-md-3 col-sm-3">
                        <select class="form-control" name="" id="cboCuadrantes" title="Este campo deberá de reflejar el número del cuadrante del sector" disabled>
                            <option value="0">-Número Cuadrante-</option>
                        </select>
                </div>

                </div>

                <div class="field item form-group">
                    <!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia_sol">Punto Referencia</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="varchar" name="punto_referencia_sol" id="punto_referencia_sol" class="form-control" placeholder="Lugar o sitio referencia" title="Llene este campo con lugar o sitio de referencia" value="<?php echo $reg['punto_referencia_sol'] ?>" readonly />
                    </div>

                    

                </div>

                <?php /********* Seleccion el estatus de la Solicitud ***********/
                // Consulta a la Base de Datos
                $estatus = $reg['estatus_solicitud_id'];
                $result5 = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id = $estatus");
                $registro5 = pg_fetch_array($result5);

                // Consulta a la Base de Datos
                $consulta_estatus = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id IN (1,2,3,4,8)");
                if (!$consulta_estatus) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <!-- // Seleccion del Estatus de la Solicitud //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="estatus_solicitud_id">Estatus<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="estatus_solicitud_id" id="estatus_solicitud_id" title="Llene este campo con la situación de la solicitud" required>
                            <option value="">-- Seleccione --</option>
                            <?php
                            while ($estatus5 = pg_fetch_array($consulta_estatus)) {
                            ?>
                                <option name="id" value="<?php echo $estatus5[0] ?> "><?php echo strtoupper($estatus5[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--//
                                //
                                 //Sección Quinta "Atención"
                                //
                            //-->
    <div class="panel">
        <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            <h4 class="panel-title">Atención</h4>
        </a>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">


            <?php
                $operador = $reg['operador_solicitud'];
                $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $operador");
                if (!$consulta_op) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                $reg_operador = pg_fetch_array($consulta_op);
                ?>
                <div class="field item form-group">
                    <!-- // nombre del operador que recibe la llamada // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador Solicitud</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" value="<?php echo $reg_operador['cedula']; ?>" readonly>
                        <input class="form-control" name="" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" value="<?php echo strtoupper($reg_operador['p_nombre']);
                                                                                                                                                                    echo " ";
                                                                                                                                                                    echo strtoupper($reg_operador['p_apellido']); ?>" readonly>
                    </div>
                </div>

            <?php
                            // Consulta al operador del despacho y cierre de la solicitud
                              $n_cedula = $cedula_personal;
                              $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $n_cedula");
                              $reg_operador = pg_fetch_array($consulta_op);
                              ?>

                            <div class="field item form-group">
                              <!-- // nombre del operador que despacha y da cierre a la solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="despachador_solicitud">Operador Despacho<span class="required">
                                     
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                  <input type="hidden" name="despachador_solicitud" id="despachador_solicitud" class="form-control" placeholder="Nombre del Operador" value="<?php echo $reg_operador['cedula']; ?>" minlength="2" maxlength="40" title="Llene este campo con nombre del Operador que recibe la solicitud" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" />
                                  <input type="varchar" name="" id="" class="form-control" placeholder="Nombre del Operador" value="<?php echo $reg_operador['p_nombre']; echo " "; echo $reg_operador['p_apellido']; ?>" minlength="2" maxlength="40" title="Llene este campo con nombre del Operador que recibe la solicitud" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" readonly />
                                </div>
                                </div>








                <?php
                $dato = $reg['hora_sol'];
                $hora = date('H', strtotime($dato));
                $minuto = date('m', strtotime($dato));

                $dato2 = date('H:m:s');
                $hora2 = date('H', strtotime($dato2));
                $minuto2 = date('m', strtotime($dato2));
                ?>
                <div class="field item form-group">
                    <!-- //  tiempo de respuesta de la Solicitud  // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="tiempo_respuesta_sol">Tiempo de Respuesta</label>
                    <div class="col-md-2 col-sm-2">
                        <b>hora</b>
                        <input type="number" class="form-control" name="tiempo_respuesta_sol" id="tiempo_respuesta_sol" value="<?php echo $hora_resp = $hora2 - $hora; ?>" title="Rellene este campo con Horas de tiempo de respuesta" readonly />
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <b>minuto</b>
                        <input type="number" class="form-control" name="tiempo_respuesta_sol1" id="tiempo_respuesta_sol1" value="<?php echo $minuto_resp = $minuto2 - $minuto; ?>" title="Rellene este campo con Minutos de tiempo de respuestas" readonly />
                    </div>
                </div>

                <?php /********* Seleccion del Organismo que Realiza la llamada de Solicitud ***********/
                // Consulta a la Base de Datos
                $result6 = pg_query($dbconn, "SELECT * FROM organismos_solicitud");
                if (!$result6) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <!-- //     procedimiento realizado de la novedad   //  -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="procedimiento_solicitud">Organismos<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select name="organismos_solicitud_id" id="organismos_solicitud_id" class="select2_multiple form-control" multiple="multiple" title="Organismo presente el el lugar del evento" required>
                            <option value="">--Seleccione--</option>
                            <?php
                            while ($registro6 = pg_fetch_array($result6)) {

                            ?>
                                <option name="id" value="<?php echo $registro6[0] ?> "><?php echo strtoupper($registro6[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <STRONG><b><u>Nota:</u> Presione CTRL + CLICK con el mouse, para seleccionar varios organismos</b></STRONG>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Motos en sitio de solicitud // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="motos">Motos<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione este campo Si hubo presencia de motos en el sitio">
                                <input type="radio" name="motos" value="1" class="flat" checked="checked" required> &nbsp; SI&nbsp;
                            </label>
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione este campo No hubo presencia de motos en el sitio">
                                <input type="radio" name="motos" value="0" class="flat" required> &nbsp; NO&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <input type="number" name="num_motos" class="form-control" placeholder="Nº Motos" min="0" max="999" step="1" data-validate-minmax="0,999" title="Llene este campo con el número de motos en el sitio en caso de existir" required>
                    </div>
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-3 col-sm-3">
                        <STRONG><b><u>Nota:</u> Llene los campo de Motos y Vehículos con cero en caso de no existir</b></STRONG>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Vehiculos en sitio de solicitud // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="vehiculos">Vehículos<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione este campo Si hubo presencia de Vehículos en el sitio">
                                <input type="radio" name="vehiculos" value="1" class="flat" checked="checked" required> &nbsp; SI&nbsp;
                            </label>
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione este campo No hubo presencia de Vehículos en el sitio">
                                <input type="radio" name="vehiculos" value="0" class="flat" required> &nbsp; NO&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <input type="number" name="num_vehiculos" class="form-control" placeholder="Nº Vehículos" min="0" max="999" data-validate-minmax="0,999" title="Llene este campo con el número de vehículos en el sitio en caso de existir" required>
                    </div>
                </div>

                <div>
                    <!-- //     Registro de grupo de guardia      //     -->
                    <input type="hidden" name="guardias_id" id="guardias_id" value="<?php echo $grupos01; ?>" required />
                </div>
                <div>
                    <!-- //     Registro de usuario de sistema      //     -->
                    <input type="hidden" name="cedula_personal" id="cedula_personal" value="<?php echo $cedula_personal; ?>" required />
                </div>
                <div>
                    <!-- //     Registro de fecha tomada por en sistema      //     -->
                    <input type="hidden" name="fecha_creacion_sol" id="fecha_creacion_sol" value="<?php echo $reg['fecha_creacion_sol']; ?>" required />
                </div>
                <div>
                    <!-- //     Registro de id de solicitudes     //     -->
                    <input type="hidden" name="solicitudes" id="solicitudes" value="<?php echo $reg[0]; ?>" required />
                </div>
                <div>
                    <!-- //     Registro de id solicitante     //     -->
                    <input type="hidden" name="solicitante" id="solicitante" value="<?php echo $reg[15]; ?>" required />
                </div>
                <div>
                    <!-- //     Registro id de solicitud_atencion      //     -->
                    <input type="hidden" name="solicitud_atencion" id="solicitud_atencion" value="<?php echo $reg[21]; ?>" required />
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                        <button type='submit' class="btn btn-primary">Guardar</button>
                        <button type='reset' class="btn btn-success">Limpiar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>