<!-- ////////////////////////////////         MENU PANEL DERECHO          ///////////////////////////////-->
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
      <a href="../administrador/principal.php" class="btn-dashboard-sidebar" title="Ir al Dashboard Principal">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </div>

    <div id="title_menu">
      <a href="../administrador/principal.php" title="Ir a la página principal del sistema">
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
                <span>Bienvenido,</span>
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
                  <li><a><i class="fa fa-users"></i> Administrador <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                  <li><a><i class="fa fa-sitemap"></i> Herramienta Sistema <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>Personal<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="../administrador/consulta_registro_personal.php">Nuevo Personal</a>
                            </li>
                            <li><a href="../administrador/consulta_personal.php">Consulta Personal</a>
                            </li>
                          </ul>
                        </li>
                        <li><a>Registro de Grupo<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="../administrador/organismo.php">Nuevo Organismo</a>
                            </li>
                            <li><a href="../administrador/grupos.php">Nuevo Grupo</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-archive"></i> Módulo Administrativo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administrador/registro_bienes.php">Nuevo Bienes</a></li>
                      <li><a href="../administrador/inventario_bienes.php">Inventario Bienes</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Módulo Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administrador/novedades_guardia.php">Novedades Guardia</a></li>
                      <li><a href="../administrador/registro_actividades.php">Registro de Actividades</a></li>
                      <li><a href="../administrador/estadisticas.php">Estadísticas</a></li>
                    </ul>
                  </li>
                  <li><a href="../administrador/respaldo_bd.php"><i class="fa fa-database"></i> Respaldo Base de Datos</a></li>
                  <li><a href="../administrador/registro_actividades.php"><i class="fa fa-history"></i> Registro de Actividades</a></li>
                  <li><a href="../administrador/permisos_usuario.php"><i class="fa fa-key"></i> Permisos de Usuario</a></li>
                  <li><a><i class="fa fa-info-circle
                    "></i> Ayuda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administrador/manual.php">Manual Usuario</a></li>
                      <li><a href="../administrador/contacto.php">Contactos</a></li>
                    </ul>
                  </li>
                  <li><a href="../administrador/calendario.php"><i class="fa fa-calendar"></i> Calendario <span class="label label-success pull-right"></span></a>
                  </li>
                </ul>
                </li>

                <!-- /************************************ */
                     /************************************ */
                     //               MENÚ                 //
                     //           SUPERVISORES             //
                     /************************************ */
                     /************************************ */ -->

                <li><a><i class="fa fa-users"></i> Supervisor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                <li><a><i class="fa fa-sitemap"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../supervisor/nueva_solicitud01.php">Nueva Solicitud</a></li>
                      <li><a href="../supervisor/cierre_solicitud.php">Cierre Solicitud</a></li>
                      <!--<li><a href="../supervisor/consulta_solicitud.php">Consulta 911</a></li>-->
                    </ul>
                  </li>

                <li><a><i class="fa fa-archive"></i> Observaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../supervisor/nueva_observacion.php">Nueva Observación</a></li>
                      <li><a href="../supervisor/observaciones_personal.php">Observaciones Personal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Módulo Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../supervisor/novedades_guardia.php">Novedades Guardia</a></li>
                      <li><a href="../supervisor/estadisticas_dia.php">Estadísticas</a></li>
                      <li><a href="../supervisor/estadisticas_personal.php">Estadísticas Personal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-info-circle
                    "></i> Ayuda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../supervisor/manual_sup.php">Manual Usuario</a></li>
<!--                      <li><a href="../supervisor/contactos.php">Contactos</a></li>-->
                    </ul>
                  </li>
                  <li><a href="../supervisor/calendario.php"><i class="fa fa-calendar"></i> Calendario <span class="label label-success pull-right"></span></a>
                  </li>

                    </ul>
                </li>

                <!-- /************************************ */
                     /************************************ */
                     //               MENÚ                 //
                     //           DESPACHADORES            //
                     /************************************ */
                     /************************************ */ -->

                <li><a><i class="fa fa-users"></i> Despachador <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                <li><a><i class="fa fa-sitemap"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="../despachador/nueva_solicitud.php">Nueva Solicitud</a></li>-->
                      <li><a href="../despachador/cierre_solicitud.php">Cierre Solicitud</a></li>
                      <!--<li><a href="../despachador/consulta_solicitud.php">Consulta 911</a></li>-->
                    </ul>
                  </li>

                <li><a><i class="fa fa-archive"></i> Observaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../despachador/nueva_observacion.php">Nueva Observación</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Módulo Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../despachador/novedades_guardia.php">Novedades Guardia</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-info-circle
                    "></i> Ayuda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../despachador/manual.php">Manual Usuario</a></li>
<!--                      <li><a href="../despachador/contactos.php">Contactos</a></li>-->
                    </ul>
                  </li>
                  <li><a href="../despachador/calendario.php"><i class="fa fa-calendar"></i> Calendario <span class="label label-success pull-right"></span></a>
                  </li>

                    </ul>
                </li>

                <!-- /************************************ */
                     /************************************ */
                     //               MENÚ                 //
                     //           OPERADORES            //
                     /************************************ */
                     /************************************ */ -->

                     <li><a><i class="fa fa-users"></i> Operadores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                <li><a><i class="fa fa-sitemap"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../operador/nueva_solicitud.php">Nueva Solicitud</a></li>
                      <!--<li><a href="consulta_solicitud.php">Consulta 911</a></li>-->
                    </ul>
                  </li>

                <li><a><i class="fa fa-archive"></i> Observaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../operador/nueva_observacion.php">Nueva Observación</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-info-circle
                    "></i> Ayuda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../operador/manual.php">Manual Usuario</a></li>
                      <!--<li><a href="contactos.php">Contactos</a></li>-->
                    </ul>
                  </li>
                  <li><a href="calendario.php"><i class="fa fa-calendar"></i> Calendario <span class="label label-success pull-right"></span></a>
                  </li>

                  <li><a href="control_bienes_s.php"><i class="fa fa-sign-out"></i> Cerrar Guardia <span class="label label-success pull-right"></span></a>
                  </li>

                    </ul>
                </li>

                <!-- Módulo CUPAZ en el panel principal -->
                <li><a><i class="fa fa-shield"></i> CUPAZ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../administrador/cuadrantes.php">Cuadrantes de Paz <span class="badge badge-success pull-right">240</span></a></li>
                  </ul>
                </li>

            </ul>

              </div>
              <!-- ******** Seccion LIVE ON ********* -->
              <div class="menu_section">
                <ul class="nav side-menu">                              
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a class="cerrar btn-cerrar-sesion" title="Cerrar Sesión" href="../cookie/logout.php">
                <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>