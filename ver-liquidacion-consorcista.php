
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
    <h1>Liquidación de Expensas </h1>
     </div>
          <?php  
   
require_once('php/conn/connect.php');


$idliquidacion=$_GET['idliquidacion'];
$mes=$_GET['mes'];
$anio=$_GET['anio'];
$id_consorcio=$_GET['idconsorcio'];
$desc=$_GET['desc'];
$es_liq=$_GET['estado_l'];
$periodo_mail = $desc.' '. $anio;
?>
     
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading"> LIQUIDACION MENSUAL CORRESPONDIENTE A <strong>  <?php echo $desc.' '. $anio ?> </strong> <br></div>
    <div class="panel-body">
  
<!--        <br>
<strong> 1) INFORME DE SALDOS DE CAJA</strong>
           <br>-->
           <br>
   <strong>1) DETALLE DE EGRESOS </strong>  
           <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Concepto</th>
         <th class="info">Tipo</th>
         <th class="info">Monto</th>
         
         
     
     </thead> 
         <tbody>
            
            <?php
    
$consulta3= "SELECT * FROM egreso WHERE month (fecha_egreso)=$mes AND year (fecha_egreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado3=$connect->query($consulta3);
$monto_e=0;
        
 $c=1;
          $monto_a=0;
           $monto_b=0;
       while($fila3=mysqli_fetch_assoc($resultado3))
            
        {   
            
    $fila_monto=$fila3['monto_egreso'];
   // $monto_e=$fila_monto+$monto_e;
    $desc_egreso=$fila3['descripcion_egreso'];
    $monto_egreso=$fila3['monto_egreso'];
    $tipo_egreso=$fila3['tipo_egreso'];
           
         
           if($tipo_egreso=='TIPO A')
           {
               $monto_a=$monto_a+$monto_egreso;
           }
           else
           {
               $monto_b=$monto_b+$monto_egreso;
           }
           
           
                     echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$desc_egreso.'</td>
                     <td>'.$tipo_egreso.'</td>
                     <td> $ '.$monto_egreso.'</td>';?>
            
                     </tr>
                     <?php
                         
           $c=$c+1;
           
        }
        $monto_total=$monto_a+$monto_b;
        echo '
       
        <tr ><td></td> 
         <td> <strong>TOTAL EGRESOS A (ORD)</strong></td>
         <td></td>
          <td > $ <strong>'.$monto_a.'</strong></td></tr>
          
        <tr ><td></td> 
         <td> <strong>TOTAL EGRESOS B (EXT) </strong></td>
         <td></td>
          <td > $ <strong>'.$monto_b.'</strong></td></tr>
          <tr class="danger"><td></td> 
         <td> <strong>TOTAL EGRESOS</strong></td>
         <td></td>
          <td > $ <strong>'.$monto_total.'</strong></td></tr>' ;
               
                       ?>
        
        
        
        
          
    
         
         </tbody>    
           
      </table>
   </div>
        <br>
        
       <strong> 2) DETALLES DE INGRESOS</strong> 
        


         <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="">Nro.</th>
         <th class="">Concepto</th>
         
         <th class="">Monto</th>
         
         
     
     </thead> 
         <tbody>
            
            <?php
    
$consulta4= "SELECT * FROM ingreso WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado4=$connect->query($consulta4);
$monto_i=0;
while($fila4=mysqli_fetch_assoc($resultado4))
{
        
 $c=1;
         
    
    $fila_monto1=$fila4['monto'];
    $monto_i=$fila_monto1+$monto_i;
     $desc_ingreso=$fila4['descripcion'];
    $monto_ingreso=$fila4['monto'];
          
                     echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$desc_ingreso.'</td>
                    
                     <td> $ '.$monto_ingreso.'</td>';?>
            
                     </tr>
                     <?php
                         
           $c=$c+1;
           
        }
          echo '
       
        <tr class="success"><td></td> 
         <td> <strong>TOTAL INGRESOS</strong></td>
         <td> $'.$monto_i.'</td>
         ';
        
      
               
                       ?>
        
        
        
        
          
    
         
         </tbody>    
           
      </table>
   </div>
        

       <!--<strong> TOTAL A LIQUIDAR=</strong> --> <?php 
         //  $monto_liq=$monto_total-$monto_i;
          // echo '$'. $monto_total .'- $'. $monto_i .'=<strong>$'.$monto_liq.'</strong>';?>
    <strong><br> TOTAL EGRESOS A (ORD) = TOTAL EGRESOS A (ORD) MES  - INGRESOS <br> <br>TOTAL EGRESOS A (ORD) =  </strong>
    <?php 
    $total_ord_act_cobrar = $monto_a- $monto_i;
    echo '$ '.$monto_a .' - $ '.$monto_i .' = $ '.$total_ord_act_cobrar;
           
           //echo '$'. $monto_a .'- $'. $monto_i .'=<strong>$'.$monto_a - $monto_i.'</strong>';?>
  <br>
    <br>
    <br>
    
    <strong> 3) PRORRATEO POR UNIDADES</strong>  <br>
    
     <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class=""></th>
         <th class="">Piso</th>
         
         <th class="">Depto.</th>
         <th class="">%</th>
      
         <th class="">Exp. Ord.</th>
         <th class="">Exp. Ext.</th>
         <th class="">Total</th>
         
         
         
     
     </thead> 
         <tbody>
