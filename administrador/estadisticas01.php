<!-- ****** ESTILOS PROPIOS ****** -->
<?php require_once '../plantillas/superior1.php';
require_once '../config/config_bd.php';
require_once '../config/conexion1.php';
require_once '../controlador/combo.php';


if (isset($_POST['consultar'])) {
  $municipio = $_POST['municipios'];
  $mes = $_POST['mes'];
  $fecha = date("Y") . "-$mes-01";
  $fecha_fin = new DateTime($fecha);
  $fecha_fin = $fecha_fin->format('Y-m-t');
  $sql = "SELECT * FROM parroquias 
  inner join solicitudes on parroquias.id = solicitudes.parroquias_id 
  WHERE 
  municipios_id = $municipio 
  AND solicitudes.fecha_sol between '" . $fecha . "' AND '" . $fecha_fin . "' ";
  //echo $sql;
  $resultado1 = pg_query($dbconn, $sql) or die("error al consultar su municipio");
}




?>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


<!-- ****** ESTILOS PROPIOS ****** -->

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
            <h4>ESTADISTICAS</h4>
          </div>

        </div>

        <div class="clearfix"></div>

        <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="row">
          <div class="col-md-3 col-sm-3 "></div>
          <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Buscar</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <!-- ************************     FORMULARIO DE CONSULTA DE SOLICITUD     ******************************* -->
                <form method="post" class="form-horizontal form-label-left">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Municipios</label>

                    <div class="col-sm-9">
                      <div class="input-group">
                        <select name="municipios" class="form-control" placeholder="" title="'Emergencias 911' " autofocus required>
                          <?php
                          $sql = "select * from municipios where estados_id = 14";
                          $resultado = pg_query($dbconn, $sql) or die("Error consultados los municipios");
                          $campos = ["id", "nombre_municipio"];
                          echo combo_bd($resultado, $campos);
                          ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-sm-3 col-form-label">Mes</label>
                    <div class="col-sm-9">
                      <div class="input-group">
                        <select name="mes" class="form-control" placeholder="Seleccione un mes" title="" required>
                          <?php
                          echo combo_simple($meses);
                          ?>
                        </select>
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-primary" name="consultar" title="Realizar busqueda de la solicitud" value="consultar">Buscar</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- /////////////////////////////////      FIN FORMULARIO CONSULTA      ////////////////////////////////////-->
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 "></div>
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->



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

                  $mes = date("n");
                  $anio = date("Y");
                  $fecha_inicio = $anio . "-" . $mes . "-01";
                  $fecha_fin = $anio . "-" . $mes . "-31";

                  /************  CONSULTA A MUNICIPIOS  ************/
                  $sql = "SELECT municipios.id, municipios.nombre_municipio, count(solicitudes.id) AS total  
