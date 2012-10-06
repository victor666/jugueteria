<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select * from marca";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen marcas.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Marca</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
