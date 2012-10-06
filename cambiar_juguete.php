<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<body>

<script type='text/javascript'>
function sendvaluesJuguete(obj)
{ 
	document.getElementById('Juguete').value = obj.text;
	document.getElementById('Jugueteid').value = obj.id; 
}

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

<?php

function GetSgte($id)
{
	$res = mysql_query( "select id from juguete");
	$found = false;
	while($row = mysql_fetch_array($res))
	{
		if($found == true)
		{
			return $row[0];	
		}
		if($row[0] == $id)
		{
			$found = true;
		}
	}
	return 0;
}

function GetPrev($id)
{
	$res = mysql_query( "select id from juguete");
	while($row = mysql_fetch_array($res))
	{
		if($row[0] == $id)
		{
			return $prev;
		}
		else
		{
			$prev = $row[0];
		}
	}
	return $id;
}

$IDanterior = 0;
$IDsiguiente = 0;
$resulActualizacion = "";
include("configuracion.php");

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['adelante']))
	{
		if(isset($_POST["JugueteidSiguiente"]))
		{
			$id = $_POST["JugueteidSiguiente"];
			$sqlQuery = "select * from juguete where id=".$id;
			$result = mysql_query( $sqlQuery);
			if( $result == 0)
			{
				$resulActualizacion = "Error, no existe registro con ese id=".$id;
			}
			else
			{
			    if( $row = mysql_fetch_array($result))
			    {
				$IDjuguete = $row[0];
				$nombre = $row[1];
				$idGrupo = $row[2];
				$annio = $row[3];
				$idMarca = $row[4];
				$cantidad = $row[5];
				$precio = $row[6];
				$imagenp = $row[7];
				$imageng = $row[8];
				$descripcion = $row[9];
				$tipoarticuloid = $row[11];
				$IDsiguiente = GetSgte($IDjuguete);
				$IDanterior = GetPrev($IDjuguete);
			    }
			}
		}
		else
		{
			$resulActualizacion = "POST, no existe id=".$id." para el siguiente";
		}
	}
	elseif(isset($_POST['atraz']))
	{
		if(isset($_POST["JugueteidAtraz"]))
		{
			$id = $_POST["JugueteidAtraz"];
			$sqlQuery = "select * from juguete where id=".$id;
			$result = mysql_query( $sqlQuery);
			if($result==0)
			{
				$resulActualizacion = "Error, no existe registro con ese id=".$id;
			}
			else
			{
			    if( $row = mysql_fetch_array($result))
			    {
				$IDjuguete = $row[0];
				$nombre = $row[1];
				$idGrupo = $row[2];
				$annio = $row[3];
				$idMarca = $row[4];
				$cantidad = $row[5];
				$precio = $row[6];
				$imagenp = $row[7];
				$imageng = $row[8];
				$descripcion = $row[9];
				$tipoarticuloid = $row[11];
				$IDsiguiente = GetSgte($IDjuguete);
				$IDanterior = GetPrev($IDjuguete);
			    }
			}
		}
		else
		{
			$resulActualizacion = "POST, no existe id=".$id." para el previo";
		}
	}
	elseif(isset($_POST['guardar']))
	{
		$uploadsDirectory = getcwd()."/images/";
		if(isset($_POST["Jugueteid"]))
		{
			$sfieldname = 'SmallImage'; 
			$bfieldname = 'BigImage'; 

			$IDjuguete = $_POST['Jugueteid'];
			$nombre = $_POST['nombre'];
			$idGrupo = $_POST['Grupoid'];
			$annio = $_POST['annio'];
			$idMarca = $_POST['marcaId'];
			$cantidad = $_POST['cantidad'];
			$precio = $_POST['precio'];
			$descripcion = $_POST['descripcion'];
			$imagenp = $_POST['imagenpeque'];
			$imageng = $_POST['imagengrande'];
			$tipoarticuloid = $_POST['TipoArticuloId'];
			$IDsiguiente = $_POST["JugueteidSiguiente"];
			$IDanterior = $_POST["JugueteidAtraz"];

			if (isset($_FILES[$sfieldname]) || isset($_FILES[$bfieldname]))
			{
				if (($_FILES[$sfieldname]['error'] == 0) || ($_FILES[$bfieldname]['error'] == 0))
				{
					if(@is_uploaded_file($_FILES[$sfieldname]['tmp_name']))
					{
						if(@getimagesize($_FILES[$sfieldname]['tmp_name']) == true)
						{
							$nows = time();
							$imagenp = $nows.'-'.$_FILES[$sfieldname]['name'];
							while(file_exists($uploadsFilename = $uploadsDirectory.$imagenp)) 
							{ 
							    $nows++;
							    $imagenp = $nows.'-'.$_FILES[$sfieldname]['name'];
							}
							@move_uploaded_file($_FILES[$sfieldname]['tmp_name'], $uploadsFilename);
						}
					}
					if(@is_uploaded_file($_FILES[$bfieldname]['tmp_name']))
					{
						if(@getimagesize($_FILES[$bfieldname]['tmp_name']) == true)
						{
							$nowb = time();
							$imageng = $nowb.'-'.$_FILES[$bfieldname]['name'];
							while(file_exists($uploadbFilename = $uploadsDirectory.$imageng)) 
							{ 
							    $nowb++;
							    $imageng = $nowb.'-'.$_FILES[$bfieldname]['name'];
							}
							@move_uploaded_file($_FILES[$bfieldname]['tmp_name'], $uploadbFilename);
						}
					}
			     	}
				else
				{
					$resulActualizacion = "Error, al subir las imagenes"; 
				}
			}
  
			$sqlQuery = "update juguete set nombre='$nombre', grupoid='$idGrupo', annio='$annio', marcaid='$idMarca', cantidad='$cantidad', precio='$precio', descripcion='$descripcion', linkfotoPequenia='$imagenp',linkfotoGrande='$imageng', tipoarticuloId='$tipoarticuloid' where id='$IDjuguete'";
			$result = mysql_query( $sqlQuery);
			if($result == 0)
			{
			    $resulActualizacion = "Error, no existe registro con ese id='$IDjuguete' para actualizar ".$sqlQuery;
			}
			else
			{
			    $resulActualizacion = "Se actualizo el juguete con el id=".$IDjuguete;
			}
		}
		else
		{
			$resulActualizacion = "no se setteo el id";
		}
	}
}
else//GET
{
	if(isset($_GET['idju']))
	{
		$id = $_GET["idju"];
		$sqlQuery = "select * from juguete where id=".$id;
		$result = mysql_query( $sqlQuery);
		if( $result == 0)
		{
			$resulActualizacion = "Error, no existe registro con ese id=".$id;
		}
		else
		{
		    if( $row = mysql_fetch_array($result))
		    {
			$IDjuguete = $row[0];
			$nombre = $row[1];
			$idGrupo = $row[2];
			$annio = $row[3];
			$idMarca = $row[4];
			$cantidad = $row[5];
			$precio = $row[6];
			$imagenp = $row[7];
			$imageng = $row[8];
			$descripcion = $row[9];
			$tipoarticuloid = $row[11];
			$IDsiguiente = GetSgte($IDjuguete);
			$IDanterior = GetPrev($IDjuguete);
		    }
		}
	}
	else
	{
		$sqlQuery = "select * from juguete";
		$result = mysql_query( $sqlQuery);
		if( $result == 0)
		{
			$resulActualizacion = "Error, no existen registros de juguetes";
		}
		else
		{
		    if( $row = mysql_fetch_array($result))
		    {
			$IDjuguete = $row[0];
			$nombre = $row[1];
			$idGrupo = $row[2];
			$annio = $row[3];
			$idMarca = $row[4];
			$cantidad = $row[5];
			$precio = $row[6];
			$imagenp = $row[7];
			$imageng = $row[8];
			$descripcion = $row[9];
			$tipoarticuloid = $row[11];
		    }
		    if( $row = mysql_fetch_array($result))
		    {
			$IDsiguiente = $row[0];
		    }
		}
	}
}
?>
<form name="editarJuguete" action="cambiar_juguete.php" enctype="multipart/form-data" method="post">  
     <input type="hidden" value="<?=$IDjuguete ?>" name="Jugueteid" id="Jugueteid"/>
     <? echo $resulActualizacion; ?></br>
     Nombre: <input type="text" name="nombre" value="<?=$nombre ?>"/><br/>
