<?php
require_once('conn/connect.php');



$titulo=utf8_decode($_POST['titulo']);
$fecha=$_POST['fecha_anuncio'];
$contenido=utf8_decode($_POST['contenido']);
$idconsorcio=$_POST['id_consorcio'];


$consulta3="INSERT INTO anuncio (titulo, contenido, fecha_creacion, consorcio_idconsorcio) VALUES ('$titulo', '$contenido','$fecha',$idconsorcio) ";
$resultado3=$connect->query($consulta3);



echo '
<script>
alert("Anuncio agregado");
location.href="http://localhost:8080/linuji/anuncios.php";
</script>
';



?>