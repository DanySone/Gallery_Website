<?php

require('../classes/connect_db.php');
require('../classes/user.php');

	
$mydb = new DatabaseObj;
$mydb->connect();

$myAcc = new Member;
$myAcc->disconnectAccount();
$mydb->disconnect();
header("Location: ../index.php");
?>