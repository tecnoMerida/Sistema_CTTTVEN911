    <!-- Seccion Cuatro -->
    <div class="panel">
        <a class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            <h4 class="panel-title">Laborales</h4>
        </a>
        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">

                <?php
                $organismos1 = $reg['organismos_id'];
                $result03 = pg_query($dbconn, "SELECT * FROM organismos WHERE id = $organismos1 ");
                if (!$result03) {
                    echo "Ocurrio un Error.\n";
                    exit;
                }
                $reg03 = pg_fetch_array($result03);

                // Consulta a la Base de Datos
                $result33 = pg_query($dbconn, "SELECT * FROM organismos");
                if (!$result33) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_id">Organismo<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select name="organismos_id" id="organismos_id" class="form-control" title="Seleccione el organismo de al cual pertenece" required>
                            <option value="<?php echo $reg03['id']; ?>"><?php echo strtoupper($reg03['nombre_oganismos']); ?></option>
                            <?php
                            while ($registro3 = pg_fetch_array($result33)) {
                            ?>
                                <option value="<?php echo $registro3[0] ?> "><?php echo strtoupper($registro3[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <?php
                $cargos1 = $reg['cargos_id'];
                $result04 = pg_query($dbconn, "SELECT * FROM cargos WHERE id = $cargos1 ");
                if (!$result04) {
                    echo "Ocurrio un Error.\n";
                    exit;
                }
                $reg04 = pg_fetch_array($result04);

                // Consulta a la Base de Datos
                $result4 = pg_query($dbconn, "SELECT * FROM cargos");
                if (!$result4) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cargos_id">Cargo<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select name="cargos_id" id="cargos_id" class="form-control" title="Seleccione el cargo asignado" required>
                            <option value="<?php echo $reg04['id']; ?>"><?php echo strtoupper($reg04['nombre_cargo']); ?></option>
                            <?php
                            while ($registro4 = pg_fetch_array($result4)) {
                            ?>
                                <option value="<?php echo $registro4[0] ?> "><?php echo strtoupper($registro4[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <?php
                $rango1 = $reg['rango_categoria_id'];
                $result05 = pg_query($dbconn, "SELECT * FROM rango_categoria WHERE id = $rango1 ");
                if (!$result05) {
                    echo "Ocurrio un Error.\n";
                    exit;
                }
                $reg05 = pg_fetch_array($result05);

                // Consulta a la Base de Datos
                $result5 = pg_query($dbconn, "SELECT * FROM rango_categoria");
                if (!$result5) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="rango_categoria_id">Rango<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select name="rango_categoria_id" id="rango_categoria_id" class="form-control" title="Seleccione el rango asignado o posee">
                            <option value="<?php echo $reg05['id']; ?>"><?php echo strtoupper($reg05['nombre_rango']); ?></option>
                            <?php
                            while ($registro5 = pg_fetch_array($result5)) {
                            ?>
                                <option name="id" value="<?php echo $registro5[0] ?> "><?php echo strtoupper($registro5[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <?php
                $grupo = $reg['grupo_guardia_id'];
                $result_10 = pg_query($dbconn, "SELECT * FROM grupos_guardia WHERE id = $grupo ");
                if (!$result_10) {
                    echo "Ocurrio un Error.\n";
                    exit;
                }
                $reg_10 = pg_fetch_array($result_10);

                // Consulta a la Base de Datos
                $result10 = pg_query($dbconn, "SELECT * FROM grupos_guardia");
                if (!$result10) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="grupo_guardia_id">Grupo<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select name="grupo_guardia_id" id="grupo_guardia_id" class="form-control" title="Seleccione el grupo de guardia asignado" required>
                            <option value="<?php echo $reg_10['id']; ?>"><?php echo strtoupper($reg_10['nombre_grupo']); ?></option>
                            <?php
                            while ($registro10 = pg_fetch_array($result10)) {
                            ?>
                                <option name="id" value="<?php echo $registro10[0] ?> "><?php echo strtoupper($registro10[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <?php
                $estatus1 = $reg['estatus_personal_id'];
                $result06 = pg_query($dbconn, "SELECT * FROM estatus_personal WHERE id = $estatus1 ");
                if (!$result06) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                $reg_est1 = pg_fetch_array($result06);
                // Consulta a la Base de Datos
                $result6 = pg_query($dbconn, "SELECT * FROM estatus_personal");
                if (!$result6) {
                    echo "Ocurrió un error.\n";
                    exit;
                }
                ?>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="estatus_personal_id">Estatus<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <select name="estatus_personal_id" id="estatus_personal_id" class="form-control" title="Seleccione el estatus en que se encuetra el personal">
                            <option value="<?php echo $reg_est1['id']; ?>"><?php echo strtoupper($reg_est1['estatus']); ?></option>
                            <?php
                            while ($registro6 = pg_fetch_array($result6)) {
                            ?>
                                <option name="id" value="<?php echo $registro6[0] ?> "><?php echo strtoupper($registro6[1]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $reg['fecha_creacion']; ?>" required />


                <input type="hidden" name="fecha_modificacion" id="fecha_modificacion" value="<?php echo $fecha_modificacion = date("Y/n/j H:m:s T"); ?>" required />

                <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula; ?>" required />

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
    <!-- Fin Seccion Cuatro -->