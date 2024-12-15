<!DOCTYPE>
<?php
session_start();
include("../includes/connection.php");
include("../functions/function.php");
?>
<?php
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
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
    .navbar a:hover, .subnav:hover .subnavbtn {
  background-color: grey;
}

		</style>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasprofile" aria-controls="offcanvasprofile" data-toggle="tooltip" data-placement="right" title="Click to edit profile"><img src="../images/logo.png" style="width:80px;height:40px;"></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navtoggle" aria-controls="navtoggle" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navtoggle">
		      <ul class="nav nav-pills  me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link " aria-current="page" href="livecoments.php" target="frame4" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">Live Comments</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link"  href="tracker.html" target="frame4" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">Tracker</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link "  href="tracker.html" target="frame4" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">New Issue</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="tracker.html" target="frame4" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">Complete Objectives</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvassidenavbar" style="font-size: 18px;font-family: Berlin sans-serif; color:white;" aria-controls="offcanvassidenavbar">Management</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled">Disabled</a>
		        </li>
		      </ul>
		      <button type="button" data-bs-toggle="offcanvas" href="#offcanvasinbox" aria-controls="offcanvasinbox" class="btn btn-outline-secondary" style="font-size: 18px;font-family: Berlin sans-serif; color:white;">
					  Notifications <span class="badge text-bg-danger">0</span>
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
			  <div class="offcanvas-header bg-black">
			  	<img src="../images/logo.png" style="width:80px;height:40px;">
			    <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="font-size: 20px;text-align: center;color: white;font-family:times new Roman; font-weight:bold;">Edit Profile</h5>

			    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			  </div>
			  <div class="offcanvas-body ">
			  	<div class="card-md shadow-lg rounded" >
				    <div id="user_details">
				        <?php
				        $user = $_SESSION['user_email'];
				        $get_user = "select * from users where user_email='$user'";
				        $run_user = mysqli_query($con, $get_user);
				        $row = mysqli_fetch_array($run_user);

				        $user_id = $row['user_id'];
				        $user_name = $row['user_name'];
				        $describe_user = $row['describe_user'];
				        $Relationship_status = $row['Relationship'];
				        $user_country = $row['user_country'];
				        $user_image = $row['user_image'];
				        $register_date = $row['user_reg_date'];
				        $gender = $row['user_gender'];
				        $user_birthday = $row['user_birthday'];
				        echo "
				        		<div class='row justify-content-center align-items-center'>
				        		<div class='col-sm-8 col-md-8 '>
				                <img src ='../users/$user_image' style='width: 70%; height: 50%;'/>
				                <form action='../Team-A/managementdash.php' method='post' enctype='multipart/form-data'>
				                </div>
				                </div>
				                <div class='row justify-content-between align-items-center'>
				                <div class='col-sm-6 col-md-6'>
				                <input type='file' name='u_image'>
				                </div>
				                <div class='col-sm-12 col-md-12'>
				                <button name='update' class='btn btn-outline-primary'>&nbspUpdate Profile</button>
				                </div>
				                </form>
				                <br><br><br>
				                </div>
				                <div class='row justify-content-center align-items-center'>
				                <div class='col-sm-10 '>
				                <h1 style='fontfamily:Times new roman;'>$user_name</h1>
				                </div>
				                <div class='col-sm-10'>
				                <p class='title'><strong>$describe_user</strong></p>
				                </div>
				                <div class='col-sm-10'>
				                <p><strong>Depertment: </strong>$Relationship_status</p>
				                </div>
				                <div class='col-sm-10'>
				                <p><strong>Lives In: </strong>$user_country</p>
				                </div>
				                <div class='col-sm-10'>
				                <p><strong>Member Since: </strong>$register_date</p>
				                </div>
				                <div class='col-sm-10'>
				                <p><strong>Gender: </strong>$gender</p>
								</div>
				                <div class='col-sm-10'>
				                <p><strong>Date of Birth: </strong>$user_birthday</p>
				                </div>
				                <div class='col-sm-10'>
				                <div style='margin: 24px 0;'>
				                <a href='../logout.php'><button class ='btn btn-outline-danger'>Logout</button></a>
				                </div>
				                </div>
				            ";
				        ?>
				    </div>

				    <?php
				    if (isset($_POST['update'])) {
				        $u_image = $_FILES['u_image']['name'];
				        $image_tmp = $_FILES['u_image']['tmp_name'];

				        move_uploaded_file($image_tmp, "../users/$u_image");
				        $update = "update users set user_image='$u_image' where user_id='$user_id'";

				        $run = mysqli_query($con, $update);

				        if ($run) {
				            echo "<script>alert('Your Profile Updated')</script>";
				            echo "<script>window.open('managementdash.php','_self')</script>";
				        }
				    }
				    ?>

				</div>
			  	
			  	</div>
			  

			    
			  </div>
			</div>
<!-- for the side nav bar-->
		<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvassidenavbar" aria-labelledby="offcanvasExampleLabel">
		  <div class="offcanvas-header">
		    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Management Menu</h5>
		    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body">
		    <div>
		      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
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
		<div class= "container-fluid">
			<iframe name="frame4" href="livecoments.php" style="width:100%; height: 100%;"></iframe>
		</div>		
	</body>

</html>
    <?php
}
?>