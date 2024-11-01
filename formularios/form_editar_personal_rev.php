<?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////
    
      // CONSULTA TABLA PERSONAL
        $result_get = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $cedula1");
              if (!$result_get) {
                    echo "Ocurrió un error.\n";
                exit;
                }

        ?>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Actualizar Datos Personales</h2>
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
                    <strong>Deberas de Completar todos los campo!!!</strong></div>';
              } 
              if ($_GET[msg] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos personales actualizado con exito!</strong></div>';

              }
              elseif ($_GET[msg] == "3") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No se pudo actualizar los datos!</strong></div>';
              }
             
              ?>
                    </div>
                    <br/><br/>
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
                   <form class="form-horizontal form-label-left" action="../insertar_personal.php?ac=2" method="post" id="demo-form" data-parsley-validate>
					<?php
                              while($reg=pg_fetch_array($result_get))
                              { 
                            ?>
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
                        <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingrese número cédula" minlength="7" maxlength="8" value="<?php echo $cedula1; ?>" title="Llene este campo con el número de cédula" autofocus pattern="[0-9]{7,8}" required="required" readonly />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre">Primer Nombre<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="p_nombre" id="p_nombre" class="form-control" placeholder="Ingrese primer nombre" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['p_nombre']); ?>" title="Llene este campo con el primer nombre" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_nombre">Segundo Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="s_nombre" id="s_nombre" class="form-control" placeholder="Ingrese segundo nombre" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['s_nombre']); ?>" title="Llene este campo con el segundo nombre" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_apellido">Primer Apellido<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="p_apellido" id="p_apellido" class="form-control" placeholder="Ingrese primer apellido" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['p_apellido']); ?>" title="Llene este campo con el primer apellido" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="s_apelllido">Segundo Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="s_apelllido" id="s_apelllido" class="form-control" placeholder="Ingrese segundo apellido" minlength="3" maxlength="20" value="<?php echo strtoupper($reg['s_apelllido']); ?>" title="Llene este campo con el segundo apellido" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" />
                      </div>
                    </div>

                      <?php
                      // Consulta a la Base de Datos mientras contenga variable almacenada
                     $grado_01 = $reg['grado_instruccion_id'];
                          $result1 = pg_query($dbconn, "SELECT * FROM grado_instruccion WHERE id = $grado_01 ");
                          if (!$result1) {
                          echo "Ocurrio un Error.\n";
                          exit;
                          }
                        $reg1=pg_fetch_array($result1);

                        // Consulta a la Base de Datos para mostrar otros valores
                        	$result = pg_query($dbconn, "SELECT * FROM grado_instruccion ");
                        	if (!$result) {
                        		echo "Ocurrio un Error.\n";
                        		exit;
                        	}
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="grado_instruccion_id">Grado Instrucción<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select name="grado_instruccion_id" id="grado_instruccion_id" class="form-control" title="Seleccione el grado de instrucción academica" required>
                            <option value="<?php echo $reg1['id']; ?>"><?php echo strtoupper($reg1['grado_instruccion']); ?></option>
                            <?php
                              while($registro=pg_fetch_array($result))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro[0] ?> "><?php echo strtoupper($registro[1]); ?></option>
                            <?php
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                      <?php
                      // Consulta a la Base de Datos
	                   		$genero1= $reg['genero_id'];
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="genero_id">Género<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6"><p>
                            <?php
                              	if ($genero1 == '1'){
                             echo 'Femenino'; ?>
                            <input type="radio" class="flat" name="genero_id" id="genero_id" value="1" checked />
                            <?php echo 'Masculino'; ?>
                            <input type="radio" class="flat" name="genero_id" id="genero_id" value="2" />
                            <?php                              		
                              	}else{
							 echo 'Femenino'; ?>
                            <input type="radio" class="flat" name="genero_id" id="genero_id" value="1" />
                            <?php echo 'Masculino'; ?>
                            <input type="radio" class="flat" name="genero_id" id="genero_id" value="2" checked />
                            <?php
                              	}

                            ?>
                          </p></div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular">Teléfono Móvil<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" name="telefono_celular" id="telefono_celular" class="form-control" value="<?php echo $reg['telefono_celular']; ?>" title="Llene este campo con el número de teléfono móvil" placeholder="Ingrese número móvil" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: (424) 765-4321</p>
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_casa">Teléfono Habitación<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" name="telefono_casa" id="telefono_casa" class="form-control" value="<?php echo $reg['telefono_casa']; ?>" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: (274) 262-4321</p>
                        </div>
                      </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="email">Email<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control email" type="email" id="email" name="correo_electronico" value="<?php echo strtoupper($reg['correo_electronico']); ?>" title="Llene este campo con la dirección de correo electrónico" placeholder="Ingrese correo electrónico" data-validate-linked='email' data-parsley-trigger="change" required /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: ejemplo@sistema911.com</p>
                        </div>
                    </div>

                  </div>

