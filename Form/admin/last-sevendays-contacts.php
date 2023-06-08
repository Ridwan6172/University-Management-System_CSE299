<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['userlogin']) == 0) {
    header('location:index.php');
} else {
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>RSU | Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-callout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <img src="images/cc.png" width="1600px" height="150px">
    <div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h1>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            <h1><marquee>Welcome to Royal State University Complaint Management System</marquee></h1>
                            <?php include_once('includes/header.php'); ?>
                            <p><a href="http://localhost/Form/admin/dashboard.php">Go to Dashboard</a></p>
                            <div class="app-content content">
                                <div class="content-wrapper">
                                    <div class="content-header row">
                                        <div class="content-header-left col-md-10 col-12 mb-2 breadcrumb-new">
                                            <h3 class="content-header-title mb-0 d-inline-block">Last seven day's Contacts</h3>
                                            <div class="row breadcrumbs-top d-inline-block">
                                                <div class="breadcrumb-wrapper col-12">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                                        <li class="breadcrumb-item active">Last seven day's Contacts</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="heading-elements">
                                                            <ul class="list-inline mb-0">
                                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <p class="px-1">
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Full Name</th>
                                                                            <th>Phone Number</th>
                                                                            <th>Posting Date</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $sql = "SELECT FullName, PhoneNumber, PostingDate, id, Is_Read FROM tblcontactdata WHERE date(PostingDate) >= DATE(NOW()) - INTERVAL 7 DAY";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                        $cnt = 1;
                                                                        if ($query->rowCount() > 0) {
                                                                            foreach ($results as $result) {
                                                                        ?>
                                                                        <tr>
                                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                                            <td><?php echo htmlentities($result->FullName); ?></td>
                                                                            <td><?php echo htmlentities($result->PhoneNumber); ?></td>
                                                                            <td><?php echo htmlentities($result->PostingDate); ?></td>
                                                                            <td>
                                                                                <?php
                                                                                if ($result->Is_Read != 1) {
                                                                                    echo htmlentities("Unread");
                                                                                } else {
                                                                                    echo htmlentities("Read");
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="contact-details.php?cid=<?php echo htmlentities($result->id); ?>">
                                                                                    <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-1">View Details</button>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                            $cnt++;
                                                                            }
                                                                        } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td colspan="5" style="color:red; font-size:22px;" align="center">No Record found</td>
                                                                        </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php include('includes/footer.php');?>
                            <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
                            <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
                            <script src="app-assets/js/core/app.js" type="text/javascript"></script>
                            <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>
