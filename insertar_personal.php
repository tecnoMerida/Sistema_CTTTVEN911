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
			case 1:	// Accion 1 -- Registro de Personal


				$cedula= $_POST['cedula'];
				$p_nombre= strtoupper($_POST['p_nombre']);
				$s_nombre= strtoupper($_POST['s_nombre']);
				$p_apellido= strtoupper($_POST['p_apellido']);
				$s_apelllido= strtoupper($_POST['s_apelllido']);
				$telefono_celular= $_POST['telefono_celular'];
				$telefono_casa= $_POST['telefono_casa'];
				$correo_electronico= strtoupper($_POST['correo_electronico']);
				$hijos= $_POST['hijos'];
				$numero_hijos= $_POST['numero_hijos'];
				$nombre_sector= strtoupper($_POST['nombre_sector']);
				$avenida= strtoupper($_POST['avenida']);
				$calle= strtoupper($_POST['calle']);
				$casa= strtoupper($_POST['casa']);
				$piso= strtoupper($_POST['piso']);
				$apto= strtoupper($_POST['apto']);
				$punto_referencia= strtoupper($_POST['punto_referencia']);
				$fecha_creacion= date ("Y/n/j H:m:s");
				$parroquias_id= $_POST['parroquias_id'];
				$estado_civil_id= $_POST['estado_civil_id'];
				$genero_id= $_POST['genero_id'];
				$grado_instruccion_id= $_POST['grado_instruccion_id'];
				$organismos_id= $_POST['organismos_id'];
				$cargos_id= $_POST['cargos_id'];
				$rango_categoria_id= $_POST['rango_categoria_id'];
				$estatus_personal_id= $_POST['estatus_personal_id'];
				$grupo_guardia_id= $_POST['grupo_guardia_id'];
				$cedula_usuario = $_POST['cedula_usuario'];

								// Consulta si el número de cédula existe en la base de datos
								$consulta = pg_query($dbconn,"SELECT * FROM personal WHERE cedula = '$cedula' ");
								$result1 = pg_fetch_array($consulta);
				
							if($result1 != 0){
				
								header("Location: administrador/registro_personal.php?msg=1");
				
							}else{

				// Inserta el nuevo personal			
				$command_pg = "INSERT INTO public.personal (cedula, p_nombre, s_nombre, p_apellido, s_apelllido, telefono_celular, telefono_casa, correo_electronico, hijos, numero_hijos, nombre_sector, avenida, calle, casa, piso, apto, punto_referencia, fecha_creacion, parroquias_id, estado_civil_id, genero_id, grado_instruccion_id, organismos_id, cargos_id, rango_categoria_id, estatus_personal_id, grupo_guardia_id ) VALUES ('$cedula', '$p_nombre', '$s_nombre', '$p_apellido', '$s_apelllido', '$telefono_celular', '$telefono_casa', '$correo_electronico', '$hijos', '$numero_hijos', '$nombre_sector', '$avenida', '$calle', '$casa', '$piso', '$apto', '$punto_referencia', '$fecha_creacion', '$parroquias_id', '$estado_civil_id', '$genero_id', '$grado_instruccion_id', '$organismos_id', '$cargos_id', '$rango_categoria_id', '$estatus_personal_id', '$grupo_guardia_id' )";
					
        $result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());          

						// Valores asignados a la "Bitacora"
						$usuario = $_POST['cedula_usuario'];
						$nombre_esquema = 'Registro de Personal';
						$nombre_tabla =  'personal';
						$proceso = 'INSERTAR'; 
            $valor_nuevo = ''.$cedula.', '.$p_nombre.', '.$s_nombre.', '.$p_apellido.', '.$s_apelllido.', '.$telefono_celular.', '.$telefono_casa.', '.$correo_electronico.', '.$hijos.', '.$numero_hijos.', '.$nombre_sector.', '.$avenida.', '.$calle.', '.$casa.', '.$piso.', '.$apto.', '.$punto_referencia.', '.$fecha_creacion.', '.$parroquias_id.', '.$estado_civil_id.', '.$genero_id.', '.$grado_instruccion_id.', '.$organismos_id.', '.$cargos_id.', '.$rango_categoria_id.', '.$estatus_personal_id.', '.$grupo_guardia_id.'';

            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";


				if(pg_query($dbconn, $bitacora_obs) or die ("Upps Fallo conexion con la Tabla")){ 

				header("Location: administrador/registro_personal4.php?msg=2");
			}else{ 

				header("Location: administrador/registro_personal3.php?msg=3");
			}
				}
				break;
				case 2: // Accion 2 -- Actualizacion Datos de Personal
