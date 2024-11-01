<?php
            $result = pg_query($dbconn, "SELECT * FROM public.observaciones WHERE id = $id");
                if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }


                              while($reg=pg_fetch_array($result))
                              { 

                $dato = $reg[5];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato)); 
          ?>
                    <div class="tab-content" id="myTabContent">
                      <!--
                        * Sección de Notas
                       --> 
                      <div class="tab-pane fade show active" id="notas" role="tabpanel" aria-labelledby="notas-tab">

                    <div class="field item form-group">
                      <label class="col-form-label col-md-2 col-sm-2  label-align">Fecha</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $fecha; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>

                      <label class="col-form-label col-md-1 col-sm-1  label-align">Hora</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $hora; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                          <label for="notas"></label>
                          <textarea id="notas" class="form-control" name="notas" placeholder="Escribe aqu&iacute la nota" title="Llene este campo con notas de importancia" value="<?php echo $reg['notas']; ?>" readonly ><?php echo strtoupper($reg['notas']); ?></textarea>
                      </div>

                      <!--
                        * Sección de Apoyo administrativo
                      -->
                      <div class="tab-pane fade" id="apoyo" role="tabpanel" aria-labelledby="apoyo-tab">

                    <div class="field item form-group">
                      <label class="col-form-label col-md-2 col-sm-2  label-align">Fecha</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $fecha; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>

                      <label class="col-form-label col-md-1 col-sm-1  label-align">Hora</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $hora; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                          <label for="apoyo_adm"></label>
                          <textarea id="apoyo_adm" class="form-control" name="apoyo_adm" placeholder="Escribe aqu&iacute el tipo de apoyo administrativo" title="Llene este campo con apoyo administrativo recibido" value="<?php echo $reg['apoyo_adm']; ?>" readonly ><?php echo strtoupper($reg['apoyo_adm']); ?></textarea>
                      </div>

                      <!--
                        * Sección de Acciones pendiente
                      -->
                      <div class="tab-pane fade" id="pendiente" role="tabpanel" aria-labelledby="pendiente-tab">

                    <div class="field item form-group">
                      <label class="col-form-label col-md-2 col-sm-2  label-align">Fecha</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $fecha; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>

                      <label class="col-form-label col-md-1 col-sm-1  label-align">Hora</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $hora; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                          <label for="acciones_pen"></label>
                          <textarea id="acciones_pen" class="form-control" name="acciones_pen" placeholder="Escribe aqu&iacute las acciones pendientes" title="Llene este campo con acciones pendientes" value="<?php echo $reg['acciones_pen']; ?>" readonly ><?php echo strtoupper($reg['acciones_pen']); ?></textarea>
                      </div>

                      <!--
                        * Sección de Anexos
                      -->
                      <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="anexos-tab">

                    <div class="field item form-group">
                      <label class="col-form-label col-md-2 col-sm-2  label-align">Fecha</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $fecha; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>

                      <label class="col-form-label col-md-1 col-sm-1  label-align">Hora</label>
                      <div class="col-md-3 col-sm-3">
                        <input class="form-control" value="<?php echo $hora; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                          <label for="anexo"></label>
                          <textarea id="anexo" class="form-control" name="anexo" placeholder="Escribe aqu&iacute los anexos" title="Llene este campo con algun otro de importancia" value="<?php echo $reg['anexo']; ?>" readonly ><?php echo strtoupper($reg['anexo']); ?></textarea>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
<?php } ?>