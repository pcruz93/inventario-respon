    <!DOCTYPE html>
<html lang="es">
	<head>
     	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <script language="JavaScript" type="text/javascript" src="js/ancla.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <title>Inventario | Inicio</title>
        <script>
            function tipouser(ele){
            switch (ele){
                case 'A': 
                    $('#usuario').css('display','inline-block');
                    $('#empresa').css('display','inline-block');
                break;
                case 'U':
                $('#usuario').css('display','none');
                $('#empresa').css('display','none');
                break;
                }
            }
    </script>
	</head>
    <?php
    include("conexion.php");
    $con=conectar();		
	session_start();
	if(!isset($_SESSION['usuario'])){ 
	  header('Location: login.php'); 
	  exit();
	}else{
    $user=$_SESSION['usuario'];
    $tipouser="select tipousuario from usuario where aliasusuario = '$user'";       
    $result = $con->query($tipouser); 
     while($row = mysqli_fetch_array($result)) { 
         $tipo = $row[0];
     }
    }
    ?>
<body onload="tipouser('<?php echo $tipo;?>');";>
	<div class="header">
		<ul id="menu">
			<li><a href="logout.php">Cerrar sesión</a></li>
            <li><a id="Generar reporte" href="reportes.php">Generar reporte</a></li>
			<li><a id="empresa" href="empresa.php">Empresa</a></li>
			<li><a id="usuario" href="usuario.php">Usuarios</a></li>
			<li><a id="registro" href="registro.php">Registros</a></li>
			<li><a id="producto" href="producto.php">Productos</a></li>
		</ul>
        <div id="logo"></div>
	</div>
    <div id="fondo">
        <div>
            <h1 class="mensajeusuario"><?php echo 'Bienvenido '.$_SESSION['usuario'];?> </h1> 
            <div  id="img-index">
                <div id="noticias">
                     <h4>Ultimo producto agregado</h4>
                         <?php 
                         $sql="SELECT  nombreproducto, cantidadproducto FROM producto where idproducto=(select max(idproducto) from producto)";
                        $res=mysqli_query($con,$sql);
                        if(mysqli_num_rows($res)==0){
                            echo '<b>No hay sugerencias</b>';
                        }else{

                        echo '  
                        <table class="width200">
                                    <tr>
                                        <th>Nombre del producto</th>
                                        <th>Cantidad agregada</th>
                                    </tr>';

                        while($fila=mysqli_fetch_array($res)){
                        echo'
                         <tr>
                        <td> '.$fila["nombreproducto"].'</td>
                        <td> '.$fila["cantidadproducto"].'</td>
                        </tr>
                        ';
                        }
        echo'</table>';
        }

                    ?>

                            <h4>Pocas existencias</h4>
                <?php 
                $sql="SELECT nombreproducto, cantidadproducto FROM producto ORDER BY cantidadproducto ASC limit 3";
                $res1=mysqli_query($con,$sql);

                if(mysqli_num_rows($res1)==0){

                echo '<b>No hay sugerencias</b>';

                }else{

                echo '
                <table class="width200">
                            <tr>
                                <th>Producto</th>
                                <th>Existencias restantes</th>
                            </tr>';

                while($fila=mysqli_fetch_array($res1)){
                echo'
                 <tr>
                <td> '.$fila["nombreproducto"].'</td>
                <td> '.$fila["cantidadproducto"].'</td>
                </tr>
                ';
                }
                echo'</table>';
                }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
