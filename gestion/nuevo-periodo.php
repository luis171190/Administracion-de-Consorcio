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
   <div id="logeo" style="width: 100%">
       <div class="generar-periodo">
       <h2 class="texto-label center" style="text-decoration:underline" >GENERAR PERIODOS</h2>
       <br>
           <div style="margin:auto">  
<form class="center" action="alta-periodo.php" method="post" >
    

      <label class="texto-label">Mes:</label>
    <select name="mes" id="mes" onchange="GenerarDesc();">
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
            
    </select>
      <label class="texto-label">Año:</label> 
    <select name="anio" id="anio" >
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>

            
    </select>
    <br><br>
    
    
    <input type="submit" class="btn-enviar" name="Submit" value="GENERAR"> 

</form>
     </div>          </div>
</div>
   
    </section>



</body>
    <script>
    


    </script>
</html>
