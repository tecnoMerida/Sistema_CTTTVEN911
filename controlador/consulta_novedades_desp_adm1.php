<!-- ******************************** Tabla de Consulta en Acordeon ********************************* -->


              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Despachadores </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                      <!-- Seccion Cuatro -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <h4 class="panel-title">Control Bienes Entrada</h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                        Esta sección muestra la verificación de bienes al momento de la apertua y cierre de guardia   
                            </p>
                            <table class="table table-bordered">
                              <thead align="center">
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Control Entrada</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
<?php
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($organismo_id == '' AND $fecha_entrada == '' AND $fecha_salida ==''){ }else{
if ($fecha_entrada != '' AND $fecha_salida !='' ){ $fecha_e = $fecha_entrada; $fecha_s = $fecha_salida; $organismo = $organismo_id; $filtro1 = " ";
            $consulta = pg_query($dbconn,"SELECT * FROM public.guardias WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s' ");

                while($reg01=pg_fetch_array($consulta))
                          { 
                  if ($reg01){
                        $id = $reg01['id'];
                        $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                        $consulta_apt = pg_query($dbconn,"SELECT guardias.id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");

                while($reg_apt=pg_fetch_array($consulta_apt))
                          { 
                  if ($reg_apt){
                        $id = $reg_apt[1];
                        $filtro = "WHERE id = '$id' ";
                        $consulta_bienes = pg_query($dbconn,"SELECT * FROM public.control_bienes $filtro ");
                        $reg_pag = pg_fetch_array($consulta_bienes);

            $total_rows_pag = pg_fetch_all($consulta_bienes);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_pag != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
              $dato = $reg_pag['fecha_creacion'];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato)); 
              echo "<tr align='center' ><td>".$fecha."</td>\n";
              echo "<td>".$hora."</td>\n";
              echo "<td>";


                    $cadena = $reg_pag['materiales_recibe'];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                    $reg1 = pg_fetch_assoc($consulta1);

                        $total_rows1 = pg_num_rows($consulta1);

                          if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 

                    echo "".strtoupper($reg1['nombre_b']).", ";

                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }

              echo "</td>\n";
              echo "<td><a href=ver_controlBienes_entrada.php?id=".$reg_pag['id']." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_controlBienes_entrada.php?id=".$reg_pag['id']." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_pag = pg_fetch_array($consulta_bienes));
                  pg_free_result($consulta_bienes);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }                        
                      }
                    }

                  }else{
                    echo "Ocurrió un error en consulta.\n";
                    exit;
                    }
                        }
  }
}
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Seccion Cinco -->
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                          <h4 class="panel-title">Apertura</h4>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                        Esta sección muestra la descripcion realizada al momento de recibir y aperturar la guardia  
                            </p>
                            <table class="table table-bordered">
                              <thead align="center">
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Apertura</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
<?php 
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($organismo_id == '' AND $fecha_entrada == '' AND $fecha_salida ==''){ }else{
if ($fecha_entrada != '' AND $fecha_salida !='' ){ $fecha_e = $fecha_entrada; $fecha_s = $fecha_salida; $organismo = $organismo_id; $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
            $consulta_apertura = pg_query($dbconn,"SELECT * FROM public.guardias $filtro1 ");

                while($reg_01=pg_fetch_array($consulta_apertura))
                          { 
                  if ($reg_01){
                        $id = $reg_01['id'];
                        $usuario1 = $reg_01['usuario_entrada_id'];
                        $usuario2 = $reg_01['usuario_salida_id'];
                        $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                        $consulta_apt = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_inicio_g, guardias.apertura_g, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");
                        $reg_apt = pg_fetch_array($consulta_apt);


            $total_rows_apertura = pg_fetch_all($consulta_apt);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_apertura != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
                $dato = $reg_apt[1];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));          
              echo "<tr align='center' ><td>".$fecha."</td>\n";              
              echo "<td>".$hora."</td>\n";
              echo "<td>".strtoupper($reg_apt[2])."</td>\n";
              echo "<td><a href=ver_apertura_guardia.php?id=".$reg_apt[0]." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_apertura_guardia.php?id=".$reg_apt[0]." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_apt = pg_fetch_array($consulta_apt));
                  pg_free_result($consulta_apt);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }                        
          }
    }
  }
}
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
?>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Seccion Seis -->
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                          <h4 class="panel-title">Solicitudes</h4>
                        </a>
                        <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
                          <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                        Esta sección muestra las solicitudes registradas y las optenidas del "Sistema 171"  
                            </p>
                            <table class="table table-bordered">
                              <thead>
                                <tr align="center">
                                  <th>#</th>
                                  <th>Motivo</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Despachador</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
