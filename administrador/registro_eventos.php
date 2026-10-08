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
                <h3>REGISTRO DE EVENTOS</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bitacora</h2>
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

<!-- ***********************     FIN FORMULARIO BUSQUEDA DE BIENES     **************************** -->
            <?php

 //           $iniciar = ($_GET['pagina']-1)*$por_pagina;

/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($buscar == ''){ $filtro = 'ORDER BY id ASC'; }
        $consulta_pag = pg_query($dbconn,"SELECT * FROM public.bitacora $filtro ");
            $reg1 = pg_fetch_array($consulta_pag);

            $total_rows_pag = pg_fetch_all($consulta_pag);        

?>                      
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Fecha</th>
                          <th>nombre_esquema</th>
                          <th>nombre_tabla</th>
                          <th>proceso</th>
                          <th>Cédula</th>
<!--                          <th>Anterior</th>-->
                          <th>Nuevo</th>
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
              echo "<td>".strtoupper($reg1['fecha_operacion'])."</td>\n";
              echo "<td>".strtoupper($reg1['nombre_esquema'])."</td>\n";
              echo "<td>".strtoupper($reg1['nombre_tabla'])."</td>\n";
              echo "<td>".strtoupper($reg1['proceso'])."</td>\n";
              echo "<td>".strtoupper($reg1['usuario_aplicacion'])."</td>\n";
//              echo "<td>".strtoupper($reg1['valor_anterior'])."</td>\n";
              echo "<td>".$reg1['valor_nuevo']."</td></tr>\n";
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


    <?php 
                  }
          }
}
    ?>

<?php require_once '../plantillas/inferior3.php'; ?>