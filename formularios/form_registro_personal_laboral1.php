    <!-- Seccion Cuatro -->
    <div class="panel">
    <a class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        <h4 class="panel-title">Laborales</h4>
    </a>
    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">

            <?php
            // Consulta a la Base de Datos
            $organismo = $organismos_id;
            $consulta_org = pg_query($dbconn, "SELECT * FROM organismos WHERE id = $organismo");
            if (!$consulta_org) {
                echo "Ocurrió un error.\n";
                exit;
            }
            $reg_org = pg_fetch_array($consulta_org);
            ?>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Organismo</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="organismos_id" title="Organismo al cual pertenece" value="<?php echo strtoupper($reg_org['nombre_oganismos']); ?>" disabled />
                </div>
            </div>


            <?php
            // Consulta a la Base de Datos
            $cargo = $cargos_id;
            $consulta_cargo = pg_query($dbconn, "SELECT * FROM cargos WHERE id = $cargo");
            if (!$consulta_cargo) {
                echo "Ocurrió un error.\n";
                exit;
            }
            $reg_cargo = pg_fetch_array($consulta_cargo);
            ?>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Cargo</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="cargos_id" title="Cargo asignado" value="<?php echo strtoupper($reg_cargo['nombre_cargo']); ?>" disabled />
                </div>
            </div>


            <?php
            // Consulta a la Base de Datos
            $rango = $rango_categoria_id;
            $consulta_rango = pg_query($dbconn, "SELECT * FROM rango_categoria WHERE id = $rango");
            if (!$consulta_rango) {
                echo "Ocurrió un error.\n";
                exit;
            }
            $reg_rango = pg_fetch_array($consulta_rango);
            ?>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Rango</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="rango_categoria_id" title="Rango asignado o posee" value="<?php echo strtoupper($reg_rango['nombre_rango']); ?>" disabled />
                </div>
            </div>

            <?php
            // Consulta a la Base de Datos
            $grupo = $grupo_guardia_id;
            $consulta_grupo = pg_query($dbconn, "SELECT * FROM grupos_guardia WHERE id = $grupo");
            if (!$consulta_grupo) {
                echo "Ocurrió un error.\n";
                exit;
            }
            $reg_grupo = pg_fetch_array($consulta_grupo);
            ?>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Grupo</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="grupo_guardia_id" title="Grupo de guardia asignado" value="<?php echo strtoupper($reg_grupo['nombre_grupo']); ?>" disabled />
                </div>
            </div>

            <?php
            // Consulta a la Base de Datos
            $estatus = $estatus_personal_id;
            $consulta_estatus = pg_query($dbconn, "SELECT * FROM estatus_personal WHERE id = $estatus ");
            if (!$consulta_estatus) {
                echo "Ocurrió un error.\n";
                exit;
            }
            $reg_estatus = pg_fetch_array($consulta_estatus)
            ?>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" name="estatus_personal_id" title="Estatus en que se encuetra el personal" value="<?php echo strtoupper($reg_estatus['estatus']); ?>" disabled />
                </div>
            </div>


            <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion = date("Y/n/j H:m:s"); ?>" required />

            <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula1; ?>" required />

        </div>
    </div>
    </div>
    <!-- Fin Seccion Cuatro -->