<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pawel/lib/Formclass.php';

$form = new Form();
if ($_POST['action'] == 'all') {
    $form->addTable();
    $form->tableLogs($_POST['startDate'], $_POST['endDate']);
    $form->endTable();
} else if ($_POST['action'] == 'oneday') {
    $form->addTable();
    $form->oneDay($_POST['idprac'], $_POST['date']);
    $form->endTable();

}