<!-- ********** STEP 1 ********** -->                      
<div id="step-1">

                  <div class="field item form-group"><!-- // Hora de apertura de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="numero_solicitud">Nº de Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" id="numero_solicitud" name="numero_solicitud" placeholder="Nº solicitud" required value="<?php echo $fila['id'];?>" title="Este campo posee el número de la solicitud" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Fecha de la solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_solicitud">Fecha Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud" placeholder="Fecha solicitud" value="<?php echo $fila['fecha'];?>" title="Este campo posee la fecha de solicitud" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Hora de la Llamada de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Hora de Solicitud:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_solicitud" placeholder="Ingrese hora solicitud" required value="<?php echo $fila['hora_sol'];?>" title="Este campo posee la hora de llamada de solicitud" readonly/>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Hora de cierre de la Solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Hora de Cierre:</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="time" class="form-control" name="hora_cierre" placeholder="Ingrese hora cierre" required value="<?php echo $fila['hora_des'];?>" title="Este campo posee la hora de cierre de la solicitud" readonly/>
                      </div>
                    </div>

</div>

<!-- ********** STEP 2 ********** -->                      
<div id="step-2"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Solicitante</h2>

<!-- ////////////////////////////////    SOLICITANTE    ////////////////////////////////////////// -->

                    <div class="field item form-group"><!-- // nombre y apellido de la persona que llama // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre Solicitante:</label>
                      <div class="col-md-3 col-sm-3">
                        <input type="varchar" class="form-control" name="nombre_solicitante" placeholder="Nombre solicitante" required maxlength="40" value="<?php echo strtoupper($fila['solicitante']);?>" title="Este campo posee nombre y apellido de quien realiza la llamada" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ1-9 -]{1,40}" readonly/>
                      </div>

                    </div>
 
<?php
            $motivo=$fila['motivo'];// consulta el motivo de la llamada en "Sistema 911"
            $registrosm = mysqli_query($conexion2,"SELECT * FROM motivos_padre INNER JOIN motivos_hijos ON motivos_hijos.p_id = motivos_padre.pid WHERE id_motivo = $motivo ");
            $fila1 = mysqli_fetch_array($registrosm);

            
            $motivo_pid = $fila1['pid'];// consulta el motivo de la llamada en "Libro Digital de Novedades 911"
            $nombre_motivo = utf8_decode($fila1['nom_mot_hijo']);
            $motivo1 = pg_query($dbconn,"SELECT * FROM motivo_solicitud_grupo INNER JOIN motivo_solicitud ON motivo_solicitud.motivo_grupo_id = motivo_solicitud_grupo.id WHERE motivo_solicitud_grupo.id = $motivo_pid AND motivo_solicitud.nombre_motivo LIKE '%$nombre_motivo%' ") or die("Error L:05 ved");
            $fila2 = pg_fetch_array($motivo1);

?>
                <div class="field item form-group"><!-- ///////////        motivo de la llamada         ////////   -->
                  <label class="col-form-label col-md-3 col-sm-3  label-align">Motivo:</label>
                      <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control" name="" placeholder="Motivo de llamada" value="<?php echo strtoupper($fila1['nom_motivo_padre']); echo ' - '; echo strtoupper($fila1['nom_mot_hijo']);?>" title="Este campo posee el motivo de la solicitud" required readonly />
                    <input type="hidden" class="form-control" name="motivo_solicitud" placeholder="Motivo de llamada" value="<?php echo $fila2[2];?>" title="Este campo posee el motivo de la solicitud" required readonly />
                  </div>
                </div>

</div>

<!-- ********** STEP 3 ********** -->                      
<div id="step-3"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Detalles</h2>

