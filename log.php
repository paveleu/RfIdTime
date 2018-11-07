<?php
	$dbconf = require 'dbconf.php';
	require_once 'fc.php';

if(isset($_GET['rfid'])){
	if(isset($_GET['data'])) $data = $_GET['data'];
	else $data = date("Y-m-d H:i:s");

	$pracid = getpracidfromrfid($_GET['rfid']); //test czy w pracy
	$czywpracy = czywpracy($pracid);
		echo $czywpracy[0];
		if($czywpracy[0]==2){
		 if(insertlog($pracid, 1, $data)) echo "a";
		}
		if($czywpracy[0]==1) insertlog($pracid, 2, $data);

	

}else{
	echo "false";
}