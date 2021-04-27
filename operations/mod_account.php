<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["Login_Name"])){
		header("Location: ../index.php");
	exit(); 
	}


?>
<!DOCTYPE html>

<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name=viewport content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<title>Simpic - Modify Username/Password</title>
		<link rel="icon" type="image/PNG" href="images/icon/title_icon.PNG">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    	<script src="assets/twitterbootstrap/js/bootstrap-tab.js"></script>
    	<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<style>
			body {
				background-color: #f7f7f7;
				padding-right: 0px;
			}
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
			    src: url(../font/CaviarDreams.ttf);
			}

			.logosite {
				font-family: CaviarDreams;
			}
		</style>
	</head>
	<body>
					<div class="modal fade" id="modifyImgModal" tabindex="-1" role="dialog" aria-labelledby="myModifyModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModifyModalLabel">Modify the description of an image using ID</h5>
									<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">
									<form id="my-modif-form" class="md-form" action="modify_desc.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="id_imgmod">Enter image ID to modify description</label>
								  			<input class="form-control mr-sm-2" type="text" name="id_imgmod" id="id_imgmod" placeholder="Image ID" required>
								  		</div>
								  		<div class="form-group">
									  		<label for="mod_descImage">Description</label>
									  		<textarea class="form-control mr-sm-2" name="mod_descImage" id="mod_descImage" placeholder="Add a brief description to the image" rows="3"></textarea>
									  	</div>				  	
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button class="btn btn-outline-primary my-2 my-sm-0" form="my-modif-form" type="submit">Modify</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="deleteImgModal" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myDeleteModalLabel">Delete an image using ID</h5>
									<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">
									<form id="my-delete-form" class="md-form" action="delete_image.php" method="post" enctype="multipart/form-data">
										<div class="form-group">	
										  	<label for="delImg">Enter image ID to delete</label>
										  	<input class="form-control mr-sm-2" type="text" name="delImg" id="delImg" placeholder="Image ID" required>
										</div>			  	
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button class="btn btn-outline-danger my-2 my-sm-0" form="my-delete-form" type="submit">Delete</button>
								</div>
							</div>
						</div>
					</div>
		<header id="header">
			<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
	  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>
	  			<a class="navbar-brand logosite" href="home.php"><h3>.Simpic</h3></a>
	  			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">

		  			<form action="search_img.php" class="form-inline ml-auto">
		  				<input class="form-control mr-sm-2" type="search" placeholder="Search an image" aria-label="Search">
		  				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
		  			</form>

	    			<ul class="navbar-nav ml-auto">
	    				<li class="nav-item mx-2">
	    					<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modifyImgModal">Modify Image description</button>
	    				</li>
	    				<li class="nav-item mx-2">
	    					<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteImgModal">Delete Image</button>
	    				</li>
	        			<li class="nav-item dropdown ">
					        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Welcome <?php echo $_SESSION['Login_Name']; ?> </a>
					        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="mod_account.php">Modify Username/Password</a>
								<a class="dropdown-item" href="del_account.php" onclick="return confirm('Are you sure? You will lose all the images you posted.')">Delete account</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout_account.php">Logout</a>
							</div>

						</li>
	        		</ul>
	        	</div>
	  		</nav>
  		</header>
  		<div class="container">
  			<form action="modify_account.php" method="post">
				<fieldset>
					<legend>Modify your account</legend>
						<div class="form-group">
							<label for="newloginName">New Username</label>
							<input class="form-control mr-sm-2" id="newloginName" type="text" name="newloginName" placeholder="Login name" required>
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
	      					<input class="form-control mr-sm-2" id="Password" type="password" name="Password" placeholder="Enter Your Password" required>
	      				</div>
						<div class="form-group">
							<label for="newPassword">New Password</label>
	      					<input class="form-control mr-sm-2" id="newPassword" type="password" name="newPassword" placeholder="Enter New Password" required>
	      				</div>
	      				<div class="form-group">
	      					<label for="aNewPassword">Confirm New Password</label>
	      					<input class="form-control mr-sm-2" id="aNewPassword" type="password" name="aNewPassword" placeholder="Confirm New Password" required>
	      				</div>
						<button type="submit" class="btn btn-outline-primary" name="submit">Modify</button>		
				</fieldset>
			</form>
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