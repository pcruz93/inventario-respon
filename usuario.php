<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <title>Inventario | Usuario</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function (){
            $("#altas").click(function() {
                $('html, body').animate({
                    scrollTop: $("#a").offset().top
                }, 1000);
            });
            
            $("#bajas").click(function() {
                $('html, body').animate({
                    scrollTop: $("#b").offset().top
                }, 1000);
            });
            
            $("#cambios").click(function() {
                $('html, body').animate({
                    scrollTop: $("#c").offset().top
                }, 1000);
            });
            
            $("#busqueda").click(function() {
                $('html, body').animate({
                    scrollTop: $("#s").offset().top
                }, 1000);
            });
                //});
        });
    </script>
	</head>
<body>
	<?php
	session_start();
	if(!isset($_SESSION['usuario'])) 
	{
	  header('Location: login.php'); 
	  exit();
	}?>
	<div class="header">
		<ul id="menu">
		<li><a href="logout.php">Cerrar sesión</a></li>
		<li><a id="inicio" href="index.php">Inicio</a></li>
		<li><a id="busqueda" href="#Busqueda">Búsqueda</a></li>
		<li><a id="bajas" href="#Bajas">Bajas</a></li>
		<li><a id="cambios" href="#Cambios">Cambios</a></li>
		<li><a id="altas" href="#Altas">Altas</a></li>
		</ul>
	</div>
	<div>
		<span>Usuarios</span>
		<h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1>
		<br><br>
		<h1 style="text-align: center">Sección de usuarios</h1>
		<br>
	</div>
	
	<a name="Altas" id="a"></a>
	<br><br />
	<div>
		<h1 id="titulo">Agregar usuario</h1>
		<form action="">
		Nombre:<br>
		<input type="text" name="nombre">
		<br>
		Apellidos:<br>
		<input type="text" name="apellido">
		<br>
		Alias:<br>
		<input type="text" name="alias">
		<br>
		Contraseña:<br>
		<input type="text" name="contraseña">
		<br>
		Tipo:<br>
		<input type="text" name="tipo">
		<br><br>
		<input type="submit" value="Agregar" name="agregar">
		</form>
	</div>
	
	<a name="Bajas" id="b"></a>
	<br><br />    
	<div>
		<h1 id="titulo">Eliminar usuario</h1>
		<p style="text-align: center">Introduzca el alias del usuario a eliminar.</p>
		<form action="">
		Alias:<br>
		<input type="text" name="alias">
		<br><br>
		<input type="submit" value="Eliminar" name="eliminar">
		</form>
	</div>
	    
	<a name="Cambios" id="c"></a>
	<br><br />
	<div>
		<h1 id="titulo">Modificar usuario</h1>
		<p style="text-align: center">Introduzca el alias del usuario a modificar.</p>
		<form action="">
		Alias:<br>
		<input type="text" name="alias">
		<br><br>
		<input type="submit" value="Consultar" name="consultar">
		</form>
		<p style="text-align: center; font-size: 100%;">Información del usuario</p>
		<form action="">
		Nombre:<br>
		<input type="text" name="nombre">
		<br>
		Apellidos:<br>
		<input type="text" name="apellido">
		<br>
		Alias:<br>
		<input type="text" name="alias">
		<br>
		Contraseña:<br>
		<input type="text" name="contraseña">
		<br>
		Tipo:<br>
		<input type="text" name="tipo">
		<br><br>
		<input type="submit" value="Modificar" name="modificar">
		</form>
	</div>
	
	<a name="Busqueda" id="s"> </a>
	<br><br />
	<div>
	    <h1 id="titulo">Búsqueda usuario</h1>
		<p style="text-align: center">Introduzca el alias del usuario a consultar.</p>
		<form action="">
		Alias:<br>
		<input type="text" name="alias">
		<br><br>
		<input type="submit" value="Consultar" name="consultar">
		</form>
		<p style="text-align: center; font-size: 100%;">Información del usuario</p>
		<form action="">
		Nombre:<br>
		<input type="text" name="nombre" disabled>
		<br>
		Apellidos:<br>
		<input type="text" name="apellido" disabled>
		<br>
		Alias:<br>
		<input type="text" name="alias" disabled>
		<br>
		Contraseña:<br>
		<input type="text" name="contraseña" disabled>
		<br>
		Tipo:<br>
		<input type="text" name="tipo" disabled>
		<br><br>
		</form>
	</div>
	</div>
</body>
</html>