<?php

session_start();
require_once('../php/conn/connect.php');

$nombre = $_POST["nombres"];
$apellidos= $_POST["apellidos"];
$email= $_POST["correo"];
$usuario= $_POST["usuario"];
$clave= $_POST["clave"];
$telefono=$_POST["telefono"];
$hash=password_hash($clave, PASSWORD_DEFAULT);


$consulta = "INSERT INTO usuario (nombres, apellidos, correo, nombre_usuario, clave, privilegio,fecha_creacion, telefono_usuario)  VALUES('$nombre','$apellidos', '$email','$usuario', '$hash','1', NOW(), '$telefono')";
$consulta1="SELECT * FROM usuario WHERE nombre_usuario='$usuario'";
$consulta2="SELECT * FROM usuario WHERE correo='$email'";
$verificar1=$connect->query($consulta1);
$verificar2=$connect->query($consulta2);
$fila_usuario=mysqli_num_rows($verificar1);
$fila_correo=mysqli_num_rows($verificar2);


    if($fila_usuario>0)
    {
        echo '<script>
        alert("Nombre de usuario no se encuentra disponible");
        windows.history.back();
        </script>';
    }
        else

    {
        if($fila_correo>0)
           echo '<script>
            alert("Email en uso");
            windows.history.back();
        </script>';
        else
        {
            $resultado=$connect->query($consulta);
            if(!$resultado)
            {
                echo 'Error al registrarse';
                echo $consulta;
            }
            else
                echo'Registrado';



        }
        }



?>