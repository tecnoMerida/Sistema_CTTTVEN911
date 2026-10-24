<?php
// ============================================================================
// Vista Oficial de Cuadrantes de Paz - Estado Mérida (VEN 9-1-1)
// Compatible con Administrador, Supervisor, Operador y Despachador
// ============================================================================

require_once __DIR__ . '/../config/conexion1.php';
require_once __DIR__ . '/../config/cuadrantes_helper.php';

// Obtener cuadrantes desde la base de datos o desde el helper en memoria
$cuadrantes_lista = [];
$res_db = @pg_query($dbconn, "SELECT * FROM public.cuadrantes_de_paz ORDER BY numero ASC");
if ($res_db && pg_num_rows($res_db) > 0) {
    while ($row = pg_fetch_assoc($res_db)) {
        $cuadrantes_lista[] = [
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
} else {
    $cuadrantes_lista = get_todos_los_cuadrantes();
}

// Extraer listas únicas para los selectores de filtro
$municipios_unicos = [];
$organismos_unicos = [];
$mapa_municipios_parroquias = [];

foreach ($cuadrantes_lista as $c) {
    $m_nom = strtoupper(trim($c['municipio']));
    $p_nom = strtoupper(trim($c['parroquia']));
    
    if (!empty($m_nom)) {
        $municipios_unicos[$m_nom] = true;
        if (!isset($mapa_municipios_parroquias[$m_nom])) {
            $mapa_municipios_parroquias[$m_nom] = [];
        }
        if (!empty($p_nom) && !in_array($p_nom, $mapa_municipios_parroquias[$m_nom])) {
            $mapa_municipios_parroquias[$m_nom][] = $p_nom;
        }
    }
    
    if (!empty($c['organismo'])) {
        $organismos_unicos[$c['organismo']] = true;
    }
}
ksort($municipios_unicos);
ksort($organismos_unicos);
ksort($mapa_municipios_parroquias);

foreach ($mapa_municipios_parroquias as $m => &$parrs) {
    sort($parrs);
}
unset($parrs);

$total_cuadrantes = count($cuadrantes_lista);
$total_municipios = count($municipios_unicos);
$total_organismos = count($organismos_unicos);
$siguiente_numero = $total_cuadrantes + 1;
$siguiente_codigo_sugerido = '22C-' . str_pad($siguiente_numero, 3, '0', STR_PAD_LEFT);
?>

<!-- Estilos y Cabecera Superior -->
<?php require_once __DIR__ . '/../plantillas/superior3.php'; ?>

<style>
.kpi-card {
    border-radius: 8px;
    background: #ffffff;
    box-shadow: 0 3px 10px rgba(0,0,0,0.06);
    border: 1px solid #e5e9ec;
    padding: 16px 20px;
    margin-bottom: 20px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
.kpi-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: #fff;
}
.bg-gradient-blue { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); }
.bg-gradient-green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
.bg-gradient-orange { background: linear-gradient(135deg, #f39c12 0%, #d35400 100%); }
.bg-gradient-purple { background: linear-gradient(135deg, #8e44ad 0%, #6c5ce7 100%); }

.badge-cuadrante {
    font-size: 13px;
    font-weight: 700;
    padding: 5px 9px;
    border-radius: 6px;
    letter-spacing: 0.5px;
    background: #2a3f54;
    color: #ffffff;
}
.phone-btn {
    font-weight: 600;
    font-size: 12.5px;
    border-radius: 4px;
    padding: 4px 8px;
    display: inline-block;
    color: #1e7e34;
    background-color: #e8f5e9;
    border: 1px solid #c8e6c9;
    text-decoration: none !important;
}
.phone-btn:hover {
    background-color: #2e7d32;
    color: #ffffff !important;
}
.copy-btn {
    padding: 3px 7px;
    font-size: 11px;
    margin-left: 3px;
    border-radius: 4px;
}
.filter-box {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px 20px;
    margin-bottom: 20px;
}
.table-cuadrantes th {
    background-color: #2a3f54;
    color: #ffffff !important;
    text-align: center;
    vertical-align: middle;
}
.sectors-cell {
    max-width: 280px;
    font-size: 12px;
    line-height: 1.35;
    color: #495057;
}
</style>

<div class="container body">
  <div class="main_container">
    <!-- Menu Navegacion Lateral -->
    <?php require $menu_archivo; ?>

    <!-- Menu Superior -->
    <div class="top_nav">
      <?php require __DIR__ . '/../menu/menu_top.php'; ?>
    </div>

    <!-- Contenido de la Pagina -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3><i class="fa fa-shield text-primary"></i> DIRECTORIO OFICIAL DE CUADRANTES DE PAZ</h3>
            <p class="text-muted" style="margin-top: -5px;">
              Sistema de Despliegue Territorial y Cuadrantes de Paz - Estado Mérida | VEN 9-1-1
            </p>
          </div>
          <div class="title_right text-right">
            <span class="badge badge-success p-2" style="font-size: 13px;">
              <i class="fa fa-check-circle"></i> <?php echo $total_cuadrantes; ?> Cuadrantes Activos
            </span>
          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Tarjetas KPI Estadísticas -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card d-flex align-items-center">
              <div class="kpi-icon bg-gradient-blue mr-3">
                <i class="fa fa-shield"></i>
              </div>
              <div>
                <span class="text-muted small font-weight-bold d-block">TOTAL CUADRANTES</span>
                <h3 class="mb-0 font-weight-bold" style="color: #1e3c72;"><?php echo $total_cuadrantes; ?></h3>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card d-flex align-items-center">
              <div class="kpi-icon bg-gradient-green mr-3">
                <i class="fa fa-map-marker"></i>
              </div>
              <div>
                <span class="text-muted small font-weight-bold d-block">MUNICIPIOS</span>
                <h3 class="mb-0 font-weight-bold" style="color: #11998e;"><?php echo $total_municipios; ?></h3>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card d-flex align-items-center">
              <div class="kpi-icon bg-gradient-orange mr-3">
                <i class="fa fa-building-o"></i>
              </div>
              <div>
                <span class="text-muted small font-weight-bold d-block">ORGANISMOS</span>
                <h3 class="mb-0 font-weight-bold" style="color: #d35400;"><?php echo $total_organismos; ?></h3>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="kpi-card d-flex align-items-center">
              <div class="kpi-icon bg-gradient-purple mr-3">
                <i class="fa fa-phone"></i>
              </div>
              <div>
                <span class="text-muted small font-weight-bold d-block">LÍNEAS DIRECTAS</span>
                <h3 class="mb-0 font-weight-bold" style="color: #6c5ce7;">100% CUBIERTAS</h3>
              </div>
            </div>
          </div>
        </div>

        <!-- Filtros de Búsqueda Rápida -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="filter-box">
              <div class="row align-items-end">
                <div class="col-md-3 col-sm-6 mb-2">
                  <label class="font-weight-bold text-secondary small"><i class="fa fa-map"></i> FILTRAR POR MUNICIPIO:</label>
                  <select id="filtro-municipio" class="form-control select2" onchange="aplicarFiltros()">
                    <option value="">-- Todos los Municipios (<?php echo $total_municipios; ?>) --</option>
                    <?php foreach ($municipios_unicos as $mun => $_): ?>
                      <option value="<?php echo htmlspecialchars($mun); ?>"><?php echo htmlspecialchars($mun); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-3 col-sm-6 mb-2">
                  <label class="font-weight-bold text-secondary small"><i class="fa fa-shield"></i> FILTRAR POR ORGANISMO:</label>
                  <select id="filtro-organismo" class="form-control select2" onchange="aplicarFiltros()">
                    <option value="">-- Todos los Organismos Responsables --</option>
                    <?php foreach ($organismos_unicos as $org => $_): ?>
                      <option value="<?php echo htmlspecialchars($org); ?>"><?php echo htmlspecialchars($org); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6 col-sm-12 mb-2 text-right">
                  <button type="button" class="btn btn-success btn-sm font-weight-bold shadow-sm" onclick="abrirModalNuevoCuadrante()" title="Registrar un nuevo Cuadrante de Paz" style="background-color: #27ae60; border-color: #219d55;">
                    <i class="fa fa-plus-circle"></i> Agregar Cuadrante
                  </button>
                  <button type="button" class="btn btn-secondary btn-sm" onclick="limpiarFiltros()">
                    <i class="fa fa-refresh"></i> Limpiar Filtros
                  </button>
                  <a href="../database/cuadrantes_de_paz.sql" download class="btn btn-info btn-sm">
                    <i class="fa fa-download"></i> Descargar SQL
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tabla Principal de Cuadrantes -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-list"></i> Listado Completo de los <?php echo $total_cuadrantes; ?> Cuadrantes de Paz</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="table-responsive">
                  <table id="tabla-cuadrantes" class="table table-striped table-bordered table-cuadrantes text-center" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 40px;">#</th>
                        <th style="width: 95px;">Cuadrante</th>
                        <th>Municipio</th>
                        <th>Parroquia</th>
                        <th style="width: 130px;">Organismo</th>
                        <th style="width: 140px;">Teléfono</th>
                        <th>Comuna</th>
                        <th>Sectores de Cobertura</th>
                        <th style="width: 135px;">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cuadrantes_lista as $c): ?>
                        <tr>
                          <td><?php echo $c['numero']; ?></td>
                          <td>
                            <span class="badge-cuadrante"><?php echo htmlspecialchars($c['cuadrante']); ?></span>
                          </td>
                          <td class="font-weight-bold text-dark text-left"><?php echo htmlspecialchars($c['municipio']); ?></td>
                          <td class="text-left"><?php echo htmlspecialchars($c['parroquia']); ?></td>
                          <td><?php echo get_badge_organismo($c['organismo']); ?></td>
                          <td>
                            <a href="tel:<?php echo htmlspecialchars($c['telefono']); ?>" class="phone-btn" title="Llamar al cuadrante">
                              <i class="fa fa-phone"></i> <?php echo htmlspecialchars($c['telefono_formato']); ?>
                            </a>
                            <button type="button" class="btn btn-default btn-xs copy-btn" onclick="copiarTexto('<?php echo htmlspecialchars($c['telefono_formato']); ?>')" title="Copiar número">
                              <i class="fa fa-copy"></i>
                            </button>
                          </td>
                          <td class="text-left small"><?php echo htmlspecialchars($c['comuna']); ?></td>
                          <td class="text-left sectors-cell">
                            <?php 
                              $sec = htmlspecialchars($c['sectores']);
                              if (strlen($sec) > 95) {
                                  echo mb_substr($sec, 0, 95) . '... <a href="javascript:void(0)" class="text-primary font-weight-bold" onclick="abrirFicha(' . htmlspecialchars(json_encode($c), ENT_QUOTES, 'UTF-8') . ')">[ver más]</a>';
                              } else {
                                  echo $sec;
                              }
                            ?>
                          </td>
                          <td style="white-space: nowrap;">
                            <button type="button" class="btn btn-xs btn-primary font-weight-bold" onclick="abrirFicha(<?php echo htmlspecialchars(json_encode($c), ENT_QUOTES, 'UTF-8'); ?>)" title="Ver ficha técnica completa">
                              <i class="fa fa-eye"></i> Ver
                            </button>
                            <button type="button" class="btn btn-xs btn-warning font-weight-bold text-dark" onclick="abrirModalEditar(<?php echo htmlspecialchars(json_encode($c), ENT_QUOTES, 'UTF-8'); ?>)" title="Editar cuadrante">
                              <i class="fa fa-pencil"></i> Editar
                            </button>
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

<!-- Modal de Ficha Técnica del Cuadrante -->
<div class="modal fade" id="modalFichaCuadrante" tabindex="-1" role="dialog" aria-labelledby="fichaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="fichaLabel">
          <i class="fa fa-shield text-warning"></i> FICHA TÉCNICA DEL CUADRANTE DE PAZ: <span id="ficha-cod-cuadrante" class="badge badge-warning text-dark ml-2"></span>
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body py-4">
        <div class="row mb-3">
          <div class="col-md-6 col-sm-12">
            <div class="card bg-light border p-3 h-100">
              <h6 class="text-primary font-weight-bold mb-2"><i class="fa fa-map-marker"></i> UBICACIÓN TERRITORIAL</h6>
              <p class="mb-1"><strong>Municipio:</strong> <span id="ficha-municipio"></span></p>
              <p class="mb-1"><strong>Parroquia:</strong> <span id="ficha-parroquia"></span></p>
              <p class="mb-0"><strong>Comuna:</strong> <span id="ficha-comuna" class="text-muted"></span></p>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card bg-light border p-3 h-100">
              <h6 class="text-success font-weight-bold mb-2"><i class="fa fa-phone"></i> ENLACE OPERATIVO DIRECTO</h6>
              <p class="mb-1"><strong>Organismo Asignado:</strong> <span id="ficha-organismo"></span></p>
              <p class="mb-2"><strong>Teléfono Cuadrante:</strong> <code id="ficha-telefono" class="font-weight-bold" style="font-size: 15px;"></code></p>
              <div>
                <a id="ficha-btn-llamar" href="" class="btn btn-success btn-sm font-weight-bold">
                  <i class="fa fa-phone"></i> Llamar Directo
                </a>
                <button type="button" id="ficha-btn-copiar" class="btn btn-secondary btn-sm" onclick="">
                  <i class="fa fa-copy"></i> Copiar Teléfono
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="card border p-3">
          <h6 class="text-dark font-weight-bold mb-2">
            <i class="fa fa-list-alt text-info"></i> SECTORES Y COMUNIDADES BAJO JURISDICCIÓN:
          </h6>
          <div id="ficha-sectores" class="p-3 bg-light rounded border" style="font-size: 13.5px; line-height: 1.6; max-height: 250px; overflow-y: auto;">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Edición de Cuadrante de Paz -->
<div class="modal fade" id="modalEditarCuadrante" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title font-weight-bold" id="editarModalLabel">
          <i class="fa fa-pencil-square-o"></i> EDITAR CUADRANTE DE PAZ: <span id="edit-badge-cuadrante" class="badge badge-dark text-white ml-2"></span>
        </h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEditarCuadrante" onsubmit="guardarCuadranteAjax(event)">
        <div class="modal-body py-3">
          <div id="alerta-editar-cuadrante" style="display:none;" class="alert alert-danger"></div>
          
          <input type="hidden" id="edit-cuadrante-hidden" name="cuadrante" value="">
          <input type="hidden" id="edit-parroquia-hidden" name="parroquia" value="">
          <input type="hidden" id="edit-municipio-hidden" name="municipio" value="">

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold"><i class="fa fa-shield text-primary"></i> Código de Cuadrante:</label>
                <input type="text" id="edit-cuadrante-display" class="form-control" readonly style="background-color: #f8f9fa; font-weight: bold; font-size: 15px;">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold"><i class="fa fa-map-marker text-danger"></i> Municipio / Parroquia:</label>
                <input type="text" id="edit-ubicacion-display" class="form-control" readonly style="background-color: #f8f9fa;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="edit-organismo"><i class="fa fa-building text-info"></i> Organismo Responsable: <span class="text-danger">*</span></label>
                <select id="edit-organismo" name="organismo" class="form-control" required>
                  <option value="">-- Seleccione Organismo --</option>
                  <option value="CPNB">CPNB</option>
                  <option value="POLICÍA DEL ESTADO MÉRIDA">POLICÍA DEL ESTADO MÉRIDA</option>
                  <option value="GNB">GNB</option>
                  <option value="POLICIA MUNICIPAL DE LIBERTADOR">POLICIA MUNICIPAL DE LIBERTADOR</option>
                  <option value="POLICIA MUNICIPAL DE CAMPO ELIAS">POLICIA MUNICIPAL DE CAMPO ELIAS</option>
                  <option value="CICPC">CICPC</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="edit-telefono"><i class="fa fa-phone text-success"></i> Teléfono del Cuadrante: <span class="text-danger">*</span></label>
                <input type="text" id="edit-telefono" name="telefono" class="form-control" placeholder="0412-1234567" required pattern="[0-9\-]{10,15}">
                <small class="text-muted">Formato: 04XX-XXXXXXX o 11 dígitos numéricos directos</small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="edit-comuna"><i class="fa fa-users text-secondary"></i> Comuna:</label>
            <input type="text" id="edit-comuna" name="comuna" class="form-control" placeholder="Nombre de la comuna asignada">
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="edit-sectores"><i class="fa fa-map-signs text-warning"></i> Sectores de Cobertura y Límites:</label>
            <textarea id="edit-sectores" name="sectores" class="form-control" rows="4" placeholder="Comunidades, barrios, avenidas y sectores bajo la cobertura de este cuadrante..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success" id="btnGuardarCuadrante"><i class="fa fa-save"></i> Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para Registrar Nuevo Cuadrante de Paz -->
<div class="modal fade" id="modalNuevoCuadrante" tabindex="-1" role="dialog" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title font-weight-bold" id="nuevoModalLabel">
          <i class="fa fa-plus-circle"></i> REGISTRAR NUEVO CUADRANTE DE PAZ
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formNuevoCuadrante" onsubmit="guardarNuevoCuadranteAjax(event)">
        <input type="hidden" name="accion" value="crear">
        <div class="modal-body py-3">
          <div id="alerta-nuevo-cuadrante" style="display:none;" class="alert alert-danger"></div>
          
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="nuevo-cuadrante">
                  <i class="fa fa-shield text-success"></i> Código de Cuadrante: <span class="text-danger">*</span>
                </label>
                <input type="text" id="nuevo-cuadrante" name="cuadrante" class="form-control" placeholder="Ej: 22C-241" required style="font-weight: bold; font-size: 15px; text-transform: uppercase;">
                <small class="text-muted">Formato estándar: 22C-XXX (consecutivo sugerido automáticamente)</small>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="nuevo-organismo">
                  <i class="fa fa-building text-info"></i> Organismo Responsable: <span class="text-danger">*</span>
                </label>
                <select id="nuevo-organismo" name="organismo" class="form-control" required>
                  <option value="">-- Seleccione Organismo --</option>
                  <option value="CPNB">CPNB</option>
                  <option value="POLICÍA DEL ESTADO MÉRIDA">POLICÍA DEL ESTADO MÉRIDA</option>
                  <option value="GNB">GNB</option>
                  <option value="POLICIA MUNICIPAL DE LIBERTADOR">POLICIA MUNICIPAL DE LIBERTADOR</option>
                  <option value="POLICIA MUNICIPAL DE CAMPO ELIAS">POLICIA MUNICIPAL DE CAMPO ELIAS</option>
                  <option value="CICPC">CICPC</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="nuevo-municipio">
                  <i class="fa fa-map text-danger"></i> Municipio: <span class="text-danger">*</span>
                </label>
                <select id="nuevo-municipio" name="municipio" class="form-control" required onchange="alCambiarMunicipioModal(this.value)">
                  <option value="">-- Seleccione Municipio --</option>
                  <?php foreach ($municipios_unicos as $mun => $_): ?>
                    <option value="<?php echo htmlspecialchars($mun); ?>"><?php echo htmlspecialchars($mun); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="nuevo-parroquia">
                  <i class="fa fa-map-marker text-warning"></i> Parroquia: <span class="text-danger">*</span>
                </label>
                <select id="nuevo-parroquia" name="parroquia" class="form-control" required onchange="alCambiarParroquiaModal(this.value)">
                  <option value="">-- Primero seleccione un Municipio --</option>
                </select>
                <input type="text" id="nuevo-parroquia-custom" name="parroquia_custom" class="form-control mt-2" placeholder="Escriba el nombre de la parroquia..." style="display:none; text-transform: uppercase;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="nuevo-telefono">
                  <i class="fa fa-phone text-success"></i> Teléfono del Cuadrante: <span class="text-danger">*</span>
                </label>
                <input type="text" id="nuevo-telefono" name="telefono" class="form-control" placeholder="0412-1234567" required pattern="[0-9\-]{10,15}">
                <small class="text-muted">Formato: 04XX-XXXXXXX o 11 dígitos numéricos</small>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="font-weight-bold" for="nuevo-comuna">
                  <i class="fa fa-users text-secondary"></i> Comuna:
                </label>
                <input type="text" id="nuevo-comuna" name="comuna" class="form-control" placeholder="Nombre de la comuna asignada (opcional)">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="nuevo-sectores">
              <i class="fa fa-map-signs text-primary"></i> Sectores de Cobertura y Límites: <span class="text-danger">*</span>
            </label>
            <textarea id="nuevo-sectores" name="sectores" class="form-control" rows="3" placeholder="Comunidades, urbanizaciones, barrios, avenidas y sectores bajo la cobertura de este cuadrante..." required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-times"></i> Cancelar
          </button>
          <button type="submit" class="btn btn-success" id="btnGuardarNuevoCuadrante">
            <i class="fa fa-save"></i> Guardar Cuadrante
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
var dataTableCuadrantes = null;

$(document).ready(function() {
    if ($.fn.DataTable.isDataTable('#tabla-cuadrantes')) {
        $('#tabla-cuadrantes').DataTable().destroy();
    }
    
    dataTableCuadrantes = $('#tabla-cuadrantes').DataTable({
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sSearch":         "Buscar:",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        },
        "pageLength": 25,
        "order": [[0, "asc"]],
        "responsive": true
    });
});

function aplicarFiltros() {
    var mun = $('#filtro-municipio').val();
    var org = $('#filtro-organismo').val();
    
    if (dataTableCuadrantes) {
        dataTableCuadrantes.column(2).search(mun ? '^' + mun + '$' : '', true, false);
        dataTableCuadrantes.column(4).search(org ? org : '', false, false);
        dataTableCuadrantes.draw();
    }
}

function limpiarFiltros() {
    $('#filtro-municipio').val('').trigger('change');
    $('#filtro-organismo').val('').trigger('change');
    if (dataTableCuadrantes) {
        dataTableCuadrantes.search('').columns().search('').draw();
    }
}

function copiarTexto(texto) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(texto).then(function() {
            alert('Teléfono ' + texto + ' copiado al portapapeles.');
        });
    } else {
        var dummy = document.createElement("textarea");
        document.body.appendChild(dummy);
        dummy.value = texto;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        alert('Teléfono ' + texto + ' copiado al portapapeles.');
    }
}

function abrirFicha(data) {
    if (typeof data === 'string') {
        try { data = JSON.parse(data); } catch(e) {}
    }
    document.getElementById('ficha-cod-cuadrante').innerText = data.cuadrante || '';
    document.getElementById('ficha-municipio').innerText = data.municipio || '';
    document.getElementById('ficha-parroquia').innerText = data.parroquia || '';
    document.getElementById('ficha-comuna').innerText = data.comuna || 'Sin comuna asignada';
    document.getElementById('ficha-organismo').innerText = data.organismo || '';
    
    var tel = data.telefono_formato || data.telefono || '';
    document.getElementById('ficha-telefono').innerText = tel;
    document.getElementById('ficha-btn-llamar').href = 'tel:' + (data.telefono || '');
    document.getElementById('ficha-btn-copiar').onclick = function() { copiarTexto(tel); };
    
    var sectoresHtml = '';
    if (data.sectores) {
        var list = data.sectores.split(',');
        sectoresHtml = '<ul class="mb-0 pl-3">';
        for (var i = 0; i < list.length; i++) {
            var item = list[i].trim();
            if (item) {
                sectoresHtml += '<li><strong>' + item + '</strong></li>';
            }
        }
        sectoresHtml += '</ul>';
    } else {
        sectoresHtml = '<em>No se especificaron sectores detallados.</em>';
    }
    document.getElementById('ficha-sectores').innerHTML = sectoresHtml;
    
    $('#modalFichaCuadrante').modal('show');
}

function abrirModalEditar(data) {
    if (typeof data === 'string') {
        try { data = JSON.parse(data); } catch(e) {}
    }
    
    $('#alerta-editar-cuadrante').hide().text('');
    $('#edit-cuadrante-hidden').val(data.cuadrante || '');
    $('#edit-parroquia-hidden').val(data.parroquia || '');
    $('#edit-municipio-hidden').val(data.municipio || '');
    
    $('#edit-badge-cuadrante').text(data.cuadrante || '');
    $('#edit-cuadrante-display').val(data.cuadrante || '');
    $('#edit-ubicacion-display').val((data.municipio || '') + ' - ' + (data.parroquia || ''));
    
    // Normalizar organismo para seleccionarlo en el select
    var org = data.organismo || '';
    var $selOrg = $('#edit-organismo');
    $selOrg.val(org);
    if (!$selOrg.val() && org) {
        // Coincidencia flexible si no fue exacta
        $selOrg.find('option').each(function() {
            if ($(this).val().toUpperCase() === org.toUpperCase()) {
                $selOrg.val($(this).val());
            }
        });
    }
    
    $('#edit-telefono').val(data.telefono_formato || data.telefono || '');
    $('#edit-comuna').val(data.comuna || '');
    $('#edit-sectores').val(data.sectores || '');
    
    $('#modalEditarCuadrante').modal('show');
}

function guardarCuadranteAjax(e) {
    e.preventDefault();
    var $btn = $('#btnGuardarCuadrante');
    $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Guardando...');
    $('#alerta-editar-cuadrante').hide().text('');
    
    var formData = $('#formEditarCuadrante').serialize();
    
    $.ajax({
        url: '../controlador/guardar_cuadrante.php',
        type: 'POST',
        data: formData,
        dataType: 'json'
    }).done(function(resp) {
        $btn.prop('disabled', false).html('<i class="fa fa-save"></i> Guardar Cambios');
        if (resp && resp.success) {
            $('#modalEditarCuadrante').modal('hide');
            alert(resp.message || 'Cuadrante actualizado correctamente.');
            window.location.reload();
        } else {
            $('#alerta-editar-cuadrante').show().text(resp.message || 'Ocurrió un error al guardar los cambios.');
        }
    }).fail(function(xhr, status, err) {
        $btn.prop('disabled', false).html('<i class="fa fa-save"></i> Guardar Cambios');
        $('#alerta-editar-cuadrante').show().text('Error de conexión al servidor: ' + err);
    });
}

// ============================================================================
// Funciones para Modal de Registro de Nuevo Cuadrante
// ============================================================================
var mapaMunicipiosParroquias = <?php echo json_encode($mapa_municipios_parroquias, JSON_UNESCAPED_UNICODE); ?>;
var sugerenciaSiguienteCodigo = '<?php echo $siguiente_codigo_sugerido; ?>';

function abrirModalNuevoCuadrante() {
    $('#alerta-nuevo-cuadrante').hide().text('');
    $('#formNuevoCuadrante')[0].reset();
    $('#nuevo-cuadrante').val(sugerenciaSiguienteCodigo);
    $('#nuevo-parroquia').html('<option value="">-- Primero seleccione un Municipio --</option>');
    $('#nuevo-parroquia-custom').hide().prop('required', false).val('');
    $('#modalNuevoCuadrante').modal('show');
}

function alCambiarMunicipioModal(municipioSeleccionado) {
    var $parrSel = $('#nuevo-parroquia');
    $parrSel.empty();
    $('#nuevo-parroquia-custom').hide().prop('required', false).val('');
    
    if (!municipioSeleccionado || !mapaMunicipiosParroquias[municipioSeleccionado]) {
        $parrSel.append('<option value="">-- Primero seleccione un Municipio --</option>');
        return;
    }
    
    var parroquias = mapaMunicipiosParroquias[municipioSeleccionado];
    $parrSel.append('<option value="">-- Seleccione Parroquia (' + parroquias.length + ') --</option>');
    for (var i = 0; i < parroquias.length; i++) {
        $parrSel.append('<option value="' + parroquias[i] + '">' + parroquias[i] + '</option>');
    }
    $parrSel.append('<option value="__OTRA__">+ Otra Parroquia (Escribir manualmente)...</option>');
}

function alCambiarParroquiaModal(val) {
    var $customInput = $('#nuevo-parroquia-custom');
    if (val === '__OTRA__') {
        $customInput.show().prop('required', true).focus();
    } else {
        $customInput.hide().prop('required', false).val('');
    }
}

function guardarNuevoCuadranteAjax(e) {
    e.preventDefault();
    var $btn = $('#btnGuardarNuevoCuadrante');
    $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Guardando...');
    $('#alerta-nuevo-cuadrante').hide().text('');
    
    var formData = $('#formNuevoCuadrante').serialize();
    
    $.ajax({
        url: '../controlador/guardar_cuadrante.php',
        type: 'POST',
        data: formData,
        dataType: 'json'
    }).done(function(resp) {
        $btn.prop('disabled', false).html('<i class="fa fa-save"></i> Guardar Cuadrante');
        if (resp && resp.success) {
            $('#modalNuevoCuadrante').modal('hide');
            alert(resp.message || 'Cuadrante registrado con éxito.');
            window.location.reload();
        } else {
            $('#alerta-nuevo-cuadrante').show().text(resp.message || 'Ocurrió un error al registrar el cuadrante.');
        }
    }).fail(function(xhr, status, err) {
        $btn.prop('disabled', false).html('<i class="fa fa-save"></i> Guardar Cuadrante');
        $('#alerta-nuevo-cuadrante').show().text('Error de conexión al servidor: ' + err);
    });
}
</script>

<?php require_once __DIR__ . '/../plantillas/inferior3.php'; ?>
