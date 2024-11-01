<!--  //////////////////////////////////      MEMBRETE      ///////////////////////////////////////////////// -->
<!DOCTYPE html PUBLIC ?-//W3C//DTD XHTML 1.0 Transitional//EN? ?http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd?&gt;>
<html lang="es-español" xmlns=?http://www.w3.org/1999/xhtml?&gt;>
<link rel="shortcut icon" href="../images/911.ico">
   <head>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html"/>
      <meta http-equiv="X-AU-Compatible" content="IE=edge,chrome=1">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width" media="screen"/>
<!-- ****** ESTILOS PROPIOS ****** -->
    <link href="../css/Estilos.css" rel="stylesheet" media="screen"/>
    <link href="../css/estilo_agrega.css" rel="stylesheet" media="screen"/>
    <link href="../css/estilo_imagenes.css" rel="stylesheet" media="screen" />
     <link href="../css/estilo_menu.css" rel="stylesheet" media="screen" />
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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Select2 -->
<!--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet" type='text/css'>
<script src="../js/jquery-3.5.1-jquery.min.js"></script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../vendors/select2/dist/js/select2.min.js"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        -->

    <!-- libreria funciones de select -->
<!--    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
        <link href="../vendors/dselect-main/dist/css/dselect.min.css" rel="stylesheet">-->

        <!-- Latest -->
    <script href="../vendors/jquery-latest/query-latest.js"></script>
<!--     <script src="http://code.jquery.com/jquery-latest.js"></script>-->
         <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
<script>
    $(document).ready(function(){
    
        // evento que se ejecuta cuando se modifica el select
        $("select[name='motivo_solicitud_id']").change(function(){
        
            // Enviamos por post la peticion y esperamos la respuesta
            $.post("../controlador/info_select_motivo.php", {"seleccion":$(this).val()}, function(data){
                $("#error").html("");
                $("#respuesta1").html("");
                $("#respuesta2").html("");
                $("#respuesta3").html("");
                
                // dependiendo de la respuesta recibida por json, la mostramos
                if(data.respuesta1)
                    $("#respuesta1").html(data.respuesta1);
                if(data.respuesta2)
                    $("#respuesta2").html(data.respuesta2);
                    if(data.respuesta3)
                    $("#respuesta3").html(data.respuesta3);
                if(data.error)
                    $("#error").html(data.error);
            },"json");
        });
    });
    </script>


  <title>Libro Digital de Novedades 9-1-1</title>
   </head>
  <body class="nav-md">
  <style type="text/css">
    /****** Menù Panel Derecha ******/

a.cerrar{
width: 100%;  
}

.msn1{
  font-size: 18px;
  height: 50px;

}

        .ir-arriba {
  position: fixed;
  bottom: 4rem;
  right: 1rem;
  font-size: 3rem;
  color: #12afaf;
  text-decoration: none;
  z-index: 99999;
  line-height: 0;
/*  display: none;*/
  -webkit-transition: all .5s ease;
          transition: all .5s ease; }

.ir-arriba:hover,
.ir-arriba:focus {
  outline: 0;
  text-decoration: none;
  color: #fff; }


/* Mensajes en Formularios*/
    #respuesta1 {color:green;}

    #respuesta2 {font-weight:bold;}

    #respuesta3 {font-weight:bold;}

    #respuesta4 {color:yellow;}

    #error      {color:red;}


    a.open{
	background-color: #414141;
	border-radius: 5px;
	color: #fff;
	font-size: 1.5em;
	margin: 20px;
	padding: 10px 20px;
	position: absolute;
	text-decoration: none;
	text-shadow: 2px 2px 0px #000;
	

}


section.modalDialog{
	background-color: white;
	bottom: 0;
	top:0;
	left: 0;
	right: 0;
	position: fixed;
  display: none;
	z-index: 2;
}

section.modalDialog:target{
	display: block;
}

a.close{
	background-color: #414141;
	border-radius: 5px;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
	line-height: 22px;
	position: absolute;
	right: 5px;
	top:5px;
	text-align: center;
	text-decoration: none;
	width: 28px;
}

a.close{
	background-color: #000;
}

section.modal{
	background-color: #111;
	box-shadow: 0px 0px 10px #000;
	border-radius: 5px;
	color: #fff;
	margin: 10% auto;
	padding: 20px;
	position: relative;
	width: 400px;
}

h2{
	color: #fff;
	font-size: 2em;
	margin-bottom: 10px;
}

p{
	color: #303030;
	font-size: 1.2em;
}

textarea.protocolo01{
border: none;
overflow: scroll;
width: 100%;
height: 50%;
outline: none;
}

</style>