<?php
include("../../../conn.php");
extract($_POST);

$updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4' WHERE eqt_id='$question_id' ");

if ($updCourse) {
    $res = ["res" => "success"];
} else {
    $res = ["res" => "failed"];
}

echo json_encode($res);
?>
