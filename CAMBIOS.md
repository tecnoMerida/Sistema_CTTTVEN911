# Historial de versiones – Libro Digital de Novedades 9-1-1

## 2.1 – Correcciones Francisco Paredes (2026-10-16)

Adaptación del sistema a PHP 8 y corrección de errores encontrados al probarlo completo.

**Requisitos:** PHP 7.0 o superior (probado en PHP 8.5.4 con PostgreSQL 18), extensiones `pgsql`, `mysqli` y `ctype`.

### Qué se probó

- Las 109 páginas de los cuatro perfiles (administrador, supervisor, despachador y operador): ninguna termina en error fatal.
- Flujos que guardan datos, verificando el resultado en la base:
  - supervisor: personal de guardia, control de bienes, apertura, solicitud, observaciones, estadísticas, cierre de solicitud y cierre de guardia;
  - despachador y operador: sus flujos completos, incluido el cierre de solicitudes;
  - administrador: registro de personal (7 pasos), bienes, organismos, grupos y edición de personal y usuarios;
  - recuperación de contraseña e inicio de sesión.
- Los reportes PDF.

No se pudo probar lo que depende del MySQL externo del sistema 911 (`192.168.2.252`): la consulta de solicitudes del 911 y el reporte 171.

### Correcciones

**Inicio de sesión (`cookie/cookie.php`, `index.php`)**
- El segundo intento fallido terminaba en error fatal.
- El bloqueo temporal por cookie no funcionaba: se guardaba y se buscaba con nombres distintos.
- Se cerró una inyección SQL en el usuario: la consulta y el bloqueo usan `pg_query_params`.

**Compatibilidad con PHP 8 (todo el sistema)**
- Unas 40 claves sin comillas (`$_GET[msg]`) que en PHP 8 son error fatal, entre otros en editar usuario, registrar personal, parientes y organismos.
- Lecturas de `$_GET`/`$_POST` inexistentes: ahora tienen un valor por defecto.
- `pg_fetch_all()` sin filas devuelve `[]` en PHP 8 (antes `false`) y el código entraba a los bucles con datos vacíos. Se restauró el comportamiento anterior en 74 lugares.
- Sumas de texto con números y divisiones por cero en las estadísticas.
- Listas de bienes vacías que generaban consultas `WHERE id = ` sin valor.

**Reportes PDF (`administrador/PDF`)**
- Ningún PDF se generaba: FPDF llamaba a `get_magic_quotes_runtime()`, eliminada en PHP 8.
- `imprime_solicitudes.php`: clave sin comillas, sector guardado como nombre en los registros viejos y un bucle de depuración que imprimía texto dentro del PDF.

**Búsquedas y consultas**
- "Novedades Guardia" (los tres perfiles) y "Estadísticas Personal" fallaban al abrirse desde el menú, antes de buscar.
- `controlador/consulta_novedades_op_adm` no tenía extensión `.php` y no se encontraba (se agregó la copia con extensión).
- Variables mal escritas (`$consulta_solicitudes`) y un resultado liberado dentro de su propio bucle.
- `administrador/ver_estadisticas.php` y `ver_observaciones_guardia.php` consultaban la guardia del usuario conectado, que el administrador no tiene.
- `modificar_grupos.php` y `modificar_organismo.php` sin `id` ahora vuelven a su lista.

**Cierre de solicitudes del supervisor (`insertar_guardia.php`)**
- El formulario actual ya no envía los campos de tiempo de respuesta y el guardado fallaba. Ahora el tiempo se calcula igual que en el cierre del despachador.

**Conexión al MySQL externo (`config/conexion2_bd.php`)**
- Sin red hacia `192.168.2.252`, las páginas esperaban 60 s y terminaban en error. Ahora esperan 3 s y muestran "Sin conexión con el sistema externo".

### Pendiente

- Quedan avisos menores (no fatales) en unas 60 páginas; con `display_errors = Off` no se ven.
- Las contraseñas se guardan con SHA1 sin sal; conviene migrar a `password_hash()`.
- Tres intentos fallidos de inicio de sesión bloquean la cuenta en la base y hay que reactivarla manualmente.
