<?php

require('fpdf123/fpdf.php');

class PDF extends FPDF
{
 

// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../images/MPPRIJP_1.png',15,8,28);
    $this->Image('../../images/cintillo_MPPRIJP_1.jpeg',43.5,15,105);
    $this->Image('../../images/mark_cuadrantes.png',179,8,18);
    // Arial bold 15
    $this->SetFont('Arial','',12);

    // Título

// ZONA HORARIA
date_default_timezone_set('America/Caracas');
setlocale(LC_ALL,"es_ES");

    $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
    $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
    $year_now = date ("Y");  
    $month_now = date ("n");  
    $day_now = date ("j");  
    $week_day_now = date ("w");  
//    $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;
    $date = $day_now . " de " . $months[$month_now] . " de " . $year_now;
    
    // Movernos a la Izquierda
    $this->SetFont('Arial','B',12);
    $this->Cell(10);    
    $this->Cell(10,80,utf8_decode('SC/171/___/'.$year_now.''),0,0);

    // Movernos a la derecha
    $this->SetFont('Arial','',12);
    $this->Cell(80);
    $this->Cell(80,80,utf8_decode('Mérida, '.$date.''),0,0,'R');
    // Salto de línea
    $this->Ln(45);

    // Movernos al Centro
    $this->Cell(10);
    $this->Cell(170,5,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,1,'C');
    $this->Cell(10);
    $this->Cell(170,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LAS RELACIONES'),0,1,'C');
    $this->Cell(10);
    $this->Cell(170,5,utf8_decode('INTERIORES, JUSTICIA Y PAZ'),0,1,'C');   
    $this->Ln(1);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-30);
    // Arial italic 8
    $this->SetFont('Arial','I',8);

    // Direccion 
    $this->Cell(0,10,utf8_decode('_______________________________________________________________________________________'),0,1,'C');
   $this->Cell(0,5,utf8_decode('Av. Los Proceres, Santa Barbara Oeste, edificio IMPRADEM, Piso 1, Ministerio del Poder Popular para las Relaciones, Interiores, Justicia y Paz'),0,1,'C');
    $this->Cell(0,5,utf8_decode('tlfs: 0274-2610212 / 0274-2664493 / Web: 171.merida.gob.ve '),0,0,'C');
    // Posición: a 1,5 cm del final
    $this->SetY(-10);
    // Número de página
    $this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

?>