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
            <li>Make Bill</li>
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
    <div class="col-sm-7 text-left"> 
      <form action="bill.php" method="post">
		<?php
		include ("connection.php");

//include ("patient_info.php");
$doc = explode("_",$_POST['owner']);
$p_id = $doc[0];
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:sa');
echo "Current time=" .substr($time,11,10);
//echo date("G:i", strtotime($time));

$sql="SELECT patient_details.p_fname,patient_details.p_id,patient_details.p_lname,visits.*
FROM patient_details 
JOIN visits
ON patient_details.p_id=visits.v_p_id
WHERE visits.v_date='$date' and visits.v_p_id=$p_id";
$result = mysqli_query($link,$sql);
echo '<div class="panel-body">
                                <table class="table table-hover table-bordered">
<thead>
	<tr>
	 <th ></th>
<th>Name</th>

<th>Checkin Time</th>
<th>Wait Time</th>

<th>Bill Amount</th>

</tr>
</thead>';
while($row = mysqli_fetch_array($result))
		{
	if($row['v_chkin']!='no')
			{
$strStart = $row['v_chkin_time']; 
   $strEnd   = date('Y-m-d H:i:s'); 
 $dteStart = new DateTime($strStart); 
   $dteEnd   = new DateTime($strEnd); 
$dteDiff  = $dteStart->diff($dteEnd);    //print $dteDiff->format("%H:%I:%S"); 
$wait=$dteDiff->format("%H:%I:%S"); 
echo "<tr>";
		echo '<input type="hidden" name = "p_id" value="' . $row['p_id'] . '" />';
			echo " <td>" . '<input type="radio" name="check" value="' . $row['p_id'] .'">' . "</td>";
			echo  "<td>" . $row['p_fname']." " . $row['p_lname']. "</td>" ;
	
			echo " <td>" . substr($row['v_chkin_time'],11,8). "</td>" ;
		
		if($wait>"00:00:00" && $wait<"00:30:00" )
		{
			echo "<td >". $wait."</td>";}
		elseif($wait>"00:30:00" && $wait<"01:00:00")
		{
			
	echo "<td  bgcolor='#d9534f'  style='text-color:white;height:10px;'>". $wait."</td>";
			echo '</div>';
		}
		elseif($wait>"01:00:00" )
		{
	
	echo "<td  bgcolor='#5cb85c'  style='text-color:white;height:10px;'>". $wait."</td>";
			
		}
		elseif($wait>"00:01:00" && $wait<"00:01:00" )
			echo "<td >". $wait."</td>";
			//echo " <td>" . $row['b_amt'] . "</td>";
		if($_SESSION['username']=='admin')
		echo " <td>" ."<input type='text' name='b_amt' value='250'>". "</td>" ;
		else
			echo " <td>" ."<input type='text' name='b_amt' value='250' disabled>". "</td>" ;
		
		//echo " <td>" .$_GET['check']. "</td>" ;
			 echo "</tr>";}
	
	$time=date('Y-m-d H:i:s');
	 $End   = substr($time,11,8); 
	
	if($End>"23:59:59")
	{
$sql1="UPDATE visits SET v_chkout='yes', v_chkin='no', v_chkout_time='$time' WHERE v_chkin='yes' and v_date='$date'";
if(mysqli_query($link, $sql1)){
   //echo "Records Add/Make Billed successfully.";
}
}
	
}
echo "</table></div>";

$query="SELECT * from visits";
if('v_chkout'=="yes")
{	
$sql1="INSERT into wait (wait_time) VALUES ('$wait')";
if(mysqli_query($link, $sql1)){
   // $p_id = $link->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $p_id;
    echo "Records Add/Make Billed successfully.";
}
}


?>
			 <?php

	if($_SESSION['username']=='admin')
		echo '<button type="submit" value="Make Bill" name="bill" class="btn btn-default"> Make Bill</button>';
			?>
			</form>
  </div>
	  <div class="col-sm-3 sidenav">
   <form action="searched.php" method="post">
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
