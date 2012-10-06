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
    document.getElementById("menuId").value = obj.id;
    var idg = 0;

    //relaccionar
    var tam = document.UpdateMenus.ghostmenu.length;
    for( j = 0; j < tam; j++)
	{
		x = document.UpdateMenus.ghostmenu[j];
		if( x.id == obj.id)
		{
			idg = x.value;
		}
	}
    //seleccionar
    tam = document.UpdateMenus.listaGrupo.length;
    for( i = 0; i < tam; i++)
    {
        X = document.UpdateMenus.listaGrupo[i];
        if( X.id == idg)
        {
            X.selected = "1";
        }
    }

    document.getElementById("titleMenu").value = obj.text;
}
</script>

<form name="UpdateMenus" action="actualizarMenu.php" method="post">  
<?php

include("configuracion.php");

$sqlQuery = "select * from menu";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "Hubo un error en la BD o no existen titulos de menu.";
}
else
{
    echo "Elija el Menu a editar:";
    echo "<br/>";
    echo "<select name=\"listaMenu\" id=\"listaMenu\" size=\"10\" onChange=\"javascript:sendvalues(this.options[this.selectedIndex]);\">";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";

    $result = mysql_query( $sqlQuery);
    echo "<select name='ghostmenu' id='ghostmenu' style='display:none'>";
    while($row = mysql_fetch_array($result))
    {
    	echo "<option id='".$row[0]."' value='".$row[2]."'></option>";
    }
    echo "</select>";

    $sqlQuery = "select * from grupo";
    $result = mysql_query( $sqlQuery);
    
    if($result==0)
    {
    	echo "Hubo un error en la BD o no existen grupos.";
    }
    else
    {
    
	    echo "<select name=\"listaGrupo\" id=\"listaGrupo\" size=\"10\" >";
	    //   disabled='disabled'>";
	    while( $row = mysql_fetch_array($result))
	    {
	    	echo "<option id='".$row[0]."'>".$row[1]."</option>";
	    }
	    echo "</select>";
    }
}
?>
<br/>
    Menu elegido: <input type="text" name="titleMenu" id="titleMenu"/>
    <input type="hidden" value="0" name="menuId" id="menuId"/>
<br/>
    <input type="submit" value="Actualizar" />
</form>
</body>
</html>
