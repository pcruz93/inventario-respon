<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <title>Inventario | Inicio</title>
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
            <li><a id="Generar reporte" href="reportes.php">Generar reporte</a></li>
			<li><a id="empresa" href="empresa.php">Empresa</a></li>
			<li><a id="usuario" href="usuario.php">Usuarios</a></li>
			<li><a id="registro" href="registro.php">Registros</a></li>
			<li><a id="producto" href="producto.php">Productos</a></li>
		</ul>
        <div class="logo"></div>
	</div>
    <div id="fondo">
        <div>
            <h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1> 
            <div  id="img-index"></div>
        </div>
    </div>
</body>
</html>
