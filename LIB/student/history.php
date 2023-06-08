<?php
require('dbconn.php');



if (isset($_SESSION['RollNo'])) {
    $rollno = $_SESSION['RollNo'];

    if (isset($_POST['submit'])) {
        $search = $_POST['title'];
        $sql = "SELECT * FROM LMS.record, LMS.book WHERE RollNo = '$rollno' AND Date_of_Issue IS NOT NULL AND Date_of_Return IS NOT NULL AND book.Bookid = record.BookId AND (record.BookId = '$search' OR Title LIKE '%$search%')";
    } else {
        $sql = "SELECT * FROM LMS.record, LMS.book WHERE RollNo = '$rollno' AND Date_of_Issue IS NOT NULL AND Date_of_Return IS NOT NULL AND book.Bookid = record.BookId";
    }

    $result = $conn->query($sql);
    $rowcount = mysqli_num_rows($result);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
        <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
        <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">Home </a>
        <div class="nav-collapse collapse navbar-inverse-collapse">
        <ul class="nav pull-right">
        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="images/user.png" class="nav-avatar" />
        <b class="caret"></b></a>
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
        <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
        <li><a href="history.php"><i class="menu-icon icon-tasks"></i>Previously Borrowed Books </a></li>
        <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Recommend Books </a></li>
        <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
        </ul>
        <ul class="widget widget-menu unstyled">
        <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
        </ul>
        </div>
        <!--/.sidebar-->
        </div>
        <!--/.span3-->

        <div class="span9">
        <form class="form-horizontal row-fluid" action="history.php" method="post">
        <div class="control-group">
        <label class="control-label" for="Search"><b>Search:</b></label>
        <div class="controls">
        <input type="text" id="title" name="title" placeholder="Enter Book Name/Book Id." class="span8" required>
        <button type="submit" name="submit" class="btn">Search</button>
        </div>
        </div>
        </form>
        <br>
        <?php
        if (!($rowcount)) {
            echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
        } else {
            ?>

            <table class="table" id="tables">
            <thead>
            <tr>
            <th>Book id</th>
            <th>Book name</th>
            <th>Issue Date</th>
            <th>Return Date</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while ($row = $result->fetch_assoc()) {
                $bookid = $row['BookId'];
                $name = $row['Title'];
                $issuedate = $row['Date_of_Issue'];
                $returndate = $row['Date_of_Return'];
                ?>

                <tr>
                <td><?php echo $bookid ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $issuedate ?></td>
                <td><?php echo $returndate ?></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        <?php } ?>
        </div>
        <!--/.span9-->
        </div>
        </div>
        <!--/.container-->
        </div>

        </div>

        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        </body>
        </html>
    <?php
} else {
    header("Location: login.php");
}
$conn->close();
?>
