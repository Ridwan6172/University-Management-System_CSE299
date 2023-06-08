<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $emailid = $_POST['emailid'];
    $phoneno = $_POST['mobileno'];
    $password = md5($_POST['password']);

    $query = $dbh->prepare("SELECT ID FROM tblteacher WHERE Email = :emailid AND MobileNumber = :phoneno");
    $query->bindParam(':emailid', $emailid, PDO::PARAM_STR);
    $query->bindParam(':phoneno', $phoneno, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<script>alert('Email id or Mobile no already registered with another account.');</script>";
        echo "<script type='text/javascript'> document.location ='signup.php'; </script>";
    } else {
        $sql = "INSERT INTO tblteacher (Name, Email, MobileNumber, password) VALUES (:fname, :emailid, :phoneno, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':emailid', $emailid, PDO::PARAM_STR);
        $query->bindParam(':phoneno', $phoneno, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        
        if ($lastInsertId > 0) {
            echo '<script>alert("Registered successfully")</script>';
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>RSU | Faculty Signup</title>
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>
</head>

<body class="bg-dark" style="background-image: url('https://media.istockphoto.com/id/1323143709/vector/background-curve-water-color-green.jpg?s=612x612&w=0&k=20&c=VriUkXz_liT0O7ZQ7r7GEwBKgmK-1ib-WTQP0Daxzcs=');">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color:black"> Teacher Registration </h3>
                    <hr color="red" />
                </div>
                <div class="login-form">
                    <form action="" method="post" name="login">
                        <div class="form-group">
                            <label>Teacher Full Name</label>
                            <input type="text" class="form-control" placeholder="Full Name" required="true" name="fname">
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                            <input type="email" class="form-control" placeholder="Email id" required="true" name="emailid">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" title="10 numeric characters only" required="true" name="mobileno">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Sign Up</button>
                        <div class="checkbox">
                            <label class="pull-left">
                                <a href="../index.php">Back Home!!</a>
                            </label>
                            <label class="pull-right">
                                <a href="index.php" style="padding-left: 250px">Already Registered Login Here</a>
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
