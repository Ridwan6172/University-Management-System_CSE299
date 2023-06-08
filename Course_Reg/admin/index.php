<?php
session_start();
error_reporting(0);
include("includes/config.php");

function authenticateAdmin($username, $password, $con) {
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $num = mysqli_fetch_array($query);

    return $num;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $num = authenticateAdmin($username, $password, $con);

    if ($num > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        header("location:session.php");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        header("location:index.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>RSU Portal | Royal State University</title>
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

                <img src="../assets/img/cc.png" width="1600px" height="150px">
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
                    <div class="col-md-7"><marquee>Admin Portal</marquee></h1>

           


                
                    <div class="col-md-5 text-center">
                        
                    </div>
    

<body>
    <?php include('includes/header.php');?>

<section class="menu-section">
        <div class="container">
           <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-center">
                           
                      
                             
        

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="content-wrapper">
        <div class="container">
          <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <h4 class="page-head-line">Please login to enter Admin Panel </h4>

                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
           <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">

                     <label>Enter Username : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i> &nbsp;Login </button>&nbsp;
                </div> <br><br><br><br><br><br><br><br><br>
                
                </div>
                </form>
                <br><div class="time"><div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6"><span id="txt"><h2>Current Server Time: 07:01:00 PM</h2></span>
              </div>
                 
<br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
 
</body>
</html>
