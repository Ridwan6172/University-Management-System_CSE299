<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {   
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        mysqli_query($con, "DELETE FROM students WHERE StudentRegno = '".$_GET['id']."'");
        echo '<script>alert("Student Record Deleted Successfully !!")</script>';
        echo '<script>window.location.href=manage-students.php</script>';
    }

    if (isset($_GET['pass'])) {
        $password = "123";
        $newpass = md5($password);
        mysqli_query($con, "UPDATE students SET password='$newpass' WHERE StudentRegno = '".$_GET['id']."'");
        echo '<script>alert("Password Reset. New Password is 123")</script>';
        echo '<script>window.location.href=manage-students.php</script>';
    } 
}
?>


<?php include('man_st.php');?>