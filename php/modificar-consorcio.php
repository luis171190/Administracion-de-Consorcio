<?php
require_once('conn/connect.php');


$idconsorcio =$_POST['idconsorcio'];
$raz_soc = $_POST['raz_soc'];
$cuit = $_POST['cuit'];
$prov = utf8_decode(  $_POST['provincia']);
$localidad = utf8_decode($_POST['localidad']);
$calle = utf8_decode($_POST['calle']);
$nro_calle= $_POST['nrocalle'];



$consulta = "UPDATE consorcio SET cuit=$cuit, provincia ='$prov', localidad = '$localidad', calle= '$calle', nro_calle= $nro_calle WHERE idconsorcio = $idconsorcio";


$resultado=$connect->query($consulta);
//echo $consulta;
if($resultado == true)
{
echo '
<script>
alert("Consorcio modificado");
location.href=http://localhost:8080/linuji/gestion-consorcio.php
</script>
';
}
else
    echo 'ERROR';
?>