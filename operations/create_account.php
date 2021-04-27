<?php 

require('../classes/connect_db.php');
require('../classes/user.php');

$mydb = new DatabaseObj;
$mydb->connect();
$newMember = new Member;

$newMember->setLogin(htmlspecialchars($_POST['loginName']));
$newMember->setPassword($_POST['aConfirmedPassword']);
$newMember->createAccount($mydb);
$newMember->connectAccount($mydb);
$mydb->disconnect();

?>