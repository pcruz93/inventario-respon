<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <title>Inventario | Producto</title>
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
		<span>Productos</span>
		<h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1>
		<br><br>
		<h1 style="text-align: center">Sección de productos</h1>
		<br>
	</div>
	
	<a name="Altas" id="a"></a>
	<br><br />
	<div>
		<h1 id="titulo">Agregar producto</h1>
		<form method="post" action="altaproducto.php">
		Código:<br>
		<input type="text" name="codigo">
		<br>
		Nombre:<br>
		<input type="text" name="nombre">
		<br>
		Tipo:<br>
		<input type="text" name="tipo">
		<br>
		Cantidad:<br>
		<input type="text" name="cantidad">
		<br>
		Precio:<br>
		<input type="text" name="precio">
		<br>
		Modelo:<br>
		<input type="text" name="modelo">
		<br>
		Color:<br>
		<input type="text" name="color">
		<br>
		Talla:<br>
		<input type="text" name="talla">
		<br>
		Categoría:<br>
		<input type="text" name="categoria">
		<br><br>
		<input type="submit" value="Agregar" name="agregar">
		</form>
	</div>
	
	<a name="Bajas" id="b"></a>
	<br><br />    
	<div>
		<h1 id="titulo">Eliminar producto</h1>
		<p style="text-align: center">Introduzca el código del producto a eliminar.</p>
		<form method="post" action="bajaproducto.php">
		Código:<br>
		<input type="text" name="codigo">
		<br><br>
		<input type="submit" value="Eliminar" name="eliminar">
		</form>
	</div>
	    
	<a name="Cambios" id="c"></a>
	<br><br />
	<div>
		<h1 id="titulo">Modificar producto</h1>
		<p style="text-align: center">Introduzca el código del producto a modificar.</p>
		<form method="post" action="">
		Código:<br>
		<input type="text" id="codigo2" name="codigo2">
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
		$var6="";
		$var7="";
		$var8="";
		$var9="";
		$codigo2="";
         if(isset($_POST["boton"])){
			$boton=$_POST["boton"];
			$codigo2=$_POST["codigo2"];
			try{
			$query="SELECT idproducto, codigoproducto, nombreproducto, tipoproducto, cantidadproducto,
					precioproducto, caracunoproducto, caracdosproducto, caractresproducto,
					caraccuatroproducto FROM inventario.producto join inventario.detalleproducto 
					ON idproducto = productoidproducto WHERE codigoproducto = '$codigo2'";
			$dato=mysqli_query($con,$query); 
				while($resul=mysqli_fetch_array($dato)){
						$var=$resul[0];
						$var1=$resul[1];
						$var2=$resul[2];
						$var3=$resul[3];
						$var4=$resul[4];
						$var5=$resul[5];
						$var6=$resul[6];
						$var7=$resul[7];
						$var8=$resul[8];
						$var9=$resul[9];
				}
				
			}catch(Exception $e){
				echo '<script>alert("Error: "$e)</script>';
		    }	
        }
    ?>
		<p style="text-align: center; font-size: 100%;">Información del producto <?php echo $var?></p>
		<form name="formulario" method="post" action="cambioproducto.php">
		<input type="hidden" name="id" value="<?php echo $var?>">
		Código:<br>
		<input type="text" name="codigo" value="<?php echo $var1?>">
		<br>
		Nombre:<br>
		<input type="text" name="nombre" value="<?php echo $var2?>">
		<br>
		Tipo:<br>
		<input type="text" name="tipo" value="<?php echo $var3?>">
		<br>
		Cantidad:<br>
		<input type="text" name="cantidad" value="<?php echo $var4?>">
		<br>
		Precio:<br>
		<input type="text" name="precio" value="<?php echo $var5?>">
		<br>
		Modelo:<br>
		<input type="text" name="modelo" value="<?php echo $var6?>">
		<br>
		Color:<br>
		<input type="text" name="color" value="<?php echo $var7?>">
		<br>
		Talla:<br>
		<input type="text" name="talla" value="<?php echo $var8?>">
		<br>
		Categoría:<br>
		<input type="text" name="categoria" value="<?php echo $var9?>">
		<br><br>
		<input type="submit" value="Modificar" name="modificar">
		</form>
	</div>
	
	<a name="Busqueda" id="s"> </a>
	<br><br />
	<div>
	    <h1 id="titulo">Búsqueda producto</h1>
		<p style="text-align: center">Introduzca el código del producto a consultar.</p>
		<form method="post" action="">
		Código:<br>
		<input type="text" id="codigo3" name="codigo3">
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
		$vari6="";
		$vari7="";
		$vari8="";
		$vari9="";
		$codigo3="";
         if(isset($_POST["boton2"])){
			$boton2=$_POST["boton2"];
			$codigo3=$_POST["codigo3"];
			try{
			$query="SELECT idproducto, codigoproducto, nombreproducto, tipoproducto, cantidadproducto,
					precioproducto, caracunoproducto, caracdosproducto, caractresproducto,
					caraccuatroproducto FROM inventario.producto join inventario.detalleproducto 
					ON idproducto = productoidproducto WHERE codigoproducto = '$codigo3'";
			$dato=mysqli_query($con,$query); 
				while($resul=mysqli_fetch_array($dato)){
						$vari=$resul[0];
						$vari1=$resul[1];
						$vari2=$resul[2];
						$vari3=$resul[3];
						$vari4=$resul[4];
						$vari5=$resul[5];
						$vari6=$resul[6];
						$vari7=$resul[7];
						$vari8=$resul[8];
						$vari9=$resul[9];
				}
				
			}catch(Exception $e){
				echo '<script>alert("Error: "$e)</script>';
		    }	
        }
    ?>
		<p style="text-align: center; font-size: 100%;">Información del producto <?php echo $vari?></p>
		<form action="">
		Código:<br>
		<input type="text" name="codigo" value="<?php echo $vari1?>" disabled>
		<br>
		Nombre:<br>
		<input type="text" name="nombre" value="<?php echo $vari2?>" disabled>
		<br>
		Tipo:<br>
		<input type="text" name="tipo" value="<?php echo $vari3?>" disabled>
		<br>
		Cantidad:<br>
		<input type="text" name="cantidad" value="<?php echo $vari4?>" disabled>
		<br>
		Precio:<br>
		<input type="text" name="precio" value="<?php echo $vari5?>" disabled>
		<br>
		Modelo:<br>
		<input type="text" name="modelo" value="<?php echo $vari6?>" disabled>
		<br>
		Color:<br>
		<input type="text" name="color" value="<?php echo $vari7?>" disabled>
		<br>
		Talla:<br>
		<input type="text" name="talla" value="<?php echo $vari8?>" disabled>
		<br>
		Categoría:<br>
		<input type="text" name="categoria" value="<?php echo $vari9?>" disabled>
		<br><br>
		</form>
	</div>
	</div>
    </div>
</body>
</html>