<!-- ******** STEP 2 *********-->                      
                  <div id="step-2">
                  <h2 class="StepTitle">Estatus Familiar</h2>
                      <?php
                      // Consulta a la Base de Datos mientras contenga variable almacenada
                     $estado_01 = $reg['estado_civil_id'];
                        $result11 = pg_query($dbconn, "SELECT * FROM estado_civil WHERE id = $estado_01 ");
                          if (!$result11) {
                          echo "Ocurrio un Error.\n";
                          exit;
                          }
                        $reg22=pg_fetch_array($result11);

                        // Consulta a la Base de Datos para mostrar otros valores
                          $result22 = pg_query($dbconn, "SELECT * FROM estado_civil");
                          if (!$result22) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="estado_civil_id">Estado Civíl<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select name="estado_civil_id" id="estado_civil_id" class="form-control" title="Seleccione el estado civil" required>
                            <option value="<?php echo $reg22['id']; ?>"><?php echo strtoupper($reg22['estado_civil']); ?></option>
                            <?php
                              while($registro22=pg_fetch_array($result22))
                              { 
                            ?>
                            <option value="<?php echo $registro22[0] ?> "><?php echo strtoupper($registro22[1]); ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                       </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="genero_id">Hijos<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6"><p>
                          <?php
                          $hijos1= $reg['hijos'];
                           	if ($hijos1 == 't'){
                             echo 'Si:'; ?>
                            <input type="radio" class="flat" name="hijos" title="Seleccione Si tiene hijos" id="genero_id" value="t" checked />
                            <?php echo 'No:'; ?>
                            <input type="radio" class="flat" name="hijos" title="Seleccione No tiene hijos" id="genero_id" value="f" />
                            <?php                              		
                              	}else{
							               echo 'Si:'; ?>
                            <input type="radio" class="flat" name="hijos" title="Seleccione Si tiene hijos" id="genero_id" value="t" />
                            <?php echo 'No:'; ?>
                            <input type="radio" class="flat" name="hijos" title="Seleccione No tiene hijos" id="genero_id" value="f" checked />
                            <?php
                              	}

                            ?>
                      </p></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Número de Hijos<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" name="numero_hijos" class="form-control number optional" placeholder="Ingrese número de hijos" value="<?php echo '0'.$reg['numero_hijos']; ?>" title="Ingrese un número de hijos, en caso de no poseer indique 0" min="0" max="10" step="1" required ></div>
                    </div>

                  </div>

<!-- ********* STEP 3 ********* -->
                  <div id="step-3">
                  <h2 class="StepTitle">Dirección</h2>
 

				<?php
						$parroquia1 = $reg['parroquias_id'];
						$result2 = pg_query($dbconn, "SELECT * FROM parroquias WHERE id = $parroquia1 ");
                          if (!$result2) {
                          echo "Ocurrio un Error.\n";
                          exit;
                          }
                        $reg2=pg_fetch_array($result2);

						$municipio1 = $reg2['municipios_id'];
						$result3 = pg_query($dbconn, "SELECT * FROM municipios WHERE id = $municipio1 ");
                          if (!$result3) {
                          echo "Ocurrio un Error.\n";
                          exit;
                          }
                        $reg3=pg_fetch_array($result3);

            $estados1 = $reg3['estados_id'];
            $estados_consulta = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = $estados1 ");
                          if (!$estados_consulta) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_est=pg_fetch_array($estados_consulta);

            // Creación y/o formación de la consulta.
            $result33 = pg_query($dbconn, "SELECT * FROM public.estados WHERE id = 14 ");
                          if (!$result33) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
?>
                   <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboEstado">Estado<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="estados" id="cboEstado" title="Seleccione Estado para generar las otras consultas" required>
                            <option value="<?php echo $reg_est['id']; ?>"><?php echo $reg_est['nombre_estado']; ?></option>
                    <?php
                 // Validar el estatus de ejecución de la consulta.

                        while($row = pg_fetch_array($result33)){
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
                          <select class="form-control" name="municipios" id="cboMunicipio" title="Selecciones Municipio en que reside" required>
                              <option value='<?php echo $reg3['id']; ?>'><?php echo $reg3['nombre_municipio']; ?></option>

                          </select>
                      </div>
                    </div>


                    <div class="field item form-group"><!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboParroquia">Parroquia<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="parroquias_id" id="cboParroquia" title="Seleccione Parroquia en que reside">
                          <option value="<?php echo $reg2['id']; ?>" ><?php echo $reg2['nombre_parroquia']; ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="cboSectores">Sector<span
                          class="required"><font COLOR="#FF0000">*</font></span></label> 
                        <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="nombre_sector" id="cboSectores" title="Seleccione sector en que reside">
                          <option value="<?php echo $reg['nombre_sector']; ?>"><?php echo $reg['nombre_sector']; ?></option>
                        </select>
                      </div>
                    </div>
                                
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="avenida">Avenida<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="avenida" id="avenida" class="form-control optional" placeholder="Ingrese avenida de residencia" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['avenida']); ?>" title="Llene este campo con la avenida de residencia" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" required /></div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="calle">Calle</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="calle" id="calle" class="form-control optional" placeholder="Ingrese calle o vereda de residencia" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['calle']); ?>" title="Llene este campo con la calle o vereda de residencia" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="casa">Casa/Edificio<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="casa" id="casa" class="form-control optional" placeholder="Ingrese casa o edificio de residencia" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['casa']); ?>" title="Llene este campo con el nombre o número de casa o edificio de residencia" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" required /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="piso">Piso</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="piso" id="piso" class="form-control optional" placeholder="Ingrese piso del edificio" minlength="0" maxlength="40" value="<?php echo '0'.strtoupper($reg['piso']); ?>" title="Llene este campo con el número de piso del edificio de residencia" pattern="[0-9]{0,40}" data-validate-length-range="0,40" /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>                       
                      </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" id="apto">Apartamento</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="apto" id="apto" class="form-control optional" placeholder="Ingrese número de apartamento" minlength="0" maxlength="40" value="<?php echo strtoupper($reg['apto']); ?>" title="Llene este campo con el número de apartamento del edificio de residencia" pattern="[A-Za-z0-9 -]{0,40}" data-validate-length-range="0,40" /></div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: números menores a 10<br/> agregar un 0 - Ej: 00</p>
                        </div>                       
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia">Punto de Referencia<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="punto_referencia" id="punto_referencia" class="form-control optional" placeholder="Ingrese punto de referencia" minlength="6" maxlength="40" value="<?php echo strtoupper($reg['punto_referencia']); ?>" title="Llene este campo con un punto de referencia a la residencia" pattern="[A-Za-z0-9 -]{6,40}" data-validate-length-range="6,40" required='required' /></div>
                    </div>  
             

                    </div>
