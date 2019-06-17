<?php
require_once('conn/connect.php');


$idanuncio=$_POST['idanuncio'];
$titulo=utf8_decode($_POST['titulo']);
$fecha=$_POST['fecha_anuncio'];
$contenido=utf8_decode($_POST['contenido']);



$consulta = "UPDATE anuncio SET titulo='$titulo', contenido='$contenido' , fecha_creacion='$fecha' WHERE idanuncio =$idanuncio";

$resultado=$connect->query($consulta);

echo '
<script>
alert("Anuncio modificado");
location.href ="http://localhost:8080/linuji/anuncios.php";
</script>
';

?>