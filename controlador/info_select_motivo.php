<?php

require_once '../config/conexion1.php';


/**
 * Archivo que recibe por post el valor del desplegable
 * Tiene que recibir:
 *  $_POST["seleccion"]
 * Devuelve un json
 *
 * NOTA: De la misma manera que busca en un array de valores, podria buscar
 * en una base de datos.
 */



$result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud_grupo ORDER BY id");
if (!$result44) {
  echo "Ocurrió un error.\n";
  exit;
}

while ($registro44 = pg_fetch_array($result44)) {
  $grupo = strtoupper($registro44[0]);

  /* Consulta de tabla de MOTIVO DE SOLICITUD */
  $select = $_POST["seleccion"];
  $result45 = pg_query($dbconn, "SELECT * FROM motivo_solicitud WHERE id = $select ");

  if (!$result45) {
    echo "Ocurrió un error.\n";
    exit;
  }

  $registro45 = pg_fetch_array($result45);

  /* Consulta de tabla de Protocolo según motivo */

  $result_prot = pg_query($dbconn, "SELECT * FROM motivo_protocolo WHERE motivo_id = $select");

  if (!$result_prot) {
    echo "Ocurrió un error.\n";
    exit;
  }

  $reg_prot = pg_fetch_array($result_prot);

/*  $arrFilas=explode("-",$reg_prot[1]);
  foreach ($arrFila as $row){
    $arrColumns=explode("?",$row);
   $protocol= implode('?',$arrColumns).PHP_EOL;
  }*/

  if (isset($_POST["seleccion"]) && is_numeric($_POST["seleccion"])) {
    if ($_POST["seleccion"] > 0) {
      $valores = array(

        /*            "respuesta1"=>"".$_POST["seleccion"],*/
        "respuesta1" => "Presiona el BOTON 'Protocolo'",
        "respuesta2" => "" . $reg_prot[1],          

        "respuesta3" => "  " . strtoupper($registro45[1]) . "  ",



        /*            "respuesta3"=>"<div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
            </button>
            <strong>".strtoupper($registro45[1])."</strong><br>".$reg_prot[1]."
          </div>",*/
      );
    } else {
      $valores = array("error" => "No seleccionaste un motivo");
    }
  } else {
    $valores = array("error" => "Error en los datos");
  }
}
echo json_encode($valores);
