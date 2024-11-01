<?php
$pdf->SetFont('Arial','',12);
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(20);
$pdf->Cell(30,7,utf8_decode('Quién suscribe:'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,7,utf8_decode(''.$coord1['grado_instruccion_coord'].' '.$coord1 ['p_apellido_coord'].' '.$coord1 ['s_apellido_coord'].', '.$coord1['p_nombre_coord'].' '.$coord1['s_nombre_coord'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,utf8_decode(' Venezolano(a), mayor  de  edad,'),0,1,'C'); 
$pdf->SetX(20);
$pdf->Cell(96,7,utf8_decode('titular  de  la  cédula  de  identidad   número:   V-'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(26,7,utf8_decode(''.$coord1['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(48,7,utf8_decode(',  en   mi   condición   de'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,utf8_decode(''.$coord1['cargo'].'(a)'),0,0,'C');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(128,7,utf8_decode('del Sistema de Atención de Emergencias 911, hago constar que la '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,7,utf8_decode('fecha : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(28,7,utf8_decode(' '.$fecha.' '),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(14,7,utf8_decode('y  hora: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(36,7,utf8_decode(' '.$hora.' HLV., '),0,0,'C');

?>