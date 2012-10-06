<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nuevoTipoArticulo = $_POST['NuevoTipoArticulo'];
    $nuevoTipoArticulo = trim($nuevoTipoArticulo);
    if(!empty( $nuevoTipoArticulo))
    {
        $sqlQuery = "insert into tipoarticulo( nombre) values('$nuevoTipoArticulo')";
        $result = mysql_query( $sqlQuery);
        if($result==1)
        {
            echo "El tipo de articulo fue adicionado :)";
        }
        else
        {
            echo "El tipo de articulo no fue adicionado :(";
        }
    }
    else
    {
        echo "El nombre del tipo de articulo esta vacio.";
    }
}
?>
<br />
</body>
</html>
