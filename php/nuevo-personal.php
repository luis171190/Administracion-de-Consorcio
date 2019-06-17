<?php
require_once('conn/connect.php');
$id_consorcio=$_POST['idconsorcio'];

    $nom=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
    $tel=$_POST['telefono'];      
    $domicilio=$_POST['domicilio'];
    $puesto=$_POST['puesto'];
    $fi=$_POST['fecha_inicio'];
    $ff=$_POST['fecha_fin'];
if($ff=='')
{
   $consulta = "INSERT INTO personal (nombre_per, apellido_per, dni_per, tel_per, domicilio_per, desc_puesto, fecha_inicio, fecha_fin, consorcio_idconsorcio)  VALUES('$nom', '$apellido',$dni, '$tel','$domicilio','$puesto','$fi',NULL, $id_consorcio)";
}
else{

$consulta = "INSERT INTO personal (nombre_per, apellido_per, dni_per, tel_per, domicilio_per, desc_puesto, fecha_inicio, fecha_fin, consorcio_idconsorcio)  VALUES('$nom', '$apellido',$dni, '$tel','$domicilio','$puesto','$fi','$ff', $id_consorcio)";
}
$resultado=$connect->query($consulta);


echo '<script>
       
    alert("Personal registrado con exito.");
    location.href="http://localhost:8080/linuji/personal.php";
      
      </script>';


?>