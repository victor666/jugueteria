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

<form name="input" action="actualizarGrupo.php" method="post">  
<?php

include("configuracion.php");

$sqlQuery = "select * from grupo";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "Hubo un error en la BD o no existen grupos.";
}
else
{
    echo "Elija el grupo a editar:";
    echo "<br/>";
    echo "<select name=\"listaGrupo\" id=\"listaGrupo\" size=\"10\" onChange=\"javascript:sendvalues(this.options[this.selectedIndex]);\">";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";

    //header("location: welcome.php");
}
?>
<br/>
    Grupo elegido: <input type="text" name="Grupo" id="Grupo"/>
    <input type="hidden" value="0" name="Grupoid" id="Grupoid"/>
<br/>
    <input type="submit" value="Guardar" />
    <input type="submit" value="Cancelar" />
</form>
</body>
</html>
