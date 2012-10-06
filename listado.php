<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" bgcolor="#ffffff">
<script type="text/javascript">
function sendvaluesTipoArticulo(obj)
{
    document.getElementById("TipoArticuloId").value = obj.id;
}
</script>
<table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
    <td valign="top">
    <table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
    <td><img src="images/win2_top.jpg" alt="" border="0" height="35" width="224"></td>
    </tr>
    <tr>
        <td style="padding-left: 40px;" background="images/win2_back.jpg">
	<form name="buscar" action="buscarJuguete.php" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                    <td style="color: rgb(50, 103, 156); font-size:0.7em; font-family:verdana,sans-serif;" valign="top">
                        <input name="tipo" id="tipo" value="2" checked="checked" type="radio">Busqueda por Fabricante<br>
                        <input name="tipo" id="tipo" value="1" type="radio">Busqueda por nombre<br>
			<input name="tipo" id="tipo" value="3" type="radio">Busqueda por Año<br>
                    </td>
                    </tr>
                    <tr>
                    <td style="font-size:0.8em; font-family:verdana,sans-serif; color: rgb(101, 101, 101);">Tipo:</td>
                    </tr>
                    <tr>
                    <td >
<?php //TIPOARTICULO insercion
include("configuracion.php");
$sqlQuery = "select * from tipoarticulo";
$result = mysql_query( $sqlQuery);
if( $result == 0)
{
    echo "Hubo un error en la BD o no existen tipo de articulos.";
}
else
{
    $first = true;
    echo "<select name='tipodearticulo' id='tipodearticulo' style='font-size:0.8em; font-family:verdana,sans-serif;' onChange='javascript:sendvaluesTipoArticulo(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
	if($first)
	{
		$defaultTipoArticuloId = $row[0];
		$first = false;
	}
        echo "<option style='font-size:0.8em; font-family:verdana,sans-serif;' id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";
}
?>
	<input type="hidden" name="TipoArticuloId" id="TipoArticuloId" value="<?=$defaultTipoArticuloId ?>"/><br/>
                    </td>
                    </tr>
                    <tr>
                    <td style="color: rgb(101, 101, 101); font-size:0.8em; font-family:verdana,sans-serif;">Articulo a buscar:</td>
                    </tr>
                    <tr>
                    <td><input name="key" id="key" size="15" maxlength="40" style="width: 120px;" type="text"></td>
                    </tr>
                    <tr>
                    <td align="center"><input src="images/search_but.jpg" alt="" border="0" height="35" type="image" width="161"> </td>
                    </tr>
                </tbody>
            </table>
	</form>
        </td>
    </tr>
    <tr>
        <td>
            <img src="images/win2_bottom.jpg" alt="" border="0" height="18" width="224">
        </td>
    </tr>
    </tbody>
    </table>
    </td>
    <td valign="top">
    <table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
    <td valign="top"><img src="images/text1.jpg" alt="" border="0" height="35" width="316"></td>
    </tr>
    <tr>
    <td width="300" style="padding-left: 20px; padding-right: 30px; color: rgb(104, 104, 104);">
    Mediante esta opcion puede listar todos los 
    los articulos relacionados por el decenio de fabricacion
    ademas de otros que son desconocidos. La serie y el
    año de fabricacion puede esta en todos los articulo
    marcado desde fabrica. </td>
    </tr>
    <tr>
    <td style="padding-top: 20px;">
    <ul type="disc">    
    <li><a href="buscarJuguete.php?annio=197%">Setentas</a></li>
    <li><a href="buscarJuguete.php?annio=198%">Ochentas</a></li>
    <li><a href="buscarJuguete.php?annio=199%">Noventas</a></li>
    <li><a href="buscarJuguete.php?annio=200%">2000</a></li>
    <li><a href="buscarJuguete.php?annio=201%">2000 segundo decenio</a></li>
    </ul>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    <tr>
    <td colspan="2"><img src="images/text2.jpg" alt="" border="0" height="42" width="540"></td>
    </tr>
    <tr>
    <td colspan="2" background="images/pics_back.jpg" height="212">
    <table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <?php

    $sqlQuery = "select * from opciones";
    $result = mysql_query( $sqlQuery);

    if( $result == 0)
    {
	echo "</br>Warning 10, por fabor contactese con su administrador web.";
    }
    else
    {
	if( $row = mysql_fetch_array($result) )
	{
		$fecha1 = $row[1];
		$fecha2 = $row[2];
		$columnasVisibles = $row[4];
	}
    }

    $fechaActual = date("Y-m-d"); // Could be useful, let it be.
    $sqlQuery = "select id,nombre,linkfotoPequenia from juguete where fechaInsercion>='".$fecha1."' and fechaInsercion<='".$fecha2."'";
    $result = mysql_query( $sqlQuery);

    if( $result == 0)
    {
	echo "</br>No existen Novedades.";
    }
    else
    {
	$total = mysql_num_rows( $result);
	$index=0;
	if( $total == 0)
	{
		echo "</br>No se tiene Novedades aun, intente en otro momento por fabor.";
	}
	while( $index < $total)
	{
		echo "<tr> <td colspan='2' background='images/pics_back.jpg' height='212'><table border='0' cellpadding='0' cellspacing='0'><tbody><tr>";
		$columna = 1;
		while( $row = mysql_fetch_array($result) )
		{
		     echo "<td><map name='pic".$row[0]."'><area shape='rect' coords='0,0,125,210' href='detallejuguete.php?idj=".$row[0]."'></map><img src='images/".$row[2]."' alt='' usemap='#pic".$row[0]."' border='0' height='210' width='125'><br><strong>".$row[1]."</strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		     $columna++;
		     if( $columna > $columnasVisibles)
		     {
			break;
                     }
		}
		echo "</tr> </tbody> </table> </td></tr>";
		$index+=$columna;
	}
    }
?>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
</table>
</body>
</html>
