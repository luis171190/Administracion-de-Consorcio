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
        <h1>Gestión de Consorcios</h1>
     </div>
     
     <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1"> 
        
     <!--    <div class="alert alert-danger" style="text-align:center">
             <strong>Atención: Solo se podrán buscar a los pacientes que posean una cuenta en Excelsius Salud.</strong>
     
         </div>-->
         
    
     </div>
    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1" style="padding-bottom: 10px;">
        <a class="btn btn-success" data-toggle="modal" data-target="#NuevaTorre" style="color:white">
            <span class="glyphicon glyphicon-plus" style="color:white;"></span>
            Nuevo Consorcio
        </a>
    </div>
   <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1"> 
    <div class="panel panel-default" id="formulario">
        <div class="panel-heading">Consorcios de Edificios registrados:</div>
            <div class="panel-body">        
                <div class="table-responsive">
                  <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
                     <thead>
                         <th class="info">Nro.</th>
                         <th class="info">Razón Social</th>
                         <th class="info">CUIT</th>
                         <th class="info">Loc.- Prov.</th>
                         <th class="info">Dirección</th>
                         
                         <th class="info"> </th>             
                     </thead> 
                     <tbody>
                        <?php
                            $id_usuario=$_SESSION['id_usuario'];
                            $consulta_1="SELECT * FROM usuario_consorcio u INNER JOIN consorcio c ON usuario_id_usuario = $id_usuario AND consorcio_idconsorcio=idconsorcio where tipo_consorcio_id = 1";
                            $resultado=$connect->query($consulta_1);            
                                         
                                    $c=1;
                                    while($fila=mysqli_fetch_assoc($resultado))
                                        
                                    {   $idconsorcio = $fila['idconsorcio'];
                                  
                                     
                                                 echo '<tr><td>'.$c.'</td>
                                                 <td>'.utf8_encode($fila['razon_social']).'</td>
                                                 <td>'.$fila['cuit'].'</td>
                                                 <td>'.utf8_encode($fila['localidad'].'-'.$fila['provincia']).'</td>
                                                 <td>'.utf8_encode($fila['calle'].'-'.$fila['nro_calle']).'</td>';
                                         ?>
                                                 <td>
                                               <a class="btn btn-info btn-xs" href="edit-consorcio.php?idconsorcio=<?php echo $idconsorcio ?>" style="color:white">Modificar</a>


                                                 </td>
                                                
                                         
                                                 </tr>
                                                 <?php
                                                     
                                                     
                                       $c=$c+1;
                                    }
                        ?>         
                     </tbody>
                  </table>
                </div>
            </div>
         <div style="text-align:center">
    </div>
    <div class="panel panel-default" id="formulario2">
        <div class="panel-heading">Consorcios de Countries registrados:</div>
            <div class="panel-body">        
                <div class="table-responsive">
                  <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
                     <thead>
                         <th class="info">Nro.</th>
                         <th class="info">Razón Social</th>
                         <th class="info">CUIT</th>
                         <th class="info">Loc.- Prov.</th>
                         <th class="info">Dirección</th>
                         
                         <th class="info"> </th>             
                     </thead> 
                     <tbody>
                        <?php
                            $id_usuario=$_SESSION['id_usuario'];
                            $consulta_1="SELECT * FROM usuario_consorcio u INNER JOIN consorcio c ON usuario_id_usuario = $id_usuario AND consorcio_idconsorcio=idconsorcio where tipo_consorcio_id = 2";
                            $resultado=$connect->query($consulta_1);            
                                         
                                    $c=1;
                                    while($fila=mysqli_fetch_assoc($resultado))
                                        
                                    {   $idconsorcio = $fila['idconsorcio'];
                                  
                                     
                                                 echo '<tr><td>'.$c.'</td>
                                                 <td>'.utf8_encode($fila['razon_social']).'</td>
                                                 <td>'.$fila['cuit'].'</td>
                                                 <td>'.utf8_encode($fila['localidad'].'-'.$fila['provincia']).'</td>
                                                 <td>'.utf8_encode($fila['calle'].'-'.$fila['nro_calle']).'</td>';
                                         ?>
                                                 <td>
                                               <a class="btn btn-info btn-xs" href="edit-consorcio.php?idconsorcio=<?php echo $idconsorcio ?>" style="color:white">Modificar</a>


                                                 </td>
                                                
                                         
                                                 </tr>
                                                 <?php
                                                     
                                                     
                                       $c=$c+1;
                                    }
                        ?>         
                     </tbody>
                  </table>
                </div>
            </div>
         <div style="text-align:center">
    </div>
   </div>


 <!-------------------------------------------------------------------NUEVO CONSORCIO-------------------------------------------------------------------------------------->
        
        
<div class="modal fade" id="NuevaTorre" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nuevo consorcio</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos del consorcio</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="php/nueva-torre.php" id="form_torre" method="post" class="form-horizontal" onsubmit="return validar();">
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Razón Social:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="raz_soc" type="text" class="form-control" placeholder="Razón social" value="" required id="raz_soc">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">CUIT:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="number" class="form-control" placeholder=CUIT value="" name="cuit" required id="cuit">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Provincia:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Provincia"Cantidad de unidades de la torre"" value="" name="prov" required id="prov">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Localidad:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="localidad" type="text" class="form-control" placeholder="Localidad" value="" required id="localidad">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Calle:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="calle" type="text" class="form-control" placeholder="Calle" value="" required id="calle">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Nro. Calle:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="nro_calle" type="number" class="form-control" placeholder="Número" value="" required id="nro_calle">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Tipo:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">                                                
                                                <select class="form-control" id="tipo_consorcio_id" name="tipo_consorcio_id" data-style="btn-info">
                                                    <option value="1">Edificio</option>
                                                    <option value="2">Country</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                      
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="button" class="btn btn-success" value="Guardar" onclick="guardarConsorcio();">
                                                
                                            </div>
                                        </div>
                                   
                            </form>                                                                                                                                                                                                                                      
                                                                                              
               </div>                
           </div>            
        </div>
                   
        
        <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>  
    

         </div>
     </div>
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
    
<div id="resultados">
</div>
    
   </section> 

<script>
function guardarConsorcio(){   
    var raz_soc=$('#raz_soc').val();
    var cuit = $('#cuit').val();
    var provincia = $('#prov').val();
    var localidad = $('#localidad').val();
    var calle= $('#calle').val();
    var nro_calle= $('#nro_calle').val();
    var tipo_consorcio_id= $('#tipo_consorcio_id').val();
    $.ajax({
    type: 'POST', 
    url: 'php/nuevo-consorcio.php',
    data:{razon_soc:raz_soc, cuit:cuit, provincia:provincia, localidad:localidad, calle:calle, nro_calle:nro_calle, tipo_consorcio_id: tipo_consorcio_id},
    success: function(resp){
        if(resp!=""){           
            $('#resultados').html(resp);
        }
     
        
    }
})
    
         
  
    
}

</script>
    <script type="text/javascript">
function Confirmar() {
//Ingresamos un mensaje a mostrar
if (confirm('¿Desea eliminar consorcio?')){     
       document.getElementById("form_consorcio").submit(); 
    }
    else
        alert("Operacion cancelada");
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