<?php
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($organismo_id == '' AND $fecha_entrada == '' AND $fecha_salida ==''){ }else{
if ($fecha_entrada != '' AND $fecha_salida !='' ){ $fecha_e = $fecha_entrada; $fecha_s = $fecha_salida; $organismo = $organismo_id; $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s'";
            $consulta_obs = pg_query($dbconn,"SELECT * FROM public.guardias $filtro1");

                while($reg_01=pg_fetch_array($consulta_obs))
                          { 
                  if ($reg_01){
                        $id = $reg_01['id'];
                        $usuario1 = $reg_01['usuario_entrada_id'];
                        $usuario2 = $reg_01['usuario_salida_id'];
                        $filtro = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                        $consulta_obs1 = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_inicio_g, guardias.usuario_salida_id, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro ");
                      //  $reg_obs = pg_fetch_array($consulta_obs);

                while($reg_obs=pg_fetch_array($consulta_obs1))
                          { 
                  if ($reg_obs){
                    /*
                    * Consulta a Tablas de Solicitudes Ingresadoas por el Usuario
                    */
                    $guardia_id = $reg_obs[0];
                    $filtro_solic = "INNER JOIN solicitante ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN solicitud_atencion ON solicitudes.id = solicitud_atencion.solicitudes_id
                      INNER JOIN motivo_solicitud ON solicitante.motivo_solicitud_id = motivo_solicitud.id
                      INNER JOIN personal ON solicitud_atencion.despachador_solicitud = personal.cedula
                      WHERE solicitudes.guardias_id = $guardia_id";
                    $consulta_solicitudes = pg_query($dbconn, "SELECT solicitudes.id, solicitudes.guardias_id, solicitudes.fecha_creacion_sol, motivo_solicitud.nombre_motivo, personal.p_nombre, personal.p_apellido FROM solicitudes $filtro_solic");
                      $reg_solic = pg_fetch_array($consulta_solicitudes);

                  $total_rows_pag = pg_fetch_all($consulta_solicitudes);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_pag != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
                $dato = $reg_solic[2];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));          
              echo "<tr align='center' ><td>".$reg_solic[0]."</td>\n";
              echo "<td>".strtoupper($reg_solic[3])."</td>\n";
              echo "<td>".$fecha."</td>\n";              
              echo "<td>".$hora."</td>\n";
                echo "<td>".strtoupper($reg_solic[4])." ".strtoupper($reg_solic[5])."</td>\n";
              echo "<td><a href=ver_solicitudes.php?id=".$reg_solic[0]." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_solicitudes.php?id=".$reg_solic[0]." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_solic = pg_fetch_array($consulta_solicitudes));
                  pg_free_result($consulta_solicitudes);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }                        
                    /*
                    * Consulta a Tablas de Solicitudes Traidas del "Sistema de Emergencias 171"
                    */    
                    $guardia_id = $reg_obs[0];
                    $filtro_solic1 = "WHERE guardias_id = $guardia_id";
                    $consulta_solicitudes1 = pg_query($dbconn,"SELECT numero_solicitud, fecha_solicitud, hora_solicitud, motivo_solicitud, despachador, guardias_id FROM public.reporte_solicitudes  $filtro_solic1");
                      $reg_solic1 = pg_fetch_array($consulta_solicitudes1);

                  $total_rows_pag1 = pg_fetch_all($consulta_solicitudes1);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_pag1 != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
                $dato = $reg_solic1[1];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));          
              echo "<tr align='center' ><td>".$reg_solic1[0]."</td>\n";
              echo "<td>".strtoupper($reg_solic1[3])."</td>\n";
              echo "<td>".$fecha."</td>\n";              
              echo "<td>".$reg_solic1[2]."</td>\n";
              $cedula_desp = $reg_solic1[4];
              $consulta_personal1 = pg_query($dbconn,"SELECT cedula, p_nombre, p_apellido FROM public.personal WHERE cedula = $cedula_desp");
              $reg_perso = pg_fetch_array($consulta_personal1);

              echo "<td>".strtoupper($reg_perso[1])." ".strtoupper($reg_perso[2])."</td>\n";
              echo "<td><a href=ver_solicitudes.php?sol=".$reg_solic1[0]." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_solicitudes.php?sol=".$reg_solic1[0]." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_solic1 = pg_fetch_array($consulta_solicitudes1));
                  pg_free_result($consulta_solicitudes1);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }
                      }
                    }
                  }else{
                    echo "Ocurrió un error en consulta.\n";
                    exit;
                    }
                        }
  }
}
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Seccion Siete -->
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                          <h4 class="panel-title">Observaciones</h4>
                        </a>
                        <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
                          <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                        Esta sección muestra las Notas, Acciones pendientes, Apoyo administrativo y Anexos 
                            </p>
                            <table class="table table-bordered">
                              <thead>
                                <tr align="center">
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Observaciones</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
<?php
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($organismo_id == '' AND $fecha_entrada == '' AND $fecha_salida ==''){ }else{
if ($fecha_entrada != '' AND $fecha_salida !='' ){ $fecha_e = $fecha_entrada; $fecha_s = $fecha_salida; $organismo = $organismo_id; $filtro1 = "WHERE fecha_inicio_g BETWEEN '$fecha_e' AND '$fecha_s' ";
            $consulta_obs = pg_query($dbconn,"SELECT * FROM public.guardias $filtro1 ");

                while($reg_01=pg_fetch_array($consulta_obs))
                          { 
                  if ($reg_01){
                        $id = $reg_01['id'];
                        $usuario1 = $reg_01['usuario_entrada_id'];
                        $usuario2 = $reg_01['usuario_salida_id'];
                        $filtro_obs1 = "INNER JOIN personal ON guardias.usuario_entrada_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo";
                        $consulta_apt = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_inicio_g, guardias.apertura_g, guardias.usuario_entrada_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_obs1 ");
//                        $reg_apt = pg_fetch_array($consulta_apt);

                while($reg_02=pg_fetch_array($consulta_apt))
                          { 
                  if ($reg_02){
                        $id = $reg_02[0];
                        $org_id = $reg_02[6];
                        $filtro_obs2 = "WHERE guardias_id = '$id' AND organismos_id = $organismo ";
                        $consulta_obs2 = pg_query($dbconn,"SELECT * FROM public.observaciones $filtro_obs2 ");
                        $reg_obs = pg_fetch_array($consulta_obs2);

                  $total_rows_pag = pg_fetch_all($consulta_obs2);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_pag != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
                $dato = $reg_obs['fecha_creacion_obs'];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));          
              echo "<tr align='center' ><td>".$fecha."</td>\n";              
              echo "<td>".$hora."</td>\n";
              if($reg_obs['notas'] != ''){ echo "<td>".strtoupper($reg_obs['notas'])."</td>\n"; } elseif($reg_obs['acciones_pen'] != '') { echo "<td>".strtoupper($reg_obs['acciones_pen'])."</td>\n"; } elseif ($reg_obs['apoyo_adm'] != '') { echo "<td>".strtoupper($reg_obs['apoyo_adm'])."</td>\n"; } else { echo "<td>".strtoupper($reg_obs['anexo'])."</td>\n"; }
              echo "<td><a href=ver_observaciones_guardia.php?id=".$reg_obs['id']." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_observaciones_guardia.php?id=".$reg_obs['id']." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_obs = pg_fetch_array($consulta_obs2));
                  pg_free_result($consulta_obs2);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }                        
                      }
                    }
                  }else{
                    echo "Ocurrió un error en consulta.\n";
                    exit;
                    }
                        }
  }
}
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
?>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <!-- Seccion Nueve -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingNine" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                          <h4 class="panel-title">Control Bienes Salida</h4>
                        </a>
                        <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                          <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                        Esta sección muestra la verificación de bienes al momento del cierre de guardia   
                            </p>
                            <table class="table table-bordered">
                              <thead align="center">
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Control Salida</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
<?php
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($organismo_id == '' AND $fecha_entrada == '' AND $fecha_salida ==''){ }else{
if ($fecha_entrada != '' ){ $fecha_e = $fecha_entrada; $fecha_s = $fecha_salida; $organismo = $organismo_id; $filtro1 = "WHERE fecha_fin_g BETWEEN '$fecha_e' AND '$fecha_s' ";
            $consulta = pg_query($dbconn,"SELECT * FROM public.guardias $filtro1");

                while($reg01=pg_fetch_array($consulta))
                          { 
                  if ($reg01){
                        $id = $reg01['id'];
                        $filtro_bienes1 = "INNER JOIN personal ON guardias.usuario_salida_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo ";
                        $consulta_bienes1 = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_fin_g, guardias.usuario_salida_id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_bienes1 ");

                while($reg_guardia=pg_fetch_array($consulta_bienes1))
                          { 
                  if ($reg_guardia) {                        
                    $id = $reg_guardia[3];
                        $filtro2 = "WHERE id = '$id' ";
                        $consulta_bienes = pg_query($dbconn,"SELECT * FROM public.control_bienes $filtro2 ");
                        $reg_pag = pg_fetch_array($consulta_bienes);

            $total_rows_pag = pg_fetch_all($consulta_bienes);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_pag != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
              $dato = $reg_pag['fecha_creacion'];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato)); 
              echo "<tr align='center' ><td>".$fecha."</td>\n";
              echo "<td>".$hora."</td>\n";
              echo "<td>";


                    $cadena = $reg_pag['materiales_entrega'];
                    $array = explode(",", $cadena);

                        foreach( $array as $id ){
                          $formato1 = $formato1.' '.$id;
                        
                      // Cunsulta el ID de los Bienes registrados
                    $consulta1 = pg_query($dbconn, "SELECT * FROM bienes WHERE id = $id");
                    $reg1 = pg_fetch_assoc($consulta1);

                        $total_rows1 = pg_num_rows($consulta1);

                          if( $total_rows1 != 0){
 
                     //impresion de los datos.
                          do
                            { 

                    echo "".strtoupper($reg1['nombre_b']).", ";

                            } while ( $reg1 = pg_fetch_array ($consulta1));
                            pg_free_result($consulta1);
                              }
                          }

              echo "</td>\n";
              echo "<td><a href=ver_controlBienes_salida.php?id=".$reg_pag['id']." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_controlBienes_salida.php?id=".$reg_pag['id']." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_pag = pg_fetch_array($consulta_bienes));
                  pg_free_result($consulta_bienes);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }                        
                      }
                    }
                  }else{
                    echo "Ocurrió un error en consulta.\n";
                    exit;
                    }
                  }
  }
}
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Seccion Diez -->
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingTen" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                          <h4 class="panel-title">Cierre</h4>
                        </a>
                        <div id="collapseTen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
                          <div class="panel-body">
                            <p class="text-muted font-13 m-b-30">
                        Esta sección muestra la descripcion realizada al momento de cerrar y entregar la guardia
                            </p>
                            <table class="table table-bordered">
                              <thead align="center">
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Cierre Guardia</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
<?php 
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($organismo_id == '' AND $fecha_entrada == '' AND $fecha_salida ==''){ }else{
if ($fecha_entrada != '' ){ $fecha_e = $fecha_entrada; $fecha_s = $fecha_salida; $organismo = $organismo_id; $filtro1 = "WHERE fecha_fin_g BETWEEN '$fecha_e' AND '$fecha_s' ";
            $consulta_cierre = pg_query($dbconn,"SELECT * FROM public.guardias $filtro1");
                while($reg01=pg_fetch_array($consulta_cierre))
                          { 
                  if ($reg01){
                        $id = $reg01['id'];
                        $filtro_cierre = "INNER JOIN personal ON guardias.usuario_salida_id=personal.cedula WHERE guardias.id = $id AND personal.organismos_id = $organismo ";
                        $consulta_cierre1 = pg_query($dbconn,"SELECT guardias.id, guardias.fecha_fin_g, guardias.cierre_g, guardias.usuario_salida_id, guardias.control_bienes_id, personal.cedula, personal.organismos_id FROM public.guardias $filtro_cierre ");

            $reg_cierre = pg_fetch_array($consulta_cierre1);

            $total_rows_cierre = pg_fetch_all($consulta_cierre1);
/*
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
*/
                    if( $total_rows_cierre != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
                $dato = $reg_cierre[1];
                $fecha = date('Y-m-d',strtotime($dato));
                $hora = date('H:i:s',strtotime($dato));          
              echo "<tr align='center' ><td>".$fecha."</td>\n";              
              echo "<td>".$hora."</td>\n";
              echo "<td>".strtoupper($reg_cierre[2])."</td>\n";
              echo "<td><a href=ver_cierre_guardia.php?id=".$reg_cierre['id']." target='_blank'><button class='btn btn-success' type='submit' action='' value='VER'>VER</button></a>\n";
              echo "<a href=PDF/imprime_cierre_guardia.php?id=".$reg_cierre['id']." target='_blank'><button class='btn btn-info' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_cierre = pg_fetch_array($consulta_cierre1));
                  pg_free_result($consulta_cierre1);
                  
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='1'></td>";
                        echo "<td colspan='4' align='center' ><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td>";
                        echo "<td colspan='1'></td></tr>"; 
                        }  
                        }
                  }                      
          }
    }
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
?>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                    </div>
                    <!-- end of accordion -->