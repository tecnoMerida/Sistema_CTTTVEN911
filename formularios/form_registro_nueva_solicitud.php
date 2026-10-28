<?php
require_once dirname(__DIR__) . '/config/cuadrantes_helper.php';
?>
                          <!--//  
                              //Seccion Primera
                              //"Solicitud"
                              //
                              //-->
                              <div class="panel">
                            <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h4 class="panel-title">Solicitud</h4>
                            </a>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">

                                <div class="field item form-group">
                                  <!-- // Hora de apertura de la Solicitud // -->
                                 
                                  <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="tiempo_apertura_sol" id="tiempo_apertura_sol" placeholder="Tiempo de apertura" required value="<?php echo $tiempo_apertura = date('H:m:s'); ?>" title="Llene este campo con la hora de apertura de la solicitud" />
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Fecha de la solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="fecha_sol">Fecha Solicitud:</label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="fecha_sol" id="fecha_sol" placeholder="Fecha solicitud" value="<?php echo $fecha_solicitud = date("Y-n-j"); ?>" title="Llene este campo con la fecha de solicitud" required />
                                    <input type="text" class="form-control" name="" id="fecha_sol" placeholder="Fecha solicitud" value="<?php  echo date('d/m/Y'); ?>" title="Llene este campo con la fecha de solicitud" readonly/>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // Hora de la Llamada de la Solicitud // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="hora_sol">Hora de Solicitud:</label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="time" class="form-control" name="hora_sol" id="hora_sol" placeholder="Ingrese hora solicitud" value="<?php echo $hora_sol = date('H:m:s'); ?>" required title="Llene este campo con la hora de llamada de solicitud" readonly />
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="hora_cierre_sol" id="hora_cierre_sol" placeholder="Ingrese hora cierre" value="<?php echo $hora_sol = date('H:m:s'); ?>" required title="Llene este campo con la hora de cierre de la solicitud" />
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                          <!--//
                                //
                                //Seccion Segunda "Solicitante"
                                //
                                //-->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <h4 class="panel-title">Solicitante</h4>
                            </a>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                <div class="field item form-group">
                                  <!-- // número de telefono de quien realiza la llamada // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="telefono_celular_sol">Número de Teléfono:<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="text" name="telefono_celular_sol" id="telefono_celular_sol" class="form-control" title="Llene este campo con el número de teléfono de quien realiza la llamada (agregando código de area o compañía de servicio)" placeholder="Número teléfono" maxlength="14" required='required' data-validate-length-range="14,14" data-inputmask="'mask' : '(999) 999-9999'" pattern="[0-9() -]{11,14}">
                                  </div>
                                  <div class="col-md-3 col-sm-3">
                                    <p>Ej: (424) 765-4321</p>
                                  </div>
                                </div>

                                <div class="field item form-group">
                                  <!-- // nombre y apellido de la persona que llama // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="p_nombre_sol">Nombre Solicitante:<span class="required">
                                      
                                    </span></label>
                                  <div class="col-md-3 col-sm-3">
                                    <input type="text" name="p_nombre_sol" id="p_nombre_sol" class="form-control" placeholder="Nombre solicitante" minlength="2" maxlength="40" value="" title="Llene este campo con nombre y apellido de quien realiza la llamada" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ1-9 -]{1,40}"  />
                                  </div>
                                  <div class="col-md-3 col-sm-3">
                                    <input type="text" id="p_apellido_sol" name="p_apellido_sol" class="form-control" placeholder="Apellido solicitante" minlength="2" maxlength="40" value="" title="Llene este campo con nombre y apellido de quien realiza la llamada" pattern="[A-Za-záéíóúüñÁÉÍÓÜÚÑ1-9 -]{1,40}"  />
                                  </div>
                                </div>

                                <?php /********* Seleccion del Organismo que Realiza la llamada de Solicitud ***********/
                                // Consulta a la Base de Datos
                                $result = pg_query($dbconn, "SELECT * FROM organismos_solicitud");
                                if (!$result) {
                                  echo "Ocurrió un error.\n";
                                  exit;
                                }
                                ?>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="organismo_solicitante_id">Organismo:</label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="organismo_solicitante_id" id="organismos_solicitante_id" title="Seleccione si la llamada recibida es por uno de los organos de servicio o seguridad del estado">
                                      <option value="0">--Seleccione--</option>
                                      <?php
                                      while ($registro = pg_fetch_array($result)) {
                                      ?>
                                        <option name="id" value="<?php echo $registro[0] ?> "><?php echo strtoupper($registro[1]); ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="field item form-group">
                    <!-- // Llamada recibida es de algun trabajor o Funcionario Publico // -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="funcionario">Funcionario<span class="required">
                            <font COLOR="#FF0000">*</font>
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <div id="" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione si llamada recibida o solicitud, es de Funcionario Público">
                                <input type="radio" name="funcionario" value="1" class="flat" checked="checked" required> &nbsp; SI&nbsp;
                            </label>
                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" title="Seleccione si llamada recibida o solicitud, No es Funcionario Público">
                                <input type="radio" name="funcionario" value="0" class="flat" required> &nbsp; NO&nbsp;
                            </label>
                        </div>
                    </div>
                </div>

                                <?php /********* Seleccion del Motivo de la llamada de Solicitud ***********/
                                // Consulta a la Base de Datos Tabla Motivos por Grupo
                                $result44 = pg_query($dbconn, "SELECT * FROM motivo_solicitud_grupo ORDER BY id");
                                if (!$result44) {
                                  echo "Ocurrió un error.\n";
                                  exit;
                                }

                                ?>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="motivo_solicitud_id">Motivo:<span class="required">
                                      
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="motivo_solicitud_id" id="motivo_solicitud_id" title="Seleccione este campo con el motivo de la solicitud" >
                                      <option value="0">--Seleccione--</option>
                                      <?php
                                      while ($registro44 = pg_fetch_array($result44)) {
                                        $grupo = strtoupper($registro44[0]);
                                      ?>
                                        <optgroup label="<?php echo $registro44[1] ?>" value="<?php echo $grupo ?>">
                                          <?php
                                          // Consulta a la Base de Datos Tabla Motivos Solicitud     	
                                          $result45 = pg_query($dbconn, "SELECT * FROM motivo_solicitud WHERE motivo_grupo_id = '$registro44[0]' ORDER BY id ");
                                          if (!$result45) {
                                            echo "Ocurrió un error.\n";
                                            exit;
                                          }
                                          while ($registro45 = pg_fetch_array($result45)) {
                                          ?>

                                            <option name="id" value="<?php echo $registro45['id'] ?> "><?php echo strtoupper($registro45[1]); ?></option>
                                          <?php
                                          }
                                          ?>
                                        </optgroup>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--//
                                //
                                 //Sección Tercera "Detalles"
                                //
                            //-->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              <h4 class="panel-title">Detalles</h4>
                            </a>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                <div class="field item form-group">
                                  <!-- //      direccion donde ocurre el evento   //    -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="direccion_solicitud">Dirección<span class="required">
                                      
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <textarea type="text" name="direccion_solicitud" id="direccion_solicitud" class="resizable_textarea form-control" placeholder="Dirección del hecho de la solicitud" minlength="8" maxlength="400" title="Llene este campo con dirección exacta del lugar del evento" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{8,400}"></textarea>
                                  </div>
                                </div>

                                <div class="field item form-group">
                    <!-- //       detalles de la novedad           //  -->
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="detalles_solicitud">Detalles<span class="required">
                            
                        </span></label>
                    <div class="col-md-6 col-sm-6">
                        <textarea type="text" name="detalles_solicitud" id="detalles_solicitud" class="resizable_textarea form-control" placeholder="Detalles de la solicitud" title="Llene este campo con detalles del evento" ></textarea>
                    </div>
                </div>

                              </div>
                            </div>
                          </div>

                          
                          <!--//
                  //
                  //Sección Cuarta "Ubicación"
                  //
                  //-->

                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              <h4 class="panel-title">Ubicación</h4>
                            </a>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                              <div class="panel-body">

                                <!-- Selector de Cuadrante de Paz -->
                                <!-- // ========================================== // -->
                                <!-- // SECCIÓN: UBICACIÓN Y CUADRANTES DE PAZ      // -->
                                <!-- // ========================================== // -->

                                <?php
                                // Obtener Municipios del Estado Mérida (estados_id = 14)
                                $query_muns = pg_query($dbconn, "SELECT id, nombre_municipio FROM public.municipios WHERE estados_id = 14 ORDER BY nombre_municipio ASC");

                                // Obtener Parroquias del Estado Mérida
                                $query_parrs = pg_query($dbconn, "SELECT p.id, p.nombre_parroquia, p.municipios_id, m.nombre_municipio 
                                                                  FROM public.parroquias p 
                                                                  JOIN public.municipios m ON p.municipios_id = m.id 
                                                                  WHERE m.estados_id = 14 
                                                                  ORDER BY m.nombre_municipio ASC, p.nombre_parroquia ASC");
                                $all_parrs_list = [];
                                if ($query_parrs) {
                                    while ($p = pg_fetch_assoc($query_parrs)) {
                                        $all_parrs_list[] = [
                                            'id' => (int)$p['id'],
                                            'nombre' => strtoupper(trim($p['nombre_parroquia'])),
                                            'municipio_id' => (int)$p['municipios_id'],
                                            'municipio' => strtoupper(trim($p['nombre_municipio']))
                                        ];
                                    }
                                }

                                // Obtener Cuadrantes de Paz georreferenciados
                                $cuads_raw = get_cuadrantes_activos($dbconn);
                                $all_cuads_list = [];
                                foreach ($cuads_raw as $c) {
                                    $geo = get_geo_ids_for_cuadrante($c, $dbconn);
                                    $all_cuads_list[] = [
                                        'cuadrante' => $c['cuadrante'],
                                        'municipio' => $c['municipio'],
                                        'municipio_id' => (int)($geo['municipio_id'] ?? 0),
                                        'parroquia' => $c['parroquia'],
                                        'parroquia_id' => (int)($geo['parroquia_id'] ?? 0),
                                        'organismo' => $c['organismo'],
                                        'telefono' => $c['telefono_formato'],
                                        'telefono_raw' => $c['telefono'],
                                        'comuna' => $c['comuna'],
                                        'sectores' => mb_substr($c['sectores'], 0, 120)
                                    ];
                                }
                                ?>

                                <!-- 1. Desplegable de Municipios de Mérida -->
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="cboMunicipio">
                                    <i class="fa fa-map-marker text-danger"></i> Municipio:<span class="required"><font COLOR="#FF0000">*</font></span>
                                  </label>
                                  <div class="col-md-6 col-sm-6">
                                    <select id="cboMunicipio" class="form-control" name="municipio_sol" onchange="alCambiarMunicipio(this.value)" title="Seleccione el municipio del estado Mérida" required>
                                      <option value="0">-- Seleccione Municipio --</option>
                                      <?php
                                      if ($query_muns) {
                                          while ($m = pg_fetch_assoc($query_muns)) {
                                              echo '<option value="' . $m['id'] . '" data-nombre="' . htmlspecialchars(strtoupper($m['nombre_municipio'])) . '">' . htmlspecialchars(strtoupper($m['nombre_municipio'])) . '</option>';
                                          }
                                      }
                                      ?>
                                    </select>
                                    <small class="text-muted d-block mt-1">23 Municipios del Estado Bolivariano de Mérida.</small>
                                  </div>
                                </div>

                                <!-- 2. Desplegable de Parroquias de Mérida -->
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="cboParroquia">
                                    <i class="fa fa-map-signs text-warning"></i> Parroquia:<span class="required"><font COLOR="#FF0000">*</font></span>
                                  </label>
                                  <div class="col-md-6 col-sm-6">
                                    <select id="cboParroquia" class="form-control" name="parroquias_id" onchange="alCambiarParroquia(this.value)" title="Seleccione la parroquia asignada" required>
                                      <option value="0">-- Seleccione Parroquia --</option>
                                      <?php
                                      foreach ($all_parrs_list as $p) {
                                          echo '<option value="' . $p['id'] . '" data-municipio-id="' . $p['municipio_id'] . '" data-municipio="' . htmlspecialchars($p['municipio']) . '">' . htmlspecialchars($p['nombre']) . ' (' . htmlspecialchars($p['municipio']) . ')</option>';
                                      }
                                      ?>
                                    </select>
                                    <small class="text-muted d-block mt-1">86 Parroquias del Estado Mérida.</small>
                                  </div>
                                </div>

                                <!-- 3. Desplegable de Sector / Ubicación -->
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="cboSectores">
                                    <i class="fa fa-home text-info"></i> Sector / Ubicación:
                                  </label>
                                  <div class="col-md-6 col-sm-6">
                                    <select id="cboSectores" class="form-control" name="sector_sol" onchange="alCambiarSector(this.value)" title="Seleccione sector en que sucede el evento de solicitud">
                                      <option value="0">-- Seleccione o Busque Sector --</option>
                                      <?php
                                      $resultado321 = pg_query($dbconn, "SELECT sectores.id, sectores.nombre_sector, parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.sectores
                                                                INNER JOIN public.parroquias ON sectores.parroquias_id = parroquias.id
                                                                INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
                                                                INNER JOIN public.estados ON municipios.estados_id = estados.id
                                                                WHERE estados.id = 14 ORDER BY municipios.nombre_municipio, parroquias.nombre_parroquia, sectores.nombre_sector ASC");
                                      if ($resultado321) {
                                          while ($resultado = pg_fetch_array($resultado321)) {
                                              echo '<option value="' . $resultado[0] . '" data-parroquia-id="' . $resultado[2] . '" data-municipio-id="' . $resultado[4] . '">' . htmlspecialchars(strtoupper($resultado[1]) . ", " . strtoupper($resultado[3]) . ", " . strtoupper($resultado[5])) . '</option>';
                                          }
                                      }
                                      ?>
                                    </select>
                                    <small class="text-muted d-block mt-1">Comunidad, barrio, urbanización o sector.</small>
                                  </div>
                                </div>

                                <!-- 4. Desplegable de Cuadrante de Paz -->
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="cboCuadrantes">
                                    <i class="fa fa-shield text-primary"></i> Cuadrante de Paz:
                                  </label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="cuadrante" id="cboCuadrantes" onchange="sincronizarCuadranteYOrganismo(this.value)" title="Seleccione o busque el Cuadrante de Paz asignado">
                                      <?php echo get_options_cuadrantes_html('', $dbconn); ?>
                                    </select>
                                    <small class="text-muted d-block mt-1">240 Cuadrantes de Paz con números directos y organismos responsables.</small>
                                  </div>
                                </div>

                                <!-- 5. Desplegable de Organismo Cuadrante -->
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="cboOrganismo">
                                    <i class="fa fa-building text-info"></i> Organismo Cuadrante:
                                  </label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="organismo_cuadrante" id="cboOrganismo" title="Organismo de seguridad responsable del cuadrante">
                                      <?php echo get_options_organismos_html(''); ?>
                                    </select>
                                  </div>
                                </div>

                                <!-- Inputs ocultos de soporte de Cuadrante -->
                                <input type="hidden" name="telefono_cuadrante" id="telefono_cuadrante" value="">
                                <input type="hidden" name="parroquias_id_hidden" id="parroquias_id_hidden" value="0">

                                <!-- Ficha Dinámica del Cuadrante de Paz -->
                                <div class="form-group row" id="box-cuadrante-info" style="display: none;">
                                  <div class="col-md-6 offset-md-3">
                                    <div class="card shadow-sm border-0" style="border-radius: 8px; border-left: 5px solid #1abb9c !important; background: linear-gradient(135deg, #f8fbfb 0%, #eef6f5 100%); padding: 14px 18px; margin-bottom: 15px;">
                                      <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div>
                                          <span class="badge badge-dark px-2 py-1 font-weight-bold" style="font-size: 13px;" id="info-cuadrante-cod">22C-XXX</span>
                                          <span id="info-cuadrante-org-badge" class="ml-1"></span>
                                        </div>
                                        <div>
                                          <a href="#" id="info-cuadrante-tel-link" class="btn btn-sm btn-success py-1 px-3 font-weight-bold" style="font-size: 13px;" title="Llamar directamente al cuadrante">
                                            <i class="fa fa-phone"></i> <span id="info-cuadrante-tel">04XX-XXXXXXX</span>
                                          </a>
                                          <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ml-1" id="btnCopiarTelCuadrante" title="Copiar número al portapapeles">
                                            <i class="fa fa-copy"></i> Copiar
                                          </button>
                                        </div>
                                      </div>
                                      <div style="font-size: 12px; color: #495057; line-height: 1.45;">
                                        <div id="info-cuadrante-ubicacion" class="font-weight-bold text-dark"></div>
                                        <div id="info-cuadrante-comuna" class="text-muted mt-1"></div>
                                        <div id="info-cuadrante-sectores" class="mt-1 text-secondary" style="font-size: 11.5px; max-height: 70px; overflow-y: auto;"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <script>
                                var ALL_PARROQUIAS = <?php echo json_encode($all_parrs_list, JSON_UNESCAPED_UNICODE); ?>;
                                var ALL_CUADRANTES = <?php echo json_encode($all_cuads_list, JSON_UNESCAPED_UNICODE); ?>;
                                var isSyncingLocations = false;
                                var isSelectingSector = false;
                                var lastSelectedSector = null;

                                // 1. Al cambiar Municipio: filtrar Parroquias y Cuadrantes
                                function alCambiarMunicipio(munId) {
                                    if (isSyncingLocations || isSelectingSector) return;
                                    isSyncingLocations = true;

                                    var cboParr = document.getElementById('cboParroquia');
                                    if (cboParr) {
                                        cboParr.innerHTML = '<option value="0">-- Seleccione Parroquia --</option>';
                                        var filtradas = ALL_PARROQUIAS.filter(function(p) {
                                            return !munId || munId === '0' || String(p.municipio_id) === String(munId);
                                        });
                                        filtradas.forEach(function(p) {
                                            var opt = document.createElement('option');
                                            opt.value = p.id;
                                            opt.setAttribute('data-municipio-id', p.municipio_id);
                                            opt.setAttribute('data-municipio', p.municipio);
                                            opt.text = p.nombre + (!munId || munId === '0' ? ' (' + p.municipio + ')' : '');
                                            cboParr.appendChild(opt);
                                        });
                                        cboParr.value = '0';
                                        if (window.jQuery && window.jQuery(cboParr).data('select2')) {
                                            window.jQuery(cboParr).trigger('change.select2');
                                        }
                                    }

                                    // Limpiar selector de Sectores
                                    var cboSec = document.getElementById('cboSectores');
                                    if (cboSec && window.jQuery) {
                                        var $cboSec = window.jQuery(cboSec);
                                        if ($cboSec.data('select2')) $cboSec.select2('destroy');
                                        cboSec.innerHTML = '<option value="0">-- Seleccione o Busque Sector --</option>';
                                        $cboSec.select2({ width: '100%' });
                                    }

                                    // Filtrar Cuadrantes del Municipio
                                    filtrarCuadrantes(munId, 0);

                                    isSyncingLocations = false;
                                }

                                // 2. Al cambiar Parroquia: autoseleccionar Municipio, cargar sectores y Cuadrante
                                function alCambiarParroquia(parrId) {
                                    if (isSyncingLocations || isSelectingSector) return;
                                    isSyncingLocations = true;

                                    var cboParr = document.getElementById('cboParroquia');
                                    var optSelected = cboParr ? cboParr.options[cboParr.selectedIndex] : null;
                                    var munId = optSelected ? optSelected.getAttribute('data-municipio-id') : '0';

                                    // Auto-seleccionar Municipio si difiere
                                    if (munId && munId !== '0') {
                                        var cboMun = document.getElementById('cboMunicipio');
                                        if (cboMun && String(cboMun.value) !== String(munId)) {
                                            cboMun.value = munId;
                                            if (window.jQuery && window.jQuery(cboMun).data('select2')) {
                                                window.jQuery(cboMun).trigger('change.select2');
                                            }
                                        }
                                    }

                                    // Cargar Sectores de esta Parroquia vía AJAX
                                    cargarSectoresDeParroquia(parrId);

                                    // Filtrar y AUTO-SELECCIONAR Cuadrante de Paz
                                    filtrarCuadrantes(munId, parrId);

                                    isSyncingLocations = false;
                                }

                                // 3. Cargar Sectores de la Parroquia vía endpoint
                                function cargarSectoresDeParroquia(parrId, valToKeep) {
                                    var cboSec = document.getElementById('cboSectores');
                                    if (!cboSec) return;

                                    if (!parrId || parrId === '0') {
                                        return;
                                    }

                                    var valPreservar = valToKeep || (cboSec.value && cboSec.value !== '0' ? cboSec.value : null);

                                    if (window.jQuery) {
                                        window.jQuery.ajax({
                                            url: '../controlador/get_sectores.php',
                                            type: 'GET',
                                            data: { parroquia_id: parrId },
                                            dataType: 'json'
                                        }).done(function(resp) {
                                            if (resp && resp.success && resp.html_options) {
                                                var $cboSec = window.jQuery(cboSec);
                                                
                                                if ($cboSec.data('select2')) {
                                                    $cboSec.select2('destroy');
                                                }

                                                cboSec.innerHTML = resp.html_options;

                                                if (valPreservar) {
                                                    var exists = cboSec.querySelector("option[value='" + valPreservar + "']");
                                                    if (exists) {
                                                        cboSec.value = valPreservar;
                                                    } else {
                                                        cboSec.value = '0';
                                                    }
                                                } else {
                                                    cboSec.value = '0';
                                                }

                                                $cboSec.select2({ width: '100%' });
                                            }
                                        });
                                    }
                                }

                                // 4. Filtrar Cuadrantes según Municipio y Parroquia
                                function filtrarCuadrantes(munId, parrId) {
                                    var cboCuad = document.getElementById('cboCuadrantes');
                                    if (!cboCuad) return;

                                    cboCuad.innerHTML = '<option value="0">-- Seleccione Cuadrante de Paz --</option>';

                                    var filtrados = ALL_CUADRANTES.filter(function(c) {
                                        var okMun = !munId || munId === '0' || String(c.municipio_id) === String(munId);
                                        var okParr = !parrId || parrId === '0' || String(c.parroquia_id) === String(parrId);
                                        return okMun && okParr;
                                    });

                                    var optgroups = {};
                                    filtrados.forEach(function(c) {
                                        var groupKey = 'MUNICIPIO ' + c.municipio;
                                        if (!optgroups[groupKey]) optgroups[groupKey] = [];
                                        optgroups[groupKey].push(c);
                                    });

                                    for (var groupLabel in optgroups) {
                                        var grp = document.createElement('optgroup');
                                        grp.label = groupLabel;
                                        optgroups[groupLabel].forEach(function(c) {
                                            var opt = document.createElement('option');
                                            opt.value = c.cuadrante;
                                            opt.setAttribute('data-organismo', c.organismo);
                                            opt.setAttribute('data-telefono', c.telefono);
                                            opt.setAttribute('data-telefono-raw', c.telefono_raw);
                                            opt.setAttribute('data-municipio', c.municipio);
                                            opt.setAttribute('data-municipio-id', c.municipio_id);
                                            opt.setAttribute('data-parroquia', c.parroquia);
                                            opt.setAttribute('data-parroquia-id', c.parroquia_id);
                                            opt.setAttribute('data-comuna', c.comuna);
                                            opt.setAttribute('data-sectores', c.sectores);
                                            opt.text = '[' + c.cuadrante + '] ' + c.parroquia + ' - ' + c.organismo + ' (' + c.telefono + ') | ' + (c.sectores || '').substring(0, 50) + '...';
                                            grp.appendChild(opt);
                                        });
                                        cboCuad.appendChild(grp);
                                    }

                                    // SI LA PARROQUIA TIENE 1 SOLO CUADRANTE ASIGNADO: ¡SELECCIONARLO AUTOMÁTICAMENTE!
                                    if (parrId && parrId !== '0' && filtrados.length === 1) {
                                        cboCuad.value = filtrados[0].cuadrante;
                                        sincronizarCuadranteYOrganismo(filtrados[0].cuadrante);
                                    } else {
                                        cboCuad.value = '0';
                                        sincronizarCuadranteYOrganismo('0');
                                    }

                                    if (window.jQuery && window.jQuery(cboCuad).data('select2')) {
                                        window.jQuery(cboCuad).trigger('change.select2');
                                    }
                                }

                                // 5. Al cambiar Sector: autoseleccionar Cuadrante
                                function alCambiarSector(secId) {
                                    if (!secId || secId === '0') {
                                        lastSelectedSector = null;
                                        return;
                                    }
                                    if (isSyncingLocations || isSelectingSector || lastSelectedSector === String(secId)) return;
                                    lastSelectedSector = String(secId);
                                    isSelectingSector = true;

                                    var cboSec = document.getElementById('cboSectores');
                                    var opt = cboSec ? cboSec.options[cboSec.selectedIndex] : null;
                                    if (!opt) {
                                        isSelectingSector = false;
                                        return;
                                    }

                                    var pId = opt.getAttribute('data-parroquia-id') || '';
                                    var mId = opt.getAttribute('data-municipio-id') || '';

                                    if (mId && mId !== '0') {
                                        var cboM = document.getElementById('cboMunicipio');
                                        if (cboM && String(cboM.value) !== String(mId)) {
                                            cboM.value = mId;
                                            if (window.jQuery && window.jQuery(cboM).data('select2')) window.jQuery(cboM).trigger('change.select2');
                                        }
                                    }
                                    if (pId && pId !== '0') {
                                        var cboP = document.getElementById('cboParroquia');
                                        if (cboP && String(cboP.value) !== String(pId)) {
                                            cboP.value = pId;
                                            if (window.jQuery && window.jQuery(cboP).data('select2')) window.jQuery(cboP).trigger('change.select2');
                                        }
                                    }

                                    if (window.jQuery) {
                                        window.jQuery.post('../controlador/get_cuadrante_info.php', { elegido: secId }, function(resp) {
                                            if (resp && resp.success && resp.cuadrante) {
                                                var cboCuad = document.getElementById('cboCuadrantes');
                                                if (cboCuad) {
                                                    var exists = cboCuad.querySelector("option[value='" + resp.cuadrante + "']");
                                                    if (!exists) {
                                                        filtrarCuadrantes(mId, pId);
                                                    }
                                                    cboCuad.value = resp.cuadrante;
                                                    if (window.jQuery(cboCuad).data('select2')) {
                                                        window.jQuery(cboCuad).trigger('change.select2');
                                                    }
                                                    sincronizarCuadranteYOrganismo(resp.cuadrante, secId);
                                                }
                                            }
                                            setTimeout(function() { isSelectingSector = false; }, 150);
                                        }, 'json').fail(function() {
                                            isSelectingSector = false;
                                        });
                                    } else {
                                        isSelectingSector = false;
                                    }
                                }

                                // Sincronización inmediata e infalible de Cuadrante con Municipio, Parroquia y Organismo
                                function sincronizarCuadranteYOrganismo(valorCuadrante, sectorIdPreservar) {
                                    var cboCuad = document.getElementById('cboCuadrantes');
                                    var cboOrg = document.getElementById('cboOrganismo');
                                    if (!cboCuad) return;

                                    var cod = valorCuadrante || cboCuad.value;
                                    if (!cod || cod === '0') {
                                        var box = document.getElementById('box-cuadrante-info');
                                        if (box) box.style.display = 'none';
                                        var lat = document.getElementById('panel-cuadrante-lateral');
                                        if (lat) lat.style.display = 'none';
                                        return;
                                    }

                                    var opt = null;
                                    for (var i = 0; i < cboCuad.options.length; i++) {
                                        if (cboCuad.options[i].value === cod) {
                                            opt = cboCuad.options[i];
                                            break;
                                        }
                                    }
                                    if (!opt && cboCuad.selectedIndex >= 0) {
                                        opt = cboCuad.options[cboCuad.selectedIndex];
                                    }
                                    if (!opt) return;

                                    var org = opt.getAttribute('data-organismo') || '';
                                    var tel = opt.getAttribute('data-telefono') || '';
                                    var telRaw = opt.getAttribute('data-telefono-raw') || tel.replace(/[^0-9]/g, '');
                                    var mun = opt.getAttribute('data-municipio') || '';
                                    var munId = opt.getAttribute('data-municipio-id') || '';
                                    var parr = opt.getAttribute('data-parroquia') || '';
                                    var parrId = opt.getAttribute('data-parroquia-id') || '';
                                    var comuna = opt.getAttribute('data-comuna') || '';
                                    var sectores = opt.getAttribute('data-sectores') || '';

                                    // A. Retroalimentar Municipio y Parroquia si se eligió Cuadrante directamente
                                    if (!isSyncingLocations && !isSelectingSector) {
                                        isSyncingLocations = true;
                                        if (munId && munId !== '0') {
                                            var cboMun = document.getElementById('cboMunicipio');
                                            if (cboMun && String(cboMun.value) !== String(munId)) {
                                                cboMun.value = munId;
                                                if (window.jQuery && window.jQuery(cboMun).data('select2')) {
                                                    window.jQuery(cboMun).trigger('change.select2');
                                                }
                                            }
                                        }
                                        if (parrId && parrId !== '0') {
                                            var cboParr = document.getElementById('cboParroquia');
                                            if (cboParr) {
                                                var pOpt = cboParr.querySelector("option[value='" + parrId + "']");
                                                if (!pOpt && munId) {
                                                    var filtradas = ALL_PARROQUIAS.filter(function(p) {
                                                        return String(p.municipio_id) === String(munId);
                                                    });
                                                    cboParr.innerHTML = '<option value="0">-- Seleccione Parroquia --</option>';
                                                    filtradas.forEach(function(p) {
                                                        var o = document.createElement('option');
                                                        o.value = p.id;
                                                        o.setAttribute('data-municipio-id', p.municipio_id);
                                                        o.setAttribute('data-municipio', p.municipio);
                                                        o.text = p.nombre;
                                                        cboParr.appendChild(o);
                                                    });
                                                }
                                                cboParr.value = parrId;
                                                if (window.jQuery && window.jQuery(cboParr).data('select2')) {
                                                    window.jQuery(cboParr).trigger('change.select2');
                                                }
                                            }
                                            
                                            // Sólo recargar sectores si el usuario NO ha seleccionado un sector ya
                                            var cboSec = document.getElementById('cboSectores');
                                            var currSec = sectorIdPreservar || (cboSec ? cboSec.value : '0');
                                            if (!currSec || currSec === '0') {
                                                cargarSectoresDeParroquia(parrId);
                                            }
                                        }
                                        isSyncingLocations = false;
                                    }

                                    // B. SELECCIONAR AUTOMÁTICAMENTE EL ORGANISMO EN #cboOrganismo
                                    if (org && cboOrg) {
                                        var clean = function(s) {
                                            return (s || '').toString().toUpperCase()
                                                .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
                                                .replace(/[^A-Z0-9]/g, "");
                                        };
                                        var target = clean(org);
                                        var matchIdx = -1;

                                        for (var j = 0; j < cboOrg.options.length; j++) {
                                            var valClean = clean(cboOrg.options[j].value);
                                            var txtClean = clean(cboOrg.options[j].text);
                                            if (valClean === target || txtClean === target) {
                                                matchIdx = j;
                                                break;
                                            }
                                        }
                                        if (matchIdx === -1) {
                                            for (var k = 0; k < cboOrg.options.length; k++) {
                                                var v2 = clean(cboOrg.options[k].value);
                                                if (v2 && (target.indexOf(v2) !== -1 || v2.indexOf(target) !== -1)) {
                                                    matchIdx = k;
                                                    break;
                                                }
                                            }
                                        }

                                        if (matchIdx !== -1) {
                                            cboOrg.selectedIndex = matchIdx;
                                            cboOrg.value = cboOrg.options[matchIdx].value;
                                        } else {
                                            var optNew = document.createElement('option');
                                            optNew.value = org;
                                            optNew.text = org;
                                            optNew.selected = true;
                                            cboOrg.appendChild(optNew);
                                            cboOrg.value = org;
                                        }

                                        try {
                                            var ev = new Event('change', { bubbles: true });
                                            cboOrg.dispatchEvent(ev);
                                        } catch(e) {}
                                        if (window.jQuery) {
                                            window.jQuery(cboOrg).trigger('change');
                                            if (window.jQuery.fn.select2 && window.jQuery(cboOrg).data('select2')) {
                                                window.jQuery(cboOrg).trigger('change.select2');
                                            }
                                        }
                                    }

                                    // C. Campos de soporte
                                    var inTel = document.getElementById('telefono_cuadrante');
                                    if (inTel && telRaw) inTel.value = telRaw;
                                    var inParr = document.getElementById('parroquias_id_hidden');
                                    if (inParr && parrId) inParr.value = parrId;

                                    // D. Mostrar y actualizar Ficha Dinámica Central
                                    var box = document.getElementById('box-cuadrante-info');
                                    if (box) {
                                        var elCod = document.getElementById('info-cuadrante-cod');
                                        if (elCod) elCod.innerText = cod;
                                        var elTel = document.getElementById('info-cuadrante-tel');
                                        if (elTel) elTel.innerText = tel;
                                        var elLink = document.getElementById('info-cuadrante-tel-link');
                                        if (elLink) elLink.href = 'tel:' + telRaw;
                                        var elBadge = document.getElementById('info-cuadrante-org-badge');
                                        if (elBadge) {
                                            var badgeClass = 'badge-primary';
                                            if (org.indexOf('GNB') !== -1) badgeClass = 'badge-success';
                                            else if (org.indexOf('POLIC') !== -1) badgeClass = 'badge-warning text-dark';
                                            else if (org.indexOf('CICPC') !== -1) badgeClass = 'badge-dark';
                                            elBadge.innerHTML = '<span class="badge ' + badgeClass + ' px-2 py-1 font-weight-bold">' + org + '</span>';
                                        }
                                        var elUbi = document.getElementById('info-cuadrante-ubicacion');
                                        if (elUbi) elUbi.innerHTML = '<i class="fa fa-map-marker text-danger"></i> <strong>Municipio:</strong> ' + mun + ' | <strong>Parroquia:</strong> ' + parr;
                                        var elCom = document.getElementById('info-cuadrante-comuna');
                                        if (elCom) elCom.innerHTML = '<strong>Comuna:</strong> ' + (comuna || 'No registrada');
                                        var elSec = document.getElementById('info-cuadrante-sectores');
                                        if (elSec) elSec.innerHTML = sectores ? ('<strong>Sectores y Límites:</strong> ' + sectores) : '';
                                        box.style.display = 'block';
                                    }

                                    // E. Panel Lateral
                                    var panelLat = document.getElementById('panel-cuadrante-lateral');
                                    if (panelLat) {
                                        var latCod = document.getElementById('lat-cuadrante-cod');
                                        if (latCod) latCod.innerText = cod;
                                        var latOrg = document.getElementById('lat-cuadrante-org');
                                        if (latOrg) latOrg.innerText = org || 'N/A';
                                        var latTel = document.getElementById('lat-cuadrante-tel');
                                        if (latTel) latTel.innerText = tel;
                                        var latLink = document.getElementById('lat-cuadrante-tel-link');
                                        if (latLink) latLink.href = 'tel:' + telRaw;
                                        var latUbi = document.getElementById('lat-cuadrante-parr-mun');
                                        if (latUbi) latUbi.innerText = mun + ' - ' + parr;
                                        var latCom = document.getElementById('lat-cuadrante-comuna');
                                        if (latCom) latCom.innerText = comuna || 'No registrada';
                                        var latSec = document.getElementById('lat-cuadrante-sectores');
                                        if (latSec) latSec.innerText = sectores || 'No definidos';
                                        panelLat.style.display = 'block';
                                    }
                                }

                                window.alCambiarMunicipio = alCambiarMunicipio;
                                window.alCambiarParroquia = alCambiarParroquia;
                                window.alCambiarSector = alCambiarSector;
                                window.filtrarCuadrantes = filtrarCuadrantes;
                                window.actualizarCuadranteUI = sincronizarCuadranteYOrganismo;
                                window.sincronizarCuadranteYOrganismo = sincronizarCuadranteYOrganismo;

                                if (document.readyState === 'loading') {
                                    document.addEventListener('DOMContentLoaded', initSyncCuadrantes);
                                } else {
                                    initSyncCuadrantes();
                                }

                                function initSyncCuadrantes() {
                                    var sel = document.getElementById('cboCuadrantes');
                                    if (sel) {
                                        sel.addEventListener('change', function() {
                                            sincronizarCuadranteYOrganismo(this.value);
                                        });
                                    }
                                    if (window.jQuery) {
                                        window.jQuery(document).on('change select2:select', '#cboCuadrantes', function() {
                                            sincronizarCuadranteYOrganismo(this.value);
                                        });
                                    }
                                }
                                </script>


                                <div class="field item form-group">
                                  <!-- //       ingreso un Lugar o Sitio de Referencia    //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="punto_referencia_sol">Punto Referencia<span class="required">
                                     
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <input type="varchar" name="punto_referencia_sol" id="punto_referencia_sol" class="form-control" placeholder="Lugar o sitio referencia" minlength="2" maxlength="40" title="Llene este campo con lugar o sitio de referencia" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" />
                                  </div>
                                </div>

                                <?php /********* Seleccion el estatus de la Solicitud ***********/
                                // Consulta a la Base de Datos
                                $result5 = pg_query($dbconn, "SELECT * FROM estatus_solicitud WHERE id IN (5,6,7)");
                                if (!$result5) {
                                  echo "Ocurrió un error.\n";
                                  exit;
                                }
                                ?>
                                <div class="field item form-group">
                                  <!-- // Seleccion del Estatus de la Solicitud //-->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="estatus_solicitud_id">Estatus<span class="required">
                                      <font COLOR="#FF0000">*</font>
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="estatus_solicitud_id" id="estatus_solicitud_id" title="Llene este campo con la situación de la solicitud" required>
                                      <option value="">--Seleccione--</option>
                                      <?php
                                      while ($registro5 = pg_fetch_array($result5)) {
                                      ?>
                                        <option name="id" value="<?php echo $registro5[0] ?> "><?php echo strtoupper($registro5[1]); ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--//
                                //
                                 //Sección Quinta "Atención"
                                //
                            //-->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              <h4 class="panel-title">Atención</h4>
                            </a>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                              <div class="panel-body">

                          <?php
                            // Consulta al operador de la solicitud
                              $n_cedula = $cedula_personal;
                              $consulta_op = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $n_cedula");
                              $reg_operador = pg_fetch_array($consulta_op);
                              ?>

                            <div class="field item form-group">
                              <!-- // nombre del operador que recibe la llamada // -->
                                  <label class="col-form-label col-md-3 col-sm-3  label-align" for="operador_solicitud">Operador<span class="required">
                                     
                                    </span></label>
                                  <div class="col-md-6 col-sm-6">
                                  <input type="hidden" name="operador_solicitud" id="operador_solicitud" class="form-control" placeholder="Nombre del Operador" value="<?php echo $reg_operador['cedula']; ?>" minlength="2" maxlength="40" title="Llene este campo con nombre del Operador que recibe la solicitud" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" />
                                  <input type="varchar" name="" id="" class="form-control" placeholder="Nombre del Operador" value="<?php echo $reg_operador['p_nombre']; echo " "; echo $reg_operador['p_apellido']; ?>" minlength="2" maxlength="40" title="Llene este campo con nombre del Operador que recibe la solicitud" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,40}" readonly />
                                </div>
                                </div>




                                <div>
                                  <!-- //     Registro de fecha tomada por en sistema      //     -->
                                  <?php
                                  if ($grupos01 != 0) {
                                    ?>
                                  <input type="hidden" name="guardias_id" id="guardias_id" value="<?php echo $grupos01; ?>" required />
                                  <?php
                                }else{
                                  ?>
                                  <input type="hidden" name="guardias_id" id="guardias_id" value="<?php echo $grupos_guardia; ?>" required />
                                  <?php
                                        }
                                        ?>
                                </div>
                                <div>
                                  <!-- //     Registro de fecha tomada por en sistema      //     -->
                                  <input type="hidden" name="cedula_personal" id="cedula_personal" value="<?php echo $cedula_personal; ?>" required />
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-6 offset-md-3">
                                    <button type='submit' class="btn btn-primary">Guardar</button>
                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>