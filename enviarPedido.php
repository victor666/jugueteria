<?php 

$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'misPedidos.php'; 

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
  session_start();
  if ($_SESSION['tmptxt'] == $_POST['tmptxt']) 
  {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $nombre = trim($nombre);
    $correo = trim($correo);

    if( !empty( $correo))
    {
	date_default_timezone_set('UTC');
	$now = date("Y-m-d");
	include("configuracion.php");

	$tmpQuery = "";
    	$idjuguete = 1;
	$sqlPedido = "";
	$request = http_build_query($_POST);
	$postlength = strlen($request);

	while( $idjuguete < $postlength)
    	{
		$index = "articulo".$idjuguete;
		if( isset($_POST[$index]))
		{
			if($_POST[$index]=="1")
			{
				$tmpQuery = $tmpQuery." ('$idjuguete','$correo','$now'),";
				$valuesid .= " '$idjuguete',";
			}
		}
		$idjuguete++;
    	}
	if(strlen($tmpQuery)>1)
	{
		$tmpQuery = substr( $tmpQuery, 0, -1);//extraer la ultima coma	
	}
	if(strlen($valuesid)>1)
	{
		$valuesid = substr( $valuesid, 0, -1);//extraer la ultima coma	
	}
	
	$sqlQuery = "insert into pedido(idjuguete,correo,fecha) values".$tmpQuery;
        $result = mysql_query( $sqlQuery);

        if( $result == 0)
	{
            error( "El pedido no fue enviado :(, quiza olvido elegir un articulo.", $uploadForm);
        }
	else
	{
	    $sqlPedido = "select j.id,j.nombre,g.nombre,j.annio,m.nombre,ta.nombre,j.precio,j.descripcion from ((juguete as j left join grupo as g on j.grupoid=g.idg) left join marca as m on j.marcaid=m.id) left join tipoarticulo as ta on j.tipoarticuloId=ta.id where id in ($valuesid)";
	    $result = mysql_query( $sqlQuery);

	    if( $result == 0)
	    {
	       error( "no tiene elegido nada para el pedido", $uploadForm);
	    }
	    else
	    {
              $body1 = "";    
              while($row = mysql_fetch_array($result))
              {
                 $body1 = $body1.$row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7]."/n";  
              }
	      //correo de administrador
	      $to = "ralphadp@hotmail.com";
	      $subject = "Pedido de ".$nombre." con email: ".$correo;
	      $body= $body1;
	      $headers="Pedido hecho en Fecha: ".$now;
	      mail( $to, $subject, $body, $headers);
	      //correo del solicitante 
	      $subject = "Pedido enviado (Juguetes Bertha)";
	      $body= $body1;
	      $headers="Su pedido fue realizado en Fecha: ".$now;
	      mail( $correo, $subject, $body, $headers);
              success( "El pedido fue enviado :)", $uploadForm);
	    }
	}
    }
    else
    {
        error( "Su correo esta vacio o no tickeo ningun articulo.", $uploadForm);
    }
  }
  else
  {
	error( "el texto de la imagen y su texto no concuerdan", $uploadForm);
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
    '        <h1>Su pedido fue aceptado :)</h1>'.
    '        <p>Gracias: '. 
    '        <span class="red">' . $msg . '...</span>'.
    '         La pagina se esta recargando</p>'.
    '     </div>'.
    '</html>'; 
    exit; 
} // end error handler 
?> 
