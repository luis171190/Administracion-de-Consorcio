<?php
require_once('conn/connect.php');

    $idunidad=$_GET['id_unidad'];
    $consulta="DELETE FROM unidad WHERE idunidad=$idunidad";

    $resultado=$connect->query($consulta);


header("Location:" . $_SERVER['HTTP_REFERER']);

    
    
?>