<!-- ********** STEP 4 ********** -->                      
                    <div id="step-4">
                    <h2 class="StepTitle">Laborales</h2>


                      <?php
						$organismos1 = $reg['organismos_id'];
						$result03 = pg_query($dbconn, "SELECT * FROM organismos WHERE id = $organismos1 ");
                          if (!$result03) {
                          echo "Ocurrio un Error.\n";
                          exit;
                          }
                        $reg03=pg_fetch_array($result03);

                      // Consulta a la Base de Datos
                          $result33 = pg_query($dbconn, "SELECT * FROM organismos");
                          if (!$result33) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_id">Organismo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select name="organismos_id" id="organismos_id" class="form-control" title="Seleccione el organismo de al cual pertenece" required>
                            <option value="<?php echo $reg03['id']; ?>" ><?php echo strtoupper($reg03['nombre_oganismos']); ?></option>
                            <?php
                              while($registro3=pg_fetch_array($result33))
                              { 
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
                        $reg04=pg_fetch_array($result04);

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
                          <select name="cargos_id" id="cargos_id" class="form-control" title="Seleccione el cargo asignado" required>
                            <option value="<?php echo $reg04['id']; ?>"><?php echo strtoupper($reg04['nombre_cargo']); ?></option>
                            <?php
                              while($registro4=pg_fetch_array($result4))
                              { 
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
                        $reg05=pg_fetch_array($result05);

                      // Consulta a la Base de Datos
                          $result5 = pg_query($dbconn, "SELECT * FROM rango_categoria");
                          if (!$result5) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="rango_categoria_id">Rango<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select name="rango_categoria_id" id="rango_categoria_id" class="form-control" title="Seleccione el rango asignado o posee" >
                            <option value="<?php echo $reg05['id']; ?>"><?php echo strtoupper($reg05['nombre_rango']); ?></option>
                            <?php
                              while($registro5=pg_fetch_array($result5))
                              { 
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
                        $reg_10=pg_fetch_array($result_10);

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
                          <select name="grupo_guardia_id" id="grupo_guardia_id" class="form-control" title="Seleccione el grupo de guardia asignado" required>
                            <option value="<?php echo $reg_10['id']; ?>"><?php echo strtoupper($reg_10['nombre_grupo']); ?></option>
                            <?php
                              while($registro10=pg_fetch_array($result10))
                              { 
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
                        $reg_est1=pg_fetch_array($result06);
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
                        <select name="estatus_personal_id" id="estatus_personal_id" class="form-control" title="Seleccione el estatus en que se encuetra el personal" >
                            <option value="<?php echo $reg_est1['id']; ?>"><?php echo strtoupper($reg_est1['estatus']); ?></option>
                            <?php
                              while($registro6=pg_fetch_array($result6))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro6[0] ?> "><?php echo strtoupper($registro6[1]); ?></option>
                            <?php 
                              }
                            ?>
                          </select></div>
                      </div>


                    <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $reg['fecha_creacion']; ?>" required />


                    <input type="hidden" name="fecha_modificacion" id="fecha_modificacion" value="<?php echo $fecha_modificacion= date ("Y/n/j H:m:s T");?>" required />

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />

                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Actualizar</button>
                    <button type='reset' class="btn btn-success">Limpiar</button>
                        </div>
                      </div>
                    </div>

                    </div>
                    </form>
                    </div>
                    </div>
                    <!-- End SmartWizard Content -->

  <?php } ?>
                  </div>
                </div>
              </div>
            </div>