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
require_once '../config/permisos_helper.php';

// -------------------------------------------------------------
// 1. PROCESAR SINCRONIZACIÓN MASIVA DE TODOS LOS USUARIOS
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'sincronizar_todos_perfiles') {
    $admin_user = pg_escape_string($dbconn, $_SESSION['usuario'] ?? 'ADMIN');
    $q_all = pg_query($dbconn, "SELECT id, tipo_rol_id, usuario FROM public.usuario ORDER BY id ASC");
    $total_sincronizados = 0;
    
    if ($q_all) {
        while ($u = pg_fetch_assoc($q_all)) {
            $uid = intval($u['id']);
            $rol = intval($u['tipo_rol_id'] ?? 4);
            $p = obtener_permisos_por_rol($rol);
            
            $sql_sync = "
            INSERT INTO public.usuario_permisos (
                usuario_id, modulo_administrador, modulo_personal, modulo_bienes,
                modulo_seguridad, modulo_solicitudes, modulo_estadisticas, modulo_respaldo,
                modulo_actividades, modulo_cupaz, modulo_ayuda, modulo_calendario, accion_consultar,
                accion_crear, accion_editar, accion_eliminar, accion_exportar_bd,
                accion_importar_bd, actualizado_por, fecha_actualizacion
            ) VALUES (
                $uid, '{$p['modulo_administrador']}', '{$p['modulo_personal']}', '{$p['modulo_bienes']}',
                '{$p['modulo_seguridad']}', '{$p['modulo_solicitudes']}', '{$p['modulo_estadisticas']}', '{$p['modulo_respaldo']}',
                '{$p['modulo_actividades']}', '{$p['modulo_cupaz']}', '{$p['modulo_ayuda']}', '{$p['modulo_calendario']}', '{$p['accion_consultar']}',
                '{$p['accion_crear']}', '{$p['accion_editar']}', '{$p['accion_eliminar']}', '{$p['accion_exportar_bd']}',
                '{$p['accion_importar_bd']}', '$admin_user', NOW()
            )
            ON CONFLICT (usuario_id) DO UPDATE SET
                modulo_administrador = EXCLUDED.modulo_administrador,
                modulo_personal = EXCLUDED.modulo_personal,
                modulo_bienes = EXCLUDED.modulo_bienes,
                modulo_seguridad = EXCLUDED.modulo_seguridad,
                modulo_solicitudes = EXCLUDED.modulo_solicitudes,
                modulo_estadisticas = EXCLUDED.modulo_estadisticas,
                modulo_respaldo = EXCLUDED.modulo_respaldo,
                modulo_actividades = EXCLUDED.modulo_actividades,
                modulo_cupaz = EXCLUDED.modulo_cupaz,
                modulo_ayuda = EXCLUDED.modulo_ayuda,
                modulo_calendario = EXCLUDED.modulo_calendario,
                accion_consultar = EXCLUDED.accion_consultar,
                accion_crear = EXCLUDED.accion_crear,
                accion_editar = EXCLUDED.accion_editar,
                accion_eliminar = EXCLUDED.accion_eliminar,
                accion_exportar_bd = EXCLUDED.accion_exportar_bd,
                accion_importar_bd = EXCLUDED.accion_importar_bd,
                actualizado_por = EXCLUDED.actualizado_por,
                fecha_actualizacion = NOW();
            ";
            pg_query($dbconn, $sql_sync);
            $total_sincronizados++;
        }
    }
    
    $detalles = "Sincronización masiva de permisos según perfil completada para $total_sincronizados usuarios";
    @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$admin_user', 'ADMINISTRACION', 'PERMISOS USUARIO', 'SINCRONIZAR_TODOS', '$detalles', NOW())");
    
    $ret_uid = intval($_POST['usuario_id'] ?? 0);
    header("Location: permisos_usuario.php?usuario_id=$ret_uid&msg=sync_all_ok&total=$total_sincronizados");
    exit();
}

