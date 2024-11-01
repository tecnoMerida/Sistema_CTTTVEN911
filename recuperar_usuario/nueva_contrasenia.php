<?php
extract($_REQUEST);


include_once '../config/conexion1.php';
$cedula = $_REQUEST['cedula'];

$consulta_usuario = "SELECT * FROM usuario WHERE personal_cedula = $cedula ";
$resultado_usuario = pg_query($dbconn, $consulta_usuario);
$result_usu = pg_fetch_array($resultado_usuario);



if (isset($_REQUEST['validar'])) {
    $cedula = $_REQUEST['cedula'];
    $id1 = $_REQUEST['id'];
    $usuario1 = $_REQUEST['usuario'];
    $r01 = sha1($_REQUEST['contrasena']);
    $r02 = sha1($_REQUEST['contrasena1']);
    $tipo_rol1 = $_REQUEST['tipo_rol'];
    $estado_usuario1 = 1;
    $fecha_creacion1 = $_REQUEST['fecha_creacion'];
    $preguntas_id1 = $_REQUEST['preguntas_id'];


    if (strcmp($r01, $r02) !== 0) {
        header("Location: nueva_contrasenia.php?cedula=$cedula&msg=1");
    } else {
        $consulta1 = "UPDATE public.usuario
        SET id=$id1, usuario='$usuario1', contrasena='$r02', tipo_rol_id=$tipo_rol1, estado_usuario_id=$estado_usuario1, personal_cedula=$cedula, fecha_creacion='$fecha_creacion1', preguntas_usuario_id=$preguntas_id1
        WHERE id = $id1 ";
        $resultado1 = pg_query($dbconn, $consulta1);


        if (pg_query($dbconn, $consulta1)) {
            //              header("Location: nueva_contrasenia.php?cedula=$cedula&msg=3");
?>
            <meta charset="utf-8">
            <script type="text/javascript">
                alert('Contraseña restablecida con EXITO!!!');
                location.href = "../index.php";
            </script>
<?php
        } else {
            header("Location: nueva_contrasenia.php?cedula=$cedula&msg=2");
        }
    }
}

$cedula11 = $_REQUEST['cedula_consultada'];

?>
<!DOCTYPE html>
<html lang="es-español">
<link rel="shortcut icon" href="../images/911.ico">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Libro Digital de Novedades 9-1-1 </title>
    <!-- Propios -->
    <link href="../css/estilo_imagenes.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

</head>

