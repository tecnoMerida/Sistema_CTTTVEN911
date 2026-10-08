/*******************************	Inicio Funcion Estado 		************************************/
$(document).ready(function(){

	$("#cboEstado").change(function(){

		if($('#cboEstado option:selected').val() == "-1"){

			$('#cboMunicipio').find('option').remove().end().append('<option value="">Seleccione Municipio</option>').val('-1');

		} else {

			$.ajax({

			url:'../controlador/combo.php',

			type:'POST',

			cache: false,

			data: {action:'consultar', id:$('#cboEstado option:selected').val()}

			}).done(function(response){

				$("#cboMunicipio").html(response);

			});

		}

	});

});

/*******************************	Fin Funcion Estado 		************************************/
/***************************	Inicio Funcion Municipio 		************************************/
$(document).ready(function(){

	$("#cboMunicipio").change(function(){

		if($('#cboMunicipio option:selected').val() == "-1"){

			$('#cboParroquia').find('option').remove().end().append('<option value="">Seleccione Parroquia</option>').val('-1');

		} else {

			$.ajax({

			url:'../controlador/combo.php',

			type:'POST',

			cache: false,

			data: {action:'consultar', id:$('#cboMunicipio option:selected').val()}

			}).done(function(response){

				$("#cboParroquia").html(response);

			});

		}

	});

});
/*****************************	Fin Funcion Municipio 		************************************/

/***************************	Inicio Funcion Parroquia		************************************/
                /*$(document).ready(function(){
                $("#cboParroquia").change(function () {
                                $("#cboParroquia option:selected").each(function () {
                                        elegido=$(this).val();
                                        $.post("../controlador/Sectores.php", { elegido: elegido }, function(data){
                                                $("#cboSectores").html(data);

                                              });
                                      });
                              })
              });*/
/*****************************	Fin Funcion Parroquia 		************************************/
/***************************	Inicio Funcion Parroquias - Sectores - Cuadrantes		************************************/

$(document).ready(function(){
	$("#cboParroquia").change(function () {
	 $("#cboParroquia option:selected").each(function () {
	 elegido=$(this).val();
	 $.post("../controlador/Sectores.php", { elegido: elegido }, function(data){
	   $("#cboSectores").html(data);

	   $("#cboSectores").change(function () {
		 $("#cboSectores option:selected").each(function () {
			cboSectores = $(this).val();
		   $.post("../controlador/Cuadrantes.php", { elegido: cboSectores }, function(data){
			 $("#cboCuadrantes").html(data);
			 
		   });     
		 });
		})
	 });     
	   });
  })
});
/*****************************	Fin Funcion Parroquias - Sectores - Cuadrantes 		************************************/

/**********************	Inicio Funcion Parroquias - Sectores - Cuadrantes	"Cierre Guardia"	************************/

$(document).ready(function(){
/*	$("#cboParroquia").change(function () {
	 $("#cboParroquia option:selected").each(function () {
	 elegido=$(this).val();
	 $.post("../controlador/Sectores.php", { elegido: elegido }, function(data){
	   $("#cboSectores").html(data);*/

	   $("#cboSectores").change(function () {
		 $("#cboSectores option:selected").each(function () {
			cboSectores = $(this).val();
		   $.post("../controlador/Cuadrantes.php", { elegido: cboSectores }, function(data){
			 $("#cboCuadrantes").html(data);

			 $("#cboSectores option:selected").each(function () {
				cboSectores = $(this).val();
			   $.post("../controlador/Organismo.php", { elegido: cboSectores }, function(data){
				 $("#cboOrganismo").html(data);
				 
			   });     
			 });

		   });     
		 });
		})
	 });     
/*	   });
  })
});*/
/**********************	Fin Funcion Parroquias - Sectores - Cuadrantes 	"Cierre Guardia"	************************/