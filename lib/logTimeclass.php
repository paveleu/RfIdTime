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
		$sql = 'SELECT `idprac` FROM `pracownicy` WHERE `rf_id` = "'.$rfid.'"';
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

    public function controlTime ($date1, $date2)
    {
        $dateTime1 = new DateTime($date1);
        $dateTime2 = new DateTime($date2);
        $interval = $dateTime1->diff($dateTime2);
        if ($interval->d > 0) {
            $interval->h += $interval->d * 60;
        }
        $diff = $interval->h . ':' . $interval->i . ':' . $interval->s;
        if($interval->h > 15) {
            return array('timeDiff' => $diff, 'overNight' => true);
        } else {
            return array('timeDiff' => $diff, 'overNight' => false);
        }
    }
}