<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    
	<script type="text/javascript">
	function sendvalues(obj)
	{
	    document.getElementById("Grupo").value = obj.text;
	    document.getElementById("Grupoid").value = obj.id;
	}
	</script>

    <form name="input" action="guardarMenu.php" method="post">
    Titulo del Menu: <input type="text" name="nombreMenu" /><br/><br/>
    Grupo: <select name="grupoelegido" name="grupoelegido" onChange="javascript:sendvalues(this.options[this.selectedIndex]);">
<?php

include("configuracion.php");
$firstrow = true;
$idgr = 0;
$namegrupo = "";
$sqlQuery = "select * from grupo";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "</select>";
    echo "</br>Hubo un error en la BD o no existen grupos.";
}
else
{
    while( $row = mysql_fetch_array($result))
    {
    	if($firstrow==true)
    	{
    		$idgr = $row[0];
    		$namegrupo = $row[1];
    		$firstrow = false;
    	}
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";
}
echo "</br>";
	echo "<input type='hidden' value='".$namegrupo."' name='Grupo' id='Grupo'/>";
    echo "<input type='hidden' value='".$idgr."' name='Grupoid' id='Grupoid'/>";
echo "</br>";
?>
    <input type="submit" value="Aceptar" />
    </form> 
</body>
</html>
