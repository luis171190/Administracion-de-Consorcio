<?php

require_once('php/conn/connect.php');
session_start();

$idliquidacion=$_GET['idliquidacion'];
$mes=$_GET['mes'];
$anio=$_GET['anio'];
$id_consorcio=$_GET['idconsorcio'];
 
   //EGRESOS
$consulta2= "UPDATE egreso SET liquidacion_idliquidacion=$idliquidacion  WHERE month (fecha_egreso)=$mes AND year (fecha_egreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado2=$connect->query($consulta2);
$consulta3= "SELECT * FROM egreso WHERE month (fecha_egreso)=$mes AND year (fecha_egreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado3=$connect->query($consulta3);
$monto_e=0;
$monto_ext=0;
$monto_ord=0;
while($fila3=mysqli_fetch_assoc($resultado3))
{
    $tipo_egreso=$fila3['tipo_egreso'];
    $monto_egreso=$fila3['monto_egreso'];
    
    if($tipo_egreso=='TIPO B')
    {
        $monto_ext=$monto_ext+$monto_egreso;
        
    }
    else
    {
        $monto_ord=$monto_ord+$monto_egreso;
    }
    
//    echo '<br>';
//echo $desc_egreso .' :Monto: '.$monto_egreso;  
    
    
}
    $monto_e=$monto_ord+$monto_ext;
//echo " <br> TOTAL EGRESOS: ".$monto_e;


       
   //INGRESOS     

$consulta= "UPDATE ingreso SET liquidacion_idliquidacion=$idliquidacion WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado=$connect->query($consulta);


$consulta4= "SELECT * FROM ingreso WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado4=$connect->query($consulta4);
$monto_i=0;
while($fila4=mysqli_fetch_assoc($resultado4))
{
    
    $fila_monto1=$fila4['monto'];
    $monto_i=$fila_monto1+$monto_i;
     //$desc_ingreso=$fila4['descripcion'];
    //$monto_ingreso=$fila4['monto'];
   // echo '<br>';
//echo $desc_ingreso .' :Monto: '.$monto_ingreso; 
    
    
}
$total_liq=$monto_e-$monto_i;
$monto_ord_actualizado = $monto_ord-$monto_i;
$consulta9= "UPDATE liquidacion SET monto_total=$total_liq, monto_ord=$monto_ord_actualizado, monto_ext=$monto_ext, monto_ingresos = $monto_i,  estado_liq='pendiente' WHERE idliquidacion=$idliquidacion";
$resultado9=$connect->query($consulta9);
//echo " <br>INGRESOS: ".$monto_i;

//echo "<br>TOTAL LIQUDIACION: $".$total_liq;
//echo "<br>";

//LIQUIDACION UNDIDAD



$consulta_torre="SELECT * FROM unidad INNER JOIN torre INNER JOIN consorcio ON Torre_idTorre= idtorre AND consorcio_idconsorcio= idconsorcio AND idconsorcio=$id_consorcio";
$resultado_torre=$connect->query($consulta_torre);
while($fila_torre=mysqli_fetch_assoc($resultado_torre))
{
    $idunidad=$fila_torre['idunidad'];
    $unidad=$fila_torre['piso'].' -'.$fila_torre['departamento'] ;
    $porcentaje_ord=($fila_torre['porcentaje_pago']*$monto_ord_actualizado)/100;
    $porcentaje_ext=($fila_torre['porcentaje_pago']*$monto_ext)/100;
   
    //por cada unidad encontrada crear liquidacion_unidad y crear pago
    $ob_id="SELECT idliquidacion_unidad  FROM liquidacion_unidad ORDER BY idliquidacion_unidad DESC LIMIT 1 ";
    $r_obid=$connect->query($ob_id);
    $fi_ob=mysqli_fetch_assoc($r_obid);
    $ultimo_id=$fi_ob['idliquidacion_unidad'];
    $ultimo_id1=$ultimo_id+1;
    $consulta_liqun="INSERT INTO liquidacion_unidad (idliquidacion_unidad, liquidacion_idliquidacion, subtotal_ord, subtotal_ext, unidad_idunidad) VALUES ($ultimo_id1, $idliquidacion, $porcentaje_ord, $porcentaje_ext, $idunidad )";
    $resultado_liqun=$connect->query($consulta_liqun);
    $monto_si=$porcentaje_ord+$porcentaje_ext;
    
    //crear pago x cada  liquidacion_unidad
    $fecha_venc=$anio.'-'.$mes.'-10';
    $consulta_pago="INSERT INTO pago_liquidacion (monto_si, fecha_venc, monto_interes, monto_total, liquidacion_unidad_idliquidacion_unidad, estado) VALUES ($monto_si,'$fecha_venc','0','0',$ultimo_id1,'0')";
    $resultado_pago=$connect->query($consulta_pago);
   // echo $consulta_pago;
    
    
}

echo '
<script>
alert("Liquidación exitosa. Por favor confirme la misma."); 
location.href="http://localhost:8080/linuji/enviar-mails-liq.php    ";
location.href="http://localhost:8080/linuji/expensas.php    ";
cambiar();
</script>
'; 



?>