//evitar envio con enter
$(function(){
 
$('#search_form').submit(function(e){
    e.preventDefault();
})  

$('#search').keyup(function(){
 var envio = $('#search').val();    
$('#resultados').html('<h2><img src="img/loading.gif"  width=" 30"  alt="" /> Cargando </h2>')

$.ajax({
    type: 'POST', 
    url: 'php/buscador_usuarios.php',
    data:('search='+envio),
    success: function(resp){
        if(resp!=""){
            $('#resultados').html(resp);
        }
    }
})
    
})

})