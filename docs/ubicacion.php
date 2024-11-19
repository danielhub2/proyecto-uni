<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio web</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jq_easing1.3.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFeJPWf8jmYi57CS9niXb-TaXlwoP1G08"></script>
<!-- AIzaSyCFeJPWf8jmYi57CS9niXb-TaXlwoP1G08 -->
</head>
<body>
  
    <header>
      <div id="top_logo"><img src="img/comun/logo_peq-02.png"/></div>

      <div class="barradebusqueda">
		<div class="barradebusqueda_centro">
		<form action="#">
			<input type="text" id="busqueda_inp" name="busqueda_inp" class="barra_bus" value="" autocomplete="off" placeholder="BUSQUEDA"> </input>
		<input type="submit" id="lupita" value=""></input>
		</form>

    </div>
  </header>
 <div class="contenedor_comun"> 
 <div class="centro_comun"> 
 		
	
		      <div class="head_titulo">
        <h1>Ubicación</h1>
    </div>
	<nav class="tamaño-letra">
    <a href="index.html">Inicio</a>
    <a href="materia.html">Materias</a>
    <a href="horario.html">Horarios</a>
    <a href="edificio.html">Edificios</a>
    <a href="ayuda.html">Ayuda</a>
    <a href="ubicacion.php">Ubicación </a>

</nav>
 <div class="centro_comun_sub"> 
         <div class="foto_izq">
            <h3 class="photo-uca2">Lugares cerca</h1>
			<p>Museos, bibliotecas, plazas, parques, tiendas, hospitales, escuelas</p>
           <img src="img/fotos/museo_rev-01.png" alt="" class="dos-imagen1">
           <img src="img/fotos/miradoors-01.png" alt="" class="dos-imagen1">
           <img src="img/fotos/museo_revolucion-01.png" alt="" class="dos-imagen1">
		   <!--
           <img src="img/fotos/imgs_alameda-01.png" alt="" class="dos-imagen1">
           <img src="img/fotos/catedral-01.png" alt="" class="dos-imagen1">
           <img src="img/fotos/Clinica1-01.png" alt="" class="dos-imagen1">
		   -->
		   <div class="logo_peq"></div>
       </div>
	<div class="centro_comun_map"> 
<section class="ubi_map">
<p class="ubi_desc">Ubicado en la Zona Centro de Saltillo, cerca de hospitales, museos, tiendas de convenienca y restaurantes. </p>
	<div id="mapa_contenedor"> </div>
</section>

<div class="redes-container-der">
        <ul>
            <li class="soc_facebook"><a href="https://www.facebook.com/UniversidadCarolina/" target="_blank"></i></a></li>
            <li class="soc_twitter"><a href="https://twitter.com/ucarolinamx/" target="_blank"></i></a></li>
            <li class="soc_instagram"><a href="https://www.instagram.com/universidadcarolina/" target="_blank"></i></a></li>
        </ul>
		</div>
</div>
</div>
</div>
</div>
<?php include('scripts/ini_map.php'); ?>
</body>
</html>