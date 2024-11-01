          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">

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
                    <strong>Deberas de Completar todos los campo!!!</strong></div>';
              } 
              if ($_GET[msg] == "5") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos de pariente actualizado con exito!</strong></div>';

              }
              elseif ($_GET[msg] == "6") {
              echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No se pudo actualizar los datos!</strong></div>';
              }
             
              ?>
                    </div>

                    <br/><br/>
                <div class="x_content">
<?php 
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////
///////////////////////////////// FORMULARIO PARIENTES DEL PERSONAL     ///////////////////////////////
    
      // CONSULTA TABLA PERSONAL
        $result_get01 = pg_query($dbconn, "SELECT * FROM public.parantesco_personal WHERE personal_cedula = $cedula1");
              if (!$result_get01) {
                    echo "Ocurrió un error.\n";
                exit;
                }
?>

                  <form class="" action="../insertar_personal.php?ac=4" method="post" data-parsley-validate>
                            <?php
                              while($pariente=pg_fetch_array($result_get01))
                              { 
                            ?>
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>

                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="cedula_p">Cédula<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">

                        <input type="text" name="cedula_p" id="cedula_p" class="form-control" placeholder="Ingrese número cédula" minlength="7" maxlength="8" value="<?php echo $pariente['cedula_p']; ?>" title="Llene este campo con el número de cédula del familiar" autofocus pattern="[0-9]{7,8}" required="required" />
                      </div>
                    </div>

                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_p">Primer Nombre<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="nombre_p" id="nombre_p" class="form-control" placeholder="Ingrese primer nombre" minlength="3" maxlength="20" value="<?php echo strtoupper($pariente['nombre_p']); ?>" title="Llene este campo con el primer nombre del familiar" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ]{3,20}" required="required" />
                      </div>
                    </div>

                    
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="apellido_p">Primer Apellido<span class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <input name="apellido_p" id="apellido_p" class="form-control" placeholder="Ingrese primer apellido" required="required" minlength="3" maxlength="20" value="<?php echo strtoupper($pariente['apellido_p']); ?>" title="Llene este campo con el primer apellido del familiar" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ]{3,20}"/>
                      </div>
                    </div>

                      <div class="field item form-group">
                        <div class="col-md-6 col-sm-6">
                          <input type="hidden" name="" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_p">Teléfono<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" name="telefono_p" id="telefono_p" class="form-control" value="<?php echo strtoupper($pariente['telefono_p']); ?>" title="Llene este campo con el número de teléfono de habitación" placeholder="Ingrese número habitación o móvil" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <p>Ej: (274) 262-4321</p>
                        </div>
                      </div>

                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_p">Observaciones<span class="required"><font COLOR="#FF0000">*</font></span></label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="observaciones_p" id="observaciones_p" class="resizable_textarea form-control" placeholder="Ingrese alguna observacion del familiar" minlength="8" maxlength="400" value="<?php echo strtoupper($pariente['observaciones_p']); ?>" title="Llene este campo con alguna observación necesaria para el familiar" required='required' pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}" /><?php echo strtoupper($pariente['observaciones_p']); ?></textarea>
                        </div>
                      </div>

                      <?php

                      $tipo1 = $pariente['tipo_parenstesco_id'];
                      // Cunsulta Base de Datos con Valor de registro
                      $parentesco = pg_query($dbconn, "SELECT * FROM tipo_parenstesco WHERE id = $tipo1 ");
                      $tipo_p =pg_fetch_array($parentesco);

                      if (!$parentesco){
                        echo "Error con tabla de parentesco";
                        exit;
                      }
                      

                      // Consulta a la Base de Datos
                          $result7 = pg_query($dbconn, "SELECT * FROM tipo_parenstesco");
                          if (!$result7) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group">
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Parentesco<span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="tipo_parenstesco_id" title="Seleccione el parentesco del familiar" required>
                            <option value="<?php echo $tipo_p['id']; ?>"><?php echo strtoupper($tipo_p['tipo_par']);?></option>
                            <?php
                              while($registro7=pg_fetch_array($result7))
                              { 
                            ?>
                            <option name="id" value="<?php echo $registro7[0] ?> "><?php echo strtoupper($registro7[1]); ?></option>
                            <?php 
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <input type="hidden" name="id" required="required" value="<?php echo $pariente['id']; ?>" /> 
                    <input type="hidden" name="personal_cedula" id="personal_cedula" value="<?php echo $cedula1;?>" required />

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
                  <?php } ?>
                  </form>
                </div>
  <!-- ***********    Fin Formulario Datos de Contacto    ************************ -->

              </div>
            </div>
          </div>