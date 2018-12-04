<?php
if ( isset($_POST['imie']) && isset($_POST['nazwisko']) )
{
	$name = htmlspecialchars($_POST['imie']);
	$surname = htmlspecialchars($_POST['nazwisko']);
	if (isset($_POST['rfid']))
	{
		$rfid = htmlspecialchars($_POST['rfid']);
		$dbrfid = new DB;
		$result = $dbrfid->select('SELECT rf_id FROM `pracownicy` WHERE rf_id='.$rfid);

		if (isset($result['0']['rf_id']))
			{
				$rf = 'none';
			} else $rf = $rfid;
	} else $rf = 'none';
	
	unset($dbrfid);
	
	$insert = new DB;
	$sql = 'INSERT INTO `pracownicy` (`idprac`, `nazwisko`, `imie`, `rf_id`) VALUES (NULL, "'.$name.'", "'.$surname.'", "'.$rf.'")';
	if($insert->insert($sql)) echo 'ok';
	else echo "nie ok";
}

?>

<form action="?s=addworker" method="post">
	Imie:<input name="imie" /><br />
	Nazwisko:<input name="nazwisko" /><br />
	Nr identyfikacyjny karty:<input name="rfid" /><br />
	<input type="submit" value="wyślij" />
</form>