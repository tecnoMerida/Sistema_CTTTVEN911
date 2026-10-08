<?php
  $cedula = $_REQUEST['id'];
  $cedula = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');


    ///////////////////////////////////             CONSULTAS           //////////////////////////////

    //consulta 1.
    $personal = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $cedula ");     
    $reg = pg_fetch_array($personal);
    $grado = $reg['grado_instruccion_id'];
    $cargos = $reg['cargos_id'];
    $organismo = $reg['organismos_id'];

    $gradoinst = pg_query($dbconn, "SELECT * FROM public.grado_instruccion WHERE id = $grado ");     
    $reg03 = pg_fetch_array($gradoinst);

    $cargos1 = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargos ");     
    $reg04 = pg_fetch_array($cargos1);

    //consulta 2
    $consultaorg = pg_query($dbconn,"SELECT * FROM public.organismos WHERE id = $organismo ");
    $reg05= pg_fetch_array($consultaorg);

    //consulta 3
    $coordinador1 = pg_query($dbconn, "SELECT * FROM director WHERE cargo_dir LIKE '%DIRECTOR%' ");        
    $coord1 = pg_fetch_array($coordinador1);

    //consulta 4
/*    $coordinador = pg_query($dbconn, "SELECT * FROM director WHERE cargo_dir LIKE '%Coordinador%' ");      
    $coord1 = pg_fetch_array($coordinador);*/

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
$pdf->Cell(95,7,utf8_decode(''.$coord1['grado_instruccion_dir'].' '.$coord1 ['p_apellido_dir'].' '.$coord1 ['s_apellido_dir'].', '.$coord1['p_nombre_dir'].' '.$coord1['s_nombre_dir'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(35,7,utf8_decode(' Venezolana, mayor'),0,1,'C'); 
$pdf->SetX(20);
$pdf->Cell(100,7,utf8_decode('de edad, titular  de la cédula  de  identidad  número: V-'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(28,7,utf8_decode(''.$coord1['cedula_dir'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,7,utf8_decode(', en mi condición de'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,7,utf8_decode(''.$coord1['cargo_dir'].'(A)'),0,0,'C');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(140,7,utf8_decode('del C.C.C.T. VEN 9-1-1 Mérida, hago constar, que el o la '.strtoupper($reg03['grado_instruccion']).' '),0,1);
$pdf->SetX(20);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(90,7,utf8_decode(' '.strtoupper($reg['p_apellido']).' '.strtoupper($reg['s_apelllido']).', '.strtoupper($reg['p_nombre']).' '.strtoupper($reg['s_nombre']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(80,7,utf8_decode('titular de la cédula de identidad N° V-'),0,1);
$pdf->SetX(20);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(26,7,utf8_decode(''.$reg['cedula'].','),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(45,7,utf8_decode('se  desempeña  como '),0,0);
$pdf->SetFont('Arial','B',12);

if(($cargos != 1 ) AND ($cargos != 3)) {
        $pdf ->Cell(40,7,utf8_decode(''.strtoupper($reg04['nombre_cargo']).''),0,0,'C');
    } elseif(($cargos != 2 ) AND ($cargos != 3)) {
        $pdf ->Cell(87,7,utf8_decode(''.strtoupper($reg04['nombre_cargo']).' de Telecomunicaciones'),0,1,'C');
    }else {

        $pdf ->Cell(47,7,utf8_decode(''.strtoupper($reg04['nombre_cargo']).' '),0,0,'C');
        }


if(($cargos != 1 ) AND ($cargos != 3)) {
        
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(47,7,utf8_decode(''.strtoupper($reg05['nombre_oganismos']).''),0,1,'C');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(170,7,utf8_decode('y  el Sistema  de Atención  de Emergencias  911., en un horario de 24 horas por 72 horas'),0,1);
        $pdf->SetX(20);
        $pdf ->Cell(35,7,utf8_decode('libres.'),0,1);

        } elseif(($cargos != 2 ) AND ($cargos != 3)) {

        $pdf->SetX(20);
        $pdf ->Cell(170,7,utf8_decode('del  C.C.C.T. VEN 9-1-1 Mérida., en un  horario de  24 horas  por  72'),0,1);
        $pdf->SetX(20);
        $pdf ->Cell(170,7,utf8_decode('horas libres.'),0,1);

        }else {

        $pdf ->Cell(30,7,utf8_decode('del dpto. de operaciones '),0,1);
        $pdf->SetX(20);
        $pdf ->Cell(170,7,utf8_decode('del C.C.C.T. VEN 9-1-1 Mérida., en un horario de 24 horas por 72 horas libres.'),0,1);

        }

$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('Es de acotar que  la labor  que presta  el(la) funcionario(a) es  de vital importancia  en  el '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('Sistema de Emergencias VEN 9-1-1 donde se reciben todas las llamadas  de emergencias'),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('de toda  la  colectividad merideña '),0,1);

$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
//$pdf ->Cell(170,7,utf8_decode('La relación de la asistencia en este Departamento es llevada en un sistema automatizado,'),0,1);
$pdf ->Cell(170,7,utf8_decode(''),0,1);
//$pdf->SetX(20);
//$pdf ->Cell(170,7,utf8_decode('por lo que si requiere copia del mismo debe consignarlo con anticipación.'),0,1);
$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('Sin más a que acotar, se despide. '),0,1);


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

require('directivo.php');

$pdf->Output();

?>
