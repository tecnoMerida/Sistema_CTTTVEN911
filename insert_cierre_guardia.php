<?php
require('cookie/cookie.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['tipo_rol_id'])) {
    header("Location: index.php?error=fuera");
    exit();
} else {
    if ($_SESSION['tipo_rol_id'] != 2 && $_SESSION['tipo_rol_id'] != 1) {
        header('location: administrador/principal.php?error=no');
        exit();
    } else {
        if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

            // ZONA HORARIA
            date_default_timezone_set('America/Caracas');

            // Traer datos por metodo POST
            $accion = $_GET['ac'] ?? '';
            extract($_POST, EXTR_SKIP);

            // Conexion con la base de datos
            require_once 'config/conexion1.php';

            switch ($accion) {
                case 1: // Accion 1 -- Registro de estadisticas diarias
                    /****************************************** INICIO CASE 1 ***************************************/
                    if (isset($_POST)) {
                        $efectivo     = intval($_POST['efectivo'] ?? 0);
                        $no_efectivo  = intval($_POST['no_efectivo'] ?? 0);
                        $sin_despacho = intval($_POST['sin_despacho'] ?? 0);
                        $repetida     = intval($_POST['repetida'] ?? 0);
                        $sabotaje     = intval($_POST['sabotaje'] ?? 0);
                        $informacion  = intval($_POST['informacion'] ?? 0);
                        $abandonada   = intval($_POST['abandonada'] ?? 0);
                        $total_solici = intval($_POST['total_solici'] ?? 0);
                        $mayor_rele   = pg_escape_string($dbconn, trim($_POST['mayor_rele'] ?? '0'));
                        if ($mayor_rele === '') $mayor_rele = '0';
                        $mes          = pg_escape_string($dbconn, trim($_POST['mes'] ?? date("n")));
                        $ano          = intval($_POST['ano'] ?? date("Y"));
                        $fecha_creacion = date("Y-m-d H:i:s");
                        $guardia_id   = intval($_POST['guardia_id'] ?? 0);
                        $personal_usuario = pg_escape_string($dbconn, $_POST['personal_usuario'] ?? ($_SESSION['personal_cedula'] ?? ''));

                        // Si guardia_id vino vacío o <= 0, buscar la guardia activa o la última registrada
                        if ($guardia_id <= 0) {
                            $q_g = pg_query($dbconn, "SELECT id FROM public.guardias WHERE fecha_fin_g IS NULL ORDER BY id DESC LIMIT 1");
                            if ($q_g && pg_num_rows($q_g) > 0) {
                                $r_g = pg_fetch_assoc($q_g);
                                $guardia_id = intval($r_g['id']);
                            } else {
                                $q_g2 = pg_query($dbconn, "SELECT id FROM public.guardias ORDER BY id DESC LIMIT 1");
                                if ($q_g2 && pg_num_rows($q_g2) > 0) {
                                    $r_g2 = pg_fetch_assoc($q_g2);
                                    $guardia_id = intval($r_g2['id']);
                                }
                            }
                        }
                        if ($guardia_id <= 0) {
                            $guardia_id = 1;
                        }

                        // Asigna valores a variables requeridas en la tabla de bitacora
                        $nombre_esquema = 'Estadisticas de solicitudes';
                        $nombre_tabla = 'estadisticas_solicitud';
                        $proceso = 'Insertar';
                        $valor_nuevo = "$efectivo, $no_efectivo, $sin_despacho, $repetida, $sabotaje, $informacion, $abandonada, $total_solici, $mayor_rele, $guardia_id";

                        // Inserta el nuevo registro en tabla "estadisticas_solicitud"
                        $command_pg = "INSERT INTO public.estadisticas_solicitud(efectivo, no_efectivo, sin_despacho, repetida, sabotaje, informacion, abandonada, total_solici, mayor_rele, mes, ano, guardia_id) 
                        VALUES ($efectivo, $no_efectivo, $sin_despacho, $repetida, $sabotaje, $informacion, $abandonada, $total_solici, '$mayor_rele', '$mes', $ano, $guardia_id)";

                        $result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error($dbconn));

                        // Inserta el nuevo registro en la tabla "bitacora"
                        $bitacora_personal_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) 
                        VALUES ('$personal_usuario', '$nombre_esquema', '$nombre_tabla', '$proceso', '$valor_nuevo', '$fecha_creacion')";

                        if (pg_query($dbconn, $bitacora_personal_pg)) {
                            ?>
                            <script type="text/javascript">
                                alert("¡Estadísticas registradas con ÉXITO!");
                                window.location="supervisor/control_bienes_s.php";
                            </script>
                            <?php
                        } else {
                            header("Location: supervisor/estadisticas.php?msg=1");
                        }
                    }
                    /*************************************** FIN BREAK 1 ****************************************/
                    break;

                case 2: // Accion 2 -- Control de Bienes Salida
                    /*************************************** INICIO CASE 2 ****************************************/
                    if (isset($_POST)) {
                        $fecha_creacion = date("Y-m-d H:i:s");
                        $personal_usuario = pg_escape_string($dbconn, $_POST['personal_usuario'] ?? ($_SESSION['personal_cedula'] ?? ''));
                        $grupo_personal_id = intval($_POST['grupo_personal_id'] ?? 0);
                        if ($grupo_personal_id <= 0) {
                            $q_pg = pg_query($dbconn, "SELECT id FROM public.personal_grupos_guardia ORDER BY id DESC LIMIT 1");
                            if ($q_pg && pg_num_rows($q_pg) > 0) {
                                $r_pg = pg_fetch_assoc($q_pg);
                                $grupo_personal_id = intval($r_pg['id']);
                            }
                            if ($grupo_personal_id <= 0) $grupo_personal_id = 1;
                        }

                        $materiales_id = '';
                        if (isset($_POST['materiales_recibe']) && is_array($_POST['materiales_recibe'])) {
                            $materiales_id = implode(', ', array_map('intval', $_POST['materiales_recibe']));
                        }
                        $materiales_entrega = pg_escape_string($dbconn, $materiales_id);

                        // Asigna valores a variables requeridas en la tabla de bitacora
                        $nombre_esquema = 'Control de Bienes Salida Guardia';
                        $nombre_tabla = 'control_bienes';
                        $proceso = 'Insertar';
                        $valor_nuevo = "$grupo_personal_id, $materiales_entrega";

                        // Inserta nuevo registro en tabla "control_bienes"
                        $control_pg = "INSERT INTO public.control_bienes(fecha_creacion, grupo_personal_id, materiales_entrega) 
                        VALUES ('$fecha_creacion', $grupo_personal_id, '$materiales_entrega')";

                        $result = pg_query($dbconn, $control_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error($dbconn));

                        // Inserta nuevo registro en tabla "bitacora"
                        $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) 
                        VALUES ('$personal_usuario', '$nombre_esquema', '$nombre_tabla', '$proceso', '$valor_nuevo', '$fecha_creacion')";

                        if (pg_query($dbconn, $bitacora_obs_pg)) {
                            ?>
                            <script type="text/javascript">
                                alert("¡Control de bienes registrado con ÉXITO!");
                                window.location="supervisor/cierre_guardia.php";
                            </script>
                            <?php
                        } else {
                            header("Location: supervisor/control_bienes_e.php");
                        }
                    }
                    /**************************************** FIN BREAK 2 ***************************************/
                    break;

                case 3: // Accion 3 -- Cierre de Guardia
                    /*************************************** INICIO CASE 3 ****************************************/
                    if (isset($_POST)) {
                        $fecha_fin_g = date("Y-m-d H:i:s");
                        $cierre_g = pg_escape_string($dbconn, strtoupper($_POST['cierre_g'] ?? ''));
                        $grupos_guardia_id = intval($_POST['grupos_guardia_id'] ?? 0);
                        if ($grupos_guardia_id <= 0) {
                            $q_gg = pg_query($dbconn, "SELECT grupos_guardia_id FROM public.personal_grupos_guardia ORDER BY id DESC LIMIT 1");
                            if ($q_gg && pg_num_rows($q_gg) > 0) {
                                $r_gg = pg_fetch_assoc($q_gg);
                                $grupos_guardia_id = intval($r_gg['grupos_guardia_id']);
                            }
                            if ($grupos_guardia_id <= 0) $grupos_guardia_id = 1;
                        }

                        $usuario_salida_id = intval($_POST['usuario_salida_id'] ?? ($_SESSION['personal_cedula'] ?? 0));
                        $control_bienes_id = intval($_POST['control_bienes_id'] ?? 0);
                        if ($control_bienes_id <= 0) {
                            $q_cb = pg_query($dbconn, "SELECT id FROM public.control_bienes ORDER BY id DESC LIMIT 1");
                            if ($q_cb && pg_num_rows($q_cb) > 0) {
                                $r_cb = pg_fetch_assoc($q_cb);
                                $control_bienes_id = intval($r_cb['id']);
                            }
                            if ($control_bienes_id <= 0) $control_bienes_id = 1;
                        }

                        // Asigna valores a variables requeridas en la tabla de bitacora
                        $nombre_esquema = 'Cierre de guardia';
                        $nombre_tabla = 'guardias';
                        $proceso = 'Insertar';
                        $valor_nuevo = "$grupos_guardia_id, $cierre_g";

                        // Actualizar la guardia que estaba abierta en el sistema
                        $update_g_abierta = "UPDATE public.guardias SET fecha_fin_g = '$fecha_fin_g', cierre_g = '$cierre_g', usuario_salida_id = $usuario_salida_id WHERE fecha_fin_g IS NULL";
                        @pg_query($dbconn, $update_g_abierta);

                        // INSERTAMOS registro de cierre en la tabla "guardias"
                        $registro_pg = "INSERT INTO public.guardias(fecha_fin_g, cierre_g, grupos_guardia_id, usuario_salida_id, control_bienes_id) 
                        VALUES ('$fecha_fin_g', '$cierre_g', $grupos_guardia_id, $usuario_salida_id, $control_bienes_id)";

                        $result = pg_query($dbconn, $registro_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error($dbconn));

                        // Actualizar último registro en tabla "personal_grupos_guardia"
                        $ultimo1 = pg_query($dbconn, "SELECT id FROM public.personal_grupos_guardia WHERE fecha_asig=(SELECT MAX(fecha_asig) FROM public.personal_grupos_guardia)");
                        $reg_id = ($ultimo1 && pg_num_rows($ultimo1) > 0) ? pg_fetch_assoc($ultimo1) : null;
                        $id_pg = intval($reg_id['id'] ?? 0);
                        if ($id_pg > 0) {
                            $update_guardia = "UPDATE public.personal_grupos_guardia SET fecha_fin = '$fecha_fin_g' WHERE id = $id_pg";
                            @pg_query($dbconn, $update_guardia);
                        }

                        // Inserta nuevo registro en tabla "bitacora"
                        $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) 
                        VALUES ('$usuario_salida_id', '$nombre_esquema', '$nombre_tabla', '$proceso', '$valor_nuevo', '$fecha_fin_g')";

                        if (pg_query($dbconn, $bitacora_obs_pg)) {
                            ?>
                            <script type="text/javascript">
                                alert("¡Cierre de guardia registrado con ÉXITO!");
                                window.location="cookie/logout.php";
                            </script>
                            <?php
                        } else {
                            header("Location: supervisor/cierre_guardia.php?msg=6");
                        }
                    }
                    /*************************************** FIN BREAK 3 ****************************************/
                    break;

                default:
                    break;
            }
        }
    }
}
pg_close($dbconn);
?>
