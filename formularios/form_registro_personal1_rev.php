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
                  if ($_GET[msg] == "1") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El Número de Cédula ya Existe!!!</strong></div>';
              } 
              if ($_GET[msg] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Personal Registrado con EXITO!!!</strong></div>';

              }
              elseif ($_GET[msg] == "3") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Personal NO registrado</strong></div>';
              }
             
              ?>
              </div>
                  <div class="x_content">

                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Datos Personales<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Estatus<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Dirección<br />
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Laboral<br />
                                          </span>
                          </a>
                        </li>
                      </ul>

<!-- ********* STEP 1 ********* -->
                  <div>
                   <form class="form-horizontal form-label-left" action="../insertar_personal.php?ac=1" method="post" id="demo-form" data-parsley-validate>
                  <?php

                        $ultimo1 = pg_query($dbconn,"SELECT * FROM  personal WHERE fecha_creacion=(SELECT MAX(fecha_creacion) FROM personal) ");
                        $reg_id= pg_fetch_array($ultimo1);

                  ?>            
                  <div id="step-1">

                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Cédula</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="cedula" placeholder="Ingrese número nédula" title="Llene este campo con el número de cédula" value="<?php echo $reg_id['cedula'];?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="p_nombre" placeholder="Ingrese primer nombre" required="required" title="Llene este campo con el primer nombre" value="<?php echo strtoupper($reg_id['p_nombre']);?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="s_nombre" placeholder="Ingrese segundo nombre" title="Llene este campo con el segundo nombre" value="<?php echo strtoupper($reg_id['s_nombre']);?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="p_apellido" placeholder="Ingrese primer apellido" title="Llene este campo con el primer apellido" value="<?php echo strtoupper($reg_id['p_apellido']);?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="s_apelllido" placeholder="Ingrese segundo apellido" title="Llene este campo con el segundo apellido" value="<?php echo strtoupper($reg_id['s_apelllido']);?>" disabled />
                      </div>
                    </div>

                      <?php
                      // Consulta a la Base de Datos
                          $grado_inst= $reg_id['grado_instruccion_id'];
                          $result = pg_query($dbconn, "SELECT * FROM public.grado_instruccion WHERE id = $grado_inst ");
                          if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $registro=pg_fetch_array($result);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Grado Instrucción</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="grado_instruccion_id" title="Seleccione el grado de instrucción academica" value="<?php echo strtoupper($registro['grado_instruccion']);?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Género</label>
                      <div class="col-md-6 col-sm-6"><p>
                      <?php
                      // Consulta a la Base de Datos
                          $genero = $reg_id['genero_id'];
              if($genero != 1 ){
                echo '&nbsp; Femenino&nbsp;
                <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="">
                     <input type="radio" name="genero_id" value="1" class="flat" checked="checked" disabled ></label> ';
                echo '&nbsp; Masculino&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="genero_id" value="2" class="flat" disabled ></label>';
              }else{
                echo '&nbsp; Femenino&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="genero_id" value="1" class="flat" disabled ></label> ';
                echo '&nbsp; Masculino&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" id="genero_id" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="genero_id" value="2" class="flat" checked disabled ></label> ';
              }
                      ?>
                          </p></div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Telefono Móvil</label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" class="form-control" name="telefono_celular" title="Llene este campo con el número de teléfono móvil" placeholder="Ingrese número móvil" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" value="<?php echo $reg_id['telefono_celular'];?>" disabled />
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Telefono Habitación</label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" class="form-control" name="telefono_casa" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" value="<?php echo $reg_id['telefono_casa'];?>" disabled />
                        </div>
                      </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control email" type="email" id="email" name="correo_electronico" title="Llene este campo con la dirección de correo electrónico" placeholder="Ingrese correo electrónico" data-validate-linked="email" value="<?php echo strtoupper($reg_id['correo_electronico']);?>" disabled /></div>
                    </div>

                  </div>
