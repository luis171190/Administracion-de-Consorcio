<?php
require_once('conn/connect.php');

    $idconsorcio=$_POST['id_consorcio'];
    $consulta="DELETE FROM consorcio WHERE idconsorcio=$idconsorcio";
//echo $consulta;
    $resultado=$connect->query($consulta);

header("Location:" . $_SERVER['HTTP_REFERER']);
    
  
    
?>