<?php
require_once('conn/connect.php');
$id_unidad=$_POST['idunidad2'];
$id_propietario=$_POST['idpropietario'];


$consulta2="INSERT INTO unidad_propietario (fk_id_propietario, fk_id_unidad) VALUES ($id_propietario, $id_unidad)";

$resultado=$connect->query($consulta2);
    
echo '
<script>
alert("Propietario agregado");
  window.history.back();

</script>
';
?>