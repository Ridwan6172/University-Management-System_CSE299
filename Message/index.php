<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>RSU | Message</title>

	    
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>

</head>
<!-- //Head -->

<!-- Body -->
<body>
 <img src="images/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

    <div class="row">
   <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
               <h1><div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-7">
	<h1><marquee>Welcome to Royal State University Message System</marquee></h1>
	<h2>Please login to confirm!</h2>

<form name="admin" method="post">
            <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
				  <label>Enter username : </label><font color=#000000>
				<input type="text" Name="RollNo" required=""></font>
				  <label>Enter Password: </label>
			<font color=#000000>	<input type="password" Name="Password"  required="">
			
			<br><br>
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="Login">
				</form>
			<br><br><br><br><br>

	

	
<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS1.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/message.php');
  else
  	header('location:student/message.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}




?>

</body>
<!-- //Body -->

</html>
