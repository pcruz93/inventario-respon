<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Inventario | Registro</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function (){
            $("#altas").click(function() {
                $('html, body').animate({
                    scrollTop: $("#a").offset().top
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
		<li><a id="cambios" href="#Cambios">Cambios</a></li>
		<li><a id="altas" href="#Altas">Altas</a></li>
		</ul>
        <div id="logo-menu" onClick="<?phpheader('Location: index.php');<?";></div>
	</div>
	<div>
		<span>Registros</span>
		<h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1>
		<br><br>
		<h1 style="text-align: center">Sección de registro</h1>
		<br>
	</div>
	
	<a name="Altas" id="a"></a>
	<br><br />
	<div>
		<h1 id="titulo">Agregar registro</h1>
		<form action="">
		Razon:<br>
		<input type="text" name="Razon">
		<br>
		Cantidad:<br>
		<input type="text" name="cantidad">
		<br>
		Código de producto:<br>
		<input type="text" name="codigoproducto">
		<br>
		Fecha:<br>
		<input type="date" name="fecha">
		<br><br>
		<input type="submit" value="Agregar" name="agregar">
		</form>
	</div>
	    
	<a name="Cambios" id="c"></a>
	<br><br />
	<div>
		<h1 id="titulo">Modificar registro</h1>
		<p style="text-align: center">Introduzca el número del registro a modificar.</p>
		<form action="">
		Número:<br>
		<input type="text" name="numero">
		<br><br>
		<input type="submit" value="Consultar" name="consultar">
		</form>
		<p style="text-align: center; font-size: 100%;">Información del registro</p>
		<form action="">
		Razon:<br>
		<input type="text" name="Razon">
		<br>
		Cantidad:<br>
		<input type="text" name="cantidad">
		<br>
		Código de producto:<br>
		<input type="text" name="codigoproducto">
		<br>
		Fecha:<br>
		<input type="date" name="fecha">
		<br><br>
		<input type="submit" value="Modificar" name="modificar">
		</form>
	</div>
	
	<a name="Busqueda" id="s"> </a>
	<br><br />
	<div>
	    <h1 id="titulo">Búsqueda de registros por producto</h1>
		<p style="text-align: center">Introduzca el código del producto para consultar los registros.</p>
		<form action="">
		Código:<br>
		<input type="text" name="codigo">
		<br><br>
		<input type="submit" value="Consultar" name="consultar">
		</form>
		<p style="text-align: center; font-size: 100%;">Información de los registros</p>
		<table class="width200">
            <thead>
            <tr>
                <th>Razón</th>
                <th>Cantidad</th>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>ID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>HACER</td>
                <td>QUE LA TABLA</td>
                <td>SEA DINAMICA</td>
                <td>CON PHP</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Mart&iacute;n</td>
                <td>Iglesias Lenci</td>
                <td>Desarrollador</td>
                <td>@martinigleu</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Mart&iacute;n</td>
                <td>Iglesias Lenci</td>
                <td>Desarrollador</td>
                <td>@martinigleu</td>
                <td>3</td>
            </tr>
            </tbody>
        </table>
	</div>
	</div>
</body>
</html>