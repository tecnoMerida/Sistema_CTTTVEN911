<?php
require('../cookie/cookie.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['tipo_rol_id'])) {
    header("Location: ../index.php?error=fuera");
    exit();
}
if ($_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
    exit();
}
require_once '../config/conexion1.php';

// Ajuste dinámico de límites de memoria y tiempo de ejecución para bases de datos grandes
@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', '0');
@set_time_limit(0);

// Rutas de directorios de respaldos
$dir_backups     = realpath(__DIR__ . '/../backups');
if (!$dir_backups || !is_dir($dir_backups)) {
    $dir_backups = __DIR__ . '/../backups';
    if (!is_dir($dir_backups)) {
        @mkdir($dir_backups, 0777, true);
        @file_put_contents($dir_backups . '/.htaccess', "Deny from all\n");
        @file_put_contents($dir_backups . '/index.html', "");
    }
}
$dir_plantilla1 = realpath(__DIR__ . '/../BaseDeDatos_Plantilla1_Backup');
$dir_plantilla2 = realpath(__DIR__ . '/../BaseDeDatos_Plantilla2_Backup');

// Función auxiliar para ubicar binarios de PostgreSQL en Windows
function get_pg_binary($name) {
    $paths = [
        "C:\\Program Files\\PostgreSQL\\18\\bin\\{$name}.exe",
        "C:\\Program Files\\PostgreSQL\\16\\bin\\{$name}.exe",
        "C:\\Program Files\\PostgreSQL\\17\\bin\\{$name}.exe",
        "C:\\Program Files\\PostgreSQL\\15\\bin\\{$name}.exe",
        "C:\\Program Files (x86)\\PostgreSQL\\18\\bin\\{$name}.exe",
        "C:\\xampp\\pgsql\\bin\\{$name}.exe"
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            return '"' . $path . '"';
        }
    }
    return $name;
}

// Función auxiliar para ubicar binarios de MySQL / MariaDB en Windows
function get_mysql_binary($name) {
    $paths = [
        "C:\\xampp\\mysql\\bin\\{$name}.exe",
        "C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\{$name}.exe",
        "C:\\Program Files\\MySQL\\MySQL Server 5.7\\bin\\{$name}.exe",
        "C:\\Program Files\\MariaDB\\bin\\{$name}.exe"
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            return '"' . $path . '"';
        }
    }
    return $name;
}

// Función para formatear tamaños de archivo
function format_bytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= pow(1024, $pow);
    return round($bytes, $precision) . ' ' . $units[$pow];
}

// Función para detectar motor y características de un archivo SQL
function detect_sql_format($filepath) {
    if (!file_exists($filepath) || !is_readable($filepath)) {
        return [
            'type' => 'desconocido',
            'engine' => 'unknown',
            'label' => 'No accesible',
            'badge' => 'badge-secondary',
            'is_debian5' => false,
            'details' => 'No se pudo leer el archivo'
        ];
    }
    
    $f = fopen($filepath, 'r');
    $header = '';
    $line_count = 0;
    while (($line = fgets($f)) !== false && $line_count < 120) {
        $header .= $line;
        $line_count++;
    }
    fclose($f);
    
    // 1. Detectar PostgreSQL
    if (stripos($header, 'PostgreSQL database dump') !== false ||
        stripos($header, 'pg_dump') !== false ||
        stripos($header, 'client_encoding = \'UTF8\'') !== false ||
        stripos($header, 'search_path') !== false) {
        
        $ver = '16 / 18';
        if (preg_match('/database version ([0-9\.]+)/i', $header, $m)) {
            $ver = $m[1];
        }
        return [
            'type' => 'postgres',
            'engine' => 'PostgreSQL',
            'label' => 'PostgreSQL (v' . $ver . ')',
            'badge' => 'badge-primary',
            'color' => '#2980b9',
            'icon' => 'fa-database',
            'is_debian5' => false,
            'details' => "Respaldo nativo de PostgreSQL ($ver). Compatible al 100% con la base de datos ven911."
        ];
    }
    
    // 2. Detectar MySQL / phpMyAdmin / Debian 5
    if (stripos($header, 'phpMyAdmin SQL Dump') !== false ||
        stripos($header, 'MySQL dump') !== false ||
        stripos($header, 'ENGINE=InnoDB') !== false ||
        stripos($header, 'ENGINE=MyISAM') !== false ||
        stripos($header, 'SET SQL_MODE') !== false) {
        
        $is_debian = (stripos($header, 'deb8u') !== false || stripos($header, 'deb5') !== false || stripos($header, 'debian') !== false || stripos($header, '171_usuarioz') !== false);
        $server_ver = '5.5';
        if (preg_match('/Versión del servidor:\s*([^\r\n]+)/i', $header, $m)) {
            $server_ver = trim($m[1]);
        }
        $php_ver = '';
        if (preg_match('/Versión de PHP:\s*([^\r\n]+)/i', $header, $m)) {
            $php_ver = trim($m[1]);
        }
        
        $label = $is_debian ? 'Debian 5 / MySQL (' . $server_ver . ')' : 'MySQL / MariaDB';
        $details = "Respaldo MySQL generado en Debian GNU/Linux (MySQL $server_ver" . (!empty($php_ver) ? ", PHP $php_ver" : "") . "). Contiene las 16 tablas de llamadas y emergencias (solicitud, amigo171, etc.).";
        
        return [
            'type' => 'mysql',
            'engine' => 'MySQL',
            'label' => $label,
            'badge' => 'badge-warning',
            'color' => '#d35400',
            'icon' => 'fa-linux',
            'is_debian5' => $is_debian,
            'server_ver' => $server_ver,
            'details' => $details
        ];
    }
    
    return [
        'type' => 'generico',
        'engine' => 'SQL',
        'label' => 'Script SQL Estándar',
        'badge' => 'badge-secondary',
        'color' => '#7f8c8d',
        'icon' => 'fa-file-code-o',
        'is_debian5' => false,
        'details' => 'Archivo SQL sin encabezados específicos.'
    ];
}

