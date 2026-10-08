<?php
require('cookie/cookie.php');

session_start();
if (!isset($_SESSION['tipo_rol_id'])) {
    header("Location: index.php?error=fuera");
} else {

    if ($_SESSION['tipo_rol_id'] != 2) {
        header('location: administrador/principal.php?error=no');
    } else {
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
                case 1:    // Accion 1 -- Registro del personal de guardia
                    /******************************************  	 INICIO CASE 1 	***************************************/
                    if (isset($_POST)) { // Asigna valores a variables provenientes del POST
                        $personal_cedula_sup = $_POST['personal_cedula_sup'];
                        $personal_cedula_aux = $_POST['personal_cedula_aux'];
                        $personal_cedula_op1 = $_POST['personal_cedula_op1'];
                        $personal_cedula_op2 = $_POST['personal_cedula_op2'];
                        $personal_cedula_op3 = $_POST['personal_cedula_op3'];
                        $personal_cedula_op4 = $_POST['personal_cedula_op4'];
                        $personal_cedula_op5 = $_POST['personal_cedula_op5'];
                        $personal_cedula_op6 = $_POST['personal_cedula_op6'];
                        $personal_cedula_poli1 = $_POST['personal_cedula_poli1'];
                        $personal_cedula_poli2 = $_POST['personal_cedula_poli2'];
                        $personal_cedula_poli3 = $_POST['personal_cedula_poli3'];
                        $personal_cedula_bomb1 = $_POST['personal_cedula_bomb1'];
                        $personal_cedula_bomb2 = $_POST['personal_cedula_bomb2'];
                        $personal_cedula_bomb3 = $_POST['personal_cedula_bomb3'];
                        $personal_cedula_pc1 = $_POST['personal_cedula_pc1'];
                        $personal_cedula_pc2 = $_POST['personal_cedula_pc2'];
                        $personal_cedula_pc3 = $_POST['personal_cedula_pc3'];

                        $grupos_guardia_id = $_POST['grupos_guardia_id'];
                        $fecha_asig = date("Y/n/j H:m:s");


                        // Verifica si existen campos vacios y asigna 0 en caso de ser TRUE
                        if (empty($personal_cedula_sup)) {
                            $personal_cedula_sup = 0;
                        }
                        if (empty($personal_cedula_aux)) {
                            $personal_cedula_aux = 0;
                        }
                        if (empty($personal_cedula_op1)) {
                            $personal_cedula_op1 = 0;
                        }
                        if (empty($personal_cedula_op2)) {
                            $personal_cedula_op2 = 0;
                        }
                        if (empty($personal_cedula_op3)) {
                            $personal_cedula_op3 = 0;
                        }
                        if (empty($personal_cedula_op4)) {
                            $personal_cedula_op4 = 0;
                        }
                        if (empty($personal_cedula_op5)) {
                            $personal_cedula_op5 = 0;
                        }
                        if (empty($personal_cedula_op6)) {
                            $personal_cedula_op6 = 0;
                        }
                        if (empty($personal_cedula_poli1)) {
                            $personal_cedula_poli1 = 0;
                        }
                        if (empty($personal_cedula_poli2)) {
                            $personal_cedula_poli2 = 0;
                        }
                        if (empty($personal_cedula_poli3)) {
                            $personal_cedula_poli3 = 0;
                        }
                        if (empty($personal_cedula_bomb1)) {
                            $personal_cedula_bomb1 = 0;
                        }
                        if (empty($personal_cedula_bomb2)) {
                            $personal_cedula_bomb2 = 0;
                        }
                        if (empty($personal_cedula_bomb3)) {
                            $personal_cedula_bomb3 = 0;
                        }
                        if (empty($personal_cedula_pc1)) {
                            $personal_cedula_pc1 = 0;
                        }
                        if (empty($personal_cedula_pc2)) {
                            $personal_cedula_pc2 = 0;
                        }
                        if (empty($personal_cedula_pc3)) {
                            $personal_cedula_pc3 = 0;
                        }

                        // Inserta el nuevo registro en tabla "personal_grupos_guardia"
                        $command_pg = "INSERT INTO public.personal_grupos_guardia(grupos_guardia_id, fecha_asig) VALUES ('$grupos_guardia_id','$fecha_asig')";

                        $result = pg_query($dbconn, $command_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
                        // Consulta ultimo registro en tabla "personal_grupos_guardia"
                        $ultimo1 = pg_query($dbconn, "SELECT id FROM personal_grupos_guardia WHERE id=(SELECT MAX(id) FROM  personal_grupos_guardia)");
                        $reg_id = pg_fetch_array($ultimo1);

                        $id_personal_grupo = $reg_id['id'];

                        // Inserta el nuevo registro en tabla "personal_datos"
                        $personal_pg = "INSERT INTO public.personal_datos(personal_cedula_sup, personal_cedula_aux, personal_cedula_op1, personal_cedula_op2, personal_cedula_op3, personal_cedula_op4, 
            personal_cedula_op5, personal_cedula_op6, personal_cedula_poli1, personal_cedula_poli2, personal_cedula_poli3, personal_cedula_bomb1, personal_cedula_bomb2, personal_cedula_bomb3, personal_cedula_pc1, personal_cedula_pc2, personal_cedula_pc3, personal_grupos_guardia_id) VALUES ('$personal_cedula_sup','$personal_cedula_aux','$personal_cedula_op1','$personal_cedula_op2','$personal_cedula_op3','$personal_cedula_op4','$personal_cedula_op5','$personal_cedula_op6','$personal_cedula_poli1','$personal_cedula_poli2','$personal_cedula_poli3','$personal_cedula_bomb1','$personal_cedula_bomb2','$personal_cedula_bomb3','$personal_cedula_pc1','$personal_cedula_pc2','$personal_cedula_pc3','$id_personal_grupo');";

                        $result = pg_query($dbconn, $personal_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

                        // Asigna valores a nuevas variables
                        $personal_usuario = $_POST['personal_usuario'];
                        $nombre_esquema = 'Personal de Guardia';
                        $nombre_tabla = 'personal_grupos_guardias';
                        $proceso = 'Insertar';
                        $valor_nuevo = '' . $_POST['personal_cedula_sup'] . ', ' . $_POST['personal_cedula_aux'] . ', ' . $_POST['personal_cedula_op1'] . ', ' . $_POST['personal_cedula_op2'] . ', ' . $_POST['personal_cedula_op3'] . ', ' . $_POST['personal_cedula_op4'] . ', ' . $_POST['personal_cedula_op5'] . ', ' . $_POST['personal_cedula_op6'] . ', ' . $_POST['personal_cedula_poli1'] . ', ' . $_POST['personal_cedula_poli2'] . ', ' . $_POST['personal_cedula_poli3'] . ', ' . $_POST['personal_cedula_bomb1'] . ', ' . $_POST['personal_cedula_bomb2'] . ', ' . $_POST['personal_cedula_bomb3'] . ', ' . $_POST['personal_cedula_pc1'] . ', ' . $_POST['personal_cedula_pc2'] . ', ' . $_POST['personal_cedula_pc3'] . ', ' . $_POST['grupos_guardia_id'] . '';

                        // Inserta el nuevo registro en la tabla "bitacora"
                        $bitacora_personal_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$personal_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_asig')";

                        if (pg_query($dbconn, $bitacora_personal_pg) or die("Upps Fallo conexion con la Tabla")) {
?>
                            <script type="text/javascript">
                                alert(" Personal de guardia registrado con EXITO!!!");
                                window.location = "supervisor/control_bienes_e.php"
                            </script>
                        <?php
                        } else {
                            header("Location: supervisor/personal_guardia.php?msg=3");
                        }
                        //}
                    }
                    /*************************************** 	FIN BREAK 1 	****************************************/
                    break;
                case 2: // Accion 2 -- Observaciones al personal en la apertura de guardia
                    /***************************************     INICIO CASE 2  	****************************************/
                    if (isset($_POST)) { // Asigna valores a variables provenientes de POST
                        $fecha_ingreso_g = date("Y/n/j H:m:s");
                        $fecha_salida_g = date("Y/n/j H:m:s");
                        $descripcion = $_POST['descripcion'];
                        $observaciones_entrada_id = strtoupper($_POST['observaciones_entrada_id']);
                        $observaciones_salida_id = $_POST['observaciones_salida_id'];
                        $personal_cedula = $_POST['personal_cedula'];
                        $personal_usuario = $_POST['personal_usuario'];
                        // Asigna valores a variables requeridas en la tabla de bitacora
                        $nombre_esquema = 'Observaciones al personal';
                        $nombre_tabla = 'personal_guardias';
                        $proceso = 'Insertar';
                        $valor_nuevo = '' . $_POST['descripcion'] . ', ' . $_POST['observaciones_entrada_id'] . ', ' . $_POST['personal_cedula'] . '';

                        // Inserta Nuevo registro en tabla "personal_guardia"
                        $personal_pg = "INSERT INTO personal_guardias(fecha_ingreso_g, descripcion, observaciones_entrada_id, personal_cedula) VALUES ('$fecha_ingreso_g','$descripcion','$observaciones_entrada_id','$personal_cedula')";

                        $result = pg_query($dbconn, $personal_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

                        // Inserta nuevo registro en tabla "bitacora"
                        $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$personal_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_ingreso_g')";

                        if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla Observaciones al Personal")) {
                            // redirecciona al formulario "personal_guardia.php"
                            header("Location: supervisor/personal_guardia.php?msg=1");
                        } else {

                            header("Location: supervisor/personal_guardia.php?msg=2");
                        }
                        //   }
                    }
                    /****************************************    FIN BREAK 2 	***************************************/
                    break;
                case 3: // Accion 3 -- Control de Bienes
                    /***************************************    INICIO CASE 3   ****************************************/
                    if (isset($_POST)) { // Asigna valores a variables provenientes de POST
                        $fecha_creacion = date("Y/n/j H:m:s");
                        $personal_cedula = $_POST['cedula_personal'];
                        $grupo_personal_id = $_POST['grupo_personal_id'];
                        /*    $materiales = '';
                if (isset ($_POST['materiales_recibe'])){
                foreach( $_POST['materiales_recibe'] as $valor ){
                    $formato = $formato.' '.$valor;
                }
                $materiales = implode(', ', $_POST['materiales_recibe']);
            }*/
                        $materiales_id = '';
                        if (isset($_POST['materiales_recibe'])) {
                            foreach ($_POST['materiales_recibe'] as $id) {
                                $formato1 = $formato1 . ' ' . $id;
                            }
                            $materiales_id = implode(', ', $_POST['materiales_recibe']);
                        }

                        //            $materiales_recibe = $materiales.', ('.$materiales_id.')';
                        $materiales_recibe = $materiales_id;

                        // Asigna valores a variables requeridas en la tabla de bitacora
                        $personal_usuario = $_POST['personal_usuario'];
                        $nombre_esquema = 'Control de Bienes Entrada Guardia';
                        $nombre_tabla = 'control_bienes';
                        $proceso = 'Insertar';
                        $valor_nuevo = '' . $_POST['grupo_personal_id'] . ', ' . $materiales_recibe . '';

                        // Inserta nuevo registro en tabla "control_bienes"
                        $control_pg = "INSERT INTO public.control_bienes(fecha_creacion, grupo_personal_id, materiales_recibe) VALUES ('$fecha_creacion','$grupo_personal_id','$materiales_recibe')";

                        $result = pg_query($dbconn, $control_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

                        // Inserta nuevo registro en tabla "bitacora"
                        $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$personal_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion')";

                        if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla Control de Bienes")) {
                        ?>
                            <script type="text/javascript">
                                alert(" Control de bienes registrado con EXITO!!!");
                                window.location = "supervisor/apertura_guardia.php"
                            </script>
                        <?php
                        } else {
                            header("Location: supervisor/control_bienes_e.php");
                        }
                    }
                    /***************************************    FIN BREAK 3   ****************************************/
                    break;
                case 4: // Accion 4 -- Apertura Guardia
                    /***************************************    INICIO CASE 4   ****************************************/
                    if (isset($_POST)) { // Asigna valores a variables provenientes de POST
                        $fecha_inicio_g = date("Y/n/j H:m:s");
                        $apertura_g = strtoupper($_POST['apertura_g']);
                        $grupos_guardia_id = $_POST['grupos_guardia_id'];
                        $usuario_entrada_id = $_POST['usuario_entrada_id'];
                        $control_bienes_id = $_POST['control_bienes_id'];

                        // Asigna valores a variables requeridas en la tabla de bitacora
                        $nombre_esquema = 'Apertura de guardia';
                        $nombre_tabla = 'guardias';
                        $proceso = 'Insertar';
                        $valor_nuevo = '' . $_POST['grupos_guardia_id'] . ', ' . $_POST['apertura_g'] . '';

                        //INSERTAMOS nuevo registro en la table "guardias"
                        $registro_pg = "INSERT INTO public.guardias(fecha_inicio_g, apertura_g, grupos_guardia_id, usuario_entrada_id, control_bienes_id) VALUES ('$fecha_inicio_g','$apertura_g','$grupos_guardia_id','$usuario_entrada_id','$control_bienes_id')";

                        $result = pg_query($dbconn, $registro_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
                        // Inserta nuevo registro en tabla "bitacora"
                        $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$usuario_entrada_id','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_inicio_g')";

                        if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla Apertura Guardia")) {

                        ?>
                            <script type="text/javascript">
                                alert(" Apertura de guardia registrada con EXITO!!!");
                                window.location = "supervisor/principal.php"
                            </script>
<?php
                        } else {
                            header("Location: supervisor/apertura_guardia.php?msg=6");
                        }
                    }
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