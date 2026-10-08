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
                  <form class="" action="../insertar_personal.php?ac=5" method="post" data-parsley-validate>
                  <?php
                    $cedula_personal= $reg_id['cedula'];
                        $ultimo_usuario = pg_query($dbconn,"SELECT * FROM public.usuario WHERE personal_cedula = $cedula_personal ");
                        $reg_usuario= pg_fetch_array($ultimo_usuario);

                  ?>
                   <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Usuario</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="usuario" placeholder="Ingrese nombre usuario" required="required" title="Llene este campo con el nombre de usuario, para acceder al sistema 'Libro Digital de Novedades 171/911'" value="<?php echo $reg_usuario['usuario'];?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Contraseña</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="contrasena" placeholder="Ingrese contraseña usuario" title="Llene este campo con la contraseña de usuario, para acceder al sistema 'Libro Digital de Novedades 171/911'" value="********" disabled />
                      </div>
                    </div>

                      <?php
                      // Consulta a la Base de Datos
                      $rol = $reg_usuario['tipo_rol_id'];
                          $consulta_rol = pg_query($dbconn, "SELECT * FROM tipo_rol WHERE id = $rol");
                          if (!$consulta_rol) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $reg_rol=pg_fetch_array($consulta_rol);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Rol</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="tipo_rol_id" title="Seleccione el rol que le corresponde" value="<?php echo strtoupper($reg_rol['tipo_rol']);?>" disabled />
                      </div>
                    </div>


                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus Usuario</label>
                      <div class="col-md-6 col-sm-6"><p>
                      <?php
                      // Consulta a la Base de Datos
                      $estado = $reg_usuario['estado_usuario_id'];
              if($estado != 2 ){
                echo '&nbsp; Activo&nbsp;<label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="">
                     <input type="radio" name="genero_id" value="1" class="flat" checked="checked" disabled ></label> ';
                echo '&nbsp; Inactivo&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="genero_id" value="2" class="flat" disabled ></label>';
              }else{
                echo '&nbsp; Activo&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="genero_id" value="1" class="flat" disabled ></label> ';
                echo '&nbsp; Inactivo&nbsp;
                  <label class="btn btn-secondary md-2 col-1,5" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title=""><input type="radio" name="genero_id" value="2" class="flat" checked disabled ></label> ';
              }
                      ?>
                          </p></div>
                      </div>

                    <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $reg_id['cedula'];?>" required />

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />                

                    <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion= date ("Y/n/j H:m:s");?>" required /> 


                  </form>
                </div>
<!-- *********************************************************************************************** -->
                  </div>
                </div>
              </div>