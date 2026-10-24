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
?>

<!-- ****** ESTILOS PROPIOS ****** -->
<?php require_once '../plantillas/superior1.php'; ?>
<!-- ****** ESTILOS PROPIOS ****** -->

    <div class="container body">
      <div class="main_container">
        <!-- ***** Menu Navegacion Panel Izquierdo ***** -->
        <?php require '../menu/menu_adm.php'; ?>

        <!-- top navigation -->
        <div class="top_nav">
          <?php require '../menu/menu_top.php'; ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="background: #f4f6f9; min-height: 100vh;">
          <?php
          $error = $_GET['error'] ?? '';
          $msg = $_GET['msg'] ?? '';

          if ($error == "no") {
              echo '<div class="alert alert-danger alert-dismissible msn1" style="margin: 15px 20px 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No puedes realizar este registro</strong></div>';
          } 
          if ($msg == "2") {
              echo '<div class="alert alert-success alert-dismissible msn1" style="margin: 15px 20px 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Solicitud del "Sistema Emergencias 911" registrada con ÉXITO!</strong></div>';
          }
          if ($msg == "3") {
              echo '<div class="alert alert-success alert-dismissible msn1" style="margin: 15px 20px 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones de guardia registrada con ÉXITO!</strong></div>';
          } elseif ($msg == "4") {
              echo '<div class="alert alert-success alert-dismissible msn1" style="margin: 15px 20px 0 20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Observaciones al personal realizada con ÉXITO!</strong></div>';
          }
          ?>

          <!-- RESUMEN DE ACTIVIDADES DEL USUARIO REGISTRADO -->
          <?php require_once '../vistas/resumen_actividades_dashboard.php'; ?>
        </div>
        <!-- /page content -->

<?php require_once '../plantillas/inferior1.php'; ?>
