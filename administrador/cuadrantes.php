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

$rol_actual = 'administrador';
$menu_archivo = __DIR__ . '/../menu/menu_adm.php';
require_once __DIR__ . '/../vistas/cuadrantes_vista.php';
?>
