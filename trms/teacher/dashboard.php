<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

function redirectToLogout() {
    header('location:logout.php');
    exit();
}

function isProfilePublic($isPublic) {
    if ($isPublic == '1') {
        return "<p class='text-light'><b>Your Profile is Public. Students can see your profile.</b></p>";
    } else {
        return "<p class='text-light'><b>Your Profile is not Public. Students can't see your profile.</b></p>";
    }
}

if (strlen($_SESSION['trmsuid']) == 0) {
    redirectToLogout();
} else {
    include_once('includes/sidebar.php');
    ?>

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <title>Faculty Dashboard</title>
        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>

    <body class="bg-red" style="background-image: url('https://www.solidbackgrounds.com/images/1920x1080/1920x1080-true-blue-solid-color-background.jpg');">

        <?php include_once('includes/sidebar.php'); ?>

        <div id="right-panel" class="right-panel">
            <?php include_once('includes/header.php'); ?>

            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="col-sm-6 col-lg-12">
                    <div class="card text-black bg-flat-color-2">
                        <div class="card-body pb-0">
                            <div class="dropdown float-right">
                            </div>
                            <?php 
                            $eid = $_SESSION['trmsuid'];
                            $query = $dbh->prepare("SELECT * FROM tblteacher WHERE ID=:eid");
                            $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $row) { 
                            ?>
                                <h3 class="mb-0">
                                    <span>Welcome back: <?php echo htmlentities($row->Name); ?></span>
                                </h3>
                                <hr />
                                <?php echo isProfilePublic($row->isPublic); ?>
                            <?php } ?>
                            <div class="chart-wrapper px-3" style="height:70px;" height="70">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="../assets/js/main.js"></script>
            <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
            <script src="../assets/js/dashboard.js"></script>
            <script src="../assets/js/widgets.js"></script>
            <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
            <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
            <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
            <script>
                (function($) {
                    "use strict";

                    jQuery('#vmap').vectorMap({
                        map: 'world_en',
                        backgroundColor: null,
                        color: '#ffffff',
                        hoverOpacity: 0.7,
                        selectedColor: '#1de9b6',
                        enableZoom: true,
                        showTooltip: true,
                        values: sample_data,
                        scaleColors: ['#1de9b6', '#03a9f5'],
                        normalizeFunction: 'polynomial'
                    });
                })(jQuery);
            </script>

    </body>

    </html>
<?php } ?>
