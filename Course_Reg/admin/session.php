<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $session = $_POST['session'];
        $ret = mysqli_query($con, "INSERT INTO session(session) VALUES ('$session')");
        if ($ret) {
            echo '<script>alert("Session Created Successfully !!")</script>';
            echo '<script>window.location.href="session.php"</script>';
        } else {
            echo '<script>alert("Error : Session not created")</script>';
            echo '<script>window.location.href="session.php"</script>';
        }
    }

    if (isset($_GET['del'])) {
        mysqli_query($con, "DELETE FROM session WHERE id = '".$_GET['id']."'");
        echo '<script>alert("Session Deleted")</script>';
        echo '<script>window.location.href="session.php"</script>';
    }
}
?>


<?php include('session1.php');?>