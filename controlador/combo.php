<?php
/*
 * Arreglo para Meses del Año
 */
$mese = array();
 $meses[] = "--- --- ---";
 $meses[] = "ENERO";
 $meses[] = "FEBRERO";
 $meses[] = "MARZO";
 $meses[] = "ABRIL";
 $meses[] = "MAYO";
 $meses[] = "JUNIO";
 $meses[] = "JULIO";
 $meses[] = "AGOSTO";
 $meses[] = "SEPTIEMBRE";
 $meses[] = "OCTUBRE";
 $meses[] = "NOVIEMBRE";
 $meses[] = "DICIEMBRE";



	// Conexión a base de datos.
	extract ($_POST);
require_once '../config/conexion1.php';


 
/*******************************	Inicio Consulta Municipio 		************************************/
	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		if($_POST['action'] == 'consultar') {

			$html = "";

			// Creación y/o formación de la consulta.
			$id = $_POST['id'];
			$sql = "SELECT * FROM public.municipios WHERE estados_id = $id ";

			// Ejecución y resultado de la consulta.

			$result = pg_query($dbconn,$sql);

			$html .= "<option value=''>-Seleccione-</option>";

			if ($result) {

				if(pg_num_rows($result) > 0) {

					while($row = pg_fetch_array($result)){

						$html .= "<option value='".$row['id']."'>".$row['nombre_municipio']."</option>";

					}

				}

			} else {

				echo "Error en la consulta: " . pg_error($dbconn);

			}

 

			echo $html;

		}

	}
/*******************************	Fin Consulta Municipio 		************************************/
/*******************************	Inicio Consulta Parroquia 		************************************/
	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		if($_POST['action'] == 'consultar') {

			$html = "";

			// Creación y/o formación de la consulta.
			$id1 = $_POST['id'];
			$sql1 = "SELECT * FROM public.parroquias WHERE municipios_id = $id1 ";

			// Ejecución y resultado de la consulta.

			$result1 = pg_query($dbconn,$sql1);

//			$html .= "<option value=''>-Seleccione Una Parroquia-</option>";

			if ($result1) {

				if(pg_num_rows($result1) > 0) {

					while($row1 = pg_fetch_array($result1)){

						$html .= "<option value='".$row1['id']."'>".$row1['nombre_parroquia']."</option>";

					}

				}

			} else {

				echo "Error en la consulta: " . pg_error($dbconn);

			}

 

			echo $html;

		}

	}
/*******************************	Fin Consulta Parroquia 		************************************/

/*
 * Funcion para generar combo simple a partir de un array con datos de llenado!
*/
function combo_simple ($var, $seleccionar = NULL)
{
    $aux = "";
    foreach ($var AS $clave => $valor)
    {
        $aux .= "<option value = \"".$clave."\">";
        if ($seleccionar != NULL){
            if ($seleccionar == $clave)
            $aux .= "selected = \"selected\"";
        }
        $aux .= $valor."</option>";
    }
    return $aux;
}

/*
 * Funcion para generar combo a partir de consulta de base de datos!
 *  
 */

 function combo_bd ($resultado, $campos, $seleccionar = NULL)
 {
	$aux = "<option value=\"\">--- --- ---</option>";
	while($fila = pg_fetch_array($resultado))
	{
		$clave = $campos[0];
		$valor = $campos[1];
		$aux .= "<option value=\"".$fila[$clave]."\"";
		if ($seleccionar != NULL)
		{
			if ($seleccionar == $fila[$clave])
				$aux .= "selected = \"selected\"";
		}
		$aux .= ">".$fila[$valor]."</option>";		
	}
	return $aux;
 }

 
