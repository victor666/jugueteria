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
    document.getElementById("TipoArticulo").value = obj.text;
    document.getElementById("TipoArticuloid").value = obj.id;
}
</script>

<form name="actualizar" action="actualizarTipoArticulo.php" method="post">  
<?php

include("configuracion.php");

$sqlQuery = "select * from tipoarticulo";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "Hubo un error en la BD o no existen tipos de articulo.";
}
else
{
    echo "Elija el Tipo de Articulo a editar:";
    echo "<br/>";
    echo "<select name=\"listaTipoArticulo\" id=\"listaTipoArticulo\" size=\"10\" onChange=\"javascript:sendvalues(this.options[this.selectedIndex]);\">";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";
}
?>
<br/>
    Tipo de Articulo elegido: <input type="text" name="TipoArticulo" id="TipoArticulo"/>
    <input type="hidden" value="0" name="TipoArticuloid" id="TipoArticuloid"/>
<br/>
    <input type="submit" value="Guardar" />
</form>
</body>
</html>
