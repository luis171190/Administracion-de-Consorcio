<?php
require_once('php   /conn/connect.php');


$idperiodo=$_POST['search'];
$idconsorcio=$_POST['id_consorcio'];

$consulta="SELECT * FROM periodo WHERE idperiodo=$idperiodo";
$resultado=$connect->query($consulta);
$fila=mysqli_fetch_assoc($resultado);
$mes=$fila['mes'];
$anio=$fila['anio'];
$desc_per =$fila['descripcion_periodo'].' '.$anio;

?>





    <div class="col-xs-12"> 
    <div class="panel panel-default">
    <div class="panel-heading">
             Lista de Egresos
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Fecha</th>
         <th class="info">Descripción</th>
         <th class="info">Monto ($)</th>
         <th class="info"> Tipo</th>
           <th class="info"> </th>
         
     
     </thead> 
         <tbody>

<?php
$consulta3= "SELECT * FROM egreso WHERE month (fecha_egreso)=$mes AND year (fecha_egreso)=$anio AND consorcio_idconsorcio=$idconsorcio  ORDER BY fecha_egreso";
$resultado_3=$connect->query($consulta3);
    $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_3))
            
        {
            $id_egreso=$fila_t['idegreso'];
           
         
                     echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$fila_t['fecha_egreso'].'</td>
                     <td>'.$fila_t['descripcion_egreso'].'</td>
                     <td>'.$fila_t['monto_egreso'].'</td>
                     <td>'.$fila_t['tipo_egreso'].'</td>';?>
                     <td>

                          <a  style="text-decoration:none" class="bnt btn-info btn-xs" href="modificar-egreso.php?idegreso=<?php echo $id_egreso?>">Modificar</a> 
                        
                   

                     </td>
           
            
                     </tr>
                     <?php
                $c=$c+1;          
           
           
        }
            

?>
        </tbody>    
           
      </table>
   </div>
   
   <div style="text-align:center">
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevaTorre" style="color:white">Nuevo Egreso</a>
    </div>
        <br>
      
       <a class="btn btn-info" href="RPT-egresos-periodo.php?idperiodo=<?php echo $idperiodo ?>&idconsorcio=<?php echo $idconsorcio ?>&desc_per=<?php echo $desc_per ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>"  style="color:white">Imprimir</a>
    </div>
                 <div id="resultados"> </div>
  </div>
