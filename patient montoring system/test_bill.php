<?php
include ("connection.php");
mysql_query('Update bill set b_bal=100 WHERE b_no = 96');
printf("Records deleted: %d\n", mysql_affected_rows());
mysql_query('Update patient_details set p_fame="test" WHERE p_id = 80');
printf("Records deleted: %d\n", mysql_affected_rows());

?>