
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
  <tr><?php $detailrate = mysqli_query($conn,"SELECT * FROM standard_tbl WHERE active='1'");
$rowrate=mysqli_fetch_array($detailrate);
$rate=$rowrate['standard_ratio'];
$name=$rowrate['standard_name'];
?>
    <td colspan="7">DETAIL OF PUPIL AND TEACHER RATIO OF SCHOOLS: (<strong><?php echo $rate." Student"." / "."1 Teacher"; ?></strong>)</td>
    </tr>
  <tr>
    <td><strong>No.</strong></td>
    <td><strong>School Name</strong></td>
    <td><strong>Population</strong></td>
    <td><strong>Teacher</strong></td>
    <td><strong>Contact</strong></td>  
    <td><strong>Status</strong></td>  
    <td><strong>Remarks</strong></td>  
<?php 
$conn = mysqli_connect('localhost','root','','lagoseduboard');
$detaila = mysqli_query($conn,"SELECT * FROM school_tbl");
$detailrate = mysqli_query($conn,"SELECT * FROM standard_tbl WHERE active='1'");
$rowrate=mysqli_fetch_array($detailrate);
$rate=$rowrate['standard_ratio'];
while ($detailfetcha=mysqli_fetch_array($detaila)){?>  
<?php

@$no = $no + 1;



//$loan_id=$detailfetcha['loan_id'];
$school_id=$detailfetcha['school_id'];
$school_name=$detailfetcha['school_name'];
$school_location=$detailfetcha['school_location'];
$school_contact=$detailfetcha['school_contact'];
$student_population=$detailfetcha['student_population'];
$teacher=0;
$query=mysqli_query($conn,"SELECT * FROM assign_tbl WHERE school_id='$school_id'");
while ($queryrow=mysqli_fetch_array($query)){@$teacher = @$teacher + 1;}

$potentialteacher=$student_population/$rate;
$remark = $teacher - $potentialteacher;
if ($remark > 0){$mark = "+";} else {$mark = "";}
if ($potentialteacher > $teacher){$stat="red.jpg";} 
elseif ($potentialteacher < $teacher){$stat="orange.jpg";} 
else{$stat="green.jpg";}
?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $school_name; ?></td>
    <td><?php echo $student_population; ?></td>
    <td><?php echo $teacher; ?></td>
    <td><?php echo $school_contact; ?></td>
<td><a href="detail_school.php?page=null&school_id=<?php echo $school_id; ?>" title="<?php echo $school_id; ?>"><img name="" src="onlineapp/ccslogo/<?php echo $stat; ?>" width="60" height="15" alt=""></a></td>  
    <td><?php echo $mark.$remark; ?></td>
</tr> <?php }?>
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