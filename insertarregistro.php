<?php
include("conexion.php");
$con=conectar();						
$raz=$_POST['razon'];
$can=$_POST['cantidad'];
$codprod=$_POST['codigoproducto'];
$fech=$_POST['fecha'];
					 
$query="insert into registro (razonregistro,cantidad,codigo,fecha) values($raz,$can,$codprod,'$fech')";
mysqli_query($con,$query)or die('Error. '.mysqli_error());		
?>