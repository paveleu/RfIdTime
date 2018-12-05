<?php
require_once 'lib/logTimeclass.php';
$logTime = new logTime;
if(isset($_GET['rfid'])){
	if(isset($_GET['data'])) {
		$data = $_GET['data'];
	} else {
		$data = date("Y-m-d H:i:s");
	}
	$pracid = $logTime->getpracidfromrfid($_GET['rfid']); //test czy w pracy
	$czywpracy = $logTime->czywpracy($pracid);
	echo $czywpracy[0];
	if($czywpracy[0]==2) $logTime->insertlog($pracid, $data);
	if($czywpracy[0]==1)
	{
		$czas = controlTime($data,$czywpracy[1]);
		$logTime->updatelog( $czywpracy[2],czas($czas));
	}
}else{
	echo "false";
}
