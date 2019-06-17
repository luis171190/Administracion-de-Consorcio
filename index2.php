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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Administracion de Consorcios Online</title>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- ANIMATE STYLE  -->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <!-- FLEXSLIDER STYLE  -->
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
    
</head>
<body>

 <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img  class="logo" src="assets/img/logo2.png" />
                </a>

            </div>
            <div class="right-div">
<strong> <a href="<?php echo $enlace     ?>"> <?php echo $usuario ?> </a> </strong>  
            </div>
          
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.html" class="menu-top-active" >INICIO</a></li>
                           
                            <li><a href="about.html">¿QUE ES A.C.O?</a></li>
                             <li><a href="gallery.html" >SERVICIOS</a></li>
                             <li><a href="features.html">PREGUNTAS</a></li>
                            <li><a href="contact.html">NOSOTROS</a></li>
                            <li><a href="contact.html">CONTACTO</a></li>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div id="slideshow-sec">
        <div id="carousel-div" class="carousel slide" data-ride="carousel" >
                   
                   <!-- <div class="carousel-inner">
                        <div class="item active">

                            <img  src="assets/img/11.jpg" alt="" />
                            <div class="carousel-caption">
                          <h1 class="wow slideInLeft" data-wow-duration="2s" > Multi Pager Template</h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" >Muti Purpose Use</h2>  
                            </div>
                           
                        </div>
                        <div class="item">
                            <img  src="assets/img/12.jpg" alt="" />
                            <div class="carousel-caption">
                          <h1 class="wow slideInLeft" data-wow-duration="2s" >Awesome Usage</h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" >Bootstrap 3.2</h2>  
                            </div>
                        </div>
                        <div class="item">
                            <img  src="assets/img/13.jpg" alt="" />
                            <div class="carousel-caption">
                          <h1 class="wow slideInLeft" data-wow-duration="2s" >Easy To Customize </h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" >Free To Download</h2>  
                            </div>
                           
                        </div>
                    </div>-->
                    <!--INDICATORS-->
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-div" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-div" data-slide-to="1"></li>
                        <li data-target="#carousel-div" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                     <a class="left carousel-control" href="#carousel-div" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-div" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
    </div>
    <!-- SLIDESHOW SECTION END-->
    <div class="below-slideshow">
         <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-lastfm fa-4x"></i>
									<h4>Automatización</h4>
									<p ><ul>
                    <li>Distribución automática de gastos </li>
                    <li>Liquidación automática de expensas</li>
                    <li>Registro de transacciones </li>
                                        </ul>
								
									</p>
                      </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-yelp fa-4x"></i>
									<h4>Accesibilidad</h4>
									<p >
										<ul> 
                                            <li>Sin instalaciones</li>
                                            <li>Por Internet desde cualquier lugar</li>
                                            <li>Desde una pc, tablet o teléfono celular</li>
                                       
                    </ul>
									</p>
                      </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-ioxhost fa-4x"></i>
									<h4>Integración</h4>
									<p >
										<ul> 
                                            <li>Toda la información en un mismo lugar
</li>
                                            <li>Todas las herramientas en un mismo sistema</li>
                                            <li>Acceso a todos los consorcios que se administre
</li>
                                       
                    </ul>
									</p>
                      </div>
            </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-ioxhost fa-4x"></i>
									<h4>Integración</h4>
									<p >
										<ul> 
                                            <li>Toda la información en un mismo lugar
</li>
                                            <li>Todas las herramientas en un mismo sistema</li>
                                            <li>Acceso a todos los consorcios que se administre
</li>
                                       
                    </ul>
									</p>
                      </div>
            </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-ioxhost fa-4x"></i>
									<h4>Integración</h4>
									<p >
										<ul> 
                                            <li>Toda la información en un mismo lugar
</li>
                                            <li>Todas las herramientas en un mismo sistema</li>
                                            <li>Acceso a todos los consorcios que se administre
</li>
                                       
                    </ul>
									</p>
                      </div>
            </div>
    
        </div>

    </div>
    </div>
      <div class="container">
        <div class="row">
            <h2>¿Qué es aco?</h2>
                

