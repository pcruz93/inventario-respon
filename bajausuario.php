<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

$alias = $_POST['alias'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "UPDATE usuario SET estatususuario='B' WHERE aliasusuario='$alias' and empresa_idempresa=1";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='usuario.php';
			alert('Información eliminada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='usuario.php';
			alert('Error al eliminar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>