<!-- ///////////////////////////////////// DETALLES DE SOLICITUD //////////////////////////////////////////////   -->

                      <div class="field item form-group"><!-- //      direccion donde ocurre el evento   //    -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Dirección</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="direccion" id="direccion" class="resizable_textarea form-control" placeholder="Dirección del Hecho de la Solicitud" maxlength="1000" value="<?php echo strtoupper($fila['direccion']);?>" title="Este campo posee dirección exacta del lugar del evento" required readonly /><?php echo strtoupper($fila['direccion']);?></textarea>
                        </div>
                      </div>
                      <div class="field item form-group"><!-- //       detalles de la novedad           //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Detalles</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="detalles" id="detalles" class="resizable_textarea form-control" placeholder="Detalles de la solicitud" maxlength="1000" value="<?php echo $fila['detalles'];?>" title="Este campo posee detalles del evento" required readonly /><?php echo strtoupper($fila['detalles']);?></textarea>
                        </div>
                      </div>
                      <div class="field item form-group"><!-- //     procedimiento realizado de la novedad   //  -->
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Procedimiento</label>
                        <div class="col-md-6 col-sm-6">
                          <textarea type="text" name="procedimiento" id="procedimiento" class="resizable_textarea form-control" placeholder="Procedimiento en el sitio de la solicitud" maxlength="1500" value="<?php echo $fila['procedimiento'];?>" title="Este campo posee el procedimiento realizado por los funcionarios en el lugar del evento" required readonly ><?php echo strtoupper($fila['procedimiento']);?></textarea>
                        </div>
                      </div> 

                    <div class="field item form-group"><!-- //    numeros de fallecidos en caso de haber    //   -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Fallecidos</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" class="form-control" name="fallecidos" placeholder="Nº fallecidos" required min="0" max="999" maxlength="3" value="<?php echo $fila['fallecidos'];?>" title="Este campo posee el número de fallecidos en caso de existir" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //    numeros de lesionados en caso de haber    //   -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Lesionados</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" class="form-control" name="lesionados" placeholder="Nº lesionados" required min="0" max="999" maxlength="3" value="<?php echo $fila['lesionados'];?>" title="Este campo posee el número de lesionados en caso de existir" readonly />
                      </div>
                    </div>

</div>

<!-- ********** STEP 4 ********** -->                      
<div id="step-4"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Ubicación</h2>

<!-- ************************************************************************************************* -->

<!--  //////////////////////////////////////     UBICACIÓN DE SOLITITUDES       //////////////////////////////// -->

<!-- ************************************************************************************************* -->
          <?php
            $munic = $fila['municipio'];// consulta Municipio de solicitud "Sistema 171"
            $parroq = $fila['parroquia'];
            //$registromun = mysqli_query($conexion2,"SELECT * FROM `municipios` WHERE id = $munic ");
            $registromun = mysqli_query($conexion2,"SELECT * FROM municipios INNER JOIN parroquias ON parroquias.id_municipios = municipios.id WHERE municipios.id = $munic AND parroquias.id = $parroq ");
            $fila6 = mysqli_fetch_array($registromun);

            $munp_id=$fila6[0]+177;

          ?>
                    <div class="field item form-group"><!-- // Seleccion del Municipio donde ocurrio el evento //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Municipio</label>
                      <div class="col-md-6 col-sm-6">
                          <input type="hidden" class="form-control" name="municipio" id="municipio" value="<?php echo $munp_id;?>" title="Este campo posee el municipio en que sucede el evento de solicitud" required readonly />
                          <input type="text" class="form-control" name="" id="municipio" value="<?php echo strtoupper($fila6[1]);?>" title="Este campo posee el municipio en que sucede el evento de solicitud" required readonly />
                      </div>
                    </div>
          <?php
                    $array = str_split(strtoupper($fila6[3]));
                    $acum = array_key_last($array);
                    $resp = '';
                    $contador = 0;
                    for ($i=0; $i <= $acum ; $i++) { 
                      $parroquia = pg_query($dbconn,"SELECT municipios.id, municipios.nombre_municipio, parroquias.id AS nu, parroquias.nombre_parroquia FROM public.municipios INNER JOIN parroquias ON parroquias.municipios_id = municipios.id WHERE municipios.id = $munp_id AND parroquias.nombre_parroquia LIKE '%$array[0]%'") or die("Error L:05 ved");
                      $fila66 = pg_fetch_array($parroquia);
                      $resp .= $fila66;                      
                    }
                    foreach ($variable as $key => $value) {
                      # code...
                    }
                    //$conteo = array_rand($array);
                    //$conteo = array_keys($array);
