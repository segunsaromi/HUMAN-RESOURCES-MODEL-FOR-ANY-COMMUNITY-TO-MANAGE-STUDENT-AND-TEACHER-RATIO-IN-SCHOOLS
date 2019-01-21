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
 
    $query = mysqli_query($con, "SELECT `assign_id` FROM ` assign_tbl` 
              WHERE `assign_id`='".$unique_ref."'");  
    $result = @mysqli_query($query);  
    if (@mysqli_num_rows($result)==0) {  
      
        // We've found a unique number. Lets set the $unique_ref_found  
        // variable to true and exit the while loop  
        $unique_ref_found = true;  
      
    }  
  
}  
$playernumber = 'ASS'.$unique_ref;
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


if ($_GET['assign_id'] <> ""){
		@$assign_id = trim($_GET['assign_id']);
		@$assign_id = strip_tags($assign_id);
		@$assign_id = htmlspecialchars($assign_id);

	$assign=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE assign_id='$assign_id'");
	$rowassign=mysqli_fetch_array($assign);

$teacher_id=$rowassign['teacher_id'];
$school_id=$rowassign['school_id'];
$teacher_name=$rowassign['teacher_name'];
$school_name=$rowassign['school_name'];


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
          <a class="navbar-brand" href="#">Admin Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">     <?php 	$report1=mysqli_query($conn,"SELECT * FROM loanrequest_tbl WHERE report='0'");

	$report2=mysqli_query($conn,"SELECT * FROM savingamount_tbl WHERE report='0'");


	$msg1=mysqli_query($conn,"SELECT * FROM loanrequest_tbl WHERE msg='0'");

	$msg2=mysqli_query($conn,"SELECT * FROM savingamount_tbl WHERE msg='0'");

if ((mysqli_num_rows($report1) > 0) or (mysqli_num_rows($report2) > 0)){$rep="rep1.jpg";} else {$rep="rep.jpg";}

if ((mysqli_num_rows($msg1) > 0) or (mysqli_num_rows($msg2) > 0)){$msg="msg1.jpg";} else {$msg="msg.jpg";}
?>     <ul class="nav navbar-nav">            <li><a href="admin_detail.php">Home</a></li>
            <li><a href="members_detail.php">Members</a></li>			<li><a href="membersloan_detail.php">Loan</a></li>
            <li><a href="memberssavings_detail.php">Savings</a></li>
<li><a href="savings_deposit.php">S.Deposit</a></li>
<li><a href="loan_deposit.php">L.Deposit</a></li>
            <li><a href="#">Withdrawal</a></li>
            <li><a href="#">Request</a></li>
            <li><a href="admin_report.php" title="See Messages"><img name="" src="<?php echo $msg; ?>" width="20" height="20" alt=""></a></li>
            <li><a href="#" title="Generate Report"><img name="" src="<?php echo $rep; ?>" width="20" height="20" alt=""></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">			  <span class="glyphicon glyphicon-user"></span>&nbsp;Admin ID:<strong><?php echo $userRow['userName']; ?> </strong>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">                <li><a href="dividend.php"></span>&nbsp;Share Dividend</a></li>
                <li><a href="dividend_edit.php"></span>&nbsp;Delete Dividend</a></li>
<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
</ul>
            </li>
	<div id="wrapper">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

<div style="background-image: url(onlineapp/ccslogo/header.jpg); background-repeat: no-repeat center center; background-size: cover; height: 200px"></div>

	<div class="container">
	  <div class="col-lg-12">
	
		<div class="row">
		<br>
		<h4>TEACHER / SCHOOL FORM</h4><br>
			<div id="form-content">

			<form method="post" id="reg-form" autocomplete="off">
				
				
<input name="assign_id" type="hidden" value="<?php if ($assign_id == '') {echo $playernumber;} else {echo $assign_id;} ?>">


<div class="form-group">
<label>Teacher Name</label>
<select name="teacher_id" id="lname" class="form-control" required>
  <option value="<?php if (@$assign_id <> ""){echo @$teacher_id;} else {echo "";}?>" selected><?php if (@$assign_id <> ""){echo @$teacher_name;} else {echo "Select Teacher";}?></option>
 
<?php $querysteacher=mysqli_query($conn,"SELECT * FROM assign_tbl ORDER by teacher_name ASC");  
while($rowteacher=mysqli_fetch_array($querysteacher)) {?>  

  <option value="<?php echo $rowteacher['techer_id']; ?>"><?php echo $rowteacher['teacher_name']; ?></option>
<?php }?>
</select>				
</div>


<div class="form-group">
<label>School Name</label>
<select name="school_id" id="lname" class="form-control" required>
  <option value="<?php if (@$assign_id <> ""){echo @$school_id;} else {echo "";}?>" selected><?php if (@$assign_id <> ""){echo @$school_name;} else {echo "Select School";}?></option>
 
<?php $querysschool=mysqli_query($conn,"SELECT * FROM assign_tbl ORDER by school_name ASC");  
while($rowschool=mysqli_fetch_array($querysschool)) {?>  

  <option value="<?php echo $rowschool['school_id']; ?>"><?php echo $rowschool['school_name']; ?></option>
<?php }?>
</select>				
</div>


				
				
				<div class="form-group">
                <input name="assign" type="checkbox" value="agree" required> I agree to the Terms and Condition
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
			url: 'assignupdate.php',
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