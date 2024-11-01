<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');




	///////////////////////////////////				CONSULTAS			//////////////////////////////
	//consulta 1
	$consulta_bienes1 = pg_query($dbconn, "SELECT control_bienes.id, control_bienes.fecha_creacion, control_bienes.grupo_personal_id, control_bienes.materiales_recibe, control_bienes.materiales_entrega, personal_grupos_guardia.grupos_guardia_id, personal_datos.personal_cedula_sup, personal.cedula, personal.p_nombre, personal.p_apellido, personal.organismos_id, personal.cargos_id FROM public.control_bienes INNER JOIN public.personal_grupos_guardia ON personal_grupos_guardia.id = control_bienes.grupo_personal_id INNER JOIN public.personal_datos ON personal_datos.personal_grupos_guardia_id = personal_grupos_guardia.id INNER JOIN public.personal ON personal.cedula = personal_datos.personal_cedula_sup WHERE control_bienes.id = $id ");
	
	$reg = pg_fetch_array($consulta_bienes1);

// Fecha Entrada
$dato = $reg['fecha_creacion'];
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
$title = 'Reporte control bienes';
$pdf->SetTitle($title);


$pdf->SetFont('Arial','B',14);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Control de Bienes Muebles Entrada'),0,1,'C');

require('directivo_2.php'); 


$pdf->SetFont('Arial','',12);
$pdf ->Cell(77,6,utf8_decode('verificando los materiales y equipos '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,6,utf8_decode('que son parte de los bienes del Ministerio del Poder Popular de Relaciones Interiores, '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(170,6,utf8_decode('Justicia y Paz.,  sede Mérida,  asignada a  la Coordinación del Sistema de Atención de'),0,1);
$pdf->SetX(20);
$pdf ->Cell(40,6,utf8_decode('Emergencias 9-1-1 .'),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(100,6,utf8_decode('Bienes que son verificados en el grupo de guardia: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(15,6,utf8_decode(''.$reg['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,6,utf8_decode(', por: '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(60,6,utf8_decode(''.strtoupper($reg['p_nombre']).' '.strtoupper($reg['p_apellido']).''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(75,6,utf8_decode(', titular de la cédula de identidad Nº: '),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(35,6,utf8_decode(''.$reg['cedula'].''),0,1,'C');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(50,6,utf8_decode(', ubicados en el área del: '),0,0);
if($reg_org['id'] != 5 AND $reg_org['id'] != 9 ) {

        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(45,6,utf8_decode(''.strtoupper($reg_cargo['nombre_cargo']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(10,6,utf8_decode(', de '),0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(65,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,1,'C');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(75,6,utf8_decode(', al  momento  de  entrada. '),0,1);

    } else {

        $pdf->SetFont('Arial','B',12);
        $pdf ->Cell(45,6,utf8_decode(''.strtoupper($reg_org['nombre_oganismos']).''),0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf ->Cell(75,6,utf8_decode(', al  momento  de  entrada. '),0,0);
        $pdf ->Cell(1,6,utf8_decode(''),0,1);        

    }
$pdf->SetX(20);
$pdf ->Cell(140,6,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(' Nombre '),1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(60,7,utf8_decode(' Código '),1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(60,7,utf8_decode(' Serial '),1,1,'C');
                    $cadena = $reg['materiales_recibe'];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                    $reg1 = pg_fetch_array($consulta1);

                        $total_rows1 = pg_num_rows($consulta1);

                          if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 

$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(45,7,utf8_decode(''.strtoupper($reg1['nombre_b']).''),1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(60,7,utf8_decode(''.$reg1['codigo_b'].''),1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(60,7,utf8_decode(''.$reg1['serial_b'].''),1,1,'C');

                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }



$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

require('directivo.php');

$pdf->Output();

?>
