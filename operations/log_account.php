<?php

require('../classes/connect_db.php');
require('../classes/user.php');

$mydb = new DatabaseObj;
$mydb->connect();

$myAcc = new Member;
$myAcc->setLogin(htmlspecialchars($_POST['name_log']));
$myAcc->setPassword($_POST['password_log']);
$myAcc->connectAccount($mydb);
$mydb->disconnect();

?>