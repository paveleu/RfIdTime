<?php
	$dbconf = require 'dbconf.php';
	require_once 'fc.php';

if(isset($_GET['rfid'])){
	
	$pracid = getpracidfromrfid($_GET['rfid']); //test czy w pracy
	$czywpracy = czywpracy($pracid);
	if($czywpracy == 9){
		echo $czywpracy;
	}else{
		echo $czywpracy;
	}
	

}else{
	echo "false";
}