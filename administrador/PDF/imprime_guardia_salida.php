<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');



    ///////////////////////////////////             CONSULTAS           /////////////////////////////
    //consulta 1
    $result = pg_query($dbconn, "SELECT * FROM public.personal_grupos_guardia WHERE id = $id");
    $reg = pg_fetch_array($result);

    $grupo = $reg['grupos_guardia_id'];

    // Fecha Entrada
    $dato = $reg['fecha_asig'];
    $fecha = date('d-m-Y',strtotime($dato));
    $hora = date('H:i:s',strtotime($dato));

    // Fecha Salida
    $dato = $reg['fecha_fin'];
    $fecha_fin = date('d-m-Y',strtotime($dato));
    $hora_fin = date('H:i:s',strtotime($dato));

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$title = 'Reporte grupo guardia';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',16);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Grupo de Guardia Salida'),0,1,'C');

require('directivo_2.php');

$pdf->SetFont('Arial','',12);
$pdf->Cell(78,7,utf8_decode('dando  inicio  al  reportes  de  novedades'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf->Cell(90,7,utf8_decode('durante el servicio de guardia de 24 Horas, del '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,7,utf8_decode('Sistema  de  Atención  de  Emergencias'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(170,7,utf8_decode('9-1-1. '),0,1);

$y = $pdf->GetY();
$pdf->SetY($y+7);
$pdf->SetFont('Arial','',12);
$pdf->SetX(20);
$pdf->Cell(138,7,utf8_decode('Mérida, quién entrega la guardia del grupo, identificado bajo  el número:'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(8,7,utf8_decode(''.$grupo.''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(24,7,utf8_decode(', registrando '),0,1);
$pdf->SetX(20);
$pdf->Cell(120,7,utf8_decode('toda   novedad   y   actividad   durante   ésta,   hasta   la   fecha '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(32,7,utf8_decode(' '.$fecha_fin.' '),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(18,7,utf8_decode('y    hora'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,7,utf8_decode(''.$hora_fin.' HLV.'),0,1,'C');


$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

require('directivo.php');

$pdf->Output();

?>