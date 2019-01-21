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

if ($_POST['assign']){
		$assign_id = trim($_POST['assign_id']);
		$assign_id = strip_tags($assign_id);
		$assign_id = htmlspecialchars($assign_id);

		$school_id = trim($_POST['school_id']);
		$school_id = strip_tags($school_id);
		$school_id = htmlspecialchars($school_id);

		$teacher_id = trim($_POST['teacher_id']);
		$teacher_id = strip_tags($teacher_id);
		$teacher_id = htmlspecialchars($teacher_id);


$query1=mysqli_query($conn,"SELECT * FROM teacher_tbl WHERE teacher_id='$teacher_id'");
$queryrow1=mysqli_fetch_array($query1);
$teacher_name=$queryrow1['teacher_name'];
$teacher_subject=$queryrow1['teacher_subject'];

$query2=mysqli_query($conn,"SELECT * FROM school_tbl WHERE school_id='$school_id'");
$queryrow2=mysqli_fetch_array($query2);
$school_name=$queryrow2['school_name'];

	$conn = mysqli_connect('localhost','root','','lagoseduboard');

$exist=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE assign_id='$assign_id'");	

if (mysqli_num_rows($exist) > 0){$bankinsert=mysqli_query($conn,"UPDATE assign_tbl SET teacher_name='$teacher_name',teacher_id='$teacher_id', teacher_subject='$teacher_subject', school_name='$school_name',school_id='$school_id' WHERE assign_id='$assign_id'") or die(mysqli_error($conn));

if ($bankinsert){$change=mysqli_query($conn,"UPDATE teacher_tbl SET status='1' WHERE teacher_id='$teacher_id'");}
} 


else{			

		
	$bankinsert=mysqli_query($conn,"INSERT INTO assign_tbl (assign_id,teacher_name,teacher_id,teacher_subject,school_name,school_id) VALUES ('$assign_id','$teacher_name','$teacher_id','$teacher_subject','$school_name','$school_id')") or die(mysqli_error($conn));
	if ($bankinsert){$change=mysqli_query($conn,"UPDATE teacher_tbl SET status='1' WHERE teacher_id='$teacher_id'");}

	
}


}



	?>
    
	<form method="post" id="reg-form" autocomplete="off">
    <table width="100%" border="0" class="table table-striped">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, Verify Assigned Details Entered...
    	</div>
    </td>
    </tr>
    
    <tr>
    <td width="39%">Teacher Name.</td>
    <td width="61%"><strong><?php echo $teacher_name; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">School.</td>
    <td width="61%"><strong><?php echo $school_name; ?></strong></td>
    </tr>


    </table>

    
				<div class="form-group">
				  <a href="assign.php"><button class="btn btn-primary" name="submit"> - FINISHED - </button>  </a>
				</div>
				
			</form>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    <?php
	
}