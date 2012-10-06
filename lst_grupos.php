<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select * from grupo";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen grupos.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Grupo</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
