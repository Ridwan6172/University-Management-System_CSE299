<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsuid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_SESSION['trmsuid'];
        $tname = $_POST['tname'];
        $email = $_POST['email'];
        $mobnum = $_POST['mobilenumber'];
        $address = $_POST['address'];
        $quali = $_POST['qualifications'];
        $tsubjects = $_POST['tsubjects'];
        $tdate = $_POST['joiningdate'];
        $description = $_POST['description'];
        $teachexp = $_POST['teachingexp'];
        $status = $_POST['status'];

        $sql = "UPDATE tblteacher SET Name=:tname, Email=:email, MobileNumber=:mobilenumber, Qualifications=:qualifications, Address=:address, TeacherSub=:tsubjects, JoiningDate=:joiningdate, description=:description, teachingExp=:teachexp, isPublic=:status WHERE ID=:eid";

        $query = $dbh->prepare($sql);
        $query->bindParam(':tname', $tname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':qualifications', $quali, PDO::PARAM_STR);
        $query->bindParam(':mobilenumber', $mobnum, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':tsubjects', $tsubjects, PDO::PARAM_STR);
        $query->bindParam(':joiningdate', $tdate, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':teachexp', $teachexp, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();

        echo '<script>alert("Your profile has been successfully updated.")</script>';
        echo "<script>window.location.href='dashboard.php'</script>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Faculty Profile</title>

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
                        <h1>Update Faculty Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Update Faculty</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6" style="float:left!important;">
                        <div class="card">
                            <div class="card-header">
                                <strong>Faculty</strong><small> Personal Details</small>
                            </div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    <?php
                                    $eid = $_SESSION['trmsuid'];
                                    $sql = "SELECT * FROM tblteacher WHERE ID=$eid";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;

                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                    ?>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Faculty Name</label>
                                        <input type="text" name="tname" value="<?php echo $row->Name; ?>" class="form-control" id="tname" required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Faculty Pic</label> &nbsp;
                                        <?php if ($row->Picture == ''): ?>
                                            <img src="images/no-image.png" alt="NO Image">
                                        <?php else: ?>
                                            <img src="images/<?php echo $row->Picture; ?>" width="100" height="100" value="<?php echo $row->Picture; ?>">
                                        <?php endif; ?>
                                        <a href="changeimage.php"> &nbsp; Edit Image</a>
                                    </div>

                                    <div class="form-group">
                                        <label for="street" class="form-control-label">Faculty Email ID</label>
                                        <input type="text" name="email" value="<?php echo $row->Email; ?>" id="email" class="form-control" required="true">
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Faculty Mobile Number</label>
                                                <input type="text" name="mobilenumber" id="mobilenumber" value="<?php echo $row->MobileNumber; ?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Faculty Address</label>
                                                <textarea type="text" name="address" id="address" class="form-control" rows="3" cols="12" required="true"><?php echo $row->Address; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Joining Date</label>
                                                <input type="date" name="joiningdate" id="joiningdate" value="<?php echo $row->JoiningDate; ?>" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Faculty</strong><small> Professional Details</small>
                            </div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Faculty Qualifications(Sepereted by comma)</label>
                                                <input type="text" name="qualifications" id="qualifications" value="<?php echo $row->Qualifications; ?>" class="form-control" required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Teaching Experience (in Years)</label>
                                                <input type="text" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers" value="<?php echo $row->teachingExp; ?>" class="form-control" required="true">
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
                                                <textarea type="text" name="description" id="description" class="form-control" rows="3" cols="12" required="true"><?php echo $row->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Profile Status <small style="color:red">(Public profile anybody can your details and not public only you can view)</small></label>
                                                <select type="text" name="status" id="status" value="" class="form-control" required="true">
                                                    <?php if ($row->isPublic == '1'): ?>
                                                        <option value="1">Public</option>
                                                        <option value="0">Not public</option>
                                                    <?php else: ?>
                                                        <option value="0">Not public</option>
                                                        <option value="1">Public</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
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
