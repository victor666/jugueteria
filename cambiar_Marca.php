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
    document.getElementById("Marca").value = obj.text;
    document.getElementById("Marcaid").value = obj.id;
}
</script>

<form name="input" action="actualizarMarca.php" method="post">  
<?php

include("configuracion.php");

$sqlQuery = "select * from marca";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "Hubo un error en la BD o no existen marcas.";
}
else
{
    echo "Elija la Marca a editar:";
    echo "<br/>";
    echo "<select name=\"listaMarca\" id=\"listaMarca\" size=\"10\" onChange=\"javascript:sendvalues(this.options[this.selectedIndex]);\">";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";
}
?>
<br/>
    Grupo elegido: <input type="text" name="Marca" id="Marca"/>
    <input type="hidden" value="0" name="Marcaid" id="Marcaid"/>
<br/>
    <input type="submit" value="Guardar" />
</form>
</body>
</html>
