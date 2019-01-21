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

if( $_POST ){

if ($_POST['school']){
		$school_id = trim($_POST['school_id']);
		$school_id = strip_tags($school_id);
		$school_id = htmlspecialchars($school_id);

		$school_name = trim($_POST['school_name']);
		$school_name = strip_tags($school_name);
		$school_name = htmlspecialchars($school_name);

		$school_location = trim($_POST['school_location']);
		$school_location = strip_tags($school_location);
		$school_location = htmlspecialchars($school_location);

		$school_address = trim($_POST['school_address']);
		$school_address = strip_tags($school_address);
		$school_address = htmlspecialchars($school_address);

		$school_contact = trim($_POST['school_contact']);
		$school_contact = strip_tags($school_contact);
		$school_contact = htmlspecialchars($school_contact);

		$student_population = trim($_POST['student_population']);
		$student_population = strip_tags($student_population);
		$student_population = htmlspecialchars($student_population);

	$conn = mysqli_connect('localhost','root','','lagoseduboard');


$exist=mysqli_query($conn,"SELECT * FROM school_tbl WHERE school_id='$school_id'");	

if (mysqli_num_rows($exist) > 0){
	$bankinsert=mysqli_query($conn,"UPDATE school_tbl SET school_name='$school_name',school_location='$school_location',school_contact='$school_contact',school_address='$school_address',student_population='$student_population' WHERE school_id='$school_id'") or die(mysqli_error($conn));
	}
else {
	$bankinsert=mysqli_query($conn,"INSERT INTO school_tbl (school_id,school_name,school_location,school_contact,school_address,student_population) VALUES ('$school_id','$school_name','$school_location','$school_contact','$school_address','$student_population')") or die(mysqli_error($conn));
}



}



	?>
    
	<form method="post" id="reg-form" autocomplete="off">
    <table width="100%" border="0" class="table table-striped">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, Verify School Details Entered...
    	</div>
    </td>
    </tr>
    
    <tr>
    <td width="39%">School Name.</td>
    <td width="61%"><strong><?php echo $school_name; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Location.</td>
    <td width="61%"><strong><?php echo $school_location; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Address.</td>
    <td width="61%"><strong><?php echo $school_address; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Contact Number.</td>
    <td width="61%"><strong><?php echo $school_contact; ?></strong></td>
    </tr>

     <tr>
    <td width="39%">Pupil Population.</td>
    <td width="61%"><strong><?php echo $student_population; ?></strong></td>
    </tr>


    </table>

    
				<div class="form-group">
				  <a href="school.php"><button class="btn btn-primary" name="submit"> - FINISHED - </button>  </a>
				</div>
				
			</form>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    <?php
	
}