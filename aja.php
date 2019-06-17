<?php
require_once('php/conn/connect.php');
session_start();

$idliquidacion=$_GET['idliquidacion'];
$mes=$_GET['mes'];
$anio=$_GET['anio'];
$id_consorcio=$_GET['idconsorcio'];



$consulta3= "SELECT * FROM egreso WHERE month (fecha_egreso)=$mes AND year (fecha_egreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado3=$connect->query($consulta3);
$monto_e=0;
while($fila3=mysqli_fetch_assoc($resultado3))
{
    
    $fila_monto=$fila3['monto_egreso'];
    $monto_e=$fila_monto+$monto_e;
    $desc_egreso=$fila3['descripcion_egreso'];
    $monto_egreso=$fila3['monto_egreso'];
    echo '<br>';
echo $desc_egreso .' :Monto: '.$monto_egreso;  
    
    
}
//echo " <br> TOTAL EGRESOS: ".$monto_e;


       
   //INGRESOS     

$consulta4= "SELECT * FROM ingreso WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado4=$connect->query($consulta4);
$monto_i=0;
while($fila4=mysqli_fetch_assoc($resultado4))
{
    
    $fila_monto1=$fila4['monto'];
    $monto_i=$fila_monto1+$monto_i;
     $desc_ingreso=$fila4['descripcion'];
    $monto_ingreso=$fila4['monto'];
    echo '<br>';
//echo $desc_ingreso .' :Monto: '.$monto_ingreso; 
    
    
}
//echo " <br>INGRESOS: ".$monto_i;
$total_liq=$monto_e-$monto_i;
//echo "<br>TOTAL LIQUDIACION: $".$total_liq;
//echo "<br>";

//DATOS DE LIQUIDACION_UNIDAD

$consulta8="SELECT * FROM liquidacion_unidad  INNER JOIN unidad ON liquidacion_idliquidacion=$idliquidacion AND unidad_idunidad=idunidad";
$resultado8=$connect->query($consulta8);
while($fila8=mysqli_fetch_assoc($resultado8))
{
   $idunidad=$fila8['idunidad'];
    $unidad=$fila8['piso'].' -'.$fila8['departamento'] ;
    $subtotal=$fila8['subtotal_ord'];
    
    
    //echo $unidad .' Monto: $ '. $subtotal;;
    //echo "<br>";
    
    
}
?>
  