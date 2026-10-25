-- ============================================================================
-- Columnas de Cuadrante de Paz en public.solicitudes
-- Las usan insertar_guardia.php / insertar_guardia_op.php al registrar una
-- solicitud y vistas/resumen_actividades_dashboard.php al listarlas.
-- Tipos iguales a los de public.cuadrantes_de_paz. Repetible.
-- ============================================================================

ALTER TABLE public.solicitudes ADD COLUMN IF NOT EXISTS cuadrante character varying(50);
ALTER TABLE public.solicitudes ADD COLUMN IF NOT EXISTS organismo_cuadrante character varying(150);
ALTER TABLE public.solicitudes ADD COLUMN IF NOT EXISTS telefono_cuadrante character varying(50);
