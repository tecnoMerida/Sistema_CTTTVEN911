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
                    <strong>El Usuario ya EXISTE!!!</strong></div>';
                    }
                    if ($_GET['msg'] == "2") {
                      echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Preguntas de Seguridad Registradas con EXITO!!!</strong></div>';
                    } elseif ($_GET['msg'] == "3") {
                      echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Usuario NO registrado</strong></div>';
                    }

                    ?>
                 </div>
                 <div class="x_content">

                   <?php

                    $ultimo1 = pg_query($dbconn, "SELECT * FROM  personal WHERE fecha_creacion=(SELECT MAX(fecha_creacion) FROM personal) ");
                    $reg_id = pg_fetch_array($ultimo1);

                    $cedula = $reg_id['cedula'];
$p_nombre = $reg_id['p_nombre'];
$s_nombre = $reg_id['s_nombre'];
$p_apellido = $reg_id['p_apellido'];
$s_apelllido = $reg_id['s_apelllido'];
$grado_instruccion_id = $reg_id['grado_instruccion_id'];
$genero_id = $reg_id['genero_id'];
$telefono_celular = $reg_id['telefono_celular'];
$telefono_casa = $reg_id['telefono_casa'];
$correo_electronico = $reg_id['correo_electronico'];

$estado_civil_id = $reg_id['estado_civil_id'];
$hijos = $reg_id['hijos'];
$numero_hijos = $reg_id['numero_hijos'];

$parroquias_id = $reg_id['parroquias_id'];
$municipios_id = $reg_id['municipios_id'];
$estados_id = $reg_id['estados_id'];
$nombre_sector = $reg_id['nombre_sector'];
$avenida = $reg_id['avenida'];
$calle = $reg_id['calle'];
$casa = $reg_id['casa'];
$piso = $reg_id['piso'];
$apto = $reg_id['apto'];
$punto_referencia = $reg_id['punto_referencia'];

$organismos_id = $reg_id['organismos_id'];
$cargos_id = $reg_id['cargos_id'];
$rango_categoria_id = $reg_id['rango_categoria_id'];
$grupo_guardia_id = $reg_id['grupo_guardia_id'];
$estatus_personal_id = $reg_id['estatus_personal_id'];
                    ?>
                   <!-- start accordion -->
                   <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                   <form class="form-horizontal form-label-left" action="" method="post" id="demo-form" data-parsley-validate>
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
                               <?php require 'form_registro_personal_laboral1.php'; ?>
                               <!-- Fin Seccion Cuatro -->
                              </form>
                              <!-- Seccion Cinco -->
                              <?php require 'form_registro_personal_pariente1.php'; ?>
                              <!-- Fin Seccion Cinco -->
                              <!-- Seccion Seis -->
                              <?php require 'form_registro_personal_preguntas1.php' ?>
                              <!-- Fin Seccion Seis -->
                     <!-- Seccion Siete -->
                     <form class="form-horizontal form-label-left" action="../insertar_usuario.php?ac=1" method="post" id="demo-form" data-parsley-validate>
                       <div class="panel">
                         <a class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                           <h4 class="panel-title">Usuario</h4>
                         </a>
                         <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
                           <div class="panel-body">

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                               <div class="col-md-6 col-sm-6">
                                 <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                               </div>
                             </div>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="usuario">Usuario<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese nombre usuario" minlength="6" maxlength="16" title="Llene este campo con el nombre de usuario, para acceder al sistema 'Libro Digital de Novedades 911', entre 6 y 16 dígitos" pattern="[A-Za-z0-9ñÑ]{6,16}" required="required" autofocus />
                               </div>
                               <div class="col-md-6 col-sm-6">
                                 <p>Usuario: entre 6 y 16 dígitos usando</br>mayúsculas, minúsculas y números</p>
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="contrasena">Contraseña<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese contraseña usuario" minlength="6" maxlength="16" title="Llene este campo con la contraseña de usuario, para acceder al sistema 'Libro Digital de Novedades 911', entre 6 y 16 dígitos" pattern="[A-Za-z0-9&%$!*+@#]{6,16}" required="required" />
                               </div>
                               <div class="col-md-6 col-sm-6">
                                 <p>Contraseña: entre 6 y 16 dígitos</br>usando mayúsculas, minúsculas,</br>números y & % $ ! * + @ # </p>
                               </div>
                             </div>

                             <?php
                              // Consulta a la Base de Datos
                              $result8 = pg_query($dbconn, "SELECT * FROM tipo_rol");
                              if (!$result8) {
                                echo "Ocurrió un error.\n";
                                exit;
                              }
                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Rol<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <select class="form-control" name="tipo_rol_id" title="Seleccione el rol que le corresponde de usuario" required>
                                   <option value="">--Seleccione--</option>
                                   <?php
                                    while ($registro8 = pg_fetch_array($result8)) {
                                    ?>
                                     <option name="id" value="<?php echo $registro8[0] ?> "><?php echo $registro8[1] ?></option>
                                   <?php
                                    }
                                    ?>
                                 </select>
                               </div>
                             </div>


                             <?php
                              // Consulta a la Base de Datos
                              $result9 = pg_query($dbconn, "SELECT * FROM estado_usuario");
                              if (!$result9) {
                                echo "Ocurrió un error.\n";
                                exit;
                              }
                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus Usuario<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <p>
                                   <?php
                                    while ($registro9 = pg_fetch_array($result9)) {
                                      echo $registro9[1] ?>
                                     <input type="radio" class="flat" name="estado_usuario_id" id="genderF" value="<?php echo $registro9[0] ?>" />
                                   <?php
                                    }
                                    ?>
                                 </p>
                               </div>
                             </div>

                             <input type="hidden" name="preguntas_seguridad_id" id="preguntas_seguridad_id" value="<?php echo $ps_id['id']; ?>" required />

                             <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $reg_id['cedula']; ?>" required />

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
                       <!-- Fin Seccion Siete -->

                     </form>
                   </div>
                   <!-- end of accordion -->





                 </div>
               </div>
             </div>
           </div>