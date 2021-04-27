<?php
require('../classes/connect_db.php');
require('../classes/user.php');

$mydb = new DatabaseObj;
$mydb->connect();
$myAcc = new Member;

$myAcc->setLogin($_SESSION['Login_Name']);
$myAcc->getId($mydb);


if (isset($_POST['newloginName'])) {
	$myAcc->modifyUsername($mydb, $_POST['newloginName']);
}
if (isset($_POST['newPassword'])) {
	$myAcc->modifyPassword($mydb, $_POST['newPassword']);
}

$mydb->disconnect();
?>