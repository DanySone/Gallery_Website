<?php
require_once('../classes/connect_db.php');

?>
<!DOCTYPE html>

<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name=viewport content="width=device-width, initial-scale=1">
    	<title>Simpic - Gallery</title>
    	<link rel="icon" type="image/PNG" href="images/icon/title_icon.PNG">
    	<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    	<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<style>
			.myfooter {
			    margin: 0 auto;
			    width: auto;
				position: absolute;
				bottom: 0;
				text-align: center;
        	}
			.img {
			    display: inline-block;
    			margin-right:5px;
    			border:1px solid #ccc;
			}
    		@font-face
			{
			    font-family: CaviarDreams;
			    src: url(../font/CaviarDreams.ttf);
			}

			.logosite {
				font-family: CaviarDreams;
			}
		</style>
	</head>

	<body style="background-color: #f7f7f7;">
		<header id="header">
			<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
	  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>
	  			<a class="navbar-brand logosite" href="../index.php"><h3>.Simpic</h3></a>
	  			 <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
	    			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      				<li class="nav-item active">
	        				<a class="nav-link" href="#"></a>
	        			</li>
	        		</ul>
	        		<form action="log_account.php" class="form-inline my-2 my-lg-0" method="post">
	      				<input class="form-control mr-sm-2" type="text" name="name_log" placeholder="Username" required>
	      				<input class="form-control mr-sm-2" type="password" name="password_log" placeholder="Password" required>
	        			<button class="btn btn-outline-success my-2 my-sm-0" name="confirm" type="submit">Log in</button>
	    			</form>
	        	</div>
	  		</nav>
  		</header>
  		
  		<div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
					<?php
						$image_extensions = array("png","jpg","gif","jpeg","PNG","JPG","GIF");
						$dir = "../images/"; 
						if(is_dir($dir)) {
							if ($dh = opendir($dir)) {
								$count = 1;
								$mydb = new DatabaseObj;
								$mydb->connect();
								while (($file = readdir($dh)) !== false) {
									if ($file != '' && $file != '.' && $file != '..') {
										$image_path = "../images/".$file;
										$request = "SELECT * FROM image_table WHERE Image_URL= '$image_path' ";
										$exec = mysqli_query($mydb->getCo(), $request);
										$result = mysqli_fetch_row($exec);
										$image_desc = $result[1];
										$image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
										if(!is_dir($image_path) && in_array($image_ext,$image_extensions)) {
										?>
											
											<a class="img" data-fancybox="gallery" data-caption="<?php echo $image_desc; ?>" href="<?php echo $image_path; ?>">
											<img src="<?php echo $image_path; ?>" width="200" alt="" title=""/>
											</a>
											
											<?php
											
											if( $count%4 == 0){
											?>
												<div class="clear"></div>
												<?php 
											}
												$count++;
										}
									}
								}
								closedir($dh);
							}
						}
					?>

		</div>
		<div class="myfooter">
			<div class="container fixed-bottom mb-2">
				<hr>
    			<small>Copyright &copy; Simpic - Dany Sonethavy - 2020</small>
    		</div>
    	</div>
		<script src="../scripts/bootstrap.js"></script>
		<script src="../scripts/main.js"></script>

   </body>
</html>