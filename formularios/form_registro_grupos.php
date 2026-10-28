<!-- ********************************** FORMULARIO REGISTRO NUEBO ORGANISMOS    *********************************** -->
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h4>GRUPOS</h4>
      </div>
    </div>


    <div class="clearfix"></div>

    <div class="">
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Nuevo Grupo </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Formulario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tabla</a>
              </li>

            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row justify-content-center py-4">
                  <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-12">

                    <!-- Seccion de Mensajes en pantalla -->
                    <?php
                    $msg = $_GET['msg'] ?? '';
                    if ($msg == "1") {
                      echo '<div class="alert alert-danger alert-dismissible fade show text-center msn1" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                              <strong><i class="fa fa-exclamation-triangle"></i> ¡El grupo ya existe!</strong>
                            </div>';
                    } elseif ($msg == "2") {
                      echo '<div class="alert alert-success alert-dismissible fade show text-center msn1" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                              <strong><i class="fa fa-check-circle"></i> ¡Grupo registrado con ÉXITO!</strong>
                            </div>';
                    } elseif ($msg == "3") {
                      echo '<div class="alert alert-secondary alert-dismissible fade show text-center msn1" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                              <strong><i class="fa fa-info-circle"></i> Grupo NO registrado</strong>
                            </div>';
                    }
                    ?>

                    <div class="card shadow-sm border p-4" style="border-radius: 8px; background-color: #fafbfc;">
                      <p class="text-muted text-center mb-3" style="font-size: 13px;">
                        Los campos que contengan (<span class="text-danger font-weight-bold">*</span>) son de asignación obligatoria
                      </p>

                      <!-- Inicio Formulario Registro de Grupos -->
                      <form class="form-horizontal form-label-left" action="../insertar_organismo.php?ac=3" method="post" data-parsley-validate>
                        
                        <div class="form-group row align-items-center mb-3">
                          <label class="col-md-3 col-sm-4 col-form-label text-md-right text-sm-right font-weight-bold" for="nombre_grupo" style="font-size: 13px;">
                            Grupo <span class="text-danger">*</span>
                          </label>
                          <div class="col-md-9 col-sm-8">
                            <input type="text" name="nombre_grupo" id="nombre_grupo" class="form-control" placeholder="Ingresa nuevo grupo" title="Llene este campo con el nombre de un nuevo grupo" minlength="3" maxlength="30" pattern="[a-zA-Z0-9 -]{3,30}" required="required" autofocus style="height: 36px; font-size: 13px;" />
                          </div>
                          <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo htmlspecialchars($cedula ?? ''); ?>" required />
                        </div>

                        <div class="ln_solid my-3"></div>

                        <div class="form-group row mb-0">
                          <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-4 py-2 font-weight-bold shadow-sm" style="border-radius: 5px;">
                              <i class="fa fa-save"></i> Guardar
                            </button>
                            <button type="reset" class="btn btn-success px-4 py-2 font-weight-bold shadow-sm ml-2" style="border-radius: 5px;">
                              <i class="fa fa-eraser"></i> Limpiar
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <!-- ********************************        TABLA DE ORGANISMOS       ****************************-->

              <!-- page content -->
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                            <div class="col-md-8 col-sm-8 " style="margin-bottom:-50px;">
                              <p class="text-muted font-13 m-b-30">
                                Realize una busqueda por número Id, Nombre del grupo</p>
                            </div>
                            <!-- ***********************     FIN FORMULARIO BUSQUEDA DE BIENES     **************************** -->
                            <?php
                            /**********************************     FILTRO DE BUSQUEDA      ********************************/
                            $buscar = $_REQUEST['buscar'] ?? '';
                            if ($buscar == '') {
                              $filtro = 'ORDER BY id ASC';
                            } else {
                              if ($buscar != '') {
                                $org = $buscar;
                                $filtro1 = "WHERE nombre_grupo LIKE '$org%' ";
                                $consulta = pg_query($dbconn, "SELECT * FROM grupos_guardia $filtro1 ");
                                $reg01 = pg_fetch_array($consulta);

                                if ($reg01) {
                                  $id = $reg01['id'];
                                  $filtro = "WHERE id = '$id' ";
                                } else {
                                  $grupo = $buscar;
                                  $filtro = "WHERE nombre_grupo LIKE '$grupo%' ";
                                }
                              }
                            }
                            /********************************     FIN FILTRO BUSQUEDA     ************************************/
                            /********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
                            $consulta_pag = pg_query($dbconn, "SELECT * FROM public.grupos_guardia $filtro ");
                            $row = pg_fetch_array($consulta_pag);

                            $total_rows_pag = pg_fetch_all($consulta_pag);

                            ?>
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                              <thead align="center">
                                <tr>
                                  <th>Id</th>
                                  <th>Grupos</th>
                                  <th></th>
                                </tr>
                              </thead>


                              <tbody>
                                <!--  *****************************   TABLA DE FORMULARIO     *************************************  -->

                                <?php
                                if ($total_rows_pag != 0) {

                                  //impresion de los datos.
                                  do {
                                    // MUESTRA LOS VALORES DE LA CONSULTAS

                                    //            while ($row = pg_fetch_row($result)) {
                                    echo "<tr align='center' ><td>" . $row[0] . "</td>";
                                    echo "<td>" . strtoupper($row[1]) . "</td>";
                                    echo "<td><a href=modificar_grupos.php?id=" . $row[0] . " ><button class='btn btn-primary' type='submit' action='' value='EDITAR'>EDITAR</button></a></td>\n";
                                    echo "</tr><br/>";
                                    //            }

                                  } while ($row = pg_fetch_array($consulta_pag));
                                  pg_free_result($consulta_pag);
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
              </div>
              <!-- /page content -->



            </div>
            <!-- /page content -->