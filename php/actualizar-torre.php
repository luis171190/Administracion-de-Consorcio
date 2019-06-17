<?php
require_once('conn/connect.php');


$idtorre = $_POST['idtorre'];   
$nombre=$_POST['nombre_torre'];
$cant_pisos=$_POST['pisos'];


$consulta = "UPDATE torre SET nombre_torre='$nombre', cantidad_pisos='$cant_pisos' WHERE idtorre =$idtorre";

$resultado=$connect->query($consulta);
//echo $consulta;
echo '
<script>
alert("Torre modificada");
location.href ="http://localhost:8080/linuji/gestion-torres.php";
</script>
';

?>