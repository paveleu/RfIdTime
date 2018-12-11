<?php
function ile($tab, $where)
{
	$sql = 'SELECT COUNT(*) AS "a" FROM '.$tab;

	if(!empty($where))
		if($where!=="")
		{
			$sql = $sql." WHERE ".$where;
		}

	$con = new DB;
	$res = $con->getRekord($sql);
	return $res['a'];
	

}

function obecni()
{
	$sql = 'SELECT `log`.`data` AS `data`, `pracownicy`.`nazwisko` AS `nazwisko`, `pracownicy`.`imie` AS `imie` FROM `pracownicy` LEFT JOIN `log` ON `log`.`idprac` = `pracownicy`.`idprac` WHERE `data_wyj`="0000-00-00 00:00:00"';

	$con = new DB;
	$res = $con->select($sql);
	return $res;
	

}


function last15()
{
	$sql = 'SELECT `log`.`idlog` AS `idlog`, `log`.`data` AS `data`, `log`.`idoper` AS `idoper`, `pracownicy`.`imie` AS `imie`, `pracownicy`.`nazwisko` AS `nazwisko`, `log`.`data_wyj` AS `data_wyj`, `log`.`czas` AS `czas` FROM `log` LEFT JOIN `pracownicy` ON `log`.`idprac` = `pracownicy`.`idprac` WHERE ((`log`.`data` !=0) AND (`log`.`idoper` =1) AND (`log`.`data_wyj` !="0000-00-00 00:00:00")) LIMIT 15';

	$con = new DB;
	$res = $con->select($sql);
	return $res;
	

}

function first($pracid)
{
	$sql = 'SELECT data FROM log WHERE idprac = "'.$pracid.'" ORDER BY idlog ASC LIMIT 1';
	$con = new DB;
	$res = $con->select($sql);
	if(isset($res['0']['data'])){
	$out = explode(" ", $res['0']['data']);
	return $out['0'];
	} else return '-';

}
