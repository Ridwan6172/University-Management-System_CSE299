
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$statusMsg = '';

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNo = $_POST['phoneNo'];
    $classId = $_POST['classId'];
    $classArmId = $_POST['classArmId'];
    $dateCreated = date("Y-m-d");
   
    $query = mysqli_query($conn, "SELECT * FROM tblclassteacher WHERE emailAddress ='$emailAddress'");
    $ret = mysqli_fetch_array($query);

    $sampPass = "1234";
    $sampPass_2 = md5($sampPass);

    if($ret > 0){ 
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Email Address Already Exists!</div>";
    }
    else{
        $query = mysqli_query($conn, "INSERT into tblclassteacher(firstName, lastName, emailAddress, password, phoneNo, classId, classArmId, dateCreated) 
        VALUES ('$firstName', '$lastName', '$emailAddress', '$sampPass_2', '$phoneNo', '$classId', '$classArmId', '$dateCreated')");

        if ($query) {
            $qu = mysqli_query($conn, "UPDATE tblclassarms SET isAssigned='1' WHERE Id ='$classArmId'");
            if ($qu) {
                $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Created Successfully!</div>";
            }
            else {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
            }
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit"){
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "SELECT * FROM tblclassteacher WHERE Id ='$Id'");
    $row = mysqli_fetch_array($query);

    //------------UPDATE-----------------------------

    if(isset($_POST['update'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNo = $_POST['phoneNo'];
        $classId = $_POST['classId'];
        $classArmId = $_POST['classArmId'];
        $dateCreated = date("Y-m-d");

        $query = mysqli_query($conn, "UPDATE tblclassteacher SET firstName='$firstName', lastName='$lastName',
        emailAddress='$emailAddress', phoneNo='$phoneNo', classId='$classId', classArmId='$classArmId'
        WHERE Id='$Id'");

        if ($query) {
            echo "<script type=\"text/javascript\">
            window.location = (\"createClassTeacher.php\")
            </script>"; 
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['classArmId']) && isset($_GET['action']) && $_GET['action'] == "delete"){
    $Id = $_GET['Id'];
    $classArmId = $_GET['classArmId'];

    $query = mysqli_query($conn, "DELETE FROM tblclassteacher WHERE Id='$Id'");

    if ($query == TRUE) {
        $qu = mysqli_query($conn, "UPDATE tblclassarms SET isAssigned='0' WHERE Id ='$classArmId'");
        if ($qu) {
            echo "<script type=\"text/javascript\">
            window.location = (\"createClassTeacher.php\")
            </script>"; 
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
    else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
    }
}
?>

<?php include('createClassTeacher1.php');?>
