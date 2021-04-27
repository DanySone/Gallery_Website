<?php

require('../classes/connect_db.php');
require('../classes/user.php');
require('../classes/image.php');

$mydb = new DatabaseObj;
$mydb->connect();

$myAcc = new Member;

$myAcc->setLogin($_SESSION['Login_Name']);
$myAcc->getId($mydb);

$myImg = new Image;
$myImg->delAllImgFromFolder($mydb,$myAcc->getId($mydb));
$myAcc->deleteAccount($mydb);
$mydb->disconnect();



?>