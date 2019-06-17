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
    
    $idunidad=$_GET['idunidad'];
    $id_consorcio = $_GET['id_consorcio'];
         ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1 >Agregar Propietario a Torre: <p id="idunidad2"><?php echo $idunidad;  ?></p></h1>
         <div style="display: none" id= "id_consorcio"> <?php echo $id_consorcio; ?></div>
     </div>
     
           
     <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3"> 
       
         <br> 
         <br>
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Alta Propietario:</div>
    <div class="panel-body">
        <form action="php/nuevo-propietario.php" id="form_unidades" method="post" name="form_unidades" class="form-horizontal" onsubmit="return validar();">
                                      
                                          
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nombres:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nombre_p" type="text" class="form-control" placeholder="Nombres del propietario" value="" required id="nombre_p">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Apellidos:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Apellidos del propietario" value="" name="apellido_p" required id="apellido_p">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">DNI:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder="DNI del propietario"  value="" name="dni_p" required id="dni_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Mail:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="email_p" type="email" class="form-control" placeholder="E-mail del propietario" value=""  id="email_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Teléfono:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="tel_p" type="tel" class="form-control" placeholder="Teléfono del propietario" value="" required id="tel_p">
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Fecha de Nacimiento:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input required name="fn_p" type="date" class="form-control" placeholder="Fecha de nacimiento del propietario" value=""  id="fn_p">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Domicilio:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="dom_p" type="text" class="form-control" placeholder="Calle, Nro. Calle, Prov. y Localidad del propietario" value="" required id="dom_p">
                                            </div>
                                           <input name="idunidad2" id="idunidad2" type="hidden" value="<?php echo $idunidad ?>">
                                           <input name="id_consorcio" id="id_consorcio" type="hidden" value="<?php echo $id_consorcio ?>">
                                        </div>
                                         
                                          <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                             </div>
                                             </div>
                                     
</div>
                                      

                                      
                                      
                                          
        </form> 
  
              

    
    
         </div>
       <a class="btn btn-danger" data-toggle="modal" data-target="#BuscarPropietario" style="color:white">Buscar propietarios </a>
        </div>  
        </div>
        <!-----------------------------------------------------BUSCAR PROP-------------------------- ------------------------------------>       
       
        <div class="modal fade" id="BuscarPropietario" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Agregar propietario existente</h4>
                   </div>
                     
                   <div class="modal-body">
 <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Panel de búsqueda</div>     
    <div class="panel-body">
                                
   <form class="formulario-dia"  method="post" id="search_form" action="" name="search_form">
    
    
      <br>
      <div class="input-group">
          <span class="input-group-addon" >Buscar</span>
          <input type="text" class="form-control" placeholder="Ingrese DNI, apellido o nombre " id="search" required name="search" aria-describedby="basic-addon1">
      </div>
      
    
      <br>
                                                                                       
 <div id="resultados">
       
       
       
 </div>
                           
                             
                                 
           </div>     
                                
 </div> 
         <div class="modal-footer">
                                   <button type="button" onclick="Valor();" class="btn btn-success" data-dismiss="modal">Agregar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>  
    </form>

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

<script>
        $(function(){
 
$('#form_unidades1').submit(function(e){
    e.preventDefault();
})  

$('#search').keyup(function(){
 var envio = $('#search').val();    
$('#resultados').html('<h2><img src="img/loading.gif"  width=" 30"  alt="" /> Cargando </h2>')

    var id_consorcio=document.getElementById("id_consorcio").innerHTML; 
$.ajax({
    
    type: 'POST', 
    url: 'php/buscador_prop.php',
   data:{id_consorcio:id_consorcio, search: envio},
    success: function(resp){
        if(resp!=""){
            $('#resultados').html(resp);
        }
    }
})
    
})

        })</script>

        
        <script>
       function Valor(){
           
   var id_propietario= document.getElementById("selectprop").value; 
   var idunidad2=document.getElementById("idunidad2").innerHTML;    

   $.ajax({
    type: 'POST', 
    url: 'php/agregar-propietario.php',
     data:{idunidad2:idunidad2, idpropietario:id_propietario},
    success: function(resp){
        if(resp!=""){
            $('#resultados').html(resp);
        }
    }
})
           
       } 
        
        </script> 
  <script src="js/jquery-ui.min.js"></script>
        
    </body>
</html> 