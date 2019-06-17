<?php

session_start();
require_once('../php/conn/connect.php');

$descripcion = $_POST["descripcion_par"];
$porc = $_POST["porc"];

$consulta = "INSERT INTO parametros (descripcion_par, porcentaje)  VALUES('$descripcion',$porc)";
$resultado = $connect->query($consulta);
if ($resultado > 0 )
echo 'Parametro agregado';
else
    echo 'ERROR';
   
        


?>