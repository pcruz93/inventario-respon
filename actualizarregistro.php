<?php
include("conexion.php");
$con=conectar();
			$id=$_POST["id"];
			$razonbusqueda=$_POST["razonbusqueda"];
			$cantidadbusqueda=$_POST["cantidadbusqueda"];
			$codigoproductobusqueda=$_POST["codigoproductobusqueda"];
			$fechabusqueda=$_POST["fechabusqueda"];
				try{
				 $sql="update registro set      razonregistro='$razonbusqueda',cantidad='$cantidadbusqueda',codigo='$codigoproductobusqueda',fecha='$fechabusqueda' where idregistro='$id'";
                    $dato=mysqli_query($con,$sql); 
	
				 }catch(Exception $e){
						 echo '<script>alert("Error: "$e)</script>';
				 }
?>