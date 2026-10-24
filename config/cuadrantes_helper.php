<?php
// ============================================================================
// Helper de Cuadrantes de Paz - Estado Mérida (VEN 9-1-1)
// Conexión y consulta híbrida (Memoria + Base de Datos PostgreSQL)
// ============================================================================

require_once __DIR__ . '/cuadrantes_data.php';

function get_cuadrantes_activos($dbconn = null) {
    if (!$dbconn && isset($GLOBALS['dbconn'])) {
        $dbconn = $GLOBALS['dbconn'];
    }
    if ($dbconn) {
        $res = @pg_query($dbconn, "SELECT * FROM public.cuadrantes_de_paz ORDER BY numero ASC");
        if ($res && pg_num_rows($res) > 0) {
            $lista = [];
            while ($row = pg_fetch_assoc($res)) {
                $lista[] = [
                    'numero' => (int)$row['numero'],
                    'municipio' => $row['municipio'],
                    'parroquia' => $row['parroquia'],
                    'sectores' => $row['sectores'],
                    'comuna' => $row['comuna'],
                    'cuadrante' => $row['cuadrante'],
                    'organismo' => $row['organismo_responsable'],
                    'telefono' => $row['telefono'],
                    'telefono_formato' => $row['telefono_formato'] ?? $row['telefono']
                ];
            }
            return $lista;
        }
    }
    return get_todos_los_cuadrantes();
}

function find_cuadrante_for_sector($sector_nombre, $parroquia_nombre = '', $municipio_nombre = '') {
    $cuadrantes = get_cuadrantes_activos();
    $sector_upper = mb_strtoupper(trim($sector_nombre));
    $parr_upper   = mb_strtoupper(trim($parroquia_nombre));
    $mun_upper    = mb_strtoupper(trim($municipio_nombre));
    
    // Normalizar acentos para búsqueda flexible
    $clean_str = function($str) {
        $from = ['Á','É','Í','Ó','Ú','Ñ','À','È','Ì','Ò','Ù'];
        $to   = ['A','E','I','O','U','N','A','E','I','O','U'];
        return str_replace($from, $to, $str);
    };
    
    $sector_norm = $clean_str($sector_upper);
    $parr_norm   = $clean_str($parr_upper);
    $mun_norm    = $clean_str($mun_upper);
    
    // 1. Coincidencia exacta de sector dentro de parroquia y municipio
    foreach ($cuadrantes as $c) {
        $c_parr = $clean_str(mb_strtoupper($c['parroquia']));
        $c_mun  = $clean_str(mb_strtoupper($c['municipio']));
        
        $parr_match = empty($parr_norm) || (strpos($c_parr, $parr_norm) !== false || strpos($parr_norm, $c_parr) !== false);
        $mun_match  = empty($mun_norm)  || (strpos($c_mun, $mun_norm) !== false || strpos($mun_norm, $c_mun) !== false);
        
        if ($parr_match && $mun_match) {
            $c_sectores = $clean_str(mb_strtoupper($c['sectores']));
            if (strpos($c_sectores, $sector_norm) !== false) {
                return $c;
            }
        }
    }
    
    // 2. Coincidencia por palabras clave representativas del sector
    $words = explode(' ', $sector_norm);
    foreach ($words as $w) {
        $w = trim($w);
        if (strlen($w) >= 4 && !in_array($w, ['BARRIO', 'SECTOR', 'CALLE', 'AVENIDA', 'URBANIZACION', 'PARTE', 'ALTA', 'BAJA', 'MEDIA'])) {
            foreach ($cuadrantes as $c) {
                $c_parr = $clean_str(mb_strtoupper($c['parroquia']));
                $parr_match = empty($parr_norm) || (strpos($c_parr, $parr_norm) !== false || strpos($parr_norm, $c_parr) !== false);
                if ($parr_match) {
                    if (strpos($clean_str(mb_strtoupper($c['sectores'])), $w) !== false) {
                        return $c;
                    }
                }
            }
        }
    }
    
    // 3. Coincidencia por sector en cualquier parroquia si no se especificó parroquia
    if (!empty($sector_norm)) {
        foreach ($cuadrantes as $c) {
            if (strpos($clean_str(mb_strtoupper($c['sectores'])), $sector_norm) !== false) {
                return $c;
            }
        }
    }
    
    // 4. Fallback: primer cuadrante asignado a la parroquia
    if (!empty($parr_norm)) {
        foreach ($cuadrantes as $c) {
            $c_parr = $clean_str(mb_strtoupper($c['parroquia']));
            if (strpos($c_parr, $parr_norm) !== false || strpos($parr_norm, $c_parr) !== false) {
                return $c;
            }
        }
    }
    
    // 5. Fallback: primer cuadrante del municipio
    if (!empty($mun_norm)) {
        foreach ($cuadrantes as $c) {
            $c_mun = $clean_str(mb_strtoupper($c['municipio']));
            if (strpos($c_mun, $mun_norm) !== false || strpos($mun_norm, $c_mun) !== false) {
                return $c;
            }
        }
    }
    
    return null;
}

