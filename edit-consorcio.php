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
    
    $idconsorcio=$_GET['idconsorcio'];
    $consulta="SELECT * FROM consorcio WHERE idconsorcio = $idconsorcio";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
$raz_soc=utf8_encode($fila['razon_social']);
$cuit=$fila['cuit']; 
//$cant_torres=$fila['cant_torres'];
$prov=utf8_encode($fila['provincia']);
$localidad=utf8_encode($fila['localidad']);
$locprov = $localidad. ' '. $prov;
$calle= utf8_encode($fila['calle']);
$nro_calle=$fila['nro_calle'];

        ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Modificar datos de consorcio</h1>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Modificar Consorcio:</div>
    <div class="panel-body">
        <form action="php/modificar-consorcio.php" id="form_unidades" method="post" name="form_unidades" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Razón Social:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="raz_soc" type="text" class="form-control" placeholder="Nombres del propietario" value="<?php echo $raz_soc ?>" required id="nombre_p" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">CUIT:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="CUIT" value="<?php echo $cuit ?>" name="cuit" required id="apellido_p">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Localidad:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="DNI del propietario"  value="<?php echo $localidad ?>" name="localidad" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Provincia:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="provincia" type="text" class="form-control" placeholder="E-mail del propietario" value="<?php echo $prov ?>"  id="email_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Calle:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="calle" type="text" class="form-control" placeholder="Teléfono del propietario" value="<?php echo $calle ?>" required id="tel_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nro. Calle:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input required name="nrocalle" type="number" class="form-control" placeholder="Fecha de nacimiento del propietario" value="<?php echo $nro_calle ?>"  id="fn_p">
                                            </div>
                                        </div>                                       
                                                 <input name="idconsorcio" type="hidden" class="form-control"  value="<?php echo $idconsorcio ?>" required id="idconsorcio">
                                            </dv>
                                           <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                             </div>
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