<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['admin_reg_no'])&&($_SESSION['stud_email'])) 
	{
		header('Location: sign-up-admin.php');
	}

	if (isset($_GET['stud_email'])) {
		// getting the user information
		$stud_email = mysqli_real_escape_string($connection, $_GET['stud_email']);

		if ( $stud_email == $_SESSION['stud_email'] ) {
			// should not delete current user
			header('Location: student-details.php?err=cannot_delete_current_user');
		} 
		else 
		{
			// deleting the user
			$query = "UPDATE student SET stud_is_deleted = 1 WHERE stud_email = {$stud_email} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// user deleted
				header('Location: student-details.php?msg=user_deleted');
			} else {
				header('Location: student-details.php?err=delete_failed');
			}
		}
		
	} else {
		header('Location: student-details.php');
	}
?>