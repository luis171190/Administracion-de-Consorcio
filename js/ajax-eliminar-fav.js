//evitar envio con enter


function eliminarFav(){
    
//var envio = $(".btneliminar").data("id");    

    //$(this).data("id")
 //var envio = $('input[name="idProfElim"]').val();  
//alert(envio);

    alertify.alert("Favorito eliminado");
    
/*$.ajax({
    type: 'POST', 
    url: 'eliminar_fav_lista.php',
    data:('id_profesional='+envio),
    success: function(resp){
        if(resp!=""){
            $('#resultados2').html(resp);
        }
    }
})
    */

}



