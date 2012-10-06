<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select j.id,j.nombre,g.nombre,j.annio,m.nombre,ta.nombre,j.cantidad,j.precio,j.descripcion,j.linkfotoPequenia,j.linkfotoGrande from ((juguete as j left join grupo as g on j.grupoid=g.idg) left join marca as m on j.marcaid=m.id) left join tipoarticulo as ta on j.tipoarticuloId=ta.id";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen juguetes.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Nombre</td><td>grupoID</td><td>Año</td><td>marcaID</td><td>tipoID</td><td>Cantidad</td><td>Precio</td><td>Descripcion</td><td>Link de Imagen(-)</td><td>Link de Imagen(+)</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
	$imagen1=$row[9];
	$imagen2=$row[10];
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td><a href='images/".$imagen1."' target='_blank'>".$imagen1."</a></td><td><a href='images/".$imagen2."' target='_blank'>".$imagen2."</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
