<?php
/**
 * Componente: Resumen de Actividades del Usuario Registrado
 * Muestra métricas, información del perfil y resumen de actividades según el rol.
 */

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

require_once __DIR__ . '/../config/conexion1.php';

$cedula_usuario = $_SESSION['personal_cedula'] ?? 0;
$nombre_usuario = $_SESSION['usuario'] ?? 'Usuario';
$rol_id = $_SESSION['tipo_rol_id'] ?? 1;

// 1. Obtener datos del perfil y personal
$cedula_esc = pg_escape_string($dbconn, (string)$cedula_usuario);
$usuario_esc = pg_escape_string($dbconn, (string)$nombre_usuario);

$q_perfil = pg_query($dbconn, "
    SELECT u.id as usuario_id, u.usuario, u.tipo_rol_id, u.personal_cedula,
           p.p_nombre, p.s_nombre, p.p_apellido, p.s_apelllido, p.correo_electronico, p.telefono_celular,
           o.nombre_oganismos as organismo, c.nombre_cargo as cargo, tr.tipo_rol,
           p.nombre_sector
    FROM public.usuario u
    LEFT JOIN public.personal p ON p.cedula = u.personal_cedula
    LEFT JOIN public.tipo_rol tr ON tr.id = u.tipo_rol_id
    LEFT JOIN public.organismos o ON o.id = p.organismos_id
    LEFT JOIN public.cargos c ON c.id = p.cargos_id
    WHERE u.personal_cedula = '$cedula_esc' OR u.usuario = '$usuario_esc'
    LIMIT 1
");

$datos_perfil = $q_perfil ? pg_fetch_assoc($q_perfil) : [];

$p_nom = $datos_perfil['p_nombre'] ?? '';
$p_ape = $datos_perfil['p_apellido'] ?? '';
$nombre_completo = trim($p_nom . ' ' . $p_ape);
if (empty($nombre_completo)) {
    $nombre_completo = $nombre_usuario;
}

$rol_nombre = $datos_perfil['tipo_rol'] ?? 'Operador';
$organismo_nombre = $datos_perfil['organismo'] ?? 'VEN 9-1-1';
$cargo_nombre = $datos_perfil['cargo'] ?? $rol_nombre;

// 2. Saludo dinámico según la hora del día
$hora_actual = (int)date('H');
if ($hora_actual >= 5 && $hora_actual < 12) {
    $saludo = "¡Buenos días";
} elseif ($hora_actual >= 12 && $hora_actual < 19) {
    $saludo = "¡Buenas tardes";
} else {
    $saludo = "¡Buenas noches";
}

// 3. Métricas generales del usuario
// Acciones del usuario en bitácora
$q_bit_usr = pg_query($dbconn, "SELECT count(*) FROM public.bitacora WHERE usuario_aplicacion = '$cedula_esc' OR usuario_aplicacion = '$usuario_esc'");
$total_acciones_usr = $q_bit_usr ? (int)pg_fetch_row($q_bit_usr)[0] : 0;

// Último acceso previo
$q_ult_acceso = pg_query($dbconn, "
    SELECT fecha_operacion 
    FROM public.bitacora 
    WHERE (usuario_aplicacion = '$cedula_esc' OR usuario_aplicacion = '$usuario_esc') 
      AND (UPPER(proceso) = 'VALIDAR' OR UPPER(nombre_esquema) LIKE '%SESSION%')
    ORDER BY id DESC 
    LIMIT 1 OFFSET 1
");
$ultimo_acceso_row = $q_ult_acceso ? pg_fetch_assoc($q_ult_acceso) : false;
if (!$ultimo_acceso_row) {
    // Si no hay offset 1, tomamos el más reciente
    $q_ult_acceso2 = pg_query($dbconn, "
        SELECT fecha_operacion 
        FROM public.bitacora 
        WHERE (usuario_aplicacion = '$cedula_esc' OR usuario_aplicacion = '$usuario_esc') 
        ORDER BY id DESC 
        LIMIT 1
    ");
    $ultimo_acceso_row = $q_ult_acceso2 ? pg_fetch_assoc($q_ult_acceso2) : false;
}
$ultimo_acceso = $ultimo_acceso_row ? date('d/m/Y h:i A', strtotime($ultimo_acceso_row['fecha_operacion'])) : 'Primer ingreso registrado';

// 4. Métricas específicas según el perfil
$stat_card1 = ['titulo' => '', 'valor' => 0, 'icono' => '', 'color' => ''];
$stat_card2 = ['titulo' => '', 'valor' => 0, 'icono' => '', 'color' => ''];
$stat_card3 = ['titulo' => '', 'valor' => 0, 'icono' => '', 'color' => ''];
$stat_card4 = ['titulo' => '', 'valor' => 0, 'icono' => '', 'color' => ''];

if ($rol_id == 1) {
    // Administrador
    $q_usr_tot = pg_query($dbconn, "SELECT count(*) FROM public.usuario");
    $tot_usuarios = $q_usr_tot ? (int)pg_fetch_row($q_usr_tot)[0] : 0;

    $q_cupaz_tot = pg_query($dbconn, "SELECT count(*) FROM public.cuadrantes_de_paz");
    $tot_cuadrantes = $q_cupaz_tot ? (int)pg_fetch_row($q_cupaz_tot)[0] : 240;

    $q_sol_tot = pg_query($dbconn, "SELECT count(*) FROM public.solicitudes");
    $tot_solicitudes = $q_sol_tot ? (int)pg_fetch_row($q_sol_tot)[0] : 0;

    $q_bit_tot = pg_query($dbconn, "SELECT count(*) FROM public.bitacora");
    $tot_bitacora = $q_bit_tot ? (int)pg_fetch_row($q_bit_tot)[0] : 0;

    $stat_card1 = ['titulo' => 'Usuarios del Sistema', 'valor' => $tot_usuarios, 'icono' => 'fa-users', 'color' => 'card-blue'];
    $stat_card2 = ['titulo' => 'Cuadrantes CUPAZ', 'valor' => $tot_cuadrantes, 'icono' => 'fa-shield', 'color' => 'card-teal'];
    $stat_card3 = ['titulo' => 'Solicitudes 911', 'valor' => $tot_solicitudes, 'icono' => 'fa-phone', 'color' => 'card-orange'];
    $stat_card4 = ['titulo' => 'Auditorías en Bitácora', 'valor' => $tot_bitacora, 'icono' => 'fa-database', 'color' => 'card-purple'];
} elseif ($rol_id == 2) {
    // Supervisor
    $q_guard = pg_query($dbconn, "SELECT count(*) FROM public.guardias WHERE usuario_entrada_id = '$cedula_esc' OR usuario_salida_id = '$cedula_esc'");
    $tot_guardias = $q_guard ? (int)pg_fetch_row($q_guard)[0] : 0;

    $q_obs = pg_query($dbconn, "SELECT count(*) FROM public.observaciones");
    $tot_observaciones = $q_obs ? (int)pg_fetch_row($q_obs)[0] : 0;

    $q_sol_tot = pg_query($dbconn, "SELECT count(*) FROM public.solicitudes");
    $tot_solicitudes = $q_sol_tot ? (int)pg_fetch_row($q_sol_tot)[0] : 0;

    $stat_card1 = ['titulo' => 'Guardias Supervisadas', 'valor' => $tot_guardias, 'icono' => 'fa-calendar-check-o', 'color' => 'card-blue'];
    $stat_card2 = ['titulo' => 'Observaciones de Guardia', 'valor' => $tot_observaciones, 'icono' => 'fa-file-text-o', 'color' => 'card-teal'];
    $stat_card3 = ['titulo' => 'Solicitudes Totales', 'valor' => $tot_solicitudes, 'icono' => 'fa-phone', 'color' => 'card-orange'];
    $stat_card4 = ['titulo' => 'Mis Acciones en Bitácora', 'valor' => $total_acciones_usr, 'icono' => 'fa-history', 'color' => 'card-purple'];
} elseif ($rol_id == 3) {
    // Despachador
    $q_sol_desp = pg_query($dbconn, "SELECT count(*) FROM public.solicitud_atencion WHERE despachador_solicitud = '$cedula_esc'");
    $tot_despachos = $q_sol_desp ? (int)pg_fetch_row($q_sol_desp)[0] : 0;

    $q_desp_efec = pg_query($dbconn, "
        SELECT count(*) 
        FROM public.solicitudes s 
        INNER JOIN public.solicitud_atencion sa ON sa.solicitudes_id = s.id 
        WHERE sa.despachador_solicitud = '$cedula_esc' AND s.estatus_solicitud_id = 1
    ");
    $tot_efectivos = $q_desp_efec ? (int)pg_fetch_row($q_desp_efec)[0] : 0;

    $q_bienes = pg_query($dbconn, "SELECT count(*) FROM public.control_bienes");
    $tot_bienes = $q_bienes ? (int)pg_fetch_row($q_bienes)[0] : 0;

    $stat_card1 = ['titulo' => 'Despachos Realizados', 'valor' => $tot_despachos, 'icono' => 'fa-ambulance', 'color' => 'card-blue'];
    $stat_card2 = ['titulo' => 'Despachos Efectivos', 'valor' => $tot_efectivos, 'icono' => 'fa-check-circle', 'color' => 'card-teal'];
    $stat_card3 = ['titulo' => 'Controles de Bienes', 'valor' => $tot_bienes, 'icono' => 'fa-archive', 'color' => 'card-orange'];
    $stat_card4 = ['titulo' => 'Mis Acciones en Bitácora', 'valor' => $total_acciones_usr, 'icono' => 'fa-history', 'color' => 'card-purple'];
} else {
    // Operador (Rol 4)
    $q_sol_op = pg_query($dbconn, "SELECT count(*) FROM public.solicitud_atencion WHERE operador_solicitud = '$cedula_esc'");
    $tot_solicitudes_op = $q_sol_op ? (int)pg_fetch_row($q_sol_op)[0] : 0;

    $q_sol_hoy = pg_query($dbconn, "
        SELECT count(*) 
        FROM public.solicitudes s 
        INNER JOIN public.solicitud_atencion sa ON sa.solicitudes_id = s.id 
        WHERE sa.operador_solicitud = '$cedula_esc' AND s.fecha_sol = CURRENT_DATE
    ");
    $tot_hoy = $q_sol_hoy ? (int)pg_fetch_row($q_sol_hoy)[0] : 0;

    $q_cupaz = pg_query($dbconn, "SELECT count(*) FROM public.cuadrantes_de_paz");
    $tot_cupaz = $q_cupaz ? (int)pg_fetch_row($q_cupaz)[0] : 240;

    $stat_card1 = ['titulo' => 'Solicitudes 911 Atendidas', 'valor' => $tot_solicitudes_op, 'icono' => 'fa-headphones', 'color' => 'card-blue'];
    $stat_card2 = ['titulo' => 'Atendidas Hoy', 'valor' => $tot_hoy, 'icono' => 'fa-calendar-check-o', 'color' => 'card-teal'];
    $stat_card3 = ['titulo' => 'Cuadrantes CUPAZ', 'valor' => $tot_cupaz, 'icono' => 'fa-shield', 'color' => 'card-orange'];
    $stat_card4 = ['titulo' => 'Mis Acciones en Bitácora', 'valor' => $total_acciones_usr, 'icono' => 'fa-history', 'color' => 'card-purple'];
}

// 5. Historial reciente del usuario en bitácora
$query_bitacora_usr = pg_query($dbconn, "
    SELECT id, usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion 
    FROM public.bitacora 
    WHERE usuario_aplicacion = '$cedula_esc' OR usuario_aplicacion = '$usuario_esc' 
    ORDER BY fecha_operacion DESC, id DESC 
    LIMIT 15
");

// 6. Solicitudes recientes según rol
$solicitudes_recientes = [];
if ($rol_id == 4 || $rol_id == 3) {
    $filtro_sol = ($rol_id == 4) ? "sa.operador_solicitud = '$cedula_esc'" : "sa.despachador_solicitud = '$cedula_esc'";
    $q_mis_sol = pg_query($dbconn, "
        SELECT s.id, s.numero_sol, s.fecha_sol, s.hora_sol, s.sector_sol, s.cuadrante, s.organismo_cuadrante,
               sa.detalles_solicitud, sa.procedimiento_solicitud, es.tipo_estatus, p.nombre_parroquia
        FROM public.solicitudes s
        INNER JOIN public.solicitud_atencion sa ON sa.solicitudes_id = s.id
        LEFT JOIN public.estatus_solicitud es ON es.id = s.estatus_solicitud_id
        LEFT JOIN public.parroquias p ON p.id = s.parroquias_id
        WHERE $filtro_sol
        ORDER BY s.fecha_sol DESC, s.hora_sol DESC, s.id DESC
        LIMIT 10
    ");
    while ($r = pg_fetch_assoc($q_mis_sol)) {
        $solicitudes_recientes[] = $r;
    }
} elseif ($rol_id == 1) {
    // Para administrador: últimas solicitudes del sistema
    $q_todas_sol = pg_query($dbconn, "
        SELECT s.id, s.numero_sol, s.fecha_sol, s.hora_sol, s.sector_sol, s.cuadrante, s.organismo_cuadrante,
               sa.detalles_solicitud, sa.procedimiento_solicitud, es.tipo_estatus, p.nombre_parroquia
        FROM public.solicitudes s
        INNER JOIN public.solicitud_atencion sa ON sa.solicitudes_id = s.id
        LEFT JOIN public.estatus_solicitud es ON es.id = s.estatus_solicitud_id
        LEFT JOIN public.parroquias p ON p.id = s.parroquias_id
        ORDER BY s.fecha_sol DESC, s.hora_sol DESC, s.id DESC
        LIMIT 10
    ");
    while ($r = pg_fetch_assoc($q_todas_sol)) {
        $solicitudes_recientes[] = $r;
    }
} else {
    // Para supervisor: últimas observaciones de guardia
    $q_obs_rec = pg_query($dbconn, "
        SELECT o.id, o.notas, o.acciones_pen, o.apoyo_adm, o.fecha_creacion_obs, org.nombre_oganismos as organismo
        FROM public.observaciones o
        LEFT JOIN public.organismos org ON org.id = o.organismos_id
        ORDER BY o.fecha_creacion_obs DESC, o.id DESC
        LIMIT 10
    ");
    while ($r = pg_fetch_assoc($q_obs_rec)) {
        $solicitudes_recientes[] = $r;
    }
}
?>

<style>
/* ==============================================================
   ESTILOS MODERNOS DEL DASHBOARD / RESUMEN DE ACTIVIDADES
   ============================================================== */
.dashboard-container {
    padding: 10px 15px 40px 15px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}

/* Banner de Bienvenida */
.welcome-banner {
    background: linear-gradient(135deg, #1abb9c 0%, #00796b 50%, #004d40 100%);
    border-radius: 12px;
    color: #ffffff;
    padding: 22px 28px;
    margin-bottom: 25px;
    box-shadow: 0 6px 18px rgba(0, 77, 64, 0.25);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 15px;
}

.welcome-info {
    display: flex;
    align-items: center;
    gap: 18px;
}

.welcome-avatar {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    border: 3px solid rgba(255, 255, 255, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: #ffffff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.welcome-text h2 {
    margin: 0 0 4px 0;
    font-size: 24px;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 0.3px;
}

.welcome-text p {
    margin: 0;
    font-size: 13.5px;
    color: rgba(255, 255, 255, 0.9);
}

.welcome-meta {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items: center;
}

.badge-profile {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.35);
}

.badge-cedula {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    background: rgba(0, 0, 0, 0.2);
    color: #ffffff;
}

/* Tarjetas de Métricas */
.kpi-card {
    background: #ffffff;
    border-radius: 10px;
    padding: 20px 22px;
    margin-bottom: 22px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    border-left: 5px solid #1abb9c;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.25s ease;
}

.kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.kpi-card.card-blue { border-left-color: #3498db; }
.kpi-card.card-teal { border-left-color: #1abb9c; }
.kpi-card.card-orange { border-left-color: #e67e22; }
.kpi-card.card-purple { border-left-color: #9b59b6; }

.kpi-details .kpi-num {
    font-size: 32px;
    font-weight: 800;
    color: #2c3e50;
    line-height: 1;
    margin-bottom: 6px;
}

.kpi-details .kpi-title {
    font-size: 13px;
    font-weight: 600;
    color: #7f8c8d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0;
}

.kpi-icon {
    width: 54px;
    height: 54px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
}

.card-blue .kpi-icon { background: rgba(52, 152, 219, 0.12); color: #3498db; }
.card-teal .kpi-icon { background: rgba(26, 187, 156, 0.12); color: #1abb9c; }
.card-orange .kpi-icon { background: rgba(230, 126, 34, 0.12); color: #e67e22; }
.card-purple .kpi-icon { background: rgba(155, 89, 182, 0.12); color: #9b59b6; }

/* Barra de Accesos Rápidos */
.shortcuts-panel {
    background: #ffffff;
    border-radius: 10px;
    padding: 16px 20px;
    margin-bottom: 25px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.shortcuts-panel .shortcuts-title {
    font-size: 14px;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.shortcut-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-shortcut {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 12.5px;
    font-weight: 600;
    text-decoration: none !important;
    transition: all 0.2s ease;
    border: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.btn-shortcut-teal {
    background: linear-gradient(135deg, #1abb9c, #16a085);
    color: #ffffff !important;
}
.btn-shortcut-teal:hover {
    background: linear-gradient(135deg, #20c997, #1abc9c);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(26, 187, 156, 0.4);
}

.btn-shortcut-blue {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: #ffffff !important;
}
.btn-shortcut-blue:hover {
    background: linear-gradient(135deg, #5dade2, #3498db);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(52, 152, 219, 0.4);
}

.btn-shortcut-dark {
    background: linear-gradient(135deg, #34495e, #2c3e50);
    color: #ffffff !important;
}
.btn-shortcut-dark:hover {
    background: linear-gradient(135deg, #4a6278, #34495e);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(44, 62, 80, 0.4);
}

/* Panel Principal de Pestañas de Actividad */
.activities-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 30px;
}

.activities-header {
    background: #ffffff;
    border-bottom: 1px solid #eef2f5;
    padding: 16px 22px 0 22px;
}

.nav-tabs-modern {
    border-bottom: none;
    display: flex;
    gap: 8px;
    margin: 0;
}

.nav-tabs-modern > li > a {
    border: none !important;
    background: transparent !important;
    color: #7f8c8d !important;
    font-weight: 600;
    font-size: 13.5px;
    padding: 12px 18px;
    border-radius: 8px 8px 0 0;
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
    transition: all 0.2s ease;
    cursor: pointer;
}

.nav-tabs-modern > li.active > a,
.nav-tabs-modern > li > a:hover {
    color: #1abb9c !important;
    background: #f8fafb !important;
    border-bottom: 3px solid #1abb9c !important;
}

.activities-body {
    padding: 20px 22px;
}

/* Tabla de Actividades */
.table-activities {
    width: 100%;
    margin-bottom: 0;
}

.table-activities th {
    background: #f8fafb;
    color: #34495e;
    font-weight: 700;
    font-size: 12.5px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-top: none !important;
    border-bottom: 2px solid #eef2f5 !important;
    padding: 12px 14px;
}

.table-activities td {
    padding: 12px 14px;
    vertical-align: middle !important;
    font-size: 13px;
    color: #2c3e50;
    border-top: 1px solid #f1f4f6;
}

.table-activities tbody tr:hover {
    background-color: #fcfdfe;
}

/* Badges de Operaciones */
.badge-proc {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-proc-validar { background: #e8f4fd; color: #2980b9; border: 1px solid #bce8f1; }
.badge-proc-insertar { background: #eafaf1; color: #27ae60; border: 1px solid #d4efdf; }
.badge-proc-modificar { background: #fef5e7; color: #d35400; border: 1px solid #fadbd8; }
.badge-proc-eliminar { background: #fdedec; color: #c0392b; border: 1px solid #f5b7b1; }
.badge-proc-otro { background: #f4f6f7; color: #566573; border: 1px solid #eaeded; }

.badge-estatus {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11.5px;
    font-weight: 600;
}

.badge-estatus-efectivo { background: #27ae60; color: #fff; }
.badge-estatus-pendiente { background: #f39c12; color: #fff; }
.badge-estatus-sabotaje { background: #c0392b; color: #fff; }
.badge-estatus-info { background: #3498db; color: #fff; }
.badge-estatus-otro { background: #7f8c8d; color: #fff; }

.empty-state {
    text-align: center;
    padding: 40px 20px;
    color: #95a5a6;
}

.empty-state i {
    font-size: 42px;
    margin-bottom: 12px;
    color: #bdc3c7;
}

.empty-state p {
    font-size: 14px;
    margin: 0;
}
</style>

<div class="dashboard-container">
    <!-- 1. BANNER DE BIENVENIDA -->
    <div class="welcome-banner">
        <div class="welcome-info">
            <div class="welcome-avatar">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="welcome-text">
                <h2><?php echo htmlspecialchars($saludo . ', ' . $nombre_completo); ?>!</h2>
                <p>
                    <i class="fa fa-building-o"></i> <strong><?php echo htmlspecialchars($organismo_nombre); ?></strong> 
                    &bull; Cargo: <span><?php echo htmlspecialchars($cargo_nombre); ?></span>
                </p>
            </div>
        </div>
        <div class="welcome-meta">
            <span class="badge-profile">
                <i class="fa fa-shield"></i> Perfil: <?php echo htmlspecialchars($rol_nombre); ?>
            </span>
            <span class="badge-cedula">
                <i class="fa fa-id-card-o"></i> Cédula: <?php echo number_format((int)$cedula_usuario, 0, '', '.'); ?>
            </span>
            <span class="badge-cedula" title="Último ingreso registrado antes de esta sesión">
                <i class="fa fa-clock-o"></i> Último acceso: <?php echo htmlspecialchars($ultimo_acceso); ?>
            </span>
        </div>
    </div>

    <!-- 2. TARJETAS DE MÉTRICAS (KPIs) -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card <?php echo $stat_card1['color']; ?>">
                <div class="kpi-details">
                    <div class="kpi-num"><?php echo number_format($stat_card1['valor']); ?></div>
                    <p class="kpi-title"><?php echo htmlspecialchars($stat_card1['titulo']); ?></p>
                </div>
                <div class="kpi-icon">
                    <i class="fa <?php echo $stat_card1['icono']; ?>"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card <?php echo $stat_card2['color']; ?>">
                <div class="kpi-details">
                    <div class="kpi-num"><?php echo number_format($stat_card2['valor']); ?></div>
                    <p class="kpi-title"><?php echo htmlspecialchars($stat_card2['titulo']); ?></p>
                </div>
                <div class="kpi-icon">
                    <i class="fa <?php echo $stat_card2['icono']; ?>"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card <?php echo $stat_card3['color']; ?>">
                <div class="kpi-details">
                    <div class="kpi-num"><?php echo number_format($stat_card3['valor']); ?></div>
                    <p class="kpi-title"><?php echo htmlspecialchars($stat_card3['titulo']); ?></p>
                </div>
                <div class="kpi-icon">
                    <i class="fa <?php echo $stat_card3['icono']; ?>"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card <?php echo $stat_card4['color']; ?>">
                <div class="kpi-details">
                    <div class="kpi-num"><?php echo number_format($stat_card4['valor']); ?></div>
                    <p class="kpi-title"><?php echo htmlspecialchars($stat_card4['titulo']); ?></p>
                </div>
                <div class="kpi-icon">
                    <i class="fa <?php echo $stat_card4['icono']; ?>"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. ACCESOS RÁPIDOS SEGÚN EL ROL -->
    <div class="shortcuts-panel">
        <h4 class="shortcuts-title">
            <i class="fa fa-bolt" style="color: #f39c12;"></i> Accesos Rápidos
        </h4>
        <div class="shortcut-buttons">
            <?php if ($rol_id == 1): // Administrador ?>
                <a href="../administrador/cuadrantes.php" class="btn-shortcut btn-shortcut-teal">
                    <i class="fa fa-shield"></i> Cuadrantes CUPAZ
                </a>
                <a href="../administrador/registro_actividades.php" class="btn-shortcut btn-shortcut-blue">
                    <i class="fa fa-history"></i> Auditoría Bitácora
                </a>
                <a href="../administrador/consulta_registro_personal.php" class="btn-shortcut btn-shortcut-dark">
                    <i class="fa fa-user-plus"></i> Nuevo Personal
                </a>
                <a href="../administrador/respaldo_bd.php" class="btn-shortcut btn-shortcut-dark">
                    <i class="fa fa-database"></i> Respaldo BD
                </a>
            <?php elseif ($rol_id == 2): // Supervisor ?>
                <a href="../supervisor/nueva_solicitud01.php" class="btn-shortcut btn-shortcut-teal">
                    <i class="fa fa-plus-circle"></i> Nueva Solicitud
                </a>
                <a href="../supervisor/cierre_solicitud.php" class="btn-shortcut btn-shortcut-blue">
                    <i class="fa fa-check-square-o"></i> Cierre de Solicitud
                </a>
                <a href="../supervisor/observaciones_personal.php" class="btn-shortcut btn-shortcut-dark">
                    <i class="fa fa-pencil-square-o"></i> Observaciones
                </a>
                <a href="../administrador/cuadrantes.php" class="btn-shortcut btn-shortcut-teal">
                    <i class="fa fa-shield"></i> CUPAZ Cuadrantes
                </a>
            <?php elseif ($rol_id == 3): // Despachador ?>
                <a href="../despachador/cierre_solicitud.php" class="btn-shortcut btn-shortcut-blue">
                    <i class="fa fa-ambulance"></i> Cierre Despacho
                </a>
                <a href="../despachador/nueva_observacion.php" class="btn-shortcut btn-shortcut-dark">
                    <i class="fa fa-pencil"></i> Nueva Observación
                </a>
                <a href="../administrador/cuadrantes.php" class="btn-shortcut btn-shortcut-teal">
                    <i class="fa fa-shield"></i> Cuadrantes CUPAZ
                </a>
            <?php else: // Operador ?>
                <a href="../operador/nueva_solicitud.php" class="btn-shortcut btn-shortcut-teal">
                    <i class="fa fa-plus-circle"></i> Nueva Solicitud 911
                </a>
                <a href="../administrador/cuadrantes.php" class="btn-shortcut btn-shortcut-blue">
                    <i class="fa fa-shield"></i> Cuadrantes CUPAZ
                </a>
                <a href="../operador/nueva_observacion.php" class="btn-shortcut btn-shortcut-dark">
                    <i class="fa fa-pencil"></i> Nueva Observación
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- 4. PESTAÑAS DE RESUMEN DE ACTIVIDADES -->
    <div class="activities-card">
        <div class="activities-header">
            <ul class="nav nav-tabs nav-tabs-modern" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab-bitacora" aria-controls="tab-bitacora" role="tab" data-toggle="tab">
                        <i class="fa fa-list-alt"></i> Mi Bitácora de Actividades (<?php echo pg_num_rows($query_bitacora_usr); ?>)
                    </a>
                </li>
                <li role="presentation">
                    <a href="#tab-especifica" aria-controls="tab-especifica" role="tab" data-toggle="tab">
                        <?php if ($rol_id == 1): ?>
                            <i class="fa fa-globe"></i> Solicitudes Recientes del Sistema
                        <?php elseif ($rol_id == 2): ?>
                            <i class="fa fa-file-text-o"></i> Observaciones de Guardia
                        <?php else: ?>
                            <i class="fa fa-phone"></i> Mis Solicitudes Registradas (<?php echo count($solicitudes_recientes); ?>)
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="activities-body tab-content">
            <!-- TAB 1: BITÁCORA DEL USUARIO -->
            <div role="tabpanel" class="tab-pane active" id="tab-bitacora">
                <?php if (pg_num_rows($query_bitacora_usr) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-activities">
                            <thead>
                                <tr>
                                    <th style="width: 150px;">Fecha y Hora</th>
                                    <th style="width: 110px;">Proceso</th>
                                    <th style="width: 160px;">Módulo / Esquema</th>
                                    <th style="width: 130px;">Tabla</th>
                                    <th>Detalle de la Operación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($bit = pg_fetch_assoc($query_bitacora_usr)): 
                                    $proc_upper = strtoupper(trim($bit['proceso'] ?? ''));
                                    $badge_class = 'badge-proc-otro';
                                    if (strpos($proc_upper, 'VALID') !== false) {
                                        $badge_class = 'badge-proc-validar';
                                    } elseif (strpos($proc_upper, 'INSERT') !== false) {
                                        $badge_class = 'badge-proc-insertar';
                                    } elseif (strpos($proc_upper, 'MODIF') !== false) {
                                        $badge_class = 'badge-proc-modificar';
                                    } elseif (strpos($proc_upper, 'ELIMIN') !== false) {
                                        $badge_class = 'badge-proc-eliminar';
                                    }
                                    
                                    $f_formateada = date('d/m/Y h:i A', strtotime($bit['fecha_operacion']));
                                    $detalle_texto = $bit['valor_nuevo'] ?? '-';
                                    if (strlen($detalle_texto) > 130) {
                                        $detalle_texto = substr($detalle_texto, 0, 130) . '...';
                                    }
                                ?>
                                <tr>
                                    <td>
                                        <i class="fa fa-clock-o text-muted"></i> 
                                        <strong><?php echo htmlspecialchars($f_formateada); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge-proc <?php echo $badge_class; ?>">
                                            <?php echo htmlspecialchars($bit['proceso']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <i class="fa fa-folder-open-o text-muted"></i> 
                                        <?php echo htmlspecialchars($bit['nombre_esquema'] ?: 'General'); ?>
                                    </td>
                                    <td>
                                        <code><?php echo htmlspecialchars($bit['nombre_tabla'] ?: '-'); ?></code>
                                    </td>
                                    <td style="color: #444;">
                                        <?php echo htmlspecialchars($detalle_texto); ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fa fa-history"></i>
                        <p>No se registran actividades previas en bitácora para tu usuario.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- TAB 2: ACTIVIDAD ESPECÍFICA (SOLICITUDES / OBSERVACIONES) -->
            <div role="tabpanel" class="tab-pane" id="tab-especifica">
                <?php if ($rol_id == 2): // Supervisor: Observaciones ?>
                    <?php if (!empty($solicitudes_recientes)): ?>
                        <div class="table-responsive">
                            <table class="table table-activities">
                                <thead>
                                    <tr>
                                        <th style="width: 140px;">Fecha</th>
                                        <th style="width: 160px;">Organismo</th>
                                        <th>Observación / Notas</th>
                                        <th style="width: 200px;">Acciones Pendientes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($solicitudes_recientes as $obs): ?>
                                    <tr>
                                        <td>
                                            <i class="fa fa-calendar-o text-muted"></i> 
                                            <?php echo date('d/m/Y h:i A', strtotime($obs['fecha_creacion_obs'])); ?>
                                        </td>
                                        <td>
                                            <span class="label label-info">
                                                <?php echo htmlspecialchars($obs['organismo'] ?: 'General'); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($obs['notas'] ?: 'Sin notas registradas'); ?>
                                        </td>
                                        <td class="text-danger">
                                            <?php echo htmlspecialchars($obs['acciones_pen'] ?: 'Ninguna'); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fa fa-file-text-o"></i>
                            <p>No se encontraron observaciones de guardia registradas.</p>
                        </div>
                    <?php endif; ?>

                <?php else: // Operador, Despachador o Administrador: Solicitudes ?>
                    <?php if (!empty($solicitudes_recientes)): ?>
                        <div class="table-responsive">
                            <table class="table table-activities">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">ID</th>
                                        <th style="width: 130px;">Fecha / Hora</th>
                                        <th style="width: 140px;">Cuadrante</th>
                                        <th style="width: 160px;">Parroquia</th>
                                        <th>Detalles de Emergencia</th>
                                        <th style="width: 120px;">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($solicitudes_recientes as $sol): 
                                        $f_sol = date('d/m/Y', strtotime($sol['fecha_sol']));
                                        $h_sol = !empty($sol['hora_sol']) ? substr($sol['hora_sol'], 0, 5) : '';
                                        
                                        $estatus_nombre = $sol['tipo_estatus'] ?: 'Pendiente';
                                        $estatus_class = 'badge-estatus-otro';
                                        if (stripos($estatus_nombre, 'Efectivo') !== false && stripos($estatus_nombre, 'No') === false) {
                                            $estatus_class = 'badge-estatus-efectivo';
                                        } elseif (stripos($estatus_nombre, 'Pendiente') !== false) {
                                            $estatus_class = 'badge-estatus-pendiente';
                                        } elseif (stripos($estatus_nombre, 'Sabotaje') !== false) {
                                            $estatus_class = 'badge-estatus-sabotaje';
                                        } elseif (stripos($estatus_nombre, 'Información') !== false) {
                                            $estatus_class = 'badge-estatus-info';
                                        }
                                        
                                        $detalle = $sol['detalles_solicitud'] ?: '-';
                                        if (strlen($detalle) > 110) {
                                            $detalle = substr($detalle, 0, 110) . '...';
                                        }
                                    ?>
                                    <tr>
                                        <td><strong>#<?php echo $sol['id']; ?></strong></td>
                                        <td>
                                            <i class="fa fa-clock-o text-muted"></i> 
                                            <?php echo $f_sol . ' ' . $h_sol; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($sol['cuadrante'])): ?>
                                                <span class="label label-primary" style="font-size: 11px;">
                                                    <i class="fa fa-shield"></i> <?php echo htmlspecialchars($sol['cuadrante']); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-muted">No asignado</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <i class="fa fa-map-marker text-danger"></i> 
                                            <?php echo htmlspecialchars($sol['nombre_parroquia'] ?: 'No especificada'); ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($detalle); ?></td>
                                        <td>
                                            <span class="badge-estatus <?php echo $estatus_class; ?>">
                                                <?php echo htmlspecialchars($estatus_nombre); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fa fa-phone"></i>
                            <p>No se encontraron solicitudes registradas para tu usuario aún.</p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tabLinks = document.querySelectorAll('.nav-tabs-modern a');
    tabLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            if (window.jQuery && typeof jQuery(this).tab === 'function') {
                jQuery(this).tab('show');
            } else {
                tabLinks.forEach(function(l) { 
                    l.parentElement.classList.remove('active'); 
                });
                document.querySelectorAll('.activities-body .tab-pane').forEach(function(p) { 
                    p.classList.remove('active'); 
                });
                this.parentElement.classList.add('active');
                var targetId = this.getAttribute('href');
                var targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('active');
                }
            }
        });
    });
});
</script>
