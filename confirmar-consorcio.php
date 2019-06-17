<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="assets/css/panel2.css" rel="stylesheet">
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
    <link href="assets/css/login.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- ANIMATE STYLE  -->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <!-- FLEXSLIDER STYLE  -->
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <link href="assets/css/nuevo_consorcio.css" rel="stylesheet" />
    <!-- GOOGLE FONTS  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
    </head>
<!------ Include the above in your HEAD tag ---------->
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
<strong> <a href="#"> USUARIO</a> </strong>  
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
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consorcio<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li> 
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de Torres<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity  "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>     
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de Unidades<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>     
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de Propietarios<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>     
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de Egresos<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>     
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de Ingresos<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>     
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Liquidación de Expensas<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li> 
           
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Liquidación de Expensas<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Reportar</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>  
        <li ><a href="#">Cuentas Corrientes<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
        <li ><a href="#">Morosos<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
            <li ><a href="#">Personal<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
          <li ><a href="#">Proveedores<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
    
    <?php 
    
$razon_soc=utf8_decode($_POST["razon_social"]);
$cuit=$_POST["cuit"];
$cant_torres=$_POST["cant_torres"];
$provincia=utf8_decode($_POST["provincia"]);
$localidad=utf8_decode($_POST["localidad"]);
$calle=utf8_decode($_POST["calle"]);  
$nro_calle=$_POST["numero"];
    
    
    
    
    ?>
    <div id="princip">
        
             <div id="formulario">
                   <form action="php/nuevo-consorcio.php" method="post" class="form-confirmacion" onsubmit="return validar();">
                      <h1 class="cabecera">Confirme el nuevo consorcio</h1>
                     <div class="contenedor-inputs">
                      <div class="alert alert-info">Por favor verifique los datos del nuevo consorcio:</div>
                      <label>RAZÓN SOCIAL: </label><?php echo ' '.$razon_soc ?><br>
                      <label>CUIT: </label><?php echo ' '.$hora ?><br>
                      
                   
                    <input type="submit" value="CONFIRMAR" class="btn-confirmar"> 
                    <div class="link-form">¿Desea modificar su consulta? <a href="ver-turnos-profesional.php">Click aquí.</a></div>
                   </form>
                  </div>
        
    </div>
       <!--<div class="footer-sec">
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
</div>-->
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