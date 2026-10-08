<?php
// ZONA HORARIA
date_default_timezone_set('America/Caracas');

// Traer datos por metodo POST
$accion = $_GET['ac'];
extract($_POST);

// Conexion con la base de datos
require_once 'config/conexion1.php';

if (isset($_POST)) {

    switch ($accion) {
        case 1:    // Accion 1 -- Registro de Usuario

            if (isset($_POST)) {

                $usuario = $_POST['usuario'];
                $contrasena = sha1($_POST['contrasena']);
                $tipo_rol_id = $_POST['tipo_rol_id'];
                $estado_usuario_id = $_POST['estado_usuario_id'];
                $personal_cedula = $_POST['personal_cedula'];
                $fecha_creacion = date("Y/n/j H:m:s");
                $preguntas_usuario_id = $_POST['preguntas_seguridad_id'];

                // Consulta si el nombre existe en la base de datos
                $consulta = pg_query($dbconn, "SELECT * FROM public.usuario WHERE personal_cedula = '$personal_cedula' OR usuario LIKE '%$usuario%' ");
                $result1 = pg_fetch_array($consulta);

                if ($result1 != 0) {

                    header("Location: administrador/registro_personal6.php?msg=1");
                } else {

                    // Inserta el nuevo pariente
                    $command2_pg = "INSERT INTO public.usuario (usuario, contrasena, tipo_rol_id, estado_usuario_id, personal_cedula, fecha_creacion, preguntas_usuario_id) VALUES ('$usuario', '$contrasena', '$tipo_rol_id', '$estado_usuario_id', '$personal_cedula', '$fecha_creacion', '$preguntas_usuario_id')";

                    $result = pg_query($dbconn, $command2_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

                    // Valores asignados a la "Bitacora"
                    $usuario_sistema = $_POST['cedula_usuario'];
                    $nombre_esquema = 'Registro de Usuario';
                    $nombre_tabla =  'usuario';
                    $proceso = 'INSERTAR';
                    $valor_nuevo = '' . $usuario . ', ' . $contrasena . ', ' . $tipo_rol_id . ', ' . $estado_usuario_id . ', ' . $personal_cedula . ', '. $preguntas_seguridad_id .'';

                    $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";

                    if (pg_query($dbconn, $bitacora_obs) or die("Upps Fallo conexion con la Tabla")) {

                        header("Location: administrador/registro_personal7.php?msg=2");
                    } else {

                        header("Location: administrador/registro_personal6.php?msg=3");
                    }
                }
            }

            break;
        case 2: // Accion 6 -- Actualizacion Datos de Usuario		


            if (!empty($_POST)) {
                if (empty($_POST['id']) || empty($_POST['usuario']) || empty($_POST['contrasena']) || empty($_POST['tipo_rol_id']) || empty($_POST['estado_usuario_id']) || empty($_POST['personal_cedula']) || empty($_POST['fecha_creacion']) || empty($_POST['preguntas_seguridad_id'])) {

                    header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=1");
                } else {

                    $id = $_POST['id'];
                    $usuario = $_POST['usuario'];
                    $contrasena = sha1($_POST['contrasena']);
                    $tipo_rol_id = $_POST['tipo_rol_id'];
                    $estado_usuario_id = $_POST['estado_usuario_id'];
                    $personal_cedula = $_POST['personal_cedula'];
                    $fecha_creacion = $_POST['fecha_creacion'];
                    $preguntas_usuario_id = $_POST['preguntas_seguridad_id'];
/*
                    $consulta = pg_query($dbconn, "SELECT * FROM public.usuario WHERE usuario LIKE '%$usuario%' ");
                    $result1 = pg_fetch_array($consulta);
    
                    if ($result1 != 0) {
    
                        header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=7");
                    } else {
*/
                    //consulta a la base de datos
                    $usuario1 = pg_query($dbconn, "SELECT * FROM public.usuario WHERE personal_cedula = $personal_cedula ");
                    $result_usuario = pg_fetch_array($usuario1);

                    if ($result_usuario > 0) {

                        
                        if (isset($_POST['personal_cedula'])) {
                            // Actualiza datos del registro de Pariente

                            $consulta_usuario = "UPDATE public.usuario SET id='$id', usuario='$usuario', contrasena='$contrasena', tipo_rol_id='$tipo_rol_id', estado_usuario_id='$estado_usuario_id', personal_cedula='$personal_cedula', fecha_creacion='$fecha_creacion', preguntas_usuario_id='$preguntas_usuario_id' WHERE personal_cedula = $personal_cedula ";

                            $result = pg_query($dbconn, $consulta_usuario) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

                            // Valores asignados a la "Bitacora"
                            $usuario_sistema = $_POST['cedula_usuario'];
                            $nombre_esquema = 'Modificar de Usuario';
                            $nombre_tabla =  'usuario';
                            $proceso = 'MODIFICAR';
                            $valor_nuevo = '' . $usuario . ', ' . $contrasena . ', ' . $tipo_rol_id . ', ' . $estado_usuario_id . ', ' . $personal_cedula . ', '. $preguntas_usuario_id .'';
                            $fecha_modificacion = date("Y/n/j H:m:s");

                            $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
                        }

                        if (pg_query($dbconn, $bitacora_obs) or die("Upps Fallo conexion con la Tabla")) {

                            header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=4");
                        } else {

                            header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=5");
                        }
                    }
                }
          //  }
            }


            break;
            case 3:    // Accion 7 -- Registro preguntas para recuperacion contraseña de Usuario

                if (isset($_POST)) {
                    $ultimo1 = pg_query($dbconn, "SELECT * FROM  preguntas_usuario WHERE id=(SELECT MAX(id) FROM preguntas_usuario) ");
                    $reg_id = pg_fetch_array($ultimo1);

                    $ultimo = $reg_id['id']+1;
                    $pregunta1 = strtoupper($_POST['pregunta_recuperacion_1']);
                    $respuesta1 = strtoupper($_POST['respuesta_recuperacion_1']);
                    $pregunta2 = strtoupper($_POST['pregunta_recuperacion_2']);
                    $respuesta2 = strtoupper($_POST['respuesta_recuperacion_2']);
    
        
                        // Inserta el nuevo pariente
                        $sql_pg = "INSERT INTO public.preguntas_usuario(id, pregunta_recuperacion_1, respuesta_recuperacion_1, pregunta_recuperacion_2, respuesta_recuperacion_2) VALUES ('$ultimo','$pregunta1','$respuesta1','$pregunta2','$respuesta2')";
    
                        $result = pg_query($dbconn, $sql_pg) or die('ERROR AL INSERTAR DATOS PARA REGISTRO PREGUNTAS: ' . pg_last_error());
    
                        // Valores asignados a la "Bitacora"
                        $usuario_sistema = $_POST['cedula_usuario'];
                        $fecha_creacion = date("Y/n/j H:m:s");
                        $nombre_esquema = 'Registro de Preguntas de Recuperación';
                        $nombre_tabla =  'preguntas_usuario';
                        $proceso = 'INSERTAR';
                        $valor_nuevo = '' . $pregunta1 . ', ' . $respuesta1 . ', ' . $pregunta2 . ', ' . $respuesta2 . '';
    
                        $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";
    
                        if (pg_query($dbconn, $bitacora_obs) or die("Upps Fallo conexion con la Tabla")) {
    
                            header("Location: administrador/registro_personal6.php?msg=2");
                        } else {
    
                            header("Location: administrador/registro_personal5.php?msg=3");
                        }
                    }
                
    
                break;
            case 4: // Accion 8 -- Actualizacion preguntas para recuperación de contraseña de Usuario		
    
    
                if (!empty($_POST)) {
                    if (empty($_POST['id']) || empty($_POST['pregunta_recuperacion_1']) || empty($_POST['respuesta_recuperacion_1']) || empty($_POST['pregunta_recuperacion_2']) || empty($_POST['respuesta_recuperacion_2'])) {
    
                        header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=1");
                    } else {
    
                    $id = $_POST['id'];
                    $pregunta1 = strtoupper($_POST['pregunta_recuperacion_1']);
                    $respuesta1 = strtoupper($_POST['respuesta_recuperacion_1']);
                    $pregunta2 = strtoupper($_POST['pregunta_recuperacion_2']);
                    $respuesta2 = strtoupper($_POST['respuesta_recuperacion_2']);
    
    
                        //consulta a la base de datos
                        $usuario1 = pg_query($dbconn, "SELECT * FROM  preguntas_usuario WHERE id = $id ");
                        $result_usuario = pg_fetch_array($usuario1);
    
                        if ($result_usuario > 0) {
    
                            if (isset($_POST['id'])) {
                                // Actualiza datos del registro de Pariente
    
                                $consulta_usuario = "UPDATE public.preguntas_usuario SET id='$id', pregunta_recuperacion_1='$pregunta1', respuesta_recuperacion_1='$respuesta1', pregunta_recuperacion_2='$pregunta2', respuesta_recuperacion_2='$respuesta2' WHERE id = $id ";
    
                                $result = pg_query($dbconn, $consulta_usuario) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    
                                // Valores asignados a la "Bitacora"
                                $usuario_sistema = $_POST['cedula_usuario'];
                                $nombre_esquema = 'Modificar Preguntas de Seguridad';
                                $nombre_tabla =  'preguntas_usuario';
                                $proceso = 'MODIFICAR';
                                $valor_nuevo = '' . $id . ', ' . $pregunta1 . ', ' . $respuesta1 . ', ' . $pregunta2 . ', ' . $respuesta2 . '';
                                $fecha_modificacion = date("Y/n/j H:m:s");
    
                                $bitacora_obs = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_sistema','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_modificacion')";
                            }
    
                            if (pg_query($dbconn, $bitacora_obs) or die("Upps Fallo conexion con la Tabla")) {
    
                                header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=4");
                            } else {
    
                                header("Location: administrador/modificar_personal.php?id=$personal_cedula&msg=5");
                            }
                        }
                    }
                }
    
    
                break;
        default:
            # code ...
            break;
    }
}