<body class="login">
    <style>
        .SLDN {
            width: 15%;
            height: 15%;
            /*border-image-outset: 20px;*/
            border-radius: 60%;
            z-index: 1;

        }

        #uptminicio {
            margin-top: 0;
            width: 40px;
            height: 50px;

            position: relative;
            top: 0;
        }

        .uptminicio {
            background-image: url("../images/uptm.png");
        }

        /*	LOGO MINISTERIO*/
        #gobinicio {
            /*    margin-top: 0;*/
            width: 150px;
            height: 40px;

            /*    position: relative; 
    top: 0;*/
        }

        .gobinicio {
            background-image: url("../images/Gobierno_bolivariano_venezuela.jpeg");
        }

        #copyright {
            margin: 1rem;
            padding: 1rem;
            text-align: center;

        }

        #contra_mensaje {
            float: center;
            margin-top: 200px;
            margin-bottom: -110px;
            z-index: 1;
        }
    </style>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="col-md-8 col-sm-8"></div>
        <div class="col-md-4 col-sm-4" id="contra_mensaje">
            <p>Contraseña: entre 6 y 16 dígitos</br>usando mayúsculas, minúsculas,</br>números y & % $ ! * + @ # </p>
        </div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">


                    <div class="" align="center">
                        <?php
                        if ($_GET['msg'] == "1") {
                            echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>La contraseña NO coinciden!!!</strong></div>';
                        }
                        if ($_GET['msg'] == "2") {
                            echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Contraseña NO restablecida!!!</strong></div>';
                        }
                        if ($_GET['msg'] == "3") {
                            echo '<div class="alert alert-primary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Contraseña restablicida con EXITO!!!</strong></div>';
                        }

                        echo $mensaje;
                        ?>
                    </div>
                    <form action="nueva_contrasenia.php" method="POST" data-parsley-validate>
                        <h1>Restablecer</h1>
                        <div>
                            <!-- //     Usuario   //  -->
                            <label class="label-align etiqueta">Usuario</label>
                            <div>
                                <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $result_usu['usuario']; ?>" placeholder="Usuario" minlength="6" maxlength="16" title='Este campo contiene el nombre de usuario del sistema "Libro Digital Novedades 911"' required readonly>
                            </div>
                        </div>
                        <div>
                            <div>
                                <!-- //     Pregunta de seguridad 02   //  -->
                                <label class="label-align etiqueta">Nueva contraseña</label>
                                <div>
                                    <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese nueva contraseña" minlength="6" maxlength="16" title="Llene este campo con la nueva contraseña, entre 6 y 16 dígitos usando mayúsculas, minúsculas, números y & % $ ! * + @ # " pattern="[A-Za-z0-9&%$!*+@#]{6,16}" required />
                                </div>
                            </div>
                            <div>
                                <!-- //     Pregunta de seguridad 02   //  -->
                                <label class="label-align etiqueta">Repita contraseña</label>
                                <div>
                                    <input type="text" name="contrasena1" id="contrasena1" class="form-control" placeholder="Repita nueva contraseña" minlength="6" maxlength="16" title="Llene este campo con la nueva contraseña, entre 6 y 16 dígitos usando mayúsculas, minúsculas, números y & % $ ! * + @ # " pattern="[A-Za-z0-9&%$!*+@#]{6,16}" required />
                                </div>
                            </div>

                            <input type="hidden" name="cedula" value="<?php echo $cedula; ?>">
                            <input type="hidden" name="id" value="<?php echo $result_usu['id']; ?>">
                            <input type="hidden" name="tipo_rol" value="<?php echo $result_usu['tipo_rol_id']; ?>">
                            <input type="hidden" name="estado_usuario" value="<?php echo $result_usu['estado_usuario_id']; ?>">
                            <input type="hidden" name="fecha_creacion" value="<?php echo $result_usu['fecha_creacion']; ?>">
                            <input type="hidden" name="preguntas_id" value="<?php echo $result_usu['preguntas_usuario_id']; ?>">
                            <div>
                                <button type="submit" class="btn btn-dark" name="validar" value="validar">VALIDAR</button>
                            </div></br>
                            <div>
              <a href="../index.php"><strong>SALIR</strong></a>
            </div>

                            <div class="clearfix"></div>

                            <div class="separator"></div>


                            <div class="clearfix"></div>
                            <br />
                    </form>
                </section>

            </div>
        </div>

        <div>
            <div><br /><br /><br /><br /><br /><br /></div>
            <div class="col-md-1 col-sm-1  "></div>
            <div class="col-md-10 col-sm-10  ">
                <img src="../images/Headers.png" class="bandera" id="bandera">
            </div>
            <div class="col-md-1 col-sm-1  "></div>

        </div>


        <div class="col-md-12 col-sm-12">
            <div id="copyright">
                <small><em><i class="fa fa-copyright"></i> copyright and copyleft 2021, bajo</em></small>
                <img id="gobinicio" class="gobinicio" src="../images/Gobierno_bolivariano_venezuela.jpeg" alt="" title="Ministerio del Poder Popular para las Relaciones Interiores, Justicia y Paz">
                <!--      <img id="uptmder22"  src="images/uptm.png" id="uptmder2" alt="" title="Logo Institucional UPTM">
    	<img id="gobinicio" class="gobinicio" alt="" title="Ministerio del Poder Popular para las Relaciones Interiores, Justicia y Paz">-->
                <img id="uptminicio" class="uptminicio" src="../images/uptm.png" id="uptmder2" alt="" title="Universidad Politécnica Territorial del Estado Mérida 'Klever Ramírez'">
            </div>
        </div>

        <div class="clearfix"></div>



    </div>

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

</body>

</html>