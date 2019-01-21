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


if ($_GET['standard_id'] <> ""){
		@$standard_id = trim($_GET['standard_id']);
		@$standard_id = strip_tags($standard_id);
		@$standard_id = htmlspecialchars($standard_id);

	$conn = mysqli_connect('localhost','root','','lagoseduboard');

	$schooldelete=mysqli_query($conn,"DELETE FROM standard_tbl WHERE standard_id='$standard_id'") or die(mysqli_error($conn));


if ($schooldelete)
{
	
echo "<script type='text/javascript'>alert('Standard has been deleted Successfully!!');</script>";
header('Location: standard.php');	
}
}

else
{

header('Location: standard.php');	

}

	?>
    
