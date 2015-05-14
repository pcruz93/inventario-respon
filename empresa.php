<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <title>Inventario | Empresa</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function (){
            $("#informacion").click(function() {
                $('html, body').animate({
                    scrollTop: $("#i").offset().top
                }, 1000);
            });
            
            $("#modificacion").click(function() {
                $('html, body').animate({
                    scrollTop: $("#m").offset().top
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
		<li><a id="modificacion" href="#Modificacion">Modificación</a></li>
		<li><a id="informacion" href="#Información">Información</a></li>
		</ul>
	</div>
	<div>
		<span>Empresas</span>
		<h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1>
		<br><br>
		<h1 style="text-align: center">Sección de la empresa</h1>
		<br>
	</div>
	
	<a name="Informacion" id="i"></a>
	<br><br />
	<div>
		<h1 id="titulo">Información de la empresa</h1>
		<form action="">
		Nombre:<br>
		<input type="text" name="nombre" disabled>
		<br>
		Giro:<br>
		<input type="text" name="giro" disabled>
		<br>
		Direccion:<br>
		<input type="text" name="direccion" disabled>
		<br>
		Ciudad:<br>
		<input type="text" name="ciudad" disabled>
		<br>
		Estado:<br>
		<input type="text" name="estado" disabled>
		<br>
		Pais:<br>
		<input type="text" name="pais" disabled>
		<br>
		Descripción:<br>
		<input type="text" name="color" disabled>
		<br><br>
		</form>
	</div>
	    
	<a name="Modificacion" id="m"></a>
	<br><br />
	<div>
		<h1 id="titulo">Cambiar información de la empresa</h1>
		<form action="">
		Nombre:<br>
		<input type="text" name="nombre">
		<br>
		Giro:<br>
		<input type="text" name="giro">
		<br>
		Direccion:<br>
		<input type="text" name="direccion">
		<br>
		Ciudad:<br>
		<input type="text" name="ciudad">
		<br>
		Estado:<br>
		<input type="text" name="estado">
		<br>
		Pais:<br>
		<input type="text" name="pais">
		<br>
		Descripción:<br>
		<input type="text" name="color">
		<br><br>
		<input type="submit" value="Modificar" name="modificar">
		<br><br>
		</form>
	</div>
</body>
</html>