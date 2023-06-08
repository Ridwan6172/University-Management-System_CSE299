<?php
include("../../../conn.php");

extract($_POST);

$selCourse = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$examTitle' ");

if ($courseSelected == "0") {
    $res = ["res" => "noSelectedCourse"];
} else if ($timeLimit == "0") {
    $res = ["res" => "noSelectedTime"];
} else if (empty($examQuestDipLimit) && is_null($examQuestDipLimit)) {
    $res = ["res" => "noDisplayLimit"];
} else if ($selCourse->rowCount() > 0) {
    $res = ["res" => "exist", "examTitle" => $examTitle];
} else {
    $insExam = $conn->query("INSERT INTO exam_tbl(cou_id,ex_title,ex_time_limit,ex_questlimit_display,ex_description) VALUES('$courseSelected','$examTitle','$timeLimit','$examQuestDipLimit','$examDesc') ");
    if ($insExam) {
        $res = ["res" => "success", "examTitle" => $examTitle];
    } else {
        $res = ["res" => "failed", "examTitle" => $examTitle];
    }
}

echo json_encode($res);
?>