//                    $parroquia = pg_query($dbconn,"SELECT municipios.id, municipios.nombre_municipio, parroquias.id AS nu, parroquias.nombre_parroquia FROM public.municipios INNER JOIN parroquias ON parroquias.municipios_id = municipios.id WHERE municipios.id = $munp_id AND parroquias.nombre_parroquia LIKE '%$array[0]%'") or die("Error L:05 ved");
//                    $fila66 = pg_fetch_array($parroquia);
          

          ?>
                    <div class="field item form-group"><!-- // Seleccion del Parroquia donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Parroquia</label>
                        <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="parroquia" id="parroquia" value="<?php echo $fila66[2];  ?>" title="Este campo posee parroquia en que sucede el evento de solicitud" readonly />
                        <input type="text" class="form-control" name="" id="parroquia" value="<?php echo $fila66['nombre_parroquia']; ?>" title="Este campo posee parroquia en que sucede el evento de solicitud" readonly />                          
                      </div>
                    </div>
          <?php
            $sector=$fila['sector'];// consulta Sector de solicitud "Sistema 171"
            $registrosect = mysqli_query($conexion2,"SELECT * FROM `sector` WHERE `id_sector` = $sector ");
            $fila5 = mysqli_fetch_array($registrosect);

          ?>
                    <div class="field item form-group"><!-- // Seleccion del Sector donde ocurrio el evento //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Sector</label> 
                        <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" name="sector" id="sector" value="<?php echo strtoupper($fila5['nombre_sector']);?>" title="Este campo posee sector en que sucede el evento de solicitud" readonly />
                          
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Punto Referencia</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="varchar" class="form-control" name="punto_referencia" placeholder="Lugar o sitio referencia" maxlength="40" value="<?php echo strtoupper($fila['punto_ref']);?>" title="Este campo posee lugar o sitio de referencia" pattern="[A-Za-z0-9 -]{10,40}" readonly />
                      </div>
                    </div>
                      <?php /********* Seleccion el estatus de la Solicitud ***********/

                      $estatu = $fila['estatus'];
                      // Consulta a la Base de Datos
                          $result5 = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id = '$estatu'");
                          if (!$result5) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                          $registro5=pg_fetch_array($result5)
                      ?>
                    <div class="field item form-group"><!-- // Seleccion del Estatus de la Solicitud //-->
                         <label class="col-form-label col-md-3 col-sm-3  label-align">Estatus</label>
                      <div class="col-md-6 col-sm-6">
                          <input type="hidden" class="form-control" name="estatus_solicitud_id" value="<?php echo $registro5[0]; ?>" required readonly />
                          <input type="text" class="form-control" name="estatus_solicitud" value="<?php echo strtoupper($registro5[1]); ?>" title="Llene este campo con la situación de la solicitud" readonly />
                            
                      </div>
                    </div>

</div>

<!-- ********** STEP 5 ********** -->                      
<div id="step-5"><div class="ln_solid"></div>
                        <h2 class="StepTitle">Atención</h2>
<!-- ************************************************************************************************* -->

<!-- ////////////////////////////////////    SOLICITUD ATENCION    /////////////////////////////////// -->

<!-- ************************************************************************************************* -->
            <?php
                $operad=$fila['operador'];// consulta despachador de solicitud "Sistema 171"
                $registrop = mysqli_query($conexion2,"SELECT * FROM 171_usuarioz WHERE id = $operad ");
                $reg_usuario = mysqli_fetch_array($registrop);

                $id_operad = $reg_usuario['id_personal'];
                $registrop = mysqli_query($conexion2,"SELECT * FROM personal_171 WHERE id_personal = $id_operad ");
                $reg_operad = mysqli_fetch_array($registrop);
            ?>
                    <div class="field item form-group"><!-- // nombre del operador que recibe la llamada // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Operador</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="operador" required value="<?php echo $fila['operador']; ?>" readonly />
                        <input type="text" class="form-control" name="nombre_operador" placeholder="Datos del operador"  value="<?php echo strtoupper($reg_usuario['apellidos']); ?>" title="Este campo posee nombre del Operador que recibe la solicitud" readonly />
                      </div>
                    </div>
            <?php
                  $desp=$fila['despachador'];// consulta despachador de solicitud "Sistema 171"
                  $registrosp = mysqli_query($conexion2,"SELECT * FROM 171_usuarioz WHERE id = $desp ");
                  $reg_usuario2 = mysqli_fetch_array($registrosp);
            ?>
                    <div class="field item form-group"><!-- // nombre del despachador que atiende de la novedad // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Despachador</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" name="despachador" required value="<?php echo $fila['despachador']; ?>" readonly />
                        <input type="text" class="form-control" name="nombre_despachador" placeholder="Datos del despachador"  value="<?php echo strtoupper($reg_usuario2['apellidos']); ?>" title="Este campo posee nombre de despachador de unidades de la llamada de solictitud" readonly />
                      </div>
                    </div>

                    <div class="field item form-group"><!-- //  tiempo de respuesta de la Solicitud  // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Tiempo de Respuesta</label>
                      <div class="col-md-2 col-sm-2">
                        <b>hora</b>
                        <input type="number" class="form-control" name="tiempo_respuesta" required min="00" max="12" step="01" value="<?php echo $fila['tiempo_respuesta']= date ('h');?>" title="Este campo posee Horas de tiempo de respuesta" readonly />
                      </div>
                      <div class="col-md-2 col-sm-2">
                      <b>minuto</b>
                        <input type="number" class="form-control" name="tiempo_respuesta1" required min="00" max="59" step="01" value="<?php echo $fila['tiempo_respuesta']= date ('m');?>" title="Este campo posee Minutos de tiempo de respuestas" readonly />
                      </div>
                    </div>
                    <br/>

                      <?php /********* Seleccion del Organismo que Realiza la llamada de Solicitud ***********/
