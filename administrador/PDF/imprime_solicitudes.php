<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];
  $num_sol = $_REQUEST['sol'];

require_once('../../config/conexion1.php');
require('plantilla.php');

if ($id != 0){
	///////////////////////////////////				CONSULTAS			///////////////////////////
	//consulta 1 - registro de solicitudes
      $result = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.numero_sol, solicitudes.tiempo_apertura_sol, solicitudes.fecha_sol, solicitudes.hora_sol, solicitudes.hora_cierre_sol, solicitudes.tiempo_respuesta_sol, solicitudes.sector_sol, solicitudes.punto_referencia_sol, solicitudes.parroquias_id, solicitudes.solicitante_id, solicitudes.guardias_id, solicitudes.estatus_solicitud_id, solicitudes.fecha_creacion_sol, solicitudes.tiempo_respuesta, solicitante.id, solicitante.p_nombre_sol, solicitante.p_apellido_sol, solicitante.telefono_celular_sol, solicitante.motivo_solicitud_id, solicitante.organismos_solicitud_id, solicitud_atencion.detalles_solicitud, solicitud_atencion.procedimiento_solicitud, solicitud_atencion.num_fallecidos, solicitud_atencion.num_lesionados, solicitud_atencion.num_heridos, solicitud_atencion.funcionario, solicitud_atencion.amigo171, solicitud_atencion.motos, solicitud_atencion.vehiculos,solicitud_atencion.solicitudes_id, solicitud_atencion.direccion_solicitud, solicitud_atencion.despachador_solicitud, solicitud_atencion.operador_solicitud, solicitud_atencion.num_motos, solicitud_atencion.num_vehiculos FROM public.solicitudes INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id INNER JOIN public.solicitud_atencion ON solicitud_atencion.solicitudes_id = solicitudes.id WHERE solicitudes.id = $id");

      $reg=pg_fetch_array($result);

                $dato = $reg['fecha_creacion_sol'];
                $fecha = date('d-m-Y',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));

    //consulta 2 - organismos solicitante
        $org_solicitud = $reg['organismos_solicitud_id'];
        $result_orgsol = pg_query($dbconn, "SELECT * FROM public.organismos_solicitud WHERE id = $org_solicitud");

                $reg_orgsol=pg_fetch_array($result_orgsol);

    // consulta 3 - registro de guardia
    $guardia = $reg['guardias_id'];
            $result_guardia = pg_query($dbconn, "SELECT * FROM public.guardias WHERE id = $guardia");
                          
                $reg_guardia=pg_fetch_array($result_guardia);

    // consulta 4 - motivo solicitud
    $motivo = $reg['motivo_solicitud_id'];
            $result_motivo = pg_query($dbconn, "SELECT * FROM public.motivo_solicitud_grupo WHERE id = $motivo");
                          
                $reg_motivo=pg_fetch_array($result_motivo);

    //consulta 5 - parroquia solicitud
    $parroquia = $reg['parroquias_id'];
            $result_parrq = pg_query($dbconn, "SELECT * FROM public.parroquias WHERE id = $parroquia");
                          
                $reg_parrq=pg_fetch_array($result_parrq);

    //consulta 6 - municipio solicitud
    $municipio = $reg_parrq['municipios_id'];
            $result_municipio = pg_query($dbconn, "SELECT * FROM public.municipios WHERE id = $municipio");
                          
                $reg_municipio=pg_fetch_array($result_municipio);

    //consulta 7 - estatus solicitud
    $estatus_sol = $reg['estatus_solicitud_id'];
            $result_estatus_sol = pg_query($dbconn, "SELECT * FROM public.estatus_solicitud WHERE id = $estatus_sol");
                          
                $reg_estatus_sol=pg_fetch_array($result_estatus_sol);

    //consulta 8 - despachador solicitud
    $despachador = $reg['despachador_solicitud'];
            $result_desp = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $despachador");
                          
                $reg_desp=pg_fetch_array($result_desp);

    //consulta 9 - operador solicitud
    $operador = $reg['operador_solicitud'];
            $result_operador = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $operador");
                          
                $reg_operador=pg_fetch_array($result_operador);

    //consulta 10 - organismos en sitio
                   $cadena = $reg['solicitudes.id'];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT solicitudes_organismos_solicitud.organismos_solicitud_id, organismos_solicitud.nombre_org FROM public.solicitudes_organismos_solicitud INNER JOIN public.organismos_solicitud ON organismos_solicitud.id = solicitudes_organismos_solicitud.organismos_solicitud_id WHERE solicitudes_organismos_solicitud.solicitudes_id = $id");
                    $reg1 = pg_fetch_assoc($consulta1);

                       $total_rows1 = pg_num_rows($consulta1);

                       if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 

                    	echo "".strtoupper($reg1[nombre_org]).", ";

                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }

    //consulta 11 - personal en registros de guardia
    $usuario_entrada = $reg_guardia['usuario_entrada_id'];
            $result_personal = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $usuario_entrada");
                          
                $reg_persona=pg_fetch_array($result_personal);

    //consulta 12 - cargos de personal en registros de guardia
    $cargo = $reg_persona['cargos_id'];
            $result_cargo = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargo");
                          
                $reg_cargo=pg_fetch_array($result_cargo);

    //consulta 13 - organismo de personal en registros de guardia
    $organismo = $reg_persona['organismos_id'];
            $result_org = pg_query($dbconn, "SELECT * FROM public.organismos WHERE id = $organismo");
                          
                $reg_org=pg_fetch_array($result_org);


