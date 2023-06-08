<?php
ob_start();
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<?php include('edit_admin_details1.php') ;}?>