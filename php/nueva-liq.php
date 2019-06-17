<?php

require_once('conn/connect.php');
session_start();



$idconsorcio=$_POST["id_consorcio"];
$idperiodo=$_POST["id_periodo"];

//comprobar si ya tiene periodo agregado.

$consulta_1= "SELECT idliquidacion FROM liquidacion WHERE consorcio_idconsorcio = $idconsorcio AND periodo_idperiodo = $idperiodo ";
$resultado_1= $connect->query($consulta_1);

if(mysqli_num_rows($resultado_1)>0)
{
   echo '
<script>
alert("Error: Ya existe una liquidación para el período agregado.");
location.reload();
</script>
';

}

else
{
date_default_timezone_set("America/Argentina/Buenos_Aires");
$dma=date("Y/m/d");
$consulta = "INSERT INTO liquidacion (monto_total, monto_ord, monto_ext, monto_ingresos, fecha_liq, estado_liq, consorcio_idconsorcio, periodo_idperiodo)  VALUES(0, 0 ,0 , 0 ,'$dma','abierto', $idconsorcio, $idperiodo)";
$resultado=$connect->query($consulta);
//echo $consulta;
echo '
<script>
//alert("Liquidación agregada");
  //location.reload();
$("body").removeClass("modal-open");
$(".modal-backdrop").remove();
cambiar();

</script>
';
}


?>