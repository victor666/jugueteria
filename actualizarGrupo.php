<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idg = $_POST['Grupoid'];
    $Grupo = $_POST['Grupo'];
    $Grupo = trim($Grupo);
    if(!empty( $Grupo))
    {
        $sqlQuery = "update grupo set nombre='$Grupo' where idg = '$idg'";
        $result = mysql_query( $sqlQuery);
        if($result==1)
        {
            echo "El grupo fue actualizado :)";
        }
        else
        {
            echo "El grupo no fue actualizado :(";
        }
    }
    else
    {
        echo "El nombre de grupo esta vacio.";
    }
}
?>
<br />
</body>
</html>