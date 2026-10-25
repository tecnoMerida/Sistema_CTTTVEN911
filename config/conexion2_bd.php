<?php
// ============================================================================
// Conexión a los datos históricos del "Sistema 171" (solicitud, motivos_hijos,
// motivos_padre, 171_usuarioz, sector, amigo171, contacto_amigo, etc.).
//
// Antes estaban en MySQL (ven911_2025 / 911a2021). Se migraron a PostgreSQL,
// esquema "historico" de la base principal ven911
// (ver database/migrar_mysql_a_postgres.php).
//
// Se abre una conexión aparte con search_path = historico, public para que las
// consultas existentes sin esquema sigan encontrando sus tablas; las tablas
// del libro digital se consultan con el prefijo public.
// Se mantienen $conexion2 y $mysql por compatibilidad con el código existente.
// ============================================================================

require_once __DIR__ . '/conexion1.php';

$conexion2 = pg_connect($conn_string, PGSQL_CONNECT_FORCE_NEW)
    or die("Error al conectar con la base de datos! pg historico");

pg_query($conexion2, "SET search_path TO historico, public");

// Alias para compatibilidad con código existente
$mysql = $conexion2;
?>
