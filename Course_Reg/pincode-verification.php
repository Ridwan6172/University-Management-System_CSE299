<?php
session_start();
include('includes/config.php');
error_reporting(0);

function verifyPincode($pincode, $login, $con) {
    $pincode = trim(mysqli_real_escape_string($con, $pincode));
    $login = mysqli_real_escape_string($con, $login);

    $sql = mysqli_query($con, "SELECT * FROM students WHERE pincode='$pincode' AND StudentRegno='$login'");
    $num = mysqli_fetch_array($sql);

    return $num;
}

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Dhaka');
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $pincode = $_POST['pincode'];

        $num = verifyPincode($pincode, $_SESSION['login'], $con);

        if ($num) {
            $_SESSION['pcode'] = $pincode;
            header("location:enroll.php");
            exit;
        } else {
            echo '<script>alert("Error: Wrong Pincode. Please Enter a Valid Pincode!!")</script>';
            echo '<script>window.location.href="my-pincode-verification.php"</script>';
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
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pincode Verification</title>
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
    <img src="assets/img/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h3>Verify Pincode</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
   
    <div class="content-wrapper">
        <div class="container">
             <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="page-head-line">Student Pincode Verification</h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                         <font color=#000000> Pincode Verification
                        </div>
<font color="red" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="pincodeverify" method="post">
   <div class="form-group">
    <label for="pincode">Enter Pincode</label>
    <input type="password" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required />
  </div>
 
  <button type="submit" name="submit" class="btn btn-default">Verify</button>
                           <hr />
   


</form>
  
                            </div>
                            </div>
                    </div>
                         <br>
<br>
<br>
<br>
<br>

                </div>
        </div>
    </div>
    
 
</body>
</html>
<?php  ?>
