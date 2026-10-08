          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel" id="familiar">

  <!-- *********** Formulario de Contenido Datos de Contacto ********************* -->
                  <div class="x_title">
                  <h2>Datos del Familiar </h2>
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
                  if ($_GET[msg] == "4") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No puedes realizar este registro, número de cédula ya Existe!!!</strong></div>';
              } 
              if ($_GET[msg] == "5") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Familiar Registrado con EXITO!!!</strong></div>';

              }
              elseif ($_GET[msg] == "6") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Familiar NO registrado</strong></div>';
              }
             
              ?>
              </div>                
                <div class="x_content">
                  <form class="" action="../insertar_personal.php?ac=3" method="post" data-parsley-validate>
                  <?php
                    $cedula_personal= $reg_id['cedula'];

                        $ultimo_pariente = pg_query($dbconn,"SELECT * FROM public.parantesco_personal WHERE personal_cedula = $cedula_personal ");
                        $reg_pariente= pg_fetch_array($ultimo_pariente);

                  ?>
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Cédula</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" name="cedula_p" placeholder="Ingrese número cédula" title="Llene este campo con el número de cédula del familiar" value="<?php echo $reg_pariente['cedula_p'];?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Nombre</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" name="nombre_p" placeholder="Ingrese primer nombre" title="Llene este campo con el primer nombre del familiar" value="<?php echo strtoupper($reg_pariente['nombre_p']);?>" disabled />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" name="apellido_p" placeholder="Ingrese primer apellido" title="Llene este campo con el primer apellido del familiar" value="<?php echo strtoupper($reg_pariente['apellido_p']);?>" disabled />
                      </div>
                    </div>

                        <input type="hidden" class="form-control" name="apellido_p" placeholder="Ingrese primer apellido" title="Llene este campo con el primer apellido del familiar" value="<?php echo $reg_pariente['telefono_p'];?>" disabled />

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Teléfono</label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" class="form-control" name="telefono_p" title="Llene este campo con el número de teléfono del familiar" placeholder="Ingrese número teléfono" data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" value="<?php echo $reg_pariente['telefono_p'];?>" disabled />
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Observaciones</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="observaciones_p" id="observaciones_p" class="resizable_textarea form-control" placeholder="Ingrese alguna observacion del familiar" maxlength="400" title="Llene este campo con alguna observación necesaria para el familiar" disabled/><?php echo strtoupper($reg_pariente['observaciones_p']);?></textarea>
                        </div>
                      </div>

                      <?php
                      // Consulta a la Base de Datos
                      $tipo_p = $reg_pariente['tipo_parenstesco_id'];
                          $consulta_tipo_p = pg_query($dbconn, "SELECT * FROM tipo_parenstesco WHERE id = $tipo_p");
                          if (!$consulta_tipo_p) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                        $reg_tipo= pg_fetch_array($consulta_tipo_p);
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Parentesco</label>
                      <div class="col-md-6 col-sm-6">
                          <input class="form-control" name="tipo_parenstesco_id" title="Seleccione el parentesco del familiar" value="<?php echo strtoupper($reg_tipo['tipo_par']);?>" disabled>

                      </div>
                    </div>


                    <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $reg_id['cedula'];?>" required />

                    <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />                

                    <input type="hidden" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion= date ("Y/n/j H:m:s");?>" required /> 
  

                  </form>
                </div>
  <!-- ***********    Fin Formulario Datos de Contacto    ************************ -->

              </div>
            </div>
          </div>