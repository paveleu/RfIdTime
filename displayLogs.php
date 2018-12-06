<?php
require_once 'lib/logTimeclass.php';
require_once 'lib/Formclass.php';

$logTime = new logTime;
$form = new Form();
$logTime->getAllLogsTime();

$form->addTable();
//$form->tableLogs($logs);
$form->tableLogs(2018, 11, 31, 2018, 12, 21);
$form->endTable();