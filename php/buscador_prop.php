<?php
require_once('conn/connect.php');



$search='';
if(isset ($_POST['search'])){
    $search=$_POST['search'];
    
}

$searcht = trim( $search, " ");
$id_consorcio = $_POST['id_consorcio'];

$searchse = str_replace(' ', '', $searcht);


//$consulta ="SELECT * FROM propietario WHERE CONCAT (nombres, '',apellidos) LIKE '%".$searchse."%' OR dni LIKE '%".$search."%' AND consorcio_idconsorcio = $id_consorcio";
$consulta ="SELECT * FROM propietario WHERE consorcio_idconsorcio = $id_consorcio AND CONCAT (nombres, '',apellidos) LIKE '%".$searchse."%' OR dni LIKE '%".$search."%'";
$resultado=$connect->query($consulta);
$fila= mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);

?>
<?php 
if($total>0 && $search != ''){ ?>
<div class="breadcrumb"><h5 class="resultados_busq">Resultados de la búsqueda:</h5></div>

<div class="panel panel-default">
<div class="panel-body ">
<div class="list-group " >
<select id="selectprop" class="form-control">
  <?php 
do 
{
$id=$fila['idpropietario'];
$nombre=$fila['nombres'];
$apellido=$fila['apellidos'];
$dni=$fila['dni'];
$mail=$fila['mail'];
$telefono=$fila['telefono'];
$fecha_nac=$fila['fecha_nac'];
$domicilio=$fila['domicilio']; 
     ?>  
    <option value="<?php echo $id; ?>"><?php echo $fila ['nombres'].' '.$fila['apellidos'].'-DNI: '.$fila['dni'] ?>  </option>




    


<?php }
     
                              
 while ($fila=mysqli_fetch_assoc($resultado));
    echo'</select>'; 
    
    
    ?> 
    
    
<?php } 
elseif($total>0 && $search == '') echo '';
else echo '<div class="panel panel-default"><div class="panel-body">
<span class="glyphicon glyphicon-exclamation-sign" style="color:#000; font-size:20px" aria-hidden="true"></span><h4>No se encontraron resultados</h4><p>Vuelve a intentarlo.</p>
</div></div>';
?>

</div>
</div>
</div>
<script src="../js/prueba5.js"></script>