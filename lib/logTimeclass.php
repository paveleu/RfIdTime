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
            return [$row['idoper'], $row['data'], $row['idlog']];
        }else{
            return [2];
        }
    }

    public function insertlog($pracid, $stan ,$data, $datawey = '', $idwey = 0){
        if (!empty($datawey)) {
            $diff = $this->controlTime($datawey, $data);
            $sql = 'UPDATE log SET logTime="' . $diff . '" WHERE idlog='. $idwey;
            $this->db->insert($sql);
        }
        $sql = 'INSERT INTO `log` (`idlog`, `idprac`, `data`, `idoper` ) VALUES (NULL, '.$pracid.', "'.$data.'", '.$stan.')';
        $this->db->insert($sql);

    }

    public function controlTime ($date1, $date2)
    {
        $dateTime1 = new DateTime($date1);
        $dateTime2 = new DateTime($date2);
        $interval = $dateTime1->diff($dateTime2);
        if ($interval->d > 0) {
            $interval->h += $interval->d * 60;
        }
        $diff = $interval->h*360 + $interval->i*60 + $interval->s;
        return $diff;
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

    public function getAllLogsTime()
    {
        $sql = 'SELECT pracownicy.idprac, nazwisko, imie, data, idoper, logTime FROM pracownicy left join log on pracownicy.idprac = log.idprac';
        $rows = $this->db->select($sql);
        $tab = [];
        foreach ($rows as $row){
            $tab[$row['idprac']]['dane']['nazwisko'] = $row['nazwisko'];
            $tab[$row['idprac']]['dane']['imie'] = $row['imie'];
            $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]][]['data'] = $row['data'];
            $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]][]['operacja'] = $row['idoper'];
            if (!empty($tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'])) {
                $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'] += (int)$row['logTime'];
            } else {
                $tab[$row['idprac']]['log'][explode(' ', $row['data'])[0]]['diff'] = (int)$row['logTime'];
            }
        }
        return $tab;
    }

    public function secToTime( $sekundy ){
        $czas = round($sekundy);
        return sprintf('%02d:%02d:%02d', ($czas/3600),($czas/60%60), $czas%60);
    }
}