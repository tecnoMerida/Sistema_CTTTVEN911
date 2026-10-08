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
                    if ($_GET['msg'] == "3") {
                      echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Personal NO registrado</strong></div>';
                    }

                    ?>
                 </div>
                 <div class="x_content">


                   <!-- start accordion -->
                   <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                     <form class="form-horizontal form-label-left" action="../administrador/registro_personal1.php?msg=2" method="post" id="demo-form" data-parsley-validate>
                       <!-- Seccion Uno -->
                       <div class="panel">
                         <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                           <h4 class="panel-title">Datos Personales</h4>
                         </a>
                         <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                           <div class="panel-body">

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                               <div class="col-md-6 col-sm-6">
                                 <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="cedula">Cédula<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input id="cedula" class="form-control" data-validate-length-range="7" data-validate-words="2" name="cedula" placeholder="Ingrese número cédula" required="required" minlength="7" maxlength="8" title="Llene este campo con el número de cédula, entre 6 y 8 dígitos" autofocus pattern="[0-9]{7,8}" value="<?php echo $cedula_consultada; ?>" />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre">Primer Nombre<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input id="p_nombre" class="form-control" data-validate-length-range="6" data-validate-words="2" name="p_nombre" placeholder="Ingrese primer nombre" required="required" minlength="3" maxlength="20" title="Llene este campo con el primer nombre, entre 3 y 20 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_nombre">Segundo Nombre</label>
                               <div class="col-md-6 col-sm-6">
                                 <input id="s_nombre" class="form-control" data-validate-length-range="6" data-validate-words="2" name="s_nombre" placeholder="Ingrese segundo nombre" minlength="3" maxlength="20" title="Llene este campo con el segundo nombre, entre 3 y 20 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_apellido">Primer Apellido<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <input id="p_apellido" class="form-control" data-validate-length-range="6" data-validate-words="2" name="p_apellido" placeholder="Ingrese primer apellido" required="required" minlength="3" maxlength="20" title="Llene este campo con el primer apellido, entre 3 y 20 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                               </div>
                             </div>

                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_apelllido">Segundo Apellido</label>
                               <div class="col-md-6 col-sm-6">
                                 <input id="s_apelllido" class="form-control" data-validate-length-range="6" data-validate-words="2" name="s_apelllido" placeholder="Ingrese segundo apellido" minlength="3" maxlength="20" title="Llene este campo con el segundo apellido, entre 3 y 20 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                               </div>
                             </div>

                             <?php
                              // Consulta a la Base de Datos
                              $result = pg_query($dbconn, "SELECT * FROM grado_instruccion ORDER BY id");
                              if (!$result) {
                                echo "Ocurrió un error.\n";
                                exit;
                              }
                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="grado_instruccion_id">Grado Instrucción<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <select name="grado_instruccion_id" id="grado_instruccion_id" class="form-control" title="Seleccione el grado de instrucción academica" required>
                                   <option value="">--Seleccione--</option>
                                   <?php
                                    while ($registro = pg_fetch_array($result)) {
                                    ?>
                                     <option name="id" value="<?php echo $registro[0] ?> "><?php echo $registro[1] ?></option>
                                   <?php
                                    }
                                    ?>
                                 </select>
                               </div>
                             </div>

                             <?php
                              // Consulta a la Base de Datos
                              $result1 = pg_query($dbconn, "SELECT * FROM genero");
                              if (!$result1) {
                                echo "Ocurrió un error.\n";
                                exit;
                              }
                              ?>
                             <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align" for="genero_id">Género<span class="required">
                                   <font COLOR="#FF0000">*</font>
                                 </span></label>
                               <div class="col-md-6 col-sm-6">
                                 <p>
                                   <?php
                                    while ($registro1 = pg_fetch_array($result1)) {
                                      echo $registro1[1] ?>
                                     <input type="radio" class="flat" name="genero_id" id="genero_id" value="<?php echo $registro1[0] ?>" />
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
                                 <input type="text" name="telefono_celular" id="telefono_celular" class="form-control" title="Llene este campo con el número de teléfono móvil" placeholder="Ingrese número móvil" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
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
                                 <input type="text" id="telefono_casa" class="form-control" name="telefono_casa" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
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
                                 <input class="form-control email" type="email" id="email" name="correo_electronico" title="Llene este campo con la dirección de correo electrónico" placeholder="Ingrese correo electrónico" data-validate-linked="email" data-parsley-trigger="change" required />
                               </div>
                               <div class="col-md-6 col-sm-6">
                                 <p>Ej: ejemplo@sistema911.com</p>
                               </div>
                             </div>

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
                       <!-- Fin Seccion Uno -->

                     </form>
                   </div>
                   <!-- end of accordion -->





                 </div>
               </div>
             </div>
           </div>