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



      // Conexion a la base de datos
      include_once '../config/conexion1.php';

      $personal_usuario = $_SESSION['personal_cedula'];
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
      $regid = pg_fetch_array($consulta_pers);

      $cedula1 = $regid['cedula'];

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
          <div class="top_nav" id="encabezado-top">
            <?php require '../menu/menu_top.php' ?>
          </div>
          <!-- ***** /Superior menú navegacion ***** -->

          <!-- *************************************************************************************************** -->
          <!-- ******************************FORMULARIO REGISTRO DE DATOS PERSONALES****************************** -->
          <?php
          require '../formularios/form_registro_personal_pariente.php';
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

<a data-scroll class="ir-arriba" href="#encabezado-top"><i class="fa fa-arrow-circle-up" aria-hidden="true"> </i> </a>

<?php require_once '../plantillas/inferior2.php' ?>
