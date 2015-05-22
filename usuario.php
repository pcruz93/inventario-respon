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
    <div id="fondo2">
	<?php
	session_start();
	if(!isset($_SESSION['usuario'])) 
	{
	  header('Location: login.php'); 
	  exit();
	}
	include("conexion.php");
	$con=conectar();		
	?>
	<div class="header">
		<ul id="menu">
		<li><a href="logout.php">Cerrar sesión</a></li>
		<li><a id="inicio" href="index.php">Inicio</a></li>
		<li><a id="busqueda" href="#Busqueda">Búsqueda</a></li>
		<li><a id="bajas" href="#Bajas">Bajas</a></li>
		<li><a id="cambios" href="#Cambios">Cambios</a></li>
		<li><a id="altas" href="#Altas">Altas</a></li>
		</ul>
        <div id="logo"></div>
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
		<form name="formulario" method="post" action="altausuario.php">
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
		<input type="password" name="contrasena">
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
		<form name="formulario" method="post" action="bajausuario.php">
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
		<form method="post" action="">
		Alias:<br>
		<input type="text" id="alias2" name="alias2">
		<br><br>
		<input type="submit" value="Consultar" id="btn-consultar" name="boton">
		</form>
		<?php
        $var="";
		$var1="";
		$var2="";
		$var3="";
		$var4="";
		$var5="";
		$alias2="";
         if(isset($_POST["boton"])){
			$boton=$_POST["boton"];
			$alias2=$_POST["alias2"];
			try{
			$query="SELECT idusuario, nombreusuario, apellidousuario, aliasusuario, 
			contrasenausuario, tipousuario FROM inventario.usuario 
			WHERE aliasusuario = '$alias2'";
			$dato=mysqli_query($con,$query); 
				while($resul=mysqli_fetch_array($dato)){
						$var=$resul[0];
						$var1=$resul[1];
						$var2=$resul[2];
						$var3=$resul[3];
						$var4=$resul[4];
						$var5=$resul[5];
				}
				
			}catch(Exception $e){
				echo '<script>alert("Error: "$e)</script>';
		    }	
        }
    ?>
		
		<p style="text-align: center; font-size: 100%;">Información del usuario <?php echo $var?></p>
		<form name="formulario" method="post" action="cambiousuario.php">
		<input type="hidden" name="id" value="<?php echo $var?>">
		Nombre:<br>
		<input type="text" name="nombre" value="<?php echo $var1?>">
		<br>
		Apellidos:<br>
		<input type="text" name="apellido" value="<?php echo $var2?>">
		<br>
		Alias:<br>
		<input type="text" name="alias" value="<?php echo $var3?>">
		<br>
		Contraseña:<br>
		<input type="password" name="contrasena" value="<?php echo $var4?>">
		<br>
		Tipo:<br>
		<input type="text" name="tipo" value="<?php echo $var5?>">
		<br><br>
		<input type="submit" value="Modificar" name="modificar">
		</form>
	</div>
	
	<a name="Busqueda" id="s"> </a>
	<br><br />
	<div>
	    <h1 id="titulo">Búsqueda usuario</h1>
		<p style="text-align: center">Introduzca el alias del usuario a consultar.</p>
		<form method="post" action="">
		Alias:<br>
		<input type="text" name="alias3">
		<br><br>
		<input type="submit" value="Buscar" id="btn-buscar" name="boton2">
		</form>
		<?php
        $vari="";
		$vari1="";
		$vari2="";
		$vari3="";
		$vari4="";
		$vari5="";
		$alias3="";
         if(isset($_POST["boton2"])){
			$boton2=$_POST["boton2"];
			$alias3=$_POST["alias3"];
			try{
			$query="SELECT idusuario, nombreusuario, apellidousuario, aliasusuario, 
			contrasenausuario, tipousuario FROM inventario.usuario 
			WHERE aliasusuario = '$alias3'";
			$dato=mysqli_query($con,$query); 
				while($resul=mysqli_fetch_array($dato)){
						$vari=$resul[0];
						$vari1=$resul[1];
						$vari2=$resul[2];
						$vari3=$resul[3];
						$vari4=$resul[4];
						$vari5=$resul[5];
				}
				
			}catch(Exception $e){
				echo '<script>alert("Error: "$e)</script>';
		    }	
        }
    ?>
		<p style="text-align: center; font-size: 100%;">Información del usuario <?php echo $vari?></p>
		<form action="">
		Nombre:<br>
		<input type="text" name="nombre" value="<?php echo $vari1?>" disabled>
		<br>
		Apellidos:<br>
		<input type="text" name="apellido" value="<?php echo $vari2?>" disabled>
		<br>
		Alias:<br>
		<input type="text" name="alias" value="<?php echo $vari3?>" disabled>
		<br>
		Contraseña:<br>
		<input type="password" name="contraseña" value="<?php echo $vari4?>" disabled>
		<br>
		Tipo:<br>
		<input type="text" name="tipo" value="<?php echo $vari5?>" disabled>
		<br><br>
		</form>
	</div>
	</div>
    </div>
</body>
</html>