<?php
require('../cookie/cookie.php');

session_start();
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

        $id = $_REQUEST['id'];

      // Conexion a la Base de Datos
      include_once '../config/conexion1.php';

      $personal_usuario = $_SESSION['personal_cedula'];
$consulta_pers = pg_query($dbconn,"SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
$regid= pg_fetch_array($consulta_pers);

$cedula= $regid['cedula'];
?>

      <!-- ****** ESTILOS PROPIOS ****** -->
      <?php require_once '../plantillas/superior3.php'; ?>
      <!-- ****** ESTILOS PROPIOS ****** -->

      <style type="text/css">

#tablecont{
  margin-bottom:-50px;
  
}
      </style>
      <div class="container body">
        <div class="main_container">
          <!-- ***** Menu Navegacion Panel Derecho ***** -->
          <?php require '../menu/menu_adm.php'; ?>

          <!-- top navigation -->
          <div class="top_nav">
            <?php require '../menu/menu_top.php' ?>
          </div>
          <!-- /top navigation -->
          <!-- ********************************** FORMULARIO REGISTRO NUEVO ORGANISMOS    *********************************** -->
          <!-- page content -->
          <?php require '../formularios/form_editar_organismo.php'; ?>
          <!-- /page content -->


    <?php
    }
  }
}
    ?>


    <?php require_once '../plantillas/inferior3.php' ?>