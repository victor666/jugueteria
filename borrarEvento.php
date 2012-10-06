<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ide = $_POST['eventoId'];

	$sqlQuery = "select * from evento where id='".$ide."'";
	$result = mysql_query( $sqlQuery);
	if( $row = mysql_fetch_array($result))
	{
		$archivo = $row[4];
		$res = unlink(getcwd()."/images/".$archivo);
		if($res==false)
		{
			echo "La imagen no pudo ser borrada :(</br>";
		}
	}

    $sqlQuery = "delete from evento where id = '$ide'";
    $result = mysql_query( $sqlQuery);
    if( $result == 1)
    {
        echo "El evento fue borrado :)";
    }
    else
    {
        echo "El evento no fue borrado :(";
    }
}
else
{
	echo "no se tiene un formulario POST :(";
}
?>
<br />
</body>
</html>
