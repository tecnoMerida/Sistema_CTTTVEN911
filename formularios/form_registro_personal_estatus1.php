                                       <!-- Seccion Dos -->
                                       <div class="panel">
                                           <a class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                               <h4 class="panel-title">Estatus Familiar</h4>
                                           </a>
                                           <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                               <div class="panel-body">

                                                   <?php
                                                    // Consulta a la Base de Datos
                                                    $estado_c = $estado_civil_id;
                                                    $result2 = pg_query($dbconn, "SELECT * FROM estado_civil WHERE id = $estado_c");
                                                    if (!$result2) {
                                                        echo "Ocurrió un error.\n";
                                                        exit;
                                                    }

                                                    $registro2 = pg_fetch_array($result2);
                                                    ?>
                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Estado Civíl</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="hidden" class="form-control" name="estado_civil_id" title="Estado civil" value="<?php echo $estado_civil_id; ?>" readonly />
                                                           <input class="form-control" name="" title="Seleccione el estado civil" value="<?php echo strtoupper($registro2['estado_civil']); ?>" disabled />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Hijos</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <p>
                                                               <?php
                                                                // Consulta a la Base de Datos
                                                                $hijos1 = $hijos;
                                                                if ($hijos1 != 0) {
                                                                    echo '&nbsp; SI&nbsp;
                <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderM" value="1" class="flat" checked="checked" disabled ></label> ';
                                                                    echo '&nbsp; NO&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderF" value="0" class="flat" disabled ></label>';
                                                                } else {
                                                                    echo '&nbsp; SI&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderM" value="1" class="flat" disabled ></label> ';
                                                                    echo '&nbsp; NO&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderF" value="0" class="flat" checked disabled ></label> ';
                                                                }

                                                                ?>
                                                               <input type="hidden" class="form-control" name="hijos" title="" value="<?php echo $hijos; ?>" readonly />
                                                           </p>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Número de Hijos</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control" type="number" class='number' name="numero_hijos" placeholder="Ingrese número de hijos" title="Número de hijos" value="<?php echo $numero_hijos; ?>" readonly />
                                                       </div>
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                       <!-- Fin Seccion Dos -->