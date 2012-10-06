<html>
<body>

<?php

include("configuracion.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = addslashes($_POST['username_juguete']);
    $password = addslashes($_POST['password_juguete']);
    
    $sqlQuery = "select * from users where username = '$username' and password = '$password'";
    $result = mysql_query( $sqlQuery);
    
    if($result == 0)
    {
        echo "Usuario no autorizado <br />";
        echo "usuario: '".$username."'<br />";
        echo "password: '".$password."'<br />";
	session_start();
	$_SESSION['berthalogin'] = '';
    }
    else
    {
	session_start();
	$_SESSION['berthalogin'] = "1";
    	header("Location: mainAdmin.php");
    	exit;
    }
}
?>
<br />
<a href="adminLogin.htm"> Volver a intentar</a>
</body>
</html>
