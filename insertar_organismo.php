<?php
require('cookie/cookie.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 1){
                header('location: index.php?error=op');
            }else {
                if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

// Traer datos por metodo POST
	$accion = $_GET['ac'] ?? '';
	extract($_POST, EXTR_SKIP);

// Conexion con la base de datos
require_once 'config/conexion1.php';

			switch ($accion) {
			case 1:	// Accion 1 -- Registro de Organismos
				if(!empty($_POST)){
					$nombre_oganismos = strtoupper(trim($_POST['nombre_oganismos'] ?? $_POST['nombre_organismo'] ?? ''));
					if (empty($nombre_oganismos)) {
						header("Location: administrador/organismo.php?msg=3");
						exit;
					}
				
					// Consulta si el nombre existe en la base de datos
					$nombre_esc = pg_escape_string($dbconn, $nombre_oganismos);
					$consulta = pg_query($dbconn, "SELECT * FROM public.organismos WHERE UPPER(nombre_oganismos) = '$nombre_esc'");
					$result1 = pg_fetch_array($consulta);

					if ($result1 !== false && !empty($result1)){
						header("Location: administrador/organismo.php?msg=1");
						exit;
					}else{
						// Inserta el nuevo registro 			
						$command_pg = "INSERT INTO public.organismos (nombre_oganismos) VALUES ('$nombre_esc')";
						$result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
										
						// Valores asignados a la "Bitacora"
						$usuario_sistema = $_POST['cedula_usuario'] ?? '';
						$nombre_esquema = 'Registro de Organismos';
						$nombre_tabla =  'organismos';
						$proceso = 'INSERTAR';
						$valor_nuevo = '' . $nombre_oganismos . '';
						$fecha_modificacion = date("Y/n/j H:m:s");

						$bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
						@pg_query($dbconn, $bitacora_obs);

						header("Location: administrador/organismo.php?msg=2");
						exit;
					}
				}
				break;
				case 2: // Accion 2 -- Actualizacion de Organismos
					if(!empty($_POST))
					{
						$id = intval($_POST['id'] ?? 0);
						$nombre_oganismos = strtoupper(trim($_POST['nombre_oganismos'] ?? $_POST['nombre_organismo'] ?? ''));

						if(empty($id) || empty($nombre_oganismos))
						{ 
							header("Location: administrador/modificar_organismo.php?id=$id&msg=3");
							exit;
						}else{
							$nombre_esc = pg_escape_string($dbconn, $nombre_oganismos);
							// Consulta si el nombre del grupo existe en otro registro
							$consulta1 = pg_query($dbconn, "SELECT * FROM public.organismos WHERE UPPER(nombre_oganismos) = '$nombre_esc' AND id != $id");
							$result2 = pg_fetch_array($consulta1);

							if ($result2 !== false && !empty($result2)){
								header("Location: administrador/modificar_organismo.php?id=$id&msg=1");
								exit;
							}else{
								$actualiza_org = "UPDATE public.organismos SET nombre_oganismos='$nombre_esc' WHERE id = $id";
								$result = pg_query($dbconn, $actualiza_org) or die('ERROR AL MODIFICAR DATOS: ' . pg_last_error());
								
								// Valores asignados a la "Bitacora"
								$usuario_sistema = $_POST['cedula_usuario'] ?? '';
								$nombre_esquema = 'Modificar Organismo';
								$nombre_tabla =  'organismos';
								$proceso = 'MODIFICAR';
								$valor_nuevo = '' . $id . ', ' . $nombre_oganismos . '';
								$fecha_modificacion = date("Y/n/j H:m:s");

								$bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
								@pg_query($dbconn, $bitacora_obs);

								header("Location: administrador/modificar_organismo.php?id=$id&msg=2");
								exit;
							}
						}
					}
					break;
				case 3: // Accion 3 -- Registro de Grupos

					if(isset($_POST))
					{
						$id = $_POST['id'];
						$nombre_grupo = strtoupper($_POST['nombre_grupo']);
					
					// Consulta si el nombre del grupo existe en la base de datos
					$consulta1 = pg_query($dbconn,"SELECT * FROM grupos_guardia WHERE nombre_grupo = '$nombre_grupo'");
					$result2 = pg_fetch_array($consulta1);
	
				if ($result2 !== false && !empty($result2)){
	
					header("Location: administrador/grupos.php?msg=1");
				}else{
					// Inserta el nuevo registro
					$command_pg = "INSERT INTO grupos_guardia (nombre_grupo) VALUES ('$nombre_grupo' )";

					$result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
								
					// Valores asignados a la "Bitacora"
					$usuario_sistema = $_POST['cedula_usuario'];
					$nombre_esquema = 'Registro de Grupos';
					$nombre_tabla =  'grupos_guardia';
					$proceso = 'INSERTAR';
					$valor_nuevo = '' . $nombre_grupo . '';
					$fecha_modificacion = date("Y/n/j H:m:s");

					$bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
				}		

				if (pg_query($dbconn, $bitacora_obs) or die("Upps Fallo conexion con la Tabla")) {
	
					header("Location: administrador/grupos.php?msg=2");
					 }else{ 
	
					header("Location: administrador/grupos.php?msg=3");
					  }
					}
				
					break;
					case 4: // Accion 4 -- Actualización de Grupos

						if(!empty($_POST))
						{
						if(empty($_POST['id']) || empty($_POST['nombre_grupo']))
					{ 
					
					header("Location: administrador/modificar_grupos.php?id=$id&msg=3");
					
					
					}else{
					
					$id = $_POST['id'];
					$nombre_grupo = strtoupper($_POST['nombre_grupo']);
	
						// Consulta si el nombre del grupo existe en la base de datos
					$consulta1 = pg_query($dbconn,"SELECT * FROM grupos_guardia WHERE nombre_grupo = '$nombre_grupo'");
					$result2 = pg_fetch_array($consulta1);
	
				if ($result2 !== false && !empty($result2)){
	
					header("Location: administrador/modificar_grupos.php?id=$id&msg=1");
				}else{
	
						// Consulta si el nombre del grupo existe en la base de datos
						$consulta1 = pg_query($dbconn,"SELECT * FROM grupos_guardia WHERE id = $id");
						$result2 = pg_fetch_array($consulta1);
	
						if ($result2 !== false && !empty($result2)) {
	
							if (isset($_POST['id'])) {					
								// Actualiza datos del registro de Pariente
	
								$actualiza_org = "UPDATE public.grupos_guardia SET id='$id', nombre_grupo='$nombre_grupo' WHERE id = $id ";
	
								$result = pg_query($dbconn, $actualiza_org) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
								
								// Valores asignados a la "Bitacora"
								$usuario_sistema = $_POST['cedula_usuario'];
								$nombre_esquema = 'Modificar Grupos';
								$nombre_tabla =  'grupos_guardia';
								$proceso = 'MODIFICAR';
								$valor_nuevo = '' . $id . ', ' . $nombre_grupo . '';
								$fecha_modificacion = date("Y/n/j H:m:s");
	
								$bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
							}		
	
							if (pg_query($dbconn, $bitacora_obs) or die("Upps Fallo conexion con la Tabla")) {
	
								header("Location: administrador/modificar_grupos.php?id=$id&msg=2");
							} else {
	
								header("Location: administrador/modificar_grupos.php?id=$id&msg=3");
							}
						 }
					  }
					}
				}
						break;
					default:
				# code ...
				break;

			}
                      }
          }
}
 pg_close($dbconn); 
?>