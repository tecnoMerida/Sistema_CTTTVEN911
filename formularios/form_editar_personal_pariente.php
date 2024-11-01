                     <!-- Seccion Cinco -->
                       <div class="panel">
                         <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           <h4 class="panel-title">Pariente</h4>
                         </a>
                         <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                           <div class="panel-body">

                           <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="cedula_p">Cédula<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">

                        <input type="text" name="cedula_p" id="cedula_p" class="form-control" placeholder="Ingrese número cédula" minlength="7" maxlength="8" value="<?php echo $pariente['cedula_p']; ?>" title="Llene este campo con el número de cédula del familiar, entre 7 y 8 dígitos" autofocus pattern="[0-9]{7,8}" required="required" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_p">Primer Nombre<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="nombre_p" id="nombre_p" class="form-control" placeholder="Ingrese primer nombre" minlength="3" maxlength="20" value="<?php echo strtoupper($pariente['nombre_p']); ?>" title="Llene este campo con el primer nombre del familiar, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                      </div>
                    </div>

                    
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="apellido_p">Primer Apellido<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input name="apellido_p" id="apellido_p" class="form-control" placeholder="Ingrese primer apellido" required="required" minlength="3" maxlength="20" value="<?php echo strtoupper($pariente['apellido_p']); ?>" title="Llene este campo con el primer apellido del familiar, entre 3 y 20 dígitos" data-validate-length-range="3,20" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}"/>
                      </div>
                    </div>

                      <div class="field item form-group">
                        <div class="col-md-6 col-sm-6">
                          <input type="hidden" name="" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_p">Teléfono<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" name="telefono_p" id="telefono_p" class="form-control" value="<?php echo strtoupper($pariente['telefono_p']); ?>" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación o móvil" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: (274) 262-4321</p>
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_p">Observaciones<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="observaciones_p" id="observaciones_p" class="resizable_textarea form-control" placeholder="Ingrese alguna observacion del familiar" minlength="8" maxlength="400" value="<?php echo strtoupper($pariente['observaciones_p']); ?>" title="Llene este campo con alguna observación necesaria para el familiar, entre 8 y 400 dígitos" required='required' pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}" /><?php echo strtoupper($pariente['observaciones_p']); ?></textarea>
                        </div>
                      </div>

                      <?php

                      $tipo1 = $pariente['tipo_parenstesco_id'];
                      // Cunsulta Base de Datos con Valor de registro
                      $parentesco = pg_query($dbconn, "SELECT * FROM tipo_parenstesco WHERE id = $tipo1 ");
                      $tipo_p =pg_fetch_array($parentesco);

                      if (!$parentesco){
                        echo "Error con tabla de parentesco";
                        exit;
                      }
                      

                      // Consulta a la Base de Datos
                          $result7 = pg_query($dbconn, "SELECT * FROM tipo_parenstesco");
                          if (!$result7) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Parentesco<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="tipo_parenstesco_id" title="Seleccione el parentesco del familiar" required>
                            <option value="<?php echo $tipo_p['id']; ?>"><?php echo strtoupper($tipo_p['tipo_par']);?></option>
                            <?php
                              while($registro7=pg_fetch_array($result7))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro7[0] ?> "><?php echo strtoupper($registro7[1]); ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <input type="hidden" name="id" required="required" value="<?php echo $pariente['id']; ?>" /> 
                    <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $cedula1;?>" required />

                    <input type="hidden" name="fecha_modificacion" id="fecha_modificacion" value="<?php echo $fecha_modificacion= date ("Y/n/j H:m:s T");?>" required />

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />                    

                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Actualizar</button>
                    <button type='reset' class="btn btn-success">Limpiar</button>
                        </div>
                      </div>
                    </div></br></br>

                           </div>
                         </div>
                       </div>
                       <!-- Fin Seccion Cinco -->