// -------------------------------------------------------------
// 2. PROCESAR RESTABLECIMIENTO SEGÚN PERFIL PARA UN USUARIO
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'restablecer_perfil_usuario') {
    $target_uid = intval($_POST['usuario_id'] ?? 0);
    if ($target_uid > 0) {
        $u_info = pg_fetch_assoc(pg_query($dbconn, "SELECT usuario, tipo_rol_id FROM public.usuario WHERE id = $target_uid"));
        if ($u_info) {
            $p = obtener_permisos_por_rol($u_info['tipo_rol_id'] ?? 4);
            $admin_user = pg_escape_string($dbconn, $_SESSION['usuario'] ?? 'ADMIN');
            
            $sql_reset = "
            INSERT INTO public.usuario_permisos (
                usuario_id, modulo_administrador, modulo_personal, modulo_bienes,
                modulo_seguridad, modulo_solicitudes, modulo_estadisticas, modulo_respaldo,
                modulo_actividades, modulo_cupaz, modulo_ayuda, modulo_calendario, accion_consultar,
                accion_crear, accion_editar, accion_eliminar, accion_exportar_bd,
                accion_importar_bd, actualizado_por, fecha_actualizacion
            ) VALUES (
                $target_uid, '{$p['modulo_administrador']}', '{$p['modulo_personal']}', '{$p['modulo_bienes']}',
                '{$p['modulo_seguridad']}', '{$p['modulo_solicitudes']}', '{$p['modulo_estadisticas']}', '{$p['modulo_respaldo']}',
                '{$p['modulo_actividades']}', '{$p['modulo_cupaz']}', '{$p['modulo_ayuda']}', '{$p['modulo_calendario']}', '{$p['accion_consultar']}',
                '{$p['accion_crear']}', '{$p['accion_editar']}', '{$p['accion_eliminar']}', '{$p['accion_exportar_bd']}',
                '{$p['accion_importar_bd']}', '$admin_user', NOW()
            )
            ON CONFLICT (usuario_id) DO UPDATE SET
                modulo_administrador = EXCLUDED.modulo_administrador,
                modulo_personal = EXCLUDED.modulo_personal,
                modulo_bienes = EXCLUDED.modulo_bienes,
                modulo_seguridad = EXCLUDED.modulo_seguridad,
                modulo_solicitudes = EXCLUDED.modulo_solicitudes,
                modulo_estadisticas = EXCLUDED.modulo_estadisticas,
                modulo_respaldo = EXCLUDED.modulo_respaldo,
                modulo_actividades = EXCLUDED.modulo_actividades,
                modulo_cupaz = EXCLUDED.modulo_cupaz,
                modulo_ayuda = EXCLUDED.modulo_ayuda,
                modulo_calendario = EXCLUDED.modulo_calendario,
                accion_consultar = EXCLUDED.accion_consultar,
                accion_crear = EXCLUDED.accion_crear,
                accion_editar = EXCLUDED.accion_editar,
                accion_eliminar = EXCLUDED.accion_eliminar,
                accion_exportar_bd = EXCLUDED.accion_exportar_bd,
                accion_importar_bd = EXCLUDED.accion_importar_bd,
                actualizado_por = EXCLUDED.actualizado_por,
                fecha_actualizacion = NOW();
            ";
            pg_query($dbconn, $sql_reset);
            
            $detalles = "Permisos restablecidos exactamente según perfil para usuario: {$u_info['usuario']} (ID: $target_uid)";
            @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$admin_user', 'ADMINISTRACION', 'PERMISOS USUARIO', 'RESTABLECER', '$detalles', NOW())");
        }
        header("Location: permisos_usuario.php?usuario_id=$target_uid&msg=reset_ok");
        exit();
    }
}

// -------------------------------------------------------------
// 3. PROCESAR GUARDADO DE PERMISOS
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'guardar_permisos') {
    $target_uid = intval($_POST['usuario_id'] ?? 0);
    
    if ($target_uid > 0) {
        // Módulos
        $m_admin        = isset($_POST['modulo_administrador']) ? 'true' : 'false';
        $m_personal     = isset($_POST['modulo_personal']) ? 'true' : 'false';
        $m_bienes       = isset($_POST['modulo_bienes']) ? 'true' : 'false';
        $m_seguridad    = isset($_POST['modulo_seguridad']) ? 'true' : 'false';
        $m_solicitudes  = isset($_POST['modulo_solicitudes']) ? 'true' : 'false';
        $m_estadisticas = isset($_POST['modulo_estadisticas']) ? 'true' : 'false';
        $m_respaldo     = isset($_POST['modulo_respaldo']) ? 'true' : 'false';
        $m_actividades  = isset($_POST['modulo_actividades']) ? 'true' : 'false';
        $m_cupaz        = isset($_POST['modulo_cupaz']) ? 'true' : 'false';
        $m_ayuda        = isset($_POST['modulo_ayuda']) ? 'true' : 'false';
        $m_calendario   = isset($_POST['modulo_calendario']) ? 'true' : 'false';
        
        // Acciones
        $a_consultar    = isset($_POST['accion_consultar']) ? 'true' : 'false';
        $a_crear        = isset($_POST['accion_crear']) ? 'true' : 'false';
        $a_editar       = isset($_POST['accion_editar']) ? 'true' : 'false';
        $a_eliminar     = isset($_POST['accion_eliminar']) ? 'true' : 'false';
        $a_exportar_bd  = isset($_POST['accion_exportar_bd']) ? 'true' : 'false';
        $a_importar_bd  = isset($_POST['accion_importar_bd']) ? 'true' : 'false';
        
        $admin_user = pg_escape_string($dbconn, $_SESSION['usuario'] ?? 'ADMIN');
        
        // Actualizar o insertar permisos (UPSERT)
        $sql_upsert = "
        INSERT INTO public.usuario_permisos (
            usuario_id, modulo_administrador, modulo_personal, modulo_bienes,
            modulo_seguridad, modulo_solicitudes, modulo_estadisticas, modulo_respaldo,
            modulo_actividades, modulo_cupaz, modulo_ayuda, modulo_calendario, accion_consultar,
            accion_crear, accion_editar, accion_eliminar, accion_exportar_bd,
            accion_importar_bd, actualizado_por, fecha_actualizacion
        ) VALUES (
            $target_uid, $m_admin, $m_personal, $m_bienes,
            $m_seguridad, $m_solicitudes, $m_estadisticas, $m_respaldo,
            $m_actividades, $m_cupaz, $m_ayuda, $m_calendario, $a_consultar,
            $a_crear, $a_editar, $a_eliminar, $a_exportar_bd,
            $a_importar_bd, '$admin_user', NOW()
        )
        ON CONFLICT (usuario_id) DO UPDATE SET
            modulo_administrador = EXCLUDED.modulo_administrador,
            modulo_personal = EXCLUDED.modulo_personal,
            modulo_bienes = EXCLUDED.modulo_bienes,
            modulo_seguridad = EXCLUDED.modulo_seguridad,
            modulo_solicitudes = EXCLUDED.modulo_solicitudes,
            modulo_estadisticas = EXCLUDED.modulo_estadisticas,
            modulo_respaldo = EXCLUDED.modulo_respaldo,
            modulo_actividades = EXCLUDED.modulo_actividades,
            modulo_cupaz = EXCLUDED.modulo_cupaz,
            modulo_ayuda = EXCLUDED.modulo_ayuda,
            modulo_calendario = EXCLUDED.modulo_calendario,
            accion_consultar = EXCLUDED.accion_consultar,
            accion_crear = EXCLUDED.accion_crear,
            accion_editar = EXCLUDED.accion_editar,
            accion_eliminar = EXCLUDED.accion_eliminar,
            accion_exportar_bd = EXCLUDED.accion_exportar_bd,
            accion_importar_bd = EXCLUDED.accion_importar_bd,
            actualizado_por = EXCLUDED.actualizado_por,
            fecha_actualizacion = NOW();
        ";
        pg_query($dbconn, $sql_upsert);
        
        // Actualizar rol o estado si fueron enviados
        if (isset($_POST['tipo_rol_id'])) {
            $nuevo_rol = intval($_POST['tipo_rol_id']);
            $nuevo_est = intval($_POST['estado_usuario_id'] ?? 1);
            pg_query($dbconn, "UPDATE public.usuario SET tipo_rol_id = $nuevo_rol, estado_usuario_id = $nuevo_est WHERE id = $target_uid");
        }
        
        // Registrar en bitácora
        $u_info = pg_fetch_assoc(pg_query($dbconn, "SELECT usuario FROM public.usuario WHERE id = $target_uid"));
        $u_name = $u_info['usuario'] ?? 'ID:' . $target_uid;
        $detalles = "Permisos actualizados para usuario: $u_name (ID: $target_uid)";
        @pg_query($dbconn, "INSERT INTO bitacora (usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$admin_user', 'ADMINISTRACION', 'PERMISOS USUARIO', 'MODIFICAR', '$detalles', NOW())");
        
        header("Location: permisos_usuario.php?usuario_id=$target_uid&msg=saved_ok");
        exit();
    }
}

