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
			<li><a id="empresa" href="empresa.php">Empresa</a></li>
			<li><a id="usuario" href="usuario.php">Usuarios</a></li>
			<li><a id="registro" href="registro.php">Registros</a></li>
			<li><a id="producto" href="producto.php">Productos</a></li>
		</ul>
        <div id="logo-menu" onClick="header('Location: index.php');";></div>
	</div>
	<div>
		<h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1> 
		<div  style="background-image: url('img/Pagina_en_mantenimiento.jpg'); width:460px; height:465px; repeat:fixed; position:absolute; top:20%;left: 50%;  margin-left: -200px; margin-top: 10px; position:absolute;">
		</div>
	</div>
</body>
</html>
