<?php
session_start();

class Member
{

	private $user_id;
	private $user_name;
	private $user_password;


	function __construct() {
		$this->user_id = "";
		$this->user_name = "";
		$this->user_password = "";

	}

	function setLogin(string $login) {
		$this->user_name = $login;

	}

	function getId($mydb) {
		$mydb->connect();
		$request = "SELECT * FROM user_table WHERE Login_Name='$this->user_name' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		$result = mysqli_fetch_row($exec);
		$this->user_id = $result[0];

		return $this->user_id;
	}
	
	function setPassword(string $password) {
		$this->user_password = $password;

	}

	function createAccount($mydb) {
		$mydb->connect();

		if (!$exec = mysqli_query($mydb->getCo(), "SELECT * FROM user_table WHERE Login_Name='$this->user_name'")) {
            printf("Error: %s\n", mysqli_error($mydb->getCo()));
            exit;
        }
        $rows = mysqli_num_rows($exec);

		if($rows == 1){
			echo "<script>alert('Username already used');window.location.href='../index.php';</script>";
		} else {
			$request = "INSERT INTO user_table(User_ID, Login_Name, Login_Password) VALUES (0, '$this->user_name', '$this->user_password')";
			$exec = mysqli_query($mydb->getCo(), $request);

		}
	}

	function connectAccount($mydb) {
		$mydb->connect();
		$request = "SELECT * FROM user_table WHERE Login_Name='$this->user_name' and Login_Password= '$this->user_password' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		$result = mysqli_num_rows($exec);

		if($result == 1){
      		$_SESSION['Login_Name'] = $this->user_name;
      		echo "<script>alert('Connection successful!');window.location.href='home.php';</script>";
	    	header("Location: home.php");
  		} else {
    		echo "<script>alert('The username or the password is invalid.');window.location.href='../index.php';</script>";

    		exit();
  		}

  	}

	function disconnectAccount() {
		session_unset();
		session_destroy();
	}

	function deleteAccount($mydb) {
		$mydb->connect();
		$request = "DELETE FROM user_table WHERE User_ID = '$this->user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
	    header("Location: index.php");
	}

	function modifyUsername($mydb, string $username) {
		$mydb->connect();
		$request = "UPDATE user_table SET Login_Name = '$username' WHERE User_ID = '$this->user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		$_SESSION['Login_Name'] = $username;
		header("Location: home.php");
	}

	function modifyPassword($mydb, string $password) {
		$mydb->connect();
		$request = "UPDATE user_table SET Login_Password ='$password' WHERE User_ID = '$this->user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		header("Location: home.php");
	}
}

?>