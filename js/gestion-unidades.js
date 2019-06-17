function guardarUnidad(){
    
     var piso=$('#piso').val();
    var departamento = $('#dpto').val();
    var porcentaje = $('#porcentaje').val();
    var torre_id = $('#id_torre').val();
    var tipo_unidad= $('#tipo_unidad').val();
    
    
  
    
   
    $.ajax({
    type: 'POST', 
    url: 'php/nueva-unidad.php',
    data:{razon_soc:raz_soc, cuit:cuit, provincia:provincia, localidad:localidad, calle:calle, nro_calle:nro_calle},
    success: function(resp){
        if(resp!=""){
           
            $('#resultados').html(resp);
        }
     
        
    }
})
    
         
  
    
}
    function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
muestra_oculta('datos_prop');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}


function Confirmar() {
//Ingresamos un mensaje a mostrar
if (confirm('¿Desea eliminar la unidad?')){     
       document.getElementById("form_unidad").submit(); 
    }
    else
        alert("Operacion cancelada");
}


  function abrir(url){
        open(url,"",'top=300, left=300, width=850, height=600');    
        }


         
 

/*$(function(){
 
$('#form_unidades').submit(function(e){
    e.preventDefault();
})  

$('#search').keyup(function(){
 var envio = $('#search').val();    
$('#resultados').html('<h2><img src="img/loading.gif"  width=" 30"  alt="" /> Cargando </h2>')

$.ajax({
    type: 'POST', 
    url: 'php/buscador_prop.php',
    data:('search='+envio),
    success: function(resp){
        if(resp!=""){
            $('#resultados').html(resp);
        }
    }
})
    
})

})*/
