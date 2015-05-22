<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$talla = $_POST['talla'];
$categoria = $_POST['categoria'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "UPDATE producto SET codigoproducto = '$codigo', nombreproducto = '$nombre',
		tipoproducto = '$tipo', cantidadproducto = '$cantidad',
		precioproducto = '$precio' WHERE idproducto = $id and empresaidempresa=1";
		
$sql2 = "UPDATE detalleproducto SET caracunoproducto = '$modelo', caracdosproducto = '$color',
		caractresproducto  = '$talla', caraccuatroproducto = '$categoria'
		WHERE productoidproducto = $id and productoempresaidempresa=1";

if ($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='producto.php#Cambios';
			alert('Información actualizada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='producto.php#Cambios';
			alert('Error al actualizar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>