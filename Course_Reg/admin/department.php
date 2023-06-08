<?php
session_start();
include('includes/config.php');

function createDepartment($department, $con) {
    $department = mysqli_real_escape_string($con, $department);

    $ret = mysqli_query($con, "INSERT INTO department(department) VALUES ('$department')");

    return $ret;
}

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $department = $_POST['department'];

        $ret = createDepartment($department, $con);

        if ($ret) {
            echo '<script>alert("Department Created Successfully !!")</script>';
            echo '<script>window.location.href="department.php"</script>';
            exit;
        } else {
            echo '<script>alert("Error: Department is not created")</script>';
            echo '<script>window.location.href="department.php"</script>';
            exit;
        }
    }

    // Delete the department
    if (isset($_GET['del'])) {
        $deptid = $_GET['id'];
        mysqli_query($con, "DELETE FROM department WHERE id = '$deptid'");
        echo '<script>alert("Department deleted !!")</script>';
        echo '<script>window.location.href="department.php"</script>';
        exit;
    }
}
?>

<?php include('dept1.php');?>

