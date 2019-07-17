<?php
session_start();
include("session.php");

		$_SESSION['url'] = $_SERVER['REQUEST_URI'];?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dr. Ashish</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
		
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 635px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
	text-align:left;
    }
    
   
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: 614px;
        padding: 15px;
      }
      .row.content {height:614px;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <div class="row">
    <div class="col-xs-12 voffset-xs-2" style="top:10px">
        <ol class="breadcrumb">
            <li><a href="home.php" >Home</a></li>
            <li>Receive Payment</li>
        </ol>
    </div>
</div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="margin-top:7px">
     
    <ul class="nav navbar-nav navbar-right">
      
     <b id="demo" style="color:white;font-size:18px;margin-right:300px"></b>
		   <?php
//echo '<b id="demo" style="color:white;font-size:18px;margin-right:100px"></b>';

	if($_SESSION['username']=='admin')
		echo '<b style="color:white;font-size:18px">Welcome '.$_SESSION["username"].'</b>';
		?>
      <!--<b id="demo" style="color:white;margin-top:20px;"></b>-->
<a href="logout.php"> <button type="button" class="btn btn-default btn-md">
	 
          Log out
        </button> </a>
<script>
var d = new Date();
document.getElementById("demo").innerHTML = d.toDateString();
</script>

      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <ul class="nav nav-pills nav-stacked">
		 <li ><a href="home.php">Home</a></li>
Patient/Doctor<br>
  <?php if($_SESSION['username']=='admin')
			 echo '<li><a href="patient_info.php">Make Bill</a></li>'; ?>
			 <li ><a href="add_doctor.php">Add/Edit Doctor Info</a></li>
			 <li><a href="se.php">Edit/Modify</a></li> 
<li ><a href="checkin.php">Todays Status</a></li>
Receive Payment<br>
			 <li class="active"><a href="search_pay.php">Current Payment</a></li>
			 <li><a href="outstanding_payment.php">Outstanding Payment</a></li>
Payement Reports<br>
			 <?php
		 if($_SESSION['username']=='admin')
			 echo '<li ><a href="daily_payment_report.php">Daily Report</a></li>';
		 else
			 echo '<li ><a href="today.php">Todays Report</a></li>';
?>
		
			  <?php

	if($_SESSION['username']=='admin')
	   
	echo "<li ><a href='monthly.php'>Monthly Report</a></li>";
	
?> 
<li><a href="sample.php">Patientwise report</a></li>
	<li><a href="pending_payment_list.php">Outstanding Report</a></li><li><a href="excess.php">Excess Report</a>
       Reports<br>
       </li><li><a href="range.php">Waiting Time</a></li>
       <li><a href="export.php">Export Patient Data</a></li>
		</ul>
    </div>
    <div class="col-sm-7 text-left"> 
      <?php
include ("connection.php");
$pm_b_no = $_POST['check'];
$b_amt=mysqli_real_escape_string($link,$_POST['pm_amt']);
$b_bal=mysqli_real_escape_string($link,$_POST['pm_amt']);
		$b_date = date('Y-m-d');
		$query="select b_bal from bill where b_no='$pm_b_no'";
		$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
		if($b_amt==$row['b_bal'])
$sql = "INSERT INTO payment (pm_b_no, pm_date,pm_amt,excess,pending) VALUES ('$pm_b_no', '$b_date', '$b_amt',0,0)";
		else if($b_amt>$row['b_bal'])
		{
			$excess=$b_amt-$row['b_bal'];
			$sql = "INSERT INTO payment (pm_b_no, pm_date,pm_amt,excess,pending) VALUES ('$pm_b_no', '$b_date', '$b_amt','$excess',0)";}
			else if($b_amt<$row['b_bal'])
			{$pending=$row['b_bal']-$b_bal;
		$sql = "INSERT INTO payment (pm_b_no, pm_date,pm_amt,excess,pending) VALUES ('$pm_b_no', '$b_date', '$b_amt',0,'$pending')";}
if(mysqli_query($link, $sql)){
	$pm_id = $link->insert_id;
	//echo "<div class='alert alert-success'>
    //<strong>Success!</strong>" . "Amount paid for". " $a" .""."</div>";
    //echo "New record created successfully. Last inserted ID is: " . $p_id;
    //echo "Records Add/Make Billed successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//echo '<input type = "number" name = "pm_id" value="' . $pm_id . '" />';
$sql1="UPDATE bill JOIN payment ON (bill.b_no=payment.pm_b_no and pm_id='$pm_id') SET bill.b_bal=bill.b_bal-payment.pm_amt";
 if(mysqli_query($link, $sql1)){
    //echo "Records added successfully.";
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}}
mysqli_close($link);
	
?>
  </div>
	   <div class="col-sm-3 sidenav">
		
      <form action="receive_payment.php" method="post">
<select name="owner" class="form-control" id="sel1" size="5">
<?php
include "connection.php"; 

$sql="SELECT p_id,p_fname,p_lname FROM patient_details order by p_fname"; 
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
		 echo '<option value="'.$row["p_id"].'">'.$row["p_fname"]." ".$row["p_lname"].'</option>';
        }
	
?>
			</select><br>
		<button type="submit" class="btn btn-default">Search Patient</button>
		</form>
		</div>
</div>
	</div>


</body>
</html>
