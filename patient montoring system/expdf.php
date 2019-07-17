<?php
ignore_user_abort(true);
set_time_limit(0); 
$path = "/expdf.php";
 
//$secret = 'your-secret-string';
 

	$db = new mysqli('localhost', 'root', '', 'pat');
	$result = $db->query(sprintf("SELECT * FROM patient_details "));
	if ($result_>num_rows == 1) {
		$obj = $result->fetch_object();
		$fullPath = $path.$obj->filename;
		if ($fd = fopen ($fullPath, "r")) {
			//
			// the other PHP download code
			//
		}
		fclose ($fd);
		exit;
	} else {
		die('no match');
	}

?>