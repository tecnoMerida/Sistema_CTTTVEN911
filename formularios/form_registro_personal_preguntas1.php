                       <!-- Seccion Seis -->
                       <form class="form-horizontal form-label-left" action="../insertar_usuario.php?ac=3" method="post" id="demo-form" data-parsley-validate>
                       <div class="panel">
                         <a class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                           <h4 class="panel-title">Pregunta Secreta</h4>
                         </a>
                         <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
                           <div class="panel-body">

                           <?php
                                 $ultimo_ps = pg_query($dbconn, "SELECT * FROM  preguntas_usuario WHERE id=(SELECT MAX(id) FROM preguntas_usuario) ");
                                  $ps_id = pg_fetch_array($ultimo_ps);
                             ?>

                           <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="pregunta_recuperacion_1">Pregunta 1</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="pregunta_recuperacion_1" id="pregunta_recuperacion_1" class="form-control" placeholder="Formula la pregunta uno" minlength="6" maxlength="200" value="<?php echo $ps_id['pregunta_recuperacion_1']; ?>" title="Pregunta uno para la recuperación de contraseña" pattern="[A-Za-zÑñ0-9 -]{6,200}" disabled />
                               </div>
                             </div>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="respuesta_recuperacion_1">Respuesta 1</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="respuesta_recuperacion_1" id="respuesta_recuperacion_1" class="form-control" placeholder="Ingrese respuesta uno" minlength="6" maxlength="200" value="<?php echo $ps_id['respuesta_recuperacion_1']; ?>" title="Respuesta a pregunta uno de recuperación de contraseña" pattern="[A-Za-zÑñ0-9 -]{6,200}" disabled />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="pregunta_recuperacion_2">Pregunta 2</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="pregunta_recuperacion_2" id="pregunta_recuperacion_2" class="form-control" placeholder="Formula la pregunta dos" minlength="6" maxlength="200" value="<?php echo $ps_id['pregunta_recuperacion_2']; ?>" title="Pregunta dos para la recuperación de contraseña" pattern="[A-Za-zÑñ0-9 -]{6,200}" disabled />
                               </div>
                             </div>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="respuesta_recuperacion_2">Respuesta 2</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="respuesta_recuperacion_2" id="respuesta_recuperacion_2" class="form-control" placeholder="Ingresa respuesta dos" minlength="6" maxlength="200" value="<?php echo $ps_id['respuesta_recuperacion_2']; ?>" title="Respuesta a pregunta dos de recuperación de contraseña" pattern="[A-Za-zÑñ0-9 -]{6,200}" disabled />
                               </div>
                             </div>

                             <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula1; ?>" required />


                           </div>
                         </div>
                       </div>
                       </form>
                       <!-- Fin Seccion Seis -->