/**************************************** 	INICIO CASE 2 	***********************************/
				// verifica que todos los campos esten rellenados
if(!empty($_POST))
	{
	if(empty($_POST['cedula']) || empty($_POST['p_nombre']) || empty($_POST['p_apellido']) || empty($_POST['telefono_celular']) || empty($_POST['telefono_casa']) || empty($_POST['correo_electronico']) || empty($_POST['hijos']) || empty($_POST['numero_hijos']) || empty($_POST['nombre_sector']) || empty($_POST['avenida']) || empty($_POST['casa']) || empty($_POST['punto_referencia']) || empty($_POST['fecha_creacion']) || empty($_POST['parroquias_id']) || empty($_POST['estado_civil_id']) || empty($_POST['genero_id']) || empty($_POST['grado_instruccion_id']) || empty($_POST['organismos_id']) || empty($_POST['cargos_id']) || empty($_POST['rango_categoria_id']) || empty($_POST['estatus_personal_id']) || empty($_POST['grupo_guardia_id']))
    { 

    header("Location: administrador/modificar_personal.php?id=$cedula&msg=1");

    }else{

      $cedula = $_POST['cedula'];
      $p_nombre = strtoupper($_POST['p_nombre']);
      $s_nombre = strtoupper($_POST['s_nombre']);
      $p_apellido = strtoupper($_POST['p_apellido']);
      $s_apelllido = strtoupper($_POST['s_apelllido']);
      $telefono_celular = $_POST['telefono_celular'];
      $telefono_casa = $_POST['telefono_casa'];
      $correo_electronico = strtoupper($_POST['correo_electronico']);
      $hijos = $_POST['hijos'];
      $numero_hijos = $_POST['numero_hijos'];
      $nombre_sector = strtoupper($_POST['nombre_sector']);
      $avenida = strtoupper($_POST['avenida']);
      $calle = strtoupper($_POST['calle']);
      $casa = strtoupper($_POST['casa']);
      $piso = strtoupper($_POST['piso']);
      $apto = strtoupper($_POST['apto']);
      $punto_referencia = strtoupper($_POST['punto_referencia']);
      $fecha_creacion = $_POST['fecha_creacion'];
      $parroquias_id = $_POST['parroquias_id'];
      $estado_civil_id = $_POST['estado_civil_id'];
      $genero_id = $_POST['genero_id'];
      $grado_instruccion_id = $_POST['grado_instruccion_id'];
      $organismos_id = $_POST['organismos_id'];
      $cargos_id = $_POST['cargos_id'];
      $rango_categoria_id = $_POST['rango_categoria_id'];
      $estatus_personal_id = $_POST['estatus_personal_id'];
      $grupo_guardia_id = $_POST['grupo_guardia_id'];

      //consulta a la base de datos
      $personal1 = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $cedula ");   
      $result_personal = pg_fetch_array($personal1);

      if($result_personal > 0){

        if(isset($_POST['cedula']))
        {

    	$consulta2 = "UPDATE public.personal SET cedula='$cedula', p_nombre='$p_nombre', s_nombre='$s_nombre', p_apellido='$p_apellido', s_apelllido='$s_apelllido', telefono_celular='$telefono_celular', telefono_casa='$telefono_casa', correo_electronico='$correo_electronico', hijos='$hijos', numero_hijos='$numero_hijos', nombre_sector='$nombre_sector', avenida='$avenida', calle='$calle', casa='$casa', piso='$piso', apto='$apto', punto_referencia='$punto_referencia', fecha_creacion='$fecha_creacion', parroquias_id='$parroquias_id', estado_civil_id='$estado_civil_id', genero_id='$genero_id', grado_instruccion_id='$grado_instruccion_id', organismos_id='$organismos_id', cargos_id='$cargos_id', rango_categoria_id='$rango_categoria_id', estatus_personal_id='$estatus_personal_id', grupo_guardia_id='$grupo_guardia_id' WHERE cedula = '$cedula'";

        $result = pg_query($dbconn, $consulta2) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());          

						// Valores asignados a la "Bitacora"
						$usuario = $_POST['cedula_usuario'];
						$nombre_esquema = 'Modificar Personal';
						$nombre_tabla =  'personal';
						$proceso = 'MODIFICAR'; 
            $valor_nuevo = ''.$cedula.', '.$p_nombre.', '.$s_nombre.', '.$p_apellido.', '.$s_apelllido.', '.$telefono_celular.', '.$telefono_casa.', '.$correo_electronico.', '.$hijos.', '.$numero_hijos.', '.$nombre_sector.', '.$avenida.', '.$calle.', '.$casa.', '.$piso.', '.$apto.', '.$punto_referencia.', '.$fecha_creacion.', '.$parroquias_id.', '.$estado_civil_id.', '.$genero_id.', '.$grado_instruccion_id.', '.$organismos_id.', '.$cargos_id.', '.$rango_categoria_id.', '.$estatus_personal_id.', '.$grupo_guardia_id.'';
            $fecha_modificacion= date ("Y/n/j H:m:s");

            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
        }

        if(pg_query($dbconn, $bitacora_obs) or die ("Upps Fallo conexion con la Tabla")) { 

             header("Location: administrador/modificar_personal.php?id=$cedula&msg=2");
        }else{ 

			 header("Location: administrador/modificar_personal.php?id=$cedula&msg=5");
        }

      }


    }

  }
