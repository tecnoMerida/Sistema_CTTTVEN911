<?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////


                          $result = pg_query($dbconn, "SELECT * FROM public.control_bienes WHERE id = $id");
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
                    $result_control = pg_query($dbconn, "SELECT * FROM public.guardias WHERE control_bienes_id = $id");
                            $grupo_control=pg_fetch_array($result_control);
                            ?>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Grupo de Guardia</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" value="<?php echo strtoupper($grupo_control['grupos_guardia_id']); ?>" name="" placeholder="Grupo de Guardia" readonly />
                      </div>
                    </div>
<?php
              $dato = $reg['fecha_creacion'];
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
                    </div><br/><br/>

                <?php

                    $cadena = $reg['materiales_recibe'];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                    $reg1 = pg_fetch_array($consulta1);

                        $total_rows1 = pg_num_rows($consulta1);

                          if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 
                ?>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-6 col-sm-6  label-align"><?php echo $reg1['nombre_b']." (". $reg1['codigo_b'].") "; ?></label>
                      <div class="col-md-2 col-sm-2">
                      <input type="checkbox" class="flat" name="" id="" value="<?php echo $id; ?>" checked="" readonly>

                      </div>
                    </div>

                    <?php 
                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }
                      }
                    ?>
                    <div class="ln_solid">

                    </div>
