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
                        <h2><i class="fa fa-bars"></i> Editar Grupo </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!--            Seccion de Mensajes en pantalla -->
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6" align="center">
                            <?php
                            if ($_GET['msg'] == "1") {
                                echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>El grupo ya existe!!!</strong></div>';
                            }
                            if ($_GET['msg'] == "2") {
                                echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Grupo actualizado con EXITO!!!</strong></div>';
                            } elseif ($_GET['msg'] == "3") {
                                echo '<div class="alert alert-secondary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Grupo NO actualizado</strong></div>';
                            }

                            ?>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>

                        <br /><br /><br /><br />
                        <!--        // Seccion de mensajes en pantalla -->
                        <?php 
/////////////////////////////////     CONEXION CON BASE DE DATOS        ////////////////////////////////
///////////////////////////////// FORMULARIO PARIENTES DEL PERSONAL     ///////////////////////////////


      // CONSULTA TABLA PERSONAL
        $result_get02 = pg_query($dbconn, "SELECT * FROM public.grupos_guardia WHERE id = $id");
        $grupo=pg_fetch_array($result_get02);      
        if (!$result_get02) {
                    echo "Ocurrió un error.\n";
                exit;
                }
?>
                        <!--			// Inicio Formulario Registro de Grupos -->
                        <form class="" action="../insertar_organismo.php?ac=4" method="post" data-parsley-validate>
                            <span class="section">
                                <p></p>
                            </span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align" for="nombre_grupo">Grupo<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                <input type="hidden" name="id" id="id" class="form-control" placeholder="ID grupo" value="<?php echo $grupo['id']; ?>" required="required" />
                                <input type="text" name="nombre_grupo" id="nombre_grupo" class="form-control" placeholder="Ingresa nuevo grupo" value="<?php echo $grupo['nombre_grupo']; ?>" title="Llene este campo con el nombre de un nuevo grupo" minlength="3" maxlength="30" pattern="[a-zA-Z0-9 -]{3,30}" required="required" />
                                </div>
                                <input type="hidden" name="cedula_usuario" id="cedula_usuario" value="<?php echo $cedula;?>" required />
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Actualizar</button>
                                        <button type='reset' class="btn btn-success">Limpiar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

            <!-- /page content -->