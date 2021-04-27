<?php
require('../classes/connect_db.php');
require('../classes/user.php');
require('../classes/image.php');

$mydb = new DatabaseObj;
$mydb->connect();

$myImg = new Image;

$myImg->setID($_POST['delImg']);
$myImg->getImagePath($mydb);
unlink($myImg->getdirImage());
$myImg->deleteImage($mydb);
$mydb->disconnect();
?>