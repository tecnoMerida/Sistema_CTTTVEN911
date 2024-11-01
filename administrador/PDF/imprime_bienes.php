<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');




	///////////////////////////////////				CONSULTAS			//////////////////////////////////////////////
	//consulta 1
	$bienes1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id ");		
	$reg = pg_fetch_array($bienes1);


	$fecha_a = $reg['fecha_creacion'];
   $now1 = new DateTime($fecha_a);
   $fecha_a1=$now1->format('d-m-Y');

	//consulta 2
	$consulta = pg_query($dbconn,"SELECT * FROM organismos WHERE id = $id");
	$reg1= pg_fetch_array($consulta);


$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte inventario bienes';
$pdf->SetTitle($title);


$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Inventario de Bienes Muebles'),0,1,'C');

$pdf->SetFont('Arial','',12);
$y = $pdf->GetY();
$pdf->SetY($y+10);

$pdf->SetX(20);
$pdf->Cell(30,6,utf8_decode('Quién suscribe:'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,6,utf8_decode(''.$coord1['grado_instruccion_coord'].' '.$coord1 ['p_apellido_coord'].' '.$coord1 ['s_apellido_coord'].', '.$coord1['p_nombre_coord'].' '.$coord1['s_nombre_coord'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,6,utf8_decode(' Venezolana,  mayor   de   edad,'),0,1,'C'); 
$pdf->SetX(20);
$pdf->Cell(96,6,utf8_decode('titular  de  la  cédula  de  identidad   número:   V-'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(26,6,utf8_decode(''.$coord1['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(48,6,utf8_decode(',  en   mi   condición   de'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34,6,utf8_decode(''.$coord1['cargo'].'(a)'),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(136,6,utf8_decode('del Sistema de Atención de Emergencias 911, hago constar'),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode('que el presente equipo forma parte de los bienes de la Gobernación del Estado Bolivariano'),0,1);
$pdf->SetX(20);
$pdf ->Cell(60,6,utf8_decode('de   Mérida,   asignada    a   la '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(110,6,utf8_decode('  Coordinación    del   Sistema     de    Atención    de '),0,1);
$pdf->SetX(20);
$pdf ->Cell(50,6,utf8_decode(''.$reg['coordinacion'].'.'),0,1,'C');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(140,6,utf8_decode('Equipo que posee las siguientes caracteristicas:'),0,1);

$pdf->SetX(20);
$pdf ->Cell(140,6,utf8_decode(''),0,1);

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Código Asignado: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.$reg['codigo_b'].''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Nombre: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.strtoupper($reg['nombre_b']).''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Marca: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.strtoupper($reg['marca_b']).''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Modelo: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.strtoupper($reg['modelo_b']).''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Colores: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.strtoupper($reg['color_b']).''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Serial: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.strtoupper($reg['serial_b']).''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Descripción: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->MultiCell(85,7,utf8_decode(''.strtoupper($reg['descripcion_b']).''),1,1);

$fecha_i = $reg['fecha_ingreso_b'];
   $now1 = new DateTime($fecha_i);
   $fecha_i1=$now1->format('d-m-Y');
$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Fecha de Ingreso: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.$fecha_i1.''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Ubicación: '),1,0);
$pdf->SetFont('Arial','B',12);
if($reg['ubicacion_bienes_id'] == 1) {
		$pdf ->Cell(85,7,utf8_decode('DIRECCIÓN'),1,1,'C');
	}
	elseif($reg['ubicacion_bienes_id'] == 2) {
		$pdf ->Cell(85,7,utf8_decode('COORDINACIÓN'),1,1,'C');
	}
	elseif($reg['ubicacion_bienes_id'] == 3) {
		$pdf ->Cell(85,7,utf8_decode('SUPERVISIÓN'),1,1,'C'); 
	}
	elseif($reg['ubicacion_bienes_id'] == 4) {
		$pdf ->Cell(85,7,utf8_decode('OPERADORES'),1,1,'C'); 
	}
	elseif($reg['ubicacion_bienes_id'] == 5) {
		$pdf ->Cell(85,7,utf8_decode('SALA DESPACHADORES'),1,1,'C');	
	}

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Asignación: '),1,0);
$pdf->SetFont('Arial','B',12);
if($reg['organismos_id'] == 1) {
		$pdf ->Cell(85,7,utf8_decode('DIRECCIÓN'),1,1,'C');
	}
	elseif($reg['organismos_id'] == 2) {
		$pdf ->Cell(85,7,utf8_decode('COORDINACIÓN'),1,1,'C');
	}
	elseif($reg['organismos_id'] == 3) {
		$pdf ->Cell(85,7,utf8_decode('SUPERVISIÓN'),1,1,'C'); 
	}
	elseif($reg['organismos_id'] == 4) {
		$pdf ->Cell(85,7,utf8_decode('OPERADORES'),1,1,'C'); 
	}
	elseif($reg['organismos_id'] == 5) {
		$pdf ->Cell(85,7,utf8_decode('POLICÍA DE MÉRIDA'),1,1,'C');	
	}
	elseif($reg['organismos_id'] == 6) {
		$pdf ->Cell(85,7,utf8_decode('BOMBEROS DE MÉRIDA'),1,1,'C');
		}
	else {
		$pdf ->Cell(85,7,utf8_decode('PROTECCIÓN CIVIL MÉRIDA'),1,1,'C');
	}

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Estado: '),1,0);
$pdf->SetFont('Arial','B',12);
if($reg['estado_bien_id'] == 1) {
		$pdf ->Cell(85,7,utf8_decode('NUEVO'),1,1,'C');
	}
	elseif($reg['estado_bien_id'] == 2) {
		$pdf ->Cell(85,7,utf8_decode('BUENO'),1,1,'C');
	}
	elseif($reg['estado_bien_id'] == 3) {
		$pdf ->Cell(85,7,utf8_decode('REGULAR'),1,1,'C'); 
	}
	elseif($reg['estado_bien_id'] == 4) {
		$pdf ->Cell(85,7,utf8_decode('MALO/DAÑADO'),1,1,'C'); 
	}
	elseif($reg['estado_bien_id'] == 5) {
		$pdf ->Cell(85,7,utf8_decode('FUERA DE SERVICIO'),1,1,'C');	
	}
	elseif($reg['estado_bien_id'] == 6) {
		$pdf ->Cell(85,7,utf8_decode('REPARACIÓN'),1,1,'C');
		}
	else {
		$pdf ->Cell(85,7,utf8_decode('DESINCORPORADO'),1,1,'C');
	}

$fecha_i2 = $reg['fecha_estado'];
   $now2 = new DateTime($fecha_i2);
   $fecha_i22=$now2->format('d-m-Y');
$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Fecha de Estado: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(85,7,utf8_decode(''.$fecha_i22.''),1,1,'C');

$pdf->SetX(40);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('Observaciones: '),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->MultiCell(85,7,utf8_decode(''.strtoupper($reg['observaciones']).''),1,1);


$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);


require('directivo.php');

$pdf->Output();

?>
