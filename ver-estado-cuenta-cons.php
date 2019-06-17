<?php
require_once('php/estructura.php');
require_once('php/mercadopago.php');

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
         $consulta="SELECT * FROM pago_liquidacion INNER JOIN liquidacion_unidad INNER JOIN unidad ON liquidacion_unidad_idliquidacion_unidad=idliquidacion_unidad AND unidad_idunidad=idunidad AND idunidad=$idunidad";
$resultado=$connect->query($consulta);
        

      
        ?>
      
    <h1>Ver Estado Cuenta : <?php echo '<strong>'.utf8_encode($razon_social).'</strong>';?>  </h1>
     </div>
     
      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
        
     <!--    <div class="alert alert-danger" style="text-align:center">
             <strong>Atención: Solo se podrán buscar a los pacientes que posean una cuenta en Excelsius Salud.</strong>
     
         </div>-->
         
    
     </div>
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Estado de cuenta:</div>
    <div class="panel-body">
                             <div class="breadcrumb">
        <?php 
          echo '<div class="">';
         
          echo '<p><strong>Razón Social: </strong> '.utf8_encode($razon_social).' - <strong>CUIT: </strong>'.$cuit.'</p>';
      
         // echo '<p><strong>Cant. Torres:</strong> '.$cant_torres.'</p>';
          
          echo '<p><strong>Provincia: </strong>'.utf8_encode($prov.' - <strong> Localidad: </strong>'.$localidad).'</p>';
       
          echo '<p><strong>Calle: </strong>'.utf8_encode($calle).' - <strong>Nro.: </strong>'.$nro_calle.'</p>';
          
          echo '<p><strong>Unidad: </strong>'.$unidad.'</p>';
          echo '</div> ';
          
         
         ?>
</div>

     <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Unidad</th>
         <th class="info">Detalle</th>
          <th class="info">Monto</th>
         <th class="info">Monto (c/i)</th>
         <th class="info">Pago</th>
         <th class="info"> F. Pago</th>
        <th class="info"> Monto Pagado</th>
         <th class="info"> Forma de Pago</th>
         <th class="info"> </th>
     
     </thead> 
         <tbody>


<?php

  
        while($fila=mysqli_fetch_assoc($resultado))
            
        {
          
            
            $idliquidacion_unidad=$fila['idliquidacion_unidad'];
            //echo $idliquidacion_unidad;
            $consulta2="SELECT * FROM liquidacion_unidad INNER JOIN liquidacion INNER JOIN periodo ON idliquidacion_unidad=$idliquidacion_unidad AND liquidacion_idliquidacion= idliquidacion AND periodo_idperiodo=idperiodo";
            $resultado2=$connect->query($consulta2);
            $fila2=mysqli_fetch_assoc($resultado2);
              if($fila2['estado_liq']=='pendiente')
            {
                
            }
            else
            {
            $periodo=$fila2['descripcion_periodo'].'-'.$fila2['anio'];
            $unidad=$fila['piso'].' '.$fila['departamento'];
            
            $monto=$fila['monto_si'];
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $dma=date("Y/m/d");
            $fech_venc=$fila['fecha_venc'];
            $dias= (strtotime($dma)-strtotime($fech_venc))/86400;
            $pago=$fila['estado'];
            $fecha_pago=$fila['fecha_pago'];
            $forma_pago=$fila['tipo_pago'];
	       if($pago==0)
           {
               $pago_estado='NO';
               $fecha_pago='-';
               $monto_pago='-';
               //$forma_pago
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
            
           }
            else
            {
                $pago_estado='SI';
                $interes=0;
                $t_interes=$fila['monto_interes'];
                $monto_pago=$fila['monto_total'];
               
                //$monto_interes=$fila['monto_interes'];
            }
                if($forma_pago == '')
                {
                    $forma_pago = '-';
                }
           
                     echo ' 
                     <td>'.$unidad.'</td>
                     <td>'.$periodo.'</td>
                     <td>$ '.$monto.'</td>
                     <td>$ '.$t_interes.'</td>
                     <td>'.$pago_estado.'</td>
                     <td>'.$fecha_pago.'</td>
                      <td>$ '.$monto_pago.'</td>
                     <td> '.$forma_pago.'</td>';
if($pago==0) // BOTON DE MERCADO LIBRE
    {
            ?>
            <td> 
            <?php
            $titulo_pago=$periodo.' '.$unidad;                        
            require_once ('php/mercadopago.php');

            $mp = new MP("986058503175541", "GokLtHThcSclAYyqLMDhBFwQ8KopM8ud");

            $mp->sandbox_mode(TRUE);

            $preference_data = array(
            "items" => array(
                array(
                    "title" => $titulo_pago,
                    "quantity" => 1,
                    "currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
                    "unit_price" => $t_interes
                )
            )
            );

            $preference = $mp->create_preference($preference_data);
            ?>



            <a  class="btn btn-info btn-xs" href="<?php echo $preference['response']['init_point']; ?>">Pagar</a>
             </td>
        <?php     
    }
             
             ?>
           
            
                     </tr>
                     <?php
                          
           
           
        
        }
        }
            

?>
        </tbody>    
      
           
      </table>
                        <div style="text-align:center">
       <a class="btn btn-info" href="RPT-estado-cuenta.php?idunidad=<?php echo $idunidad ?>&idconsorcio=<?php echo $id_consorcio ?>&unidad=<?php echo $unidad ?>" style="color:white">Imprimir</a>
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