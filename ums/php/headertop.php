<!Doctype html>
<html class="no-js" lang="">
    <head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content="Royal State University">
	<meta name="description" content="Royal State University">
		
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
      <div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
        <header class="container header_area" >
			<div id="sticker">
				<div class="head">
					
					<div class="uniname fix">
					
					 <div class="col-md-5 text-center">
                        
                    </div>
					</div>
				</div>
				<div class="menu ">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
					<ul>
						<?php if($user->getsession()){ ?>
						<li><a href="st_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
						<li><a href="st_change_pass.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Change Password</a></li>
						<li><a href="view_single_result.php?vr=<?php echo $sid?>&vn=<?php echo $sname?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Result</a></li>
					
						<li><a href="http://localhost/Message/"><i class="fa fa-sign-out" aria-hidden="true"></i> Check SMS</a></li>
						  <li><a href="http://localhost/new_chat/"><i class="fa fa-sign-out" aria-hidden="true"></i> Group Chat</a></li>
						     

						<li><a href="st_profile.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $sid; ?></a></li>
						<?php } ?>
						<?php if($user->get_faculty_session()){ ?>
								<li><a href="facultylogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
								<li><a href="class_att_fc.php"><i class="fa fa-cog" aria-hidden="true"></i> Options</a></li>
								<li><a href="fct_single_profile.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $fname;
								?></a></li>
								
							<?php } ?>
					</ul>

				</div>
			</div>
		</header>
		<div class="info container fix">
