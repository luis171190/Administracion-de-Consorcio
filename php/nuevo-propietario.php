<?php
require_once('conn/connect.php');


$id_consorcio = $_POST['id_consorcio'];
$nombres=$_POST['nombre_p'];
$apellidos=$_POST['apellido_p'];
$dni=$_POST['dni_p'];
$email=$_POST['email_p'];
$telefono=$_POST['tel_p'];
$fecha_nac=$_POST['fn_p'];
$domicilio=$_POST['dom_p'];

$consulta3="SELECT idpropietario FROM propietario ORDER BY idpropietario DESC LIMIT 1 ";
$resultado3=$connect->query($consulta3);
$fila3=mysqli_fetch_assoc($resultado3);

$id_prop=$fila3['idpropietario'];

$id_propietario_g=$id_prop+1;
$consulta = "INSERT INTO propietario(idpropietario,nombres, apellidos, dni, mail, telefono, fecha_nac, domicilio, consorcio_idconsorcio)  VALUES($id_propietario_g,'$nombres','$apellidos',$dni,'$email', '$telefono','$fecha_nac','$domicilio', $id_consorcio)";

$resultado=$connect->query($consulta);


if(isset ($_POST['idunidad2'])){

$id_unidad=$_POST['idunidad2'];
$consulta2="INSERT INTO unidad_propietario (fk_id_propietario, fk_id_unidad) VALUES ($id_propietario_g, $id_unidad)";
$resultado=$connect->query($consulta2);

}
//location.href="http://localhost:8080/linuji/gestion-torres.php";
echo '
<script>
//alert("Propietario agregado");
  window.history.back();
window.history.back();
</script>
';


?>