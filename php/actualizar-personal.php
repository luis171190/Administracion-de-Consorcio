<?php
require_once('conn/connect.php');


$idpersonal=$_POST['idpersonal'];
$nom=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
    $tel=$_POST['telefono'];      
    $domicilio=$_POST['domicilio'];
    $puesto=$_POST['puesto'];
    $fi=$_POST['fecha_inicio'];
    $ff=$_POST['fecha_fin'];



$consulta = "UPDATE personal SET nombre_per='$nom', apellido_per='$apellido', dni_per=$dni , tel_per='$tel', domicilio_per='$domicilio', desc_puesto='$puesto', fecha_inicio='$fi', fecha_fin='$ff' WHERE idpersonal =$idpersonal";
echo $consulta;
$resultado=$connect->query($consulta);

echo '
<script>
alert("Personal modificado");
location.href ="http://localhost:8080/linuji/personal.php";
</script>
';

?>