<?php
    $max_file_size = 100000; // size in bytes 
    $sqlQuery = "select * from grupo";
    $result = mysql_query( $sqlQuery);
    echo "Grupo:";
    echo "<select name='grupojuguete' id='grupojuguete' onChange='javascript:sendvalues(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option ".(($idGrupo==$row[0])?"selected":"")." id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select><br/>";
?>
        Año: <select name="annioSel" id="annioSel" >
	<option selected id='2012'>2012</option>
<?php //años insercion
    $i = 2011;
    while( $i >= 1960)
    {
        echo "<option ".(($annio==$i)?"selected":"")." id='".$i."'>".$i."</option>";
	$i--;
    }
?>
	</select>
	<input type="hidden" name="annio" id="annio" value="<?=$annio?>"/>
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
	<input type="hidden" name="Grupoid" id="Grupoid" value="<?=$idGrupo ?>" />

<?php //MARCA insercion
    $sqlQuery = "select * from marca";
    $result = mysql_query( $sqlQuery);
    echo "Marca:";
    echo "<select name='marca' id='marca' onChange='javascript:sendvaluesMarca(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option ".(($idMarca==$row[0])?"selected":"")." id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select><br/>";

?>
    <input type="hidden" name="marcaId" id="marcaId" value="<?=$idMarca ?>"/><br/>