A.C.O. es un sistema web destinado a facilitar las tareas de administración de consorcios brindando comodidades a los administradores como la centralización de los datos y la accesibilidad a ellos desde cualquier lugar del mundo. Permite a sus usuarios tener un mayor control sobre la información de sus diferentes consorcios facilitando, además, la tarea de la liquidación de las expensas, realizándola de una manera sencilla y automática. Se trata de un sistema moldeable, adaptándose a las necesidades de cada consorcio. 
ACO permite a los consorcistas llevar un mayor control de sus expensas, realizando consultas sobre su estado de cuenta, avisos, ingresos y egresos del consorcio, listas de morosos, consulta y pago de expensas, dándole así, un mayor control y una gran comodidad a los consorcistas.
 

                      
            </div>
            <div class="row">
            <h2>Servicios</h2>
 
A.C.O. divide sus servicios ofrecidos en dos diferentes tipos de usuarios:<br>
<br><strong>Administradores de Consorcios: </strong> poseen servicios como:<br>
<ul>
<br><li>Gestión de Consorcios.</li>
<li>Gestión de Torres.</li>
<li>Gestión de Unidades.</li>
<li>Gestión de Propietarios.</li>
<li>Gestión de Ingresos.</li>
<li>Gestión de Egresos.</li>
<li>Liquidación de Expensas.</li>
<li>Gestión de Cuenta Corriente.</li>
<li>Gestión de Proveedores.</li>
<li>Gestión de Personal.</li><br>
                </ul>
<ul><strong>Consorcistas: poseen servicios como:</strong><br>
<br><li>Consulta de ingresos y egresos del consorcio</li>
<li>Consulta de estado de cuenta de su unidad</li>
<li>Pago de expensas</li>
<li>Consulta de morosos</li>
<li>Consulta de avisos del consorcio</li>

</ul>
                      
            </div>
          <div class="below-slideshow">
               <div class="container">
            <div class="row">
            <h1>Preguntas Frecuentes</h1>
                

                <br><strong>¿Cualquier administrador de consorcio puede poseer una cuenta?<br></strong>
 Si, administrador puede acceder a una cuenta, siempre y cuando su consorcio pertenezca a la provincia de Tucumán, ya que el sistema está adaptado a las leyes de la misma. Posteriormente se trabajará para adaptarlo al resto de las provincias argentinas.<br>

<br><strong>¿ACO ofrece seguridad a mis datos?</strong><br>
Con A.C.O. puedes tener la total confianza ya que tus datos están absolutamente protegidos. Ofrece una completa seguridad y confidencialidad de los mismos. <br>

<br><strong>¿Si un administrador posee varios consorcios, debe crearse varias cuentas?</strong><br>
No. A.C.O. ofrece la ventaja de poder centralizar los datos de los diferentes consorcios en una sola cuenta, facilitándole al administrador sus tareas.<br>

<br><strong>¿Puedo usar A.C.O. desde un dispositivo móvil? </strong><br>
Absolutamente. A.C.O. es un sistema flexible y se adapta a smartphone, tablet o cualquier otro dispositivo móvil.<br>


 

                      
            </div>
          </div>
          </div>
              <div class="row">
                 <h2>Nosotros</h2>

Somos un grupo de estudiantes avanzados de la carrera de Ingeniería en Sistemas de Información que, a modo de proyecto final, desarrollamos A.C.O., un sistema destinado a brindar comodidades a los consorcistas y administradores de consorcios.
Buscamos ofrecer a nuestros clientes un servicio de calidad y eficiencia distinguida a base de mucho trabajo y esfuerzo. 


 

                      
            
                <div class="row">
            <h2>Contacto</h2>
                
<h3><a>info@aco.com</a></h3>
 
<br>
<br>
                    <br>
 

                      
            </div>
    
        </div>

    </div>
    <!-- BELOW SLIDESHOW SECTION END-->
     
      <!--SET-DIV SECTION END-->
   
   <div class="footer-sec">
         <div class="container">
        <div class="row">
        
 <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <hr />
                <div style="text-align:right;padding:5px;">
                    &copy;2018 A.C.O<a href="http://www.binarytheme.com/" style="color:#fff;" target="_blank" ></a>
                </div>
            </div>
    </div>
    </div>
       </div>
</div>
     <!--FOOTER SECTION END-->
      <!-- WE PUT SCRIPTS AT THE END TO LOAD PAGE FASTER-->
     <!--CORE SCRIPTS PLUGIN-->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
     <!--BOOTSTRAP SCRIPTS PLUGIN-->
<script src="assets/js/bootstrap.js"></script>
     <!--WOW SCRIPTS PLUGIN-->
    <script src="assets/js/wow.js"></script>
     <!--FLEXSLIDER SCRIPTS PLUGIN-->
    <script src="assets/js/jquery.flexslider.js"></script>
     <!--CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
