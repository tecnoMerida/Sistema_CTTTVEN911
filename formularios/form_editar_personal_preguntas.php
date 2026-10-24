                       <!-- Seccion Seis -->

                       <div class="panel">
                           <a class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                               <h4 class="panel-title">Pregunta Secreta</h4>
                           </a>
                           <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
                               <div class="panel-body">

                                   <div class="field item form-group">
                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="pregunta_recuperacion_1">Pregunta 1<span class="required">
                                           <font COLOR="#FF0000">*</font></span></label>
                                       <div class="col-md-6 col-sm-6">
                                           <input type="text" name="pregunta_recuperacion_1" id="pregunta_recuperacion_1" class="form-control" placeholder="Formula la pregunta 01" minlength="6" maxlength="200" value="<?php echo $ps_id['pregunta_recuperacion_1']; ?>" title="Pregunta uno para la recuperación de contraseña, entre 6 y 200 dígitos" pattern="[A-Za-zÑñ0-9 -]{6,200}" required />
                                       </div>
                                       <div class="col-md-6 col-sm-6">
                                 <p>Ej: Cual era el nombre del perro</br>del libertador</p>
                               </div>
                                    </div>
                                   <div class="field item form-group">
                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="respuesta_recuperacion_1">Respuesta 1<span class="required">
                                           <font COLOR="#FF0000">*</font></span></label>
                                       <div class="col-md-6 col-sm-6">
                                           <input type="text" name="respuesta_recuperacion_1" id="respuesta_recuperacion_1" class="form-control" placeholder="Ingrese respuesta 01" minlength="3" maxlength="200" value="<?php echo $ps_id['respuesta_recuperacion_1']; ?>" title="Respuesta a pregunta uno de recuperación de contraseña, entre 3 y 200 dígitos" pattern="[A-Za-zÑñ0-9 -]{3,200}" required />
                                       </div>
                                   </div>

                                   <div class="field item form-group">
                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="pregunta_recuperacion_2">Pregunta 2<span class="required">
                                           <font COLOR="#FF0000">*</font></span></label>
                                       <div class="col-md-6 col-sm-6">
                                           <input type="text" name="pregunta_recuperacion_2" id="pregunta_recuperacion_2" class="form-control" placeholder="Formula la pregunta 02" minlength="6" maxlength="200" value="<?php echo $ps_id['pregunta_recuperacion_2']; ?>" title="Pregunta dos para la recuperación de contraseña, entre 6 y 200 dígitos" pattern="[A-Za-zÑñ0-9 -]{6,200}" required />
                                       </div>
                                       <div class="col-md-6 col-sm-6">
                                 <p>Ej: Cual es la marca de mi primer</br>vehículo</p>
                               </div>
                                    </div>
                                   <div class="field item form-group">
                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="respuesta_recuperacion_2">Respuesta 2<span class="required">
                                           <font COLOR="#FF0000">*</font></span></label>
                                       <div class="col-md-6 col-sm-6">
                                           <input type="text" name="respuesta_recuperacion_2" id="respuesta_recuperacion_2" class="form-control" placeholder="Ingresa respuesta 02" minlength="3" maxlength="200" value="<?php echo $ps_id['respuesta_recuperacion_2']; ?>" title="Respuesta a pregunta dos de recuperación de contraseña, entre 3 y 200 dígitos" pattern="[A-Za-zÑñ0-9 -]{3,200}" required />
                                       </div>
                                   </div>

                                   <input type="hidden" name="id" id="id" value="<?php echo $ps_id['id']; ?>" required />
                                   <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $cedula1; ?>" required />

                                   <input type="hidden" name="fecha_modificacion" id="fecha_modificacion" value="<?php echo $fecha_modificacion = date("Y/n/j H:m:s"); ?>" required />

                                   <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula; ?>" required />


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

                       <!-- Fin Seccion Seis -->