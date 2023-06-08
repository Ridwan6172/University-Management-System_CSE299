<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {   
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $semester = $_POST['semester'];
        $ret = mysqli_query($con, "INSERT INTO semester(semester) VALUES ('$semester')");
        if ($ret) {
            echo '<script>alert("Semester Created Successfully !!")</script>';
            echo '<script>window.location.href=semester.php</script>';
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
            echo '<script>window.location.href=semester.php</script>';
        }
    }

    if (isset($_GET['del'])) {
        $sid = $_GET['id'];
        mysqli_query($con, "DELETE FROM semester WHERE id ='$sid'");
        echo '<script>alert("Semester Deleted Successfully !!")</script>';
        echo '<script>window.location.href=semester.php</script>';
    }
}
?>


<?php include('semester1.php');?>