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

// Filtros de búsqueda
$fecha_desde = $_REQUEST['fecha_desde'] ?? '';
$fecha_hasta = $_REQUEST['fecha_hasta'] ?? '';
$proceso_filtro = $_REQUEST['proceso'] ?? '';
$usuario_filtro = $_REQUEST['usuario'] ?? '';
$esquema_filtro = $_REQUEST['esquema'] ?? '';

$condiciones = [];

if (!empty($fecha_desde)) {
    $condiciones[] = "fecha_operacion >= '" . pg_escape_string($dbconn, $fecha_desde . " 00:00:00") . "'";
}
if (!empty($fecha_hasta)) {
    $condiciones[] = "fecha_operacion <= '" . pg_escape_string($dbconn, $fecha_hasta . " 23:59:59") . "'";
}
if (!empty($proceso_filtro)) {
    $condiciones[] = "UPPER(proceso) LIKE UPPER('%" . pg_escape_string($dbconn, $proceso_filtro) . "%')";
}
if (!empty($usuario_filtro)) {
    $condiciones[] = "usuario_aplicacion ILIKE '%" . pg_escape_string($dbconn, $usuario_filtro) . "%'";
}
if (!empty($esquema_filtro)) {
    $condiciones[] = "nombre_esquema ILIKE '%" . pg_escape_string($dbconn, $esquema_filtro) . "%'";
}

$where_clause = !empty($condiciones) ? "WHERE " . implode(" AND ", $condiciones) : "";
$query_bitacora = pg_query($dbconn, "SELECT * FROM public.bitacora $where_clause ORDER BY id DESC LIMIT 2500");

// Métricas de auditoría para tarjetas superiores
$q_total = pg_query($dbconn, "SELECT count(*) FROM public.bitacora");
$total_actividades = $q_total ? pg_fetch_row($q_total)[0] : 0;

$q_sesiones = pg_query($dbconn, "SELECT count(*) FROM public.bitacora WHERE UPPER(proceso)='VALIDAR' OR UPPER(nombre_esquema) LIKE '%SESSION%'");
$total_sesiones = $q_sesiones ? pg_fetch_row($q_sesiones)[0] : 0;

$q_inserciones = pg_query($dbconn, "SELECT count(*) FROM public.bitacora WHERE UPPER(proceso) LIKE 'INSERT%'");
$total_inserciones = $q_inserciones ? pg_fetch_row($q_inserciones)[0] : 0;

$q_mod_elim = pg_query($dbconn, "SELECT count(*) FROM public.bitacora WHERE UPPER(proceso) LIKE 'MODIF%' OR UPPER(proceso) LIKE 'ELIMIN%'");
$total_mod_elim = $q_mod_elim ? pg_fetch_row($q_mod_elim)[0] : 0;

// Obtener esquemas únicos para el selector de filtro
$esquemas_res = pg_query($dbconn, "SELECT DISTINCT nombre_esquema FROM public.bitacora WHERE nombre_esquema IS NOT NULL AND nombre_esquema <> '' ORDER BY nombre_esquema ASC");
?>

<!-- Estilos y Cabecera Superior -->
<?php require_once '../plantillas/superior3.php'; ?>

<style>
.metric-box {
    border-radius: 8px;
    color: #ffffff;
    padding: 18px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}
