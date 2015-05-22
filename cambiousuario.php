<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$alias = $_POST['alias'];
$contrasena = $_POST['contrasena'];
$tipo = $_POST['tipo'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "UPDATE usuario SET nombreusuario = '$nombre', apellidousuario = '$apellido',
		aliasusuario = '$alias', contrasenausuario = '$contrasena',
		tipousuario = '$tipo' WHERE idusuario = $id and empresa_idempresa=1";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='usuario.php#Cambios';
			alert('Información actualizada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='usuario.php#Cambios';
			alert('Error al actualizar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>