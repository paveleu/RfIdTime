Edycja pracownika</br>

<?php

$id = htmlspecialchars($_GET['id']);

if ( isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['rfid']) )
{
	$name = htmlspecialchars($_POST['imie']);
	$surname = htmlspecialchars($_POST['nazwisko']);
	$rfid = htmlspecialchars($_POST['rfid']);
	
	
	$update = new DB;
	$sql = 'UPDATE `pracownicy` SET `nazwisko`="'.$surname.'",`imie`="'.$name.'",`rf_id`="'.$rfid.'" WHERE `idprac`="'.$id.'"';
	if($update->update($sql)) echo 'ok';
	else echo "nie ok";
}






$worker = new DB;
$row = $worker->getRekord('SELECT * FROM pracownicy WHERE idprac="'.$id.'"');

?>

<form action="?s=workeredit&id=<?= $id?>" method="post">
	Imie:<input name="imie" value="<?= $row['imie']?>" /><br />
	Nazwisko:<input name="nazwisko" value="<?= $row['nazwisko']?>" /><br />
	Nr identyfikacyjny karty:<input name="rfid" value="<?= $row['rf_id']?>" /><br />
	<input type="submit" value="wyślij" />
</form>