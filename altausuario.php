<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$alias = $_POST['alias'];
$contrasena = $_POST['contrasena'];
$tipo = $_POST['tipo'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo conexión: " . $conn->connect_error);
} 

$sql = "INSERT INTO usuario (empresa_idempresa, nombreusuario, apellidousuario, 
		aliasusuario, contrasenausuario, estatususuario, tipousuario)
		VALUES(1,'$nombre','$apellido','$alias','$contrasena','A','$tipo')";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>
			window.location='usuario.php';
			alert('Información agregada correctamente.');
		</script>";
    //echo "Información actualizada correctamente.";
} else {
	echo "<script type='text/javascript'>
			window.location='usuario.php';
			alert('Error al actualizar la información.');
		</script>";
    //echo "Error al actualizar la información: " . $conn->error;
}

$conn->close();
?>