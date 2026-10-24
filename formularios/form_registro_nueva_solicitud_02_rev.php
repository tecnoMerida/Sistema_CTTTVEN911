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
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="tiempo_apertura_sol">Tiempo de Apertura:<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="time" class="form-control" name="tiempo_apertura_sol" id="tiempo_apertura_sol" placeholder="Tiempo de apertura" required value="<?php echo $tiempo_apertura = date('H:m:s'); ?>" title="Llene este campo con la hora de apertura de la solicitud" />
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Fecha de la solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_sol">Fecha Solicitud:<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="date" class="form-control" name="fecha_sol" id="fecha_sol" placeholder="Fecha solicitud" value="<?php echo $fecha_solicitud = date("Y-n-j"); ?>" title="Llene este campo con la fecha de solicitud" required />
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Hora de la Llamada de la Solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_sol">Hora de Solicitud:<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="time" class="form-control" name="hora_sol" id="hora_sol" placeholder="Ingrese hora solicitud" value="<?php echo $hora_sol = date('H:m:s'); ?>" required title="Llene este campo con la hora de llamada de solicitud" />
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
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-3 col-sm-3">
                                    <input type="text" name="p_nombre_sol" id="p_nombre_sol" class="form-control" placeholder="Nombre solicitante" minlength="2" maxlength="40" value="" title="Llene este campo con nombre y apellido de quien realiza la llamada" pattern="[A-Za-z -]{2,40}" required />
                                  </div>
                                  <div class="col-md-3 col-sm-3">
                                    <input type="text" id="p_apellido_sol" name="p_apellido_sol" class="form-control" placeholder="Apellido solicitante" minlength="2" maxlength="40" value="" title="Llene este campo con nombre y apellido de quien realiza la llamada" pattern="[A-Za-z -]{2,40}" required />
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
                                      <option>--Seleccione--</option>
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
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="motivo_solicitud_id" id="motivo_solicitud_id" title="Seleccione este campo con el motivo de la solicitud" required>
                                      <option value="">--Seleccione--</option>
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
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <textarea type="text" name="direccion_solicitud" id="direccion_solicitud" class="resizable_textarea form-control" placeholder="Dirección del hecho de la solicitud" minlength="8" maxlength="400" title="Llene este campo con dirección exacta del lugar del evento" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}" required></textarea>
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
                                // Creación y/o formación de la consulta.
                                $result3 = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = 14 ");
                                if (!$result3) {
                                  echo "Ocurrió un error.\n";
                                  exit;
                                }
                                ?>
                                <div class="field item form-group">
                                  <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboEstado">Estado<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="estados" id="cboEstado" title="Selecciones Estado en que sucede el evento de solicitud" required>
                                      <option value=''>-Seleccione Estado-</option>
                                      <?php
                                      // Validar el estatus de ejecución de la consulta.
                                      while ($row = pg_fetch_array($result3)) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['nombre_estado'] . "</option>";
                                      }

                                      ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboMunicipio">Municipio<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="municipios" id="cboMunicipio" title="Selecciones municipio en que sucede el evento de solicitud" required>
                                      <option value=''>-Seleccione Municipio-</option>

                                    </select>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="parroquias_id" id="cboParroquia" title="Seleccione parroquia en que sucede el evento de solicitud" required>
                                      <option value="">-Seleccione Parroquia-</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Seleccion del Sector donde ocurrio el evento //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="sector_sol" id="cboSectores" title="Seleccione sector en que sucede el evento de solicitud" required>
                                      <option value="">-Seleccione Sector-</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia_sol">Punto Referencia<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="varchar" name="punto_referencia_sol" id="punto_referencia_sol" class="form-control" placeholder="Lugar o sitio referencia" minlength="2" maxlength="40" title="Llene este campo con lugar o sitio de referencia" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" required />
                                  </div>
                                </div>

                                <?php /********* Seleccion el estatus de la Solicitud ***********/
                                // Consulta a la Base de Datos
                                $result5 = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id = 5");
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
                                $organismo = $regid['organismos_id'];

                                if($organismo == 1 ){
                                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupos_guardia AND estatus_personal_id = 1 AND organismos_id IN (1,4)");
                                  if (!$consulta_op) {
                                    echo "Ocurrió un error.\n";
                                    exit;
                                  }
                                  ?>
                                  <div class="field item form-group">
                                    <!-- // nombre del operador que recibe la llamada // -->
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                        <font COLOR="#FF0000">*</font>
                                      </span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" required>
                                        <option value="">--Seleccione--</option>
                                        <?php
                                        while ($reg_operador = pg_fetch_array($consulta_op)) {
                                        ?>
                                          <option name="id" value="<?php echo $reg_operador['cedula'] ?> "><?php echo strtoupper($reg_operador['p_nombre']);
                                                                                                            echo " ";
                                                                                                            echo strtoupper($reg_operador['p_apellido']); ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <?php
                                }elseif($organismo == 2 ){
                                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupos_guardia AND estatus_personal_id = 1 AND organismos_id IN (2,4)");
                                  if (!$consulta_op) {
                                    echo "Ocurrió un error.\n";
                                    exit;
                                  }
                                  ?>
                                  <div class="field item form-group">
                                    <!-- // nombre del operador que recibe la llamada // -->
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                        <font COLOR="#FF0000">*</font>
                                      </span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" required>
                                        <option value="">--Seleccione--</option>
                                        <?php
                                        while ($reg_operador = pg_fetch_array($consulta_op)) {
                                        ?>
                                          <option name="id" value="<?php echo $reg_operador['cedula'] ?> "><?php echo strtoupper($reg_operador['p_nombre']);
                                                                                                            echo " ";
                                                                                                            echo strtoupper($reg_operador['p_apellido']); ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <?php
                                }elseif($organismo == 3 ){
                                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupos_guardia AND estatus_personal_id = 1 AND organismos_id IN (3,4)");
                                  if (!$consulta_op) {
                                    echo "Ocurrió un error.\n";
                                    exit;
                                  }
                                  ?>
                                  <div class="field item form-group">
                                    <!-- // nombre del operador que recibe la llamada // -->
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                        <font COLOR="#FF0000">*</font>
                                      </span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" required>
                                        <option value="">--Seleccione--</option>
                                        <?php
                                        while ($reg_operador = pg_fetch_array($consulta_op)) {
                                        ?>
                                          <option name="id" value="<?php echo $reg_operador['cedula'] ?> "><?php echo strtoupper($reg_operador['p_nombre']);
                                                                                                            echo " ";
                                                                                                            echo strtoupper($reg_operador['p_apellido']); ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <?php
                                }elseif($organismo == 4 ){
                                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupos_guardia AND estatus_personal_id = 1 AND organismos_id IN (4)");
                                  if (!$consulta_op) {
                                    echo "Ocurrió un error.\n";
                                    exit;
                                  }
                                  ?>
                                  <div class="field item form-group">
                                    <!-- // nombre del operador que recibe la llamada // -->
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                        <font COLOR="#FF0000">*</font>
                                      </span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" required>
                                        <option value="">--Seleccione--</option>
                                        <?php
                                        while ($reg_operador = pg_fetch_array($consulta_op)) {
                                        ?>
                                          <option name="id" value="<?php echo $reg_operador['cedula'] ?> "><?php echo strtoupper($reg_operador['p_nombre']);
                                                                                                            echo " ";
                                                                                                            echo strtoupper($reg_operador['p_apellido']); ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <?php
                                }else{
                                  $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE grupo_guardia_id = $grupos_guardia AND estatus_personal_id = 1 AND organismos_id IN (4,5)");
                                  if (!$consulta_op) {
                                    echo "Ocurrió un error.\n";
                                    exit;
                                  }
                                  ?>
                                  <div class="field item form-group">
                                    <!-- // nombre del operador que recibe la llamada // -->
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                        <font COLOR="#FF0000">*</font>
                                      </span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="operador_solicitud" id="operador_solicitud" title="Llene este campo con nombre del Operador que recibe la solicitud" required>
                                        <option value="">--Seleccione--</option>
                                        <?php
                                        while ($reg_operador = pg_fetch_array($consulta_op)) {
                                        ?>
                                          <option name="id" value="<?php echo $reg_operador['cedula'] ?> "><?php echo strtoupper($reg_operador['p_nombre']);
                                                                                                            echo " ";
                                                                                                            echo strtoupper($reg_operador['p_apellido']); ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <?php                                  
                                }
                                ?>
                                
                                <div>
                                  <!-- //     Registro de fecha tomada por en sistema      //     -->
                                  <input type="text" name="guardias_id" id="guardias_id" value="<?php echo $grupos01; ?>" required />
                                </div>
                                <div>
                                  <!-- //     Registro de fecha tomada por en sistema      //     -->
                                  <input type="text" name="cedula_personal" id="cedula_personal" value="<?php echo $cedula_personal; ?>" required />
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