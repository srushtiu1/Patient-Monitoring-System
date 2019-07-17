<?php
session_start();
include("session.php");
			
?>
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
            <li>Add/Edit Doctor Info</li>
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
			 <li class="active"><a href="add_doctor.php">Add/Edit Doctor Info</a></li>
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
       </li><li><a href="range.php">Waiting Time</a></li>
       <li><a href="export.php">Export Patient Data</a></li>
		</ul>
    </div>
    <div class="col-sm-10 text-left"> 
      <form method="post" action="update_doc.php">
     <?php
include ("connection.php");

// Escape user inputs for security
$d_name = mysqli_real_escape_string($link, $_POST['d_name']);
$d_email = mysqli_real_escape_string($link, $_POST['d_email']);
$d_clinic_no = mysqli_real_escape_string($link, $_POST['d_clinic_no']);
$d_mobile_no = mysqli_real_escape_string($link, $_POST['d_mobile_no']);
$d_addr1 = mysqli_real_escape_string($link, $_POST['d_addr1']);
$d_addr2 = mysqli_real_escape_string($link, $_POST['d_addr2']);
$d_city = mysqli_real_escape_string($link, $_POST['d_city']);

$date=date('Y-m-d');
$query="select count(*) as total from doctor where d_name='$d_name' ";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);
//echo $data['total'];
if($data['total']==1)
{
  echo "<div class='alert alert-danger'>
    <strong>"."Doctor already exists"."</strong></div>";
}
else
{
$sql = "INSERT INTO doctor (d_name,d_email,d_clinic_no,d_mobile_no,d_addr1,d_addr2,d_city) VALUES ('$d_name','$d_email','$d_clinic_no','$d_mobile_no','$d_addr1','$d_addr2','$d_city')";
if(mysqli_query($link, $sql)){
    $d_id = $link->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $p_id;
    //echo "Records Add/Make Billed successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
//echo '<input type="hidden" name = "p_id" value="' . $p_id . '" />';
$sql="SELECT * from doctor WHERE d_id='$d_id'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  	{
echo '<div class="panel-body">
  <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Doctor Id</th>';
  echo"<td>".'<input type="text" name = "d_id" value="' . $row["d_id"] . '">' . "</td></tr>";
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

        echo '<button type="submit1" name="submit1" class="btn btn-warning">Update</button>';
			}
?>
			</form>
    </div>
    
      
  </div>
</div>



</body>
</html>
