<?php

 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Student</title>
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
    <body>
   <img src="../assets/img/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h3>Admin</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
<?php include('includes/header.php');?>
  
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
   
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i>Student  </h1>
                    </div>
                </div>
                <div class="row" >
                 
          
                <div class="col-md-12">
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i> Manage Student
                        </div>
                  
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><font color=#000000>#</th>
                                            <th><font color=#000000>Reg No </th>
                                            <th><font color=#000000>Student Name </th>
                                            <th> <font color=#000000>Pincode</th>
                                             <th><font color=#000000>Reg Date</th>
                                             <th><font color=#000000>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from students");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><font color=#000000><?php echo $cnt;?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['StudentRegno']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['studentName']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['pincode']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['creationdate']);?></td>
                                            <td>
                                            <a href="edit-student-profile.php?id=<?php echo $row['StudentRegno']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
<button type="submit" name="submit" id="submit" class="btn btn-default">Reset Password</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
           
                </div>
            </div>





        </div>
    </div>
 
</body>
</html>
<?php?>
