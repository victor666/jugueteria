<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nuevoGrupo = $_POST['NuevoGrupo'];
    $nuevoGrupo = trim($nuevoGrupo);
    if(!empty( $nuevoGrupo))
    {
        $sqlQuery = "insert into grupo ( nombre) values('$nuevoGrupo')";
        $result = mysql_query( $sqlQuery);
        if($result==1)
        {
            echo "El grupo fue adicionado :)";
        }
        else
        {
            echo "El grupo no fue adicionado :(";
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