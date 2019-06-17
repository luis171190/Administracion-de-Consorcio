<?php
require_once('php/estructura.php');

validarSesionPaciente();
    
   
//$id_profesional_session=$_SESSION['id_profesional_sesion'];
//$_SESSION['id_profesional'] = $id_profesional_session;

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>A.C.O</title>
        <link rel="shortcut icon" href="img/icono.ico">
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
       <script type="text/javascript" src="js/ajax_usuarios.js"></script>
       
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="sweetalert/sweetalert.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/hc-buscador.css">
        <link rel="stylesheet" href="css/sidebar-profesional.css">
       
      
        <script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        
       
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/validar-formhc.js"></script>
       
    </head>
    <body>
    
    <header>


<?php headerAdm();?>

</header>

<section class="principal"> 
     <?php
        SidebarConsorcista(); 
        ?>
    
     <div class="contenido" id="contenido">
     <div id="titulo">
           <?php 
        $id_usuario=$_SESSION['id_usuario'];
        $consulta_1="SELECT * FROM usuario_consorcio INNER JOIN consorcio INNER JOIN unidad ON usuario_id_usuario = $id_usuario AND consorcio_idconsorcio=idconsorcio AND unidad_idunidad=idunidad ";
        $resultado1=$connect->query($consulta_1);
        $fila1=mysqli_fetch_assoc($resultado1);
         $id_consorcio=$fila1['idconsorcio'];
         $idunidad=$fila1['idunidad'];
         $unidad=$fila1['piso'].' '.$fila1['departamento'];
        $razon_social=$fila1['razon_social'];
         $cuit=$fila1['cuit']; 
//$cant_torres=$fila['cant_torres'];
$prov=$fila1['provincia'];
$localidad=$fila1['localidad'];
$calle= $fila1['calle'];
$nro_calle=$fila1['nro_calle'];
        

      
        ?>
      
    <h1>Ver mora : <?php echo '<strong>'.utf8_encode($razon_social).'</strong>';?>  </h1>
     </div>
     
      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
        
     <!--    <div class="alert alert-danger" style="text-align:center">
             <strong>Atención: Solo se podrán buscar a los pacientes que posean una cuenta en Excelsius Salud.</strong>
     
         </div>-->
         
    
     </div>
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Listado de mora:</div>
    <div class="panel-body">
                             <div class="breadcrumb">
        <?php 
          echo '<div class="">';
         
          echo '<p><strong>Razón Social: </strong> '.utf8_encode($razon_social).' - <strong>CUIT: </strong>'.$cuit.'</p>';
      
         // echo '<p><strong>Cant. Torres:</strong> '.$cant_torres.'</p>';
          
          echo '<p><strong>Provincia: </strong>'.utf8_encode($prov.' - <strong> Localidad: </strong>'.$localidad).'</p>';
       
          echo '<p><strong>Calle: </strong>'.$calle.' - <strong>Nro.: </strong>'.$nro_calle.'</p>';
          
          echo '<p><strong>Unidad: </strong>'.$unidad.'</p>';
          echo '</div> ';
          
         
         ?>
</div>

   <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
     
         <th class="info">Piso</th>
         <th class="info">Depto.</th>
         <th class="info">Detalle</th>
         <th class="info">Monto s/i</th>
         <th class="info">Fecha Vec.</th>
         <th class="info">Interés</th>
         <th class="info">Total</th>
      
           
         
     
     </thead> 
         <tbody>
            <?php
                date_default_timezone_set("America/Argentina/Buenos_Aires");
   $dma=date("Y/m/d");
     $consulta_t="SELECT * FROM liquidacion INNER JOIN liquidacion_unidad INNER JOIN unidad INNER JOIN pago_liquidacion INNER JOIN periodo ON periodo_idperiodo=idperiodo AND idliquidacion=liquidacion_idliquidacion AND consorcio_idconsorcio=$id_consorcio  AND unidad_idunidad=idunidad AND idliquidacion_unidad= liquidacion_unidad_idliquidacion_unidad AND estado =0  AND unidad_idunidad=$idunidad ORDER BY idperiodo";
     $resultado_t=$connect->query($consulta_t);
             

        $c=1;
        while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            if($fila_t['estado_liq']=='pendiente')
            {
                
            }
            else
            {
           $piso=$fila_t['piso'];
           $dpto=$fila_t['departamento'];
           $monto=$fila_t['monto_si'];
        $anio=$fila_t['anio'];
        $desc_per=$fila_t['descripcion_periodo'];
        $periodo2=$desc_per.'-'.$anio;
         //obtener fecha actual.
 
            //fecha de vencimiento
            $fech_venc=$fila_t['fecha_venc'];
           $dias= (strtotime($dma)-strtotime($fech_venc))/86400;
	     //  $dias = abs($dias); 
            $dias = floor($dias);	
            if($dias<0)
            {
                $interes=0;
            }
            else
            {
            $interes=0.03*$monto*$dias;
            }
            $t_interes=$monto+$interes;
            
        
                     echo '  
                     <td>'.$piso.'</td>
                     <td>'.$dpto.'</td>
                      <td>'.$periodo2.'</td>
                     <td>$ '.$monto.'</td>
                      <td>'.$fech_venc.'</td>
                         <td>$ '.$interes .'</td>
                          <td>$ '.$t_interes .'</td>';?>
             
                 
                  
           
            
                     </tr>
                     <?php
                         
           $c=$c+1;
           
        }
        }
    ?>
         
         </tbody>    
           
      </table>
               <div style="text-align:center">
       <a class="btn btn-info" href="RPT-morosos-consorcista.php?idconsorcio=<?php echo $id_consorcio ?>&idunidad=<?php echo $idunidad ?>" style="color:white">Imprimir</a>
    </div>
   </div>
   
 
  </div>
   
      <div id="resultados1"></div>
    
</div>


 
        
        <script src="js/jquery-ui.min.js"></script>
       
  
  </div> 
    
    <br>
    <br>
    <br>
     
    
     
      
      
  </div> 
    </div>
    
<div id="resultados">
</div>
    
   </section> 
<script>
    function cambiarPeriodo(id_consorcio){
      
        var envio = $('#selectper').val();
        var idconsorcio=id_consorcio;
    if(envio!=0)
{
    $.ajax({
    type: 'POST', 
    url: 'egresos-periodo-cons.php',
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

 <footer>
            <?php 
                footer();
            ?>
        </footer>  
        
        
        <script src="js/main.js"></script> 
        
    </body>
</html>