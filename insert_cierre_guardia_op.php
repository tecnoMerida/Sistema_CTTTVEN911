<?php
require('cookie/cookie.php');

<<<<<<< HEAD
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
=======
session_start();
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 4){
                header('location: administrador/principal.php?error=no');
            }else {
                if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

// ZONA HORARIA
date_default_timezone_set('America/Caracas');

// Traer datos por metodo POST
<<<<<<< HEAD
	$accion = $_GET['ac'] ?? '';
	extract($_POST, EXTR_SKIP);
=======
	$accion = $_GET['ac'];
	extract($_POST);
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885

// Conexion con la base de datos
require_once 'config/conexion1.php';

//	if(isset ($_POST)){

	switch ($accion) {

	case 1: // Accion 1 -- Control de Bienes Salida
/***************************************     INICIO CASE 1  	****************************************/
if(isset($_POST)){ // Asigna valores a variables provenientes de POST
<<<<<<< HEAD
            $fecha_creacion = date ("Y-m-d H:i:s");
            $personal_usuario = $_POST['personal_usuario'] ?? '';
            $grupo_personal_id = !empty($_POST['grupo_personal_id']) ? $_POST['grupo_personal_id'] : 0;
            $materiales_id = '';
            if (isset ($_POST['materiales_recibe']) && is_array($_POST['materiales_recibe'])){
=======
            $fecha_creacion = date ("Y/n/j H:m:s");
            $personal_usuario = $_POST['personal_usuario'];
            $grupo_personal_id = $_POST['grupo_personal_id'];
            $materiales_id = '';
                if (isset ($_POST['materiales_recibe'])){
                foreach( $_POST['materiales_recibe'] as $id ){
                    $formato1 = $formato1.' '.$id;
                }
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
                $materiales_id = implode(', ', $_POST['materiales_recibe']);
            }
            $materiales_entrega = $materiales_id;

            // Asigna valores a variables requeridas en la tabla de bitacora
          $nombre_esquema = 'Control de Bienes Salida Guardia';
          $nombre_tabla = 'control_bienes';
          $proceso = 'Insertar';
<<<<<<< HEAD
          $valor_nuevo = "$grupo_personal_id, $materiales_entrega"; 
=======
          $valor_nuevo = ''.$_POST['grupo_personal_id'].', '.$materiales_entrega.''; 
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885

            // Inserta nuevo registro en tabla "control_bienes"
        $control_pg = "INSERT INTO public.control_bienes(fecha_creacion, grupo_personal_id, materiales_entrega) VALUES ('$fecha_creacion','$grupo_personal_id','$materiales_entrega')";

        $result = pg_query($dbconn, $control_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error()); 

            // Inserta nuevo registro en tabla "bitacora"
            $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$personal_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";

        if(pg_query($dbconn, $bitacora_obs_pg) or die ("Upps Fallo conexion con la Tabla Control de Bienes")){ 
        ?>
<!--          <script type="text/javascript">
            alert(" Control de bienes registrado con EXITO!!!");
            window.location="despachador/cierre_guardia.php"
           </script>-->
                <script type="text/javascript">
                    alert(" Cierre de guardia registrada con EXITO!!!");
                    window.location="cookie/logout.php"
                </script>
        <?php
          }else{ 
            header("Location: operador/control_bienes_e.php");
          }
    }
/****************************************    FIN BREAK 1 	***************************************/
	break;
        case 2: // Accion 2 -- Cierre de Guardia
/***************************************    INICIO CASE 2   ****************************************/
if(isset($_POST)){ // Asigna valores a variables provenientes de POST
<<<<<<< HEAD
                $fecha_fin_g = date ("Y-m-d H:i:s");
                $cierre_g = strtoupper($_POST['cierre_g'] ?? '');
                $grupos_guardia_id = !empty($_POST['grupos_guardia_id']) ? $_POST['grupos_guardia_id'] : 0;
                $usuario_salida_id = $_POST['usuario_salida_id'] ?? '';
                $control_bienes_id = !empty($_POST['control_bienes_id']) ? $_POST['control_bienes_id'] : 0;
=======
                $fecha_fin_g = date ("Y/n/j H:m:s");
                $cierre_g = strtoupper($_POST['cierre_g']);
                $grupos_guardia_id = $_POST['grupos_guardia_id'];
                $usuario_salida_id = $_POST['usuario_salida_id'];
                $control_bienes_id = $_POST['control_bienes_id'];
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885

                // Asigna valores a variables requeridas en la tabla de bitacora
                $nombre_esquema = 'Cierre de guardia';
                $nombre_tabla = 'guardias';
                $proceso = 'Insertar';
<<<<<<< HEAD
                $valor_nuevo = "$grupos_guardia_id, $cierre_g";                
=======
                $valor_nuevo = ''.$_POST['grupos_guardia_id'].', '.$_POST['cierre_g'].'';                
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
                
                //INSERTAMOS nuevo registro en la table "guardias"
        $registro_pg = "INSERT INTO public.guardias(fecha_fin_g, cierre_g, grupos_guardia_id, usuario_salida_id, control_bienes_id) VALUES ('$fecha_fin_g','$cierre_g','$grupos_guardia_id','$usuario_salida_id','$control_bienes_id')";

        $result = pg_query($dbconn, $registro_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());           

            // Consulta Ultimo Registro en tabla "personal_grupos_guardia"
        $ultimo1 = pg_query($dbconn,"SELECT * FROM personal_grupos_guardia WHERE fecha_asig=(SELECT MAX(fecha_asig) FROM  personal_grupos_guardia) ");
<<<<<<< HEAD
            $reg_id = $ultimo1 ? pg_fetch_array($ultimo1) : false;

                $id = $reg_id ? ($reg_id['id'] ?? 0) : 0;
            // ACTUALIZAMOS registro consultado
        if (!empty($id)) {
            $update_guardia = "UPDATE public.personal_grupos_guardia SET fecha_fin= '$fecha_fin_g' WHERE id = $id ";
            $result = pg_query($dbconn, $update_guardia) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error()); 
        } 
=======
            $reg_id= pg_fetch_array($ultimo1);

                $id= $reg_id['id'];
            // ACTUALIZAMOS registro consultado
        $update_guardia = "UPDATE public.personal_grupos_guardia SET fecha_fin= '$fecha_fin_g' WHERE id = $id ";

        $result = pg_query($dbconn, $update_guardia) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error()); 
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885

            // Inserta nuevo registro en tabla "bitacora"
        $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_salida_id','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_fin_g')";

       if(pg_query($dbconn, $bitacora_obs_pg) or die ("Upps Fallo conexion con la Tabla Cierre Guardia")){ 

            ?>
                <script type="text/javascript">
                    alert(" Cierre de guardia registrada con EXITO!!!");
                    window.location="cookie/logout.php"
                </script>
                     <?php 
            }else{
                header("Location: operador/cierre_guardia.php?msg=6");
            }
        }
/***************************************    FIN BREAK 2   ****************************************/
        break;

	default:
	# code ...
	break;
	}
//}
                      }
          }
}
 pg_close($dbconn); 
?>