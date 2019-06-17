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
             Lista de egresos
         </div>
        
    <div class="panel-body">
       Seleccione período
       
    <!--<form class="formulario-dia"  method="post" id="search_form" action="" name="search_form">
    
    
      <br>
      <div class="input-group">
          <span class="input-group-addon" >Buscar</span>
          <input type="text" class="form-control" placeholder="Nombre, apellido o DNI del paciente" id="search" required name="search" aria-describedby="basic-addon1">
      </div>
      
    
      <br>
      

  </form>-->
        <?php 
       // $id_usuario=$_SESSION['id_usuario'];
        $consulta_1="SELECT * FROM periodo ORDER BY anio, mes";
        $resultado1=$connect->query($consulta_1);
         echo '<select class="form-control" id="selectper" name ="selectper" class="selectpicker" data-style="btn-info" onchange="cambiarPeriodo('.$id_consorcio.'); ">';
        echo '<option value="0" >Seleccione..</option> '; 
        
        while($fila1=mysqli_fetch_assoc($resultado1))
        {
            $id_periodo=$fila1['idperiodo'];
            $descripcion_p=$fila1['descripcion_periodo'];
            $anio_p=$fila1['anio'];
          echo '
        <option value="'.$id_periodo.'" >'.$descripcion_p.' - '.$anio_p.'</option> '; 
          
            
            
        }
       
        ?>
      
    </select>
        <br>
     
 
                 <div id="resultados"> </div>
         <div id="resultados1"> </div>
        
  </div>



<!-----------------------------------------------------MODAL NUEVA TORRE---------------------------------------------------------------------------->



<div class="modal fade" id="NuevaTorre" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nuevo Egreso</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos de egreso</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="php/nueva-torre.php" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                       <!--div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="fecha_egreso" type="date" class="form-control" placeholder="Fecha del egreso" value="" required id="fecha_egreso">
                                            </div>
                                        </div-->
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Monto ($):</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="Monto del egreso" value="" name="monto" required id="monto">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Descripción:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Descripcion del egreso" value="" name="descripcion" required id="descripcion">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Tipo egreso:</label>
                                           <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <select  name="tipo_egreso" id="tipo_egreso" class="form-control" style="font-size:" required>
                                                  <option value="TIPO A">A</option>
                                                  <option value="TIPO B">B</option>    
                                                     
                                                </select>
                                           </div>
                                        </div>
                                        <input type="hidden" class="form-control" value="<?php echo $id_consorcio?>" name="id_consorcio" id="id_consorcio">
                                     
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="button" class="btn btn-success" value="Guardar" onclick="guardarEgreso();">
                                                
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
function guardarEgreso(){
    
     var id_consorcio=$('#id_consorcio').val();
    //var fecha = $('#fecha_egreso').val();
    var monto = $('#monto').val();
    var descripcion = $('#descripcion').val();
    var tipo_egreso = $('#tipo_egreso').val();
   
    var p = $("#selectper:visible").val();
    
    $.ajax({
    type: 'POST', 
    url: 'php/nuevo-egreso.php',
    data:{id_consorcio:id_consorcio, /*fecha_egreso:fecha,*/ monto:monto, descripcion:descripcion , tipo_egreso: tipo_egreso},
    success: function(resp){
        if(resp!=""){           
          $('#resultados').html(resp);
          cambiar(function(){            
            $("#selectper:visible").val(p);
            cambiarPeriodo($("#selectcon").val());
          });
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
    function cambiarPeriodo(id_consorcio){
      
        var envio = $('#selectper').val();
        var idconsorcio=id_consorcio;
    if(envio!=0)
{
    $.ajax({
    type: 'POST', 
    url: 'egresos-periodo.php',
      data:{search:envio, id_consorcio:idconsorcio},
    success: function(resp){
        if(resp!=""){
           
            $('#resultados1').html(resp);
        }
        
        
    }
})
}
    else
        $('#resultados1').html("");
        
        
    }


</script>


