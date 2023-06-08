<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title>Login</title>
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
	<img src="@@cht/images/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
            	 <h3>Registration Portal</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
<center>
<div class="form-group">
	
	<strong><marquee behavior="alternate">Welcome to Royal State University- Group Chat Registration</marquee></span></font></div></strong>
<?php
	require('db.php');

    if (isset($_POST['username'])){
	
        $username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$Department = $_POST['Department'];
		$pss = $_POST['pss'];
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($conn,$username);
		$fullname = stripslashes($fullname);
		$fullname = mysqli_real_escape_string($conn,$fullname);
		$trn_date = date("Y-m-d H:i:s");
		$Department = stripslashes($Department);
		$Department = mysqli_real_escape_string($conn,$Department);
		$pss = stripslashes($pss);
		$pss = mysqli_real_escape_string($conn,$pss);
		$question = stripslashes($question);
		$question = mysqli_real_escape_string($conn,$question);
		$answer = stripslashes($answer);
		$answer = mysqli_real_escape_string($conn,$answer);
        $query = "INSERT into `users` (username, fullname, trn_date, Department, pss, question, answer) VALUES ('$username', '$fullname', '$trn_date', '$Department', '$pss', '$question', '$answer')"; 
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration Form</h1>
<form action="" method="post" name="login">
	<form name="admin" method="post">
           <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">

                     <label>Enter Registration No : </label><font color=#000000>
                        <input type="text" name="username" class="form-control" required /></font>
                        <label>Enter Full Name : </label><font color=#000000>
                        <input type="text" name="fullname" class="form-control" required /></font>
                        <label>Enter Department : </label><font color=#000000>
<select name="Department" class="form-control" required>
		<option>----------Choose your Department--------</option>
        <option>CSE</option>
        <option>EEE</option>
        <option>ETE</option>

       
        <option>Others</option>      
    </select></font>
                        <label>Enter Password :  </label>
                        <input type="password" name="pss" class="form-control" required />
<label>Enter Security Question :  </label><font color=#000000>
	<select name="question" class="form-control" required>
		<option>----------Chosse Any Question--------</option>
        <option>what is your favorite color</option>
		<option>what is your favorite movie</option>
		<option>what is your favorite singer</option>
		<option>what is your favorite pet</option>
		<option>what is your favorite cartoon character</option>
		<option>what is your nickname</option></select></font>

		<label>Enter Answer :  </label>	<font color=#000000>
	<input type="answer" name="answer" class="form-control" required /><br>

                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i> &nbsp;Login </button>&nbsp;

</form>
</div>
<?php } ?>
</body>
<br><br><br><br>

</html>