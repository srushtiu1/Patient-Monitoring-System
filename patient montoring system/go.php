<?php
    if(isset($_POST['submit'])){
		echo "hh";
$name = $_POST['na'];
		echo $name;
$sub=substr($name,0,1);
		echo $sub;
	$sql="SELECT * from patient_details WHERE p_id='$sub'";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result))
  	{
echo '<div class="panel-body">
  <table class="table table-hover table-bordered">' ;
  echo '<tr><th>Patient Id</th>';
  echo"<td>" . $row["p_id"]. "</td></tr>";
echo '<tr><th>First Name</th>';
  echo"<td>" . $row["p_fname"]. "</td></tr>";
  echo '<tr><th>Middle Name</th>';
  echo " <td>" . $row['p_mname'] . "</td></tr>";
echo '<tr><th>Last Name</th>';
  echo " <td>" . $row['p_lname']. "</td></tr>" ;
	echo '<tr><th>Email Id</th>';
    echo " <td>" . $row['p_email']. "</td></tr>" ;
	echo '<tr><th>Phone Number</th>';
  echo " <td>" .  $row['p_phno'] . "</td></tr>";
    echo '<tr><th>Date of Birth</th>';
      echo " <td>" . $row['p_dob'] . "</td></tr>";
    echo'<tr><th>Age</th>';
      echo " <td>" . $row['p_age'] . "</td></tr>";
    echo '<tr><th>Address</th>';
      echo " <td>" . $row['p_addr1'] ." " .$row['p_addr2'] . "</td></tr>";
    echo '<tr><th>Area</th>';
      echo " <td>" . $row['p_area'] . "</td></tr>";
    echo '<tr><th>Suggested By</th>';
      echo " <td>" . $row['p_sugg'] . "</td></tr>";
	echo'<tr><th>Gender</th>';
    echo " <td>" . $row['p_gender'] . "</td>";
	
echo'</tr>';
		}
echo "</table></div>";
}?>