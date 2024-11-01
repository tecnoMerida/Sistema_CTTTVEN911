<?php
require('cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 2){
                header('location: administrador/principal.php?error=no');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

// ZONA HORARIA
date_default_timezone_set('America/Caracas');

// Traer datos por metodo POST
	$accion = $_GET['ac'];
	extract($_POST);

// Conexion con la base de datos
require_once 'config/conexion1.php';

//	if(isset ($_POST)){

	switch ($accion) {
	case 1:	// Accion 1 -- Registro de estadisticas diarias
/******************************************  	 INICIO CASE 1 	***************************************/
if(isset($_POST)){ // Asigna valores a variables provenientes del POST
      		$efectivo = $_POST['efectivo'];
            $no_efectivo = $_POST['no_efectivo'];
            $sin_despacho = $_POST['sin_despacho'];
            $repetida = $_POST['repetida'];
            $sabotaje = $_POST['sabotaje'];
            $informacion = $_POST['informacion'];
            $abandonada = $_POST['abandonada'];
            $total_solici = $_POST['total_solici'];
            $mayor_rele = $_POST['mayor_rele'];
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
            $fecha_creacion = date ("Y/n/j H:m:s");
            $guardia_id = $_POST['guardia_id'];
            $personal_usuario = $_POST['personal_usuario'];
          // Asigna valores a variables requeridas en la tabla de bitacora
          $nombre_esquema = 'Estadisticas de solicitudes';
          $nombre_tabla = 'estadisticas_solicitud';
          $proceso = 'Insertar';
          $valor_nuevo = ''.$_POST['efectivo'].', '.$_POST['no_efectivo'].', '.$_POST['sin_despacho'].', '.$_POST['repetida'].', '.$_POST['sabotaje'].', '.$_POST['informacion'].', '.$_POST['abandonada'].', '.$_POST['total_solici'].', '.$_POST['mayor_rele'].', '.$_POST['guardia_id'].'';  


    	// Inserta el nuevo registro en tabla "personal_grupos_guardia"
		$command_pg = "INSERT INTO public.estadisticas_solicitud(efectivo, no_efectivo, sin_despacho, repetida, sabotaje, informacion, abandonada, total_solici, mayor_rele, mes, ano, guardia_id) VALUES ('$efectivo','$no_efectivo','$sin_despacho','$repetida','$sabotaje','$informacion','$abandonada','$total_solici','$mayor_rele','$mes','$ano','$guardia_id')";

        $result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());    

        // Inserta el nuevo registro en la tabla "bitacora"
             $bitacora_personal_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$personal_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";

		if(pg_query($dbconn, $bitacora_personal_pg) or die ("Upps Fallo conexion con la Tabla")){ 
        		?>
        		  <script type="text/javascript">
            			alert(" Estadisticas registradas con EXITO!!!");
            			window.location="supervisor/control_bienes_s.php"
           		  </script>
           		<?php    
		}else{ 
			header("Location: supervisor/estadisticas.php?msg=1");
			}
//}
		}
/*************************************** 	FIN BREAK 1 	****************************************/
	break;
	case 2: // Accion 2 -- Control de Bienes Salida
/***************************************     INICIO CASE 2  	****************************************/
if(isset($_POST)){ // Asigna valores a variables provenientes de POST
            $fecha_creacion = date ("Y/n/j H:m:s");
            $personal_usuario = $_POST['personal_usuario'];
            $grupo_personal_id = $_POST['grupo_personal_id'];
            $materiales_id = '';
                if (isset ($_POST['materiales_recibe'])){
                foreach( $_POST['materiales_recibe'] as $id ){
                    $formato1 = $formato1.' '.$id;
                }
                $materiales_id = implode(', ', $_POST['materiales_recibe']);
            }
            $materiales_entrega = $materiales_id;

            // Asigna valores a variables requeridas en la tabla de bitacora
          $nombre_esquema = 'Control de Bienes Salida Guardia';
          $nombre_tabla = 'control_bienes';
          $proceso = 'Insertar';
          $valor_nuevo = ''.$_POST['grupo_personal_id'].', '.$materiales_entrega.''; 

            // Inserta nuevo registro en tabla "control_bienes"
        $control_pg = "INSERT INTO public.control_bienes(fecha_creacion, grupo_personal_id, materiales_entrega) VALUES ('$fecha_creacion','$grupo_personal_id','$materiales_entrega')";

        $result = pg_query($dbconn, $control_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error()); 

            // Inserta nuevo registro en tabla "bitacora"
            $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$personal_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";

        if(pg_query($dbconn, $bitacora_obs_pg) or die ("Upps Fallo conexion con la Tabla Control de Bienes")){ 
        ?>
          <script type="text/javascript">
            alert(" Control de bienes registrado con EXITO!!!");
            window.location="supervisor/cierre_guardia.php"
           </script>
        <?php
          }else{ 
            header("Location: supervisor/control_bienes_e.php");
          }
    }
/****************************************    FIN BREAK 2 	***************************************/
	break;
        case 3: // Accion 3 -- Cierre de Guardia
/***************************************    INICIO CASE 3   ****************************************/
if(isset($_POST)){ // Asigna valores a variables provenientes de POST
                $fecha_fin_g = date ("Y/n/j H:m:s");
                $cierre_g = strtoupper($_POST['cierre_g']);
                $grupos_guardia_id = $_POST['grupos_guardia_id'];
                $usuario_salida_id = $_POST['usuario_salida_id'];
                $control_bienes_id = $_POST['control_bienes_id'];

                // Asigna valores a variables requeridas en la tabla de bitacora
                $nombre_esquema = 'Cierre de guardia';
                $nombre_tabla = 'guardias';
                $proceso = 'Insertar';
                $valor_nuevo = ''.$_POST['grupos_guardia_id'].', '.$_POST['cierre_g'].'';                
                
                //INSERTAMOS nuevo registro en la table "guardias"
        $registro_pg = "INSERT INTO public.guardias(fecha_fin_g, cierre_g, grupos_guardia_id, usuario_salida_id, control_bienes_id) VALUES ('$fecha_fin_g','$cierre_g','$grupos_guardia_id','$usuario_salida_id','$control_bienes_id')";

        $result = pg_query($dbconn, $registro_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());           
$cmdtuples = pg_affected_rows($result);
echo $cmdtuples . " datos registrados.\n";


// Free resultset liberar los datos
pg_free_result($result);

            // Consulta Ultimo Registro en tabla "personal_grupos_guardia"
        $ultimo1 = pg_query($dbconn,"SELECT * FROM personal_grupos_guardia WHERE fecha_asig=(SELECT MAX(fecha_asig) FROM  personal_grupos_guardia) ");
            $reg_id= pg_fetch_array($ultimo1);

                $id= $reg_id['id'];
            // ACTUALIZAMOS registro consultado
        $update_guardia = "UPDATE public.personal_grupos_guardia SET fecha_fin= '$fecha_fin_g' WHERE id = $id ";

        $result = pg_query($dbconn, $update_guardia) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error()); 

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
                header("Location: supervisor/cierre_guardia.php?msg=6");
            }
        }
/***************************************    FIN BREAK 3   ****************************************/
        break;
        case 4: // Accion 4 -- Apertura Guardia
/***************************************    INICIO CASE 4   ****************************************/

/***************************************    FIN BREAK 4   ****************************************/
        break;
        case 5: // Accion 2 -- Actualizacion de Bienes
/***************************************    INICIO CASE 5   ****************************************/

/***************************************    FIN BREAK 5   ****************************************/
        break;
        case 6: // Accion 2 -- Actualizacion de Bienes
/***************************************    INICIO CASE 6   ****************************************/

/***************************************    FIN BREAK 6   ****************************************/
        break;
        case 7: // Accion 2 -- Actualizacion de Bienes
/***************************************    INICIO CASE 7   ****************************************/

/***************************************    FIN BREAK 7   ****************************************/
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