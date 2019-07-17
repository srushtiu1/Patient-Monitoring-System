<html>
	<head>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>

	</head>
	<body>
		<form action="patient_info.php" method="post" onsubmit="return confirm('Are you sure you want to submit this form?');">
		<?php 

session_start();
include ("connection.php");

//include ("patient_info.php");
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:sa');
//echo $date;
echo "Current time=" .substr($time,11,10);
//echo date("G:i", strtotime($time));

$sql="SELECT patient_details.p_fname,patient_details.p_id,patient_details.p_lname,visits.*
FROM patient_details 
JOIN visits
ON patient_details.p_id=visits.v_p_id
WHERE visits.v_date='$date' ";
$result = mysqli_query($link,$sql);
echo '<div class="panel-body">
<table class="table table-hover table-bordered">
<thead>
	<tr>
	 <th ></th>
<th>Name</th>
<th>Checkin Time</th>
<th>Wait Time</th>
<th>Status</th>
</tr>
</thead>';
while($row = mysqli_fetch_array($result))
		{
	
$strStart = $row['v_chkin_time']; 
   $strEnd   = date('Y-m-d H:i:s'); 
 $dteStart = new DateTime($strStart); 
   $dteEnd   = new DateTime($strEnd); 
$dteDiff  = $dteStart->diff($dteEnd);    //print $dteDiff->format("%H:%I:%S"); 
$wait=$dteDiff->format("%H:%I:%S"); 
		$ss = $row['v_chkin_time'];
$se= $row['v_chkout_time'];
	$ds= new DateTime($ss);
		$de= new DateTime($se);
		$dd  = $ds->diff($de); 
	$interval=$dd->format("%H:%I:%S");
echo "<tr>";
		
		echo '<input type="hidden" name = "p_id" value="' . $row['p_id'] . '" />';
		if($row['billed']!='y' && $row['v_chkin']!='no')
			echo " <td >" . '<input type="radio" name="check" value="' . $row['p_id'] .'">' . "</td>";
	else if($row['v_chkin']=='no' )
		echo " <td class='success'>" . '<input type="radio" name="check" value="' . $row['p_id'] .'" disabled >' . "</td>";
		else
			echo " <td class='danger'>" . '<input type="radio" name="check" value="' . $row['p_id'] .'" disabled >' . "</td>";
			echo  "<td>" . $row['p_fname']." " . $row['p_lname']. "</td>" ;
	
			echo " <td>" . substr($row['v_chkin_time'],11,8). "</td>" ;
		if($row['v_chkin']=='no')
			echo "<td  bgcolor='#CDFAF9'  style='text-color:white;height:10px;' >". $interval."</td>";
	else
	{
		if($wait>"00:00:00" && $wait<"00:30:00" )
		{
			echo "<td  bgcolor='#5cb85c'  style='text-color:white;height:10px;' >". $wait."</td>";}
		elseif($wait>"00:30:00" && $wait<"01:00:00")
		{
			
	echo "<td  bgcolor='#f0ad4e'  style='text-color:white;height:10px;'>". $wait."</td>";
			echo '</div>';
		}
		elseif($wait>"01:00:00" )
		{
	
	echo "<td  bgcolor='#d9534f'  style='text-color:white;height:10px;'>". $wait."</td>";
			
		}
		elseif($wait>"00:01:00" && $wait<"00:01:00" )
			echo "<td >". $wait."</td>";
	}
	
	if($row['billed']=='y' && $row['v_chkin']=='yes')
		echo "<td >Billed</td>";
	else if($row['v_chkin']=='yes')
		echo "<td >Checked In</td>";
	else if($row['v_chkin']=='no')
		echo "<td >Checked Out</td>";
		
			 echo "</tr>";}
	
	$time=date('Y-m-d H:i:s');
	 $End   = substr($time,11,8); 
	
	if($End>"23:59:59")
	{
$sql1="UPDATE visits SET v_chkout='yes', v_chkin='no', v_chkout_time='$time' ' WHERE v_chkin='yes' and v_date='$date'";
if(mysqli_query($link, $sql1)){
   //echo "Records Add/Make Billed successfully.";
}
}
	

echo "</table></div>";
 

	if($_SESSION['username']=='admin')
	{
		echo "Enter Amount: <input type='number' name='b_amt'  width='100px'><br><br>";
		echo '<button type="submit" value="Make Bill" name="bill" class="btn btn-default" > Make Bill</button>';
	}		
?>

			<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
			</form>
		
		
	</body>
</html>