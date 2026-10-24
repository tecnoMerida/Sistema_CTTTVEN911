                                   <!-- Seccion Uno -->
                                   <div class="panel">
                                     <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                       <h4 class="panel-title">Datos Personales</h4>
                                     </a>
                                     <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                       <div class="panel-body">

                                         
                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="cedula">Cédula<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingrese número cédula" minlength="7" maxlength="8" value="<?php echo $cedula1; ?>" title="Llene este campo con el número de cédula, entre 7 y 8 dígitos" autofocus pattern="[0-9]{7,8}" required="required" readonly />
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre">Primer Nombre<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="p_nombre" id="p_nombre" class="form-control" placeholder="Ingrese primer nombre" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['p_nombre']); ?>" title="Llene este campo con el primer nombre, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_nombre">Segundo Nombre</label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="s_nombre" id="s_nombre" class="form-control" placeholder="Ingrese segundo nombre" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['s_nombre']); ?>" title="Llene este campo con el segundo nombre, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_apellido">Primer Apellido<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="p_apellido" id="p_apellido" class="form-control" placeholder="Ingrese primer apellido" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['p_apellido']); ?>" title="Llene este campo con el primer apellido, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_apelllido">Segundo Apellido</label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="s_apelllido" id="s_apelllido" class="form-control" placeholder="Ingrese segundo apellido" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['s_apelllido']); ?>" title="Llene este campo con el segundo apellido, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                                           </div>
                                         </div>

                                         <?php
                                          // Consulta a la Base de Datos mientras contenga variable almacenada
                                          $grado_01 = $reg['grado_instruccion_id'];
                                          $result1 = pg_query($dbconn, "SELECT * FROM grado_instruccion WHERE id = $grado_01 ");
                                          if (!$result1) {
                                            echo "Ocurrio un Error.\n";
                                            exit;
                                          }
                                          $reg1 = pg_fetch_array($result1);

                                          // Consulta a la Base de Datos para mostrar otros valores
                                          $result = pg_query($dbconn, "SELECT * FROM grado_instruccion ");
                                          if (!$result) {
                                            echo "Ocurrio un Error.\n";
                                            exit;
                                          }
                                          ?>
                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="grado_instruccion_id">Grado Instrucción<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <select name="grado_instruccion_id" id="grado_instruccion_id" class="form-control" title="Seleccione el grado de instrucción academica" required>
                                               <option value="<?php echo $reg1['id']; ?>"><?php echo strtoupper($reg1['grado_instruccion']); ?></option>
                                               <?php
                                                while ($registro = pg_fetch_array($result)) {
                                                ?>
                                                 <option name="id" value="<?php echo $registro[0] ?> "><?php echo strtoupper($registro[1]); ?></option>
                                               <?php
                                                }
                                                ?>
                                             </select>
                                           </div>
                                         </div>

                                         <?php
                                          // Consulta a la Base de Datos
                                          $genero1 = $reg['genero_id'];
                                          ?>
                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="genero_id">Género<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <p>
                                               <?php
                                                if ($genero1 == '1') {
                                                  echo 'Femenino'; ?>
                                                 <input type="radio" class="flat" name="genero_id" id="genero_id" value="1" checked />
                                                 <?php echo 'Masculino'; ?>
                                                 <input type="radio" class="flat" name="genero_id" id="genero_id" value="2" />
                                               <?php
                                                } else {
                                                  echo 'Femenino'; ?>
                                                 <input type="radio" class="flat" name="genero_id" id="genero_id" value="1" />
                                                 <?php echo 'Masculino'; ?>
                                                 <input type="radio" class="flat" name="genero_id" id="genero_id" value="2" checked />
                                               <?php
                                                }

                                                ?>
                                             </p>
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular">Teléfono Móvil<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="telefono_celular" id="telefono_celular" class="form-control" value="<?php echo $reg['telefono_celular']; ?>" title="Llene este campo con el número de teléfono móvil" placeholder="Ingrese número móvil" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                                           </div>
                                           <div class="col-md-6 col-sm-6">
                                             <p>Ej: (424) 765-4321</p>
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_casa">Teléfono Habitación<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <input type="text" name="telefono_casa" id="telefono_casa" class="form-control" value="<?php echo $reg['telefono_casa']; ?>" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                                           </div>
                                           <div class="col-md-6 col-sm-6">
                                             <p>Ej: (274) 262-4321</p>
                                           </div>
                                         </div>

                                         <div class="field item form-group">
                                           <label class="col-form-label col-md-3 col-sm-3  label-align" for="email">Email<span class="required">
                                               <font COLOR="#FF0000">*</font>
                                             </span></label>
                                           <div class="col-md-6 col-sm-6">
                                             <input class="form-control email" type="email" id="email" name="correo_electronico" value="<?php echo strtoupper($reg['correo_electronico']); ?>" title="Llene este campo con la dirección de correo electrónico" placeholder="Ingrese correo electrónico" data-validate-linked='email' data-parsley-trigger="change" required />
                                           </div>
                                           <div class="col-md-6 col-sm-6">
                                             <p>Ej: ejemplo@sistema911.com</p>
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
                                   <!-- Fin Seccion Uno -->