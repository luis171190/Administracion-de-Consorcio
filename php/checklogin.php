<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "consorcio";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {
}
$row = $result->fetch_array(MYSQLI_ASSOC);

//if ($password == $row['clave']) {
if (password_verify($password,$row['clave'])) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    
    require_once('../php/conn/connect.php');
    
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$username'";
    $resultado=$connect->query($consulta);
    
    $fila= mysqli_fetch_assoc($resultado);

    $privilegio=$fila['privilegio'];
    $id_usuario=$fila['id_usuario'];
    $_SESSION['privilegio']=$privilegio;
    $_SESSION['id_usuario']=$id_usuario;
    

    if($privilegio==1)
    {
    /*
    $consulta3="SELECT id_profesional FROM profesionales2 WHERE usuario_idUsuario=$id_usuario";
    $resultado3=$connect->query($consulta3);
    $fila3= mysqli_fetch_assoc($resultado3);
    $id_profesional_session=$fila3['id_profesional'];
    $_SESSION['id_profesional_sesion'] = $id_profesional_session;*/
         header('Location: http://localhost:8080/linuji/gestion-consorcio.php');
    }
    else
    {
         header('Location: ../ingresos-consorcista.php');
        
        //$consultax="SELECT * FROM usuario_consorcio WHERE"
        
    }

  // header('Location: http://localhost:8080/linuji/index.php');

} else {
    //echo "Username o Password estan incorrectos.";

    //echo "<br><a href='login.php'>Volver a Intentarlo</a>";
    echo '<script>
    
     window.location.href="../error-logueo.html";
    
    </script>';
    
}
mysqli_close($conexion);