// Obtener todos los usuarios del sistema para el listado y selección
$sql_usuarios = "
    SELECT u.id, u.usuario, u.tipo_rol_id, r.tipo_rol, u.personal_cedula,
           p.p_nombre, p.p_apellido, u.estado_usuario_id,
           COALESCE(perm.id, 0) as tiene_permisos_personalizados,
           perm.modulo_administrador, perm.modulo_personal, perm.modulo_bienes,
           perm.modulo_seguridad, perm.modulo_solicitudes, perm.modulo_estadisticas,
           perm.modulo_respaldo, perm.modulo_actividades, perm.modulo_cupaz, perm.modulo_ayuda, perm.modulo_calendario,
           perm.accion_consultar, perm.accion_crear, perm.accion_editar,
           perm.accion_eliminar, perm.accion_exportar_bd, perm.accion_importar_bd
    FROM public.usuario u
    LEFT JOIN public.tipo_rol r ON u.tipo_rol_id = r.id
    LEFT JOIN public.personal p ON u.personal_cedula = p.cedula
    LEFT JOIN public.usuario_permisos perm ON u.id = perm.usuario_id
    ORDER BY u.id ASC
";
$res_usuarios = pg_query($dbconn, $sql_usuarios);
$usuarios_lista = [];
while ($u = pg_fetch_assoc($res_usuarios)) {
    $usuarios_lista[] = $u;
}

// Determinar el usuario seleccionado (por defecto el primero o el indicado por GET)
$selected_uid = isset($_GET['usuario_id']) ? intval($_GET['usuario_id']) : (isset($usuarios_lista[0]['id']) ? intval($usuarios_lista[0]['id']) : 0);

// Cargar información del usuario seleccionado
$selected_user = null;
foreach ($usuarios_lista as $u) {
    if ($u['id'] == $selected_uid) {
        $selected_user = $u;
        break;
    }
}

// Cargar permisos actuales del usuario seleccionado
$permisos_actuales = null;
if ($selected_user) {
    $q_perm = pg_query($dbconn, "SELECT * FROM public.usuario_permisos WHERE usuario_id = $selected_uid");
    if ($q_perm && pg_num_rows($q_perm) > 0) {
        $permisos_actuales = pg_fetch_assoc($q_perm);
    } else {
        // Valores estándar que coinciden exactamente con el rol/perfil actual
        $permisos_actuales = obtener_permisos_por_rol($selected_user['tipo_rol_id'] ?? 4);
    }
}

// Función helper para verificar checkbox marcado
function is_checked($val) {
    return ($val === 't' || $val === true || $val === 1 || $val === '1') ? 'checked' : '';
}
?>

