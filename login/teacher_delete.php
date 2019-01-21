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


if ($_GET['teacher_id'] <> ""){
		@$teacher_id = trim($_GET['teacher_id']);
		@$teacher_id = strip_tags($teacher_id);
		@$teacher_id = htmlspecialchars($teacher_id);

	$conn = mysqli_connect('localhost','root','','lagoseduboard');

	$schooldelete=mysqli_query($conn,"DELETE FROM teacher_tbl WHERE teacher_id='$teacher_id'") or die(mysqli_error($conn));


if ($schooldelete)
{
	
echo "<script type='text/javascript'>alert('Teacher has been deleted Successfully!!');</script>";
header('Location: teacher.php');	
}
}

else
{

header('Location: teacher.php');	

}

	?>
    
