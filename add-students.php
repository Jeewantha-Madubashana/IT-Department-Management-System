
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?> 
<?php require_once('inc/functions.php'); ?> 
<?php  
// checking if a user is logged in
	if (!isset($_SESSION['admin_reg_no'])) 
	{
		header('Location: sign-up-admin.php');
	}

?> 

<?php 
	
	$errors = array();
	$stud_reg_no = '';
	$stud_full_name = '';
	$stud_contact_no = '';
	$stud_sex = '';
	$stud_address = '';
	$stud_bday = '';
	$stud_nic_no = '';
	$stud_library_card_no = '';
	$acadamic_year = '';
	$current_year = '';
	$track = '';
	$full_part = '';
	$stud_email = '';
	$stud_password = '';
	

	if (isset($_POST['submit'])) 
	{
		$stud_reg_no = $_POST['stud_reg_no'];
		$stud_full_name = $_POST['stud_full_name'];
		$stud_contact_no = $_POST['stud_contact_no'];
		$stud_sex = $_POST['stud_sex'];
		$stud_address = $_POST['stud_address'];
		$stud_bday = $_POST['stud_bday'];
		$stud_nic_no = $_POST['stud_nic_no'];
		$stud_library_card_no = $_POST['stud_library_card_no'];
		$acadamic_year = $_POST['acadamic_year'];
		$current_year = $_POST['current_year'];
		$track = $_POST['track'];
		$full_part = $_POST['full_part'];
		$stud_email = $_POST['stud_email'];
		$stud_password = $_POST['stud_password'];

		// checking email address
		if (!isset($_POST['stud_email'])) 
		{
			$errors[] = 'Email address is invalid.';
		}

		//checking email address already exist
		$stud_email = mysqli_real_escape_string($connection, $_POST['stud_email']);
		$query = "SELECT * FROM student WHERE stud_email='{$stud_email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if($result_set)
		{
			if(mysqli_num_rows($result_set) == 1)
			{
				$errors[] = 'Email address already exist';
			}
		}	

		
			
			
				//email address is already sanitized
			$hashed_password = sha1($stud_password);
		
			$query = "INSERT INTO student (stud_reg_no,stud_full_name,stud_contact_no,stud_sex,stud_address,stud_bday,stud_nic_no,stud_library_card_no,acadamic_year,current_year,track,full_part,stud_email,stud_password,stud_is_deleted)"
                    . "VALUES ('$stud_reg_no','$stud_full_name','$stud_contact_no','$stud_sex','$stud_address','$stud_bday','$stud_nic_no','$stud_library_card_no','$acadamic_year','$current_year','$track','$full_part','$stud_email','$hashed_password',0)";
			

			$result = mysqli_query($connection, $query);

			if ($result) 
			{
				// query successful... redirecting to users page
				header('Location: student-details.php');
			}

			else
			{
				$errors[] = 'Failed to add the new record.';
			}
			
			 

		
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
				
					<h3>Add Students</h3>

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

		<div class="intro">

			<main><h1> <span> <a href="admin-portal.php"><< Back </a> </span></h1>
			<h3 style="margin-top: 30px"></h3>

			<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>
		 <div class="container">
			<form action="add-students.php" method="post" class="userform">
			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Reg no:</font></label>
				<input type="text" class="form-control" name="stud_reg_no" required="" placeholder="BAD-IT-20XX-(F/P)-XXXX">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Full Name:</font></label>
				<input type="text" class="form-control" name="stud_full_name" placeholder="Egerton"required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Contact No:</font></label>
				<input type="text" class="form-control" name="stud_contact_no" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Sex:</font></label>
				<input type="text" class="form-control" name="stud_sex" required="">

			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Address:</font></label>
				<input type="text" class="form-control" name="stud_address" required="">
			</div>

			<div class="form-group">
				<label for="">Birth Day:</label>
				<input type="text" class="form-control" name="stud_bday" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Nic Number:</font></label>
				<input type="text" class="form-control" name="stud_nic_no" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Library card Number:</font></label>
				<input type="text" class="form-control" name="stud_library_card_no" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Acadamic Year:</font></label>
				<input type="text" class="form-control" name="acadamic_year" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Current Year:</font></label>
				<input type="text" class="form-control" name="current_year" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Track:</font></label>
				<input type="text" class="form-control" name="track" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Full time or Part time:</font></label>
				<input type="text" class="form-control" name="full_part" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Email:</font></label>
				<input type="text" class="form-control" name="stud_email" required="">
			</div>

			<div class="form-group">
				<label for=""><font style="font-family: georgia ; font-size: 20px">Password:</font></label>
				<input type="password" class="form-control" name="stud_password" required="">
			</div>

			<div class="form-group">
				<label for="">&nbsp</label>	
				<button type="submit" class="form-control" name="submit">Save</button>			
			</div>
		</form>
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
