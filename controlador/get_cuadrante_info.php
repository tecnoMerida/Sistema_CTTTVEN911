<?php
// Endpoint JSON para obtener información de Cuadrante según Sector/Parroquia o Código de Cuadrante
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config/conexion1.php';
require_once __DIR__ . '/../config/cuadrantes_helper.php';

$codigo = $_REQUEST['codigo'] ?? $_REQUEST['cuadrante'] ?? '';
$elegido = $_REQUEST['elegido'] ?? $_REQUEST['sector_id'] ?? $_REQUEST['sector'] ?? '';

if (empty($codigo) && (empty($elegido) || $elegido === '0')) {
    echo json_encode([
        'success' => false,
        'message' => 'No se especificó sector o cuadrante'
    ]);
    exit();
}

$cuadrante_info = null;

// 1. Si se solicitó por código directo de cuadrante (ej: "22C-001" o "22C-102")
if (!empty($codigo)) {
    $cuadrante_info = find_cuadrante_by_code($codigo);
} elseif (preg_match('/^22C-\d{3}$/i', trim($elegido))) {
    $cuadrante_info = find_cuadrante_by_code(trim($elegido));
}

// 2. Si no se encontró por código, buscar por Sector / Parroquia / Municipio
if (!$cuadrante_info && !empty($elegido) && $elegido !== '0') {
    $sector_nombre = '';
    $parroquia_nombre = '';
    $municipio_nombre = '';

    // Si es numérico, buscar nombres en la base de datos
    if (is_numeric($elegido)) {
        $sec_id = (int)$elegido;
        $res = @pg_query($dbconn, "SELECT sectores.nombre_sector, parroquias.nombre_parroquia, municipios.nombre_municipio 
                                  FROM public.sectores 
                                  LEFT JOIN public.parroquias ON sectores.parroquias_id = parroquias.id 
                                  LEFT JOIN public.municipios ON parroquias.municipios_id = municipios.id 
                                  WHERE sectores.id = $sec_id LIMIT 1");
        if ($res && $row = pg_fetch_assoc($res)) {
            $sector_nombre = $row['nombre_sector'] ?? '';
            $parroquia_nombre = $row['nombre_parroquia'] ?? '';
            $municipio_nombre = $row['nombre_municipio'] ?? '';
        }
    } else {
        // Si viene como string compuesto "SECTOR, PARROQUIA, MUNICIPIO"
        $parts = explode(',', $elegido);
        $sector_nombre = trim($parts[0] ?? '');
        $parroquia_nombre = trim($parts[1] ?? '');
        $municipio_nombre = trim($parts[2] ?? '');
    }

    $cuadrante_info = find_cuadrante_for_sector($sector_nombre, $parroquia_nombre, $municipio_nombre);
}

if ($cuadrante_info) {
    $parroquia_id = get_parroquia_id_for_cuadrante($cuadrante_info, $dbconn);
    
    echo json_encode([
        'success' => true,
        'cuadrante' => $cuadrante_info['cuadrante'],
        'organismo' => $cuadrante_info['organismo'],
        'telefono' => $cuadrante_info['telefono_formato'],
        'telefono_raw' => $cuadrante_info['telefono'],
        'comuna' => $cuadrante_info['comuna'],
        'municipio' => $cuadrante_info['municipio'],
        'parroquia' => $cuadrante_info['parroquia'],
        'parroquia_id' => $parroquia_id,
        'sectores' => $cuadrante_info['sectores']
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No se encontró cuadrante específico para la ubicación indicada',
        'sector' => $sector_nombre ?? ''
    ], JSON_UNESCAPED_UNICODE);
}
