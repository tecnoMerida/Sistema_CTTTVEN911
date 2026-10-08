       <!-- page content -->
       <div class="right_col" role="main">
           <div class="">
               <div class="page-title">
                   <div class="title_left">
                       <h4>REGISTRO PERSONAL</h4>
                   </div>

               </div>
               <div class="clearfix"></div>

               <div class="row">

                   <div class="col-md-12 col-sm-12 ">
                       <div class="x_panel">
                           <div class="x_title">
                               <h2>Datos Personales</h2>
                               <ul class="nav navbar-right panel_toolbox">
                                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                   </li>

                                   <li><a class="close-link"><i class="fa fa-close"></i></a>
                                   </li>
                               </ul>
                               <div class="clearfix"></div>
                           </div>
                           <div align="center">
                               <?php

                                if ($_GET[msg] == "2") {
                                    echo '<div class="alert alert-success alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Usuario Registrado con EXITO!!!</strong></div>';
                                }

                                ?>
                           </div>
                           <div class="x_content">

                               <?php

                                $ultimo1 = pg_query($dbconn, "SELECT * FROM  personal WHERE fecha_creacion=(SELECT MAX(fecha_creacion) FROM personal) ");
                                $reg_id = pg_fetch_array($ultimo1);

                                $cedula = $reg_id['cedula'];
                                $p_nombre = $reg_id['p_nombre'];
                                $s_nombre = $reg_id['s_nombre'];
                                $p_apellido = $reg_id['p_apellido'];
                                $s_apelllido = $reg_id['s_apelllido'];
                                $grado_instruccion_id = $reg_id['grado_instruccion_id'];
                                $genero_id = $reg_id['genero_id'];
                                $telefono_celular = $reg_id['telefono_celular'];
                                $telefono_casa = $reg_id['telefono_casa'];
                                $correo_electronico = $reg_id['correo_electronico'];

                                $estado_civil_id = $reg_id['estado_civil_id'];
                                $hijos = $reg_id['hijos'];
                                $numero_hijos = $reg_id['numero_hijos'];

                                $parroquias_id = $reg_id['parroquias_id'];
                                $municipios_id = $reg_id['municipios_id'];
                                $estados_id = $reg_id['estados_id'];
                                $nombre_sector = $reg_id['nombre_sector'];
                                $avenida = $reg_id['avenida'];
                                $calle = $reg_id['calle'];
                                $casa = $reg_id['casa'];
                                $piso = $reg_id['piso'];
                                $apto = $reg_id['apto'];
                                $punto_referencia = $reg_id['punto_referencia'];

                                $organismos_id = $reg_id['organismos_id'];
                                $cargos_id = $reg_id['cargos_id'];
                                $rango_categoria_id = $reg_id['rango_categoria_id'];
                                $grupo_guardia_id = $reg_id['grupo_guardia_id'];
                                $estatus_personal_id = $reg_id['estatus_personal_id'];
                                ?>
                               <!-- start accordion -->
                               <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                   <form class="form-horizontal form-label-left" action="" method="post" id="demo-form" data-parsley-validate>
                                       <!-- Seccion Uno -->
                                       <?php require 'form_registro_personal1.php'; ?>
                                       <!-- Fin Seccion Uno -->
                                       <!-- Seccion Dos -->
                                       <?php require 'form_registro_personal_estatus1.php'; ?>
                                       <!-- Fin Seccion Dos -->
                                       <!-- Seccion Tres -->
                                       <?php require 'form_registro_personal_direccion1.php'; ?>
                                       <!-- Fin Seccion Tres -->
                                       <!-- Seccion Cuatro -->
                                       <?php require 'form_registro_personal_laboral1.php'; ?>
                                       <!-- Fin Seccion Cuatro -->
                                   </form>
                                   <!-- Seccion Cinco -->
                                   <?php require 'form_registro_personal_pariente1.php'; ?>
                                   <!-- Fin Seccion Cinco -->
                                   <!-- Seccion Seis -->
                                   <?php require 'form_registro_personal_preguntas1.php' ?>
                                   <!-- Fin Seccion Seis -->
                                   <!-- Seccion Siete -->
                                   <?php require 'form_registro_personal_usuario1.php'; ?>
                                   <!-- Fin Seccion Siete -->
                               </div>
                               <!-- end of accordion -->

                           </div>
                       </div>
                   </div>
               </div>