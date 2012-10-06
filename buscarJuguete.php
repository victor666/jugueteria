<html>
<head>
<style>
body, td{
font-size:11px;
font-family: Arial, Helvetica, sans-serif;
}
table, a img{
  border-width: 0px;
}
</style>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">

<table border="0" cellpadding="0" cellspacing="0">
<tbody>
  
<?php
include("configuracion.php");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $parametroSQL = false;
    $tipo = $_GET['tipo'];
    $key = $_GET['key'];
    $sqlQuery = "select id,nombre,linkfotoPequenia,annio,descripcion from juguete ";

    if(isset($_GET['annio']))
    {
        $annio = $_GET['annio'];
        $sqlQuery = $sqlQuery."where annio like '".$annio."'";
	$parametroSQL = true;
    }
    else if(!empty($key))
    {
	switch($tipo)
        {
	    case 1: //nombre
		$sqlQuery = $sqlQuery."where nombre='".$key."'";
		break;
	    case 2: //fabricante -> marca
		$idm = 0;
		$sql="select id from marca where nombre='".$key."'";
		$result = mysql_query( $sql);
		if( $row = mysql_fetch_array($result) )
		{
			$idm = $row[0];
		}
		$sqlQuery = $sqlQuery."where marcaid='".$idm."'";
		break;
	    case 3: //año annio exacto
		$sqlQuery = $sqlQuery."where annio='".$key."'";
		break;
	}
 	    
	if(isset($_GET['TipoArticuloId']))
	{
	    $tipoarticulo = $_GET['TipoArticuloId'];
	    $sqlQuery = $sqlQuery." and tipoarticuloId = '".$tipoarticulo."'";
        }
	$parametroSQL = true;
    }

    if($parametroSQL == true)
    {
	    $result = mysql_query( $sqlQuery);
	    
	    if($result == 0)
	    {
		echo "</br>no existen juguetes '".$key."' vuelva a intentar.</br>".$sqlQuery;
	    }
	    else
	    {
		$total = mysql_num_rows( $result);
		$i = 0;
		if( $total == 0)
		{
			echo "</br>no se encontro ningun registro, vuelva a intentar.</br>".$sqlQuery;
		}
		else
		{
			echo "<tr><td><a href='listado.php'>Volver</a></td></tr>";
			echo "<tr><td>&nbsp;<br><br><br></td></tr>";
			echo "<tr><td>Se encontro ".$total." articulos:</td></tr>";
			echo "<tr><td>&nbsp;<br></td></tr>";
			echo "<tr><td colspan='2' height='212'>";//<table border='0' cellpadding='0' cellspacing='0'><tbody><tr>";
			echo "<table cellpadding='5' cellspacing='5' width='643' border='0'><tbody>";
			$i = 0;
			while( $i < $total)
			{
				//while( $row = mysql_fetch_array($result) )
				if( $row = mysql_fetch_array($result) )
				{
	$numero = $i + 1;
	echo "<tr><td valign='top' width='5%'><div align='center'>".$numero.".</div></td><td valign='top' width='10%'><a href='detallejuguete.php?idj=".$row[0]."'><img src='images/".$row[2]."' alt='' height='110' width='75' border='0'></a></td><td valign='top' width='85%'><p><strong><a href='detallejuguete.php?idj=".$row[0]."'>".$row[1]."</a></strong> (".$row[3].")</p><p>".$row[4]."</p></td></tr>";

	//echo "<td style='padding-left: 10px;'><map name='pic".$row[0]."'><area shape='rect' coords='37,180,122,200' href='detallejuguete.php?idj=".$row[0]."'></map><img src='images/".$row[2]."' alt='' usemap='#pic".$row[0]."' border='0' height='212' width='124'></td>";
				     /*$j++;
				     if($j>4)
				     {
					break;
				     }*/
				}
				$i++;
				//$i+=$j;
			}
			echo "</tbody> </table> </td></tr>";
		}
	    }
	}
	else
	{
		echo "</br>El parametro de busqueda esta vacio";
	}
}
else
{
	echo "</br>Hubo un error , no existe parametro GET";
}
?>
    <tr>
        <td><a href="listado.php">Volver</a></td>
    </tr>
    </tbody>
</table>
</body>
</html>
