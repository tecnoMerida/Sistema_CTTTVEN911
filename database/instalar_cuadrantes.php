<?php
// Script de Instalación / Migración de Cuadrantes de Paz
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/conexion1.php';

$sql_path = __DIR__ . '/cuadrantes_de_paz.sql';
if (!file_exists($sql_path)) {
    die("Archivo SQL no encontrado: $sql_path\n");
}

$sql = file_get_contents($sql_path);
$res = @pg_query($dbconn, $sql);

if ($res) {
    $count_res = pg_query($dbconn, "SELECT COUNT(*) as total FROM public.cuadrantes_de_paz");
    $total = pg_fetch_assoc($count_res)['total'] ?? 0;
    
    $usuario_app = $_SESSION['usuario'] ?? 'SISTEMA';
    @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('" . pg_escape_string($dbconn, $usuario_app) . "', 'PUBLIC', 'CUADRANTES_DE_PAZ', 'MIGRACION', 'Se instalaron exitosamente $total cuadrantes de paz oficiales', NOW())");
    
    echo "¡Éxito! Se han importado e instalado exitosamente $total Cuadrantes de Paz en la base de datos PostgreSQL ven911.\n";
} else {
    echo "Error al ejecutar migración: " . pg_last_error($dbconn) . "\n";
}
