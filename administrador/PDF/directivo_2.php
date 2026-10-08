<?php
$pdf->SetFont('Arial','',12);
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(20);
$pdf->Cell(30,7,utf8_decode('Quién suscribe:'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,7,utf8_decode(''.$coord1['grado_instruccion_dir'].' '.$coord1 ['p_apellido_dir'].' '.$coord1 ['s_apellido_dir'].', '.$coord1['p_nombre_dir'].' '.$coord1['s_nombre_dir'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,utf8_decode(' Venezolano(a), mayor  de  edad,'),0,1,'C'); 
$pdf->SetX(20);
$pdf->Cell(96,7,utf8_decode('titular  de  la  cédula  de  identidad   número:   V-'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(26,7,utf8_decode(''.$coord1['cedula_dir'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(48,7,utf8_decode(',  en   mi   condición   de'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,7,utf8_decode(''.$coord1['cargo_dir'].'(a)'),0,0,'C');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(133,7,utf8_decode('del    C.C.C.T.   VEN   9-1-1    Mérida,   hago    constar   que   la '),0,1);
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