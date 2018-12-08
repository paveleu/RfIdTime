<?php
require_once '../lib/logTimeclass.php';
class Form
{

    public function _construct()
    {

    }

    public function addTable()
    {
        print('<table class="table table-striped">');
    }

    public function endTable()
    {
        print('</table>');
    }

    public function tableLogs($startDate, $endDate)
    {
        $logTime = new logTime;
        $allTime = $logTime->getAllLogsTime($startDate, $endDate);
        $start = explode('-', $startDate);
        $end = explode('-', $endDate);
        $startDay = $this->checkMouth($start[1], $start[0], $start[2]);
        $endDay = $this->checkMouth($end[1], $end[0], $end[2]);
        $days = [];
        $t_wskaznik = strtotime($startDate);

        $t_data_koncowa = strtotime($endDate);
        while ($t_wskaznik <= $t_data_koncowa) {
            $days[] = date('Y-m-d', $t_wskaznik);
            $t_wskaznik = strtotime('+1 day', $t_wskaznik);
        }

        print('<br>');
        print('<tr>');
        print('<th>');
        print('nazwisko imie');
        print('</th>');
        foreach ($days as $day) {
            print('<th>');
            print($day);
            print('</th>');

        }
        print('<th>');
        print('podsumowanie');
        print('</th>');
        print('</tr>');

        foreach ($allTime as $rekord) {
            $pods = 0;
            print('<tr  id="prac_' . $rekord["dane"]["idprac"] . '">');
            print('<td>');
            print($rekord['dane']['nazwisko'] . ' ' . $rekord['dane']['imie']);
            print('</td>');
            foreach ($days as $day) {
                print('<td class="day" id="' . $rekord["dane"]["idprac"] . '_' . $day . '" onclick="pobierzDzien(' . $rekord["dane"]["idprac"] . ', \'' . $day . '\')">');
                if (isset($rekord['log'][$day])) {
                    $pods += $rekord['log'][$day]['diff'];
                    print($logTime->secToTime($rekord['log'][$day]['diff']));
                }
                print('</td>');
            }
            print('<td>');
            print($logTime->secToTime($pods));
            print('</td>');
            print('</tr>');
        }
    }


        private function checkMouth($month,$day, $year)
        {
            if(!checkdate($month,$day, $year)) {
                $day--;
                return $this->checkMouth($month,$day, $year);
            } else {
                return $day;
            }
        }

        public function oneDay($idprac, $day)
        {
            $logTime = new logTime;
            $times = $logTime->getOneDay($idprac, $day);
            print('<tr>');
            print('<th>');
            print('Godzina wejścia');
            print('</th>');
            print('<th>');
            print('Godzina wyjścia');
            print('</th>');
            print('<th>');
            print('Czas');
            print('</th>');
            print('</tr>');
            foreach ($times as $time){
                print('<tr>');
                print('<td>');
                print($time['data']);
                print('</td>');
                print('<td>');
                if ($time['data_wyj'] != '0000-00-00 00:00:00') {
                    print($time['data_wyj']);
                }
                print('</td>');
                print('<td>');
                print($time['czas']);
                print('</td>');
                print('</tr>');
            }
        }
}