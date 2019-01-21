<?php 

require_once '../login/dbconnect.php';
// The length we want the unique reference number to be  
$unique_ref_length = 5;  
  
// A true/false variable that lets us know if we've  
// found a unique reference number or not  
$unique_ref_found = false;  
  
// Define possible characters.  
// Notice how characters that may be confused such  
// as the letter 'O' and the number zero don't exist  
$possible_chars = "0123456789";  
  
// Until we find a unique reference, keep generating new ones  
while (!$unique_ref_found) {  
  
    // Start with a blank reference number  
    $unique_ref = "";  
      
    // Set up a counter to keep track of how many characters have   
    // currently been added  
    $i = 0;  
      
    // Add random characters from $possible_chars to $unique_ref   
    // until $unique_ref_length is reached  
    while ($i < $unique_ref_length) {  
      
        // Pick a random character from the $possible_chars list  
        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);  
          
        $unique_ref .= $char;  
          
        $i++;  
      
    }  
      
    // Our new unique reference number is generated.  
    // Lets check if it exists or not 
		$con = mysqli_connect('localhost','root','','lagoseduboard');
 
    $query = mysqli_query($con, "SELECT `school_id` FROM ` school_tbl` 
              WHERE `school_id`='".$unique_ref."'");  
    $result = @mysqli_query($query);  
    if (@mysqli_num_rows($result)==0) {  
      
        // We've found a unique number. Lets set the $unique_ref_found  
        // variable to true and exit the while loop  
        $unique_ref_found = true;  
      
    }  
  
}  
$playernumber = 'SCH'.$unique_ref;
?>
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


if (@$_GET['school_id'] <> ""){
		@$school_id = trim($_GET['school_id']);
		@$school_id = strip_tags($school_id);
		@$school_id = htmlspecialchars($school_id);

	$school=mysqli_query($conn,"SELECT * FROM school_tbl WHERE school_id='$school_id'");
	$rowschool=mysqli_fetch_array($school);

$school_name=$rowschool['school_name'];
$school_location=$rowschool['school_location'];
$student_population=$rowschool['student_population'];
$school_contact=$rowschool['school_contact'];
$school_address=$rowschool['school_address'];

} 


	
	
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
  <script src="assets/js/lga.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css" />
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<style>
	.wrapper{
		padding-top: 50px;
	}
	#form-content{
		margin: 0 auto;
		width: 800px;
	}
</style>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Dashboard </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">    <ul class="nav navbar-nav">            <li><a href="detail.php">Home</a></li><li><a href="teacher.php">Teachers</a></li>
            <li><a href="school.php">Schools</a></li>
<li><a href="standard.php">Standard</a></li>
<li><a href="assign.php">Allocation</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Admin ID:<strong><?php echo $userRow['userName']; ?> </strong>&nbsp;<span class="caret"></span></a>              <ul class="dropdown-menu">               
<li><a href="teacher_edit.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Insert Teachers</a></li>
<li><a href="school_edit.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Insert Schools</a></li>
<li><a href="standard_edit.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Insert Standard</a></li>
<li><a href="assign_edit.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Allocate Teachers</a></li>
<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">
<div style="background-image: url(onlineapp/ccslogo/header.jpg); background-repeat: no-repeat center center; background-size: cover; height: 200px"></div>

	<div class="container">
	  <div class="col-lg-12">
	
		<div class="row">
		<br>
		<h4 align="center">SCHOOL DETAIL FORM</h4><br>
			<div id="form-content">


			<form method="post" id="reg-form" autocomplete="off">
				
				
<input name="school_id" type="hidden" value="<?php if (@$school_id == ""){echo $playernumber;} else {echo $school_id;} ?>">


<div class="form-group">							  <label>School Name</label>

					<input type="text" onkeyup="this.value = this.value.toUpperCase();" pattern="^[A-Za-z0-9 -]+$" class="form-control" value="<?php echo @$school_name; ?>" name="school_name" id="lname" placeholder="Enter School Name" required />
				</div>


<div class="form-group">							  <label>Location</label>

					<input type="text" onkeyup="this.value = this.value.toUpperCase();" pattern="^[A-Za-z0-9 -]+$" class="form-control" value="<?php echo @$school_location; ?>" name="school_location" id="lname" placeholder="School Location LGA" required />
				</div>


<div class="form-group">							  <label>Address</label>

					<input type="text" onkeyup="this.value = this.value.toUpperCase();" pattern="^[A-Za-z0-9 -]+$" class="form-control" value="<?php echo @$school_address; ?>" name="school_address" id="lname" placeholder="School Physical Address" required />
				</div>


<div class="form-group">							  <label>Pupil Population</label>

					<input type="text" onkeyup="this.value = this.value.toUpperCase();" pattern="^[0-9 -]+$" class="form-control" value="<?php echo @$student_population; ?>" name="student_population" id="lname" placeholder="Number of pupil in the School" required />
				</div>


<div class="form-group">							  <label>Contact Number</label>

					<input type="text" onkeyup="this.value = this.value.toUpperCase();" pattern="^[0-9 -]+$" class="form-control" value="<?php echo @$school_contact; ?>" name="school_contact" id="lname" placeholder="School Contact Phone Number" required />
				</div>
      



     


				
				
				<div class="form-group">
                <input name="school" type="checkbox" value="agree" required> I agree to the Terms and Condition
				</div>
				
				<hr />
				
				<div class="form-group">
					<button class="btn btn-primary">Submit/Save Details</button>
				</div>
			</form>
            
            </div>
            
            </div>
		
	</div>
	
</div>
	
</div>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {	
	
	// submit form using $.ajax() method
	
	$('#reg-form').submit(function(e){
		
		e.preventDefault(); // Prevent Default Submission
		
		$.ajax({
			url: 'schoolupdate.php',
			type: 'POST',
			data: $(this).serialize() // it will serialize the form data
		})
		.done(function(data){
			$('#form-content').fadeOut('slow', function(){
				$('#form-content').fadeIn('slow').html(data);
			});
		})
		.fail(function(){
			alert('Ajax Submit Failed ...');	
		});
	});
	
	
	/*
	// submit form using ajax short hand $.post() method
	
	$('#reg-form').submit(function(e){
		
		e.preventDefault(); // Prevent Default Submission
		
		$.post('submit.php', $(this).serialize() )
		.done(function(data){
			$('#form-content').fadeOut('slow', function(){
				$('#form-content').fadeIn('slow').html(data);
			});
		})
		.fail(function(){
			alert('Ajax Submit Failed ...');
		});
		
	});
	*/
	
});
</script>
</body>
</html>
<?php ob_end_flush(); ?>