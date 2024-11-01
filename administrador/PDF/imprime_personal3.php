<?php
  $id_personal = $_REQUEST['id'];
  $id_personal =$_GET['id'];

  
require_once('../../config/conexion1.php');
require('fpdf123/fpdf.php');

class PDF extends FPDF
{
 

// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../imagenes/Escudo_Gobernacion.png',15,8,20);
    $this->Image('../../imagenes/SEG.png',55,15,105);
    $this->Image('../../imagenes/logo_171.png',179,8,18);
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
    $this->Cell(10,80,utf8_decode('SC/171/180/'.$year_now.''),0,0);

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
    $this->Cell(170,5,utf8_decode('GOBERNACIÓN DEL ESTADO BOLIVARIANO DE MÉRIDA'),0,1,'C');
    $this->Cell(10);
    $this->Cell(170,5,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,1,'C');    
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
    $this->Cell(0,5,utf8_decode('Av. Los Proceres, Santa Barbara Oeste, edificio IMPRADEM, Piso 1, Oficina Dirección de Seguridad Ciudadana'),0,1,'C');
    $this->Cell(0,5,utf8_decode('tlfs: 0274-2610212 / 0274-2664493 / Web: 171.merida.gob.ve '),0,0,'C');
    // Posición: a 1,5 cm del final
    $this->SetY(-10);
    // Número de página
    $this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
/*
	///////////////////////////////////				CONSULTAS			//////////////////////////////////////////////

	//consulta 1.
	$personal = mysqli_query($conexion, "SELECT * FROM personal_171 WHERE id_personal= $id_personal ");		
	$reg = mysqli_fetch_array($personal);
	$organismo = $reg['id_organismo'];

	//consulta 2
	$consulta = mysqli_query($conexion,"SELECT * FROM grupos_organismos WHERE id_organismo = $organismo");
	$reg1= mysqli_fetch_array($consulta);

	//consulta 3
	$coordinador1 = mysqli_query($conexion, "SELECT * FROM administrador_coord WHERE cargo LIKE '%Director%' ");		
	$coord2 = mysqli_fetch_array($coordinador1);

	//consulta 4
	$coordinador = mysqli_query($conexion, "SELECT * FROM administrador_coord WHERE cargo LIKE '%Coordinador%' ");		
	$coord1 = mysqli_fetch_array($coordinador);

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte Constancia de Trabajo';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,20,utf8_decode('Constancia de Trabajo'),0,1,'C');
$pdf->SetFont('Arial','',12);
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetX(20);
$pdf->Cell(30,7,utf8_decode('Quién suscribe:'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,7,utf8_decode(''.$coord1['grado_instruccion_coord'].' '.$coord1 ['p_apellido_coord'].' '.$coord1 ['s_apellido_coord'].', '.$coord1['p_nombre_coord'].' '.$coord1['s_nombre_coord'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,utf8_decode(' Venezolana,  mayor   de   edad,'),0,1,'C'); 
$pdf->SetX(20);
$pdf->Cell(96,7,utf8_decode('titular  de  la  cédula  de  identidad   número:   V-'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(26,7,utf8_decode(''.$coord1['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(48,7,utf8_decode(',  en   mi   condición   de'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34,7,utf8_decode(''.$coord1['cargo'].'(a)'),0,0,'C');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(136,7,utf8_decode('del Sistema de Atención de Emergencias Mérida 171/911, hago constar'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(21,7,utf8_decode('que el o la '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(84,7,utf8_decode(''.$reg['grado_instruccion'].' '.$reg['p_apellido'].' '.$reg['s_apellido'].', '.$reg['p_nombre'].' '.$reg['s_nombre'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(65,7,utf8_decode('titular de la cédula de identidad N°'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(5,7,utf8_decode('V- '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(26,7,utf8_decode(''.$reg['cedula_personal'].','),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(42,7,utf8_decode('se desempeña como '),0,0);
if(($organismo != 4 ) AND ($organismo != 5)) {
		$pdf ->Cell(60,7,utf8_decode(' Despachadores'),0,0,'C');
	} elseif(($organismo != 1 ) AND ($organismo != 2) AND ($organismo != 3) AND ($organismo != 4)) {
		$pdf ->Cell(65,7,utf8_decode(''.$reg1['nombre_organismo'].' de Telecomunicaciones'),0,0,'C');
	}else {
		$pdf ->Cell(65,7,utf8_decode(''.$reg1['nombre_organismo'].' '),0,0,'C');
		}


if(($organismo != 4 ) AND ($organismo != 5)) {
		$pdf->SetFont('Arial','B',12);
		$pdf ->Cell(40,7,utf8_decode(''.$reg1['nombre_organismo'].''),0,1,'C');
		$pdf->SetX(20);
		$pdf->SetFont('Arial','',12);
		$pdf ->Cell(170,7,utf8_decode('y el Sistema de Atención de Emergencias Mérida 171/911., en un horario de 24 horas por'),0,1);
		$pdf->SetX(20);
		$pdf ->Cell(35,7,utf8_decode('72 horas libres.'),0,1);		
	}else {
		$pdf ->Cell(32,7,utf8_decode('del  Sistema  de '),0,1);
		$pdf->SetX(20);
		$pdf ->Cell(170,7,utf8_decode('Atención de Emergencias Mérida 171/911., en un horario de 24 horas  por 72 horas libres.'),0,1);
		}

$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('Es de acotar que  la labor  que presta  el(la) funcionario(a) es  de vital importancia  en  el '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('Sistema   1-7-1   donde  se   reciben  todas   las  llamadas  de   emergencias  de  toda  la '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('colectividad merideña '),0,1);

$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('La relación de la asistencia en este Departamento es llevada en un sistema automatizado,'),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('por lo que si requiere copia del mismo debe consignarlo con anticipación.'),0,1);
$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('sin mas a que acotar, se despide. '),0,1);


$months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
    $year_now = date ("Y");  
    $month_now = date ("n");  
    $day_now = date ("j");  
    $week_day_now = date ("w");  
//    $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;
    $date = $months[$month_now] . " año " . $year_now;

$pdf ->SetX(20);
$pdf ->Cell(90,7,utf8_decode(' '),0,1);    

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetFont('Arial','B',12);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(60);
$pdf->Cell(85,10,utf8_decode('__________________________'),0,1,'C');
$pdf->SetX(60);
$pdf->Cell(85,7,utf8_decode(''.$coord1['grado_instruccion_coord'].' '.$coord1['p_apellido_coord'].' '.$coord1['s_apellido_coord'].', '.$coord1['p_nombre_coord'].' '.$coord1['s_nombre_coord'].''),0,1,'C');
$pdf->SetX(60);
$pdf->SetX(20);
$pdf->Cell(170,7,utf8_decode('JEFE DEL DPTO DEL SISTEMA A ATENCIÓN DE EMERGENCIAS MÉRIDA 1-7-1/9-1-1'),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetX(20);
$pdf->Cell(170,5,utf8_decode(''.$coord1['decreto_coord'].''),0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetX(60);
$pdf->Cell(85,7,utf8_decode('Firma y Sello'),0,1,'C');
*/
$pdf->Output();

?>
