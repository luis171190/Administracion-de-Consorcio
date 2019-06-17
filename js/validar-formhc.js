function validars(){
   
var dni;
var tel;
    

dni=document.getElementById("dni").value;
tel=document.getElementById("telefono").value;

     
 if(isNaN(tel) || tel.length>20){
        alert("¡Atención Ingrese un teléfono válido.");
         return false;
    }
     else if(isNaN(dni) || dni.length<7 || dni.length>8 ){
        alert("Atención Ingrese un DNI válido.");
         return false;
    
    }
   

    
    
}