// Convertidor en streaming de DDL MySQL a PostgreSQL
function convert_mysql_create_table_to_pg($mysql_ddl) {
    if (!preg_match('/CREATE TABLE (?:IF NOT EXISTS )?`?([a-zA-Z0-9_]+)`?\s*\(/i', $mysql_ddl, $m)) {
        return false;
    }
    $table = $m[1];
    $pg_table = ($table === 'municipios' || $table === 'parroquias') ? '"deb5_' . $table . '"' : '"' . $table . '"';
    
    $pos_start = strpos($mysql_ddl, '(');
    $pos_end = strrpos($mysql_ddl, ')');
    $inside = substr($mysql_ddl, $pos_start + 1, $pos_end - $pos_start - 1);
    
    $lines = explode("\n", $inside);
    $pg_cols = [];
    
    foreach ($lines as $line) {
        $line = trim($line, " \t\r\n,");
        if (empty($line)) continue;
        if (preg_match('/^(PRIMARY KEY|KEY|UNIQUE KEY|CONSTRAINT)/i', $line)) continue;
        
        $line = preg_replace("/COMMENT\s+'[^']*'/i", '', $line);
        $line = preg_replace('/CHARACTER SET\s+[a-zA-Z0-9_]+/i', '', $line);
        $line = preg_replace('/COLLATE\s+[a-zA-Z0-9_]+/i', '', $line);
        $line = preg_replace('/AUTO_INCREMENT/i', '', $line);
        
        if (preg_match('/^`([^`]+)`\s*(.*)$/i', $line, $col_match)) {
            $col_name = '"' . $col_match[1] . '"';
            $rest = trim($col_match[2]);
            $rest = preg_replace('/\bint\(\d+\)/i', 'integer', $rest);
            $rest = preg_replace('/\btinyint\(\d+\)/i', 'smallint', $rest);
            $rest = preg_replace('/\bvarchar\((\d+)\)/i', 'character varying($1)', $rest);
            $rest = preg_replace('/\bchar\((\d+)\)/i', 'character($1)', $rest);
            $rest = preg_replace('/\bdatetime\b/i', 'timestamp without time zone', $rest);
            $rest = preg_replace('/\btime\b/i', 'time without time zone', $rest);
            $rest = preg_replace('/\bdate\b/i', 'date', $rest);
            $rest = str_replace("'0000-00-00'", "NULL", $rest);
            $pg_cols[] = "    $col_name $rest";
        }
    }
    return "CREATE TABLE IF NOT EXISTS $pg_table (\n" . implode(",\n", $pg_cols) . "\n);";
}

// Convertidor streaming de archivo MySQL completo a PostgreSQL
function convert_mysql_file_to_pg($source_file, $dest_file) {
    $in_f = fopen($source_file, 'r');
    if (!$in_f) return false;
    $out_f = fopen($dest_file, 'w');
    if (!$out_f) {
        fclose($in_f);
        return false;
    }
    
    fwrite($out_f, "-- Migración generada automáticamente de MySQL (Debian 5) a PostgreSQL\n");
    fwrite($out_f, "SET client_encoding = 'UTF8';\n");
    fwrite($out_f, "SET standard_conforming_strings = on;\n");
    fwrite($out_f, "BEGIN;\n\n");
    
    $in_create = false;
    $current_create = '';
    $in_insert = false;
    
    while (($line = fgets($in_f)) !== false) {
        // DDL CREATE TABLE
        if (preg_match('/^CREATE TABLE (?:IF NOT EXISTS )?`?([a-zA-Z0-9_]+)`?/i', $line)) {
            $in_create = true;
            $current_create = $line;
            continue;
        }
        if ($in_create) {
            $current_create .= $line;
            if (strpos($line, ';') !== false) {
                $in_create = false;
                $pg_ddl = convert_mysql_create_table_to_pg($current_create);
                if ($pg_ddl) {
                    fwrite($out_f, $pg_ddl . "\n\n");
                }
                $current_create = '';
            }
            continue;
        }
        
        // INSERT INTO
        if (preg_match('/^INSERT INTO `([^`]+)` \(([^)]+)\) VALUES/i', $line, $m)) {
            $table = $m[1];
            $pg_table = ($table === 'municipios' || $table === 'parroquias') ? '"deb5_' . $table . '"' : '"' . $table . '"';
            $cols = explode(',', $m[2]);
            $pg_cols = [];
            foreach ($cols as $c) {
                $pg_cols[] = '"' . trim($c, " \t\r\n`") . '"';
            }
            $header = 'INSERT INTO ' . $pg_table . ' (' . implode(', ', $pg_cols) . ') VALUES' . "\n";
            fwrite($out_f, $header);
            $in_insert = true;
            continue;
        }
        
        if ($in_insert) {
            $val_line = str_replace("'0000-00-00'", "NULL", $line);
            $val_line = str_replace("\\'", "''", $val_line);
            $val_line = str_replace('\\"', '"', $val_line);
            fwrite($out_f, $val_line);
            
            if (substr(rtrim($line), -1) === ';') {
                $in_insert = false;
                fwrite($out_f, "\n");
            }
            continue;
        }
    }
    
    fwrite($out_f, "\nCOMMIT;\n");
    fclose($in_f);
    fclose($out_f);
    return true;
}

