<?php
require_once('../php/conn/connect.php');
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$desc = '';
    
    
    switch ($mes)
    {
        case 1:
            $desc = 'Enero';
           break;
                case 2:
            $desc = 'Febrero';
            break;
                case 3:
            $desc = 'Marzo';
            break;
                case 4:
            $desc = 'Abril';
            break;
                case 5:
            $desc = 'Mayo';
            break;
                case 6:
            $desc = 'Junio';
            break;
                case 7:
            $desc = 'Julio';
            break;
                case 8:
            $desc = 'Agosto';
            break;
                case 9:
            $desc = 'Septiembre';
            break;
                case 10:
            $desc = 'Octubre';
            break;
                case 11:
            $desc = 'Noviembre';
            break;
                case 12:
            $desc = 'Diciembre';
            break;
            
            
    }
$consulta = "INSERT INTO periodo (descripcion_periodo, mes , anio) VALUES ('$desc', $mes, $anio)";
$resultado = $connect->query($consulta);
if ($resultado == true)
{
    echo 'Periodo Agregado <br>';
    echo '<a href="http://localhost:8080/linuji/gestion/nuevo-periodo.php">VOLVER</a>';
}
else
    echo 'ERROR';
?>
 
       