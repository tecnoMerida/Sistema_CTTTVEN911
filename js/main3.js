//referencias al canvas y a su contexto
var canvas, context;
var pastPosX=0;
var pastPosY = 200;
var paso=10;

function init(){
    var grafica = document.getElementById("sec_grafica");
    grafica.style.display = "none";
    
    var mapa = document.getElementById("sec_mapa");
    mapa.style.display = "none";
    
    creaGrafica();
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
    
    var textos = document.getElementById("sec_textos");
    textos.style.display = "none";
    
    var grafica = document.getElementById("sec_grafica");
    grafica.style.display = "none";
    
    var mapa = document.getElementById("sec_mapa");
    mapa.style.display = "none";
    
}


function creaGrafica(){
    canvas = document.getElementById("grafica");
    if(canvas.getContext){
        context = canvas.getContext("2d");
        dibujaGrafica();
    }else{
        alert("En tu navegador no funciona");
    }
}


function dibujaGrafica(){
    var valor = Math.round(200*Math.random());
    context.beginPath();
    var newPosX = pastPosX + paso;
    var newPosY = 200-valor;
    context.moveTo(pastPosX, pastPosY);
    context.strokeStyle = "#ff0000";
    context.lineWidth = 1;
    context.lineTo(newPosX, newPosY);
    context.stroke();
    
    pastPosX = newPosX;
    pastPosY = newPosY;
    
    if(newPosX > 350){
        pastPosX = 0;
        context.clearRect(0, 0, canvas.width, canvas.height);
    }
    
    setTimeout("dibujaGrafica()", 500);
}






var map;
function initialize() {
    var myLatlng = new google.maps.LatLng(42.5827664,-5.5992698);

  var mapOptions = {
    zoom: 11,
    center: new google.maps.LatLng(42.5827664,-5.5992698)
  };
  map = new google.maps.Map(document.getElementById('mapa'),
      mapOptions);
    
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'León'
  });

}

google.maps.event.addDomListener(window, 'load', initialize);






