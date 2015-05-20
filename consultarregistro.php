<?php
  $bd_host = "localhost"; 
  $bd_usuario = "root"; 
  $bd_password = ""; 
  $bd_base = "inventario"; 
 
$con = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base); 

        $var="";
		$var1="";
		$var2="";
		$var3="";
		$var4="";
        $num=$_POST["numero"];
			try{
			$query="select * from registro where idregistro=$num";
			$dato=mysqli_query($con,$query); 
				while($resul=mysqli_fetch_array($dato)){
						$var=$resul[0];
						$var1=$resul[1];
						$var2=$resul[2];
						$var3=$resul[3];
						$var4=$resul[4];
				}
			}catch(Exception $e){
				echo '<script>alert("Error: "$e)</script>';
		}
?>

    