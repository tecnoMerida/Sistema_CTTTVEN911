<?php
// ============================================================================
// Conexión Flexible y Segura a Base de Datos MySQL / MariaDB (PHP 8.1+ Compatible)
// Tablas operativas: solicitud, amigo171, contacto_amigo, etc.
// Compatible con servidor local XAMPP y servidor Debian 5 histórico (192.168.2.252)
// ============================================================================

// Desactivar reporte estricto de excepciones de mysqli para evitar Fatal Error en PHP 8.1+ si MySQL está apagado
if (function_exists('mysqli_report')) {
    @mysqli_report(MYSQLI_REPORT_OFF);
}

$host_mysql = defined('HOSTMYSQL') ? HOSTMYSQL : '127.0.0.1';
$user_mysql = defined('USERMYSQL') ? USERMYSQL : 'root';
$pass_mysql = defined('PASSWORDMYSQL') ? PASSWORDMYSQL : '';
$db_mysql   = defined('DATABASEMYSQL') ? DATABASEMYSQL : '911a2021';

$conexion2 = false;

// 1. Intentar conexión primaria
try {
    $conexion2 = @mysqli_connect($host_mysql, $user_mysql, $pass_mysql, $db_mysql);
} catch (Throwable $e) {
    $conexion2 = false;
}

// 2. Si falló y el host configurado era remoto, intentar con localhost XAMPP
if (!$conexion2 && $host_mysql !== '127.0.0.1' && $host_mysql !== 'localhost') {
    try {
        $conexion2 = @mysqli_connect('127.0.0.1', 'root', '', $db_mysql);
        if (!$conexion2) {
            $conexion2 = @mysqli_connect('127.0.0.1', 'root', '', 'ven911_2025');
        }
    } catch (Throwable $e) {
        $conexion2 = false;
    }
}

// 3. Si falló con localhost, intentar con el servidor Debian remoto histórico
if (!$conexion2) {
    try {
        $conexion2 = @mysqli_connect('192.168.2.252', 'sistema1', 'sistema12021', '911a2021');
    } catch (Throwable $e) {
        $conexion2 = false;
    }
}

// 4. Configurar codificación UTF-8 si la conexión fue exitosa
if ($conexion2) {
    @mysqli_set_charset($conexion2, 'utf8');
}

// Variable alias $mysql para compatibilidad con código existente
$mysql = $conexion2;
?>
