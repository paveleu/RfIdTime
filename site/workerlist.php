<?php

$workers = new DB;
$row = $workers->select('SELECT * FROM pracownicy');
echo('<div id="workers">');
foreach($row as $line)
{

	print('<div class="row_worker ">'.$line['nazwisko'].$line['imie'].$line['rf_id'].'<a href="?s=workeredit&id='.$line['idprac'].'">  Edytuj  </a> </div>');
}
echo('</div>');