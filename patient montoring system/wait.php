<?php
include ("connection.php");
$counter=0;
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
$time=date('Y-m-d H:i:sa');
//echo "Current time=" .substr($time,11,10);
$sql="SELECT visits.*,patient_details.*
FROM visits 
JOIN patient_details 
ON visits.v_p_id=patient_details.p_id 
WHERE visits.v_date='$date'";
$result = mysqli_query($link,$sql);
echo '<div class="panel-body">
<table class="table table-hover table-bordered">
<thead>
<tr>
<th>Sr. No.</th>
<th>Patient Name</th>
<th>Checkin Time</th>
<th>Checkout Time</th>
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
	//$interval = ->diff();
	$ss = $row['v_chkin_time'];
$se= $row['v_chkout_time'];
	$ds= new DateTime($ss);
		$de= new DateTime($se);
		$dd  = $ds->diff($de); 
	$interval=$dd->format("%H:%I:%S");
			//print_r($row);
	 
	 echo "<tr>";
			echo "<td>" .++$counter."</td>";
			echo " <td>" . $row['p_fname'] . " ".$row['p_lname']. "</td>";
			echo " <td>" . substr($row['v_chkin_time'],11,8). "</td>";
	echo " <td>" . substr($row['v_chkout_time'],11,8). "</td>";
	if($row['v_chkout_time']>"00:00:00")
		{
			echo "<td >".$interval. "</td>";}
		else
		{
			
	echo "<td  >".$wait ."</td>";
			
		}
	
	if($row['v_chkout_time']>"00:00:00")
		{
			echo "<td bgcolor='#d9534f' style='border-radius:25px;text-color:white'>". "Checked Out". "</td>";}
		else
		{
			
	echo "<td  bgcolor='#5cb85c' style='border-radius:25px;'>". "Checked In"."</td>";
			
		}
			 echo "</tr>";
		}
echo "</table></div>";
?>
