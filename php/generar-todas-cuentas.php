<?php

require_once('conn/connect.php');
session_start();



$idconsorcio=$_GET["idconsorcio"];
$raz_soc_se =$_GET["raz_soc"];

$consulta_1="SELECT * FROM unidad inner JOIN torre ON Torre_idTorre = idTorre and consorcio_idconsorcio = $idconsorcio ORDER BY idunidad ASC ";
$resultado_1=$connect->query($consulta_1);            
             
        while($fila_1=mysqli_fetch_assoc($resultado_1))
            
        {
            $id_unidad = $fila_1['idunidad'];
            $consulta_2= "SELECT * FROM usuario_consorcio WHERE consorcio_idconsorcio = $idconsorcio AND unidad_idunidad = $id_unidad";
            $resultado_2 = $connect->query($consulta_2);
            $num_filas2= mysqli_num_rows($resultado_2);
            //$usuario_nombre_generar = $idconsorcio.$fila_1['idtorre'].'_'.trim($fila_1['piso']).'u'.$id_unidad;
            $clave = '123456';
            $hash=password_hash($clave, PASSWORD_DEFAULT);
            //$raz_soc_se= str_replace ( ' ' , '' , $raz_soc);
            $usuario_nombre_generar = $raz_soc_se.'_'.trim($fila_1['piso']).'u'.$id_unidad;
            
            if ($num_filas2 == 0) //si no tiene cuentas creadas.
            {


            $consulta_3= "SELECT * FROM unidad_propietario join propietario on idpropietario = fk_id_propietario where fk_id_unidad = $id_unidad";
            $resultado_3 = $connect->query($consulta_3);
            $fila_3=mysqli_fetch_assoc($resultado_3);
            $nombres = trim($fila_3['nombres']);
            $apellidos = trim($fila_3['apellidos']);
            $mail = trim($fila_3['mail']);

               //GENERAR CUENTA DE USUARIO ------->luego agregar HASH
            $consulta= "INSERT INTO usuario (nombre_usuario,nombres, apellidos, correo, clave, privilegio, fecha_creacion) VALUES ('$usuario_nombre_generar', '$nombres', '$apellidos','$mail' , '$hash' , 0,NOW())";
            $resultado = $connect->query($consulta);

            // RECUPERAR CUENTA CREADA 
            $consulta3= "SELECT id_usuario FROM usuario WHERE nombre_usuario = '$usuario_nombre_generar'";
            $resultado3 = $connect->query($consulta3);
            $fila3 = mysqli_fetch_assoc($resultado3);
            $id_usuario_recuperado= $fila3['id_usuario'];

            //AGREGAR CUENTA DE USUARIO  A unidad_propietario    
            $consulta4 = "INSERT INTO usuario_consorcio (usuario_id_usuario ,  consorcio_idconsorcio, unidad_idunidad) VALUES  ($id_usuario_recuperado, $idconsorcio , $id_unidad)";
            $resultado4= $connect->query($consulta4);
               
              
            }
                


        }
echo '
<script>
alert("Cuentas generadas con èxito");
  location.href="http://localhost:8080/linuji/generar-cuentas-consorcistas.php";


</script>
';






?>