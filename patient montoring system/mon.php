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
    
   .text-left{
	padding-top: 20px;
     
      height: 100%;
	text-align:left;
		overflow: auto;
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
            <li>Monthly Report</li>
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
	   
	echo "<li class='active'><a href='monthly.php'>Monthly Report</a></li>";
	
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
$stud = explode("_",$_POST['owner']);
$p_id = $stud[0];
//echo "<input type='hidden' name='id' value=".$p_id.">";
$st = explode("_",$_POST['own']);
$p = $st[0];
//echo "<input type='hidden' name='id' value=".$p.">";
echo $p_id."-".$p;
$pay=0;
$counter = 0;
$sql="SELECT payment.*,bill.*,patient_details.* FROM payment Join bill join patient_details WHERE MONTH(pm_date)='$p_id' and YEAR(pm_date)='$p' and payment.pm_b_no=bill.b_no and bill.b_p_id=patient_details.p_id";
$result = mysqli_query($link,$sql);
echo '<div class="panel-body">
    <table class="table table-hover table-bordered">
	<tr>
	<th>Sr No</th>
    <th>Payment ID</th>
	<th>Bill Number</th>
	<th>Payment Date</th>
	<th>Payment Amount</th>
	
</tr>';
while($row = mysqli_fetch_array($result))
		{
			//print_r($row);
	 echo "<tr>";
			echo " <td>" . ++$counter. "</td>";
			echo " <td>" . $row['pm_id'] . "</td>";
			echo " <td>" . $row['pm_b_no']. "</td>" ;
			echo " <td>" . date('d M Y', strtotime($row['pm_date'])). "</td>" ;
			echo " <td>" .  $row['pm_amt'] . "</td>";
	$pay=$pay+$row['pm_amt'];
			 echo "</tr>";
		}
echo "</table></div>";
echo '<div class="panel-body">
    <table class="table table-hover table-bordered">
	<tr>
	<th>Total amount received</th>';
	
 echo "<td>".$pay."</td></tr>";
echo "</table></div>";

$num_rows = mysqli_num_rows($result);
if($num_rows!=0)
{

		
		echo "<form method='post' action='mon1_pdf.php'>";
		echo "<input type='hidden' name='id' value=".$p_id.">";
	    echo "<input type='hidden' name='p' value=".$p.">";
		echo "<button type='submit' name='s' class='btn btn-warning' formtarget='_blank'>Save as PDF</button>";
		echo "</form>";
	

}


?>
  </div>
	  <div class="col-sm-3 sidenav">
      <form action="mon.php" method="post">
		<select name="owner" class="form-control" id="sel1">
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select><br>
		  <select name="own" class="form-control" id="sel1">
    <option value="2016">2016</option>
    <option value="2017" selected>2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
</select><br>
			<button type="submit" class="btn btn-default">Search</button>
		</form>
    </div>
</div>


	</div>
</body>
</html>
