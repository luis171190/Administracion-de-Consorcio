
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Excelsius Salud</title>
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
  
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
   
        

    </head>
    <body>
    
    <header>

</header>

<section class="principal"> 
   
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1>Propietarios</h1>
     </div>
     
     
    <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Buscar Propietario</div>
    <div class="panel-body">
    Busque propietario ingresando Apellido, Nombre o DNI
    <form class="formulario-dia"  method="post" id="search_form" action="" name="search_form">
    
    
      <br>
      <div class="input-group">
          <span class="input-group-addon" >Buscar</span>
          <input type="text" class="form-control" placeholder="Ingrese un DNI" id="search" required name="search" aria-describedby="basic-addon1">
      </div>
      
    
      <br>
      

  </form>
  </div>
   
    <div id="resultados"></div>
    
</div>

  
 
        
        <script src="js/jquery-ui.min.js"></script>
       
  
  </div> 
    
   
      
  </div> 
  
  
  
   </section> 


 <footer>
</footer>  
        <script>
$(function(){
 
$('#search_form').submit(function(e){
    e.preventDefault();
})  

$('#search').keyup(function(){
 var envio = $('#search').val();    
$('#resultados').html('<h2><img src="img/loading.gif"  width=" 30"  alt="" /> Cargando </h2>')

$.ajax({
    type: 'POST', 
    url: 'php/buscador_prop.php',
    data:('search='+envio),
    success: function(resp){
        if(resp!=""){
            $('#resultados').html(resp);
        }
    }
})
    
})

})
        </script>
        
        <script src="js/main.js"></script> 
        
    </body>
</html>