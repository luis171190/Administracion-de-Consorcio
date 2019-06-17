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
             Lista de Ingresos
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Fecha</th>
         <th class="info">Descripción</th>
         <th class="info">Monto ($)</th>
           <th class="info"> </th>
         
     
     </thead> 
         <tbody>

<?php
$consulta3= "SELECT * FROM ingreso WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$idconsorcio  ORDER BY fecha_ingreso";
$resultado_3=$connect->query($consulta3);
    $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_3))
            
        {
            $id_egreso=$fila_t['idingreso'];
           
         
                     echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$fila_t['fecha_ingreso'].'</td>
                     <td>'.$fila_t['descripcion'].'</td>
                     <td>'.$fila_t['monto'].'</td>';?>
                     <td>

                          <a  style="text-decoration:none" class="bnt btn-info btn-xs" href="modificar-ingreso.php?idingreso=<?php echo $id_egreso?>">Modificar</a> 
                        
                   

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
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevaTorre" style="color:white">Nuevo Ingreso</a>
    </div>
        <br>
        <div style="text-align:center">
       <a class="btn btn-info" href="RPT-ingresos-periodo.php?idperiodo=<?php echo $idperiodo ?>&idconsorcio=<?php echo $idconsorcio ?>&desc_per=<?php echo $desc_per ?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>"  style="color:white">Imprimir</a>
    </div>
                 <div id="resultados"> </div>
  </div>