/*
                if ($fila['organismo'] == 1 || $fila['organismo2'] == 1 || $fila['organismo3'] == 1 || $fila['organismo4'] == 1 || $fila['organismo5'] == 1) { $IMPRADREM = 'IMPRADEM'; } 

                if ($fila['organismo'] == 2 || $fila['organismo2'] == 2 || $fila['organismo3'] == 2 || $fila['organismo4'] == 2 || $fila['organismo5'] == 2) { $PM_foranero = 'PM Foraneo'; } 

                if ($fila['organismo'] == 3 || $fila['organismo2'] == 3 || $fila['organismo3'] == 3 || $fila['organismo4'] == 3 || $fila['organismo5'] == 3) { $PM_libertador = 'PM Libertador'; } 

                if ($fila['organismo'] == 4 || $fila['organismo2'] == 4 || $fila['organismo3'] == 4 || $fila['organismo4'] == 4 || $fila['organismo5'] == 4) { $Policia_Municipal = 'Policia Municipal'; } 

                if ($fila['organismo'] == 5 || $fila['organismo2'] == 5 || $fila['organismo3'] == 5 || $fila['organismo4'] == 5 || $fila['organismo5'] == 5) { $Supervision = 'Supervision'; } 

                if ($fila['organismo'] == 6 || $fila['organismo2'] == 6 || $fila['organismo3'] == 6 || $fila['organismo4'] == 6 || $fila['organismo5'] == 6) { $Transito = 'Transito'; } 

                if ($fila['organismo'] == 7 || $fila['organismo2'] == 7 || $fila['organismo3'] == 7 || $fila['organismo4'] == 7 || $fila['organismo5'] == 7) { $Bomberos_Rescate = 'Bomberos Rescate'; } 

                if ($fila['organismo'] == 8 || $fila['organismo2'] == 8 || $fila['organismo3'] == 8 || $fila['organismo4'] == 8 || $fila['organismo5'] == 8) { $Bomberos_Servivida = 'Bomberos Servivida'; }
*/
                      ?>
            <div class="field item form-group"><!-- ************     Seleccion de los organismos participantes en el lugar de la novedad     *********    -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismos" id="reg">Organismos en Sitio:</label>
                  <div class="col-md-6,5 col-sm-6,5">
                    <table name="organismos" align="center" value="" required>
                    <tbody>
                    <tr>
                        <tr align="right">
                            <td><label class="organismos">Bomberos Rescate
                 <?php
                    if ($fila['organismo'] == 1 || $fila['organismo2'] == 1 || $fila['organismo3'] == 1 || $fila['organismo4'] == 1 || $fila['organismo5'] == 1) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Bomberos Rescate" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Bomberos Rescate" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>

                                 <span class="checkmark"></span></label></td>
                            <td><label class="organismos" >Bomberos Servivida
                <?php
                    if ($fila['organismo'] == 2 || $fila['organismo2'] == 2 || $fila['organismo3'] == 2 || $fila['organismo4'] == 2 || $fila['organismo5'] == 2) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Bomberos Servivida" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Bomberos Servivida" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>
                                <span class="checkmark"></span></label></td>
                            <td><label class="organismos" >INPRADEM
                <?php
                    if ($fila['organismo'] == 3 || $fila['organismo2'] == 3 || $fila['organismo3'] == 3 || $fila['organismo4'] == 3 || $fila['organismo5'] == 3) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="INPRADEM" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="INPRADEM" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>
                                <span class="checkmark"></span></label></td>
                        </tr>
                        <tr align="right">
                            <td><label class="organismos">PM Foraneo
                 <?php
                    if ($fila['organismo'] == 4 || $fila['organismo2'] == 4 || $fila['organismo3'] == 4 || $fila['organismo4'] == 4 || $fila['organismo5'] == 4) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="PM Foraneo" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="PM Foraneo" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>
                                 <span class="checkmark"></span></label></td>
                            <td><label class="organismos" >PM Libertador
                 <?php
                    if ($fila['organismo'] == 5 || $fila['organismo2'] == 5 || $fila['organismo3'] == 5 || $fila['organismo4'] == 5 || $fila['organismo5'] == 5) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="PM Libertador" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="PM Libertador" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>
                                <span class="checkmark"></span></label></td>
                            <td><label class="organismos" >Policía Municipal
                 <?php
                    if ($fila['organismo'] == 6 || $fila['organismo2'] == 6 || $fila['organismo3'] == 6 || $fila['organismo4'] == 6 || $fila['organismo5'] == 6) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Policia Municipal" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Policia Municipal" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>
                                <span class="checkmark"></span></label></td>
                        </tr>
                        <tr align="right">
                            <td><label class="organismos" >Supervisión
                 <?php
                    if ($fila['organismo'] == 7 || $fila['organismo2'] == 7 || $fila['organismo3'] == 7 || $fila['organismo4'] == 7 || $fila['organismo5'] == 7) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Supervision" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Supervision" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>
                                <span class="checkmark"></span></label></td>
                            <td><label class="organismos" >Transito
                 <?php
                    if ($fila['organismo'] == 8 || $fila['organismo2'] == 8 || $fila['organismo3'] == 8 || $fila['organismo4'] == 8 || $fila['organismo5'] == 8) {
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Transito" title="Organismo presente en el lugar del evento" checked readonly>';
                    }else{
                      echo'<input type="checkbox" name="organismos[]" id="organismos" class="flat" value="Transito" title="Organismo presente en el lugar del evento" readonly>';
                    }
                ?>

                                <span class="checkmark"></span></label></td>
                        </tr>
                    </tr>
                    </tbody>
                    </table>
                  </div>
            </div><br/>



