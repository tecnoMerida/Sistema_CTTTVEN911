<?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////

if ($fecha != ''){
                $result = pg_query($dbconn, "SELECT personal_guardias.fecha_ingreso_g, personal_guardias.descripcion, observaciones_entrada.tipo_obse_e, personal.p_nombre, personal.p_apellido FROM public.personal_guardias INNER JOIN observaciones_entrada ON observaciones_entrada.id = personal_guardias.observaciones_entrada_id INNER JOIN personal ON personal.cedula = personal_guardias.personal_cedula WHERE personal_guardias.id = $id");
                if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }


                              while($reg=pg_fetch_array($result))
                              { 
?>
                         <div class="field item form-group">
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"  type="hidden" value="<?php echo $id; ?>" name="id" />
                      </div>
                    </div>
          <?php
                $dato = $reg[0];
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
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg[2]);  ?>" name="" placeholder="Tipo de Observacion" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Personal</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg[3]); echo ' '; echo strtoupper($reg[4]);  ?>" name="" placeholder="Personal a quien se le realiza la observación" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción</label>
                      <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" value="<?php echo $reg[1];  ?>" name="" placeholder="Descripción de Observación" readonly><?php echo $reg[1];  ?></textarea>
                      </div>
                    </div>      
<?php
          }      
      }else{



             $result = pg_query($dbconn, "SELECT personal_guardias.fecha_salida_g, personal_guardias.descripcion, observaciones_salida.tipo_obse_s, personal.p_nombre, personal.p_apellido   FROM public.personal_guardias INNER JOIN observaciones_salida ON observaciones_salida.id = personal_guardias.observaciones_salida_id INNER JOIN personal ON personal.cedula = personal_guardias.personal_cedula WHERE personal_guardias.id = $id");
             if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }

                              while($reg=pg_fetch_array($result))
                              { 
?>
                         <div class="field item form-group">
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"  type="hidden" value="<?php echo $id; ?>" name="id" />
                      </div>
                    </div>
          <?php
                $dato = $reg[0];
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
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg[2]);  ?>" name="" placeholder="Tipo de Observacion" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Personal</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg[3]); echo ' '; echo strtoupper($reg[4]);  ?>" name="" placeholder="Personal a quien se le realiza la observación" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción</label>
                      <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" value="<?php echo $reg[1];  ?>" name="" placeholder="Descripción de Observación" readonly><?php echo $reg[1];  ?></textarea>
                      </div>
                    </div> 





                    <?php 
                  }
        }

                    ?>
