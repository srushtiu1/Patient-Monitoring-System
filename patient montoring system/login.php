<?php
   ob_start();
   session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
</head>
<body style="background: url('images/bg/bg.png') center center fixed;overflow:hidden">
	<?php
    if(isset($_POST['login'])) {
     
    $myusername = mysqli_real_escape_string($link,$_POST['username']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
    $sql = "SELECT * FROM login WHERE name = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($link,$sql);
	$q=mysqli_num_rows($result);
	if($q==1)
	{
	while($row = mysqli_fetch_array($result))
  	{
	if($row['name']==$myusername and $row['password'] == $mypassword)
	{
		
	$_SESSION['valid'] = true;
    $_SESSION['timeout'] = time(90);
    $_SESSION['username'] = $myusername;
	$_SESSION['password'] = $mypassword;
	header("location:home.php");
		
    }
	else 
	{
		
    $error="Wrong Password ! Please try again";
	
	}
	}
	}
	else
		$error="Wrong Password !! Please try again";
	}
	
?>
    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan"> 
				
                <form action="" class="form-horizontal" method="post">
					
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px;">
                           Dr. Ashish Prabhudesai</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 text-center">
                            <h3><?php if(isset($error)) echo $error; else  echo "
                            <p>
                                Just Log in and we’ll send you on your way</p>";?>
							</h3>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Username:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" type="text" placeholder="" class="form-control" name="username"/></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Password:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" type="password" placeholder="" class="form-control" name="password"/></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <a href="res.php" class="btn btn-success" >
										Reset Password</a>
                                    <button type="submit" class="btn btn-primary" name="login">
                                        Log In</button>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>
