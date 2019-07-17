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
            $.get("d.php", {term: inputVal}).done(function(data){
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
	  
    <div class="col-sm-5 text-left"> 
		
<form action="doctor.php" method="post" role="form" name="TheForm" onsubmit="return validateForm();" >
		
Name:<span style="color:red;">*</span>
		<input type="text" name="d_name" placeholder="Name" class="form-control" required style="text-transform: capitalize;"><br>
Clinic number:<span style="color:red;">*</span> <input name="d_clinic_no" placeholder="Clinic No" class="form-control" required maxlength="13"><br>
Mobile number:<span style="color:red;">*</span> <input name="d_mobile_no" placeholder="Mobile No" class="form-control" required maxlength="10"><br>

Address(line1): <input type="text" name="d_addr1" placeholder="Enter Address" class="form-control"><br>
Address(line2): <input type="text" name="d_addr2" placeholder="Enter Address" class="form-control"><br>
	City: <input type="text" name="d_city" placeholder="City" class="form-control"><br>
 Email:<input type="email" class="form-control" id="email" name="d_email" placeholder="Enter email"><br>

<button type="submit" class="btn btn-primary">Add Info</button>
</form>
	
	
		</div>
   <div class="col-sm-5 sidenav">
     <div class="search-box" >
		
		<form method="post" action="" id="UserDisplayForm">
      
      <input type="text" autocomplete="off" placeholder="Search by ID,name or phone number" style="margin:auto;margin-top:10px" name="na"><br>
          <br><input type="submit" name="submit3" class="btn btn-success" value="Edit Doctor Info">
      
        <div class="result"></div>	
		</form>
       <form method="post" action="update_doc.php">
		<?php
include "connection.php";
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
$num_rows = mysqli_num_rows($result);
if($num_rows!=0)
{
echo '<button type="submit" name="submit4" class="btn btn-warning">Update</button>';
}
    }
      ?>
			</form>
    </div>
     
    </div>
  </div>
  </div>

	


</body>
</html>
