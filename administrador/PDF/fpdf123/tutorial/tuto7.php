<<<<<<< HEAD
<?php
define('FPDF_FONTPATH','.');
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddFont('Calligrapher','','calligra.php');
$pdf->AddPage();
$pdf->SetFont('Calligrapher','',35);
$pdf->Cell(0,10,'Enjoy new fonts with FPDF!');
$pdf->Output();
?>
=======
<?php
define('FPDF_FONTPATH','.');
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddFont('Calligrapher','','calligra.php');
$pdf->AddPage();
$pdf->SetFont('Calligrapher','',35);
$pdf->Cell(0,10,'Enjoy new fonts with FPDF!');
$pdf->Output();
?>
>>>>>>> 5f8d5d2f542d45352f384fda1a16bbbe7413e885
