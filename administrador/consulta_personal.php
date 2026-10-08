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
                <h4>CONSULTA PERSONAL</h4>
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
                      Realize una búsqueda por número de cédula, nombres, apellidos, cargos, organismos o grupo.</p>
                    </div>
<!-- ***********************     FIN FORMULARIO BUSQUEDA DE BIENES     **************************** -->
<?php
/**********************************     FILTRO DE BUSQUEDA      ********************************/
if ($buscar == ''){ $filtro = 'ORDER BY fecha_creacion ASC'; }else{
if ($buscar != ''){ $cargo = $buscar; $filtro1 = "WHERE nombre_cargo LIKE '$cargo%' ";
            $consulta = pg_query($dbconn,"SELECT * FROM public.cargos $filtro1 ");
            $reg01 = pg_fetch_array($consulta);

                  if ($reg01){
                        $id = $reg01['id'];
                        $filtro = "WHERE cargos_id = '$id' ";
                  }else{
                      $organismo = $buscar;
                      $filtro1 = "WHERE nombre_oganismos LIKE '$organismo%' ";
            $consulta = pg_query($dbconn,"SELECT * FROM public.organismos $filtro1 ");
            $reg02 = pg_fetch_array($consulta);

                    if ($reg02) {
                      $id = $reg02['id'];
                      $filtro = "WHERE organismos_id = '$id' ";
                      }else{
                          $grupo = $buscar;
                          $filtro1 = "WHERE id = $grupo ";
            $consulta = pg_query($dbconn,"SELECT * FROM public.grupos_guardia $filtro1 ");
            $reg03 = pg_fetch_array($consulta);
            
                    if ($reg03) {
                      $id = $reg03['id'];
                      $filtro = "WHERE grupo_guardia_id = '$id' ";
                      }else{
                        $cedula2 = $buscar;
                        $filtro = "WHERE cedula = '$cedula2' ";
                      
                      }

                      
                      }
                    }

          }else{
                    echo "Ocurrió un error en CARGOS u ORGANISMOS.\n";
                    exit;
    }
  }
/********************************     FIN FILTRO BUSQUEDA     ************************************/
/********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
        $consulta_pag = pg_query($dbconn,"SELECT * FROM public.personal $filtro ");
            $reg_pag = pg_fetch_array($consulta_pag);

            $total_rows_pag = pg_fetch_all($consulta_pag);        

?>                      
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Cedula</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Organismo</th>
                          <th>Grupo</th>
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

              echo "<tr align='center' ><td>".$reg_pag['cedula']."</td>\n";
              echo "<td>".strtoupper($reg_pag['p_nombre'])."</td>\n";
              echo "<td>".strtoupper($reg_pag['p_apellido'])."</td>\n";
                $id=$reg_pag['organismos_id'];
                // consulta Tabla de Organimos
                $consulta_org = pg_query($dbconn,"SELECT * FROM public.organismos WHERE id = '$id' ");
                $reg1 = pg_fetch_array($consulta_org);
              echo "<td>".strtoupper($reg1['nombre_oganismos'])."</td>\n";
              echo "<td>".strtoupper($reg_pag['grupo_guardia_id'])."</td>\n";
              echo "<td><a href=modificar_personal.php?id=".$reg_pag['cedula']." target='_blank'><button class='btn btn-primary' type='submit' action='' value='EDITAR'>EDITAR</button></a></td>\n";
              echo "<td><a href=PDF/imprime_personal.php?id=".$reg_pag['cedula']." target='_blank'><button class='btn btn-success' type='submit' action='' value='IMPRIMIR'>IMPRIMIR</button></a></td></tr>\n";

            } while ($reg_pag = pg_fetch_array($consulta_pag));
                  pg_free_result($consulta_pag);
                        }else { 
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

    <?php 
                  }
          }
}
    ?>

<?php require_once '../plantillas/inferior3.php' ?>
