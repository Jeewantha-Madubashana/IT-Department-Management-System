<?php session_start(); ?>
<?php require_once('inc/connection.php'); 

// checking if a user is logged in
	if (!isset($_SESSION['admin_reg_no'])) 
	{
		header('Location: sign-up-admin.php');
	}


	if (isset($_POST['submit'])) 
	{

		$stud_email = $_POST['stud_email'];

	$student_list = '';
	// getting the list of user
	$query = "SELECT * FROM student WHERE  stud_email LIKE '%{$stud_email}%'  ORDER BY stud_full_name";

	$students = mysqli_query($connection, $query);

	if($students){


		while ($student= mysqli_fetch_assoc($students)) 
		{
			$student_list.= "<ul>";
			$student_list.="<li>Student name : {$student['stud_full_name']}</li>";
			$student_list.="<li>Registration No. :{$student['stud_reg_no']}</li>";
			$student_list.="<li>Contact Number : {$student['stud_contact_no']}</td>";
			$student_list.="<li>Gender : {$student['stud_sex']}</td>";
			$student_list.="<li>Address : {$student['stud_address']}</td>";
			$student_list.="<li>Birth Day : {$student['stud_bday']}</td>";
			$student_list.="<li>NIC Number : {$student['stud_nic_no']}</td>";
			$student_list.="<li>Library Card Number : {$student['stud_library_card_no']}</td>";
			$student_list.="<li>Acadamic Year : {$student['acadamic_year']}</td>";
			$student_list.="<li>Current Year : {$student['current_year']}</td>";
			$student_list.="<li>Track : {$student['track']}</td>";
			$student_list.="<li>Full Tine or Part Time : {$student['full_part']}</td>";
			$student_list.="<li>Email Address : {$student['stud_email']}</td>";
			$_SESSION['stud_email'] = $student['stud_email'];
			
			$student_list.="<li> <a href=\"edit-student.php?stud_email={$student['stud_email']}\">Edit </a></li>";
			$student_list.="<li> <a href=\"delete-student.php?stud_email={$student['stud_email']}\">Delete </a></li>";
			$student_list.= "</ul>";
		}
	}
	
	else{
	echo "Database query faild";	
	
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
				
					<h3>Student Details</h3>

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
			</div>

			<form action="student-details.php" method="post" class="userform">
				<p>
				<label for="" style="font-size: 150%">E mail address:</label>
				<input type="text" name="stud_email">
				</p>
				<p>
				<label for="">&nbsp</label>	
				<button type="submit" name="submit">Find</button>			
			</p>

			</form>
			
		
		
		</header> <!--header-->	
		<div class="intro">
			<main><h1> <span> <a href="admin-portal.php"><< Back</a> </span></h1>
			

			<?php 
			if(!empty($students))
			{

				echo $student_list;
			}

			?>
			

				
			
			

			
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