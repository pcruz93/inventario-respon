<?php
 function conectar(){
	$user="root";
	$pass="";
	$server="localhost";
	$db="inventario";
	$con=mysqli_connect($server,$user,$pass,$db) or die ('Ha fallado la conexi�n: '.mysql_error());
	return $con;
}
?>