<?php
session_start();
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 600; //czas na aktywonść przed wylogowaniem
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}

$_SESSION['LAST_ACTIVITY'] = $time;

require_once 'lib/logTimeclass.php';
require_once 'lib/loginclass.php';
require_once 'lib/fc.php';
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MTCP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" href="plugins/iCheck/all.css">
 <link rel="stylesheet" href="style.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body>
<?php
if(isset($_SESSION['nameuser']))
{
	require_once 'site/top.php';
}
require_once 'site/'.$site.'.php';

?>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="lib/js/functions.js"></script>

  </body>

</html>