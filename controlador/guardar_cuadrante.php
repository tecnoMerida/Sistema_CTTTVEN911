<?php
// ============================================================================
// Endpoint para Guardar o Crear Cuadrantes de Paz (CUPAZ - VEN 9-1-1)
// ============================================================================

header('Content-Type: application/json; charset=utf-8');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['tipo_rol_id'])) {
    echo json_encode(['success' => false, 'message' => 'Sesión expirada o no autorizada.']);
    exit();
}

require_once __DIR__ . '/../config/conexion1.php';
require_once __DIR__ . '/../config/cuadrantes_helper.php';

$accion = trim($_POST['accion'] ?? 'editar');

$cuadrante = trim($_POST['cuadrante'] ?? '');
if (empty($cuadrante)) {
    echo json_encode(['success' => false, 'message' => 'Código de cuadrante no especificado.']);
    exit();
}

$organismo = trim($_POST['organismo'] ?? '');
$telefono_input = trim($_POST['telefono'] ?? '');
$comuna = trim($_POST['comuna'] ?? '');
$sectores = trim($_POST['sectores'] ?? '');
$parroquia = trim($_POST['parroquia'] ?? '');
$municipio = trim($_POST['municipio'] ?? '');

// Si seleccionó "__OTRA__" en parroquia y especificó una personalizada
if ($parroquia === '__OTRA__' && !empty($_POST['parroquia_custom'])) {
    $parroquia = trim($_POST['parroquia_custom']);
}

// Limpiar teléfono
$telefono_raw = preg_replace('/[^0-9]/', '', $telefono_input);
if (strlen($telefono_raw) === 11) {
    $telefono_formato = substr($telefono_raw, 0, 4) . '-' . substr($telefono_raw, 4);
} else {
    $telefono_formato = $telefono_input;
}

$usuario_cedula = $_SESSION['personal_cedula'] ?? $_SESSION['usuario'] ?? '0';
$fecha_op = date("Y/n/j H:i:s");

// Escapar para PostgreSQL
$cuad_esc = pg_escape_string($dbconn, strtoupper($cuadrante));
$org_esc = pg_escape_string($dbconn, $organismo);
$tel_esc = pg_escape_string($dbconn, $telefono_raw);
$fmt_esc = pg_escape_string($dbconn, $telefono_formato);
$com_esc = pg_escape_string($dbconn, $comuna);
$sec_esc = pg_escape_string($dbconn, $sectores);
$mun_esc = pg_escape_string($dbconn, strtoupper($municipio));
$parr_esc = pg_escape_string($dbconn, strtoupper($parroquia));

if ($accion === 'crear' || $accion === 'nuevo') {
    // Validar campos obligatorios
    if (empty($municipio)) {
        echo json_encode(['success' => false, 'message' => 'Debe seleccionar un municipio.']);
        exit();
    }
    if (empty($parroquia) || $parroquia === '__OTRA__') {
        echo json_encode(['success' => false, 'message' => 'Debe especificar la parroquia.']);
        exit();
    }
    if (empty($organismo)) {
        echo json_encode(['success' => false, 'message' => 'Debe seleccionar el organismo responsable.']);
        exit();
    }
    if (empty($telefono_raw)) {
        echo json_encode(['success' => false, 'message' => 'Debe ingresar un número de teléfono válido.']);
        exit();
    }
    if (empty($sectores)) {
        echo json_encode(['success' => false, 'message' => 'Debe especificar los sectores de cobertura.']);
        exit();
    }

    // Verificar si ya existe el código de cuadrante
    $check_exist = @pg_query($dbconn, "SELECT id FROM public.cuadrantes_de_paz WHERE UPPER(cuadrante) = '$cuad_esc'");
    if ($check_exist && pg_num_rows($check_exist) > 0) {
        echo json_encode(['success' => false, 'message' => "El código de cuadrante '{$cuadrante}' ya está registrado en el sistema."]);
        exit();
    }

    // Calcular el siguiente número consecutivo
    $num_res = @pg_query($dbconn, "SELECT COALESCE(MAX(numero), 0) + 1 AS prox_num FROM public.cuadrantes_de_paz");
    $prox_numero = ($num_res && pg_num_rows($num_res) > 0) ? (int)pg_fetch_result($num_res, 0, 'prox_num') : 1;

    $sql_insert = "INSERT INTO public.cuadrantes_de_paz (
        numero, municipio, parroquia, sectores, comuna, cuadrante, organismo_responsable, telefono, telefono_formato, fecha_registro
    ) VALUES (
        $prox_numero, '$mun_esc', '$parr_esc', '$sec_esc', '$com_esc', '$cuad_esc', '$org_esc', '$tel_esc', '$fmt_esc', NOW()
    )";

    $res_ins = @pg_query($dbconn, $sql_insert);
    if (!$res_ins) {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el cuadrante: ' . pg_last_error($dbconn)]);
        exit();
    }

    // Registrar en bitácora
    $valor_nuevo = "NUEVO CUADRANTE #$prox_numero: $cuad_esc, Mun: $mun_esc, Parr: $parr_esc, Org: $org_esc, Tel: $fmt_esc, Comuna: $com_esc";
    @pg_query($dbconn, "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) 
                       VALUES ('$usuario_cedula', 'CUPAZ', 'cuadrantes_de_paz', 'Insertar', '$valor_nuevo', '$fecha_op')");

    echo json_encode([
        'success' => true,
        'message' => "Cuadrante {$cuad_esc} agregado exitosamente con el N° {$prox_numero}.",
        'data' => [
            'numero' => $prox_numero,
            'cuadrante' => $cuad_esc,
            'municipio' => $mun_esc,
            'parroquia' => $parr_esc,
            'organismo' => $org_esc,
            'telefono' => $tel_esc,
            'telefono_formato' => $fmt_esc,
            'comuna' => $com_esc,
            'sectores' => $sec_esc
        ]
    ], JSON_UNESCAPED_UNICODE);
    exit();
}

// Acción: editar cuadrante existente
$check = @pg_query($dbconn, "SELECT 1 FROM information_schema.tables WHERE table_name = 'cuadrantes_de_paz'");
if ($check && pg_num_rows($check) > 0) {
    $sql_update = "UPDATE public.cuadrantes_de_paz 
                   SET organismo_responsable = '$org_esc',
                       telefono = '$tel_esc',
                       telefono_formato = '$fmt_esc',
                       comuna = '$com_esc',
                       sectores = '$sec_esc'
                   WHERE cuadrante = '$cuad_esc'";
    
    $res = @pg_query($dbconn, $sql_update);
    if (!$res) {
        echo json_encode([
            'success' => false, 
            'message' => 'Error al guardar en la base de datos: ' . pg_last_error($dbconn)
        ]);
        exit();
    }
}

// Registrar en bitácora
$valor_nuevo = "Cuadrante: $cuad_esc, Org: $org_esc, Tel: $fmt_esc, Comuna: $com_esc";
@pg_query($dbconn, "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) 
                   VALUES ('$usuario_cedula', 'CUPAZ', 'cuadrantes_de_paz', 'Modificar', '$valor_nuevo', '$fecha_op')");

echo json_encode([
    'success' => true,
    'message' => "Cuadrante {$cuad_esc} actualizado correctamente.",
    'data' => [
        'cuadrante' => $cuad_esc,
        'organismo' => $org_esc,
        'telefono' => $tel_esc,
        'telefono_formato' => $fmt_esc,
        'comuna' => $com_esc,
        'sectores' => $sec_esc
    ]
], JSON_UNESCAPED_UNICODE);
