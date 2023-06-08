<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $studentname = $_POST['studentname'];
        $studentregno = $_POST['studentregno'];
        $password = md5($_POST['password']);
        $pincode = rand(100000, 999999);
        $ret = mysqli_query($con, "INSERT INTO students(studentName, StudentRegno, password, pincode) VALUES ('$studentname', '$studentregno', '$password', '$pincode')");
        if ($ret) {
            echo '<script>alert("Student Registered Successfully. Pincode is '.$pincode.'")</script>';
            echo '<script>window.location.href="manage-students.php"</script>';
        } else {
            echo '<script>alert("Error! Please try again.")</script>';
            echo '<script>window.location.href="manage-students.php"</script>';
        }
    }
}
?>

<?php include('reg.php');?>
