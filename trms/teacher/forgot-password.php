<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tblteacher WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblteacher set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
echo "<script>window.location.href ='index.php'</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
     
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Forgot Password</title>
  

    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>


  
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>

<body class="bg-dark" style=" background-image: url('https://media.istockphoto.com/id/1323143709/vector/background-curve-water-color-green.jpg?s=612x612&w=0&k=20&c=VriUkXz_liT0O7ZQ7r7GEwBKgmK-1ib-WTQP0Daxzcs=');">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                      <h3 style="color:black">Forget Password</h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="chngpwd" onSubmit="return valid();">
                        
<div class="form-group">
<label>Email Address</label>
<input type="email" class="form-control"  required="" name="email">
</div>

<div class="form-group">
<label>Mobile Number</label>
<input type="text" class="form-control"  name="mobile" required="true">
</div>
                        
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="newpassword" required="true"/>
</div>

<div class="form-group">
<label>Confirm Password</label>
<input class="form-control" type="password" name="confirmpassword" required="true" />
</div>



<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Reset</button><br>
<div class="checkbox">
<label class="pull-left">
 <a href="index.php">Login</a><br>
 </label>
</div>
<br>

</form>

</div>
</div>
</div>
</div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
