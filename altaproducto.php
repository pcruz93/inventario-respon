<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$talla = $_POST['talla'];
$categoria = $_POST['categoria'];
$id="";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "INSERT INTO producto (empresaidempresa, estadoproducto, codigoproducto,
		nombreproducto, tipoproducto, cantidadproducto, precioproducto)
		VALUES(1,'A','$codigo','$nombre','$tipo',$cantidad,$precio)";
		
$conn->query($sql);
		
$sql2 = "SELECT idproducto FROM producto where codigoproducto = '$codigo'";

$result = $conn->query($sql2); 
			while($row = mysqli_fetch_array($result)) { 
			  $id = $row[0];

			} 
			
$sql3 = "INSERT INTO detalleproducto (productoidproducto,productoempresaidempresa,
		caracunoproducto,caracdosproducto,caractresproducto,caraccuatroproducto)
		VALUES($id,1,'$modelo','$color','$talla','$categoria')";

if ($conn->query($sql3) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='producto.php#Altas';
			alert('Información agregada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='producto.php#Altas';
			alert('Error al actualizar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>