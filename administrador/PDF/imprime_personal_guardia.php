<?php
  $id = $_REQUEST['id'];
  $id = $_GET['id'];

require_once('../../config/conexion1.php');
require('plantilla.php');


	///////////////////////////////////				CONSULTAS			////////////////////////////
	//consulta 1
        $result = pg_query($dbconn, "SELECT * FROM public.personal_datos WHERE personal_grupos_guardia_id = $id");

                $reg=pg_fetch_array($result);


$grupo1 = $reg['personal_grupos_guardia_id'];
    
    // Consulta 2
        $result_grupo = pg_query($dbconn, "SELECT * FROM public.personal_grupos_guardia WHERE id = $grupo1");

                $reg_grupo=pg_fetch_array($result_grupo);


// Fecha Entrada
$dato = $reg_grupo['fecha_asig'];
$fecha = date('d-m-Y',strtotime($dato));
$hora = date('H:i:s',strtotime($dato));


                // Consulta Supervisor
                  $supervisor = $reg['personal_cedula_sup'];
                  $result_personal = pg_query("SELECT * FROM public.personal WHERE cedula = $supervisor"); 
                  $reg_supervisor = pg_fetch_array($result_personal);

                  // Consulta Auxiliar
                  $auxiliar = $reg['personal_cedula_aux'];
                  $aux = pg_query("SELECT * FROM public.personal WHERE cedula = $auxiliar"); 
                  $reg_aux = pg_fetch_array($aux);

                  // Operadores de Llamadas
                  $op1 = $reg['personal_cedula_op1'];
                  $result_op1 = pg_query("SELECT * FROM public.personal WHERE cedula = $op1"); 
                  $reg_op1 = pg_fetch_array($result_op1);

                  $op2 = $reg['personal_cedula_op2'];
                  $result_op2 = pg_query("SELECT * FROM public.personal WHERE cedula = $op2"); 
                  $reg_op2 = pg_fetch_array($result_op2);

                  $op3 = $reg['personal_cedula_op3'];
                  $result_op3 = pg_query("SELECT * FROM public.personal WHERE cedula = $op3"); 
                  $reg_op3 = pg_fetch_array($result_op3);

                  $op4 = $reg['personal_cedula_op4'];
                  $result_op4 = pg_query("SELECT * FROM public.personal WHERE cedula = $op4"); 
                  $reg_op4 = pg_fetch_array($result_op4);

                  $op5 = $reg['personal_cedula_op5'];
                  $result_op5 = pg_query("SELECT * FROM public.personal WHERE cedula = $op5"); 
                  $reg_op5 = pg_fetch_array($result_op5);

                  $op6 = $reg['personal_cedula_op6'];
                  $result_op6 = pg_query("SELECT * FROM public.personal WHERE cedula = $op6"); 
                  $reg_op6 = pg_fetch_array($result_op6); 

                  //Despachadores Policia Mérida
                  $pm1 = $reg['personal_cedula_poli1'];
                  $result_pm1 = pg_query("SELECT * FROM public.personal WHERE cedula = $pm1"); 
                  $reg_pm1 = pg_fetch_array($result_pm1);

                  $pm2 = $reg['personal_cedula_poli2'];
                  $result_pm2 = pg_query("SELECT * FROM public.personal WHERE cedula = $pm2"); 
                  $reg_pm2 = pg_fetch_array($result_pm2);                                    

                  $pm3 = $reg['personal_cedula_poli3'];
                  $result_pm3 = pg_query("SELECT * FROM public.personal WHERE cedula = $pm3"); 
                  $reg_pm3 = pg_fetch_array($result_pm3);

                  //Despachadores Bomberos Mérida
                  $bm1 = $reg['personal_cedula_bomb1'];
                  $result_bm1 = pg_query("SELECT * FROM public.personal WHERE cedula = $bm1"); 
                  $reg_bm1 = pg_fetch_array($result_bm1);

                  $bm2 = $reg['personal_cedula_bomb2'];
                  $result_bm2 = pg_query("SELECT * FROM public.personal WHERE cedula = $bm2"); 
                  $reg_bm2 = pg_fetch_array($result_bm2);

                  $bm3 = $reg['personal_cedula_bomb3'];
                  $result_bm3 = pg_query("SELECT * FROM public.personal WHERE cedula = $bm3"); 
                  $reg_bm3 = pg_fetch_array($result_bm3); 
                  
                  //Despachadores Protección Civíl Mérida
                  $pc1 = $reg['personal_cedula_pc1'];
                  $result_pc1 = pg_query("SELECT * FROM public.personal WHERE cedula = $pc1"); 
                  $reg_pc1 = pg_fetch_array($result_pc1);                                                     
                  $pc2 = $reg['personal_cedula_pc2'];
                  $result_pc2 = pg_query("SELECT * FROM public.personal WHERE cedula = $pc2"); 
                  $reg_pc2 = pg_fetch_array($result_pc2);

                  $pc3 = $reg['personal_cedula_pc3'];
                  $result_pc3 = pg_query("SELECT * FROM public.personal WHERE cedula = $pc3"); 
                  $reg_pc3 = pg_fetch_array($result_pc3);

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$title = 'Reporte Personal de Guardia';
$pdf->SetTitle($title);

