<!--<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
        <link rel="stylesheet" type="text/css" href="style.css"> 
<?php        
	echo "<script>";
	echo "window.onunload = function(){ ";
	session_start();
	if (isset($_SESSION['pagina']))
    	{
 		if($_SESSION['pagina'] == '1') 
		{
			session_destroy();
		}
	}
	echo "	};</script>";
?>
	<script>
            function changeBrowserScreenSize(w,h) 
            {       
                window.resizeTo( w,h );
            }
        </script>
        <title>Jugueteria Bertha - Administracion</title>
    </head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" onload="changeBrowserScreenSize(900,650)">
<?php
    session_start();
    if (isset($_SESSION['berthalogin']))
    {
 	if($_SESSION['berthalogin'] != '1') 
	{
		echo "<p>No puede entrar a este sitio sin permisos.</p>";
	}
	else
	{
		$_SESSION['pagina'] = '1';
?>
<table width="900" border="0">
    <tr style="background-color:#11A500; height:30px; font-size:0.7em; font-family:verdana,sans-serif;">
        <td>
        <a target="frameEdicion" href="lst_menus.php"><b>Listar Menu Izquierdo</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_grupos.php"><b>Listar Grupos</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_eventos.php"><b>Listar Eventos</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_marcas.php"><b>Listar Marcas</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_ultimos.php"><b>Listar ultimos Juguetes</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_juguetes.php"><b>Listar juguetes</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_juguetes_marcas.php"><b>Listar juguetes por marca</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_juguetes_precio.php"><b>Listar juguetes por precio</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_pedidos.php"><b>Listar Pedidos</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_tipoarticulo.php"><b>Listar Tipo de articulos</b></a>
        </td>
    </tr>

    <tr valign="top">
        <td colspan="3" style="background-color:#F0D700;
            width:150px;
            text-align:top;
	    font-size:0.7em; font-family:verdana,sans-serif;">
            <b>Menu</b><br/><br/>
            <a target="frameEdicion" href="cambiar_contrasenia.htm"><img src="/images/b_edit.png"/>Cambiar contraseña</a><br />
<hr>
            <a target="frameEdicion" href="addicionar_menu.php"><img src="/images/b_insrow.png"/>Adicionar Menu</a><br />
            <a target="frameEdicion" href="cambiar_menu.php"><img src="/images/b_edit.png"/>Cambiar Menu</a><br />
            <a target="frameEdicion" href="borrar_menu.php"><img src="/images/b_drop.png"/>Borrar Menu</a><br />
<hr>
            <a target="frameEdicion" href="addicionar_juguete.php"><img src="/images/b_insrow.png"/>Addicionar Juguete</a><br />
            <a target="frameEdicion" href="cambiarjuguete.htm.php"><img src="/images/b_edit.png"/>Cambiar Juguete</a><br />
            <a target="frameEdicion" href="borrar_juguete.php"><img src="/images/b_drop.png"/>Borrar Juguete</a><br />
<hr>
            <a target="frameEdicion" href="addicionar_marca.htm"><img src="/images/b_insrow.png"/>Addicionar Marca</a><br />
            <a target="frameEdicion" href="cambiar_Marca.php"><img src="/images/b_edit.png"/>Cambiar Marca</a><br />
            <a target="frameEdicion" href="borrar_Marca.php"><img src="/images/b_drop.png"/>Borrar Marca</a><br />
<hr>
            <a target="frameEdicion" href="addicionar_grupo.htm"><img src="/images/b_insrow.png"/>Addicionar Grupo</a><br />
            <a target="frameEdicion" href="cambiar_Grupo.php"><img src="/images/b_edit.png"/>Cambiar Grupo</a><br />
            <a target="frameEdicion" href="borrar_Grupo.php"><img src="/images/b_drop.png"/>Borrar Grupo</a><br />
<hr>
            <a target="frameEdicion" href="addicionar_evento.php"><img src="/images/b_insrow.png"/>Addicionar Evento</a><br />
            <a target="frameEdicion" href="cambiar_evento.php"><img src="/images/b_edit.png"/>Cambiar Evento</a><br />
            <a target="frameEdicion" href="borrar_evento.php"><img src="/images/b_drop.png"/>Borrar Evento</a><br />
<hr>
	    <a target="frameEdicion" href="addicionar_tipoarticulo.htm"><img src="/images/b_insrow.png"/>Addicionar tipo de articulo</a><br />
            <a target="frameEdicion" href="cambiar_TipoArticulo.php"><img src="/images/b_edit.png"/>Cambiar tipo de articulo</a><br />
            <a target="frameEdicion" href="borrar_TipoArticulo.php"><img src="/images/b_drop.png"/>Borrar tipo de articulo</a><br />
<hr>
	    <a target="frameEdicion" href="opciones.php"><img src="/images/b_edit.png"/>Opciones</a><br/>
        </td>
        <td colspan="7" style="background-color:#E0EEEE;
            height:370px;
            width:700px;
            text-align:top;">
            <!-- Default frame addicionar_juguete.htm -->
            <iframe frameborder="0" width="750" height="500" src="addicionar_juguete.php" name="frameEdicion"></iframe>
        </td>
    </tr>
    
    <tr style="background-color:#11A500; height:30px; font-size:0.7em; font-family:verdana,sans-serif;">
        <td>
        <a target="frameEdicion" href="lst_menus.php"><b>Listar Menu Izquierdo</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_grupos.php"><b>Listar Grupos</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_eventos.php"><b>Listar Eventos</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_marcas.php"><b>Listar Marcas</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_ultimos.php"><b>Listar ultimos Juguetes</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_juguetes.php"><b>Listar juguetes</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_juguetes_marcas.php"><b>Listar juguetes por marca</b></a>
        </td>
        <td>
        <a target="frameEdicion" href="lst_juguetes_precio.php"><b>Listar juguetes por precio</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_pedidos.php"><b>Listar Pedidos</b></a>
        </td>
	<td>
        <a target="frameEdicion" href="lst_tipoarticulo.php"><b>Listar Tipo de articulos</b></a>
        </td>
    </tr>
    <tr>
        <td colspan="10" style="background-color:#11A500;
            text-align:center;">
        Copyright © catsaarea@hotmail.com
        </td>
    </tr>
</table>
<?php
	}
    }
    else
    {
	echo "<br>No se ha logeado a este sitio";
    }
?>

</body>
</html>

