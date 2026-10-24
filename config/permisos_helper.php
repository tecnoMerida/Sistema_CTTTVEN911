<?php
// config/permisos_helper.php - Sistema de Control de Permisos VEN 911

if (!function_exists('obtener_permisos_usuario')) {
    function obtener_permisos_usuario($usuario_id, $dbconn) {
        $q = pg_query($dbconn, "SELECT p.*, u.tipo_rol_id, u.usuario, u.estado_usuario_id 
                                FROM public.usuario u 
                                LEFT JOIN public.usuario_permisos p ON u.id = p.usuario_id 
                                WHERE u.id = " . intval($usuario_id));
        if ($q && pg_num_rows($q) > 0) {
            return pg_fetch_assoc($q);
        }
        return null;
    }
}

if (!function_exists('tiene_permiso')) {
    function tiene_permiso($clave_permiso, $usuario_id = null, $dbconn = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // El Administrador principal (tipo_rol_id = 1) siempre tiene permisos totales
        if (isset($_SESSION['tipo_rol_id']) && $_SESSION['tipo_rol_id'] == 1) {
            return true;
        }
        
        if ($usuario_id === null && isset($_SESSION['id_usuario'])) {
            $usuario_id = $_SESSION['id_usuario'];
        }
        
        if (!$usuario_id) {
            return false;
        }
        
        if (!$dbconn) {
            global $dbconn;
        }
        if (!$dbconn) {
            return false;
        }
        
        $permisos = obtener_permisos_usuario($usuario_id, $dbconn);
        if (!$permisos) {
            return false;
        }
        
        if (isset($permisos[$clave_permiso])) {
            return ($permisos[$clave_permiso] === 't' || $permisos[$clave_permiso] === true || $permisos[$clave_permiso] == 1);
        }
        
        return false;
    }
}
