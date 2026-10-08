

var inputs = document.getElementsByClassName("formulario_input");
for (var i = 0; i < inputs.length; i++){
inputs[i].addEventListener("keyup", function(){
	if(this.value.length>=1){

		this.nextElementSibling.classList.add("fijar");

	}else{

		this.nextElementSibling.classList.remove("fijar");

	}
});

}
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
   function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 0123456789.";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
  function aMayusculas(obj,id){
    obj = obj.toUpperCase();
    document.getElementById(id).value = obj;
}


$(document).ready(function(){
     $("#Estado").change(function () {
   		$("#Estado option:selected").each(function () {
			elegido=$(this).val();
			$.post("Municipios.php", { elegido: elegido }, function(data){
				$("#Municipio").html(data);
				$("#Municipio").change(function () {
					$("#Municipio option:selected").each(function () {
						Municipio = $(this).val();
						$.post("Parroquias.php", { elegido: Municipio }, function(data){
							$("#Parroquia").html(data);
							$("#Parroquia").change(function () {
								$("#Parroquia option:selected").each(function () {
									Parroquia = $(this).val();
										$.post("Prefectos.php", { elegido: Parroquia }, function(data){
											$("#Prefecto").html(data);												
													$("#Parroquia option:selected").each(function () {
														Parroquia = $(this).val();
															$.post("Decreto.php", { elegido: Parroquia }, function(data){
																$("#Decreto").html(data);
																	$("#Parroquia option:selected").each(function () {
																		Parroquia = $(this).val();
																			$.post("Gaceta.php", { elegido: Parroquia }, function(data){
																				$("#Gaceta").html(data);
																});			
															});
						  								 })
													});			
												});
						  					 })
										});			
								});
						   })
							
						});			
					});
			   })
			});			
        });