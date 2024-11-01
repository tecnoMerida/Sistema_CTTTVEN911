<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');




	///////////////////////////////////				CONSULTAS			//////////////////////////////
	//consulta 1
            $result = pg_query($dbconn, "SELECT * FROM public.estadisticas_solicitud WHERE id = $id");

                $reg=pg_fetch_array($result);

    // consulta 2 - registro de guardia
    $guardia = $reg['guardia_id'];
            $result_guardia = pg_query($dbconn, "SELECT * FROM public.guardias WHERE id = $guardia");
                          
                $reg_guardia=pg_fetch_array($result_guardia);

// Fecha Entrada
$dato = $reg_guardia['fecha_inicio_g'];
$fecha = date('d-m-Y',strtotime($dato));
$hora = date('H:i:s',strtotime($dato));

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

    //consulta 6 - estatus de solicitudes
                      // Consulta a la Base de Datos
                          $consulta = pg_query($dbconn, "SELECT * FROM estatus_solicitud ORDER BY id");
                          $result1 = pg_fetch_assoc($consulta); // Efectivo 
                          $result2 = pg_fetch_assoc($consulta); // No Efectivo
                          $result3 = pg_fetch_assoc($consulta); // Sin Despacho 
                          $result4 = pg_fetch_assoc($consulta); // Repetida
                          $result5 = pg_fetch_assoc($consulta); // Sabotaje
                          $result6 = pg_fetch_assoc($consulta); // Informacion
                          $result7 = pg_fetch_assoc($consulta); // Abandonada

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte estadisticas diarias';
$pdf->SetTitle($title);


$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Control Estadistico Diario'),0,1,'C');

require('directivo_2.php'); 


$pdf->SetFont('Arial','',12);
$pdf ->Cell(77,6,utf8_decode('han  sido  contabilizados   y   registrados '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,6,utf8_decode('el  total  de  llamadas  atendidas  por  los  operadores  de  llamadas  que  se  encontraban'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(78,6,utf8_decode('de guardia, cumpliendo labores para el '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(92,6,utf8_decode(' Sistema de Atención de Emergencias  9-1-1 .'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(56,6,utf8_decode('Quedadon registradas en el '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(67,6,utf8_decode('"Sistema de Emergencias 1-7-1"'),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(47,6,utf8_decode(', en el grupo de guardia '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(10,6,utf8_decode('Nº : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(15,6,utf8_decode(''.$reg_guardia['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,6,utf8_decode(', por: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(60,6,utf8_decode(''.strtoupper($reg_persona['p_nombre']).' '.strtoupper($reg_persona['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,6,utf8_decode(', titular de la cédula de identidad Nº: '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(35,6,utf8_decode(''.$reg_persona['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,6,utf8_decode(', cumpliendo  funciones  de : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(40,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(20,6,utf8_decode('. Llamadas  de  tipo :'),0,1);        

$pdf->SetX(20);
$pdf ->Cell(140,6,utf8_decode(''),0,1);

$pdf->SetX(50);
$pdf->SetFont('Arial','B',14);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result1['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['efectivo'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result2['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['no_efectivo'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result3['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['sin_despacho'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result4['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['repetida'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result5['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['sabotaje'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result6['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['informacion'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode(''.strtoupper($result7['tipo_estatus']).''),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['abandonada'].''),1,1,'C');
$pdf->SetX(50);
$pdf ->Cell(60,7,utf8_decode('TOTAL'),1,0,'C');
$pdf ->Cell(50,7,utf8_decode(''.$reg['total_solici'].''),1,1,'C');

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(75,6,utf8_decode('Quedadon  registrada  la  solicitud  Nº : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(34,6,utf8_decode(''.$reg['mayor_rele'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(61,6,utf8_decode('como  la  de  mayor  relevancia. '),0,1);

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

require('directivo.php');

$pdf->Output();

?>
