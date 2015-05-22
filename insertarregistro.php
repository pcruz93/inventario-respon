<?php
include("conexion.php");
$con=conectar();						
$raz=$_POST['razon'];
$can=$_POST['cantidad'];
$codprod=$_POST['codigoproducto'];
$fech=$_POST['fecha'];

$query2="select p.codigoproducto from producto p, registro r
where p.codigoproducto=".$codprod." group by p.codigoproducto";
$paso1=mysqli_query($con,$query2);
$i=0;
while(($row=mysqli_fetch_array($paso1))!=NULL){
    $aux=$row[$i];
    $query="insert into registro (razonregistro,cantidad,codigo,fecha) values($raz,$can,$codprod,'$fech')";
    mysqli_query($con,$query);	
    $query3="SELECT max(idregistro) FROM registro";
    $idr= mysqli_query($con,$query3);
    $j=0;
    while(($row1=mysqli_fetch_array($idr))!=NULL){
        $aux2=$row1[$j];
    $query4="select p.idproducto from producto p, registro r where p.codigoproducto=r.codigo and  p.codigoproducto=$codprod group by idproducto";
    $idp= mysqli_query($con,$query4);
        $k=0;
    while(($row2=mysqli_fetch_array($idp))!=NULL){
        $aux3=$row2[$k];
    $final="insert into registroproducto (producto_idproducto,producto_empresaidempresa,registro_idregistro) 
    values($aux3,1,$aux2)";
        mysqli_query($con,$final);	
        $k++;
    }
        $j++;
    }
$i++;
    echo $aux;
    echo $aux2;
    echo $aux3;
}

echo '<script>alert("Insertado")</script>';
	
?>      