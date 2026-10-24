<?php
$pdf->SetFont('Arial','B',12);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(60);
$pdf->Cell(85,10,utf8_decode('__________________________'),0,1,'C');
$pdf->SetX(60);
//$pdf->Cell(85,7,utf8_decode('C/G NAVAS CABALLERO, JHONNY JAVIER'),0,1,'C');
$pdf->Cell(85,7,utf8_decode(''.$coord1['grado_instruccion_dir'].' '.$coord1['p_apellido_dir'].' '.$coord1['s_apellido_dir'].', '.$coord1['p_nombre_dir'].' '.$coord1['s_nombre_dir'].''),0,1,'C');
$pdf->SetX(60);
$pdf->SetX(20);
$pdf->Cell(170,7,utf8_decode('CENTRO DE COMANDOS CONTROL Y TELECOMUNICACIONES'),0,1,'C');
$pdf->SetX(20);
$pdf->Cell(170,7,utf8_decode(' VEN 9-1-1 MÉRIDA'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetX(20);
$pdf->Cell(170,5,utf8_decode(''.$coord1['decreto_coord'].''),0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetX(60);
$pdf->Cell(85,7,utf8_decode('Firma y Sello'),0,1,'C');
?>