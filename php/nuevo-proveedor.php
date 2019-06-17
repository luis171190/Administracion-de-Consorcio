<?php
require_once('conn/connect.php');
$id_consorcio=$_POST['idconsorcio'];

    $rz=$_POST['razon_social'];
    $cuit=$_POST['cuit'];
    $domicilio=$_POST['domicilio'];
    $tel=$_POST['telefono'];      
    $domicilio=$_POST['domicilio'];
    $email=$_POST['mail'];
    $falta=$_POST['fecha_alta'];
    


   $consulta = "INSERT INTO proveedor (cuit,razon_soc_prov, domicilio_prov, email_prov, tel_prov, fecha_alta, consorcio_idconsorcio)  VALUES($cuit, '$rz','$domicilio', '$email','$tel','$falta', $id_consorcio)";


$resultado=$connect->query($consulta);

echo '<script>
       
    alert("Proveedor registrado con exito.");
    location.href="http://localhost:8080/linuji/proveedores.php";
      
      </script>';




?>