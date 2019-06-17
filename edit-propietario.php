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
    
    $idpropietario=$_GET['idpropietario'];
    $consulta="SELECT * FROM propietario WHERE idpropietario=$idpropietario";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
   $nombres=$fila['nombres'];
$apellidos=$fila['apellidos'];
$dni=$fila['dni'];
$email=$fila['mail'];
$telefono=$fila['telefono'];
$fecha_nac=$fila['fecha_nac'];
$domicilio=$fila['domicilio'];
        ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Modificar datos de propietario</h1>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Modificar Propietario:</div>
    <div class="panel-body">
        <form action="php/modificar-propietario.php" id="form_unidades" method="post" name="form_unidades" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombres:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_p" type="text" class="form-control" placeholder="Nombres del propietario" value="<?php echo $nombres ?>" required id="nombre_p">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Apellidos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Apellidos del propietario" value="<?php echo $apellidos ?>" name="apellido_p" required id="apellido_p">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">DNI:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="DNI del propietario"  value="<?php echo $dni ?>" name="dni_p" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">E-mail:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="email_p" type="email" class="form-control" placeholder="E-mail del propietario" value="<?php echo $email ?>"  id="email_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Teléfono:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="tel_p" type="tel" class="form-control" placeholder="Teléfono del propietario" value="<?php echo $telefono ?>" required id="tel_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha de Nacimiento:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input required name="fn_p" type="date" class="form-control" placeholder="Fecha de nacimiento del propietario" value="<?php echo $fecha_nac ?>"  id="fn_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Domicilio:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="dom_p" type="text" class="form-control" placeholder="Calle, Nro. Calle, Prov. y Localidad del propietario" value="<?php echo $domicilio ?>" required id="dom_p">
                                                 <input name="idpropietario" type="hidden" class="form-control"  value="<?php echo $idpropietario ?>" required id="idpropietario">
                                            </div>
                                          
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