<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$statusMsg = '';

if(isset($_POST['save'])){
    $className = $_POST['className'];

    $query = mysqli_query($conn, "SELECT * FROM tblclass WHERE className = '$className'");
    $ret = mysqli_fetch_array($query);

    if($ret > 0){ 
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Class Already Exists!</div>";
    }
    else{
        $query = mysqli_query($conn, "INSERT INTO tblclass(className) VALUES('$className')");

        if ($query) {
            $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Created Successfully!</div>";
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "SELECT * FROM tblclass WHERE Id ='$Id'");
    $row = mysqli_fetch_array($query);

    if(isset($_POST['update'])){
        $className = $_POST['className'];

        $query = mysqli_query($conn, "UPDATE tblclass SET className='$className' WHERE Id='$Id'");

        if ($query) {
            echo "<script type=\"text/javascript\">
            window.location = (\"createClass.php\")
            </script>"; 
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "DELETE FROM tblclass WHERE Id='$Id'");

    if ($query == TRUE) {
        echo "<script type=\"text/javascript\">
        window.location = (\"createClass.php\")
        </script>";  
    }
    else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
    }
}
?>

<?php include('createClass1.php');?>