                                       <!-- Seccion Tres -->
                                       <div class="panel">
                                         <a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                           <h4 class="panel-title">Dirección</h4>
                                         </a>
                                         <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                           <div class="panel-body">

                                             <?php
                                              $parroquia1 = $reg['parroquias_id'];
                                              $result2 = pg_query($dbconn, "SELECT * FROM parroquias WHERE id = $parroquia1 ");
                                              if (!$result2) {
                                                echo "Ocurrio un Error.\n";
                                                exit;
                                              }
                                              $reg2 = pg_fetch_array($result2);

                                              $municipio1 = $reg2['municipios_id'];
                                              $result3 = pg_query($dbconn, "SELECT * FROM municipios WHERE id = $municipio1 ");
                                              if (!$result3) {
                                                echo "Ocurrio un Error.\n";
                                                exit;
                                              }
                                              $reg3 = pg_fetch_array($result3);

                                              $estados1 = $reg3['estados_id'];
                                              $estados_consulta = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = $estados1 ");
                                              if (!$estados_consulta) {
                                                echo "Ocurrió un error.\n";
                                                exit;
                                              }
                                              $reg_est = pg_fetch_array($estados_consulta);

                                              // Creación y/o formación de la consulta.
                                              $result33 = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = 14 ");
                                              if (!$result33) {
                                                echo "Ocurrió un error.\n";
                                                exit;
                                              }
                                              ?>
                                             <div class="field item form-group">
                                               <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboEstado">Estado<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <select class="form-control" name="estados" id="cboEstado" title="Seleccione Estado para generar las otras consultas" required>
                                                   <option value="<?php echo $reg_est['id']; ?>"><?php echo $reg_est['nombre_estado']; ?></option>
                                                   <?php
                                                    // Validar el estatus de ejecución de la consulta.

                                                    while ($row = pg_fetch_array($result33)) {
                                                      echo "<option value='" . $row['id'] . "'>" . $row['nombre_estado'] . "</option>";
                                                    }
                                                    ?>
                                                 </select>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboMunicipio">Municipio<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <select class="form-control" name="municipios" id="cboMunicipio" title="Selecciones Municipio en que reside" required>
                                                   <option value='<?php echo $reg3['id']; ?>'><?php echo $reg3['nombre_municipio']; ?></option>

                                                 </select>
                                               </div>
                                             </div>


                                             <div class="field item form-group">
                                               <!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <select class="form-control" name="parroquias_id" id="cboParroquia" title="Seleccione Parroquia en que reside">
                                                   <option value="<?php echo $reg2['id']; ?>"><?php echo $reg2['nombre_parroquia']; ?></option>
                                                 </select>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <!-- // Seleccion del Sector donde ocurrio el evento //-->
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <select class="form-control" name="nombre_sector" id="cboSectores" title="Seleccione sector en que reside">
                                                   <option value="<?php echo $reg['nombre_sector']; ?>"><?php echo $reg['nombre_sector']; ?></option>
                                                 </select>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="avenida">Avenida<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <input type="text" name="avenida" id="avenida" class="form-control optional" placeholder="Ingrese avenida de residencia" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['avenida']); ?>" title="Llene este campo con la avenida de residencia, entre 0 y 40 dígitos" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" required />
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="calle">Calle</label>
                                               <div class="col-md-6 col-sm-6">
                                                 <input type="text" name="calle" id="calle" class="form-control optional" placeholder="Ingrese calle o vereda de residencia" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['calle']); ?>" title="Llene este campo con la calle o vereda de residencia, entre 0 y 40 dígitos" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" />
                                               </div>
                                               <div class="col-md-6 col-sm-6">
                                                 <p>Nota: números menores a 10<br /> agregar un 0 - Ej: 00</p>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="casa">Casa/Edificio<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <input type="text" name="casa" id="casa" class="form-control optional" placeholder="Ingrese casa o edificio de residencia" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['casa']); ?>" title="Llene este campo con el nombre o número de casa o edificio de residencia, entre 0 y 40 dígitos" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" required />
                                               </div>
                                               <div class="col-md-6 col-sm-6">
                                                 <p>Nota: números menores a 10<br /> agregar un 0 - Ej: 00</p>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="piso">Piso</label>
                                               <div class="col-md-6 col-sm-6">
                                                 <input type="text" name="piso" id="piso" class="form-control optional" placeholder="Ingrese piso del edificio" minlength="0" maxlength="10" value="<?php echo '0' . strtoupper($reg['piso']); ?>" title="Llene este campo con el número de piso del edificio de residencia, entre 0 y 10 dígitos" pattern="[0-9]{0,10}" data-validate-length-range="0,40" />
                                               </div>
                                               <div class="col-md-6 col-sm-6">
                                                 <p>Nota: números menores a 10<br /> agregar un 0 - Ej: 00</p>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" id="apto">Apartamento</label>
                                               <div class="col-md-6 col-sm-6">
                                                 <input type="text" name="apto" id="apto" class="form-control optional" placeholder="Ingrese número de apartamento" minlength="0" maxlength="10" value="<?php echo strtoupper($reg['apto']); ?>" title="Llene este campo con el número de apartamento del edificio de residencia, entre 0 y 10 dígitos" pattern="[A-Za-z0-9 -]{0,10}" data-validate-length-range="0,40" />
                                               </div>
                                               <div class="col-md-6 col-sm-6">
                                                 <p>Nota: números menores a 10<br /> agregar un 0 - Ej: 00</p>
                                               </div>
                                             </div>

                                             <div class="field item form-group">
                                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia">Punto de Referencia<span class="required">
                                                   <font COLOR="#FF0000">*</font>
                                                 </span></label>
                                               <div class="col-md-6 col-sm-6">
                                                 <input type="text" name="punto_referencia" id="punto_referencia" class="form-control optional" placeholder="Ingrese punto de referencia" minlength="4" maxlength="40" value="<?php echo strtoupper($reg['punto_referencia']); ?>" title="Llene este campo con un punto de referencia a la residencia, entre 4 y 40 dígitos" pattern="[A-Za-z0-9áéíóúüñÁÉÍÓÜÚÑ -]{4,40}" data-validate-length-range="4,40" required='required' />
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
                                       <!-- Fin Seccion Tres -->