<!-- Estilos y Cabecera Superior -->
<?php require_once '../plantillas/superior3.php'; ?>

<style>
.perm-card {
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border: 1px solid #e1e8ed;
    background: #ffffff;
    padding: 22px;
    margin-bottom: 25px;
}
.custom-switch-item {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    padding: 12px 15px;
    margin-bottom: 10px;
    transition: background 0.2s ease, border-color 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.custom-switch-item:hover {
    background: #edf2f7;
    border-color: #cbd5e0;
}
.custom-switch-item label {
    margin-bottom: 0;
    cursor: pointer;
    font-size: 13.5px;
    font-weight: 600;
    color: #2d3748;
    flex-grow: 1;
}
.custom-switch-item input[type="checkbox"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
    accent-color: #1abb9c;
}
.role-badge-adm { background-color: #e74c3c; color: white; }
.role-badge-sup { background-color: #f39c12; color: white; }
.role-badge-desp { background-color: #3498db; color: white; }
.role-badge-op { background-color: #2ecc71; color: white; }

.btn-preset {
    font-size: 12px;
    font-weight: 600;
    padding: 6px 12px;
    margin-right: 5px;
    margin-bottom: 5px;
    border-radius: 6px;
}
</style>

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
            <h3><i class="fa fa-key"></i> GESTIÓN DE PERMISOS Y ACCESOS DE USUARIOS</h3>
          </div>
          <div class="title_right text-right">
            <!-- Botón de Sincronización Masiva según Perfil -->
            <button type="button" class="btn btn-warning btn-sm font-weight-bold shadow-sm" onclick="sincronizarTodos()" title="Sincronizar permisos de todos los usuarios registrados según su perfil actual">
              <i class="fa fa-refresh"></i> Sincronizar Todos según Perfil
            </button>
            <a href="respaldo_bd.php" class="btn btn-outline-secondary btn-sm font-weight-bold">
              <i class="fa fa-database"></i> Respaldo BD
            </a>
            <a href="registro_actividades.php" class="btn btn-outline-secondary btn-sm font-weight-bold">
              <i class="fa fa-history"></i> Registro Actividades
            </a>
          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Formulario oculto para sincronización masiva -->
        <form id="form_sync_all" method="POST" action="permisos_usuario.php" style="display:none;">
          <input type="hidden" name="action" value="sincronizar_todos_perfiles">
          <input type="hidden" name="usuario_id" value="<?php echo $selected_uid; ?>">
        </form>

        <!-- Alertas de Estado -->
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'saved_ok'): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle"></i> <strong>¡Permisos Actualizados!</strong> Se han guardado satisfactoriamente los módulos y acciones para el usuario seleccionado.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'sync_all_ok'): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle"></i> <strong>¡Sincronización Masiva Exitosa!</strong> Se han sincronizado los permisos de todos los usuarios (<?php echo intval($_GET['total'] ?? 0); ?> usuarios) garantizando que coincidan con su perfil asignado.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'reset_ok'): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fa fa-info-circle"></i> <strong>¡Permisos Restablecidos!</strong> Los permisos del usuario fueron restablecidos exactamente a los de su perfil/rol.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php endif; ?>

        <!-- Selector Principal de Usuario -->
        <div class="perm-card">
          <div class="row align-items-center">
            <div class="col-md-5 col-sm-12 mb-2">
              <label class="font-weight-bold text-secondary" style="font-size: 14px;">
                <i class="fa fa-user-circle"></i> Seleccionar Usuario a Gestionar:
              </label>
              <select class="form-control" id="select-usuario" onchange="seleccionarUsuario(this.value)" style="font-size: 14px; font-weight: bold; border: 2px solid #1abb9c; border-radius: 6px;">
                <?php foreach ($usuarios_lista as $usr): ?>
                  <?php
                    $nombre_fmt = trim(($usr['p_nombre'] ?? '') . ' ' . ($usr['p_apellido'] ?? ''));
                    $label_user = $usr['usuario'] . ' (' . ($nombre_fmt ?: 'Sin Nombre') . ' - CI: ' . $usr['personal_cedula'] . ') [' . $usr['tipo_rol'] . ']';
                  ?>
                  <option value="<?php echo $usr['id']; ?>" <?php if ($usr['id'] == $selected_uid) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($label_user); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Ficha del Usuario Seleccionado -->
            <?php if ($selected_user): ?>
              <?php
                $role_badge = 'role-badge-op';
                if ($selected_user['tipo_rol_id'] == 1) $role_badge = 'role-badge-adm';
                elseif ($selected_user['tipo_rol_id'] == 2) $role_badge = 'role-badge-sup';
                elseif ($selected_user['tipo_rol_id'] == 3) $role_badge = 'role-badge-desp';
              ?>
              <div class="col-md-7 col-sm-12">
                <div class="bg-light p-3 rounded border d-flex align-items-center justify-content-between flex-wrap">
                  <div class="d-flex align-items-center mb-2">
                    <div class="bg-white border rounded-circle p-2 mr-3 text-center" style="width: 50px; height: 50px;">
                      <i class="fa fa-user fa-2x text-primary"></i>
                    </div>
                    <div>
                      <h5 class="mb-0 font-weight-bold"><?php echo htmlspecialchars(($selected_user['p_nombre'] ?? '') . ' ' . ($selected_user['p_apellido'] ?? '')); ?></h5>
                      <span class="text-muted small">Usuario: <strong><?php echo htmlspecialchars($selected_user['usuario']); ?></strong> | Cédula: <strong><?php echo htmlspecialchars($selected_user['personal_cedula']); ?></strong></span>
                    </div>
                  </div>
                  <div>
                    <span class="badge <?php echo $role_badge; ?> p-2 mr-1" style="font-size: 12px;">
                      <i class="fa fa-id-badge"></i> <?php echo htmlspecialchars($selected_user['tipo_rol']); ?>
                    </span>
                    <span class="badge <?php echo ($selected_user['estado_usuario_id'] == 1) ? 'badge-success' : 'badge-danger'; ?> p-2" style="font-size: 12px;">
                      <i class="fa fa-circle"></i> <?php echo ($selected_user['estado_usuario_id'] == 1) ? 'Activo' : 'Inactivo'; ?>
                    </span>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <?php if ($selected_user): ?>
          <!-- Formulario de Asignación de Permisos -->
          <form method="POST" action="permisos_usuario.php">
            <input type="hidden" name="action" value="guardar_permisos">
            <input type="hidden" name="usuario_id" value="<?php echo $selected_uid; ?>">

            <!-- Barra de Plantillas Rápidas (Presets) -->
            <div class="card p-3 mb-4 bg-light border">
              <div class="d-flex align-items-center justify-content-between flex-wrap">
                <span class="font-weight-bold text-secondary mb-2">
                  <i class="fa fa-magic"></i> Cargar Plantilla Rápida de Permisos:
                </span>
                <div class="mb-2">
                  <button type="button" class="btn btn-outline-danger btn-preset" onclick="aplicarPlantilla('admin')"><i class="fa fa-star"></i> Perfil Administrador (Todo)</button>
                  <button type="button" class="btn btn-outline-warning btn-preset" onclick="aplicarPlantilla('sup')"><i class="fa fa-user-secret"></i> Perfil Supervisor</button>
                  <button type="button" class="btn btn-outline-info btn-preset" onclick="aplicarPlantilla('desp')"><i class="fa fa-truck"></i> Perfil Despachador</button>
                  <button type="button" class="btn btn-outline-success btn-preset" onclick="aplicarPlantilla('op')"><i class="fa fa-headphones"></i> Perfil Operador</button>
                  <button type="button" class="btn btn-outline-secondary btn-preset" onclick="aplicarPlantilla('consulta')"><i class="fa fa-eye"></i> Solo Consulta</button>
                  <button type="button" class="btn btn-outline-dark btn-preset" onclick="aplicarPlantilla('ninguno')"><i class="fa fa-ban"></i> Desmarcar Todos</button>
                  <button type="button" class="btn btn-outline-primary btn-preset" onclick="restablecerPerfilActual()"><i class="fa fa-refresh"></i> Coincidir con Rol Actual</button>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- Columna 1: Módulos que puede ver -->
              <div class="col-md-6 col-sm-12">
                <div class="perm-card">
                  <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <h5 class="font-weight-bold mb-0 text-primary">
                      <i class="fa fa-th-large"></i> 1. Módulos que puede ver / acceder
                    </h5>
                    <button type="button" class="btn btn-xs btn-link font-weight-bold" onclick="toggleGrupo('modulos', true)">Marcar todos</button>
                  </div>

                  <p class="text-muted small mb-3">Habilita o deshabilita los módulos que este usuario verá en el menú de navegación:</p>

                  <div class="custom-switch-item">
                    <label for="mod_admin"><i class="fa fa-sitemap text-danger mr-2"></i> Módulo Administrador & Herramientas</label>
                    <input type="checkbox" name="modulo_administrador" id="mod_admin" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_administrador'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_personal"><i class="fa fa-users text-info mr-2"></i> Gestión de Personal y Organismos</label>
                    <input type="checkbox" name="modulo_personal" id="mod_personal" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_personal'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_bienes"><i class="fa fa-archive text-warning mr-2"></i> Módulo Administrativo (Bienes e Inventario)</label>
                    <input type="checkbox" name="modulo_bienes" id="mod_bienes" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_bienes'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_seguridad"><i class="fa fa-shield text-danger mr-2"></i> Módulo de Seguridad (Novedades de Guardia)</label>
                    <input type="checkbox" name="modulo_seguridad" id="mod_seguridad" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_seguridad'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_solicitudes"><i class="fa fa-phone text-success mr-2"></i> Módulo Solicitudes de Emergencia y Despacho</label>
                    <input type="checkbox" name="modulo_solicitudes" id="mod_solicitudes" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_solicitudes'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_estadisticas"><i class="fa fa-bar-chart text-info mr-2"></i> Módulo de Estadísticas y Gráficas</label>
                    <input type="checkbox" name="modulo_estadisticas" id="mod_estadisticas" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_estadisticas'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_respaldo"><i class="fa fa-database text-primary mr-2"></i> Respaldo y Restauración de Base de Datos</label>
                    <input type="checkbox" name="modulo_respaldo" id="mod_respaldo" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_respaldo'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_actividades"><i class="fa fa-history text-secondary mr-2"></i> Registro de Actividades y Auditoría</label>
                    <input type="checkbox" name="modulo_actividades" id="mod_actividades" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_actividades'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_cupaz"><i class="fa fa-shield text-success mr-2"></i> Módulo CUPAZ (Cuadrantes de Paz)</label>
                    <input type="checkbox" name="modulo_cupaz" id="mod_cupaz" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_cupaz'] ?? true); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_ayuda"><i class="fa fa-info-circle text-muted mr-2"></i> Módulo de Ayuda y Manuales de Usuario</label>
                    <input type="checkbox" name="modulo_ayuda" id="mod_ayuda" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_ayuda'] ?? true); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="mod_calendario"><i class="fa fa-calendar text-danger mr-2"></i> Módulo de Calendario</label>
                    <input type="checkbox" name="modulo_calendario" id="mod_calendario" class="chk-modulo" <?php echo is_checked($permisos_actuales['modulo_calendario'] ?? true); ?>>
                  </div>
                </div>
              </div>

              <!-- Columna 2: Acciones que puede realizar y Ajustes de Cuenta -->
              <div class="col-md-6 col-sm-12">
                <div class="perm-card">
                  <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <h5 class="font-weight-bold mb-0 text-success">
                      <i class="fa fa-check-square-o"></i> 2. Acciones que puede realizar
                    </h5>
                    <button type="button" class="btn btn-xs btn-link font-weight-bold" onclick="toggleGrupo('acciones', true)">Marcar todas</button>
                  </div>

                  <p class="text-muted small mb-3">Define los permisos operacionales y de manipulación de registros:</p>

                  <div class="custom-switch-item">
                    <label for="acc_consultar"><i class="fa fa-search text-info mr-2"></i> Consultar / Buscar Registros y Reportes</label>
                    <input type="checkbox" name="accion_consultar" id="acc_consultar" class="chk-accion" <?php echo is_checked($permisos_actuales['accion_consultar'] ?? true); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="acc_crear"><i class="fa fa-plus-circle text-success mr-2"></i> Crear / Registrar Nuevos Datos</label>
                    <input type="checkbox" name="accion_crear" id="acc_crear" class="chk-accion" <?php echo is_checked($permisos_actuales['accion_crear'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="acc_editar"><i class="fa fa-edit text-warning mr-2"></i> Modificar / Editar Información Existente</label>
                    <input type="checkbox" name="accion_editar" id="acc_editar" class="chk-accion" <?php echo is_checked($permisos_actuales['accion_editar'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="acc_eliminar"><i class="fa fa-trash text-danger mr-2"></i> Eliminar / Anular Registros del Sistema</label>
                    <input type="checkbox" name="accion_eliminar" id="acc_eliminar" class="chk-accion" <?php echo is_checked($permisos_actuales['accion_eliminar'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="acc_exportar_bd"><i class="fa fa-download text-primary mr-2"></i> Exportar / Descargar Respaldo de Base de Datos</label>
                    <input type="checkbox" name="accion_exportar_bd" id="acc_exportar_bd" class="chk-accion" <?php echo is_checked($permisos_actuales['accion_exportar_bd'] ?? false); ?>>
                  </div>

                  <div class="custom-switch-item">
                    <label for="acc_importar_bd"><i class="fa fa-upload text-danger mr-2"></i> Importar / Restaurar Base de Datos</label>
                    <input type="checkbox" name="accion_importar_bd" id="acc_importar_bd" class="chk-accion" <?php echo is_checked($permisos_actuales['accion_importar_bd'] ?? false); ?>>
                  </div>

                  <hr class="my-4">

                  <h5 class="font-weight-bold mb-3 text-secondary border-bottom pb-2">
                    <i class="fa fa-cogs"></i> 3. Rol y Estado del Usuario
                  </h5>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label font-weight-bold text-muted">Rol en el Sistema:</label>
                    <div class="col-sm-8">
                      <select name="tipo_rol_id" id="select_tipo_rol" onchange="alCambiarRol(this.value)" class="form-control" style="font-weight: 600;">
                        <option value="1" <?php if ($selected_user['tipo_rol_id'] == 1) echo 'selected'; ?>>Administrador</option>
                        <option value="2" <?php if ($selected_user['tipo_rol_id'] == 2) echo 'selected'; ?>>Supervisor</option>
                        <option value="3" <?php if ($selected_user['tipo_rol_id'] == 3) echo 'selected'; ?>>Despachador</option>
                        <option value="4" <?php if ($selected_user['tipo_rol_id'] == 4) echo 'selected'; ?>>Operador</option>
                      </select>
                      <small class="text-muted"><i class="fa fa-info-circle"></i> Al cambiar el rol, las casillas se actualizarán automáticamente para coincidir con el perfil.</small>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label font-weight-bold text-muted">Estado de Cuenta:</label>
                    <div class="col-sm-8">
                      <select name="estado_usuario_id" class="form-control" style="font-weight: 600;">
                        <option value="1" <?php if ($selected_user['estado_usuario_id'] == 1) echo 'selected'; ?>>Activo</option>
                        <option value="2" <?php if ($selected_user['estado_usuario_id'] != 1) echo 'selected'; ?>>Inactivo / Bloqueado</option>
                      </select>
                    </div>
                  </div>

                  <?php if (!empty($permisos_actuales['actualizado_por'])): ?>
                    <div class="alert alert-light border small text-muted mb-0">
                      <i class="fa fa-info-circle"></i> Última actualización por: <strong><?php echo htmlspecialchars($permisos_actuales['actualizado_por']); ?></strong> el <?php echo date('d/m/Y - h:i:s A', strtotime($permisos_actuales['fecha_actualizacion'])); ?>.
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <!-- Botones de Acción -->
            <div class="row mb-5">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success btn-lg px-5 py-3 font-weight-bold" style="border-radius: 8px; box-shadow: 0 4px 15px rgba(38, 185, 154, 0.4);">
                  <i class="fa fa-save"></i> Guardar Permisos del Usuario
                </button>
                <button type="button" class="btn btn-info btn-lg px-4 py-3 ml-2 font-weight-bold" onclick="restablecerPerfilActual()" style="border-radius: 8px;" title="Cargar los permisos estándar de su perfil actual">
                  <i class="fa fa-refresh"></i> Coincidir con su Perfil
                </button>
                <a href="permisos_usuario.php?usuario_id=<?php echo $selected_uid; ?>" class="btn btn-secondary btn-lg px-4 py-3 ml-2 font-weight-bold" style="border-radius: 8px;">
                  <i class="fa fa-undo"></i> Deshacer Cambios
                </a>
              </div>
            </div>
          </form>
        <?php endif; ?>

        <!-- Listado Completo de Usuarios del Sistema -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-users"></i> Directorio de Usuarios Registrados en el Sistema</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered text-center" style="width:100%">
                    <thead style="background-color: #2a3f54; color: #ffffff;">
                      <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Nombre y Apellido</th>
                        <th>Cédula</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Estado Permisos</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($usuarios_lista as $usr): ?>
                        <?php
                          $rb = 'role-badge-op';
                          if ($usr['tipo_rol_id'] == 1) $rb = 'role-badge-adm';
                          elseif ($usr['tipo_rol_id'] == 2) $rb = 'role-badge-sup';
                          elseif ($usr['tipo_rol_id'] == 3) $rb = 'role-badge-desp';
                          $es_actual = ($usr['id'] == $selected_uid);
                          
                          // Evaluar si coincide con el perfil estándar
                          $es_coincidente = false;
                          if ($usr['tiene_permisos_personalizados'] > 0) {
                              $esperado = obtener_permisos_por_rol($usr['tipo_rol_id']);
                              $coincide = true;
                              foreach ($esperado as $k => $v) {
                                  $val_usr = ($usr[$k] === 't' || $usr[$k] === true || $usr[$k] === '1') ? 't' : 'f';
                                  if ($val_usr !== $v) {
                                      $coincide = false;
                                      break;
                                  }
                              }
                              $es_coincidente = $coincide;
                          }
                        ?>
                        <tr <?php if ($es_actual) echo 'style="background-color: #e8f8f5; font-weight: bold;"'; ?>>
                          <td><?php echo $usr['id']; ?></td>
                          <td class="text-left font-weight-bold">
                            <i class="fa fa-user-circle text-primary"></i> <?php echo htmlspecialchars($usr['usuario']); ?>
                          </td>
                          <td class="text-left">
                            <?php echo htmlspecialchars(trim(($usr['p_nombre'] ?? '') . ' ' . ($usr['p_apellido'] ?? '')) ?: 'N/A'); ?>
                          </td>
                          <td><?php echo htmlspecialchars($usr['personal_cedula'] ?? 'N/A'); ?></td>
                          <td>
                            <span class="badge <?php echo $rb; ?> p-1" style="font-size: 11px;">
                              <?php echo htmlspecialchars($usr['tipo_rol']); ?>
                            </span>
                          </td>
                          <td>
                            <span class="badge <?php echo ($usr['estado_usuario_id'] == 1) ? 'badge-success' : 'badge-danger'; ?> p-1">
                              <?php echo ($usr['estado_usuario_id'] == 1) ? 'Activo' : 'Inactivo'; ?>
                            </span>
                          </td>
                          <td>
                            <?php if ($usr['tiene_permisos_personalizados'] == 0): ?>
                              <span class="badge badge-info"><i class="fa fa-id-badge"></i> Heredado de Perfil</span>
                            <?php elseif ($es_coincidente): ?>
                              <span class="badge badge-success"><i class="fa fa-check-circle"></i> Coincide con Perfil</span>
                            <?php else: ?>
                              <span class="badge badge-warning text-dark"><i class="fa fa-sliders"></i> Personalizado</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="permisos_usuario.php?usuario_id=<?php echo $usr['id']; ?>" class="btn btn-sm btn-info py-1 px-2 font-weight-bold" title="Configurar permisos para este usuario">
                              <i class="fa fa-key"></i> Configurar Permisos
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
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

<script>
function seleccionarUsuario(uid) {
    if (uid) {
        window.location.href = 'permisos_usuario.php?usuario_id=' + uid;
    }
}

function setCheckbox(id, state) {
    var el = document.getElementById(id);
    if (el) el.checked = state;
}

function toggleGrupo(grupo, state) {
    var className = (grupo === 'modulos') ? '.chk-modulo' : '.chk-accion';
    var chks = document.querySelectorAll(className);
    chks.forEach(function(c) {
        c.checked = state;
    });
}

// Al cambiar el selector de Rol, se sincronizan las casillas con la plantilla del perfil
function alCambiarRol(rolId) {
    var mapa = { '1': 'admin', '2': 'sup', '3': 'desp', '4': 'op' };
    if (mapa[rolId]) {
        aplicarPlantilla(mapa[rolId], false);
    }
}

// Plantillas predeterminadas de permisos
function aplicarPlantilla(tipo, updateSelect) {
    if (updateSelect === undefined) updateSelect = true;
    
    if (updateSelect) {
        var sel = document.getElementById('select_tipo_rol');
        if (sel) {
            if (tipo === 'admin') sel.value = '1';
            else if (tipo === 'sup') sel.value = '2';
            else if (tipo === 'desp') sel.value = '3';
            else if (tipo === 'op') sel.value = '4';
        }
    }
    
    if (tipo === 'admin') {
        // Administrador: todo habilitado
        toggleGrupo('modulos', true);
        toggleGrupo('acciones', true);
    } else if (tipo === 'sup') {
        // Supervisor
        setCheckbox('mod_admin', false);
        setCheckbox('mod_personal', true);
        setCheckbox('mod_bienes', true);
        setCheckbox('mod_seguridad', true);
        setCheckbox('mod_solicitudes', true);
        setCheckbox('mod_estadisticas', true);
        setCheckbox('mod_respaldo', false);
        setCheckbox('mod_actividades', false);
        setCheckbox('mod_cupaz', true);
        setCheckbox('mod_ayuda', true);
        setCheckbox('mod_calendario', true);
        
        setCheckbox('acc_consultar', true);
        setCheckbox('acc_crear', true);
        setCheckbox('acc_editar', true);
        setCheckbox('acc_eliminar', false);
        setCheckbox('acc_exportar_bd', false);
        setCheckbox('acc_importar_bd', false);
    } else if (tipo === 'desp') {
        // Despachador
        setCheckbox('mod_admin', false);
        setCheckbox('mod_personal', false);
        setCheckbox('mod_bienes', true);
        setCheckbox('mod_seguridad', true);
        setCheckbox('mod_solicitudes', true);
        setCheckbox('mod_estadisticas', false);
        setCheckbox('mod_respaldo', false);
        setCheckbox('mod_actividades', false);
        setCheckbox('mod_cupaz', true);
        setCheckbox('mod_ayuda', true);
        setCheckbox('mod_calendario', true);
        
        setCheckbox('acc_consultar', true);
        setCheckbox('acc_crear', true);
        setCheckbox('acc_editar', false);
        setCheckbox('acc_eliminar', false);
        setCheckbox('acc_exportar_bd', false);
        setCheckbox('acc_importar_bd', false);
    } else if (tipo === 'op') {
        // Operador
        setCheckbox('mod_admin', false);
        setCheckbox('mod_personal', false);
        setCheckbox('mod_bienes', false);
        setCheckbox('mod_seguridad', true);
        setCheckbox('mod_solicitudes', true);
        setCheckbox('mod_estadisticas', false);
        setCheckbox('mod_respaldo', false);
        setCheckbox('mod_actividades', false);
        setCheckbox('mod_cupaz', true);
        setCheckbox('mod_ayuda', true);
        setCheckbox('mod_calendario', true);
        
        setCheckbox('acc_consultar', true);
        setCheckbox('acc_crear', true);
        setCheckbox('acc_editar', false);
        setCheckbox('acc_eliminar', false);
        setCheckbox('acc_exportar_bd', false);
        setCheckbox('acc_importar_bd', false);
    } else if (tipo === 'consulta') {
        // Solo lectura
        setCheckbox('mod_admin', false);
        setCheckbox('mod_personal', true);
        setCheckbox('mod_bienes', true);
        setCheckbox('mod_seguridad', true);
        setCheckbox('mod_solicitudes', true);
        setCheckbox('mod_estadisticas', true);
        setCheckbox('mod_respaldo', false);
        setCheckbox('mod_actividades', false);
        setCheckbox('mod_cupaz', true);
        setCheckbox('mod_ayuda', true);
        setCheckbox('mod_calendario', true);
        
        setCheckbox('acc_consultar', true);
        setCheckbox('acc_crear', false);
        setCheckbox('acc_editar', false);
        setCheckbox('acc_eliminar', false);
        setCheckbox('acc_exportar_bd', false);
        setCheckbox('acc_importar_bd', false);
    } else if (tipo === 'ninguno') {
        toggleGrupo('modulos', false);
        toggleGrupo('acciones', false);
    }
}

// Restablecer casillas al perfil actual seleccionado
function restablecerPerfilActual() {
    var sel = document.getElementById('select_tipo_rol');
    var rolId = sel ? sel.value : '4';
    alCambiarRol(rolId);
}

// Confirmación para sincronizar todos los usuarios
function sincronizarTodos() {
    if (confirm('¿Está seguro de que desea sincronizar los permisos de TODOS los usuarios según su rol/perfil actual?\n\nEsta acción registrará para cada uno de los 56 usuarios los permisos que corresponden a su perfil (Administrador, Supervisor, Despachador u Operador).')) {
        document.getElementById('form_sync_all').submit();
    }
}
</script>

<?php require_once '../plantillas/inferior3.php'; ?>