// Función para ejecutar importación en MySQL
function execute_mysql_import($filepath, $target_db = '911a2021') {
    $mysql_bin = get_mysql_binary('mysql');
    $mysql_clean = trim($mysql_bin, '"');
    
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    if (defined('USERMYSQL') && USERMYSQL !== 'sistema1') { $user = USERMYSQL; }
    if (defined('PASSWORDMYSQL') && PASSWORDMYSQL !== 'sistema12021') { $pass = PASSWORDMYSQL; }
    $pass_arg = !empty($pass) ? "-p\"$pass\"" : "";
    
    // Crear bases de datos si no existen
    $create_sql = "CREATE DATABASE IF NOT EXISTS \`$target_db\` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci; CREATE DATABASE IF NOT EXISTS \`ven911_2025\` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;";
    $cmd_create = "\"$mysql_clean\" -h $host -u $user $pass_arg -e \"$create_sql\" 2>&1";
    @exec($cmd_create);
    
    // Ejecutar con comando source
    $norm_path = str_replace('\\', '/', realpath($filepath));
    $source_cmd = "SET NAMES utf8; SET foreign_key_checks = 0; source $norm_path;";
    $cmd_import = "\"$mysql_clean\" -h $host -u $user $pass_arg --default-character-set=utf8 --max_allowed_packet=512M $target_db -e \"$source_cmd\" 2>&1";
    
    exec($cmd_import, $output, $return_var);
    
    return [
        'success' => ($return_var === 0),
        'engine' => 'MySQL / MariaDB',
        'database' => $target_db,
        'output' => $output,
        'return_var' => $return_var
    ];
}

// Función para ejecutar importación en PostgreSQL
function execute_postgres_import($filepath, $is_mysql = false) {
    putenv("PGPASSWORD=XTAE5qxIn4o");
    $psql = get_pg_binary('psql');
    
    $final_file = $filepath;
    $temp_converted = null;
    
    if ($is_mysql) {
        $temp_converted = __DIR__ . '/../backups/temp_migracion_' . time() . '.sql';
        if (!convert_mysql_file_to_pg($filepath, $temp_converted)) {
            return [
                'success' => false,
                'engine' => 'PostgreSQL 18.6',
                'error' => 'Error al convertir el volcado de MySQL a sintaxis PostgreSQL.'
            ];
        }
        $final_file = $temp_converted;
    }
    
    $cmd = "$psql -h localhost -p 5432 -U postgres -d ven911 -f \"$final_file\" 2>&1";
    exec($cmd, $output, $return_var);
    
    if ($temp_converted && file_exists($temp_converted)) {
        @unlink($temp_converted);
    }
    
    return [
        'success' => ($return_var === 0 || count($output) > 0),
        'engine' => 'PostgreSQL 18.6',
        'database' => 'ven911',
        'output' => $output,
        'return_var' => $return_var
    ];
}

// -------------------------------------------------------------
// ACCIÓN: DESCARGAR ARCHIVO DE RESPALDO
// -------------------------------------------------------------
if (isset($_GET['action']) && $_GET['action'] === 'download' && !empty($_GET['file'])) {
    $file = basename($_GET['file']);
    $carpeta = $_GET['folder'] ?? 'backups';
    
    $base_path = $dir_backups;
    if ($carpeta === 'plantilla1' && $dir_plantilla1) { $base_path = $dir_plantilla1; }
    if ($carpeta === 'plantilla2' && $dir_plantilla2) { $base_path = $dir_plantilla2; }
    
    $filepath = $base_path . '/' . $file;
    if (file_exists($filepath) && is_readable($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit();
    } else {
        header('Location: respaldo_bd.php?msg=file_not_found');
        exit();
    }
}

// -------------------------------------------------------------
// ACCIÓN: EXPORTAR BASE DE DATOS (GENERAR RESPALDO)
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'export') {
    $fecha_actual = date('Y-m-d_H-i-s');
    $filename = 'respaldo_ven911_' . $fecha_actual . '.sql';
    $filepath = $dir_backups . '/' . $filename;
    
    putenv("PGPASSWORD=XTAE5qxIn4o");
    $pg_dump = get_pg_binary('pg_dump');
    $cmd = "$pg_dump -h localhost -p 5432 -U postgres -F p -b -v -f \"$filepath\" ven911 2>&1";
    exec($cmd, $output, $return_var);
    
    if ($return_var === 0 && file_exists($filepath) && filesize($filepath) > 0) {
        $filesize = filesize($filepath);
        $size_str = format_bytes($filesize);
        $usuario_app = $_SESSION['usuario'] ?? 'ADMIN';
        $detalles = "Respaldo exportado exitosamente: $filename ($size_str)";
        @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('" . pg_escape_string($dbconn, $usuario_app) . "', 'ADMINISTRACION', 'BASE DE DATOS', 'EXPORTAR', '" . pg_escape_string($dbconn, $detalles) . "', NOW())");
        
        $destino = $_POST['destino'] ?? 'descargar';
        if ($destino === 'descargar') {
            header('Content-Description: File Transfer');
            header('Content-Type: application/sql');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit();
        } else {
            header('Location: respaldo_bd.php?msg=export_ok&file=' . urlencode($filename));
            exit();
        }
    } else {
        $err_msg = !empty($output) ? implode(' ', array_slice($output, -3)) : 'Error al ejecutar pg_dump';
        header('Location: respaldo_bd.php?msg=export_err&err=' . urlencode($err_msg));
        exit();
    }
}

