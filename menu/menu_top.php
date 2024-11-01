<!-- /////////////////////////////////////        MENU SUPERIOR           ///////////////////////////////////// -->
          <div class="nav_menu">
              <div class="img-fluid" id="banner_superior">
              <!-- ********************    IFRAME MUESTRA LOGOS FECHA Y HORA     ******************************  -->
                   <iframe src="../HTML/mostrar_hora.html"></iframe>
              </div>
              <!-- ******************   Boton para mostrar u ocultar menu panel DERECHO  ********************* -->
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>


                 <!-- NAVEGADOR USUARIO SUPERIOR DERECHO -->
              <nav class="nav navbar-nav">
              <ul class="navbar-right">
                <li>

                </li>
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt=""><b><?php   echo " Hola, ".$_SESSION['usuario']."";?></b>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
<?php
if ($_SESSION['tipo_rol_id'] == 1) {
  ?>
                    <a class="dropdown-item"  href="../administrador/manual.php">Ayuda</a>
                    <a class="dropdown-item"  href="../cookie/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
<?php
}elseif ($_SESSION['tipo_rol_id'] == 2) {
  ?>
                    <a class="dropdown-item"  href="manual_sup.php">Ayuda</a>
                    <a class="dropdown-item"  href="estadisticas.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
  <?php
}else{
  ?>
                    <a class="dropdown-item"  href="manual.php">Ayuda</a>
                    <a class="dropdown-item"  href="control_bienes_s.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
<?php
}
?>
                  </div>
                </li>
              </ul>
            </nav>
          </div>