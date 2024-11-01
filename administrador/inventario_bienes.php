<?php
require('../cookie/cookie.php');

session_start();
  if(!isset($_SESSION['tipo_rol_id'])){
                header ("Location: ../index.php?error=fuera");
        }else{
        
            if($_SESSION['tipo_rol_id'] != 1){
                header('location: ../index.php?error=op');
            }else {
                if ($_POST['usuario'] == $usuario && $_POST['contrasena'] == $clave) {

// Conexion con la base de datos
require_once '../config/conexion1.php';

?>

     <!-- ***** Menu Navegacion Panel Derecho ***** -->
     <?php require_once '../plantillas/superior3.php'; ?>
     <!-- ***** Menu Navegacion Panel Derecho ***** -->
     
    <div class="container body">
      <div class="main_container">
     <!-- ***** Menu Navegacion Panel Derecho ***** -->
        <?php require '../menu/menu_adm.php' ?>
     <!-- ***** /Menu Navegacion Panel Derecho ***** -->
     <!-- ***** Superior menú navegacion ***** -->
        <div class="top_nav">
          <?php require '../menu/menu_top.php' ?>
        </div>
     <!-- ***** /Superior menú navegacion ***** -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>INVENTARIO BIENES</h4>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buscar Bienes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                      Realize la búsqueda por código, nombre, marca o serial.</p>
                    </div>
<!-- ***********************     FIN FORMULARIO BUSQUEDA DE BIENES     **************************** -->
            <?php

            $iniciar = ($_GET['pagina']-1)*$por_pagina;

/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($buscar == ''){ $filtro = 'ORDER BY id ASC'; }else{
if ($buscar != ''){ $ubicacion = $buscar; $filtro1 = "WHERE area_ubicacion LIKE '$ubicacion%' ";
            $consulta = pg_query($dbconn,"SELECT * FROM public.ubicacion_bienes $filtro1 ");
            $reg01 = pg_fetch_array($consulta);

                  if ($reg01){
                        $id = $reg01['id'];
                        $filtro = "WHERE ubicacion_bienes_id = '$id' ORDER BY id ASC ";
                  }else{
                      $organismo = $buscar;
                      $filtro1 = "WHERE nombre_oganismos LIKE '$organismo%' ";
                        $consulta = pg_query($dbconn,"SELECT * FROM public.organismos $filtro1 ");
                        $reg02 = pg_fetch_array($consulta);
                    if ($reg02) {
                      $id = $reg02['id'];
                      $filtro = "WHERE organismos_id = '$id' ORDER BY id ASC ";
                      }else{
                      $bienes1 = $buscar; 
                      $filtro = "WHERE codigo_b LIKE '$bienes1%' OR nombre_b LIKE '$bienes1%' OR marca_b LIKE '$bienes1' OR serial_b LIKE '$bienes1%' ORDER BY id ASC ";
                      
                      }
                    }

          }else{
                    echo "Ocurrió un error en CARGOS u ORGANISMOS.\n";
                    exit;
    }
  }
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
        $consulta_pag = pg_query($dbconn,"SELECT * FROM public.bienes $filtro ");
            $reg1 = pg_fetch_array($consulta_pag);

            $total_rows_pag = pg_fetch_all($consulta_pag);        

?>                     
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead align="center">
                        <tr>
                          <th>ID</th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Marca</th>
                          <th>Serial</th>
                          <th>Fecha ingreso</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>


                      <tbody>
<!--  *****************************   TABLA DE FORMULARIO     *************************************  -->
 
            <?php
                   if( $total_rows_pag != 0){
 
                     //impresion de los datos.
                        do
                         {
            // MUESTRA LOS VALORES DE LA CONSULTAS
              echo "<tr align='center' ><td>".$reg1['id']."</td>\n";
              echo "<td>".strtoupper($reg1['codigo_b'])."</td>\n";
              echo "<td>".strtoupper($reg1['nombre_b'])."</td>\n";
              echo "<td>".strtoupper($reg1['marca_b'])."</td>\n";
              echo "<td>".strtoupper($reg1['serial_b'])."</td>\n";
              echo "<td>".$reg1['fecha_ingreso_b']."</td>\n";
              echo "<td><a href=modificar_bienes.php?id=".$reg1['id']." target='_blank'><button class='btn btn-primary' type='submit' action='' value='EDITAR'>EDITAR</button></a></td>\n";
              echo "<td><a href=PDF/imprime_bienes.php?id=".$reg1['id']." target='_blank'><button class='btn btn-success' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";
//              echo "<br>";
            } while ($reg1 = pg_fetch_array($consulta_pag));
                  pg_free_result($consulta_pag);
                        }else { 
                        // si no existen datos muestra mensaje
                        echo "<tr><br/><td colspan='2'></td>";
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

        <!-- footer content -->
        <footer>
          <?php require '../menu/footer.php' ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php 
                  }
          }
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>