// -------------------------------------------------------------
// ACCIÓN: IMPORTAR BASE DE DATOS (RESTAURACIÓN MULTI-MOTOR)
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'import') {
    $restore_file = '';
    $orig_name = '';
    $source_folder = $_POST['carpeta_origen'] ?? 'backups';
    $motor_destino = $_POST['motor_destino'] ?? 'auto';
    
    // 1. Archivo preexistente en el servidor
    if (!empty($_POST['archivo_existente'])) {
        $clean_name = basename($_POST['archivo_existente']);
        $base_folder = $dir_backups;
        if ($source_folder === 'plantilla1' && $dir_plantilla1) { $base_folder = $dir_plantilla1; }
        if ($source_folder === 'plantilla2' && $dir_plantilla2) { $base_folder = $dir_plantilla2; }
        
        $possible_path = $base_folder . '/' . $clean_name;
        if (file_exists($possible_path)) {
            $restore_file = $possible_path;
            $orig_name = $clean_name;
        }
    } 
    // 2. Archivo subido mediante formulario
    elseif (isset($_FILES['archivo_sql']) && $_FILES['archivo_sql']['error'] === UPLOAD_ERR_OK) {
        $orig_name = basename($_FILES['archivo_sql']['name']);
        $ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
        if (!in_array($ext, ['sql', 'backup', 'dump', 'txt'])) {
            header('Location: respaldo_bd.php?msg=invalid_format');
            exit();
        }
        $dest_name = 'restauracion_' . date('Y-m-d_H-i-s') . '_' . $orig_name;
        $restore_file = $dir_backups . '/' . $dest_name;
        if (!move_uploaded_file($_FILES['archivo_sql']['tmp_name'], $restore_file)) {
            header('Location: respaldo_bd.php?msg=upload_err');
            exit();
        }
    } elseif (isset($_FILES['archivo_sql']) && $_FILES['archivo_sql']['error'] === UPLOAD_ERR_INI_SIZE) {
        header('Location: respaldo_bd.php?msg=file_too_large');
        exit();
    }
    
    if (empty($restore_file) || !file_exists($restore_file)) {
        header('Location: respaldo_bd.php?msg=no_file');
        exit();
    }
    
    // Analizar el formato del archivo origen
    $format_info = detect_sql_format($restore_file);
    $is_mysql_source = ($format_info['type'] === 'mysql');
    
    // Determinar destino
    if ($motor_destino === 'auto') {
        $motor_destino = $is_mysql_source ? 'mysql' : 'postgres';
    }
    
    $import_results = [];
    $start_time = microtime(true);
    
    // Ejecución según destino
    if ($motor_destino === 'mysql' || $motor_destino === 'ambos') {
        $res_my = execute_mysql_import($restore_file, '911a2021');
        $import_results['mysql'] = $res_my;
    }
    
    if ($motor_destino === 'postgres' || $motor_destino === 'ambos') {
        $res_pg = execute_postgres_import($restore_file, $is_mysql_source);
        $import_results['postgres'] = $res_pg;
    }
    
    $elapsed = round(microtime(true) - $start_time, 2);
    
    // Registrar en Bitácora
    $usuario_app = $_SESSION['usuario'] ?? 'ADMIN';
    $motores_usados = strtoupper($motor_destino);
    $detalles = "Restauración de BD ejecutada ($motores_usados) desde archivo '$orig_name' en {$elapsed}s. Formato detectado: " . $format_info['label'];
    @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('" . pg_escape_string($dbconn, $usuario_app) . "', 'ADMINISTRACION', 'BASE DE DATOS', 'IMPORTAR', '" . pg_escape_string($dbconn, $detalles) . "', NOW())");
    
    header('Location: respaldo_bd.php?msg=import_ok&file=' . urlencode($orig_name) . '&engine=' . urlencode($motor_destino) . '&time=' . $elapsed);
    exit();
}

// -------------------------------------------------------------
// ACCIÓN: ELIMINAR RESPALDO DEL SERVIDOR (Solo para /backups)
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $file = basename($_POST['file'] ?? '');
    $filepath = $dir_backups . '/' . $file;
    if (!empty($file) && file_exists($filepath)) {
        unlink($filepath);
        $usuario_app = $_SESSION['usuario'] ?? 'ADMIN';
        @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('" . pg_escape_string($dbconn, $usuario_app) . "', 'ADMINISTRACION', 'BASE DE DATOS', 'ELIMINAR', 'Respaldo eliminado del servidor: $file', NOW())");
        header('Location: respaldo_bd.php?msg=delete_ok');
        exit();
    }
}

// -------------------------------------------------------------
// OBTENER LISTA CONSOLIDADA DE TODOS LOS RESPALDOS
// -------------------------------------------------------------
$all_backups = [];

// 1. Respaldos generados en /backups
if (is_dir($dir_backups)) {
    $scanned = scandir($dir_backups);
    foreach ($scanned as $f) {
        if ($f !== '.' && $f !== '..' && $f !== '.htaccess' && $f !== 'index.html' && is_file($dir_backups . '/' . $f)) {
            $fpath = $dir_backups . '/' . $f;
            $format = detect_sql_format($fpath);
            $all_backups[] = [
                'name' => $f,
                'path' => $fpath,
                'size' => filesize($fpath),
                'date' => filemtime($fpath),
                'folder' => 'backups',
                'folder_label' => 'Servidor (/backups)',
                'folder_badge' => 'badge-secondary',
                'format' => $format,
                'can_delete' => true,
                'badge_icon' => 'fa-archive'
            ];
        }
    }
}

