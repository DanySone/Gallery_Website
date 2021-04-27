<!DOCTYPE html>

<?php
require_once('classes/connect_db.php');

$mydb = new DatabaseObj;
$mydb->connect();
?>

<html lang="en">

   	<head>
    	<meta charset="utf-8">
    	<meta name=viewport content="width=device-width, initial-scale=1">
    	<title>Simpic - Login</title>
    	<link rel="icon" type="image/PNG" href="images/icon/title_icon.PNG">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    	<link rel="stylesheet" href="css/bootstrap.min.css">
    	<link rel="stylesheet" href="css/style.css">
    	<style>
    		.myfooter {
			    margin: 0 auto;
			    width: auto;
				position: absolute;
				bottom: 0;
				text-align: center;
        	}

    		@font-face
			{
			    font-family: CaviarDreams;
			    src: url(font/CaviarDreams.ttf);
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
	  			<a class="navbar-brand logosite" href="#"><h3>.Simpic</h3></a>
	  			 <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
	    			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      				<li class="nav-item active">
	        				<a class="nav-link" href="operations/galleries.php">Access to galleries >>></a>
	        			</li>
	        		</ul>
	        		<form action="operations/log_account.php" class="form-inline my-2 my-lg-0" method="post">
	      				<input class="form-control mr-sm-2" type="text" name="name_log" placeholder="Username" required>
	      				<input class="form-control mr-sm-2" type="password" name="password_log" placeholder="Password" required>
	        			<button class="btn btn-outline-success my-2 my-sm-0" name="confirm" type="submit">Log in</button>
	    			</form>
	        	</div>
	  		</nav>
  		</header>
  		<div class="container-fluid row" >
  			<div class="container-fluid">
  				<div class="row">
					<div id="myCarousel" class="carousel slide col-md-8 ml-2 mt-4" data-ride="carousel">
					  	<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
					  	</ol>

					  	<div class="carousel-inner rounded">
							<div class="carousel-item active">
								<img class="d-block w-100 rounded" src="images/home_images/Blonde-girl-look-back-smile-hat-sunflowers-summer_1920x1080.jpg" alt="blondegirl">
								<div class="carousel-caption d-none d-md-block">
		    						<h3>Create your own original gallery</h3>
		   							<p>This new website has been created to make you able to manage your photos of your life.</p>
		  						</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 rounded" src="images/home_images/millenials-smiling.jpg" alt="millenialssmiling">
								<div class="carousel-caption d-none d-md-block">
		    						<h3>Share your galleries to your friends</h3>
		   							<p>See what the other members post on their gallery.</p>
		  						</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 rounded" src="images/home_images/Pumpkin_Fingers_Blonde_girl_Smile_Joy_534345_1920x1080.jpg" alt="pumpkinblonde">
								<div class="carousel-caption d-none d-md-block">
									<h3>Create your account now for free</h3>
		   							<p>Just fill the member form on the right and start this new experience!</p>
		   						</div>
							</div>
					  	</div>

						<a href="#myCarousel" class="carousel-control-prev"  role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a href="#myCarousel" class="carousel-control-next"  role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
				</div>

				<div class="col-md-2 ml-4 mt-5 ">
					<form action="operations/create_account.php" method="post">
						<fieldset>
							<legend>Create an account</legend>
								<div class="form-group">
									<label for="mylogin">Login Name</label>
									<input class="form-control mr-sm-2" id="mylogin" type="text" name="loginName" placeholder="Login name" required>
								</div>
								<div class="form-group">
									<label for="aPassword">Password</label>
	      							<input class="form-control mr-sm-2" type="password" id="aPassword" name="aPassword" placeholder="Enter Password" required>
	      						</div>
	      						<div class="form-group">
	      							<label for="aConfirmedPassword">Password</label>
	      							<input class="form-control mr-sm-2" type="password" id="aConfirmedPassword" name="aConfirmedPassword" placeholder="Confirm Password" required>
	      						</div>
								<button type="submit" class="btn btn-outline-primary" name="submit" onSubmit="return ValidPassword(this);">Create the account</button>
						</fieldset>
					</form>
					<div class="alert alert-warning mt-3" id="alert_placeholder" role = "alert" style="visibility: hidden;">Passwords don't match :/</div>
				</div>		
				</div>
			</div>
		</div>
    	<script src="scripts/bootstrap.js"></script>
		<script src="scripts/main.js"></script>
		<script>

			$(document).ready(function() {
				$("#aConfirmedPassword").keyup(valid_password);

			});

			function valid_password() {
				var aPassword = $("#aPassword").val();
				var aConfirmedPassword = $("#aConfirmedPassword").val();

				if (aPassword == aConfirmedPassword) {
					$("#alert_placeholder").removeClass("alert alert-warning");
					$("#alert_placeholder").addClass("alert alert-success");
					$("#alert_placeholder").text("Passwords match ! :)");
					$('#alert_placeholder').css("visibility","visible");
				}
				else {
					$('#alert_placeholder').css("visibility","visible");
					$("#alert_placeholder").text("Passwords don't match :/");
					$("#alert_placeholder").addClass("alert alert-warning");  
    			}
    		}	
		</script>
		<div class="myfooter">
			<div class="container fixed-bottom mb-2">
				<hr>
    			<small>Copyright &copy; Simpic - Dany Sonethavy - 2020</small>
    		</div>
    	</div>
   </body>
</html>
