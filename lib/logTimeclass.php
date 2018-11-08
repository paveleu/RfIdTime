<?php
require_once 'DBclass.php';
class logTime
{

	private $db;
	
	public function __construct()
	{
		$this->db = new DB();	
	}

	public function getpracidfromrfid($rfid)
	{
		$sql = 'SELECT `idprac`, `cardrfid` FROM `rfid` LEFT JOIN `pracownicy` ON `pracownicy`.`rf_id` = `rfid`.`id_card` WHERE `cardrfid` = "'.$rfid.'"';
		$row = $this->db->getRekord($sql);
		if (!empty($row)) {
 			return $row['idprac'];
		}else{
    		return 0;
		}
	}

	public function czywpracy($pracid){
		$sql = 'SELECT * FROM log WHERE idprac = "'.$pracid.'" ORDER BY idlog DESC LIMIT 1';
		$row = $this->db->getRekord($sql);
		if (!empty($row) > 0) {
 			return [$row['idoper'], $row['data']];
		}else{
    		return [2];
		}
	}
	
	public function insertlog($pracid, $stan ,$data){
		$sql = 'INSERT INTO `log` (`idlog`, `idprac`, `data`, `idoper`) VALUES (NULL, '.$pracid.', "'.$data.'", '.$stan.')';
		return $this->db->insert($sql);
	}
}