.metric-box:hover {
    transform: translateY(-2px);
}
.metric-total {
    background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
}
.metric-sesiones {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
}
.metric-inserts {
    background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
}
.metric-mod-elim {
    background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
}
.metric-box h3 {
    font-size: 28px;
    font-weight: 700;
    margin: 5px 0 0 0;
}
.metric-box p {
    font-size: 13px;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    opacity: 0.9;
}
.filter-card {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 20px;
}
.table-activities th {
    background-color: #2a3f54;
    color: #ffffff !important;
    text-align: center;
}
.badge-process {
    font-size: 11px;
    padding: 5px 9px;
    border-radius: 4px;
    font-weight: 600;
    display: inline-block;
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
            <h3><i class="fa fa-history"></i> REGISTRO DE ACTIVIDADES Y AUDITORÍA DEL SISTEMA</h3>
          </div>
          <div class="title_right text-right">
            <a href="respaldo_bd.php" class="btn btn-outline-secondary font-weight-bold">
              <i class="fa fa-database"></i> Ir a Respaldo BD
            </a>
          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Tarjetas de Métricas Resumen -->
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="metric-box metric-total">
              <div class="float-right"><i class="fa fa-list-alt fa-3x opacity-50"></i></div>
              <p>Total Actividades</p>
              <h3><?php echo number_format($total_actividades); ?></h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="metric-box metric-sesiones">
              <div class="float-right"><i class="fa fa-users fa-3x opacity-50"></i></div>
              <p>Inicios / Cierres Sesión</p>
              <h3><?php echo number_format($total_sesiones); ?></h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="metric-box metric-inserts">
              <div class="float-right"><i class="fa fa-plus-circle fa-3x opacity-50"></i></div>
              <p>Inserciones / Registros</p>
              <h3><?php echo number_format($total_inserciones); ?></h3>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="metric-box metric-mod-elim">
              <div class="float-right"><i class="fa fa-pencil-square-o fa-3x opacity-50"></i></div>
              <p>Modificaciones / Bajas</p>
              <h3><?php echo number_format($total_mod_elim); ?></h3>
            </div>
          </div>
        </div>

        <!-- Panel de Filtros -->
        <div class="filter-card">
          <h5 class="mb-3 font-weight-bold text-secondary"><i class="fa fa-filter"></i> Filtros de Auditoría</h5>
          <form method="GET" action="registro_actividades.php" class="row">
            <div class="col-md-2 col-sm-6 mb-2">
              <label class="small font-weight-bold text-muted">Fecha Desde:</label>
              <input type="date" name="fecha_desde" class="form-control form-control-sm" value="<?php echo htmlspecialchars($fecha_desde); ?>">
            </div>
            <div class="col-md-2 col-sm-6 mb-2">
              <label class="small font-weight-bold text-muted">Fecha Hasta:</label>
              <input type="date" name="fecha_hasta" class="form-control form-control-sm" value="<?php echo htmlspecialchars($fecha_hasta); ?>">
            </div>
            <div class="col-md-2 col-sm-6 mb-2">
              <label class="small font-weight-bold text-muted">Acción / Proceso:</label>
              <select name="proceso" class="form-control form-control-sm">
                <option value="">-- Todos los Procesos --</option>
                <option value="VALIDAR" <?php if ($proceso_filtro === 'VALIDAR') echo 'selected'; ?>>VALIDAR (Sesión)</option>
                <option value="INSERT" <?php if (stripos($proceso_filtro, 'INSERT') !== false) echo 'selected'; ?>>INSERTAR (Creación)</option>
                <option value="MODIF" <?php if (stripos($proceso_filtro, 'MODIF') !== false) echo 'selected'; ?>>MODIFICAR</option>
                <option value="ELIMIN" <?php if (stripos($proceso_filtro, 'ELIMIN') !== false) echo 'selected'; ?>>ELIMINAR</option>
                <option value="RESPALDO" <?php if (stripos($proceso_filtro, 'RESPALDO') !== false) echo 'selected'; ?>>RESPALDO BD</option>
              </select>
            </div>
            <div class="col-md-3 col-sm-6 mb-2">
              <label class="small font-weight-bold text-muted">Módulo / Esquema:</label>
              <select name="esquema" class="form-control form-control-sm">
                <option value="">-- Todos los Módulos --</option>
                <?php if ($esquemas_res): ?>
                  <?php while ($esq = pg_fetch_assoc($esquemas_res)): ?>
                    <option value="<?php echo htmlspecialchars($esq['nombre_esquema']); ?>" <?php if ($esquema_filtro === $esq['nombre_esquema']) echo 'selected'; ?>>
                      <?php echo htmlspecialchars($esq['nombre_esquema']); ?>
                    </option>
                  <?php endwhile; ?>
                <?php endif; ?>
              </select>
            </div>
            <div class="col-md-3 col-sm-12 mb-2">
              <label class="small font-weight-bold text-muted">Usuario / Cédula:</label>
              <input type="text" name="usuario" class="form-control form-control-sm" placeholder="Buscar por usuario o cédula..." value="<?php echo htmlspecialchars($usuario_filtro); ?>">
            </div>
            <div class="col-md-12 text-right mt-2">
              <button type="submit" class="btn btn-primary btn-sm font-weight-bold px-3">
                <i class="fa fa-search"></i> Filtrar Actividades
              </button>
              <a href="registro_actividades.php" class="btn btn-secondary btn-sm px-3">
                <i class="fa fa-refresh"></i> Limpiar Filtros
              </a>
            </div>
          </form>
        </div>

        <!-- Tabla de Actividades (DataTable) -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-list"></i> Registro Detallado de Actividades (Bitácora)</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered table-activities" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 140px;">Fecha y Hora</th>
                        <th style="width: 110px;">Usuario / Cédula</th>
                        <th style="width: 150px;">Módulo / Esquema</th>
                        <th style="width: 110px;">Tabla</th>
                        <th style="width: 120px;">Acción</th>
                        <th>Detalles de la Actividad</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($query_bitacora && pg_num_rows($query_bitacora) > 0): ?>
                        <?php while ($row = pg_fetch_assoc($query_bitacora)): ?>
                          <?php
                            $proc = strtoupper(trim($row['proceso'] ?? ''));
                            $esq = strtoupper(trim($row['nombre_esquema'] ?? ''));
                            
                            // Determinar clase y texto de badge según el proceso
                            $badge_class = 'badge-secondary';
                            $icon = 'fa-tag';
                            $label = $proc;
                            
                            if (strpos($proc, 'INSERT') !== false) {
                                $badge_class = 'badge-success';
                                $icon = 'fa-plus-circle';
                                $label = 'INSERTAR';
                            } elseif (strpos($proc, 'VALIDAR') !== false || strpos($esq, 'SESSION') !== false) {
                                if (strpos($esq, 'CIERRE') !== false) {
                                    $badge_class = 'badge-dark';
                                    $icon = 'fa-sign-out';
                                    $label = 'CIERRE SESIÓN';
                                } else {
                                    $badge_class = 'badge-info';
                                    $icon = 'fa-sign-in';
                                    $label = 'INICIO SESIÓN';
                                }
                            } elseif (strpos($proc, 'MODIF') !== false) {
                                $badge_class = 'badge-warning text-dark';
                                $icon = 'fa-edit';
                                $label = 'MODIFICAR';
                            } elseif (strpos($proc, 'ELIMIN') !== false) {
                                $badge_class = 'badge-danger';
                                $icon = 'fa-trash';
                                $label = 'ELIMINAR';
                            } elseif (strpos($proc, 'RESPALDO') !== false || strpos($proc, 'EXPORT') !== false) {
                                $badge_class = 'badge-primary';
                                $icon = 'fa-database';
                                $label = 'RESPALDO BD';
                            }
                            
                            $val_nuevo = trim($row['valor_nuevo'] ?? '');
                            $val_ant = trim($row['valor_anterior'] ?? '');
                            $preview_text = mb_substr($val_nuevo, 0, 75);
                            if (mb_strlen($val_nuevo) > 75) {
                                $preview_text .= '...';
                            }
                          ?>
                          <tr>
                            <td class="text-center font-weight-bold text-muted"><?php echo $row['id']; ?></td>
                            <td class="text-center" style="font-size: 12px;">
                              <i class="fa fa-clock-o text-muted"></i> <?php echo date('d/m/Y h:i:s A', strtotime($row['fecha_operacion'])); ?>
                            </td>
                            <td class="text-center font-weight-bold">
                              <span class="badge badge-light border text-dark p-1" style="font-size: 12px;">
                                <i class="fa fa-user"></i> <?php echo htmlspecialchars($row['usuario_aplicacion']); ?>
                              </span>
                            </td>
                            <td><?php echo htmlspecialchars($row['nombre_esquema']); ?></td>
                            <td><code><?php echo htmlspecialchars($row['nombre_tabla']); ?></code></td>
                            <td class="text-center">
                              <span class="badge <?php echo $badge_class; ?> badge-process">
                                <i class="fa <?php echo $icon; ?>"></i> <?php echo $label; ?>
                              </span>
                            </td>
                            <td>
                              <div class="d-flex align-items-center justify-content-between">
                                <span style="font-size: 12px; color: #495057;">
                                  <?php echo htmlspecialchars($preview_text); ?>
                                </span>
                                <?php if (!empty($val_nuevo) || !empty($val_ant)): ?>
                                  <button type="button" class="btn btn-xs btn-outline-info ml-2" title="Ver detalle completo"
                                          onclick="verDetalleActividad(
                                            '<?php echo $row['id']; ?>',
                                            '<?php echo htmlspecialchars($row['usuario_aplicacion'], ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars($row['nombre_esquema'], ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars($row['nombre_tabla'], ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars($label, ENT_QUOTES); ?>',
                                            '<?php echo date('d/m/Y h:i:s A', strtotime($row['fecha_operacion'])); ?>',
                                            '<?php echo htmlspecialchars(addslashes(str_replace(["\r", "\n"], ' ', $val_nuevo)), ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars(addslashes(str_replace(["\r", "\n"], ' ', $val_ant)), ENT_QUOTES); ?>'
                                          )">
                                    <i class="fa fa-eye"></i> Ver
                                  </button>
                                <?php endif; ?>
                              </div>
                            </td>
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="7" class="text-center py-4 text-muted">
                            <i class="fa fa-info-circle fa-2x d-block mb-2"></i>
                            No se encontraron actividades con los filtros seleccionados.
                          </td>
                        </tr>
                      <?php endif; ?>
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

