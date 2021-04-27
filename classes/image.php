<?php


class Image {

	private $image_id;
	private $image_desc;
	private $image_dir;

	
	function __construct() {
		$this->image_id = "";
		$this->image_desc="";
		$this->image_dir="";


	}

	function setID(int $myID) {
		$this->image_id = $myID;
	}
	function setdir(string $myurl) {
		$this->image_dir = $myurl;
	}

	function setDescriptionImage(string $mydescription) {
		$this->image_desc = $mydescription;
	}

	function getDescriptionImage() {
		return $this->image_desc;
	}

	function getdirImage() {
		return $this->image_dir;
	}

	function delAllImgFromFolder($mydb, $user_id) {
		$mydb->connect();
		$request = "SELECT Image_URL FROM image_table WHERE User_ID = '$user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		if (mysqli_num_rows($exec))
		{
			while ($row = mysqli_fetch_assoc($exec))
			{
				$unlink = unlink($row['Image_URL']);
			}
		}
		$request2 = "DELETE FROM image_table WHERE User_ID = '$user_id' ";
		$exec2 = mysqli_query($mydb->getCo(), $request2);
	}
		
	function getImgDesc($mydb, $img_url) {
		$mydb = new DatabaseObj;
		$mydb->connect();
		$request = "SELECT * FROM image_table WHERE Image_URL= '$img_url' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		$result = mysqli_fetch_row($exec);
		$this->image_desc = $result[1];

		return $this->image_desc;
	}

	function getImgURL($mydb, $user_id) {
		$mydb->connect();
		$request = "SELECT * FROM image_table WHERE User_ID = '$user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		$result = mysqli_fetch_row($exec);
		$this->image_url = $result[2];

		return $this->image_url;
	}

	function deleteImageUserID($mydb, $user_id) {
		$mydb->connect();
		$request = "DELETE FROM image_table WHERE User_ID = '$user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
	}

	function addImage($mydb, $user_id) {
		$mydb->connect();
		$request = "INSERT INTO image_table(Image_description, Image_URL, User_ID) VALUES ('$this->image_desc', '$this->image_dir', '$user_id') ";
		$exec = mysqli_query($mydb->getCo(), $request);
		echo "<script>alert('Image added to the gallery successfully!');window.location.href='home.php';</script>";
	}

	function displayImage($mydb, $user_id) {
		$mydb->connect();
		$request = "SELECT * FROM image_table(Image_ID, Image_description, Image_URL, User_ID) WHERE User_ID = '$user_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);

	}

	function getImagePath($mydb) {
		$mydb->connect();
		$request = "SELECT * FROM image_table WHERE Image_ID = '$this->image_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		$result = mysqli_fetch_row($exec);
		$this->image_dir = $result[2];

		return $this->image_dir;

	}

	function deleteImage($mydb) {
		$mydb->connect();
		$request = "DELETE FROM image_table WHERE Image_ID = '$this->image_id' ";
		$exec = mysqli_query($mydb->getCo(), $request);
		header("Location: home.php");
	}

	function modifyImageDescription($mydb, $new_desc) {
		$mydb->connect();
		$request = "UPDATE image_table SET Image_description = '$new_desc' WHERE Image_ID = $this->image_id";
		$exec = mysqli_query($mydb->getCo(), $request);
		echo "<script>alert('Image description changed successfully!');window.location.href='home.php';</script>";
	}

	function searchImg($mydb, $keyword1) {
		$mydb->connect();
		$request = "SELECT *  FROM image_table, user_table WHERE image_table.User_ID = user_table.User ID AND (image_table.Image_description LIKE '%$keyword1%' OR user_table.Login_Name LIKE '%$keyword1%'";
		$exec = mysqli_query($mydb->getCo(), $request);
		header("Location: home.php");
	}
}
?>