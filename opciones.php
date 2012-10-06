<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="PopupWindow.js"></script>
	<script type="text/javascript" src="AnchorPosition.js"></script>
	<script type="text/javascript" src="date.js"></script>
	<script type="text/javascript" src="CalendarPopup.js"></script>
	<script language="JavaScript">document.write(getCalendarStyles());</script>
	<script language="JavaScript">
		var cal1 = new CalendarPopup("testdiv1");
		var cal2 = new CalendarPopup("testdiv2");
	</script>
	<style>
		input[readonly]{
				color:black;
				background-color: #D4D0C8;
				}
	</style>
    </head>
<body>
<script type="text/javascript">
function ActualizarCheck()
{
	var index = "insercionRapida";
	if( document.getElementById(index).checked == true )
	{
		document.getElementById(index).value = "1";
	}
	else
	{
		document.getElementById(index).value = "0";
	}
}
</script>

<form name="editaropciones" action="actualizarOpciones.php" method="post">  
<?php

include("configuracion.php");

$sqlQuery = "select * from opciones";
$result = mysql_query( $sqlQuery);

if( $result == 0)
{
    echo "Hubo un error en la BD o no existen opciones para editar";
}
else
{
    while( $row = mysql_fetch_array($result))
    {
	$fechainicial = $row[1];
	$fechafinal = $row[2];
	$insercionrapida = (boolean)$row[3];
	$numColumnas = $row[4];
    }
}
?>
Ultimos juguetes, limites de visualizacion:<br/>
Fecha inicial:<input name="fecha1" id="fecha1" size="12" maxlength="12" type="text" value="<?=$fechainicial?>" readonly="readonly"><a href="#" onClick="cal1.select(document.forms['editaropciones'].fecha1,'anchor1','yyyy-MM-dd'); return false;" name="anchor1" id="anchor1"><img src="/images/b_calendar.png"/></a><br/>
Fecha Final:<input name="fecha2" id="fecha2" size="12" maxlength="12" type="text" value="<?=$fechafinal?>" readonly="readonly"><a href="#" onClick="cal2.select(document.forms['editaropciones'].fecha2,'anchor2','yyyy-MM-dd'); return false;" name="anchor2" id="anchor2"><img src="/images/b_calendar.png"/></a><br/>
<hr>
Insercion Rapida:<input name="insercionRapida" id="insercionRapida" type="checkbox" 
<?php   if($insercionrapida==1)
	{
		echo " checked='checked'";
	}
?>
/><br>
<hr>
Numero de Columnas de imagenes a mostrar:<input name="numcolumnas" id="numcolumnas" size="5" maxlength="5" type="text" value="<?=$numColumnas?>"><br>
<hr>
<br/>
    <input type="submit" value="Guardar" onClick="ActualizarCheck();"/>
</form>
<div id="testdiv1" style="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></div>
<div id="testdiv2" style="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></div>
</body>
</html>
