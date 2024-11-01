<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');


    ///////////////////////////////////             CONSULTAS           ////////////////////////////
    //consulta 1
            $result = pg_query($dbconn, "SELECT * FROM public.guardias WHERE id = $id");
                          
                $reg=pg_fetch_array($result);

                $dato = $reg[1];
                $fecha = date('d-m-Y',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));

    //consulta 2
    $usuario_entrada = $reg['usuario_salida_id'];
            $result_personal = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $usuario_entrada");
                          
                $reg_persona=pg_fetch_array($result_personal);

    //consulta 3
    $cargo = $reg_persona['cargos_id'];
            $result_cargo = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargo");
                          
                $reg_cargo=pg_fetch_array($result_cargo);

    //consulta 4
    $organismo = $reg_persona['organismos_id'];
            $result_org = pg_query($dbconn, "SELECT * FROM public.organismos WHERE id = $organismo");
                          
                $reg_org=pg_fetch_array($result_org);


$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte cierre de guardia';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,20,utf8_decode('Cierre de Guardia'),0,1,'C');

require('directivo_2.php'); 

$pdf->SetFont('Arial','',12);
$pdf ->Cell(77,6,utf8_decode(' es  realizado   el  cierre  y   entrega'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(60,6,utf8_decode('de  guardia,  bajo  el  número : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(25,6,utf8_decode(''.$reg['id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(10,6,utf8_decode('del'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(75,6,utf8_decode('"Libro  Digital  de  Novedades  9-1-1"'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,6,utf8_decode(', con  el  grupo  de  guardia :'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(15,6,utf8_decode(''.$reg['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(36,6,utf8_decode(', por  el  ciudadano '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(62,6,utf8_decode(''.strtoupper($reg_persona['p_nombre']).' '.strtoupper($reg_persona['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(2,6,utf8_decode(','),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(75,6,utf8_decode('titular  de  la  cédula  de  identidad  Nº :'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(40,6,utf8_decode(''.$reg_persona['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,6,utf8_decode(', y cumpliendo  funciones de'),0,1);
$pdf->SetX(20);

if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(40,6,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(12,6,utf8_decode(', para '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(65,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(8,6,utf8_decode('y el'),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(45,6,utf8_decode(' Sistema de  Atención'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(117,6,utf8_decode(' de Emergencias 9-1-1.'),0,1);
    } else {

        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(45,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(18,6,utf8_decode(' para  el '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(90,6,utf8_decode(' Sistema de Atención de Emergencias 9-1-1.'),0,1);
    }

$pdf->SetX(20);
$pdf->Cell(170,7,utf8_decode(''),0,1);

$pdf->SetFont('Arial','',12);
$pdf->SetX(20);
$pdf->Cell(170,6,utf8_decode('Dando   por   registrada   el  cierre  y   entrega   de  guardia   correspondiente  con  la '),0,1);
$pdf->SetX(20);
$pdf->Cell(170,6,utf8_decode('siguiente descripción: '),0,1);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(20);
$pdf->MultiCell(170,8,utf8_decode(''.strtoupper($reg['cierre_g']).'.'),0,1);

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

require('directivo.php');

$pdf->Output();

?>