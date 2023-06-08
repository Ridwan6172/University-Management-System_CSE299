<?php
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$statusMsg = '';

//------------------------SAVE--------------------------------------------------

if (isset($_POST['save'])) {
    $classId = $_POST['classId'];
    $classArmName = $_POST['classArmName'];

    $query = mysqli_query($conn, "SELECT * FROM tblclassarms WHERE classArmName ='$classArmName' AND classId = '$classId'");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Class Arm Already Exists!</div>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO tblclassarms(classId, classArmName, isAssigned) VALUES ('$classId', '$classArmName', '0')");

        if ($query) {
            $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Created Successfully!</div>";
        } else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "SELECT * FROM tblclassarms WHERE Id ='$Id'");
    $row = mysqli_fetch_array($query);

    //------------UPDATE-----------------------------

    if (isset($_POST['update'])) {
        $classId = $_POST['classId'];
        $classArmName = $_POST['classArmName'];

        $query = mysqli_query($conn, "UPDATE tblclassarms SET classId = '$classId', classArmName = '$classArmName' WHERE Id='$Id'");

        if ($query) {
            echo "<script type=\"text/javascript\">
            window.location = (\"createClassArms.php\")
            </script>";
        } else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "DELETE FROM tblclassarms WHERE Id='$Id'");

    if ($query == TRUE) {
        echo "<script type=\"text/javascript\">
        window.location = (\"createClassArms.php\")
        </script>";
    } else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <?php include 'includes/title.php'; ?>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h1>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div id="wrapper">
                                <!-- Sidebar -->
                                <?php include "Includes/sidebar.php"; ?>
                                <!-- Sidebar -->
                                <div id="content-wrapper" class="d-flex flex-column">
                                    <div id="content">
                                        <!-- TopBar -->
                                        <?php include "Includes/topbar.php"; ?>
                                        <!-- Topbar -->

                                        <!-- Container Fluid-->
                                        <div class="container-fluid" id="container-wrapper">
                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="./"><font color=#000000>Home</font></a></li>

                                                </ol>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-30">
                                                    <!-- Form Basic -->
                                                    <div class="card mb-6">
                                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">Create Class Sections</h6>
                                                            <?php echo $statusMsg; ?>
                                                        </div>
                                                        <div class="card-body">
                                                            <form method="post">
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label"><h3><font color=#000000>Select Class</font></h3><span class="text-danger ml-2">*</span></label>
                                                                        <?php
                                                                        $qry = "SELECT * FROM tblclass ORDER BY className ASC";
                                                                        $result = $conn->query($qry);
                                                                        $num = $result->num_rows;
                                                                        if ($num > 0) {
                                                                            echo ' <select required name="classId" class="form-control mb-3">';
                                                                            echo '<option value="">--Select Class--</option>';
                                                                            while ($rows = $result->fetch_assoc()) {
                                                                                echo '<option value="' . $rows['Id'] . '" >' . $rows['className'] . '</option>';
                                                                            }
                                                                            echo '</select>';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label"><font color=#000000><h3>Section No</font></h3><span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" class="form-control" name="classArmName" value="<?php echo $row['classArmName']; ?>" id="exampleInputFirstName" placeholder="Class Section">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if (isset($Id)) {
                                                                ?>
                                                                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                                <?php
                                                                }
                                                                ?>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <!-- Input Group -->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card mb-4">
                                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                                    <h6 class="m-0 font-weight-bold text-primary">All Class Section</h6>
                                                                </div>
                                                                <div class="table-responsive p-3">
                                                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                                                        <style>
                                                                            table {
                                                                                border: 1px;
                                                                                font-family: arial, sans-serif;
                                                                                border-collapse: collapse;
                                                                                width: 86%;
                                                                                margin: auto;
                                                                            }

                                                                            td,
                                                                            th {
                                                                                border: 1px solid black !important;
                                                                                padding: 5px;
                                                                            }

                                                                            tr:nth-child(even) {
                                                                                background-color: white;
                                                                            }
                                                                        </style>
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>
                                                                                    <h5>#</h5>
                                                                                </th>
                                                                                <th>
                                                                                    <h5>Class Name</th>
                                                                                <th>
                                                                                    <h5>Class Section</h5>
                                                                                </th>
                                                                                <th>
                                                                                    <h5>Status</h5>
                                                                                </th>
                                                                                <th>
                                                                                    <h5>Edit</h5>
                                                                                </th>
                                                                                <th>
                                                                                    <h5>Delete</h5>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>

                                                                            <?php
                                                                            $query = "SELECT tblclassarms.Id,tblclassarms.isAssigned,tblclass.className,tblclassarms.classArmName 
                                                                                        FROM tblclassarms
                                                                                        INNER JOIN tblclass ON tblclass.Id = tblclassarms.classId";
                                                                            $rs = $conn->query($query);
                                                                            $num = $rs->num_rows;
                                                                            $sn = 0;
                                                                            $status = "";
                                                                            if ($num > 0) {
                                                                                while ($rows = $rs->fetch_assoc()) {
                                                                                    if ($rows['isAssigned'] == '1') {
                                                                                        $status = "Assigned";
                                                                                    } else {
                                                                                        $status = "UnAssigned";
                                                                                    }
                                                                                    $sn = $sn + 1;
                                                                                    echo "
                                                                                      <tr>
                                                                                        <td><h5>" . $sn . "</h5></td>
                                                                                        <td><h4>" . $rows['className'] . "</h4></td>
                                                                                        <td><h4>" . $rows['classArmName'] . "</h4></td>
                                                                                        <td><h5>" . $status . "</h5></td>
                                                                                        <td><a href='?action=edit&Id=" . $rows['Id'] . "'><h5><font color=#000000>Edit</font></h5></a></td>
                                                                                        <td><a href='?action=delete&Id=" . $rows['Id'] . "'><h5><font color=#000000>Delete</font><h5></a></td>
                                                                                      </tr>";
                                                                                }
                                                                            } else {
                                                                                echo "<div class='alert alert-danger' role='alert'>
                                                                                        No Record Found!
                                                                                        </div>";
                                                                            }

                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Row-->
                                        </div>
                                        <!---Container Fluid-->
                                    </div>
                                    <!-- Footer -->
                                    <?php include "Includes/footer.php"; ?>
                                    <!-- Footer -->
                                </div>
                            </div>
                        </div>
                    </div>
                </h1>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>
