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

    public function tableLogs($startYear, $startMouth, $startday, $endYear, $endMouth, $endday)
    {
        $logTime = new logTime;
        $allTime = $logTime->getAllLogsTime();

        $startDay = $this->checkMouth($startMouth, $startday, $startYear);
        $endDay = $this->checkMouth($endMouth, $endday, $endYear);
        $days = [];
        $t_wskaznik = strtotime($startYear . '-' . $startMouth . '-' . $startDay);

        $t_data_koncowa = strtotime($endYear . '-' . $endMouth . '-' . $endDay);
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
                    $pods += $rekord['log'][$day]['diff'];;
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