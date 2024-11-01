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
                    <strong>Datos Laborales Registrados con EXITO!!!</strong></div>';
                                } if ($_GET['msg'] == "3") {
                                    echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos Laboral NO registrado</strong></div>';
                                } elseif ($_GET['msg'] == "4") {
                                  echo '<div class="alert alert-danger alert-dismissible msn1">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>El Número de Cédula de familiar ya EXISTE!!!</strong></div>';
                                }

                                ?>
                           </div>
                           <div class="x_content">

                           <?php

$ultimo1 = pg_query($dbconn,"SELECT * FROM  personal WHERE fecha_creacion=(SELECT MAX(fecha_creacion) FROM personal) ");
$reg_id= pg_fetch_array($ultimo1);

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
                       <form class="form-horizontal form-label-left" action="../insertar_personal.php?ac=3" method="post" id="demo-form" data-parsley-validate>
                       <div class="panel">
                         <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           <h4 class="panel-title">Pariente</h4>
                         </a>
                         <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                           <div class="panel-body">

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                               <div class="col-md-6 col-sm-6">
                                 <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                               </div>
                             </div>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="cedula_p">Cédula<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="cedula_p" id="cedula_p" class="form-control" placeholder="Ingrese número cédula" minlength="7" maxlength="8" title="Llene este campo con el número de cédula del familiar, entre 7 y 8 dígitos" autofocus pattern="[0-9]{7,8}" required="required" autofocus />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_p">Primer Nombre<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="nombre_p" id="nombre_p" class="form-control" placeholder="Ingrese primer nombre" minlength="3" maxlength="20" title="Llene este campo con el primer nombre del familiar, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="apellido_p">Primer Apellido<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="apellido_p" id="apellido_p" class="form-control" placeholder="Ingrese primer apellido" minlength="3" maxlength="20" title="Llene este campo con el primer apellido del familiar, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_p">Telefono<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input type="text" name="telefono_p" id="telefono_p" class="form-control" placeholder="Ingrese número telefono" maxlength="14" data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" title="Llene este campo con el número de teléfono del familiar" pattern="[0-9() -]{11,14}" required='required' />
                               </div>
                               <div class="col-md-6 col-sm-6">
                                 <p>Ej: (274) 262-4321</p>
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_p">Observaciones<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <textarea type="text" name="observaciones_p" id="observaciones_p" class="resizable_textarea form-control" placeholder="Ingrese alguna observacion del familiar" minlength="8" maxlength="400" title="Llene este campo con alguna observación necesaria para el familiar, entre 8 y 400 dígitos" required='required' pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-0-9]{8,400}" /></textarea>
                               </div>
                             </div>

                             <?php
                              // Consulta a la Base de Datos
                              $result7 = pg_query($dbconn, "SELECT * FROM tipo_parenstesco");
                              if (!$result7) {
                                echo "Ocurrió un error.\n";
                                exit;
                              }
                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="tipo_parenstesco_id">Parentesco<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <select name="tipo_parenstesco_id" id="tipo_parenstesco_id" class="form-control" title="Seleccione el parentesco del familiar" required>
                                   <option value="">--Seleccione--</option>
                                   <?php
                                    while ($registro7 = pg_fetch_array($result7)) {
                                    ?>
                                     <option name="id" value="<?php echo $registro7[0] ?> "><?php echo $registro7[1] ?></option>
                                   <?php
                                    }
                                    ?>
                                 </select>
                               </div>
                             </div>


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
                       <!-- Fin Seccion Cinco -->

                                   </form>
                               </div>
                               <!-- end of accordion -->





                           </div>
                       </div>
                   </div>
               </div>