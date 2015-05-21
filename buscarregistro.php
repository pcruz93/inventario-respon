<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "inventario"; 
$con = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base); 
$q=$_POST['q'];
//$sql="select * from registro where idregistro LIKE '".$q."%'";
$sql="select r.idregistro,p.idproducto,p.nombreproducto,p.cantidadproducto,p.codigoproducto from registro r, producto p, registroproducto rp where r.idregistro=rp.registro_idregistro and p.idproducto=rp.producto_idproducto and p.codigoproducto LIKE '".$q."%'";

$res=mysqli_query($con,$sql);

if(mysqli_num_rows($res)==0){

echo '<b>No hay sugerencias</b>';

}else{

echo '<b>Sugerencias:</b><br />
<table class="width200">
			<tr>
				<th>Id registro</th>
				<th>Id producto</th>
				<th>Nombre</th>
				<th>Cantidad</th>
                <th>Codigo</th>
            </tr>';

while($fila=mysqli_fetch_array($res)){
echo'
 <tr>
<td> '.$fila["idregistro"].'</td>
<td> '.$fila["idproducto"].'</td>
<td> '.$fila["nombreproducto"].'</td>
<td> '.$fila["cantidadproducto"].'</td>
<td> '.$fila["codigoproducto"].'</td>
</tr>
';
}
echo'</table>';
    echo'<script>$(document).ready(function (){
                $("#bus").click(function() {
                    $(\'html, body\').animate({scrollTop: $("#resultado-busqueda").offset().top}, 1000);
                });    
            });
    </script>';
}
?>