<!-- Modal para Inspeccionar Detalle de Actividad -->
<div class="modal fade" id="modalDetalleActividad" tabindex="-1" role="dialog" aria-labelledby="modalDetalleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white font-weight-bold">
        <h5 class="modal-title" id="modalDetalleLabel"><i class="fa fa-search"></i> Detalle de Actividad #<span id="det-id"></span></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-md-4">
            <span class="text-muted small font-weight-bold d-block">USUARIO / CÉDULA:</span>
            <strong id="det-usuario" class="text-primary"></strong>
          </div>
          <div class="col-md-4">
            <span class="text-muted small font-weight-bold d-block">MÓDULO / ESQUEMA:</span>
            <span id="det-esquema" class="font-weight-bold"></span>
          </div>
          <div class="col-md-4">
            <span class="text-muted small font-weight-bold d-block">FECHA Y HORA:</span>
            <span id="det-fecha" class="text-secondary"></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <span class="text-muted small font-weight-bold d-block">TABLA:</span>
            <code id="det-tabla" style="font-size: 13px;"></code>
          </div>
          <div class="col-md-6">
            <span class="text-muted small font-weight-bold d-block">ACCIÓN / PROCESO:</span>
            <span id="det-proceso" class="badge badge-info p-1"></span>
          </div>
        </div>
        
        <div class="form-group mb-3" id="box-valor-anterior" style="display: none;">
          <label class="font-weight-bold text-danger"><i class="fa fa-arrow-left"></i> Valor Anterior:</label>
          <pre id="det-valor-anterior" class="p-3 bg-light border rounded" style="max-height: 180px; overflow-y: auto; font-size: 12px; white-space: pre-wrap; word-break: break-all;"></pre>
        </div>

        <div class="form-group mb-0">
          <label class="font-weight-bold text-success"><i class="fa fa-arrow-right"></i> Valor Registrado / Datos de la Operación:</label>
          <pre id="det-valor-nuevo" class="p-3 bg-light border rounded" style="max-height: 250px; overflow-y: auto; font-size: 12px; white-space: pre-wrap; word-break: break-all;"></pre>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function verDetalleActividad(id, usuario, esquema, tabla, proceso, fecha, valorNuevo, valorAnterior) {
    document.getElementById('det-id').innerText = id;
    document.getElementById('det-usuario').innerText = usuario;
    document.getElementById('det-esquema').innerText = esquema;
    document.getElementById('det-tabla').innerText = tabla;
    document.getElementById('det-proceso').innerText = proceso;
    document.getElementById('det-fecha').innerText = fecha;
    document.getElementById('det-valor-nuevo').innerText = valorNuevo || '(Sin valores adicionales)';
    
    var boxAnt = document.getElementById('box-valor-anterior');
    if (valorAnterior && valorAnterior.trim() !== '') {
        document.getElementById('det-valor-anterior').innerText = valorAnterior;
        boxAnt.style.display = 'block';
    } else {
        boxAnt.style.display = 'none';
    }
    
    $('#modalDetalleActividad').modal('show');
}
</script>

<?php require_once '../plantillas/inferior3.php'; ?>
