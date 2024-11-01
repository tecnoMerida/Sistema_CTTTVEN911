<?php
            $result = pg_query($dbconn, "SELECT * FROM public.guardias WHERE id = $id");
                if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }


                              while($reg=pg_fetch_array($result))
                              { 

                $dato = $reg[1];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato)); 
          ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo $fecha; ?>" name="" placeholder="Fecha de Observación" readonly />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Hora</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo $hora;  ?>" name="" placeholder="Hora de Observación" readonly/>
                      </div>
                    </div>

                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción</label>
                          <div class="col-md-6 col-sm-6">
                            <textarea type="text" name="apertura_g" id="apertura_g" class="resizable_textarea form-control" placeholder="Escribe aquí apertura y recepción de guardia" value="<?php echo $reg[3];  ?>" title="Llene este campo con una descripción al momento de la apertura y recepción de guardia" readonly><?php echo strtoupper($reg[3]);  ?></textarea>
                          </div>
                        </div>

                    <div class="ln_solid"></div> 
                 <?php 
                  }
                ?>