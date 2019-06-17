<?php

    $destino = "luis.03.06.2@gmail.com";

    $nombre = 'luis';
    $apellido ='molina';
    $telefono ='telf';
    $email ='luis.03.06.2@gmail.com';
    
    $provincia= 'tucuman';
    $pais = 'arg';
    $asunto = 'ASUNTO DE PRUEBA';
    $comentario = 'SIN COMENTARIOS';

   /* echo $nombre;
    echo $fechaIngreso;
    echo $asunto;*/

   
        $titulo = "Consulta"; 
    
        $fechaIngreso ='fecha ingreso';
        $fechaSalida = 'fecha salida';
        
    

   $contenido = "\nNombre: " . $nombre .  "\t\n\nApellido: " . $apellido . "\t\n\nTelefono: " . $telefono . "\t\n\nEmail: " . $email . "\t\n\nProvincia/Estado: " . $provincia . "\t\n\nPaís: " . $pais . "\t\n\nComentario:" . "\n\n\t\t\t" . $comentario;
    mail($destino,$titulo,$contenido, "From: luis.03.06.2@gmail.com\nReply-To:".$email);
    //header("Location:index.html");
echo 'mail enviado';

?>


