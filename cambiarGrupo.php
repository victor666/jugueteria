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
//requiere_once("configuracion.php");

  //      if (mysql_num_rows($result) > 0)
  //      {                 
  //          while ($pdto = mysql_fetch_assoc($result)) 
  //          {                     
  //              $pdto["id"];
  //              $pdto["id"];                     
  //          }
  //      }             
  //      else 
  //      {                 
  //          $retorno = "No se encontraron registros.";             
  //      }         
   

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
    Grupo elegido: <input type="text" name="Grupo" />
    <input type="hidden" value="0" name="Grupoid" />
<br/>
    <input type="submit" value="Guardar" />
</form>
</body>
</html>
