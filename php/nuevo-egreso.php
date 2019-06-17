<?php
require_once('conn/connect.php');
$id_consorcio=$_POST['id_consorcio'];
$tipo_egreso=$_POST['tipo_egreso'];
$monto=$_POST['monto'];
$descripcion=$_POST['descripcion'];
$fecha=date("Y-m-d");//$_POST['fecha_egreso'];



$consulta = "INSERT INTO egreso (fecha_egreso, monto_egreso, descripcion_egreso, tipo_egreso, consorcio_idconsorcio, liquidacion_idliquidacion)  VALUES('$fecha',$monto,'$descripcion','$tipo_egreso',$id_consorcio, NULL)";
$resultado=$connect->query($consulta);
//echo $consulta;


echo '
<script>
//alert("Egreso agregado");
//location.href="http://localhost:8080/linuji/egresos.php";
$("body").removeClass("modal-open");
$(".modal-backdrop").remove();
</script>
';

?>