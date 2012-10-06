<?php 
// make a note of the current working directory, relative to root. 
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadsDirectory = getcwd()."/images/";
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'addicionar_juguete.php'; 

$sfieldname = 'smallImage'; 
$bfieldname = 'bigImage'; 

$errors = array(1 => 'php.ini el tamanio maximo (100 Kb) fue excedido', 
                2 => 'el archivo es mas grande que 100Kb', 
                3 => 'el archivo subido fue parcialmente exitoso', 
                4 => 'no existe archivo attachado'); 


if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = $_POST['nombre'];
    $grupoId = $_POST['Grupoid'];
    $marcaId = $_POST['marcaid'];
    $tipoArticulo = $_POST['TipoArticuloId'];
    $annio = $_POST['annio'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $nombre = trim($nombre);
    if(!empty( $nombre))
    {
	
	isset($_POST['submit']) or error('el formulario de subida es necesario', $uploadForm); 

	($_FILES[$sfieldname]['error'] == 0) or error($errors[$_FILES[$sfieldname]['error']], $uploadForm); 
	($_FILES[$bfieldname]['error'] == 0) or error($errors[$_FILES[$bfieldname]['error']], $uploadForm); 

	@is_uploaded_file($_FILES[$sfieldname]['tmp_name']) or error('el archivo pequeño no es un archivo subido por HTTP', $uploadForm); 
	@is_uploaded_file($_FILES[$bfieldname]['tmp_name']) or error('el archivo grande no es un archivo subido por HTTP', $uploadForm); 
     
	@getimagesize($_FILES[$sfieldname]['tmp_name']) or error('el archivo pequeño solo admite imagenes', $uploadForm); 
	@getimagesize($_FILES[$bfieldname]['tmp_name']) or error('el archivo grande solo admite imagenes', $uploadForm); 

	$nows = time();
	$nowb = time();
	$timesfilename = $nows.'-'.$_FILES[$sfieldname]['name'];
	$timebfilename = $nowb.'-'.$_FILES[$bfieldname]['name'];
	//small
	while(file_exists($uploadsFilename = $uploadsDirectory.$timesfilename)) 
	{ 
	    $nows++; 
	}
	//big
	while(file_exists($uploadbFilename = $uploadsDirectory.$timebfilename)) 
	{ 
	    $nowb++; 
	} 
 

	@move_uploaded_file($_FILES[$sfieldname]['tmp_name'], $uploadsFilename) or error('no existe permisos para el archivo pequeño', $uploadForm); 
	@move_uploaded_file($_FILES[$bfieldname]['tmp_name'], $uploadbFilename) or error('no existe permisos para el archivo grande', $uploadForm);

	include("configuracion.php");
	
	$sqlQuery = "insert into juguete(nombre,grupoid,marcaid,annio,tipoarticuloId,cantidad,precio,linkfotoPequenia,linkfotoGrande,descripcion) values('$nombre','$grupoId','$marcaId','$annio','$tipoArticulo','$cantidad','$precio','$timesfilename','$timebfilename','$descripcion')";
        $result = mysql_query( $sqlQuery);

        if( $result == 0)
	{
            error( "El juguete fue insertado :)", $uploadForm);
        }
    }
    else
    {
        error( "El nombre del juguete esta vacio.", $uploadForm);
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
            <h1>Juguete insertado, Fotos subidas:</h1> 
	<p><? echo $timesfilename; ?></p>
	    <p><img src="/images/<?=$timesfilename ?>"></p>
	<p><? echo $timebfilename; ?></p>
	    <p><img src="/images/<?=$timebfilename ?>"></p>
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
