<?php
/*
 * ============================================================================
 *  Libro Digital de Novedades 9-1-1 - VEN 911 Merida
 *  Sistema reestructurado por el Ing. Nelson Briceño
 *  Migraciones por el Ing. Francisco Paredes
 * ============================================================================
 */
// ERRORES DE PHP: se registran siempre en el log del servidor y no se muestran
// al usuario (pueden revelar rutas y datos internos). Para verlos en pantalla
// durante el desarrollo, definir MOSTRAR_ERRORES en config/conexion_local.php.
if (file_exists(__DIR__ . '/../config/conexion_local.php')) {
	require_once __DIR__ . '/../config/conexion_local.php';
}
$mostrar_errores = defined('MOSTRAR_ERRORES') && MOSTRAR_ERRORES;
ini_set('display_errors', $mostrar_errores ? '1' : '0');
ini_set('display_startup_errors', $mostrar_errores ? '1' : '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

// 1. INICIAR SESIÓN PRIMERO PARA PODER LEER LOS DATOS DEL USUARIO
if (session_status() == PHP_SESSION_NONE) {
	if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
}

// conexion a BD
include '../config/conexion1.php';

// ========================================================================
// 2. PARCHE GLOBAL PARA ARCHIVOS ANTIGUOS (Bypass de pantallas en blanco)
// ========================================================================
if (isset($_SESSION['activo']) && $_SESSION['activo'] == 'si') {
	// Si el usuario hace clic en el menú, $_POST viene vacío. Lo rellenamos:
	if (empty($_POST['usuario'])) {
		$_POST['usuario'] = $_SESSION['usuario'];
		$_POST['contrasena'] = $_SESSION['contrasena'];
	}
	// IMPORTANTE: Estos archivos exigen que existan las variables globales $usuario y $clave
	$usuario = $_POST['usuario'];
	$clave = $_POST['contrasena'];
}
// ========================================================================

// Validar que lleguen los datos por POST (Ya sean los reales del login o los inyectados)
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
	
	$pagina_actual = basename($_SERVER['PHP_SELF']);
	
	// Si el usuario ya está logueado y solo está navegando, NO verificamos la BD de nuevo
	if (isset($_SESSION['activo']) && $_SESSION['activo'] == 'si' && $pagina_actual != 'index.php' && $pagina_actual != 'cookie.php') {
		// El script termina aquí silenciosamente y permite que el HTML del archivo viejo cargue
	} else {
		
		// ====================================================================
		// 3. TU CÓDIGO ORIGINAL DE INICIO DE SESIÓN EXACTAMENTE IGUAL
		// ====================================================================
		
		// Se limpian los espacios en blanco accidentales que rompen el cifrado SHA1
		$usuario_login = trim($_POST['usuario']);
		$clave_plana = trim($_POST['contrasena']);
		$clave_hash = sha1($clave_plana);

		// Consulta de datos en tabla "usuario"
		// Consulta parametrizada para evitar inyeccion SQL desde el formulario de acceso
		$consulta_usuario = pg_query_params($dbconn, "SELECT * FROM public.usuario WHERE usuario = $1 AND contrasena = $2 AND estado_usuario_id = 1", array($usuario_login, $clave_hash));

		try {
			$cant = pg_num_rows($consulta_usuario);
			
			$usuario1_cookie = isset($_COOKIE['usuario1']) ? $_COOKIE['usuario1'] : '';

			if (isset($_COOKIE['block' . $usuario1_cookie]) && !empty($usuario1_cookie)) {
				header('location: ../index.php?error=bloqueo');
				exit; 
			} else {
				/*
				 * EXISTEN DATOS DE USUARIO
				 */
				if ($cant == 1) {
					$registro = pg_fetch_array($consulta_usuario);
					
					$_SESSION['activo'] = 'si';
					$_SESSION['usuario'] = $usuario_login;
					$_SESSION['contrasena'] = $clave_hash; // GUARDAMOS EL HASH PARA EL BYPASS
					$_SESSION['id'] = $registro['id'];
					$_SESSION['id_usuario'] = $registro['id'];
					$_SESSION['tipo_rol_id'] = $registro['tipo_rol_id'];
					$_SESSION['estado_usuario_id'] = $registro['estado_usuario_id'];
					$_SESSION['personal_cedula'] = $registro['personal_cedula'];

					// Valores asignados a la "Bitacora"
					$usuario_cedula = $registro['personal_cedula'];
					$fecha = date("Y/m/d | H:i:s ");
					$nombre_esquema = 'Inicio de Session';
					$nombre_tabla = 'Usuario';
					$proceso = 'VALIDAR';
					$valor_nuevo = '' . $_SESSION['id'] . ', ' . $_SESSION['usuario'] . ', ' . $_SESSION['tipo_rol_id'] . ', ' . $_SESSION['estado_usuario_id'] . ', ' . $_SESSION['personal_cedula'] . ', ' . $fecha . '';

					$bitacora_session = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) 
					VALUES ('$usuario_cedula','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha')";

					$result = pg_query($dbconn, $bitacora_session) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

					/*
					 * NIVELES DE USUARIO
					 */
					$rol = $_SESSION['tipo_rol_id'];
					switch ($rol) {
						case 1: // USUARIO ADMINISTRADOR
							$_COOKIE3 = $_SESSION['usuario'];
							$fecha = date("Y/m/d | H:i:s ");

							setcookie("usuario", $_COOKIE3);
							setcookie("fecha", $fecha);

							header('location: ../administrador/principal.php');
							exit; 
							break;

						case 2: // USUARIO SUPERVISOR
							$_COOKIE3 = $_SESSION['usuario'];
							$CEDULA = $_SESSION['personal_cedula'];
							$fecha = date("Y/m/d | H:i:s ");

							$contador_sup = pg_query($dbconn, "SELECT id, personal_cedula_sup, personal_cedula_aux FROM public.personal_datos WHERE (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_sup = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_aux = $CEDULA)");
							$existe_reg = pg_num_rows($contador_sup);

							if (isset($_COOKIE['usuario'])) {
								$contador_actual = isset($_COOKIE['contador']) ? $_COOKIE['contador'] : 0;
								
								if ($contador_actual >= 1) {
									setcookie("contador", $contador_actual + 1, time() + 86300);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../supervisor/principal.php";</script>';
									exit;
								} else {
									setcookie("contador", 1, time() + 86300);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../supervisor/personal_guardia.php";</script>';
									exit;
								}
							} elseif (isset($_COOKIE['contador'])) {
								if ($_COOKIE['contador'] >= 1) {
									setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../supervisor/principal.php";</script>';
									exit;
								}
							} elseif ($existe_reg > 0) {
								echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../supervisor/principal.php";</script>';
								exit;
							} else {
								setcookie("contador", 1, time() + 86300);
								setcookie("usuario", $_COOKIE3);
								setcookie("fecha", $fecha);
								echo '<meta charset="utf-8"><script type="text/javascript">alert("Bienvenido al \"Libro Digital Novedades 911\" \n Éste es tu primer inicio de sesión al sistema"); location.href = "../supervisor/personal_guardia.php";</script>';
								exit;
							}
							break;

						case 3: // USUARIO DESPACHADOR
							$_COOKIE3 = $_SESSION['usuario'];
							$CEDULA = $_SESSION['personal_cedula'];
							$fecha = date("Y/m/d | H:i:s ");

							$contador_desp = pg_query($dbconn, "SELECT id, personal_cedula_poli1, personal_cedula_poli2, personal_cedula_poli3, personal_cedula_bomb1, personal_cedula_bomb2, personal_cedula_bomb3, personal_cedula_pc1, personal_cedula_pc2, personal_cedula_pc3 FROM public.personal_datos WHERE (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_poli1 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_poli2 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_poli3 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_bomb1 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_bomb2 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_bomb3 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_pc1 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_pc2 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_pc3 = $CEDULA)");
							$existe_regdesp = pg_num_rows($contador_desp);

							if (isset($_COOKIE['usuario'])) {
								$contador_actual = isset($_COOKIE['contador']) ? $_COOKIE['contador'] : 0;
								
								if ($contador_actual >= 1) {
									setcookie("contador", $contador_actual + 1, time() + 86300);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../despachador/principal.php";</script>';
									exit;
								} else {
									setcookie("contador", 1, time() + 86300);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../despachador/principal.php";</script>';
									exit;
								}
							} elseif ($existe_regdesp > 0) {
								$registro_desp = pg_query($dbconn, "SELECT id, fecha_inicio_g, cierre_g, grupos_guardia_id, usuario_entrada_id FROM public.guardias WHERE (fecha_inicio_g=(SELECT MAX(fecha_inicio_g) FROM guardias) AND usuario_entrada_id = '$CEDULA')");
								$reg_guardiadesp = pg_num_rows($registro_desp);

								if ($reg_guardiadesp >= 1){
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../despachador/principal.php";</script>';
									exit;
								} else {
									setcookie("contador", 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Bienvenido al \"Libro Digital Novedades 911\" \n Éste es tu primer inicio de sesión al sistema "); location.href = "../despachador/control_bienes_e.php";</script>';
									exit;
								}
							} else {
								header('location: ../index.php?error=op');
								exit;
							}
							break;

						case 4: // USUARIO OPERADOR
							$_COOKIE3 = $_SESSION['usuario'];
							$CEDULA = $_SESSION['personal_cedula'];
							$fecha = date("Y/m/d | H:i:s ");

							$contador_op = pg_query($dbconn, "SELECT id, personal_cedula_poli1, personal_cedula_poli2, personal_cedula_poli3, personal_cedula_bomb1, personal_cedula_bomb2, personal_cedula_bomb3, personal_cedula_pc1, personal_cedula_pc2, personal_cedula_pc3 FROM public.personal_datos WHERE (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_op1 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_op2 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_op3 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_op4 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_op5 = $CEDULA) OR (id=(SELECT MAX(id) FROM personal_datos) AND personal_cedula_op6 = $CEDULA)");
							$existe_op = pg_num_rows($contador_op);							

							if (isset($_COOKIE['usuario'])) {
								$contador_actual = isset($_COOKIE['contador']) ? $_COOKIE['contador'] : 0;

								if ($contador_actual >= 1) {
									setcookie("contador", $contador_actual + 1, time() + 86300);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../operador/principal.php";</script>';
									exit;
								} else {
									setcookie("contador", 1, time() + 86300);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí !!!"); location.href = "../operador/principal.php";</script>';
									exit;
								}
							} 
							
							if (isset($_COOKIE['fecha'])) {
								header('location: ../index.php?error=si');
								exit;
							}

							if ($existe_op > 0) {
								$registro_op = pg_query($dbconn, "SELECT solicitud_atencion.id, solicitud_atencion.operador_solicitud, solicitud_atencion.solicitudes_id, solicitudes.id, solicitudes.fecha_sol FROM public.solicitud_atencion INNER JOIN public.solicitudes ON solicitudes.id = solicitud_atencion.solicitudes_id WHERE (solicitudes.fecha_sol=(SELECT MAX(fecha_sol) FROM solicitudes) AND solicitud_atencion.operador_solicitud = '$CEDULA')");
								$reg_solicit = pg_num_rows($registro_op);

								if ($reg_solicit >= 1){
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Qué alegría verte de nuevo por aquí \n ENTRADA POR CONSULTA SQL!!!"); location.href = "../operador/principal.php";</script>';
									exit;
								} else {
									setcookie("contador", 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);
									echo '<meta charset="utf-8"><script type="text/javascript">alert("Bienvenido al \"Libro Digital Novedades 911\" \n Éste es tu primer inicio de sesión al sistema \n ENTRADA POR CONSULTA SQL"); location.href = "../operador/control_bienes_e.php";</script>';
									exit;
								}
							} else {
								header('location: ../index.php?error=op');
								exit;
							}
							break;

						default:
							break;
					}
				} else {
					/*
					 * USUARIO CON ACCESO ERRONEO
					 */
					if (isset($_COOKIE['contador1'])) {
						$contador_fallido = $_COOKIE['contador1'] + 1;
						$usuario_fallido = isset($_COOKIE['usuario1']) ? $_COOKIE['usuario1'] : $usuario_login;
						
						setcookie("contador1", $contador_fallido, time() + 120);
						setcookie("usuario1", $usuario_fallido, time() + 120);

						if ($contador_fallido >= 3) { 
							setcookie('block' . $usuario_fallido, 'bloqueado', time() + 60);
							$estado_usuario_id = 2;
							// El usuario viene de una cookie del navegador: se envia como parametro
							$result = pg_query_params($dbconn, "UPDATE public.usuario SET estado_usuario_id = $1 WHERE usuario = $2", array($estado_usuario_id, $usuario_fallido));
							
							header('location: ../index.php?error=bloqueo');
							exit; 
						} else {
							header('location: ../index.php?error=si');
							exit; 
						}
					} else {
						setcookie("contador1", 1, time() + 120);
						setcookie("usuario1", $usuario_login, time() + 120);
						header('location: ../index.php?error=si');
						exit; 
					}
				}
			}
		} catch (Exception $e) {
			header('location: ../index.php?error=si');
			exit;
		}
	}
} else {
	header('location: ../index.php');
	exit;
}
?>