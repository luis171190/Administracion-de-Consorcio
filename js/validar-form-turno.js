function validar(){
    
    
    var telefono;
    var dni;
    
    telefono=document.getElementById("telefono").value;
    dni=document.getElementById("dni").value;
    
    if(isNaN(telefono) || telefono.length>15){
        alertify.alert("Atención", "Ingrese un teléfono válido.");
         return false;
    }
    
    //subir a la pagina
    else if(isNaN(dni) || dni.length<7 || dni.length>8){
        alertify.alert("Atención","Ingrese un DNI válido.");
         return false;
    
    }
    
    
}