<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexion con la base de datos
require_once '../config/conexion1.php';

$contador = $_COOKIE['contador'] ?? '';
$contador1 = $_COOKIE['contador1'] ?? '';
$fecha = $_COOKIE['fecha'] ?? '';
$usuario = $_COOKIE['usuario'] ?? ($_SESSION['usuario'] ?? '');
$usuario1 = $_COOKIE['usuario1'] ?? '';

if (!empty($usuario) && isset($dbconn) && $dbconn) {
    $consulta_usuario = pg_query($dbconn, "SELECT * FROM public.usuario WHERE usuario = '$usuario' ");
    if ($consulta_usuario && ($registro = pg_fetch_array($consulta_usuario))) {
        // Valores asignados a la "Bitacora"
        $usuario_session = $registro['personal_cedula'] ?? '';
        $fecha_actual = date("Y/m/d | H:i:s ");
        $nombre_esquema = 'CIERRE DE SESSION';
        $nombre_tabla = 'USUARIO';
        $proceso = 'VALIDAR'; 
        $valor_nuevo = ($registro['id'] ?? '') . ', ' . ($registro['usuario'] ?? '') . ', ' . ($registro['tipo_rol_id'] ?? '') . ', ' . ($registro['estado_usuario_id'] ?? '') . ', ' . ($registro['personal_cedula'] ?? '') . ', ' . $fecha_actual;

        $bitacora_session = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_session','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_actual')";

        @pg_query($dbconn, $bitacora_session);
    }
}

// Valores contenidos en las COOKIES  
setcookie('contador', '', time() - 360, '/');
setcookie('contador1', '', time() - 360, '/');
setcookie('fecha', '', time() - 86300, '/');
setcookie('usuario', '', time() - 86300, '/');
setcookie('usuario1', '', time() - 86300, '/');

// Borra todas las variables de sesión 
$_SESSION = array(); 

// Borra la cookie que almacena la sesión 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruye la sesión 
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>
	 <script>
    window.location="../index.php";
    </script>
