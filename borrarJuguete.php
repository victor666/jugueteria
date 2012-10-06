<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $idj = $_POST['jugueteId'];

	$sqlQuery = "select * from juguete where id='".$idj."'";
	$result = mysql_query( $sqlQuery);
	if( $row = mysql_fetch_array($result))
	{
		$archivo1 = $row[7];
		$archivo2 = $row[8];
		$res1 = unlink(getcwd()."/images/".$archivo1);
		$res2 = unlink(getcwd()."/images/".$archivo2);
		if($res1==false)
		{
			echo "La imagen pequeña no pudo ser borrada :(</br>";
		}
		if($res2==false)
		{
			echo "La imagen Grande no pudo ser borrada :(</br>";
		}
	}

    $sqlQuery = "delete from juguete where id='$idj'";
    $result = mysql_query( $sqlQuery);
    if( $result == 1)
    {
        echo "El juguete fue borrado :)";
    }
    else
    {
        echo "El juguete no fue borrado :(";
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