<!-- ******** STEP 2 *********-->                      
                  <div id="step-2">
                  <h2 class="StepTitle">Estatus Familiar</h2>


                      <?php
                      // Consulta a la Base de Datos
                        $estado_c= $reg_id['estado_civil_id'];
                          $result2 = pg_query($dbconn, "SELECT * FROM estado_civil WHERE id = $estado_c");
                          if (!$result2) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }

                          $registro2=pg_fetch_array($result2);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Estado Civíl</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="estado_civil_id" title="Seleccione el estado civil" value="<?php echo strtoupper($registro2['estado_civil']);?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Hijos</label>
                      <div class="col-md-6 col-sm-6"><p>
                       <?php
                      // Consulta a la Base de Datos
                          $hijos = $reg_id['hijos'];
              if($hijos != 'f' ){
                echo '&nbsp; SI&nbsp;
                <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderM" value="1" class="flat" checked="checked" disabled ></label> ';
                echo '&nbsp; NO&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderF" value="0" class="flat" disabled ></label>';
              }else{
                echo '&nbsp; SI&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderM" value="1" class="flat" disabled ></label> ';
                echo '&nbsp; NO&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="hijos" id="genderF" value="0" class="flat" checked disabled ></label> ';
              }

                   ?>
                      </p></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Número de Hijos</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="number" class='number' name="numero_hijos"
                          placeholder="Ingrese número de hijos" title="Ingrese un número de hijos, en caso de no poseer indique 0" value="<?php echo $reg_id['numero_hijos'];?>" disabled /></div>
                    </div>

                  </div>
<!-- ********* STEP 3 ********* -->
                  <div id="step-3">
                  <h2 class="StepTitle">Dirección</h2>
 
              <?php 
                  // Creación y/o formación de la consulta.
                  $parroquia = $reg_id['parroquias_id'];
                  $consulta_parroq = pg_query($dbconn, "SELECT * FROM public.parroquias WHERE id = $parroquia");
                  $reg_parroquia = pg_fetch_array($consulta_parroq);

                  $municipio = $reg_parroquia['municipios_id'];
                  $consulta_munip = pg_query($dbconn, "SELECT * FROM public.municipios WHERE id = $municipio");
                  $reg_municipio = pg_fetch_array($consulta_munip);

                  $estado = $reg_municipio['estados_id'];
                  $consulta_estado = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = $estado ");
                      if (!$consulta_estado) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                  $reg_estado = pg_fetch_array($consulta_estado);
              ?>
                   <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Estado</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="estados" id="cboEstado" title="Selecciones estado de residencia" value="<?php echo $reg_estado['nombre_estado']?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Municipio</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="municipios" id="cboMunicipio" title="Selecciones municipio en que sucede el evento de solicitud" value="<?php echo $reg_municipio['nombre_municipio']?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Parroquia</label>
                        <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="parroquias_id" id="cboParroquia" title="Seleccione parroquia en que sucede el evento de solicitud" value="<?php echo $reg_parroquia['nombre_parroquia']?>" disabled />

                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Sector</label> 
                        <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="nombre_sector" id="cboSectores" title="Seleccione sector en que sucede el evento de solicitud" value="<?php echo $reg_id['nombre_sector']?>" disabled />
                      </div>
                    </div>
              
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Avenida</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control optional" name="avenida" placeholder="Ingrese avenida de residencia" title="Llene este campo con la avenida de residencia" type="text" value="<?php echo strtoupper($reg_id['avenida']);?>" disabled /></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Calle</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control optional" name="calle" placeholder="Ingrese calle o vereda de residencia" title="Llene este campo con la calle o vereda de residencia" type="text" value="<?php echo strtoupper($reg_id['calle']);?>" disabled /></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Casa/Edificio</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control optional" name="casa" placeholder="Ingrese casa o edificio de residencia" title="Llene este campo con el nombre o número de casa o edificio de residencia" type="text" value="<?php echo strtoupper($reg_id['casa']);?>" disabled /></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Piso</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control optional" name="piso" placeholder="Ingrese piso del edificio" title="Llene este campo con el número de piso del edificio de residencia" type="number" value="<?php echo strtoupper($reg_id['piso']);?>" disabled /></div>
                    </div>
                    
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Apartamento</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control optional" name="apto" placeholder="Ingrese número de apartamento" title="Llene este campo con el número de apartamento del edificio de residencia" type="text" value="<?php echo strtoupper($reg_id['apto']);?>" disabled /></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Punto de Referencia</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control optional" name="punto_referencia" placeholder="Ingrese punto de referencia" title="Llene este campo con un punto de referencia a la residencia" type="text" value="<?php echo strtoupper($reg_id['punto_referencia']);?>" disabled /></div>
                    </div>  
                    

                    </div>
