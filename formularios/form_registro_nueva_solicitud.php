                          <!--//  
                              //Seccion Primera
                              //"Solicitud"
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
                                 
                                  <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="tiempo_apertura_sol" id="tiempo_apertura_sol" placeholder="Tiempo de apertura" required value="<?php echo $tiempo_apertura = date('H:m:s'); ?>" title="Llene este campo con la hora de apertura de la solicitud" />
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Fecha de la solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_sol">Fecha Solicitud:</label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="fecha_sol" id="fecha_sol" placeholder="Fecha solicitud" value="<?php echo $fecha_solicitud = date("Y-n-j"); ?>" title="Llene este campo con la fecha de solicitud" required />
                                    <input type="text" class="form-control" name="" id="fecha_sol" placeholder="Fecha solicitud" value="<?php  echo date('d/m/Y'); ?>" title="Llene este campo con la fecha de solicitud" readonly/>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Hora de la Llamada de la Solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_sol">Hora de Solicitud:</label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="time" class="form-control" name="hora_sol" id="hora_sol" placeholder="Ingrese hora solicitud" value="<?php echo $hora_sol = date('H:m:s'); ?>" required title="Llene este campo con la hora de llamada de solicitud" readonly />
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="hora_cierre_sol" id="hora_cierre_sol" placeholder="Ingrese hora cierre" value="<?php echo $hora_sol = date('H:m:s'); ?>" required title="Llene este campo con la hora de cierre de la solicitud" />
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
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular_sol">Número de Teléfono:<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="text" name="telefono_celular_sol" id="telefono_celular_sol" class="form-control" title="Llene este campo con el número de teléfono de quien realiza la llamada (agregando código de area o compañía de servicio)" placeholder="Número teléfono" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                                  </div>
                                  <div class="col-md-6 col-sm-6">
                                    <p>Ej: (424) 765-4321</p>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // nombre y apellido de la persona que llama // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre_sol">Nombre Solicitante:<span class="required">
                                      
                                    </span></label>
                                  <div class="col-md-3 col-sm-3">
                                    <input type="text" name="p_nombre_sol" id="p_nombre_sol" class="form-control" placeholder="Nombre solicitante" minlength="2" maxlength="40" value="" title="Llene este campo con nombre y apellido de quien realiza la llamada" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ1-9 -]{1,40}"  />
                                  </div>
                                  <div class="col-md-3 col-sm-3">
                                    <input type="text" id="p_apellido_sol" name="p_apellido_sol" class="form-control" placeholder="Apellido solicitante" minlength="2" maxlength="40" value="" title="Llene este campo con nombre y apellido de quien realiza la llamada" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ1-9 -]{1,40}"  />
                                  </div>
                                </div>

                                <?php /********* Seleccion del Organismo que Realiza la llamada de Solicitud ***********/
                                // Consulta a la Base de Datos
                                $result = pg_query($dbconn, "SELECT * FROM organismos_solicitud");
                                if (!$result) {
                                  echo "Ocurrió un error.\n";
                                  exit;
                                }
                                ?>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismo_solicitante_id">Organismo:</label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="organismo_solicitante_id" id="organismos_solicitante_id" title="Seleccione si la llamada recibida es por uno de los organos de servicio o seguridad del estado">
                                      <option value="0">--Seleccione--</option>
                                      <?php
                                      while ($registro = pg_fetch_array($result)) {
                                      ?>
                                        <option name="id" value="<?php echo $registro[0] ?> "><?php echo strtoupper($registro[1]); ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="field item form-group">
                    <!-- // Llamada recibida es de algun trabajor o Funcionario Publico // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="funcionario">Funcionario<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione si llamada recibida o solicitud, es de Funcionario Público">
                                <input type="radio" name="funcionario" value="1" class="flat" checked="checked" required> &nbsp; SI&nbsp;
                            </label>
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione si llamada recibida o solicitud, No es Funcionario Público">
                                <input type="radio" name="funcionario" value="0" class="flat" required> &nbsp; NO&nbsp;
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field item form-group">
                    <!-- // Llamada recibida es de algun trabajor o amigo de la institucion 171/911 // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="amigo171">Amigo 911<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione si llamada recibida o solicitud, es amigo de la Institución 911">
                                <input type="radio" name="amigo171" value="1" class="flat" checked="checked" required> &nbsp; SI&nbsp;
                            </label>
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione si llamada recibida o solicitud, No es amigo de la Institución 911">
                                <input type="radio" name="amigo171" value="0" class="flat" required> &nbsp; NO&nbsp;
                            </label>
                        </div>
                    </div>
                </div>

                                <?php /********* Seleccion del Motivo de la llamada de Solicitud ***********/
                                // Consulta a la Base de Datos Tabla Motivos por Grupo
                                $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud_grupo ORDER BY id");
                                if (!$result44) {
                                  echo "Ocurrió un error.\n";
                                  exit;
                                }

                                ?>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="motivo_solicitud_id">Motivo:<span class="required">
                                      
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="motivo_solicitud_id" id="motivo_solicitud_id" title="Seleccione este campo con el motivo de la solicitud" >
                                      <option value="0">--Seleccione--</option>
                                      <?php
                                      while ($registro44 = pg_fetch_array($result44)) {
                                        $grupo = strtoupper($registro44[0]);
                                      ?>
                                        <optgroup label="<?php echo $registro44[1] ?>" value="<?php echo $grupo ?>">
                                          <?php
                                          // Consulta a la Base de Datos Tabla Motivos Solicitud     	
                                          $result45 = pg_query($dbconn, "SELECT * FROM motivo_solicitud WHERE motivo_grupo_id = '$registro44[0]' ORDER BY id ");
                                          if (!$result45) {
                                            echo "Ocurrió un error.\n";
                                            exit;
                                          }
                                          while ($registro45 = pg_fetch_array($result45)) {
                                          ?>

                                            <option name="id" value="<?php echo $registro45['id'] ?> "><?php echo strtoupper($registro45[1]); ?></option>
                                          <?php
                                          }
                                          ?>
                                        </optgroup>
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
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="direccion_solicitud">Dirección<span class="required">
                                      
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <textarea type="text" name="direccion_solicitud" id="direccion_solicitud" class="resizable_textarea form-control" placeholder="Dirección del hecho de la solicitud" minlength="8" maxlength="400" title="Llene este campo con dirección exacta del lugar del evento" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}"></textarea>
                                  </div>
                                </div>

                                <div class="field item form-group">
                    <!-- //       detalles de la novedad           //  -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="detalles_solicitud">Detalles<span class="required">
                            
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <textarea type="text" name="detalles_solicitud" id="detalles_solicitud" class="resizable_textarea form-control" placeholder="Detalles de la solicitud" title="Llene este campo con detalles del evento" ></textarea>
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



                                <div class="field item form-group">
                                  <!-- // Seleccion del Sector donde ocurrio el evento //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Ubicación<span class="required">
                                    
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="sector_sol" id="cboSectores" title="Seleccione sector en que sucede el evento de solicitud" >
                                    <?php
/*
https://www.baulphp.com/buscador-en-select-usando-javascript-bootstrap-5/
*/

// **************************
// MODIFICADO 03/10/2023
// **************************
  // Creación y/o formación de la consulta.

  $resultado321 = pg_query($dbconn, "SELECT sectores.id, sectores.nombre_sector, parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.sectores
	INNER JOIN public.parroquias ON sectores.parroquias_id = parroquias.id
	INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
	INNER JOIN public.estados ON municipios.estados_id = estados.id
   WHERE estados.id = 14 ");

if (!$resultado321) {
    echo "Ocurrió un error.\n";
    exit;
  }

$resultado_prrq = pg_fetch_array($resultado321);
?>

                                    <option value="0">-Seleccione Sector-</option>

                                    <?php
                                      // Validar el estatus de ejecución de la consulta.
                                          while ($resultado = pg_fetch_array($resultado321)) {

                                            ?>
                                            <option name="id" id="valor" value="<?php echo $resultado[0] ?>"><?php echo strtoupper($resultado[1]).", ".strtoupper($resultado[3]).", ".strtoupper($resultado[5]); ?></option>
                                            <?php }?>

                                  </select>
                                  </div>
                                </div>



                                
                                <div class="field item form-group">
                                <!--  // **********************
                                      // MODIFICADO 05/10/2023
                                      // ********************** -->
                                <!-- // Seleccion del Sector donde ocurrio el evento //-->
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="parroquias_id"></label>
                                <div class="col-md-6 col-sm-6">
                                        <input type="hidden" class="form-control" name="parroquias_id" id="parroquias_id" value="<?php echo $resultado_prrq[2]; ?>" title="Este campo deberá de reflejar el id de la Parroquia">
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
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia_sol">Punto Referencia<span class="required">
                                     
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="varchar" name="punto_referencia_sol" id="punto_referencia_sol" class="form-control" placeholder="Lugar o sitio referencia" minlength="2" maxlength="40" title="Llene este campo con lugar o sitio de referencia" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" />
                                  </div>
                                </div>

                                <?php /********* Seleccion el estatus de la Solicitud ***********/
                                // Consulta a la Base de Datos
                                $result5 = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id IN (5,6,7)");
                                if (!$result5) {
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
                                      <option value="">--Seleccione--</option>
                                      <?php
                                      while ($registro5 = pg_fetch_array($result5)) {
                                      ?>
                                        <option name="id" value="<?php echo $registro5[0] ?> "><?php echo strtoupper($registro5[1]); ?></option>
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
                            // Consulta al operador de la solicitud
                              $n_cedula = $cedula_personal;
                              $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $n_cedula");
                              $reg_operador = pg_fetch_array($consulta_op);
                              ?>

                            <div class="field item form-group">
                              <!-- // nombre del operador que recibe la llamada // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                     
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                  <input type="hidden" name="operador_solicitud" id="operador_solicitud" class="form-control" placeholder="Nombre del Operador" value="<?php echo $reg_operador['cedula']; ?>" minlength="2" maxlength="40" title="Llene este campo con nombre del Operador que recibe la solicitud" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" />
                                  <input type="varchar" name="" id="" class="form-control" placeholder="Nombre del Operador" value="<?php echo $reg_operador['p_nombre']; echo " "; echo $reg_operador['p_apellido']; ?>" minlength="2" maxlength="40" title="Llene este campo con nombre del Operador que recibe la solicitud" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" readonly />
                                </div>
                                </div>




                                <div>
                                  <!-- //     Registro de fecha tomada por en sistema      //     -->
                                  <?php
                                  if ($grupos01 != 0) {
                                    ?>
                                  <input type="hidden" name="guardias_id" id="guardias_id" value="<?php echo $grupos01; ?>" required />
                                  <?php
                                }else{
                                  ?>
                                  <input type="hidden" name="guardias_id" id="guardias_id" value="<?php echo $grupos_guardia; ?>" required />
                                  <?php
                                        }
                                        ?>
                                </div>
                                <div>
                                  <!-- //     Registro de fecha tomada por en sistema      //     -->
                                  <input type="hidden" name="cedula_personal" id="cedula_personal" value="<?php echo $cedula_personal; ?>" required />
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