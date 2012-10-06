<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>

<script type="text/javascript">
function sendvalues(obj)
{
    document.getElementById("Grupoid").value = obj.id;
}

function sendvaluesMarca(obj)
{
    document.getElementById("marcaId").value = obj.id;
}

function sendvaluesTipoArticulo(obj)
{
    document.getElementById("TipoArticuloId").value = obj.id;
}
</script>

        <form id="Upload" name="addjuguetes" action="addjuguete.php" enctype="multipart/form-data" method="post">
        Nombre: <input type="text" name="nombre" /><br/>
<?php //GRUPO insercion
include("configuracion.php");
$max_file_size = 100000; // size in bytes 
$sqlQuery = "select * from grupo";
$result = mysql_query( $sqlQuery);
if( $result == 0)
{
    echo "Hubo un error en la BD o no existen grupos.";
}
else
{
    $first = true;
    echo "Grupo:";
    echo "<select name='grupojuguete' id='grupojuguete' onChange='javascript:sendvalues(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
	if($first)
	{
		$defaultGrupoId = $row[0];
		$first = false;
	}
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select><br/>";
}
?>
        Año: <select name="annio" id="annio">
	<option selected id='2012'>2012</option>
<?php //años insercion
    $i = 2011;
    while( $i >= 1960)
    {
        echo "<option id='".$i."'>".$i."</option>";
	$i--;
    }
?>
	</select>
	<input type="hidden" value="2012" name="annio" />
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
	<input type="hidden" value="<?=$defaultGrupoId ?>" name="Grupoid" />

<?php //MARCA insercion
$sqlQuery = "select * from marca";
$result = mysql_query( $sqlQuery);
if( $result == 0)
{
    echo "Hubo un error en la BD o no existen marcas.";
}
else
{
    $first = true;
    echo "Marca:";
    echo "<select name='marca' id='marca' onChange='javascript:sendvaluesMarca(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
	if($first)
	{
		$defaultMarcaId = $row[0];
		$first = false;
	}
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select><br/>";
}
?>
	<input type="hidden" name="marcaId" value="<?=$defaultMarcaId ?>"/><br/>
<?php //TIPOARTICULO insercion
$sqlQuery = "select * from tipoarticulo";
$result = mysql_query( $sqlQuery);
if( $result == 0)
{
    echo "Hubo un error en la BD o no existen tipo de articulos.";
}
else
{
    $first = true;
    echo "Tipo de Articulo:";
    echo "<select name='tipodearticulo' id='tipodearticulo' onChange='javascript:sendvaluesTipoArticulo(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
	if($first)
	{
		$defaultTipoArticuloId = $row[0];
		$first = false;
	}
        echo "<option id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select><br/>";
}
?>
	<input type="hidden" name="TipoArticuloId" value="<?=$defaultTipoArticuloId ?>"/><br/>
	Cantidad: <input type="text" name="cantidad" /><br/>
        Precio: <input type="text" name="precio" /> (Bs.)<br/>
        Imagen: <input type="file" name="bigImage" id="bigImage" /><br/>
        Imagen Pequeña: <input type="file" name="smallImage" id="smallImage"/><br/>
	Descripcion: <textarea name="descripcion" id="descripcion"></textarea><br/>
        <input id="submit" type="submit" name="submit" value="Guardar" />
        </form> 
    </body>
</html>