$pdf->SetFont('Arial','B',16);
$pdf->SetX(20);
$pdf->Cell(170,10,utf8_decode('Personal de Guardia'),0,1,'C');

require('directivo_2.php');

$pdf->SetFont('Arial','',12);
$pdf ->Cell(55,7,utf8_decode(', es  realizada   la   apertura  de'),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(50,7,utf8_decode('guardia del grupo número'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(12,7,utf8_decode(''.$reg_grupo['grupos_guardia_id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(63,7,utf8_decode(', bajo el registro con el número:'),0,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(30,7,utf8_decode(''.$reg_grupo['id'].''),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf ->Cell(15,7,utf8_decode(' , del '),0,1);
$pdf->SetX(20);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(90,7,utf8_decode('" Libro  Digital  de  Novedades  9-1-1 "'),0,0);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(80,7,utf8_decode(', constituido  por  el  siguiente  personal: '),0,1);

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);
$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     1-. Supervisor'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_supervisor['p_nombre']).' '.strtoupper($reg_supervisor['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     2-. Auxiliar Supervisor'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_aux['p_nombre']).' '.strtoupper($reg_aux['p_apellido']).''),1,1,'L');

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     1-. Operador'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_op1['p_nombre']).' '.strtoupper($reg_op1['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     2-. Operador'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_op2['p_nombre']).' '.strtoupper($reg_op2['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     3-. Operador'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_op3['p_nombre']).' '.strtoupper($reg_op3['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     4-. Operador'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_op4['p_nombre']).' '.strtoupper($reg_op4['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     5-. Operador'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_op5['p_nombre']).' '.strtoupper($reg_op5['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     6-. Operador'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_op6['p_nombre']).' '.strtoupper($reg_op6['p_apellido']).''),1,1,'L');

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     1-. Despachador Policia'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_pm1['p_nombre']).' '.strtoupper($reg_pm1['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     2-. Despachador Policia'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_pm2['p_nombre']).' '.strtoupper($reg_pm2['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     3-. Despachador Policia'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_pm3['p_nombre']).' '.strtoupper($reg_pm3['p_apellido']).''),1,1,'L');

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     1-. Despachador Bomberos'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_bm1['p_nombre']).' '.strtoupper($reg_bm1['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     2-. Despachador Bomberos'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_bm2['p_nombre']).' '.strtoupper($reg_bm2['p_apellido']).''),1,1,'L');

$pdf->SetX(20);
$pdf->Cell(170,8,utf8_decode(''),0,1);

$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     1-. Despachador P. Civil'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_pc1['p_nombre']).' '.strtoupper($reg_pc1['p_apellido']).''),1,1,'L');
$pdf->SetX(20);
$pdf->SetFont('Arial','',12);
$pdf ->Cell(70,7,utf8_decode('     2-. Despachador P. Civil'),1,0);
$pdf->SetFont('Arial','B',12);
$pdf ->Cell(100,7,utf8_decode(''.strtoupper($reg_pc2['p_nombre']).' '.strtoupper($reg_pc2['p_apellido']).''),1,1,'L');


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

require('directivo.php');

$pdf->Output();

?>