function get_cuadrantes_por_parroquia($parroquia_nombre, $municipio_nombre = '') {
    $cuadrantes = get_cuadrantes_activos();
    $parr_upper = mb_strtoupper(trim($parroquia_nombre));
    $mun_upper  = mb_strtoupper(trim($municipio_nombre));
    $res = [];
    foreach ($cuadrantes as $c) {
        $c_parr = mb_strtoupper($c['parroquia']);
        $c_mun  = mb_strtoupper($c['municipio']);
        $parr_match = empty($parr_upper) || (strpos($c_parr, $parr_upper) !== false || strpos($parr_upper, $c_parr) !== false);
        $mun_match  = empty($mun_upper)  || (strpos($c_mun, $mun_upper) !== false || strpos($mun_upper, $c_mun) !== false);
        if ($parr_match && $mun_match) {
            $res[] = $c;
        }
    }
    return $res;
}

function find_cuadrante_by_code($codigo) {
    if (empty($codigo)) {
        return null;
    }
    $cuadrantes = get_cuadrantes_activos();
    $cod_clean = strtoupper(trim($codigo));
    
    // Si viene como "22C-001" o simplemente "001"
    foreach ($cuadrantes as $c) {
        if (strtoupper($c['cuadrante']) === $cod_clean) {
            return $c;
        }
    }
    
    // Intento con formato normalizado 22C-XXX
    $num = preg_replace('/[^0-9]/', '', $cod_clean);
    if (!empty($num)) {
        $fmt = '22C-' . str_pad($num, 3, '0', STR_PAD_LEFT);
        foreach ($cuadrantes as $c) {
            if (strtoupper($c['cuadrante']) === $fmt) {
                return $c;
            }
        }
    }
    return null;
}

function get_geo_ids_for_cuadrante($cuadrante_item, $dbconn = null) {
    static $cache_geo_ids = null;
    
    if (empty($cuadrante_item)) {
        return ['parroquia_id' => null, 'municipio_id' => null];
    }
    
    $clean_str = function($str) {
        $from = ['Á','É','Í','Ó','Ú','Ñ','À','È','Ì','Ò','Ù'];
        $to   = ['A','E','I','O','U','N','A','E','I','O','U'];
        return str_replace($from, $to, mb_strtoupper(trim($str)));
    };
    
    $alias_parroquia = [
        'PRESIDENTE BENTACOURT' => 'PRESIDENTE BETANCOURT',
        'FERNADEZ PENA' => 'FERNANDEZ PENA',
        'ESTANQUEZ' => 'ESTANQUES',
        'LA AZULITA' => 'LA ZULIANITA NO TIENE PARROQUIA',
        'SANTA CRUZ DE MORA' => 'CAPITAL ANTONIO PINTO SALINAS',
        'CANAGUA' => 'CAPITAL ARZOBISPO CHACON',
        'TUCANI' => 'CAPITAL CARACCIOLO PARRA OLMEDO',
        'SANTO DOMINGO' => 'CAPITAL CARDENAL QUINTERO',
        'ARAPUEY' => 'CAPITAL JULIO CESAR SALAS',
        'TIMOTES' => 'CAPITAL MIRANDA',
        'SANTA ELENA DE ARENALES' => 'CAPITAL OBISPO RAMOS DE LORA',
        'MUCUCHIES' => 'CAPITAL RANGEL',
        'BAILADORES' => 'CAPITAL RIVAS DAVILA',
        'LAGUNILLAS' => 'CAPITAL SUCRE',
        'NUEVA BOLIVIA' => 'CAPITAL TULIO FEBRES CORDERO',
    ];
    
    if ($cache_geo_ids === null && $dbconn) {
        $cache_geo_ids = [];
        $res = @pg_query($dbconn, "SELECT p.id AS parr_id, p.nombre_parroquia, m.id AS mun_id, m.nombre_municipio FROM public.parroquias p JOIN public.municipios m ON p.municipios_id = m.id WHERE m.estados_id = 14");
        if ($res) {
            while ($row = pg_fetch_assoc($res)) {
                $norm_p = $clean_str($row['nombre_parroquia']);
                $norm_m = $clean_str($row['nombre_municipio']);
                $cache_geo_ids[$norm_m][$norm_p] = [
                    'parroquia_id' => (int)$row['parr_id'],
                    'municipio_id' => (int)$row['mun_id']
                ];
            }
        }
    }
    
    $c_mun = $clean_str($cuadrante_item['municipio'] ?? '');
    $c_parr = $clean_str($cuadrante_item['parroquia'] ?? '');
    
    if (isset($alias_parroquia[$c_parr])) {
        $c_parr = $alias_parroquia[$c_parr];
    }
    
    if (isset($cache_geo_ids[$c_mun][$c_parr])) {
        return $cache_geo_ids[$c_mun][$c_parr];
    }
    
    if (isset($cache_geo_ids[$c_mun])) {
        foreach ($cache_geo_ids[$c_mun] as $db_p => $geo) {
            if (strpos($db_p, $c_parr) !== false || strpos($c_parr, $db_p) !== false) {
                return $geo;
            }
        }
    }
    
    return ['parroquia_id' => null, 'municipio_id' => null];
}

