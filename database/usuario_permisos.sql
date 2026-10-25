-- ============================================================================
-- Tabla de permisos por usuario (VEN 9-1-1)
-- Usada por config/permisos_helper.php y administrador/permisos_usuario.php
-- Un registro por usuario: el UPSERT de permisos_usuario.php usa
-- ON CONFLICT (usuario_id), por eso usuario_id es UNIQUE.
-- Si un usuario no tiene registro, la pantalla aplica valores por rol.
-- ============================================================================

CREATE TABLE IF NOT EXISTS public.usuario_permisos (
    id serial PRIMARY KEY,
    usuario_id integer NOT NULL UNIQUE REFERENCES public.usuario (id) ON DELETE CASCADE,
    modulo_administrador boolean NOT NULL DEFAULT false,
    modulo_personal boolean NOT NULL DEFAULT false,
    modulo_bienes boolean NOT NULL DEFAULT false,
    modulo_seguridad boolean NOT NULL DEFAULT false,
    modulo_solicitudes boolean NOT NULL DEFAULT false,
    modulo_estadisticas boolean NOT NULL DEFAULT false,
    modulo_respaldo boolean NOT NULL DEFAULT false,
    modulo_actividades boolean NOT NULL DEFAULT false,
    modulo_ayuda boolean NOT NULL DEFAULT false,
    modulo_calendario boolean NOT NULL DEFAULT false,
    accion_consultar boolean NOT NULL DEFAULT false,
    accion_crear boolean NOT NULL DEFAULT false,
    accion_editar boolean NOT NULL DEFAULT false,
    accion_eliminar boolean NOT NULL DEFAULT false,
    accion_exportar_bd boolean NOT NULL DEFAULT false,
    accion_importar_bd boolean NOT NULL DEFAULT false,
    actualizado_por character varying(50),
    fecha_actualizacion timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
