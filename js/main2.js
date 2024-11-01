function init(){

    var notas2 = document.getElementById("sec_textos2");
    notas2.style.display = "none";
    
    var notas3 = document.getElementById("sec_textos3");
    notas3.style.display = "none";
    
    var notas4 = document.getElementById("sec_textos4");
    notas4.style.display = "none";

    var notas4 = document.getElementById("sec_textos5");
    notas4.style.display = "none";

    var notas4 = document.getElementById("sec_textos6");
    notas4.style.display = "none";

    var notas4 = document.getElementById("sec_textos7");
    notas4.style.display = "none";

}


function cambio(ref){
    ocultar();
    var elemento = document.getElementById(ref);
    elemento.style.display = "block";
    
    if(ref == "sec_mapa"){
        google.maps.event.trigger(map, "resize");
    }
}

function ocultar(){
    
    var notas = document.getElementById("sec_textos");
    notas.style.display = "none";

    var notas2 = document.getElementById("sec_textos2");
    notas2.style.display = "none";

    var notas3 = document.getElementById("sec_textos3");
    notas3.style.display = "none";

    var notas4 = document.getElementById("sec_textos4");
    notas4.style.display = "none";

    var notas4 = document.getElementById("sec_textos5");
    notas4.style.display = "none";

    var notas4 = document.getElementById("sec_textos6");
    notas4.style.display = "none";

    var notas4 = document.getElementById("sec_textos7");
    notas4.style.display = "none";
    
}
