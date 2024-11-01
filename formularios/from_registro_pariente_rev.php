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
              <input type="text" name="cedula_p" id="cedula_p" class="form-control" placeholder="Ingrese número cédula" minlength="7" maxlength="8" title="Llene este campo con el número de cédula del familiar" autofocus pattern="[0-9]{7,8}" required="required" />
            </div>
          </div>

          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_p">Primer Nombre<span
                class="required"><font COLOR="#FF0000">*</font></span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="nombre_p" id="nombre_p" class="form-control" placeholder="Ingrese primer nombre" minlength="3" maxlength="20" title="Llene este campo con el primer nombre del familiar" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
            </div>
          </div>

          <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align" for="apellido_p">Primer Apellido<span class="required"><font COLOR="#FF0000">*</font></span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="apellido_p" id="apellido_p" class="form-control" placeholder="Ingrese primer apellido" minlength="2" maxlength="20" title="Llene este campo con el primer apellido del familiar" pattern="[A-záéíóúüñÁÉÍÓÜÚÑ -]{3,20}" required="required" />
            </div>
          </div>

            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_p">Telefono<span
                class="required"><font COLOR="#FF0000">*</font></span></label>
              <div class="col-md-6 col-sm-6">
                <input type="text" name="telefono_p" id="telefono_p" class="form-control" title="Llene este campo con el número de teléfono del familiar" placeholder="Ingrese número telefono" maxlength="14" data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}" required='required' />
              </div>
              <div class="col-md-6 col-sm-6">
                <p>Ej: (274) 262-4321</p>
              </div>
            </div>

            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_p">Observaciones<span
                class="required"><font COLOR="#FF0000">*</font></span></label>
              <div class="col-md-6 col-sm-6">
                <textarea type="text" name="observaciones_p" id="observaciones_p" class="resizable_textarea form-control" placeholder="Ingrese alguna observacion del familiar" minlength="8" maxlength="400" title="Llene este campo con alguna observación necesaria para el familiar" required='required' pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-0-9]{8,400}" /></textarea>
              </div>
            </div>

            <?php
            // Consulta a la Base de Datos
                $result7 = pg_query($dbconn, "SELECT * FROM tipo_parenstesco");
                if (!$result7) {
                echo "Ocurrió un error.\n";
                exit;
                }
            ?>
          <div class="field item form-group">
               <label class="col-form-label col-md-3 col-sm-3  label-align" for="tipo_parenstesco_id">Parentesco<span
                class="required"><font COLOR="#FF0000">*</font></span></label>
            <div class="col-md-6 col-sm-6">
                <select name="tipo_parenstesco_id" id="tipo_parenstesco_id" class="form-control" title="Seleccione el parentesco del familiar" required>
                  <option value="">--Seleccione--</option>
                  <?php
                    while($registro7=pg_fetch_array($result7))
                    { 
                  ?>
                  <option name="id" value="<?php echo $registro7[0] ?> "><?php echo $registro7[1] ?></option>
                  <?php 
                    }
                  ?>
                </select>
            </div>
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
<!-- ***********    Fin Formulario Datos de Contacto    ************************ -->

    </div>
  </div>
</div>