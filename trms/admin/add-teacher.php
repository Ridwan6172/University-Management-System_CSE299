<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $trmsaid = $_SESSION['trmsaid'];
        $tname = $_POST['tname'];
        $email = $_POST['email'];
        $mobnum = $_POST['mobilenumber'];
        $address = $_POST['address'];
        $quali = $_POST['qualifications'];
        $tsubjects = $_POST['tsubjects'];
        $tdate = $_POST['joiningdate'];
        $teachingexp = $_POST['teachingexp'];
        $description = $_POST['description'];
        $propic = $_FILES["propic"]["name"];

    

        $query = $dbh->prepare("SELECT * FROM tblteacher WHERE Email='$email' || MobileNumber='$mobnum'");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            echo "<script>alert('This email or contact number is already associated with another account');</script>";
            echo "<script>window.location.href='add-teacher.php'</script>";
        } else {
            $extension = substr($propic, strlen($propic) - 4, strlen($propic));
            $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Profile picture has an invalid format. Only jpg, jpeg, png, and gif formats are allowed');</script>";
            } else {
                $propic = md5($propic) . time() . $extension;
                move_uploaded_file($_FILES["propic"]["tmp_name"], "../teacher/images/" . $propic);

                $sql = "INSERT INTO tblteacher (Name, Picture, Email, MobileNumber, Qualifications, Address, TeacherSub, JoiningDate, teachingExp, description)
                        VALUES (:tname, :tpics, :email, :mobilenumber, :qualifications, :address, :tsubjects, :joiningdate, :teachingexp, :description)";

                $query = $dbh->prepare($sql);
                $query->bindParam(':tname', $tname, PDO::PARAM_STR);
                $query->bindParam(':tpics', $propic, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':qualifications', $quali, PDO::PARAM_STR);
                $query->bindParam(':mobilenumber', $mobnum, PDO::PARAM_STR);
                $query->bindParam(':address', $address, PDO::PARAM_STR);
                $query->bindParam(':tsubjects', $tsubjects, PDO::PARAM_STR);
                $query->bindParam(':joiningdate', $tdate, PDO::PARAM_STR);
                $query->bindParam(':teachingexp', $teachingexp, PDO::PARAM_STR);
                $query->bindParam(':description', $description, PDO::PARAM_STR);
                $query->execute();

                $lastInsertId = $dbh->lastInsertId();

                if ($lastInsertId > 0) {
                    echo '<script>alert("Teacher detail has been added.")</script>';
                    echo "<script>window.location.href ='manage-teacher.php'</script>";
                } else {
                    echo '<script>alert("Something went wrong. Please try again.")</script>';
                }
            }
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Add Faculty</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark" style="background-image: url('https://wallpaperaccess.com/full/1197702.jpg');">
  
    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">
      
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Faculty Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-teacher.php">Faculty Details</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Faculty</strong><small> Personal Details</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Faculty Name</label>
                                        <input type="text" name="tname" value="" class="form-control" id="tname" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Faculty Pic</label>
                                        <input type="file" name="propic" value="" class="form-control" id="propic" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class="form-control-label">Faculty Email ID</label>
                                        <input type="text" name="email" value="" id="email" class="form-control" required="true">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Faculty Mobile Number</label>
                                                <input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Faculty Address</label>
                                                <textarea type="text" name="address" id="address" value="" class="form-control" rows="4" cols="12" required="true"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Faculty</strong><small> Professional Details</small></div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">Faculty Qualifications (Separated by comma)</label>
                                                    <input type="text" name="qualifications" id="qualifications" value="" class="form-control" required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">Teaching Experience (in Years)</label>
                                                    <input type="text" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers" class="form-control" required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">Faculty Subjects</label>
                                                    <input type="text" name="tsubjects" id="tsubjects" value="" class="form-control" required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">Description (if Any)</label>
                                                    <textarea type="text" name="description" id="description" class="form-control" rows="3" cols="12" required="true"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">Joining Date</label>
                                                    <input type="date" name="joiningdate" id="joiningdate" value="" class="form-control" required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <p style="text-align: center;">
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                <i class="fa fa-dot-circle-o"></i> Add
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
