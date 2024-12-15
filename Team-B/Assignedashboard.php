<!DOCTYPE>
<?php
session_start();
include("../includes/connection.php");
include("../functions/function.php");
?>
<?php
if(!isset($_SESSION['user_email'])){
    header("location: ../index.php");
}
else {
    ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Main | Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css\style.css" rel="stylesheet" type="text/css">
		<link href="../bootstrap-5.2\css\bootstrap.min.css" rel="stylesheet"></script>
		<script src="../bootstrap-5.2\js\bootstrap.bundle.min.js"></script>
		<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: red;
    }

		</style>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasprofile" aria-controls="offcanvasprofile"><img src="../images/logo.png" style="width:80px;height:40px;"></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navtoggle" aria-controls="navtoggle" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navtoggle">
		      <ul class="nav nav-pills  me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">Live Comments</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link "  href="#" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">Job on Track</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">Complete Objectives</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled">Disabled</a>
		        </li>
		      </ul>
		      <button type="button" data-bs-toggle="offcanvas" href="#offcanvasinbox" aria-controls="offcanvasinbox" class="btn btn-outline-secondary" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">
					  Jobs on Track <span class="badge text-bg-danger"> 4</span>
					</button>
			</div>
		  </div>
		</nav>
		<!-- off canvas for inbox-->
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasinbox" aria-labelledby="offcanvasExampleLabel">
		  <div class="offcanvas-header">
		    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Inbox</h5>
		    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body">
		    <div>
		      profile
		    </div>
		    <div class="dropdown mt-3">
		      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
		        Dropdown button
		      </button>
		      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		        <li><a class="dropdown-item" href="#">Action</a></li>
		        <li><a class="dropdown-item" href="#">Another action</a></li>
		        <li><a class="dropdown-item" href="#">Something else here</a></li>
		      </ul>
		    </div>
		  </div>
		</div>
		<!-- off canvas for logo and profile-->
		<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasprofile" aria-labelledby="offcanvasExampleLabel">
			  <div class="offcanvas-header">
			    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Profile</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			  </div>
			  <div class="offcanvas-body">
			    <div>
			      ...
			    </div>
			    <div class="dropdown mt-3">
			      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
			        Dropdown button
			      </button>
			      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			        <li><a class="dropdown-item" href="#">Action</a></li>
			        <li><a class="dropdown-item" href="#">Another action</a></li>
			        <li><a class="dropdown-item" href="#">Something else here</a></li>
			      </ul>
			    </div>
			  </div>
			</div>
	</body>
</html>
    <?php
}
?>

