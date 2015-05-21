<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <title>Inventario | Reportes</title>
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
			<li><a id="producto" href="index.php">Inicio</a></li>
		</ul>
        <div class="logo"></div>
	</div>
    <div id="fondo">
        <div>
            <h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1> 
            <h2 id="reporte-titulo">Genera tu reporte</h2>
            <div  id="img-reporte" onClick="location.href ='reporteProductos.php'">Click para generar</div>
        </div>
    </div>
</body>
</html>
