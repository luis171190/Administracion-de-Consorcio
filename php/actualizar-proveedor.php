<?php
require_once('conn/connect.php');


$idproveedor=$_POST['idproveedor'];
 $rz=$_POST['razon_social'];
    $cuit=$_POST['cuit'];
    $domicilio=$_POST['domicilio'];
    $tel=$_POST['telefono'];      
    $domicilio=$_POST['domicilio'];
    $email=$_POST['mail'];
    $falta=$_POST['fecha_alta'];
    



$consulta = "UPDATE proveedor SET cuit=$cuit, razon_soc_prov='$rz', domicilio_prov='$domicilio' , email_prov='$email', tel_prov='$tel', fecha_alta='$falta' WHERE idproveedor =$idproveedor";

$resultado=$connect->query($consulta);

echo '
<script>
alert("Proveedor modificado");
location.href ="http://localhost:8080/linuji/proveedores.php";
</script>
';

?>