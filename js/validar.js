function validar(){
   
    var nombre;
    var apellidos;
    var email;
    var usuario;
    var telefono;
    var clave;
    var clave2;
    var expresion;
  
    
nombre = document.getElementById("nombre").value;
apellidos=document.getElementById("apellidos").value;
telefono=document.getElementById("telefono").value;
email=document.getElementById("email").value;
usuario=document.getElementById("usuario").value;
clave=document.getElementById("clave").value;
clave2=document.getElementById("clave2").value;
expresion=/\w+@+\w+\.+[a-z]/;


     

    if(nombre.length >30){
        alertify.alert("¡Atención!", "Ingrese un nombre mas corto.");
        return false;
    }
    else if(apellidos.length>40){
        alertify.alert("¡Atención!", "Ingrese  apellidos mas cortos.");
        return false;
    }
    else  if(usuario.length>15){
        alertify.alert("¡Atención!", "Ingrese un usuario mas corto.");
         return false;
    }
    else  if(isNaN(telefono) || telefono.length>15){
        alertify.alert("¡Atención!", "Ingrese un teléfono válido.");
         return false;
    }
       else  if(email.length>50){
        alertify.alert("¡Atención!", "Ingrese un email mas corto.");
         return false;
       }
       else  if(!expresion.test(email)){
        alertify.alert("¡Atención!", "Ingrese un email válido.");
         return false;
       }
    else if(clave!=clave2){
        alertify.alert("¡Atención!", "Las contraseñas no coinciden.");
        return false;
    }
    else{
        if(clave.length<6){
              alertify.alert("¡Atención!", "La contraseña debe tener al menos 6 caracteres.");
        return false;
        }
    }
    
    
}