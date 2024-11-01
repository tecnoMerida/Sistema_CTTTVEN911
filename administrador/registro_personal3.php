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

      extract($_REQUEST);

      // Conexion a la base de datos
      include_once '../config/conexion1.php';

      $personal_usuario = $_SESSION['personal_cedula'];
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
      $regid = pg_fetch_array($consulta_pers);

      $cedula1 = $regid['cedula'];

      $cedula = $_REQUEST['cedula'];
      $p_nombre = $_REQUEST['p_nombre'];
      $s_nombre = $_REQUEST['s_nombre'];
      $p_apellido = $_REQUEST['p_apellido'];
      $s_apelllido = $_REQUEST['s_apelllido'];
      $grado_instruccion_id = $_REQUEST['grado_instruccion_id'];
      $genero_id = $_REQUEST['genero_id'];
      $telefono_celular = $_REQUEST['telefono_celular'];
      $telefono_casa = $_REQUEST['telefono_casa'];
      $correo_electronico = $_REQUEST['correo_electronico'];

      $estado_civil_id = $_REQUEST['estado_civil_id'];
      $hijos = $_REQUEST['hijos'];
      $numero_hijos = $_REQUEST['numero_hijos'];

      $parroquias_id = $_REQUEST['parroquias_id'];
      $municipios_id = $_REQUEST['municipios_id'];
      $estados_id = $_REQUEST['estados_id'];
      $nombre_sector = $_REQUEST['nombre_sector'];
      $avenida = $_REQUEST['avenida'];
      $calle = $_REQUEST['calle'];
      $casa = $_REQUEST['casa'];
      $piso = $_REQUEST['piso'];
      $apto = $_REQUEST['apto'];
      $punto_referencia = $_REQUEST['punto_referencia'];
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
          require '../formularios/form_registro_personal_laboral.php';
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
