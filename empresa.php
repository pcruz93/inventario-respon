<?php  
$link = mysqli_connect('localhost','root','1234','inventario') or die('Ha fallado la conexión: '. mysqli_error($link)); 
$query = 'SELECT * FROM inventario.empresa WHERE idempresa = 1' or die('Error en la consulta: '. mysqli_error($link)); 
$result = $link->query($query); 
while($row = mysqli_fetch_array($result)) { 
  $_POST['nombreempresa'] = $row["nombreempresa"];
  $_POST['giroempresa'] = $row["giroempresa"];
  $_POST['direccionempresa'] = $row["direccionempresa"];
  $_POST['ciudadempresa'] = $row["ciudadempresa"];
  $_POST['estadoprovinciaempresa'] = $row["estadoprovinciaempresa"];
  $_POST['paisempresa']= $row["paisempresa"];
  $_POST['comentarioempresa'] = $row["comentarioempresa"];
} 

mysqli_close($link);
?> 
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
		<p><?php echo $_POST['nombreempresa'];?></p>
		<br>
		Giro:<br>
		<p><?php echo $_POST['giroempresa'];?></p>
		<br>
		Direccion:<br>
		<p><?php echo $_POST['direccionempresa'];?></p>
		<br>
		Ciudad:<br>
		<p><?php echo $_POST['ciudadempresa'];?></p>
		<br>
		Estado:<br>
		<p><?php echo $_POST['estadoprovinciaempresa'];?></p>
		<br>
		Pais:<br>
		<p><?php echo $_POST['paisempresa'];?></p>
		<br>
		Descripción:<br>
		<p><?php echo $_POST['comentarioempresa'];?></p>
		<br><br>
		</form>
	</div>
	    
	<a name="Modificacion" id="m"></a>
	<br><br />
	<div>
		<h1 id="titulo">Cambiar información de la empresa</h1>
		<form name="formulario" method="post" action="actualizarempresa.php">
		Nombre:<br>
		<input type="text" name="nombre" value="<?php echo $_POST['nombreempresa'];?>">
		<br>
		Giro:<br>
		<input type="text" name="giro" value="<?php echo $_POST['giroempresa'];?>">
		<br>
		Direccion:<br>
		<input type="text" name="direccion" value="<?php echo $_POST['direccionempresa'];?>">
		<br>
		Ciudad:<br>
		<input type="text" name="ciudad" value="<?php echo $_POST['ciudadempresa'];?>">
		<br>
		Estado:<br>
		<input type="text" name="estado" value="<?php echo $_POST['estadoprovinciaempresa'];?>">
		<br>
		Pais:<br>
		<input type="text" name="pais" value="<?php echo $_POST['paisempresa'];?>">
		<br>
		Descripción:<br>
		<input type="text" name="descripcion" value="<?php echo $_POST['comentarioempresa'];?>">
		<br><br>
		<input type="submit" value="Modificar" name="modificar">
		<br><br>
		</form>
	</div>
</body>
</html>