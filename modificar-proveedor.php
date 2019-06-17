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
    
    $idproveedor=$_GET['idproveedor'];
    $consulta="SELECT * FROM proveedor WHERE idproveedor=$idproveedor";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $idproveedor=$fila['idproveedor'];
    $raz_soc_p=$fila['razon_soc_prov'];
    $cuit=$fila['cuit'];
    $tel=$fila['tel_prov'];
    $domicilio=$fila['domicilio_prov'];
    $email=$fila['email_prov'];
    $falta=$fila['fecha_alta'];
   ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Modificar Proveedor</h1>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Modificar Proveedor:</div>
    <div class="panel-body">
                <form action="php/actualizar-proveedor.php" id="form_personal" method="post" name="form_npersonal" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Razón Social:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="razon_social" type="text" class="form-control" placeholder="Razón social"  required id="nombre" value="<?php echo $raz_soc_p;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">CUIT:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="CUIT" name="cuit" required id="apellido_p"  value="<?php echo $cuit;?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Teléfono:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Teléfono"  name="telefono" required id="dni_p" value="<?php echo $tel;?>">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Domicilio:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Domicilio"  name="domicilio" required id="dni_p" value="<?php echo $domicilio;?>">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">E-mail:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="email" class="form-control" placeholder="Email"  name="mail" required id="dni_p" value="<?php echo $email;?>">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha Alta:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="date"  class="form-control" placeholder="Fecha de alta del proveedor"  name="fecha_alta" required id="dni_p" value="<?php echo $falta;?>">
                                            </div>
                                        </div>
                                       
                                                <input type="hidden"  name="idproveedor" value="<?php echo $idproveedor?>">
                                       
                                       
                                       
                                      
                                          
                                          <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
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