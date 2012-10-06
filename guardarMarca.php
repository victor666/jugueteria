<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nuevaMarca = $_POST['NuevaMarca'];
    $nuevaMarca = trim($nuevaMarca);
    if(!empty( $nuevaMarca))
    {
        $sqlQuery = "insert into marca( nombre) values('$nuevaMarca')";
        $result = mysql_query( $sqlQuery);
        if($result==1)
        {
            echo "La marca fue adicionado :)";
        }
        else
        {
            echo "La marca no fue adicionado :(";
        }
    }
    else
    {
        echo "El nombre de Marca esta vacio.";
    }
}
?>
<br />
</body>
</html>
