<?php

require_once('conn/connect.php');
session_start();



$id_usuario= $_SESSION['id_usuario'];
$razon_soc=utf8_decode($_POST["razon_soc"]);
$cuit=$_POST["cuit"];

$provincia=utf8_decode($_POST["provincia"]);
$localidad=utf8_decode($_POST["localidad"]);
$calle=utf8_decode($_POST["calle"]);  
$nro_calle=$_POST["nro_calle"];
$tipo_consorcio_id=$_POST["tipo_consorcio_id"];

//obtener ultimo registro
$consulta3="SELECT idconsorcio FROM consorcio ORDER BY idconsorcio DESC LIMIT 1 ";
$resultado=$connect->query($consulta3);
$fila3=mysqli_fetch_assoc($resultado);
$id_consorcio=$fila3['idconsorcio'];

$id_consorcio_g=$id_consorcio+1;
$consulta = "INSERT INTO consorcio(idconsorcio,razon_social, cuit, provincia, localidad, calle, nro_calle,tipo_consorcio_id)  VALUES($id_consorcio_g,'$razon_soc',$cuit,'$provincia','$localidad','$calle',$nro_calle,$tipo_consorcio_id)";
$resultado=$connect->query($consulta);



$consulta2="INSERT INTO usuario_consorcio(usuario_id_usuario, consorcio_idconsorcio)  VALUES($id_usuario,$id_consorcio_g)";
$resultado2=$connect->query($consulta2);



echo '<script>
       
    //alert("Consorcio registrado con exito.");
    location.href="http://localhost:8080/linuji/gestion-consorcio.php";
      
      </script>';

//crear tabla consorcio_usario_administrador, necesito id de usario

?>