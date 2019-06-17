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
        $enlace='http://localhost:8080/linuji/gestion-consorcio.php';
        
    }
    else{//ES PACIENTE 
        $enlace='http://localhost:8080/linuji/ver-estado-cuenta-cons.php';
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

	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Font Icons CSS
   ================================================== -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/et-line-font.css">

	<!-- Nivo Lightbox CSS
   ================================================== -->
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">

	<!-- Owl Carousel CSS
   ================================================== -->
   	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">

	<!-- Main CSS
   ================================================== -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Google web font 
   ================================================== -->	
   <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Javascript 
	================================================== -->
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


<!-- Preloader section
================================================== -->
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
				<li><a href="#about" class="smoothScroll">¿QUE ES A.C.O.?</a></li>
				<!-- <li><a href="#team" class="smoothScroll">NOSOTROS</a></li> -->
				<!-- <li><a href="#portfolio" class="smoothScroll">PREGUNTAS1</a></li> -->
				<li><a href="#blog" class="smoothScroll">PREGUNTAS</a></li>
				<li><a href="#contact" class="smoothScroll">CONTACTOS</a></li>
                <li><a style="color : blue;" href="<?php echo $enlace ?>" class="smoothScroll"><?php echo $usuario ?></a></li>
			</ul>
		</div>

	</div>
</div>
<!-- Home section
================================================== -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<h2 class="wow bounceIn">Sistema de Administración de Consorcios.</h2>
				<h4 class="font-weight-normal font-color-gray wow fadeInUp" data-wow-delay="1s">Simplificá los procedimientos de tu consorcio, hace un uso mas eficiente de tu tiempo.</h4>
				<a href="#service" class="btn btn-default section-btn smoothScroll wow fadeInUp" data-wow-delay="1.9s">LEER MAS</a>
				<a href="#contact" class="btn btn-warning section-btn smoothScroll hidden-xs wow fadeInUp" data-wow-delay="1.9s">CONTÁCTANOS!</a>
			</div>

		</div>
	</div>		
</section>


<!-- Service section
================================================== -->
<section id="service" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-sm-10">
				<div class="section-title">
					<h1>Servicios</h1>
					<p>A.C.O. divide sus servicios ofrecidos en dos diferentes tipos de usuarios:</p>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
				<div class="media">
					<div class="media-object pull-left">
						<i class="icon icon-profile-male"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Administradores de Consorcios</h3>
						<h4 class="media-heading">Poseen servicios como...</h4>
						<li>Gestión de Consorcios.</li>
						<li>Gestión de Torres.</li>
						<li>Gestión de Unidades.</li>
						<li>Gestión de Propietarios.</li>
						<li>Gestión de Ingresos.</li>
						<li>Gestión de Egresos.</li>
						<li>Liquidación de Expensas.</li>
						<li>Gestión de Cuenta Corriente.</li>
						<li>Gestión de Proveedores.</li>
						<li>Gestión de Personal.</li>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.3s">
				<div class="media">
					<div class="media-object pull-left">
						<i class="icon icon-cloud"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Consorcista</h3>
						<h4 class="media-heading">Poseen servicios como...</h4>
						<li>Consulta de ingresos y egresos del consorcio.</li>
							<li>Consulta de estado de cuenta de su unidad.</li>
							<li>Pago de expensas.</li>
							<li>Consulta de morosos.</li>
							<li>Consulta de avisos del consorcio.</li>
					</div>
				</div>
			</div>
			

		</div>
	</div>
</section>


<!-- about section
================================================== -->
<section id="about" class="parallax-section">
	<div class="">
		

        
			<div class="col-md-offset-2 col-md-8 col-sm-12">
                	<div class="section-title">
				<h1>Que es A.C.O.</h1>
				<p>A.C.O. es un sistema web destinado a facilitar las tareas de administración de consorcios brindando comodidades a los administradores como la centralización de los datos y la accesibilidad a ellos desde cualquier lugar del mundo.</p>
                   <p> Permite a sus usuarios tener un mayor control sobre la información de sus diferentes consorcios facilitando, además, la tarea de la liquidación de las expensas, realizándola de una manera sencilla y automática. Se trata de un sistema moldeable, adaptándose a las necesidades de cada consorcio.</p>
				 <p>ACO permite a los consorcistas llevar un mayor control de sus expensas, realizando consultas sobre su estado de cuenta, avisos, ingresos y egresos del consorcio, listas de morosos, consulta y pago de expensas, dándole así, un mayor control y una gran comodidad a los consorcistas.</p>
				<div class="row">
			
		</div>
	</div>
</section>


<!-- team section
================================================== -->
<!-- <section id="team" class="paralla-section">
	<div class="container">
		<div class="row">

			
			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 wow bounceIn">
				<div class="section-title">
					<h1>Nosotros</h1>
					<p>Somos un grupo de estudiantes avanzados de la carrera de Ingeniería en Sistemas de Información que, a modo de proyecto final, desarrollamos A.C.O., un sistema destinado a brindar comodidades a los consorcistas y administradores de consorcios. Buscamos ofrecer a nuestros clientes un servicio de calidad y eficiencia distinguida a base de mucho trabajo y esfuerzo.</p>
				</div>
			</div>

            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
            	<div class="team-wrapper">
            		<img src="images/team_1.jpg" class="img-responsive" alt="about">
            			<div class="team-wrapper-social">
            				<ul class="social-icon">
								<li><a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook wow fadeIn" data-wow-delay="0.9s"></a></li>
								
							</ul>
            			</div>
            	</div>
            	<div class="team-description">
            		<h3>Molina Reinoso Luis</h3>
            		<h5>Testing</h5>
            	</div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="1.3s">
            	<div class="team-wrapper">
            		<img src="images/team_2.jpg" class="img-responsive" alt="about">
            			<div class="team-wrapper-social">
            				<ul class="social-icon">
								<li><a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook wow fadeIn" data-wow-delay="0.9s"></a></li>
								
							</ul>
            			</div>
            	</div>
            	<div class="team-description">
            		<h3>Flores Zarate Mariano</h3>
            		<h5>Programador</h5>
            	</div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="1.6s">
            	<div class="team-wrapper">
            		<img src="images/team_3.jpg" class="img-responsive" alt="about">
            			<div class="team-wrapper-social">
            				<ul class="social-icon">
								<li><a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook wow fadeIn" data-wow-delay="0.9s"></a></li>
							
							</ul>
            			</div>
            	</div>
            	<div class="team-description">
            		<h3>Duarte Ernesto Rafael</h3>
            		<h5>Design</h5>
            	</div>
            </div>

            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="1.3s">
            	<div class="team-wrapper">
            		<img src="images/team_4.jpg" class="img-responsive" alt="about">
            			<div class="team-wrapper-social">
            				<ul class="social-icon">
								<li><a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook wow fadeIn" data-wow-delay="0.9s"></a></li>
								<!-- <li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.9s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
								<li><a href="#" class="fa fa-behance wow fadeIn" data-wow-delay="0.9s"></a></li> -->
							<!-- </ul>
            			</div>
            	</div>
	            <div class="team-description">
	            		<h3>Bensi Carolina</h3>
	            		<h5>Testing</h5>
	            	</div>
	            </div>
			</div>

		</div>
	</div> --> 
</section>


<section id="blog" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 wow bounceIn text-center">
				<div class="section-title">
					<h1>Preguntas Frecuentes</h1>
					<!-- <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p> -->
				</div>
			</div>

			<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.9s">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  					<div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingOne">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          							<i class="icon icon-clipboard"></i> ¿Cualquier administrador de consorcio puede poseer una cuenta?
        						</a>
      						</h4>
    					</div>
   						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      						<div class="panel-body">
        						<p>Si, administrador puede acceder a una cuenta, siempre y cuando su consorcio pertenezca a la provincia de Tucumán, ya que el sistema está adaptado a las leyes de la misma.</p>
        						<p> Posteriormente se trabajará para adaptarlo al resto de las provincias argentinas.</p>
      						</div>
   						 </div>
 					 </div>

    				<div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingTwo">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          							<i class="icon icon-document"></i> ¿ACO ofrece seguridad a mis datos?
        						</a>
      						</h4>
    					</div>
   						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      						<div class="panel-body">
        						<p>Con A.C.O. puedes tener la total confianza ya que tus datos están absolutamente protegidos. Ofrece una completa seguridad y confidencialidad de los mismos.</p>
      						</div>
   						 </div>
 					 </div>

 					 <div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingThree">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          							<i class="icon icon-notebook"></i> ¿Si un administrador posee varios consorcios, debe crearse varias cuentas?
        						</a>
      						</h4>
    					</div>
   						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      						<div class="panel-body">
        						<p>No. A.C.O. ofrece la ventaja de poder centralizar los datos de los diferentes consorcios en una sola cuenta, facilitándole al administrador sus tareas.</p>
      						</div>
   						 </div>
 					 </div>

 					  <div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingThree">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          							<i class="icon icon-quote"></i> ¿Puedo usar A.C.O. desde un dispositivo móvil?
        						</a>
      						</h4>
    					</div>
   						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      						<div class="panel-body">
        						<p>Absolutamente. A.C.O. es un sistema flexible y se adapta a smartphone, tablet o cualquier otro dispositivo móvil.
        						</p>
      						</div>
   						 </div>
 					 </div>

 				 </div>
			</div>

		</div>
	</div>
</section>


<!-- Contact section
================================================== -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<div class="section-title">
					<h1>Contactanos</h1>
					<p>Ante cualquier duda o inquietud no duden en escribirnos.</p>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 wow fadeIn" data-wow-delay="0.6s">
				<form action="contact.php" method="post">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" placeholder="Nombre" name="name" required>
						<input type="email" class="form-control" placeholder="Email" name="email" required>
						<input type="telephone" class="form-control" placeholder="Telefono" name="phone" required>
					</div>
					<div class="col-md-6 col-sm-6">
						<textarea class="form-control" placeholder="Mensaje" rows="7" name"message" required></textarea>
					</div>
					<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
						<input type="submit" class="form-control" value="ENVIAR MENSAJE">
					</div>
				</form>
			</div>

		</div>
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