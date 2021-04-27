<?php
require('../classes/connect_db.php');
require('../classes/user.php');
require('../classes/image.php');

$mydb = new DatabaseObj;
$mydb->connect();

$myAcc = new Member;
$myImg = new Image;


	$myAcc->setLogin($_SESSION['Login_Name']);

	if (!empty ($_FILES['img'])) {
		
		$img = $_FILES['img'];
		$ext = strtolower(substr($img['name'],-3));
		$allow_ext = array('jpg','png','gif');
		$ext2 = strtolower(substr($img['name'],-4));
		$allow_ext2 = array('jpeg');
		$img_dir = "../images/".$img['name'];

		if (in_array($ext, $allow_ext) || in_array($ext2, $allow_ext2)) {
			move_uploaded_file($img['tmp_name'], $img_dir);
		}
		else {
			echo "The file uploaded is not an image.";	
		}
	}

	$myImg->setdir(strval("../images/".$_FILES['img']['name']));
	$myImg->setDescriptionImage(htmlspecialchars($_POST['descImage']));
	$myImg->addImage($mydb, $myAcc->getId($mydb));
	$myImg->getImgDesc($mydb->getCo(),$myImg->getdirImage());
	$mydb->disconnect();

?>