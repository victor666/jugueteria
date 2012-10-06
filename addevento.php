<?php 
// make a note of the current working directory, relative to root. 
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadsDirectory = getcwd()."/images/";
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'addicionar_evento.php'; 

$fieldname = 'Image'; 

$errors = array(1 => 'php.ini el tamanio maximo (100 Kb) fue excedido', 
                2 => 'el archivo es mas grande que 100Kb', 
                3 => 'el archivo subido fue parcialmente exitoso', 
                4 => 'no existe archivo attachado'); 


if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    $nombre = trim($nombre);
    if(!empty( $nombre))
    {
	isset($_POST['submit']) or error('el formulario de subida es necesario', $uploadForm); 

	($_FILES[$fieldname]['error'] == 0) or error($errors[$_FILES[$fieldname]['error']], $uploadForm); 

	@is_uploaded_file($_FILES[$fieldname]['tmp_name']) or error('el archivo no es un archivo subido por HTTP', $uploadForm); 
     
	@getimagesize($_FILES[$fieldname]['tmp_name']) or error('el archivo solo admite imagenes', $uploadForm); 

	$nows = time();
	$timefilename = $nows.'-'.$_FILES[$fieldname]['name'];
	while(file_exists($uploadsFilename = $uploadsDirectory.$timefilename)) 
	{ 
	    $nows++; 
	}
 

	@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadsFilename) or error('no existe permisos para el archivo', $uploadForm); 

	include("configuracion.php");
	
	$sqlQuery = "insert into evento(nombre,fecha,lugar,linkFoto,Descripcion) values('$nombre','$fecha','$lugar','$timefilename','$descripcion')";
        $result = mysql_query( $sqlQuery);

        if( $result == 0)
	{
            error( "El evento no fue insertado :)", $uploadForm);
        }
    }
    else
    {
        error( "El nombre del evento esta vacio.", $uploadForm);
    }
}
?>

<html> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
        <link rel="stylesheet" type="text/css" href="style.css"> 
    </head> 
    <body> 
         <div id="Upload"> 
            <h1>Evento insertado, Foto subida:</h1> 
	<p><? echo $timefilename; ?></p>
	    <p><img src="/images/<?=$timefilename ?>"></p>
        </div> 
    </body> 
</html> 

<?php
// The following function is an error handler which is used 
// to output an HTML error page if the file upload fails 
function error($error, $location, $seconds = 5) 
{ 
    header("Refresh: $seconds; URL='$location'"); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'.
    '"http://www.w3.org/TR/html4/strict.dtd">'. 
    '<html lang="en">'. 
    '    <head>'.
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'.
    '        <link rel="stylesheet" type="text/css" href="style.css">'.
    '    <title>Upload error</title>'.
    '    </head>'.
    '    <body>'. 
    '    <div id="Upload">'.
    '        <h1>Upload failure</h1>'.
    '        <p>An error has occurred: '. 
    '        <span class="red">' . $error . '...</span>'.
    '         The upload form is reloading</p>'.
    '     </div>'.
    '</html>'; 
    exit; 
} // end error handler 
?> 
