<html> 
 
<head> 
 <meta charset="utf-8"> 
 <title>Observaciones al Personal</title> 
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"> 
 
 <!-- Optional Bootstrap theme --> 
 <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css"> 
 
</head> 
 
<body> 
 <!-- Button HTML (to Trigger Modal) --> 
 <a href="#" class="btn btn-lg btn-primary">Observaciones</a> 
 
 <!-- Modal HTML --> 
 <div id="myModal" class="modal fade"> 
  <div class="modal-dialog"> 
   <div class="modal-content"> 
    <div class="modal-header"> 
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
     <h4 class="modal-title">Observaciones</h4> 
    </div> 
    <div class="modal-body"> 
     <p> Ingrese las observaciones</p> 
     <p class="text-warning">

			<div class="col-md-11 col-sm-11">
				<form class="form-horizontal form-label-left" action="../insert_apertura_guardia.php?ac=2" method="post" id="demo-form" data-parsley-validate>

                  <div class="field item form-group">
                      <div class="col-md-12 col-sm-12">
                        <strong>Los campos que contengan (<font COLOR="#FF0000">*</font>) son de asignación obligatoria</strong>
                      </div>
                    </div>

                      <?php /********* Selecciona el tipo de observación ***********/
                      // Consulta a la Base de Datos
                          $consulta1 = pg_query($dbconn, "SELECT * FROM observaciones_entrada");
                          if (!$consulta1) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group"><!-- // Seleccion del tipo de Observación realizada al personal //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="observaciones_entrada_id">Tipo<span
                          class="required"><font COLOR="#FF0000">*</font></span></label> 
                        <div class="col-md-10 col-sm-10">
                        <select name="observaciones_entrada_id" id="observaciones_entrada_id" class="form-control" title="Seleccione el tipo de observacion" required>
                          <option value="">-Seleccione una observación-</option>
                            <?php
                              while($reg1=pg_fetch_array($consulta1))
                              { 
                            ?>
                            <option name="id" value="<?php echo $reg1[0]; ?> "><?php echo strtoupper($reg1[1]); ?></option>
                            <?php 
                              }
                            ?>
                        </select>
                      </div>
                    </div>
                      <?php /********* Seleccion del Personal de Guardia ***********/
                      // Consulta a la Base de Datos
                      $grupo1 = $regid['grupo_guardia_id'];
                      //$consulta_pers3 = pg_query($dbconn,"SELECT * FROM public.personal WHERE grupo_guardia_id = $grupo1 AND estatus_personal_id = 1");
                      $consulta_pers3 = pg_query($dbconn,"SELECT * FROM public.personal WHERE estatus_personal_id = 1");
                      if (!$consulta_pers3) {
                          echo "Ocurrió un error.\n";
                          exit;
                          }
                      ?>
                    <div class="field item form-group"><!-- // Seleccion del Personal de Guardia //-->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="personal_cedula">Personal<span
                          class="required"><font COLOR="#FF0000">*</font></span></label> 
                        <div class="col-md-10 col-sm-10">
                        <select name="personal_cedula" id="personal_cedula" class="form-control" title="Seleccione la Persona a realizarle la observación" required>
                          <option value="">-Seleccione la persona-</option>
                            <?php
                              while($reg2=pg_fetch_array($consulta_pers3))
                              { 
                            ?>
                            <option name="id" value="<?php echo $reg2['cedula'] ?> "><?php echo strtoupper($reg2['p_nombre']); echo " "; echo strtoupper($reg2['p_apellido']); ?></option>
                            <?php 
                              }
                            ?>
                        </select>
                      </div>
                    </div>

                    <div class="field item form-group"><!-- // Ingresa una Descripción de la Observación realiza al Personal  //-->
                      <label class="col-form-label col-md-3 col-sm-3  label-align" for="descripcion">Descripción <span
                          class="required"><font COLOR="#FF0000">*</font></span></label>
                      <div class="col-md-10 col-sm-10">
                        <textarea name="descripcion" id="descripcion" class="resizable_textarea form-control" placeholder="Observaciones al personal" minlength="8" maxlength="500" title="Llene este campo con detalles de observaciones al personal" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-:;/]{8,500}" ></textarea>
                      </div>
                    </div>

                     <input type="hidden" name="personal_usuario" id="personal_usuario" value="<?php echo $regid['cedula'];?>" required />

              <div class="modal-footer"> 
					    	 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
					    	 <button type="submit" class="btn btn-primary">Guardar</button> 
					    </div> 
                </form> 
            </div>
<small></small></p> 
    </div> 

   </div> 
  </div> 
 </div> 
 
 <script src="../vendors/jquery/dist/jquery.js"></script> 
 <script src="../vendors/bootstrap/dist/js/bootstrap.js"></script> 
 
 <script type="text/javascript"> 
  $(document).ready(function() 
  { 
   $(".btn").click(function() 
   { 
    $("#myModal").modal('show'); 
   }); 
  }); 
 </script> 
 
</body> 
 
</html>