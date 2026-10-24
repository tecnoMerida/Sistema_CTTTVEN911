<?php
// ============================================================================
// Controlador Dinámico de Organismo Responsable del Cuadrante (VEN 9-1-1)
// Carga automática del organismo de seguridad según Sector/Parroquia
// ============================================================================

require_once __DIR__ . '/../config/conexion1.php';
require_once __DIR__ . '/../config/cuadrantes_helper.php';

$elegido = $_POST["elegido"] ?? '';
$matched_org = '';

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
        $matched_org = $cuadrante_match['organismo'];
    }
}

echo get_options_organismos_html($matched_org);
?>
