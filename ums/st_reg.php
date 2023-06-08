<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: st_profile.php');
}
?>
<?php include('st_reg1.php');?>	