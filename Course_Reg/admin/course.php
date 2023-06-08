<?php
session_start();
include('includes/config.php');

function createCourse($coursecode, $coursename, $courseunit, $seatlimit, $con) {
    $coursecode = mysqli_real_escape_string($con, $coursecode);
    $coursename = mysqli_real_escape_string($con, $coursename);
    $courseunit = mysqli_real_escape_string($con, $courseunit);
    $seatlimit = mysqli_real_escape_string($con, $seatlimit);

    $ret = mysqli_query($con, "INSERT INTO course(courseCode, courseName, courseUnit, noofSeats) VALUES ('$coursecode', '$coursename', '$courseunit', '$seatlimit')");

    return $ret;
}

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $coursecode = $_POST['coursecode'];
        $coursename = $_POST['coursename'];
        $courseunit = $_POST['courseunit'];
        $seatlimit = $_POST['seatlimit'];

        $ret = createCourse($coursecode, $coursename, $courseunit, $seatlimit, $con);

        if ($ret) {
            echo '<script>alert("Course Created Successfully !!")</script>';
            echo '<script>window.location.href="course.php"</script>';
            exit;
        } else {
            echo '<script>alert("Error: Course not created!!")</script>';
            echo '<script>window.location.href="course.php"</script>';
            exit;
        }
    }

    if (isset($_GET['del'])) {
        mysqli_query($con, "DELETE FROM course WHERE id = '".$_GET['id']."'");
        echo '<script>alert("Course deleted!!")</script>';
        echo '<script>window.location.href="course.php"</script>';
        exit;
    }
}
?>


<?php include('course1.php');?>