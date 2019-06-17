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
           <?php 
        $id_usuario=$_SESSION['id_usuario'];
        $consulta_1="SELECT * FROM usuario_consorcio INNER JOIN consorcio ON usuario_id_usuario = $id_usuario AND consorcio_idconsorcio=idconsorcio";
        $resultado1=$connect->query($consulta_1);
        $fila1=mysqli_fetch_assoc($resultado1);
         $id_consorcio=$fila1['idconsorcio'];
        $razon_social=$fila1['razon_social'];
      
        ?>
      
    <h1>Listado de Ingresos: <?php echo '<strong>'.utf8_encode($razon_social).'</strong>';?>  </h1>
     </div>
     
      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
        
     <!--    <div class="alert alert-danger" style="text-align:center">
             <strong>Atención: Solo se podrán buscar a los pacientes que posean una cuenta en Excelsius Salud.</strong>
     
         </div>-->
         
    
     </div>
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Listado de ingresos:</div>
    <div class="panel-body">
   Por favor seleccione el período : <br>
         <?php 
       // $id_usuario=$_SESSION['id_usuario'];
        $consulta="SELECT * FROM periodo ORDER BY  anio,mes";
        $resultado=$connect->query($consulta);
         echo '<select class="form-control" id="selectper" name ="selectper" class="selectpicker" data-style="btn-info" onchange="cambiarPeriodo('.$id_consorcio.'); ">';
        echo '<option value="0" >Seleccione..</option> '; 
        
        while($fila=mysqli_fetch_assoc($resultado))
        {
            $id_periodo=$fila['idperiodo'];
            $descripcion_p=$fila['descripcion_periodo'];
            $anio_p=$fila['anio'];
          echo '
        <option value="'.$id_periodo.'" >'.$descripcion_p.' - '.$anio_p.'</option> '; 
          
            
            
        }
       
        ?>
      
    </select>
        <br>
   
 
  </div>
   
      <div id="resultados1"></div>
    
</div>


 
        
        <script src="js/jquery-ui.min.js"></script>
       
  
  </div> 
    
    <br>
    <br>
    <br>
     
    
     
      
      
  </div> 
    </div>
    
<div id="resultados">
</div>
    
   </section> 
<script>
    function cambiarPeriodo(id_consorcio){
      
        var envio = $('#selectper').val();
        var idconsorcio=id_consorcio;
    if(envio!=0)
{
    $.ajax({
    type: 'POST', 
    url: 'ingresos-periodo-con.php',
      data:{search:envio, id_consorcio:idconsorcio},
    success: function(resp){
        if(resp!=""){
           
            $('#resultados1').html(resp);
        }
        
        
    }
})
}
    else
        $('#resultados1').html("");
        
        
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