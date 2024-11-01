<?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////

if ($num != 0){

      $result = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.numero_sol, solicitudes.tiempo_apertura_sol, solicitudes.fecha_sol, solicitudes.hora_sol, solicitudes.hora_cierre_sol, solicitudes.tiempo_respuesta_sol, solicitudes.sector_sol, solicitudes.punto_referencia_sol, solicitudes.parroquias_id, solicitudes.solicitante_id, solicitudes.guardias_id, solicitudes.estatus_solicitud_id, solicitudes.fecha_creacion_sol, solicitudes.tiempo_respuesta, solicitante.id, solicitante.p_nombre_sol, solicitante.p_apellido_sol, solicitante.telefono_celular_sol, solicitante.motivo_solicitud_id, solicitante.organismos_solicitud_id, solicitud_atencion.detalles_solicitud, solicitud_atencion.procedimiento_solicitud, solicitud_atencion.num_fallecidos, solicitud_atencion.num_lesionados, solicitud_atencion.num_heridos, solicitud_atencion.funcionario, solicitud_atencion.amigo171, solicitud_atencion.motos, solicitud_atencion.vehiculos,solicitud_atencion.solicitudes_id, solicitud_atencion.direccion_solicitud, solicitud_atencion.despachador_solicitud, solicitud_atencion.operador_solicitud, solicitud_atencion.num_motos, solicitud_atencion.num_vehiculos FROM public.solicitudes INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id INNER JOIN public.solicitud_atencion ON solicitud_atencion.solicitudes_id = solicitudes.id WHERE solicitudes.id = $num");

//      $result = pg_query($dbconn, "SELECT * FROM public.solicitudes WHERE solicitudes.id = 8");
                if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }


                              while($reg=pg_fetch_array($result))
                              { 
?>
                  <div id="step-1">
                        <h2 class="StepTitle">Solicitud</h2>
                  
<!-- ****************************************************************************************************** -->                    
<!-- ////////////////////////////////    SOLICITUDES    /////////////////////////////////////////////////// -->

<!-- ****************************************************************************************************** -->
                  <div class="field item form-group"><!-- // Hora de apertura de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="tiempo_apertura_sol">Tiempo de Apertura:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="tiempo_apertura_sol" id="tiempo_apertura_sol" placeholder="Tiempo de apertura" required value="<?php echo $reg['tiempo_apertura_sol'];?>" title="Llene este campo con la hora de apertura de la solicitud" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Fecha de la solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_sol">Fecha Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" class="form-control" name="fecha_sol" id="fecha_sol" placeholder="Fecha solicitud" value="<?php echo $reg['fecha_sol'];?>" title="Llene este campo con la fecha de solicitud" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Hora de la Llamada de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_sol">Hora de Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_sol" id="hora_sol" placeholder="Ingrese hora solicitud" value="<?php echo $reg['hora_sol']; ?>" title="Llene este campo con la hora de llamada de solicitud" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Hora de cierre de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_cierre_sol">Hora de Cierre:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_cierre_sol" id="hora_cierre_sol" placeholder="Ingrese hora cierre" value="<?php echo $reg['hora_cierre_sol']; ?>" title="Llene este campo con la hora de cierre de la solicitud" readonly />
                      </div>
                    </div>

                    </div>

<!-- ******** STEP 2 *********-->                      
                    <div id="step-2"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Solicitante</h2>
                    
<!-- ************************************************************************************************** -->

<!-- ////////////////////////////////    SOLICITANTE  ///////////////////////////////////////////////// -->

<!-- ************************************************************************************************** -->
                    <div class="field item form-group"><!-- // número de telefono de quien realiza la llamada // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular_sol">Número de Teléfono:</label>
                      <div class="col-md-6 col-sm-6">
                          <input type="text" name="telefono_celular_sol" id="telefono_celular_sol" class="form-control" title="Llene este campo con el número de teléfono de quien realiza la llamada (agregando código de area o compañía de servicio)" placeholder="Número teléfono" value="<?php echo $reg['telefono_celular_sol']; ?>" data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" readonly >
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // nombre y apellido de la persona que llama // -->
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

                          if ($result != '') {
                          $registro=pg_fetch_array($result);
                      ?>
                       <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_solicitud_id">Organismo:</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="organismos_solicitud_id" id="organismos_solicitud_id" title="Seleccione si la llamada recibida es por uno de los organos de servicio o seguridad del estado" value="<?php echo $registro['nombre_org']; ?>" readonly >
                      </div>
                    </div>
                    <?php
                          }else{ 
                    ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_solicitud_id">Organismo:</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="organismos_solicitud_id" id="organismos_solicitud_id" title="Seleccione si la llamada recibida es por uno de los organos de servicio o seguridad del estado" <?php echo $registro['nombre_org']; ?> readonly >
                      </div>
                    </div>

                   <?php 
                      }
?>
              <?php
              $funcionario = $reg['funcionario']; 
              if($funcionario != 'f' ){
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si, llamada recibida por funcionario">
                  <input type="radio" name="funcionario" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No, llamada recibida de funcionario">
                  <input type="radio" name="funcionario" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
              }else{
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

                    <div class="field item form-group"><!-- // Llamada recibida es de algun trabajor o amigo de la institucion 911 // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="amigo171">Amigo 911</label>
                      <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">

              <?php
              $amigo171 = $reg['amigo171']; 
              if($amigo171 != 'f' ){
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="amigo171" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="amigo171" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
              }else{
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="amigo171" value="TRUE" class="flat" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
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
                          $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud WHERE id = $motivo_sol");
                          if (!$result44) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $registro44=pg_fetch_array($result44);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="motivo_solicitud_id">Motivo:</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="motivo_solicitud_id" id="motivo_solicitud_id" title="Seleccione este campo con el motivo de la solicitud" value="<?php echo $registro44['nombre_motivo']; ?>" readonly>
                      </div>
                    </div>

                    </div>
<!-- ********* STEP 3 ********* -->
                      <div id="step-3"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Detalles</h2>

<!-- ************************************************************************************************* -->

<!-- /////////////////////////////////  ATENCION DE SOLICITUD   /////////////////////////////////////  -->

<!-- ************************************************************************************************* -->
                      <div class="field item form-group"><!-- //      direccion donde ocurre el evento   //    -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="direccion_solicitud">Dirección</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="direccion_solicitud" id="direccion_solicitud" class="resizable_textarea form-control" placeholder="Dirección del hecho de la solicitud" value="<?php echo $reg['solicitud_atencion.direccion_solicitud']; ?>" title="Llene este campo con dirección exacta del lugar del evento" readonly ><?php echo $reg['direccion_solicitud']; ?></textarea>
                        </div>
                      </div>

                      <div class="field item form-group"><!-- //       detalles de la novedad           //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="detalles_solicitud">Detalles</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="detalles_solicitud" id="detalles_solicitud" class="resizable_textarea form-control" placeholder="Detalles de la solicitud" value="<?php echo $reg['detalles_solicitud']; ?>" title="Llene este campo con detalles del evento" readonly ><?php echo $reg['detalles_solicitud']; ?></textarea>
                        </div>
                      </div>

                      <div class="field item form-group"><!-- //     procedimiento realizado de la novedad   //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="procedimiento_solicitud">Procedimiento</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="procedimiento_solicitud"  id="procedimiento_solicitud" class="resizable_textarea form-control" placeholder="Procedimiento en el sitio de la solicitud" value="<?php echo $reg['procedimiento_solicitud']; ?>" title="Llene este campo con el procedimiento realizado por los funcionarios en el lugar del evento" readonly ><?php echo $reg['procedimiento_solicitud']; ?></textarea>
                        </div>
                      </div> 

                    <div class="field item form-group"><!-- //    numeros de fallecidos en caso de haber    //   -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_fallecidos">Fallecidos</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="num_fallecidos" id="num_fallecidos" class="form-control" placeholder="Nº fallecidos" value="<?php echo $reg['num_fallecidos']; ?>" title="Llene este campo con el número de fallecidos en caso de existir" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //    numeros de lesionados en caso de haber    //   -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_lesionados">Lesionados</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="num_lesionados" id="num_lesionados" class="form-control" placeholder="Nº lesionados" value="<?php echo $reg['num_lesionados']; ?>" title="Llene este campo con el numero de lesionados en caso de existir" readonly />
                      </div>
                    </div>   

                    <div class="field item form-group"><!-- //   numeros de heridos en caso de haber  //    -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_heridos">Heridos</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="num_heridos" id="num_heridos" class="form-control" placeholder="Nº heridos" value="<?php echo $reg['num_heridos']; ?>" title="Llene este campo con el numero de heridos en caso de existir" readonly />
                      </div>
                    </div>

                    </div>
<!-- ********* STEP 4 ********* -->
                      <div id="step-4"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Ubicación</h2>

<!-- ************************************************************************************************* -->

<!-- ///////////////////////////////////  ATENCION DE SOLICITUD   ///////////////////////////////////  -->

<!-- ************************************************************************************************* -->
       
<?php 
$parroquia = $reg['parroquias_id'];
// Creación y/o formación de la consulta.
$result3 = pg_query($dbconn, "SELECT parroquias.nombre_parroquia, municipios.nombre_municipio, estados.nombre_estado FROM public.parroquias INNER JOIN public.municipios ON municipios.id = parroquias.municipios_id INNER JOIN public.estados ON  estados.id = municipios.estados_id WHERE parroquias.id = $parroquia ");
    if (!$result3) {
        echo "Ocurrió un error.\n";
        exit;
        }
    $reg_ciudad = pg_fetch_array($result3);
?>
                   <div class="field item form-group"><!-- // Seleccion del Estado donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboEstado">Estado</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="estados" id="cboEstado" title="Selecciones Estado en que sucede el evento de solicitud" value="<?php echo $reg_ciudad['nombre_estado'] ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboMunicipio">Municipio</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="municipios" id="cboMunicipio" title="Selecciones municipio en que sucede el evento de solicitud" value="<?php echo $reg_ciudad['nombre_municipio'] ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia</label>
                        <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="parroquias_id" id="cboParroquia" title="Seleccione parroquia en que sucede el evento de solicitud" value="<?php echo $reg_ciudad['nombre_parroquia'] ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector</label> 
                        <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="sector_sol" id="cboSectores" title="Seleccione sector en que sucede el evento de solicitud" value="<?php echo $reg['sector_sol'] ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia_sol">Punto Referencia</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="varchar" name="punto_referencia_sol" id="punto_referencia_sol" class="form-control" placeholder="Lugar o sitio referencia" title="Llene este campo con lugar o sitio de referencia" value="<?php echo $reg['punto_referencia_sol'] ?>" readonly />
                      </div>
                    </div>

                      <?php /********* Seleccion el estatus de la Solicitud ***********/
                      // Consulta a la Base de Datos
                        $estatus = $reg['estatus_solicitud_id'];
                          $result5 = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id = $estatus");
                          if (!$result5) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $registro5=pg_fetch_array($result5)
                      ?>
                    <div class="field item form-group"><!-- // Seleccion del Estatus de la Solicitud //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="estatus_solicitud_id">Estatus</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="estatus_solicitud_id" id="estatus_solicitud_id" title="Llene este campo con la situación de la solicitud" value="<?php echo strtoupper($registro5['tipo_estatus']) ?>" readonly>
                      </div>
                    </div>

                    </div>
<!-- ********** STEP 5 ********** -->                      
                      <div id="step-5"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Atención</h2>

<!-- ************************************************************************************************* -->

<!-- ///////////////////////////////////////    SOLICITUD ATENCION    //////////////////////////////// -->

<!-- ************************************************************************************************* -->
                  <?php
                  $operador = $reg['operador_solicitud'];
                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $operador");
                  if (!$consulta_op) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                    $reg_operador=pg_fetch_array($consulta_op);
                  ?>
                    <div class="field item form-group"><!-- // nombre del operador que recibe la llamada // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" value="<?php echo strtoupper($reg_operador['p_nombre']); echo " "; echo strtoupper($reg_operador['p_apellido']); ?>" readonly>
                      </div>
                    </div>

                  <?php
                  $despachador = $reg['despachador_solicitud'];
                  $consulta_desp = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $despachador");
                  if (!$consulta_desp) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      $reg_despachador=pg_fetch_array($consulta_desp);
                  ?>
                    <div class="field item form-group"><!-- // nombre del despachador que atiende de la novedad // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="despachador_solicitud">Despachador</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="despachador_solicitud" id="despachador_solicitud" title="Llene este campo con nombre de despachador de unidades de la llamada de solictitud" value="<?php echo strtoupper($reg_despachador['p_nombre']);  echo " "; echo strtoupper($reg_despachador['p_apellido']); ?>" readonly >
                      </div>
                    </div>
                <?php
//                $dato = $reg['tiempo_respuesta_sol'];
                $dato = $reg['hora_sol'];
                $hora = date('H',strtotime($dato));
                $minuto = date('m',strtotime($dato));

                $dato2 = $reg['hora_cierre_sol'];
                $hora2 = date('H',strtotime($dato2));
                $minuto2 = date('m',strtotime($dato2));
                ?>
                    <div class="field item form-group"><!-- //  tiempo de respuesta de la Solicitud  // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="tiempo_respuesta_sol">Tiempo de Respuesta</label>
                      <div class="col-md-2 col-sm-2">
                        <b>hora</b>
                        <input type="number" class="form-control" name="tiempo_respuesta_sol" id="tiempo_respuesta_sol" value="<?php echo $hora_resp = $hora2-$hora; ?>" title="Rellene este campo con Horas de tiempo de respuesta" readonly />
                      </div>

                      <div class="col-md-2 col-sm-2">
                      <b>minuto</b>
                        <input type="number" class="form-control" name="tiempo_respuesta_sol1" id="tiempo_respuesta_sol1" value="<?php echo $minuto_resp = $hora2-$hora; ?>" title="Rellene este campo con Minutos de tiempo de respuestas" readonly />
                      </div>
                    </div>

                <?php
                   $cadena = $reg[0];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT solicitudes_organismos_solicitud.organismos_solicitud_id, organismos_solicitud.nombre_org FROM public.solicitudes_organismos_solicitud INNER JOIN public.organismos_solicitud ON organismos_solicitud.id = solicitudes_organismos_solicitud.organismos_solicitud_id WHERE solicitudes_organismos_solicitud.solicitudes_id = $id");
                    $reg1 = pg_fetch_assoc($consulta1);

                       $total_rows1 = pg_num_rows($consulta1);
                ?>
                      <div class="field item form-group"><!-- //     procedimiento realizado de la novedad   //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="procedimiento_solicitud">Organismos</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="procedimiento_solicitud"  id="procedimiento_solicitud" class="resizable_textarea form-control" placeholder="Procedimiento en el sitio de la solicitud" title="Llene este campo con el procedimiento realizado por los funcionarios en el lugar del evento" readonly >
                            <?php 
                            
                              if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 

                    echo "".strtoupper($reg1['nombre_org']).", ";

                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }

                            ?>
                              
                            </textarea>
                        </div>
                      </div> 

                    <div class="field item form-group"><!-- // Llamada recibida es de algun trabajor o Funcionario Publico // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="funcionario">Funcionario</label>
                      <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">

<!--                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Organismos</label>-->
                <?php /*
                    $cadena = $reg[0];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT solicitudes_organismos_solicitud.organismos_solicitud_id, organismos_solicitud.nombre_org FROM public.solicitudes_organismos_solicitud INNER JOIN public.organismos_solicitud ON organismos_solicitud.id = solicitudes_organismos_solicitud.organismos_solicitud_id WHERE solicitudes_organismos_solicitud.solicitudes_id = $id");
                    $reg1 = pg_fetch_assoc($consulta1);

                        $total_rows1 = pg_num_rows($consulta1);

                          if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 
                ?>
                    <div class="col-md-2 col-sm-2">
                      <label class="col-form-label label-align"><?php echo $reg1['nombre_org']; ?></label>
                      </div>

                    <?php 
                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }
                      */
                    ?>
<!--                  </div>-->


                    <div ><!-- * Estos campos en TYPE=HIDDEN estan tomados
                                     * para que el siguiente campo de variables pueda tomas el valor
                                     * -->
                           <input type="hidden" name="num_motos" class="form-control" placeholder="Nº Motos" title="Llene este campo con el número de motos en el sitio en caso de existir" value="<?php echo $reg['num_motos']; ?>" readonly>
                          </div>


                    
                    <div class="field item form-group"><!-- // Motos en sitio de solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="motos">Motos</label>
                      <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
              <?php
              $motos = $reg['motos']; 
              if($motos != 'f' ){
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
              }else{
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="TRUE" class="flat" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="FALSE" class="flat" checked readonly > &nbsp; NO&nbsp;
                  </label>';
              }
              ?>
                          </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                           <input type="number" name="num_motos" class="form-control" placeholder="Nº Motos" title="Llene este campo con el número de motos en el sitio en caso de existir" value="<?php echo $reg['num_motos']; ?>" readonly>
                          </div>

                    </div>

                    <div class="field item form-group"><!-- // Vehiculos en sitio de solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="vehiculos">Vehículos</label>
                      <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
                  <?php
                  $vehiculos = $reg['vehiculos']; 
                  if($vehiculos != 'f' ){
                    echo'<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de Vehículos en el sitio">
                          <input type="radio" name="vehiculos" value="TRUE" class="flat" checked="checked" readonly> &nbsp;SI &nbsp;
                          </label>';
                    echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de Vehículos en el sitio">
                          <input type="radio" name="vehiculos" value="FALSE" class="flat" readonly> &nbsp;NO &nbsp;
                          </label>';

                  }else{
                    echo'<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de Vehículos en el sitio">
                        <input type="radio" name="vehiculos" value="TRUE" class="flat" readonly> &nbsp;SI &nbsp;
                        </label>';
                    echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de Vehículos en el sitio">
                        <input type="radio" name="vehiculos" value="FALSE" class="flat" checked readonly> &nbsp;NO &nbsp;
                        </label>';
                  }
                  ?>

                          </div>
                    </div>
                          <div class="col-md-2 col-sm-2">
                           <input type="number" name="num_vehiculos" class="form-control" placeholder="Nº Vehículos" title="Llene este campo con el número de vehículos en el sitio en caso de existir" value="<?php echo $reg['num_vehiculos']; ?>" readonly>   
                            </div>                   
                    </div>

           
                    <div class="ln_solid"></div>
                    
                      </div>
<?php
  }
}else{
  //*
  //* FORMULARIO DE SOLICITUDES
  //* CONSULTA A LA TABLA
  //* REPORTE DE SOLICITUDES
  //*
$result = pg_query($dbconn, "SELECT * FROM public.reporte_solicitudes WHERE numero_solicitud = $num_sol");

                if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }


                              while($reg=pg_fetch_array($result))
                              { 
?>
                  <div id="step-1">
                        <h2 class="StepTitle">Solicitud</h2>
                  
<!-- *********************************************************************************************** -->                    
<!-- ////////////////////////////////    SOLICITUDES    ///////////////////////////////////////////// -->

<!-- ************************************************************************************************ -->
                  <div class="field item form-group"><!-- // número de solicitud traida del "sistema emergencias 171" // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="numero_solicitud">Número de solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                          <input type="text" name="numero_solicitud" id="numero_solicitud" class="form-control" title="Este campo contiene el número de solicitud" placeholder="Número solicitud" value="<?php echo $reg['numero_solicitud']; ?>" readonly >
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Fecha de la solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_solicitud">Fecha Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" class="form-control" name="fecha_solicitud" id="fecha_solicitud" placeholder="Fecha solicitud" value="<?php echo $reg['fecha_solicitud'];?>" title="Este campo contiene la fecha de solicitud" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Hora de la Llamada de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_solicitud">Hora de Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_solicitud" id="hora_solicitud" placeholder="Hora solicitud" value="<?php echo $reg['hora_solicitud']; ?>" title="Este campo contiene la hora de llamada de solicitud" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Hora de cierre de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_cierre">Hora de Cierre:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_cierre" id="hora_cierre" placeholder="Hora cierre" value="<?php echo $reg['hora_cierre']; ?>" title="Este campo contiene la hora de cierre de la solicitud" readonly />
                      </div>
                    </div>

                    </div>

<!-- ******** STEP 2 *********-->                      
                    <div id="step-2"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Solicitante</h2>
                    
<!-- ************************************************************************************************** -->

<!-- ////////////////////////////////    SOLICITANTE  ///////////////////////////////////////////////// -->

<!-- ************************************************************************************************** -->
                    <?php
                    // uso de EXPLODE para separar datos del mismo campo que contiene las variables
                                        $cadena = $reg['nombre_solicitante'];
                                        $array = explode(" ", $cadena);
                    ?>
                    <div class="field item form-group"><!-- // nombre y apellido de la persona que llama // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_solicitante">Nombre Solicitante:</label>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" name="nombre_solicitante" id="nombre_solicitante" class="form-control" placeholder="Nombre solicitante" value="<?php echo $array[0]; ?>" title="Este campo contiene nombre y apellido de quien realiza la llamada" readonly />
                      </div>
                      <div class="col-md-3 col-sm-3">
                        <input type="text" id="nombre_solicitante" name="nombre_solicitante" class="form-control" placeholder="Apellido solicitante" value="<?php echo $array[1]; ?>" title="Este campo contiene nombre y apellido de quien realiza la llamada" readonly />
                      </div>
                    </div>
                   <?php 

                   /********* Seleccion del Motivo de la llamada de Solicitud ***********/
                          // Consulta a la Base de Datos Tabla Motivos por Grupo
/*                        $motivo_sol = $reg['motivo_solicitud_id'];
                          $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud WHERE id = $motivo_sol");
                          if (!$result44) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $registro44=pg_fetch_array($result44);
*/                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="motivo_solicitud">Motivo:</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="motivo_solicitud" id="motivo_solicitud" title="Seleccione este campo con el motivo de la solicitud" value="<?php echo $reg['motivo_solicitud']; ?>" readonly>
                      </div>
                    </div>

                    </div>
<!-- ********* STEP 3 ********* -->
                      <div id="step-3"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Detalles</h2>

<!-- ************************************************************************************************* -->

<!-- /////////////////////////////////  ATENCION DE SOLICITUD   /////////////////////////////////////  -->

<!-- ************************************************************************************************* -->
                      <div class="field item form-group"><!-- //      direccion donde ocurre el evento   //    -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="direccion">Dirección</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="direccion" id="direccion" class="resizable_textarea form-control" placeholder="Dirección del hecho de la solicitud" value="<?php echo $reg['solicitud_atencion.direccion']; ?>" title="Este campo contiene dirección exacta del lugar del evento" readonly ><?php echo $reg['direccion']; ?></textarea>
                        </div>
                      </div>

                      <div class="field item form-group"><!-- //       detalles de la novedad           //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="detalles">Detalles</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="detalles" id="detalles" class="resizable_textarea form-control" placeholder="Detalles de la solicitud" value="<?php echo $reg['detalles']; ?>" title="Este campo contiene detalles del evento" readonly ><?php echo $reg['detalles']; ?></textarea>
                        </div>
                      </div>

                      <div class="field item form-group"><!-- //     procedimiento realizado de la novedad   //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="procedimiento">Procedimiento</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="procedimiento"  id="procedimiento" class="resizable_textarea form-control" placeholder="Procedimiento en el sitio de la solicitud" value="<?php echo $reg['procedimiento']; ?>" title="Este campo contiene el procedimiento realizado por los funcionarios en el lugar del evento" readonly ><?php echo $reg['procedimiento']; ?></textarea>
                        </div>
                      </div> 

                    <div class="field item form-group"><!-- //    numeros de fallecidos en caso de haber    //   -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="num_fallecidos">Fallecidos</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="fallecidos" id="fallecidos" class="form-control" placeholder="Nº fallecidos" value="<?php echo $reg['fallecidos']; ?>" title="Este campo contiene el número de fallecidos en caso de existir" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //    numeros de lesionados en caso de haber    //   -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="lesionados">Lesionados</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="lesionados" id="lesionados" class="form-control" placeholder="Nº lesionados" value="<?php echo $reg['lesionados']; ?>" title="Este campo contiene el numero de lesionados en caso de existir" readonly />
                      </div>
                    </div>   

                    </div>
<!-- ********* STEP 4 ********* -->
                      <div id="step-4"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Ubicación</h2>

<!-- ************************************************************************************************* -->

<!-- ///////////////////////////////////  ATENCION DE SOLICITUD   ///////////////////////////////////  -->

<!-- ************************************************************************************************* -->
       <?php 
       $municipio1 = $reg['municipio'];
       $result_municipio = pg_query($dbconn, "SELECT * FROM municipios WHERE id = $municipio1");
//       $sql = "SELECT * FROM municipios WHERE id = $municipio";
//       $result_municipio = pg_query($dbconn,$sql) or die ("Error en consulta a municipios");
       $fila_municipio = pg_fetch_array($result_municipio);
       ?>
                    <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboMunicipio">Municipio</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="municipio" id="cboMunicipio" title="Este campo contiene el municipio en que sucede el evento de solicitud" value="<?php echo $fila_municipio['nombre_municipio']; ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia</label>
                        <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="parroquia" id="cboParroquia" title="Este campo contiene la parroquia en que sucede el evento de solicitud" value="<?php echo $reg['parroquia']; ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector</label> 
                        <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="sector" id="cboSectores" title="Este campo contiene el sector en que sucede el evento de solicitud" value="<?php echo $reg['sector']; ?>" readonly>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia">Punto Referencia</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="varchar" name="punto_referencia" id="punto_referencia" class="form-control" placeholder="Lugar o sitio referencia" title="Este campo contiene lugar o sitio de referencia" value="<?php echo $reg['punto_referencia']; ?>" readonly />
                      </div>
                    </div>

                    </div>
<!-- ********** STEP 5 ********** -->                      
                      <div id="step-5"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Atención</h2>

<!-- ************************************************************************************************* -->

<!-- ///////////////////////////////////////    SOLICITUD ATENCION    //////////////////////////////// -->

<!-- ************************************************************************************************* -->
                  <?php
/*
* FALTAN DATOS PARA ENLAZAR LA CONEXION
*/
/*                  $operador = $reg['operador'];
                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $operador");
                  if (!$consulta_op) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                    $reg_operador=pg_fetch_array($consulta_op);
  */                ?>
                    <div class="field item form-group"><!-- // nombre del operador que recibe la llamada // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador">Operador</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="operador" id="operador" title="Este campo contiene nombre y apellido del operador que recibe la solicitud" value="<?php echo strtoupper($reg['operador']); echo " "; echo strtoupper($reg_operador['p_apellido']); ?>" readonly>
                      </div>
                    </div>
                  <?php
/*
* FALTAN DATOS PARA ENLAZAR LA CONEXION
*/
/*                  $despachador = $reg['despachador_solicitud'];
                  $consulta_desp = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $despachador");
                  if (!$consulta_desp) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      $reg_despachador=pg_fetch_array($consulta_desp);
*/                  ?>
                    <div class="field item form-group"><!-- // nombre del despachador que atiende de la novedad // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="despachador_solicitud">Despachador</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="despachador_solicitud" id="despachador_solicitud" title="Este campo contiene nombre y apellido despachador de unidades de la llamada de solictitud" value="<?php echo strtoupper($reg['despachador']);  echo " "; echo strtoupper($reg_despachador['p_apellido']); ?>" readonly >
                      </div>
                    </div>
                <?php
                $dato = $reg['tiempo_respuesta'];
                $hora = date('H',strtotime($dato));
                $minuto = date('m',strtotime($dato));
                ?>
                    <div class="field item form-group"><!-- //  tiempo de respuesta de la Solicitud  // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="tiempo_respuesta">Tiempo de Respuesta</label>
                      <div class="col-md-2 col-sm-2">
                        <b>hora</b>
                        <input type="number" class="form-control" name="tiempo_respuesta" id="tiempo_respuesta" value="<?php echo $hora; ?>" title="Este campo contiene las horas de tiempo de respuesta" readonly />
                      </div>

                      <div class="col-md-2 col-sm-2">
                      <b>minuto</b>
                        <input type="number" class="form-control" name="tiempo_respuesta" id="tiempo_respuesta" value="<?php echo $minuto; ?>" title="Este campo contiene los minutos de tiempo de respuestas" readonly />
                      </div>
                    </div>

                      <div class="field item form-group"><!-- //     procedimiento realizado de la novedad   //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="procedimiento_solicitud">Organismos</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="procedimiento_solicitud"  id="procedimiento_solicitud" class="resizable_textarea form-control" placeholder="Organismos presentes en el sitio de la solicitud" title="Este campo contiene los organismos presentes en el lugar del evento" readonly ><?php echo $reg['organismos']; ?></textarea>
                        </div>
                      </div> 

                    <div class="field item form-group"><!-- // Motos en sitio de solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="motos">Motos</label>
                      <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
              <?php
              $motos = $reg['motos']; 
              if($motos != 1 ){
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
              }else{
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="TRUE" class="flat" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="FALSE" class="flat" checked readonly > &nbsp; NO&nbsp;
                  </label>';
              }
              ?>
                          </div>
                    </div>
                          <div class="col-md-2 col-sm-2">
                           <input type="number" name="num_motos" class="form-control" placeholder="Nº Motos" title="Llene este campo con el número de motos en el sitio en caso de existir" value="<?php echo $reg['num_motos']; ?>" readonly>
                          </div>

                    </div>
 
                    <div class="field item form-group"><!-- // Vehiculos en sitio de solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="vehiculos">Vehículos</label>
                      <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
                  <?php
                  $vehiculos = $reg['vehiculos']; 
                  if($vehiculos != 1 ){
                    echo'<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de Vehículos en el sitio">
                          <input type="radio" name="vehiculos" value="TRUE" class="flat" checked="checked" readonly> &nbsp;SI &nbsp;
                          </label>';
                    echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de Vehículos en el sitio">
                          <input type="radio" name="vehiculos" value="FALSE" class="flat" readonly> &nbsp;NO &nbsp;
                          </label>';

                  }else{
                    echo'<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de Vehículos en el sitio">
                        <input type="radio" name="vehiculos" value="TRUE" class="flat" readonly> &nbsp;SI &nbsp;
                        </label>';
                    echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de Vehículos en el sitio">
                        <input type="radio" name="vehiculos" value="FALSE" class="flat" checked readonly> &nbsp;NO &nbsp;
                        </label>';
                  }
                  ?>

                          </div>
                    </div>
                          <div class="col-md-2 col-sm-2">
                           <input type="number" name="num_vehiculos" class="form-control" placeholder="Nº Vehículos" title="Llene este campo con el número de vehículos en el sitio en caso de existir" value="<?php echo $reg['num_vehiculos']; ?>" readonly>   
                            </div>                   
                    </div>

           
                    <div class="ln_solid"></div>
                    
                      </div>
<?php
  } 
}
?>