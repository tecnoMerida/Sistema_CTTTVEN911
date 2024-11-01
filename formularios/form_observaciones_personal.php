
                  <div class="field item form-group">
                      <div class="col-md-3 col-sm-3"></div>
                      <div class="col-md-6 col-sm-6">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>

                      <?php /********* Seleccion el estatus de la Solicitud ***********/
                      // Consulta a la Base de Datos
                          $consulta1 = pg_query($dbconn, "SELECT * FROM observaciones_salida");
                          if (!$consulta1) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="observaciones_salida_id"> Tipo <span class="required"><font COLOR="#FF0000">*</font></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="form-control" name="observaciones_salida_id" id="observaciones_salida_id" title="Seleccione el tipo de observacion" required="required">
                          <option value="">-Seleccione observación-</option>
                            <?php
                              while($reg1=pg_fetch_array($consulta1))
                              { 
                            ?>
                            <option name="id" value="<?php echo $reg1[0] ?> "><?php echo strtoupper($reg1[1]); ?></option>
                            <?php 
                              }
                            ?>
                        </select>
                        </div>
                      </div>

                      <?php /********* Seleccion del Personal de Guardia ***********/
                      // Consulta a la Base de Datos
                      if($_SESSION['tipo_rol_id'] != 2){
                        $consulta_grupo_guardia = pg_query($dbconn,"SELECT * FROM public.personal_grupos_guardia WHERE fecha_asig = (SELECT MAX(fecha_asig) FROM personal_grupos_guardia);");
                            if (!$consulta_grupo_guardia) {
                            echo "Ocurrió un error.\n";
                            exit;
                            }
                            $grupo=pg_fetch_array($consulta_grupo_guardia);

                            $grupo2 = $grupo['grupos_guardia_id'];
                            //$consulta_pers3 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo2 AND estatus_personal_id = 1");
                            $consulta_pers3 = pg_query($dbconn,"SELECT * FROM public.personal WHERE estatus_personal_id = 1");
                            if (!$consulta_pers3) {
                            echo "Ocurrió un error.\n";
                            exit;
                            }
                      ?>
                        <div class="field item form-group"><!-- // Seleccion del Personal de Guardia //-->
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula">Personal<span class="required"><font COLOR="#FF0000">*</font></span></label> 
                            <div class="col-md-6 col-sm-6">
                            <select name="personal_cedula" id="personal_cedula" class="form-control" title="Seleccione la Persona a realizarle la observación" required>
                              <option value="">-Seleccione la persona-</option>
                                <?php
                                  while($reg2=pg_fetch_array($consulta_pers3))
                                  { 
                                ?>
                                <option name="id" value="<?php echo $reg2['cedula'] ?> "><?php echo strtoupper($reg2['p_nombre']); echo " "; echo strtoupper($reg2['p_apellido']); ?></option>
                                <?php
                                  }
                      } else {
                      $grupo1 = $grupo;
                      $consulta_pers3 = pg_query($dbconn,"SELECT * FROM public.personal WHERE estatus_personal_id = 1");
                          if (!$consulta_pers3) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }

                      ?>
                    <div class="field item form-group"><!-- // Seleccion del Personal de Guardia //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula">Personal<span class="required"><font COLOR="#FF0000">*</font></span></label> 
                        <div class="col-md-6 col-sm-6">
                        <select name="personal_cedula" id="personal_cedula" class="form-control" title="Seleccione la Persona a realizarle la observación" required>
                          <option value="">-Seleccione la persona-</option>
                            <?php
                              while($reg2=pg_fetch_array($consulta_pers3))
                              { 
                            ?>
                            <option name="id" value="<?php echo $reg2['cedula'] ?> "><?php echo strtoupper($reg2['p_nombre']); echo " "; echo strtoupper($reg2['p_apellido']); ?></option>
                            <?php 
                              }
                          }
                            ?>
                        </select>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="descripcion">Descripción <span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-6 col-sm-6">
                        <textarea name="descripcion" id="descripcion" class="resizable_textarea form-control" placeholder="Observaciones al personal" maxlength="500" title="Llene este campo con detalles de observaciones al personal" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-:;/]{2,500}" ></textarea>
                      </div>
                    </div>


            <input type="hidden" name="cedula_usuario" value="<?php echo $cedula; ?>" required>

            <input type="hidden" name="guardias_id" value="<?php echo $apertura_guardia; ?>" required>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-9 col-sm-9  offset-md-9">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          <button type="reset" class="btn btn-success">Limpiar</button>
                        </div>
                      </div>

