<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select p.id,p.fecha,p.correo,j.nombre,j.precio,j.descripcion,j.linkfotoPequenia from pedido as p left join juguete as j on p.idjuguete=j.id";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen juguetes.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Fecha del Pedido</td><td>Su correo</td><td>Nombre del Juquete</td><td>Precio</td><td>Descripcion</td><td>Foto</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><a href='images/".$row[6]."' target='_blank'>".$row[6]."</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
