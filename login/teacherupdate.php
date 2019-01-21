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

if ($_POST['teacher']){
		$teacher_id = trim($_POST['teacher_id']);
		$teacher_id = strip_tags($teacher_id);
		$teacher_id = htmlspecialchars($teacher_id);

		$teacher_name = trim($_POST['teacher_name']);
		$teacher_name = strip_tags($teacher_name);
		$teacher_name = htmlspecialchars($teacher_name);

		$teacher_subject = trim($_POST['teacher_subject']);
		$teacher_subject = strip_tags($teacher_subject);
		$teacher_subject = htmlspecialchars($teacher_subject);

		$teacher_contact = trim($_POST['teacher_contact']);
		$teacher_contact = strip_tags($teacher_contact);
		$teacher_contact = htmlspecialchars($teacher_contact);

		$teacher_email = trim($_POST['teacher_email']);
		$teacher_email = strip_tags($teacher_email);
		$teacher_email = htmlspecialchars($teacher_email);


	$conn = mysqli_connect('localhost','root','','lagoseduboard');

$exist=mysqli_query($conn,"SELECT * FROM teacher_tbl WHERE teacher_id='$teacher_id'");	

if (mysqli_num_rows($exist) > 0){$bankinsert=mysqli_query($conn,"UPDATE teacher_tbl SET
 teacher_name='$teacher_name',teacher_contact='$teacher_contact',teacher_email='$teacher_email',teacher_subject='$teacher_subject' WHERE teacher_id='$teacher_id'") or die(mysqli_error($conn));} 

else{			

	$bankinsert=mysqli_query($conn,"INSERT INTO teacher_tbl (teacher_id,teacher_name,teacher_contact,teacher_email,teacher_subject) VALUES ('$teacher_id','$teacher_name','$teacher_contact','$teacher_email','$teacher_subject')") or die(mysqli_error($conn));
	
}


}



	?>
    
	<form method="post" id="reg-form" autocomplete="off">
    <table width="100%" border="0" class="table table-striped">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, Verify Teacher Details Entered...
    	</div>
    </td>
    </tr>
    
    <tr>
    <td width="39%">Teacher Name.</td>
    <td width="61%"><strong><?php echo $teacher_name; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Subject.</td>
    <td width="61%"><strong><?php echo $teacher_subject; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Contact.</td>
    <td width="61%"><strong><?php echo $teacher_contact; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Email.</td>
    <td width="61%"><strong><?php echo $teacher_email; ?></strong></td>
    </tr>


    </table>

    
				<div class="form-group">
				  <a href="teacher.php"><button class="btn btn-primary" name="submit"> - FINISHED - </button>  </a>
				</div>
				
			</form>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    <?php
	
}