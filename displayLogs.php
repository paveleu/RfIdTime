<?php
require_once 'lib/logTimeclass.php';
require_once 'lib/Formclass.php';

$form = new Form();

$form->addTable();
//$form->tableLogs($logs);
$form->tableLogs('2018-11-31', '2018-12-21');
$form->endTable();