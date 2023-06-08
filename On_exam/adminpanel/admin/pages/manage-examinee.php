<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Examinee</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
</head>
<body>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAMINEE</div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee List</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Gender</th>
                                    <th>Birthdate</th>
                                    <th>Course</th>
                                    <th>Year level</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $examineeQuery = "SELECT * FROM examinee_tbl ORDER BY exmne_id DESC";
                                $examineeResult = $conn->query($examineeQuery);

                                if ($examineeResult->rowCount() > 0) {
                                    while ($examineeRow = $examineeResult->fetch(PDO::FETCH_ASSOC)) {
                                        $courseId = $examineeRow['exmne_course'];
                                        $courseQuery = "SELECT * FROM course_tbl WHERE cou_id=:courseId";
                                        $courseStatement = $conn->prepare($courseQuery);
                                        $courseStatement->bindParam(':courseId', $courseId);
                                        $courseStatement->execute();
                                        $courseRow = $courseStatement->fetch(PDO::FETCH_ASSOC);
                                        $courseName = $courseRow['cou_name'];

                                        ?>
                                        <tr>
                                            <td><?php echo $examineeRow['exmne_fullname']; ?></td>
                                            <td><?php echo $examineeRow['exmne_gender']; ?></td>
                                            <td><?php echo $examineeRow['exmne_birthdate']; ?></td>
                                            <td><?php echo $courseName; ?></td>
                                            <td><?php echo $examineeRow['exmne_year_level']; ?></td>
                                            <td><?php echo $examineeRow['exmne_email']; ?></td>
                                            <td><?php echo $examineeRow['exmne_password']; ?></td>
                                            <td><?php echo $examineeRow['exmne_status']; ?></td>
                                            <td>
                                                <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $examineeRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">
                                            <h3 class="p-3">No Course Found</h3>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
