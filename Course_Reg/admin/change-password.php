<?php
session_start();
include('includes/config.php');

function changeAdminPassword($cpass, $newpass, $currentTime, $con, $alogin) {
    $cpass = md5(mysqli_real_escape_string($con, $cpass));
    $newpass = md5(mysqli_real_escape_string($con, $newpass));
    $alogin = mysqli_real_escape_string($con, $alogin);

    $sql = mysqli_query($con, "SELECT password FROM admin WHERE password='$cpass' AND username='$alogin'");
    $num = mysqli_fetch_array($sql);

    if ($num) {
        mysqli_query($con, "UPDATE admin SET password='$newpass', updationDate='$currentTime' WHERE username='$alogin'");
        return true;
    } else {
        return false;
    }
}

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Dhaka');
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $cpass = $_POST['cpass'];
        $newpass = $_POST['newpass'];

        $isPasswordChanged = changeAdminPassword($cpass, $newpass, $currentTime, $con, $_SESSION['alogin']);

        if ($isPasswordChanged) {
            echo '<script>alert("Password Changed Successfully !!")</script>';
            echo '<script>window.location.href="change-password.php"</script>';
            exit;
        } else {
            echo '<script>alert("Old Password not match !!")</script>';
            echo '<script>window.location.href="change-password.php"</script>';
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Admin | Change Password</title>
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>
</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
<body>
  
             <img src="../assets/img/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h3>Admin</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
<?php include('includes/header.php');?>
   
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Admin Change Password </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Change Password
                        </div>



                        <div class="panel-body">
                       <form name="chngpwd" method="post" onSubmit="return valid();">
   <div class="form-group">
    <label for="exampleInputPassword1"><font color=#000000>Current Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Password" />
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1"><font color=#000000>New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass" placeholder="Password" />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><font color=#000000>Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass" placeholder="Password" />
  </div>
 
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                           <hr />
   



</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
        </div>
    </div>
  
</body>
</html>
<?php  ?>
