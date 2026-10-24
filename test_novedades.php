<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'config/conexion1.php';

$organismo_id = 1;
$fecha_entrada = '20240101';
$fecha_salida = '20261231';

echo "--- Testing consulta_novedades_desp.php ---\n";
ob_start();
require 'controlador/consulta_novedades_desp.php';
$html = ob_get_clean();
echo "Success desp! Length: " . strlen($html) . "\n";

echo "--- Testing consulta_novedades_sup.php ---\n";
ob_start();
require 'controlador/consulta_novedades_sup.php';
$html = ob_get_clean();
echo "Success sup! Length: " . strlen($html) . "\n";

echo "--- Testing consulta_novedades_op.php ---\n";
ob_start();
require 'controlador/consulta_novedades_op.php';
$html = ob_get_clean();
echo "Success op! Length: " . strlen($html) . "\n";
