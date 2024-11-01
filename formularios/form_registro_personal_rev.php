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
             
                  <div id="step-1">
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>

                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="cedula">Cédula<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input id="cedula" class="form-control" data-validate-length-range="7" data-validate-words="2" name="cedula" placeholder="Ingrese número cédula" required="required" minlength="7" maxlength="8" title="Llene este campo con el número de cédula" autofocus pattern="[0-9]{7,8}" value="<?php echo $cedula_consultada; ?>" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre">Primer Nombre<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input id="p_nombre" class="form-control" data-validate-length-range="6" data-validate-words="2" name="p_nombre" placeholder="Ingrese primer nombre" required="required" minlength="3" maxlength="20" title="Llene este campo con el primer nombre" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_nombre">Segundo Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input id="s_nombre" class="form-control" data-validate-length-range="6" data-validate-words="2" name="s_nombre" placeholder="Ingrese segundo nombre" minlength="3" maxlength="20" title="Llene este campo con el segundo nombre" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_apellido">Primer Apellido<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input id="p_apellido" class="form-control" data-validate-length-range="6" data-validate-words="2" name="p_apellido" placeholder="Ingrese primer apellido" required="required" minlength="3" maxlength="20" title="Llene este campo con el primer apellido" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}"/>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_apelllido">Segundo Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input id="s_apelllido" class="form-control" data-validate-length-range="6" data-validate-words="2" name="s_apelllido" placeholder="Ingrese segundo apellido" minlength="3" maxlength="20" title="Llene este campo con el segundo apellido" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}"/>
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="grado_instruccion_id">Grado Instrucción<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select name="grado_instruccion_id" id="grado_instruccion_id" class="form-control" title="Seleccione el grado de instrucción academica" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro=pg_fetch_array($result))
                              { 
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="genero_id">Género<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6"><p>
                            <?php
                              while($registro1=pg_fetch_array($result1))
                              { 
                             echo $registro1[1] ?>
                            <input type="radio" class="flat" name="genero_id" id="genero_id" value="<?php echo $registro1[0] ?>" />
                            <?php 
                              }
                            ?>
                          </p></div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular">Teléfono Móvil<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" name="telefono_celular" id="telefono_celular" class="form-control" title="Llene este campo con el número de teléfono móvil" placeholder="Ingrese número móvil" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: (424) 765-4321</p>
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_casa">Teléfono Habitación<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" id="telefono_casa" class="form-control" name="telefono_casa" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: (274) 262-4321</p>
                        </div>
                      </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="email">Email<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control email" type="email" id="email" name="correo_electronico" title="Llene este campo con la dirección de correo electrónico" placeholder="Ingrese correo electrónico" data-validate-linked="email" data-parsley-trigger="change" required /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: ejemplo@sistema911.com</p>
                        </div>
                    </div>

                  </div>
<!-- ******** STEP 2 *********-->                      
                  <div id="step-2">
                  <h2 class="StepTitle">Estatus Familiar</h2>


                      <?php
                      // Consulta a la Base de Datos
                          $result2 = pg_query($dbconn, "SELECT * FROM estado_civil");
                          if (!$result2) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="estado_civil_id">Estado Civíl<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select id="estado_civil_id" class="form-control" name="estado_civil_id" title="Seleccione el estado civil" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro2=pg_fetch_array($result2))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro2[0] ?> "><?php echo $registro2[1] ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="hijos">Hijos<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6"><p>
                        Si:
                        <input type="radio" class="flat" name="hijos" title="Seleccione Si tiene hijos" id="hijos" value="1" checked />
                        No:
                        <input type="radio" class="flat" name="hijos" title="Seleccione No tiene hijos" id="hijos" value="0" />
                      </p></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="numero_hijos">Número de Hijos<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="numero_hijos" id="numero_hijos" class="form-control number"  
                          placeholder="Ingrese número de hijos" title="Ingrese un número de hijos, en caso de no poseer indique 0" min="0" max="10" step="1" data-validate-minmax="0,10" pattern="[0-9]{0,10}" required='required'></div>
                    </div>

                  </div>
<!-- ********* STEP 3 ********* -->
                  <div id="step-3">
                  <h2 class="StepTitle">Dirección</h2>
 
<?php 
// Creación y/o formación de la consulta.
$result3 = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = 14 ");
    if (!$result3) {
        echo "Ocurrió un error.\n";
        exit;
        }
