<?php
require_once 'includes/dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RSU | Faculty List</title>
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
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h1>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7"></div>
                    </div>
                </h1>

                <?php require_once 'includes/header.php'; ?>

                <div>
                    <div>
                        <hr/>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <div class="text-center">
                                    <h2 class="fw-bolder">Listed Teachers</h2>
                                    <hr color="red"/>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <?php
                            $sql = "SELECT * FROM tblteacher WHERE isPublic='1'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                                    ?>
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top"
                                                 src="teacher/images/<?php echo $row->Picture; ?>"
                                                 alt="<?php echo htmlentities($row->Name); ?>"/>
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo htmlentities($row->TeacherSub); ?></div>
                                                <a class="text-decoration-none link-dark stretched-link"
                                                   href="teacher-details.php?tid=<?php echo $row->ID; ?>"
                                                   target="_blank">
                                                    <h5 class="card-title mb-3"><?php echo htmlentities($row->Name); ?></h5>
                                                </a>
                                                <br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <h3 align="center" style="color:red;">Record not Found</h3>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php // Footer ?>

</body>
</html>