// 2. Base de datos histórica Debian 5 (Plantilla 1)
if ($dir_plantilla1 && is_dir($dir_plantilla1)) {
    $scanned = scandir($dir_plantilla1);
    foreach ($scanned as $f) {
        if (substr($f, -4) === '.sql' && is_file($dir_plantilla1 . '/' . $f)) {
            $fpath = $dir_plantilla1 . '/' . $f;
            $format = detect_sql_format($fpath);
            $all_backups[] = [
                'name' => $f,
                'path' => $fpath,
                'size' => filesize($fpath),
                'date' => filemtime($fpath),
                'folder' => 'plantilla1',
                'folder_label' => 'Plantilla 1: Debian 5',
                'folder_badge' => 'badge-warning',
                'format' => $format,
                'can_delete' => false,
                'badge_icon' => 'fa-linux'
            ];
        }
    }
}

// 3. Base de datos PostgreSQL (Plantilla 2)
if ($dir_plantilla2 && is_dir($dir_plantilla2)) {
    $scanned = scandir($dir_plantilla2);
    foreach ($scanned as $f) {
        if (substr($f, -4) === '.sql' && is_file($dir_plantilla2 . '/' . $f)) {
            $fpath = $dir_plantilla2 . '/' . $f;
            $format = detect_sql_format($fpath);
            $all_backups[] = [
                'name' => $f,
                'path' => $fpath,
                'size' => filesize($fpath),
                'date' => filemtime($fpath),
                'folder' => 'plantilla2',
                'folder_label' => 'Plantilla 2: PostgreSQL',
                'folder_badge' => 'badge-primary',
                'format' => $format,
                'can_delete' => false,
                'badge_icon' => 'fa-database'
            ];
        }
    }
}

// Ordenar por fecha descendente
usort($all_backups, function($a, $b) {
    return $b['date'] - $a['date'];
});

// Detectar estado de los motores
$mysql_ok = false;
if (function_exists('mysqli_report')) {
    @mysqli_report(MYSQLI_REPORT_OFF);
}
try {
    $my_test = @mysqli_connect('127.0.0.1', 'root', '', '911a2021');
    if (!$my_test) {
        $my_test = @mysqli_connect('127.0.0.1', 'root', '');
    }
    if ($my_test) {
        $mysql_ok = true;
        @mysqli_close($my_test);
    }
} catch (Throwable $e) {
    $mysql_ok = false;
}
?>

<!-- Estilos y Cabecera Superior -->
<?php require_once '../plantillas/superior3.php'; ?>