?>
                   <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboEstado">Estado<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select name="estados" id="cboEstado" class="form-control" title="Selecciones Estado de residencia" required>
                            <option value=''>-Seleccione Estado-</option>
                    <?php
                 // Validar el estatus de ejecución de la consulta.

                        while($row = pg_fetch_array($result3)){
                            echo "<option value='".$row['id']."'>".$row['nombre_estado']."</option>";
                            }

                    ?>
                          </select>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboMunicipio">Municipio<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="municipios" id="cboMunicipio" title="Selecciones municipio en que sucede el evento de solicitud" required>
                              <option value=''>-Seleccione Municipio-</option>

                          </select>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                        <select name="parroquias_id" id="cboParroquia" class="form-control" title="Seleccione parroquia en que sucede el evento de solicitud" required="required">
                          <option value="">-Seleccione Parroquia-</option>
                        </select>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector<span
                          class="required"><font COLOR="#FF0000">*</font></span></label> 
                        <div class="col-md-6 col-sm-6">
                        <select name="nombre_sector" id="cboSectores" class="form-control" title="Seleccione sector en que sucede el evento de solicitud" required="required">
                          <option value="">-Seleccione Sector-</option>
                        </select>
                      </div>
                    </div>
              
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="avenida">Avenida<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="avenida" id="avenida" class="form-control optional" placeholder="Ingrese avenida de residencia" size="25" minlength="0" maxlength="40" title="Llene este campo con la avenida de residencia" pattern="[A-Za-z0-9 -]{0,40}" required /></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="calle">Calle<span
                          class="required"></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="calle" id="calle" class="form-control optional" placeholder="Ingrese calle o vereda de residencia" minlength="0" maxlength="40" title="Llene este campo con la calle o vereda de residencia" pattern="[A-Za-z0-9 -]{0,40}" /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="casa">Casa/Edificio<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="casa" id="casa" class="form-control optional" placeholder="Ingrese casa o edificio de residencia" minlength="0" maxlength="40" title="Llene este campo con el nombre o número de casa o edificio de residencia" pattern="[A-Za-z0-9 /-]{0,40}" required /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="piso">Piso</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="piso" id="piso" class="form-control optional" placeholder="Ingrese piso del edificio" minlength="0" maxlength="40" title="Llene este campo con el número de piso del edificio de residencia" pattern="[0-9]{0,40}" /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>
                    </div>
                    
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="apto">Apartamento</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="apto" id="apto" class="form-control optional" placeholder="Ingrese número de apartamento" minlength="0" maxlength="40" title="Llene este campo con el número de apartamento del edificio de residencia" pattern="[A-Za-z0-9 -]{0,40}" /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia">Punto de Referencia<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="punto_referencia" id="punto_referencia" class="form-control optional" placeholder="Ingrese punto de referencia" minlength="6" maxlength="40" title="Llene este campo con un punto de referencia a la residencia" pattern="[A-Za-z0-9 -]{6,40}" required /></div>
                    </div>  
                    

                    </div>
<!-- ********** STEP 4 ********** -->                      
                    <div id="step-4">
                    <h2 class="StepTitle">Laborales</h2>


                      <?php
                      // Consulta a la Base de Datos
                          $result3 = pg_query($dbconn, "SELECT * FROM organismos");
                          if (!$result3) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_id">Organismo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="organismos_id" id="organismos_id" title="Seleccione el organismo al cual pertenece" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro3=pg_fetch_array($result3))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro3[0] ?> "><?php echo $registro3[1] ?></option>
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cargos_id">Cargo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="cargos_id" id="cargos_id" title="Seleccione el cargo asignado" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro4=pg_fetch_array($result4))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro4[0] ?> "><?php echo $registro4[1] ?></option>
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
                          <select class="form-control" name="rango_categoria_id" id="rango_categoria_id" title="Seleccione el rango asignado o posee" >
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro5=pg_fetch_array($result5))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro5[0] ?> "><?php echo $registro5[1] ?></option>
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="grupo_guardia_id">Grupo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="grupo_guardia_id" id="grupo_guardia_id" title="Seleccione el grupo de guardia asignado" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro10=pg_fetch_array($result10))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro10[0] ?> "><?php echo $registro10[1] ?></option>
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="estatus_personal_id">Estatus<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="estatus_personal_id" id="estatus_personal_id" title="Seleccione el estatus en que se encuetra el personal" required >
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro6=pg_fetch_array($result6))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro6[0] ?> "><?php echo $registro6[1] ?></option>
                            <?php 
                              }
                            ?>
                          </select></div>
                      </div>

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />

                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Guardar</button>
                    <button type='reset' class="btn btn-success">Limpiar</button>
                        </div>
                      </div>
                    </div>

                    </div>
                    </form>
                    </div>
                    </div>
                    <!-- End SmartWizard Content -->

  
                  </div>
                </div>
              </div>
            </div>