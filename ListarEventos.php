<html>
<head>

<style>
td{font-family:arial;font-size:14px;color:0}
A {
text-decoration: underline;
color:0C;
font-size: 13px; font-family: arial;
}
a:visited{color:32679C}
a:hover{color:red}
a.white{color:ffffff}
a.white:visited{color:ffffff}
a.footer{color:000000;font-size:11px}
a.footer:visited{color:000000}
.bold{font:900}
div {
color:0C;
font-size: 12px; font-family: arial;
}
</style>

</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<div>Eventos</div><br/>
<?php
include("configuracion.php");
  
$sqlQuery = "select * from evento";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen eventos.";
}
else
{
?>

<table border="1" cellpadding="0" cellspacing="0">
    <tbody>
<?php
    while( $row = mysql_fetch_array($result))
    {
	echo "<tr><td colspan='2'height='312'>";
	echo "<table border='0' cellpadding='0' cellspacing='0' ><tbody>";
        echo "<tr><td><h2><b>".$row[1]."</b></h2></td></tr>";
	echo "<tr><td><map name='pic".$row[0]."'><area shape='rect' coords='41,179,321,351'></map><img src='images/".$row[4]."' usemap='#pic".$row[0]."' border='0' height='210' width='230'></td></tr>";
	echo "<tr><td>Fecha:".$row[2]."</td><td>Lugar:".$row[3]."</td></tr>";
	echo "<tr><td colspan='2'><textarea cols='70' rows='4'>".$row[5]."</textarea></td><tr>";
	echo "</tbody></table>";
	echo "</td></tr>";
	echo "<tr><td></td></tr>";
    }
?>
   </tbody>
</table>
<?php
}
?>
</body>
</html>
