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
                    <strong>Datos Personales Registrado con EXITO!!!</strong></div>';
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
                                   <form class="form-horizontal form-label-left" action="../administrador/registro_personal2.php?msg=2" method="POST" id="demo-form" data-parsley-validate>
                                       <!-- Seccion Uno -->
                                       <?php require 'form_registro_personal1.php'; ?>
                                       <!-- Fin Seccion Uno -->

                                       <!-- Seccion Dos -->
                                       <div class="panel">
                                           <a class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                               <h4 class="panel-title">Estatus Familiar</h4>
                                           </a>
                                           <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                               <div class="panel-body">

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                                                       </div>
                                                   </div>

                                                   <?php
                                                    // Consulta a la Base de Datos
                                                    $result2 = pg_query($dbconn, "SELECT * FROM estado_civil");
                                                    if (!$result2) {
                                                        echo "Ocurrió un error.\n";
                                                        exit;
                                                    }
                                                    ?>
                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="estado_civil_id">Estado Civíl<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <select id="estado_civil_id" class="form-control" name="estado_civil_id" title="Seleccione el estado civíl" autofocus required>
                                                               <option value="">--Seleccione--</option>
                                                               <?php
                                                                while ($registro2 = pg_fetch_array($result2)) {
                                                                ?>
                                                                   <option name="id" value="<?php echo $registro2[0] ?> "><?php echo $registro2[1] ?></option>
                                                               <?php
                                                                }
                                                                ?>
                                                           </select>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="hijos">Hijos<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <p>
                                                               Si:
                                                               <input type="radio" class="flat" name="hijos" title="Seleccione Si tiene hijos" id="hijos" value="1" checked />
                                                               No:
                                                               <input type="radio" class="flat" name="hijos" title="Seleccione No tiene hijos" id="hijos" value="0" />
                                                           </p>
                                                       </div>
                                                   </div>

                                                   <div class="field item form-group">
                                                       <label class="col-form-label col-md-3 col-sm-3  label-align" for="numero_hijos">Número de Hijos<span class="required">
                                                               <font COLOR="#FF0000">*</font>
                                                           </span></label>
                                                       <div class="col-md-6 col-sm-6">
                                                           <input type="number" name="numero_hijos" id="numero_hijos" class="form-control number" placeholder="Ingrese número de hijos" title="Ingrese un número de hijos, en caso de no poseer indique 0" min="0" max="10" step="1" data-validate-minmax="0,10" pattern="[0-9]{0,10}" required='required'>
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
                                       <!-- Fin Seccion Dos -->

                                   </form>
                               </div>
                               <!-- end of accordion -->





                           </div>
                       </div>
                   </div>
               </div>