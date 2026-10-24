<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Filtro por select - Lista desplegable</title>
<style>
.cb{
display: none; /* Por defecto */
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php
// Conexion a la base de datos
      include_once 'config/conexion1.php';
?>
<body>
<style>
/* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

/* The search field */
#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

/* The search field when it gets focus/clicked on */
#myInput:focus {outline: 3px solid #ddd;}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  border: 1px solid #ddd;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

</style>



<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <?php
  // Creación y/o formación de la consulta.
  $result3 = pg_query($dbconn, "SELECT parroquias.id, parroquias.nombre_parroquia, municipios.id, municipios.nombre_municipio, estados.id, estados.nombre_estado FROM public.parroquias INNER JOIN public.municipios ON parroquias.municipios_id = municipios.id
	INNER JOIN public.estados ON municipios.estados_id = estados.id
   WHERE estados.id = 14 ");

if (!$result3) {
    echo "Ocurrió un error.\n";
    exit;
  }
  
//  $registroUbicacion = pg_fetch_array($result3);
while ($registro45 = pg_fetch_array($result3)) {
                                ?>

<a name="id" value="<?php echo $registro45[0] ?>" href="#<?php echo $registro45[0] ?>"><?php echo strtoupper($registro45[1]).", ".strtoupper($registro45[3]).", ".strtoupper($registro45[5]); ?></a>

<?php
}
?>

  </div>
</div>
<br><br><br><br><br>
<div id="barra-de-busqueda">
  <h1>¿Qué deseas encontrar?</h1>
  <select name="busqueda" id="busqueda">
    <option value="0">Filtrar</option>
     <option value="China">China</option>
     <option value="USA">USA</option>
     <option value="UKA">UKA</option>
  </select>
</div>

<section id="tabla_resultado">

</section>

<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "<?php echo $registro45['parroquias.id'] ?>";
    } else {
      a[i].style.display = "none";
    }
  }
}

// Funcion para hacer llamado a documento de PHP con los nombres de sectores
// https://www.youtube.com/watch?v=HygD-gDQiTI
$(document).ready(function(){

$.ajax({

url:'controlador/Sectores.php',

type:'GET',

cache: false,

data: {action:'', id:$('option:selected').val()}

}).done(function(response){

  $("#myInput").html(response);

});

});


// Codigo para nuevo campo
$(obtener_registros());

function obtener_registros(alumnos)
{
    $.ajax({
        url : 'controlador/getcoce.php',
        type : 'POST',
        dataType : 'html',
        data : { alumnos: alumnos },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('change', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});


</script>
</body>
</html>
