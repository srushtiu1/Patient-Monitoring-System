<html>
	<head>
		
		<style>
			.wait1{
			background-color:red;
			}
			.wait2{
			background-color: #f2f2f2;
			}
		</style>
	</head>
	<body>
		<form action="search_pay.php" method="post">
		<?php 
include ("connection.php");
//include ("patient_info.php");
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:sa');
//echo "Current time=" .substr($time,11,10);
//echo date("G:i", strtotime($time));

$sql="SELECT patient_details.*,visits.*,bill.*
FROM patient_details 
JOIN bill
JOIN visits
ON patient_details.p_id=visits.v_p_id and patient_details.p_id=bill.b_p_id 
WHERE visits.v_date='$date' and bill.b_date='$date' and bill.b_p_id=patient_details.p_id and patient_details.p_id=visits.v_p_id";
$result = mysqli_query($link,$sql);
echo '<div class="panel-body">
<table class="table table-hover table-bordered">
<thead>
	<tr>
	 <th ></th>
	 <th>Name</th>
<th>Checkin Time</th>
<th>Bill No.</th>
<th>Bill Amount</th>
<th>Bill Balance</th>

</tr>
</thead>';
while($row = mysqli_fetch_array($result))
		{
	if($row['v_chkin']!='no')
			
	{
		if($row['b_bal']>0)
		{
			
$strStart = $row['v_chkin_time']; 
   $strEnd   = date('Y-m-d H:i:s'); 
 $dteStart = new DateTime($strStart); 
   $dteEnd   = new DateTime($strEnd); 
$dteDiff  = $dteStart->diff($dteEnd);    //print $dteDiff->format("%H:%I:%S"); 
$wait=$dteDiff->format("%H:%I:%S"); 
echo "<tr>";
		echo '<input type="hidden" name = "b" value="' . $row['b_p_id'] . '" />';
		echo '<input type="hidden" name = "b_no" value="' . $row['b_no'] . '" />';
			echo " <td>" . '<input type="radio" name="check" value="' . $row['b_no'] .'">' . "</td>";
			echo  "<td>" . $row['p_fname']." ". $row['p_lname']. "</td>" ;
	
			echo " <td>" . substr($row['v_chkin_time'],11,8). "</td>" ;
		
		echo " <td>" . $row['b_no'] . "</td>";
			echo " <td>" . $row['b_amt'] . "</td>";
		echo " <td>" . $row['b_bal'] . "</td>";
		//echo " <td>" .'<input type="text" name="p_amt" value=" ">'. "</td>" ;
		
		//echo " <td>" .$_GET['check']. "</td>" ;
			 echo "</tr>";}}
	
}
echo "</table></div>";

?>Enter Amount: <input type='number' name='p_amt'  width='100px'><br><br>
		<button type="submit" value="Make Payment" name="pay" class="btn btn-default"> Make Payment</button>
			<button type="submit1" name="submit1" class="btn btn-danger" style="float:right">CheckOut</button>
			
			</form>
	</body>
</html>