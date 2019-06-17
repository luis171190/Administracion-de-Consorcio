<?php
require_once('php/estructura.php');

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
        SidebarAdm(); 
    
        ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1>Liquidación de Expensas </h1>
     </div>
     
     
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Gestión:</div>
    <div class="panel-body">
   Por favor seleccione el consorcio a gestionar: <br>
        <br>
    <!--<form class="formulario-dia"  method="post" id="search_form" action="" name="search_form">
    
    
      <br>
      <div class="input-group">
          <span class="input-group-addon" >Buscar</span>
          <input type="text" class="form-control" placeholder="Nombre, apellido o DNI del paciente" id="search" required name="search" aria-describedby="basic-addon1">
      </div>
      
    
      <br>
      

  </form>-->
        <?php 
        $id_usuario=$_SESSION['id_usuario'];
        $consulta_1="SELECT * FROM usuario_consorcio INNER JOIN consorcio ON usuario_id_usuario = $id_usuario AND consorcio_idconsorcio=idconsorcio";
        $resultado1=$connect->query($consulta_1);
         echo '<select class="form-control" id="selectcon" name ="selectcon" class="selectpicker" data-style="btn-info" onchange="cambiar();">';
        echo '<option value="0">Seleccione..</option> '; 
        while($fila1=mysqli_fetch_assoc($resultado1))
        {
            $id_consorcio=$fila1['idconsorcio'];
          echo '
        <option value="'.$id_consorcio.'" >'.$fila1['razon_social'].'</option> '; 
          
            
            
        }
       
        ?>
      
    </select>
      
  


   
      

        
  </div>
   
      <div id="resultados"></div>
    
</div>


 
        
        <script src="js/jquery-ui.min.js"></script>
       
  
  </div> 
    
    <br>
    <br>
    <br>
     
    
     
      
      
  </div> 
  
  </div> 
   </div> 
    </div>
    
     
    
   </section> 

<script>
function cambiar(){
    
    
     var envio = $('#selectcon').val(); 
    if(envio!=0)
{
    $.ajax({
    type: 'POST', 
    url: 'info-liquidacion.php',
    data:('search='+envio),
    success: function(resp){
        if(resp!=""){
           
            $('#resultados').html(resp);
        }
        
        
    }
})
}
    else
        $('#resultados').html("");
        
  
    
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