/****************************************  FIN BREAK 2  *********************************************/  

				break;
				case 3: // Accion 3 -- Registro Pariente de Personal
/*************************************** INICIO CASE 3 **********************************************/

// Inserta el nuevo pariente
				$cedula_p= $_POST['cedula_p'];
				$nombre_p= strtoupper($_POST['nombre_p']);
				$apellido_p= strtoupper($_POST['apellido_p']);
				$telefono_p= $_POST['telefono_p'];
				$observaciones_p= strtoupper($_POST['observaciones_p']);
				$personal_cedula= $_POST['personal_cedula'];
				$tipo_parenstesco_id= $_POST['tipo_parenstesco_id'];

				// consulta si el número de cédula del familiar existe
				$consulta = pg_query($dbconn,"SELECT * FROM public.parantesco_personal WHERE cedula_p = $cedula_p ");
				$result = pg_fetch_array($consulta);
		  if($result != 0){
		  
					header("Location: administrador/registro_personal4.php?msg=4");
		  
		  }else{

		  // Consulta si el número de cédula del personal ya tiene registro alguno
					$consulta = pg_query($dbconn,"SELECT * FROM public.parantesco_personal WHERE personal_cedula = $personal_cedula ");
					$result1 = pg_fetch_array($consulta);
			if($result1 != 0){

						header("Location: administrador/registro_personal4.php?msg=1");

			}else{

				// Realiza la inserción de datos
					$command_pg = "INSERT INTO public.parantesco_personal(cedula_p, nombre_p, apellido_p, telefono_p, observaciones_p, personal_cedula, tipo_parenstesco_id) VALUES ('$cedula_p', '$nombre_p', '$apellido_p', '$telefono_p', '$observaciones_p', '$personal_cedula', '$tipo_parenstesco_id' )";

					$result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());  

						// Valores asignados a la "Bitacora"
						$usuario = $_POST['cedula_usuario'];
						$nombre_esquema = 'Registro de Pariente';
						$nombre_tabla =  'parantesco_personal';
						$proceso = 'INSERTAR'; 
            $valor_nuevo = ''.$cedula_p.', '.$nombre_p.', '.$apellido_p.', '.$telefono_p.', '.$observaciones_p.', '.$personal_cedula.', '.$tipo_parenstesco_id.'';
            $fecha_creacion= date ("Y/n/j H:m:s");

            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";
          

					if(pg_query($dbconn, $bitacora_obs) or die ("Upps Fallo conexion con la Tabla")){ 

						header("Location: administrador/registro_personal5.php?msg=2");
					}else{ 

						header("Location: administrador/registro_personal4.php?msg=3");
					}

			}
		}				
