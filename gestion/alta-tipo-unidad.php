<?php

session_start();
require_once('../php/conn/connect.php');

$descripcion = $_POST["descripcion"];

$consulta = "INSERT INTO tipo_unidad (descripcion)  VALUES('$descripcion')";
$resultado = $connect->query($consulta);
if ($resultado > 0 )
echo 'Tipo de unidad agregado';
else
    echo 'ERROR';
   
        


?>