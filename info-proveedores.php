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
             Listado de proveedores
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
     
         <th class="info">Razón Social</th>
         <th class="info">CUIT</th>
         <th class="info">Teléfono</th>
         <th class="info">Domicilio</th>
         <th class="info">E-mail</th>
         <th class="info">Fecha Alta</th>
         
         <th class="info"></th>
           
         
     
     </thead> 
         <tbody>
            <?php
               
     $consulta_t="SELECT * FROM proveedor WHERE consorcio_idconsorcio=$id_consorcio";
     $resultado_t=$connect->query($consulta_t);
             

        $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            $idproveedor=$fila_t['idproveedor'];
           $raz_soc_p=$fila_t['razon_soc_prov'];
           $cuit=$fila_t['cuit'];
           $tel=$fila_t['tel_prov'];
       
        $domicilio=$fila_t['domicilio_prov'];
        $email=$fila_t['email_prov'];
         $falta=$fila_t['fecha_alta'];
      
            
        
                     echo ' <tr> 
                     <td>'.$raz_soc_p.'</td>
                     <td>'.$cuit.'</td>
                      <td>'.$tel.'</td>
                     <td> '.$domicilio.'</td>
                      <td>'.$email.'</td>
                    <td>'.$falta.'</td>'
                          
                          ;?>
             
                 
                  
            <td>
             <a href="modificar-proveedor.php?idproveedor=<?php echo $idproveedor?>" class="btn btn-danger btn-xs">Modificar</a>
             </td>
            
                     </tr>
      
                     <?php
                         
           $c=$c+1;
           
        
        }
    ?>
         
         </tbody>    
           
      </table>
         <div style="text-align:center">
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevoProveedor" style="color:white">Nuevo Proveedor</a>
    </div>
        <br>
         <div style="text-align:center">
       <a class="btn btn-info" href="RPT-proveedores.php?idconsorcio=<?php echo $id_consorcio ?>" style="color:white">Imprimir</a>
    </div>
   </div>
   
   
                 <div id="resultados"> </div>
  </div>







         </div>
<div class="modal fade" id="NuevoProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nuevo Proveedor</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos del proveedor</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                   <form action="php/nuevo-proveedor.php" id="form_personal" method="post" name="form_npersonal" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Razón Social:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="razon_social" type="text" class="form-control" placeholder="Razón social"  required id="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">CUIT:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="CUIT" name="cuit" required id="apellido_p">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Teléfono:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Teléfono"  name="telefono" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Domicilio:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Domicilio"  name="domicilio" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">E-mail:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="email" class="form-control" placeholder="Email"  name="mail" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha Alta:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="date"  class="form-control" placeholder="Fecha de alta del proveedor"  name="fecha_alta" required id="dni_p">
                                            </div>
                                        </div>
                                       
                                                <input type="hidden"  name="idconsorcio" value="<?php echo $id_consorcio?>">
                                       
                                       
                                       
                                       <div class="form-group">
                                           
                                                
                                                 <input name="idpersonal" type="hidden" class="form-control"   required id="idpersonal">
                                         
                                        </div>
                                          
                                          <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                             </div>
                                             </div>
                                     
</div>
                                      

                                      
                                      
                                          
        </form>                                                                                                                                                                                        <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>                                              
                                                                                              
               </div>                
           </div>            
        </div>
                   
        
      
    

         </div>
     </div>
        </div>





