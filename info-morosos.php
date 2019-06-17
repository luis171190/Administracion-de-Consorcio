<?php
require_once('php/conn/connect.php');
$search=$_POST['search'];
$consulta="SELECT * FROM consorcio WHERE idconsorcio=$search";
$resultado=$connect->query($consulta);

$fila=mysqli_fetch_assoc($resultado);

$raz_soc=$fila['razon_social'];
$cuit=$fila['cuit']; 
//$cant_torres=$fila['cant_torres'];
$prov=$fila['provincia'];
$localidad=$fila['localidad'];
$calle= $fila['calle'];
$nro_calle=$fila['nro_calle'];
$id_consorcio=$fila['idconsorcio'];

?>
 
         
            
             
         
         
         <div class="breadcrumb">
        <?php 
echo '<div class="">';
         
          echo '<p><strong>Razón Social: </strong> '.utf8_encode($raz_soc).' - <strong>CUIT: </strong>'.$cuit.'</p>';
      
         // echo '<p><strong>Cant. Torres:</strong> '.$cant_torres.'</p>';
          
          echo '<p><strong>Provincia: </strong>'.utf8_encode($prov).' - <strong> Localidad: </strong>'.utf8_encode($localidad).'</p>';
       
          echo '<p><strong>Calle: </strong>'.utf8_encode($calle).' - <strong>Nro.: </strong>'.$nro_calle.'</p>';
          
         
          echo '</div> ';
          
         
         ?>
</div>
           
            
             <div class="col-xs-12"> 
    <div class="panel panel-default">
    <div class="panel-heading">
             Lista de morosos expensas
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
     
         <th class="info">Piso</th>
         <th class="info">Depto.</th>
         <th class="info">Detalle</th>
         <th class="info">Monto s/i</th>
         <th class="info">Fecha Vec.</th>
         <th class="info">Interés</th>
         <th class="info">Total</th>
      
           
         
     
     </thead> 
         <tbody>
            <?php
                date_default_timezone_set("America/Argentina/Buenos_Aires");
   $dma=date("Y/m/d");
     $consulta_t="SELECT * FROM liquidacion INNER JOIN liquidacion_unidad INNER JOIN unidad INNER JOIN pago_liquidacion INNER JOIN periodo ON periodo_idperiodo=idperiodo AND idliquidacion=liquidacion_idliquidacion AND consorcio_idconsorcio=$id_consorcio  AND unidad_idunidad=idunidad AND idliquidacion_unidad= liquidacion_unidad_idliquidacion_unidad AND estado =0  ORDER BY piso , departamento, anio, mes";
     $resultado_t=$connect->query($consulta_t);
             

        $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            if($fila_t['estado_liq']=='pendiente')
            {
                
            }
            else
            {
           $piso=$fila_t['piso'];
           $dpto=$fila_t['departamento'];
           $monto=$fila_t['monto_si'];
        $anio=$fila_t['anio'];
        $desc_per=$fila_t['descripcion_periodo'];
        $periodo2=$desc_per.'-'.$anio;
         //obtener fecha actual.
 
            //fecha de vencimiento
            $fech_venc=$fila_t['fecha_venc'];
           $dias= (strtotime($dma)-strtotime($fech_venc))/86400;
	     //  $dias = abs($dias); 
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
            
        
                     echo '  
                     <td>'.$piso.'</td>
                     <td>'.$dpto.'</td>
                      <td>'.$periodo2.'</td>
                     <td>$ '.$monto.'</td>
                      <td>'.$fech_venc.'</td>
                         <td>$ '.$interes .'</td>
                          <td>$ '.$t_interes .'</td>';?>
             
                 
                  
           
            
                     </tr>
                     <?php
                         
           $c=$c+1;
           
        }
        }
             
    ?>
         
         </tbody>    
           
      </table>
       <div style="text-align:center">
       <a class="btn btn-info" href="RPT-morosos.php?idconsorcio=<?php echo $id_consorcio ?>" style="color:white">Imprimir</a>
    </div>
   </div>
  
   
                 <div id="resultados"> </div>
  </div>







         </div>





