<?php
require_once('conn/connect.php');


$idusuario=$_POST['idusuario'];
$nombres=$_POST['nombre_p'];
$apellidos=$_POST['apellido_p'];
$correo = $_POST['email'];
$consulta = "UPDATE usuario SET nombres='$nombres', apellidos='$apellidos', correo = '$correo' WHERE id_usuario =$idusuario";


$resultado=$connect->query($consulta);

echo '
<script>
alert("Consorcista modificado");
location.href="http://localhost:8080/linuji/perfil-consorcista.php";
</script>
';

?>