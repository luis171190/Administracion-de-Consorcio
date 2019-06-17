
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
    
    $idanuncio=$_GET['idanuncio'];
    $consulta="SELECT * FROM anuncio WHERE idanuncio=$idanuncio";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $titulo=utf8_encode($fila['titulo']);
    $contenido=utf8_encode($fila['contenido']);
    $fecha=$fila['fecha_creacion'];
    $idconsorcio = $_GET['idconsorcio'];
   ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Anuncios</h1>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">VER-EDITAR ANUNCIO</div>
    <div class="panel-body" >
          
                                  <form action="php/actualizar-anuncio.php" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="fecha_anuncio" required type="date" class="form-control"  value="<?php echo $fecha ?>" required id="fecha_anuncio">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Título:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control"   name="titulo"  id="titulo_a"  value="<?php echo $titulo ?>" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Contenido:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                  <textarea   required name="contenido" id="contenido_a"  class="form-control" rows="25"   ><?php echo $contenido?></textarea>
                                                <input type="hidden" name="idanuncio" value="<?php echo $idanuncio ?>">
                                            </div>
                                          
                                      </div>
                                      
                                   
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                                
                                            </div>
                                           
                                        </div>
                                       
                            </form>  

         <div style="text-align:center">
       <a class="btn btn-info" href="RPT-anuncio.php?idconsorcio=<?php echo $idconsorcio ?>&idanuncio=<?php echo $idanuncio?>" style="color:white">Imprimir</a>
    </div>
  
              

    
    
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
    <script>
      function Imprimir()
        {
            
            
            alert("Si");
        }
        
        
    </script>
        
    </body>
</html> 