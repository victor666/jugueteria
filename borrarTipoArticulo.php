<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idt = $_POST['TipoArticuloid'];
    $sqlQuery = "delete from tipoarticulo where id = '$idt'";
    $result = mysql_query( $sqlQuery);
    if($result==1)
    {
        echo "El Tipo de Articulo fue borrado :)";
    }
    else
    {
        echo "El Tipo de Articulo no fue borrado :(";
    }
}
?>
<br />
</body>
</html>
