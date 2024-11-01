<?php

require '../config/conexion1.php';
/*
https://www.baulphp.com/buscador-en-select-usando-javascript-bootstrap-5/
*/
$stmt="";
if(!isset($_POST['searchTerm'])){
  // Creación y/o formación de la consulta.
  $resultado321 = pg_query($dbconn, "SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.parroquias INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
	INNER JOIN public.estados ON municipios.estados_id = estados.id
   WHERE estados.id = 14 ");

if (!$resultado321) {
    echo "Ocurrió un error.\n";
    exit;
  }
$contador=0;

// Validar el estatus de ejecución de la consulta.
while ($resultado = pg_fetch_array($resultado321)) {
    $html.='<option id="valor" value="'.$resultado[0].'" >'.$resultado[1].', '.$resultado[3].', '.$resultado[5].'</option>';
     }

}else{

    $search = $_POST['searchTerm'];// Search text

      // Creación y/o formación de la consulta.
  $resultado321 = pg_query($dbconn, "SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado 
  FROM public.parroquias 
  INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id 
  INNER JOIN public.estados ON municipios.estados_id = estados.id 
  WHERE estados.id = 14 AND parroquias.nombre_parroquia LIKE '%".$search."%' OR municipios.nombre_municipio LIKE '%".$search."%'
   ");

if (!$resultado321) {
  echo "Ocurrió un error.\n";
  exit;
}
$contador=0;

// Validar el estatus de ejecución de la consulta.
while ($resultado = pg_fetch_array($resultado321)) {
$html.='<option id="valor" value="'.$resultado[0].'" >'.$resultado[1].', '.$resultado[3].', '.$resultado[5].'</option>';
 }

}

$response = array();

// Leer los datos de MySQL
foreach($html as $pro){
$response[] = array(
"id" => $pro['id'],
"text" => $pro['nombre']
);
}

echo json_encode($response);
exit();
?>