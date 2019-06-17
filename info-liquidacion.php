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
             Lista de liquidaciones
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Fecha creación</th>
         <th class="info">Periodo</th>
         <th class="info">Estado</th>
         <th class="info"> </th>
           <th class="info"> </th>
         
     
     </thead> 
         <tbody>
            <?php
     $consulta_t="SELECT * FROM liquidacion INNER JOIN periodo ON periodo_idperiodo= idperiodo AND consorcio_idconsorcio=$id_consorcio ORDER BY mes ASC";
     $resultado_t=$connect->query($consulta_t);
             

        $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            $id_liquidacion=$fila_t['idliquidacion'];
            $anio=$fila_t['anio'];
            $mes=$fila_t['mes'];
            $fecha=$fila_t['fecha_liq'];
            $idperiodo=$fila_t['idperiodo'];
            $estado_liq=$fila_t['estado_liq'];
            $desc=$fila_t['descripcion_periodo'];
           
                     echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$fila_t['fecha_liq'].'</td>
                     <td>'.$fila_t['descripcion_periodo'].' - '.$anio.'</td>
                     <td><strong><p style= "text-transform:uppercase">'.$fila_t['estado_liq'].'</strong></p></td>';?>
                     <td>
                         
                         
                        <?php 
                          if($estado_liq=='abierto')
                          {
                         
                                 ?>
                                 <a  style="text-decoration:none" class="bnt btn-success btn-xs irPorAjax" href="liquidar.php?idliquidacion=<?php echo $id_liquidacion?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>&idconsorcio=<?php echo $id_consorcio ?>">Liquidar</a></td>
                          
<?php                     }
                         else { ?>
                                 <a  style="text-decoration:none" class="bnt btn-info btn-xs" href="ver-liquidacion.php?idliquidacion=<?php echo $id_liquidacion?>&mes=<?php echo $mes ?>&anio=<?php echo $anio ?>&idconsorcio=<?php echo $id_consorcio ?>&desc=<?php echo $desc?>&estado_l=<?php echo $estado_liq ?>">Ver</a>
                                 <?php }
                         
                                 echo '</td>' ;
                        
                         if ($estado_liq == 'confirmado')
                         {
                                echo '<td></td>';
                         }
                        else
                        {
                              echo '<td>
                              <a  style="text-decoration:none" class="bnt btn-danger btn-xs irPorAjax" href="php/eliminar-liquidacion.php?idliquidacion='.$id_liquidacion.'&estado='.$estado_liq.'">Eliminar</a>
                              </td><tr>';  
                          
                        }
                         
           $c=$c+1;
           
        }
             
    ?>
         
         </tbody>    
           
      </table>
   </div>
   
   <div style="text-align:center">
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevaTorre" style="color:white">Nueva Liquidación</a>
    </div>
                 <div id="resultados"> </div>
  </div>



<!-----------------------------------------------------MODAL NUEVA LIQUIDACION-------------------------------------------------------->



<div class="modal fade" id="NuevaTorre" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nueva Liquidación : <?php echo $raz_soc; ?></h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos de liquidación</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Período:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                               <select  name="periodo" id="periodo" class="form-control" style="font-size:" required>
                                                   <?php 
                                                   $consulta_sel="SELECT * FROM periodo ORDER BY anio, mes ASC ";
                                                   $resultado_sel=$connect->query($consulta_sel);
                                                   while($fila_sel=mysqli_fetch_assoc($resultado_sel))
                                                   {
                                                       $descripcion=$fila_sel['descripcion_periodo'];
                                                       $id_per=$fila_sel['idperiodo'];
                                                       $anio=$fila_sel['anio'];
                                                      
                                                       echo '<option value="'.$id_per.'">'.$descripcion.' - '.$anio.'</option>';
                                                       
                                                       
                                                   }
                                                   
                                                   
                                                   ?>
                                                    
                                                </select>
                                                  
                                                 
                                            </div>
                                          <br>
                                        </div>
                                     
                                        
                                     
                                        <input type="hidden" class="form-control" value="<?php echo $id_consorcio?>" name="id_consorcio" id="id_consorcio">
                                     
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="button" class="btn btn-success" value="Guardar" onclick="guardarLiquidacion();">
                                                
                                            </div>
                                        </div>
                                   
                            </form>                                                                                                                                                                                                                                      
                                                                                              
               </div>                
           </div>            
        </div>
                   
        
        <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>  
    

         </div>
     </div>
        </div>



         </div>
<script>
function guardarLiquidacion(){
    
     var id_consorcios=$('#id_consorcio').val();
    var id_periodos = $('#periodo').val();
   
    $.ajax({
    type: 'POST', 
    url: 'php/nueva-liq.php',
    data:{id_consorcio:id_consorcios, id_periodo:id_periodos},
    success: function(resp){
        if(resp!=""){
           
            $('#resultados').html(resp);
        }
     
        
    }
})
    
         
  
    
}
 

</script>
    <script type="text/javascript">
function Confirmar() {
//Ingresamos un mensaje a mostrar
if (confirm('¿Desea eliminar torre?')){ 
       document.getElementById("form_torre").submit(); 
    }
    else
        alert("Operacion cancelada");
}
    
</script>

<script>
    
      function RecuperarDatosTorre(){
    
     var idtorre=$('#id_torre1').val();
          alert(idtorre);
   
   
    $.ajax({
    type: 'POST', 
    url: 'php/recuperar-torre.php',
    data:('id_torre='+id_torre),
    success: function(resp){
        if(resp!=""){
           
            $('#editarTorre').html(resp);
        }
     
        
    }
})
    
         
  
    
}

$(function(){
  $('.irPorAjax').click(function(e){
    e.preventDefault();
    var url = this.href;
    $.ajax({
      type:'GET',
      url: url,
      data: {},
      success:function(resp){
        if(resp!="")
          $('#resultados').html(resp);
      }
    });
  });
});
</script>


