<?php

//glowne funkcjie

function getpracidfromrfid($rfid){
	$dbconf = require 'dbconf.php';
	$conn = mysqli_connect($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
	if(!$conn){
    	echo ("Connection failed: " . mysqli_connect_error());
    	return false;
	}

	$sql = 'SELECT `idprac`, `cardrfid` FROM `rfid` LEFT JOIN `pracownicy` ON `pracownicy`.`rf_id` = `rfid`.`id_card` WHERE `cardrfid` = "'.$rfid.'"';
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	return $row['idprac'];
	}else{
    	return false;
	}
	mysqli_close($conn);
}


function czywpracy($pracid){
 	$dbconf = require 'dbconf.php';
	$conn = mysqli_connect($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
	if(!$conn){
   		echo ("Connection failed: " . mysqli_connect_error());
    	return false;
	}
	$sql = 'SELECT * FROM log WHERE idprac = "'.$pracid.'" ORDER BY idlog DESC LIMIT 1';
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
 		return [$row['idoper'], $row['data']];
	}else{
    	return [2];
	}
	mysqli_close($conn); 
}

function insertlog($pracid, $stan ,$data){
	$dbconf = require 'dbconf.php';
	$conn = new mysqli($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	$sql = 'INSERT INTO `log` (`idlog`, `idprac`, `data`, `idoper`) VALUES (NULL, '.$pracid.', "'.$data.'", '.$stan.')';
	if($conn->query($sql) === TRUE){
    	return true;
	}else{
    	return false;
	}
	$conn->close();
}

function controlTime ($date1, $date2)
{
	print_r('<br/>');
	print_r($date1);
	print_r('<br/>');
	print_r($date2);
	$dateTime1 = new DateTime($date1);
	$dateTime2 = new DateTime($date2);
	$interval = $dateTime1->diff($dateTime2);
	print_r('<br/>');
	var_dump($interval);
	if ($interval->y > 0) {
		$interval->m += $interval->y * 12;
		}
	if ($interval->m > 0) {
		$interval->d += $interval->m * 30;
		}
	if ($interval->d > 0) {
		$interval->h += $interval->d * 60;
		}
	$diff = $interval->h . ':' . $interval->i . ':' . $interval->s;
	print_r('<br/>');
	var_dump($diff);
	
}
