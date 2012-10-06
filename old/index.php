<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Jugueteria Bertha</title>

<style>
td{font-family:arial;font-size:10px;color:99A7BB}
A {
text-decoration: underline;
color:32679C;
font-size: 10px; font-family: arial;
}
a:visited{color:32679C}
a:hover{color:red}
a.white{color:ffffff}
a.white:visited{color:ffffff}
a.footer{color:000000;font-size:11px}
a.footer:visited{color:000000}
.bold{font:900}
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function actualizarBusqueda()
{
	keyValue = document.getElementById("jugueteParam").value;
	window.open("/buscarJuguete.php?tipo=1&key="+keyValue,"listado");
}

function MM_swapImgRestore() { //v3.0
var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_findObj(n, d) { //v4.01
var p,i,x; if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head><body leftmargin="0" topmargin="0" onload="MM_preloadImages('images/b1r.jpg','images/b2r.jpg','images/b3r.jpg','images/b4r.jpg','images/b5r.jpg','images/b6r.jpg')" marginheight="0" marginwidth="0">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<table border="0" cellpadding="0" cellspacing="0" height="100%">
<tbody>
<tr>
<td background="images/bg.jpg" width="50%"></td>
<td style="padding-left: 28px;" background="images/bg_lft.jpg" valign="top" width="28"></td>
<td bgcolor="#ffffff" height="100%" valign="top">
<table border="0" cellpadding="0" cellspacing="0" height="100%">
<tbody>
<tr>
<td colspan="2"><img src="images/top.jpg" alt="" border="0" height="24" width="770"></td>
</tr>
<tr>
<td colspan="2"><img src="images/slogan.jpg" alt="" border="0" height="201" width="402"><img src="images/slogan2.jpg" alt="" border="0" height="201" width="368"></td>
</tr>
<tr>
<td colspan="2"><a href="misPedidos.php" target="listado" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/b1r.jpg',1)"><img src="images/b1.jpg" name="Image4" border="0" height="44" width="130"></a><a href="club.php" target="listado" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/b2r.jpg',1)"><img src="images/b2.jpg" name="Image5" border="0" height="44" width="138"></a><a href="ListarEventos.php" target="listado" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/b3r.jpg',1)"><img src="images/b3.jpg" name="Image6" border="0" height="44" width="134"></a><a href="listado.php" target="listado" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b4r.jpg',1)"><img src="images/b4.jpg" name="Image7" border="0" height="44" width="120"></a><a href="ubicacion.htm" target="listado" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/b5r.jpg',1)"><img src="images/b5.jpg" name="Image8" border="0" height="44" width="123"></a>
    <a href="adminLogin.htm" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/b6r.jpg',1)" onClick="window.open(this.href, '_blank', 'location=no, directories=no, status=no, menubar=no, toolbar=no, width=400, height=200'); return false;"><img src="images/b6.jpg" name="Image9" border="0" height="44" width="125"></a></td>
</tr>
<tr>
<td colspan="2"><img src="images/shadow.jpg" alt="" border="0" height="27" width="770"></td>
</tr>
<tr>
<td height="100%" valign="top">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td><img src="images/win1_top.jpg" alt="" border="0" height="35" width="230"></td>
</tr>
<tr><td style="padding-left: 50px;" background="images/win1_back.jpg">
<?php

include("configuracion.php");
$sqlQuery = "select idMenu, title,idGrupo from menu";
$result = mysql_query( $sqlQuery);
if( $result == 0)
{
    echo "Hubo un error en la BD o no existen menus.";
    exit;
}
else
{
    while( $row = mysql_fetch_array($result))
    {
	echo "<img src='images/small.gif' alt='' border='0' height='12' width='14'>&nbsp;&nbsp;<a target='listado' href='ListadoSeries.php?grupoid=".$row[2]."'>".$row[1]."</a><br>";
    }
}
?>
</td></tr>
<tr>
<td valign="top"><img src="images/win1_bottom.jpg" alt="" border="0" height="19" width="230"></td>
</tr>
</tbody>
</table>
</td>
<td height="100%" width="100%" valign="top">
<iframe frameborder="0" height="100%" width="550" src="listado.php" name="listado"></iframe>
</td>
</tr>
<tr>
<td colspan="2" background="images/footer1.jpg" height="62">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="padding-left: 30px;"><a href="misPedidos.php" target="listado" class="footer">Pedido de articulo</a>&nbsp;&nbsp;<img src="images/small2.gif" alt="" border="0" height="15" width="12">&nbsp;&nbsp;&nbsp;<a href="club.php" target="listado" class="footer">Forum</a>&nbsp;&nbsp;<img src="images/small2.gif" alt="" border="0" height="15" width="12">&nbsp;&nbsp;&nbsp;<a href="ListarEventos.php" target="listado" class="footer">Eventos</a>&nbsp;&nbsp;<img src="images/small2.gif" alt="" border="0" height="15" width="12">&nbsp;&nbsp;&nbsp;<a href="ubicacion.htm" target="listado" class="footer">Ubicacion</a>&nbsp;&nbsp;<img src="images/small2.gif" alt="" border="0" height="15" width="12">
</td>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="padding-left: 60px;"><img src="images/car_search.jpg" alt="" border="0" height="62" width="94"></td>
<td style="padding-left: 10px;"><input name="jugueteParam" id="jugueteParam" size="15" maxlength="40" type="text"></td>
<td style="padding-left: 10px;"><a name='buscarAjax' id='buscarAjax' target='listado'><img src='images/go_but.gif' alt='' border='0' height='11' width='14' onClick='actualizarBusqueda();'></a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td><img src="images/name_footer.jpg" alt="" border="0" height="94" width="230"></td>
<td style="color: rgb(255, 255, 255); text-decoration: underline; padding-right: 20px;" align="right" background="images/footer2.jpg">
<div class="fb-like" data-href="http://collections.testbiz.webege.com/" data-send="true" data-width="318" data-show-faces="true" data-colorscheme="dark" data-font="arial"></div><br>
<a href="#" class="white">Developed by CatsArea</a><br>
<a href="emailto:catsarea@hotmail.com">catsarea@hotmail.com</a><br>
Cochabamba Bolivia 2012<br></td>
</tr>
</tbody>
</table>
</td>
<td background="images/bg_lft.gif" width="50%"></td>
</tr>
</tbody>
</table>
</body>
</html>
