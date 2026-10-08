            <!-- Seccion Siete -->
            <form class="" action="" method="post" data-parsley-validate>
                <div class="panel">
                    <a class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                        <h4 class="panel-title">Usuario</h4>
                    </a>
                    <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">

                            <?php
                            $cedula_personal = $reg_id['cedula'];
                            $ultimo_usuario = pg_query($dbconn, "SELECT * FROM public.usuario WHERE personal_cedula = $cedula_personal ");
                            $reg_usuario = pg_fetch_array($ultimo_usuario);

                            ?>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Usuario</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="usuario" placeholder="Ingrese nombre usuario" required="required" title="Nombre de usuario, para acceder al sistema 'Libro Digital de Novedades 911'" value="<?php echo $reg_usuario['usuario']; ?>" disabled />
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Contraseña</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="contrasena" placeholder="Ingrese contraseña usuario" title="Contraseña de usuario, para acceder al sistema 'Libro Digital de Novedades 911'" value="********" disabled />
                                </div>
                            </div>

                            <?php
                            // Consulta a la Base de Datos
                            $rol = $reg_usuario['tipo_rol_id'];
                            $consulta_rol = pg_query($dbconn, "SELECT * FROM tipo_rol WHERE id = $rol");
                            if (!$consulta_rol) {
                                echo "Ocurrió un error.\n";
                                exit;
                            }
                            $reg_rol = pg_fetch_array($consulta_rol);
                            ?>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Rol</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="tipo_rol_id" title="Rol de usuario" value="<?php echo strtoupper($reg_rol['tipo_rol']); ?>" disabled />
                                </div>
                            </div>


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus Usuario</label>
                                <div class="col-md-6 col-sm-6">
                                    <p>
                                        <?php
                                        // Consulta a la Base de Datos
                                        $estado = $reg_usuario['estado_usuario_id'];
                                        if ($estado != 2) {
                                            echo '&nbsp; Activo&nbsp;<label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Usuario activo">
                                                <input type="radio" name="genero_id" value="1" class="flat" checked="checked" disabled ></label> ';
                                            echo '&nbsp; Inactivo&nbsp;
                                                <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Usuario inactivo"><input type="radio" name="genero_id" value="2" class="flat" disabled ></label>';
                                        } else {
                                            echo '&nbsp; Activo&nbsp;
                                                <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Usuario activo"><input type="radio" name="genero_id" value="1" class="flat" disabled ></label> ';
                                            echo '&nbsp; Inactivo&nbsp;
                                                <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Usuario inactivo"><input type="radio" name="genero_id" value="2" class="flat" checked disabled ></label> ';
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <input type="hidden" name="preguntas_seguridad_id" id="preguntas_seguridad_id" value="<?php echo $reg_usuario['preguntas_usuario_id']; ?>" required />

                            <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $reg_id['cedula']; ?>" required />

                            <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula1; ?>" required />

                            <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion = date("Y/n/j H:m:s"); ?>" required />

                        </div>
                    </div>
                </div>

            </form>
            <!-- Fin Seccion Siete -->