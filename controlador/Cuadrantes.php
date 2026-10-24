<?php
// ============================================================================
// Controlador Dinámico de Cuadrantes de Paz (VEN 9-1-1)
// Carga automática del Cuadrante y Teléfono de Emergencia según Sector/Parroquia
// ============================================================================

require_once __DIR__ . '/../config/conexion1.php';
require_once __DIR__ . '/../config/cuadrantes_helper.php';

$elegido = $_POST["elegido"] ?? '';
$matched_cuadrante = '';

if (!empty($elegido) && $elegido !== '0') {
    $sector_nombre = '';
    $parroquia_nombre = '';
    $municipio_nombre = '';

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
        $parts = explode(',', $elegido);
        $sector_nombre = trim($parts[0] ?? '');
        $parroquia_nombre = trim($parts[1] ?? '');
        $municipio_nombre = trim($parts[2] ?? '');
    }

    $cuadrante_match = find_cuadrante_for_sector($sector_nombre, $parroquia_nombre, $municipio_nombre);
    if ($cuadrante_match) {
        $matched_cuadrante = $cuadrante_match['cuadrante'];
    }
}

echo get_options_cuadrantes_html($matched_cuadrante, $dbconn);
?>
