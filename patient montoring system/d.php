<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "pat");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM doctor WHERE (d_name LIKE '" . $term . "%'OR  d_id LIKE '" . $term . "%'OR d_mobile_no LIKE '" . $term . "%'OR d_clinic_no LIKE '" . $term . "%')";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
				echo "<p>" . $row['d_id'] . " ".$row['d_name'] ."</p>";
                //echo "<p>" . $row['p_fname'] . "</p>";
				//echo "<p>" . $row['p_lname'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>