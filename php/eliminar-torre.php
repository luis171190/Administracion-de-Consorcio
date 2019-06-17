<?php
require_once('conn/connect.php');

    $id_torre=$_GET['id_torre'];
    $consulta="DELETE FROM torre WHERE idtorre=$id_torre";
    $resultado=$connect->query($consulta);

echo '
<script>
alert("Torre eliminada");
location.href="http://localhost:8080/linuji/gestion-torres.php";

</script>
';
    
  
    
?>