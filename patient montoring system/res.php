<?php
session_start();

include("connection.php");
		$_SESSION['url'] = $_SERVER['REQUEST_URI'];?>
<html>
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
	<script type="text/javascript"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	
	<script type="text/javascript" src="jquery.js"></script>
		<style>
			.fa-4x {
    font-size: 1.5em;
}
		</style>
	</head>
	<body>
<hr>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h2><i class="fa fa-lock fa-4x"></i></h2>
                          <h2 class="text-center">Reset Password?</h2>
                         
                            <div class="panel-body">
                              
                              <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" >
								                           
	<br>Username:<span style="color:red;">*</span>
		<input type="text" name="user" placeholder="Enter Username" class="form-control" required >
	<br>Old Password:<span style="color:red;">*</span>
		<input type="text" name="old" placeholder="Enter Old Password" class="form-control" required ><br>
	New Password:<span style="color:red;">*</span>
		<input type="text" name="new" placeholder="Enter New Password" class="form-control" required><br>
		<a href="login.php" class="btn btn-success" >Go Back</a> <button type="submit" class="btn btn-primary" name="submit">Change</button>
	</form>
		<?php
if(isset($_POST['submit']))
{
	$user = mysqli_real_escape_string($link, $_POST['user']);
$old = mysqli_real_escape_string($link, $_POST['old']);
$new = mysqli_real_escape_string($link, $_POST['new']);
	if($user=='admin')
	{
	$qry="select * from login where name='admin'";
	$result = mysqli_query($link,$qry);
	
while($row = mysqli_fetch_array($result))
  	{
	//echo "hi";
	if($row['password']==$old && $row['name']=='admin')
	{
	$sql="update login set password='$new' where name='admin'";
		if(mysqli_query($link, $sql)){
   unset($_SESSION["password"]);
			header("Location:login.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

	}
	else if($row['password']!=$old)
	{
	echo "<div class='alert alert-danger'>
    <strong>" . " Old Password is wrong"."</strong></div>";
	}
	else 
	{
	echo "<div class='alert alert-danger'>
    <strong>" . " Username is wrong"."</strong></div>";
	}
	
}}
	else
		echo "<div class='alert alert-danger'>
    <strong>" . " You cannot reset password"."</strong></div>";
	
}
?>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	</body>
</html>
