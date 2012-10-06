<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select * from evento";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen eventos.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Nombre</td><td>Fecha</td><td>Lugar</td><td>Foto</td><td>Descripcion</td>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td><a  href='images/".$row[4]."' target='_blank'>".$row[4]."</td><td>".$row[5]."</td>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
