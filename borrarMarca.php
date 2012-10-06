<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idm = $_POST['Marcaid'];
    $sqlQuery = "delete from marca where id = '$idm'";
    $result = mysql_query( $sqlQuery);
    if($result==1)
    {
        echo "La Marca fue borrada :)";
    }
    else
    {
        echo "La Marca no fue borrada :(";
    }
}
?>
<br />
</body>
</html>
