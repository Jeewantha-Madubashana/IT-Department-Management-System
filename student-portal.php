<?php session_start(); ?>
<?php require_once('inc/connection.php'); 

// checking if a user is logged in
	if (!isset($_SESSION['stud_reg_no'])) {
		header('Location: sign-up-student.php');
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
				
					<h3>You Hava Successfully Log into the Student Portal!</h3>

		 	</div> <!-- top-bar-links -->

		 	<div class="loggedin">Welcome! <?php echo $_SESSION['stud_full_name'] ; ?> &nbsp <a href="logout-student.php"> Log out</a>
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
		<div class="intro" style="margin-bottom: 250px">
			

			<div class="student" style=" margin: 30px 30px 30px 30px " >
				<ul style="font-size: 150%">
					<li><a href="#.php">Assignments</a></li>
					<li><a href="#.php">Assignment Marks</a></li>
					<li><a href="#.php">View Exam Result </a></li>
					<li><a href="#.php">Exam Timetable </a></li>
					<li><a href="#.php">Timetable </a></li>
					<li><a href="#.php">Online Notice Bord </a></li>
					
					

					
					
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