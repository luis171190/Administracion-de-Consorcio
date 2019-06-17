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
         SidebarConsorcista(); 
 $id_usuario = $_SESSION['id_usuario'];   
 $consulta1  = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
 $resultado1 = $connect->query($consulta1);
 while ($fila1 = mysqli_fetch_assoc ($resultado1))
 {
     $nombres        = $fila1['nombres'];
     $apellidos      = $fila1['apellidos'];
     $correo         = $fila1['correo'];
     $nombre_usuario = $fila1['nombre_usuario'];
     $fecha_creacion = $fila1['fecha_creacion'];
  }
        ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Datos de Consorcista</h1>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Modificar datos de Consorcista:</div>
    <div class="panel-body">
        <form action="php/modificar-usuario-consorcista.php" id="form_unidades" method="post" name="form_unidades" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombres:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_p" type="text" class="form-control" placeholder="Nombres del consorcista" value="<?php echo $nombres ?>" required id="nombre_p">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Apellidos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Apellidos del consorcista" value="<?php echo $apellidos ?>" name="apellido_p" required id="apellido_p">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombre de Usuario:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="n_usuario" type="tel" class="form-control" readonly placeholder="Nombre de usuario" value="<?php echo $nombre_usuario ?>" required id="n_usuario">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">E-mail:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="email" type="email" class="form-control" placeholder="E-mail del consorcista" value="<?php echo $correo ?>"  id="email">
                                            </div>
                                        </div>
                                     
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha de Alta de Cuenta:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input required name="f_alta" type="date" class="form-control" readonly placeholder="Fecha de alta de cuenta" value="<?php echo $fecha_creacion ?>"  id="f_alta">
                                            </div>
                                        </div>
                                        
                                             <input name="idusuario" type="hidden" class="form-control"  value="<?php echo $id_usuario ?>" required id="idusuario">
                                         
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