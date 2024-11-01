
function(){

var input = document.getElementById('usuario_acceso');
input.oninvalid = function(event) {
    event.target.setCustomValidity('intenta probar desbloqueando Mayús');
}



var input = document.getElementById('usuario_acceso');
var form  = document.getElementById('form');
var elem               = document.createElement('div');
    elem.id            = 'notify';
    elem.style.display = 'none';
    form.appendChild(elem);
    
    input.addEventListener('input', function(event){
    if ( 'block' === elem.style.display ) {
        input.className = '';
        elem.style.display = 'none';
    }
});

}

$(function(){
// *******************************
// FORMULARIO REGISTRO DE PERSONAL
// *******************************
//Para escribir solo numeros en campo cedula
  $('#cedula').validCampoFranz('0123456789');
  //Para escribir solo letras en campo primer nombre
  $('#p_nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
    //Para escribir solo letras en campo primer nombre
  $('#s_nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
    //Para escribir solo letras en campo primer nombre
  $('#p_apellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
    //Para escribir solo letras en campo primer nombre
  $('#s_apelllido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
  //Para escribir solo numeros    
//  $('#cedula').validCampoFranz('0123456789'); 
});