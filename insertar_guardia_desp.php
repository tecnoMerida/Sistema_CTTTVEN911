<?php
require('cookie/cookie.php');

session_start();
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 3) {
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

      if (isset($_POST)) {

        switch ($accion) {
          case 1:  // Accion 1 -- Registro de Solicitud
            /******************************************  	 INICIO CASE 1 		***************************************/

            if (isset($_POST)) { // Asignamos valores a las variables del POST
              // Tabla "Solicitante"
              $p_nombre_sol = strtoupper($_POST['p_nombre_sol']);
              $p_apellido_sol = strtoupper($_POST['p_apellido_sol']);
              $telefono_celular_sol = $_POST['telefono_celular_sol'];
              $motivo_solicitud_id = $_POST['motivo_solicitud_id'];
              $organismos_solicitud_id = $_POST['organismo_solicitante_id'];
              // Tabla "Solicitudes"
              $tiempo_apertura_sol = $_POST['tiempo_apertura_sol'];
              $fecha_sol = $_POST['fecha_sol'];
              $hora_sol = $_POST['hora_sol'];
              $hora_cierre_sol = $_POST['hora_cierre_sol'];
              $sector_sol = strtoupper($_POST['sector_sol']);
              $punto_referencia_sol = strtoupper($_POST['punto_referencia_sol']);
              $parroquias_id = $_POST['parroquias_id'];
              $guardias_id = $_POST['guardias_id'];
              $estatus_solicitud_id = $_POST['estatus_solicitud_id'];
              $fecha_creacion_sol = date("Y/n/j H:m:s");

              // Tabla "Solicitud Atensión"
              $detalles_solicitud = strtoupper($_POST['detalles_solicitud']);
              $procedimiento_solicitud = ' ';
              $num_fallecidos = 0;
              $num_lesionados = 0;
              $num_heridos = 0;
              $funcionario = $_POST['funcionario'];
                  $amigo171 = $_POST['amigo171'];
              $motos = 0;
              $vehiculos = 0;
              $direccion_solicitud = strtoupper($_POST['direccion_solicitud']);
              $despachador_solicitud = $_POST['cedula_personal'];
              $operador_solicitud = $_POST['operador_solicitud'];
              $num_motos = 0;
              $num_vehiculos = 0;

              // Asigna valores a variables requeridas en la tabla de bitacora
              $cedula_personal = $_POST['cedula_personal'];
              $nombre_esquema = 'Nuevas Solicitudes';
              $nombre_tabla = 'solicitudes';
              $proceso = 'Insertar';
              $valor_nuevo = '' . $_POST['tiempo_apertura_sol'] . ', ' . $_POST['fecha_sol'] . ', ' . $_POST['hora_sol'] . ', ' . $_POST['p_nombre_sol'] . ', ' . $_POST['p_apellido_sol'] . ', ' . $_POST['telefono_celular_sol'] . ', ' . $_POST['organismo_solicitante_id'] . ', ' . $_POST['motivo_solicitud_id'] . ', ' . $_POST['sector_sol'] . ', ' . $_POST['punto_referencia_sol'] . ', ' . $_POST['parroquias_id'] . ', ' . $_POST['guardias_id'] . ', ' . $_POST['estatus_solicitud_id'] . ', ' . $_POST['direccion_solicitud'] . ', ' . $_POST['operador_solicitud'] . '';

              // Inserta nuevo registro de solicitante
              $solicitante = "INSERT INTO public.solicitante( p_nombre_sol, p_apellido_sol, telefono_celular_sol, motivo_solicitud_id, organismos_solicitud_id) VALUES ('$p_nombre_sol','$p_apellido_sol','$telefono_celular_sol','$motivo_solicitud_id','$organismos_solicitud_id')";

              $result1 = pg_query($dbconn, $solicitante) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

              $cmdtuples = pg_affected_rows($result1);
              echo $cmdtuples . " datos registrados.\n";

              // Consulta ultimo registro ingresado en solicitante
              $consulta1 = pg_query($dbconn, "SELECT * FROM public.solicitante WHERE id=(SELECT MAX(id) FROM solicitante)");
              $reg01 = pg_fetch_array($consulta1);

              $solicitante_id = $reg01['id'];


              // Inserta Nuevo registro de solicitudes
              $solicitud = "INSERT INTO public.solicitudes(tiempo_apertura_sol, fecha_sol, hora_sol, hora_cierre_sol, sector_sol, punto_referencia_sol, parroquias_id, solicitante_id, guardias_id, estatus_solicitud_id, fecha_creacion_sol) VALUES ('$tiempo_apertura_sol','$fecha_sol','$hora_sol','$hora_cierre_sol','$sector_sol','$punto_referencia_sol','$parroquias_id','$solicitante_id','$guardias_id','$estatus_solicitud_id','$fecha_creacion_sol')";

              $result2 = pg_query($dbconn, $solicitud) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

              $cmdtuples = pg_affected_rows($result2);
              echo $cmdtuples . " datos registrados.\n";

              // Consulta ultimo registro ingresado en solicitudes
              $consulta2 = pg_query($dbconn, "SELECT * FROM public.solicitudes WHERE id=(SELECT MAX(id) FROM  solicitudes)");
              $reg_02 = pg_fetch_array($consulta2);

              $solicitudes_id = $reg_02['id'];

              // Insertar nuevo registro de solicitud_atencion
              $atencion = "INSERT INTO public.solicitud_atencion(detalles_solicitud, procedimiento_solicitud, num_fallecidos, num_lesionados, num_heridos, funcionario, amigo171, motos, vehiculos, solicitudes_id, direccion_solicitud, despachador_solicitud, operador_solicitud, num_motos, num_vehiculos) VALUES ('$detalles_solicitud','$procedimiento_solicitud','$num_fallecidos','$num_lesionados','$num_heridos','$funcionario','$amigo171','$motos','$vehiculos','$solicitudes_id','$direccion_solicitud','$despachador_solicitud','$operador_solicitud','$num_motos','$num_vehiculos')";

              $result3 = pg_query($dbconn, $atencion) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

              $cmdtuples = pg_affected_rows($result3);
              echo $cmdtuples . " datos registrados.\n";

              // Inserta nuevo registro en tabla "bitacora"
              $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$cedula_personal','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion_sol')";

              if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla")) {

                header("Location: despachador/principal.php?msg=1");
              } else {

                header("Location: despachador/nueva_solicitud.php?msg=3");
              }
            }

            /*************************************** 		FIN BREAK 1 	****************************************/
            break;
          case 2:  // Accion 2 -- Registro de Cierre de Solicitud
            /******************************************  	 INICIO CASE 1 		***************************************/
            // verifica que todos los campos esten rellenados
/*            if (!empty($_POST)) {
              if (
                empty($_POST['solicitante']) || empty($_POST['p_nombre_sol']) || empty($_POST['p_apellido_sol']) || empty($_POST['telefono_celular_sol']) || empty($_POST['motivo_solicitud_id']) || empty($_POST['organismo_solicitante_id']) ||
                empty($_POST['solicitudes']) || empty($_POST['tiempo_apertura_sol']) || empty($_POST['fecha_sol']) || empty($_POST['hora_sol']) || empty($_POST['hora_cierre_sol']) || empty($_POST['tiempo_respuesta_sol']) || empty($_POST['tiempo_respuesta_sol1']) || empty($_POST['sector_sol']) || empty($_POST['punto_referencia_sol']) || empty($_POST['parroquias_id']) || empty($_POST['guardias_id']) || empty($_POST['estatus_solicitud_id']) || empty($_POST['fecha_creacion_sol']) ||
                empty($_POST['solicitud_atencion']) || empty($_POST['detalles_solicitud']) || empty($_POST['procedimiento_solicitud']) || empty($_POST['num_fallecidos']) || empty($_POST['num_lesionados']) || empty($_POST['num_heridos']) || empty($_POST['funcionario']) || empty($_POST['amigo171']) || empty($_POST['motos']) || empty($_POST['vehiculos']) || empty($_POST['direccion_solicitud']) || empty($_POST['despachador_solicitud']) || empty($_POST['operador_solicitud']) || empty($_POST['num_motos']) || empty($_POST['num_vehiculos']) || empty($_POST['organismos_solicitud_id'])
              ) {
                $id_solicitudes = $_POST['solicitudes'];
                header("Location: despachador/cierre_solicitud1.php?id=$id_solicitudes&msg=3");
              } else {*/
                if (isset($_POST)) { // Asignamos valores a las variables del POST
                  // Tabla "Solicitante"
                  $id_solicitante = $_POST['solicitante'];
                  $p_nombre_sol = strtoupper($_POST['p_nombre_sol']);
                  $p_apellido_sol = strtoupper($_POST['p_apellido_sol']);
                  $telefono_celular_sol = $_POST['telefono_celular_sol'];
                  $motivo_solicitud_id = $_POST['motivo_solicitud_id'];
                  $organismo_solicitante_id = $_POST['organismo_solicitante_id'];

                  // Tabla "Solicitudes"
                  $id_solicitudes = $_POST['solicitudes'];
                  $tiempo_apertura_sol = $_POST['tiempo_apertura_sol'];
                  $fecha_sol = $_POST['fecha_sol'];
                  $hora_sol = $_POST['hora_sol'];
                  $hora_cierre_sol = $_POST['hora_cierre_sol'];

                  
//                  $trs1 = $_POST['tiempo_respuesta_sol'];
//                  $trs2 = $_POST['tiempo_respuesta_sol1'];
//                  $trs3 = '' . $trs1 . ':' . $trs2 . '';

//                  $dato = $reg['hora_sol'];
              //    $hora = date('H', strtotime($dato));
              //    $minuto = date('i', strtotime($dato));
  
//                  $dato2 = date('H:i:s');
              //    $hora2 = date('H', strtotime($dato2));
              //    $minuto2 = date('i', strtotime($dato2));
  
              $horaInicio = $reg['hora_sol'];
              $horaTermino = date('H:i:s');
              $datex7 = new DateTime($horaTermino);
              $datex77 = new DateTime($horaInicio);
              $horax7 = date_diff($datex7, $datex77);
              
              $tiempo_respuesta = $horax7->format('%H:%I:%s');
//              $tiempo_efectivo01 = date('H', strtotime($hx7x7));
//              $tiempo_efectivo02 = date('i', strtotime($hx7x7));
                  $tiempo_respuesta_sol = 1;
  
                  $sector_sol = strtoupper($_POST['sector_sol']);
                  $punto_referencia_sol = strtoupper($_POST['punto_referencia_sol']);
                  $parroquias_id = $_POST['parroquias_id'];
                  $guardias_id = $_POST['guardias_id'];
                  $estatus_solicitud_id = $_POST['estatus_solicitud_id'];
                  $fecha_creacion_sol = $_POST['fecha_creacion_sol'];

                  // Tabla "Solicitud Atención"
                  $id_atencion = $_POST['solicitud_atencion'];
                  $detalles_solicitud = strtoupper($_POST['detalles_solicitud']);
                  $procedimiento_solicitud = strtoupper($_POST['procedimiento_solicitud']);
                  $num_fallecidos = $_POST['num_fallecidos'];
                  $num_lesionados = $_POST['num_lesionados'];
                  $num_heridos = $_POST['num_heridos'];
                  $funcionario = $_POST['funcionario'];
                  $amigo171 = $_POST['amigo171'];
                  $motos = $_POST['motos'];
                  $vehiculos = $_POST['vehiculos'];
                  $direccion_solicitud = strtoupper($_POST['direccion_solicitud']);
                  $despachador_solicitud = $_POST['despachador_solicitud'];
                  $operador_solicitud = $_POST['operador_solicitud'];
                  $num_motos = $_POST['num_motos'];
                  $num_vehiculos = $_POST['num_vehiculos'];
                  // Tabla "Solicitudes_Organismos_Solicitud"
                  $organismos_solicitud_id = $_POST['organismos_solicitud_id'];

                  // Asigna valores a variables requeridas en la tabla de bitacora
                  $cedula_personal = $_POST['cedula_personal'];
                  $nombre_esquema = 'Cierre Solicitudes';
                  $nombre_tabla = 'solicitudes';
                  $proceso = 'Insertar';
                  $valor_nuevo = '' . $_POST['tiempo_apertura_sol'] . ', ' . $_POST['fecha_sol'] . ', ' . $_POST['hora_sol'] . ', ' . $_POST['hora_cierre_sol'] . ', ' . $_POST['p_nombre_sol'] . ', ' . $_POST['p_apellido_sol'] . ', ' . $_POST['telefono_celular_sol'] . ', ' . $_POST['motivo_solicitud_id'] . ', ' . $_POST['sector_sol'] . ', ' . $_POST['punto_referencia_sol'] . ', ' . $_POST['parroquias_id'] . ', ' . $_POST['tiempo_respuesta_sol'] . ', ' . $_POST['guardias_id'] . ', ' . $_POST['estatus_solicitud_id'] . ', ' . $_POST['detalles_solicitud'] . ', ' . $_POST['procedimiento_solicitud'] . ', ' . $_POST['num_fallecidos'] . ', ' . $_POST['num_lesionados'] . ', ' . $_POST['num_heridos'] . ', ' . $_POST['funcionario'] . ', ' . $_POST['amigo171'] . ', ' . $_POST['motos'] . ', ' . $_POST['vehiculos'] . ', ' . $_POST['direccion_solicitud'] . ', ' . $_POST['despachador_solicitud'] . ', ' . $_POST['operador_solicitud'] . ', ' . $_POST['num_motos'] . ', ' . $_POST['num_vehiculos'] . ', ' . $_POST['organismos_solicitud_id'] . '';

                  // Inserta nuevo registro de solicitante
                  //              $solicitante = "INSERT INTO public.solicitante( p_nombre_sol, p_apellido_sol, telefono_celular_sol, motivo_solicitud_id) VALUES ('$p_nombre_sol','$p_apellido_sol','$telefono_celular_sol','$motivo_solicitud_id')";
                  $solicitante = "UPDATE public.solicitante SET id='$id_solicitante', p_nombre_sol='$p_nombre_sol', p_apellido_sol='$p_apellido_sol', telefono_celular_sol='$telefono_celular_sol', motivo_solicitud_id='$motivo_solicitud_id', organismos_solicitud_id='$organismo_solicitante_id' WHERE id='$id_solicitante'";

                  $result1 = pg_query($dbconn, $solicitante) or die('ERROR AL INSERTAR DATOS EN SOLICITANTE: ' . pg_last_error());
                  $cmdtuples = pg_affected_rows($result1);
                  echo $cmdtuples . " datos registrados.\n";

                  // Inserta Nuevo registro de solicitudes
                  // $solicitud = "INSERT INTO public.solicitudes(tiempo_apertura_sol, fecha_sol, hora_sol, hora_cierre_sol, sector_sol, punto_referencia_sol, parroquias_id, solicitante_id, guardias_id, estatus_solicitud_id, fecha_creacion_sol, tiempo_respuesta) VALUES ('$tiempo_apertura_sol','$fecha_sol','$hora_sol','$hora_cierre_sol','$sector_sol','$punto_referencia_sol','$parroquias_id','$solicitante_id','$guardias_id','$estatus_solicitud_id','$fecha_creacion_sol','$tiempo_respuesta')";
                  $solicitud = "UPDATE public.solicitudes SET id='$id_solicitudes', tiempo_apertura_sol='$tiempo_apertura_sol', fecha_sol='$fecha_sol', hora_sol='$hora_sol', hora_cierre_sol='$hora_cierre_sol', tiempo_respuesta_sol='$tiempo_respuesta_sol', sector_sol='$sector_sol', punto_referencia_sol='$punto_referencia_sol', parroquias_id='$parroquias_id', solicitante_id='$id_solicitante', guardias_id='$guardias_id', estatus_solicitud_id='$estatus_solicitud_id', fecha_creacion_sol='$fecha_creacion_sol', tiempo_respuesta='$tiempo_respuesta'
	                  WHERE id = '$id_solicitudes'";

                  $result2 = pg_query($dbconn, $solicitud) or die('ERROR AL INSERTAR DATOS EN SOLICITUDES: ' . pg_last_error());
                  $cmdtuples = pg_affected_rows($result2);
                  echo $cmdtuples . " datos registrados.\n";

                  // Insertar nuevo registro de solicitud_atencion
                  //                    $atencion = "INSERT INTO public.solicitud_atencion(detalles_solicitud, procedimiento_solicitud, num_fallecidos, num_lesionados, num_heridos, funcionario, amigo171, motos, vehiculos, solicitudes_id, direccion_solicitud, despachador_solicitud, operador_solicitud, num_motos, num_vehiculos) VALUES ('$detalles_solicitud','$procedimiento_solicitud','$num_fallecidos','$num_lesionados','$num_heridos','$funcionario','$amigo171','$motos','$vehiculos','$solicitudes_id','$direccion_solicitud','$despachador_solicitud','$operador_solicitud','$num_motos','$num_vehiculos')";
                  $atencion = "UPDATE public.solicitud_atencion SET id='$id_atencion', detalles_solicitud='$detalles_solicitud', procedimiento_solicitud='$procedimiento_solicitud', num_fallecidos='$num_fallecidos', num_lesionados='$num_lesionados', num_heridos='$num_heridos', funcionario='$funcionario', amigo171='$amigo171', motos='$motos', vehiculos='$vehiculos', solicitudes_id='$id_solicitudes', direccion_solicitud='$direccion_solicitud', despachador_solicitud='$despachador_solicitud', operador_solicitud='$operador_solicitud', num_motos='$num_motos', num_vehiculos='$num_vehiculos'
                    WHERE id = '$id_atencion'";

                  $result3 = pg_query($dbconn, $atencion) or die('ERROR AL INSERTAR DATOS EN SOLICITUD ATENCION: ' . pg_last_error());
                  $cmdtuples = pg_affected_rows($result3);
                  echo $cmdtuples . " datos registrados.\n";

                  // Insertar nuevo registro de solicitudes_organismos_solicitud
                  $organismos_solicitud = "INSERT INTO public.solicitudes_organismos_solicitud(solicitudes_id, organismos_solicitud_id) VALUES ('$id_solicitudes','$organismos_solicitud_id')";

                  $result4 = pg_query($dbconn, $organismos_solicitud) or die('ERROR AL INSERTAR DATOS EN ORGANISMOS SOLICITUD: ' . pg_last_error());
                  $cmdtuples = pg_affected_rows($result4);
                  echo $cmdtuples . " datos registrados.\n";

                  // Inserta nuevo registro en tabla "bitacora"
                  $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$cedula_personal','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion_sol')";

                  if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla")) {

                    header("Location: despachador/principal.php?msg=5");
                  } else {

                    header("Location: despachador/nueva_solicitud.php?msg=3");
                  }
                }
//              }
//            }

            /*************************************** 		FIN BREAK 1 	****************************************/
            break;
          case 3: // Accion 3 -- Registro de reporte de solicitudes
            /*************************************** 		INICIO CASE 2  	****************************************/
            if (isset($_POST)) { // Asignamos valores a las variables del POST
              $numero_solicitud = $_POST['numero_solicitud'];
              $fecha_solicitud = $_POST['fecha_solicitud'];
              $hora_solicitud = $_POST['hora_solicitud'];
              $hora_cierre = $_POST['hora_cierre'];
              $nombre_solicitante = strtoupper($_POST['nombre_solicitante']);
              $motivo_solicitud = strtoupper($_POST['motivo_solicitud']);
              $direccion = strtoupper($_POST['direccion']);
              $detalles = strtoupper($_POST['detalles']);
              $procedimiento = strtoupper($_POST['procedimiento']);
              $fallecidos = $_POST['fallecidos'];
              $lesionados = $_POST['lesionados'];
              $municipio = $_POST['municipio'];
              $parroquia = strtoupper($_POST['parroquia']);
              $sector = strtoupper($_POST['sector']);
              $punto_referencia = strtoupper($_POST['punto_referencia']);
              $operador = $_POST['operador'];
              $despachador = $_POST['despachador'];
              $tiempo_resp = $_POST['tiempo_respuesta'];
              $tiempo_resp1 = $_POST['tiempo_respuesta1'];
              $tiempo_respuesta = '' . $tiempo_resp . ':' . $tiempo_resp1 . '';
              $organismos = '';
              if (isset($_POST['organismos'])) {
                foreach ($_POST['organismos'] as $id) {
                  $formato1 = $formato1 . ' ' . $id;
                }
                $organismos = implode(', ', $_POST['organismos']);
              }
              $motos = $_POST['motos'];
              $num_motos = $_POST['num_motos'];
              $vehiculos = $_POST['vehiculos'];
              $num_vehiculos = $_POST['num_vehiculos'];
              $guardias_id = $_POST['guardias_id'];

              // Asigna valores a variables requeridas en la tabla de bitacora
              $cedula_usuario = $_POST['cedula_usuario'];
              $fecha_creacion_sol = date("Y/n/j H:m:s");
              $nombre_esquema = 'Solicitudes Sistema Emergencias 171';
              $nombre_tabla = 'reporte_solicitudes';
              $proceso = 'Insertar';
              $valor_nuevo = '' . $_POST['numero_solicitud'] . ', ' . $_POST['fecha_solicitud'] . ', ' . $_POST['hora_solicitud'] . ', ' . $_POST['hora_cierre'] . ', ' . $_POST['nombre_solicitante'] . ', ' . $_POST['motivo_solicitud'] . ', ' . $_POST['direccion'] . ', ' . $_POST['detalles'] . ', ' . $_POST['procedimiento'] . ', ' . $_POST['fallecidos'] . ', ' . $_POST['lesionados'] . ', ' . $_POST['municipio'] . ', ' . $_POST['parroquia'] . ', ' . $_POST['sector'] . ', ' . $_POST['punto_referencia'] . ', ' . $_POST['operador'] . ', ' . $_POST['despachador'] . ', ' . $tiempo_respuesta . ', ' . $organismos . ', ' . $_POST['motos'] . ', ' . $_POST['num_motos'] . ', ' . $_POST['vehiculos'] . ', ' . $_POST['num_vehiculos'] . ', ' . $_POST['guardias_id'] . '';


              $reporte = "INSERT INTO public.reporte_solicitudes(numero_solicitud, fecha_solicitud, hora_solicitud, hora_cierre, nombre_solicitante, motivo_solicitud, direccion, detalles, procedimiento, fallecidos, lesionados, parroquia, sector, punto_referencia, operador, despachador, tiempo_respuesta, organismos, motos, num_motos, vehiculos, num_vehiculos, guardias_id, municipio) VALUES ('$numero_solicitud','$fecha_solicitud','$hora_solicitud','$hora_cierre','$nombre_solicitante','$motivo_solicitud','$direccion','$detalles','$procedimiento','$fallecidos','$lesionados','$parroquia','$sector','$punto_referencia','$operador','$despachador','$tiempo_respuesta','$organismos','$motos','$num_motos','$vehiculos','$num_vehiculos','$guardias_id','$municipio')";


              $result = pg_query($dbconn, $reporte) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

              // Inserta nuevo registro en tabla "bitacora"
              $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$cedula_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion_sol')";


              if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla de Reporte de Solicitud")) {
                // redireccionamiento
                header("Location: despachador/principal.php?msg=2");
              } else {
                header("Location: despachador/solicitud_consulta.php?msg=2");
              }
            }
            /*************************************** 		FIN BREAK 2 	****************************************/
            break;
          case 4: // Accion 4 -- Registro de observaciones de guardia
            /***************************************     INICIO CASE 3   ****************************************/
            if (isset($_POST)) { // Asignamos valores a las variables del POST
              $notas = strtoupper($_POST['notas']);
              $acciones_pen = strtoupper($_POST['acciones_pen']);
              $apoyo_adm = strtoupper($_POST['apoyo_adm']);
              $anexo = strtoupper($_POST['anexo']);
              $fecha_creacion_obs = date("Y/n/j H:m:s");
              $guardias_id = $_POST['guardias_id'];
              $organismos_id = $_POST['organismos_id'];
              $cedula_usuario = $_POST['cedula_usuario'];

              // Asigna valores a variables requeridas en la tabla de bitacora
              $nombre_esquema = 'Observaciones de Guardia';
              $nombre_tabla = 'observaciones';
              $proceso = 'Insertar';
              $valor_nuevo = '' . $_POST['notas'] . ', ' . $_POST['acciones_pen'] . ', ' . $_POST['apoyo_adm'] . ', ' . $_POST['anexo'] . ', ' . $_POST['guardias_id'] . ', ' . $_POST['organismos_id'] . '';

              // Insertamos nuevo registro en tabla "observaciones"
              $observaciones_pg = "INSERT INTO public.observaciones(notas, acciones_pen, apoyo_adm, anexo, fecha_creacion_obs, guardias_id, organismos_id) VALUES ('$notas','$acciones_pen','$apoyo_adm','$anexo','$fecha_creacion_obs','$guardias_id','$organismos_id')";

              $result = pg_query($dbconn, $observaciones_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

              // Inserta nuevo registro en tabla "bitacora"
              $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$cedula_usuario','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_creacion_obs')";

              if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla")) {
                // redireccionamiento
                header("Location: despachador/principal.php?msg=3");
              } else {
                header("Location: despachador/observaciones_personal.php?msg=1");
              }
            }
            /***************************************     FIN BREAK 3   ****************************************/
            break;
          case 5: // Accion 5 -- Registro de observaciones de personal - Salida
            /***************************************     INICIO CASE 4   ****************************************/
            if (isset($_POST)) { // Asignamos valores a las variables del POST

              $fecha_salida_g = date("Y-n-j H:m:s");
              $descripcion = strtoupper($_POST['descripcion']);
              $observaciones_salida_id = $_POST['observaciones_salida_id'];
              $personal_cedula = $_POST['personal_cedula'];
              $guardias_id = $_POST['guardias_id'];
              $cedula = $_POST['cedula_usuario'];

              // Asigna valores a variables requeridas en la tabla de bitacora
              $nombre_esquema = 'Observaciones al personal de guardia';
              $nombre_tabla = 'personal_guardias';
              $proceso = 'Insertar';
              $valor_nuevo = '' . $_POST['descripcion'] . ', ' . $_POST['observaciones_salida_id'] . ', ' . $_POST['personal_cedula'] . ', ' . $_POST['guardias_id'] . '';

              // Insertamos nuevo registro en tabla "personal_guardias"
              $personal_pg = "INSERT INTO personal_guardias(fecha_salida_g, descripcion, observaciones_salida_id, personal_cedula, guardias_id) VALUES ('$fecha_salida_g','$descripcion','$observaciones_salida_id','$personal_cedula','$guardias_id')";

              $result = pg_query($dbconn, $personal_pg) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());


              // Inserta nuevo registro en tabla "bitacora"
              $bitacora_obs_pg = "INSERT INTO public.bitacora(usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_nuevo, fecha_operacion) VALUES ('$cedula','$nombre_esquema','$nombre_tabla','$proceso','$valor_nuevo','$fecha_salida_g')";

              if (pg_query($dbconn, $bitacora_obs_pg) or die("Upps Fallo conexion con la Tabla Observaciones al Personal")) {
                // Redirecciomaniento
                header("Location: despachador/principal.php?msg=4");
              } else {

                header("Location: despachador/observaciones_personal.php?msg=1");
              }
            }
            /***************************************     FIN BREAK 4   ****************************************/
            break;
          default:
            # code ...
            break;
        }
      }
    }
  }
}
pg_close($dbconn);
