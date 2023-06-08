<?php

 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enroll History</title>
<link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
      
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
<span class="sr-only">Loading...</span></i>Enroll History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i> Enroll History
                        </div>
                      
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><font color=#000000>#</th>
                                                 <th><font color=#000000>Student Name </th>
                                                    <th><font color=#000000>Student Reg no </th>
                                            <th><font color=#000000>Course Name </th>
                                            <th><font color=#000000>Department </th>
                                            
                                                <th><font color=#000000>Semester</th>
                                             <th><font color=#000000>Enrollment Date</th>
                                             <th><font color=#000000>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select courseenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,courseenrolls.enrollDate as edate ,semester.semester as sem,students.studentName as sname,students.StudentRegno as sregno from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department   join semester on semester.id=courseenrolls.semester join students on students.StudentRegno=courseenrolls.studentRegno ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><font color=#000000><?php echo $cnt;?></td>
                                              <td><font color=#000000><?php echo htmlentities($row['sname']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['sregno']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['courname']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['dept']);?></td>
                                          
                                            <td><font color=#000000><?php echo htmlentities($row['sem']);?></td>
                                             <td><font color=#000000><?php echo htmlentities($row['edate']);?></td>
                                            <td>
                                            <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>                                        


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
