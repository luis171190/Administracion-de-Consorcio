<?php
require_once('conn/connect.php');
$id_consorcio=$_POST['id_consorcio'];

$nombre=$_POST['nombre_torre'];
$cant_pisos=$_POST['cant_pisos'];
$cant_unidades=$_POST['cant_unidades'];

$consulta = "INSERT INTO torre(nombre_torre, cantidad_pisos,  consorcio_idconsorcio)  VALUES('$nombre',$cant_pisos,$id_consorcio)";
$resultado=$connect->query($consulta);
//location.href="http://localhost:8080/linuji/gestion-torres.php";
echo '
<script>
//location.href="http://localhost:8080/linuji/gestion-torres.php";
$("body").removeClass("modal-open");
$(".modal-backdrop").remove();
cambiar();
</script>
';
?>