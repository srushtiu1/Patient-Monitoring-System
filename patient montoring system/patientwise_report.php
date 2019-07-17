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
		
 <script type="text/javascript"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script>
	$(document).ready(function(){
    $("p").mouseover(function(){
        $("#test").load('pay.php');
    });
    $("p").mouseout(function(){
        setInterval(function() {
					
                    $('#test').load('pay.php');
                },60000);
		$("p").hide();
    });
		
});
	
	
   
</script>
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
	
<!--<script>
    $(document).ready(
            function() {
                setInterval(function() {
                   // var randomnumber = Math.floor(Math.random() * 100);
                    $('#test').load('pay.php');
                }, 7000);
            });
</script>-->
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
	  
	   .search-box{
        width: 256px;
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
       
		 background: #ffffff;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #ffffff;
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
            <li>Patientwise Report</li>
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
<li class="active"><a href="sample.php">Patientwise report</a></li>
	<li><a href="pending_payment_list.php">Outstanding Report</a></li><li><a href="excess.php">Excess Report</a>
       Reports<br>
       </li><li><a href="range.php">Waiting Time</a></li>
       <li><a href="export.php">Export Patient Data</a></li>
		</ul>
    </div>
    <div class="col-sm-7 text-left"> 
      <?php
include ("connection.php");

if(isset($_POST['submit']))
   {
$name = mysqli_real_escape_string($link,$_POST['na']);
	list($sub) = explode(" ", $name);
$p_id=$sub;
	
	$db="select * from patient_details where p_id=$p_id";
	$res = mysqli_query($link,$db);
	while($row = mysqli_fetch_array($res))
		{
		echo '<br>Name of the patient: <b style="font-size:15px">'.$row["p_fname"].' '.$row["p_mname"].' '.$row["p_lname"].'</b>';
		
	}
	
	$pay=0;
$amt=0;
$bal=0;
	$counter = 0;
$sql="SELECT payment.*,patient_details.p_fname,patient_details.p_lname,patient_details.p_id,bill.*
FROM payment 
JOIN bill 
join patient_details
ON (bill.b_no=payment.pm_b_no AND bill.b_p_id=$p_id)
where bill.b_p_id=p_id ";
$result = mysqli_query($link,$sql);

echo '<div class="panel-body">
                                <table class="table table-hover table-bordered">
	<tr>
	<th>Sr No</th>
<th>Payment ID</th>
	<th>Bill Number</th>
	<th>Payment Date</th>
	<th>Bill Amount</th>
	<th>Amount Paid</th>
	<th>Balance Amount</th>
	
	
</tr>';
while($row = mysqli_fetch_array($result))
		{
	//echo 'Name:'. $row['p_fname'] ." ". $row['p_lname'];
			//print_r($row);
	 echo "<tr>";
			echo " <td>" . ++$counter. "</td>";
	
			echo " <td>" . $row['pm_id'] . "</td>";
			echo " <td>" . $row['pm_b_no']. "</td>" ;
			echo " <td>" . date('d M Y', strtotime($row['pm_date'])). "</td>" ;
	echo " <td>" .  $row['b_amt'] . "</td>";
	$amt=$amt+$row['b_amt'];
			echo " <td>" .  $row['pm_amt'] . "</td>";
	$pay=$pay+$row['pm_amt'];
	echo " <td>" .  $row['b_bal'] . "</td>";
	$bal=$bal+$row['b_bal'];
	
			 echo "</tr>";
		}
echo "</table></div>";
	echo '<div class="panel-body">
    <table class="table table-hover table-bordered">
	<tr>
	<th>Total amount </th>';
	echo "<td>".$amt."</td>";
echo "<td>".$pay."</td>";
 echo "<td>".$bal."</td></tr>";
echo "</table></div>";
   }
   else
   {
	   echo "<div class='alert alert-danger'>
    <strong>"."Please Select a Patient"."</strong></div>";
   }
$num_rows = mysqli_num_rows($result);
if($num_rows!=0)
{
$db="select * from patient_details where p_id=$p_id";
	$res = mysqli_query($link,$db);
	while($row = mysqli_fetch_array($res))
		{
		
		echo "<form method='post' action='pat_pdf.php'>";
		echo "<input type='hidden' name='id' value=".$row['p_id'].">";
		echo "<button type='submit' name='s' class='btn btn-warning' formtarget='_blank'>Save as PDF</button>";
		echo "</form>";
	}

}
?>
  </div>
	   <div class="col-sm-3 sidenav">
      <!--<form action="receive_payment.php" method="post">
<select name="owner" class="form-control" id="sel1" size="25">
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
		</form>-->
		<div class="form">
     <div class="search-box" >
		
		<form method="post" action="patientwise_report.php" id="UserDisplayForm">
        <input type="text" autocomplete="off" placeholder="Search ID,name or phone number"  name="na" class="form-control"><br>
		 
        <div class="result"></div>	
		<button type="submit" name="submit" class="btn btn-success">Select</button>
		 </form>
			</div>
			</div>
		</div>
	</div>

	</div>

</body>
</html>
