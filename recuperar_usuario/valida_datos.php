<?php
  include_once '../config/conexion1.php';
  ///////////////////      Realizar Busqueda Y CONSULTA del "BOTON CONSULTAR"       //////////////////////////////////
  
  if (isset($_REQUEST['validar'])) {
    $cedula = $_REQUEST['cedula'];
    $correo = strtoupper($_REQUEST['correo_electronico']);
  
    $consulta1 = "SELECT * FROM personal WHERE cedula = $cedula AND correo_electronico LIKE '%$correo%' ";  
    $resultado1 = pg_query($dbconn, $consulta1);
  
    $result = pg_num_rows($resultado1);
  
        if($result != 0 ){
            header("Location: valida_pregunta.php?cedula=$cedula");
        }else{
            header("Location: valida_datos.php?msg=1");
        }
  }
  
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

.uptminicio{
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

.gobinicio{
    background-image: url("../images/Gobierno_bolivariano_venezuela.jpeg");
}

#copyright {
  margin: 1rem;
  padding: 1rem;
  text-align: center;

}

  </style>
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">

          <div class="" align="center">
              <?php
              if ($_GET['msg'] == "1") {
                echo '<div class="alert alert-danger alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Alguno de los datos no coinciden</strong></div>';
              }
              if ($_GET['msg'] == "2") {
                echo '<div class="alert alert-primary alert-dismissible msn1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Datos usuario Validos!!!</strong></div>';
              }
                    
              ?>
            </div>
          <form action="valida_datos.php" method="POST" data-parsley-validate>
            <h1>Valida datos</h1>
            <div ><!-- //     procedimiento realizado de la novedad   //  -->
                 <label class="label-align etiqueta" >Cédula</label>
                          <div >
                            <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingrese número de cédula" minlength="7" maxlength="8" title="Llene este campo con el número de cédula, entre 7 y 8 dígitos" required pattern="[0-9]{7,8}" >
                          </div>
                        </div>
            <div>
            <div ><!-- //     procedimiento realizado de la novedad   //  -->
                 <label class="label-align etiqueta" >Email</label>
                          <div >
                          <input class="form-control email" type="email" id="email" name="correo_electronico" title="Llene este campo con la dirección de correo electrónico" placeholder="Ingrese correo electrónico" data-validate-linked="email" data-parsley-trigger="change" required />
                          </div>
                        </div>

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
	    <small ><em><i class="fa fa-copyright"></i> copyright and copyleft 2021, bajo</em></small>
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