$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte Solicitud de Guardia';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Solicitudes'),0,1,'C');

require('directivo_2.php'); 

$pdf->SetFont('Arial','',12);
$pdf ->Cell(78,6,utf8_decode('de la solicitud, registrada bajo el número: '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(36,6,utf8_decode(''.$reg['id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,6,utf8_decode(', en  el '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(82,6,utf8_decode('  "Libro  Digital  de  Novedades  9-1-1" '),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(38,6,utf8_decode(',  con  el  grupo  de '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(17,6,utf8_decode('guardia :'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(13,6,utf8_decode(''.$reg_guardia['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(37,6,utf8_decode(', por  el  ciudadano '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(62,6,utf8_decode(''.strtoupper($reg_persona['p_nombre']).' '.strtoupper($reg_persona['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(42,6,utf8_decode(', titular  de  la  cédula '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(35,6,utf8_decode('de  identidad  Nº :'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(38,6,utf8_decode(''.$reg_persona['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,6,utf8_decode(', y cumpliendo  funciones de'),0,0);
if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {
		$pdf->SetFont('Arial','B',12);
        $pdf ->Cell(41,6,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(2,6,utf8_decode(','),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(12,6,utf8_decode('para '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(59,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(8,6,utf8_decode('y el'),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(92,6,utf8_decode(' Sistema de  Atención de Emergencias 9-1-1.'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(171,6,utf8_decode('Es copia  fiel y  exacta, indicando lo que acontinuación se describe:'),0,1);
    } else {
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(43,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,1,'C');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(16,6,utf8_decode('para  el '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(90,6,utf8_decode(' Sistema de Atención de Emergencias 9-1-1.'),0,0);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(65,6,utf8_decode(' Es copia  fiel y  exacta, indicando'),0,1);
		$pdf->SetX(20);
		$pdf->SetFont('Arial','',12);
		$pdf ->Cell(170,6,utf8_decode('lo que acontinuación se describe: '),0,1);
    }

$pdf->SetX(20);
$pdf ->Cell(60,6,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Número de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['id'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Fecha de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['fecha_sol'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Hora de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['hora_sol'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Hora de cierre:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['hora_cierre_sol'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Telefono del solicitante:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['telefono_celular_sol'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Nombre del solicitante:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['p_nombre_sol']).' '.strtoupper($reg['p_apellido_sol']).''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Organísmo solicitante:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_orgsol['nombre_org']).''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Motivo de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_motivo['nombre_motivo_grupo']).''),0,1,'L');
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode('Dirección del sitio de solicitud:'),0,1);
$pdf->SetX(40);
$pdf->MultiCell(130,8,utf8_decode(''.strtoupper($reg['direccion_solicitud']).''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode('Detalles de solicitud:'),0,1);
$pdf->SetX(40);
$pdf->MultiCell(130,8,utf8_decode(''.strtoupper($reg['detalles_solicitud']).''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode('Procedimiento de los funcionarios en sitio:'),0,1);
$pdf->SetX(40);
$pdf->MultiCell(130,8,utf8_decode(''.strtoupper($reg['procedimiento_solicitud']).''),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Fallecidos:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['num_fallecidos'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Lesionados:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['num_lesionados'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Heridos:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['num_heridos'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Municipio:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg_municipio['nombre_municipio'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Parroquia:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg_parrq['nombre_parroquia'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Sector:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['sector_sol'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Punto de referencia:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['punto_referencia_sol']).''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Estatu de la Solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_estatus_sol['tipo_estatus']).''),0,1,'L');

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Operador:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_operador['p_nombre']).' '.strtoupper($reg_operador['p_apellido']).''),0,1,'L');
         
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Despachador:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_desp['p_nombre']).' '.strtoupper($reg_desp['p_apellido']).''),0,1,'L');

    $dato = $reg['tiempo_respuesta'];
    $horas = date('H',strtotime($dato));
    $minutos = date('i',strtotime($dato));

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Tiempo de Respuesta:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$horas.' horas con '.$minutos.' minutos'),0,1,'L');


                   $cadena = $reg[0];
                    $array = explode(", ", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT solicitudes_organismos_solicitud.organismos_solicitud_id, organismos_solicitud.nombre_org FROM public.solicitudes_organismos_solicitud INNER JOIN public.organismos_solicitud ON organismos_solicitud.id = solicitudes_organismos_solicitud.organismos_solicitud_id WHERE solicitudes_organismos_solicitud.solicitudes_id = $id");
                    $reg1 = pg_fetch_assoc($consulta1);

                       $total_rows1 = pg_num_rows($consulta1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Organismos en sitio:'),0,0);

                       if( $total_rows1 != 0){
			 
			 $greeting = '';
    
                     //impresion de los datos.
                          do
                            { 

						$greeting .= strtoupper($reg1[nombre_org]);


                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }
$pdf ->MultiCell(110,7,utf8_decode(''.$greeting.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Funcionario:'),0,0);
	
	$funcionario = $reg['funcionario'];
		if ($funcionario != 'f') {
			$func = 'SI';
		}else{
			$func = 'NO';
		}
$pdf ->MultiCell(110,7,utf8_decode(''.$func.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Amigo 911:'),0,0);

	$amigo171 = $reg['amigo171'];
		if ($amigo171 != 'f') {
			$amigo = 'SI';
		}else{
			$amigo = 'NO';
		}
$pdf ->MultiCell(110,7,utf8_decode(''.$amigo.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Motos:'),0,0);

	$motos = $reg['motos'];
		if ($motos != 'f') {
			$motos1 = 'SI';
		}else{
			$motos1 = 'NO';
		}
$pdf ->MultiCell(110,7,utf8_decode(''.$motos1.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Número de motos:'),0,0);
$pdf ->MultiCell(110,7,utf8_decode(''.$reg['num_motos'].''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Organismos en sitio:'),0,0);

	$vehiculos = $reg['vehiculos'];
		if ($vehiculos != 'f') {
			$vehiculos1 = 'SI';
		}else{
			$vehiculos1 = 'NO';
		}
$pdf ->MultiCell(110,7,utf8_decode(''.$vehiculos1.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Organismos en sitio:'),0,0);
$pdf ->MultiCell(110,7,utf8_decode(''.$reg['num_vehiculos'].''),0,1);

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);


/*
*
*   Uso del Condicional para mostrar datos del formulario
*   provenientes de la tabla reporte_solicitudes
*
*/
}else{
    //consulta 1 - registro de reporte de solicitudes
            $result = pg_query($dbconn, "SELECT * FROM public.reporte_solicitudes WHERE numero_solicitud = $num_sol");

            $reg=pg_fetch_array($result);

        $dato = $reg['fecha_solicitud'];
        $fecha = date('d-m-Y',strtotime($dato));
        $hora = $reg['hora_solicitud'];

    // consulta 2 - registro de guardia
    $guardia = $reg['guardias_id'];
            $result_guardia = pg_query($dbconn, "SELECT * FROM public.guardias WHERE id = $guardia");
                          
                $reg_guardia=pg_fetch_array($result_guardia);

    //consulta 3 - personal en registros de guardia
    $usuario_entrada = $reg_guardia['usuario_entrada_id'];
            $result_personal = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $usuario_entrada");
                          
                $reg_persona=pg_fetch_array($result_personal);

    //consulta 4 - cargos de personal en registros de guardia
    $cargo = $reg_persona['cargos_id'];
            $result_cargo = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargo");
                          
                $reg_cargo=pg_fetch_array($result_cargo);

    //consulta 5 - organismo de personal en registros de guardia
    $organismo = $reg_persona['organismos_id'];
            $result_org = pg_query($dbconn, "SELECT * FROM public.organismos WHERE id = $organismo");
                          
                $reg_org=pg_fetch_array($result_org);
/*
    //consulta 6 - parroquia solicitud
    $parroquia = $reg['parroquia'];
            $result_parrq = pg_query($dbconn, "SELECT * FROM public.parroquias WHERE id = $parroquia");
                          
                $reg_parrq=pg_fetch_array($result_parrq);

    //consulta 7 - municipio solicitud
    $municipio = $reg_parrq['municipios_id'];
            $result_municipio = pg_query($dbconn, "SELECT * FROM public.municipios WHERE id = $municipio");
                          
                $reg_municipio=pg_fetch_array($result_municipio);
*/
    //consulta 8 - despachador solicitud
    $despachador = $reg['despachador'];
            $result_desp = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $despachador");
                          
                $reg_desp=pg_fetch_array($result_desp);

    //consulta 9 - operador solicitud
    $operador = $reg['operador'];
            $result_operador = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $operador");
                          
                $reg_operador=pg_fetch_array($result_operador);


$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte Solicitud de Guardia';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Solicitudes'),0,1,'C');

require('directivo_2.php'); 

$pdf->SetFont('Arial','',12);
$pdf ->Cell(78,6,utf8_decode('de la solicitud, registrada bajo el número: '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(36,6,utf8_decode(''.$reg['id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,6,utf8_decode(', en  el '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(82,6,utf8_decode('  "Libro  Digital  de  Novedades  9-1-1" '),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(38,6,utf8_decode(',  y bajo  el número: '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(36,6,utf8_decode(''.$reg['numero_solicitud'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,6,utf8_decode(', en  el '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(80,6,utf8_decode('  "Sistema   de   Emergencias   1-7-1" '),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(40,6,utf8_decode(',  con   el   grupo  de '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(17,6,utf8_decode('guardia :'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(13,6,utf8_decode(''.$reg_guardia['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(37,6,utf8_decode(', por  el  ciudadano '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(62,6,utf8_decode(''.strtoupper($reg_persona['p_nombre']).' '.strtoupper($reg_persona['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(42,6,utf8_decode(', titular  de  la  cédula '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(35,6,utf8_decode('de  identidad  Nº :'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(38,6,utf8_decode(''.$reg_persona['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,6,utf8_decode(', y cumpliendo  funciones de'),0,0);
if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(41,6,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(2,6,utf8_decode(','),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(12,6,utf8_decode('para '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(59,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(8,6,utf8_decode('y el'),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(92,6,utf8_decode(' Sistema de  Atención de Emergencias 9-1-1.'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(171,6,utf8_decode('Es copia  fiel y  exacta, indicando lo que acontinuación se describe:'),0,1);
    } else {
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(43,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,1,'C');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(16,6,utf8_decode('para  el '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(90,6,utf8_decode(' Sistema de Atención de Emergencias 9-1-1.'),0,0);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(65,6,utf8_decode(' Es copia  fiel y  exacta, indicando'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(170,6,utf8_decode('lo que acontinuación se describe: '),0,1);
    }

$pdf->SetX(20);
$pdf ->Cell(60,6,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Número de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['numero_solicitud'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Fecha de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$fecha.''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Hora de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['hora_solicitud'].''),0,1,'L');
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Hora de cierre:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['hora_cierre'].''),0,1,'L');
/*$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Telefono del solicitante:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['telefono_celular_sol'].''),0,1,'L');*/
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Nombre del solicitante:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['nombre_solicitante']).''),0,1,'L');
/*$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Organísmo solicitante:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg_orgsol['nombre_org'].''),0,1,'L');*/
$pdf->SetX(20);
$pdf ->Cell(60,7,utf8_decode('Motivo de solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['motivo_solicitud']).''),0,1,'L');
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode('Dirección del sitio de solicitud:'),0,1);
$pdf->SetX(40);
$pdf->MultiCell(130,8,utf8_decode(''.strtoupper($reg['direccion']).''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode('Detalles de solicitud:'),0,1);
$pdf->SetX(40);
$pdf->MultiCell(130,8,utf8_decode(''.strtoupper($reg['detalles']).''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode('Procedimiento de los funcionarios en sitio:'),0,1);
$pdf->SetX(40);
$pdf->MultiCell(130,8,utf8_decode(''.strtoupper($reg['procedimiento']).''),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Fallecidos:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['fallecidos'].''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Lesionados:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['lesionados'].''),0,1,'L');
/*$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Heridos:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg['num_heridos'].''),0,1,'L');*/
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Municipio:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['municipio']).''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Parroquia:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['parroquia']).''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Sector:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['sector']).''),0,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Punto de referencia:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg['punto_referencia']).''),0,1,'L');
/*$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Estatu de la Solicitud:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$reg_estatus_sol['tipo_estatus'].''),0,1,'L');
*/
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Operador:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_operador['p_nombre']).' '.strtoupper($reg_operador['p_apellido']).''),0,1,'L');
         
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Despachador:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.strtoupper($reg_desp['p_nombre']).' '.strtoupper($reg_desp['p_apellido']).''),0,1,'L');

    $dato = $reg['tiempo_respuesta'];
    $horas = date('H',strtotime($dato));
    $minutos = date('i',strtotime($dato));

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Tiempo de Respuesta:'),0,0);
$pdf ->Cell(110,7,utf8_decode(''.$horas.' horas con '.$minutos.' minutos'),0,1,'L');


$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Organismos en sitio:'),0,0);
$pdf ->MultiCell(110,7,utf8_decode(''.strtoupper($reg['organismos']).''),0,1);
/*
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Funcionario:'),0,0);
    
    $funcionario = $reg['funcionario'];
        if ($funcionario != 'f') {
            $func = 'SI';
        }else{
            $func = 'NO';
        }
$pdf ->MultiCell(110,7,utf8_decode(''.$func.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Amigo 911:'),0,0);

    $amigo171 = $reg['amigo171'];
        if ($amigo171 != 'f') {
            $amigo = 'SI';
        }else{
            $amigo = 'NO';
        }
$pdf ->MultiCell(110,7,utf8_decode(''.$amigo.''),0,1);
*/
$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Motos:'),0,0);

    $motos = $reg['motos'];
        if ($motos != 'f') {
            $motos1 = 'SI';
        }else{
            $motos1 = 'NO';
        }
$pdf ->MultiCell(110,7,utf8_decode(''.$motos1.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Número de motos:'),0,0);
$pdf ->MultiCell(110,7,utf8_decode(''.$reg['num_motos'].''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Organismos en sitio:'),0,0);

    $vehiculos = $reg['vehiculos'];
        if ($vehiculos != 'f') {
            $vehiculos1 = 'SI';
        }else{
            $vehiculos1 = 'NO';
        }
$pdf ->MultiCell(110,7,utf8_decode(''.$vehiculos1.''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode('Organismos en sitio:'),0,0);
$pdf ->MultiCell(110,7,utf8_decode(''.$reg['num_vehiculos'].''),0,1);

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

/*
* Fin del condicional
*/
}

require('directivo.php');

$pdf->Output();

?>