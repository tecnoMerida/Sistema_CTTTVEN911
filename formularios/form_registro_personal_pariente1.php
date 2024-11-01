                     <!-- Seccion Cinco -->
                     <form class="form-horizontal form-label-left" action="" method="post" id="demo-form" data-parsley-validate>
                       <div class="panel">
                         <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           <h4 class="panel-title">Pariente</h4>
                         </a>
                         <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                           <div class="panel-body">

                             <?php
                              $cedula_personal = $reg_id['cedula'];

                              $ultimo_pariente = pg_query($dbconn, "SELECT * FROM public.parantesco_personal WHERE personal_cedula = $cedula_personal ");
                              $reg_pariente = pg_fetch_array($ultimo_pariente);

                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Cédula</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" class="form-control" name="cedula_p" placeholder="Ingrese número cédula" title="Número de cédula del familiar" value="<?php echo $reg_pariente['cedula_p']; ?>" disabled />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Nombre</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" class="form-control" name="nombre_p" placeholder="Ingrese primer nombre" title="Primer nombre del familiar" value="<?php echo strtoupper($reg_pariente['nombre_p']); ?>" disabled />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" class="form-control" name="apellido_p" placeholder="Ingrese primer apellido" title="Primer apellido del familiar" value="<?php echo strtoupper($reg_pariente['apellido_p']); ?>" disabled />
                               </div>
                             </div>

                             <input type="hidden" class="form-control" name="apellido_p" placeholder="Ingrese primer apellido" title="Primer apellido del familiar" value="<?php echo $reg_pariente['telefono_p']; ?>" disabled />

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Teléfono</label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" class="form-control" name="telefono_p" title="Número de teléfono del familiar" placeholder="Ingrese número teléfono" data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" value="<?php echo $reg_pariente['telefono_p']; ?>" disabled />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Observaciones</label>
                               <div class="col-md-6 col-sm-6">
                                 <textarea type="text" name="observaciones_p" id="observaciones_p" class="resizable_textarea form-control" placeholder="Ingrese alguna observacion del familiar" maxlength="400" title="Observación necesaria para el familiar" disabled /><?php echo strtoupper($reg_pariente['observaciones_p']); ?></textarea>
                               </div>
                             </div>

                             <?php
                              // Consulta a la Base de Datos
                              $tipo_p = $reg_pariente['tipo_parenstesco_id'];
                              $consulta_tipo_p = pg_query($dbconn, "SELECT * FROM tipo_parenstesco WHERE id = $tipo_p");
                              if (!$consulta_tipo_p) {
                                echo "Ocurrió un error.\n";
                                exit;
                              }
                              $reg_tipo = pg_fetch_array($consulta_tipo_p);
                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Parentesco</label>
                               <div class="col-md-6 col-sm-6">
                                 <input class="form-control" name="tipo_parenstesco_id" title="Parentesco del familiar" value="<?php echo strtoupper($reg_tipo['tipo_par']); ?>" disabled>

                               </div>
                             </div>


                             <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $reg_id['cedula']; ?>" required />

                             <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula1; ?>" required />

                             <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion = date("Y/n/j H:m:s"); ?>" required />

                           </div>
                         </div>
                       </div>
                       </form>
                       <!-- Fin Seccion Cinco -->