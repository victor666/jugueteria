<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idt = $_POST['TipoArticuloid'];
    $TipoArticulo = $_POST['TipoArticulo'];
    $TipoArticulo = trim($TipoArticulo);
    if(!empty( $TipoArticulo))
    {
        $sqlQuery = "update tipoarticulo set nombre='$TipoArticulo' where id = '$idt'";
        $result = mysql_query( $sqlQuery);
        if($result==1)
        {
            echo "El Tipo de Articulo fue actualizado :)";
        }
        else
        {
            echo "El Tipo de Articulo no fue actualizado :(";
        }
    }
    else
    {
        echo "El nombre del Tipo de Articulo esta vacio.";
    }
}
?>
<br />
</body>
</html>
