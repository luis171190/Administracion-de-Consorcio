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
             Listado  de anuncios
         </div>
        
    <div class="panel-body">
    
       
    <!--<form class="formulario-dia"  method="post" id="search_form" action="" name="search_form">
    
    
      <br>
      <div class="input-group">
          <span class="input-group-addon" >Buscar</span>
          <input type="text" class="form-control" placeholder="Nombre, apellido o DNI del paciente" id="search" required name="search" aria-describedby="basic-addon1">
      </div>
      
    
      <br>
      

  </form>-->
        <?php 
    $consulta2="SELECT * FROM anuncio WHERE consorcio_idconsorcio=$id_consorcio";
    $resultado2=$connect->query($consulta2);
        $c=1;
    while($fila2=mysqli_fetch_assoc($resultado2))
    { 
        $idanuncio=$fila2['idanuncio'];
        $titulo=utf8_encode($fila2['titulo']);
        $contenido=utf8_encode($fila2['contenido']);
        $fecha=$fila2['fecha_creacion'];
       
        
        if($c==1)//primer elemento, debe estar actve
        {
            $style='active';
        }
        else
        {
          $style='';   
        }
        echo'
        
               <div class="list-group">
  <a href="ver-anuncio.php?idanuncio='. $idanuncio.'&idconsorcio='.$id_consorcio.'" class="list-group-item '.$style.'">
    <h4 class="list-group-item-heading">'.$titulo.'</h4>
    <p class="list-group-item-text">'.$fecha.'</p>
  </a>
</div>
        ';
        
        
       $c=$c+1; 
    }
       
        ?>
      
   <div style="text-align:center">
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevoAnuncio" style="color:white">Nuevo Anuncio</a>
    </div>
 
        <br>
     
 
                 <div id="resultados"> </div>
         <div id="resultados1"> </div>
        
  </div>



<!-----------------------------------------------------MODAL NUEVA TORRE---------------------------------------------------------------------------->



<div class="modal fade" id="NuevoAnuncio" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nuevo Anuncio</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading"></div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="fecha_anuncio" required type="date" class="form-control" placeholder="Fecha del egreso" value="" required id="fecha_anuncio">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Título:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Título del anuncio"  name="titulo"  id="titulo_a">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Contenido:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                  <textarea   required name="contenido" id="contenido_a" placeholder="Contenido del anuncio" class="form-control" rows="5" ></textarea>
                                            </div>
                                          
                                      </div>
                                        <input type="hidden" class="form-control" value="<?php echo $id_consorcio?>" name="id_consorcio" id="id_consorcio">
                                   
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="button" class="btn btn-success" value="Guardar" onclick="guardarAnuncio();">
                                                
                                            </div>
                                        </div>
                                   
                            </form>                                                                                                                                                                                                                                      
                                                                                              
               </div>                
           </div>            
        </div>
                   
        <br>
        <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>  
    

         </div>
     </div>
        </div>



         </div>
</div>

<script>
function guardarAnuncio(){
    
     var id_consorcio=$('#id_consorcio').val();
    var fecha = $('#fecha_anuncio').val();
       var titulo = $('#titulo_a').val();
    var contenido = $('#contenido_a').val();
   
 
   
    $.ajax({
    type: 'POST', 
    url: 'php/nuevo-anuncio.php',
    data:{id_consorcio:id_consorcio, fecha_anuncio:fecha, titulo:titulo, contenido:contenido},
    success: function(resp){
        if(resp!=""){
           
            $('#resultados').html(resp);
        }
     
        
    }
})
    
         
  
    
}
 

</script>

