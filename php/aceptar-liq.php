<?php

require_once('conn/connect.php');

session_start();
$idliquidacion=$_POST['idliquidacion233'];
$periodo_liquidado=$_POST['periodo'];
$id_consorcio = $_POST['id_consorcio'];


$consulta="UPDATE liquidacion SET estado_liq='confirmado' WHERE idliquidacion=$idliquidacion";

$resultado=$connect->query($consulta);


//FUNCION PARA ENVIAR MAILS

$consulta2 = " SELECT * FROM  usuario_consorcio INNER JOIN usuario  INNER JOIN consorcio ON usuario_id_usuario = id_usuario AND consorcio_idconsorcio =  idconsorcio AND consorcio_idconsorcio = $id_consorcio AND privilegio = 0";


$resultado2 = $connect->query($consulta2);
while ($fila2 = mysqli_fetch_assoc($resultado2))
    {   
        $consorcio_nombre  = $fila2 ['razon_social'];
        $nombre_usuario    = $fila2['nombre_usuario'];
        $nombre            = $fila2['nombres'];
        $apellidos         = $fila2['apellidos'];
        $destino           = $fila2['correo'];
        $email             = 'luis.03.06.2@gmail.com';
        $asunto            = 'LIQUIDACION DE EXPENSAS '. 'CONSORCIO: '.$consorcio_nombre . ' PERIODO: '. $periodo_liquidado . ' - DISPONIBLE.';
        $comentario        = 'Sr/a. '.$apellidos. ' '. $nombre. ' se informa que se encuentra disponible la liquidaciòn de expensas del Consorcio '.$consorcio_nombre.' correspondiente al período '.$periodo_liquidado. ' .Se envía un resumen del mismo: ';  
    

        $unidad_usuario = $fila2['unidad_idunidad'];
        $consulta3= "SELECT * FROM liquidacion_unidad INNER JOIN unidad ON  unidad_idunidad = idunidad WHERE liquidacion_idliquidacion = $idliquidacion AND unidad_idunidad = $unidad_usuario";
        $resultado3 = $connect->query($consulta3);
        $fila3     = mysqli_fetch_assoc($resultado3);
        $unidad    = $fila3['piso'].' '. $fila3['departamento'];
        $monto_ord = $fila3['subtotal_ord'];
        $monto_ext = $fila3 ['subtotal_ext'];
        $total_pagar = $monto_ext + $monto_ord;
   
        $contenido ="\t\n" . $comentario ."\t\n\nConsorcio: " . $consorcio_nombre . "\t\n\nPeriodo Liquidado: " . $periodo_liquidado . "\t\n\nEmail de Destino: " . $destino .  "\t\n\nDatos de  la Unidad:\t\n\nUnidad: " . $unidad . "\t\n\nMonto Expensas Ordinarias: $" . $monto_ord . "\t\n\nMonto Expensas Extraordinarias: $" . $monto_ext. "\t\n\nTOTAL A PAGAR: $" . $total_pagar. "\t\n\nPara realizar el pago por internet y para màs informaciòn por favor acceda a nuestro sitio web www.aconline.com.ar con su cuenta de usuario. Atte.";
        mail($destino,$asunto,$contenido, "From: luis.03.06.2@gmail.com\nReply-To:".$email);
        //header("Location:index.html");
     
    
    
    }


echo '<script>
//alert("Liquidacion confirmada.");
location.href ="http://localhost:8080/linuji/expensas.php";

</script>';


?>