FROM estados
inner join municipios on estados.id = municipios.estados_id 
inner join parroquias on municipios.id = parroquias.municipios_id
inner join solicitudes on parroquias.id = solicitudes.parroquias_id
where estados.id=14 and solicitudes.fecha_sol between '" . $fecha_inicio . "' and '" . $fecha_fin . "' 
group by (municipios.id)";


                  $resp = pg_query($dbconn, $sql) or die("Error de consulta " . __FILE__);
                  $r = "";
                  $rondas = pg_num_rows($resp);
                  $i = 0;
                  $solicitudes = "";
                  while ($filas = pg_fetch_array($resp)) {
                    $i++;
                    $r .= "\"" . $filas["nombre_municipio"] . "\"";
                    $solicitudes .= $filas["total"];
                    if ($i < $rondas) {
                      $r .= ",";
                      $solicitudes .= ",";
                    }
                  }
                  /************  FIN CONSULTA A MUNICIPIOS  ************/
                  /*
SELECT solicitante.motivo_solicitud_id, solicitudes.parroquias_id, COUNT(solicitudes.parroquias_id) AS total_solicitudes, COUNT(solicitante.motivo_solicitud_id) AS total
FROM "public"."solicitante"
inner join solicitudes on solicitudes.solicitante_id = solicitante.id
WHERE solicitudes.fecha_sol BETWEEN '2021-10-01' AND '2021-10-31' 
GROUP BY (solicitante.id, solicitante.motivo_solicitud_id, solicitudes.id, solicitudes.parroquias_id)

SELECT COUNT(solicitante.motivo_solicitud_id) AS total_motivo , (SELECT COUNT(solicitudes.parroquias_id) FROM solicitudes WHERE solicitudes.solicitante_id=solicitante.id GROUP BY solicitudes.parroquias_id) AS total_parroquias FROM "public"."solicitante" GROUP BY (solicitante.id, solicitante.motivo_solicitud_id)
*/
                  /***********  CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/
                  $motivo_munip = "SELECT motivo_solicitud.nombre_motivo, COUNT(solicitante.motivo_solicitud_id) AS total_motivo FROM public.motivo_solicitud 
                      INNER JOIN solicitante ON solicitante.motivo_solicitud_id = motivo_solicitud.id 
                      INNER JOIN solicitudes ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN parroquias ON parroquias.id = solicitudes.parroquias_id
                      INNER JOIN municipios ON municipios.id = parroquias.municipios_id
                      WHERE solicitudes.fecha_sol between '" . $fecha_inicio . "' and '" . $fecha_fin . "'
                      GROUP BY (motivo_solicitud.nombre_motivo, solicitante.motivo_solicitud_id)";

                  $resp_motivo = pg_query($dbconn, $motivo_munip) or die("Error de consulta " . __FILE__);
                  $r_motivo = "";
                  $motivo_solicitudes = "";
                  $rondas = pg_num_rows($resp_motivo);
                  $i = 0;

                  while ($filas = pg_fetch_array($resp_motivo)) {
                    $i++;
                    $r_motivo .= "\"" . $filas["nombre_motivo"] . "\"";
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

                  $resp_llamadas = pg_query($dbconn, $llamadas_solicitud) or die("Error de consulta " . __FILE__);

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
                  <h2 align="center">Desde <?php echo $fecha_inicio; ?> al <?php echo $fecha_fin; ?></h2>
                  <h2>Municipios</h2>
                  <canvas id="Municipios" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  <br /><br />
                  <div class="ln_solid"></div>
                  <h2>Motivos Solicitud</h2>
                  <canvas id="motivoMunip" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  <br /><br />
                  <div class="ln_solid"></div>
                  <h2>Total de Llamadas</h2>
                  <div class="col-md-6 col-sm-6 ">
                    <canvas id="llamadas" height="168" width="336" style="width: 374px; height: 187px;"></canvas>

                  </div>
                  <div class="col-md-6 col-sm-6 ">
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
                        <tr>
                          <td>Total:</td>
                          <td><strong><?php echo $total; ?></strong></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>


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


                  /************  CONSULTA A MUNICIPIOS  ************/
                  $sql = "SELECT parroquias.nombre_parroquia, COUNT(parroquias.id) AS total_parroquias FROM parroquias 
                  inner join solicitudes on parroquias.id = solicitudes.parroquias_id 
                  WHERE 
                  municipios_id = 183
                  AND solicitudes.fecha_sol between '2021-10-01' AND '2021-10-31'
                GROUP BY (parroquias.id)
                ";


                  $resp = pg_query($dbconn, $sql) or die("Error de consulta " . __FILE__);
                  $r = "";
                  $rondas = pg_num_rows($resp);
                  $i = 0;
                  $solicitudes = "";
                  while ($filas = pg_fetch_array($resp)) {
                    $i++;
                    $r .= "\"" . $filas["nombre_municipio"] . "\"";
                    $solicitudes .= $filas["total"];
                    if ($i < $rondas) {
                      $r .= ",";
                      $solicitudes .= ",";
                    }
                  }
                  /************  FIN CONSULTA A MUNICIPIOS  ************/

                  /***********  CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/
                  $motivo_munip = "SELECT motivo_solicitud.nombre_motivo, COUNT(solicitante.motivo_solicitud_id) AS total_motivo FROM public.motivo_solicitud 
                      INNER JOIN solicitante ON solicitante.motivo_solicitud_id = motivo_solicitud.id 
                      INNER JOIN solicitudes ON solicitudes.solicitante_id = solicitante.id
                      INNER JOIN parroquias ON parroquias.id = solicitudes.parroquias_id
                      INNER JOIN municipios ON municipios.id = parroquias.municipios_id
                      WHERE solicitudes.fecha_sol between '" . $fecha_inicio . "' and '" . $fecha_fin . "'
                      GROUP BY (motivo_solicitud.nombre_motivo, solicitante.motivo_solicitud_id)";

                  $resp_motivo = pg_query($dbconn, $motivo_munip) or die("Error de consulta " . __FILE__);
                  $r_motivo = "";
                  $motivo_solicitudes = "";
                  $rondas = pg_num_rows($resp_motivo);
                  $i = 0;

                  while ($filas = pg_fetch_array($resp_motivo)) {
                    $i++;
                    $r_motivo .= "\"" . $filas["nombre_motivo"] . "\"";
                    $motivo_solicitudes .= $filas["total_motivo"];
                    if ($i < $rondas) {
                      $r_motivo .= ",";
                      $motivo_solicitudes .= ",";
                    }
                  }
                  /***********  FIN CONSULTA MOTIVOS DE SOLICITUDES A MUNICIPIOS  **********/


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



                      if ($('#motivoParroq').length) {

                        var ctx = document.getElementById("motivoParroq");
                        var motivoParroq = new Chart(ctx, {
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


                    });
                  </script>
                  <h2 align="center">Desde <?php echo $fecha_inicio; ?> al <?php echo $fecha_fin; ?></h2>
                  <h2>Parroquias</h2>
                  <canvas id="Parroquias" height="168" width="336" style="width: 374px; height: 187px;"></canvas>
                  <br /><br />
                  <div class="ln_solid"></div>
                  <h2>Motivos Solicitud</h2>
                  <canvas id="motivoParroq" height="168" width="336" style="width: 374px; height: 187px;"></canvas>


                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
    <!-- /page content -->








    <!-- footer content -->
    <footer>
      <?php require '../menu/footer.php' ?>
    </footer>
    <!-- /footer content -->
  </div>
</div>

</body>

</html>