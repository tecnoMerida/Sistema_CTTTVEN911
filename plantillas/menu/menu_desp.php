<!-- ////////////////////////////////         MENU PANEL DERECHO          /////////////////////////////////////-->
<style>
  .SLDN{
    width: 30px;
height: 30px;
/*border-image-outset: 20px;*/
border-radius: 60%;
z-index:1;

}

#title_menu{
  font-size:10; 
  border: 0; 
  font-family:Copperplate Gothic;
  text-align: center;
  margin-top: -30px;
}

#principal1{
  font-size: 10;
  color: #ffffff;
  border: 0;
  font-family:Copperplate Gothic;
  text-align: center;
  margin-top: -5px;
}
 </style>
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
          <div id="principal1" align="center">
            <a href="../../administrador/principal.php" class="site_title" title="Ir a la página principal del sistema"><small><span> &nbsp Principal</span></small></a>
            </div>

          <div  id="title_menu" align="center">
              <a href="../../administrador/principal.php" class="site_title" title="Ir a la página principal del sistema"><small><span>Libro Digital Novedades 911</span></small></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/SLDN_911.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido Despachador,</span>
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

                <li><a><i class="fa fa-sitemap"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="nueva_solicitud.php">Nueva Solicitud</a></li>
                      <li><a href="consulta_solicitud.php">Consulta 171</a></li>
                    </ul>
                  </li>

                <li><a><i class="fa fa-archive"></i> Observaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="nueva_observacion.php">Nueva Observación</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Módulo Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="novedades_guardia.php">Novedades Guardia</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-info-circle
                    "></i> Ayuda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="manual.php">Manual Usuario</a></li>
                      <li><a href="contactos.php">Contactos</a></li>
                    </ul>
                  </li>
                  <li><a href="calendario.php"><i class="fa fa-calendar"></i> Calendario <span class="label label-success pull-right"></span></a>
                  </li>

                  <li><a href="control_bienes_s.php"><i class="fa fa-sign-out"></i> Cerrar Guardia <span class="label label-success pull-right"></span></a>
                  </li>

                </ul>

              </div>
              <!-- ******** Seccion LIVE ON ********* -->
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">                              
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" class="cerrar" title="Logout" href="control_bienes_s.php">
                <span class="fa fa-power-off" aria-hidden="true"></span>
                Cerrar Guardia<span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span class="fa fa-power-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>