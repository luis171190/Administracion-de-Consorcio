<?php
require_once('php/conn/connect.php');
$search=$_POST['search'];
$consulta="SELECT c.*,tc.descripcion as 'tipo' FROM consorcio c join tipo_consorcio tc on c.tipo_consorcio_id = tc.id WHERE idconsorcio=$search";
$resultado=$connect->query($consulta);

$fila=mysqli_fetch_assoc($resultado);

$tipo=$fila['tipo'];
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
         
          echo '<p><strong>Tipo: </strong> '.utf8_encode($tipo).'</p>';
          echo '<p><strong>Razón Social: </strong> '.utf8_encode($raz_soc).'</p>';
          echo '<p><strong>CUIT: </strong>'.$cuit.'</p>';
         // echo '<p><strong>Cant. Torres:</strong> '.$cant_torres.'</p>';
          
          echo '<p><strong>Provincia: </strong>'.utf8_encode($prov).'</p>';
          echo '<p><strong> Localidad: </strong>'.utf8_encode($localidad).'</p>';
          echo '<p><strong>Calle: </strong>'.utf8_encode($calle).'</p>';
          
         echo '<p><strong>Nro. Calle: </strong>'.$nro_calle.'</p>';
          echo '</div> ';
          
         
         ?>
</div>
           
             <br>
             <div class="col-xs-12"> 
    <div class="panel panel-default">
    <div class="panel-heading">
             Torres del Consorcio
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Nombre</th>
         <th class="info">Pisos</th>
         <th class="info">Cant. Unidades</th>
         <th class="info"> </th>
         <th class="info"> </th>
     </thead> 
         <tbody>
            <?php
     $consulta_t="SELECT * FROM torre WHERE consorcio_idconsorcio=$id_consorcio";
     $resultado_t=$connect->query($consulta_t);
             

        $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {   $pisos = $fila_t['cantidad_pisos'];
            
                         $idtorre2=$fila_t['idtorre'];
                         $nombretorre=$fila_t['nombre_torre'];
      
            $cons="SELECT idunidad FROM unidad WHERE Torre_idTorre=$idtorre2";
                         $res=$connect->query($cons);
                         $num_un=mysqli_num_rows($res);
            
         
                     echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$fila_t['nombre_torre'].'</td>
                     <td>'.$fila_t['cantidad_pisos'].'</td>
                     <td>'.$num_un.'</td>';?>
             
               <td>
               <?php 
                         
                $url ='gestion-unidades.php?id_torre='.$idtorre2.'&nombre_torre='.$nombretorre.'&id_consorcio='.$id_consorcio;?>

                <a class="btn btn-warning btn-xs" data-toggle="modal" href="<?php echo $url ?>" style="color:white">Unidades</a>
             
             </td>
                     <td>
                   <a class="btn btn-info btn-xs" href="modificar-torre.php?idtorre=<?php echo $idtorre2 ?>&pisos=<?php echo $pisos ?>&nombre_torre=<?php echo $nombretorre ?>" style="color:white">Modificar</a>
                     </td>
                          </tr>
                     <?php
//                          <td>
//
//                           <form  name="form_torre" id="form_torre" action="php/eliminar-torre.php" method="post">
//                                <div class="form-group"> <!-- Submit Button -->
//                        <button type="button" class="btn btn-danger btn-xs" > <a  style="text-decoration:none" class="bnt btn-danger btn-xs" href="php/eliminar-torre.php?id_torre=<?php echo $idtorre2;">Eliminar</a></button>
//                    </div>  
//                <!--    <button  type="button" class="btn btn-danger btn-xs" onclick="Confirmar();" id="conf_elim" >Eliminar</button>-->
//
//                             <input type="hidden"  value="<?php echo $fila_t['idtorre']" name="id_torre" id="id_torre">
//
//                     </form>
//
//                     </td>
                         
                         // $ids[$c]=$c.'-'.$fila_t['idtorre'].'-'.$fila_t['nombre_torre'].'-'.$fila_t['cantidad_pisos'].'-'.$fila_t['cantidad_unidades'];
          //  echo $ids[$c];
                    $c=$c+1;
           
        }
    ?>
         
         </tbody>    
           
      </table>
   </div>
   
   <div style="text-align:center">
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevaTorre" style="color:white">Agregar Torre</a>
    </div>
   
  </div>



<!-----------------------------------------------------MODAL NUEVA TORRE---------------------------------------------------------------------------->



<div class="modal fade" id="NuevaTorre" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Alta Torre</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos de la Torre</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="php/nueva-torre.php" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombre Torre:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_torre" type="text" class="form-control" placeholder="Nombre de torre" value="" required id="nombre_torre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Cantidad de pisos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="Cantidad de pisos" value="" name="cant_pisos" required id="cant_pisos">
                                            </div>
                                        </div>
                                        
                                       
                                        <input type="hidden" class="form-control" value="<?php echo $id_consorcio?>" name="id_consorcio" id="id_consorcio">
                                     
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="button" class="btn btn-success" value="Guardar" onclick="guardarTorre();">
                                                
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
<!-----------------------------------------------------  MODAL MODIFICAR TORRE---------------------------------------------------------------------------->

           <div class="modal fade" id="editarTorre" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Alta Torre</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos de la Torre</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="php/nueva-torre.php" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombre Torre:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_torre" type="text" class="form-control" placeholder="<?php echo $fila_t['nombre_torre']?>" value="" required id="nombre_torre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Cantidad de pisos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="Cantidad de pisos" value="" name="cant_pisos" required id="cant_pisos">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Cantidad de unidades (torre):</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="Cantidad de unidades de la torre" value="" name="cant_unidades" required id="cant_unidades">
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" value="<?php echo $id_consorcio?>" name="id_consorcio" id="id_consorcio">
                                     
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="button" class="btn btn-success" value="Guardar" onclick="guardarTorre();">
                                                
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
function guardarTorre(){    
    var id_consorcio=$('#id_consorcio').val();
    var nombre = $('#nombre_torre').val();
    var pisos = $('#cant_pisos').val();
    var unidades = $('#cant_unidades').val();
   
    $.ajax({
    type: 'POST', 
    url: 'php/nueva-torre.php',
    data:{id_consorcio:id_consorcio, nombre_torre:nombre, cant_pisos:pisos, cant_unidades:unidades},
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
</script>


