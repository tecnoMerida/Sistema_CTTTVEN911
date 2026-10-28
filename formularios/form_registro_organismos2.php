<!-- ********************************** FORMULARIO REGISTRO NUEVO ORGANISMOS *********************************** -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>ORGANISMOS</h4>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Nuevo Organismo </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                            <!-- ============================== TAB 1: FORMULARIO CENTRADO ============================== -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row justify-content-center py-4">
                                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-12">

                                        <!-- Seccion de Mensajes en pantalla -->
                                        <?php
                                        $msg = $_GET['msg'] ?? '';
                                        if ($msg == "1") {
                                            echo '<div class="alert alert-danger alert-dismissible fade show text-center msn1" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                                    <strong><i class="fa fa-exclamation-triangle"></i> ¡El organismo ya existe!</strong>
                                                  </div>';
                                        } elseif ($msg == "2") {
                                            echo '<div class="alert alert-success alert-dismissible fade show text-center msn1" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                                    <strong><i class="fa fa-check-circle"></i> ¡Organismo registrado con ÉXITO!</strong>
                                                  </div>';
                                        } elseif ($msg == "3") {
                                            echo '<div class="alert alert-secondary alert-dismissible fade show text-center msn1" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                                    <strong><i class="fa fa-info-circle"></i> Organismo NO registrado</strong>
                                                  </div>';
                                        }
                                        ?>

                                        <div class="card shadow-sm border p-4" style="border-radius: 8px; background-color: #fafbfc;">
                                            <p class="text-muted text-center mb-3" style="font-size: 13px;">
                                                Los campos que contengan (<span class="text-danger font-weight-bold">*</span>) son de asignación obligatoria
                                            </p>

                                            <!-- Formulario Registro de Organismos -->
                                            <form class="form-horizontal form-label-left" action="../insertar_organismo.php?ac=1" method="post" data-parsley-validate>
                                                
                                                <div class="form-group row align-items-center mb-3">
                                                    <label class="col-md-3 col-sm-4 col-form-label text-md-right text-sm-right font-weight-bold" for="nombre_organismo" style="font-size: 13px;">
                                                        Organismo <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-9 col-sm-8">
                                                        <input type="text" name="nombre_oganismos" id="nombre_organismo" class="form-control" placeholder="Ingresa nuevo organismo" title="Llene este campo con el nombre de un nuevo organismo" minlength="3" maxlength="30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-0-9]{3,30}" required="required" autofocus style="height: 36px; font-size: 13px;" />
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

                            <!-- ============================== TAB 2: TABLA DE ORGANISMOS ============================== -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12" id="tabla1">
                                                <div class="card-box table-responsive">
                                                    <div class="col-md-8 col-sm-8" id="tablecont">
                                                        <p class="text-muted font-13 m-b-30">
                                                            Realice una búsqueda por número id, organismo
                                                        </p>
                                                    </div>

                                                    <?php
                                                    /********************************** FILTRO DE BÚSQUEDA ********************************/
                                                    $buscar = $_REQUEST['buscar'] ?? '';
                                                    if (trim($buscar) == '') {
                                                        $filtro = 'ORDER BY id ASC';
                                                    } else {
                                                        $busq = pg_escape_string($dbconn, trim($buscar));
                                                        if (is_numeric($busq)) {
                                                            $filtro = "WHERE id = " . intval($busq) . " ORDER BY id ASC";
                                                        } else {
                                                            $filtro = "WHERE nombre_oganismos ILIKE '%" . $busq . "%' ORDER BY id ASC";
                                                        }
                                                    }
                                                    /******************************** FIN FILTRO BÚSQUEDA ********************************/
                                                    $consulta_pag = pg_query($dbconn, "SELECT id, nombre_oganismos FROM public.organismos $filtro");
                                                    $total_rows_pag = ($consulta_pag) ? pg_num_rows($consulta_pag) : 0;
                                                    ?>

                                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                        <thead align="center" style="background-color: #2a3f54; color: #ffffff;">
                                                            <tr>
                                                                <th style="width: 100px;">Id</th>
                                                                <th>Organismos</th>
                                                                <th style="width: 150px;">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($total_rows_pag > 0) {
                                                                while ($row = pg_fetch_assoc($consulta_pag)) {
                                                                    echo "<tr align='center'>";
                                                                    echo "<td>" . $row['id'] . "</td>";
                                                                    echo "<td align='left' style='padding-left: 20px; font-weight: 600;'>" . strtoupper($row['nombre_oganismos']) . "</td>";
                                                                    echo "<td><a href='modificar_organismo.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm font-weight-bold'><i class='fa fa-edit'></i> Editar</a></td>";
                                                                    echo "</tr>\n";
                                                                }
                                                                pg_free_result($consulta_pag);
                                                            } else {
                                                                echo "<tr><td colspan='3' align='center'><div class='alert alert-secondary msn1'><strong>No se obtuvieron resultados</strong></div></td></tr>";
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

                        </div> <!-- /tab-content -->
                    </div> <!-- /x_content -->
                </div> <!-- /x_panel -->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
