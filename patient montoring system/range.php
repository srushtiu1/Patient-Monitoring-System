<?php
session_start();
include("session.php");
include("connection.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];?>
<html>
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
	<script type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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
	
	.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
	border: 1px solid red;
    border-radius: 5px;
}
.card p{
font-size:30px;	
	
}
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
	.card1 {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
	border: 1px solid green;
    border-radius: 5px;
}
.card1 p{
font-size:30px;	
	
}
.card1:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
	b{
	font-size:14px;	
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
            <li>Waiting Time</li>
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
			 <li><a href="search_pay.php">Current Payment</a></li>
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
       </li><li class="active"><a href="range.php">Waiting Time</a></li>
       <li><a href="export.php">Export Patient Data</a></li>
		</ul>
    </div>
    <div class="col-sm-10 text-left"> 
		
		<br>
      
			<form method="post" action="" >
				
<br><input type="text" name="datefilter" class="form-control" value="" placeholder="Please choose date range" size="10"/>
			<input type="submit" name="submit" class="btn btn-warning"><br>
				</form>
		<?php
if(isset($_POST['submit'])){
$date=$_POST['datefilter'];
$start=substr($date,0,10);
$end=substr($date,13,10);
	
$sd=date('F d Y', strtotime($start));
$ed=date('F d Y', strtotime($end));
$qry="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(w_time))) FROM wait where w_date>='$start' and w_date<='$end'";
$result=mysqli_query($link,$qry);
	//$num_rows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result)){
	if($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))']!=null)
{
	$hr=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],0,2);
		//echo $hr;
	$mi=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],3,2);
		//echo $mi;
	$se=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],6,2);
		//echo $se;
	echo '<div class="row"><div class="col-md-6 col-centered"><b>Waiting Time From</b></div><div class="col-md-6 col-centered"><b>Waiting Time To</b></div></div>'; 
	echo '<div class="row">
	<div class="col-md-6">
<div class="col-md-4">
	<div class="card1">
  	<div class="container">
    <h4><b>Day</b></h4> 
    <p>'.substr($start,8,2).'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Month</b></h4> 
    <p>'.substr($start,5,2).'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Year</b></h4> 
    <p>'.substr($start,0,4).'</p> 
  </div>
</div>
</div>
	</div>

	<div class="col-md-6">
<div class="col-md-4">
	<div class="card1">
  	<div class="container">
    <h4><b>Day</b></h4> 
    <p>'.substr($end,8,2).'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Month</b></h4> 
    <p>'.substr($end,5,2).'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Year</b></h4> 
    <p>'.substr($end,0,4).'</p> 
  </div>
</div>
</div>
	</div>
</div>	';
	echo "<br>";
	echo '<div class="row"><div class="col-md-6 col-centered"><b>Waiting Time Is</b></div></div>';
	echo '<div class="row">
	<div class="col-md-6">
<div class="col-md-4">
	<div class="card">
  	<div class="container">
    <h4><b>Hours</b></h4> 
    <p>'.$hr.'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card">
 
  <div class="container">
    <h4><b>Minutes</b></h4> 
    <p>'.$mi.'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card">
 
  <div class="container">
    <h4><b>Seconds</b></h4> 
    <p>'.$se.'</p> 
  </div>
</div>
</div>
	</div>
</div>	';
}

	else
	{
		echo '<div class="row">
	<div class="col-md-6">
<div class="col-md-4">
	<div class="card">
  	<div class="container">
    <h4><b>Hours</b></h4> 
    <p>00</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card">
 
  <div class="container">
    <h4><b>Minutes</b></h4> 
    <p>00</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card">
 
  <div class="container">
    <h4><b>Seconds</b></h4> 
    <p>00</p> 
  </div>
</div>
</div>
	</div>
</div>	';
	}
}
}
else
{
$qry="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(w_time))),w_date FROM wait";
	
$result=mysqli_query($link,$qry);
while($row = mysqli_fetch_array($result)){
	$y=substr($row['w_date'],0,4);
	$m=substr($row['w_date'],5,2);
	$d=substr($row['w_date'],8,2);
	$hr=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],0,2);
		//echo $hr;
	$mi=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],3,2);
		//echo $mi;
	$se=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],6,2);
		//echo $se;
	echo '<div class="row"><div class="col-md-6 col-centered"><b>Waiting Time From</b></div><div class="col-md-6 col-centered"><b>Waiting Time To</b></div></div>'; 
	echo '<div class="row">
	<div class="col-md-6">
<div class="col-md-4">
	<div class="card1">
  	<div class="container">
    <h4><b>Day</b></h4> 
    <p>'.$d.'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Month</b></h4> 
    <p>'.$m.'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Year</b></h4> 
    <p>'.$y.'</p> 
  </div>
</div>
</div>
	</div>

	<div class="col-md-6">
<div class="col-md-4">
	<div class="card1">
  	<div class="container">
    <h4><b>Day</b></h4> 
    <p>'.date("d").'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Month</b></h4> 
    <p>'.date("m").'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card1">
 
  <div class="container">
    <h4><b>Year</b></h4> 
    <p>'.date("Y").'</p> 
  </div>
</div>
</div>
	</div>
</div>	';
	echo "<br>";
	echo '<div class="row"><div class="col-md-6 col-centered"><b>Waiting Time Is</b></div></div>';
	echo '<div class="row">
	<div class="col-md-6">
<div class="col-md-4">
	<div class="card">
  	<div class="container">
    <h4><b>Hours</b></h4> 
    <p>'.$hr.'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card">
 
  <div class="container">
    <h4><b>Minutes</b></h4> 
    <p>'.$mi.'</p> 
  </div>
</div>
	</div>
	<div class="col-md-4">
	<div class="card">
 
  <div class="container">
    <h4><b>Seconds</b></h4> 
    <p>'.$se.'</p> 
  </div>
</div>
</div>
	</div>
</div>	';
	//echo "<br><h4>The average waiting time till date is <b>". $hr." hours ".$mi." minutes ".$se." seconds</b></h4>";
}
}
?>
			 <?php
if(isset($_POST['submit'])){
$date=$_POST['datefilter'];
$start=substr($date,0,10);
$end=substr($date,13,10);
$sd=date('F d Y', strtotime($start));
$ed=date('F d Y', strtotime($end));
$qry="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(w_time))) FROM wait where w_date>='$start' and w_date<='$end'";
$result=mysqli_query($link,$qry);
while($row = mysqli_fetch_array($result)){
	$hr=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],0,2);
		//echo $hr;
	$mi=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],3,2);
		//echo $mi;
	$se=substr($row['SEC_TO_TIME(AVG(TIME_TO_SEC(w_time)))'],6,2);
		//echo $se;
	//echo "<br><h4>The average waiting time from<b>"." ". $sd." ". "to ".$ed." "."</b>is <b>". $hr." hours ".$mi." minutes ".$se." seconds</b></h4>";
}
}
?>
			
			
<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
		</div>
	 </div>
  
</div>

</body>
</html>