<?php
require('cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 1){
                header('location: index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

// ZONA HORARIA
date_default_timezone_set('America/Caracas');

// Traer datos por metodo POST
	$accion = $_GET['ac'];
	extract ($_POST);

// Conexion con la base de datos
require_once 'config/conexion1.php';

		if(isset ($_POST)){

			switch ($accion) {
			case 1:	// Accion 1 -- Registro de Bienes
/******************************************  	 INICIO CASE 1 		***************************************/

				// Consulta si el nombre existe en la base de datos
				$consulta = pg_query($dbconn,"SELECT * FROM bienes WHERE codigo_b = '$codigo_b' OR serial_b = '$serial_b' ");
				$result1 = pg_fetch_array($consulta);

			if($result1 != 0){

				header("Location: administrador/registro_bienes.php?msg=1");

			}else{

      $codigo_b = strtoupper($_POST['codigo_b']);
      $nombre_b = strtoupper($_POST['nombre_b']);
      $marca_b = strtoupper($_POST['marca_b']);
      $modelo_b = strtoupper($_POST['modelo_b']);
      $color_b = strtoupper($_POST['color_b']);
      $serial_b = strtoupper($_POST['serial_b']);
      $descripcion_b = strtoupper($_POST['descripcion_b']);
      $fecha_ingreso_b = $_POST['fecha_ingreso_b'];
      $direccion = strtoupper($_POST['direccion']);
      $coordinacion = strtoupper($_POST['coordinacion']);
      $observaciones = strtoupper($_POST['observaciones']);
      $ubicacion_bienes_id = $_POST['ubicacion_bienes_id'];
      $estado_bien_id = $_POST['estado_bien_id'];
      $fecha_estado = $_POST['fecha_estado'];
      $organismos_id = $_POST['organismos_id'];
      $fecha_creacion = date ("Y/n/j H:m:s");

				// Inserta el nuevo registro 			
				$command_pg = "INSERT INTO bienes (codigo_b, nombre_b, marca_b, modelo_b, color_b, serial_b, descripcion_b, fecha_ingreso_b, direccion, coordinacion, observaciones, ubicacion_bienes_id, estado_bien_id, fecha_estado, organismos_id, fecha_creacion ) VALUES ('$codigo_b', '$nombre_b', '$marca_b', '$modelo_b', '$color_b', '$serial_b', '$descripcion_b', '$fecha_ingreso_b', '$direccion', '$coordinacion', '$observaciones', '$ubicacion_bienes_id', '$estado_bien_id', '$fecha_estado', '$organismos_id', '$fecha_creacion' )";

          $result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());  

            // Valores asignados a la "Bitacora"
            $usuario = $_POST['cedula_usuario'];
            $nombre_esquema = 'Registrar Bienes';
            $nombre_tabla =  'bienes';
            $proceso = 'INSERTAR'; 
            $valor_nuevo = ''.$codigo_b.', '.$nombre_b.', '.$marca_b.', '.$modelo_b.', '.$color_b.', '.$serial_b.', '.$descripcion_b.', '.$fecha_ingreso_b.', '.$direccion.', '.$coordinacion.', '.$observaciones.', '.$ubicacion_bienes_id.', '.$estado_bien_id.', '.$fecha_estado.', '.$organismos_id.'';

            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";

				if(pg_query($dbconn, $bitacora_obs) or die ("Upps Fallo conexion con la Tabla")){ 

				header("Location: administrador/registro_bienes1.php?msg=2");
			}else{ 

				header("Location: administrador/registro_bienes.php?msg=3");
			}
				}
/*************************************** 		FIN BREAK 1 	****************************************/	
				break;
				case 2: // Accion 2 -- Actualizacion de Bienes
/*************************************** 		INICIO CASE 1  	****************************************/
// verifica que todos los campos esten rellenados
  if(!empty($_POST))
  {
    
    if(empty($_POST['id']) || empty($_POST['codigo_b']) || empty($_POST['nombre_b'])  || empty($_POST['marca_b'])  || empty($_POST['modelo_b'])  || empty($_POST['color_b'])  || empty($_POST['serial_b'])  || empty($_POST['descripcion_b'])  || empty($_POST['fecha_ingreso_b'])  || empty($_POST['direccion'])  || empty($_POST['coordinacion'])  || empty($_POST['observaciones'])  || empty($_POST['ubicacion_bienes_id'])  || empty($_POST['estado_bien_id'])   || empty($_POST['fecha_estado']) || empty($_POST['organismos_id']) || empty($_POST['fecha_creacion']))

    { 
    header("Location: administrador/modificar_bienes.php?id=$id&msg=1");
    }else{

      $id = $_POST['id'];
      $codigo_b = strtoupper($_POST['codigo_b']);
      $nombre_b = strtoupper($_POST['nombre_b']);
      $marca_b = strtoupper($_POST['marca_b']);
      $modelo_b = strtoupper($_POST['modelo_b']);
      $color_b = strtoupper($_POST['color_b']);
      $serial_b = strtoupper($_POST['serial_b']);
      $descripcion_b = strtoupper($_POST['descripcion_b']);
      $fecha_ingreso_b = $_POST['fecha_ingreso_b'];
      $direccion = strtoupper($_POST['direccion']);
      $coordinacion = strtoupper($_POST['coordinacion']);
      $observaciones = strtoupper($_POST['observaciones']);
      $ubicacion_bienes_id = $_POST['ubicacion_bienes_id'];
      $estado_bien_id = $_POST['estado_bien_id'];
      $fecha_estado = $_POST['fecha_estado'];
      $organismos_id = $_POST['organismos_id'];
      $fecha_creacion = $_POST['fecha_creacion'];

      //consulta a la base de datos
      $bienes1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id ");   
      $result = pg_fetch_array($bienes1);

      if($result > 0){

        if(isset($_POST['id']))
        {
        	// Actualiza datos del registro
    	$consulta2 = "UPDATE bienes SET id='$id', codigo_b='$codigo_b', nombre_b='$nombre_b', marca_b='$marca_b', modelo_b='$modelo_b', color_b='$color_b', serial_b='$serial_b', descripcion_b='$descripcion_b', fecha_ingreso_b='$fecha_ingreso_b', direccion='$direccion', coordinacion='$coordinacion', observaciones='$observaciones', ubicacion_bienes_id='$ubicacion_bienes_id', estado_bien_id='$estado_bien_id', fecha_estado='$fecha_estado', organismos_id='$organismos_id', fecha_creacion='$fecha_creacion' WHERE id = '$id'";

          $result = pg_query($dbconn, $consulta2) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());  

            // Valores asignados a la "Bitacora"
            $usuario = $_POST['cedula_usuario'];
            $nombre_esquema = 'Modificar Bienes';
            $nombre_tabla =  'bienes';
            $proceso = 'MOFIFICAR'; 
            $valor_nuevo = ''.$codigo_b.', '.$nombre_b.', '.$marca_b.', '.$modelo_b.', '.$color_b.', '.$serial_b.', '.$descripcion_b.', '.$fecha_ingreso_b.', '.$direccion.', '.$coordinacion.', '.$observaciones.', '.$ubicacion_bienes_id.', '.$estado_bien_id.', '.$fecha_estado.', '.$organismos_id.'';
            $fecha_modificacion = date ("Y/n/j H:m:s");

            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
        }

        if(pg_query($dbconn, $bitacora_obs) or die ("Upps Fallo conexion con la Tabla")) { 

    header("Location: administrador/modificar_bienes.php?id=$id&msg=2");
        }else{ 

    header("Location: administrador/modificar_bienes.php?id=$id&msg=3");
        }

      }


    }

  }
/*************************************** 		FIN BREAK 2 	****************************************/
				break;
				default:
				# code ...
				break;

			}
		}
                      }
          }
}
 pg_close($dbconn); 
?>