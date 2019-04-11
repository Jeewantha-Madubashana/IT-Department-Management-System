<?php session_start(); ?>
<?php require_once('inc/connection.php'); 

// checking if a user is logged in
	if (!isset($_SESSION['admin_reg_no'])) {
		header('Location: sign-up-admin.php');
	}
?> 	
<!DOCTYPE html>
<html>
<head>
	<title> Only for Test </title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
	
</head>
<body>
	<div class="wrapper">
		<div class="top-bar clearfix">
			<div class="top-bar-links">
				
					<h3>You Hava Successfully Log into the Admin Portal!</h3>

		 	</div> <!-- top-bar-links -->

		 	<div class="loggedin">Welcome! <?php echo $_SESSION['admin_full_name'] ; ?> &nbsp <a href="logout-admin.php"> Log out</a>
		 	</div>	
				
		</div> <!-- top - bar -->

		<header class="clearfix">
			<div class="logo">
				<h1>Department of Informatin Technology <br>SLIATE Badulla</h1>
				
				
			</div> <!--logo -->
			<div class="socialmedia">
				<ul>
					<li><a href="#"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-rss fa-fw" aria-hidden="true"></i></a></li>
				</ul>
				
			</div> 
			
			</header>
			<div class="jmk">
			<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about-us.php">About Us</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="student-portal.php">Student Portal</a></li>
				<li><a href="lecture-portal.php">Lecture Portal </a></li>
				<li><a href="admin-portal.php">Admin</a></li>
			</ul>
		
			</nav>
			</div>
		
		
		</header> <!--header-->	
		<div class="intro" style="margin-bottom: 180px ">
			

			<div class="admin" style=" margin: 30px 30px 30px 30px " >
				<ul style="font-size: 150%">
					<li><a href="student-details.php">View Student Detail</a></li>
					<li><a href="add-students.php">Add Student </a></li>
					<li><a href="#php">View Lectures Details </a></li>
					<li><a href="#php">Add Lecture </a></li>
					<li><a href="#php">Online Notice Bord</a></li>
					<li><a href="#.php">Publish Exam Results</a></li>
					
				</ul>
				

			</div>

			
		</div ><!--intro-->
		
		

		<div class="copyrights">
			<div class="left">
				Copyrights &copy; Domain Name. All Rights Reserved
			</div>

			<div class="right">
				Website by: Jeewantha Madubashana
			</div>

		</div>

		
	</div> <!-- wrapper -->	
 </body>
</html>