<?php
require_once 'lib/logTimeclass.php';
class Form
{

    public function _construct()
    {

    }

    public function addTable()
    {
        print('<table>');
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
        print('<td>');
        print('nazwisko imie');
        print('</td>');
        foreach ($days as $day) {
            print('<td>');
            print($day);
            print('</td>');

        }
        print('<td>');
        print('podsumowanie');
        print('</td>');
        print('</tr>');

        foreach ($allTime as $rekord) {
            $pods = 0;
            print('<tr>');
            print('<td>');
            print($rekord['dane']['nazwisko'] . ' ' . $rekord['dane']['imie']);
            print('</td>');
            foreach ($days as $day) {
                print('<td>');
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

}