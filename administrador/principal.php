<?php
require('../cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {
?>

<!-- ****** ESTILOS PROPIOS ****** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ****** ESTILOS PROPIOS ****** -->

    <div class="container body">
      <div class="main_container">
                <!-- ***** Menu Navegacion Panel Derecho ***** -->
      <?php require '../menu/menu_adm.php'; ?>

        <!-- top navigation -->
        <div class="top_nav">
          <?php require '../menu/menu_top.php' ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="background: #CDCDCD;">
          <!-- top tiles -->
          <div class="row" style="display: inline-block; background-color: #CDCDCD;" >

          </div>
          <div class="col-md-12 col-sm-12" style="display: inline-block; background-color: #CDCDCD;" >
            <nav>
              <div align="center" style="font-family: Copperplate Gothic;">
                <MARQUEE><h1><font color="#00009C">LÍBRO DIGITAL DE NOVEDADES</font><font color="#800000"> 911</font></h1></MARQUEE>
              </div>
          </nav>
          </div>
          <!-- /top tiles -->
          <br/>
          <div class="row">
          </div>
          <div class="row">
           </div>
           <div class="col-md-4 col-sm-4">
           </div>
            <div class="col-md-4 col-sm-4" style="display: inline-block; background-color: #CDCDCD;">
              <div>
                <img src="../images/Escudo_Gobernacion.png" id="logoder1" alt="">
              </div>
            </div>
           <div class="col-md-4 col-sm-4">
           </div>
          <div class="row">
            <div class="col-md-8 col-sm-8">
            </div>
          </div>
          <div align="center">
          <div class="col-md-12 col-sm-12" style="display: inline-block; background-color: #CDCDCD;">
                                      <?php
                  if ($_GET['error'] == "no") {
              echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No puedes realizar este registro</strong></div>';
              } 
              if ($_GET['msg'] == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud del "Sistema Emergencias 911" registrada con EXITO!!!</strong></div>';

              }
              if ($_GET['msg'] == "3") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones de guardia registrada con EXITO!!!</strong></div>';

              }
              elseif ($_GET['msg'] == "4") {
              echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones al personal realizada con EXITO!!!</strong></div>';
              }
             
              ?>
          </div>
          </div>
        </div>
        <!-- /page content -->

    <?php 
                  }
          }
}
    ?>

<?php require_once '../plantillas/inferior1.php' ?>
