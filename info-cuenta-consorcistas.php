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
           
             <br>
             <div class="col-xs-12"> 
    <div class="panel panel-default">
    <div class="panel-heading">
             Cuentas del Consorcio
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
        
         <th class="info">Piso</th>
         <th class="info">Departamento</th>     
         <th class="info">Torre</th>
         <th class="info">Cuenta de Usuario</th>
         

     </thead> 
         <tbody>
    <?php

$consulta_1="SELECT * FROM unidad inner JOIN torre ON Torre_idTorre = idTorre and consorcio_idconsorcio = $id_consorcio ORDER BY idunidad ASC ";
$resultado=$connect->query($consulta_1);            
             
        $c=1;
        while($fila=mysqli_fetch_assoc($resultado))
            
        {
         $id_unidad = $fila['idunidad'];
            $consulta_2= "SELECT * FROM usuario_consorcio WHERE consorcio_idconsorcio = $id_consorcio AND unidad_idunidad = $id_unidad";
            $resultado_2 = $connect->query($consulta_2);
            $num_filas2= mysqli_num_rows($resultado_2);
            
             //$usuario_nombre_generar = $id_consorcio.$fila['idtorre'].'_'.trim($fila['piso']).'u'.$id_unidad; --ALTERNATIVA 1
            $raz_soc_se= str_replace ( ' ' , '' , $raz_soc);
            $usuario_nombre_generar = $raz_soc_se.'_'.trim($fila['piso']).'u'.$id_unidad;
            $var = '';
            if ($num_filas2 > 0)
            {
                $fila_2 = mysqli_fetch_assoc ($resultado_2);
                $idusuario_r = $fila_2['usuario_id_usuario'];
                $consulta_3 = "SELECT nombre_usuario  FROM usuario WHERE id_usuario = $idusuario_r";
                $resultado_3 = $connect->query($consulta_3);
                $fila_3 = mysqli_fetch_assoc($resultado_3);
                $var = $fila_3['nombre_usuario'];
               
            }
            else
            {   
                
                $var = '<a  class="btn btn-info btn-xs"  href="php/generar-cuenta-unidad.php?idconsorcio='.$id_consorcio.'&idunidad='.$id_unidad.'&usuario='.$usuario_nombre_generar.'"> Generar Cuenta</a>';
            }
                
                     echo '
                     <td>'.$fila['piso'].'</td>
                     <td>'.$fila['departamento'].'</td>
                     <td>'.$fila['nombre_torre'].'</td>
                     <td>'.$var.'</td>';
                     
            //arriba <td><a href="'.$fila['idpropietario'].'">'.$fila['nombres'].' '.$fila['apellidos'].'</a></td>
             ?>
                   
                
             
                     </tr>
                     <?php
                         
                         
           $c=$c+1;
        }
    ?>
         
         </tbody>    
        
           
      </table>
         <div style="text-align:center">
             
           <?php
             
      echo '<a  class="btn btn-success" href="php/generar-todas-cuentas.php?idconsorcio='.$id_consorcio.'&raz_soc='.$raz_soc_se.'"> Generar Todas las Cuentas</a>';
           ?>
    </div>
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


