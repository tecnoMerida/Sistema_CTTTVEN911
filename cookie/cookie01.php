<?php
// conexion a BD
include '../config/conexion1.php';
// Recibe datos del Index.php
extract($_POST);

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
	session_start();

	$usuario = $_POST['usuario'];
	$clave = sha1($_POST['contrasena']);
	// consulta datos en tabla "usuario"
	$consulta_usuario = pg_query($dbconn, "SELECT * FROM public.usuario WHERE usuario = '$usuario' AND 
contrasena = '$clave' AND estado_usuario_id = 1");

	try {

		$cant = pg_num_rows($consulta_usuario);

		if (isset($_COOKIE['block' . $usuario1])) {

			header('location: ../index.php?error=bloqueo');
		} else {
			/*
				* EXISTEN DATOS DE USUARIO
				*/
			if ($cant == 1) {
				$registro = pg_fetch_array($consulta_usuario);
				$_SESSION['activo'] = 'si';
				$_SESSION['usuario'] = $usuario;
				$_SESSION['contrasena'] = $clave;
				$_SESSION['id'] = $registro['id'];
				$_SESSION['tipo_rol_id'] = $registro['tipo_rol_id'];
				$_SESSION['estado_usuario_id'] = $registro['estado_usuario_id'];
				$_SESSION['personal_cedula'] = $registro['personal_cedula'];

				// Valores asignados a la "Bitacora"
				$usuario = $registro['personal_cedula'];
				$fecha = date("d/m/Y | H:i:s ");
				$nombre_esquema = 'Inicio de Session';
				$nombre_tabla =  'Usuario';
				$proceso = 'VALIDAR';
				$valor_nuevo = '' . $_SESSION['id'] . ', ' . $_SESSION['usuario'] . ', ' . $_SESSION['tipo_rol_id'] . ', 
			' . $_SESSION['estado_usuario_id'] . ', ' . $_SESSION['personal_cedula'] . ', ' . $fecha . '';

				$bitacora_session = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, 
			proceso, valor_nuevo, fecha_operacion) VALUES 
			('$usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha')";

				$result = pg_query($dbconn, $bitacora_session) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

				/*
							* NIVELES DE USUARIO
							*/
				$rol = $_SESSION['tipo_rol_id'];
				switch ($rol) {
					case 1: // USUARIO ADMINISTRADOR
						$_COOKIE3 = $_SESSION['usuario'];
						$fecha = date("d/m/Y | H:i:s ");

						setcookie("usuario", $_COOKIE3);
						setcookie("fecha", $fecha);

						header('location: ../administrador/principal.php');
						break;

					case 2: // USUARIO SUPERVISOR

						$_COOKIE3 = $_SESSION['usuario'];
						$fecha = date("d/m/Y | H:i:s ");

						if (isset($_POST)) {

							if (isset($_COOKIE['usuario'])) {
								// Caduca en 24 horas
								echo "Número de visitas: " . $_COOKIE['contador'];

								if ($_COOKIE['contador'] >= 1) {
									setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../supervisor/principal.php";
									</script>
								<?php
								} else {
									setcookie("contador", 1, time() + 86300);
								?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../supervisor/personal_guardia.php";
									</script>
								<?php
								}

								if (isset($_COOKIE['fecha'])) {
								}
							} elseif (isset($_COOKIE['contador'])) {
								// Caduca en 24 horas
								echo "Número de visitas: " . $_COOKIE['contador'];

								if ($_COOKIE['contador'] >= 1) {
									setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);
								?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../supervisor/principal.php";
									</script>
								<?php
								}

								if (isset($_COOKIE['fecha'])) {
								}
							} else {

								setcookie("contador", 1, time() + 86300);
								setcookie("usuario", $_COOKIE3);
								setcookie("fecha", $fecha);

								?>
								<meta charset="utf-8">
								<script type="text/javascript">
alert('Bienvenido al "Libro Digital Novedades 911" \n Éste es tu primer inicio de sesión al sistema');
									location.href = "../supervisor/personal_guardia.php";
								</script>

								<?php

							}
						}

						break;

					case 3: // USUARIO DESPACHADOR

						$_COOKIE3 = $_SESSION['usuario'];
						$fecha = date("d/m/Y | H:i:s ");

						if (isset($_POST)) {

							if (isset($_COOKIE['usuario'])) {
								// Caduca en 24 horas
								echo "Número de visitas: " . $_COOKIE['contador'];

								if ($_COOKIE['contador'] >= 1) {
									setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
								?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../despachador/principal.php";
									</script>
								<?php
								} else {
									setcookie("contador", 1, time() + 86300);

								?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../despachador/principal.php";
									</script>
								<?php
								}

								if (isset($_COOKIE['fecha'])) {
								}
							} elseif (isset($_COOKIE['contador'])) {
								// Caduca en 24 horas
								echo "Número de visitas: " . $_COOKIE['contador'];

								if ($_COOKIE['contador'] >= 1) {
									setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);
								?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../despachador/principal.php";
									</script>
								<?php
								}

								if (isset($_COOKIE['fecha'])) {
								}
							} else {

								setcookie("contador", 1, time() + 86300);
								setcookie("usuario", $_COOKIE3);
								setcookie("fecha", $fecha);
								?>
								<meta charset="utf-8">
								<script type="text/javascript">
									alert('Bienvenido al "Libro Digital Novedades 911" \n Éste es tu primer inicio de sesión al sistema');
									location.href = "../despachador/control_bienes_e.php";
								</script>

<?php

							}
						}

						break;
						case 4: // USUARIO OPERADOR

							$_COOKIE3 = $_SESSION['usuario'];
							$fecha = date("d/m/Y | H:i:s ");
	
							if (isset($_POST)) {
	
								if (isset($_COOKIE['usuario'])) {
									// Caduca en 24 horas
									echo "Número de visitas: " . $_COOKIE['contador'];
	
									if ($_COOKIE['contador'] >= 1) {
										setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
									?>
										<meta charset="utf-8">
										<script type="text/javascript">
											alert('Qué alegría verte de nuevo por aquí !!!');
											location.href = "../operador/principal.php";
										</script>
									<?php
									} else {
										setcookie("contador", 1, time() + 86300);
	
									?>
										<meta charset="utf-8">
										<script type="text/javascript">
											alert('Qué alegría verte de nuevo por aquí !!!');
											location.href = "../operador/principal.php";
										</script>
									<?php
									}
	
									if (isset($_COOKIE['fecha'])) {
									}
								} elseif (isset($_COOKIE['contador'])) {
									// Caduca en 24 horas
									echo "Número de visitas: " . $_COOKIE['contador'];
	
									if ($_COOKIE['contador'] >= 1) {
										setcookie("contador", $_COOKIE['contador'] + 1, time() + 86300);
										setcookie("usuario", $_COOKIE3);
										setcookie("fecha", $fecha);
									?>
										<meta charset="utf-8">
										<script type="text/javascript">
											alert('Qué alegría verte de nuevo por aquí !!!');
											location.href = "../operador/principal.php";
										</script>
									<?php
									}
	
									if (isset($_COOKIE['fecha'])) {
									}
								} else {
	
									setcookie("contador", 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);
									?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Bienvenido al "Libro Digital Novedades 911" \n Éste es tu primer inicio de sesión al sistema');
										location.href = "../operador/control_bienes_e.php";
									</script>
	
	<?php
	
								}
							}
	
							break;
/*						case 5:
							// Case para OPERADORES
							header('location: ../index.php?error=op');
							break;*/

					default:
				}
			} else {
							/*
					        * USUARIO CON ACCESO ERRONEO
					        */

				if (isset($_COOKIE['contador1'])) {
									/*
									* USUARIO CON MAS DE 1 INTENTO DE INGRESO
									*/

					setcookie("contador1", $_COOKIE['contador1'] + 1);
					setcookie("usuario1", $_COOKIE['usuario1']);
					setcookie($usuario1, $contador1, time() + 120);

					header('location: ../index.php?error=si');

					/*
									* BLOQUEO DE USUARIO CON 3 INTENTOS DE INGRESOS
									*/
					if ($_COOKIE['contador1'] >= 2) {
						// code...
						setcookie('block' . $_COOKIE['contador1'], $_COOKIE['usuario1'], time() + 60);

						if (isset($_COOKIE['usuario1'])) {

							// Asignamos valores
							$estado_usuario_id = 2;
							$usuario_bloq = $_COOKIE['usuario1'];

							// Actualizamos la Tabla "Usuario" de la Base de Datos
							$consulta_usuario = "UPDATE public.usuario SET 
							estado_usuario_id='$estado_usuario_id' WHERE usuario = '$usuario_bloq' ";

							$result = pg_query($dbconn, $consulta_usuario) or 
							die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

							$cmdtuples = pg_affected_rows($result);

							echo $cmdtuples . " datos actualizado.\n";

							// Free resultset liberar los datos
							pg_free_result($result);

							// Redireccionamos al index.php
							header('location: ../index.php?error=bloqueo');
						}
					}
				} else {
					/*
										* PRIMER INTENTO ERRONEO DE INGRESO
										*/
					setcookie("contador1", 1, time() + 120);
					setcookie("usuario1", $usuario);
					header('location: ../index.php?error=si');
				}
			}
		}
	} catch (Exception $e) {
	}
}
