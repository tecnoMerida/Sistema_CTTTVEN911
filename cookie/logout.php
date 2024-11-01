<?php
	
  echo $_COOKIE["contador"];
    echo $_COOKIE["fecha"];
      echo $_COOKIE["usuario"];
      echo '<br/>';
      echo $_COOKIE["contador1"];
      echo $_COOKIE["usuario1"];

// Conexion con la base de datos
require_once '../config/conexion1.php';

  $contador = $_COOKIE['contador'];
  $fecha = $_COOKIE['fecha'];
  $usuario = $_COOKIE['usuario'];

$consulta_usuario=pg_query($dbconn,"SELECT * FROM public.usuario WHERE usuario = '$usuario' ");
$registro = pg_fetch_array($consulta_usuario);

            // Valores asignados a la "Bitacora"
            $usuario_session = $registro['personal_cedula'];
            $fecha_actual = date("d/m/Y | H:i:s ");
            $nombre_esquema = 'CIERRE DE SESSION';
            $nombre_tabla =  'USUARIO';
            $proceso = 'VALIDAR'; 
            $valor_nuevo = ''.$registro['id'].', '.$registro['usuario'].', '.$registro['tipo_rol_id'].', '.$registro['estado_usuario_id'].', '.$registro['personal_cedula'].', '.$fecha_actual.'';

            $bitacora_session = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_session','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_actual')";

//          $result = pg_query($dbconn, $bitacora_session) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
            if(pg_query($dbconn, $bitacora_session) or die ("Upps Fallo conexion con la Tabla")){ 
  
  // Valores contenidos en las COOKIES  
    setcookie('contador', $contador, time() - 360 );
    setcookie('contador', '', time() - 360 );
    setcookie('contador1', $contador1, time() - 360 );
    setcookie('contador1', '', time() - 360 );
    setcookie('fecha', $fecha, time()-86300 );
    setcookie('fecha', '', time()-86300 );
    setcookie('usuario', $usuario, time()-86300 );
    setcookie('usuario', '', time()-86300 );
    setcookie('usuario1', $usuario1, time()-86300 );
    setcookie('usuario1', '', time()-86300 );
// Borra todas las variables de sesión 
  $_SESSION = array(); 

  // Borra la cookie que almacena la sesión 
  if(isset($_COOKIE[session_name()])) { 
 
     setcookie(session_name(), '', time() - 86300, '/');
  // Borra la cookie que contiene las entradas de usuario

 //        setcookie(contador(), '', time() - 86400); 
//session_destroy();
  } 

  if(isset($_COOKIE['usuario'])) { 
 
     setcookie($_COOKIE3, 'usuario', time() - 86300, '/');
  // Borra la cookie que contiene las entradas de usuario

 //        setcookie(contador(), '', time() - 86400); 
//session_destroy();
  } 


  // Finalmente, destruye la sesión 
 session_destroy();
}
?>
	 <script>
    window.location="../index.php";
    </script>