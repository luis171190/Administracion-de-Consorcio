$(function() {
    document.getElementById("sidebar").innerHTML="<div id="usuario-sidebar">
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
             <li><a href="ver-turnos-profesional.php"><span class="glyphicon glyphicon-list-alt"></span>Ver turnos</a></li>
             <li><a href="configurar-turno.php"><span class="glyphicon glyphicon-time"></span>Configurar horarios</a></li>
             <li><a href="profesionales.php"><span class="glyphicon glyphicon-paste"></span>Derivar turno</a></li>
             <li><a href="hc.php"><span class="glyphicon glyphicon-plus-sign"></span>Historia clínica</a></li>
             <li><a href="favoritos_prof.php"><span class="glyphicon glyphicon-star"></span>Favoritos</a></li>
             <li><a href="desactivar-horarios.php"><span class="glyphicon glyphicon-remove"></span>Desactivar horarios</a></li>
             <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
         </ul>"
})