<!-- //////////////////////////////////     ATENCION DE SOLICITUD    /////////////////////////////////-->

                    <div class="field item form-group"><!-- // Motos en sitio de solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Motos</label>
                      <div class="col-md-3 col-sm-3">
                        <div id="" class="btn-group" data-toggle="buttons">
              <?php
              $valor = $fila['motos']; 
              if($valor != 0 ){
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="TRUE" class="flat" checked="checked" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="FALSE" class="flat" readonly > &nbsp; NO&nbsp;
                  </label>';
              }else{
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="TRUE" class="flat" readonly > &nbsp; SI&nbsp;
                  </label>';
                echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de motos en el sitio">
                  <input type="radio" name="motos" value="FALSE" class="flat" checked readonly > &nbsp; NO&nbsp;
                  </label>';
              }
              ?>

                          </div>
                    </div>
                          <div class="col-md-2 col-sm-2">
                           <input type="number" name="num_motos" class="form-control" data-validate-length-range="6" data-validate-words="1" placeholder="Nº Motos" size="3" min="0" max="999" maxlength="3" value="<?php echo $fila['motos'];?>" title="Este campo posee el número de motos en el sitio en caso de existir" required readonly />
                          </div>

                    </div>

                    <div class="field item form-group"><!-- // Vehiculos en sitio de solicitud // -->
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Vehículos</label>
                      <div class="col-md-3 col-sm-3" >
                        <div id="" class="btn-group" data-toggle="buttons">
                  <?php
                  $valor = $fila['vehiculos']; 
                  if($valor != 0 ){
                    echo'<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de Vehículos en el sitio">
                          <input type="radio" name="vehiculos" value="TRUE" class="flat" checked="checked" readonly> &nbsp;SI &nbsp;
                          </label>';
                    echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de Vehículos en el sitio">
                          <input type="radio" name="vehiculos" value="FALSE" class="flat" readonly> &nbsp;NO &nbsp;
                          </label>';

                  }else{
                    echo'<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo Si hubo presencia de Vehículos en el sitio">
                        <input type="radio" name="vehiculos" value="TRUE" class="flat" readonly> &nbsp;SI &nbsp;
                        </label>';
                    echo '<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Este campo No hubo presencia de Vehículos en el sitio">
                        <input type="radio" name="vehiculos" value="FALSE" class="flat" checked readonly> &nbsp;NO &nbsp;
                        </label>';
                  }
                  ?>

                          </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                           <input type="number" name="num_vehiculos" class="form-control" placeholder="Nº Vehículos" min="0" max="999" maxlength="3" value="<?php echo $fila['vehiculos'];?>" title="Este campo posee el número de vehículos en el sitio en caso de existir" required readonly />
                    </div>
                      <div class="col-md-1 col-sm-1" ></div>
                  </div>

                   <div><!-- //     Registro de fecha tomada por en sistema      //     -->
                         <input type="hidden" name="guardias_id" id="guardias_id" value="<?php echo $apertura_guardia;?>" required />
                   </div>
                   <div><!-- //     Registro de fecha tomada por en sistema      //     -->
                         <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula_personal;?>" required />
                   </div>

</div>
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Guardar</button>
                    <button type='reset' class="btn btn-success">Limpiar</button>
                        </div>
                      </div>
                    </div>