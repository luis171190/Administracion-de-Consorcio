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
             Listado del personal
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
     
         <th class="info">Nombre y Ap.</th>
         <th class="info">Dni</th>
         <th class="info">Teléfono</th>
         <th class="info">Domicilio</th>
         <th class="info">Puesto</th>
         <th class="info">Fecha inicio</th>
         <th class="info">Fecha fin</th>
         <th class="info"></th>
           
         
     
     </thead> 
         <tbody>
            <?php
                date_default_timezone_set("America/Argentina/Buenos_Aires");
   $dma=date("Y/m/d");
     $consulta_t="SELECT * FROM personal WHERE consorcio_idconsorcio=$id_consorcio";
     $resultado_t=$connect->query($consulta_t);
             

        $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            $idpersonal=$fila_t['idpersonal'];
           $apynom=$fila_t['nombre_per'].' '.$fila_t['apellido_per'];
           $dni=$fila_t['dni_per'];
           $tel=$fila_t['tel_per'];
       
        $domicilio=$fila_t['domicilio_per'];
        $puesto=$fila_t['desc_puesto'];
         $fi=$fila_t['fecha_inicio'];
        $ff=$fila_t['fecha_fin'];
            if($ff=='0000-00-00')
            {
                $ff='-';
            }
            //fecha de vencimiento
           
            
        
                     echo ' <tr> 
                     <td>'.$apynom.'</td>
                     <td>'.$dni.'</td>
                      <td>'.$tel.'</td>
                     <td> '.$domicilio.'</td>
                      <td>'.$puesto.'</td>
                         <td> '.$fi .'</td>
                          
                          <td> '.$ff .'</td>';?>
             
                 
                  
            <td>
             <a href="modificar-personal.php?idpersonal=<?php echo $idpersonal?>" class="btn btn-danger btn-xs">Modificar</a>
             </td>
            
                     </tr>
      
                     <?php
                         
           $c=$c+1;
           
        
        }
    ?>
         
         </tbody>    
           
      </table>
         <div style="text-align:center">
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevoPersonal" style="color:white">Nuevo Personal</a>
    </div>
   </div>
                 <br>
     <div style="text-align:center">
       <a class="btn btn-info" href="RPT-personal.php?idconsorcio=<?php echo $id_consorcio ?>" style="color:white">Imprimir</a>
    </div>
   
                 <div id="resultados"> </div>
  </div>







         </div>
<div class="modal fade" id="NuevoPersonal" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nuevo Personal</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos del trabajador</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                   <form action="php/nuevo-personal.php" id="form_personal" method="post" name="form_npersonal" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombres:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre" type="text" class="form-control" placeholder="Nombres"  required id="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Apellidos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Apellidos" name="apellido" required id="apellido_p">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Dni:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="DNI"  name="dni" required id="dni_p">
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
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Puesto:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Descripcion del puesto de trabajo"  name="puesto" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha Inicio:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="date" class="form-control" placeholder="Inicio laboral"  name="fecha_inicio" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha Fin:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="date" class="form-control" placeholder="Finalizacion laboral"  name="fecha_fin"  id="dni_p">
                                                <input type="hidden"  name="idconsorcio" value="<?php echo $id_consorcio?>">
                                            </div>
                                        </div>
                                       
                                       
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