/************************************** FIN BREAK 3 ***********************************************/
				break;
				case 4: // Accion 4 -- Actualizacion Datos de Parientes de Personal
/************************************** INICIO CASE 4 ****************************************/
					// verifica que todos los campos esten rellenados
				if(!empty($_POST))
				{
				if(empty($_POST['id']) || empty($_POST['cedula_p']) || empty($_POST['nombre_p']) || empty($_POST['apellido_p']) || empty($_POST['telefono_p']) || empty($_POST['observaciones_p']) || empty($_POST['personal_cedula']) || empty($_POST['tipo_parenstesco_id']))
    { 

		header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=1");
    

    }else{

      $id = $_POST['id'];
      $cedula_p = $_POST['cedula_p'];
      $nombre_p = strtoupper($_POST['nombre_p']);
      $apellido_p = strtoupper($_POST['apellido_p']);
      $telefono_p = $_POST['telefono_p'];
      $observaciones_p = strtoupper($_POST['observaciones_p']);
      $personal_cedula = $_POST['personal_cedula'];
      $tipo_parenstesco_id = $_POST['tipo_parenstesco_id'];

/*	  $consulta = pg_query($dbconn,"SELECT * FROM public.parantesco_personal WHERE cedula_p = $cedula_p ");
	  $result1 = pg_fetch_array($consulta);
if($result1 != 0){

		  header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=6");

}else{
*/
      //consulta a la base de datos
      $pariente1 = pg_query($dbconn, "SELECT * FROM public.parantesco_personal WHERE personal_cedula = $personal_cedula");   
      $result_pariente = pg_fetch_array($pariente1);

      if($result_pariente > 0){

        if(isset($_POST['personal_cedula']))
        {
        	// Actualiza datos del registro de Pariente

    	$consulta_pariente = "UPDATE public.parantesco_personal SET id='$id', cedula_p='$cedula_p', nombre_p='$nombre_p', apellido_p='$apellido_p', telefono_p='$telefono_p', observaciones_p='$observaciones_p', personal_cedula='$personal_cedula', tipo_parenstesco_id='$tipo_parenstesco_id' WHERE personal_cedula = $personal_cedula ";

					$result = pg_query($dbconn, $consulta_pariente) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());  

						// Valores asignados a la "Bitacora"
						$usuario = $_POST['cedula_usuario'];
						$nombre_esquema = 'Modificar Pariente';
						$nombre_tabla =  'parantesco_personal';
						$proceso = 'MODIFICAR'; 
            $valor_nuevo = ''.$cedula_p.', '.$nombre_p.', '.$apellido_p.', '.$telefono_p.', '.$observaciones_p.', '.$personal_cedula.', '.$tipo_parenstesco_id.'';
            $fecha_modificacion= date ("Y/n/j H:m:s");

            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
        }

        if(pg_query($dbconn, $bitacora_obs) or die ("Upps Fallo conexion con la Tabla")) { 

						header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=3");
        }else{ 

						header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=5");
        }

      }


 //   }
}

  }
  /****************************************** FIN BREAK 4 **************************************/
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
