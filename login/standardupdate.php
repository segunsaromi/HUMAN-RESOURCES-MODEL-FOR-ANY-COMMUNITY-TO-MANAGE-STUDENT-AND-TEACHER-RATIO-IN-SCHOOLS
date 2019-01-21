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

if ($_POST['standard']){
		$standard_id = trim($_POST['standard_id']);
		$standard_id = strip_tags($standard_id);
		$standard_id = htmlspecialchars($standard_id);

		$standard_name = trim($_POST['standard_name']);
		$standard_name = strip_tags($standard_name);
		$standard_name = htmlspecialchars($standard_name);

		$standard_ratio = trim($_POST['standard_ratio']);
		$standard_ratio = strip_tags($standard_ratio);
		$standard_ratio = htmlspecialchars($standard_ratio);


	$conn = mysqli_connect('localhost','root','','lagoseduboard');

$exist=mysqli_query($conn,"SELECT * FROM standard_tbl WHERE standard_id='$standard_id'");	

if (mysqli_num_rows($exist) > 0){$bankinsert=mysqli_query($conn,"UPDATE standard_tbl SET standard_name='$standard_name',standard_ratio='$standard_ratio' WHERE standard_id='$standard_id'") or die(mysqli_error($conn));} 

else{			

		
	$bankinsert=mysqli_query($conn,"INSERT INTO standard_tbl (standard_id,standard_name,standard_ratio) VALUES ('$standard_id','$standard_name','$standard_ratio')") or die(mysqli_error($conn));
	
}


}



	?>
    
	<form method="post" id="reg-form" autocomplete="off">
    <table width="100%" border="0" class="table table-striped">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>Success</strong>, Verify Standard Details Entered...
    	</div>
    </td>
    </tr>
    
    <tr>
    <td width="39%">Standard Name.</td>
    <td width="61%"><strong><?php echo $standard_name; ?></strong></td>
    </tr>

    <tr>
    <td width="39%">Ratio.</td>
    <td width="61%"><strong><?php echo $standard_ratio; ?></strong></td>
    </tr>


    </table>

    
				<div class="form-group">
				  <a href="standard.php"><button class="btn btn-primary" name="submit"> - FINISHED - </button>  </a>
				</div>
				
			</form>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    <?php
	
}