<!-- ********** STEP 4 ********** -->                      
                    <div id="step-4">
                    <h2 class="StepTitle">Laborales</h2>


                      <?php
                      // Consulta a la Base de Datos
                      $organismo= $reg_id['organismos_id'];
                          $consulta_org = pg_query($dbconn, "SELECT * FROM organismos WHERE id = $organismo");
                          if (!$consulta_org) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_org=pg_fetch_array($consulta_org);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Organismo</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="organismos_id" title="Seleccione el organismo de al cual pertenece" value="<?php echo strtoupper($reg_org['nombre_oganismos']);?>" disabled />
                      </div>
                    </div>


                      <?php
                      // Consulta a la Base de Datos
                      $cargo= $reg_id['cargos_id'];
                          $consulta_cargo = pg_query($dbconn, "SELECT * FROM cargos WHERE id = $cargo");
                          if (!$consulta_cargo) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_cargo=pg_fetch_array($consulta_cargo);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Cargo</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="cargos_id" title="Seleccione el cargo asignado" value="<?php echo strtoupper($reg_cargo['nombre_cargo']);?>" disabled />
                      </div>
                    </div>


                      <?php
                      // Consulta a la Base de Datos
                      $rango= $reg_id['rango_categoria_id'];
                          $consulta_rango = pg_query($dbconn, "SELECT * FROM rango_categoria WHERE id = $rango");
                          if (!$consulta_rango) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_rango=pg_fetch_array($consulta_rango);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Rango</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="rango_categoria_id" title="Seleccione el rango asignado o posee" value="<?php echo strtoupper($reg_rango['nombre_rango']);?>" disabled />
                      </div>
                    </div>

                      <?php
                      // Consulta a la Base de Datos
                      $grupo= $reg_id['grupo_guardia_id'];
                          $consulta_grupo = pg_query($dbconn, "SELECT * FROM grupos_guardia WHERE id = $grupo");
                          if (!$consulta_grupo) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_grupo=pg_fetch_array($consulta_grupo);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Grupo</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="grupo_guardia_id" title="Seleccione el grupo de guardia asignado" value="<?php echo strtoupper($reg_grupo['nombre_grupo']);?>" disabled />
                      </div>
                    </div>

                      <?php
                      // Consulta a la Base de Datos
                      $estatus= $reg_id['estatus_personal_id'];
                          $consulta_estatus = pg_query($dbconn, "SELECT * FROM estatus_personal WHERE id = $estatus ");
                          if (!$consulta_estatus) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_estatus=pg_fetch_array($consulta_estatus)
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="estatus_personal_id" title="Seleccione el estatus en que se encuetra el personal" value="<?php echo strtoupper($reg_estatus['estatus']);?>" disabled />
                      </div>
                    </div>


                    <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion= date ("Y/n/j H:m:s");?>" required />

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />

                    </div>
                    </form>
                    </div>
                    </div>
                    <!-- End SmartWizard Content -->

  
                  </div>
                </div>
              </div>
            </div>

