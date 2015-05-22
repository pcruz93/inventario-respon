<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

$codigo = $_POST['codigo'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "UPDATE producto SET estadoproducto='B' WHERE codigoproducto='$codigo' and empresaidempresa=1";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='producto.php#Bajas';
			alert('Información eliminada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='producto.php#Bajas';
			alert('Error al eliminar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>