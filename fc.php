<?php

//glowne funkcjie

function getpracidfromrfid($rfid){

// SELECT `idprac`, `cardrfid` FROM `rfid` LEFT JOIN `pracownicy` ON `pracownicy`.`rf_id` = `rfid`.`id_card` WHERE `cardrfid` = "xxxx" - xxx to rfid karty

$dbconf = require 'dbconf.php';

$conn = mysqli_connect($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
if (!$conn) {
    echo ("Connection failed: " . mysqli_connect_error());
    return false;
}

$sql = 'SELECT `idprac`, `cardrfid` FROM `rfid` LEFT JOIN `pracownicy` ON `pracownicy`.`rf_id` = `rfid`.`id_card` WHERE `cardrfid` = "'.$rfid.'"';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
 return $row['idprac'];

} else {
    return false;
}

mysqli_close($conn);



}


function czywpracy($pracid){

 	$dbconf = require 'dbconf.php';

$conn = mysqli_connect($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
if (!$conn) {
    echo ("Connection failed: " . mysqli_connect_error());
    return false;
}

$sql = 'SELECT * FROM log WHERE idprac = "'.$pracid.'" ORDER BY idlog DESC LIMIT 1';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
 return [$row['idoper'], $row['data']];

} else {
    return 1;
}

mysqli_close($conn);



 
}

// SELECT * FROM log WHERE idprac = "2" ORDER BY idlog DESC LIMIT 1 - czy w pracy