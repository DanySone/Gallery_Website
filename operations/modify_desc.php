<?php
require('../classes/connect_db.php');
require('../classes/image.php');

$mydb = new DatabaseObj;
$mydb->connect();

$myImg = new Image;
$myImg->setID($_POST['id_imgmod']);
$myImg->modifyImageDescription($mydb, $_POST['mod_descImage']);
$mydb->disconnect();


?>