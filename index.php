<!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <title>Inventario | Inicio</title>
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
                    scrollTop: $("#bus").offset().top
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
<li><a id="busqueda" href="#Busqueda">Busqueda</a></li>
<li><a id="bajas" href="#Bajas">Bajas</a></li>
<li><a id="cambios" href="#Cambios">Cambios</a></li>
<li><a id="altas" href="#Altas">Altas</a></li>
</ul>
</div>
<div>
<h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1> 
<div  style="background-image: url('img/Pagina_en_mantenimiento.jpg'); width:460px; height:465px; repeat:fixed; position:absolute; top:20%;left: 50%;  margin-left: -200px; margin-top: 10px; position:absolute;">
</div>

<!--Imagenes temporales-->
 <div style="background-image: url('img/Pagina_en_mantenimiento.jpg'); width:460px; height:465px; repeat:fixed; position:absolute; top:100%;left: 50%;  margin-left: -200px; margin-top: 10px;"><h1></h1><a name="Altas" id="a"></div></a>
    
<div style="background-image: url('img/Pagina_en_mantenimiento.jpg'); width:460px; height:465px; repeat:fixed; position:absolute; top:100%;left: 50%;  margin-left: -200px; margin-top:800px;"><h1></h1><a name="Bajas" id="b"></div></a>
    
<div style="background-image: url('img/Pagina_en_mantenimiento.jpg'); width:460px; height:465px; repeat:fixed; position:absolute; top:100%;left: 50%;  margin-left: -200px; margin-top:1600px;"><h1></h1><a name="Cambios" id="c"></div></a>

    <div style="background-image: url('img/Pagina_en_mantenimiento.jpg'); width:460px; height:465px; repeat:fixed; position:absolute; top:100%;left: 50%;  margin-left: -200px; margin-top: 2500px;"><h1></h1><a name="Busqueda" id="bus"></div></a>
</div>
</body>
</html>
