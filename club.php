<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
td{font-family:arial;font-size:11px;color:0}
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
div {
color:0C;
font-size: 14px; font-family: arial;
}
p {
color:01C;
font-size: 12px; font-family: arial;
}
</style>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
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
</script>
<div><p>Club de Expositores - Forum</p></div><br>
<hr width='500' align='left' />
<table border='0' cellpadding='0' cellspacing='0' width='500'><tbody>
<?php
include("configuracion.php");
  
$sqlQuery = "select * from forum";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen opiniones.";
}
else
{
  $index = 0;
  while( $row = mysql_fetch_array($result))
  {
  	if( $index%2 == 0 )
	{ 
		$colorF = "#FFCC00";
	}
  	else
	{
		$colorF = "#FFFFCC";
	}

	echo "<tr bgcolor=".$colorF."><td>";
	echo "<table border='0' cellpadding='0' cellspacing='3'>";
	echo "<tbody>";
        echo "<tr><td style='color: red'><strong>".($index+1)."</strong><br></td></tr>";
	echo "<tr><td>".$row[2]."<br></td></tr>";
	echo "<tr><td>".$row[4]."</td></tr>";
	echo "</tbody></table></td>";
	echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	echo "<td height='100%' align='top'><p>".$row[1]."</p></td>";
	echo "</tr>";
	echo "<tr><td width='100%' colspan='3'><hr style='border-style:dash;'></td></tr>";
	$index++;
  }
}
?>
</tbody></table>
<br><br>
<table bgcolor="silver"><tbody><tr><td>
<form name="addopinion" action="insertarOpinion.php" method="post">
	<p style="color: red">Escribe tu Mensaje u Opinion:</p>
	<textarea name="opinion" id="opinion" rows="5" cols="70"></textarea>
        <table width="500"><tbody><tr>
	<td><p>Nombre:</p><input type="text" name="usuario" id="usuario"/>
	<p>Correo:</p><input type="text" name="correo" id="correo"/><br/><br/></td>
	<td><p>Introdusca el texto de la imagen:</p><br>
<img src="captcha.php" width="100" height="30" vspace="3" id="cap"><a href="javascript:updateCapcha();">reload</a><br>
<input name="tmptxt" type="text" size="30"><br>
	</td>
	</tr></tbody></table>
	<input type="submit" name="insertar" id="insertar" value="Insertar">
</form></td></tr></tbody></table>

</body>
</html>
