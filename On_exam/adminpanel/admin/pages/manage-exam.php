<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE EXAM</div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Exam List</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Title</th>
                                <th class="text-left">Course</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Time limit</th>
                                <th class="text-left">Display limit</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $examQuery = "SELECT * FROM exam_tbl ORDER BY ex_id DESC";
                                $examResult = $conn->query($examQuery);

                                function getCourseName($conn, $courseId) {
                                    $courseQuery = "SELECT * FROM course_tbl WHERE cou_id='$courseId'";
                                    $courseResult = $conn->query($courseQuery);

                                    if ($courseRow = $courseResult->fetch(PDO::FETCH_ASSOC)) {
                                        return $courseRow['cou_name'];
                                    }

                                    return '';
                                }

                                if ($examResult->rowCount() > 0) {
                                    while ($examRow = $examResult->fetch(PDO::FETCH_ASSOC)) {
                                        $courseId = $examRow['cou_id'];
                                        $courseName = getCourseName($conn, $courseId);

                                        echo '
                                        <tr>
                                            <td class="pl-4">'.$examRow['ex_title'].'</td>
                                            <td>'.$courseName.'</td>
                                            <td>'.$examRow['ex_description'].'</td>
                                            <td>'.$examRow['ex_time_limit'].'</td>
                                            <td>'.$examRow['ex_questlimit_display'].'</td>
                                            <td class="text-center">
                                                <a href="manage-exam.php?id='.$examRow['ex_id'].'" type="button" class="btn btn-primary btn-sm">Manage</a>
                                                <button type="button" id="deleteExam" data-id="'.$examRow['ex_id'].'" class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>';
                                    }
                                } else {
                                    echo '
                                    <tr>
                                        <td colspan="6">
                                            <h3 class="p-3">No Exam Found</h3>
                                        </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
