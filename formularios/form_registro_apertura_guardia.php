                        <div class="field item form-group"><!-- //     procedimiento realizado de la novedad   //  -->
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                          <div class="col-md-6 col-sm-6">
                            <textarea name="apertura_g" id="apertura_g" class="resizable_textarea form-control" placeholder="Escribe aquí apertura y recepción de guardia" maxlength="500" title="Llene este campo con una descripción al momento de la apertura y recepción de guardia" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.':;/-0-9]{8,500}" ></textarea>
                          </div>
                        </div>
                                 
                   <div><!-- // Registro de grupo de guardia tomada de tabla personal_guardia //-->
                         <input type="hidden" name="grupos_guardia_id" id="grupos_guardia_id" value="<?php echo $grupo_guardia; ?>" required />
                   </div>

                   <div><!-- // Registro de usuario de entrada toma valor de la tabla personal //  -->
                         <input type="hidden" name="usuario_entrada_id" id="usuario_entrada_id" value="<?php echo $cedula; ?>" required />
                   </div>

                   <div><!-- // Registro de Control de Bienes toma valor de tabla Control_bienes // -->
                         <input type="hidden" name="control_bienes_id" id="control_bienes_id" value="<?php echo $ultimo_control_bienes_id;?>" required />
                   </div>


                            <div class="ln_solid">
                              <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                  <button type='submit' class="btn btn-success">Guardar</button>
                                  <button type='reset' class="btn btn-primary">Limpiar</button>
                                </div>
                              </div>
                            </div> 