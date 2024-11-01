<div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel" id="usuario">

<!-- ***********    Inicio Formulario Usuario    ************************ -->
                  <div class="x_title">
                  <h2>Datos Usuario </h2>
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
                  if ($_GET[msg] == "7") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No puedes realizar este registro!!!</strong></div>';
              } 
              if ($_GET[msg] == "8") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Usuario Registrado con EXITO!!!</strong></div>';

              }
              elseif ($_GET[msg] == "9") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Usuario NO registrado</strong></div>';
              }
             
              ?>
              </div> 
                <div class="x_content">
                  <form class="" action="../insertar_usuario.php?ac=1" method="post" data-parsley-validate>
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>
                   <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="usuario">Usuario<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese nombre usuario" minlength="6" maxlength="10" title="Llene este campo con el nombre de usuario, para acceder al sistema 'Libro Digital de Novedades 171/911'" pattern="[A-Za-z0-9]{6,10}" required="required" autofocus />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="contrasena">Contraseña<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese contraseña usuario" minlength="6" maxlength="10" title="Llene este campo con la contraseña de usuario, para acceder al sistema 'Libro Digital de Novedades 171/911'" pattern="[A-Za-z0-9&%$!*+@#]{6,10}" required="required" />
                      </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Nota: puedes usar & % $ ! * + @ # </p>
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Rol<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="tipo_rol_id" title="Seleccione el rol que le corresponde" required>
                            <option value="">--Seleccione--</option>
                            <?php
                              while($registro8=pg_fetch_array($result8))
                              { 
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
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus Usuario<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6"><p>
                            <?php
                              while($registro9=pg_fetch_array($result9))
                              { 
                             echo $registro9[1] ?>
                            <input type="radio" class="flat" name="estado_usuario_id" id="genderF" value="<?php echo $registro9[0] ?>" />
                            <?php 
                              }
                            ?>
                          </p></div>
                      </div>


                    <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $reg_id['cedula'];?>" required />
            
                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />

                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Guardar</button>
                    <button type='reset' class="btn btn-success">Limpiar</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
<!-- *********************************************************************************************** -->
                  </div>
                </div>
              </div>