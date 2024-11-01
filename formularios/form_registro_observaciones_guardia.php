                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="notas" role="tabpanel" aria-labelledby="notas-tab">
                          <label for="notas">Escribe aquí notas importantes (entre 20 y 500 caracteres) :</label>
                          <textarea id="notas" class="form-control" name="notas" data-parsley-trigger="keyup" data-parsley-maxlength="500" placeholder="Escribe aqu&iacute la nota" title="Llene este campo con notas de importancia" data-parsley-minlength-message="Debes de ingresar un minimo de 20 caracteres" ></textarea>
                      </div>
                      <div class="tab-pane fade" id="apoyo" role="tabpanel" aria-labelledby="apoyo-tab">
                          <label for="apoyo_adm">Escribe aquí apoyo administrativo recibido (entre 20 y 500 caracteres) :</label>
                          <textarea id="apoyo_adm" class="form-control" name="apoyo_adm" data-parsley-trigger="keyup" data-parsley-maxlength="500" placeholder="Escribe aqu&iacute el tipo de Apoyo administrativo" title="Llene este campo con apoyo administrativo recibido" data-parsley-minlength-message="Debes de ingresar un minimo de 20 caracteres" ></textarea>
                      </div>
                      <div class="tab-pane fade" id="pendiente" role="tabpanel" aria-labelledby="pendiente-tab">
                          <label for="acciones_pen">Escribe aquí acciones pendientes del equipo (entre 20 y 500 caracteres) :</label>
                          <textarea id="acciones_pen" class="form-control" name="acciones_pen" data-parsley-trigger="keyup" data-parsley-maxlength="500" placeholder="Escribe aqu&iacute las acciones pendientes" title="Llene este campo con acciones pendientes" data-parsley-minlength-message="Debes de ingresar un minimo de 20 caracteres" ></textarea>
                      </div>
                      <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="anexos-tab">
                          <label for="anexo">Escribe aquí anexos, cualquier otro comentario (entre 20 y 500 caracteres) :</label>
                          <textarea id="anexo" class="form-control" name="anexo" data-parsley-trigger="keyup" data-parsley-maxlength="500" placeholder="Escribe aqu&iacute los anexos" title="Llene este campo con algun otro de importancia" data-parsley-minlength-message="Debes de ingresar un minimo de 20 caracteres" ></textarea>
                      </div>
                    </div>

                    <input type="hidden" name="cedula_usuario" value="<?php echo $cedula_personal; ?>">

                    <input type="hidden" name="organismos_id" value="<?php echo $organismo; ?>">

                    <input type="hidden" name="guardias_id" value="<?php echo $grupos01; ?>">

                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type='submit' class="btn btn-success">Guardar</button>
                            <button type='reset' class="btn btn-primary">Limpiar</button>
                        </div>
                      </div>
                    </div>
