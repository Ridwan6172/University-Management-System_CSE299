<?php
if (isset($_POST['submit'])) {
    $rollno = $_POST['RollNo'];
    $message = $_POST['Message'];

    $sql1 = "INSERT INTO LMS.message (RollNo, Msg, Date, Time) VALUES ('$rollno', '$message', CURDATE(), CURTIME())";

    if ($conn->query($sql1) === TRUE) {
        echo "<script type='text/javascript'>alert('Success')</script>";
    } else {
        // echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Royal State University Library</title>

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
    <img src="images/cc.png" width="1600px" height="150px">
    </a>
    </div>
    </div>
    <div class="clearfix"></div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h1>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            <h1><marquee>Welcome to Royal State University Library</marquee></h1>
                        </div>
                    </div>
                </h1>

                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                                <i class="icon-reorder shaded"></i>
                            </a>
                            <a class="brand" href="index.php">LMS </a>
                            <div class="nav-collapse collapse navbar-inverse-collapse">
                                <ul class="nav pull-right">
                                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">
                                            <img src="images/user.png" class="nav-avatar" />
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.php">Your Profile</a></li>
                                            <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                            <li class="divider"></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.nav-collapse -->
                        </div>
                    </div>
                    <!-- /navbar-inner -->
                </div>
                <!-- /navbar -->
                <div class="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="span3">
                                <div class="sidebar">
                                    <ul class="widget widget-menu unstyled">
                                        <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                            </a></li>
                                        <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                        </li>
                                        <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students
                                            </a></li>
                                        <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                        <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a>
                                        </li>
                                        <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return
                                                Requests </a></li>
                                        <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book
                                                Recommendations </a></li>
                                        <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued
                                                Books </a></li>
                                    </ul>
                                    <ul class="widget widget-menu unstyled">
                                        <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.sidebar-->
                            </div>
                            <!--/.span3-->

                            <div class="span9">
                                <div class="content">
                                    <div class="module">
                                        <div class="module-head">
                                            <h3>Send a message</h3>
                                        </div>
                                        <div class="module-body">
                                            <br>
                                            <form class="form-horizontal row-fluid" action="message.php" method="post">
                                                <div class="control-group">
                                                    <label class="control-label" for="Rollno"><b>Receiver Roll
                                                            No:</b></label>
                                                    <div class="controls">
                                                        <font color=#000000>
                                                            <input type="text" id="RollNo" name="RollNo"
                                                                placeholder="RollNo" class="span8" required></font>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="Message"><b>Message:</b></label>
                                                    <div class="controls">
                                                        <font color=#000000>
                                                            <input type="text" id="Message" name="Message"
                                                                placeholder="Enter Message" class="span8" required>
                                                    </div>
                                                    <hr>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <button type="submit" name="submit" class="btn">Add
                                                                Message</button>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/.content-->
                        </div>
                        <!--/.span9-->
                    </div>
                </div>
                <!--/.container-->
            </div>
            <div class="footer">
                <div class="container">

                </div>
            </div>

            <!--/.wrapper-->
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/common.js" type="text/javascript"></script>
        </body>
    </html>
