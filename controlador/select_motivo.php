<?php 
    require_once '../config/conexion1.php';


    // Consulta a la Base de Datos Tabla Motivos por Grupo
    $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud_grupo ORDER BY id");
    if (!$result44) {
      echo "Ocurrió un error.\n";
      exit;
    }
      
	$cadena='<label class="col-form-label col-md-3 col-sm-3  label-align" for="motivo_solicitud_id">Motivo:<span class="required">
      </span></label>
    <div class="col-md-6 col-sm-6">
      <select class="form-control" name="motivo_solicitud_id" id="motivo_solicitud_id" title="Seleccione este campo con el motivo de la solicitud" data-show-subtext="true" data-live-search="true">
        <option value="0">--Seleccione--</option>';

        while ($registro44 = pg_fetch_array($result44)) {
          $grupo = strtoupper($registro44[0]);

          $cadena=$cadena.'<optgroup label="'. $registro44[1] .'" value="'. $grupo .'">';

          $result45 = pg_query($dbconn, "SELECT * FROM motivo_solicitud WHERE motivo_grupo_id = '$registro44[0]' ORDER BY motivo_grupo_id, nombre_motivo ASC ");
                                          if (!$result45) {
                                            echo "Ocurrió un error.\n";
                                            exit;
                                          }
                                          while ($registro45 = pg_fetch_array($result45)) {

//          $cadena=$cadena.'<option name="id" value="'. $registro45[0] .'">'. strtoupper($registro45[1]); .'</option>';
          $cadena=$cadena."<option name='id' value='" . $registro45[0] . "'>" . strtoupper($registro45[1]) . "</option>";
			}
      $cadena=$cadena.'</optgroup>';
    }
	echo  $cadena."</select>
  </div>";
	

?>