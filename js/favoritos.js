function estrellaP(){
    var est = document.getElementById("estrellaFav");
    est.style.display='none';
    document.getElementById("cont-est").innerHTML="<span id=\"estrellaFav\" role=\"button\" style=\"font-size:20px; color: #FFD600\" class=\"glyphicon glyphicon-star\"></span>"
    
}

function estrellaD(){
    var est = document.getElementById("estrellaFav");
    est.style.display='none';
    document.getElementById("cont-est").innerHTML="<span id=\"estrellaFav\" role=\"button\" style=\"font-size:20px; color: grey\" class=\"glyphicon glyphicon-star-empty\"></span>"
    
}


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


/*function irFuncion(){
    $.ajax({
    // aqui va la ubicación de la página PHP
      url: 'agregar_favorito.php',
      type: 'POST',
      dataType: 'html',
      data: { condicion: "ejecutarFuncion"},
      success:function(resultado){
       // imprime "resultado Funcion"
       alert(resultado);
      }
  }*/