<?php
session_start();
include("session.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
  <title>Dr. Ashish</title>
  <meta charset="utf-8">
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
	
		<script>
function DisableDrop() {
	document.TheForm.doc.disabled = true;
  document.TheForm.pat.disabled = true;
}

function EnableDrop() {
	document.TheForm.doc.disabled = false;
  document.TheForm.pat.disabled = true;
}
  function EnableDrop1() {
	document.TheForm.pat.disabled = false;
    document.TheForm.doc.disabled = true;
}
			function check() {
     document.getElementById("inp").value=document.getElementById("doc").value;
    } 
			function check1() {
     document.getElementById("inp1").value=document.getElementById("pat").value;
    } </script>
			<script>
		
			</script>

<script>
	$(document).ready(function(){
    $("p").mouseover(function(){
        $("#test").load('new2.php');
    });
    $("p").mouseout(function(){
        setInterval(function() {
					
                    $('#test').load('new2.php');
                },60000);
		$("p").hide();
    });
		
});
</script>
	<script>
function validateForm() {
    var x = document.forms["TheForm"]["p_email"].value;
	if(x!="")
	{
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail Add/Make Billress");
        return false;
    }}
}
</script>
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
		overflow: auto;
		
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
	.text-left{
	overflow: auto;
	}
	      
    /* Formatting search box */
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
           
        </ol>
    </div>
</div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="margin-top:7px">
     
    <ul class="nav navbar-nav navbar-right">
		    <b id="demo" style="color:white;font-size:18px;margin-right:300px"></b>
		   <?php
//echo '<b id="demo" style="color:white;font-size:18px;margin-right:100px"></b>';
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
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
		 <li class="active"><a href="home.php">Home</a></li>
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
	  
    <div class="col-sm-7 text-left"> 
		<p>Show List</p>
		
		<div id="test">
			<form action="new2.php" method="get">
			
			<?php

