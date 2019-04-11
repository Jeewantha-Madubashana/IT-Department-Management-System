<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
 <?php 

	// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$email 		= mysqli_real_escape_string($connection, $_POST['email']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM student 
						WHERE stud_email = '{$email}' 
						AND stud_password = '{$hashed_password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			if ($result_set) {
				// query succesfful

				if (mysqli_num_rows($result_set) == 1) {
					// valid user found
					$user = mysqli_fetch_assoc($result_set);
					$_SESSION['stud_full_name'] = $user['stud_full_name'];
					$_SESSION['stud_reg_no'] = $user['stud_reg_no'];

					// updatinh last login
						
					
					// redirect to users.php
					header('Location: student-portal.php');
				} else {
					// user name and password invalid
					$errors[] = 'Invalid Username / Password';
				}
			} else {
				$errors[] = 'Database query failed';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Only for Test </title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign-up-student.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
	
</head>
<body>
	<div class="wrapper">
		<div class="top-bar clearfix">
			<div class="top-bar-links">
				<ul>
					<h3>Student Portal</h3>
					
				</ul>
			</div> <!-- top-bar-links -->	
				
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
		<div class="intro">
			<h3>Sign up - student</h3>
			<div class="loginStudent">

			<form action="sign-up-student.php" method="post">
				
				<fieldset>
					<legend><h1>Log In</h1></legend>

					<?php 
						if (isset($errors) && !empty($errors)) {
							echo '<p class="error">Invalid Username / Password</p>';
						}
					?>

					<?php 
						if (isset($_GET['logout'])) {
							echo '<p class="info">You have successfully logged out from the system</p>';
						}
					?>

					<p>
						<label for="">Username:</label>
						<input type="text" name="email" id="" placeholder="Email Address">
					</p>

					<p>
						<label for="">Password:</label>
						<input type="password" name="password" id="" placeholder="Password">
					</p>

					<p>
						<button type="submit" name="submit">Log In</button>
					</p>

				</fieldset>

			</form>		

	</div> <!-- .login -->
			
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