function get_parroquia_id_for_cuadrante($cuadrante_item, $dbconn = null) {
    $geo = get_geo_ids_for_cuadrante($cuadrante_item, $dbconn);
    return $geo['parroquia_id'];
}

function get_todos_los_organismos() {
    return [
        'CPNB',
        'POLICÍA DEL ESTADO MÉRIDA',
        'GNB',
        'POLICIA MUNICIPAL DE LIBERTADOR',
        'POLICIA MUNICIPAL DE CAMPO ELIAS',
        'CICPC'
    ];
}

function get_options_cuadrantes_html($selected_cuadrante = '', $dbconn = null) {
    $cuadrantes = get_cuadrantes_activos($dbconn);
    $html = '<option value="0">-- Seleccione Cuadrante de Paz --</option>';
    
    // Agrupar por municipio para mejor organización en optgroups
    $por_municipio = [];
    foreach ($cuadrantes as $c) {
        $mun = $c['municipio'];
        if (!isset($por_municipio[$mun])) {
            $por_municipio[$mun] = [];
        }
        $por_municipio[$mun][] = $c;
    }
    
    foreach ($por_municipio as $mun => $lista) {
        $html .= '<optgroup label="MUNICIPIO ' . htmlspecialchars($mun) . '">';
        foreach ($lista as $c) {
            $sel = (!empty($selected_cuadrante) && $selected_cuadrante === $c['cuadrante']) ? ' selected' : '';
            $geo = $dbconn ? get_geo_ids_for_cuadrante($c, $dbconn) : ['parroquia_id' => '', 'municipio_id' => ''];
            $parr_id = $geo['parroquia_id'] ?? '';
            $mun_id = $geo['municipio_id'] ?? '';
            
            // Texto descriptivo para búsqueda rápida en Select2
            $label = '[' . $c['cuadrante'] . '] ' . $c['parroquia'] . ' - ' . $c['organismo'] . ' (' . $c['telefono_formato'] . ')';
            $sectores_cortos = mb_substr($c['sectores'], 0, 80);
            
            $html .= '<option value="' . htmlspecialchars($c['cuadrante']) . '"' . $sel
                   . ' data-organismo="' . htmlspecialchars($c['organismo']) . '"'
                   . ' data-telefono="' . htmlspecialchars($c['telefono_formato']) . '"'
                   . ' data-telefono-raw="' . htmlspecialchars($c['telefono']) . '"'
                   . ' data-municipio="' . htmlspecialchars($c['municipio']) . '"'
                   . ' data-municipio-id="' . htmlspecialchars($mun_id) . '"'
                   . ' data-parroquia="' . htmlspecialchars($c['parroquia']) . '"'
                   . ' data-parroquia-id="' . htmlspecialchars($parr_id) . '"'
                   . ' data-comuna="' . htmlspecialchars($c['comuna']) . '"'
                   . ' data-sectores="' . htmlspecialchars($c['sectores']) . '">'
                   . htmlspecialchars($label . ' | ' . $sectores_cortos . '...')
                   . '</option>';
        }
        $html .= '</optgroup>';
    }
    
    return $html;
}

function get_options_organismos_html($selected_org = '') {
    $organismos = get_todos_los_organismos();
    $html = '<option value="0">-- Seleccione Organismo --</option>';
    foreach ($organismos as $org) {
        $sel = (!empty($selected_org) && strtoupper(trim($selected_org)) === strtoupper(trim($org))) ? ' selected' : '';
        $html .= '<option value="' . htmlspecialchars($org) . '"' . $sel . '>' . htmlspecialchars($org) . '</option>';
    }
    return $html;
}

function get_badge_organismo($organismo) {
    $org = mb_strtoupper(trim($organismo));
    if (strpos($org, 'CPNB') !== false) {
        return '<span class="badge badge-primary px-2 py-1"><i class="fa fa-shield"></i> CPNB</span>';
    } elseif (strpos($org, 'GNB') !== false) {
        return '<span class="badge badge-success px-2 py-1" style="background-color: #27ae60;"><i class="fa fa-shield"></i> GNB</span>';
    } elseif (strpos($org, 'POLICÍA DEL ESTADO') !== false || strpos($org, 'POLICIA DEL ESTADO') !== false) {
        return '<span class="badge badge-warning text-dark px-2 py-1" style="background-color: #f39c12;"><i class="fa fa-shield"></i> POLICÍA ESTADAL</span>';
    } elseif (strpos($org, 'CICPC') !== false) {
        return '<span class="badge badge-dark px-2 py-1" style="background-color: #8e44ad;"><i class="fa fa-search"></i> CICPC</span>';
    } elseif (strpos($org, 'MUNICIPAL') !== false) {
        return '<span class="badge badge-info px-2 py-1"><i class="fa fa-building"></i> ' . htmlspecialchars($organismo) . '</span>';
    } else {
        return '<span class="badge badge-secondary px-2 py-1">' . htmlspecialchars($organismo) . '</span>';
    }
}
?>
