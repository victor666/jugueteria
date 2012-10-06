<?php 

$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'club.php'; 

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
  session_start();
  if ($_SESSION['tmptxt'] == $_POST['tmptxt']) 
  {
    $opinion = $_POST['opinion'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $opinion = trim($opinion);
    $usuario = trim($usuario);
    $correo = trim($correo);
    if(!empty( $opinion) && !empty( $usuario) && !empty( $correo))
    {
	date_default_timezone_set('UTC');
	$now = date("Y-m-d");
 
	include("configuracion.php");
	
	$sqlQuery = "insert into forum(opinion,nombre,correo,fecha) values('$opinion','$usuario','$correo','$now')";
        $result = mysql_query( $sqlQuery);

        if( $result == 0)
	{
            error( "El comentario no fue insertado :(", $uploadForm);
        }
	else
	{
            success( "El commentario fue insertado :)", $uploadForm);
	}
    }
    else
    {
        error( "El comentario , el nombre de usuario o su correo estan vacios.", $uploadForm);
    }
  }
  else
  {
       error( "El texto de la imagen y su texto no concuerdan", $uploadForm);
  }
}
else
{
	error( "no existe un pagina POST.", $uploadForm);
}

?>

<?php

function error($error, $location, $seconds = 6) 
{ 
    header("Refresh: $seconds; URL='$location'"); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'.
    '"http://www.w3.org/TR/html4/strict.dtd">'. 
    '<html>'. 
    '    <head>'.
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'.
    '        <link rel="stylesheet" type="text/css" href="style.css">'.
    '    </head>'.
    '    <body>'. 
    '    <div id="Upload">'.
    '        <h1>Error</h1>'.
    '        <p>Un error ocurrio: '. 
    '        <span class="red">' . $error . '...</span>'.
    '         La pagina esta recargandose</p>'.
    '     </div>'.
    '</html>'; 
    exit; 
}

function success($msg, $location, $seconds = 6) 
{ 
    header("Refresh: $seconds; URL='$location'"); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'.
    '"http://www.w3.org/TR/html4/strict.dtd">'. 
    '<html>'. 
    '    <head>'.
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'.
    '        <link rel="stylesheet" type="text/css" href="style.css">'.
    '    </head>'.
    '    <body>'. 
    '    <div id="Upload">'.
    '        <h1>Su comentario para el club se inserto :)</h1>'.
    '        <p>Su pagina se recargara: '. 
    '        <span class="red">' . $msg . '...</span>'.
    '         La pagina se esta recargando</p>'.
    '     </div>'.
    '</html>'; 
    exit; 
} // end error handler 
?> 
