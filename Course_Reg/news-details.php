<?php
session_start();
error_reporting(0);
include("includes/config.php");

function validateCredentials($regno, $password, $con) {
    $regno = mysqli_real_escape_string($con, $regno);
    $password = md5(mysqli_real_escape_string($con, $password));

    $query = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='$regno' AND password='$password'");
    $num = mysqli_fetch_array($query);

    return $num;
}

if (isset($_POST['submit'])) {
    $regno = $_POST['regno'];
    $password = $_POST['password'];

    $num = validateCredentials($regno, $password, $con);

    if ($num) {
        $extra = "change-password.php";
        $_SESSION['login'] = $_POST['regno'];
        $_SESSION['id'] = $num['studentRegno'];
        $_SESSION['sname'] = $num['studentName'];

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "INSERT INTO userlog(studentRegno, userip, status) VALUES ('".$_SESSION['login']."','$uip','$status')");
    } else {
        $_SESSION['errmsg'] = "Invalid Reg no or Password";
        $extra = "index.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/$extra");
        exit;
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

    <title>Student Login</title>
    
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
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h3>News</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
    <?php include('includes/header.php');?>

<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                             <li><a href="index.php">Home </a></li>
                             <li><a href="admin/">Admin Login </a></li>
                              <li><a href="index.php">Student Login</a></li>
        

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">News Details </h4>

                </div>

            </div>


                <div class="col-md-12">
                    <div class="alert alert-info">
        
                        <ul>
<?php $nid=$_GET['nid'];
$sql=mysqli_query($con,"select * from news where id='$nid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{?>
<h3><?php echo htmlentities($row['newstitle']);?></h3>
<small><?php echo htmlentities($row['postingDate']);?></small>
<hr />   
<p><?php echo htmlentities($row['newsDescription']);?></p>                  
<?php } ?> 
                     
                        </ul>
                    </marquee>
                       
                    </div>
                                    </div>

            </div>
        </div>
    </div>

</body>
</html>
