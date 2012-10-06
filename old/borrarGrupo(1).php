<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idg = $_POST['Grupoid'];
    $sqlQuery = "delete from grupo where idg = '$idg'";
    $result = mysql_query( $sqlQuery);
    if($result==1)
    {
        echo "El grupo fue borrado :)";
    }
    else
    {
        echo "El grupo no fue borrado :(";
    }
}
?>
<br />
</body>
</html>