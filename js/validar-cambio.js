function validar(){
    var telefono;
    
    telefono=$('input[name="telefono"]').val();
    
    if(isNaN(telefono) || telefono.length>15){
       alertify.alert("¡Atención!", "Ingrese un teléfono válido.");
         return false;
    }
    
    
}