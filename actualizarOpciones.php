<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
    $insercion = (int)$_POST['insercionRapida'];
    $numCol = $_POST['numcolumnas'];

    if( ($numCol > 8) || ($numCol < 1) )
    {
	echo "El valor del numero de Columnas esta fuera de rango, solo se permite valores de 1 a 8.<br>";
    }
    else
    {
	$sqlQuery = "update opciones set numerocolumnas='$numCol' where id=1";
	$result = mysql_query( $sqlQuery);
	if($result==1)
	{
	    echo "El numero de columnas fue cambiado :)<br>";
	}
	else
	{
	    echo "No se pudo cambiar el numero de columnas :(<br>";
	}
    }

    if( ($insercion == 0) || ($insercion == 1) )
    {
	    $sqlQuery = "update opciones set addicionrapida=$insercion where id=1";
	    $result = mysql_query( $sqlQuery);
	    if($result==1)
	    {
		    echo "Adicion rapida fue cambiada :)<br>";
	    }
	    else
	    {
		    echo "No se pudo cambiar la adicion rapida fue cambiada :(<br>";
	    }
    }
    else
    {
	echo "El valor de la addción rapida tiene un valor no permitido ".$insercion.".<br>";
    }

    if( empty($fecha1) || empty($fecha2))
    {
	echo "Una o ambas fechas estan vacias<br>";
    }
    elseif( $fecha1 > $fecha2)
    {
	echo "La fecha final esta en un rango menor a la fecha inicial<br>";
    }
    else
    {
	$sqlQuery = "update opciones set fechainicial='$fecha1', fechafinal='$fecha2' where id=1";
	$result = mysql_query( $sqlQuery);
	if($result==1)
	{
	    echo "Las fechas fueron actualizadas :)";
		//header("location: welcome.php");
	}
	else
	{
	    echo "Las fechas no fueron actualizadas :(";
	//header("location: welcome.php");
	}
    }
}
?>
<br />
</body>
</html>
