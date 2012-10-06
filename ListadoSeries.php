<html>
<head>
<style>

body, td{
font-size:13px;
font-family: Arial, Helvetica, sans-serif;
}
table, a img{
  border-width: 0px;
}
</style>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">

<table border="0" cellpadding="0" cellspacing="0"><tbody>
<tr><td colspan="4"><a href="listado.php">Volver</a><br><br></td></tr>  
<?php
include("configuracion.php");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $idg = $_GET['grupoid'];
    $sqlQuery = "select id,nombre,linkfotoPequenia from juguete where grupoid=".$idg;
    $result = mysql_query( $sqlQuery);
    
    if($result==0)
    {
	echo "</br>Hubo un error en la BD o no existen juguetes.";
    }
    else
    {
	$total = mysql_num_rows( $result);
	$fila=0;
	while( $fila < $total)
	{
		echo "<tr><td height='210'><table border='0' cellpadding='0' cellspacing='0'><tbody><tr>";
		$columna = 1;
		while( $row = mysql_fetch_array($result) )
		{
		     echo "<td style='border-color:#000; border-style:solid; border-radius:10px; border-width:1px;padding-left:5px;padding-right:5px;padding-top:5px;'><map name='pic".$row[0]."'><area shape='rect' coords='0,0,125,210' href='detallejuguete.php?idj=".$row[0]."'></map><img src='images/".$row[2]."' alt='' usemap='#pic".$row[0]."' border='0' height='210' width='125'><br><strong>".$row[1]."</strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		     $columna++;
		     if($columna>4)
		     {
			break;
                     }
		}
		echo "</tr></tbody></table> </td></tr>";
		$fila+=$columna;
	}
    }
}
else
{
	echo "</br>Hubo un error, no existe parametro GET";
}
?>
    <tr>
        <td><br><br><a href="listado.php">Volver</a></td>
    </tr>
    </tbody>
</table>
</body>
</html>
