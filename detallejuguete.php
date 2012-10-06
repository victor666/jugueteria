<html>
<head>
<style>
body, td{
font-size:12px;
font-family: Arial, Helvetica, sans-serif;
}
table, a img{
  border-width: 0px;
}
</style>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">

<?php
include("configuracion.php");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $idj = $_GET['idj'];
    $sqlQuery = "select j.id,j.nombre,g.nombre,j.annio,m.nombre,j.cantidad,j.precio,j.descripcion,j.linkfotoGrande from (juguete as j left join grupo as g on j.grupoid=g.idg) left join marca as m on j.marcaid=m.id  where j.id=".$idj;
    $result = mysql_query( $sqlQuery);

    if( $result == 0)
    {
	echo "</br>Hubo un error en la BD o no existe el juguete indexado por ".$idj;
    }
    else
    {
	if($row = mysql_fetch_array($result))
	{
		$nombre = $row[1];
		$grupo = $row[2];
		$annio = $row[3];
		$marca = $row[4];
		$cantidad = $row[5];
		$descripcion = $row[7];
		$precio = $row[6];
		$imagen = $row[8];
		$caja = "no";
	}
    }
?>

<table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
    <td valign="top">
    <table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr><td colspan="2"><br><a href="listado.php">Volver</a><br><br><br></td></tr>
    <tr><td style='padding-left:10px;' colspan="2"><strong><?=$nombre ?></strong><br></td></tr>
    <tr>
        <td style='border-width:1px;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;'>
            <img src="images/<?=$imagen ?>" alt="" border="1" height="540" width="450">
        </td>
        <td align="top" height="100%"><table border="0" height="100%"><tbody>
            <tr><td>Grupo:     </td> <td align="top"><?=$grupo ?></td></tr>
	    <tr><td>Año:     </td> <td align="top"><?=$annio ?></td></tr>
	    <tr><td>Marca:     </td> <td align="top"><?=$marca ?></td></tr>
<?php
if( $cantidad == 0)
{
	echo "<tr><td color='red'>AGOTADO</td> <td align='top'>&nbsp;</td></tr>";
}
else
{
	echo "<tr><td>Cantidad:     </td><td align='top'>".$cantidad."</td></tr>";
}
?>
	    <tr><td>Precio:     </td> <td align="top"><?=$precio ?></td></tr>
            <tr><td>Caja:       </td> <td align="top"><?=$caja ?></td></tr>
	    <tr><td>Descripcion:  </td> <td align="top"><?=$descripcion ?></td></tr>
	    <tr><td align="bottom" height="100%" colspan="2">&nbsp;</td></tr>
        </tbody></table></td>
    </tr>
     <tr><td colspan="2"><br><a href="listado.php">Volver</a><br></td></tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
</table>
<?php
}
else
{
	echo "</br> Error, no existen parametros GET";
}
?>
