<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "inventario";

$nombre = $_POST['nombre'];
$giro = $_POST['giro'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];
$descripcion = $_POST['descripcion'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "UPDATE empresa SET nombreempresa = '$nombre', giroempresa = '$giro',
		direccionempresa = '$direccion', ciudadempresa = '$ciudad',
		estadoprovinciaempresa = '$estado', paisempresa = '$pais',
		comentarioempresa = '$descripcion' WHERE idempresa = 1";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='empresa.php';
			alert('Información actualizada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='empresa.php';
			alert('Error al actualizar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>