<?php
require_once('conn/connect.php');
$id_liquidacion=$_GET['idliquidacion'];
$estado=$_GET['estado']; // solo toma 2 estados: pendiente y abierto. Confirmado no porque no se pueden eliminar liquidaciones aceptadas.
 
if ($estado == 'abierto') //no se liquido aun, solo se creo el periodo de liquidacion

{
    $consulta  = "DELETE FROM liquidacion WHERE idliquidacion = $id_liquidacion";
    $resultado = $connect->query($consulta);
    
    if($resultado == false)
    {
         echo '
        <script>
        alert("Error");
        location.href="http://localhost:8080/linuji/expensas.php";
        </script>
        '; 
    }
    else
    {
      
         echo '
        <script>
        alert("Liquidación eliminada");
        location.href="http://localhost:8080/linuji/expensas.php";
        </script>
        '; 
    }
}
else //ya se liquido, estado = pendiente
{
    //eliminar pago, eliminar liq_unidad, eliminar fk egresos e ingresos, y recien eliminar liquidacion
    $consulta1  ="SELECT * FROM liquidacion_unidad WHERE liquidacion_idliquidacion = $id_liquidacion";
    $resultado1 = $connect->query($consulta1);  //ahora elimino pagos
    while ($fila1 =mysqli_fetch_assoc($resultado1))
    {
        $id_liq_unidad = $fila1['idliquidacion_unidad'];
        $consulta3     = "DELETE FROM pago_liquidacion WHERE liquidacion_unidad_idliquidacion_unidad = $id_liq_unidad";
        $resultado3    = $connect->query($consulta3);
           
    }
    //elimino liquidacion_unidad
    $consulta4  = "DELETE FROM liquidacion_unidad WHERE liquidacion_idliquidacion = $id_liquidacion";
    $resultado4 = $connect->query($consulta4);
    
    //EGRESOS Y EGRESOS, SET NULL FK
    $consulta5  = "SELECT idegreso, liquidacion_idliquidacion FROM egreso WHERE liquidacion_idliquidacion=$id_liquidacion";
    $resultado5 = $connect->query($consulta5);
    while($fila5 = mysqli_fetch_assoc($resultado5))
    {
        $consulta6  = "UPDATE egreso SET liquidacion_idliquidacion = NULL WHERE liquidacion_idliquidacion = $id_liquidacion ";
        $resultado6 = $connect->query($consulta6);
        
    }
    //INGRESOS
    $consulta7  = "SELECT idingreso, liquidacion_idliquidacion FROM ingreso WHERE liquidacion_idliquidacion=$id_liquidacion";
    $resultado7 = $connect->query($consulta7);
     while($fila7 = mysqli_fetch_assoc($resultado7))
    {
        $consulta9  = "UPDATE ingreso SET liquidacion_idliquidacion = NULL WHERE liquidacion_idliquidacion = $id_liquidacion ";
        $resultado9 = $connect->query($consulta9);
         
        
    }
    
    //ELIMINAR LIQUIDACION
    $consulta8  = "DELETE FROM liquidacion WHERE idliquidacion = $id_liquidacion";
    $resultado8 = $connect->query($consulta8);
    
    if($resultado8 == true)
    {
       echo '
<script>
//alert("Liquidación eliminada");
//location.href="http://localhost:8080/linuji/expensas.php";
cambiar();
</script>
';
}
    
    
    else
    {
        echo '
        <script>
        alert("Error");
       location.href="http://localhost:8080/linuji/expensas.php";
        </script>
        '; 
    }
    
    
    
}



//
//echo '
//<script>
//alert("Torre agregada");
//location.href="http://localhost:8080/linuji/gestion-torres.php";
//
//</script>
//';
?>