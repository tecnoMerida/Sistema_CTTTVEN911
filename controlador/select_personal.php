<?php 
/************************************* */
/*********   SELECCION DEL   ********* */
/*********     PERSONAL      ********* */
/************************************* */

include '../config/conexion1.php';

<<<<<<< HEAD
$organismo = intval($_POST['organismo_id'] ?? 0);
$personal_ven = intval($_POST['personal_ven'] ?? 0);

$reg_consulta = false;
if (!empty($personal_ven)) {
    $organismos_consulta = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_ven");
    $reg_consulta = ($organismos_consulta && pg_num_rows($organismos_consulta) > 0) ? pg_fetch_array($organismos_consulta) : false;
}

$persona_consulta = false;
if (!empty($organismo)) {
    $persona_consulta = pg_query($dbconn, "SELECT * FROM public.personal WHERE organismos_id = $organismo AND estatus_personal_id = 1 ORDER BY p_apellido ASC");
}

if (!$persona_consulta || pg_num_rows($persona_consulta) == 0) {
    echo '<label for="personal_ven" class="control-label"></label>
<select class="form-control" name="personal_ven" id="personal_ven" title="Seleccione la persona a consultar" required>
<option value="">--Seleccione Personal--</option>
</select>';
    exit;
}

$selected_label = $reg_consulta ? strtoupper($reg_consulta['p_apellido']) . ' ' . strtoupper($reg_consulta['p_nombre']) : '--Selecciona Personal--';
$selected_val = $reg_consulta ? $reg_consulta['cedula'] : '';

$cadena = '<label for="personal_ven" class="control-label"></label>
<select class="form-control" name="personal_ven" id="personal_ven" title="Seleccione la persona a consultar" required>
    <option value="' . $selected_val . '">' . $selected_label . '</option>';

while ($ver = pg_fetch_array($persona_consulta)) {
    $cadena .= "<option value='" . $ver['cedula'] . "'>" . strtoupper($ver['p_apellido']) . " " . strtoupper($ver['p_nombre']) . "</option>";
}
$cadena .= "</select>";

echo $cadena;

=======
$organismo=$_POST['organismo_id'];

$personal_ven = $_POST['personal_ven'];

              // Consulta valor enviado por el submit para mostrar en nombre del organismo
			  $organismos_consulta = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = $personal_ven ");
			  $reg_consulta=pg_fetch_array($organismos_consulta);

    // Consulta valor enviado por el submit para mostrar en nombre del organismo
	$persona_consulta = pg_query($dbconn, "SELECT * FROM public.personal WHERE organismos_id= $organismo AND estatus_personal_id = 1 ORDER BY p_apellido ASC");




	if (!$persona_consulta) {
echo '<label for="personal_ven" class="control-label"></label>
<select class="form-control" name="personal_ven" id="personal_ven" title="Seleccione la persona a consultar" required>
<option name="personal_ven" value="">--Seleccione--</option>
</select>';
		exit;
	}

	if(!$reg_consulta){

	$cadena='
	<label for="personal_ven" class="control-label"></label>
		<select class="form-control" name="personal_ven" id="personal_ven" title="Seleccione la persona a consultar" required>
                <option name="personal_ven" value="">--Selecciona Personal--</option>';

				while ($ver=pg_fetch_array($persona_consulta)) {
					$cadena=$cadena."<option name='id' value='" . $ver['cedula'] . "'>" . strtoupper($ver['p_apellido']) . " ". strtoupper($ver['p_nombre']) . "</option>";
				}
	
		echo  $cadena."</select>";

			}else{
				$cedula = $personal_ven;
		$cadena='<label for="personal_ven" class="control-label"></label>
		<select class="form-control" name="personal_ven" id="personal_ven" title="Seleccione la persona a consultar" required>
                <option name="personal_ven" value="">'. strtoupper($reg_consulta['p_apellido']) . " ". strtoupper($reg_consulta['p_nombre']) .'</option>';

				while ($ver=pg_fetch_array($persona_consulta)) {
					$cadena=$cadena."<option name='id' value='" . $ver['cedula'] . "'>" . strtoupper($ver['p_apellido']) . " ". strtoupper($ver['p_nombre']) . "</option>";
				}
	
		echo  $cadena."</select>";
}

>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
?>

<!--	<option value="<?php // if($reg_consulta_per==''){ echo '';} else{ echo $reg_consulta_per[0]; } ?>"><?php // if($reg_consulta_per==''){ echo '-Seleccione Persona-';} else{ echo strtoupper($reg_consulta_per[3]).' '.strtoupper($reg_consulta_per[1]); }?></option>-->