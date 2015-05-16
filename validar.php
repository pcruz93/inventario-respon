<?php
header('Content-Type: text/html; charset=UTF-8');
$con=mysqli_connect('localhost','root','','inventario')or die ('Ha fallado la conexión: '.mysql_error());
$usuario = $_POST["user"];   
$password = $_POST["pass"];
$result = mysqli_query($con,"SELECT * FROM usuario WHERE aliasusuario = '$usuario'");
if($row = mysqli_fetch_array($result))
{     
 if($row["contrasenausuario"] == $password)
 {
 
  session_start();  
  $_SESSION['usuario'] = $usuario;  
  header("Location: index.php");  
 }
 else
 {
  echo '
   <script languaje="javascript">
    alert("Contraseña Incorrecta");
    location.href = "login.php";
   </script>';           
 }
}
else
{
 echo '
 <script languaje="javascript">
  alert("El nombre de usuario es incorrecto!");
  location.href = "login.php";
 </script>';  
         
}
mysql_free_result($result);
mysql_close();
?>