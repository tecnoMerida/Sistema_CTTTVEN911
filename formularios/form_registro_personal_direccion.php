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
                    <strong>Estatus Familiar Registrado con EXITO!!!</strong></div>';
                                } elseif ($_GET['msg'] == "3") {
                                    echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Personal NO registrado</strong></div>';
                                }

                                ?>
                           </div>
                           <div class="x_content">


                               <!-- start accordion -->
                               <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                   <form class="form-horizontal form-label-left" action="../administrador/registro_personal3.php?msg=2" method="post" id="demo-form" data-parsley-validate>
                                       <!-- Seccion Uno -->
                                       <?php require 'form_registro_personal1.php'; ?>
                                       <!-- Fin Seccion Uno -->
                                       <!-- Seccion Dos -->
                                       <?php require 'form_registro_personal_estatus1.php'; ?>
                                       <!-- Fin Seccion Dos -->
                                       <!-- Seccion Tres -->
                                       <div class="panel">
                                           <a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                               <h4 class="panel-title">Dirección</h4>
                                           </a>
                                           <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                               <div class="panel-body">

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                                                       </div>
                                                   </div>

                                                   <?php
                                                    // Creación y/o formación de la consulta.
                                                    $result3 = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = 14 ");
                                                    if (!$result3) {
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
                                                           <select name="estados" id="cboEstado" class="form-control" title="Selecciones Estado de residencia" autofocus required>
                                                               <option value=''>-Seleccione Estado-</option>
                                                               <?php
                                                                // Validar el estatus de ejecución de la consulta.

                                                                while ($row = pg_fetch_array($result3)) {
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
                                                           <select class="form-control" name="municipios" id="cboMunicipio" title="Selecciones Municipio de residencia" required>
                                                               <option value=''>-Seleccione Municipio-</option>

                                                           </select>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <select name="parroquias_id" id="cboParroquia" class="form-control" title="Seleccione Parroquia de residencia" required="required">
                                                               <option value="">-Seleccione Parroquia-</option>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <!-- // Seleccion del Sector donde ocurrio el evento //-->
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <select name="nombre_sector" id="cboSectores" class="form-control" title="Seleccione sector de residencia" required="required">
                                                               <option value="">-Seleccione Sector-</option>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="avenida">Avenida<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="text" name="avenida" id="avenida" class="form-control optional" placeholder="Ingrese avenida de residencia" size="25" minlength="0" maxlength="40" title="Llene este campo con la avenida de residencia, entre 0 y 40 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ0-9 -]{0,40}" required />
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="calle">Calle<span class="required"></span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="text" name="calle" id="calle" class="form-control optional" placeholder="Ingrese calle o vereda de residencia" minlength="0" maxlength="40" title="Llene este campo con la calle o vereda de residencia, entre 0 y 40 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ0-9 -]{0,40}" />
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
                                                           <input type="text" name="casa" id="casa" class="form-control optional" placeholder="Ingrese casa o edificio de residencia" minlength="0" maxlength="40" title="Llene este campo con el nombre o número de casa o edificio de residencia, entre 0 y 40 dígitos" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ0-9 /-]{0,40}" required />
                                                       </div>
                                                       <div class="col-md-6 col-sm-6">
                                                           <p>Nota: números menores a 10<br /> agregar un 0 - Ej: 00</p>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="piso">Piso</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="number" name="piso" id="piso" class="form-control optional" placeholder="Ingrese piso del edificio" minlength="0" maxlength="10" title="Llene este campo con el número de piso del edificio de residencia, entre 0 y 10 dígitos" pattern="[0-9]{0,10}" />
                                                       </div>
                                                       <div class="col-md-6 col-sm-6">
                                                           <p>Nota: números menores a 10<br /> agregar un 0 - Ej: 00</p>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="apto">Apartamento</label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="text" name="apto" id="apto" class="form-control optional" placeholder="Ingrese número de apartamento" minlength="0" maxlength="10" title="Llene este campo con el número de apartamento del edificio de residencia, entre 0 y 10 dígitos" pattern="[A-Za-z0-9 -]{0,10}" />
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
                                                           <input type="text" name="punto_referencia" id="punto_referencia" class="form-control optional" placeholder="Ingrese punto de referencia" minlength="4" maxlength="40" title="Llene este campo con un punto de referencia a la residencia, entre 4 y 40 dígitos" pattern="[A-Za-z0-9áéíóúüñÁÉÍÓÜÚÑ -]{4,40}" required />
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
                                       <!-- Fin Seccion Tres -->

                                   </form>
                               </div>
                               <!-- end of accordion -->





                           </div>
                       </div>
                   </div>
               </div>