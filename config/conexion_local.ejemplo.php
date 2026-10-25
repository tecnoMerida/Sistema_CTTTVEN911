<?php
// ============================================================================
// Plantilla de credenciales locales.
// Copiar como config/conexion_local.php y completar. Ese archivo esta en
// .gitignore: las claves de cada equipo no se suben al repositorio.
// Si conexion_local.php no existe, el sistema usa la configuracion original.
// ============================================================================

// PostgreSQL (base principal: ven911) - usado por config/conexion1.php
define("HOST", "127.0.0.1");
define("PORT", "5432");
define("USER", "usuario_postgres");
define("PASSWORD", "clave_postgres");
define("DATABASE", "ven911");

// MySQL / MariaDB: solo lo usa database/migrar_mysql_a_postgres.php para
// copiar los datos historicos a PostgreSQL. El sistema ya no se conecta a MySQL.
define("HOSTMYSQL", "127.0.0.1");
define("USERMYSQL", "usuario_mysql");
define("PASSWORDMYSQL", "clave_mysql");
define("DATABASEMYSQL", "ven911_2025");
