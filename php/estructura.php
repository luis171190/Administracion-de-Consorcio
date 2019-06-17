<?php

session_start();
require_once('conn/connect.php');


//------------------------------------PARA PACIENTE-----------------------------------------------------------------------


function validarSesionPaciente() {

include('conn/connect.php');    
    
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilegio']==0) {

    global $usuario, $enlace, $privilegio, $id_usuario, $fila;
    $usuario=$_SESSION['username'];
    //$enlace='panel-paciente.php';
    $privilegio=$_SESSION['privilegio'];
    $id_usuario=$_SESSION['id_usuario'];
    

    $consulta ="SELECT * FROM usuario WHERE nombre_usuario ='$usuario'";
    $resultado=$connect->query($consulta);
    $fila= mysqli_fetch_assoc($resultado);
    //$img_paciente = $fila['img_paciente'];
  
    //si existe la imagen del usuario paciente se la muestra, de lo contrario se muestra la imagen por defecto.
    /*if(isset($fila['img_paciente'])){
             $imgPaciente = 'data:image/jpg;base64, base64_encode($fila[\'img_paciente\'])';
            }else{
               $imgPaciente = '<img src="img/default_avatar.png" alt="">';
            }*/

} else {
    
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']!=0) {
                
            
    
                echo 'Usted no tiene permiso para acceder a esta página.';
                exit;
                
            } else {
                 $usuario='Ingresar';
                 $enlace='login.php';
                 header('Location: http://localhost/github/excelsius2/inicie-sesion.html');
    
    
            
            }
        }

}
    


function headerPaciente() { global $usuario, $fila?>
    
    
    <div id="barramenu" class="contenedor">
    <a href="index.php"><img src="../img/logoblancosolo.png" id="logo" ></a>
    <a id="textologo" href="javascript:$.scrollTo('0px',700);"><h1>Excelsius</h1></a>
    <input type="checkbox" id="menu-bar">
    <label class="icon-menu" for="menu-bar"></label>
    <a href="index.php#equipo_m"><label class="icon-search" for=""></label></a>

    <nav class="menu">

    <ul> 

    <li id="item-ingresar"><a href="#"><img src="<?php 
                    if(isset($fila['img_paciente'])){
                        echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                    }else{
                        echo 'img/default_avatar.png';
                    }

                    ?>" alt=""><?php echo $usuario ?><span class="caret"></span></a>
    <ul id="submenu-usuario">
        <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-list-alt"></span>Mis turnos</a></li>
        <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Solicitar turno</a></li>
        <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>
        <li><a href="favoritos_pac.php"><span class="glyphicon glyphicon-edit"></span>Favoritos</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
    </ul>
    </li>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="nosotros.php">Nosotros</a></li>
    <li><a href="profesionales.php">Profesionales</a></li>
    <li><a href="asociados.php">Asociados</a></li>
    <li><a href="servicios.php">Servicios</a></li>
    <li><a href="noticias.php">Noticias</a></li>
    <li><a href="contacto.php">Contacto</a></li>
    <li class="submenu" id="item-buscar"><a href="index.php#equipo_m">Buscar<span class="icon-search"></span></a></li>
    <div class="dropdown">
      <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <span class="glyphicon glyphicon-user"></span> <?php echo $usuario ?>
        <span class="caret"></span>
      </button>
      <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
<!--        <li><a href="panel-paciente.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>-->
        <li><a href="cambiar-contra.php"><span class="glyphicon glyphicon-cog"></span>Cambiar contraseña</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
      </ul>
    </div>
    <!--<li><a href=""><span class="glyphicon glyphicon-user"></span>Ingresar</a></li>-->
    </ul>


    </nav>     
    </div>
   
<?php } ?>
    
      
<?php 

