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
             Seleccione unidad
         </div>
    <div class="panel-body">
 <?php 
       // $id_usuario=$_SESSION['id_usuario'];
        $consulta_1="SELECT * FROM unidad INNER JOIN torre INNER JOIN consorcio ON torre_idtorre=idtorre AND consorcio_idconsorcio=idconsorcio AND idconsorcio=$id_consorcio";
        $resultado1=$connect->query($consulta_1);
         echo '<select class="form-control" id="selectunidad" name ="selectunidad" class="selectpicker" data-style="btn-info" onchange="cambiarUnidad('.$id_consorcio.'); ">';
        echo '<option value="0" >Seleccione..</option> '; 
        
        while($fila1=mysqli_fetch_assoc($resultado1))
        {
            $idunidad=$fila1['idunidad'];
            $piso=$fila1['piso'];
            $dpto=$fila1['departamento'];
          echo '
        <option value="'.$idunidad.'" >'.$piso.' '.$dpto.'</option> '; 
          
            
            
        }
       
        ?>
      
    </select>
        <br>
   
                 <div id="resultados"> </div>
         <div id="resultados1"> </div>
  </div>







         </div>
<script>
    function cambiarUnidad(id_consorcio){
      
        var envio = $('#selectunidad').val();
        var idconsorcio=id_consorcio;
    if(envio!=0)
{
    $.ajax({
    type: 'POST', 
    url: 'estado-unidad.php',
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