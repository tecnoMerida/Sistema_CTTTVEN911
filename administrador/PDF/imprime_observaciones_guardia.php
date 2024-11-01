<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');


	///////////////////////////////////				CONSULTAS			////////////////////////////
	//consulta 1
            $result = pg_query($dbconn, "SELECT * FROM public.observaciones WHERE id = $id");

                $reg=pg_fetch_array($result);

                $dato = $reg['fecha_creacion_obs'];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato)); 

    // consulta 2 - registro de guardia
    $guardia = $reg['guardias_id'];
            $result_guardia = pg_query($dbconn, "SELECT * FROM public.guardias WHERE id = $guardia");
                          
                $reg_guardia=pg_fetch_array($result_guardia);

    //consulta 3 - personal en registros de guardia
    $usuario_entrada = $reg_guardia['usuario_entrada_id'];
            $result_personal = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $usuario_entrada");
                          
                $reg_persona=pg_fetch_array($result_personal);

    //consulta 4 - cargos de personal en registros de guardia
    $cargo = $reg_persona['cargos_id'];
            $result_cargo = pg_query($dbconn, "SELECT * FROM public.cargos WHERE id = $cargo");
                          
                $reg_cargo=pg_fetch_array($result_cargo);

    //consulta 5 - organismo de personal en registros de guardia
    $organismo = $reg_persona['organismos_id'];
            $result_org = pg_query($dbconn, "SELECT * FROM public.organismos WHERE id = $organismo");
                          
                $reg_org=pg_fetch_array($result_org);


$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte Observaciones de Guardia';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Observaciones de Guardia'),0,1,'C');

require('directivo_2.php'); 

$pdf->SetFont('Arial','',12);
$pdf ->Cell(77,6,utf8_decode(' es  realizada  la(s)  observacion(es)  de '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(100,6,utf8_decode('novedades,  quedando  registrada  bajo  el  número : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(30,6,utf8_decode(''.$reg['id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(40,6,utf8_decode(',   en   registros   del '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(81,6,utf8_decode('"Libro   Digital   de   Novedades   9-1-1"'),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(58,6,utf8_decode(',  con   el  grupo  de   guardia : '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(13,6,utf8_decode(''.$reg_guardia['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(18,6,utf8_decode(',  por  el  '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(22,6,utf8_decode('ciudadano '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(62,6,utf8_decode(''.strtoupper($reg_persona['p_nombre']).' '.strtoupper($reg_persona['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(86,6,utf8_decode(', titular   de   la   cédula   de   identidad   Nº  :'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(34,6,utf8_decode(''.$reg_persona['cedula'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,6,utf8_decode(', y cumpliendo  funciones de'),0,0);
if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(60,6,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(21,6,utf8_decode(',        para'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(59,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(12,6,utf8_decode('y   el'),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(99,6,utf8_decode(' Sistema  de  Atención  de  Emergencias  9-1-1.'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(171,6,utf8_decode('indicando lo que acontinuación se describe:'),0,1);
    } else {

        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(40,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(16,6,utf8_decode('para  el '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(25,6,utf8_decode(' Sistema de'),0,1);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(75,6,utf8_decode('Atención  de  Emergencias   9-1-1.,'),0,0);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(95,6,utf8_decode(' indicando  lo  que  acontinuación  se  describe  :'),0,1);

    }

$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode(' '),0,1);


$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(170,6,utf8_decode('Notas de guardia:'),0,1);
$pdf->SetX(20);
$pdf->MultiCell(170,7,utf8_decode(''.strtoupper($reg['notas']).''),1,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode('Apoyo institucional:'),0,1);
$pdf->SetX(20);
$pdf->MultiCell(170,7,utf8_decode(''.strtoupper($reg['apoyo_adm']).''),1,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode('Acciones pendientes:'),0,1);
$pdf->SetX(20);
$pdf->MultiCell(170,7,utf8_decode(''.strtoupper($reg['acciones_pen']).''),1,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode(' '),0,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode('Anexos:'),0,1);
$pdf->SetX(20);
$pdf->MultiCell(170,7,utf8_decode(''.strtoupper($reg['anexo']).''),1,1);
$pdf->SetX(20);
$pdf ->Cell(170,6,utf8_decode(' '),0,1);

require('directivo.php');

$pdf->Output();

?>
