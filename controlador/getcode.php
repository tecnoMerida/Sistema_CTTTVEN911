<?php

require '../config/conexion1.php';


//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.parroquias INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
	INNER JOIN public.estados ON municipios.estados_id = estados.id
   WHERE estados.id = 14";
//$campo = $_POST["campo"];

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
    $q=$conexion->real_escape_string($_POST['alumnos']);
    $query=" SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado 
FROM public.parroquias 
INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id 
INNER JOIN public.estados ON municipios.estados_id = estados.id 
WHERE estados.id = 14 AND parroquias.nombre_parroquia LIKE '%".$q."%' OR municipios.nombre_municipio LIKE '%".$q."%'
";
}

if(!isset($_POST['alumnos']))
{
    $query=" SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.parroquias INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
	INNER JOIN public.estados ON municipios.estados_id = estados.id
   WHERE estados.id = 14
        ";
}


$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
    $tabla.=
    '<table class="table">
        <tr class="bg-primary">
                               <td>id</td>
                           <td>descri</td>
                           <td>precio</td>
                           <td>marca</td>
                           <td>catego</td>
                           <td>pais</td>
                           <td>imagen</td>
        </tr>';




    while($filaAlumnos= $buscarAlumnos->fetch_assoc())
    {

        $tabla.= '<tr>
            <td>'.$filaAlumnos[0].'</td>
            <td>'.utf8_encode($filaAlumnos[1]).'</td>
            <td>'.$filaAlumnos[2].'</td>
            <td>'.utf8_encode($filaAlumnos[3]).'</td>
            <td>'.utf8_encode($filaAlumnos[5]).'</td>
            <td>'.$filaAlumnos[4].'</td>
         </tr>
        ';

    }

    $tabla.='</table>';
} else
    {
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }


echo $tabla;





// Creación y/o formación de la consulta.
/*  $result3 = pg_query($dbconn, "SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.parroquias INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
	INNER JOIN public.estados ON municipios.estados_id = estados.id
   WHERE estados.id = 14 ");

if (!$result3) {
    echo "Ocurrió un error.\n";
    exit;
  }
  
//  $registroUbicacion = pg_fetch_array($result3);

$html = "";

while ($registro45 = pg_fetch_array($result3)) {
*/                                
/*	$html .= "<li onclick=\"mostrar('" . $registro45[0] . "')\" value="<?php echo $registro45[0] ?>">" . strtoupper($registro45[1]).", ".strtoupper($registro45[3]).", ".strtoupper($registro45[5]) . "</li>";
*/

//	$html .= "<li onclick=\"mostrar('" . $registro45[0] . "')\">" . $registro45[1] . " - " . $registro45[3] . "</li>";
/*$html .="<li onclick=\"mostrar('" . $registro45[1] . "') value='". echo $registro45[0] . "'>" . echo strtoupper($registro45[1]).", ".strtoupper($registro45[3]).", ".strtoupper($registro45[5]); ."</li>";

}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
*/
