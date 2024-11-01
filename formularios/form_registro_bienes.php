

                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>
                    
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="codigo_b">Código<span 
                        class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="codigo_b" id="codigo_b" class="form-control" placeholder="Ingrese código bienes" minlength="5" maxlength="20" title="Llene este campo con el código de bienes, entre 5 y 20 dígitos" autofocus pattern="[A-Za-z0-9 /-]{5,20}" required  />
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <p>Ej: TT-01-1234-ABCD-00DD</p>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_b">Nombre<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="nombre_b" id="nombre_b" class="form-control" placeholder="Ingrese nombre del bienes" minlength="3" maxlength="20" title="Llene este campo con el nombre del bienes, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9 ]{3,20}" required />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="marca_b">Marca<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="marca_b" id="marca_b" class="form-control" placeholder="Ingrese marca del bienes" required minlength="2" maxlength="20" title="Llene este campo con la marca del bienes, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9]{2,20}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="modelo_b">Modelo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="modelo_b" id="modelo_b" class="form-control" placeholder="Ingrese modelo del bienes" required minlength="3" maxlength="20" title="Llene este campo con el modelo del bienes, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9-]{3,20}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="color_b">Color<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="color_b" id="color_b" class="form-control" placeholder="Ingrese color del bienes" required minlength="4" maxlength="50" title="Llene este campo con el color del bienes" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9 ]{4,50}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="serial_b">Serial<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="serial_b" id="serial_b" class="form-control" placeholder="Ingrese serial del bienes" required minlength="4" maxlength="50" title="Llene este campo con el serial del bienes" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9/-]{4,50}" />
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <p>Ej: ABCD-0000-ABCD-0000</p>
                      </div>
                    </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_b">Descripción<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="descripcion_b" id="observaciones_b" class="resizable_textarea form-control" placeholder="Ingrese alguna descripción del bienes, con caráteristicas que éste posee" minlength="8" maxlength="400" title="Llene este campo con alguna descripción del bienes" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.':;=-]{8,400}" /></textarea>
                        </div>
                      </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_ingreso_b">Fecha Ingreso<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" name="fecha_ingreso_b" id="fecha_ingreso_b" class="form-control" placeholder="Seleccione la fecha" required title="Seleccione una fecha de ingreso de bienes para este campo " />
                      </div>
                    </div>

                      <!-- contiene input de la institucion al que pertenece los bienes -->
                        <input type="hidden" class="form-control" name="direccion" placeholder="Ingrese dirección a la que pertenece" value="M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ" required minlength="3" maxlength="60" title="Llene este campo la Institución a la que pertenece" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9]{3,60}"/>

                      <!-- contiene input de la coordinación al que pertenece los bienes -->
                        <input type="hidden" class="form-control" name="coordinacion" placeholder="Ingrese coordinación a la que pertenece" value="EMERGENCIAS 911" required minlength="3" maxlength="60" title="Llene este campo con la coordinación a la que pertenece" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9]{3,60}"/>


                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones">Observaciones<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="observaciones" id="observaciones" class="resizable_textarea form-control" placeholder="Ingrese alguna observación del bienes, con algún cámbio, defecto o modificación" minlength="8" maxlength="400" title="Llene este campo con alguna observación del bienes" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.';:=-]{8,400}" /></textarea>

                        </div>
                      </div>
                      <?php
                      // Consulta a la Base de Datos
                          $result = pg_query($dbconn, "SELECT * FROM ubicacion_bienes");
                          if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="ubicacion_bienes_id">Ubicación<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="ubicacion_bienes_id" id="ubicacion_bienes_id" title="Seleccione este campo con la ubicación del bienes" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro=pg_fetch_array($result))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro[0] ?> "><?php echo strtoupper($registro[1]) ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>
                      <?php
                      // Consulta a la Base de Datos
                          $result1 = pg_query($dbconn, "SELECT * FROM estado_bien");
                          if (!$result1) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="estado_bien_id">Estado<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="estado_bien_id" id="estado_bien_id" title="Seleccione en este campo el estado del bienes" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro1=pg_fetch_array($result1))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro1[0] ?> "><?php echo strtoupper($registro1[1]) ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_estado">Fecha Estado<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" name="fecha_estado" id="fecha_estado" class="form-control" placeholder="Seleccione la fecha" required title="Seleccione una fecha del estado del bienes " />
                      </div>
                    </div>
                      <?php
                      // Consulta a la Base de Datos
                          $result2 = pg_query($dbconn, "SELECT * FROM organismos");
                          if (!$result2) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_id">Organismo<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="organismos_id" id="organismos_id" title="Seleccione en este campo para la asignación del bienes al organismo" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro2=pg_fetch_array($result2))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro2[0] ?> "><?php echo strtoupper($registro2[1]) ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                      <!-- contiene input de la fecha de creación de los bienes -->

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />
                    
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-success">Guardar</button>
                    <button type='reset' class="btn btn-primary">Limpiar</button>
                        </div>
                      </div>
                    </div>


  <!-- ***********    Fin Formulario Registro de Bienes    ************************ -->

