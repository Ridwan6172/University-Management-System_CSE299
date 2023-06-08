<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

function deleteTeacher($dbh, $tid)
{
    $query = $dbh->prepare("DELETE FROM tblteacher WHERE ID=:tid");
    $query->bindParam(':tid', $tid, PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Teacher deleted")</script>';
    echo "<script>window.location.href ='manage-teacher.php'</script>";
}

if (strlen($_SESSION['trmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['delid'])) {
        $tid = $_GET['delid'];
        deleteTeacher($dbh, $tid);
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Manage Faculty</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark" style=" background-image: url('https://wallpaperaccess.com/full/1197702.jpg');">
    <!-- Left Panel -->
    <?php include_once('includes/sidebar.php'); ?>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include_once('includes/header.php'); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Faculty</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Manage Faculty</a></li>
                            <li class="active">Manage Faculty</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Manage Faculty</strong>
                            </div>
                            <div class="card-body">
                                <table id="dtBasicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Faculty Name</th>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tblteacher";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row->Name); ?></td>
                                                    <td><?php echo htmlentities($row->TeacherSub); ?></td>
                                                    <td>
                                                        <a href="edit-teacher-detail.php?tid=<?php echo htmlentities($row->ID); ?>" class="btn btn-primary">Edit</a>
                                                        <a href="manage-teacher.php?delid=<?php echo htmlentities($row->ID); ?>" class="btn btn-danger" onclick="return confirm('Do you really want to delete?');">Delete</a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $cnt = $cnt + 1;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>

</html>
<?php } ?>
