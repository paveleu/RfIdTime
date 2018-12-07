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
			if($row["data_wyj"]=="0000-00-00 00:00:00")
			{
				return [1 , $row["data"], $row["idlog"]];
			} else return [2];
		}else{
    		return [2];
		}
	}
	
	public function insertlog($pracid ,$data){
		$sql = 'INSERT INTO `log` (`idlog`, `idprac`, `data`, `idoper`) VALUES (NULL, '.$pracid.', "'.$data.'", "1")';
		return $this->db->insert($sql);
	}

	public function updatelog($idlog ,$data){
		$sql = 'UPDATE `log` SET `czas` = "'.$data.'" WHERE `log`.`idlog` = '.$idlog;
		return $this->db->insert($sql);
	}	
	

	
	public function lastInTime ()
    {
		$sql = 'SELECT * FROM log ORDER BY idlog DESC LIMIT 1';
		$row = $this->db->getRekord($sql);
		if (!empty($row)) {
 			return $row['data'];
		}else{
    		return 'false';
		}
    }

    public function getAllLogsTime($startDate, $endDate)
    {
        $sql = 'SELECT pracownicy.idprac, nazwisko, imie, data, czas FROM pracownicy LEFT JOIN log ON pracownicy.idprac=log.idprac WHERE data >= "' . $startDate . '" AND data <= "' . $endDate . '"';
        $rows = $this->db->select($sql);
        $tab = [];
        foreach ($rows as $row){
            $tab[$row['idprac']]['dane']['nazwisko'] = $row['nazwisko'];
            $tab[$row['idprac']]['dane']['imie'] = $row['imie'];
            $tab[$row['idprac']]['dane']['idprac'] = $row['idprac'];
            if (!empty($row['czas'])) {
                if (!empty($tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'])) {
                    $temp = $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'];
                    $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'] += $this->timeToSec($row['czas']);
                } else {
                    $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'] = $this->timeToSec($row['czas']);
                }
            }
        }
        return $tab;
    }

    public function timeToSec($time)
    {
        $time = explode(":", $time);
        return $time[0]*3600+$time[1]*60+$time[2];
    }

    public function secToTime($sekundy)
    {
        $czas = round($sekundy);
        return sprintf('%02d:%02d:%02d', ($czas/3600),($czas/60%60), $czas%60);
    }

}

    function controlTime ($date1, $date2)
    {
        $ts = strtotime($date1) - strtotime($date2);
        return $ts;
    }
	
	function samptodate ($ts)
    {
		$date = new DateTime("@$ts");
		return $date->format('Y-m-d H:i:s');

    }

	function czas ($ts)
    {
		$date = new DateTime("@$ts");
		return $date->format('H:i:s');

    }

