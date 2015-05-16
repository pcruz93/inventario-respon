<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Inventario | Inicio de sesión</title>
		<meta name="description" content="Pagina de inicio de sesión">
		<meta name="author" content="Mario Domínguez">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
			</head>
<body>
    <div class="fondo"></div>
   <div class="formulario">
        <div id="logo"></div>
        <div class="logos">
          <form action="validar.php" method="POST" > 
			<div class="logo" id="lg2"></div><input type="text" class="user-pass" name="user" required="required" placeHolder="Usuario"><br/>
			<div class="logo" id="lg1"></div><input type="password"  class="user-pass" required="required" name="pass" placeholder="Contraseña"><br/>
		    <input class="boton" type="submit" name="submit" value="Ingresar";>
	      </form>
		</div>
	  <br/>
   </div>
 </body>
</html>