function sidebarConsorcista() { global $fila, $usuario;
?>

    <div class="sidebar" >
        <div id="usuario-sidebar">
         <img src="<?php 
                if(isset($fila['img_paciente'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila['img_paciente']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt="">
                
        </div>
        
        <div id="nombre-sidebar">
            
            <h4><?php echo $usuario ?></h4>
            
        </div>
        
        
         <ul>
             <li class="menu-paciente"><a href="perfil-consorcista.php"> <span class="glyphicon glyphicon-user"></span> Mi perfil</a></li>
             <li class="menu-paciente"><a href="ingresos-consorcista.php"> <span class="glyphicon glyphicon-circle-arrow-left"></span> Ver Ingresos</a></li>
             <li class="menu-paciente"><a href="egresos-consorcista.php"> <span class="glyphicon glyphicon-circle-arrow-right"></span> Ver Egresos</a></li>
             <li class="menu-paciente"><a href="ver-liq-cons.php"> <span class="glyphicon glyphicon-piggy-bank"></span> Ver Liquidación</a></li>
             
             <li><a href="ver-morosidad-cons.php"><span class="glyphicon glyphicon-thumbs-down"></span>Ver Morosidad</a></li>
             <li><a href="ver-estado-cuenta-cons.php"><span class="glyphicon glyphicon-usd"></span>Estado de cuenta</a></li>
             
             <li><a href="ver-anuncios-cons.php"><span class="glyphicon glyphicon-bullhorn"></span>Anuncios</a></li>
             <li class="menu-paciente"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
         </ul>
    </div>

<?php } ?>




<!----------------------------------------------------------PARA ADMINISTRADOR DE CONSORCIO------------------------------------------------------>

<?php

function validarSesionAdmin(){
    
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']==1) 
{  
    global $connect, $usuario,$enlace, $privilegio, $id_usuario, $fila3, $img_usuario;
    $usuario=$_SESSION['username']; 
    $enlace='panel-profesional.php';
    $privilegio=$_SESSION['privilegio'];
    $id_usuario= $_SESSION['id_usuario'];
    
   /* $consulta3 = "SELECT img FROM profesionales2 WHERE usuario_idUsuario = $id_usuario";
    $resultado3=$connect->query($consulta3);
    $fila3= mysqli_fetch_assoc($resultado3);
     $img_usuario=$fila3['img'];*/
    
} 
    else 
    {
    
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['privilegio']!=1) {
                
            
    
                echo 'Usted no tiene permiso para acceder a esta página.';
                exit;
                
            } else {
                 $usuario='Ingresar';
                 $enlace='login.php';
                 //header('Location: http://localhost/excelsius/inicie-sesion.html');
                 echo '<script>
    
     window.location.href="inicie-sesion.html";
    
    </script>';
    
    
            
            }
        }
     
    
    
}

function headerAdm(){ 
  global $img_usuario, $usuario, $enlace;
?>
    
    
    <div id="barramenu" class="contenedor">
<a href="index.php"><img src="img/logo.png" id="logo" ></a>
<a id="textologo" href="javascript:$.scrollTo('0px',700);"><h1>Excelsius</h1></a>
<input type="checkbox" id="menu-bar">
<label class="icon-menu" for="menu-bar"></label>
<a href="index.php#equipo_m"><label class="icon-search" for=""></label></a>

<nav class="menu">

<ul> 

<li id="item-ingresar"><a href="#"><img src="<?php 
                 if(isset($img_usuario)){
                    echo 'data:image/jpg;base64,'.base64_encode($img_usuario);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt=""><?php echo $usuario ?><span class="caret"></span></a>
<ul id="submenu-usuario">
  <!--  <li><a href="panel-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
    <li><a href="profesionales.php"><span class="glyphicon glyphicon-cog"></span>Configurar horarios</a></li>
    <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Derivar turno</a></li>
    <li><a href="desactivar-horarios.php"><span class="glyphicon glyphicon-remove"></span>Desactivar horarios</a></li>-->
<!--    <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>-->
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
</ul>
</li>
<li><a href="index.php#home">Inicio</a></li>
<li><a href="index.php#service">Servicios</a></li>
<li><a href="index.php#about">¿Que es A.C.O?</a></li>
<li><a href="index.php#team">Nosotros</a></li>
<li><a href="index.php#blog">Preguntas</a></li>

<li><a href="index.php#contact">Contacto</a></li>

<div class="dropdown">
  <button class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <span class="glyphicon glyphicon-user"></span> <?php echo $usuario ?>
    <span class="caret"></span>
  </button>
  <ul id="dropdownMenu2" class="dropdown-menu" aria-labelledby="dropdownMenu1">
<!--    <li><a href="panel-profesional.php"><span class="glyphicon glyphicon-user"></span>Mi cuenta</a></li>-->
    <li><a href="cambiar-contra.php"><span class="glyphicon glyphicon-cog"></span>Cambiar contraseña</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
  </ul>
</div>
<!--<li><a href=""><span class="glyphicon glyphicon-user"></span>Ingresar</a></li>-->
</ul>


</nav>     
</div>

<!--<a href="<?php echo $enlace ?>" class="etiqueta-ingresar"> <?php echo $usuario ?> <img src="img/user.png" alt=""> </a>-->

    
    
 <?php   
    
}

function sidebarAdm() { 
global $fila3, $usuario;?>

    
     
<div class="sidebar" >
        <div id="usuario-sidebar">
         <img src="<?php 
                if(isset($fila3['img'])){
                    echo 'data:image/jpg;base64,'.base64_encode($fila3['img']);
                }else{
                    echo 'img/default_avatar.png';
                }
                
                ?>" alt="">
                
        </div>
        
        <div id="nombre-sidebar">
            
            <h4><?php echo $usuario ?></h4>
            
        </div>
        
        
         <ul>
             <li><a href="gestion-consorcio.php"><span class="glyphicon glyphicon-list-alt"></span>Consorcio</a></li>
             <li><a href="gestion-torres.php"><span class="glyphicon glyphicon-pawn"></span>Torres</a></li>
        <!--        <li><a href="gestion-unidades.php"><span class="glyphicon glyphicon-leaf"></span>Unidades</a></li>-->
             <li><a href="gestion-propietarios.php"><span class="glyphicon glyphicon-user"></span>Propietarios</a></li>
             <li><a href="generar-cuentas-consorcistas.php"><span class="glyphicon glyphicon-thumbs-up"></span>Cuentas Usuarios</a></li>
<!--             <li><a href="editar-perfil-paciente.php"><span class="glyphicon glyphicon-edit"></span>Editar perfil</a></li>-->
             <li><a href="egresos.php"><span class="glyphicon glyphicon-circle-arrow-right"></span>Egresos</a></li>
             <li><a href="ingresos.php"><span class="glyphicon glyphicon-circle-arrow-left"></span>Ingresos</a></li>
             <li><a href="expensas.php"><span class=" 
glyphicon glyphicon-piggy-bank"></span>Liquidación Expensas</a></li>
            <!-- <li><a href="estado-cuenta.php"><span class="glyphicon glyphicon-usd"></span>Cuentas Corrientes</a></li> -->
             <li><a href="morosos.php"><span class="glyphicon glyphicon-thumbs-down"></span>Morosos</a></li>
          <!--   <li><a href="personal.php"><span class="glyphicon glyphicon-info-sign"></span>Personal</a></li> -->
             <li><a href="proveedores.php"><span class="glyphicon glyphicon-shopping-cart"></span>Proveedores</a></li>
          <!--   <li><a href="anuncios.php"><span class="glyphicon glyphicon-bullhorn"></span>Anuncios</a></li> -->
             <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
             
         </ul>
    </div>
    


<?php
 }


?>


<!----------------------------------------------------------PARA PANTALLAS COMUNES------------------------------------------------------>








<!----------------------------------------------------------FOOTER------------------------------------------------------>

<?php 
function footer() { 
?>    
    
    <div class="contenedor">
               <p class="copy">Administración de consorcios online &copy; 2018</p>
                <div class="sociales">
                    <a class="icon-facebook" href="https://www.facebook.com/excelsius.salud?fref=ts" target="_blank"></a>
                    <a class="icon-twitter" href=""></a>
                    <a class="icon-instagram" href="https://www.instagram.com/excelsiussalud/" target="_blank"></a>
                </div>
            </div>
    

<?php } ?>

