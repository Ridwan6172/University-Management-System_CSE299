<?php
error_reporting();
include('config.php');

$sql ="SELECT emailId from tblemail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0):
foreach($results as $result):
$adminemail=$result->emailId;
endforeach;
endif;
if(isset($_POST['submit']))
{
	
$name=$_POST['name'];
$phoneno=$_POST['phonenumber'];
$email=$_POST['emailaddres'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$uip = $_SERVER ['REMOTE_ADDR'];
$isread=0;

$sql="INSERT INTO  tblcontactdata(FullName,PhoneNumber,EmailId,Subject,Message,UserIp,Is_Read) VALUES(:fname,:phone,:email,:subject,:message,:uip,:isread)";
$query = $dbh->prepare($sql);

$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phoneno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':uip',$uip,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{






echo "<script>alert('Your complaint submitted successfully.');</script>";
  echo "<script>window.location.href='index.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script>window.location.href='index.php'</script>";
}


}


?>
<!DOCTYPE HTML>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title>Online Complaint Management System</title>
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
	<div class="clearfix"></div>
</div>

    <div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">

                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-7">
                    	<h1><marquee> Welcome to Royal State University Online Complaint System</marquee></h1>
			<h1>Details</h1>
			<p>Feel free to drop your complaint. Your identity will not be disclosed</p>
		</div>
			
		
				<form name="admin" method="post">
            <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                     <label>Enter   Name : </label><font color=#000000>
<input type="text" name="name" class="form-control" ></font>


<label>Your phone number : </label><font color=#000000>
<input type="text" name="phonenumber"  class="form-control" ></font>

<label>Your email address</label><font color=#000000>
<input type="email" name="emailaddres"  class="form-control" ></font>

<label>Your registration no</label><font color=#000000>
<input type="text" name="subject"  class="form-control" ></font>

<label>Your complaint details </label><font color=#000000>
<input type="text" name="message" class="form-control" ></font>
<br>
<font color=#000000>
<input type="submit" value="send" name="submit"></font>
</form>
			<br><br><br>	<br><br><br><br><br>
				</div>
				</div>
			</div>

		<!---main--->
</body>
</html>