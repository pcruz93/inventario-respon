<?php 
	require_once("dompdf/dompdf_config.inc.php");
	date_default_timezone_set("America/Mexico_City");
    $bd_host = "localhost"; 
    $bd_usuario = "root"; 
    $bd_password = ""; 
    $bd_base = "inventario"; 
    $con = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base); 
    $titulo='<h4>Reporte realziado</h4>';
    $time = time();
    $codigoHTML=$titulo.date("d-m-Y (H:i:s)", $time);
    $codigoHTML.='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GeneraReporte</title>
</head>
<body>
<div align="center">
    <h1 style="color:green">Soccer Zone</h1>
    <h2>Informe de productos</h2>
    <img src="C:\wamp\www\inv2\inventario-respon\img\logo.png"></img>
    
    <table width="100%" border="2">
      <tr>
        <td bgcolor="#1D9D59"><strong>Id registro</strong></td>
        <td bgcolor="#1D9D59"><strong>Id producto</strong></td>
        <td bgcolor="#1D9D59"><strong>Nombre del producto</strong></td>
        <td bgcolor="#1D9D59"><strong>Cantidad</strong></td>
        <td bgcolor="#1D9D59"><strong>Codigo del producto</strong></td>
        <td bgcolor="#1D9D59"><strong>Fecha</strong></td>
      </tr>';
        
        $sql="select r.idregistro,p.idproducto,p.nombreproducto,p.cantidadproducto,p.codigoproducto,r.fecha from registro r, producto p, registroproducto rp where r.idregistro=rp.registro_idregistro and p.idproducto=rp.producto_idproducto and p.codigoproducto";
        $res=mysqli_query($con,$sql);
        while($fila=mysqli_fetch_array($res)){
$codigoHTML.='
      <tr>
        <td> '.$fila["idregistro"].'</td>
        <td> '.$fila["idproducto"].'</td>
        <td> '.$fila["nombreproducto"].'</td>
        <td> '.$fila["cantidadproducto"].'</td>
        <td> '.$fila["codigoproducto"].'</td>
        <td> '.$fila["fecha"].'</td>
      </tr>';
      } 
$codigoHTML.='
    </table>
</div>
</body>
</html>';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("registros_de_productos.pdf");
?>