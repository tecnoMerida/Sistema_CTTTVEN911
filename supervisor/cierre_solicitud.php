<?php

date_default_timezone_set("America/Caracas");

require('../cookie/cookie.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 2 && $_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if (($_POST['usuario'] ?? '') == ($usuario ?? '') && ($_POST['contrasena'] ?? '') == ($clave ?? '')) {

      // Conexion a la base de datos
      include_once '../config/conexion1.php';

      // Consulta al grupo del personal de guardia
      $consulta1 = pg_query($dbconn, "SELECT * FROM public.personal_grupos_guardia WHERE id=(SELECT MAX(id) FROM  personal_grupos_guardia)");
      $reg_01 = $consulta1 ? pg_fetch_array($consulta1) : false;

      $fecha_inicio = $reg_01['fecha_asig'] ?? date('Y-m-d');
      $personal_guardia = $reg_01['id'] ?? 0;
      $grupos_guardia = $reg_01['grupos_guardia_id'] ?? 0;

      // Consulta al personal de guardia
      $personal_usuario = $_SESSION['personal_cedula'] ?? 0;
      $consulta_pers = pg_query($dbconn, "SELECT * FROM public.personal WHERE cedula = $personal_usuario ");
      $regid = $consulta_pers ? pg_fetch_array($consulta_pers) : false;

      $cedula_personal = $regid['cedula'] ?? ($personal_usuario ?? 0);

      // Consulta datos del personal de guardia
      $ultimo1 = pg_query($dbconn, "SELECT id, fecha_inicio_g::timestamp::date, grupos_guardia_id, usuario_entrada_id  
      FROM public.guardias
      WHERE usuario_entrada_id = $cedula_personal
      AND fecha_inicio_g::timestamp::date = (SELECT MAX(fecha_inicio_g::timestamp::date) FROM guardias) order by id DESC");
      $reg_id = $ultimo1 ? pg_fetch_array($ultimo1) : false;

      $grupos01 = $reg_id['id'] ?? 0;

?>

      <!-- ***** Membrete ***** -->
      <?php require_once '../plantillas/superior33.php'; ?>
      <!-- ***** Membrete ***** -->

      <div class="container body">
        <div class="main_container">
          <!-- ********** Menu Navegacion Panel Derecho ********* -->
          <?php
          if ($_SESSION['tipo_rol_id'] != 1) {
            require '../menu/menu_sup.php';
          } else {
            require '../menu/menu_adm.php';
          }
          ?>

          <!-- top navigation -->
          <div class="top_nav">
            <?php require '../menu/menu_top.php' ?>
          </div>
          <!-- /top navigation -->
          <style>
              @keyframes anim0{
    0% {background-color: #DCEDC8;} /*VERDES*/
   25% {background-color: #AED581;} /*VERDES*/
   50% {background-color: #8BC34A;} /*VERDES*/
   75% {background-color: #689F38;} /*VERDES*/
  100% {background-color: #558B2F;} /*VERDES*/
}
.cero {
  animation-name: anim0;
  animation-duration: 59s;
  animation-iteration-count: infinite;
}


      @keyframes anim1{
        0% {background-color: #FFFFD8;} /*AMARILLOS*/
       25% {background-color: #FFFF00;} /*AMARILLOS*/
       50% {background-color: #FFEA00;} /*AMARILLOS*/
       75% {background-color: #FFEB3B;} /*AMARILLOS*/
      100% {background-color: #FFD600;} /*AMARILLOS*/
    }
    .uno {
      animation-name: anim1;
      animation-duration: 59s;
      animation-iteration-count: infinite;
    }

    @keyframes anim2{
      0% {background-color: #FFCDD2;} /*ROJOS*/
     25% {background-color: #E57373;} /*ROJOS*/
     50% {background-color: #EF5350;} /*ROJOS*/
     75% {background-color: #F44336;} /*ROJOS*/
    100% {background-color: #E53935;} /*ROJOS*/
  }
  .dos {
    animation-name: anim2;
    animation-duration: 59s;
    animation-iteration-count: infinite;
  }
          </style>
          <!-- /top navigation -->
          <!-- *************************************************************************************************** -->
          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h4>CONSULTA SOLICITUD</h4>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Buscar</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                            <div class="col-md-8 col-sm-8 ">
                              <p class="text-muted font-13 m-b-30">
                                Realize una busqueda por </p>
                            </div>
                            <!-- ***********************     FIN FORMULARIO BUSQUEDA DE BIENES     **************************** -->
                            <?php
                            /**********************************     FILTRO DE BUSQUEDA      ********************************/
                            $buscar = $_REQUEST['buscar'] ?? '';
                            if ($buscar == '') {
                              $filtro = "INNER JOIN public.solicitante ON solicitante.id = solicitudes.solicitante_id
                              INNER JOIN public.motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                              INNER JOIN public.organismos_solicitud ON solicitante.organismos_solicitud_id = organismos_solicitud.id
                              WHERE solicitudes.fecha_sol = '$fecha_inicio' AND solicitudes.estatus_solicitud_id = 5 ORDER BY fecha_creacion_sol ASC";
                            } else {
                              $id = $buscar;
                              if (is_numeric($id)) {
                                $filtro1 = "WHERE id = $id ";
                                $consulta = pg_query($dbconn, "SELECT id, tiempo_apertura_sol, fecha_sol, hora_sol, solicitante_id, fecha_creacion_sol FROM public.solicitudes $filtro1 ");
                                $reg01 = $consulta ? pg_fetch_array($consulta) : false;

                                if ($reg01) {
                                  $id = $reg01['id'];
                                  $filtro = "WHERE solicitudes.id = '$id' ";
                                } else {
                                  $filtro = "WHERE false";
                                }
                              } else {
                                $filtro = "WHERE false";
                              }
                            }
                            /********************************     FIN FILTRO BUSQUEDA     ************************************/
                            /********************************     CONSULTA DESPUES DEL FILTRO     ***************************/

                            $consulta_pag = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.tiempo_apertura_sol, solicitudes.fecha_sol, solicitudes.hora_sol, solicitudes.solicitante_id, solicitudes.estatus_solicitud_id, solicitudes.fecha_creacion_sol,
                            solicitante.p_nombre_sol, solicitante.p_apellido_sol, solicitante.telefono_celular_sol, solicitante.motivo_solicitud_id, organismos_solicitud.nombre_org, motivo_solicitud.nombre_motivo
                            FROM public.solicitudes $filtro");
                            $reg_pag = $consulta_pag ? pg_fetch_array($consulta_pag) : false;

                            $total_rows_pag = $consulta_pag ? pg_fetch_all($consulta_pag) : false;

                            ?>
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Solicitante</th>
                                  <th>Motivo</th>
                                  <th>Organísmo</th>
                                  <th>Acción</th>
                                </tr> 
                              </thead>


                              <tbody>
                                <!--  *****************************   TABLA DE FORMULARIO     *************************************  -->

                                <?php
                                if ($total_rows_pag !== false && !empty($total_rows_pag) && $reg_pag !== false) {

                                  //impresion de los datos.
                                  while ($reg_pag) {
                                    // COMPARACION DE VALORES PARA INDICAR COLORES
                                    // MODIFICADO 18-06/2024 7:00:00 am

                                    $fecha_y_hora = date("H:i:s");
                                    $fecha_hora = !empty($reg_pag['hora_sol']) ? $reg_pag['hora_sol'] : $fecha_y_hora;

                                    // OPERACION DE RESTA DE HORAS
                                    try {
                                        $datex7 = new DateTime($fecha_y_hora);
                                        $datex77 = new DateTime($fecha_hora);
                                        $horax7 = date_diff($datex7, $datex77);
                                        $hx7x7 = $horax7->format('%H:%I:%S'); 
                                    } catch (Exception $e) {
                                        $hx7x7 = '00:00:00';
                                    }

                                    // VALORES A COMPARAR
                                    $marca_tiempo1 = mktime(0, 5, 0, 5, 24, 2024);
                                    $time1 = date("H:i:s", $marca_tiempo1);

                                    $marca_tiempo2 = mktime(0, 10, 0, 5, 24, 2024);
                                    $time2 = date("H:i:s", $marca_tiempo2);

                                    $marca_tiempo3 = mktime(0, 15, 0, 5, 24, 2024);
                                    $time3 = date("H:i:s", $marca_tiempo3);

                                    if ($hx7x7 <= $time1){
                                        $clase = 'cero';
                                    }elseif ($hx7x7 <= $time2){
                                        $clase = 'uno';
                                    }else{
                                        $clase = 'dos';
                                    }

                                    // MUESTRA LOS VALORES DE LA CONSULTAS

                                    echo "<tr class='". $clase ."' align='center' ><td>" . $reg_pag['id'] . "</td>\n";
                                    echo "<td>" . strtoupper($reg_pag['fecha_sol'] ?? '') . "</td>\n";
                                    echo "<td>" . strtoupper($reg_pag['hora_sol'] ?? '') . ", ".$hx7x7."</td>\n";
                                    $id_solicitante = $reg_pag['solicitante_id'] ?? '';
                                    
                                    $nom_sol = '';
                                    $ape_sol = '';
                                    $nom_motivo = '';
                                    if (!empty($id_solicitante) && is_numeric($id_solicitante)) {
                                        $consulta_org = pg_query($dbconn, "SELECT id, p_nombre_sol, p_apellido_sol, motivo_solicitud_id FROM public.solicitante WHERE id = '$id_solicitante' ");
                                        if ($consulta_org && ($reg1 = pg_fetch_array($consulta_org))) {
                                            $nom_sol = strtoupper($reg1['p_nombre_sol'] ?? '');
                                            $ape_sol = strtoupper($reg1['p_apellido_sol'] ?? '');
                                            $motivo = $reg1['motivo_solicitud_id'] ?? '';
                                            if (!empty($motivo) && is_numeric($motivo)) {
                                                $consulta_motivo = pg_query($dbconn, "SELECT * FROM public.motivo_solicitud WHERE id = $motivo ");
                                                if ($consulta_motivo && ($reg_motivo = pg_fetch_array($consulta_motivo))) {
                                                    $nom_motivo = strtoupper($reg_motivo['nombre_motivo'] ?? '');
                                                }
                                            }
                                        }
                                    }
                                    echo "<td>" . $nom_sol . " " . $ape_sol . "</td>\n";
                                    echo "<td>" . $nom_motivo . "</td>\n";
                                    echo "<td>" . strtoupper($reg_pag['nombre_org'] ?? '') . "</td>\n";
                                    echo "<td><a href=cierre_solicitud_02.php?id=". $reg_pag['id']."&apertura=".$hx7x7."><button class='btn btn-primary' type='button' value='EDITAR'>EDITAR</button></a></td>\n";
                                    $reg_pag = pg_fetch_array($consulta_pag);
                                  }
                                  if ($consulta_pag) {
                                      pg_free_result($consulta_pag);
                                  }
                                } else {
                                  // si no existen datos muestra mensaje
                                  echo "<tr><br/><td colspan='1'></td>";
                                  echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                                  echo "<td colspan='1'></td></tr>";
                                }
                                ?>
                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /page content -->


                <!-- ********************************************************************************************** -->


          <?php
        }
      }
    }

          ?>



          <?php require_once '../plantillas/inferior3.php' ?>