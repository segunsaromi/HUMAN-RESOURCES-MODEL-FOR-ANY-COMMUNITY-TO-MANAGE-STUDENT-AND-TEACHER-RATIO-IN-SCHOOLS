<?php

	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$conn = mysqli_connect('localhost','root','','lagoseduboard');
	$res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);


if ($_GET['assign_id'] <> ""){
		@$assign_id = trim($_GET['assign_id']);
		@$assign_id = strip_tags($assign_id);
		@$assign_id = htmlspecialchars($assign_id);

	$conn = mysqli_connect('localhost','root','','lagoseduboard');

	$schooldelete=mysqli_query($conn,"DELETE FROM assign_tbl WHERE assign_id='$assign_id'") or die(mysqli_error($conn));


if ($schooldelete)
{
	
echo "<script type='text/javascript'>alert('Selection has been deleted Successfully!!');</script>";
header('Location: assign.php');	
}
}

else
{

header('Location: assign.php');	

}

	?>
    
