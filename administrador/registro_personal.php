<?php
require('../cookie/cookie.php');

<<<<<<< HEAD
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
=======
session_start();
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

<<<<<<< HEAD
      extract($_GET, EXTR_SKIP);
=======
      extract($_GET);
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885

      // Conexion a la base de datos
      include_once '../config/conexion1.php';

      $personal_usuario = $_SESSION['personal_cedula'];
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
      $regid = pg_fetch_array($consulta_pers);

      $cedula1 = $regid['cedula'];

<<<<<<< HEAD
      $cedula_consultada = $_GET['cedula_consultada'] ?? '';
=======
      $cedula_consultada=$_GET['cedula_consultada'];
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
?>

      <!-- ********** MEMBRETE SUPERIOR ********* -->
      <?php require_once '../plantillas/superior2.php'; ?>
      <!-- ********** MEMBRETE SUPERIOR ********* -->

      <div class="container body">
        <div class="main_container">
          <!-- ***** Menu Navegacion Panel Derecho ***** -->
          <?php require '../menu/menu_adm.php' ?>
          <!-- ***** /Menu Navegacion Panel Derecho ***** -->
          <!-- ***** Superior menú navegacion ***** -->
          <div class="top_nav">
            <?php require '../menu/menu_top.php' ?>
          </div>
          <!-- ***** /Superior menú navegacion ***** -->

          <!-- *************************************************************************************************** -->
          <!-- ******************************FORMULARIO REGISTRO DE DATOS PERSONALES****************************** -->
          <?php
          require '../formularios/form_registro_personal.php';
          ?>
          <!-- ***************************************************************************************************** -->
        </div>
      </div>
      <!-- /page content -->


      <!-- ********************************************************************************************** -->



<?php
    }
  }
}
pg_close($dbconn);
?>

<?php require_once '../plantillas/inferior2.php' ?>
