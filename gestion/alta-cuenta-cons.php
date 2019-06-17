<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" type="image/png" href="./images/custom/favicon.ico"/>
	<meta name="keywords" content="">
	<meta name="description" content="">
  <link rel="stylesheet" href="../css/gestion-nuevo-periodo.css"> 
	<!-- Site title
   ================================================== -->
	<title>Sistema de Administracion de Consorcio</title>
    
	
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<div  class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


        <section id="contenedor_login">
        <div id="ingreso-sistema">
       <p><a href="index.php"><img src="img/logoblanco.png" alt=""></a></p>
   </div>     
            <div class="generar-periodo2">
   <div id="logeo" class="" style="width: 100%">
       <h2 class="texto-label center" style="text-decoration:underline">CUENTA DE ADMINISTRADOR DE CONSORCIOS</h2>
       <br>
           <div style="margin:auto">  
<form class="center" action="alta-adm.php" method="post" >
    <label class="texto-label">Nombre  de Usuario:</label>
    <input name="usuario" type="text" id="username" required class="box-usuario"><br><br>
      <label class="texto-label">Nombres:</label>
    <input name="nombres" type="text" id="username" required class="box-usuario"> <br><br>
      <label class="texto-label">Apellidos:</label> 
    <input name="apellidos" type="text" id="username" required class="box-usuario"><br><br>
      <label class="texto-label">Email:</label>
    <input name="correo" type="text" id="username" required class="box-usuario"><br><br>
    <label class="texto-label">Telef:</label>
    <input name="telefono" type="text" id="username" required class="box-usuario"><br><br>
        
<label class="texto-label">Contraseña:</label>
    <input name="clave" type="password" id="password" required class="box-contra"><br><br>
    <br>
    <input type="submit" class="btn-enviar" name="Submit" value="GENERAR"> 

</form>
               </div>
               </div>
</div>
   
    </section>



</body>
</html> 