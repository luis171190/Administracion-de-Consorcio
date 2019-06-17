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
    
    $idtorre=$_GET['id_torre'];
    $nombre_torre=$_GET['nombre_torre'];
    $id_consorcio=$_GET['id_consorcio'];
    
   
        ?>
    
    <div class="contenido" id="contenido">
     <div id="titulo">
    <h1>Gestión de unidades de Torre: <?php echo $nombre_torre; ?></h1>
     </div>
     
           
      <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-3">
        
     <!--    <div class="alert alert-danger" style="text-align:center">
             <strong>Atención: Solo se podrán buscar a los pacientes que posean una cuenta en Excelsius Salud.</strong>
     
         </div>-->
         
  
     </div>
   <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1"> 
    <div class="panel panel-default" id="formulario">
    <div class="panel-heading">Unidades registradas:</div>
    <div class="panel-body">
   

        
        <div class="table-responsive">
      <table id="tabla-evo" class="table table-hover table-bordered table-stiped">
     <thead>
         <th class="info">Nro.</th>
         <th class="info">Piso</th>
         <th class="info">Departamento</th>
         <th class="info">Porcentaje </th>
         <th class="info">Propietario</th>
         <th class="info">Tipo</th>
         
         
         <th class="info"> </th>
           <th class="info"> </th>
         
     </thead> 
         <tbody>
    <?php

$consulta_1="SELECT idunidad, piso,departamento,porcentaje_pago, descripcion FROM unidad INNER JOIN torre INNER JOIN tipo_unidad ON Torre_idTorre=$idtorre and tipo_unidad_idtipo_unidad=idtipo_unidad  and Torre_idTorre=idtorre ORDER BY idunidad ASC";
$resultado=$connect->query($consulta_1);            
   $tot_por = 0;          
        $c=1;
        while($fila=mysqli_fetch_assoc($resultado))
            
        {
            $idunidad=$fila['idunidad'];
            $consulta_prop="SELECT * FROM unidad_propietario INNER JOIN propietario ON fk_id_unidad=$idunidad AND fk_id_propietario=idpropietario";
            $resultado_prop=$connect->query($consulta_prop);
            $num_row=mysqli_num_rows($resultado_prop);
            if($num_row>0){
                $fila_prop=mysqli_fetch_assoc($resultado_prop);
                $propietario=$fila_prop['nombres'].' '.$fila_prop['apellidos'];
            }
            else{
                $propietario='<button type="button" class="btn btn-primary btn-xs" data-dismiss="modal"><a style="text-decoration:none;color:white;" href="alta-propietario.php?idunidad='.$idunidad.'&id_consorcio='.$id_consorcio.'">Agregar</a></button>';
            }
            
            
      //SE DEBERIA BUSCAR AL PROPIETARIO CON OTRA CONSULTA PARA CADA UNIDAD.
         
                     echo '<tr><td>'.$c.'</td>
                     <td>'.$fila['piso'].'</td>
                     <td>'.$fila['departamento'].'</td>
                      <td>'.$fila['porcentaje_pago'].'</td>
                     <td>'.$propietario.'</td>
                     <td>'.$fila['descripcion'].'</td>';
            //arriba <td><a href="'.$fila['idpropietario'].'">'.$fila['nombres'].' '.$fila['apellidos'].'</a></td>
            $porc = $fila['porcentaje_pago'];
            
             ?>
                     <td>
                   <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#editarTorre" style="color:white">Modificar</a>


                     </td>
                     <td>
                         

                           <form  name="form_unidad" id="form_unidad" action="php/eliminar-unidad.php" method="post">
                                <div class="form-group"> <!-- Submit Button -->
                        <button type="button" class="btn btn-danger btn-xs" > <a  style="text-decoration:none" class="bnt btn-danger btn-xs" href="php/eliminar-unidad.php?id_unidad=<?php echo $idunidad;?>">Eliminar</a></button>
                                    
                    </div>  
                <!--    <button  type="button" class="btn btn-danger btn-xs" onclick="Confirmar();" id="conf_elim" >Eliminar</button>-->

                             <input type="hidden"  value="<?php echo $idunidad;?>" name="id_unidad" id="id_unidad">
                               

                     </form>

                     </td>
             
                     </tr>
                     <?php
                         
               $tot_por = $tot_por +    $porc ;       
           $c=$c+1;
            
        }
    ?>
         
         </tbody>    
        
           
      </table>
         <div style="text-align:center">
             
<p> porcentaje total : <?php echo $tot_por ?></p>           
       <a class="btn btn-success" data-toggle="modal" data-target="#NuevaTorre" style="color:white" onclick="validarUnidades();">Nueva Unidad</a>
    </div>
   </div>
 <!-------------------------------------------------------------------NUEVA UNIDAD-------------------------------------------------------------------------------------->
        
        
<div class="modal fade" id="NuevaTorre" tabindex="-1" role="dialog" aria-labelledby="myModalLable" aria-hidden="true">            
           <div class="modal-dialog modal-lg">              
               <div class="modal-content">                  
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4>Nueva Unidad</h4>
                   </div>
                     
                   <div class="modal-body">
                       <div class="panel panel-default" style="box-shadow:none">
                                <div class="panel-heading">Datos de la unidad</div>     
                               <div class="panel-body">
                                 <br> 
                                  
                                  <form action="php/nueva-unidad.php" id="form_unidades" method="post" class="form-horizontal">
                                       
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Piso:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input name="piso" type="number" class="form-control" placeholder="Piso" value="" required id="piso">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Departamento:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Departamento" value="" name="dpto" required id="dpto">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Porcentaje:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Porcentaje de pago" Cantidad de unidades de la torre"" value="" name="porcentaje" required id="porcentaje">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-xs-12 col-lg-2 col-md-2 col-sm-2">Tipo de unidad:</label>
                                            <div class="col-xs-12 col-lg-10 col-md-10 col-sm-10">
                                               <select  name="tipo_unidad"class="form-control" style="font-size:" required>
                                                   <?php 
                                                   $consulta_sel="SELECT * FROM tipo_unidad";
                                                   $resultado_sel=$connect->query($consulta_sel);
                                                   while($fila_sel=mysqli_fetch_assoc($resultado_sel))
                                                   {
                                                       $descripcion=$fila_sel['descripcion'];
                                                       $id_tipo_sel=$fila_sel['idtipo_unidad'];
                                                       echo '<option value="'.$id_tipo_sel.'">'.$descripcion.'</option>';
                                                       
                                                       
                                                   }
                                                   
                                                   
                                                   ?>
                                                    
                                                </select>
                                                  <input name="id_torre" type="hidden" class="form-control"  value="<?php echo $idtorre ?>" required id="id_torre">
                                                 
                                            </div>
                                        </div>
                                    
                                      <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                                
                                                
                                            </div>
                                          </div>
                                        </form> 
                                                                                               
                 
                           
                             
                                 
           </div>     
                                
            </div> 
                       
      
        
        <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>  
    

         </div>
     </div>
        </div>
      
       
  
  </div> 
       
<div id="resultados">
</div>
    
   </section> 




 <footer>
            <?php 
                footer();
            ?>
        </footer>  
        
        
        <script src="js/main.js"></script> 
<script src="js/gestion-unidades.js"></script> 
  <script src="js/jquery-ui.min.js"></script>
        
    </body>
</html> 