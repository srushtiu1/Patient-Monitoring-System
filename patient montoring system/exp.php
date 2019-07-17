
<?php
include("connection.php");
date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d');
//$p_id=mysqli_real_escape_string($link,$_POST['p_id']);
$sql="SELECT * from patient_details ";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
		{
			
$contents=   '<table >
	<tr>
	<td>First Name</td>
<td>Middle Name</td>
	<td>Last Name</td>
	<td>Email Id</td>
	<td>Phone Number</td>
	<td>Date of Birth</td>
  <td>Age</td>
  <td>Address</td>
  <td>Area</td>
  <td>Pincode</td>
  <td>Suggested by</td>
  <td>Gender</td>
	
</tr>';
	echo $contents;
	 echo "<tr>";
			echo " <td>" . $row['p_fname'] . "</td>";
			echo " <td>" . $row['p_mname'] . "</td>";
			echo " <td>" . $row['p_lname']. "</td>" ;
			echo " <td>" . $row['p_email']. "</td>" ;
			echo " <td>" .  $row['p_phno'] . "</td>";
			echo " <td>" .  $row['p_dob'] . "</td>";
  echo " <td>" .  $row['p_age'] . "</td>";
  echo " <td>" .  $row['p_addr1'] . $row['p_addr2'] . "</td>";
    echo " <td>" .  $row['p_area'] . "</td>";
			echo " <td>" .  $row['p_pin'] . "</td>";
    echo " <td>" .  $row['p_sugg'] . "</td>";

    echo " <td>" .  $row['p_gender'] . "</td>";

			echo "</tr>";
		
echo "</table>";
	$filename = $date;
}


header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
?>
