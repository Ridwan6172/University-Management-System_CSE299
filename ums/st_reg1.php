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
<?php 
$pageTitle = "Student Registration";

include "header.php";
?>
	<div class="st_reg fix">
		<h2>Student Registration Form</h2>
		<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id   = $_POST['st_id'];
						$st_name = $_POST['st_name'];
						$st_pass = $_POST['st_pass'];
						$st_email = $_POST['st_email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						
						$st_dept  = $_POST['st_dept'];
						$st_contact  = $_POST['st_contact'];
						$st_gender  = $_POST['gender'];
						$st_add  = $_POST['st_add'];
						
						if(empty($st_id) or empty($st_name) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear) or empty($st_dept) or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
						}else{
							$st_pass = md5($st_pass);
							$st_register = $user->st_registration($st_id,$st_name,$st_pass,$st_email,$bday,$st_dept,$st_contact,$st_gender,$st_add);
							if($st_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Registration Complete !! <a style='font-size:20px;color:#8e44ad' href='st_login.php'>Login</a></h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..Student ID or email Already exists</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Name: </th>
					<td><font color=#000000><input type="text" name="st_name" placeholder="Full Name" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Student ID: </th>
					<td><font color=#000000><input type="text" name="st_id" placeholder="Student Id" required /></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><font color=#000000><input type="password" name="st_pass" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><font color=#000000><input type="email" name="st_email" placeholder="example@email.com" required /></td>
				</tr>
				<tr>
					<th>Date of Birth: </th>
					<td><font color=#000000>
						<fieldset>

						  <select class="select-style" name="BirthMonth">
						  <option  value="01">Jan</option>

						<option value="02">Feb</option>

						 <option value="03" >March</option>

						  <option value="04">April</option>

						  <option value="05">May</option>

						  <option value="06">June</option>

						  <option value="07">July</option>

						 <option value="08">Aug</option>

						  <option value="09">Sep</option>

							<option value="10">Oct</option>

						 <option value="11">Nov</option>
						  <option value="12" >Dec</option>
						  </label>

						</select>   

						<label><input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>

						<label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>

					  </fieldset>
					</td>
				</tr>
				<tr>
					<th>Program:</th>
					<td><font color=#000000><input type="text" name="st_dept" placeholder="BSCSE,BSEEE, BBA..." required /></td>
				</tr>
				<tr>
					<th>Contact:</th>
					<td><font color=#000000><input type="text" name="st_contact" placeholder="phone" required /></td>
				</tr>
				<tr>
					<th>Gender:</th>
					<td><label><input type="radio" name="gender" value="Male" checked/> Male</label>
					<label><input type="radio" name="gender" value="Female"/> Female</label>
					<label><input type="radio" name="gender" value="Other"/> Other</label>
						
					</td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><font color=#000000><input type="text" name="st_add" placeholder="Address" required /></td>
				</tr>
				<tr>
					<td colspan="2"><font color=#000000><input type="submit" name="sub" value="Register" /></td>
				</tr>
			</table>
		</form>
<br><br><br><br><br><br>
	</div>

<?php include "footer.php"; ?>

