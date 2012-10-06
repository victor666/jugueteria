<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select j.id,j.fechaInsercion,j.nombre,g.nombre,j.annio,m.nombre,ta.nombre,j.cantidad,j.precio,j.descripcion,j.linkfotoPequenia,j.linkfotoGrande from ((juguete as j left join grupo as g on j.grupoid=g.idg) left join marca as m on j.marcaid=m.id) left join tipoarticulo as ta on j.tipoarticuloId=ta.id order by j.fechaInsercion desc";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen juguetes.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Fecha</td><td>Nombre</td><td>grupoID</td><td>Año</td><td>marcaID</td><td>tipoarticuloID</td><td>Cantidad</td><td>Precio</td><td>Descripcion</td><td>Link de Imagen(-)</td><td>Link de Imagen(+)</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td><a href='images/".$row[10]."' target='_blank'>".$row[10]."</a></td><td><a href='images/".$row[11]."' target='_blank'>".$row[11]."</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
