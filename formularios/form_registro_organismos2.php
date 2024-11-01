<!-- ********************************** FORMULARIO REGISTRO NUEBO ORGANISMOS    *********************************** -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h4>ORGANISMOS</h4>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Nuevo Organismo </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                                <div class="x_content">
                                    <!--            Seccion de Mensajes en pantalla -->
                                    <div class="col-md-3 col-sm-3"></div>
                                    <div class="col-md-6 col-sm-6" align="center">
                                        <?php
                                        if ($_GET['msg'] == "1") {
                                            echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El organismo ya existe!!!</strong></div>';
                                        }
                                        if ($_GET['msg'] == "2") {
                                            echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Organismo registrado con EXITO!!!</strong></div>';
                                        } elseif ($_GET['msg'] == "3") {
                                            echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Organismo NO registrado</strong></div>';
                                        }

                                        ?>
                                    </div>
                                    <div class="col-md-3 col-sm-3"></div>

                                    <br /><br /><br /><br />
                                    <!--        // Seccion de mensajes en pantalla -->
                                    <!--			// Inicio Formulario Registro de Organismos -->
                                    <form class="" action="../insertar_organismo.php?ac=1" method="post" data-parsley-validate>
                                        <span class="section">
                                            <p></p>
                                        </span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_organismo">Organismo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="text" name="nombre_organismo" id="nombre_organismo" class="form-control" placeholder="Ingresa nuevo organismo" title="Llene este campo con el nombre de un nuevo organismo" minlength="3" maxlength="30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-0-9]{3,30}" required="required" />
                                            </div>
                                            <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />
                                        </div>

                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Guardar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ********************************        TABLA DE ORGANISMOS       ****************************-->

                            <!-- page content -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="col-md-12 col-sm-12 ">


                                            <div class="x_content">
                                                <div class="row">
                                                    <div class="col-sm-12" id="tabla1">
                                                        <div class="card-box table-responsive">
                                                            <div class="col-md-8 col-sm-8 " id="tablecont">
                                                                <p class="text-muted font-13 m-b-30">
                                                                    Realize una búsqueda por número id, organismo</p>
                                                            </div>
                                                            <!-- ***********************     FIN FORMULARIO BUSQUEDA DE BIENES     **************************** -->
                                                            <?php
                                                            /**********************************     FILTRO DE BUSQUEDA      ********************************/
                                                            if ($buscar == '') {
                                                                $filtro = 'ORDER BY id ASC';
                                                            } else {
                                                                if ($buscar != '') {
                                                                    $org = $buscar;
                                                                    $filtro1 = "WHERE nombre_organismo LIKE '$org%' ";
                                                                    $consulta = pg_query($dbconn, "SELECT * FROM public.organismos $filtro1 ");
                                                                    $reg01 = pg_fetch_array($consulta);

                                                                    if ($reg01) {
                                                                        $id = $reg01['id'];
                                                                        $filtro = "WHERE id = '$id' ";
                                                                    } else {
                                                                        $organismo = $buscar;
                                                                        $filtro = "WHERE nombre_organismo LIKE '$organismo%' ";
                                                                    }
                                                                }
                                                            }
                                                            /********************************     FIN FILTRO BUSQUEDA     ************************************/
                                                            /********************************     CONSULTA DESPUES DEL FILTRO     ***************************/
                                                            $consulta_pag = pg_query($dbconn, "SELECT * FROM public.organismos $filtro ");
                                                            $row = pg_fetch_array($consulta_pag);

                                                            $total_rows_pag = pg_fetch_all($consulta_pag);

                                                            ?>
                                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                                <thead align="center">
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>Organismos</th>
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
                                                                            echo "<td><a href=modificar_organismo.php?id=" . $row[0] . " ><button class='btn btn-primary' type='submit' action='' value='EDITAR'>EDITAR</button></a></td>\n";
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



                                        <!-- /page content -->


                                    </div>

                            </div>
                        </div>
                        <!-- /page content -->