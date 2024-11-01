<?php
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////


                          $result = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                          if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>BIENES</h4>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modificar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  	<div class="col-md-12 col-sm-12" align="center">
							<?php
                  if ($_GET['msg'] == "1") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Deberas de Completar todos los campo!!!</strong></div>';
                    
              } 
              if ($_GET['msg'] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos bienes actualizado con EXITO!</strong></div>';
                    

              }
              elseif ($_GET['msg'] == "3") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>NO se pudo actualizar los datos!</strong></div>';
                    
              }
             
              ?>
					</div>

                  	<br/><br/><br/><br/>
<!-- Inicio Formulario Registro Bienes -->
                  <form class="" action="../insertar_bienes.php?ac=2" method="post" data-parsley-validate>
                  <?php
                      while($reg=pg_fetch_array($result))
                              { 
                                $cod = $reg['codigo_b'];
                  ?>

                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>

                  <div class="field item form-group">
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="hidden" value="<?php echo $id; ?>" name="id" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="codigo_b">Código<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="codigo_b" id="codigo_b" class="form-control" value="<?php echo strtoupper($reg['codigo_b']); ?>" placeholder="Ingrese Código Bienes" required="required" minlength="5" maxlength="20" title="Llene este campo con el código de bienes, entre 5 y 20 dígitos" pattern="[A-Za-z0-9 /-]{5,20}" />
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <p>Ej: TT-01-1234-ABCD-00DD</p>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_b">Nombre<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="nombre_b" id="nombre_b" class="form-control" value="<?php echo strtoupper($reg['nombre_b']); ?>" placeholder="Ingrese nombre del bienes" required="required" minlength="3" maxlength="20" title="Llene este campo con el nombre del bienes, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9 ]{3,20}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="marca_b">Marca<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="marca_b" id="marca_b" class="form-control" value="<?php echo strtoupper($reg['marca_b']); ?>" placeholder="Ingrese marca del bienes" required="required" minlength="3" maxlength="20" title="Llene este campo con la marca del bienes, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9]{3,20}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="modelo_b">Modelo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="modelo_b" id="modelo_b" class="form-control" value="<?php echo strtoupper($reg['modelo_b']); ?>" placeholder="Ingrese modelo del bienes" required="required" minlength="3" maxlength="20" title="Llene este campo con el modelo del bienes, entre 3 y 20 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9-]{3,20}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="color_b">Color<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="color_b" id="color_b" class="form-control" value="<?php echo strtoupper($reg['color_b']); ?>" placeholder="Ingrese color del bienes" required="required" minlength="4" maxlength="50" title="Llene este campo con el color del bienes, entre 4 y 50 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9 ]{4,50}" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="serial_b">Serial<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="serial_b" id="serial_b" class="form-control" value="<?php echo strtoupper($reg['serial_b']); ?>" placeholder="Ingrese Serial del Bienes" required="required" minlength="4" maxlength="50" title="Llene este campo con el serial del bienes, entre 4 y 40 dígitos" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9/-]{4,50}" />
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <p>Ej: ABCD-0000-ABCD-0000</p>
                      </div>
                    </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_b">Descripción<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="descripcion_b" id="observaciones_b" class="resizable_textarea form-control" value="<?php echo strtoupper($reg['descripcion_b']); ?>" placeholder="Ingrese alguna descripción del bienes, con caráteristicas que éste posee" minlength="8" maxlength="400" title="Llene este campo con alguna descripción del bienes, entre 8 y 400 dígitos" required='required' pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}" /><?php echo strtoupper($reg['descripcion_b']); ?></textarea>
                        </div>
                      </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_ingreso_b">Fecha Ingreso<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" name="fecha_ingreso_b" id="fecha_ingreso_b" class="form-control" value="<?php echo $reg['fecha_ingreso_b']; ?>" placeholder="Seleccione la fecha" required="required" title="Seleccione una fecha de ingreso de bienes para este campo " />
                      </div>
                    </div>

                      <!-- contiene input de la institucion al que pertenece los bienes -->
                        <input type="hidden" class="form-control" name="direccion" placeholder="Ingrese dirección a la que pertenece" value="M.P.P RELACIONES INTERIORES, JUSTICIA Y PAZ" required="required" minlength="3" maxlength="60" title="Llene este campo la Institución a la que pertenece" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9]{3,60}"/>

                      <!-- contiene input de la coordinación al que pertenece los bienes -->
                        <input type="hidden" class="form-control" name="coordinacion" placeholder="Ingrese coordinación a la que pertenece" value="EMERGENCIAS 911" required="required" minlength="3" maxlength="60" title="Llene este campo con la coordinación a la que pertenece" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ0-9]{3,60}"/>


                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones">Observaciones<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="observaciones" id="observaciones" class="resizable_textarea form-control" value="<?php echo strtoupper($reg['observaciones']); ?>" placeholder="Ingrese alguna observación del bienes, con algún cámbio, defecto o modificación" minlength="8" maxlength="400" title="Llene este campo con alguna observación del bienes, entre 8 y 400 dígitos" required='required' pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}" /><?php echo strtoupper($reg['observaciones']); ?></textarea>

                        </div>
                      </div>
                      <?php
                          $bienes = $reg['ubicacion_bienes_id'];
                      // Consulta a la Base de Datos
                          $result_con = pg_query($dbconn, "SELECT * FROM ubicacion_bienes WHERE id = $bienes");
                          $reg2=pg_fetch_array($result_con);
                          if (!$result_con) {
                          echo "Ocurrió un error.\n";
                          exit;
                          } 

                      // Consulta a la Base de Datos
                          $result = pg_query($dbconn, "SELECT * FROM ubicacion_bienes");
                          if (!$result) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="ubicacion_bienes_id">Ubicación<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="ubicacion_bienes_id" id="ubicacion_bienes_id" title="Seleccione este campo con la ubicación del bienes" required='required'>
                            <option value="<?php echo $reg2[0]; ?>"><?php echo strtoupper($reg2[1]); ?></option>
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
                          $estadob = $reg['estado_bien_id'];
                      // Consulta a la Base de Datos
                          $result2_con = pg_query($dbconn, "SELECT * FROM estado_bien WHERE id = $estadob");
                          $reg3=pg_fetch_array($result2_con);
                          if (!$result2_con) {
                          echo "Ocurrió un error.\n";
                          exit;
                          } 

                      // Consulta a la Base de Datos
                          $result1 = pg_query($dbconn, "SELECT * FROM estado_bien");
                          if (!$result1) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="estado_bien_id">Estado<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="estado_bien_id" id="estado_bien_id" title="Seleccione en este campo el estado del bienes" required='required'>
                            <option value="<?php echo $reg3[0]; ?>"><?php echo strtoupper($reg3[1]); ?></option>
                            <?php
                              while($registro1=pg_fetch_array($result1))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro1[0] ?> "><?php echo strtoupper($registro1[1]); ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_estado">Fecha Estado<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" name="fecha_estado" id="fecha_estado" class="form-control" value="<?php echo $reg['fecha_estado']; ?>" placeholder="Seleccione la fecha" required="required" title="Seleccione una fecha del estado del bienes " />
                      </div>
                    </div>

                      <?php
                          $orgcon = $reg['organismos_id'];
                      // Consulta a la Base de Datos
                          $result3_con = pg_query($dbconn, "SELECT * FROM organismos WHERE id = $orgcon");
                          $reg4=pg_fetch_array($result3_con);
                          if (!$result3_con) {
                          echo "Ocurrió un error.\n";
                          exit;
                          } 

                      // Consulta a la Base de Datos
                          $result2 = pg_query($dbconn, "SELECT * FROM organismos");
                          if (!$result2) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos_id">Organismo<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="organismos_id" id="organismos_id" title="Seleccione en este campo para la asignación del bienes al organismo" required="required">
                            <option value="<?php echo $reg4[0]; ?>"><?php echo strtoupper($reg4[1]); ?></option>
                            <?php
                              while($registro2=pg_fetch_array($result2))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro2[0] ?> "><?php echo strtoupper($registro2[1]); ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                      <!-- contiene input de la fecha de creación de los bienes -->
                    <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $reg['fecha_creacion']; ?>" required />

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />

                    <?php 
                      }
                    ?>
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Actualizar</button>
                    <button type='reset' class="btn btn-success">Limpiar</button>
                        </div>
                      </div>
                    </div>
                  </form>

  <!-- ***********    Fin Formulario Registro de Bienes    ************************ -->


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->