<?php
// ============================================================================
// Endpoint para obtener Sectores según Parroquia (VEN 9-1-1 Mérida)
// ============================================================================

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion1.php';

$parroquia_id = (int)($_REQUEST['parroquia_id'] ?? $_GET['parroquia_id'] ?? $_POST['parroquia_id'] ?? $_REQUEST['elegido'] ?? $_GET['elegido'] ?? $_POST['elegido'] ?? 0);
$municipio_id = (int)($_REQUEST['municipio_id'] ?? $_GET['municipio_id'] ?? $_POST['municipio_id'] ?? 0);

if ($parroquia_id <= 0 && $municipio_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Parroquia o Municipio no especificado', 'sectores' => []]);
    exit();
}

$condiciones = [];
if ($parroquia_id > 0) {
    $condiciones[] = "sectores.parroquias_id = $parroquia_id";
}
if ($municipio_id > 0) {
    $condiciones[] = "parroquias.municipios_id = $municipio_id";
}
$where = implode(' AND ', $condiciones);

$sql = "SELECT sectores.id, sectores.nombre_sector, parroquias.id AS parroquia_id, parroquias.nombre_parroquia, municipios.id AS municipio_id, municipios.nombre_municipio 
        FROM public.sectores 
        JOIN public.parroquias ON sectores.parroquias_id = parroquias.id 
        JOIN public.municipios ON parroquias.municipios_id = municipios.id 
        WHERE $where 
        ORDER BY sectores.nombre_sector ASC";

$res = @pg_query($dbconn, $sql);
$sectores = [];
$html_options = '<option value="0">-- Seleccione o Busque Sector --</option>';

if ($res) {
    while ($row = pg_fetch_assoc($res)) {
        $sec_id = (int)$row['id'];
        $sec_nom = strtoupper(trim($row['nombre_sector']));
        $p_id = (int)$row['parroquia_id'];
        $m_id = (int)$row['municipio_id'];
        
        $sectores[] = [
            'id' => $sec_id,
            'nombre' => $sec_nom,
            'parroquia_id' => $p_id,
            'parroquia' => $row['nombre_parroquia'],
            'municipio_id' => $m_id,
            'municipio' => $row['nombre_municipio']
        ];
        
        $html_options .= '<option value="' . $sec_id . '" data-parroquia-id="' . $p_id . '" data-municipio-id="' . $m_id . '">' . htmlspecialchars($sec_nom) . '</option>';
    }
}

echo json_encode([
    'success' => true,
    'total' => count($sectores),
    'sectores' => $sectores,
    'html_options' => $html_options
], JSON_UNESCAPED_UNICODE);
