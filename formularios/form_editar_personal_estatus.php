                                       <!-- Seccion Dos -->
                                       <div class="panel">
                                           <a class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                               <h4 class="panel-title">Estatus Familiar</h4>
                                           </a>
                                           <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                               <div class="panel-body">

                                                   <?php
                                                    // Consulta a la Base de Datos mientras contenga variable almacenada
                                                    $estado_01 = $reg['estado_civil_id'];
                                                    $result11 = pg_query($dbconn, "SELECT * FROM estado_civil WHERE id = $estado_01 ");
                                                    if (!$result11) {
                                                        echo "Ocurrio un Error.\n";
                                                        exit;
                                                    }
                                                    $reg22 = pg_fetch_array($result11);

                                                    // Consulta a la Base de Datos para mostrar otros valores
                                                    $result22 = pg_query($dbconn, "SELECT * FROM estado_civil");
                                                    if (!$result22) {
                                                        echo "Ocurrió un error.\n";
                                                        exit;
                                                    }
                                                    ?>
                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="estado_civil_id">Estado Civíl<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <select name="estado_civil_id" id="estado_civil_id" class="form-control" title="Seleccione el estado civil" required>
                                                               <option value="<?php echo $reg22['id']; ?>"><?php echo strtoupper($reg22['estado_civil']); ?></option>
                                                               <?php
                                                                while ($registro22 = pg_fetch_array($result22)) {
                                                                ?>
                                                                   <option value="<?php echo $registro22[0] ?> "><?php echo strtoupper($registro22[1]); ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="genero_id">Hijos<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <p>
                                                               <?php
                                                                $hijos1 = $reg['hijos'];
                                                                if ($hijos1 == 't') {
                                                                    echo 'Si:'; ?>
                                                                   <input type="radio" class="flat" name="hijos" title="Seleccione Si tiene hijos" id="genero_id" value="t" checked />
                                                                   <?php echo 'No:'; ?>
                                                                   <input type="radio" class="flat" name="hijos" title="Seleccione No tiene hijos" id="genero_id" value="f" />
                                                               <?php
                                                                } else {
                                                                    echo 'Si:'; ?>
                                                                   <input type="radio" class="flat" name="hijos" title="Seleccione Si tiene hijos" id="genero_id" value="t" />
                                                                   <?php echo 'No:'; ?>
                                                                   <input type="radio" class="flat" name="hijos" title="Seleccione No tiene hijos" id="genero_id" value="f" checked />
                                                               <?php
                                                                }

                                                                ?>
                                                           </p>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Número de Hijos<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="number" name="numero_hijos" class="form-control number optional" placeholder="Ingrese número de hijos" value="<?php echo '0' . $reg['numero_hijos']; ?>" title="Ingrese un número de hijos, en caso de no poseer indique 0" min="0" max="10" step="1" required>
                                                       </div>
                                                   </div>

                                                   <div class="ln_solid">
                                                       <div class="form-group">
                                                           <div class="col-md-6 offset-md-3">
                                                               <button type='submit' class="btn btn-primary">Actualizar</button>
                                                               <button type='reset' class="btn btn-success">Limpiar</button>
                                                           </div>
                                                       </div>
                                                   </div><br/><br/>

                                               </div>
                                           </div>
                                       </div>
                                       <!-- Fin Seccion Dos -->