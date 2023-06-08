<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title>Login</title>
<link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>
</head>

<body>
	<img src="@@cht/images/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
            	 <h3>Login Portal</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
<center>
<div class="form-group">
	
	<strong><marquee behavior="alternate">Welcome to Royal State University- Group Chat System</marquee></span></font></div></strong>
<?php
	require('db.php');
	session_start();
   
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $pss = $_POST['pss'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($conn,$username);
		$pss = stripslashes($pss);
		$pss = mysqli_real_escape_string($conn,$pss);
	
        $query = "SELECT * FROM `users` WHERE username='$username' and pss='$pss'";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rows = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['fullname'] = $row['fullname'];
			header("Location: choose.php"); 
            }else{
				echo "<div class='form'><h3>Username or password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">

<form action="" method="post" name="login">
	<form name="admin" method="post">
           <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">

                     <label>Enter Registration No : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Enter Password :  </label>
                        <input type="password" name="pss" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i> &nbsp;Login </button>&nbsp;

<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
<p>Forgot Password? Click <a href="#" onClick="MyWindow=window.open('pwordrecover.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Here</a></span></p>
</div>
</form>





<?php } ?>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</html>
