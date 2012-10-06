<!DOCTYPE html>
<html>
<body>

<?php

include("configuracion.php");
  
$sqlQuery = "select m.idMenu, m.title, g.nombre from menu as m left join grupo as g on m.idGrupo=g.idg";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "Hubo un error en la BD o no existen menus.";
}
else
{
    echo "<table border='1'><tbody>";
    echo "<tr><td>ID</td><td>Nombre Menu</td><td>Grupo</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
