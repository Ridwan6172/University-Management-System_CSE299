<?php
session_start();
error_reporting(0);
include("includes/config.php");

function validateCredentials($regno, $password, $con)
{
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
        $_SESSION['login'] = $regno;
        $_SESSION['id'] = $num['studentRegno'];
        $_SESSION['sname'] = $num['studentName'];

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "INSERT INTO userlog(studentRegno, userip, status) VALUES ('".$_SESSION['login']."','$uip','$status')");

        header("Location: http:my-profile.php");
        exit;
    } else {
        $_SESSION['errmsg'] = "Invalid Reg no or Password";
        header("Location: http:index.php");
        exit;
    }
}
?>


<?php include('index1.php');?>