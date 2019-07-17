<html>
	<head>
		
<script>
var mins = 30 * 60;
var active = setTimeout("warn()",(mins*1000));

function logout()
{
	location='logout.php';	
}
function warn()
{
		clearTimeout(active);
		mins = 30 * 60;
		active = setTimeout("logout()",(mins*1000));
		logout();
	
}
</script>
	</head>
</html>
<?php
include("users.php");
if (!loggedin()) {
	echo "Please log in first to see this page.";
    header("Location:login.php");
} else {
    //echo "Welcome". $username;
}
echo '<script type="text/javascript">'
   , '</script>'
;
?>