<!-- ********************************** FORMULARIO EDITAR ORGANISMO *********************************** -->
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
                        <h2><i class="fa fa-edit"></i> Editar Organismo </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php 
                        // CONSULTA TABLA ORGANISMOS
                        $id_safe = intval($id ?? 0);
                        $result_get02 = pg_query($dbconn, "SELECT * FROM public.organismos WHERE id = $id_safe");
                        $org = ($result_get02) ? pg_fetch_assoc($result_get02) : null;      
                        if (!$org) {
                            echo "<div class='alert alert-danger text-center'><strong>Error:</strong> No se encontró el organismo especificado. <a href='organismo.php' class='btn btn-light btn-sm ml-2'>Volver</a></div>";
                        } else {
                        ?>

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
                                            <strong><i class="fa fa-check-circle"></i> ¡Organismo actualizado con ÉXITO!</strong>
                                          </div>';
                                } elseif ($msg == "3") {
                                    echo '<div class="alert alert-secondary alert-dismissible fade show text-center msn1" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                            <strong><i class="fa fa-info-circle"></i> Organismo NO actualizado</strong>
                                          </div>';
                                }
                                ?>

                                <div class="card shadow-sm border p-4" style="border-radius: 8px; background-color: #fafbfc;">
                                    <p class="text-muted text-center mb-3" style="font-size: 13px;">
                                        Modifique el nombre del organismo seleccionado. Los campos con (<span class="text-danger font-weight-bold">*</span>) son obligatorios.
                                    </p>

                                    <!-- Formulario Edición de Organismos -->
                                    <form class="form-horizontal form-label-left" action="../insertar_organismo.php?ac=2" method="post" data-parsley-validate>
                                        
                                        <div class="form-group row align-items-center mb-3">
                                            <label class="col-md-3 col-sm-4 col-form-label text-md-right text-sm-right font-weight-bold" for="nombre_oganismos" style="font-size: 13px;">
                                                Organismo <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="hidden" name="id" id="id" value="<?php echo htmlspecialchars($org['id']); ?>" required="required" />
                                                <input type="text" name="nombre_oganismos" id="nombre_oganismos" class="form-control" placeholder="Ingresa nombre de organismo" value="<?php echo htmlspecialchars($org['nombre_oganismos'] ?? ''); ?>" title="Llene este campo con el nombre de un organismo" minlength="3" maxlength="30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-0-9]{3,30}" required="required" autofocus style="height: 36px; font-size: 13px;" />
                                            </div>
                                            <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo htmlspecialchars($cedula ?? ''); ?>" required />
                                        </div>

                                        <div class="ln_solid my-3"></div>

                                        <div class="form-group row mb-0">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary px-4 py-2 font-weight-bold shadow-sm" style="border-radius: 5px;">
                                                    <i class="fa fa-save"></i> Actualizar
                                                </button>
                                                <button type="reset" class="btn btn-success px-4 py-2 font-weight-bold shadow-sm ml-2" style="border-radius: 5px;">
                                                    <i class="fa fa-eraser"></i> Limpiar
                                                </button>
                                                <a href="organismo.php" class="btn btn-secondary px-4 py-2 font-weight-bold shadow-sm ml-2" style="border-radius: 5px;">
                                                    <i class="fa fa-arrow-left"></i> Volver a la Lista
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <?php } ?>

                    </div> <!-- /x_content -->
                </div> <!-- /x_panel -->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
