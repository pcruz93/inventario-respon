<?php  
session_start();
if(!isset($_SESSION['usuario'])){
  header('Location:login.php'); 
exit();
}
include("conexion.php");
$con=conectar();		
?>
<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Inventario | Registro</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="js/insertar.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function (){
                $("#altas").click(function() {
                    $('html, body').animate({scrollTop: $("#a").offset().top}, 1000);
                });    
                $("#cambios").click(function() {
                    $('html, body').animate({scrollTop: $("#c").offset().top}, 1000);
                });
                $("#busqueda").click(function() {
                    $('html, body').animate({scrollTop: $("#s").offset().top}, 1000);
                });
            });
        </script>
	</head>
	<body>
	<div id="fondo2">
        <div id="izq"></div>
        <div id="der"></div>
                <div class="header">
					<ul id="menu">
                        <li><a href="logout.php">Cerrar sesión</a></li>
                        <li><a id="inicio" href="index.php">Inicio</a></li>
                        <li><a id="busqueda" href="#Busqueda">Búsqueda</a></li>
                        <li><a id="cambios" href="#Cambios">Cambios</a></li>
                        <li><a id="altas" href="#Altas">Altas</a></li>
					</ul>
                    <div id="logo"></div>
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
					<form action="" method="post" >
					Razon:<br>
					<input type="text" name="razon" id="razon">
					<br>
					Cantidad:<br>
					<input type="text" name="cantidad" id="cantidad">
					<br>
					Código de producto:<br>
					<input type="text" name="codigoproducto" id="codigoproducto">
					<br>
					Fecha:<br>
					<input type="date" name="fecha" id="fecha">
					<br><br>
					<input type="submit" value="Agregar"  id="btn-agregar" name="agregar">
					<div id="Exito"></div>
					</form>
				</div>    
				<a name="Cambios" id="c"></a>
				<br><br />
				<div>
					<h1 id="titulo">Modificar registro</h1>
					<p style="text-align: center">Introduzca el número del registro a modificar.</p>
					<form action="" method="post">
					Número:<br>
					<input type="text" id="numero" name="numero">
					<br><br>
					<input type="submit" value="Consultar" id="btn-consultar" name="boton">
					</form>  
					<?php
					$var="";
					$var1="";
					$var2="";
					$var3="";
					$var4="";
					$numero="";
					 if(isset($_POST["boton"])){
						$boton=$_POST["boton"];
						$numero=$_POST["numero"];
						try{
						$query="select * from registro where idregistro=$numero";
						$dato=mysqli_query($con,$query); 
							while($resul=mysqli_fetch_array($dato)){
									$var=$resul[0];
									$var1=$resul[1];
									$var2=$resul[2];
									$var3=$resul[3];
									$var4=$resul[4];
							}
							
						}catch(Exception $e){
							echo '<script>alert("Error: "$e)</script>';
						}	
					}
				?>
					
				<p style="text-align: center; font-size: 100%;">Información del registro</p>
				  <form action="" method="post">
					   <input type="text" hidden="true" name="id" id="id"  value="<?php echo $var?>">
						Razon:<br>
						<input type="text" required="required" name="razonbusqueda" id="razonbusqueda" value="<?php echo $var1?>">
						<br>
						Cantidad:<br>
						<input type="text" required="required" name="cantidadbusqueda" id="cantidadbusqueda"  value="<?php echo $var2?>">
						<br>
						Código de producto:<br>
						<input type="text" required="required" name="codigoproductobusqueda"  id="codigoproductobusqueda" value="<?php echo $var3?>">
						<br>
						Fecha:<br>
						<input type="datetime" required="required" name="fechabusqueda" id="fechabusqueda" value="<?php echo $var4?>">
						<br><br>
						<input type="submit" value="Modificar" id="btn-modificar" name="boton">
						<div id="Exito1"></div>
				 </form>  
				</div>
				
				<a name="Busqueda" id="s"> </a>
				<br><br />
				<div id="tabla-busqueda">
					<h1 id="titulo">Búsqueda de registros por producto</h1>
					<p style="text-align: center">Introduzca el código del producto para consultar los registros.</p>
					<form action="" method="post">
					Código:<br>
					<input type="text" id="bus" name="bus" onkeyup="loadXMLDoc()"  required />
						<div id="myDiv"></div>
					</form>
				</div>   
		</div>
</body>
</html>