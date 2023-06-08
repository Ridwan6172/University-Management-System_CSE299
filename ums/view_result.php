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

if (isset($_REQUEST['vr'])) {
    $stid = $_REQUEST['vr'];
    $name = $_REQUEST['vn'];
}
?>

<?php include('view_result1.php');?>	