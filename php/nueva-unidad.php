<?php

require_once('conn/connect.php');
session_start();



$piso=$_POST["piso"];
$dpto=$_POST["dpto"];

$idtorre=$_POST["id_torre"];

$porcentaje=$_POST["porcentaje"];  
$tipo_unidad=$_POST["tipo_unidad"];

$consulta2="SELECT porcentaje_pago FROM unidad WHERE Torre_idTorre=$idtorre";
$resultado2=$connect->query($consulta2);
$sum=0;
while($fila2=mysqli_fetch_assoc($resultado2))
    
{
    
    $sum=$fila2['porcentaje_pago']+$sum;
}



if($sum+$porcentaje>100)
{
    
  echo'<script>
  alert("ERROR: Porcentaje mayor a 100%");
  window.history.back();
  </script>';  
}
else
{
$consulta = "INSERT INTO unidad(piso, departamento, porcentaje_pago, Torre_idTorre, tipo_unidad_idtipo_unidad)  VALUES($piso,'$dpto',$porcentaje,$idtorre,$tipo_unidad)";
$resultado=$connect->query($consulta);


header("Location:" . $_SERVER['HTTP_REFERER']);
}


//crear tabla consorcio_usario_administrador, necesito id de usario

?>