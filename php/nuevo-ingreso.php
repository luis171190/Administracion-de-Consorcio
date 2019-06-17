<?php
require_once('conn/connect.php');
$id_consorcio=$_POST['id_consorcio'];

$monto=$_POST['monto'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha_egreso'];


$consulta = "INSERT INTO ingreso (fecha_ingreso, monto, descripcion, consorcio_idconsorcio, liquidacion_idliquidacion)  VALUES('$fecha',$monto,'$descripcion',$id_consorcio, NULL)";
$resultado=$connect->query($consulta);
echo $consulta;


echo '
<script>
alert("Ingreso agregado");
location.href="http://localhost:8080/linuji/ingresos.php";

</script>
';

?>