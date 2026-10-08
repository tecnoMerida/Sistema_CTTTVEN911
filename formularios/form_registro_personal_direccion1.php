                                       <!-- Seccion Tres -->
                                       <div class="panel">
                                           <a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                               <h4 class="panel-title">Dirección</h4>
                                           </a>
                                           <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                               <div class="panel-body">

                                                   <?php
                                                    // Creación y/o formación de la consulta.
                                                    $parroquia = $parroquias_id;
                                                    $consulta_parroq = pg_query($dbconn, "SELECT * FROM public.parroquias WHERE id = $parroquia");
                                                    $reg_parroquia = pg_fetch_array($consulta_parroq);

                                                    $municipio = $reg_parroquia['municipios_id'];
                                                    $consulta_munip = pg_query($dbconn, "SELECT * FROM public.municipios WHERE id = $municipio");
                                                    $reg_municipio = pg_fetch_array($consulta_munip);

                                                    $estado = $reg_municipio['estados_id'];
                                                    $consulta_estado = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = $estado ");
                                                    $reg_estado = pg_fetch_array($consulta_estado);
                                                    ?>
                                                   <div class="field item form-group">
                                                       <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Estado</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="hidden" class="form-control" name="estados" id="" title="" value="<?php echo $reg_municipio['estados_id']; ?>" readonly />
                                                           <input class="form-control" name="" id="" title="Estado de residencia" value="<?php echo $reg_estado['nombre_estado']; ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <!-- // Seleccion del Municipio donde ocurrio el evento //-->
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Municipio</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="hidden" class="form-control" name="municipios" id="" title="" value="<?php echo $reg_parroquia['municipios_id']; ?>" readonly />
                                                           <input class="form-control" name="" id="" title="Municipio de residencia" value="<?php echo $reg_municipio['nombre_municipio']; ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Parroquia</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="hidden" class="form-control" name="parroquias_id" id="" title="" value="<?php echo $parroquias_id; ?>" readonly />
                                                           <input class="form-control" name="" id="" title="Parroquia de residencia" value="<?php echo $reg_parroquia['nombre_parroquia']; ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <!-- // Seleccion del Sector donde ocurrio el evento //-->
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Sector</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control" name="nombre_sector" id="cboSectores" title="Sector de residencia" value="<?php echo $nombre_sector; ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Avenida</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control optional" name="avenida" placeholder="Ingrese avenida de residencia" title="Avenida de residencia" type="text" value="<?php echo strtoupper($avenida); ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Calle</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control optional" name="calle" placeholder="Ingrese calle o vereda de residencia" title="Calle o vereda de residencia" type="text" value="<?php echo strtoupper($calle); ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Casa/Edificio</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control optional" name="casa" placeholder="Ingrese casa o edificio de residencia" title="Nombre o número de casa o edificio de residencia" type="text" value="<?php echo strtoupper($casa); ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Piso</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control optional" name="piso" placeholder="Ingrese piso del edificio" title="Número de piso del edificio de residencia" type="number" value="<?php echo strtoupper($piso); ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Apartamento</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control optional" name="apto" placeholder="Ingrese número de apartamento" title="Número de apartamento del edificio de residencia" type="text" value="<?php echo strtoupper($apto); ?>" readonly />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align">Punto de Referencia</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input class="form-control optional" name="punto_referencia" placeholder="Ingrese punto de referencia" title="Punto de referencia a la residencia" type="text" value="<?php echo strtoupper($punto_referencia); ?>" readonly />
                                                       </div>
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                       <!-- Fin Seccion Tres -->