

<?php
session_start();
require_once('php/conn/connect.php');
?>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $usuario=$_SESSION['username']; 
    $id_usuario= $_SESSION['id_usuario'];
    $consulta="SELECT privilegio FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $privilegio=$fila['privilegio'];
    
   // $consulta3 = "SELECT img FROM profesionales2 WHERE usuario_idUsuario = $id_usuario";
    //$resultado3=$connect->query($consulta3);
    //$fila3= mysqli_fetch_assoc($resultado3);
    
    if($privilegio ==1)
    {
        $enlace='menu_adm';
    }
    else{//ES PACIENTE 
        $enlace='menu_consorcista';
    }
    
    
}
else {
    
    $usuario='Ingresar';
    $enlace='login.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" type="image/png" href="./images/custom/favicon.ico"/>
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- Site title
   ================================================== -->
	<title>Sistema de Administracion de Consorcio</title>
    
	<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="assets/css/login.css" rel="stylesheet" /> 
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/et-line-font.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
   	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/style.css">	
   <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.backstretch.min.js"></script>
	<script src="js/jquery.parallax.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<div  class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


<!-- Navigation section
================================================== -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			
            <img style="width:130px; height : 85px" class="logo" src="img/logo.png" />
            <title>A.C.O</title>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php#home" class="smoothScroll">INICIO</a></li>
				<li><a href="index.php#service" class="smoothScroll">SERVICIOS</a></li>
				<li><a href="index.php#about" class="smoothScroll">¿QUE ES A.C.O.?</a></li>
				<li><a href="index.php#team" class="smoothScroll">NOSOTROS</a></li>
				<!-- <li><a href="#portfolio" class="smoothScroll">PREGUNTAS1</a></li> -->
				<li><a href="index.php#blog" class="smoothScroll">PREGUNTAS</a></li>
				<li><a href="index.php#contact" class="smoothScroll">CONTACTO</a></li>
                <li><a style="color : blue;" href="login.php" class="smoothScroll">Ingresar</a></li>
			</ul>
		</div>

	</div>
</div>
<!-- Home section
================================================== -->
        <section id="contenedor_login">
        <div id="ingreso-sistema">
       <p><a href="index.php"><img src="img/logoblanco.png" alt=""></a></p>
   </div>     
   <div id="logeo">
<form action="php/checklogin.php" method="post" >
    
   <label class="texto-label">Nombre  de Usuario:</label><br>
    <input name="username" type="text" id="username" required class="box-usuario">
    <br><br>
<label class="texto-label">Contraseña:</label><br>
    <input name="password" type="password" id="password" required class="box-contra">
    <br><br>
    <input type="submit" class="btn-enviar" name="Submit" value="Ingresar"> <br> <br>
<a class="crear-cuenta" href="index.php#contact">¿No tiene cuenta? Haga click aqui para crear una</a>
<br>
<a class="crear-cuenta" href="recuperar-contra.php">¿Olvidó su contraseña?</a>
</form>
</div>
   
    </section>

<!-- Footer section
================================================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="1s">
				<p>Copyright © Genius HTML Template | All Rights Reserved.</p>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.9s"></a></li>
					<!-- <li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeIn" data-wow-delay="0.9s"></a></li> -->
					<li><a href="#" class="fa fa-github wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-google-plus wow fadeIn" data-wow-delay="0.9s"></a></li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>

</body>
</html>