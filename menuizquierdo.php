<html>
<head>
</head>
<style>
td{font-family:arial;font-size:10px;color:99A7BB}
A {
text-decoration: underline;
color:32679C;
font-size: 10px; font-family: arial;
}
a:visited{color:32679C}
a:hover{color:red}
a.white{color:ffffff}
a.white:visited{color:ffffff}
a.footer{color:000000;font-size:11px}
a.footer:visited{color:000000}
.bold{font:900}
</style>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr>
<td><img src="images/win1_top.jpg" alt="" height="35" width="230" border="0"></td>
</tr>
<tr><td style="padding-left: 50px;" background="images/win1_back.jpg">
<?php

include("configuracion.php");
$sqlQuery = "select idMenu, title,idGrupo from menu";
$result = mysql_query( $sqlQuery);
if( $result == 0)
{
    echo "Hubo un error en la BD o no existen menus.";
    exit;
}
else
{
    while( $row = mysql_fetch_array($result))
    {
	echo "<img src='images/small.gif' alt='' border='0' height='12' width='14'>&nbsp;&nbsp;<a target='main' href='ListadoSeries.php?grupoid=".$row[2]."'>".$row[1]."</a><br>";
    }
}
?>
</td></tr>
<tr>
<td valign="top"><img src="images/win1_bottom.jpg" alt="" height="19" width="230" border="0"></td>
</tr>
</tbody>
</table>
</body>
</html>