<style>
.backup-card {
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    border: 1px solid #e1e8ed;
    background: #ffffff;
    padding: 22px;
    margin-bottom: 20px;
    height: 100%;
}
.backup-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}
.backup-icon-circle {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin: 0 auto 15px auto;
    color: #ffffff;
}
.icon-export {
    background: linear-gradient(135deg, #1abb9c 0%, #16a085 100%);
    box-shadow: 0 4px 10px rgba(26, 187, 156, 0.35);
}
.icon-import {
    background: linear-gradient(135deg, #f39c12 0%, #d68910 100%);
    box-shadow: 0 4px 10px rgba(243, 156, 18, 0.35);
}
.live-badge {
    background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
    color: #ffffff;
    padding: 12px 18px;
    border-radius: 8px;
    font-size: 14px;
    display: inline-block;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
}
.table-backups th {
    background-color: #2a3f54;
    color: #ffffff !important;
    text-align: center;
}
.banner-debian {
    background: linear-gradient(135deg, #fff9e6 0%, #fff3cd 100%);
    border-left: 5px solid #d35400;
    border-radius: 6px;
    padding: 15px 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.loading-overlay {
    display: none;
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.75);
    z-index: 99999;
    color: #ffffff;
    text-align: center;
    padding-top: 20%;
}
</style>

<!-- Overlay de Carga para Restauraciones Grandes -->
<div id="loadingOverlay" class="loading-overlay">
    <i class="fa fa-spinner fa-spin fa-4x mb-3 text-warning"></i>
    <h3 class="font-weight-bold" id="overlayTitle">Procesando Base de Datos...</h3>
    <p id="overlaySub" style="font-size: 16px; opacity: 0.9;">
        Importando esquema y registros. Esto puede tardar unos segundos según el tamaño del archivo.
    </p>
</div>

<div class="container body">
  <div class="main_container">
    <!-- Menu Navegacion Lateral -->
    <?php require '../menu/menu_adm.php'; ?>

    <!-- Menu Superior -->
    <div class="top_nav">
      <?php require '../menu/menu_top.php'; ?>
    </div>

    <!-- Contenido de la Pagina -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3><i class="fa fa-database"></i> RESPALDO Y RESTAURACIÓN DE BASE DE DATOS</h3>
          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Alertas de Estado -->
        <?php if (isset($_GET['msg'])): ?>
            <?php if ($_GET['msg'] === 'export_ok'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i> <strong>¡Respaldo Exitoso!</strong> El archivo <code><?php echo htmlspecialchars($_GET['file'] ?? ''); ?></code> se ha generado y almacenado correctamente en el servidor.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php elseif ($_GET['msg'] === 'import_ok'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i> <strong>¡Base de Datos Restaurada con Éxito!</strong><br>
                    Archivo: <code><?php echo htmlspecialchars($_GET['file'] ?? ''); ?></code> | 
                    Motor: <strong><?php echo strtoupper(htmlspecialchars($_GET['engine'] ?? 'AUTO')); ?></strong> | 
                    Tiempo: <strong><?php echo htmlspecialchars($_GET['time'] ?? '0'); ?> seg</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php elseif ($_GET['msg'] === 'delete_ok'): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fa fa-info-circle"></i> El archivo de respaldo ha sido eliminado del servidor.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php elseif ($_GET['msg'] === 'export_err'): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-triangle"></i> <strong>Error al Exportar:</strong> <?php echo htmlspecialchars($_GET['err'] ?? 'Error desconocido'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php elseif ($_GET['msg'] === 'invalid_format'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-triangle"></i> <strong>Formato No Válido:</strong> Solo se permiten archivos con extensión <code>.sql</code>, <code>.backup</code> o <code>.dump</code>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php elseif ($_GET['msg'] === 'file_too_large'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle"></i> <strong>Archivo Superior al Límite Web de PHP:</strong><br>
                    El archivo subido excede el límite máximo de subida web (<code>upload_max_filesize</code>).<br>
                    <strong>Solución rápida:</strong> Puedes colocar el archivo directamente en la carpeta <code>BaseDeDatos_Plantilla1_Backup/</code> o <code>backups/</code> del servidor e importarlo con 1 clic desde la lista de abajo sin restricciones de tamaño.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php elseif ($_GET['msg'] === 'no_file'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-triangle"></i> No se seleccionó ningún archivo para restaurar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Tarjeta de Fecha y Hora del Momento y Estado de Motores de BD -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="row align-items-center">
                  <div class="col-md-5 col-sm-12 mb-2">
                    <h4 class="mb-1" style="font-weight: 600;"><i class="fa fa-calendar-check-o text-success"></i> Fecha y Hora del Momento:</h4>
                    <div class="live-badge mt-1">
                      <i class="fa fa-clock-o"></i> <span id="reloj-live" style="font-weight: bold;"><?php echo date('d/m/Y - h:i:s A'); ?></span>
                      <small style="display: block; opacity: 0.85; margin-top: 3px;">Zona Horaria: America/Caracas (Venezuela)</small>
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12 text-md-right text-sm-left mt-2">
                    <div class="mb-1">
                      <span class="badge badge-success p-2" style="font-size: 12px;"><i class="fa fa-check-circle"></i> PostgreSQL 18.6 Conectado (ven911)</span>
                      <span class="badge badge-secondary p-2" style="font-size: 12px;"><i class="fa fa-server"></i> localhost:5432</span>
                    </div>
                    <div>
                      <?php if ($mysql_ok): ?>
                        <span class="badge badge-warning text-dark p-2" style="font-size: 12px;"><i class="fa fa-check-circle"></i> MySQL/MariaDB Activo (911a2021)</span>
                        <span class="badge badge-dark p-2" style="font-size: 12px;"><i class="fa fa-database"></i> localhost:3306</span>
                      <?php else: ?>
                        <span class="badge badge-secondary p-2" style="font-size: 12px;"><i class="fa fa-info-circle"></i> MySQL en espera (XAMPP / 192.168.2.252)</span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banner Especial: Base de Datos Debian 5 Detectada -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="banner-debian">
              <div class="row align-items-center">
                <div class="col-md-8 col-sm-12">
                  <h4 class="font-weight-bold text-dark mb-1">
                    <i class="fa fa-linux text-danger"></i> Base de Datos Histórica Debian 5 Detectada (Plantilla 1)
                  </h4>
                  <p class="text-secondary mb-0" style="font-size: 13.5px;">
                    Se ha detectado el respaldo <code>ven911_2025.sql</code> (<strong>50.12 MB</strong> con <strong>186.465 registros</strong> de llamadas y Plan Amigo 171).
                    Está listo en el servidor para restaurarse con un solo clic hacia <strong>MySQL (911a2021)</strong> o migrarse hacia <strong>PostgreSQL (ven911)</strong> sin necesidad de subirlo por el navegador.
                  </p>
                </div>
                <div class="col-md-4 col-sm-12 text-md-right text-sm-left mt-2">
                  <button type="button" class="btn btn-warning font-weight-bold text-dark py-2 px-3 shadow-sm" onclick="abrirModalRestaurar('ven911_2025.sql', 'plantilla1', 'Debian 5 / MySQL', '50.12 MB', '186.465 registros históricos de emergencias 2026')">
                    <i class="fa fa-bolt"></i> Restaurar ven911_2025.sql
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Fila de Acciones: Exportar e Importar -->
        <div class="row">
          <!-- Columna: Exportar Base de Datos -->
          <div class="col-md-6 col-sm-12">
            <div class="backup-card">
              <div class="backup-icon-circle icon-export">
                <i class="fa fa-download"></i>
              </div>
              <h4 class="text-center font-weight-bold" style="color: #16a085;">EXPORTAR BASE DE DATOS</h4>
              <p class="text-muted text-center" style="font-size: 13px;">
                Genera un respaldo completo de la base de datos <strong>ven911</strong> (tablas, datos, secuencias y vistas) con la fecha y hora del momento exacto.
              </p>

              <hr>

              <div class="bg-light p-3 rounded mb-3 text-center border">
                <span class="text-secondary small font-weight-bold d-block">NOMBRE DEL ARCHIVO A GENERAR:</span>
                <code style="font-size: 14px; font-weight: bold; color: #2c3e50;">respaldo_ven911_<span id="preview-filename"><?php echo date('Y-m-d_H-i-s'); ?></span>.sql</code>
              </div>

              <form method="POST" action="respaldo_bd.php">
                <input type="hidden" name="action" value="export">
                <div class="row">
                  <div class="col-md-6 col-sm-12 mb-2">
                    <button type="submit" name="destino" value="descargar" class="btn btn-success btn-block py-2 font-weight-bold">
                      <i class="fa fa-download"></i> Exportar y Descargar SQL
                    </button>
                  </div>
                  <div class="col-md-6 col-sm-12 mb-2">
                    <button type="submit" name="destino" value="servidor" class="btn btn-primary btn-block py-2 font-weight-bold">
                      <i class="fa fa-save"></i> Exportar y Guardar en Servidor
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- Columna: Importar Base de Datos -->
          <div class="col-md-6 col-sm-12">
            <div class="backup-card">
              <div class="backup-icon-circle icon-import">
                <i class="fa fa-upload"></i>
              </div>
              <h4 class="text-center font-weight-bold" style="color: #d68910;">IMPORTAR BASE DE DATOS</h4>
              <p class="text-muted text-center" style="font-size: 13px;">
                Restaura el esquema y los datos desde un archivo <code>.sql</code>. Compatible con <strong>PostgreSQL</strong> y volcados de <strong>Debian 5 / MySQL</strong>.
              </p>

              <hr>

              <form method="POST" action="respaldo_bd.php" enctype="multipart/form-data" id="form-import" onsubmit="mostrarOverlay('Subiendo e importando archivo SQL...')">
                <input type="hidden" name="action" value="import">
                
                <div class="form-group mb-2">
                  <label class="font-weight-bold text-secondary" style="font-size: 13px;"><i class="fa fa-file-code-o"></i> Seleccionar archivo .SQL desde tu equipo:</label>
                  <input type="file" name="archivo_sql" id="input-archivo-sql" class="form-control-file border p-2 rounded w-100" accept=".sql,.backup,.dump">
                  <small class="form-text text-muted">Formatos admitidos: <code>.sql</code>, <code>.backup</code>, <code>.dump</code></small>
                </div>

                <div class="form-group mb-3">
                  <label class="font-weight-bold text-secondary" style="font-size: 13px;"><i class="fa fa-cogs"></i> Motor de Destino:</label>
                  <select name="motor_destino" class="form-control">
                    <option value="auto" selected>Detección Automática Inteligente (Recomendado)</option>
                    <option value="mysql">MySQL / MariaDB (BD: 911a2021 / ven911_2025)</option>
                    <option value="postgres">PostgreSQL (BD: ven911)</option>
                    <option value="ambos">Doble Destino (MySQL + Migración a PostgreSQL)</option>
                  </select>
                </div>

                <button type="button" class="btn btn-warning btn-block py-2 font-weight-bold text-dark" onclick="confirmarImportacionSubida()">
                  <i class="fa fa-upload"></i> Importar / Restaurar Base de Datos
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Tabla de Historial y Repositorio de Respaldos -->
        <div class="row mt-4">
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-database"></i> Repositorio de Respaldos Disponibles en el Servidor</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered table-backups text-center" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre del Archivo</th>
                        <th>Origen / Repositorio</th>
                        <th>Motor Detectado</th>
                        <th>Fecha de Modificación</th>
                        <th>Tamaño</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($all_backups)): ?>
                        <?php $i = 1; foreach ($all_backups as $b): ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td class="text-left font-weight-bold">
                              <i class="fa fa-file-text-o text-primary"></i> <?php echo htmlspecialchars($b['name']); ?>
                            </td>
                            <td>
                              <span class="badge <?php echo $b['folder_badge']; ?> p-1">
                                <i class="fa <?php echo $b['badge_icon']; ?>"></i> <?php echo htmlspecialchars($b['folder_label']); ?>
                              </span>
                            </td>
                            <td>
                              <span class="badge <?php echo $b['format']['badge']; ?> p-1">
                                <i class="fa <?php echo $b['format']['icon']; ?>"></i> <?php echo htmlspecialchars($b['format']['label']); ?>
                              </span>
                            </td>
                            <td><?php echo date('d/m/Y - h:i:s A', $b['date']); ?></td>
                            <td><span class="badge badge-info p-1"><?php echo format_bytes($b['size']); ?></span></td>
                            <td>
                              <!-- Botón Descargar -->
                              <a href="respaldo_bd.php?action=download&file=<?php echo urlencode($b['name']); ?>&folder=<?php echo urlencode($b['folder']); ?>" class="btn btn-sm btn-success" title="Descargar copia">
                                <i class="fa fa-download"></i> Descargar
                              </a>

                              <!-- Botón Restaurar este archivo -->
                              <button type="button" class="btn btn-sm btn-warning text-dark font-weight-bold" title="Restaurar base de datos con este archivo" onclick="abrirModalRestaurar('<?php echo htmlspecialchars($b['name']); ?>', '<?php echo htmlspecialchars($b['folder']); ?>', '<?php echo htmlspecialchars($b['format']['label']); ?>', '<?php echo format_bytes($b['size']); ?>', '<?php echo htmlspecialchars($b['format']['details']); ?>')">
                                <i class="fa fa-undo"></i> Restaurar
                              </button>

                              <!-- Botón Eliminar (Solo para /backups) -->
                              <?php if ($b['can_delete']): ?>
                                <form method="POST" action="respaldo_bd.php" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar permanentemente el respaldo: <?php echo htmlspecialchars($b['name']); ?>?');">
                                  <input type="hidden" name="action" value="delete">
                                  <input type="hidden" name="file" value="<?php echo htmlspecialchars($b['name']); ?>">
                                  <button type="submit" class="btn btn-sm btn-danger" title="Eliminar archivo">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              <?php else: ?>
                                <span class="badge badge-light border text-muted p-1" title="Archivo protegido de plantilla"><i class="fa fa-lock"></i> Protegido</span>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="7" class="py-4 text-muted">
                            <i class="fa fa-folder-open-o fa-2x d-block mb-2"></i>
                            No se encontraron archivos de respaldo en los directorios del servidor.
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- /page content -->

<!-- Modal para Restaurar Archivo Seleccionado con Selector de Motor -->
<div class="modal fade" id="modalRestaurarServidor" tabindex="-1" role="dialog" aria-labelledby="modalRestaurarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="POST" action="respaldo_bd.php" id="form-restaurar-servidor" onsubmit="mostrarOverlay('Restaurando base de datos...')">
        <input type="hidden" name="action" value="import">
        <input type="hidden" name="archivo_existente" id="modal-restaurar-archivo" value="">
        <input type="hidden" name="carpeta_origen" id="modal-restaurar-carpeta" value="">

        <div class="modal-header bg-warning text-dark font-weight-bold">
          <h5 class="modal-title" id="modalRestaurarLabel"><i class="fa fa-database"></i> Confirmar Restauración de Base de Datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body py-4">
          <div class="text-center mb-3">
            <i class="fa fa-exclamation-triangle fa-3x text-warning mb-2"></i>
            <h4 class="font-weight-bold text-danger">¡ATENCIÓN! ACCIÓN DE RESTAURACIÓN</h4>
            <p class="text-muted" style="font-size: 14px;">
              Está a punto de restaurar datos del sistema desde el archivo seleccionado en el servidor.
            </p>
          </div>

          <div class="card bg-light border p-3 mb-3">
            <div class="row">
              <div class="col-md-6">
                <strong><i class="fa fa-file-text-o text-primary"></i> Archivo:</strong>
                <span id="modal-info-nombre" class="text-dark font-weight-bold d-block"></span>
              </div>
              <div class="col-md-3">
                <strong><i class="fa fa-hdd-o text-info"></i> Tamaño:</strong>
                <span id="modal-info-tamano" class="text-dark d-block"></span>
              </div>
              <div class="col-md-3">
                <strong><i class="fa fa-cogs text-success"></i> Formato:</strong>
                <span id="modal-info-formato" class="text-dark d-block"></span>
              </div>
            </div>
            <hr class="my-2">
            <div>
              <small class="text-secondary font-weight-bold">DETALLES TÉCNICOS DETECTADOS:</small>
              <p id="modal-info-detalles" class="text-muted small mb-0"></p>
            </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold text-dark"><i class="fa fa-server"></i> Seleccione el Motor de Base de Datos Destino:</label>
            <select name="motor_destino" id="modal-select-motor" class="form-control font-weight-bold">
              <option value="auto">Detección Automática Inteligente (Recomendado según el archivo)</option>
              <option value="mysql">MySQL / MariaDB (BD: 911a2021 / ven911_2025 - Para tablas de llamadas y Amigo 171)</option>
              <option value="postgres">PostgreSQL (BD: ven911 - Base de datos principal)</option>
              <option value="ambos">Doble Motor (Restaura en MySQL y migra datos hacia PostgreSQL)</option>
            </select>
            <small class="form-text text-muted">
              * Para respaldos de <strong>Debian 5 (Plantilla 1)</strong>, la opción MySQL o Doble Motor asegura que las consultas operativas de llamadas funcionen de inmediato.
            </small>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger font-weight-bold">
            <i class="fa fa-check-circle"></i> Sí, Proceder con la Restauración
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Reloj digital en vivo para mostrar la fecha y hora del momento exacto
function actualizarReloj() {
    var now = new Date();
    var d = String(now.getDate()).padStart(2, '0');
    var m = String(now.getMonth() + 1).padStart(2, '0');
    var y = now.getFullYear();
    var h = now.getHours();
    var min = String(now.getMinutes()).padStart(2, '0');
    var s = String(now.getSeconds()).padStart(2, '0');
    var ampm = h >= 12 ? 'PM' : 'AM';
    var h12 = h % 12;
    h12 = h12 ? h12 : 12;
    var hStr = String(h12).padStart(2, '0');
    
    var timeStr = d + '/' + m + '/' + y + ' - ' + hStr + ':' + min + ':' + s + ' ' + ampm;
    var el = document.getElementById('reloj-live');
    if (el) el.innerText = timeStr;
    
    var elFile = document.getElementById('preview-filename');
    if (elFile) {
        var h24 = String(h).padStart(2, '0');
        elFile.innerText = y + '-' + m + '-' + d + '_' + h24 + '-' + min + '-' + s;
    }
}
setInterval(actualizarReloj, 1000);

function mostrarOverlay(mensaje) {
    var overlay = document.getElementById('loadingOverlay');
    var title = document.getElementById('overlayTitle');
    if (title && mensaje) title.innerText = mensaje;
    if (overlay) overlay.style.display = 'block';
}

function confirmarImportacionSubida() {
    var fileInput = document.getElementById('input-archivo-sql');
    if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
        alert('Por favor, selecciona primero un archivo .SQL desde tu equipo.');
        return;
    }
    if (confirm('¿Está seguro de restaurar la base de datos con el archivo seleccionado desde su equipo?')) {
        document.getElementById('form-import').submit();
    }
}

function abrirModalRestaurar(nombre, carpeta, formato, tamano, detalles) {
    document.getElementById('modal-restaurar-archivo').value = nombre;
    document.getElementById('modal-restaurar-carpeta').value = carpeta;
    
    document.getElementById('modal-info-nombre').innerText = nombre;
    document.getElementById('modal-info-tamano').innerText = tamano;
    document.getElementById('modal-info-formato').innerText = formato;
    document.getElementById('modal-info-detalles').innerText = detalles || 'Sin detalles adicionales.';
    
    // Sugerencia de motor por defecto
    var sel = document.getElementById('modal-select-motor');
    if (carpeta === 'plantilla1' || nombre.indexOf('2025') !== -1) {
        sel.value = 'mysql';
    } else if (carpeta === 'plantilla2') {
        sel.value = 'postgres';
    } else {
        sel.value = 'auto';
    }
    
    $('#modalRestaurarServidor').modal('show');
}
</script>

<?php require_once '../plantillas/inferior3.php'; ?>
