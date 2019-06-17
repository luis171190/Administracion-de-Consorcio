<?php
require_once('conn/connect.php');
$idtorre=$_POST['id_torre'];

$consulta = "SELECT * FROM torre WHERE idtorre=$idtorre";
$resultado=$connect->query($consulta);
$fila=mysqli_fetch_assoc($resultado);
$nombre=$fila['nombre_torre'];
$pisos= $fila['cantidad_pisos'];
$unidades=$fila['cantidad_unidades'];

?>
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