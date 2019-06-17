<?php

require_once('conn/connect.php');
require_once('../RPT-comprobante-pago.php');
session_start();


$idliquidacion_unidad = $_POST['idliquidacion_unidad'];
$fecha_pago = $_POST['fecha_pago'];
$monto_interes = $_POST['intereses'];
$monto_total =$_POST['monto_ci'];
$tipo_pago = $_POST['tipo_pago'];
$consulta = "UPDATE pago_liquidacion SET fecha_pago = '$fecha_pago' , monto_interes = $monto_interes , monto_total = $monto_total , estado = 1, tipo_pago = '$tipo_pago' WHERE liquidacion_unidad_idliquidacion_unidad = $idliquidacion_unidad";

$resultado = $connect->query($consulta);
$cp = new ComprobantePago();
$cp->GenerarComprobante($connect);
//echo $consulta;
if($resultado == true)
    
{
 echo '
<script>
alert("Pago registrado con èxito");

</script>
';    
}
else
{
  echo '
<script>
alert("Error");
</script>
';  
}







?>