<?php
require_once('conn/connect.php');


$idpropietario=$_POST['idpropietario'];
$nombres=$_POST['nombre_p'];
$apellidos=$_POST['apellido_p'];
$dni=$_POST['dni_p'];
$email=$_POST['email_p'];
$telefono=$_POST['tel_p'];
$fecha_nac=$_POST['fn_p'];
$domicilio=$_POST['dom_p'];


$consulta = "UPDATE propietario SET nombres='$nombres', apellidos='$apellidos', dni=$dni, mail = '$email', telefono= $telefono, fecha_nac='$fecha_nac', domicilio='$domicilio' WHERE idpropietario =$idpropietario";


$resultado=$connect->query($consulta);

echo '
<script>
alert("Propietario modificado");
  window.history.back();
window.history.back();
</script>
';

?>