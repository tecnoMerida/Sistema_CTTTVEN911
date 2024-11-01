<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];
 $fecha1 = $_REQUEST['fecha'];

require_once('../../config/conexion1.php');
//require('fpdf123/fpdf.php');

require('plantilla.php');

if ($fecha1 != ''){
	///////////////////////////////////				CONSULTAS			////////////////////////////
	//consulta 1
            $result = pg_query($dbconn, "SELECT personal_guardias.fecha_ingreso_g, personal_guardias.descripcion, observaciones_entrada.tipo_obse_e, personal.cedula, personal.p_nombre, personal.p_apellido, personal.grupo_guardia_id, personal.organismos_id, personal.cargos_id FROM public.personal_guardias INNER JOIN observaciones_entrada ON observaciones_entrada.id = personal_guardias.observaciones_entrada_id INNER JOIN personal ON personal.cedula = personal_guardias.personal_cedula WHERE personal_guardias.id = $id");

               $reg=pg_fetch_array($result);

// Fecha Entrada
$dato = $reg['fecha_ingreso_g'];
$fecha = date('d-m-Y',strtotime($dato));
$hora = date('H:i:s',strtotime($dato));

    // Consulta 2
            $cargo = $reg['cargos_id'];
            $result_cargo = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargo");

               $reg_cargo=pg_fetch_array($result_cargo);

    // Consulta 3
            $organismo = $reg['organismos_id'];
            $result_org = pg_query($dbconn, "SELECT * FROM public.organismos WHERE id = $organismo");

               $reg_org=pg_fetch_array($result_org);

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte observaciones al personal';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',16);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Observaciones al Personal'),0,1,'C');

require('directivo_2.php');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,7,utf8_decode(', es  realizada  una  observación  al '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(26,7,utf8_decode('ciudadano(a) '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg['p_nombre']).' '.strtoupper($reg['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode(', portador de la cédula de identidad'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(30,7,utf8_decode('Nº: '.$reg['cedula'].','),0,1,'C');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,7,utf8_decode('de tipo'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg['tipo_obse_e']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(95,7,utf8_decode(', quién cumple labores en las guardias del grupo: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(15,7,utf8_decode(''.$reg['grupo_guardia_id'].''),0,1,'C');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,7,utf8_decode('como: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(5,7,utf8_decode(' de '),0,0,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(75,7,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(30,7,utf8_decode(', añadiendo la '),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(65,7,utf8_decode('siguiente descripción: '),0,1);
        $pdf->SetX(20);
    } else {
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(65,7,utf8_decode(', añadiendo la siguiente descripción: '),0,0);
        $pdf ->Cell(1,6,utf8_decode(''),0,1);        
    }

$pdf->SetX(20);
$pdf ->Cell(140,6,utf8_decode(''),0,1);

$pdf->SetX(35);
$pdf->SetFont('Arial','B',12);
$pdf ->MultiCell(140,7,utf8_decode(''.strtoupper($reg['descripcion']).''),1,1);


$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('Es de acotar que el personal de guardia cumple un horario de 24 horas por 72 horas libres.'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('cumpliendo   funciones   de  vital  importancia   en  el  Sistema   9-1-1   donde   se  reciben'),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('todas   las  llamadas  de   emergencias  de  toda   la colectividad  merideña.'),0,1);

$pdf ->SetX(20);
$pdf ->Cell(90,7,utf8_decode(' '),0,1);    

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);


}else{
        // Consulta 2
        $result = pg_query($dbconn, "SELECT personal_guardias.fecha_salida_g, personal_guardias.descripcion, observaciones_salida.tipo_obse_s, personal.cedula, personal.p_nombre, personal.p_apellido, personal.grupo_guardia_id, personal.organismos_id, personal.cargos_id FROM public.personal_guardias INNER JOIN observaciones_salida ON observaciones_salida.id = personal_guardias.observaciones_salida_id INNER JOIN personal ON personal.cedula = personal_guardias.personal_cedula WHERE personal_guardias.id = $id");

            $reg=pg_fetch_array($result);
                              
// Fecha Entrada
$dato = $reg['fecha_salida_g'];
$fecha = date('d-m-Y',strtotime($dato));
$hora = date('H:i:s',strtotime($dato));

    // Consulta 2
            $cargo = $reg['cargos_id'];
            $result_cargo = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargo");

               $reg_cargo=pg_fetch_array($result_cargo);

    // Consulta 3
            $organismo = $reg['organismos_id'];
            $result_org = pg_query($dbconn, "SELECT nombre_oganismos FROM public.organismos WHERE id = $organismo");

               $reg_org=pg_fetch_array($result_org);

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte observaciones al personal';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',16);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Observaciones al Personal'),0,1,'C');

require('directivo_2.php');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,7,utf8_decode(', es  realizada  una  observación  al '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(26,7,utf8_decode('ciudadano(a) '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg['p_nombre']).' '.strtoupper($reg['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode(', portador de la cédula de identidad'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(30,7,utf8_decode('Nº: '.$reg['cedula'].','),0,1,'C');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,7,utf8_decode('de tipo'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg['tipo_obse_s']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(95,7,utf8_decode(', quién cumple labores en las guardias del grupo: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(15,7,utf8_decode(''.$reg['grupo_guardia_id'].''),0,1,'C');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,7,utf8_decode('como: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(5,7,utf8_decode(' de '),0,0,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(75,7,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(30,7,utf8_decode(', añadiendo la '),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(65,7,utf8_decode('siguiente descripción: '),0,1);
        $pdf->SetX(20);
    } else {
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(65,7,utf8_decode(', añadiendo la siguiente descripción: '),0,0);
        $pdf ->Cell(1,6,utf8_decode(''),0,1);        
    }


$pdf->SetX(20);
$pdf ->Cell(140,6,utf8_decode(''),0,1);

$pdf->SetX(35);
$pdf->SetFont('Arial','B',12);
$pdf ->MultiCell(140,7,utf8_decode(''.strtoupper($reg['descripcion']).''),1,1);


$pdf->SetX(20);
$pdf ->Cell(5,7,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('Es de acotar que el personal de guardia cumple un horario de 24 horas por 72 horas libres.'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,7,utf8_decode('cumpliendo   funciones   de  vital  importancia   en  el  Sistema   9-1-1   donde   se  reciben'),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,7,utf8_decode('todas   las  llamadas  de   emergencias  de  toda   la colectividad  merideña.'),0,1);

$pdf ->SetX(20);
$pdf ->Cell(90,7,utf8_decode(' '),0,1);    

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
}

require('directivo.php');

$pdf->Output();

?>
