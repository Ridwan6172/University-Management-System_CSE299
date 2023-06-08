<?php
 session_start();

include('includes/config.php');
error_reporting(0);
if(isset($_POST['login']))
  {
 
 
    $uname=$_POST['username'];
    $password=$_POST['password'];
   
    $sql ="SELECT UserName,Password FROM tbladmin WHERE (UserName=:usname)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $row) {
$hashpass=$row->Password;
}

if (password_verify($password, $hashpass)) {
$_SESSION['userlogin']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else {
$wrongpassword="You entered wrong password.";
 
  }
}

else{
$wrongemail="User not registered with us.";
  }
 
}
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
  <title>Admin Login
  </title>
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
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">

            <a class="navbar-brand" href="index.html">
            <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-7">
                      <h1><marquee>Royal State University Online Student Complaint Management System</marquee></h1><br>
              <h3 class="brand-text">Admin Login</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="../index.php"><i class="ficon ft-arrow-left"></i></a></li>
         
          </ul>
        </div>
      </div>
    </div>
  </nav>

                    <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-7">
          
                  </div>
                 
                </div>
                <div class="card-content">
                  <div class="card-body">
 <?php if($wrongpassword):?>                   
<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
<span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Oh snap ! </strong> <?php echo htmlentities($wrongpassword); ?>
  </div>
<?php endif;?>

 <?php if($wrongemail):?>                   
<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
<span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Oh snap ! </strong> <?php echo htmlentities($wrongemail); ?>
  </div>
<?php endif;?>

<br><br>

<form name="admin" method="post">
            <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                     <label>Enter User Name : </label>
                      


<input type="text" class="form-control input-lg" id="username" name="username" placeholder="Your Username" tabindex="1" required data-validation-required-message="Please enter your username.">
<div class="form-control-position"><i class="ft-user"></i>
</div>
<div class="help-block font-small-3"></div>

                      

<label>Enter Password :  </label>
<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Enter Password" tabindex="2" required data-validation-required-message="Please enter valid passwords.">
<div class="form-control-position"><i class="la la-key"></i></div>
<div class="help-block font-small-3"></div>
         


                      

<button type="submit" class="btn btn-danger btn-block btn-lg" name="login"><i class="ft-unlock"></i> Login</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  
</div>
</div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

 

</html>