                                   <!-- Seccion Uno -->
                                   <div class="panel">
                                       <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                           <h4 class="panel-title">Datos Personales</h4>
                                       </a>
                                       <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                           <div class="panel-body">

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Cédula</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" name="cedula" placeholder="Número cédula" title="Número de cédula" value="<?php echo $cedula; ?>" readonly />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Nombre</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" name="p_nombre" placeholder="Primer nombre" required="required" title="Primer nombre" value="<?php echo strtoupper($p_nombre); ?>" readonly />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Nombre</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" name="s_nombre" placeholder="Segundo nombre" title="Segundo nombre" value="<?php echo strtoupper($s_nombre); ?>" readonly />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" name="p_apellido" placeholder="Primer apellido" title="Primer apellido" value="<?php echo strtoupper($p_apellido); ?>" readonly />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Apellido</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" name="s_apelllido" placeholder="Segundo apellido" title="Segundo apellido" value="<?php echo strtoupper($s_apelllido); ?>" readonly />
                                                   </div>
                                               </div>

                                               <?php
                                                // Consulta a la Base de Datos
                                                $grado_inst = $grado_instruccion_id;
                                                $result = pg_query($dbconn, "SELECT * FROM public.grado_instruccion WHERE id = $grado_inst ");
                                                if (!$result) {
                                                    echo "Ocurrió un error.\n";
                                                    exit;
                                                }
                                                $registro = pg_fetch_array($result);
                                                ?>
                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Grado Instrucción</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input type="hidden" class="form-control" name="grado_instruccion_id" title="" value="<?php echo $grado_instruccion_id; ?>" readonly />
                                                       <input class="form-control" name="" title="Grado de instrucción academica" value="<?php echo strtoupper($registro['grado_instruccion']); ?>" disabled />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Género</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <p>
                                                           <?php
                                                            // Consulta a la Base de Datos
                                                            $genero = $genero_id;
                                                            if ($genero != 2) {
                                                                echo '&nbsp; Femenino&nbsp;
                                    <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Género femenino">
                                        <input type="radio" name="genero_id" value="1" class="flat" checked="checked" disabled ></label> ';
                                                                echo '&nbsp; Masculino&nbsp;
                                    <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Género masculino">
                                        <input type="radio" name="genero_id" value="2" class="flat" disabled ></label>';
                                                            } else {
                                                                echo '&nbsp; Femenino&nbsp;
                                    <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Género femenino">
                                        <input type="radio" name="genero_id" value="1" class="flat" disabled ></label> ';
                                                                echo '&nbsp; Masculino&nbsp;
                                    <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Género masculino">
                                        <input type="radio" name="genero_id" value="2" class="flat" checked disabled ></label> ';
                                                            }
                                                            ?>
                                                           <input type="hidden" class="form-control" name="genero_id" title="" value="<?php echo $genero_id; ?>" readonly />
                                                       </p>
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Telefono Móvil</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input type="text" class="form-control" name="telefono_celular" title="Número de teléfono móvil" placeholder="Número móvil" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" value="<?php echo $telefono_celular; ?>" readonly />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Telefono Habitación</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input type="text" class="form-control" name="telefono_casa" title="Número de teléfono de habitación" placeholder="Número habitación" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" value="<?php echo $telefono_casa; ?>" readonly />
                                                   </div>
                                               </div>

                                               <div class="field item form-group">
                                                   <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                                                   <div class="col-md-6 col-sm-6">
                                                       <input class="form-control email" type="email" id="email" name="correo_electronico" title="Dirección de correo electrónico" placeholder="Correo electrónico" data-validate-linked="email" value="<?php echo strtoupper($correo_electronico); ?>" readonly />
                                                   </div>
                                               </div>

                                           </div>
                                       </div>
                                   </div>
                                   <!-- Fin Seccion Uno -->