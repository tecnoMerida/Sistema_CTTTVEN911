<?php
	// Credenciales locales (no versionadas): tienen prioridad sobre las de abajo
	if (file_exists(__DIR__ . '/conexion_local.php')) {
		require_once __DIR__ . '/conexion_local.php';
	}
	defined("HOST") || define("HOST", "127.0.0.1");
	defined("HOSTMYSQL") || define("HOSTMYSQL", "192.168.2.252");
	defined("PORT") || define("PORT", "5432");
	defined("USER") || define("USER", "postgres");
	defined("USERMYSQL") || define("USERMYSQL", "sistema1");
	defined("PASSWORD") || define("PASSWORD", "XTAE5qxIn4o");
	defined("PASSWORDMYSQL") || define("PASSWORDMYSQL", "sistema12021");
	defined("DATABASE") || define("DATABASE", "ven911_2025");
	defined("DATABASEMYSQL") || define("DATABASEMYSQL", "911a2021");
	
?>

