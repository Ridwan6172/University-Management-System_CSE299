
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$statusMsg = '';

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $otherName = $_POST['otherName'];
    $admissionNumber = $_POST['admissionNumber'];
    $classId = $_POST['classId'];
    $classArmId = $_POST['classArmId'];
    $dateCreated = date("Y-m-d");
   
    $query = mysqli_query($conn, "SELECT * FROM tblstudents WHERE admissionNumber ='$admissionNumber'");
    $ret = mysqli_fetch_array($query);

    if($ret > 0){ 
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Email Address Already Exists!</div>";
    }
    else{
        $query = mysqli_query($conn, "INSERT INTO tblstudents(firstName, lastName, otherName, admissionNumber, password, classId, classArmId, dateCreated) 
        VALUES ('$firstName', '$lastName', '$otherName', '$admissionNumber', '12345', '$classId', '$classArmId', '$dateCreated')");

        if ($query) {
            $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Created Successfully!</div>";
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

//---------------------------------------EDIT-------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit"){
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "SELECT * FROM tblstudents WHERE Id ='$Id'");
    $row = mysqli_fetch_array($query);

    //------------UPDATE-----------------------------

    if(isset($_POST['update'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $otherName = $_POST['otherName'];
        $admissionNumber = $_POST['admissionNumber'];
        $classId = $_POST['classId'];
        $classArmId = $_POST['classArmId'];
        $dateCreated = date("Y-m-d");

        $query = mysqli_query($conn, "UPDATE tblstudents SET firstName='$firstName', lastName='$lastName', otherName='$otherName',
        admissionNumber='$admissionNumber', password='12345', classId='$classId', classArmId='$classArmId' WHERE Id='$Id'");

        if ($query) {
            echo "<script type=\"text/javascript\">
            window.location = (\"createStudents.php\")
            </script>"; 
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "DELETE FROM tblstudents WHERE Id='$Id'");

    if ($query == TRUE) {
        echo "<script type=\"text/javascript\">
        window.location = (\"createStudents.php\")
        </script>";
    }
    else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
    }
}

?>


<?php include('createStudents1.php');?>
