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
    document.getElementById("jugueteId").value = obj.id;
}
</script>

<form name="borrarJuguete" action="borrarJuguete.php" method="post">  
<?php

include("configuracion.php");

$sqlQuery = "select * from juguete";
$result = mysql_query( $sqlQuery);

if($result==0)
{
    echo "Hubo un error en la BD o no existen juguetes.";
}
else
{
    echo "Elija el juguete a borrar:";
    echo "<br/>";
    echo "<select name=\"listaJuguete\" id=\"listaJuguete\" size=\"10\" onChange=\"javascript:sendvalues(this.options[this.selectedIndex]);\">";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select>";
}
?>
<br/>
     <input type="hidden" value="0" name="jugueteId" id="jugueteId"/>
<br/>
    <input type="submit" value="Borrar" />
</form>
</body>
</html>
