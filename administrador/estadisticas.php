<?php
require('../cookie/cookie.php');

session_start();
if (!isset($_SESSION['tipo_rol_id'])) {
  header("Location: ../index.php?error=fuera");
} else {

  if ($_SESSION['tipo_rol_id'] != 1) {
    header('location: ../index.php?error=op');
  } else {
    if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

require_once '../config/config_bd.php';
require_once '../config/conexion1.php';
require_once '../controlador/combo.php';

$consulta = $_POST['consultar'];

if (isset($_POST['consultar'])) {
  $municipio = $_POST['municipios'];
  $mes = $_POST['mes'];
  $anio = date("Y");
  $fecha = date("Y") . "-$mes-01";
  $fecha_fin = new DateTime($fecha);
  $fecha_fin = $fecha_fin->format('Y-m-t');
  $sql = "SELECT * FROM parroquias 
  inner join solicitudes on parroquias.id = solicitudes.parroquias_id 
  WHERE municipios_id = $municipio 
  AND solicitudes.fecha_sol between '" . $fecha . "' AND '" . $fecha_fin . "' ";
  //echo $sql;
  $resultado1 = pg_query($dbconn, $sql) or die("error al consultar su municipio");

  $municipio_sql = "select * from municipios where id = $municipio";
  $resultado = pg_query($dbconn, $municipio_sql) or die("Error consultados los municipios");
  $fila_municip = pg_fetch_array($resultado);
}

?>

<!-- ***** Menu Navegacion Panel Derecho ***** -->
<?php require_once '../plantillas/superior3.php';
require_once '../plantillas/inferior_graficos.php';

?>
<!-- ***** Menu Navegacion Panel Derecho ***** -->

<div class="container body">
  <div class="main_container">
    <!-- ***** Menu Navegacion Panel Derecho ***** -->
    <?php require '../menu/menu_adm.php'; ?>
    <!-- / menu navegacion panel derecho -->

    <!-- top navigation -->
    <div class="top_nav">
      <?php require '../menu/menu_top.php' ?>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h4>ESTADÍSTICAS</h4>
          </div>

        </div>

        <!-- ************************ CONSULTA ****************************** -->
        <div class="clearfix"></div>

        <div class="x_panel">
          <div class="x_title">
            <h2>Consulta </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <!--**********************  Inicio Formulario de Busqueda y Consulta de Guardia ***********-->
          <div class="col-md-12 center-margin">
            <form class="form-inline" id="consul_guardia" name="form_consul" method="POST" action="">

              <div class="form-group col-md-5">
                <label class="col-sm-2 col-form-label">Municipio</label>
                <div class="col-sm-3">
                  <select name="municipios" class="form-control" placeholder="" title="'Seleccionar Municipio' " autofocus required>
                    <option value="<?php echo $fila_municip['id']; ?>"><?php echo $fila_municip['nombre_municipio'] ?></option>
                    <?php
                    $sql = "SELECT * FROM municipios WHERE estados_id = 14";
                    $resultado = pg_query($dbconn, $sql) or die("Error consultados los municipios");
                    $campos = ["id", "nombre_municipio"];
                    echo combo_bd($resultado, $campos);
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="form-group col-md-4">
                <label class="col-sm-2 form-label">Mes</label>
                <div class="col-sm-2">
                  <select name="mes" class="form-control" placeholder="Seleccione un mes" title="" required>
                    <option value="<?php echo $aux ?>"><?php echo $meses[$mes] ?></option>
                    <?php
                    echo combo_simple($meses);
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <button type="submit" name="consultar" class="btn btn-primary" title="Presione el boton para realizar la consulta">Buscar</button>
              </div>
            </form>
          </div>
          <!-- ****************************** Fin de Formulario **************************************-->
        </div>


        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Muestras y Gráficas</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>

                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-12 col-sm-12" style="display: inline-block; ">

                  <?php
echo $municipio;
echo $fecha;
echo $fecha_fin;
                  /************  CONSULTA A MUNICIPIOS  ************/

// Consulta Tabla Reporte Solicitudes
$sql2 = "SELECT municipios.id, municipios.nombre_municipio, count(reporte_solicitudes.id) AS total1  
FROM public.reporte_solicitudes
INNER JOIN municipios ON municipios.id = reporte_solicitudes.municipio
WHERE reporte_solicitudes.municipio = $municipio AND reporte_solicitudes.fecha_solicitud BETWEEN '" . $fecha . "' and '" . $fecha_fin . "'
GROUP BY (municipios.id)";
                  $resp2 = pg_query($dbconn, $sql2) or die("<div align='center'><strong> NO EXISTEN DATOS A MOSTRAR </strong></div>");


                  $rondas = pg_num_rows($resp2);
                  $i = 0;
                  $solicitudes1 = "";
                  while ($filas1 = pg_fetch_array($resp2)) {
                    $i++;
                    $etiqueta = $filas1["nombre_municipio"];
                    $temp[$etiqueta] = $filas1["total1"];                                        
                  }

// Consulta Tabla Solitudes
/*$sql = "SELECT municipios.id, municipios.nombre_municipio, count(solicitudes.id) AS total  
FROM estados
inner join municipios on estados.id = municipios.estados_id 
inner join parroquias on municipios.id = parroquias.municipios_id
inner join solicitudes on parroquias.id = solicitudes.parroquias_id
where estados.id=14 and solicitudes.fecha_sol between '" . $fecha . "' and '" . $fecha_fin . "' 
group by (municipios.id)";
*/

$sql = "SELECT municipios.id, municipios.nombre_municipio, count(solicitudes.id) AS total
FROM public.solicitudes
INNER JOIN parroquias ON parroquias.id = solicitudes.parroquias_id
INNER JOIN municipios ON municipios.id = parroquias.municipios_id
WHERE solicitudes.fecha_sol BETWEEN '" . $fecha . "' and '" . $fecha_fin . "'
GROUP BY (municipios.id)";

                  $resp = pg_query($dbconn, $sql) or die("<div align='center'><strong> NO EXISTEN DATOS A MOSTRAR </strong></div>");

                  $r = "";
                  $rondas = pg_num_rows($resp);
                  $i = 0;
                  $solicitudes = "";

                  while ($filas = pg_fetch_array($resp)) {
                    $i++;
                    $r .= "\"" . $filas["nombre_municipio"] . "\"";
                    $buscar = $filas["nombre_municipio"];
                    if (array_key_exists($buscar,$temp))
                    {
                      $solicitudes .= ($filas["total"] + $temp[$buscar]);
                    } else {
                      $solicitudes .= $filas["total"];
                    }                    
                    if ($i < $rondas) {
                      $r .= ",";
                      $solicitudes .= ",";
                    }
                  }
                  echo $row;



                  /************  FIN CONSULTA A MUNICIPIOS  ************/

                  /***********  CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/
                  $motivo_munip = "SELECT motivo_solicitud_grupo.nombre_motivo_grupo, motivo_solicitud.nombre_motivo, COUNT(solicitante.motivo_solicitud_id) AS total_motivo FROM public.motivo_solicitud_grupo
                  INNER JOIN motivo_solicitud ON motivo_solicitud.motivo_grupo_id = motivo_solicitud_grupo.id 
                                        INNER JOIN solicitante ON solicitante.motivo_solicitud_id = motivo_solicitud.id 
                                        INNER JOIN solicitudes ON solicitudes.solicitante_id = solicitante.id
                                        INNER JOIN parroquias ON parroquias.id = solicitudes.parroquias_id
                                        INNER JOIN municipios ON municipios.id = parroquias.municipios_id
                                        WHERE solicitudes.fecha_sol between '$fecha' and '$fecha_fin'
                                        GROUP BY (motivo_solicitud_grupo.nombre_motivo_grupo, motivo_solicitud.nombre_motivo, solicitante.motivo_solicitud_id)";

                  $resp_motivo = pg_query($dbconn, $motivo_munip) or die("Error de consulta " . __FILE__ . " NO EXISTEN DATOS ");
                  $r_motivo = "";
                  $motivo_solicitudes = "";
                  $rondas = pg_num_rows($resp_motivo);
                  $i = 0;

                  while ($filas = pg_fetch_array($resp_motivo)) {
                    $i++;
                    $r_motivo .= "\"" . $filas["nombre_motivo_grupo"] . " - " . $filas["nombre_motivo"] . "\"";
                    $motivo_solicitudes .= $filas["total_motivo"];
                    if ($i < $rondas) {
                      $r_motivo .= ",";
                      $motivo_solicitudes .= ",";
                    }
                  }
                  /***********  FIN CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/

                  /***********  CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/
                  $llamadas_solicitud = "SELECT SUM(efectivo) AS total_efectivo, 
                                            SUM(no_efectivo) AS total_no_efectivo, 
                                            SUM(sin_despacho) AS total_sin_despacho, 
                                            SUM(repetida) AS total_repetida, 
                                            SUM(sabotaje) AS total_sabotaje, 
                                            SUM(informacion) AS total_informacion, 
                                            SUM(abandonada) AS total_abandonada, 
                                            SUM(total_solici) AS total_solicitudes 
                                            FROM public.estadisticas_solicitud WHERE mes = '$mes' AND ano = '$anio'";

                  $resp_llamadas = pg_query($dbconn, $llamadas_solicitud) or die("Error de consulta " . __FILE__ . " NO EXISTEN DATOS ");

                  $rondas = pg_num_rows($resp_llamadas);
                  $i = 0;
                  $datos = "";
                  $campos = "";
                  while ($filas = pg_fetch_array($resp_llamadas)) {
                    $i++;
                    $datos .= $filas["total_efectivo"];
                    $datos .= "," . $filas["total_no_efectivo"];
                    $datos .= "," . $filas["total_sin_despacho"];
                    $datos .= "," . $filas["total_repetida"];
                    $datos .= "," . $filas["total_sabotaje"];
                    $datos .= "," . $filas["total_informacion"];
                    $datos .= "," . $filas["total_abandonada"];
                    $campos = $filas;
                    //  $datos .= ",".$filas["total_solicitudes"];
                    if ($i < $rondas) {
                      $datos .= ",";
                    }
                  }
                  $label = "\"efectivas\",\"no efectivas\",\"sin despacho\",
                                            \"repetida\",\"sabotaje\",\"informacion\",
                                            \"abandonada\",\"total_solici\"";


                  /***********  FIN CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/
                  ?>


                  <script type="text/javascript">
                    /********* SCRIPT PARA GRAFICA DE MUNICIPIOS *********** */

                    // Bar chart
                    $(document).ready(function() {


                      if ($('#Municipios').length) {

                        var ctx = document.getElementById("Municipios");
                        var Municipios = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: [<?php echo $r; ?>],
                            datasets: [{
                              label: '# Solicitudes',
                              backgroundColor: "#26B99A",
                              data: [<?php echo $solicitudes; ?>]
                            }]
                          },

                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }]
                            }
                          }
                        });

                      }

                      /*----------------------------*/
                      /********* SCRIPT PARA GRAFICA DE MOTIVOS DE SOLICITUD DE MUNICIPIOS *********** */

                      // Bar chart



                      if ($('#motivoMunip').length) {

                        var ctx = document.getElementById("motivoMunip");
                        var motivoMunip = new Chart(ctx, {
                          type: 'horizontalBar',
                          data: {
                            labels: [<?php echo $r_motivo; ?>],
                            datasets: [{
                              label: '# Motivos de Solicitudes',
                              backgroundColor: "#03586A",
                              data: [<?php echo $motivo_solicitudes; ?>]
                            }]
                          },

                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }]
                            }
                          }
                        });

                      }

                      /*----------------------------*/
                      /********* SCRIPT PARA GRAFICA DE TOTAL DE LLAMAS REGISTRADAS *********** */
                      // Doughnut chart

                      if ($('#llamadas').length) {

                        var ctx = document.getElementById("llamadas");
                        var data = {
                          labels: [<?php echo $label ?>],
                          datasets: [{
                            data: [<?php echo $datos ?>],
                            backgroundColor: [
                              "#3498DB",
                              "#26B99A",
                              "#9B59B6",
                              "#BDC3C7",
                              "#E74C3C",
                              "blue",
                              "black"
                            ],
                            hoverBackgroundColor: [
                              "#49A9EA",
                              "#36CAAB",
                              "#B370CF",
                              "#CFD4D8",
                              "#E95E4F",
                              "blue",
                              "black"
                            ]

                          }]
                        };

                        var llamadas = new Chart(ctx, {
                          type: 'doughnut',
                          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                          data: data
                        });

                      }

                    });
                  </script>
                  <h2 align="center">Desde <?php echo $fecha; ?> al <?php echo $fecha_fin; ?></h2>
                  <h2>Municipios</h2>
                  <div class="col-md-12 col-sm-12 ">
                  <div class="col-md-2 col-sm-2 "></div>
                  <div class="col-md-8 col-sm-8 ">
                  <canvas id="Municipios" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  <br /><br />
                  <div class="ln_solid"></div>
                </div>
                  <div class="col-md-2 col-sm-2 "></div>
                </div>

                  <h2>Motivos Solicitud</h2>
                  <div class="col-md-12 col-sm-12 ">
                  <div class="col-md-1 col-sm-1 "></div>
                  <div class="col-md-10 col-sm-10 ">
                  <canvas id="motivoMunip" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  <br /><br />
                  <div class="ln_solid"></div>
                  </div>
                  <div class="col-md-1 col-sm-1 "></div>
                  </div>

                  <h2>Total de Llamadas</h2>
                  <div class="col-md-1 col-sm-1 "></div>
                  <div class="col-md-6 col-sm-6 ">
                    <canvas id="llamadas" height="168" width="336" style="width: 374px; height: 187px;"></canvas>

                  </div>
                  <div class="col-md-4 col-sm-4 ">
                    <?php
                    $total = $campos["total_solicitudes"];

                    ?>
                    <table class="tile_info">
                      <tr>
                        <td>
                          <p><i class="fa fa-square blue"></i>Efectivas </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_efectivo'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square green"></i>No Efectivas </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_no_efectivo'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square purple"></i>Sin Despacho </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_sin_despacho'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square aero"></i>Repetida </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_repetida'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square red"></i>Sabotaje </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_sabotaje'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square blue"></i>Información </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_informacion'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square black"></i>Abandonada </p>
                        </td>
                        <td><?php $porcentaje = $campos['total_abandonada'] * 100 / $total;
                            $porcentaje = round($porcentaje, 0);
                            echo $porcentaje . "%"; ?></td>
                      </tr>
                      <tfoot>
                        <tr><td><br/></td></tr>
                        <tr>
                          <td><strong>Total:</strong></td>
                          <td><strong><?php echo $total; ?></strong></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="col-md-1 col-sm-1"></div>


                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="clearfix"></div>


        <!-- /******* TABLA PARA MOSTRAR GRAFICAS DE MUNICIPIOS ************** */-->
        <div class="row">
          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Municipios</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>

                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-12 col-sm-12" style="display: inline-block; ">

                  <?php

                  /************  CONSULTA A PARROQUIAS  ************/
                  $sql = "SELECT parroquias.nombre_parroquia, COUNT(parroquias.id) AS total_parroquias FROM parroquias 
                  inner join solicitudes on parroquias.id = solicitudes.parroquias_id 
                  WHERE parroquias.municipios_id = $municipio
                  AND solicitudes.fecha_sol between '$fecha' AND '$fecha_fin'
                GROUP BY (parroquias.id)";


                  $resp = pg_query($dbconn, $sql) or die("Error de consulta " . __FILE__);
                  $r = "";
                  $rondas = pg_num_rows($resp);
                  $i = 0;
                  $solicitudes = "";
                  while ($filas = pg_fetch_array($resp)) {
                    $i++;
                    $r .= "\"" . $filas["nombre_parroquia"] . "\"";
                    $solicitudes .= $filas["total_parroquias"];
                    if ($i < $rondas) {
                      $r .= ",";
                      $solicitudes .= ",";
                    }
                  }
                  /************  FIN CONSULTA A PARROQUIAS  ************/

                  /***********  CONSULTA MOTIVOS DE SOLICITUDES A PARROQUIAS  **********/
                  $motivo_munip = "SELECT motivo_solicitud_grupo.nombre_motivo_grupo, parroquias.id, motivo_solicitud.nombre_motivo, COUNT(solicitante.motivo_solicitud_id) AS total_motivo FROM public.motivo_solicitud_grupo
                  INNER JOIN motivo_solicitud ON motivo_solicitud.motivo_grupo_id = motivo_solicitud_grupo.id 
                                    INNER JOIN solicitante ON solicitante.motivo_solicitud_id = motivo_solicitud.id 
                                    INNER JOIN solicitudes ON solicitudes.solicitante_id = solicitante.id
                                    INNER JOIN parroquias ON parroquias.id = solicitudes.parroquias_id
                                    WHERE solicitudes.fecha_sol between '$fecha' and '$fecha_fin' AND parroquias.municipios_id = $municipio
                                    GROUP BY (motivo_solicitud_grupo.nombre_motivo_grupo, motivo_solicitud.nombre_motivo, solicitante.motivo_solicitud_id, parroquias.id)";

                  $resp_motivo = pg_query($dbconn, $motivo_munip) or die("Error de consulta " . __FILE__);
                  $r_motivo = "";
                  $motivo_solicitudes = "";
                  $rondas = pg_num_rows($resp_motivo);
                  $i = 0;

                  while ($filas = pg_fetch_array($resp_motivo)) {
                    $i++;
                    $r_motivo .= "\"".$filas["nombre_motivo_grupo"]." - ".$filas["nombre_motivo"] . "\"";
                    $motivo_solicitudes .= $filas["total_motivo"];
                    if ($i < $rondas) {

                      $r_motivo .= ",";
                      $motivo_solicitudes .= ",";
                    }
                  }
                  /***********  FIN CONSULTA MOTIVOS DE SOLICITUDES A PARROQUIAS  **********/


                  ?>


                  <script type="text/javascript">
                    /********* SCRIPT PARA GRAFICA DE PARROQUIAS *********** */

                    // Bar chart
                    $(document).ready(function() {


                      if ($('#Parroquias').length) {

                        var ctx = document.getElementById("Parroquias");
                        var Parroquias = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: [<?php echo $r; ?>],
                            datasets: [{
                              label: '# Solicitudes',
                              backgroundColor: "#1e90ff",
                              data: [<?php echo $solicitudes; ?>]
                            }]
                          },

                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }]
                            }
                          }
                        });

                      }

                      /*----------------------------*/
                      /********* SCRIPT PARA GRAFICA DE MOTIVOS DE SOLICITUD DE MUNICIPIOS *********** */

                      // Bar chart



                      if ($('#motivoParroq').length) {

                        var ctx = document.getElementById("motivoParroq");
                        var motivoParroq = new Chart(ctx, {
                          type: 'horizontalBar',
                          data: {
                            labels: [<?php echo $r_motivo; ?>],
                            datasets: [{
                              label: '# Motivos de Solicitudes',
                              backgroundColor: "#003366",
                              data: [<?php echo $motivo_solicitudes; ?>]
                            }]
                          },

                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }]
                            }
                          }
                        });

                      }

                      /*----------------------------*/


                    });
                  </script>
                  <h2 align="center"><strong><?php echo $fila_municip['nombre_municipio']; ?></strong> Desde <?php echo $fecha; ?> al <?php echo $fecha_fin; ?></h2>
                  <h2>Parroquias</h2>
                  <div class="col-md-12 col-sm-12 ">
                  <div class="col-md-2 col-sm-2 "></div>
                  <div class="col-md-8 col-sm-8 ">
                  <canvas id="Parroquias" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  <br /><br />
                  <div class="ln_solid"></div>
                  </div>
                  <div class="col-md-2 col-sm-2 "></div>
                  </div>


                  <h2>Motivos Solicitud</h2>
                  <div class="col-md-12 col-sm-12 ">
                  <div class="col-md-1 col-sm-1 "></div>
                  <div class="col-md-8 col-sm-8 ">
                  <canvas id="motivoParroq" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  </div>
                  <div class="col-md-1 col-sm-1 "></div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
    <!-- /page content -->

<?php
    }
  }
}
    ?>
    
    <?php require_once '../plantillas/inferior3.php'; ?>