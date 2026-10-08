       <!-- page content -->
       <div class="right_col" role="main">
           <div class="">
               <div class="page-title">
                   <div class="title_left">
                       <h4>REGISTRO PERSONAL</h4>
                   </div>

               </div>
               <div class="clearfix"></div>

               <div class="row">

                   <div class="col-md-12 col-sm-12 ">
                       <div class="x_panel">
                           <div class="x_title">
                               <h2>Datos Personales</h2>
                               <ul class="nav navbar-right panel_toolbox">
                                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                   </li>

                                   <li><a class="close-link"><i class="fa fa-close"></i></a>
                                   </li>
                               </ul>
                               <div class="clearfix"></div>
                           </div>
                           <div align="center">
                               <?php
                                if ($_GET['msg'] == "1") {
                                    echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El Número de Cédula ya Existe!!!</strong></div>';
                                }
                                if ($_GET['msg'] == "2") {
                                    echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Dirección Registrada con EXITO!!!</strong></div>';
                                } elseif ($_GET['msg'] == "3") {
                                    echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Dirección NO registrado</strong></div>';
                                }

                                ?>
                           </div>
                           <div class="x_content">


                               <!-- start accordion -->
                               <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                   <form class="form-horizontal form-label-left" action="../insertar_personal.php?ac=1" method="post" id="demo-form" data-parsley-validate>
                                       <!-- Seccion Uno -->
                                       <?php require 'form_registro_personal1.php'; ?>
                                       <!-- Fin Seccion Uno -->
                                       <!-- Seccion Dos -->
                                       <?php require 'form_registro_personal_estatus1.php'; ?>
                                       <!-- Fin Seccion Dos -->
                                       <!-- Seccion Tres -->
                                       <?php require 'form_registro_personal_direccion1.php'; ?>
                                       <!-- Fin Seccion Tres -->
                                       <!-- Seccion Cuatro -->
                                       <div class="panel">
                                           <a class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                               <h4 class="panel-title">Laborales</h4>
                                           </a>
                                           <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                                               <div class="panel-body">

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                                                       </div>
                                                   </div>

                                                   <?php
                                                    // Consulta a la Base de Datos
                                                    $result3 = pg_query($dbconn, "SELECT * FROM organismos");
                                                    if (!$result3) {
                                                        echo "Ocurrió un error.\n";
                                                        exit;
                                                    }
                                                    ?>
                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_id">Organismo<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <select class="form-control" name="organismos_id" id="organismos_id" title="Seleccione el organismo al cual pertenece" required>
                                                               <option value="">--Seleccione--</option>
                                                               <?php
                                                                while ($registro3 = pg_fetch_array($result3)) {
                                                                ?>
                                                                   <option name="id" value="<?php echo $registro3[0] ?> "><?php echo strtoupper($registro3[1]) ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>


                                                   <?php
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
                                                           <select class="form-control" name="cargos_id" id="cargos_id" title="Seleccione el cargo asignado" required>
                                                               <option value="">--Seleccione--</option>
                                                               <?php
                                                                while ($registro4 = pg_fetch_array($result4)) {
                                                                ?>
                                                                   <option name="id" value="<?php echo $registro4[0] ?> "><?php echo strtoupper($registro4[1]) ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>


                                                   <?php
                                                    // Consulta a la Base de Datos
                                                    $result5 = pg_query($dbconn, "SELECT * FROM rango_categoria");
                                                    if (!$result5) {
                                                        echo "Ocurrió un error.\n";
                                                        exit;
                                                    }
                                                    ?>
                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="rango_categoria_id">Rango</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <select class="form-control" name="rango_categoria_id" id="rango_categoria_id" title="Seleccione el rango asignado o posee">
                                                               <option value="">--Seleccione--</option>
                                                               <?php
                                                                while ($registro5 = pg_fetch_array($result5)) {
                                                                ?>
                                                                   <option name="id" value="<?php echo $registro5[0] ?> "><?php echo strtoupper($registro5[1]) ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <?php
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
                                                           <select class="form-control" name="grupo_guardia_id" id="grupo_guardia_id" title="Seleccione el grupo de guardia asignado" required>
                                                               <option value="">--Seleccione--</option>
                                                               <?php
                                                                while ($registro10 = pg_fetch_array($result10)) {
                                                                ?>
                                                                   <option name="id" value="<?php echo $registro10[0] ?> "><?php echo strtoupper($registro10[1]) ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <?php
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
                                                           <select class="form-control" name="estatus_personal_id" id="estatus_personal_id" title="Seleccione el estatus en que se encuetra el personal" required>
                                                               <option value="">--Seleccione--</option>
                                                               <?php
                                                                while ($registro6 = pg_fetch_array($result6)) {
                                                                ?>
                                                                   <option name="id" value="<?php echo $registro6[0] ?> "><?php echo strtoupper($registro6[1]) ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula1; ?>" required />

                                                   <div class="ln_solid">
                                                       <div class="form-group">
                                                           <div class="col-md-6 offset-md-3">
                                                               <button type='submit' class="btn btn-primary">Guardar</button>
                                                               <button type='reset' class="btn btn-success">Limpiar</button>
                                                           </div>
                                                       </div>
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                       <!-- Fin Seccion Cuatro -->

                                   </form>
                               </div>
                               <!-- end of accordion -->





                           </div>
                       </div>
                   </div>
               </div>