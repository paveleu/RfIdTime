<?php
	$dbconf = require 'dbconf.php';
	require_once 'fc.php';

if(isset($_GET['rfid'])){
	
	$pracid = getpracidfromrfid($_GET['rfid']); //test czy w pracy
	$czywpracy = czywpracy($pracid);
		echo $czywpracy[0];


	

}else{
	echo "false";
}