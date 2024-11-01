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
						$CEDULA = $_SESSION['personal_cedula'];
						$fecha = date("d/m/Y | H:i:s ");

						if (isset($_POST)) {

							$contador_sup = pg_query($dbconn, "SELECT id, personal_cedula_sup, personal_cedula_aux
							FROM public.personal_datos
							WHERE (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_sup = $CEDULA)
							   OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_aux = $CEDULA)");

							$existe_reg = pg_num_rows($contador_sup);

							/* ACCESO COOKIE POR USUARIO */
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
								/* ACCESO COOKIE POR CONTADOR */
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


								/* ACCESO DESDE OTRO EQUIPO */
							} elseif ($existe_reg > 0) {
								?>
								<meta charset="utf-8">
								<script type="text/javascript">
									alert('Qué alegría verte de nuevo por aquí !!!');
									location.href = "../supervisor/principal.php";
								</script>
							<?php
								/* ACCESO PRIMER INICIO */
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
						$CEDULA = $_SESSION['personal_cedula'];
						$fecha = date("d/m/Y | H:i:s ");

						if (isset($_POST)) {

							$contador_desp = pg_query($dbconn, "SELECT id, personal_cedula_poli1, personal_cedula_poli2, personal_cedula_poli3, personal_cedula_bomb1, personal_cedula_bomb2, personal_cedula_bomb3, personal_cedula_pc1, personal_cedula_pc2, personal_cedula_pc3
							FROM public.personal_datos
							WHERE (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_poli1 = $CEDULA)
								   OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_poli2 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_poli3 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_bomb1 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_bomb2 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_bomb3 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_pc1 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_pc2 = $CEDULA)
									OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_pc1 = $CEDULA)");

							$existe_regdesp = pg_num_rows($contador_desp);

							/* ACCESO USUARIO POR COOKIE USUARIO */
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

								/* ACCESO DESDE OTRO EQUIPO */
							} elseif ($existe_regdesp > 0) {

								$registro_desp = pg_query($dbconn, "SELECT id, fecha_inicio_g, cierre_g, grupos_guardia_id, usuario_entrada_id
								FROM public.guardias
								WHERE (fecha_inicio_g=(SELECT MAX(fecha_inicio_g) FROM guardias) AND usuario_entrada_id = '$CEDULA')");
	
								$reg_guardiadesp = pg_num_rows($registro_desp);

								/* DESPACHADOR YA CON GUARDIA APERTURADA */
								if ($reg_guardiadesp >= 1){
									?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Qué alegría verte de nuevo por aquí !!!');
										location.href = "../despachador/principal.php";
									</script>
								<?php
								} else {
								/* DESPACHADOR SIN GUARDIA APERTURADA */

									setcookie("contador", 1, time() + 86300);
									setcookie("usuario", $_COOKIE3);
									setcookie("fecha", $fecha);

									?>
									<meta charset="utf-8">
									<script type="text/javascript">
										alert('Bienvenido al "Libro Digital Novedades 911" \n Éste es tu primer inicio de sesión al sistema ');
										location.href = "../despachador/control_bienes_e.php";
									</script>
									<?php	

								}

							} else {
								/* DESPACHADOR FUERA DE GUARDIA */
								header('location: ../index.php?error=op');

							}
						}

						break;
					case 4: // USUARIO OPERADOR

						$_COOKIE3 = $_SESSION['usuario'];
						$CEDULA = $_SESSION['personal_cedula'];
						$fecha = date("d/m/Y | H:i:s ");

						if (isset($_POST)) {

							$contador_op = pg_query($dbconn, "SELECT id, personal_cedula_poli1, personal_cedula_poli2, personal_cedula_poli3, personal_cedula_bomb1, personal_cedula_bomb2, personal_cedula_bomb3, personal_cedula_pc1, personal_cedula_pc2, personal_cedula_pc3
							FROM public.personal_datos
							WHERE (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_op1 = $CEDULA)
							OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_op2 = $CEDULA)
							OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_op3 = $CEDULA)
							OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_op4 = $CEDULA)
							OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_op5 = $CEDULA)
							OR (id=(SELECT MAX(id) FROM  personal_datos) AND personal_cedula_op6 = $CEDULA)");

							$existe_op = pg_num_rows($contador_op);							

							/* ACCESO OPERADOR POR COOKIE USUARIO */
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

								if (isset($_COOKIE['fecha']))header('location: ../index.php?error=si'); {
								}
							/* ACCESO DESDE OTRO EQUIPO */
						} elseif ($existe_op > 0) {

							$registro_op = pg_query($dbconn, "SELECT solicitud_atencion.id, solicitud_atencion.operador_solicitud, solicitud_atencion.solicitudes_id, solicitudes.id, solicitudes.fecha_sol
							FROM public.solicitud_atencion
							INNER JOIN public.solicitudes
							ON solicitudes.id = solicitud_atencion.solicitudes_id
							WHERE (solicitudes.fecha_sol=(SELECT MAX(fecha_sol) FROM solicitudes) AND solicitud_atencion.operador_solicitud = '$CEDULA')");

							$reg_solicit = pg_num_rows($registro_op);

							/* OPERADOR YA CON GUARDIA APERTURADA */
							if ($reg_solicit >= 1){
								?>
								<meta charset="utf-8">
								<script type="text/javascript">
									alert('Qué alegría verte de nuevo por aquí \n ENTRADA POR CONSULTA SQL!!!');
									location.href = "../operador/principal.php";
								</script>
							<?php
							} else {
							/* OPERADOR SIN GUARDIA APERTURADA */

								setcookie("contador", 1, time() + 86300);
								setcookie("usuario", $_COOKIE3);
								setcookie("fecha", $fecha);

								?>
								<meta charset="utf-8">
								<script type="text/javascript">
									alert('Bienvenido al "Libro Digital Novedades 911" \n Éste es tu primer inicio de sesión al sistema \n ENTRADA POR CONSULTA SQL');
									location.href = "../operador/control_bienes_e.php";
								</script>
								<?php	

							}

						} else {
							/* OPERADOR FUERA DE GUARDIA */
							header('location: ../index.php?error=op');

						}

						}

						break;


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
