<?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////


                          $result = pg_query($dbconn, "SELECT * FROM public.personal_grupos_guardia WHERE id = $id");
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

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Grupo de Guardia</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($reg['grupos_guardia_id']); ?>" name="" placeholder="Grupo de Guardia" readonly />
                      </div>
                    </div>
<?php
              $dato = $reg['fecha_asig'];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));
?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Entrada</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo $fecha; ?>" name="" placeholder="Fecha de entrada" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Hora de Entrada</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo $hora; ?>" name="" placeholder="Hora de Entrada" readonly/>
                      </div>
                    </div>
                    <?php 
                      }
                    ?>
                    <div class="ln_solid">

                    </div>


