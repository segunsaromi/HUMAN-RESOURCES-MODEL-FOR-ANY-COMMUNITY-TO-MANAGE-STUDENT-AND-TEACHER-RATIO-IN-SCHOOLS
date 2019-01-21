
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



	$sub1=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='MATHEMATICS'");
	while ($rowsub1=mysqli_fetch_array($sub1)){@$subs1 = @$subs1 + 1;}

	$sub2=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='ENGLISH LANGUAGE'");
	while ($rowsub2=mysqli_fetch_array($sub2)){@$subs2 = @$subs2 + 1;}

	$sub3=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='BASIC SCIENCE'");
	while ($rowsub3=mysqli_fetch_array($sub3)){@$subs3 = @$subs3 + 1;}

	$sub4=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='SOCIAL STUDIES'");
	while ($rowsub4=mysqli_fetch_array($sub4)){@$subs4 = @$subs4 + 1;}

	$sub5=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='BUSINESS STUDIES'");
	while ($rowsub5=mysqli_fetch_array($sub5)){@$subs5 = @$subs5 + 1;}

	$sub6=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='HOME ECONOMICS'");
	while ($rowsub6=mysqli_fetch_array($sub6)){@$subs6 = @$subs6 + 1;}

	$sub7=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='BASIC TECHNOLOGY'");
	while ($rowsub7=mysqli_fetch_array($sub7)){@$subs7 = @$subs7 + 1;}

	$sub8=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='COMPUTER SCIENCE'");
	while ($rowsub8=mysqli_fetch_array($sub8)){@$subs8 = @$subs8 + 1;}

	$sub9=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='CIVIC EDUCATION'");
	while ($rowsub9=mysqli_fetch_array($sub9)){@$subs9 = @$subs9 + 1;}

	$sub0=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='ISLAMIC STUDIES'");
	while ($rowsub0=mysqli_fetch_array($sub0)){@$subs0 = @$subs0 + 1;}

	$sub11=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='CHRISTIAN STUDIES'");
	while ($rowsub11=mysqli_fetch_array($sub11)){@$subs11 = @$subs11 + 1;}

	$sub12=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='YORUBA LANGUAGE'");
	while ($rowsub12=mysqli_fetch_array($sub12)){@$subs12 = @$subs12 + 1;}

	$sub13=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='SECURITY EDUCATION'");
	while ($rowsub13=mysqli_fetch_array($sub13)){@$subs13 = @$subs13 + 1;}

	$sub14=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='PHYSICAL HEALTH EDUCATION'");
	while ($rowsub14=mysqli_fetch_array($sub14)){@$subs14 = @$subs14 + 1;}

	$sub15=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='AGRICULTURAL SCIENCE'");
	while ($rowsub15=mysqli_fetch_array($sub15)){@$subs15 = @$subs15 + 1;}

	$sub16=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='CREATIVE ARTS'");
	while ($rowsub16=mysqli_fetch_array($sub16)){@$subs16 = @$subs16 + 1;}

	$sub17=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='FRENCH LANGAUGE'");
	while ($rowsub17=mysqli_fetch_array($sub17)){@$subs17 = @$subs17 + 1;}

	$sub18=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id' and teacher_subject='MUSIC'");
	while ($rowsub18=mysqli_fetch_array($sub18)){@$subs18 = @$subs18 + 1;}


} 
else {		
header("Location: index.php");
		exit;
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

	<div class="container"><br>
	  <div class="col-lg-12">
	
		<div class="row">
		
			<div id="form-content"><br>
<table width="100%" border="0" class="table table-striped">
  <tr>
    <td colspan="2" align="center"><strong>SCHOOL DETAIL PAGE</strong></td>
    </tr>
  <tr>
    <td><strong>School Name</strong></td>
    <td><?php echo $school_name;?></td>
</tr>
  <tr>
    <td><strong>Student Population</strong></td>
    <td><?php echo $student_population;?></td>
</tr>
  <tr>
    <td><strong>Location</strong></td>
    <td><?php echo $school_location;?></td>
</tr>
  <tr>
    <td><strong>Phone Number</strong></td>
    <td><?php echo $school_contact;?></td>
</tr>
  <tr>
    <td><strong>Address</strong></td>
    <td><?php echo $school_address;?></td>
</tr>
  <tr>
    <td colspan="2" align="center"><strong>Subject and Teacher Available</strong></td>
    </tr>
  <tr>
    <td><strong>MATHEMATICS</strong></td>
    <td><?php if (@$subs1 < 1){echo "0";} else {echo @$subs1;} ?></td>
</tr>
  <tr>
    <td><strong>ENGLISH LANGUAGE</strong></td>
    <td><?php if (@$subs2 < 1){echo "0";} else {echo @$subs2;} ?></td>
</tr>
  <tr>
    <td><strong>BASIC SCIENCE</strong></td>
    <td><?php if (@$subs3 < 1){echo "0";} else {echo @$subs3;} ?></td>
</tr>
  <tr>
    <td><strong>SOCIAL STUDIES</strong></td>
    <td><?php if (@$subs4 < 1){echo "0";} else {echo @$subs4;} ?></td>
</tr>
  <tr>
    <td><strong>BUSINESS STUDIES</strong></td>
    <td><?php if (@$subs5 < 1){echo "0";} else {echo @$subs5;} ?></td>
</tr>
  <tr>
    <td><strong>HOME ECONOMICS</strong></td>
    <td><?php if (@$subs6 < 1){echo "0";} else {echo @$subs6;} ?></td>
</tr>
  <tr>
    <td><strong>BASIC TECHNOLOGY</strong></td>
    <td><?php if (@$subs7 < 1){echo "0";} else {echo @$subs7;} ?></td>
</tr>
  <tr>
    <td><strong>COMPUTER SCIENCE</strong></td>
    <td><?php if (@$subs8 < 1){echo "0";} else {echo @$subs8;} ?></td>
</tr>
  <tr>
    <td><strong>CIVIC EDUCATION</strong></td>
    <td><?php if (@$subs9 < 1){echo "0";} else {echo @$subs9;} ?></td>
</tr>
  <tr>
    <td><strong>ISLAMIC STUDIES</strong></td>
    <td><?php if (@$subs0 < 1){echo "0";} else {echo @$subs0;} ?></td>
</tr>
  <tr>
    <td><strong>CHRISTIAN STUDIES</strong></td>
    <td><?php if (@$subs11 < 1){echo "0";} else {echo @$subs11;} ?></td>
</tr>
  <tr>
    <td><strong>YORUBA LANGUAGE</strong></td>
    <td><?php if (@$subs12 < 1){echo "0";} else {echo @$subs12;} ?></td>
</tr>
  <tr>
    <td><strong>SECURITY EDUCATION</strong></td>
    <td><?php if (@$subs13 < 1){echo "0";} else {echo @$subs13;} ?></td>
</tr>
  <tr>
    <td><strong>PHYSICAL HEALTH EDUCATION</strong></td>
    <td><?php if (@$subs14 < 1){echo "0";} else {echo @$subs14;} ?></td>
</tr>
  <tr>
    <td><strong>AGRICULTURAL SCIENCE</strong></td>
    <td><?php if (@$subs15 < 1){echo "0";} else {echo @$subs15;} ?></td>
</tr>
  <tr>
    <td><strong>CREATIVE ARTS</strong></td>
    <td><?php if (@$subs16 < 1){echo "0";} else {echo @$subs16;} ?></td>
</tr>
  <tr>
    <td><strong>FRENCH LANGAUGE</strong></td>
    <td><?php if (@$subs17 < 1){echo "0";} else {echo @$subs17;} ?></td>
</tr>
  <tr>
    <td><strong>MUSIC</strong></td>
    <td><?php if (@$subs18 < 1){echo "0";} else {echo @$subs18;} ?></td>
</tr>

</table><br><br>
		  </div>
            
            </div>
		
	</div>
	
</div>
	
</div>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>