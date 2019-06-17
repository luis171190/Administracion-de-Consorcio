function validar(){

    var clave1;
    var clave2;
    

clave1=document.getElementById("clave1").value;
clave2=document.getElementById("clave2").value;


if(clave1!=clave2){
        alertify.alert("¡Atención!", "Las contraseñas no coinciden.");
        return false;
    }
    else{
        if(clave1.length<6){
              alertify.alert("¡Atención!", "La contraseña debe tener al menos 6 caracteres.");
        return false;
        }
    }
    
    
}