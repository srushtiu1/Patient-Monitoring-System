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
            <li>Add/Make Bill</li>
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
       </li><li><a href="range.php">Waiting Time</a></li>
       <li><a href="export.php">Export Patient Data</a></li>
		</ul>
    </div>
    <div class="col-sm-10 text-left"> 
      <form method="post" action="update_pat.php">
     <?php
include ("connection.php");

// Escape user inputs for security
$p_fname = mysqli_real_escape_string($link, $_POST['p_fname']);
$p_mname = mysqli_real_escape_string($link, $_POST['p_mname']);
$p_lname = mysqli_real_escape_string($link, $_POST['p_lname']);
$p_email = mysqli_real_escape_string($link, $_POST['p_email']);
$p_phno = mysqli_real_escape_string($link, $_POST['p_phno']);
$p_dob = mysqli_real_escape_string($link, $_POST['p_dob']);
//$p_age = mysqli_real_escape_string($link, $_POST['p_age']);
$p_f = mysqli_real_escape_string($link, $_POST['p_f']);
$p_h = mysqli_real_escape_string($link, $_POST['p_h']);
$p_s = mysqli_real_escape_string($link, $_POST['p_s']);
$p_l = mysqli_real_escape_string($link, $_POST['p_l']);
//$p_addr2 = mysqli_real_escape_string($link, $_POST['p_addr2']);
$p_city = mysqli_real_escape_string($link, $_POST['p_city']);
$p_pin = mysqli_real_escape_string($link, $_POST['p_pin']);
$p_area = mysqli_real_escape_string($link, $_POST['p_area']);
$p_sugg = mysqli_real_escape_string($link, $_POST['p_sugg']);
$input=mysqli_real_escape_string($link, $_POST['input']);
$input1=mysqli_real_escape_string($link, $_POST['input1']);
$p_gender = mysqli_real_escape_string($link, $_POST['p_gender']);
function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}
$arr=array($p_f,$p_h);
$arr1=array($p_s,$p_l);
$p_addr1=implode(",",$arr);
$p_addr2=implode(",",$arr1);


$dob = mysqli_real_escape_string($link, $_POST['p_dob']);
//echo ageCalculator($dob);
	$p_age=ageCalculator($dob);
// attempt insert query execution
$date=date('Y-m-d');
$query="select count(*) as total from patient_details where p_fname='$p_fname' and p_mname='$p_mname' and p_lname='$p_lname'";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);
//echo $data['total'];
if($data['total']==1)
{
  echo "<div class='alert alert-danger'>
    <strong>"."Patient already exists"."</strong></div>";
}
else
{
$sql = "INSERT INTO patient_details (p_fname, p_mname,p_lname,p_email,p_phno,p_dob,p_age,p_addr1,p_addr2,p_city,p_pin,p_area,p_sugg,doctor,patient,p_gender) VALUES ('$p_fname', '$p_mname', '$p_lname','$p_email','$p_phno','$p_dob','$p_age','$p_addr1','$p_addr2','$p_city','$p_pin','$p_area','$p_sugg','$input','$input1','$p_gender')";
if(mysqli_query($link, $sql)){
    $p_id = $link->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $p_id;
    //echo "Records Add/Make Billed successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
//echo '<input type="hidden" name = "p_id" value="' . $p_id . '" />';
$sql="SELECT * from patient_details WHERE p_id='$p_id'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  	{
echo '<div class="panel-body">
  <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Patient Id</th>';
  echo"<td>".'<input type="text" name = "p_id" value="' . $row["p_id"] . '">' . "</td></tr>";
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
 echo '<tr><th>Pin Code</th>';
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
    </div>
    
      
  </div>
</div>



</body>
</html>
