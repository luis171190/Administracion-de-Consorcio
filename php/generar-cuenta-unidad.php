<?php

require_once('conn/connect.php');
session_start();



$idconsorcio=$_GET["idconsorcio"];
$id_unidad=$_GET["idunidad"];
$usuario=$_GET["usuario"];
$clave = '123456';
$hash=password_hash($clave, PASSWORD_DEFAULT);


//GENERAR CUENTA DE USUARIO ------->luego agregar HASH
$consulta= "INSERT INTO usuario (nombre_usuario, clave, privilegio, fecha_creacion) VALUES ('$usuario', '$hash' , 0, NOW())";
$resultado = $connect->query($consulta);

// RECUPERAR CUENTA CREADA 
$consulta1= "SELECT id_usuario FROM usuario WHERE nombre_usuario = '$usuario'";
$resultado1 = $connect->query($consulta1);
$fila1 = mysqli_fetch_assoc($resultado1);
$id_usuario_recuperado= $fila1['id_usuario'];

//AGREGAR CUENTA DE USUARIO  A unidad_propietario    
$consulta2 = "INSERT INTO usuario_consorcio (usuario_id_usuario ,  consorcio_idconsorcio, unidad_idunidad) VALUES  ($id_usuario_recuperado, $idconsorcio , $id_unidad)";
$resultado2= $connect->query($consulta2);


echo '
<script>
alert("Cuenta generada con èxito");
  location.href="http://localhost:8080/linuji/generar-cuentas-consorcistas.php";


</script>
';






?>