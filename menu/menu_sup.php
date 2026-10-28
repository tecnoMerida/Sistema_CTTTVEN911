<?php
if (!function_exists('tiene_permiso')) {
    @include_once __DIR__ . '/../config/permisos_helper.php';
}
?>
<!-- ////////////////////////////////         MENU PANEL DERECHO          /////////////////////////////////////-->
<style>
  .SLDN{
    width: 30px;
    height: 30px;
    border-radius: 60%;
    z-index: 1;
  }

  #principal1 {
    padding: 10px 12px 6px 12px;
    text-align: center;
    margin: 0;
  }

  .btn-dashboard-sidebar {
    background: linear-gradient(135deg, #1abb9c 0%, #16a085 100%) !important;
    color: #ffffff !important;
    font-weight: 700 !important;
    font-size: 12.5px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.8px !important;
    padding: 8px 12px !important;
    border: none !important;
    border-radius: 6px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 8px !important;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.35) !important;
    transition: all 0.25s ease !important;
    text-decoration: none !important;
    width: 100%;
    box-sizing: border-box;
  }

  .btn-dashboard-sidebar:hover {
    background: linear-gradient(135deg, #20c997 0%, #1abc9c 100%) !important;
    color: #ffffff !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 5px 14px rgba(26, 187, 156, 0.45) !important;
    text-decoration: none !important;
  }

  .btn-dashboard-sidebar:active {
    transform: translateY(0) !important;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3) !important;
  }

  .btn-dashboard-sidebar i {
    font-size: 15px !important;
    color: #ffffff !important;
  }

  #title_menu {
    text-align: center;
    padding: 4px 10px 8px 10px;
    margin: 0;
  }

  #title_menu a {
    color: #ECF0F1 !important;
    font-family: 'Copperplate Gothic', 'Segoe UI', Arial, sans-serif !important;
    font-size: 15px !important;
    font-weight: bold !important;
    letter-spacing: 1.5px !important;
    text-decoration: none !important;
    display: inline-block;
  }

  #title_menu a:hover {
    color: #1abb9c !important;
  }

  /* Modo menú colapsado */
  .nav-sm #principal1 {
    padding: 8px 6px 4px 6px !important;
  }

  .nav-sm .btn-dashboard-sidebar {
    padding: 8px 4px !important;
    justify-content: center !important;
  }

  .nav-sm .btn-dashboard-sidebar span {
    display: none !important;
  }

  .nav-sm #title_menu {
    display: none !important;
  }
</style>

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div id="principal1">
      <a href="principal.php" class="btn-dashboard-sidebar" title="Ir al Dashboard Principal">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </div>

    <div id="title_menu">
      <a href="principal.php" title="Ir a la página principal del sistema">
        <span>SLDN 911</span>
      </a>
    </div>

    <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/SLDN_911.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Supervisor,</span>
                <h2><?php   echo "".$_SESSION['usuario']."";?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                <?php if (tiene_permiso('modulo_solicitudes')): ?>
                <li><a><i class="fa fa-sitemap"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="nueva_solicitud01.php">Nueva Solicitud</a></li>
                      <li><a href="cierre_solicitud.php">Cierre Solicitud</a></li>
                    <!--  <li><a href="consulta_solicitud.php">Consulta 911</a></li>-->
                    </ul>
                  </li>
                <?php endif; ?>

                <?php if (tiene_permiso('modulo_seguridad')): ?>
                <li><a><i class="fa fa-archive"></i> Observaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="nueva_observacion.php">Nueva Observación</a></li>
                      <li><a href="observaciones_personal.php">Observaciones Personal</a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <?php if (tiene_permiso('modulo_seguridad') || tiene_permiso('modulo_estadisticas')): ?>
                  <li><a><i class="fa fa-edit"></i> Módulo Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if (tiene_permiso('modulo_seguridad')): ?>
                      <li><a href="novedades_guardia.php">Novedades Guardia</a></li>
                      <?php endif; ?>
                      <?php if (tiene_permiso('modulo_estadisticas')): ?>
                      <li><a href="estadisticas_dia.php">Estadísticas</a></li>
                      <li><a href="estadisticas_personal.php">Estadísticas Personal</a></li>
                      <?php endif; ?>
                    </ul>
                  </li>
                <?php endif; ?>

                <?php if (tiene_permiso('modulo_cupaz')): ?>
                  <li><a><i class="fa fa-shield"></i> CUPAZ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="cuadrantes.php">Cuadrantes de Paz <span class="badge badge-success pull-right">240</span></a></li>
                    </ul>
                  </li>
                <?php endif; ?>

                <?php if (tiene_permiso('modulo_seguridad') || tiene_permiso('modulo_estadisticas')): ?>
                  <li><a href="estadisticas.php"><i class="fa fa-sign-out"></i> Cerrar Guardia <span class="label label-success pull-right"></span></a>
                  </li>
                <?php endif; ?>

                <?php if (!tiene_permiso('modulo_solicitudes') && !tiene_permiso('modulo_seguridad') && !tiene_permiso('modulo_estadisticas') && !tiene_permiso('modulo_cupaz')): ?>
                <li style="padding: 16px 12px; text-align: center; color: #bdc3c7;">
                  <i class="fa fa-lock fa-2x text-warning" style="display: block; margin-bottom: 8px;"></i>
                  <span style="font-size: 11.5px; line-height: 1.4; display: block; color: #ecf0f1;">No tiene módulos asignados a su cuenta.<br><small class="text-muted">Contacte al Administrador</small></span>
                </li>
                <?php endif; ?>

                </ul>

              </div>
              <!-- ******** Seccion LIVE ON ********* -->
<!--              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">                              
                  
                </ul>
              </div>-->
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <?php if (tiene_permiso('modulo_seguridad') || tiene_permiso('modulo_estadisticas')): ?>
              <a class="cerrar btn-cerrar-sesion" title="Cerrar Guardia" href="estadisticas.php">
                <i class="fa fa-power-off"></i> <span>Cerrar Guardia</span>
              </a>
              <?php else: ?>
              <a class="cerrar btn-cerrar-sesion" title="Cerrar Sesión" href="../cookie/logout.php">
                <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
              </a>
              <?php endif; ?>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>