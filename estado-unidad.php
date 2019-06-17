<?php
require_once('php/conn/connect.php');


$idunidad=$_POST['search'];
$idconsorcio=$_POST['id_consorcio'];

$consulta="SELECT * FROM pago_liquidacion INNER JOIN liquidacion_unidad INNER JOIN unidad ON liquidacion_unidad_idliquidacion_unidad=idliquidacion_unidad AND unidad_idunidad=idunidad AND idunidad=$idunidad";
$resultado=$connect->query($consulta);

//OBTENER VALOR INTERES DIARIO

//$consulta_int = "SELECT * FROM parametros"

//echo $idliquidacion_unidad;
//$resultado_3=$connect->query($consulta3);
?>





    <div class="col-xs-12"> 
    <div class="panel panel-default">
    <div class="panel-heading">
            Registro de pagos y moras.
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Unidad</th>
         <th class="info">Detalle</th>
          <th class="info">Monto</th>
         <th class="info">Monto (c/i)</th>
         <th class="info">Pago</th>
         <th class="info"> F. Pago</th>
        <th class="info"> Monto Pagado</th>
         <th class="info"> Forma de Pago</th>
         
         <th class="info"> </th>
         
     
     </thead> 
         <tbody>

<?php

  
        while($fila=mysqli_fetch_assoc($resultado))
            
        {
          
            
            $idliquidacion_unidad=$fila['idliquidacion_unidad'];
            //echo $idliquidacion_unidad;
            $consulta2="SELECT * FROM liquidacion_unidad INNER JOIN liquidacion INNER JOIN periodo ON idliquidacion_unidad=$idliquidacion_unidad AND liquidacion_idliquidacion= idliquidacion AND periodo_idperiodo=idperiodo ORDER BY mes DESC";
            $resultado2=$connect->query($consulta2);
            $fila2=mysqli_fetch_assoc($resultado2);
              if($fila2['estado_liq']=='pendiente')
            {
                
            }
            else
            {
            
            $periodo=$fila2['descripcion_periodo'].'-'.$fila2['anio'];
            $unidad=$fila['piso'].' '.$fila['departamento'];
            
            $monto=$fila['monto_si'];
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $dma=date("Y/m/d");
            $fech_venc=$fila['fecha_venc'];
            $dias= (strtotime($dma)-strtotime($fech_venc))/86400;
            $pago=$fila['estado'];
            $fecha_pago=$fila['fecha_pago'];
            
	       if($pago==0)
           {
                    $pago_estado='NO';
                    $fecha_pago='-';
                    $monto_pago='-';
                    $forma_pago = '-';
                    $dias = floor($dias);	
                    if($dias<0)
                    {
                            $interes=0;
                    }
                    else
                    {
                        $interes=0.03*$monto*$dias;
                    }
               
                    $t_interes=$monto+$interes;
               $esBoton='<a  class="btn btn-danger btn-xs" href="nuevo-pago-unidad.php?idliquidacion_unidad='.$idliquidacion_unidad.'&interes='.$interes.'&total='.$t_interes.'&unidad='.$unidad.'&periodo='.$periodo.'&monto='.$monto.'&idconsorcio='.$idconsorcio.'&idunidad='.$idunidad.'"> Generar Pago</a>';
           }
            else
            { // PAGADO
                $pago_estado='SI';
                $interes=0;
                $m_interes=$fila['monto_interes'];
                $t_interes=$monto+$m_interes;
                $forma_pago = $fila['tipo_pago'];
                $monto_pago=$fila['monto_total'];
                //$monto_interes=$fila['monto_interes'];
                $esBoton = '';
            }
            
           
                     echo ' <tr>
                     <td>'.$unidad.'</td>
                     <td>'.$periodo.'</td>
                     <td>$ '.$monto.'</td>
                     <td>$ '.$t_interes.'</td>
                     <td>'.$pago_estado.'</td>
                     <td>'.$fecha_pago.'</td>
                     <td>$ '.$monto_pago.'</td>
                     <td>'.$forma_pago.'</td>
                     <td>'.$esBoton.'</td>
                      ';?>
                    
            
                     </tr>

                     <?php
                          
           
           
        
        }
        }
            

?>
        </tbody>    
           
      </table>
   </div>
          <div style="text-align:center">
       <a class="btn btn-info" href="RPT-estado-cuenta.php?idunidad=<?php echo $idunidad ?>&idconsorcio=<?php echo $idconsorcio ?>&unidad=<?php echo $unidad ?>" style="color:white">Imprimir</a>
    </div>
   
   
                 <div id="resultados"> </div>
  </div>
