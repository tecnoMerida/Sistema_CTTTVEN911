<?php
// Conexion a la base de datos EXTERNA del sistema "Emergencias 911" (MySQL).
// Si el servidor no responde en 3 segundos, $conexion2 y $mysql quedan en false
// y cada pagina muestra un aviso en lugar de detenerse con un error fatal.
include_once __DIR__ . '/config_bd.php';

mysqli_report(MYSQLI_REPORT_OFF);

$conexion2 = mysqli_init();
mysqli_options($conexion2, MYSQLI_OPT_CONNECT_TIMEOUT, 3);
if (!@mysqli_real_connect($conexion2, HOSTMYSQL, USERMYSQL, PASSWORDMYSQL, DATABASEMYSQL)) {
	$conexion2 = false;
}
$mysql = $conexion2;
?>