<?php
    //DATOS DE LIQUIDACION_UNIDAD

$consulta8="SELECT * FROM liquidacion_unidad  INNER JOIN unidad ON liquidacion_idliquidacion=$idliquidacion AND unidad_idunidad=idunidad ORDER BY  piso ASC";
$resultado8=$connect->query($consulta8);
    
    $c=1;
while($fila8=mysqli_fetch_assoc($resultado8))
{
     
   $idunidad=$fila8['idunidad'];
    $piso=$fila8['piso'];
    $dto=$fila8['departamento'] ;
    $unidad=$fila8['piso'].' -'.$fila8['departamento'] ;
    $subtotal=$fila8['subtotal_ord'];
    $subtotal_ext=$fila8['subtotal_ext'];
    $porc=$fila8['porcentaje_pago'];
    $t_expensas=$subtotal+$subtotal_ext;
    
    /*$cons_saldo="SELECT * FROM pago_liquidacion INNER JOIN liquidacion_unidad ON liquidacion_unidad_idliquidacion_unidad=idliquidacion_unidad AND unidad_idunidad=$idunidad";
    $res_saldo=$connect->query($cons_saldo);
    $fila_saldo=mysqli_fetch_assoc($res_saldo);
    $estado_pag=$fila_saldo['estado'];
    if($estado==0)
    {
        $monto_si_saldo=$fila_saldo['monto_si'];
        
    }*/
    
    
      echo ' <p id="contador"><tr><td>'.$c.'</td> </p>
                     <td>'.$piso.'</td>
                     <td>'.$dto.'</td>
                     <td>'.$porc.'</td>
                    
                     <td> $ '.$subtotal.'</td>
                   
                     <td> $ '.$subtotal_ext.'</td>
                     <td> $ '.$t_expensas.'</td>';
          ?>
            
                     </tr>
                     <?php
                         
           
                $c=$c+1;
        }
        
        
     
             
             
                       ?>
           
         </tbody>    
           
      </table>
   </div>
       
    
  </div>
       <div style="text-align:center">
           
           <?php
        
           
               echo '<br>';
               echo '
           <form id="form_aceptar" action="RPT-liquidacion.php" method="post">
               
               <input type="hidden" value="'.$idliquidacion.'" name="idliquidacion28">
               <input type="hidden" value="'.$periodo_mail.'" name="periodo">
               <input type="hidden" value="'.$id_consorcio.'" name="id_consorcio">
                <input type="hidden" value="'.$mes.'" name="mes">
                <input type="hidden" value="'.$anio.'" name="anio">
                <input type="hidden" value="'.$desc.'" name="desc">
                <input type="hidden" value="'.$es_liq.'" name="estado_l">
                <input type="submit"  value=" IMPRIMIR" class="btn btn-success"style="color:white; font-weight: bold;" >
                
               </form>';
           
           ?>
    </div>
<br>
</div>
 
  </div> 

   </div> 

<?php



?>
  
 <script type="text/javascript">
function Confirmar() {
//Ingresamos un mensaje a mostrar
if (confirm('¿Desea aceptar liquidacion?. Se enviaràn emails con el detalle a cada usuario.')){     
       document.getElementById("form_aceptar").submit(); 
    }
    else
        alert("Operacion cancelada");
}
    
</script>

    
   </section> 


 <footer>
            <?php 
                footer();
            ?>
        </footer>  
        
        
        <script src="js/main.js"></script> 
        
    </body>
</html>
