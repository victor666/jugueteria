<?php
$array = array(	'a'=>'One', 'b'=>'Two', 'c'=>'three' );
$json1 = json_encode($array);
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
$json2 = json_encode($arr);
$strq = "sdsdsds"; 

function getJson($array)
{
	$str = "";
	$tam = strlen($array);
	echo gettype($array);
	for($i=0;$i<$tam;$i++)
	{
		$str = $str.$array[$i];
	}
	//echo $str;
echo gettype($str);
	return $str;
}

?>
<html>
<head>
<title> JSON with Realin</title>

<script type="text/javascript">
function parseMe()
{
	var json=document.getElementById("json_text").value;
alert(json); 
	//var obj=eval('('+json+')');
	document.createElement("ul");
	for(val in obj)
	{
		alert(obj[val]);
	}
}
</script>
</head>
<body>
 
<form>
<?php echo $json2; ?><br>
<input type="text" id="json_text" maxlength="15" size="15" value="<?=getJson($json2); ?>" />
<input type='button' value="parse" onclick="parseMe();" />
</form>
</body>
</html>

