<?php
session_start();
require_once 'lib/logTimeclass.php';
require_once 'lib/loginclass.php';

if(isset($_POST['login']) && isset($_POST['pass']))
{
	$login = new LOGIN;
	$logg = htmlspecialchars($_POST['login']);
	$pass = htmlspecialchars($_POST['pass']);
	$login->conect($logg, $pass);
}

if(isset($_SESSION['nameuser']))
{
	if(isset($_GET['s']))
	{
		if($_GET['s']=="logout")
		{ 
			unset($_SESSION['nameuser']);
			unset($_SESSION['iduser']);
		}
	}
	if(isset($_GET['s']))
	{
		$site = $_GET['s'];
	}else
	{
		$site = 'main';
	}	
} else {
	$site = 'login';	
}

if(!isset($_SESSION['nameuser']))
{
$site = 'login';
}
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
     <meta charset="utf-8">
     <title>AccessCtr</title>

     <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
     <link rel="stylesheet" href="site/style.css">

  </head>
  <body>
<?php
if(isset($_SESSION['nameuser']))
{
require_once 'site/top.php';
}
require_once 'site/'.$site.'.php';

?>
  </body>

</html>