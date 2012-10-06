<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="PopupWindow.js"></script>
	<script type="text/javascript" src="AnchorPosition.js"></script>
	<script type="text/javascript" src="date.js"></script>
	<script type="text/javascript" src="CalendarPopup.js"></script>
	<script language="JavaScript">document.write(getCalendarStyles());</script>
	<script language="JavaScript">
		var cal = new CalendarPopup("testdiv1");
	</script>
	<style>
		input[readonly]{
				color:black;
				background-color: #D4D0C8;
				}
	</style>
    </head>
<body>

<?php

function GetSgte($id)
{
	$res = mysql_query( "select id from evento");
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
	$res = mysql_query( "select id from evento");
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
		if(isset($_POST["EventoidSiguiente"]))
		{
			$id = $_POST["EventoidSiguiente"];
			$sqlQuery = "select * from evento where id=".$id;
			$result = mysql_query( $sqlQuery);
			if( $result == 0)
			{
				$resulActualizacion = "Error, no existe registro con ese id=".$id;
			}
			else
			{
			    if( $row = mysql_fetch_array($result))
			    {
				$IDevento = $row[0];
				$nombre = $row[1];
				$fecha = $row[2];
				$lugar = $row[3];
				$imagen = $row[4];
				$descripcion = $row[5];
				$IDsiguiente = GetSgte($IDevento);
				$IDanterior = GetPrev($IDevento);
			    }
			}
		}
		else
		{
			$resulActualizacion = "no existe id = ".$id;
		}
	}
	elseif(isset($_POST['atraz']))
	{
		if(isset($_POST["EventoidAtraz"]))
		{
			$id = $_POST["EventoidAtraz"];
			$sqlQuery = "select * from evento where id=".$id;
			$result = mysql_query( $sqlQuery);
			if($result == 0)
			{
				$resulActualizacion = "Error, no existe registro con ese id=".$id;
			}
			else
			{
			    if( $row = mysql_fetch_array($result))
			    {
				$IDevento = $row[0];
				$nombre = $row[1];
				$fecha = $row[2];
				$lugar = $row[3];
				$imagen = $row[4];
				$descripcion = $row[5];
				$IDsiguiente = GetSgte($IDevento);
				$IDanterior = GetPrev($IDevento);
			    }
			}
		}
		else
		{
			$resulActualizacion = "no existe id = ".$id;
		}
	}
	elseif(isset($_POST['guardar']))
	{
		$uploadsDirectory = getcwd()."/images/";// /home/a3592910/public_html/collections/images/1345850944-1.jpg
		if(isset($_POST["Eventoid"]))
		{
			$fieldname = 'Image'; 

			$IDevento = $_POST['Eventoid'];
			$nombre = $_POST['nombre'];
			$fecha = $_POST['fecha'];
			$lugar = $_POST['lugar'];
			$imagen = $_POST['imagen'];
			$descripcion = $_POST['descripcion'];
			$IDsiguiente = $_POST["EventoidSiguiente"];
			$IDanterior = $_POST["EventoidAtraz"];

			if (isset($_FILES[$fieldname]))
			{
				if ($_FILES[$fieldname]['error'] == 0)
				{
					if(@is_uploaded_file($_FILES[$fieldname]['tmp_name']))
					{
						if(@getimagesize($_FILES[$fieldname]['tmp_name']) == true)
						{
							$nowt = time();
							$imagen = $nowt.'-'.$_FILES[$fieldname]['name'];
							while(file_exists($uploadsFilename = $uploadsDirectory.$imagen)) 
							{ 
							    $nowt++;
							    $imagen = $nowt.'-'.$_FILES[$fieldname]['name'];
							}
							@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadsFilename);
						}
					}
			     	}
				else
				{
					$resulActualizacion = "Error, al subir las imagenes"; 
				}
			}
  
			$sqlQuery = "update evento set nombre='$nombre', fecha='$fecha', lugar='$lugar', linkFoto='$imagen', Descripcion='$descripcion' where id='$IDevento'";
			$result = mysql_query( $sqlQuery);
			if($result == 0)
			{
			    $resulActualizacion = "Error, no existe registro con ese id='$IDevento' para actualizar ".$sqlQuery;
			}
			else
			{
			    $resulActualizacion = "Se actualizo el juguete con el id=".$IDevento;
			}
		}
		else
		{
			$resulActualizacion = "no se setteo el id";
		}
	}
}
else
{
	$sqlQuery = "select * from evento";
	$result = mysql_query( $sqlQuery);
	if( $result == 0)
	{
		$resulActualizacion = "Error, no existen registros de eventos";
	}
	else
	{
	    if( $row = mysql_fetch_array($result))
	    {
		$IDevento = $row[0];
		$nombre = $row[1];
		$fecha = $row[2];
		$lugar = $row[3];
		$imagen = $row[4];
		$descripcion = $row[5];
	    }
	    if( $row = mysql_fetch_array($result))
	    {
		$IDsiguiente = $row[0];
	    }
	}
}
?>
<form name="editarEvento" action="cambiar_evento.php" enctype="multipart/form-data" method="post">  
     <input type="hidden" value="<?=$IDevento ?>" name="Eventoid" id="Eventoid"/>
     <? echo $resulActualizacion; ?></br>
     Nombre: <input type="text" name="nombre" value="<?=$nombre ?>"/><br/>
<?php
    $max_file_size = 100000; // size in bytes 
?>
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
 	Fecha: <input type="text" name="fecha" value="<?=$fecha ?>" size=10 readonly="readonly"/><a href="#" onClick="cal.select(document.forms['editarEvento'].fecha,'anchor1','yyyy-MM-dd'); return false;"name="anchor1" id="anchor1"><img src="/images/b_calendar.png"/></a><br/>
        Lugar: <input type="text" name="lugar" value="<?=$lugar ?>"/><br/>
        Imagen: <?php echo "<a href='images/".$imagen."' target='_blank'>".$imagen."</a>"; ?> <input type="file" name="Image" id="Image" /><br/>
	<input type="hidden" name="imagen" id="imagen" value="<?=$imagen?>" />
	Descripcion: <textarea name="descripcion" id="descripcion" cols="50"><?=$descripcion ?></textarea><br/>
	<input type="hidden" name="EventoidAtraz" id="EventoidAtraz" value="<?=$IDanterior?>" />
	<input type="hidden" name="EventoidSiguiente" id="EventoidSiguiente" value="<?=$IDsiguiente?>" />
<br/>
    <input type="submit" name="guardar" id="guardar" value="Guardar" />
    <input type="submit" name="atraz" id="atraz" value="<<" <?php if($IDanterior==0) echo "disabled='disabled'"; ?>/>
    <input type="submit" name="adelante" id="adelante" value=">>" <?php if($IDsiguiente==0) echo "disabled='disabled'"; ?>/>
</form>
<div id="testdiv1" style="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></div>
</body>
</html>
