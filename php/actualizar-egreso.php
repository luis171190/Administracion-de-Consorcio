<?php
require_once('conn/connect.php');


$idegreso=$_POST['idegreso'];
$fecha=$_POST['fecha'];
$monto=$_POST['monto'];
$descripcion=$_POST['descripcion'];



$consulta = "UPDATE egreso SET fecha_egreso='$fecha', monto_egreso=$monto, descripcion_egreso='$descripcion' WHERE idegreso =$idegreso";

$resultado=$connect->query($consulta);

echo '
<script>
alert("Egreso modificado");
  window.history.back();
window.history.back();
</script>
';

?>