<?php

?>
<!Doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
            <title>RSU | Student Login</title>
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
    	   <img src="img/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

    <div class="row">
   <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
               <h1><div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-7"><marquee><h2>Royal State University</h2></marquee></h1>
        
        <header class="container header_area fix" >
			<div id="sticker">
				<div class="head">
					
				
			</div>
		
		<div class="maincontent container fix">
			<div id="stickerside">
				<div class="sidebar fix" >
						<ul>
<?php 
$pageTitle = "Student login";
include "header.php";
?>
<div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
	<div class="loginform fix">
		<div class="msg"><h3><i class="fa fa-graduation-cap" aria-hidden="true"></i>Student login</h3></div>
		<div class="access">
		
		<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id	  = $_POST['st_id'];
						$st_pass = $_POST['st_pass'];

						if(empty($st_id) or empty($st_pass)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$st_pass = md5($st_pass);
							$login = $user->st_userlogin($st_id, $st_pass);
							if($login){
								header('Location: st_profile.php');
							}else{
								echo "<p style='color:red;text-align:center'>Incorrect Student ID or password</p>";
							}
						}
					}
				?>
				
			<form action="" method="post">
				
            <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                     <label>Enter user name : </label>
				<input type="text" name="st_id" class="form-control" />
				<label>Enter Password :  </label>
				<input type="password" name="st_pass" class="form-control" /><hr />
			   <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i> &nbsp;Login </button>&nbsp;
			</form>
		</div>
		
	</div>
<p align="center">Not Registered? <a href="st_reg.php">Create an account</a></p>
	<br><br>	<br><br>	<br><br>	<br><br>
<?php include "footer.php"; ?>
<?php ob_end_flush() ; ?>