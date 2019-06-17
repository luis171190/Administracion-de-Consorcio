<?php
require_once('conn/connect.php');


$idingreso=$_POST['idingreso'];
$fecha=$_POST['fecha'];
$monto=$_POST['monto'];
$descripcion=$_POST['descripcion'];



$consulta = "UPDATE ingreso SET fecha_ingreso='$fecha', monto=$monto, descripcion='$descripcion' WHERE idingreso =$idingreso";

$resultado=$connect->query($consulta);

echo '
<script>
alert("Ingreso modificado");
  window.history.back();
window.history.back();
</script>
';

?>