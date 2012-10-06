<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idm = $_POST['Marcaid'];
    $Marca = $_POST['Marca'];
    $Marca = trim($Marca);
    if(!empty( $Marca))
    {
        $sqlQuery = "update marca set nombre='$Marca' where id='$idm'";
        $result = mysql_query( $sqlQuery);
        if($result==1)
        {
            echo "La Marca fue actualizada :)";
        }
        else
        {
            echo "La Marca no fue actualizada :(";
        }
    }
    else
    {
        echo "El nombre de la Marca esta vacio.";
    }
}
?>
<br />
</body>
</html>