<?php //TIPOARTICULO insercion
    $sqlQuery = "select * from tipoarticulo";
    $result = mysql_query( $sqlQuery);
    echo "Tipo de Articulo:";
    echo "<select name='tipodearticulo' id='tipodearticulo' onChange='javascript:sendvaluesTipoArticulo(this.options[this.selectedIndex]);'>";
    while( $row = mysql_fetch_array($result))
    {
        echo "<option ".(($tipoarticuloid==$row[0])?"selected":"")." id='".$row[0]."'>".$row[1]."</option>";
    }
    echo "</select><br/>";
?>
	<input type="hidden" name="TipoArticuloId" id="TipoArticuloId" value="<?=$tipoarticuloid ?>"/><br/>
	Cantidad: <input type="text" name="cantidad"  value="<?=$cantidad ?>"/><br/>
        Precio: <input type="text" name="precio"  value="<?=$precio ?>"/> (Bs.)<br/>
        Imagen: <?php echo "<a href='images/".$imageng."' target='_blank'>".$imageng."</a>"; ?> <input type="file" name="BigImage" id="BigImage" /><br/>
        Imagen Pequeña: <?php echo "<a href='images/".$imagenp."' target='_blank'>".$imagenp."</a>"; ?> <input type="file" name="SmallImage" id="SmallImage" /><br/>
	<input type="hidden" name="imagenpeque" id="imagenpeque" value="<?=$imagenp?>" />
	<input type="hidden" name="imagengrande" id="imagengrande" value="<?=$imageng?>" />
	Descripcion: <textarea name="descripcion" id="descripcion" cols="50"><?=$descripcion ?></textarea><br/>
	<input type="hidden" name="JugueteidAtraz" id="JugueteidAtraz" value="<?=$IDanterior?>" /> 
	<input type="hidden" name="JugueteidSiguiente" id="JugueteidSiguiente" value="<?=$IDsiguiente?>" />
<br/>
    <input type="submit" name="guardar" id="guardar" value="Guardar" />
    <input type="submit" name="atraz" id="atraz" value="<<" <?php if($IDanterior==0) echo "disabled='disabled'"; ?>/>
    <input type="submit" name="adelante" id="adelante" value=">>" <?php if($IDsiguiente==0) echo "disabled='disabled'"; ?>/>
</form>
</body>
</html>
