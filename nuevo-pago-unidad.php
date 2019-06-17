<?php
require_once('php/estructura.php');
require_once('php/conn/connect.php');
validarSesionAdmin();
    
   
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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">        
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/hc-buscador.css">
        <link rel="stylesheet" href="css/sidebar-profesional.css">
       
      
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        
       
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
       
       
    </head>
    <body>
    
    <header>


<?php headerAdm();?>

</header>

<section class="principal"> 
     <?php
        SidebarAdm(); 
 $unidad               = $_GET['unidad']; 
 $idliquidacion_unidad = $_GET['idliquidacion_unidad'];
 $interes              = $_GET['interes'];
 $total                = $_GET['total'];
 $periodo              = $_GET['periodo'];
 $monto                = $_GET['monto'];  
 $idconsorcio          = $_GET['idconsorcio']; 
 $idunidad             = $_GET['idunidad']; 
 $consulta             = "SELECT idpago_liquidacion FROM  pago_liquidacion ORDER BY idpago_liquidacion DESC LIMIT 1";
 $resultado            = $connect->query($consulta);

    
    
    //"php/generar-pago-unidad.php"
    
    
    
        ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Generar pago : Unidad <?php echo $unidad ?></h1>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Detalles de pago:</div>
    <div class="panel-body">
        <form action="php/generar-pago-unidad.php" id="form_unidades" method="post" name="form_unidades" class="form-horizontal" onsubmit="return validar();">
                                      
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Unidad:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_p" type="text" class="form-control" placeholder="Nombres del propietario"  readonly value="<?php echo $unidad  ?>" required id="nombre_p">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Período:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control"  readonly value="<?php echo $periodo ?>" name="periodo1" required id="periodo1">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Monto $ (sin intereses ):</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" readonly placeholder="DNI del propietario"  value="<?php echo $monto ?>" name="monto_si" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Intereses $:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="intereses" type="email" class="form-control"  readonly placeholder="E-mail del propietario" value="<?php echo $interes ?>"  id="email_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Monto Con Intereses $:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="monto_ci" type="tel" class="form-control" readonly placeholder="Teléfono del propietario" value="<?php echo $interes+$monto ?>" required id="tel_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha de Pago:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input required name="fecha_pago" type="date" class="form-control" placeholder="Fecha de nacimiento del propietario" value="<"  id="fn_p">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Forma de Pago:</label>
                                           <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <select  name="tipo_pago" id="tipo_egreso" class="form-control" style="font-size:" required>
                                                   <option value="">Seleccione..</option>
                                                  <option value="Efectivo">Efectivo</option>
                                                  <option value="Tarj. Credito">Tarjeta de Crédito</option>    
                                                   <option value="Tarj. Debito">Tarjeta de Débito </option>
                                                    <option value="Cheque">Cheque</option>
                                                </select>
                                           </div>
                                             <input name="idliquidacion_unidad" id="idliquidacion_unidad" type="hidden" class="form-control"  value="<?php echo $idliquidacion_unidad ?>">
                                             <input name="idconsorcio" id="idconsorcio" type="hidden" class="form-control"  value="<?php echo $idconsorcio ?>">
                                             <input name="idunidad" id="idunidad" type="hidden" class="form-control"  value="<?php echo $idunidad ?>">
                                        </div>
                                          
                                          <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-danger" value="PAGAR">
                                             </div>
                                             </div>
                                     
</div>
                                      

                                      
                                      
                                          
        </form> 
  
              

    
    
         </div>
       
        </div>  
        </div>
 
  
        
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->       
        
    
    
   
    
   </section> 




 <footer>
            <?php 
                footer();
            ?>
        </footer>  
        
        
        <script src="js/main.js"></script> 

  <script src="js/jquery-ui.min.js"></script>
        
    </body>
</html> 