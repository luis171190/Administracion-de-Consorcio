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
             Lista de Propietarios
         </div>
    <div class="panel-body">
   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Nombres y Ap.</th>
        
         <th class="info">Dni</th>
          <th class="info">Email</th>
          <th class="info">Teléfono</th>
          <th class="info">Fecha Nac.</th>
         <th class="info">Domicilio</th>
         
         <th class="info"> </th>
          <th class="info"> </th>
         
     </thead> 
         <tbody>
    <?php

$consulta_1="SELECT * FROM propietario WHERE consorcio_idconsorcio = $id_consorcio";
$resultado=$connect->query($consulta_1);            
             
        $c=1;
        while($fila=mysqli_fetch_assoc($resultado))
            
        {
      
         
                     echo '<tr><td>'.$c.'</td>
                      <td>'.$fila['nombres'].' '.$fila['apellidos'].'</td>
                     <td>'.$fila['dni'].'</td>
                     <td>'.$fila['mail'].'</td>
                     <td>'.$fila['telefono'].'</td>
                     <td>'.$fila['fecha_nac'].'</td>
                    <td>'.$fila['domicilio'].'</td>';
             ?>
                     <td>
                   <a class="btn btn-info btn-xs" href="edit-propietario.php?idpropietario=<?php echo $fila['idpropietario'] ?>" style="color:white">Modificar</a>


                     </td>
                     <td>

                           <form  name="form_consorcio" id="form_consorcio" action="php/eliminar-consorcio.php" method="post">
                                <div class="form-group">  
                        <button type="button" class="btn btn-danger btn-xs" onclick="Confirmar()">Eliminar</button>
                    </div>  
            

                             <input type="hidden"  value="" name="id_consorcio" id="id_consorcio">

                     </form>

                     </td>
             
                     </tr>
                     <?php
                         
                         
           $c=$c+1;
        }
    ?>
         
         </tbody>    
        
           
      </table>
         <div style="text-align:center">
        <a class="btn btn-success" data-toggle="modal" data-target="#NuevoProp" style="color:white">Nuevo Propietario</a>
    </div>
        <br>
        <div style="text-align:center">
        <a class="btn btn-info" href="RPT-propietarios.php?idconsorcio=<?php echo $id_consorcio ?>" style="color:white">Imprimir </a>
    </div>
        
   </div>
 
  </div> 
    
  </div> 
  
  </div> 
        
        <!-----------------------------------------------------NUEVO PROPIETARIO MODAL----------------------------------------------------------------------------------->
        
<div class="modal fade" id="NuevoProp" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Alta propietario</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos del propietario:</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                   <form action="php/nuevo-propietario.php" id="form_unidades" method="post" name="form_unidades" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombres:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_p" type="text" class="form-control" placeholder="Nombres del propietario" value="" required id="nombre_p">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Apellidos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Apellidos del propietario" value="" name="apellido_p" required id="apellido_p">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">DNI:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="DNI del propietario"  value="" name="dni_p" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Mail:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="email_p" type="email" class="form-control" placeholder="E-mail del propietario" value=""  id="email_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Teléfono:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="tel_p" type="tel" class="form-control" placeholder="Teléfono del propietario" value="" required id="tel_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha de Nacimiento:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input required name="fn_p" type="date" class="form-control" placeholder="Fecha de nacimiento del propietario" value=""  id="fn_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Domicilio:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="dom_p" type="text" class="form-control" placeholder="Calle, Nro. Calle, Prov. y Localidad del propietario" value="" required id="dom_p">
                                            </div>
                                         <input name="id_consorcio"  id ="id_consorcio" type="hidden" class="form-control" value="<?php echo $id_consorcio ?>" required id="id_consorcio">
                                        </div>
                                          
                                          <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                             </div>
                                             </div>
                                     
</div>
                                      

                                      
                                      
                                          
        </form>                                                                                                                                                                                                                                
                                                                                              
               </div>                
           </div> 
                    <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>  
    
        </div>
                   
        
       

         </div>
     </div>
        </div>
 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
   </div> 
    </div>
    

   </section> 

<script>
function guardarConsorcio(){
    
     var raz_soc=$('#raz_soc').val();
    var cuit = $('#cuit').val();
    var provincia = $('#prov').val();
    var localidad = $('#localidad').val();
    var calle= $('#calle').val();
    var nro_calle= $('#nro_calle').val();
    
  
    
   
    $.ajax({
    type: 'POST', 
    url: 'php/nuevo-consorcio.php',
    data:{razon_soc:raz_soc, cuit:cuit, provincia:provincia, localidad:localidad, calle:calle, nro_calle:nro_calle},
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
if (confirm('¿Desea eliminar consorcio?')){     
       document.getElementById("form_consorcio").submit(); 
    }
    else
        alert("Operacion cancelada");
}
    
</script>

