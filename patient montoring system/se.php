<?php
session_start();
include("session.php");
include("connection.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');?>
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
	<style >
    
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
		.search-box input,input { display: inline-block; vertical-align: middle;}
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("s.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
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
            <li>Edit/Modify </li>
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
			 <li class="active"><a href="se.php">Edit/Modify</a></li> 
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
       </li><li><a href="range.php">Waiting Time</a></li>
       <li><a href="export.php">Export Patient Data</a></li>
		</ul>
    </div>
    <div class="col-sm-10 "> 
		
    <div class="search-box" >
		
		<form method="post" action="" id="UserDisplayForm">
    
        <input type="text" autocomplete="off" placeholder="Search by ID,name or phone number" style="margin:auto;margin-top:10px" name="na">
      <br><br>
		   <input type="submit" name="submit" class="btn btn-warning" value="Edit Basic Details">
      <?php
      if($_SESSION['username']=='admin')
	{
		   echo '<input type="submit" name="submit2" class="btn btn-primary" value="Edit Bill">';
      }
          ?>
     
      
        <div class="result"></div>	
		</form>
    </div>
		<form method="post" action="update_pat.php">
		<?php
    if(isset($_POST['submit'])){
		//echo "hh";
$name = $_POST['na'];
		//echo $name;
list($sub) = explode(" ", $name);
//echo $user; // foo
//$sub=substr($name,0,3);
		//echo $sub;
	$sql="SELECT * from patient_details WHERE p_id='$sub'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  	{
echo '<div class="panel-body">
 <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Patient Id</th>';
  echo"<td>".'<input type="hidden" name = "p_id"  value="' . $row["p_id"] . '">' .$row["p_id"]. "</td></tr>";
echo '<tr><th>First Name</th>';
  echo"<td>".'<input type="text" name = "p_fname" value="' . $row["p_fname"] . '">'  . "</td></tr>";
  echo '<tr><th>Middle Name</th>';
  echo " <td>".'<input type="text" name = "p_mname" value="' . $row["p_mname"] . '">'   . "</td></tr>";
echo '<tr><th>Last Name</th>';
  echo " <td>".'<input type="text" name = "p_lname" value="' . $row["p_lname"] . '">'  . "</td></tr>" ;
	echo '<tr><th>Email Id</th>';
    echo " <td>".'<input type="text" name = "p_email" value="' . $row["p_email"] . '">'  . "</td></tr>" ;
	echo '<tr><th>Phone Number</th>';
  echo " <td>".'<input type="text" name = "p_phno" value="' . $row["p_phno"] . '">' . "</td></tr>";
    echo '<tr><th>Date of Birth</th>';
      echo " <td>".'<input type="text" name = "p_dob" value="' . $row["p_dob"] . '">'  . "</td></tr>";
    echo'<tr><th>Age</th>';
      echo " <td>".'<input type="text" name = "p_age" value="' . $row["p_age"] . '">'   . "</td></tr>";
    echo '<tr><th>Address</th>';
      echo " <td>".'<input type="text" name = "p_addr1" value="' . $row["p_addr1"] . '">'   . "</td></tr>";
	  echo '<tr><th>City</th>';
      echo " <td>".'<input type="text" name = "p_city" value="' . $row["p_city"] . '">'   . "</td></tr>";
	  echo '<tr><th>Pincode</th>';
      echo " <td>".'<input type="text" name = "p_pin" value="' . $row["p_pin"] . '">'   . "</td></tr>";
    echo '<tr><th>Area</th>';
      echo " <td>".'<input type="text" name = "p_area" value="' . $row["p_area"] . '">' . "</td></tr>";
    echo '<tr><th>Suggested By</th>';
      echo " <td>".'<input type="text" name = "p_sugg" value="' . $row["p_sugg"] . '">'  . "</td></tr>";
	echo'<tr><th>Gender</th>';
    echo " <td>".'<input type="text" name = "p_gender" value="' . $row["p_gender"] . '">'   . "</td>";
	
echo'</tr>';
		}
echo "</table></div>";
echo '<button type="submit1" name="submit1" class="btn btn-warning">Update</button>';
    }
      ?>
			</form>
			<form method="post" action="update_doc.php">
		<?php
    if(isset($_POST['submit3'])){
		//echo "hh";
$name = $_POST['na'];
		//echo $name;
$sub=substr($name,0,2);
		//echo $sub;
	$sql="SELECT * from doctor WHERE d_id='$sub'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  	{
echo '<div class="panel-body">
 <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Doctor Id</th>';
  echo"<td>".'<input type="hidden" name = "d_id"  value="' . $row["d_id"] . '">' .$row["d_id"]. "</td></tr>";
echo '<tr><th>Name</th>';
  echo"<td>".'<input type="text" name = "d_name" value="' . $row["d_name"] . '">'  . "</td></tr>";
 
	echo '<tr><th>Email Id</th>';
    echo " <td>".'<input type="text" name = "d_email" value="' . $row["d_email"] . '">'  . "</td></tr>" ;
	echo '<tr><th>Clinic Number</th>';
  echo " <td>".'<input type="text" name = "d_clinic_no" value="' . $row["d_clinic_no"] . '">' . "</td></tr>";
    echo '<tr><th>Mobile Number</th>';
  echo " <td>".'<input type="text" name = "d_mobile_no" value="' . $row["d_mobile_no"] . '">' . "</td></tr>";
    echo '<tr><th>Address</th>';
      echo " <td>".'<input type="text" name = "d_addr1" value="' . $row["d_addr1"] . '">'   . "</td></tr>";
	  echo '<tr><th>City</th>';
      echo " <td>".'<input type="text" name = "d_city" value="' . $row["d_city"] . '">'   . "</td></tr>";
	
echo'</tr>';
		}
echo "</table></div>";
echo '<button type="submit" name="submit4" class="btn btn-warning">Update</button>';
    }
      ?>
			</form>
      <form method="post" action="update_bill.php">
		<?php
    if(isset($_POST['submit2'])){
      if(isset($_POST['na'])){
		//echo "hh";
$name = $_POST['na'];
		//echo $name;
list($sub) = explode(" ", $name);
		//echo $sub;
		//echo $date;
     // $db=mysqli_query($link,"SSELECT bill.*,payment.*,patient_details.* from bill join patient_details join payment on bill.b_p_id=patient_details.p_id WHERE bill.b_p_id=$sub and bill.b_no!=payment.pm_b_no");
	//$num_rows = mysql_num_rows($db);
     
      $sql="SELECT bill.*,payment.*,patient_details.* 
	  from bill 
	  join patient_details 
	  join payment 
	  on bill.b_p_id=patient_details.p_id 
	  WHERE bill.b_p_id=$sub and bill.b_date=$date and bill.b_no!=payment.pm_b_no";
	  
		$result = mysqli_query($link,$sql);
 
      $num_rows = mysqli_num_rows($result);
	  echo $num_rows;
      if($num_rows==0)
      {
        //echo "true";
     $db="SELECT bill.*,patient_details.* from bill join patient_details on bill.b_p_id=patient_details.p_id WHERE bill.b_p_id=$sub and bill.b_date=$date";   
        $res = mysqli_query($link,$db);
while($row = mysqli_fetch_array($res))
  	{
echo '<div class="panel-body">
 <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Patient Id</th>';
  echo"<td>".'<input type="hidden" name = "p_id"  value="' . $row["p_id"] . '">' .$row["p_id"] . "</td></tr>";
echo '<tr><th>Name</th>';
  echo"<td>".'<input type="hidden" name = "p_name" value="' . $row["p_fname"] . '">'  .$row["p_fname"] . "</td></tr>";
 
	echo '<tr><th>Bill Number</th>';
    echo " <td>".'<input type="hidden" name = "b_no" value="' . $row["b_no"] . '">'  .$row["b_no"] . "</td></tr>" ;
  echo '<tr><th>Bill Date</th>';
    echo " <td>".'<input type="hidden" name = "b_date" value="' . $row["b_date"] . '">'  .$row["b_date"] . "</td></tr>" ;
  echo '<tr><th>Original Bill Amount</th>';
  echo " <td>".'<input type="hidden" name = "b_amt" value="' . $row["b_amt"] . '">' .$row["b_amt"] . "</td></tr>";
	//echo '<tr><th>Enter New Bill Amount</th>';
  //echo " <td>".'<input type="text" name = "bill_amt" >' . "</td></tr>";
   
	
echo'</tr>';
		}
echo "</table></div>";
        
      }
      else{
		  //echo "true";
      $result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  	{
echo '<div class="panel-body">
 <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Patient Id</th>';
  echo"<td>".'<input type="hidden" name = "p_id"  value="' . $row["p_id"] . '">' .$row["p_id"] . "</td></tr>";
echo '<tr><th>Name</th>';
  echo"<td>".'<input type="hidden" name = "p_name" value="' . $row["p_fname"] . '">'  .$row["p_fname"] . "</td></tr>";
 
	echo '<tr><th>Bill Number</th>';
    echo " <td>".'<input type="hidden" name = "b_no" value="' . $row["b_no"] . '">'  .$row["b_no"] . "</td></tr>" ;
  echo '<tr><th>Bill Date</th>';
    echo " <td>".'<input type="hidden" name = "b_date" value="' . $row["b_date"] . '">'  .$row["b_date"] . "</td></tr>" ;
  echo '<tr><th>Original Bill Amount</th>';
  echo " <td>".'<input type="hidden" name = "b_amt" value="' . $row["b_amt"] . '">' .$row["b_amt"] . "</td></tr>";
	
  
   
	
echo'</tr>';
		}
echo "</table></div>";}
      echo 'Enter New Bill Amount:<input type="number" name = "bill_amt" >' ;
echo '<button type="submit" name="submit5" class="btn btn-warning">Update</button>';
    }}
      ?>
			</form>
		</div>
	  
  </div>
</div>
</body>
</html>