<?php
// config/permisos_helper.php - Sistema de Control de Permisos VEN 911

if (!function_exists('obtener_permisos_por_rol')) {
    /**
     * Retorna la plantilla estándar de permisos asignada a un perfil/rol específico.
     * Rol 1: Administrador (acceso total a todos los módulos y acciones)
     * Rol 2: Supervisor (módulos operativos, personal, bienes, estadísticas; consulta, creación, edición)
     * Rol 3: Despachador (módulos bienes, seguridad, solicitudes; consulta y creación)
     * Rol 4: Operador (módulos seguridad, solicitudes; consulta y creación)
     */
    function obtener_permisos_por_rol($rol_id) {
        $rol_id = intval($rol_id);
        if ($rol_id === 1) { // Administrador: total
            return [
                'modulo_administrador' => 't',
                'modulo_personal'      => 't',
                'modulo_bienes'        => 't',
                'modulo_seguridad'     => 't',
                'modulo_solicitudes'   => 't',
                'modulo_estadisticas'  => 't',
                'modulo_respaldo'      => 't',
                'modulo_actividades'   => 't',
                'modulo_ayuda'         => 't',
                'modulo_calendario'    => 't',
                'modulo_cupaz'         => 't',
                'accion_consultar'     => 't',
                'accion_crear'         => 't',
                'accion_editar'        => 't',
                'accion_eliminar'      => 't',
                'accion_exportar_bd'   => 't',
                'accion_importar_bd'   => 't'
            ];
        } elseif ($rol_id === 2) { // Supervisor
            return [
                'modulo_administrador' => 'f',
                'modulo_personal'      => 't',
                'modulo_bienes'        => 't',
                'modulo_seguridad'     => 't',
                'modulo_solicitudes'   => 't',
                'modulo_estadisticas'  => 't',
                'modulo_respaldo'      => 'f',
                'modulo_actividades'   => 'f',
                'modulo_ayuda'         => 't',
                'modulo_calendario'    => 't',
                'modulo_cupaz'         => 't',
                'accion_consultar'     => 't',
                'accion_crear'         => 't',
                'accion_editar'        => 't',
                'accion_eliminar'      => 'f',
                'accion_exportar_bd'   => 'f',
                'accion_importar_bd'   => 'f'
            ];
        } elseif ($rol_id === 3) { // Despachador
            return [
                'modulo_administrador' => 'f',
                'modulo_personal'      => 'f',
                'modulo_bienes'        => 't',
                'modulo_seguridad'     => 't',
                'modulo_solicitudes'   => 't',
                'modulo_estadisticas'  => 'f',
                'modulo_respaldo'      => 'f',
                'modulo_actividades'   => 'f',
                'modulo_ayuda'         => 't',
                'modulo_calendario'    => 't',
                'modulo_cupaz'         => 't',
                'accion_consultar'     => 't',
                'accion_crear'         => 't',
                'accion_editar'        => 'f',
                'accion_eliminar'      => 'f',
                'accion_exportar_bd'   => 'f',
                'accion_importar_bd'   => 'f'
            ];
        } else { // Operador (Rol 4 y cualquier otro)
            return [
                'modulo_administrador' => 'f',
                'modulo_personal'      => 'f',
                'modulo_bienes'        => 'f',
                'modulo_seguridad'     => 't',
                'modulo_solicitudes'   => 't',
                'modulo_estadisticas'  => 'f',
                'modulo_respaldo'      => 'f',
                'modulo_actividades'   => 'f',
                'modulo_ayuda'         => 't',
                'modulo_calendario'    => 't',
                'modulo_cupaz'         => 't',
                'accion_consultar'     => 't',
                'accion_crear'         => 't',
                'accion_editar'        => 'f',
                'accion_eliminar'      => 'f',
                'accion_exportar_bd'   => 'f',
                'accion_importar_bd'   => 'f'
            ];
        }
    }
}

if (!function_exists('obtener_permisos_usuario')) {
    function obtener_permisos_usuario($usuario_id, $dbconn) {
        $q = pg_query($dbconn, "SELECT p.*, u.tipo_rol_id, u.usuario, u.estado_usuario_id 
                                FROM public.usuario u 
                                LEFT JOIN public.usuario_permisos p ON u.id = p.usuario_id 
                                WHERE u.id = " . intval($usuario_id));
        if ($q && pg_num_rows($q) > 0) {
            $row = pg_fetch_assoc($q);
            // Si el usuario aún no tiene registro en usuario_permisos (p.usuario_id es NULL),
            // se devuelven automáticamente los permisos por defecto de su perfil/rol
            if (empty($row['usuario_id'])) {
                $por_rol = obtener_permisos_por_rol($row['tipo_rol_id']);
                foreach ($por_rol as $k => $v) {
                    $row[$k] = $v;
                }
            }
            return $row;
        }
        return null;
    }
}

if (!function_exists('tiene_permiso')) {
    function tiene_permiso($clave_permiso, $usuario_id = null, $dbconn = null) {
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            session_start();
        }
        
        // El Administrador principal (tipo_rol_id = 1) siempre tiene permisos totales
        if ($usuario_id === null && isset($_SESSION['tipo_rol_id']) && $_SESSION['tipo_rol_id'] == 1) {
            return true;
        }
        
        if ($usuario_id === null) {
            $usuario_id = $_SESSION['id_usuario'] ?? $_SESSION['id'] ?? null;
        }
        
        if (!$usuario_id) {
            return false;
        }
        
        if (!$dbconn) {
            global $dbconn;
        }
        if (!$dbconn && isset($GLOBALS['dbconn'])) {
            $dbconn = $GLOBALS['dbconn'];
        }
        if (!$dbconn) {
            static $static_dbconn = null;
            if ($static_dbconn === null) {
                $static_dbconn = @pg_connect("host=localhost port=5432 dbname=ven911 user=postgres password=123456 options='--client_encoding=UTF8'");
            }
            $dbconn = $static_dbconn;
        }
        if (!$dbconn) {
            return false;
        }
        
        $permisos = obtener_permisos_usuario($usuario_id, $dbconn);
        if (!$permisos) {
            return false;
        }
        
        // Si la clave específica existe y no es nula
        if (isset($permisos[$clave_permiso]) && $permisos[$clave_permiso] !== null) {
            return ($permisos[$clave_permiso] === 't' || $permisos[$clave_permiso] === true || $permisos[$clave_permiso] == 1 || $permisos[$clave_permiso] === '1');
        }
        
        // Fallback al perfil del rol
        $por_rol = obtener_permisos_por_rol($permisos['tipo_rol_id'] ?? 4);
        if (isset($por_rol[$clave_permiso])) {
            return ($por_rol[$clave_permiso] === 't' || $por_rol[$clave_permiso] === true || $por_rol[$clave_permiso] == 1 || $por_rol[$clave_permiso] === '1');
        }
        
        return false;
    }
}
