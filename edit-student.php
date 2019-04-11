<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php');  

// checking if a user is logged in
	if (!isset($_SESSION['admin_reg_no'])) 
	{
		header('Location: sign-up-admin.php');
	}

	
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


	


		if (isset($_GET['stud_email']))
		 {

			echo "success 1,";
	
		// getting the user information
		$stud_email = mysqli_real_escape_string($connection, $_GET['stud_email']);
		echo $stud_email;
		$query = "SELECT * FROM student WHERE stud_email LIKE '%{$stud_email}%' ";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) 
		{
			if (mysqli_num_rows($result_set) == 1) 
			{
				echo "sucsecc";
				// user found
				$result = mysqli_fetch_assoc($result_set);
				$stud_reg_no = $result['stud_reg_no'];
				$stud_full_name = $result['stud_full_name'];
				$stud_contact_no = $result['stud_contact_no'];
				$stud_sex = $result['stud_sex'];
				$stud_address = $result['stud_address'];
				$stud_bday = $result['stud_bday'];
				$stud_nic_no = $result['stud_nic_no'];
				$stud_library_card_no = $result['stud_library_card_no'];
				$acadamic_year = $result['acadamic_year'];
				$current_year = $result['current_year'];
				$track = $result['track'];
				$full_part = $result['full_part'];
				$stud_email = $result['stud_email'];
			} 
			else 
			{
				// user not found
				header('Location: student-details.php?err=user_not_found');	
			}
		} 
		else 
		{
			// query unsuccessful
			header('Location: student-details.php?err=query_failed');
		}
	}
	

	if (isset($_POST['submit'])) 
	{
		
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
		$current_year = $_POST['full_part'];
		$stud_email = $_POST['stud_email'];
		
		$req_fields = array('stud_full_name', 'stud_contact_no', 'stud_sex', 'stud_address','stud_bday','stud_nic_no','stud_library_card_no','acadamic_year','current_year','current_year');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking email address
		if (!isset($_POST['stud_email'])) 
		{
			$errors[] = 'Email address is invalid.';
		}

		//checking email address already exist
		$stud_email = mysqli_real_escape_string($connection, $_POST['stud_email']);
		$query = "SELECT * FROM student WHERE stud_email='{$stud_email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

			

		
			
			
				//email address is already sanitized
			
		
			$query = "UPDATE student SET stud_full_name='$stud_full_name', stud_contact_no='$stud_contact_no', stud_sex='$stud_sex', stud_address='$stud_address', stud_bday='$stud_bday', stud_nic_no='$stud_nic_no', stud_library_card_no='$stud_library_card_no', acadamic_year='$acadamic_year', current_year='$current_year', track='$track', full_part='$full_part' WHERE stud_email='$stud_email' LIMIT 1";
			

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
				
					<h3>Edit Student Details</h3>

		 	</div> <!-- top-bar-links -->

		 	<div class="loggedin">Welcome! <?php echo $_SESSION['admin_full_name'] ; ?> &nbsp <a href="logout-lecture.php"> Log out</a>
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
			
			
		
		
		</header> <!--header-->	
		<div class="intro">

			<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>

			<form action="edit-student.php" method="post" class="userform">
			
			<p>
				<label for="">Full Name:</label>
				<input type="text" name="stud_full_name" <?php echo 'value="' . $stud_full_name . '"'; ?>>
			</p>

			<p>
				<label for="">Contact No:</label>
				<input type="text" name="stud_contact_no" <?php echo 'value="' . $stud_contact_no . '"'; ?>>
			</p>

			<p>
				<label for="">Sex:</label>
				<input type="text" name="stud_sex" <?php echo 'value="' . $stud_sex . '"'; ?>>
			</p>

			<p>
				<label for="">Address:</label>
				<input type="text" name="stud_address" <?php echo 'value="' . $stud_address . '"'; ?>>
			</p>

			<p>
				<label for="">Birth Day:</label>
				<input type="text" name="stud_bday" <?php echo 'value="' . $stud_bday . '"'; ?>>
			</p>

			<p>
				<label for="">Nic Number:</label>
				<input type="text" name="stud_nic_no" <?php echo 'value="' . $stud_nic_no . '"'; ?>>
			</p>

			<p>
				<label for="">Library card Number:</label>
				<input type="text" name="stud_library_card_no" <?php echo 'value="' . $stud_library_card_no . '"'; ?>>
			</p>

			<p>
				<label for="">Acadamic Year:</label>
				<input type="text" name="acadamic_year" <?php echo 'value="' . $acadamic_year . '"'; ?>>
			</p>

			<p>
				<label for="">Current Year:</label>
				<input type="text" name="current_year" <?php echo 'value="' . $current_year . '"'; ?>>
			</p>

			<p>
				<label for="">Track:</label>
				<input type="text" name="track" <?php echo 'value="' . $track . '"'; ?>>
			</p>

			<p>
				<label for="">Full time or Part time:</label>
				<input type="text" name="full_part" <?php echo 'value="' . $full_part . '"'; ?>>
			</p>

			<p>
				<label for="">Email:</label>
				<input type="text" name="stud_email" >
			</p>

			

			<p>
				<label for="">&nbsp</label>	
				<button type="submit" name="submit">Save</button>			
			</p>
		</form>
			
			

			
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