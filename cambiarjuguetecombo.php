<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head></head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<script type='text/javascript'>
function sendvaluesJuguete(obj)
{ 
	//document.getElementById('Juguete').value = obj.text;
	//document.getElementById('Jugueteid').value = obj.id; 
	keyValue = obj.id;//document.getElementById("jugueteParam").value;
	window.open("/cambiar_juguete.php?idju="+keyValue,"edit");
}
</script>

<?php
	include("configuracion.php");

	$sqlQuery = "select id,nombre from juguete";
	$result = mysql_query( $sqlQuery);
	if($result==0)
	{
		echo "Error, no se cargo la BD<br>";
	}
	else
	{
		echo "Juguete ->";
		echo "<select name='juguete' id='juguete' onChange='javascript:sendvaluesJuguete(this.options[this.selectedIndex]);'>";
		while( $row = mysql_fetch_array($result))
		{
			echo "<option id='".$row[0]."'>".$row[1]."</option>";
		}
		echo "</select><br/>";
	}
?>
<hr>
</body>
</html>
