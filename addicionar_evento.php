<!DOCTYPE html>
<html>
    <head>
        <title></title>
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
$max_file_size = 100000; // size in bytes 
?>
        <form id="Upload" name="addEvento" action="addevento.php" enctype="multipart/form-data" method="post">
        Nombre: <input type="text" name="nombre" /><br/>
        Fecha: <input type="text" name="fecha" size=10 readonly="readonly"/><a href="#" onClick="cal.select(document.forms['addEvento'].fecha,'anchor1','yyyy-MM-dd'); return false;"name="anchor1" id="anchor1"><img src="/images/b_calendar.png"/></a><br/>
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
	Lugar: <input type="text" name="lugar" /><br/>
        Imagen: <input type="file" name="Image" id="Image" /><br/>
        Descripcion: <textarea name="descripcion" id="descripcion" cols="50"></textarea><br/>
        <input id="submit" type="submit" name="submit" value="Guardar" />
        </form>
<div id="testdiv1" style="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></div>
    </body>
</html>

