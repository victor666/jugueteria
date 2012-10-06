<!DOCTYPE html>
<html>
<head>

<style>
td{font-family:arial;font-size:12px;color:0}
A {
text-decoration: underline;
color:0C;
font-size: 11px; font-family: arial;
}
a:visited{color:32679C}
a:hover{color:red}
a.white{color:ffffff}
a.white:visited{color:ffffff}
a.footer{color:000000;font-size:11px}
a.footer:visited{color:000000}
.bold{font:900}
div{font-family:arial;font-size:12px;color:0}
</style>

</head>
<body>
<script type="text/javascript">
function updateCapcha()
{
	var obj = document.getElementById("cap");
	if (!obj)
	{ 
		obj = window.document.all.cap;
	}
	if (obj)
	{
		obj.src = "captcha.php?" + Math.random();
	}
}
function ActualizarChecks()
{
    var tam = document.getElementById("tablaJuguetes").rows.length;
    for( j = 1; j < tam; j++)
    { 
	id = document.getElementById("tablaJuguetes").rows[j].cells[1].innerHTML;
	index = "articulo" + id;
	if( document.getElementById(index).checked==true)
	{
		document.getElementById(index).value = "1";
	}
	else
	{
		document.getElementById(index).value = "0";
	}
    }
}
</script>

<div><strong>Pedidos</strong></div><br/>
<form name="hacerpedido" action="enviarPedido.php" method="post">
<?php

include("configuracion.php");
  
$sqlQuery = "select j.id,j.nombre,g.nombre,j.annio,m.nombre,j.cantidad,j.precio,j.linkfotoPequenia from (juguete as j left join grupo as g on j.grupoid=g.idg) left join marca as m on j.marcaid=m.id";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen juguetes.";
}
else
{
    echo "<table id='tablaJuguetes' name='tablaJuguetes' border='0' cellspacing='2'><tbody>";
    echo "<tr bgcolor='silver'><td>Elegir</td><td>ID</td><td>Nombre</td><td>grupoID</td><td>Año</td><td>marcaID</td><td>Cantidad</td><td>Precio</td><td>Imagen</td></tr>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<tr bgcolor='#FFFFCC'><td><input type='checkbox' name='articulo".$row[0]."' id='articulo".$row[0]."'/></td><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".(($row[5]==0)?"AGOTADO":$row[5])."</td><td>".$row[6]." Bs</td><td><img width='50' height='60'src='/images/".$row[7]."'/></td></tr>";
    }
    echo "</tbody></table>";
}
?>
<br/>
<div></div><br/>
<div>Nombre:<input type="text" name="nombre" id="nombre" size="30"/></div><br/>
<div>Correo:<input type="text" name="correo" id="correo" size="30"/></div><br/>
<div>Introdusca el texto que sale en la imagen de abajo:</div><br/>
<a href="javascript:updateCapcha();">reload</a><img src="captcha.php" width="100" height="30" vspace="3" id="cap"><input name="tmptxt" type="text" size="30"><br><br/>
<input type="submit" name="pedido" id="pedido" value="HacerPedido" onClick="ActualizarChecks();">
</form>
</body>
</html>