include "connection.php";
if (isset($_POST['bill'])) {
	if (isset($_POST['check'])) {
		
		$p_id = $_POST['check'];
		
$b_amt=mysqli_real_escape_string($link,$_POST['b_amt']);
$b_bal=mysqli_real_escape_string($link,$_POST['b_amt']);
		$b_date = date('Y-m-d');
		$db="Select p_fname from patient_details where p_id=$p_id";
		$result = mysqli_query($link,$db);
while($row = mysqli_fetch_array($result)){
		 $a=$row['p_fname'];
        }
		
$sql = "INSERT INTO bill (b_p_id, b_date,b_amt,b_bal) VALUES ('$p_id', '$b_date', '$b_amt','$b_bal')";
if(mysqli_query($link, $sql)){
	
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$s="update visits set billed='y' where v_p_id='$p_id'";
  if(mysqli_query($link, $s)){
    //echo "done";
  }
	}}

				?>
				
		</form>
		</div>
		
    </div>
    <div class="col-sm-3 sidenav">
		<div class="form">
     <div class="search-box" >
		
		<form method="post" action="" id="UserDisplayForm">
        <input type="text" autocomplete="off" placeholder="Search ID,name or phone number"  name="na" class="form-control"><br>
		  
        <div class="result"></div>	
		<button type="submit" name="submit" class="btn btn-success">CheckIn</button>
		<button type="submit1" name="submit1" class="btn btn-danger">CheckOut</button><hr>

		<?php
if(isset($_POST['submit'])){
	if($_POST['na']=='' ) {
			 echo "<div class='alert alert-danger'>
    <strong>"."Please Select a Patient"."</strong></div>";}
  else
  {
$name = mysqli_real_escape_string($link,$_POST['na']);
	list($sub) = explode(" ", $name);
$p_id=$sub;
$date=date('Y-m-d');
$time=date('Y-m-d H:i:s');
		$sql ="SELECT COUNT(1) FROM `visits` WHERE v_p_id=$p_id and v_chkin='yes' and `v_date` >= DATE_SUB(NOW(), INTERVAL 1 DAY)";
		$result = mysqli_query($link,$sql);
		//echo $result;
		while($row = mysqli_fetch_array($result))
		{
		if($row['COUNT(1)']>0)
		{
			
			echo "<div class='alert alert-danger'>
    <strong>"."Patient already Checked IN"."</strong></div>";
		}
		else
		{
      $sql="select count(v_p_id) as total from visits where v_p_id=$p_id";
     $result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($result);
//echo $data['total'];
if($data['total']==1)
		{
      $qry="update visits set v_date='$date',v_chkin_time='$time',v_chkout_time='0000-00-00 00:00:00.000000',v_chkin='yes',v_chkout='no',billed='n' where v_p_id=$p_id";
      if(mysqli_query($link, $qry)){
   //echo "Records Add/Make Billed successfully.";
}
    }
      else
      {
$sql1="INSERT into visits (v_p_id,v_date,v_chkin,v_chkin_time,v_chkout,billed) VALUES ('$p_id','$date','yes','$time','no','n') ";
if(mysqli_query($link, $sql1))
{ //echo "Records Add/Make Billed successfully.";
}
		
      }
    }
    }
  }
    }
else if(isset($_POST['submit1'])){
  if($_POST['na']=='' ) {
			 echo "<div class='alert alert-danger'>
    <strong>"."Please Select a Patient"."</strong></div>";}
  else
  {
	$name = mysqli_real_escape_string($link,$_POST['na']);
	list($sub) = explode(" ", $name);
$p_id=$sub;
$time=date('Y-m-d H:i:s');
$sql1="UPDATE visits SET v_chkout='yes', v_chkin='no', v_chkout_time='$time' WHERE   v_p_id='$p_id'";
if(mysqli_query($link, $sql1)){
  $q="select * from visits where v_p_id=$p_id";
  $result=mysqli_query($link,$q);
  while($row=mysqli_fetch_array($result))
  {
    $strStart = $row['v_chkin_time']; 
   $strEnd   = date('Y-m-d H:i:s'); 
 $dteStart = new DateTime($strStart); 
   $dteEnd   = new DateTime($strEnd); 
$dteDiff  = $dteStart->diff($dteEnd);    //print $dteDiff->format("%H:%I:%S"); 
$wait=$dteDiff->format("%H:%I:%S");
	//$interval = ->diff();
	$ss = $row['v_chkin_time'];
$se= $row['v_chkout_time'];
	$ds= new DateTime($ss);
		$de= new DateTime($se);
		$dd  = $ds->diff($de); 
	$interval=$dd->format("%H:%I:%S");
    
  $sql="insert into wait (w_p_id,w_time,w_date) values ('$p_id','$interval','$date')";
  if(mysqli_query($link, $sql))
{ //echo "Records Add/Make Billed successfully.";
}
}}

	else{
			 echo "<div class='alert alert-danger'>
    <strong>"."Please Select a Patient"."</strong></div>";}
  }
}
?>
			
	</form>
    </div>
	  </div>
<form action="patient.php" method="post" role="form" name="TheForm" onsubmit="return validateForm();" >
		
First Name:<span style="color:red;">*</span>
		<input type="text" name="p_fname" placeholder="First name" class="form-control" required style="text-transform: capitalize;"><br>
Middle Name:<span style="color:red;">*</span>
		<input type="text" name="p_mname" placeholder="Middle name" class="form-control" required style="text-transform: capitalize;"><br>
Last Name:<span style="color:red;">*</span>
		<input type="text" name="p_lname" placeholder="Last name" class="form-control" required style="text-transform: capitalize;"><br>
		
Email:<input type="email" class="form-control" id="email" name="p_email" placeholder="Enter email"><br>
	
Phone:<span style="color:red;">*</span> <input name="p_phno" placeholder="Mobile No" class="form-control" required maxlength="10"><br>
DOB:<span style="color:red;">*</span>
	
	 <input type="date" id="dob" name="p_dob" class="form-control" required><br>
 Address:
  <input type="text" id="dob" name="p_f" class="form-control" placeholder="Flat No." size="3">
    <input type="text" id="dob" name="p_h" class="form-control" placeholder="House Name">
  <input type="text" id="dob" name="p_s" class="form-control" placeholder="Street Name">
<input type="text" id="dob" name="p_l" class="form-control" placeholder="Landmark">
  <br>
<!--Address(line1): <input type="text" name="p_addr1" placeholder="Enter Address" class="form-control"><br>
Address(line2): <input type="text" name="p_addr2" placeholder="Enter Address" class="form-control"><br>-->
	City: <input type="text" name="p_city" placeholder="City" class="form-control"><br>
	Pin Code: <input type="text" name="p_pin" placeholder="Pin Code" class="form-control"><br>
Area: <input type="radio" name="p_area" value="thane" > Thane
  <input type="radio" name="p_area" value="mulund" checked> Mulund
	<input type="radio" name="p_area" value="domb"> Bhandup
  <input type="radio" name="p_area" value="other"> Other <br><br>
Suggested By: <input type="radio" name="p_sugg" value="doctor" onclick="EnableDrop();"> Doctor
  <input type="radio" name="p_sugg" value="patient" onclick="EnableDrop1();"> Patient
  <input type="radio" name="p_sugg" value="self" checked value="true" onclick="DisableDrop();"> Self <br><br>

	<select name="doc" id="doc" class="form-control" id="sel1" disabled onChange="check();">
		<option value="">Doctor name</option>
<?php
include "connection.php"; 

$sql="SELECT d_name FROM doctor"; 
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
		 echo '<option value="'.$row["d_name"].'">'.$row["d_name"].'</option>';
        }
	
?>
		
			</select>
	<input type="hidden" name="input" id="inp" value="">
	<select name="pat" id="pat" class="form-control" id="sel1" disabled onChange="check1();">
		<option value="">Patient Name</option>
<?php
include "connection.php"; 

$sql="SELECT p_fname,p_lname FROM patient_details"; 
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
		 echo '<option value="'.$row["p_fname"].'">'.$row["p_fname"]." ".$row["p_lname"].'</option>';
        }
	
?>
			</select>
	<input type="hidden" name="input1" id="inp1" value=""> 
<br><br>Gender: <input type="radio" name="p_gender" value="male" checked> Male
  <input type="radio" name="p_gender" value="female"> Female
 <br><br>
<button type="submit" class="btn btn-default">Add Patient</button>
</form>
	
	
		</div></div>
  </div>

	


</body>
</html>
