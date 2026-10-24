$(document).ready(function(){

			$.ajax({

			url:'../controlador/grado_instruccion.php',

			type:'GET',

			cache: false,

			data: {action:'', id:$('option:selected').val()}

			}).done(function(response){

				$("#grado_instruccion").html(response);

			});

});