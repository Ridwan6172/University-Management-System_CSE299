<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
if (!$user->get_admin_session()) {
    header('Location: index.php');
    exit();
}

$pageTitle = "Student Result";
include "php/headertop_admin.php";
?>

<div class="all_student fix">
    <table class="tab_one" style="text-align:center;">
        <style>
            table {
                border: 1px;
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 86%;
                margin: auto;
            }

            td,
            th {
                border: 1px solid black !important;
                padding: 5px;
            }

            tr:nth-child(even) {
                background-color: white;
            }
        </style>
        <tr>
            <th style="text-align:center;">SL</th>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">ID</th>
            <th style="text-align:center;">Add Result</th>
            <th style="text-align:center;">View Result</th>
        </tr>
        <?php
        $i = 0;
        $alluser = $user->get_all_student();

        while ($rows = $alluser->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><font color="#000000"><?php echo $i; ?></td>
                <td><font color="#000000"><?php echo $rows['name']; ?></td>
                <td><font color="#000000"><?php echo $rows['st_id']; ?></td>
                <td><font color="#000000"><a href="add_result.php?ar=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name']; ?>"><font color="#000000">Add Result</a></td>
                <td><font color="#000000"><a href="view_result.php?vr=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name']; ?>"><font color="#000000">View Result</a></td>
            </tr>
        <?php } ?>

    </table>
</div>

<?php ob_end_flush(); ?>
